<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        $roles = DB::table('roles')->get()->all();
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
            'city' => " required",
            'gender' => " required",
            'role' => " required",
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'city' => $request->city,
            'gender' => $request->gender,
            'password' => Hash::make($request->password),
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . $request->file('image')->getClientOriginalName();
            $user['image'] = $request->file('image')->storeAs('profileImages', $imageName, 'public');
            $user->save();
        }

        $user->assignRole($request->role);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('home.index', absolute: false));
    }
}
