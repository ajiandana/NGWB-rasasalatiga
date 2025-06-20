<?php

namespace App\Http\Controllers\AdminResto;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $resto = Restaurant::findOrFail(Auth::user()->resto_id);
        return view('admin-resto.dashboard', compact('resto'));
    }
}
