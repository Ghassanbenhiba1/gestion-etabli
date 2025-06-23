<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Matiere;
use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function create($etudiantId)
    {
        $etudiant = Etudiant::with('filiere')->findOrFail($etudiantId);
        
        // Filtrer les matières selon la filière de l'étudiant
        $matieres = Matiere::where('filiere_id', $etudiant->filiere_id)->orderBy('nom')->get();
        
        return view('notes.create', compact('etudiant', 'matieres'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'etudiant_id' => 'required|exists:etudiants,id',
            'matiere_id' => 'required|exists:matieres,id',
            'note' => 'required|numeric|min:0|max:20',
            'coefficient' => 'required|numeric|min:0',
            'date' => 'required|date',
            'description' => 'nullable|string',
        ]);

        Note::create($request->only([
            'etudiant_id', 'matiere_id', 'note', 'coefficient', 'date', 'description'
        ]));

        return redirect()->route('etudiants.show', $request->etudiant_id);
    }

    public function edit(Note $note)
    {
        $note->load('etudiant.filiere');
        
        // Filtrer les matières selon la filière de l'étudiant
        $matieres = Matiere::where('filiere_id', $note->etudiant->filiere_id)->orderBy('nom')->get();
        
        return view('notes.edit', compact('note', 'matieres'));
    }

    public function update(Request $request, Note $note)
    {
        $request->validate([
            'note' => 'required|numeric|min:0|max:20',
            'coefficient' => 'required|numeric|min:0',
            'date' => 'required|date',
            'description' => 'nullable|string',
            'matiere_id' => 'required|exists:matieres,id',
        ]);

        $note->update($request->all());
        return redirect()->route('etudiants.show', $note->etudiant_id);
    }

    public function destroy(Note $note)
    {
        $etudiantId = $note->etudiant_id;
        $note->delete();
        return redirect()->route('etudiants.show', $etudiantId);
    }
}

