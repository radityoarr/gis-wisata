<x-layout-admin>
    <h1 class="text-2xl font-bold mb-6">Tambah Data Wisata</h1>
    <form method="POST" action="{{ route('admin.tambah-data.submit') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label class="block text-sm font-medium mb-2" for="nama">Nama Wisata</label>
            <input type="text" name="nama" id="nama" class="border border-gray-300 p-2 rounded w-full" required>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium mb-2" for="alamat">Alamat</label>
            <input type="text" name="alamat" id="alamat" class="border border-gray-300 p-2 rounded w-full" required>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium mb-2" for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="border border-gray-300 p-2 rounded w-full" rows="2" required></textarea>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium mb-2" for="jam_operasional">Jam Operasional</label>
            <input type="text" name="jam_operasional" id="jam_operasional" class="border border-gray-300 p-2 rounded w-full" required>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium mb-2" for="harga_tiket">Harga Tiket</label>
            <input type="text" name="harga_tiket" id="harga_tiket" class="border border-gray-300 p-2 rounded w-full" required>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium mb-2" for="fasilitas">Fasilitas</label>
            <input type="text" name="fasilitas" id="fasilitas" class="border border-gray-300 p-2 rounded w-full" required>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium mb-2" for="latitude">Latitude</label>
            <input type="number" step="any" name="latitude" id="latitude" class="border border-gray-300 p-2 rounded w-full" required>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium mb-2" for="longitude">Longitude</label>
            <input type="number" step="any" name="longitude" id="longitude" class="border border-gray-300 p-2 rounded w-full" required>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium mb-2" for="thumbnail">Thumbnail</label>
            <input type="file" name="thumbnail" id="thumbnail" class="border border-gray-300 p-2 rounded w-full" accept="image/*">
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah</button>
        @if ($errors->any())
            <div class="bg-red-500 text-white p-4 mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </form>
</x-layout-admin>
