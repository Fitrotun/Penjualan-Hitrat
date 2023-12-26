<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'order_date',
        'status'
    ];

    public function user()
	{
	      return $this->belongsTo(User::class, 'id_user', 'id');
	}
    public function orderitem()
	{
	     return $this->hasMany(OrderItem::class, 'id_order', 'id');
	}

    public function transaction(){
        return $this->hasOne(Transaction::class, 'id_order', 'id');
    }
}
