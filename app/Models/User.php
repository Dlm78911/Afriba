<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $table = 'users'; // table utilisée

    protected $fillable = [
        'nom_complet',
        'telephone',
        'email',
        'mot_de_passe',
        'role',
        'pays_id',
        'ville',
        'commune',
        'shop',
        'location',
        'social',
    ];

    protected $hidden = [
        'mot_de_passe',
    ];

    // si tu veux gérer les relations avec pays
    public function pays()
    {
        return $this->belongsTo(Pays::class);
    }
}
