@extends('layouts.app')

@section('title','Dashboard Petugas')

@section('content')
<h1 class="text-2xl font-bold mb-4">Create Petugas</h1>

<form action="{{ route('petugas.tanggapan.store') }}" method="POST" class="mt-2">
                @csrf
                <input type="hidden" name="id_pengaduan" value="{{ $data->id }}">
                <textarea name="tanggapan" placeholder="Tulis tanggapan..." 
                    class="w-full border p-2 rounded mb-2 focus:outline-none focus:ring-2 focus:ring-green-400" rows="3"></textarea>
                @error('tanggapan')
                    <p class="text-red-500 text-sm mb-2">{{ $message }}</p>
                @enderror
                <button type="submit">
                    Kirim Tanggapan
                </button>
            </form>
@endsection

