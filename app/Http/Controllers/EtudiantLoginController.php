<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etudiant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
            'password' => 'required|string',
        ]);

        $etudiant = Etudiant::where('identifiant', $credentials['identifiant'])->first();

        if ($etudiant && Hash::check($credentials['password'], $etudiant->password)) {
            Auth::guard('etudiant')->login($etudiant);

            $request->session()->regenerate();

            return redirect()->intended(route('etudiant.dashboard'));
        }

        return back()->withErrors([
            'identifiant' => 'Identifiant ou mot de passe incorrect.',
        ])->onlyInput('identifiant');
    }

    public function logout(Request $request)
    {
        Auth::guard('etudiant')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}