<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // definir les proprietes de la table categories
    protected $fillable = ['id','name','description'];
}
