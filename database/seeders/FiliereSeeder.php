<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Filiere;

class FiliereSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $filieres = [
            [
                'titre' => 'Technicien Spécialisé en Développement Informatique',
                'description' => 'Formation complète en développement web et applications',
                'info' => 'Cette filière forme des techniciens spécialisés capables de développer des applications web et mobiles modernes. Les étudiants apprennent les langages de programmation, les frameworks et les outils de développement les plus utilisés dans l\'industrie.',
                'niveau' => 'Bac+2',
                'image_path' => 'filieres/info.jpg'
            ],
            [
                'titre' => 'Technicien Spécialisé en Gestion des Entreprises',
                'description' => 'Formation en gestion administrative et commerciale',
                'info' => 'Cette filière prépare les étudiants aux métiers de la gestion d\'entreprise. Elle couvre la comptabilité, la finance, le marketing, la gestion des ressources humaines et l\'administration des entreprises.',
                'niveau' => 'Bac+2',
                'image_path' => 'filieres/gestion.jpg'
            ],
            [
                'titre' => 'Technicien Spécialisé en Réseaux Informatiques',
                'description' => 'Formation en administration des réseaux et systèmes',
                'info' => 'Cette filière forme des techniciens spécialisés dans l\'administration des réseaux informatiques, la sécurité des systèmes et la maintenance des infrastructures technologiques.',
                'niveau' => 'Bac+2',
                'image_path' => 'filieres/reseau.jpg'
            ],
            [
                'titre' => 'Technicien en Comptabilité',
                'description' => 'Formation en comptabilité et gestion financière',
                'info' => 'Formation spécialisée dans les techniques comptables, la gestion financière et l\'analyse des données financières pour les entreprises.',
                'niveau' => 'Bac',
                'image_path' => null
            ],
            [
                'titre' => 'Technicien en Marketing Digital',
                'description' => 'Formation en marketing en ligne et communication digitale',
                'info' => 'Cette filière forme des spécialistes du marketing digital, de la communication en ligne et de la gestion des réseaux sociaux pour les entreprises.',
                'niveau' => 'Bac',
                'image_path' => null
            ]
        ];

        foreach ($filieres as $filiere) {
            Filiere::create($filiere);
        }
    }
}
