<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RestoSlider extends Model
{
    protected $table = "r_sliders";
    protected $fillable = [
        'resto_id', 'image', 'title'
    ];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class, 'resto_id');
    }
}
