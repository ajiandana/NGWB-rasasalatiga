<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Slider;
use App\Models\LikedMenu;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::orderBy('created_at', 'desc')->take(5)->get();
        
        $topRestaurants = Restaurant::withCount(['menus as total_likes' => function($query) {
                $query->select(DB::raw('sum((select count(*) from liked_menu where liked_menu.menu_id = menus.id))'));
            }])
            ->orderBy('total_likes', 'desc')
            ->take(3)
            ->get();
            
        $restaurants = Restaurant::withCount(['menus as total_likes' => function($query) {
                $query->select(DB::raw('sum((select count(*) from liked_menu where liked_menu.menu_id = menus.id))'));
            }])
            ->orderBy('name')
            ->get();
            
        return view('user.dashboard', compact('sliders', 'topRestaurants', 'restaurants'));
    }

    public function show($id)
    {
        $restaurant = Restaurant::with(['menus' => function($query) {
                // $query->withCount('likes')
                //       ->orderBy('likes_count', 'desc');
            }])
            ->withCount(['menus as total_likes' => function($query) {
                $query->select(DB::raw('sum((select count(*) from liked_menu where liked_menu.menu_id = menus.id))'));
            }])
            ->findOrFail($id);
            
        return view('user.restaurant.show', compact('restaurant'));
    }

    public function like($id, Request $request)
    {
        $menu = Menu::findOrFail($id);
        
        $existingLike = LikedMenu::where('menu_id', $id)
                                ->where('session', session()->getId())
                                ->first();
        
        if ($existingLike) {
            $existingLike->delete();
            return response()->json(['liked' => false, 'count' => $menu->likes()->count()]);
        }
        
        LikedMenu::create([
            'menu_id' => $id,
            'session' => session()->getId(),
        ]);
        
        return response()->json(['liked' => true, 'count' => $menu->likes()->count()]);
    }
}