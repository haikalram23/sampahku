@extends('layouts.app')

@section('title', 'Ganti Password')

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
        <p class="text-2xl font-semibold text-gray-800 mb-8">Change Password</p>
        @if(session('success'))
        <div class="bg-primary text-white p-4 rounded-lg mb-4">
            {{ session('success') }}
        </div>
        @endif
        <form action="{{ route('profile.change-password') }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Current Password Input Field -->
            <div class="relative w-full lg:w-1/2  {{ !$errors->has('current_password') ? 'mb-4' : '' }}">
                <label for="current_password" class="block text-gray-700 mb-2">Password Lama</label>
                <input type="password" id="current_password" name="current_password" class="shadow w-full appearance-none border border-gray-300 rounded-lg py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <span id="current-password-toggle" class="password-toggle-icon absolute inset-y-0 right-0 top-2 flex items-center pr-3 pt-8 cursor-pointer">
                    <i class="ri-eye-off-line text-xl leading-none text-gray-500 transition duration-300 ease-in-out mb-3"></i>
                </span>
            </div>
            @error('current_password')
            <span class="text-red-500 text-sm mb-4">{{ $message }}</span>
            @enderror

            <!-- New Password Input Field -->
            <div class="relative w-full lg:w-1/2  {{ !$errors->has('new_password') ? 'mb-4' : '' }}">
                <label for="new_password" class="block text-gray-700 mb-2">Password Baru</label>
                <input type="password" id="new_password" name="new_password" class="shadow w-full appearance-none border border-gray-300 rounded-lg py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <span id="new-password-toggle" class="password-toggle-icon absolute inset-y-0 right-0 top-2 flex items-center pr-3 pt-8 cursor-pointer">
                    <i class="ri-eye-off-line text-xl leading-none text-gray-500 transition duration-300 ease-in-out mb-3"></i>
                </span>
            </div>
            @error('new_password')
            <span class="text-red-500 text-sm mb-4">{{ $message }}</span>
            @enderror

            <!-- Confirm New Password Input Field -->
            <div class="relative w-full lg:w-1/2 {{ !$errors->has('new_password_confirmation') ? 'mb-6' : '' }}">
                <label for="new_password_confirmation" class="block text-gray-700 mb-2">Konfirmasi Password Baru</label>
                <input type="password" id="new_password_confirmation" name="new_password_confirmation" class="shadow w-full appearance-none border border-gray-300 rounded-lg py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <span id="confirmation-new-password-toggle" class="password-toggle-icon absolute inset-y-0 right-0 top-2 flex items-center pr-3 pt-8 cursor-pointer">
                    <i class="ri-eye-off-line text-xl leading-none text-gray-500 transition duration-300 ease-in-out mb-3"></i>
                </span>
            </div>
            @error('new_password_confirmation')
            <span class="text-red-500 text-sm mb-6">{{ $message }}</span>
            @enderror

            <!-- Submit Button -->
            <div class="flex items-center justify-end">
                <button type="submit" class="bg-primary hover:bg-primary/80 text-white font-bold py-2 px-10 rounded-lg focus:outline-none focus:shadow-outline">Simpan</button>
            </div>
        </form>
    </div>
</div>
<script>
    const currentPassword = document.getElementById("current_password");
    const togglePassword = document.getElementById("current-password-toggle");

    togglePassword.addEventListener("click", function() {
        const icon = togglePassword.querySelector("i");
        if (currentPassword.type === "password") {
            currentPassword.type = "text";
            icon.classList.remove("ri-eye-line");
            icon.classList.add("ri-eye-off-line");
        } else {
            currentPassword.type = "password";
            icon.classList.remove("ri-eye-off-line");
            icon.classList.add("ri-eye-line");
        }
    });

    const newPassword = document.getElementById("new_password");
    const toggleNewPassword = document.getElementById("new-password-toggle");

    toggleNewPassword.addEventListener("click", function() {
        const icon = toggleNewPassword.querySelector("i");
        if (newPassword.type === "password") {
            newPassword.type = "text";
            icon.classList.remove("ri-eye-line");
            icon.classList.add("ri-eye-off-line");
        } else {
            newPassword.type = "password";
            icon.classList.remove("ri-eye-off-line");
            icon.classList.add("ri-eye-line");
        }
    });

    const confirmationewPassword = document.getElementById("new_password_confirmation");
    const toggleConfirmationewPassword = document.getElementById("confirmation-new-password-toggle");

    toggleConfirmationewPassword.addEventListener("click", function() {
        const icon = toggleConfirmationewPassword.querySelector("i");
        if (confirmationewPassword.type === "password") {
            confirmationewPassword.type = "text";
            icon.classList.remove("ri-eye-line");
            icon.classList.add("ri-eye-off-line");
        } else {
            confirmationewPassword.type = "password";
            icon.classList.remove("ri-eye-off-line");
            icon.classList.add("ri-eye-line");
        }
    });
</script>
@endsection