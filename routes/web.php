<?php

use App\Http\Controllers\AbsenceController;
use App\Http\Controllers\CoursController;
use App\Http\Controllers\ActualiteController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\FiliereController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Models\Actualite;
use App\Models\Evenement;
use App\Models\Filiere;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CandidatController;
use App\Http\Controllers\ClasseStatsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\GestionController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\EtudiantDashboardController;
use App\Http\Controllers\MatiereController;

/**
 * Page d'accueil
 */


/**
 * Routes d'authentification accessibles uniquement aux invités
 */
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminController;

// Routes de login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('auth.connexion');
Route::post('/login', [LoginController::class, 'login'])->name('auth.inscription');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Routes protégées par le middleware admin
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [DashboardController::class, 'index'])->name('admin.dashboard');
});

Route::delete('/candidats/{id}', [CandidatController::class, 'destroy'])->name('candidats.destroy');
Route::delete('/contacts/{id}', [ContactController::class, 'destroy'])->name('contacts.destroy');

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');


    Route::get('/dashboard/messages', [ContactController::class, 'index'])->name('contact.index');
 
     Route::get('/dashboard/etudiants',[EtudiantController::class, 'index'])->name('etudiants.index');
     Route::resource('etudiants', EtudiantController::class)->only(['index', 'create', 'store', 'show']);

     Route::get('etudiants/{etudiant}/absence/create', [AbsenceController::class, 'create'])->name('absences.create');
    Route::post('absences', [AbsenceController::class, 'store'])->name('absences.store');

    Route::get('etudiants/{etudiant}/note/create', [NoteController::class, 'create'])->name('notes.create');
    Route::post('notes', [NoteController::class, 'store'])->name('notes.store');

    Route::resource('etudiants', EtudiantController::class);



    Route::get('notes/{note}/edit', [NoteController::class, 'edit'])->name('notes.edit');
Route::put('notes/{note}', [NoteController::class, 'update'])->name('notes.update');
Route::delete('notes/{note}', [NoteController::class, 'destroy'])->name('notes.destroy');

Route::get('absences/{absence}/edit', [AbsenceController::class, 'edit'])->name('absences.edit');
Route::put('absences/{absence}', [AbsenceController::class, 'update'])->name('absences.update');
Route::delete('absences/{absence}', [AbsenceController::class, 'destroy'])->name('absences.destroy');



  Route::get('/dashboard/statistiques', [DashboardController::class, 'statistiques'])->name('dashboard.statistiques');
    Route::get('/dashboard/classe/{id}/stats', [ClasseStatsController::class, 'show'])->name('classe.stats');




    // Création filière
    Route::get('/filieres', [FiliereController::class, 'index'])->name('filieres.index');
    Route::get('/filieres/create', [FiliereController::class, 'create'])->name('filieres.create');
    Route::post('/filieres', [FiliereController::class, 'store'])->name('filieres.store');
    
    Route::get('/filieres/{id}/edit', [FiliereController::class, 'edit'])->name('filieres.edit');
    Route::put('/filieres/{id}', [FiliereController::class, 'update'])->name('filieres.update');
    Route::delete('/filieres/{id}', [FiliereController::class, 'destroy'])->name('filieres.destroy');

    
    // Création événement

    Route::get('/evenements', [EvenementController::class, 'index'])->name('evenements.index');
    Route::get('/evenements/create', [EvenementController::class, 'create'])->name('evenements.create');
    Route::post('/evenements', [EvenementController::class, 'store'])->name('evenements.store');
    
    Route::get('/evenements/{id}/edit', [EvenementController::class, 'edit'])->name('evenements.edit');
    Route::put('/evenements/{id}', [EvenementController::class, 'update'])->name('evenements.update');
    Route::delete('/evenements/{id}', [EvenementController::class, 'destroy'])->name('evenements.destroy');
    


    // Création actualité

    Route::resource('actualites', ActualiteController::class);

    // Création cours
Route::get('/cours', [CoursController::class, 'index'])->name('cours.index'); // Liste des cours
Route::get('/cours/create', [CoursController::class, 'create'])->name('cours.create'); // Formulaire de création
Route::post('/cours', [CoursController::class, 'store'])->name('cours.store'); // Enregistrement d'un cours

Route::get('/cours/{id}/edit', [CoursController::class, 'edit'])->name('cours.edit'); // Formulaire d'édition
Route::put('/cours/{id}', [CoursController::class, 'update'])->name('cours.update'); // Mise à jour du cours
Route::delete('/cours/{id}', [CoursController::class, 'destroy'])->name('cours.destroy'); // Suppression du cours

    // Gestion des matières
    Route::get('/matieres', [MatiereController::class, 'index'])->name('matieres.index');
    Route::get('/matieres/create', [MatiereController::class, 'create'])->name('matieres.create');
    Route::post('/matieres', [MatiereController::class, 'store'])->name('matieres.store');
    Route::get('/matieres/{id}/edit', [MatiereController::class, 'edit'])->name('matieres.edit');
    Route::put('/matieres/{id}', [MatiereController::class, 'update'])->name('matieres.update');
    Route::delete('/matieres/{id}', [MatiereController::class, 'destroy'])->name('matieres.destroy');
    
});



////////////////////////////////////











Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/home/filiere', [FiliereController::class, 'showAll'])->name('filiere.page');
Route::get('/home/evenements', [EvenementController::class, 'showAll'])->name('evenements.page');
Route::get('/home/actualites', [ActualiteController::class, 'showAll'])->name('actualites.page');



Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');








Route::get('/evenements', [EvenementController::class, 'index'])->name('evenements.index');
Route::get('/actualites', [ActualiteController::class, 'index'])->name('actualites.index');







use App\Http\Controllers\InscriptionController;

// Formulaire d'inscription
Route::get('/home/inscription', [InscriptionController::class, 'create'])->name('inscription.create');

// Traitement du formulaire
Route::post('/home/inscription', [InscriptionController::class, 'store'])->name('inscription.store');

// Page de succès après inscription
Route::get('/home/inscription/success', function () {
    return view('inscription.success');
})->name('inscription.success');






Route::get('/candidat', [InscriptionController::class, 'index'])->name('candidat');


Route::post('/candidats/{id}/approuver', [CandidatController::class, 'approuver'])->name('candidats.approuver');
Route::post('/candidats/{id}/decliner', [CandidatController::class, 'decliner'])->name('candidats.decliner');


















use App\Http\Controllers\EtudiantLoginController;

// Formulaire de connexion étudiant
Route::get('/etudiant/login', [EtudiantLoginController::class, 'showLoginForm'])->name('etudiantlogin');

// Traitement du login étudiant
Route::post('/etudiant/login', [EtudiantLoginController::class, 'login'])->name('etudiantlogin.submit');

// Déconnexion étudiant
Route::post('/etudiant/logout', [EtudiantLoginController::class, 'logout'])->name('etudiantlogout');

// Tableau de bord étudiant (protégé par middleware custom si tu veux)
// routes/web.php


Route::get('/etudiant/dashboard', [EtudiantDashboardController::class, 'index'])
    ->name('etudiant.dashboard');

// Route pour mettre à jour la photo de profil de l'étudiant
Route::post('/etudiant/update-photo', [EtudiantDashboardController::class, 'updatePhoto'])
    ->name('etudiant.update-photo');

