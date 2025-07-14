<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kirim extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'client_id', 'comment'];

    public function items()
    {
        return $this->hasMany(KirimItem::class);
    }
}
