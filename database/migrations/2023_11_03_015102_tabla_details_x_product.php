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
        Schema::create('details_product', function (Blueprint $table) {
            $table->id('id_detail_product');
            $table->foreignId('fk_product_id')->constrained('products','id_product');
            $table->foreignId('fk_detail_id')->constrained('detailsproduct','id_detail');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('details_product');
    }
};
