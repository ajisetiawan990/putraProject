@extends('layouts.app')

@section('title','Dashboard Petugas')

@section('content')
<h1 class="text-2xl font-bold mb-4">Dashboard Petugas</h1>

<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    @forelse($data as $laporan)
        <div class="bg-white shadow p-4 rounded">
            <p class="text-gray-700">{{ $laporan->isi_laporan }}</p>
            <p class="text-sm text-gray-400 mt-2">
                Status: <span class="font-semibold">{{ $laporan->status }}</span>
            </p>

            {{-- Tampilkan tanggapan jika ada --}}
            @if($laporan->tanggapan)
                <div class="mt-2">
                    <p class="text-sm font-bold">Tanggapan:</p>
                    <p class="text-sm text-gray-600">
                        {{ $laporan->tanggapan->tanggapan }} 
                        <span class="text-gray-400 text-xs">({{ $laporan->tanggapan->tgl_tanggapan }})</span>
                    </p>
                </div>
                <span class="text-green-600 text-sm font-semibold">Sudah Ditanggapi</span>
            @else
                <a href="{{ route('petugas.tanggapan.create', ['id' => $laporan->id]) }}" 
                   class="btn btn-sm btn-primary animate-fade-slide mt-2">
                    Beri Tanggapan
                </a>
            @endif

        </div>
    @empty
        <p class="text-gray-500 mt-2">Belum ada laporan</p>
    @endforelse
</div>
@endsection
