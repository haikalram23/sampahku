<!-- resources/views/pickup_requests/schedule.blade.php -->
@extends('layouts.app')

@section('title', 'Pilih Jadwal')

@section('content')
<div class="container mx-auto w-full lg:w-1/3 py-24">
    <h1 class="text-3xl font-bold mb-6 text-gray-800 text-center">Minta Jemput Sampah</h1>

    <form method="POST" action="{{ route('pickup_requests.updateSchedule', $pickupRequest->id) }}" class="border border-gray-300 px-12 py-8 rounded-xl">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="tanggal" class="block text-gray-700 font-bold mb-2">Tanggal</label>
            <input type="date" id="tanggal" name="tanggal" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>
        <div class="mb-4">
            <label for="jam" class="block text-gray-700 font-bold mb-2">Jam</label>
            <input type="time" id="jam" name="jam" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>
        <div class="flex justify-center lg:justify-end mt-4">
            <button type="submit" class="bg-primary hover:bg-primary/80 text-white font-semibold py-2 px-24 rounded-lg focus:outline-none focus:shadow-outline">
                Minta Jemput
            </button>
        </div>
    </form>
</div>
@endsection