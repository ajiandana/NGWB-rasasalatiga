<?php

namespace App\Http\Controllers\AdminResto;

use App\Models\RestoSlider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = RestoSlider::where('resto_id', Auth::user()->resto_id)->get();
        return view('admin-resto.sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin-resto.sliders.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imagePath = $request->file('image')->store('resto/sliders', 'public');
        $imageName = basename($imagePath);

        RestoSlider::create([
            'resto_id' => Auth::user()->resto_id,
            'title' => $validated['title'],
            'image' => $imageName,
        ]);

        return redirect()->route('slideresto.index')->with('success', 'Slider created successfully');
    }

    public function edit($id)
    {
        $slider = RestoSlider::where('resto_id', Auth::user()->resto_id)
                         ->findOrFail($id);
        return view('admin-resto.sliders.edit', compact('slider'));
    }

    public function update(Request $request, $id)
    {
        $slider = RestoSlider::where('resto_id', Auth::user()->resto_id)
                        ->findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $updateData = [
            'title' => $validated['title'],
        ];

        if ($request->hasFile('image')) {
            if ($slider->image && Storage::disk('public')->exists('resto/sliders/' . $slider->image)) {
                Storage::disk('public')->delete('resto/sliders/' . $slider->image);
            }
            
            $imagePath = $request->file('image')->store('resto/sliders', 'public');
            $updateData['image'] = basename($imagePath);
        }

        $slider->update($updateData);

        return redirect()->route('slideresto.index')->with('success', 'Slider updated successfully');
    }

    public function destroy($id)
    {
        $slider = RestoSlider::where('resto_id', Auth::user()->resto_id)
                        ->findOrFail($id);
        
        if ($slider->image && Storage::disk('public')->exists('resto/sliders/' . $slider->image)) {
            Storage::disk('public')->delete('resto/sliders/' . $slider->image);
        }
        
        $slider->delete();

        return redirect()->route('slideresto.index')->with('success', 'Slider deleted successfully');
    }
}
