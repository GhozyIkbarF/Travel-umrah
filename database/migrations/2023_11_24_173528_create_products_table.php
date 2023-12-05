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
            $table->date('date');
            $table->string('image');
            $table->unsignedBiginteger('maskapai');
            $table->float('price_double');
            $table->float('price_triple');
            $table->float('price_quad');
            $table->unsignedBiginteger('hotel_makkah');
            $table->unsignedBiginteger('hotel_madinah');
            $table->integer('rating_hotel_plus')->default(5)->nullable();
            $table->integer('kuota');
            $table->unsignedBigInteger('package_id');
            $table->foreign('maskapai')->references('id')->on('maskapais')->restrictOnDelete();
            $table->foreign('hotel_makkah')->references('id')->on('hotels')->restrictOnDelete();
            $table->foreign('hotel_madinah')->references('id')->on('hotels')->restrictOnDelete();
            $table->foreign('package_id')->references('id')->on('packages')->restrictOnDelete();
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
