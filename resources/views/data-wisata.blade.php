<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Wisata Kota Batu</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <!-- Navbar -->
    <nav class="bg-blue-600 text-white py-4 fixed top-0 left-0 w-full shadow-md z-10">
        <div class="container mx-auto flex justify-between items-center">
            <a href="/" class="text-xl font-bold">Wisata Batu</a>
            <ul class="flex space-x-4">
                <li><a href="/" class="hover:underline">Home</a></li>
                <li><a href="/data-wisata" class="hover:underline">Data Wisata</a></li>
            </ul>
        </div>
    </nav>
    

    <!-- Data Section -->
    <section class="py-24 px-6">
        <h1 class="text-3xl font-bold text-center mb-6 mt-4">Data Wisata Kota Batu</h1>
        <div class="overflow-x-auto">
            <table class="table-auto w-full max-w-4xl mx-auto border-collapse border border-gray-200">
                <thead class="bg-blue-600 text-white">
                    <tr>
                        <th class="border border-gray-200 px-4 py-2">No</th>
                        <th class="border border-gray-200 px-4 py-2">Nama Tempat</th>
                        <th class="border border-gray-200 px-4 py-2">Alamat</th>
                        <th class="border border-gray-200 px-4 py-2">Jam Operasional</th>
                        <th class="border border-gray-200 px-4 py-2">Harga Tiket</th>
                        <th class="border border-gray-200 px-4 py-2">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($locations as $index => $location)
                        <tr>
                            <td class="border border-gray-200 px-4 py-2 w-10 text-center">{{ $index + 1 }}</td>
                            <td class="border border-gray-200 px-4 py-2 w-1/5">{{ $location->nama }}</td>
                            <td class="border border-gray-200 px-4 py-2 w-1/4">{{ $location->alamat }}</td>
                            <td class="border border-gray-200 px-4 py-2 w-1/5">{{ $location->jam_operasional }}</td>
                            <td class="border border-gray-200 px-4 py-2 w-1/4">{{ $location->harga_tiket }}</td>
                            <td class="border border-gray-200 px-4 py-2 w-32 text-center align-center">
                                <div class="flex justify-center items-center h-full">
                                    <a href="{{ url('/detail-wisata/' . $location->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">
                                        Detail
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="border border-gray-200 px-4 py-2 text-center">Data wisata belum tersedia</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
    <!-- Footer -->
    <footer class="bg-blue-600 text-white py-4 mt-8">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 Wisata Batu. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
