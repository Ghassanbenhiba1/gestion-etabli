<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use Illuminate\Http\Request;

class ClasseStatsController extends Controller
{
    public function show($id)
{
    $classe = Classe::with('etudiants.notes.matiere', 'etudiants.absences')->findOrFail($id);

    // Moyenne par matière (pondérée avec coefficient dans notes)
    $matieres = $classe->etudiants->flatMap(function ($etudiant) {
        return $etudiant->notes;
    })->groupBy('matiere.nom')->map(function ($notes) {
        $total = $notes->sum(function ($note) {
            return $note->note * $note->coefficient;
        });

        $coeffTotal = $notes->sum('coefficient');

        return $coeffTotal > 0 ? round($total / $coeffTotal, 2) : 0;
    });

    // Étudiants les plus performants (moyenne pondérée)
    $topEtudiants = $classe->etudiants->map(function ($etudiant) {
        $notes = $etudiant->notes;

        $total = $notes->sum(function ($note) {
            return $note->note * $note->coefficient;
        });

        $coeffTotal = $notes->sum('coefficient');

        $moyenne = $coeffTotal > 0 ? round($total / $coeffTotal, 2) : 0;

        return ['nom' => $etudiant->nom, 'moyenne' => $moyenne];
    })->sortByDesc('moyenne')->take(3);

    // Étudiants les plus absents
    $absents = $classe->etudiants->map(function ($etudiant) {
        return ['nom' => $etudiant->nom, 'absences' => $etudiant->absences->count()];
    })->sortByDesc('absences')->take(3);

    return view('admin.detail', compact('classe', 'matieres', 'topEtudiants', 'absents'));
}


}
