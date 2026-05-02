<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisterController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $roles = [];
        if (Auth::check()) {
            $roles = Role::all();
        }

        return view('auth.register', compact('roles'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role_id' => [Auth::check() ? 'required' : 'nullable', 'exists:roles,id'],
        ]);

        $roleId = $request->role_id;

        if (!Auth::check() || !$roleId) {
            $customerRole = Role::where('name', 'Customer')->first();
            $roleId = $customerRole->id;
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $roleId,
        ]);

        if (!Auth::check()) {
            Auth::login($user);
            return redirect()->route('dashboard.home');
        }

        return redirect()->route('dashboard.home')->with('success', 'User registered successfully.');
    }
}
