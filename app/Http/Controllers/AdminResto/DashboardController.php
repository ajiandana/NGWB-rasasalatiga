<?php

namespace App\Http\Controllers\AdminResto;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin-resto.dashboard');
    }
}
