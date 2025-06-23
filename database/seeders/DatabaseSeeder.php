<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Utilisateur;
use App\Models\Classe;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
        ]);

        Utilisateur::create([
            'nom' => 'Admin',
            'email' => 'admin@admin.com',
            'mot_de_passe' => Hash::make('password'),
            'role' => 'admin',
        ]);

        Classe::create(['nom' => 'DEV 201']);
        Classe::create(['nom' => 'DEV 202']);
        Classe::create(['nom' => 'DEV 101']);
        Classe::create(['nom' => 'GC 101']);
        Classe::create(['nom' => 'GC 201']);
    }
}
