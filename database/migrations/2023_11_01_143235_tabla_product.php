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
            $table->id('id_product');
            $table->foreignId('fk_category_id')->constrained('categories', 'id_category');
            $table->string('code');
            $table->string('name');
            $table->string('price');
            $table->integer('stock');
            $table->string('description');
            $table->string('image');
            $table->string('estado');
            $table->string('slug');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
