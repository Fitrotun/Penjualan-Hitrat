<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_order');
            $table->foreign('id_order')->references('id')->on('orders')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('id_payment_method');
            $table->foreign('id_payment_method')->references('id')->on('payment_methods')->cascadeOnDelete()->cascadeOnUpdate();
            $table->float('total_harga', 10,2);
            $table->dateTime('transaction_date');
            $table->enum('status', ['menunggu pembayaran','verifikasi pembayaran', 'diproses', 'dikirim', 'sukses', 'gagal']);
            $table->string('bukti_pembayaran')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
