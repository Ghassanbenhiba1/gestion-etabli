<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cours extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'filiere_id',
        'annee',
        'pdf_path',
    ];

    public function filiere()
    {
        return $this->belongsTo(Filiere::class);
    }
}
