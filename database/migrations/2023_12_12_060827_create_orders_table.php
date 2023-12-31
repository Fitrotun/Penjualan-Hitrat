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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user');
            $table->foreign('id_user')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->dateTime('order_date');
            $table->enum('status', ['menunggu pembayaran','verifikasi pembayaran', 'diproses', 'dikirim', 'sukses', 'gagal']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
