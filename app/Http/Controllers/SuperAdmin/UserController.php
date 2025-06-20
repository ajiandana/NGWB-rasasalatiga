<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\User;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('restaurant')->latest()->paginate(10);
        return view('super-admin.users.index', compact('users'));
    }

    public function create()
    {
        $restaurants = Restaurant::all();
        $roles = ['superadmin' => 'Super Admin', 'adminresto' => 'Restaurant Admin'];
        return view('super-admin.users.create', compact('restaurants', 'roles'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'role' => ['required', Rule::in(['superadmin', 'adminresto'])],
            'resto_id' => [
                'nullable',
                Rule::requiredIf($request->role === 'adminresto'),
                'exists:restaurants,id'
            ]
        ], [
            'resto_id.required' => 'The restaurant field is required when role is Restaurant Admin.'
        ]);

        $validated['password'] = Hash::make($validated['password']);

        User::create($validated);

        return redirect()->route('users.index')
            ->with('success', 'User created successfully.');
    }

    public function show(User $user)
    {
        return view('super-admin.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        $restaurants = Restaurant::all();
        $roles = ['superadmin' => 'Super Admin', 'adminresto' => 'Restaurant Admin'];
        return view('super-admin.users.edit', compact('user', 'restaurants', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user->id)
            ],
            'password' => 'nullable',
            'role' => ['required', Rule::in(['superadmin', 'adminresto'])],
            'resto_id' => [
                'nullable',
                Rule::requiredIf($request->role === 'adminresto'),
                'exists:restaurants,id'
            ]
        ], [
            'resto_id.required' => 'The restaurant field is required when role is Restaurant Admin.'
        ]);

        if ($request->filled('password')) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $user->update($validated);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        if ($user->id === Auth::id()) {
            return redirect()->back()->with('error', 'You cannot delete your own account.');
        }

        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
