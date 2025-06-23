<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Filiere;

// app/Http/Controllers/FiliereController.php



class FiliereController extends Controller
{

    public function showAll()
{
    $filieres = Filiere::orderBy('created_at', 'desc')->get();

    return view('filiere', compact('filieres'));
}



    public function index()
{
    $filieres = Filiere::orderBy('created_at', 'desc')->get();
    return view('filieres.index', compact('filieres'));
}

    public function create()
    {
        $niveaux = ['Bac', 'Bac+2', 'Bac+3', 'Bac+5'];
        return view('filieres.create', compact('niveaux'));
    }

    public function store(Request $request)
    {       

        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'info' => 'required|string',
            'niveau' => 'required|string',
'image_path' => 'nullable|image|max:2048',
        ]);
    
        $imagePath = null;
    
        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('filieres', 'public'); // stocke dans storage/app/public/filieres
        }
    
        Filiere::create([
            'titre' => $request->input('titre'),
            'description' => $request->input('description'),
            'info' => $request->input('info'),
            'niveau' => $request->input('niveau'),
            'image_path' => $imagePath,
        ]);
    
        return redirect()->route('filieres.index')->with('success', 'Filière ajoutée avec succès !');
    }


    public function edit($id)
{
    $filiere = Filiere::findOrFail($id);
    $niveaux = ['Bac', 'Bac+2', 'Bac+3', 'Bac+5'];
    return view('filieres.edit', compact('filiere', 'niveaux'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'titre' => 'required|string|max:255',
        'description' => 'required|string',
        'info' => 'required|string',
        'niveau' => 'required|string',
        'image_path' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
    ]);

    $filiere = Filiere::findOrFail($id);

    if ($request->hasFile('image_path')) {
        $imagePath = $request->file('image_path')->store('filieres', 'public');
        $filiere->image_path = $imagePath;
    }

    $filiere->update([
        'titre' => $request->input('titre'),
        'description' => $request->input('description'),
        'info' => $request->input('info'),
        'niveau' => $request->input('niveau'),
        'image_path' => $filiere->image_path,
    ]);

    return redirect()->route('filieres.index')->with('success', 'Filière mise à jour avec succès !');
}

public function destroy($id)
{
    $filiere = Filiere::findOrFail($id);
    $filiere->delete();

    return redirect()->route('filieres.index')->with('success', 'Filière supprimée avec succès !');
}


}