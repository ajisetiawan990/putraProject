@extends('layouts.app')

@section('title', 'Buat Laporan')

@section('content')
<h1 class="text-3xl font-bold text-blue-600 mb-6">Buat Laporan Baru</h1>

@if(session('success'))
    <div class="bg-green-100 text-green-700 p-3 rounded mb-4 shadow">{{ session('success') }}</div>
@endif

<form action="{{ route('masyarakat.store') }}" method="POST" class="bg-white p-6 shadow-lg rounded-lg max-w-lg mx-auto">
    @csrf
    <label class="block mb-2 font-semibold text-gray-700">Isi Laporan</label>
    <textarea name="isi_laporan" rows="5" 
        class="w-full border border-gray-300 p-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-400 mb-2"
        placeholder="Tulis laporan Anda...">{{ old('isi_laporan') }}</textarea>
    @error('isi_laporan')
        <p class="text-red-500 text-sm mb-2">{{ $message }}</p>
    @enderror

    <button type="submit" 
        class="bg-blue-500 hover:bg-blue-600 text-black px-6 py-2 rounded-lg shadow transition transform hover:-translate-y-1">
        Kirim Laporan
    </button>
</form>
@endsection
