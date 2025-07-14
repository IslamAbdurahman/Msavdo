<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    use HasFactory;

    protected $fillable = ['kirim_item_id', 'amount'];

    public function kirimItem()
    {
        return $this->belongsTo(KirimItem::class);
    }
}
