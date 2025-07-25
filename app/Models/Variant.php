<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    use HasFactory;

    protected $fillable = ['arrival_item_id', 'amount'];

    public function arrivalItem()
    {
        return $this->belongsTo(ArrivalItem::class);
    }
}
