<?php

namespace Database\Seeders;

use App\Models\Option;
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
                'key' => 'nama aplikasi',
                'type' => 'aplikasi',
                'value' => 'Damai Agung Florist',
            ],
            [
                'key' => 'selogan',
                'type' => 'aplikasi',
                'value' => 'Ungkapkan Pesan Indah Melalui Rangkaian Bunga',
            ],
            [
                'key' => 'map koordinat',
                'type' => 'aplikasi',
                'value' => '-6.1820944, 106.6428366',
            ],
            [
                'key' => 'map name',
                'type' => 'aplikasi',
                'value' => 'Jl. Eksekusi 2 Blok E2 No.8, RT.001/RW.008, Sukasari, Kec. Tangerang, Kota Tangerang, Banten 15118',
            ],
            [
                'key' => 'latar belakang',
                'type' => 'aplikasi',
                'value' => "Damai Agung Florist adalah toko bunga terkemuka yang hadir untuk memenuhi kebutuhan rangkaian bunga segar dan cantik untuk berbagai keperluan. Dengan dedikasi tinggi terhadap keindahan dan kualitas, kami percaya bahwa setiap bunga memiliki kekuatan untuk menyampaikan pesan yang tulus, baik itu ucapan cinta, kebahagiaan, maupun dukacita.
Kami hadir bertepatan pada daerah Tangerang kota untuk melayani pesanan diberbagai wilayah",
            ],
            [
                'key' => 'metode pembayaran',
                'type' => 'payment',
                'value' => 'Transfer Bank,Gopay,OVO,DANA',
            ],
            [
                'key' => 'whatsapp',
                'type' => 'sosial media',
                'value' => '6282310498541',
            ],
            [
                'key' => 'instagram',
                'type' => 'sosial media',
                'value' => 'https://www.instagram.com/#',
            ],
            [
                'key' => 'facebook',
                'type' => 'sosial media',
                'value' => 'https://www.facebook.com/#',
            ]
        ])->each(fn ($v) => Option::query()->create($v));
    }
}
