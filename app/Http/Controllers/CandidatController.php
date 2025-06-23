<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\CandidatApprouve;
use App\Mail\CandidatDecline;
use Illuminate\Support\Facades\Mail;
use App\Models\Candidat;
use App\Models\Etudiant;
use App\Models\Classe;
use Illuminate\Support\Facades\Hash;

class CandidatController extends Controller
{
    
   

public function approuver($id)
{
    $candidat = Candidat::findOrFail($id);
    $candidat->statut = 'approuvé';
    $candidat->save();

    Mail::to($candidat->email)->send(new CandidatApprouve($candidat));

    // Rediriger vers le formulaire d'ajout d'étudiant avec les données pré-remplies
    return redirect()->route('etudiants.create', [
        'candidat_id' => $candidat->id,
        'nom' => $candidat->nom,
        'prenom' => $candidat->prenom,
        'email' => $candidat->email,
        'telephone' => $candidat->telephone,
        'adresse' => $candidat->adresse,
        'date_naissance' => $candidat->date_naissance,
        'cin' => $candidat->cin,
        'filiere_id' => $candidat->filiere_id,
    ])->with('success', 'Candidat approuvé. Veuillez compléter les informations pour créer l\'étudiant.');
}

public function decliner($id)
{
    $candidat = Candidat::findOrFail($id);
    $candidat->statut = 'refusé';
    $candidat->save();

    Mail::to($candidat->email)->send(new CandidatDecline($candidat));

    return back()->with('success', 'Candidat décliné et email envoyé.');
}

public function destroy($id)
{
    $candidat = Candidat::findOrFail($id);
    $candidat->delete();

    return back()->with('success', 'Candidature supprimée avec succès.');
}

}
