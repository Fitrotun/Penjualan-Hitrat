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
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropForeign('transactions_id_product_foreign');
            $table->dropForeign('transactions_id_cart_foreign');
            $table->dropColumn('id_product');
            $table->dropColumn('id_cart');
            $table->dropColumn('jumlah');
            $table->dropColumn('jumlah_harga');

            $table->foreignId('id_order');
            $table->foreign('id_order')->references('id')->on('orders')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('id_payment_method');
            $table->foreign('id_payment_method')->references('id')->on('payment_methods')->cascadeOnDelete()->cascadeOnUpdate();
            $table->float('total_harga', 10,2);
            $table->dateTime('transaction_date');
            $table->enum('status', ['menunggu pembayaran','verifikasi pembayaran', 'diproses', 'dikirim', 'sukses', 'gagal']);
            $table->string('bukti_pembayaran')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropForeign('transactions_id_order_foreign');
            $table->dropForeign('transactions_id_payment_method_foreign');
            $table->dropColumn('id_order');
            $table->dropColumn('id_payment_method');
            $table->dropColumn('total_harga');
            $table->dropColumn('transaction_date');
            $table->dropColumn('status');
            $table->dropColumn('bukti_pembayaran');

            $table->foreignId('id_product');
            $table->foreign('id_product')->references('id')->on('products')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('id_cart');
            $table->foreign('id_cart')->references('id')->on('carts')->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('jumlah');
            $table->integer('jumlah_harga');

        });
    }
};
