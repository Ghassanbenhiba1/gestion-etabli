<?php

namespace App\Http\Controllers;

use App\Models\Filiere;
use App\Models\Actualite;
use App\Models\Evenement;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Récupérer 3 filières
        $filieres = Filiere::orderBy('created_at', 'desc')->take(3)->get();
        
        // Récupérer 3 actualités
$actualites = Actualite::whereNotNull('date_publication')
                       ->where('date_publication', '<=', now())
                       ->orderBy('date_publication', 'desc')
                       ->take(3)
                       ->get();

        
        // Récupérer 3 événements à venir
  $evenements = Evenement::where('date_event', '>=', now())
                        ->orderBy('date_event', 'asc')
                        ->take(3)
                        ->get();

if ($evenements->isEmpty()) {
    $evenements = Evenement::orderBy('date_event', 'desc')
                           ->take(3)
                           ->get();
}

        
        return view('home', compact('filieres', 'actualites', 'evenements'));
    }
}