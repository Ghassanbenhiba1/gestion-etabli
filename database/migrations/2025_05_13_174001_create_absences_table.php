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
        Schema::create('absences', function (Blueprint $table) {
    $table->id();
    $table->foreignId('etudiant_id')->constrained()->onDelete('cascade');
    $table->foreignId('matiere_id')->constrained()->onDelete('cascade');
    $table->date('date');
    $table->integer('duree'); // en heures
    $table->boolean('justifiee')->default(false);
    $table->text('motif')->nullable();
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absences');
    }
};
