<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ContactController extends Controller
{
    // Affiche les messages avec filtres (par nom et date uniquement)
    public function index(Request $request)
    {
        $query = Contact::query();

        // Filtre par nom
        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }

        // Filtre par date
        switch ($request->input('date')) {
            case "Aujourd'hui":
                $query->whereDate('created_at', Carbon::today());
                break;
            case "Cette semaine":
                $query->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
                break;
            case "Ce mois":
                $query->whereMonth('created_at', Carbon::now()->month);
                break;
        }

        $messages = $query->latest()->paginate(30)->withQueryString();

        return view('message', compact('messages'));
    }

    // Affiche la page de contact
    public function create()
    {
        return view('contact');
    }

    // Enregistre les données envoyées par le formulaire
    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        // Enregistrement en base de données
        Contact::create($request->all());

        return redirect()->route('contact.create')->with('success', 'Message envoyé avec succès.');
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return back()->with('success', 'Message supprimé avec succès.');
    }
}
