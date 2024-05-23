@extends('layouts.admin')

@section('title', 'Detail Pickup Request')

@section('content')
<div class="min-h-[85vh] flex flex-col justify-center items-center">
    <h1 class="text-3xl font-bold mb-6 text-gray-800 my-auto text-center">Pickup Request</h1>
    <div class="w-4/5 mx-auto my-auto flex justify-between items-center px-8 py-6 border border-gray-300 rounded-lg">
        <div class="w-1/4 font-medium flex flex-col gap-10">
            <p class="text-gray-500">JPT00{{ $pickupRequest->id }}</p>
            <div>
                <p class="text-gray-500">Nama Nasabah</p>
                <p class="text-gray-800">{{ $pickupRequest->user->nama }}</p>
            </div>
            <div>
                <p class="text-gray-500">Alamat Lengkap</p>
                <p class="text-gray-800">{{ $pickupRequest->alamat }}</p>
            </div>
        </div>
        <div class="w-2/4 font-medium flex flex-col gap-10 border-x px-24 border-gray-300">
            <div class="flex flex-row justify-between">
                <p class="text-gray-500">Jenis Sampah</p>
                <p class="text-gray-800">{{ $pickupRequest->jenis_sampah }}</p>
            </div>
            <div class="flex justify-between">
                <p class="text-gray-500">Berat Sampah (dalam kg)</p>
                <p class="text-gray-800">{{ $pickupRequest->berat_sampah }} kg</p>
            </div>
            <div class="flex justify-between">
                <p class="text-gray-500">Hari Jemput</p>
                <p class="text-gray-800">{{ $pickupRequest->tanggal }}</p>
            </div>
            <div class="flex justify-between">
                <p class="text-gray-500">Waktu Jemput</p>
                <p class="text-gray-800">{{ $pickupRequest->jam }}</p>
            </div>
        </div>
        <div class="1/4 flex justify-evenly items-center flex-col gap-4">
            @if($pickupRequest->status === 'tunggu')
            <form method="POST" action="{{ route('admin.pickup-requests.approve', $pickupRequest->id) }}">
                @csrf
                <button type="submit" class="bg-primary text-white rounded-lg px-9 pr-12 py-2">Setujui</button>
            </form>
            <form method="POST" action="{{ route('admin.pickup-requests.reject', $pickupRequest->id) }}">
                @csrf
                <button type="submit" class="bg-red-600 text-white rounded-lg px-10 pr-12 py-2">Tolak</button>
            </form>
            @elseif($pickupRequest->status === 'terima')
            <p class="text-primary bg-white border font-semibold border-primary px-4 py-2 mr-4 rounded-lg">SUDAH DISETUJUI</p>
            @elseif($pickupRequest->status === 'tolak')
            <p class="text-red-600 bg-white border font-semibold border-red-600 px-4 py-2 mr-4 rounded-lg">SUDAH DITOLAK</p>
            @endif
        </div>
    </div>
</div>
@endsection