<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KirimItem extends Model
{
    use HasFactory;

    protected $fillable = ['kirim_id', 'product_id', 'amount', 'price', 'sel_price', 'barcode', 'info_json', 'info'];

    public function kirim()
    {
        return $this->belongsTo(Kirim::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function variants()
    {
        return $this->hasMany(Variant::class);
    }
}
