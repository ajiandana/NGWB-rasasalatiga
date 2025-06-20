<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function show()
    {
        $about = About::first();
        if (!$about) {
            $about = About::create([
                'title' => 'Tentang Kami',
                'description' => 'Deskripsi tentang website Anda',
                'contact' => '',
                'logo' => ''
            ]);
        }
        
        return view('super-admin.about.edit', compact('about'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:100',
            'description' => 'required|string|max:255',
            'contact' => 'required|string|max:15',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $about = About::firstOrFail();
        if ($request->hasFile('logo'))
        {
            $validated['logo'] = $request->file('logo')->store('about', 'public');
            if ($about->logo)
            {
                Storage::disk('public')->delete($about->logo);
            }
        }
        $about->update($validated);
        return redirect()->route('about.show')->with('success', 'About page updated successfully!');
    }
}