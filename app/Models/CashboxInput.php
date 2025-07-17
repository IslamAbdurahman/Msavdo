<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashboxInput extends Model
{
    use HasFactory;

    protected $fillable = ['cashbox_id', 'user_id', 'client_id', 'graphic_id', 'trade_id', 'amount', 'comment'];

    public function cashbox()
    {
        return $this->belongsTo(Cashbox::class);
    }

    public function graphic()
    {
        return $this->belongsTo(Graphics::class);
    }

    public function trade()
    {
        return $this->belongsTo(Trade::class);
    }
}
