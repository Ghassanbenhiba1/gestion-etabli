<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etudiant;
use Illuminate\Support\Facades\Auth;

class EtudiantLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.etudiantlogin');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'identifiant' => 'required|string',
            'password_plain' => 'required|string',
        ]);

        // Méthode 1: Authentification manuelle (si vous ne voulez pas utiliser le système d'authentification de Laravel)
        $etudiant = Etudiant::where('identifiant', $credentials['identifiant'])
                            ->where('password_plain', $credentials['password_plain'])
                            ->first();

        if (!$etudiant) {
            return back()->withErrors([
                'identifiant' => 'Identifiant ou mot de passe incorrect.',
            ])->onlyInput('identifiant');
        }

        // Stocker l'étudiant en session
        session(['etudiant_id' => $etudiant->id]);

        // Méthode 2: Si vous avez configuré un guard 'etudiant' (recommandé)
        // if (!Auth::guard('etudiant')->attempt($credentials)) {
        //     return back()->withErrors([
        //         'identifiant' => 'Identifiant ou mot de passe incorrect.',
        //     ])->onlyInput('identifiant');
        // }

        $request->session()->regenerate();

        return redirect()->intended(route('etudiant.dashboard'));
    }

    public function logout(Request $request)
    {
        // Méthode 1: Pour l'authentification manuelle
        $request->session()->forget('etudiant_id');
        
        // Méthode 2: Si vous utilisez le guard 'etudiant'
        // Auth::guard('etudiant')->logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}