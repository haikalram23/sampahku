<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 flex items-center justify-between w-full">
    <div class="bg-primary w-full lg:w-1/2 lg:h-screen flex items-center justify-center">
        <p class="text-6xl font-bold text-center text-white">Sampahku!</p>
    </div>
    <form method="POST" action="{{ route('register') }}" class="flex flex-col text-primary justify-center w-full lg:w-1/2 px-24 gap-2">
        <p class="font-bold text-3xl text-center">Sign Up</p>
        @csrf
        <div>
            <label for="username" class="font-semibold">Username</label>
            <input id="username" type="text" name="username" class="block px-2 py-1.5 w-full border border-primary rounded-lg @error('username')  @enderror" value="{{ old('username') }}" required>
            @error('username')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="nama">Nama</label>
            <input id="nama" type="text" name="nama" class="block px-2 py-1.5 w-full border border-primary rounded-lg @error('nama')  @enderror" value="{{ old('nama') }}" required>
            @error('nama')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <select id="jenis_kelamin" name="jenis_kelamin" class="block px-2 py-1.5 w-full border border-primary rounded-lg @error('jenis_kelamin')  @enderror" required>
                <option value="">Pilih Jenis Kelamin</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
            @error('jenis_kelamin')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="email">Email</label>
            <input id="email" type="email" name="email" class="block px-2 py-1.5 w-full border border-primary rounded-lg @error('email')  @enderror" value="{{ old('email') }}" required>
            @error('email')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="relative">
            <label for="password">Password</label>
            <input id="password" type="password" name="password" class="block px-2 py-1.5 w-full border border-primary rounded-lg @error('password')  @enderror" required>
            <span id="password-toggle" class="password-toggle-icon absolute inset-y-0 right-0 flex items-center pr-3 pt-8 cursor-pointer">
                <i class="ri-eye-off-line text-xl leading-none text-gray-500 transition duration-300 ease-in-out mb-3"></i>
            </span>
            @error('password')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="relative">
            <label for="confirm_password">Confirm Password</label>
            <input id="confirm_password" type="password" name="password_confirmation" class="block px-2 py-1.5 w-full border border-primary rounded-lg" required>
            <span id="confirm-password-toggle" class="confirm-password-toggle-icon absolute inset-y-0 right-0 flex items-center pr-3 pt-8 cursor-pointer">
                <i class="ri-eye-off-line text-xl leading-none text-gray-500 transition duration-300 ease-in-out mb-3"></i>
            </span>
        </div>
        <div>
            <label for="alamat">Alamat</label>
            <input id="alamat" type="text" name="alamat" class="block px-2 py-1.5 w-full border border-primary rounded-lg @error('alamat')  @enderror" value="{{ old('alamat') }}" required>
            @error('alamat')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="no_telepon">No Telepon</label>
            <input id="no_telepon" type="text" name="no_telepon" class="block px-2 py-1.5 w-full border border-primary rounded-lg @error('no_telepon')  @enderror" value="{{ old('no_telepon') }}" required>
            @error('no_telepon')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="bg-primary block font-bold text-white py-2 rounded-lg my-3">Buat Akun</button>
        <p class="text-third text-center mb-3">Sudah memiliki akun? <a href="{{ route('login') }}" class="font-semibold">Log In</a></p>
    </form>
    <script>
        const passwordField = document.getElementById("password");
        const togglePassword = document.getElementById("password-toggle");

        togglePassword.addEventListener("click", function() {
            const icon = togglePassword.querySelector("i");
            if (passwordField.type === "password") {
                passwordField.type = "text";
                icon.classList.remove("ri-eye-line");
                icon.classList.add("ri-eye-off-line");
            } else {
                passwordField.type = "password";
                icon.classList.remove("ri-eye-off-line");
                icon.classList.add("ri-eye-line");
            }
        });

        const confirmPasswordField = document.getElementById("confirm_password");
        const toggleConfirmPassword = document.getElementById("confirm-password-toggle");

        toggleConfirmPassword.addEventListener("click", function() {
            const icon = toggleConfirmPassword.querySelector("i");
            if (confirmPasswordField.type === "password") {
                confirmPasswordField.type = "text";
                icon.classList.remove("ri-eye-line");
                icon.classList.add("ri-eye-off-line");
            } else {
                confirmPasswordField.type = "password";
                icon.classList.remove("ri-eye-off-line");
                icon.classList.add("ri-eye-line");
            }
        });
    </script>
</body>

</html>