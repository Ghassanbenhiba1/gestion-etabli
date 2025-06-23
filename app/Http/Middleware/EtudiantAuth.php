<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EtudiantAuth
{
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('etudiant_id')) {
            return redirect()->route('etudiant.login')->with('error', 'Veuillez vous connecter.');
        }

        return $next($request);
    }
}
