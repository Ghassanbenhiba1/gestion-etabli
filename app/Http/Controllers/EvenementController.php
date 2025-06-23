<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Evenement;

class EvenementController extends Controller
{
    public function showAll()
    {
        $evenements = Evenement::orderBy('created_at', 'desc')->get();
        return view('evenements', compact('evenements'));
    }

    public function index()
    {
        $evenements = Evenement::orderBy('created_at', 'desc')->get();
        return view('evenements.index', compact('evenements'));
    }

    public function create()
    {
        return view('evenements.create');
    }

    public function store(Request $request)
    {
        // Normalisation des heures au format H:i
        $request->merge([
            'heure_debut' => date('H:i', strtotime($request->heure_debut)),
            'heure_fin' => date('H:i', strtotime($request->heure_fin)),
        ]);

        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'infos' => 'required|string',
            'date_event' => 'required|date|after_or_equal:today',
            'heure_debut' => 'required|date_format:H:i',
            'heure_fin' => [
                'required',
                'date_format:H:i',
                function ($attribute, $value, $fail) use ($request) {
                    if (strtotime($value) <= strtotime($request->heure_debut)) {
                        $fail('L\'heure de fin doit être après l\'heure de début.');
                    }
                },
            ],
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('evenements', 'public');
        }

        Evenement::create([
            'titre' => $request->titre,
            'description' => $request->description,
            'infos' => $request->infos,
            'date_event' => $request->date_event,
            'heure_debut' => $request->heure_debut,
            'heure_fin' => $request->heure_fin,
            'image' => $imagePath,
        ]);

        return redirect()->route('evenements.index')->with('success', 'Événement ajouté avec succès !');
    }

    public function edit($id)
    {
        $evenement = Evenement::findOrFail($id);
        return view('evenements.edit', compact('evenement'));
    }

    public function update(Request $request, $id)
    {
        // Normalisation des heures
        $request->merge([
            'heure_debut' => date('H:i', strtotime($request->heure_debut)),
            'heure_fin' => date('H:i', strtotime($request->heure_fin)),
        ]);

        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'infos' => 'required|string',
            'date_event' => 'required|date|after_or_equal:today',
            'heure_debut' => 'required|date_format:H:i',
            'heure_fin' => [
                'required',
                'date_format:H:i',
                function ($attribute, $value, $fail) use ($request) {
                    if (strtotime($value) <= strtotime($request->heure_debut)) {
                        $fail('L\'heure de fin doit être après l\'heure de début.');
                    }
                },
            ],
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $evenement = Evenement::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($evenement->image) {
                Storage::delete('public/' . $evenement->image);
            }
            $evenement->image = $request->file('image')->store('evenements', 'public');
        }

        $evenement->update([
            'titre' => $request->titre,
            'description' => $request->description,
            'infos' => $request->infos,
            'date_event' => $request->date_event,
            'heure_debut' => $request->heure_debut,
            'heure_fin' => $request->heure_fin,
            'image' => $evenement->image,
        ]);

        return redirect()->route('evenements.index')->with('success', 'Événement mis à jour avec succès !');
    }

    public function destroy($id)
    {
        $evenement = Evenement::findOrFail($id);

        if ($evenement->image) {
            Storage::delete('public/' . $evenement->image);
        }

        $evenement->delete();

        return redirect()->route('evenements.index')->with('success', 'Événement supprimé avec succès !');
    }
}
