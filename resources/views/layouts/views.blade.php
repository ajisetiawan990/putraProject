<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'MyApp')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100">

    <!-- NAVBAR -->
    <nav class="bg-white dark:bg-gray-800 shadow-md px-6 py-3 flex items-center justify-between">
        <!-- Logo + Menu -->
        <div class="flex items-center space-x-6">
            <a href="{{ url('/') }}" class="font-bold text-xl text-gray-800 dark:text-white">
                MyApp
            </a>
 
            @auth
                @php $role = strtolower(auth()->user()->role); @endphp

                @if($role === 'admin')
                    <a href="{{ route('admin.dashboard') }}" class="text-gray-700 dark:text-gray-200 hover:text-blue-500 transition">Dashboard</a>
                    <a href="{{ route('admin.update.status', 1) }}" class="text-gray-700 dark:text-gray-200 hover:text-blue-500 transition">Update Status</a>

                @elseif($role === 'petugas')
                    <a href="{{ route('petugas.dashboard') }}" class="text-gray-700 dark:text-gray-200 hover:text-blue-500 transition">Dashboard</a>
                    <a href="{{ route('petugas.tanggapan.store') }}" class="text-gray-700 dark:text-gray-200 hover:text-blue-500 transition">Tanggapan</a>

                @elseif($role === 'masyarakat')
                    <a href="{{ route('masyarakat.dashboard') }}" class="text-gray-700 dark:text-gray-200 hover:text-blue-500 transition">Dashboard</a>
                    <a href="{{ route('masyarakat.create') }}" class="text-gray-700 dark:text-gray-200 hover:text-blue-500 transition">Buat Laporan</a>
                @endif
            @endauth
        </div>

        <!-- User Info + Login/Logout -->
        <div class="flex items-center space-x-4">
            @guest
                <a href="{{ route('login') }}" class="px-3 py-1 rounded bg-blue-500 text-white hover:bg-blue-600 transition">Login</a>
                <a href="{{ route('register') }}" class="px-3 py-1 rounded bg-green-500 text-white hover:bg-green-600 transition">Register</a>
            @else
                <span class="text-gray-700 dark:text-gray-200 mr-2">Hi, {{ Auth::user()->name }}</span>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="px-3 py-1 rounded bg-red-500 text-white hover:bg-red-600 transition">
                        Logout
                    </button>
                </form>
            @endguest
        </div>
    </nav>

    <!-- MAIN CONTENT -->
    <main class="p-6">
        @yield('content')
    </main>

</body>
</html>
