<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menus'; 
    protected $fillable = [
        'category', 'resto_id', 'name', 'description', 'image'
    ];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class, 'resto_id');
    }

    public function likedByUsers()
    {
        return $this->hasMany(LikedMenu::class);
    }

    public function usersWhoLiked()
    {
        return $this->belongsToMany(User::class, 'liked_menus', 'menu_id', 'user_id')
                    ->withTimestamps();
    }

    public function getLikesCount()
    {
        return $this->likedByUsers()->count();
    }

    public function isLikedByUser($userId)
    {
        return $this->likedByUsers()->where('user_id', $userId)->exists();
    }

    public function scopeMostLiked($query, $limit = 10)
    {
        return $query->withCount('likedByUsers')
                     ->orderBy('liked_by_users_count', 'desc')
                     ->limit($limit);
    }
}
