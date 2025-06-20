<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'username',
        'email',
        'password',
        'role',
        'resto_id',
    ];

    protected $hidden = [
        'password',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class, 'resto_id');
    }

    public function scopeSuperAdmin($query)
    {
        return $query->where('role', 'superadmin');
    }

    public function scopeRestaurantAdmin($query)
    {
        return $query->where('role', 'adminresto');
    }

    public function likedMenus()
    {
        return $this->hasMany(LikedMenu::class);
    }

    public function likedMenusRelation()
    {
        return $this->belongsToMany(Menu::class, 'liked_menus', 'user_id', 'menu_id')
                    ->withTimestamps();
    }

    public function hasLikedMenu($menuId): bool
    {
        return $this->likedMenus()->where('menu_id', $menuId)->exists();
    }

    public function getLikedMenusCount(): int
    {
        return $this->likedMenus()->count();
    }

        public function r_sliders()
    {
        return $this->hasMany(RSlider::class);
    }

    public function operational_hours()
    {
        return $this->hasMany(ROperational::class);
    }
}