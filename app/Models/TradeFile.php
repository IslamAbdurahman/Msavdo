<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TradeFile extends Model
{
    protected $fillable = [
        'order_id',
        'file'
    ];

    public function orderItem()
    {
        return $this->belongsTo(Trade::class);
    }
}
