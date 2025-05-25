<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->user();
        //   dd($googleUser->name);
        $user = User::where('google_id', $googleUser->getId())->first();

        if (!$user) {
            $user = User::create([
                'google_id' => $googleUser->getId(),
                'email' => $googleUser->getEmail(),
                'nombre' => $googleUser->name,
                'imagen_perfil' => $googleUser->avatar,
            ]);
        }

        Auth::login($user, true);

        return redirect()->route('home'); // Adjust the route as necessary
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home'); // Adjust the route as necessary
    }
}
