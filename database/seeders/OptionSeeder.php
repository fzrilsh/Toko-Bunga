<?php

namespace Database\Seeders;

use App\Models\Option;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            [
                'key' => 'whatsapp',
                'type' => 'medsos',
                'value' => '628985245896'
            ],
            [
                'key' => 'instagram',
                'type' => 'medsos',
                'value' => 'fzrilsh_'
            ],
            [
                'key' => 'facebook',
                'type' => 'medsos',
                'value' => 'fzrilsh_'
            ],
            [
                'key' => 'nama aplikasi',
                'type' => 'aplikasi',
                'value' => 'Toko Bunga'
            ],
            [
                'key' => 'selogan',
                'type' => 'aplikasi',
                'value' => 'Membawa keindahan bunga ke setiap momen spesial Anda dengan rangkaian yang penuh cinta.'
            ],
            [
                'key' => 'map koordinat',
                'type' => 'aplikasi',
                'value' => '-6.1751108, 106.7074002'
            ],
            [
                'key' => 'map name',
                'type' => 'aplikasi',
                'value' => 'Kota Tangerang'
            ],
            [
                'key' => 'latar belakang',
                'type' => 'aplikasi',
                'value' => 'Kami menyediakan berbagai pilihan bunga segar dan rangkaian yang indah untuk segala acara spesial Anda. Dengan layanan pengiriman yang cepat dan tepat waktu, kami memastikan setiap rangkaian bunga sampai ke tangan Anda dalam kondisi terbaik.'
            ],
            [
                'key' => 'metode pembayaran',
                'type' => 'payment',
                'value' => 'Transfer Bank,Gopay,OVO,DANA'
            ],
        ])->each(fn($v) => Option::query()->create($v));
    }
}
