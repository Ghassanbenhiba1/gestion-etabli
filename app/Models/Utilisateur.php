<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Utilisateur extends Authenticatable
{
    use HasFactory;

    protected $table = 'utilisateurs';

    protected $fillable = ['nom', 'email', 'mot_de_passe', 'role'];

    protected $hidden = ['mot_de_passe', 'remember_token'];

    protected $authPasswordName = 'mot_de_passe'; // ✅ ligne cruciale

    public function isAdmin()
    {
        return $this->role === 'admin';
    }
}
