<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderFile extends Model
{
    protected $fillable = [
        'order_id',
        'file'
    ];

    public function orderItem()
    {
        return $this->belongsTo(Order::class);
    }
}
