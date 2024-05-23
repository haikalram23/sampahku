@extends('layouts.app')

@section('title', 'Riwayat Permintaan Jemput Sampah')

@section('content')
<div class="mx-auto w-4/5 py-8 min-h-screen">
    <div class="flex w-full justify-end mb-4">
        <a href="{{ route('pickup_requests.create') }}" class="bg-primary text-white px-6 py-2 rounded-lg"><i class="ri-add-circle-line mr-2"></i>Tambah</a>
    </div>
    <h1 class="text-3xl font-bold mb-6 text-gray-800 text-center">Riwayat Pickup Request</h1>

    @if($pickupRequests->isEmpty())
    <p class="text-center text-gray-500">Belum ada riwayat permintaan jemput sampah.</p>
    @else
    <div id="pickup-request-container">
        @foreach($pickupRequests as $pickupRequest)
        <div class="pickup-request-item w-full flex justify-between flex-col lg:flex-row items-center px-8 py-6 border border-gray-300 rounded-lg gap-4 lg:gap-0 mb-4">
            <div class="w-full lg:w-1/4 font-medium flex flex-col gap-3">
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
            <div class="w-full lg:w-2/4 font-medium flex flex-col gap-3 border-0 py-4 lg:py-0 lg:border-x lg:px-24 border-gray-300">
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
            <div class="w-full lg:w-1/4 font-medium justify-center items-center flex flex-col gap-3">
                <a href="{{ route('pickup_requests.status', $pickupRequest->id) }}" class="relative text-primary hover:text-gray-500 cursor-pointer transition-all ease-in-out before:transition-[width] before:ease-in-out before:duration-700 before:absolute before:bg-gray-500 before:origin-center before:h-[2px] before:w-0 hover:before:w-[50%] before:bottom-0 before:left-[50%] after:transition-[width] after:ease-in-out after:duration-700 after:absolute after:bg-primary after:origin-center after:h-[2px] after:w-0 hover:after:w-[50%] after:bottom-0 after:right-[50%]">Detail</a>
            </div>
        </div>
        @endforeach
    </div>

    @if($pickupRequests->hasMorePages())
    <div class="flex justify-center mt-4">
        <button id="load-more" class="bg-primary text-white px-6 py-2">Show More</button>
    </div>
    @endif
    @endif
</div>

<script>
    const loadMoreButton = document.getElementById('load-more');

    loadMoreButton.addEventListener('click', () => {
        const nextPageUrl = '{{ $pickupRequests->nextPageUrl() }}';

        fetch(nextPageUrl)
            .then(response => response.text())
            .then(html => {
                const tempElement = document.createElement('div');
                tempElement.innerHTML = html;

                const newItems = tempElement.querySelectorAll('.pickup-request-item');
                newItems.forEach(item => {
                    document.getElementById('pickup-request-container').appendChild(item);
                });

                // Update the load more button if there are more pages
                const hasMorePages = tempElement.querySelector('.has-more-pages');
                if (!hasMorePages) {
                    loadMoreButton.remove();
                }
            });
    });
</script>
@endsection