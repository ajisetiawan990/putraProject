@extends('layouts.app')

@section('title','Dashboard Admin')

@section('content')
<div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white shadow rounded p-4">
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border px-2 py-1">Tanggal</th>
                        <th class="border px-2 py-1">Pelapor</th>
                        <th class="border px-2 py-1">Isi Laporan</th>
                        <th class="border px-2 py-1">Status</th>
                        <th class="border px-2 py-1">Tanggapan</th>
                        <th class="border px-2 py-1">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($data as $laporan)
                        <tr>
                            <td class="border px-2 py-1">{{ \Carbon\Carbon::parse($laporan->tgl_pengaduan)->format('d-m-Y') }}</td>
                            <td class="border px-2 py-1">{{ $laporan->user->name }}</td>
                            <td class="border px-2 py-1">{{ $laporan->isi_laporan }}</td>
                            <td class="border px-2 py-1">
                                @if($laporan->status == 'selesai')
                                    <span class="text-green-600 font-semibold">Selesai</span>
                                @elseif($laporan->status == 'proses')
                                    <span class="text-yellow-600 font-semibold">Proses</span>
                                @else
                                    <span class="text-gray-500 font-semibold">Menunggu</span>
                                @endif
                            </td>
                            <td class="border px-2 py-1">
                                @if($laporan->tanggapans)
                                    <p>{{ $laporan->tanggapans->tanggapan }}</p>
                                @else
                                    <span class="text-muted">Belum ada tanggapan</span>
                                @endif
                            </td>
                            <td class="border px-2 py-1 text-center">
                                @if($laporan->status != 'selesai')
                                    <form action="{{ route('admin.update.status', $laporan->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit">
                                            Verifikasi
                                        </button>
                                    </form>
                                @else
                                    <span class="text-green-600 font-semibold">✓ Selesai</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-2">Belum ada laporan</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection
