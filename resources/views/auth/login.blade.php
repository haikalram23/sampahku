<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 flex flex-col lg:flex-row items-center justify-between w-full">
    <div class="bg-primary w-full lg:w-1/2 lg:h-screen hidden lg:flex items-center justify-center">
        <p class="text-6xl font-bold text-center text-white">Sampahku!</p>
    </div>
    <form method="POST" action="{{ route('login') }}" class="flex flex-col text-primary justify-center w-full h-screen lg:w-1/2 px-24 gap-5">
        @if (session('success'))
        <div class="bg-primary text-white p-4 rounded-lg mb-4">
            {{ session('success') }}
        </div>
        @endif
        <p class="font-bold text-3xl text-center mb-5">Log In</p>
        @csrf
        <div>
            <label for="username" class="font-semibold">Username</label>
            <input id="username" type="text" name="username" class="block px-2 py-2 w-full border border-primary rounded-lg" required autofocus>
        </div>
        <div class="relative">
            <label for="login-pass" class="font-semibold">Password</label>
            <input id="login-pass" type="password" name="password" class="block px-2 py-2 w-full border border-primary rounded-lg" required>
            <i class="ri-eye-off-line login__eye absolute right-3 top-[30px] z-10 cursor-pointer text-xl" id="login-eye"></i>
        </div>
        @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <button type="submit" class="bg-primary w-full font-bold text-lg text-white py-4 rounded-lg my-3">Masuk</button>
        <p class="text-third text-center mb-3">Belum memiliki akun? <a href="{{ route('register') }}" class="font-semibold">Sign Up</a></p>
    </form>
    <script>
        const showHiddenPass = (loginPass, loginEye) => {
            const input = document.getElementById(loginPass),
                iconEye = document.getElementById(loginEye);

            iconEye.addEventListener("click", () => {
                if (input.type === "password") {
                    input.type = "text";

                    iconEye.classList.add("ri-eye-line");
                    iconEye.classList.remove("ri-eye-off-line");
                } else {
                    input.type = "password";

                    iconEye.classList.remove("ri-eye-line");
                    iconEye.classList.add("ri-eye-off-line");
                }
            });
        };

        showHiddenPass("login-pass", "login-eye");
    </script>
</body>

</html>