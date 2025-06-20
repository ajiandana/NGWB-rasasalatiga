<?php

namespace App\Http\Controllers\AdminResto;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::where('resto_id', Auth::user()->resto_id)->get();
        return view('admin-resto.menus.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin-resto.menus.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'=>'required|max:100',
            'category'=>'required|in:Main Course,Beverage,Others',
            'description'=>'required|max:255',
            'image'=>'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $imagePath = $request->file('image')->store('menus', 'public');

        $updatedData['image'] = basename($imagePath);

        Menu::create(['resto_id'=>Auth::user()->resto_id,
        'name' => $validated['name'],
        'category' => $validated['category'],
        'description' => $validated['description'],
        'image' => $validated['image']
        ]);

        return redirect()->route('menus.index')->with('success', 'Menu created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // return
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $menu = Menu::where('resto_id', Auth::user()->resto_id)->findOrFail($id);
        return view('admin-resto.menus.edit', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $menu = Menu::where('resto_id', Auth::user()->resto_id)->findOrFail($id);

        $validated = $request->validate([
            'name'=>'required|max:100',
            'category'=>'required|in:Main Course,Beverage,Others',
            'description'=>'required|max:255',
            'image'=>'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $updatedData = [
        'name' => $validated['name'],
        'category' => $validated['category'],
        'description' => $validated['description']
        ];

        if($request->hasFile('image')){
            if($menu->image&&Storage::disk('public')->exists('menus/'.$menu->image)){
                Storage::disk('public')->delete('menus/'.$menu->image);
            }
            $imagePath = $request->file('image')->store('menus', 'public');
            $updateData['image'] = basename($imagePath);
        }
        $menu->update($updateData);
        return redirect()->route('menus.index')->with('success', 'Menu updated successfully!');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $menu = Menu::where('resto_id', Auth::user()->resto_id)->findOrFail($id);
        if($menu->image&&Storage::disk('public')->exists('menus/'.$menu->image)){
            Storage::disk('public')->delete('menus/'.$menu->image);
        }

        $menu->delete();

        return redirect()->route('menus.index')->with('success', 'Menu deleted successfully!');
    }
}
