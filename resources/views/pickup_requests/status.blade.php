<!-- resources/views/pickup_requests/status.blade.php -->
@extends('layouts.app')

@section('title', 'Status')

@section('content')
<div class="container mx-auto px-6 lg:px-0 w-full lg:w-1/2 py-28">
    <h1 class="text-3xl font-bold mb-6 text-gray-800 text-center">Minta Jemput Sampah</h1>
    @if($pickupRequest->status == 'tunggu')
    <div class="p-4 flex flex-col items-center rounded-md">
        <img src="{{ asset('images/menunggu.png') }}" alt="menunggu" class="w-2/5 mx-auto">
        <p class="text-gray-800 pt-4 lg:pt-0 text-center">Tunggu sebentar ya! Admin sedang memproses permintaanmu...</p>
    </div>
    @elseif($pickupRequest->status == 'terima')
    <div>
        <div class="mb-4">
            <label for="alamat" class="block text-gray-700 mb-2 font-medium">Alamat Lengkap</label>
            <input type="text" id="alamat" name="alamat" class="shadow appearance-none border rounded-lg w-full py-3 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" disabled readonly required value="{{ $pickupRequest->alamat }}">
        </div>
        <div class="mb-4 relative">
            <label for="jenis_sampah" class="block text-gray-700 mb-2 font-medium">Jenis Sampah</label>
            <input type="text" id="jenis_sampah" name="jenis_sampah" class="shadow appearance-none border rounded-lg w-full py-3 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" disabled readonly required value="{{ $pickupRequest->jenis_sampah }}">
        </div>

        <div class="mb-4">
            <label for="berat_sampah" class="block text-gray-700 mb-2 font-medium">Berat Sampah (dalam kg):</label>
            <div class="flex items-center w-full lg:w-1/4">
                <input type="number" step="0.1" id="berat_sampah" name="berat_sampah" class="shadow appearance-none border rounded-l-lg w-full py-3 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required disabled readonly value="{{ $pickupRequest->berat_sampah }}">
                <span class="shadow border rounded-r-lg px-3 py-2 bg-gray-200 text-gray-700">kg</span>
            </div>
        </div>
        <div class="mb-4">
            <label for="tanggal" class="block text-gray-700 font-bold mb-2">Hari Jemput</label>
            <input type="date" id="tanggal" name="tanggal" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required disabled readonly value="{{ $pickupRequest->tanggal }}">
        </div>
        <div class="mb-4">
            <label for="jam" class="block text-gray-700 font-bold mb-2">Waktu Jemput</label>
            <input type="time" id="jam" name="jam" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required disabled readonly value="{{ $pickupRequest->jam }}">
        </div>
        <div class="flex justify-end">
            <p class="text-primary bg-white border font-semibold border-primary px-4 py-2 rounded-lg">PERMINTAAN ANDA DISETUJUI</p>
        </div>
    </div>
    @elseif($pickupRequest->status == 'tolak')
    <div>
        <div class="mb-4">
            <label for="alamat" class="block text-gray-700 mb-2 font-medium">Alamat Lengkap</label>
            <input type="text" id="alamat" name="alamat" class="shadow appearance-none border rounded-lg w-full py-3 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" disabled readonly required value="{{ $pickupRequest->alamat }}">
        </div>
        <div class="mb-4 relative">
            <label for="jenis_sampah" class="block text-gray-700 mb-2 font-medium">Jenis Sampah</label>
            <input type="text" id="jenis_sampah" name="jenis_sampah" class="shadow appearance-none border rounded-lg w-full py-3 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" disabled readonly required value="{{ $pickupRequest->jenis_sampah }}">
        </div>

        <div class="mb-4">
            <label for="berat_sampah" class="block text-gray-700 mb-2 font-medium">Berat Sampah (dalam kg):</label>
            <div class="flex items-center w-full lg:w-1/4">
                <input type="number" step="0.1" id="berat_sampah" name="berat_sampah" class="shadow appearance-none border rounded-l-lg w-full py-3 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required disabled readonly value="{{ $pickupRequest->berat_sampah }}">
                <span class="shadow border rounded-r-lg px-3 py-2 bg-gray-200 text-gray-700">kg</span>
            </div>
        </div>
        <div class="mb-4">
            <label for="tanggal" class="block text-gray-700 font-bold mb-2">Hari Jemput</label>
            <input type="date" id="tanggal" name="tanggal" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required disabled readonly value="{{ $pickupRequest->tanggal }}">
        </div>
        <div class="mb-4">
            <label for="jam" class="block text-gray-700 font-bold mb-2">Waktu Jemput</label>
            <input type="time" id="jam" name="jam" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required disabled readonly value="{{ $pickupRequest->jam }}">
        </div>
        <div class="flex justify-end">
            <p class="text-red-600 bg-white border font-semibold border-red-600 px-4 py-2 rounded-lg">PERMINTAAN ANDA DITOLAK</p>
        </div>
    </div>
    @endif
</div>
@endsection