<?php

namespace App\Http\Controllers;

use App\Models\Matiere;
use App\Models\Filiere;
use Illuminate\Http\Request;

class MatiereController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $matieres = Matiere::with('filiere')->orderBy('nom')->get();
        return view('matieres.index', compact('matieres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $filieres = Filiere::orderBy('titre')->get();
        return view('matieres.create', compact('filieres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'filiere_id' => 'required|exists:filieres,id',
        ]);

        Matiere::create($request->only(['nom', 'filiere_id']));

        return redirect()->route('matieres.index')->with('success', 'Matière ajoutée avec succès !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $matiere = Matiere::findOrFail($id);
        $filieres = Filiere::orderBy('titre')->get();
        return view('matieres.edit', compact('matiere', 'filieres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'filiere_id' => 'required|exists:filieres,id',
        ]);

        $matiere = Matiere::findOrFail($id);
        $matiere->update($request->only(['nom', 'filiere_id']));

        return redirect()->route('matieres.index')->with('success', 'Matière mise à jour avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $matiere = Matiere::findOrFail($id);
            
            // Vérifier s'il y a des notes ou absences liées
            if ($matiere->notes()->count() > 0 || $matiere->absences()->count() > 0) {
                return redirect()->route('matieres.index')
                    ->with('error', 'Impossible de supprimer cette matière car elle est utilisée dans des notes ou absences.');
            }

            $matiere->delete();
            return redirect()->route('matieres.index')->with('success', 'Matière supprimée avec succès !');
        } catch (\Exception $e) {
            return redirect()->route('matieres.index')
                ->with('error', 'Erreur lors de la suppression de la matière : ' . $e->getMessage());
        }
    }
}
