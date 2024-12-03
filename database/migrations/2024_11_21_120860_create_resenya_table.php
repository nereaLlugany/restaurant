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
        Schema::create('resenya', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->constrained(table : 'users')->onDelete('cascade'); 
            $table->foreignId('menu_id')->nullable()->constrained(table :'menu')->onDelete('cascade'); 
            $table->text('comentari_en');
            $table->text('comentari_ca');
            $table->text('comentari_es');
            $table->text('comentari_fr');
            $table->text('comentari_de');
            $table->text('comentari_it');
            $table->integer('puntuacio'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resenya');
    }
};
