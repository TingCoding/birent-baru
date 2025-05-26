<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('Name');
            $table->string('Subtitle');
            $table->integer('Passengers');
            $table->integer('Seats');
            $table->integer('Bags');
            $table->integer('Luggages');
            $table->integer('Price');
            $table->text('Description');
            $table->string('Photo');
            $table->foreignId('CategoryId')->references('id')->on('categories');
            $table->string('CategoryName');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
