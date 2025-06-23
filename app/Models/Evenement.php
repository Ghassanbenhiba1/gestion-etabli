<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evenement extends Model
{
    use HasFactory;
protected $casts = [
    'date_event' => 'datetime',
];

    protected $fillable = [
        'titre',
        'description',
        'infos',
        'date_event',
        'heure_debut',
        'heure_fin',
        'image',
    ];
}
