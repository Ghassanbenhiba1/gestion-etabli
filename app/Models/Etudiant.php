<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // Important pour login
use Illuminate\Notifications\Notifiable;

class Etudiant extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'identifiant',
        'nom',
        'prenom',
        'date_naissance',
        'email',
        'telephone',
        'adresse',
        'photo',
        'classe_id',
        'filiere_id',
        'password',
    ];

    protected $hidden = [
        'password', // pour cacher lors de la serialization
    ];

    /**
     * Get the name of the unique identifier for the user.
     *
     * @return string
     */
    public function getAuthIdentifierName()
    {
        return 'identifiant';
    }

    /**
     * Get the column name for the "username" for authentication.
     *
     * @return string
     */
    public function username()
    {
        return 'identifiant';
    }

    /**
     * Relations
     */
    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }

    public function filiere()
    {
        return $this->belongsTo(Filiere::class);
    }

    public function parentEtudiant()
    {
        return $this->hasOne(ParentEtudiant::class);
    }

    public function absences()
    {
        return $this->hasMany(Absence::class);
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }
}
