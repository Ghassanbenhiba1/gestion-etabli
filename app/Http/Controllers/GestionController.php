<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GestionController extends Controller
{
    public function index()
    {
        // Simuler des données (à remplacer par des requêtes réelles)
        $data = [
            'totalEtudiants' => 245,
            'evolutionEtudiants' => 12, // en pourcentage
            'moyenneGenerale' => 14.2,
            'evolutionMoyenne' => 0.8,
            'tauxAbsence' => 4.3,
            'evolutionAbsence' => -1.1,
            'tauxReussite' => 87,
            'evolutionReussite' => 2,
            'performancesParClasse' => [
                'TSSIR' => 14.3,
                'TSEGT' => 13.8,
                'TIG' => 14.1,
                'TSGE' => 13.9,
            ],
            'absences' => [
                [
                    'nom' => 'Lucas Bernard',
                    'matiere' => 'SVT',
                    'date' => '13/05/2025',
                    'duree' => '1h',
                    'justifiee' => false
                ],
                [
                    'nom' => 'Hugo Leroy',
                    'matiere' => 'Mathématiques',
                    'date' => '22/11/2023',
                    'duree' => '2h',
                    'justifiee' => true
                ]
            ]
        ];

        return view('etudiant.index', compact('data'));
    }
}
