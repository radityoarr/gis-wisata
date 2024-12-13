<x-layout-admin>
    <h1 class="text-2xl font-bold mb-6">Edit Data Wisata</h1>
    <form method="POST" action="{{ route('admin.update', $location->id) }}">
        @csrf
        @method('POST')
        <div class="mb-4">
            <label class="block text-sm font-medium mb-2">Nama Wisata</label>
            <input type="text" name="nama" class="border border-gray-300 p-2 rounded w-full" value="{{ $location->nama }}">
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium mb-2">Deskripsi</label>
            <textarea name="deskripsi" class="border border-gray-300 p-2 rounded w-full" rows="2">{{ $location->deskripsi }}</textarea>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium mb-2">Alamat</label>
            <input type="text" name="alamat" class="border border-gray-300 p-2 rounded w-full" value="{{ $location->alamat }}">
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium mb-2">Jam Operasional</label>
            <input type="text" name="jam_operasional" class="border border-gray-300 p-2 rounded w-full" value="{{ $location->jam_operasional }}">
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium mb-2">Harga Tiket</label>
            <input type="text" name="harga_tiket" class="border border-gray-300 p-2 rounded w-full" value="{{ $location->harga_tiket }}">
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium mb-2">Fasilitas</label>
            <input type="text" name="fasilitas" class="border border-gray-300 p-2 rounded w-full" value="{{ $location->fasilitas}}">
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium mb-2">Latitude</label>
            <input type="text" name="latitude" class="border border-gray-300 p-2 rounded w-full" value="{{ $location->latitude }}">
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium mb-2">Latitude</label>
            <input type="text" name="longitude" class="border border-gray-300 p-2 rounded w-full" value="{{ $location->longitude }}">
        </div>
        <button class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
    </form>
</x-layout-admin>
