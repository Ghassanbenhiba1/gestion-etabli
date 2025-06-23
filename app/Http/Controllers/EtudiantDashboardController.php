<?php

// app/Http/Controllers/EtudiantDashboardController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etudiant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EtudiantDashboardController extends Controller
{
    public function index()
    {
        $etudiant = auth('etudiant')->user();
        $etudiant->load(['classe', 'filiere.cours', 'notes.matiere', 'absences', 'parentEtudiant']);

        return view('etudiant.dashboard', compact('etudiant'));
    }

    public function updatePhoto(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $etudiant = auth('etudiant')->user();

        // Supprimer l'ancienne photo si elle existe
        if ($etudiant->photo && Storage::disk('public')->exists($etudiant->photo)) {
            Storage::disk('public')->delete($etudiant->photo);
        }

        // Stocker la nouvelle photo
        $photoPath = $request->file('photo')->store('etudiants/photos', 'public');

        // Mettre à jour l'étudiant
        $etudiant->update(['photo' => $photoPath]);

        return redirect()->back()->with('success', 'Photo de profil mise à jour avec succès !');
    }
}
