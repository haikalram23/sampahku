<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 flex flex-col lg:flex-row items-center justify-between h-screen w-full">
    <div class="bg-primary w-full lg:w-1/2 lg:h-screen hidden lg:flex items-center justify-center">
        <p class="text-6xl font-bold text-center text-white">Sampahku!</p>
    </div>
    <div class="flex flex-col justify-center h-screen w-full lg:w-1/2 lg:h-screen px-16">
        <h1 class="text-4xl font-bold mb-5">Dari sampah jadi <span class="text-primary">RUPIAH</span>!</h1>
        <p class="text-xl mb-8 font-semibold">bersama <span class="text-primary font-semibold">Sampahku!</span> jaga kelestarian lingkungan</p>
        <div class="flex">
            <a href="{{ route('login') }}" class="text-primary border border-primary hover:bg-primary hover:text-white py-2 px-6 font-bold rounded-lg mr-6">Log In</a>
            <a href="{{ route('register') }}" class="bg-primary hover:bg-white hover:border hover:border-primary text-white hover:text-primary font-bold py-2 px-6 rounded-lg">Sign Up</a>
        </div>
    </div>
</body>

</html>