<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    @vite('resources/css/app.css')
</head>

<body class="scroll-smooth font-display">
    <header>
        <nav class="shadow-sm flex justify-between items-center w-2/3 mx-auto px-4 h-20">
            <a href="{{ route('admin.pickup-requests.index') }}">
                <p class="text-2xl text-primary font-bold">Sampahku!</p>
            </a>
            @auth
            @if(Auth::user()->role === 'admin')
            <ul class="flex gap-8  text-gray-800">
                <li class="{{ Route::currentRouteName() == 'dashboard' ? 'underline decoration-primary underline-offset-8' : 'no-underline' }} relative text-black hover:text-gray-500 cursor-pointer transition-all ease-in-out before:transition-[width] before:ease-in-out before:duration-700 before:absolute before:bg-gray-500 before:origin-center before:h-[2px] before:w-0 hover:before:w-[50%] before:bottom-0 before:left-[50%] after:transition-[width] after:ease-in-out after:duration-700 after:absolute after:bg-primary after:origin-center after:h-[2px] after:w-0 hover:after:w-[50%] after:bottom-0 after:right-[50%]"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="{{ Route::currentRouteName() == 'profile.edit' ? 'underline decoration-primary underline-offset-8' : 'no-underline' }} relative text-black hover:text-gray-500 cursor-pointer transition-all ease-in-out before:transition-[width] before:ease-in-out before:duration-700 before:absolute before:bg-gray-500 before:origin-center before:h-[2px] before:w-0 hover:before:w-[50%] before:bottom-0 before:left-[50%] after:transition-[width] after:ease-in-out after:duration-700 after:absolute after:bg-primary after:origin-center after:h-[2px] after:w-0 hover:after:w-[50%] after:bottom-0 after:right-[50%]"><a href="{{ route('profile.edit') }}">Profile</a></li>
                <li class="{{ Route::currentRouteName() == 'admin.pickup-requests.index' ? 'underline decoration-primary underline-offset-8' : 'no-underline' }} relative text-black hover:text-gray-500 cursor-pointer transition-all ease-in-out before:transition-[width] before:ease-in-out before:duration-700 before:absolute before:bg-gray-500 before:origin-center before:h-[2px] before:w-0 hover:before:w-[50%] before:bottom-0 before:left-[50%] after:transition-[width] after:ease-in-out after:duration-700 after:absolute after:bg-primary after:origin-center after:h-[2px] after:w-0 hover:after:w-[50%] after:bottom-0 after:right-[50%]"><a href="{{ route('admin.pickup-requests.index') }}">Pickup Request</a></li>
            </ul>
            @else
            <ul class="flex gap-8  text-gray-800">
                <li class="{{ Route::currentRouteName() == 'dashboard' ? 'underline decoration-primary underline-offset-8' : 'no-underline' }} relative text-black hover:text-gray-500 cursor-pointer transition-all ease-in-out before:transition-[width] before:ease-in-out before:duration-700 before:absolute before:bg-gray-500 before:origin-center before:h-[2px] before:w-0 hover:before:w-[50%] before:bottom-0 before:left-[50%] after:transition-[width] after:ease-in-out after:duration-700 after:absolute after:bg-primary after:origin-center after:h-[2px] after:w-0 hover:after:w-[50%] after:bottom-0 after:right-[50%]"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="{{ Route::currentRouteName() == 'profile.edit' ? 'underline decoration-primary underline-offset-8' : 'no-underline' }} relative text-black hover:text-gray-500 cursor-pointer transition-all ease-in-out before:transition-[width] before:ease-in-out before:duration-700 before:absolute before:bg-gray-500 before:origin-center before:h-[2px] before:w-0 hover:before:w-[50%] before:bottom-0 before:left-[50%] after:transition-[width] after:ease-in-out after:duration-700 after:absolute after:bg-primary after:origin-center after:h-[2px] after:w-0 hover:after:w-[50%] after:bottom-0 after:right-[50%]"><a href="{{ route('profile.edit') }}">Profile</a></li>
                <li class="{{ Route::currentRouteName() == 'pickup_requests.create' ? 'underline decoration-primary underline-offset-8' : 'no-underline' }} relative text-black hover:text-gray-500 cursor-pointer transition-all ease-in-out before:transition-[width] before:ease-in-out before:duration-700 before:absolute before:bg-gray-500 before:origin-center before:h-[2px] before:w-0 hover:before:w-[50%] before:bottom-0 before:left-[50%] after:transition-[width] after:ease-in-out after:duration-700 after:absolute after:bg-primary after:origin-center after:h-[2px] after:w-0 hover:after:w-[50%] after:bottom-0 after:right-[50%]"><a href="{{ route('pickup_requests.create') }}">Minta Jemput</a></li>
            </ul>
            @endif
            @endauth

            <div class="flex items-center space-x-4">
                @guest
                <a href="{{ route('login') }}" class="px-4 lg:px-6 py-2 font-semibold border border-primary text-primary rounded-xl">Login</a>
                <a href="{{ route('register') }}" class="px-4 lg:px-6 py-2 font-semibold bg-primary text-white rounded-xl">Sign Up</a>
                @endguest

                @auth
                <div class="flex flex-col lg:flex-row justify-evenly items-center lg:gap-4">
                    <img src="{{ Auth::user()->foto_profil ? asset('foto-profil/' . Auth::user()->foto_profil) : asset('images/default-profile.png') }}" alt="avatar" width="30px" height="30px">
                    <p class="text-third text-center capitalize">{{ Auth::user()->nama }}</p>
                </div>
                @endauth
            </div>
        </nav>
    </header>
    <main>
        @yield('content')
    </main>
    <footer class="w-full">
        <div class="w-2/3 mx-auto shadow-lg flex justify-evenly items-center py-8">
            <p class="text-primary text-3xl font-bold">Sampahku!</p>
            <ul class="flex flex-col gap-2">
                <a href="{{ route('dashboard') }}">
                    <li class="font-semibold text-slate-900">Sampahku</li>
                </a>
                <a href="{{ route('dashboard') }}#visi-misi">
                    <li class="text-slate-600">Visi</li>
                </a>
                <a href="{{ route('dashboard') }}#visi-misi">
                    <li class="text-slate-600">Misi</li>
                </a>
                <a href="{{ route('dashboard') }}#about-us">
                    <li class="text-slate-600">About Us</li>
                </a>
                <a href="{{ route('dashboard') }}#faqs">
                    <li class="text-slate-600">FAQs</li>
                </a>
            </ul>
            <ul class="flex flex-col gap-2">
                <li class="font-semibold text-slate-900">Informasi</li>
                <li class="text-slate-600">Kontak Kami</li>
                <li class="text-slate-600">Bantuan</li>
                <li class="text-slate-600">Syarat & Ketentuan</li>
                <li class="text-slate-600">Kebijakan Privasi</li>
            </ul>
            <ul class="flex flex-col gap-2">
                <li class="font-semibold text-slate-900">Media Sosial</li>
                <li class="text-slate-600">Tiktok</li>
                <li class="text-slate-600">Instagram</li>
                <li class="text-slate-600">Youtube</li>
                <li class="text-slate-600">Twitter</li>
            </ul>
        </div>
        <div class="w-full h-8 my-4">
            <p class="text-slate-500 text-center font-semibold">Copyright &copy;Sampahku 2024 - All Rights Reserved.</p>
        </div>
    </footer>
</body>

</html>