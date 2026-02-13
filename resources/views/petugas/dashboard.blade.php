@extends('layouts.app')

@section('title','Dashboard Petugas')

@section('content')
<h1 class="text-2xl font-bold mb-4">Dashboard Petugas</h1>

<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    @forelse($data as $laporan)
        <div class="bg-white shadow p-4 rounded">
            <p class="text-gray-700">{{ $laporan->isi_laporan }}</p>
            <p class="text-sm text-gray-400 mt-2">Status: <span class="font-semibold">{{ $laporan->status }}</span></p>

            @if($laporan->tanggapans->count())
                <div class="mt-2">
                    <p class="text-sm font-bold">Tanggapan:</p>
                    @foreach($laporan->tanggapans as $tanggapan)
                        <p class="text-sm text-gray-600">{{ $tanggapan->tanggapan }} 
                        <span class="text-gray-400 text-xs">({{ $tanggapan->tgl_tanggapan }})</span></p>
                    @endforeach
                </div>
            @endif

            <!-- Form tanggapan -->
            <form action="{{ route('petugas.tanggapan.store') }}" method="POST" class="mt-2">
                @csrf
                <input type="hidden" name="id_pengaduan" value="{{ $laporan->id_pengaduan }}">
                <textarea name="tanggapan" placeholder="Tulis tanggapan..." 
                    class="w-full border p-2 rounded mb-2 focus:outline-none focus:ring-2 focus:ring-green-400" rows="3"></textarea>
                @error('tanggapan')
                    <p class="text-red-500 text-sm mb-2">{{ $message }}</p>
                @enderror
                <button type="submit" 
                    class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded transition">
                    Kirim Tanggapan
                </button>
            </form>
        </div>
    @empty
        <p class="text-gray-500 mt-2">Belum ada laporan</p>
    @endforelse
</div>
@endsection
