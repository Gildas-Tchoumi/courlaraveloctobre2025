<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //

    protected $fillable = [
        'code',
        'name',
        'images',
        'price',
        'quantity',
        'description',
        'category_id',
    ];
}
