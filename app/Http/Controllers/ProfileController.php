<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function update(Request $request) : RedirectResponse 
    {
        $user = Auth::user();

        $validated = $request->validate(([
            'name' => 'required|string|max:100',
            'email' => 'required|string|email|',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|nullable'
        ]));

        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if($request->hasFile('avatar')) {
            if($user->avatar) {
                Storage::delete('public/avatars', $user->avatar);
            }
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $avatarPath;
        }

        $user->save();

        
        

        return redirect()->route('dashboard')->with('success', 'Profile updated successfully!');

    }

    
}
