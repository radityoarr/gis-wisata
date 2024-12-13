<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Admin Panel</title>
    <style>
        aside {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
        }
        main {
            margin-left: 16rem; 
            overflow-y: auto; 
            height: 100vh;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="flex">
        <!-- Sidebar -->
        <aside class="bg-gray-800 text-white w-64">
            <div class="p-4 font-bold text-xl">Admin Panel</div>
            <nav>
                <ul>
                    <li><a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 hover:bg-gray-700">Dashboard</a></li>
                    <li><a href="{{ route('admin.data-wisata') }}" class="block px-4 py-2 hover:bg-gray-700">Data Wisata</a></li>
                    <li><a href="{{ route('admin.tambah-data') }}" class="block px-4 py-2 hover:bg-gray-700">Tambah Data</a></li>
                    <li>
                        <form action="{{ route('admin.logout') }}" method="POST" class="block hover:bg-gray-700">
                            @csrf
                            @method('POST')
                            <button type="submit" class="w-full text-left bg-transparent text-white hover:bg-gray-700 px-4 py-2">Logout</button>
                        </form>
                    </li>
                </ul>
            </nav>
        </aside>
        
        <main class="flex-1 p-6">
            {{ $slot }}
        </main>
    </div>
</body>
</html>
