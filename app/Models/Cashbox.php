<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cashbox extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function inputs()
    {
        return $this->hasMany(CashboxInput::class);
    }

    public function outputs()
    {
        return $this->hasMany(CashboxOutput::class);
    }
}
