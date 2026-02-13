<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use Illuminate\Support\Facades\Auth;

class MasyarakatController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','role:masyarakat']);
    }

    public function dashboard()
    {
        $data = Auth::user()->pengaduans()->with('tanggapans')->latest()->get();
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
