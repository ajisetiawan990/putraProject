<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Support\Facades\Auth;

class PetugasController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','role:petugas']);
    }

    public function dashboard()
    {
        $data = Pengaduan::with(['user','tanggapans'])->get();
        return view('petugas.dashboard', compact('data'));
    }

    public function tanggapan(Request $request)
    {
        $request->validate([
            'id_pengaduan'=>'required|exists:pengaduans,id_pengaduan',
            'tanggapan'=>'required|string'
        ]);

        Tanggapan::create([
            'id_pengaduan'=> $request->id_pengaduan,
            'id_user'     => Auth::id(),
            'tgl_tanggapan'=> now(),
            'tanggapan'   => $request->tanggapan
        ]);

        return back()->with('success','Tanggapan berhasil dikirim');
    }
}
