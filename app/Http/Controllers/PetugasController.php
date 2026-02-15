<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Support\Facades\Auth;

class PetugasController extends Controller
{
    public function dashboard()
    {
        $data = Pengaduan::all();
        return view('petugas.dashboard', compact('data'));
    }

    public function create($id)
    {
        // Ambil pengaduan berdasarkan ID dari route
        $data = Pengaduan::findOrFail($id);

        return view('petugas.create', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggapan'=>'required|string'
        ]);

        Tanggapan::create([
            'id_pengaduan'=> $request->id_pengaduan,
            'id_user'     => Auth::id(),
            'tgl_tanggapan'=> now(),
            'tanggapan'   => $request->tanggapan
        ]);

        return redirect()->route('petugas.dashboard')->with('success','Tanggapan berhasil dikirim');
    }
}
