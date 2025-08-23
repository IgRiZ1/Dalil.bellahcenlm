<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    /**
     * Toon profiel van een gebruiker
     */
    public function show($username)
    {
        $user = User::where('username', $username)->firstOrFail();
        $newsItems = $user->newsItems()->latest()->take(5)->get();
        
        return view('profile.show', compact('user', 'newsItems'));
    }

    /**
     * Toon bewerk profiel formulier
     */
    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    /**
     * Update profiel
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'birthday' => 'nullable|date',
            'about_me' => 'nullable|string|max:1000',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $data = $request->only(['name', 'username', 'birthday', 'about_me']);

        // Verwerk profielfoto upload
        if ($request->hasFile('profile_photo')) {
            // Verwijder oude foto als die bestaat
            if ($user->profile_photo) {
                Storage::disk('public')->delete($user->profile_photo);
            }

            $path = $request->file('profile_photo')->store('profile-photos', 'public');
            $data['profile_photo'] = $path;
        }

        $user->update($data);

        return redirect()->route('profile.show', $user->username)
            ->with('success', 'Profiel succesvol bijgewerkt!');
    }
}
