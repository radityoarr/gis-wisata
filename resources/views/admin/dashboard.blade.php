<x-layout-admin>
    <div class="bg-white p-8 rounded-lg shadow-lg">
        <h1 class="text-4xl font-bold mb-4 text-gray-800">Dashboard Admin</h1>
        <p class="text-lg text-gray-600 mb-6"><span class="font-semibold text-gray-800">Selamat Datang di Admin Panel GIS Pariwisata Kota Batu</span>.</p>
        
        <div class="flex items-center justify-between mt-6">
        <!-- Stats or Info Box -->
            <div class="grid grid-cols-3 gap-6 w-full">
                <div class="bg-blue-100 text-blue-800 px-6 py-4 rounded-lg shadow-md hover:shadow-lg transition-shadow">
                    <h3 class="text-lg text-center font-bold">Jumlah Lokasi Wisata</h3>
                    <p class="text-4xl text-center font-semibold mt-2">{{ $jumlahLokasi }}</p>
                </div>
                <div class="bg-green-100 text-green-800 px-6 py-4 rounded-lg shadow-md hover:shadow-lg transition-shadow">
                    <h3 class="text-lg text-center font-bold">Jangkauan Wilayah</h3>
                    <p class="text-2xl text-center font-semibold mt-2">199.09 km<sup>2</sup></p>
                </div>
                <div class="bg-red-100 text-red-800 px-6 py-4 rounded-lg shadow-md hover:shadow-lg transition-shadow">
                    <h3 class="text-lg text-center font-bold">Jumlah Kecamatan</h3>
                    <p class="text-2xl text-center font-semibold mt-2">3</p>
                </div>
            </div>
        </div>

        <div class="mt-10 text-center">
            <a href="/" target="_blank" class="inline-block px-8 py-3 bg-gradient-to-r from-blue-500 to-teal-500 text-white font-semibold rounded-lg shadow-md hover:shadow-lg hover:from-blue-600 hover:to-teal-600 transition-all">
                Lihat Peta Wisata
            </a>
        </div>
    </div>
</x-layout-admin>
