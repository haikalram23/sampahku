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
        ], [
            'username.required' => 'Username diperlukan.',
            'username.string' => 'Username harus berupa teks.',
            'username.max' => 'Username tidak boleh lebih dari :max karakter.',
            'username.unique' => 'Username telah digunakan oleh pengguna lain.',
            'nama.required' => 'Nama diperlukan.',
            'nama.string' => 'Nama harus berupa teks.',
            'nama.max' => 'Nama tidak boleh lebih dari :max karakter.',
            'jenis_kelamin.required' => 'Jenis kelamin diperlukan.',
            'jenis_kelamin.string' => 'Jenis kelamin harus berupa teks.',
            'jenis_kelamin.max' => 'Jenis kelamin tidak boleh lebih dari :max karakter.',
            'email.required' => 'Email diperlukan.',
            'email.string' => 'Email harus berupa teks.',
            'email.email' => 'Format email tidak valid.',
            'email.max' => 'Email tidak boleh lebih dari :max karakter.',
            'email.unique' => 'Email telah digunakan oleh pengguna lain.',
            'alamat.required' => 'Alamat diperlukan.',
            'alamat.string' => 'Alamat harus berupa teks.',
            'alamat.max' => 'Alamat tidak boleh lebih dari :max karakter.',
            'no_telepon.required' => 'Nomor telepon diperlukan.',
            'no_telepon.string' => 'Nomor telepon harus berupa teks.',
            'no_telepon.max' => 'Nomor telepon tidak boleh lebih dari :max karakter.',
            'kota.string' => 'Kota harus berupa teks.',
            'kota.max' => 'Kota tidak boleh lebih dari :max karakter.',
            'kecamatan.string' => 'Kecamatan harus berupa teks.',
            'kecamatan.max' => 'Kecamatan tidak boleh lebih dari :max karakter.',
            'desa.string' => 'Desa harus berupa teks.',
            'desa.max' => 'Desa tidak boleh lebih dari :max karakter.',
            'foto_profil.image' => 'File harus berupa gambar.',
            'foto_profil.mimes' => 'File harus berformat jpeg, png, jpg, gif, atau svg.',
            'foto_profil.max' => 'Ukuran file tidak boleh lebih dari :max kilobita.',
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

        return redirect()->route('profile.edit')->with('success', 'Profile berhasil diupdate.');
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
            'new_password_confirmation' => 'required',
        ], [
            'current_password.required' => 'Password lama wajib diisi.',
            'new_password.required' => 'Password baru wajib diisi.',
            'new_password.min' => 'Password baru harus memiliki setidaknya 8 karakter.',
            'new_password.confirmed' => 'Konfirmasi password baru tidak cocok.',
            'new_password_confirmation.required' => 'Konfirmasi password baru wajib diisi.',
        ]);


        $user = Auth::user();

        // Verify the current password
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Password lama anda salah.']);
        }

        // Update the password
        $user->password = Hash::make($request->new_password);
        /** @var \App\Models\User $user **/
        $user->save();

        return redirect()->back()->with('success', 'Password berhasil diubah.');
    }
}
