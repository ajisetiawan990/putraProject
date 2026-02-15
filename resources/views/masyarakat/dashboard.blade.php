@extends('layouts.app')

@section('title', 'Dashboard Masyarakat')

@section('content')
<h1 class="text-3xl font-bold text-blue-600 mb-6">Halo, {{ auth()->user()->name }}</h1>

<!-- Tombol Buat Laporan -->
<a href="{{ route('masyarakat.create') }}" 
   class="bg-blue-500 hover:bg-blue-600 text-blue px-6 py-2 rounded-lg shadow transition transform hover:-translate-y-1">
   Buat Laporan
</a>

<!-- List Laporan -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
    @forelse($data as $laporan)
        <div class="bg-white shadow-lg rounded-lg p-4 border-l-4 border-blue-500 hover:shadow-xl transition">
            <p class="text-gray-800 font-medium">{{ $laporan->isi_laporan }}</p>
            <p class="text-sm text-gray-500 mt-2">Status: 
                <span class="font-semibold {{ $laporan->status == 'selesai' ? 'text-green-600' : 'text-yellow-600' }}">
                    {{ ucfirst($laporan->status) }}
                </span>
            </p>

            @if($laporan->tanggapans)
                <div class="mt-3 bg-gray-50 p-2 rounded">
                    <p class="text-sm font-bold text-gray-700">Tanggapan:</p>
                    @if($laporan->tanggapans)
                        <p>{{ $laporan->tanggapans->tanggapan }}</p>
                        <span class="text-gray-400 text-xs">({{ $laporan->tanggapans->tgl_tanggapan }})</span></p>
                    @else
                        <span class="text-muted">Belum ada tanggapan</span>
                    @endif
                </div>
            @endif
        </div>
    @empty
        <p class="text-gray-500 mt-4">Belum ada laporan.</p>
    @endforelse
</div>
@endsection
