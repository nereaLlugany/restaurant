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
        Schema::create('comanda', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->constrained(table : 'users')->onDelete('cascade');
            $table->foreignId('menu_id')->constrained(table : 'menu')->onDelete('cascade');
            $table->integer('quantitat');
            $table->decimal('preu_total', 8, 2);
            $table->string('estat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comanda');
    }
};
