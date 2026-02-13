<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard Admin</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded p-4">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border px-2 py-1">Tanggal</th>
                            <th class="border px-2 py-1">Pelapor</th>
                            <th class="border px-2 py-1">Isi Laporan</th>
                            <th class="border px-2 py-1">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $laporan)
                        <tr>
                            <td class="border px-2 py-1">{{ $laporan->tgl_pengaduan }}</td>
                            <td class="border px-2 py-1">{{ $laporan->user->name }}</td>
                            <td class="border px-2 py-1">{{ $laporan->isi_laporan }}</td>
                            <td class="border px-2 py-1">{{ $laporan->status }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center py-2">Belum ada laporan</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
