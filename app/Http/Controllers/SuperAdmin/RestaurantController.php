<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurant = Restaurant::latest()->paginate(10);
        return view('super-admin.restaurants.index', compact('restaurants'));
    }

    public function create()
    {
        return view('super-admin.restaurants.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'category' => 'required|in:Restoran,Kafe & Kedai Kopi,Jajanan & Warung Kaki Lima,Toko Roti & Kue,Minuman & Es,Makanan Beku & Siap Saji,Oleh-oleh & Produk Khas Daerah',
            'logo' => 'required|image|mimes:jpeg,png,png,jpg,gif|max:2048',
            'image' => 'required|image|mimes:jpeg,png,png,jpg,gif|max:2048',
            'address' => 'required|string|max:255',
            'link_location' => 'required|url',
            'contact' => 'required|string|max:15',
            'bio' => 'required|string|max:400',
        ]);
        $validated['logo'] = $request->file('logo')->store('restaurant_logos', 'public');
        $validated['image'] = $request->file('image')->store('restaurant_images', 'public');
        Restaurant::create($validated);
        return redirect()->route('restaurants.index')->with('success', 'Restaurant created successfully');
    }

    public function show(Restaurant $restaurant)
    {
        return view('super-admin.restaurants.show', compact('restaurants'));
    }

    public function edit(Restaurant $restaurant)
    {
        return view('super-admin.restaurants.edit', compact('restaurants'));
    }

    public function update(Request $request, Restaurant $restaurant)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'address' => 'required|string|max:255',
            'link_location' => 'required|url',
            'contact' => 'required|string|max:15',
            'bio' => 'required|string|max:400',
            'category' => 'required|in:Restoran,Kafe & Kedai Kopi,Jajanan & Warung Kaki Lima,Toko Roti & Kue,Minuman & Es,Makanan Beku & Siap Saji,Oleh-oleh & Produk Khas Daerah'
        ]);

        if ($request->hasFile('logo')) {
            $validated['logo'] = $request->file('logo')->store('restaurant_logos', 'public');
        }

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('restaurant_images', 'public');
        }

        $restaurant->update($validated);
        return redirect()->route('restaurants.index')->with('success', 'Restaurant updated successfully');
    }

    public function destroy(Restaurant $restaurant)
    {
        $restaurant->delete();
        return redirect()->route('restaurants.index')->with('success', 'Restaurant deleted successfully');
    }
}
