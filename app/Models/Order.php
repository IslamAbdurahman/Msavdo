<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'client_id', 'order_date', 'start_date', 'months', 'percent', 'comment', 'status'];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function graphics()
    {
        return $this->hasMany(Graphics::class);
    }
}
