<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen font-sans">

    <!-- NAVBAR -->
    <nav class="bg-blue shadow p-4 flex justify-between items-center">
        <div class="font-bold text-xl text-blue-600">Sistem Pengaduan</div>

        <div class="flex items-center space-x-4">
            <a href="{{ route('redirect') }}" 
               class="px-4 py-2 bg-blue-500 text-blue font-semibold rounded-lg shadow hover:bg-blue-600 hover:shadow-lg transition transform hover:-translate-y-0.5">
               Home
            </a>

            <a href="{{ route('profile.edit') }}" 
               class="px-4 py-2 bg-green-500 text-blue font-semibold rounded-lg shadow hover:bg-green-600 hover:shadow-lg transition transform hover:-translate-y-0.5">
               Profile
            </a>

            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf
                <button type="submit" 
                        class="px-4 py-2 bg-red-500 text-blue font-semibold rounded-lg shadow hover:bg-red-600 hover:shadow-lg transition transform hover:-translate-y-0.5">
                    Logout
                </button>
            </form>
        </div>
    </nav>

    <!-- CONTENT -->
    <div class="container mx-auto p-6">

        <!-- Alert / Success Message -->
        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-800 rounded shadow">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </div>

</body>
</html>
