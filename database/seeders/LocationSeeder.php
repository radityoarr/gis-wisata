<?php 

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    public function run()
    {
        Location::insert([
            [
                "nama" => "Alun Alun Batu",
                "deskripsi" => "Alun-alun Kota Batu menjadi destinasi wisata keluarga murah meriah. Alun-alun yang buka 24 jam ini punya konsep ramah anak. Lampion dan lampu berderet, patung-patung hewan tersebar di area taman. juga terdapat komidi putar bila ingin menikmati pemandangan dari ketinggian.",
                "thumbnail" => "https://lh3.googleusercontent.com/-R0ipuAxdPus/VpgqL1YRyRI/AAAAAAAACdI/XWkGUZpTegE/s250-Ic42/thumbnail_alun_alun_batu.jpg",
                "gambar" => "https://lh3.googleusercontent.com/-bFfINcFXjFM/VpgkzblyBhI/AAAAAAAACbg/r6z0tBnCBMY/s800-Ic42/alun_alun_batu.jpg",
                "latitude" => -7.87100,
                "longitude" => 112.52689,
                "fasilitas" => "Ayunan, Perosotan, Meja piknik, Toilet umum",
                "alamat" => "Jl. Diponegoro, Sisir, Kec. Batu, Kota Batu, Jawa Timur 65314",
                "harga_tiket" => "Gratis",
                "jam_operasional" => "24 jam"
            ],
            [
                "nama" => "Jatim Park 1",
                "deskripsi" => "Obyek wisata ini memiliki 36 wahana, di antaranya kolam renang raksasa (dengan latar belakang patung Ken Dedes, Ken Arok, dan Mpu Gandring), spinning coaster, dan drop zone. Wahana pendidikan yang menjadi pusat perhatian diantaranya adalah Volcano dan Galeri Nusantara yang juga terdapat tanaman agro, diorama binatang langka, dan miniatur candi-candi.",
                "thumbnail" => "https://lh3.googleusercontent.com/-dXQZBPwxpyw/VpgqOJlOudI/AAAAAAAACdo/RjUPX5853kU/s250-Ic42/thumbnail_jatim_park_1.jpg",
                "gambar" => "https://lh3.googleusercontent.com/-Il506qnMu4E/VpglCmG080I/AAAAAAAACcI/Bx6OU9x17nU/s550-Ic42/jatim_park_1.jpg",
                "latitude" => -7.883913062653717,
                "longitude" => 112.52506845046842,
                "fasilitas" => "Food Court, Shuttle Car, Pasar Wisata, Pasar Bunga, Kolam Renang",
                "alamat" => "Jl. Dewi Sartika Atas, Sisir, Kec. Batu, Kota Batu, Jawa Timur 65314",
                "harga_tiket" => "Weekday: Rp 115.000-150.000, Weekend: Rp 125.000-170.000",
                "jam_operasional" => "08.30-16.30"
            ],
            [
                "nama"=> "Jatim Park 2",
                "deskripsi"=> "Jatim Park 2 terdiri dari Secret Zoo, Museum Satwa, dan Hotel Pohon Inn. Secret Zoo memiliki koleksi satwa yang langka dan tidak kalah bagus dengan kebun binatang lain yang berada di Indonesia. Arsitektur kebun binatang ini pun berskala internasional. Museum satwa merupakan wahana edukasi, dimana pengunjung dapat melihat diorama-diprama hewan dari berbagai belahan dunia. Hotel Pohon Inn merupakan Hotel yang design interior dan exteriornya kental dengan nuansa satwa.",
                "thumbnail"=> "https://lh3.googleusercontent.com/-1p_Aq_RpJ6E/VpgqZ9xNl0I/AAAAAAAACeA/yymkwXRbfjU/s250-Ic42/thumbnail_jatim_park_2.jpg",
                "gambar"=> "https://lh3.googleusercontent.com/-H6n8yEOC-OY/VpglD-mdayI/AAAAAAAACcQ/1YcywSGWRmI/s640-Ic42/jatim_park_2.jpg",
                "latitude"=> -7.887957,
                "longitude"=> 112.529543,
                "fasilitas"=> "Shuttle Car, E-Bike, Food Court, Dodo Train Station, Toilet Umum, Pusat Informasi, Area Parkir, Mushola",
                "alamat"=> "Jl. Raya Oro-Oro Ombo No.9, Temas, Kec. Batu, Kota Batu, Jawa Timur 65315",
                "harga_tiket"=> "Weekday: 140.000, Weekend: Rp 160.000",
                "jam_operasional" => "08.30-16.30 WIB"
            ],
            [
                "nama"=> "Museum Angkut",
                "deskripsi"=> "Museum Angkut berisi berbagai produk alat transportasi dari berbagai penjuru dunia. Koleksi yang dipajang mulai dari yang tradisional hingga modern, dari angkutan darat, laut dan udara dengan penataan begitu sistematis. dengan luas sekitar 3,7 hektar ini termasuk museum transportasi terlengkap di Asia.",
                "thumbnail"=> "https://lh3.googleusercontent.com/-INv4HNJR5HY/VpgqaVe6FwI/AAAAAAAACeM/WR1_qBTDrB8/s250-Ic42/thumbnail_museum_angkut.jpg",
                "gambar"=> "https://lh3.googleusercontent.com/-2ZiHQ6NSsxc/VpglGc13FtI/AAAAAAAACck/GAnCmppjpcE/s640-Ic42/museum_angkut.jpg",
                "latitude"=> -7.878553938526902,
                "longitude"=> 112.51994251349332,
                "fasilitas"=> "Free Shuttle Car, Food Court, Mushola, Penyewaan Kursi Roda, Pusat Informasi, ATM Center",
                "alamat"=> "Jl. Terusan Sultan Agung No.2, Ngaglik, Kec. Batu, Kota Batu, Jawa Timur 65314, Batu, Malang, Jawa Timur, Indonesia",
                "harga_tiket"=> "Rp 110.000 - Rp 170.000",
                "jam_operasional" => "12.00-20.00 WIB"
            ],
            [
                "nama"=> "BNS (Batu Night Spectacular)",
                "deskripsi"=> "BNS merupakan objek wisata yang cocok untuk dikunjungi di malam hari. Suasana Pasar Malam bergaya modern siap menemani anda sekeluarga selama berada di sini. Banyak wahana menarik, salah satunya adalah Lampion Garden BNS, dimana berbagai macam bentuk dan ukuran yang besar sering dijadikan objek untuk berfoto.",
                "thumbnail"=> "https://lh3.googleusercontent.com/-prX1nLmoVWQ/VpgqNCl3V_I/AAAAAAAACdk/AEyTwl-b8A8/s250-Ic42/thumbnail_bns.jpg",
                "gambar"=> "https://lh3.googleusercontent.com/-ZII5vdogxEE/VpglAZj5OLI/AAAAAAAACb4/-byfn6TBaOw/s600-Ic42/bns.jpg",
                "latitude"=> -7.896249,
                "longitude"=> 112.534446,
                "fasilitas"=> "Penginapan, Toilet, Mushola, Gazebo, Rumah Makan, Area Parkir, Wahana Permainan, Outbound, Cafe, Pusat Informasi, Klinik, Toko Oleh-oleh, Tempat Sampah",
                "alamat"=> "Jl. Raya Oro-Oro Ombo No.65316, Oro-Oro Ombo, Kec. Batu, Kota Batu, Jawa Timur 65316",
                "harga_tiket"=> "Rp35.000 - Rp120.000",
                "jam_operasional" => "15.30-23.00 WIB"
            ],
            [
                "nama"=> "Eco Green Park",
                "deskripsi"=> "Merupakan tempat wisata yang bernuansa ekosistem dan lingkungan yang dikemas secara cantik dan bertaraf internasional dengan udara yang sejuk dan lukisan alam yang indah. Menyediakan 37 wahana yang memadukan Konsep Wisata Alam, Kebudayaan, Lingkungan dan Seni inspiratif, Menarik dan Mendidik.",
                "thumbnail"=> "https://lh3.googleusercontent.com/-L_popIMoHzA/VpgqOEIO1OI/AAAAAAAACds/J69a-96ldUM/s250-Ic42/thumbnail_eco_green_park.jpg",
                "gambar"=> "https://lh3.googleusercontent.com/-lUFR30XMbX8/VpglCYAN-II/AAAAAAAACcE/pHkKfqeSK9s/s720-Ic42/eco_green_park.jpg",
                "latitude"=> -7.887530763522567,
                "longitude"=> 112.52659946537868,
                "fasilitas"=> "Penginapan, Toilet, Mushola, Gazebo, Wahana Permainan, Area Parkir, Rumah Makan, Outbound, Cafe, Pusat Informasi, Klinik, Toko Oleh-oleh, dan Tempat Sampah",
                "alamat"=> "Jl. Raya Oro-Oro Ombo No.9A, Sisir, Kec. Batu, Kota Batu, Jawa Timur 65314",
                "harga_tiket"=> "Rp55.000 - Rp75.000",
                "jam_operasional" => "08.30-16.30 WIB"
            ],
            [
                "nama"=> "Wisata Paralayang",
                "deskripsi"=> "Wisata Paralayang di Gunung Banyak adalah salah satu wisata outdoor yang sangat mengasyikkan di kota Batu. perpaduan antara keindahan alam pegunungan, hutan di samping kanan dan kiri dari gunung banyak di tambah tatanan kota dan perkampungan dari kota batu yang terlihat dibawahnya.",
                "thumbnail"=> "https://lh3.googleusercontent.com/-eZ5qjxh-fm8/VpgqbYcvgqI/AAAAAAAACeQ/Q0rRCG2PsJg/s250-Ic42/thumbnail_paralayang.jpg",
                "gambar"=> "https://lh3.googleusercontent.com/-Qao1JSYcWr4/VpglHDuQenI/AAAAAAAACcs/x0pSoEHW4CA/s500-Ic42/paralayang.jpg",
                "latitude"=> -7.8549395901478585,
                "longitude"=> 112.49672971256122,
                "fasilitas"=> "Arena Paralayang, Omah Kayu, Penginapan",
                "alamat"=> "Jl. Trunojoyo Gg. IV, Songgokerto, Kec. Batu, Kota Batu, Jawa Timur 65312, Batu (city) 65312",
                "harga_tiket"=> "Rp500.000 - Rp700.000",
                "jam_operasional" => "Senin - Kamis : 07.00-17.00 WIB, Jumat : 13.00-17.00 WIB, Sabtu-Minggu : 24 jam"		
            ],
            [
                "nama"=> "Rumah Kayu",
                "deskripsi"=> "Rumah Pohon Atau Omah Kayu Batu Malang Berada Di Kawasan Wisata Paralayang Gunung Banyak Pujon Batu Malang. Lokasi Omah Kayu ini di sebelah utara landasan paralayang, para pengunjung dapat dengan mudah menemukan papan penunjuknya.",
                "thumbnail"=> "https://lh3.googleusercontent.com/-EvS2EuYl2Is/VpgqaqcW75I/AAAAAAAACeI/S_9SlWOhsMs/s250-Ic42/thumbnail_omah_kayu.jpg",
                "gambar"=> "https://lh3.googleusercontent.com/-vgzz76xh1IA/VpglF7sJNJI/AAAAAAAACco/w-Dj5WEhGy8/s720-Ic42/omah_kayu.jpg",
                "latitude"=> -7.854870214024692,
                "longitude"=> 112.4978344167869,
                "fasilitas"=>"Penginapan, Toilet, Area Parkir, Musholla, Rumah Makan, Tempat Oleh-Oleh",
                "alamat"=> "Jl. Gn. Banyak, Gunungsari, Kec. Bumiaji, Kota Batu, Jawa Timur 65312",
                "harga_tiket"=> "Rp10.000",
                "jam_operasional" => "09.00-17.00 WIB" 	
            ],
            [
                "nama"=> "Coban Talun",
                "deskripsi"=> "Coban Talun  berada di kawasan wisata Bumi Perkemahan Coban Talun di lereng barat Gunung Arjuna - Welirang.  Coban ini memiliki ketinggian sekitar 75 meter dengan diameter +/-15 meter dan pemandangan yang elok di sekitar lokasinya. ",
                "thumbnail"=> "https://lh3.googleusercontent.com/-W3Lt0fCASog/Vql4AT4ZQ-I/AAAAAAAACoA/RTeOX6VI6lw/s250-Ic42/thumbnail_coban_talun.jpg",
                "gambar"=> "https://lh3.googleusercontent.com/-UVhRyHOVKdM/Vql2-G8TA3I/AAAAAAAACn0/xK5n2Ka5sKU/s720-Ic42/coban_talun.jpg",
                "latitude"=> -7.802473856153216,
                "longitude"=> 112.51690864479221,
                "fasilitas"=> "Penginapan, Toilet, Mushola, Gazebo, Rumah Makan, Area Parkir, Outbound, Pusat Informasi, Toko Oleh-oleh, dan Tempat Sampah",
                "alamat"=> "Tulungrejo, Kec. Bumiaji, Kota Batu, Jawa Timur",
                "harga_tiket"=> "Rp10.000",
                "jam_operasional" => "08.00-16.00 WIB" 
            ],
            [
                "nama"=> "Selecta",
                "deskripsi"=> "Selecta sudah menjadi tempat wisata sejak tahun 1930-an, sejak masih penjajahan Belanda. Selecta dalam bahasa Belanda, yang artinya adalah pilihan.",
                "thumbnail"=> "https://lh3.googleusercontent.com/-tWj_l47ERuo/Vqg8rkEBFEI/AAAAAAAACmc/_nU1rK4L62A/s250-Ic42/thumbnail_selecta.jpg",
                "gambar"=> "https://lh3.googleusercontent.com/-LQlZ9cD10so/Vqg8JHeo2kI/AAAAAAAACmU/UVOp1BghCnk/s800-Ic42/selecta.jpg",
                "latitude"=> -7.811354428588046,
                "longitude"=> 112.525518578046,
                "fasilitas"=> "Penginapan, Toilet, Rumah Makan, Mushola, Gazebo, Area Parkir, Wahana Permainan, Outbound, Cafe, Pusat Informasi, Klinik, Toko Oleh-oleh, dan Tempat Sampah",
                "alamat"=> "Jalan Raya Selecta No.1, Tulungrejo, Kecamatan Bumiaji, Kota Batu. Jawa Timur",
                "harga_tiket"=>  "Rp50.000",
                "jam_operasional" => "06.00-17.00 WIB"	
            ],
            [
                "nama"=> "Batu Wonderland",
                "deskripsi"=> "Batu Wonderland merupakan satu kompleks hotel, shopping center, playground, dan mini water park. Dari sekian banyak sarana hiburan yang ada, water park atau biasa dikenal dengan sebutan waterboom menjadi salah satu daya tarik utama tempat tersebut.",
                "thumbnail"=> "https://lh3.googleusercontent.com/-ZAda9Jwo-qI/VpgqMUnAJFI/AAAAAAAACdY/WQIR8NQdsVk/s250-Ic42/thumbnail_batu_wonderland.jpeg",
                "gambar"=> "https://lh3.googleusercontent.com/-lX9JUEC08-c/Vpgk_yRPiUI/AAAAAAAACb0/a6jgrByQnIc/s578-Ic42/batu_wonderland.jpeg",
                "latitude"=> -7.879642194258232,
                "longitude"=> 112.5328135018489,
                "fasilitas"=> "Penginapan, Toilet, Mushola, Gazebo, Rumah Makan, Area Parkir, Wahana Permainan, Cafe, Toko Oleh-oleh, dan Tempat Sampah",
                "alamat"=> "Jl. Imam Bonjol No.09, RT.05/RW.08, Temas, Kec. Batu, Kota Batu, Jawa Timur 65315",
                "harga_tiket"=> "Rp10.000 - Rp20.000",
                "jam_operasional" => "10.00-17.00 WIB"
            ],

        ]);
    }
}
