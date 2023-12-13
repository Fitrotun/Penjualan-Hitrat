<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'id_order',
        'id_payment_method',
        'total_harga',
        'transaction_date',
        'status',
        'bukti_pembayaran',
    ];


    public function order()
	{
	      return $this->belongsTo(Order::class, 'id_order', 'id');
	}

	public function payment_method()
	{
	      return $this->belongsTo(PaymentMethod::class, 'id_payment_method', 'id');
	}
}
