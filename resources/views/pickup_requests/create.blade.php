<!-- resources/views/pickup_requests/create.blade.php -->
@extends('layouts.app')

@section('title', 'Minta Jemput')

@section('content')
<div class="container px-6 lg:px-0 mx-auto w-full lg:w-1/2 py-24">
    <h1 class="text-3xl font-bold mb-6 text-gray-800 text-center">Minta Jemput Sampah</h1>

    <form method="POST" action="{{ route('pickup_requests.store') }}" class="border border-gray-300 px-12 py-8 rounded-xl">
        @csrf
        <div class="mb-4">
            <label for="alamat" class="block text-gray-700 mb-2 font-medium">Alamat Lengkap</label>
            <input type="text" id="alamat" name="alamat" class="shadow appearance-none border rounded-lg w-full py-3 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>
        <div class="mb-4 relative">
            <label for="jenis_sampah" class="block text-gray-700 mb-2 font-medium">Jenis Sampah</label>
            <select id="jenis_sampah" name="jenis_sampah" class="shadow appearance-none border rounded-lg w-full py-3 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline pr-10" required>
                <option value="organik">Organik</option>
                <option value="anorganik">Anorganik</option>
                <option value="berbahaya">Bahan Berbahaya dan Beracun (B3)</option>
                <option value="logam">Logam</option>
                <option value="kertas">Kertas</option>
                <option value="plastik">Plastik</option>
                <option value="kaca">Kaca</option>
            </select>
            <i class="ri-arrow-down-s-line absolute right-3 top-14 text-xl transform -translate-y-1/2 pointer-events-none text-gray-500"></i>
        </div>

        <div class="mb-4">
            <label for="berat_sampah" class="block text-gray-700 mb-2 font-medium">Berat Sampah (dalam kg):</label>
            <div class="flex items-center w-full lg:w-1/4">
                <input type="number" step="0.1" id="berat_sampah" name="berat_sampah" class="shadow appearance-none border rounded-l-lg w-full py-3 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                <span class="shadow border rounded-r-lg px-3 py-2 bg-gray-200 text-gray-700">kg</span>
            </div>
        </div>

        <div class="flex justify-center lg:justify-end">
            <button type="submit" class="bg-primary hover:bg-primary/80 text-white font-semibold py-2 px-24 rounded-lg focus:outline-none focus:shadow-outline">
                Pilih Jadwal
            </button>
        </div>
    </form>
</div>
@endsection