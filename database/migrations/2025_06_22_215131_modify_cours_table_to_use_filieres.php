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
        Schema::table('cours', function (Blueprint $table) {
            // Supprimer l'ancienne colonne filiere (string)
            $table->dropColumn('filiere');
            
            // Ajouter la nouvelle colonne filiere_id (foreign key)
            $table->foreignId('filiere_id')->nullable()->constrained('filieres')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cours', function (Blueprint $table) {
            // Supprimer la nouvelle colonne filiere_id
            $table->dropForeign(['filiere_id']);
            $table->dropColumn('filiere_id');
            
            // Restaurer l'ancienne colonne filiere (string)
            $table->string('filiere')->nullable();
        });
    }
};
