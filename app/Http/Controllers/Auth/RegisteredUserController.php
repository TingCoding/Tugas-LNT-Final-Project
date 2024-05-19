<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:40'],
            'personId' => ['required', 'string'],
            'email' => ['required', 'string', 'lowercase', 'email', 'regex:/^[a-zA-Z0-9._%+-]+@gmail\.com$/', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string', 'min:6', 'max:12', 'confirmed', Rules\Password::defaults()],
            'nomorHp' => ['required', 'string', 'regex:/^08[0-9]{8,}$/'],
        ]);
        

        $user = User::create([
            'name' => $request->name,
            'personId' => $request->personId,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'nomorHp' => $request->nomorHp,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
