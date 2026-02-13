<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Buat Tanggapan</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-md mx-auto bg-white shadow rounded p-6">
            <form action="{{ url('petugas/tanggapan') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block mb-1 font-semibold">Pilih Laporan</label>
                    <select name="id_pengaduan" class="w-full border rounded px-2 py-1">
                        @foreach($data as $laporan)
                            <option value="{{ $laporan->id_pengaduan }}">{{ $laporan->isi_laporan }} - {{ $laporan->user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label class="block mb-1 font-semibold">Tanggapan</label>
                    <textarea name="tanggapan" class="w-full border rounded px-2 py-1" rows="4"></textarea>
                </div>
                <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">Kirim</button>
            </form>
        </div>
    </div>
</x-app-layout>
