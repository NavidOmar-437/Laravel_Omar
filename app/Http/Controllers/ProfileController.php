<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit()
    {
        $profile = Profile::first() ?? new Profile();

        return view('profile.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'headline' => ['nullable', 'string', 'max:255'],
            'summary' => ['nullable', 'string', 'max:5000'],
            'email' => ['nullable', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'address' => ['nullable', 'string', 'max:255'],
            'linkedin' => ['nullable', 'url', 'max:255'],
            'github' => ['nullable', 'url', 'max:255'],
            'skills' => ['nullable', 'string', 'max:5000'],
            'education' => ['nullable', 'string', 'max:5000'],
        ]);

        $profile = Profile::first() ?? new Profile();
        $profile->fill($data)->save();

        return redirect()->route('portofolio.index')
            ->with('success', 'Profil CV berhasil diperbarui.');
    }
}
