<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actualite;

class ActualiteController extends Controller
{


    public function showAll()
    {
$actualites = Actualite::latest()->paginate(6); // par exemple 6 par page

        return view('actualites', compact('actualites'));
    }
    public function index()
    {
    $actualites = Actualite::orderBy('created_at', 'desc')->get();
    
        return view('actualites.index', compact('actualites'));
    }

    public function create()
    {
        return view('actualites.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'contenu' => 'required|string',
            'date_publication' => 'nullable|date',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('actualites', 'public'); // storage/app/public/actualites
        }

        Actualite::create([
            'titre' => $request->input('titre'),
            'description' => $request->input('description'),
            'contenu' => $request->input('contenu'),
            'date_publication' => $request->input('date_publication') ?? now()->toDateString(),
            'image' => $imagePath,
        ]);

        return redirect()->back()->with('success', 'Actualité ajoutée avec succès !');
    }


    public function edit($id)
    {
        $actualite = Actualite::findOrFail($id);
        return view('actualites.edit', compact('actualite'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'contenu' => 'required|string',
            'date_publication' => 'required|date',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $actualite = Actualite::findOrFail($id);
        $actualite->titre = $request->input('titre');
        $actualite->description = $request->input('description');
        $actualite->contenu = $request->input('contenu');
        $actualite->date_publication = $request->input('date_publication');

        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si elle existe
            if ($actualite->image) {
                unlink(storage_path('app/public/' . $actualite->image));
            }
            $imagePath = $request->file('image')->store('actualites', 'public');
            $actualite->image = $imagePath;
        }

        $actualite->save();

        return redirect()->route('actualites.index')->with('success', 'Actualité mise à jour avec succès !');
    }

    public function destroy($id)
    {
        $actualite = Actualite::findOrFail($id);
        // Supprimer l'image si elle existe
        if ($actualite->image) {
            unlink(storage_path('app/public/' . $actualite->image));
        }
        $actualite->delete();

        return redirect()->route('actualites.index')->with('success', 'Actualité supprimée avec succès !');
    }

}
