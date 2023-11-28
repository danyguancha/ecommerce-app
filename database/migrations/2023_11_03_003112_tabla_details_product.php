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
        Schema::create('detailsproduct', function (Blueprint $table) {
            $table->id('id_detail');
            $table->string('ram');
            $table->string('internal_storage');
            $table->string('battery');
            $table->string('main_camera');
            $table->string('front_camera');
            $table->string('display');
            $table->string('processor');
            $table->string('conetivity');
            $table->string('colors');
            $table->string('operating_system');
            $table->string('dimensions');
            $table->string('weight');
            $table->string('model');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detailsproduct');
    }
};
