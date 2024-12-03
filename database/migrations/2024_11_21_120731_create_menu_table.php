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
        Schema::create('menu', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->decimal('preu_total', 8, 2);
            $table->text('ingredients_en');
            $table->text('ingredients_ca');
            $table->text('ingredients_es');
            $table->text('ingredients_fr');
            $table->text('ingredients_de');
            $table->text('ingredients_it');
            $table->boolean('estat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu');
    }
};
