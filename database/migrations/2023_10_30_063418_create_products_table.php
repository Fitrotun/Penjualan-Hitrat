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
        Schema::create('products', function (Blueprint $table) {
            
                $table->id();
                $table->unsignedBigInteger('id_category');
                $table->foreign('id_category')->references('id')->on('categories')->onDelete('cascade');
                $table->string('image');
                $table->string('name');
                $table->text('description')->nullable(true);
                $table->string('rating');
                $table->unsignedInteger('price')->default(0);
                $table->integer('stok');
                $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table){
            $table->dropColumn('id_category');
        });
    }
};
