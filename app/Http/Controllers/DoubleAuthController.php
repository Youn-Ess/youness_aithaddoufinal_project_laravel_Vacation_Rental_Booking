<?php

namespace App\Http\Controllers;

use App\Mail\DoubleAuthMail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class DoubleAuthController extends Controller
{
    public function index()
    {
        return view('auth.doubleAuth');
    }

    public function switchAuthOption()
    {
        $user = User::where('id', auth()->user()->id)->first();
        if ($user) {
            $user->double_auth_permition = !$user->double_auth_permition;
            $user->double_auth_validate = $user->double_auth_permition ? false : true;
            $user->save();
            if ($user->double_auth_permition) {
                $user->generateTwoFactorCode();
                Mail::to($user->email)->send(new DoubleAuthMail($user->double_auth_code));
                return redirect()->route('doubleAuth.index');
            } else {
                return redirect()->route('home.index');
            }
        }
    }

    public function verityCode(Request $request)
    {
        request()->validate([
            'code' => 'required'
        ]);

        $user = User::where('id', auth()->user()->id)->first();

        $expiresAt = strtotime($user->double_auth_expires_at);
        $currentDateTime = strtotime(now());

        if ($expiresAt > $currentDateTime) {
            if ($user->double_auth_code == $request->code) {
                $user->resetTwoFactorCode();
                $user->double_auth_validate = true;
                $user->save();
                return redirect()->route('home.index')->with('success', 'Connected successfully! '  . $user->name . ' Welcome!');
            } else {
                return redirect()->route('doubleAuth.index')->withErrors([
                    'errorMessage' => 'The code provided is incorrect, try again.'
                ])->onlyInput('code');
            }
        } else {
            $user->resetTwoFactorCode();
            return redirect()->route('doubleAuth.index')->withErrors([
                'errorMessage' => 'The provided code has expired. Please generate a new one by clicking here.'
            ])->onlyInput('code');
        }
    }

    public function resendCode()
    {
        /** @var User $user */
        $user = auth()->user();
        $user->generateTwoFactorCode();
        Mail::to($user->email)->send(new DoubleAuthMail($user->double_auth_code));
        return back();
    }
}
