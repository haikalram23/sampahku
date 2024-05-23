<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('profile.edit');
    }

    public function update(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:users,username,' . Auth::id(),
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string|max:10',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
            'alamat' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:15',
            'kota' => 'nullable|string|max:255',
            'kecamatan' => 'nullable|string|max:255',
            'desa' => 'nullable|string|max:255',
            'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = Auth::user();

        if ($request->hasFile('foto_profil')) {
            $file = $request->file('foto_profil');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('foto-profil'), $filename);

            // Delete old profile picture if exists
            if ($user->foto_profil && file_exists(public_path('foto-profil/' . $user->foto_profil))) {
                unlink(public_path('foto-profil/' . $user->foto_profil));
            }

            $user->foto_profil = $filename;
        }

        $user->username = $request->username;
        $user->nama = $request->nama;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->email = $request->email;
        $user->alamat = $request->alamat;
        $user->no_telepon = $request->no_telepon;
        $user->kota = $request->kota;
        $user->kecamatan = $request->kecamatan;
        $user->desa = $request->desa;
        /** @var \App\Models\User $user **/
        $user->save();

        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully.');
    }

    public function changePassword()
    {
        return view('profile.changePassword');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $user = Auth::user();

        // Verify the current password
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'The provided current password is incorrect.']);
        }

        // Update the password
        $user->password = Hash::make($request->new_password);
        /** @var \App\Models\User $user **/
        $user->save();

        return redirect()->back()->with('success', 'Password updated successfully.');
    }
}
