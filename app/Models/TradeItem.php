<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TradeItem extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'order_id', 'variant_id', 'amount', 'price'];

    public function order()
    {
        return $this->belongsTo(Trade::class);
    }

    public function variant()
    {
        return $this->belongsTo(Variant::class);
    }
}
