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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_order');
            $table->foreign('id_order')->references('id')->on('orders')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('id_product');
            $table->foreign('id_product')->references('id')->on('products')->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('quantity');
            $table->float('unit_price', 10,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
