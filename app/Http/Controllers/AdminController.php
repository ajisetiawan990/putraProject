<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;

class AdminController extends Controller
{
    public function dashboard()
    {
        $data = Pengaduan::all(); 
        return view('admin.dashboard', compact('data'));
    }

    public function updateStatus(Request $request, $id)
    {
        $pengaduan = Pengaduan::findOrFail($id);

        $pengaduan->update([
            'status' => $request->status ?? 'selesai'
        ]);

        return back()->with('success','Status diubah menjadi '.$pengaduan->status);
    }
}
