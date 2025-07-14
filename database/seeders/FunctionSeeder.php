<?php

namespace Database\Seeders;

use App\Models\Day;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FunctionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Replace 'mydb' with your actual database name

        $databaseName = env('DB_DATABASE');

// Get all function names in the database
        $functions = DB::select("SELECT ROUTINE_NAME FROM INFORMATION_SCHEMA.ROUTINES WHERE ROUTINE_TYPE = 'FUNCTION' AND ROUTINE_SCHEMA = ?", [$databaseName]);

// Drop each function
        foreach ($functions as $function) {
            $functionName = $function->ROUTINE_NAME;
            DB::statement("DROP FUNCTION IF EXISTS $functionName");
        }

        DB::select("
            create
                definer = " . env('DB_USERNAME') . "@localhost function getBalance(worker_id_ int) returns double
            BEGIN

                declare balance double;

                select sum(`history`.`amount`)
                into balance
                from (select s.id,
                             s.amount,
                             s.comment,
                             s.created_at,
                             s.worker_id,
                             s.id as salary_id,
                             null as salary_payment_id
                      from salaries s
                      where worker_id = worker_id_

                      union all

                      select sp.id,
                             -1 * sp.amount amount,
                             sp.comment,
                             sp.created_at,
                             sp.worker_id,
                             null  as       salary_id,
                             sp.id as       salary_payment_id
                      from salary_payments sp

                      where worker_id = worker_id_) history
                order by history.created_at desc;


                return coalesce(balance, 0);

            end;
        ");


        DB::select("
create
    definer = " . env('DB_USERNAME') . "@localhost function count_working_days(workerId int, monthInput varchar(7)) returns int
BEGIN
    DECLARE working_days INT DEFAULT 0;
    DECLARE effectiveBranchId INT;
    DECLARE effectiveFirmId INT;

    DECLARE fromDate DATE;
    DECLARE toDate DATE;

    SET fromDate = STR_TO_DATE(CONCAT(monthInput, '-01'), '%Y-%m-%d');
    SET toDate = LAST_DAY(fromDate);

    -- Resolve branch and firm from worker if not provided
    SELECT  w.branch_id,
           b.firm_id
    INTO effectiveBranchId, effectiveFirmId
    FROM workers w
             LEFT JOIN branches b ON w.branch_id = b.id
    WHERE w.id = workerId
    LIMIT 1;

-- Generate date range
    WITH RECURSIVE
        date_range AS (SELECT fromDate AS date_val
                       UNION ALL
                       SELECT DATE_ADD(date_val, INTERVAL 1 DAY)
                       FROM date_range
                       WHERE date_val < toDate),
        working_indexes AS (SELECT GROUP_CONCAT(d.index) AS indexes
                            FROM branch_days bd
                                     JOIN days d ON bd.day_id = d.id
                            WHERE bd.branch_id = effectiveBranchId)
    SELECT COUNT(*)
    INTO working_days
    FROM date_range dr
    WHERE
      -- Check working days
        (
            effectiveBranchId IS NULL
                OR FIND_IN_SET(DAYOFWEEK(dr.date_val), (SELECT indexes FROM working_indexes))
            )

      -- Exclude worker holidays
      AND NOT EXISTS (SELECT 1
                      FROM worker_holidays
                      WHERE worker_id = workerId
                        AND dr.date_val BETWEEN `from` AND `to`)

      -- Exclude branch holidays by branch_id directly
      AND NOT EXISTS (SELECT 1
                      FROM branch_holidays
                      WHERE branch_id = effectiveBranchId
                        AND date = dr.date_val)

      -- Exclude firm holidays directly
      AND NOT EXISTS (SELECT 1
                      FROM firm_holidays
                      WHERE firm_id = effectiveFirmId
                        AND date = dr.date_val)

      -- Exclude branch holidays via worker
      AND NOT EXISTS (SELECT 1
                      FROM branch_holidays bh
                               JOIN branches b ON bh.branch_id = b.id
                               JOIN workers w ON w.branch_id = b.id
                      WHERE w.id = workerId
                        AND bh.date = dr.date_val)

      -- Exclude firm holidays via worker
      AND NOT EXISTS (SELECT 1
                      FROM firm_holidays fh
                               JOIN firms f ON fh.firm_id = f.id
                               JOIN branches b ON b.firm_id = f.id
                               JOIN workers w ON w.branch_id = b.id
                      WHERE w.id = workerId
                        AND fh.date = dr.date_val)

      -- Exclude firm holidays via branch
      AND NOT EXISTS (SELECT 1
                      FROM firm_holidays fh
                               JOIN branches b ON b.firm_id = fh.firm_id
                      WHERE b.id = effectiveBranchId
                        AND fh.date = dr.date_val);

    RETURN working_days;

END;


        ");

    }

}
