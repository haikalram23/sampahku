@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="min-h-screen flex flex-col items-center justify-center" style="scroll-behavior: smooth;">
    <div class="min-h-96 lg:min-h-screen w-full flex justify-center items-center bg-auth-bg-mobile bg-cover">
        <div class="flex flex-col justify-center items-center gap-10">
            <img src="{{ asset('images/banner-text.png') }}" alt="" class="w-full lg:w-1/2 py-2 px-2">
            <a href="#visi-misi" class="text-white bg-primary px-10 py-2 font-semibold rounded-lg">Jelajahi</a>
        </div>
    </div>
    <div id="visi-misi" class="text-center lg:w-3/5 w-4/5 flex flex-col gap-16 py-20 justify-evenly">
        <div>
            <p class="text-3xl font-bold text-slate-800 tracking-wide mb-4"><span class="text-primary">Visi</span> Kami Berdiri</p>
            <p class="text-gray-500">Menjadi platform terdepan dalam mendukung keberlanjutan lingkungan dan perekonomian dengan memfasilitasi pengelolaan sampah yang efisien dan bertanggung jawab.</p>
        </div>
        <div>
            <p class="text-3xl font-bold text-slate-800 tracking-wide mb-4"><span class="text-primary">Misi</span> Kami Berdiri</p>
            <p class="text-gray-500">Misi kami adalah menyediakan solusi pengelolaan sampah yang efisien, bertanggung jawab, dan mendukung keberlanjutan lingkungan serta ekonomi. Kami berkomitmen untuk memfasilitasi pengguna dalam memilah dan mengelola sampah, mendukung implementasi SDGs, membangun kemitraan yang kuat, memberikan insentif kepada pengguna, dan menjunjung tinggi nilai transparansi serta tanggung jawab dalam setiap langkah pengelolaan sampah.</p>
        </div>
    </div>
    <div id="about-us" class="bg-[#E1EEE5] w-full py-12">
        <div class="lg:w-3/5 w-4/5 text-center mx-auto flex flex-col gap-8 py-10 justify-evenly">
            <p class="text-3xl font-bold text-slate-800 tracking-wide mb-4">About <span class="text-primary">Us</span></p>
            <p class="text-gray-500">Sampahku! adalah sebuah platform yang bertujuan untuk menghubungkan pengguna dengan pihak pengelola sampah atau bank sampah. Kami menawarkan layanan untuk memudahkan pengguna dalam memilah sampah sebelum disetor ke bank sampah. </p>
            <p class="text-gray-500">Dengan fitur-fitur yang kami sediakan, mulai dari permintaan penjemputan sampah hingga simulasi tabungan sampah, Sampahku! mendukung implementasi SDGs (Sustainable Development Goals) khususnya poin 11 dan 12, serta poin 13, 15, dan 17.</p>
            <p class="text-gray-500">Dengan fokus pada keberlanjutan lingkungan dan kemitraan, Sampahku! memungkinkan pengguna untuk berkontribusi pada lingkungan dan mendukung perekonomian melalui pengelolaan sampah yang bertanggung jawab.</p>
        </div>
    </div>
    <div id="faqs" class="w-full py-16 px-4 lg:px-24">
        <p class="text-center text-3xl font-bold">Frequently Asked Questions</p>
        <div class="w-full lg:w-4/5 flex flex-col-reverse lg:flex-row justify-between items-center mx-auto py-4">
            <div class="flex flex-col w-4/5 lg:w-3/5 pr-0 lg:pr-8">
                @foreach ($faqs as $faq)
                <div class="border-b border-gray-200 py-4 flex flex-col">
                    <button class="accordion w-full text-left font-medium text-primary hover:text-gray-600 focus:outline-none flex justify-between items-center" type="button">
                        {{ $faq->question }}
                        <i class="ri-arrow-down-line accordion-icon"></i>
                    </button>
                    <div class="panel hidden mt-2">
                        <p class="text-gray-700">{{ $faq->answer }}</p>
                    </div>
                </div>
                @endforeach
            </div>
            <img src="{{ asset('images/faq.svg') }}" class="w-2/5">
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var acc = document.querySelectorAll(".accordion");
        acc.forEach(button => {
            button.addEventListener("click", function() {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                var icon = this.querySelector('.accordion-icon');

                if (panel.classList.contains("hidden")) {
                    panel.classList.remove("hidden");
                    icon.classList.remove("ri-arrow-down-line");
                    icon.classList.add("ri-arrow-up-line");
                } else {
                    panel.classList.add("hidden");
                    icon.classList.remove("ri-arrow-up-line");
                    icon.classList.add("ri-arrow-down-line");
                }
            });
        });
    });
</script>
@endsection