<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            [
                'title' => 'Tentang Kami',
                'content' => '<h1><span class="ql-size-large">Tentang Kami</span></h1><p>“Ungkapkan Pesan Indah Melalui Rangkaian Bunga”</p><p><br></p><p>Akema Agung Florist adalah toko bunga terkemuka yang hadir untuk memenuhi kebutuhan rangkaian bunga segar dan cantik untuk berbagai keperluan. Dengan dedikasi tinggi terhadap keindahan dan kualitas, kami percaya bahwa setiap bunga memiliki kekuatan untuk menyampaikan pesan yang tulus, baik itu ucapan cinta, kebahagiaan, maupun dukacita.</p><p>Kami hadir bertepatan pada daerah Tangerang kota untuk melayani pesanan diberbagai wilayah</p><p>Keunggulan Akema Agung Florist:</p><p>1. Bunga Segar Pilihan</p><p>Kami bekerja sama dengan petani bunga terbaik untuk memastikan setiap bunga yang Anda terima segar, harum, dan berkualitas tinggi.</p><p>2. Desain Eksklusif dan Elegan</p><p>Tim florist profesional kami merancang setiap rangkaian dengan sentuhan seni yang memikat dan disesuaikan dengan kebutuhan serta keinginan Anda.</p><p>3. Layanan Personal</p><p>Kami siap membantu Anda memilih jenis bunga, warna, dan desain yang sesuai dengan momen spesial Anda.</p><p>4. Pengiriman Tepat Waktu</p><p>Kami memahami pentingnya ketepatan waktu. Oleh karena itu, kami menyediakan layanan pengiriman cepat dan aman ke lokasi pilihan Anda.</p><p><br></p><p>Layanan Utama Kami:</p><p>Buket Bunga: Untuk hadiah ulang tahun, perayaan, atau sekadar kejutan manis.</p><p>Bunga Meja: Cocok untuk dekorasi rumah, kantor, atau acara formal.</p><p>Bunga Standing: Cocok untuk ucapan grand opening suatu toko.&nbsp;</p><p>Karangan Bunga: Cocok untuk menyampaikan ucapan\pesan dalam berbagai suasana melalui karangan bunga.</p><p><br></p><p>Mengapa Memilih Akema Agung Florist?</p><p>-&nbsp;Kami mengutamakan kepuasan pelanggan.</p><p>-&nbsp;Setiap rangkaian bunga dibuat dengan cinta dan perhatian pada detail.</p><p>-&nbsp;Harga kompetitif dengan kualitas yang tidak tertandingi.</p><p>-&nbsp;Tersedia berbagai pilihan bunga local.</p><p><br></p><p>Akema Agung Florist hadir untuk membuat setiap momen Anda lebih indah dan bermakna. Percayakan kebutuhan bunga Anda kepada kami, karena kami mengerti pentingnya menyampaikan perasaan melalui keindahan bunga.</p><p><br></p><p>Alamat Toko: [Tuliskan lokasi toko Anda]</p><p>Kontak: +62 838-1373-5071 \ +62 823-1049-8541&nbsp;</p><p>Jam Operasional: 24 jam</p><p>Media Sosial:&nbsp;</p><p><br></p><p>Akema Agung Florist, tempat di mana keindahan bunga bertemu dengan ekspresi hati.</p>',
                'featured_image' => '',
                'status' => 'published',
            ],
            [
                'title' => 'Kebijakan Privasi',
                'content' => '<h1>Kebijakan Privasi</h1><p>Kami Akema Agung Florist menghargai privasi Anda dan berkomitmen untuk melindungi data pribadi Anda. Kebijakan Privasi ini menjelaskan bagaimana kami mengumpulkan, menggunakan, dan melindungi informasi Anda ketika Anda menggunakan layanan kami, baik secara online maupun offline.</p><p>1. Informasi yang Kami Kumpulkan</p><p>Kami dapat mengumpulkan informasi berikut dari Anda:</p><p>-&nbsp;Nama lengkap</p><p>-&nbsp;Nomor telepon</p><p>-&nbsp;Alamat pengiriman</p><p>-&nbsp;Informasi pembayaran (misalnya, nomor kartu kredit/debit yang diproses melalui platform pihak ketiga yang aman)</p><p><br></p><p>2. Cara Kami Menggunakan Informasi Anda</p><p>Informasi yang dikumpulkan digunakan untuk:</p><p>-&nbsp;Memproses dan mengirimkan pesanan Anda.</p><p>-&nbsp;Memberikan pembaruan terkait pesanan, seperti status pengiriman.</p><p>-&nbsp;Memenuhi kewajiban hukum atau peraturan.</p><p><br></p><p>3. Perlindungan Data</p><p>Kami mengambil langkah-langkah berikut untuk melindungi data Anda:</p><p>-&nbsp;Menggunakan teknologi enkripsi untuk transaksi pembayaran.</p><p>-&nbsp;Mengelola akses ke data pribadi hanya untuk staf yang membutuhkan.</p><p>-&nbsp;Memantau sistem kami secara rutin untuk mencegah pelanggaran keamanan.</p><p><br></p><p>4. Berbagi Informasi dengan Pihak Ketiga</p><p>Kami tidak akan menjual, menyewakan, atau memperdagangkan data pribadi Anda kepada pihak ketiga. Namun, kami dapat membagikan informasi Anda dalam situasi berikut:</p><p>-&nbsp;Mitra Pengiriman: Untuk memastikan pengiriman pesanan Anda.</p><p>-&nbsp;Pemroses Pembayaran: Untuk memproses transaksi pembayaran Anda dengan aman.</p><p>-&nbsp;Kepatuhan Hukum: Jika diwajibkan oleh hukum atau permintaan resmi dari pemerintah.</p><p><br></p><p>5. Pilihan Anda</p><p>Anda memiliki hak berikut terkait data Anda:</p><p>-&nbsp;Akses dan Perbarui: Anda dapat meminta salinan data Anda atau memperbaruinya kapan saja.</p><p>-&nbsp;Hapus Data: Anda dapat meminta kami untuk menghapus data Anda, kecuali jika ada kewajiban hukum untuk menyimpannya.</p><p><br></p><p>Untuk menggunakan hak ini, hubungi kami melalui kontak yang disediakan di bawah ini.</p><p><br></p><p>6. Perubahan pada Kebijakan Privasi</p><p>Kami dapat memperbarui Kebijakan Privasi ini dari waktu ke waktu. Setiap perubahan akan diberitahukan melalui situs kami, dan tanggal pembaruan akan diperbarui di bagian atas kebijakan ini.</p><p><br></p><p>7. Hubungi Kami</p><p>Jika Anda memiliki pertanyaan, keluhan, atau permintaan terkait privasi Anda, silakan hubungi kami:</p><p>Email:</p><p>Telepon:&nbsp;</p><p>Alamat:</p><p><br></p><p>Kami berkomitmen untuk memberikan pengalaman belanja yang aman dan nyaman kepada Anda.</p><p><br></p><p>Akema Agung Florist</p><p>"Ungkapkan Pesan Indah Melalui Rangkaian Bunga”</p><p><br></p><p class="ql-align-justify">Syarat dan Ketentuan Akema Agung Florist</p>',
                'featured_image' => '',
                'status' => 'published',
            ],
            [
                'title' => 'Syarat & Ketentuan',
                'content' => '<h1>Syarat &amp; Ketentuan</h1><p>1. Ketersediaan Produk</p><p>- Akema Agung Florist menyediakan berbagai macam rangkaian bunga sesuai katalog yang tersedia.</p><p>- Jika stok bunga tertentu habis, Akema Agung Florist berhak mengganti dengan bunga serupa yang memiliki kualitas dan nilai setara, tanpa pemberitahuan sebelumnya.</p><p><br></p><p>2. Pemesanan</p><p>- Semua pesanan harus dilakukan minimal 1-3 hari sebelum tanggal pengiriman untuk memastikan ketersediaan bunga.</p><p>- Pemesanan dianggap sah setelah konfirmasi pembayaran awal diterima.</p><p>- Pelanggan wajib memberikan informasi yang akurat terkait nama, alamat, nomor telepon, dan tanggal pengiriman.</p><p><br></p><p>3. Pembayaran</p><p>- Akema Florist menerima pembayaran melalui transfer bank, atau metode lain yang disepakati.</p><p>- Semua pembayaran bersifat non-refundable, kecuali terdapat kesalahan dari pihak Akema Florist.</p><p><br></p><p>4. Pengiriman</p><p>- Pengiriman dilakukan setiap hari kerja, kecuali hari libur nasional atau kondisi tertentu yang diinformasikan sebelumnya.</p><p>- Biaya pengiriman dihitung berdasarkan lokasi tujuan dan akan diinformasikan kepada pelanggan sebelum pembayaran dilakukan.</p><p>- Akema Agung Florist tidak bertanggung jawab atas keterlambatan yang disebabkan oleh faktor eksternal seperti cuaca, lalu lintas, atau kejadian tidak terduga lainnya.</p><p><br></p><p>5. Pengembalian dan Pembatalan Pesanan</p><p>- Pembatalan pesanan hanya dapat dilakukan maksimal 24 jam sebelum tanggal pengiriman, dengan pemberitahuan resmi melalui kontak Akema Agung Florist.</p><p>- Jika produk yang diterima dalam kondisi rusak atau tidak sesuai pesanan, pelanggan dapat mengajukan komplain dalam waktu maksimal 24 jam setelah penerimaan produk.</p><p>- Akema Florist akan mengganti produk atau memberikan solusi sesuai kebijakan yang berlaku.</p><p><br></p><p>6. Perawatan Produk</p><p>- Bunga yang dikirim dilengkapi dengan panduan perawatan. Kerusakan bunga akibat kelalaian dalam perawatan menjadi tanggung jawab pelanggan.</p><p><br></p><p>7. Kebijakan Privasi</p><p>Akema Agung Florist menjaga kerahasiaan data pelanggan dan tidak akan membagikan informasi pribadi kepada pihak ketiga tanpa izin.</p><p><br></p><p>8. Force Majeure</p><p>Akema Agung Florist tidak bertanggung jawab atas kerugian atau kerusakan yang disebabkan oleh kejadian di luar kendali, seperti bencana alam, pemogokan kerja, atau gangguan lainnya.</p><p><br></p><p>9. Penyelesaian Sengketa</p><p class="ql-align-justify">Apabila terjadi sengketa, pelanggan dan Akema Agung Florist sepakat untuk menyelesaikannya secara musyawarah. Jika tidak tercapai kesepakatan, penyelesaian akan dilakukan sesuai hukum yang berlaku di wilayah operasional Akema Agung Florist.</p>',
                'featured_image' => '',
                'status' => 'published',
            ],
            [
                'title' => 'Cara Pemesanan',
                'content' => '<h1>Cara Pemesanan</h1><p>Memesan bunga secara online di Akema Agung Florist mudah sekali, karena anda dapat memesan dengan cara berikut ini:</p><ol><li>Kunjungi website Akema Agung Florist/ Instagram/ toko aplikasi lain milik kami.</li><li>Pilih produk di halaman beranda (homepage) atau melalui Koleksi Produk sesuai kebutuhan Anda.</li><li>Klik produk yang diinginkan.</li><li>Klik tombol Pesan Di sini.</li><li>Anda dapat langsung komunikasi dengan customer service kami.</li><li>konfirmasi data pembayaran, alamat penagihan, dan alamat pengiriman.&nbsp;</li></ol>',
                'featured_image' => '',
                'status' => 'published',
            ],
            [
                'title' => 'Pengiriman',
                'content' => '<h1>Tentang Kami</h1><p><strong>Same Day Delivery</strong></p><p>Untuk menjaga kualitas dan kesegaran rangkaian bunga yang dipesan, kami menyediakan jasa layanan pengiriman di hari yang sama sesuai permintaan Anda. Rangkaian bunga baru akan diproses setelah Anda menyelesaikan pembayaran pada hari yang sama saat anda memesan.</p><p><br></p><p>Same day delivery berlaku untuk pemesanan semua tipe bunga. Metode ini juga berlaku untuk pengiriman dalam area Jabodetabek.</p><p><br></p><p><strong>Waktu Pengiriman Bunga</strong></p><p>Proses pengiriman bunga di Akema Agung Florist tergantung waktu yang anda inginkan, kami jamin bunga sampai Lokasi dengan tepat waktu.</p><p><br></p><p><strong>Biaya Pengiriman dan Kurir Kami</strong></p><p>Biaya pengiriman akan ditagihkan kepada Anda dan ditotal dengan harga rangkaian bunga yang dipesan. Untuk pengiriman Jabodetabek akan free, biaya pengiriman akan ditentukan kami dari seberapa jauh daerah tersebut.</p><p><br></p><p>Setelah transaksi Anda berhasil, bunga akan segera dirangkai dengan indah lalu dijemput oleh mitra kurir terpercaya kami untuk diantarkan ke alamat tujuan Anda.</p>',
                'featured_image' => '',
                'status' => 'published',
            ],
        ])->each(function ($page) {
            $page['slug'] = Str::slug($page['title']);
            Page::query()->create($page);
        });
    }
}
