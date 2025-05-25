<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    public function update(UpdateProfileRequest $request)
    {

        $user = Auth::user();
        $user = User::find($user->id);
        // Check if the user is authenticated
        if (!$user) {
            return redirect()->route('login')->with('error', 'You need to be logged in to update your profile.');
        }

        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'telefono' => 'required|string|max:255',
            'numero_id' => 'required|string|max:255',



        ]);
        //Update the user's profile with the validated data
        $data = $request->only(['nombre', 'apellido', 'telefono', 'numero_id']);

        $user->nombre = $data['nombre'];
        $user->apellido = $data['apellido'];
        $user->telefono = $data['telefono'];
        $user->numero_id = $data['numero_id'];
        $user->email = $data['email'];
        $user->save();
        // Update the user's profile image if a new one is uploaded




        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully.');
    }
}
