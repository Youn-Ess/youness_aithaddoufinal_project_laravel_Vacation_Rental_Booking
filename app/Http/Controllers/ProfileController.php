<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Booking;
use App\Models\Property;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $user = $request->user();

        if ($request->hasFile('image')) {
            if (Storage::disk('public')->exists($user->image) && $user->image != 'profileImages/defaultProfileImage.png') {
                Storage::disk('public')->delete($user->image);
            }

            $imageName = time() . $request->file('image')->getClientOriginalName();
            $user['image'] = $request->file('image')->storeAs('profileImages', $imageName, 'public');
            $user->save();
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }


    // ^ add my functions for the profile

    public function index()
    {
        $events = Booking::all()->where('user_id', '==', Auth::user()->id);
        $totalPrice = $events->sum('total_price');
        return view('profile.profile_index', compact('events', 'totalPrice'));
    }

    public function show()
    {
    }
}
