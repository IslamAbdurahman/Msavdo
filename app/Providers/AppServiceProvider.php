<?php

namespace App\Providers;

use App\Models\Branch\Branch;
use App\Models\Branch\BranchDay;
use App\Models\Branch\BranchDevice;
use App\Models\Branch\BranchHoliday;
use App\Models\Day;
use App\Models\Firm\Firm;
use App\Models\Firm\FirmHoliday;
use App\Models\Firm\FirmPayment;
use App\Models\Firm\FirmSetting;
use App\Models\Salary\Salary;
use App\Models\Salary\SalaryBranchDay;
use App\Models\Salary\SalaryBranchHoliday;
use App\Models\Salary\SalaryFirmHoliday;
use App\Models\Salary\SalaryPayment;
use App\Models\User\User;
use App\Models\User\UserFirm;
use App\Models\User\UserTopUp;
use App\Models\Worker\Worker;
use App\Models\Worker\WorkerHoliday;
use App\Observers\BranchDayObserver;
use App\Observers\BranchDeviceObserver;
use App\Observers\BranchHolidayObserver;
use App\Observers\BranchObserver;
use App\Observers\FirmHolidayObserver;
use App\Observers\FirmObserver;
use App\Observers\FirmPaymentObserver;
use App\Observers\FirmSettingObserver;
use App\Observers\SalaryBranchDayObserver;
use App\Observers\SalaryBranchHolidayObserver;
use App\Observers\SalaryFirmHolidayObserver;
use App\Observers\SalaryObserver;
use App\Observers\SalaryPaymentObserver;
use App\Observers\UserFirmObserver;
use App\Observers\UserObserver;
use App\Observers\UserTopUpObserver;
use App\Observers\WorkerHolidayObserver;
use App\Observers\WorkerObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        app()->setLocale(session('locale', config('app.locale')));

        User::observe(UserObserver::class);
    }
}
