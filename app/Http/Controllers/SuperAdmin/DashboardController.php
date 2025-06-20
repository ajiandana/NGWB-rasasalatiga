<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\User;
use App\Models\Slider;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $userCount = User::count();
        $restaurantCount = Restaurant::count();
        $sliderCount = Slider::count();
        $recentUsers = User::latest()->take(5)->get();
        return view('super-admin.dashboard', compact('userCount', 'restaurantCount', 'sliderCount', 'recentUsers'));
    }
}
