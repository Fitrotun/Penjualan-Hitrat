<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_order',
        'id_product',
        'quantity',
        'unit_price',
    ];

    public function order() {
        return $this->belongsTo(Order::class, 'id_order', 'id');
    }
    public function product() {
        return $this->belongsTo(Product::class, 'id_product', 'id');
    }
}
