<?php

namespace App\Http\Controllers;
use App\Models\Filiere;
use App\Models\Evenement;
use App\Models\Actualite;
use App\Models\Cours;
use Illuminate\Http\Request;
use App\Models\Candidat;
use App\Models\Contact;
use App\Models\Classe;



class DashboardController extends Controller
{


public function index()
{
    $nbFilieres = Filiere::count();
    $nbEvenements = Evenement::count();
    $nbActualites = Actualite::count();
    $nbCours = Cours::count();
    $candidats = Candidat::latest()->get();
    $messages = Contact::latest()->take(5)->get(); // les 5 derniers messages
    $nbMessages = Contact::count(); 

    // Données supplémentaires pour les descriptions si besoin
    $nouveauxCours = Cours::where('created_at', '>=', now()->subWeek())->count();
    $filieresSemaine = Filiere::where('created_at', '>=', now()->subWeek())->count();
    $evenementsAVenir = Evenement::where('date_event', '>=', now())->count();
    $actualitesMois = Actualite::where('created_at', '>=', now()->subMonth())->count();

    return view('admin.dash', compact(
        'nbFilieres', 'filieresSemaine',
        'nbEvenements', 'evenementsAVenir',
        'nbActualites', 'actualitesMois',
        'nbCours', 'nouveauxCours' ,'candidats','messages', 'nbMessages'
    ));
}




public function statistiques()
{
    $stats = [];

    $classes = Classe::with(['etudiants.notes', 'etudiants.absences'])->get();

    foreach ($classes as $classe) {
        $notes = $classe->etudiants->flatMap(function ($etudiant) {
            return $etudiant->notes->pluck('note');
        })->filter();

        $absences = $classe->etudiants->map(function ($etudiant) {
            return $etudiant->absences->count();
        });

        $stats[] = [
            'classe_id' => $classe->id, // 🔧 Clé ajoutée ici
            'classe' => $classe->nom,
            'moyenne_notes' => round($notes->avg(), 2) ?? 0,
            'moyenne_absences' => round($absences->avg(), 2) ?? 0,
        ];
    }

    return view('admin.statistique', compact('stats'));
}






}
