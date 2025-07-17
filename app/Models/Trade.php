<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trade extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'client_id', 'order_date', 'start_date', 'months', 'percent', 'comment', 'status'];

    public function items()
    {
        return $this->hasMany(TradeItem::class);
    }

    public function graphics()
    {
        return $this->hasMany(Graphics::class);
    }
}
