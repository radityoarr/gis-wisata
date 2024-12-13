<x-layout-admin>
    <h1 class="text-2xl font-bold mb-6">Data Wisata</h1>
    <div class="overflow-x-auto overflow-y-auto">
        <table class="table-auto border-collapse border border-gray-300 w-full">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="border border-gray-300 px-4 py-2" style="min-width: 60px;">No</th>
                    <th class="border border-gray-300 px-4 py-2" style="min-width: 200px;">Nama Tempat</th>
                    <th class="border border-gray-300 px-4 py-2" style="min-width: 200px;">Alamat</th>
                    <th class="border border-gray-300 px-4 py-2" style="min-width: 250px;">Deskripsi</th>
                    <th class="border border-gray-300 px-4 py-2 text-center" style="min-width: 150px;">Jam Operasional</th>
                    <th class="border border-gray-300 px-4 py-2 text-center" style="min-width: 150px;">Harga Tiket</th>
                    <th class="border border-gray-300 px-4 py-2 text-center" style="min-width: 150px;">Fasilitas</th>
                    <th class="border border-gray-300 px-4 py-2 text-center" style="min-width: 150px;">Latitude</th>
                    <th class="border border-gray-300 px-4 py-2 text-center" style="min-width: 150px;">Longitude</th>
                    <th class="border border-gray-300 px-4 py-2 text-center" style="min-width: 200px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($locations as $index => $location)
                <tr>
                    <td class="border border-gray-300 px-4 py-2">{{ $index + 1 }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $location->nama }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $location->alamat }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $location->deskripsi }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $location->jam_operasional }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $location->harga_tiket }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $location->fasilitas }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $location->latitude }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $location->longitude }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">
                        <div class="flex justify-center space-x-2">
                            <a href="{{ route('admin.edit', $location->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</a>
                            <form action="{{ route('admin.delete', $location->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                            </form>
                        </div>
                    </td>                    
                </tr>
                @empty
                <tr>
                    <td colspan="9" class="border border-gray-300 px-4 py-2 text-center">Data wisata belum tersedia</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-layout-admin>
