<?php

namespace App\Http\Controllers\Auth;
use App\Models\Utilisateur;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.connexion');
    }

    public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'mot_de_passe' => 'required'
    ]);

    // Laravel vérifiera automatiquement le hachage si vous utilisez le bon nom de champ
    if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['mot_de_passe']])) {
        if (Auth::user()->isAdmin()) {
            return redirect()->route('admin.dashboard');
        } else {
            Auth::logout();
            return redirect()->back()->with('error', 'Accès réservé aux administrateurs.');
        }
    }

    return back()->withErrors(['email' => 'Identifiants invalides']);
}

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}
