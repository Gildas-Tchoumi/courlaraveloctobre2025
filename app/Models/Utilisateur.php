<?php

namespace App\Models;

use App\Models\Role;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Utilisateur extends Model
{
    //
    protected $fillable = [
        'firstname',
        'lastname',
        'sexe',
        'email',
        'password',
    ];

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'role_utilisateurs', 'utilisateur_id', 'role_id');
    }
}
