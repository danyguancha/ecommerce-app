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
        Schema::create('productxsale', function (Blueprint $table) {
            $table->id('id_details_sale');
            $table->foreignId('fk_sale_id')->constrained('sales','id_sale');
            $table->foreignId('fk_product_id')->constrained('products','id_product');
            $table->integer('amount');
            $table->double('price');
            $table->double('discount');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productxsale');
    }
};
