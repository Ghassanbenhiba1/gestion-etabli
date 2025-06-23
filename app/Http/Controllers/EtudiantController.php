<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Classe;
use App\Models\Filiere;
use App\Models\ParentEtudiant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EtudiantController extends Controller
{
    public function index(Request $request)
    {
        $query = Etudiant::with('classe');

        if ($request->filled('identifiant')) {
            $query->where('identifiant', 'like', '%' . $request->identifiant . '%');
        }

        if ($request->filled('classe_id')) {
            $query->where('classe_id', $request->classe_id);
        }

        $etudiants = $query->paginate(30); // Tu peux ajuster le nombre par page ici
        $classes = Classe::all();

        return view('etudiants.index', compact('etudiants', 'classes'));
    }

    public function create(Request $request)
    {
        $classes = Classe::all();
        $filieres = Filiere::all();
        
        // Récupérer les données du candidat si elles sont passées en paramètres
        $candidatData = [
            'candidat_id' => $request->get('candidat_id'),
            'nom' => $request->get('nom'),
            'prenom' => $request->get('prenom'),
            'email' => $request->get('email'),
            'telephone' => $request->get('telephone'),
            'adresse' => $request->get('adresse'),
            'date_naissance' => $request->get('date_naissance'),
            'cin' => $request->get('cin'),
        ];
        
        return view('etudiants.create', compact('classes', 'filieres', 'candidatData'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'identifiant' => 'required|unique:etudiants',
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'date_naissance' => 'required|date',
            'email' => 'required|email|unique:etudiants',
            'telephone' => 'required|string|max:20',
            'adresse' => 'required|string|max:255',
            'classe_id' => 'required|exists:classes,id',
            'filiere_id' => 'required|exists:filieres,id',

            'parent_nom' => 'required|string|max:255',
            'parent_email' => 'required|email|unique:parents,email',
            'parent_telephone' => 'required|string|max:20',
        ]);

        // 🔐 Génération d'un mot de passe simple (ex: 2006-07-10 => 10072006)
        $date = $validated['date_naissance'];
        $password_plain = date('dmY', strtotime($date));

        // ✅ Hash du mot de passe pour stockage sécurisé
        $password_hashed = Hash::make($password_plain);

        $etudiant = Etudiant::create([
            'identifiant' => $validated['identifiant'],
            'nom' => $validated['nom'],
            'prenom' => $validated['prenom'],
            'date_naissance' => $validated['date_naissance'],
            'email' => $validated['email'],
            'telephone' => $validated['telephone'],
            'adresse' => $validated['adresse'],
            'classe_id' => $validated['classe_id'],
            'filiere_id' => $validated['filiere_id'],
            'password' => $password_hashed,
        ]);

        ParentEtudiant::create([
            'etudiant_id' => $etudiant->id,
            'nom' => $validated['parent_nom'],
            'email' => $validated['parent_email'],
            'telephone' => $validated['parent_telephone'],
        ]);

        // ✅ Affiche un message ou envoie par email si tu veux
        return redirect()->route('etudiants.index')
            ->with('success', 'Étudiant créé avec succès ! Mot de passe (basé sur la date de naissance) : ' . $password_plain);
    }


    public function show($id)
    {
        $etudiant = Etudiant::with(['classe', 'filiere', 'parentEtudiant', 'notes.matiere', 'absences.matiere'])->findOrFail($id);
        return view('etudiants.show', compact('etudiant'));
    }

    public function edit($id)
    {
        $etudiant = Etudiant::with('parentEtudiant', 'classe', 'filiere')->findOrFail($id);
        $classes = Classe::all(); // Pour afficher la liste des classes dans le formulaire
        $filieres = Filiere::all(); // Pour afficher la liste des filières dans le formulaire
        return view('etudiants.edit', compact('etudiant', 'classes', 'filieres'));
    }


    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'identifiant' => 'required|string|max:50|unique:etudiants,identifiant,' . $id,
            'email' => 'nullable|email',
            'telephone' => 'nullable|string|max:20',
            'adresse' => 'nullable|string|max:255',
            'date_naissance' => 'nullable|date',
            'classe_id' => 'required|exists:classes,id',
            'filiere_id' => 'required|exists:filieres,id',
        ]);

        $etudiant = Etudiant::findOrFail($id);
        $etudiant->fill($validated);

        // Si la date de naissance est modifiée, on met à jour le mot de passe
        if ($request->has('date_naissance') && $etudiant->isDirty('date_naissance')) {
            $date = $validated['date_naissance'];
            $password_plain = date('dmY', strtotime($date));
            $etudiant->password = Hash::make($password_plain);
        }

        $etudiant->save();

        $message = 'Étudiant mis à jour avec succès.';
        if ($etudiant->wasChanged('password')) {
            $message .= ' Le mot de passe a été mis à jour.';
        }

        return redirect()->route('etudiants.show', $etudiant->id)
            ->with('success', $message);
    }




    public function destroy($id)
    {
        $etudiant = Etudiant::findOrFail($id);

        // Supprimer aussi les données associées si nécessaire
        if ($etudiant->parentEtudiant) {
            $etudiant->parentEtudiant->delete();
        }

        $etudiant->delete();

        return redirect()->route('etudiants.index')->with('success', 'Étudiant supprimé avec succès.');
    }

}
