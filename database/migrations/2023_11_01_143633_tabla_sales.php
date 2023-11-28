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
        Schema::create('sales', function (Blueprint $table) {
            $table->id('id_sale');
            $table->foreignId('fk_user_id')->constrained('users');
            $table->string('type_voucher');
            $table->string('serie_voucher');
            $table->date('date');
            $table->double('tax');
            $table->double('total');
            $table->string('state');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
