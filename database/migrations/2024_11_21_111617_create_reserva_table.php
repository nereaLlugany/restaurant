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
        Schema::create('reserva', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->constrained(table : 'users')->onDelete('cascade');
            $table->foreignId('taula_id')->constrained(table : 'taula')->onDelete('cascade');
            $table->dateTime('hora')->nullable(false);;
            $table->integer('num_guests')->default(1);
            $table->string('estat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reserva');
    }
};
