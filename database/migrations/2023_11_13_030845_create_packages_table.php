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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->text('description');
            $table->string('image');
            $table->float('price_double');
            $table->float('price_triple');
            $table->float('price_quad');
            $table->integer('rating_hotel_makkah')->default(5);
            $table->integer('rating_hotel_madinah')->default(5);
            $table->string('city_tour');
            $table->enum('is_plus', ['yes', 'no']);
            $table->foreign('city_tour')->references('name')->on('list_city_tours')->restrictOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
