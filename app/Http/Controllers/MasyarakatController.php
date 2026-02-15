<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use Illuminate\Support\Facades\Auth;

class MasyarakatController extends Controller
{
    public function dashboard()
    {
        $data = Pengaduan::all(); // -> Terlalu ribet dan bakal susah di jelasin, pakai lazy load biar mulus
        return view('masyarakat.dashboard', compact('data'));
    }

    public function create()
    {
        return view('masyarakat.create');
    }

    public function store(Request $request)
    {
        $request->validate(['isi_laporan'=>'required|string']);

        Pengaduan::create([
            'tgl_pengaduan' => now(),
            'id_user'       => Auth::id(),
            'isi_laporan'   => $request->isi_laporan,
            'status'        => 'proses'
        ]);

        return redirect()->route('masyarakat.dashboard')
                         ->with('success','Laporan berhasil dikirim');
    }
}
