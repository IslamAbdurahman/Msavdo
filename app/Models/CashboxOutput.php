<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashboxOutput extends Model
{
    use HasFactory;

    protected $fillable = ['cashbox_id', 'user_id', 'client_id', 'amount', 'comment'];

    public function cashbox()
    {
        return $this->belongsTo(Cashbox::class);
    }
}
