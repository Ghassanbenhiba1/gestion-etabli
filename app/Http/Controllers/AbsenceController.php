<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Matiere;
use App\Models\Absence;
use Illuminate\Http\Request;

class AbsenceController extends Controller
{
    public function create($etudiantId)
    {
        $etudiant = Etudiant::findOrFail($etudiantId);
        $matieres = Matiere::all();
        return view('absences.create', compact('etudiant', 'matieres'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'etudiant_id' => 'required|exists:etudiants,id',
            'matiere_id' => 'required|exists:matieres,id',
            'date' => 'required|date',
            'duree' => 'required|numeric',
            'justifiee' => 'required|boolean',
        ]);

        Absence::create($request->only([
            'etudiant_id', 'matiere_id', 'date', 'duree', 'justifiee', 'motif'
        ]));

        return redirect()->route('etudiants.show', $request->etudiant_id);
    }


    public function edit(Absence $absence)
{
    $matieres = Matiere::all();
    return view('absences.edit', compact('absence', 'matieres'));
}

public function update(Request $request, Absence $absence)
{
    $request->validate([
        'matiere_id' => 'required|exists:matieres,id',
        'date' => 'required|date',
        'duree' => 'required|numeric',
        'justifiee' => 'required|boolean',
        'motif' => 'nullable|string',
    ]);

    $absence->update($request->all());
    return redirect()->route('etudiants.show', $absence->etudiant_id);
}

public function destroy(Absence $absence)
{
    $etudiantId = $absence->etudiant_id;
    $absence->delete();
    return redirect()->route('etudiants.show', $etudiantId);
}

}
