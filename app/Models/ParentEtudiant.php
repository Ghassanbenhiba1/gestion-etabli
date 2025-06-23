<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParentEtudiant extends Model
{
    protected $table = 'parents';

    protected $fillable = ['nom', 'telephone', 'email', 'etudiant_id'];

    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class);
    }
}
