<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class SliderContontroller extends Controller
{
    public function index()
    {
        $sliders = Slider::latest()->paginate(10);
        return view('super-admin.sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('super-admin.sliders.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:100',
            'image' => 'required|string|max:255',
        ]);
        $validated['image'] = $request->file('image')->store('sliders', 'public');
        Slider::create($validated);
        return redirect()->route('slider.index')->with('success', 'Slider created successfully');
    }

    public function show(Slider $slider)
    {
        return view('super-admin.sliders.show', compact('slider'));
    }

    public function edit(Slider $slider)
    {
        return view('super-admin.sliders.edit', compact('slider'));
    }

    public function update(Request $request, Slider $slider)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($slider->image);
            $validated['image'] = $request->file('image')->store('sliders', 'public');
        }

        $slider->update($validated);

        return redirect()->route('sliders.index')->with('success', 'Slider updated successfully');
    }

    public function destroy(Slider $slider)
    {
        Storage::disk('public')->delete($slider->image);
        $slider->delete();
        return redirect()->route('sliders.index')->with('success', 'Slider deleted successfully');
    }
}
