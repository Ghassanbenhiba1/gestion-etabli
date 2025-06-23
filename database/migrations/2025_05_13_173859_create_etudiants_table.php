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
        Schema::create('etudiants', function (Blueprint $table) {
    $table->id();
    $table->string('identifiant')->unique(); // Ex: STD2023003
    $table->string('nom');
    $table->string('prenom');
    $table->date('date_naissance');
    $table->string('email')->unique();
    $table->string('telephone');
    $table->string('adresse');
    $table->foreignId('classe_id')->constrained()->onDelete('cascade');
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etudiants');
    }
};
