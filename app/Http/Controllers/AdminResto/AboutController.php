<?php

namespace App\Http\Controllers\AdminResto;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function edit()
    {
        $resto = Restaurant::findOrFail(Auth::user()->resto_id);
        return view('admin-resto.about.edit', compact('resto'));
    }

    public function update(Request $request)
    {
        $resto = Restaurant::findOrFail(Auth::user()->resto_id);
        
        $validated = $request->validate([
            'name' => 'required|max:100',
            'address' => 'required|max:255',
            'contact' => 'required|max:15',
            'bio' => 'required|max:400',
            'link_location' => 'required|url',
            'category' => 'required|in:Restoran,Kafe & Kedai Kopi,Jajanan & Warung Kaki Lima,Toko Roti & Kue,Minuman & Es,Makanan Beku & Siap Saji,Oleh-oleh & Produk Khas Daerah',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        
        $updateData = [
            'name' => $validated['name'],
            'address' => $validated['address'],
            'contact' => $validated['contact'],
            'bio' => $validated['bio'],
            'link_location' => $validated['link_location'],
            'category' => $validated['category'],
        ];
        
        // Handle logo upload
        if ($request->hasFile('logo')) {
            // Delete old logo if exists
            if ($resto->logo && Storage::disk('public')->exists('resto/logos/' . $resto->logo)) {
                Storage::disk('public')->delete('resto/logos/' . $resto->logo);
            }
            
            $logoPath = $request->file('logo')->store('resto/logos', 'public');
            $updateData['logo'] = basename($logoPath);
        }
        
        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($resto->image && Storage::disk('public')->exists('resto/images/' . $resto->image)) {
                Storage::disk('public')->delete('resto/images/' . $resto->image);
            }
            
            $imagePath = $request->file('image')->store('resto/images', 'public');
            $updateData['image'] = basename($imagePath);
        }
        
        $resto->update($updateData);
        
        return redirect()->route('admin-resto.about.edit')
                        ->with('success', 'Restaurant information updated successfully');
    }
}