<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $fillable = [
        'name', 'logo', 'image', 'address', 'contact', 'bio', 
        'link_location', 'category'
    ];

    public function menus()
    {
        return $this->hasMany(Menu::class, 'resto_id');
    }

    public function topMenus()
    {
        return $this->hasMany(Menu::class, 'resto_id')
                ->withCount('likes')
                ->orderBy('likes_count', 'desc')
                ->take(3);
    }

    public function operationalHours()
    {
        return $this->hasMany(ROperational::class, 'resto_id');
    }

    public function sliders()
    {
        return $this->hasMany(RSlider::class, 'resto_id');
    }

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'resto_id');
    }
}
