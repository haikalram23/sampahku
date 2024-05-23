<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Faq;

class FaqSeeder extends Seeder
{
    public function run()
    {
        Faq::create(['question' => 'Kapan sampah saya akan diambil?', 'answer' => 'Sampah Anda akan diambil setelah dikonfirmasi oleh admin bank sampah. Setelah Anda mengajukan permintaan pengambilan sampah melalui aplikasi Sampahku!, tim admin bank sampah akan memverifikasi permintaan tersebut.']);
        Faq::create(['question' => 'Bagaimana sampah saya ditukarkan?', 'answer' => 'Sampah ditukarkan dengan poin/imbalan setelah dipisahkan, diverifikasi, dan ditimbang di titik pengumpulan atau melalui layanan penjemputan.']);
        Faq::create(['question' => 'Bagaimana mekanisme penjemputan sampah?', 'answer' => 'Jadwalkan penjemputan melalui aplikasi/situs, tim akan menjemput sampah yang sudah dipisahkan sesuai kategori pada waktu yang ditentukan.']);
        Faq::create(['question' => 'Apakah ada kategori sampah tertentu yang harus dipisahkan?', 'answer' => 'Ya, pisahkan sampah organik, anorganik, berbahaya, dan khusus sesuai panduan layanan pengelolaan sampah yang Anda gunakan.']);
    }
}
