<?php

namespace App\Models;

use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Model;

class RestoOperational extends Model
{
    protected $table = 'r_operational';
    protected $fillable = [
        'resto_id', 'days', 'open_time', 'close_time', 'is_closed'
    ];

    public $timestamps = false;

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class, 'resto_id');
    }
}
