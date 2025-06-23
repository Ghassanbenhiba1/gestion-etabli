<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Matiere;
use App\Models\Filiere;

class MatiereSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Récupérer les filières existantes
        $filieres = Filiere::all();

        foreach ($filieres as $filiere) {
            $matieres = [];

            // Matières pour la filière Développement Informatique
            if (str_contains(strtolower($filiere->titre), 'développement informatique')) {
                $matieres = [
                    'Programmation Web',
                    'Base de données',
                    'Développement Mobile',
                    'Frameworks Web',
                    'Sécurité informatique',
                    'Gestion de projet',
                    'Mathématiques',
                    'Anglais technique'
                ];
            }
            // Matières pour la filière Gestion des Entreprises
            elseif (str_contains(strtolower($filiere->titre), 'gestion des entreprises')) {
                $matieres = [
                    'Comptabilité générale',
                    'Gestion financière',
                    'Marketing',
                    'Gestion des ressources humaines',
                    'Droit des affaires',
                    'Économie',
                    'Mathématiques financières',
                    'Anglais commercial'
                ];
            }
            // Matières pour la filière Réseaux Informatiques
            elseif (str_contains(strtolower($filiere->titre), 'réseaux informatiques')) {
                $matieres = [
                    'Administration des réseaux',
                    'Sécurité des systèmes',
                    'Infrastructure réseau',
                    'Virtualisation',
                    'Cloud computing',
                    'Maintenance informatique',
                    'Mathématiques',
                    'Anglais technique'
                ];
            }
            // Matières pour la filière Comptabilité
            elseif (str_contains(strtolower($filiere->titre), 'comptabilité')) {
                $matieres = [
                    'Comptabilité générale',
                    'Comptabilité analytique',
                    'Fiscalité',
                    'Audit comptable',
                    'Gestion financière',
                    'Droit fiscal',
                    'Mathématiques financières',
                    'Informatique comptable'
                ];
            }
            // Matières pour la filière Marketing Digital
            elseif (str_contains(strtolower($filiere->titre), 'marketing digital')) {
                $matieres = [
                    'Marketing digital',
                    'Communication en ligne',
                    'Gestion des réseaux sociaux',
                    'SEO/SEA',
                    'E-commerce',
                    'Analytics web',
                    'Design graphique',
                    'Anglais marketing'
                ];
            }

            // Créer les matières pour cette filière
            foreach ($matieres as $matiere) {
                Matiere::create([
                    'nom' => $matiere,
                    'filiere_id' => $filiere->id
                ]);
            }
        }
    }
}
