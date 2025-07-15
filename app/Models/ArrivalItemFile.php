<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArrivalItemFile extends Model
{
    protected $fillable = [
        'arrival_item_id',
        'file'
    ];

    public function arrivalItem()
    {
        return $this->belongsTo(ArrivalItem::class);
    }
}
