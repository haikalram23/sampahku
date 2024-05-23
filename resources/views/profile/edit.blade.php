@extends('layouts.app')

@section('title', 'Edit Profil')

@section('content')
<div class="w-full px-6 lg:px-40 flex flex-col lg:flex-row justify-between py-8 gap-4">
    <div class="w-full lg:w-1/4 flex flex-col gap-4 py-6">
        <p class="text-4xl font-semibold text-gray-800 mb-4">My Profile</p>
        <a href="{{ route('profile.edit') }}" class="{{ Route::currentRouteName() == 'profile.edit' ? 'bg-primary text-white' : 'bg-white text-primary' }} rounded-lg px-4 py-2"><i class="ri-pencil-line h-10 w-10 mr-2"></i>Edit Profile</a>
        <a href="{{ route('profile.changePassword') }}" class="{{ Route::currentRouteName() == 'profile.changePassword' ? 'bg-primary text-white' : 'bg-white text-primary' }} rounded-lg px-4 py-2"><i class="ri-key-line h-10 w-10 mr-2"></i>Change Password</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="rounded-lg px-4 py-2 text-primary"><i class="ri-logout-box-line h-10 w-10 mr-2"></i>Logout</button>
        </form>
    </div>
    <div class="container mx-auto px-8 py-8 w-full lg:w-3/4 border border-primary">
        <h2 class="text-2xl font-semibold text-gray-800">Edit Profile</h2>

        @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Whoops!</strong>
            <span class="block sm:inline">There were some problems with your input.</span>
            <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-2 flex justify-center">
                <div class="mb-2 relative">
                    <div class="relative">
                        <img id="profilePicturePreview" src="{{ Auth::user()->foto_profil ? asset('foto-profil/' . Auth::user()->foto_profil) : asset('images/default-profile.png') }}" alt="Profile Picture" class="mt-2 h-20 w-20 rounded-full object-cover">
                        <label for="foto_profil" class="absolute top-9 -right-4 mt-2 mr-2 bg-primary hover:bg-gray-800 p-1 rounded-full shadow cursor-pointer">
                            <i class="ri-pencil-line text-white px-[6px] py[3px]"></i>
                        </label>
                        <input type="file" id="foto_profil" name="foto_profil" class="hidden" onchange="previewProfilePicture(event)">
                    </div>
                </div>
            </div>

            <div class="flex justify-between flex-col lg:flex-row gap-0 lg:gap-6">
                <div class="mb-2 w-full lg:w-1/2">
                    <label for="nama" class="block text-gray-500 mb-2">Nama</label>
                    <input type="text" id="nama" name="nama" value="{{ old('nama', Auth::user()->nama) }}" class="shadow appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>

                <div class="mb-2 w-full lg:w-1/2">
                    <label for="username" class="block text-gray-500 mb-2">Username</label>
                    <input type="text" id="username" name="username" value="{{ old('username', Auth::user()->username) }}" class="shadow appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
            </div>

            <div class="flex justify-between flex-col lg:flex-row gap-0 lg:gap-6">
                <div class="mb-2 w-full lg:w-1/2">
                    <label for="jenis_kelamin" class="block text-gray-500 mb-2">Jenis Kelamin</label>
                    <select id="jenis_kelamin" name="jenis_kelamin" class="shadow appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="Laki-laki" {{ old('jenis_kelamin', Auth::user()->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ old('jenis_kelamin', Auth::user()->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>

                <div class="mb-2 w-full lg:w-1/2">
                    <label for="email" class="block text-gray-500 mb-2">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email', Auth::user()->email) }}" class="shadow appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
            </div>



            <div class="mb-2">
                <label for="no_telepon" class="block text-gray-500 mb-2">No Telepon</label>
                <input type="text" id="no_telepon" name="no_telepon" value="{{ old('no_telepon', Auth::user()->no_telepon) }}" class="shadow appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>

            <div class="mb-3">
                <label for="alamat" class="block text-gray-500 mb-2">Alamat Lengkap</label>
                <input type="text" id="alamat" name="alamat" value="{{ old('alamat', Auth::user()->alamat) }}" class="shadow appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="flex flex-between flex-col lg:flex-row gap-0 lg:gap-4 mb-4">
                <div class="mb-2 w-full lg:w-1/3">
                    <label for="kota" class="block text-gray-500 mb-1">Kota</label>
                    <input type="text" id="kota" name="kota" value="{{ old('kota', Auth::user()->kota) }}" class="shadow appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>

                <div class="mb-2 w-full lg:w-1/3">
                    <label for="kecamatan" class="block text-gray-500 mb-1">Kecamatan</label>
                    <input type="text" id="kecamatan" name="kecamatan" value="{{ old('kecamatan', Auth::user()->kecamatan) }}" class="shadow appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>

                <div class="mb-2 w-full lg:w-1/3">
                    <label for="desa" class="block text-gray-500 mb-1">Desa</label>
                    <input type="text" id="desa" name="desa" value="{{ old('desa', Auth::user()->desa) }}" class="shadow appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
            </div>



            <div class="flex items-center justify-end">
                <button type="submit" class="bg-primary hover:bg-primary/80 text-white font-bold py-2 px-10 rounded-lg focus:outline-none focus:shadow-outline">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
<script>
    function previewProfilePicture(event) {
        const reader = new FileReader();
        reader.onload = function() {
            const output = document.getElementById('profilePicturePreview');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>

@endsection