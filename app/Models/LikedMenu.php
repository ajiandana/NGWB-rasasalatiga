<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LikedMenu extends Model
{
    protected $table = 'liked_menu';

    protected $fillable = [
        'session',
        'menu_id',
    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }
}
