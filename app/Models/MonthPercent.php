<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MonthPercent extends Model
{

    protected $fillable = [
        'months', 'percent'
    ];
}
