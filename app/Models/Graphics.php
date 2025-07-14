<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Graphics extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'amount', 'paid_amount', 'discount', 'month'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
