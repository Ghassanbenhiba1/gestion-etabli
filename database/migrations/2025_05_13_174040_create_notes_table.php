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
        Schema::create('notes', function (Blueprint $table) {
    $table->id();
    $table->foreignId('etudiant_id')->constrained()->onDelete('cascade');
    $table->foreignId('matiere_id')->constrained()->onDelete('cascade');
    $table->float('note', 5, 2); // sur 20
    $table->float('coefficient')->default(1);
    $table->date('date');
    $table->text('description')->nullable();
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notes');
    }
};
