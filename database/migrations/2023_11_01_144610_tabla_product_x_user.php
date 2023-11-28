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
        Schema::create('productxuser', function (Blueprint $table) {
            $table->id('id_productxuser');
            $table->foreignId('fk_product_id')->constrained('products','id_product');
            $table->foreignId('fk_user_id')->constrained('users');
            $table->date('date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productxuser');
    }
};
