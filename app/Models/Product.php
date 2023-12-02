<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;
    protected $table = "products";
    protected $fillable = [
        'image',
        'name',
        'description',
        'price',
        'id_category'
    ];

    

    public function category()
    {
        return $this->belongsTo(Category::class,'id_category');
    }
    public function cart()
    {
        return $this->hasOne(Cart::class);
    }

}
