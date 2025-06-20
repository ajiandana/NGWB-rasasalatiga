<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menus';
    protected $fillable = [
        'resto_id',
        'name',
        'description',
        'image',
        'category'
    ];

    
}
