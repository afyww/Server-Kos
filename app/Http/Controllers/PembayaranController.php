<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Pembayaran;
use App\Models\Penghuni;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index()
    {
        $pembayaran = Pembayaran::all();

        return view('pembayaran', ['pembayaran' => $pembayaran]);
    }

    public function create()
    {
        $penghuni = Penghuni::all();

        return view('addpembayaran', [
            'penghuni' => $penghuni,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'pada_tanggal' => 'required',
            'nama' => 'required', 
        ]);
    
        $penghuni = Penghuni::where('nama', $request->input('nama'))->firstOrFail();
    
        $kamar = $penghuni->kamar;
    
        $data = [
            'pada_tanggal' => $request->input('pada_tanggal'),
            'nama' => $penghuni->nama, 
            'kamar' => $kamar->type, 
            'nominal' => $kamar->harga, 
        ];
    
        Pembayaran::create($data);
    
        return redirect()->route('pembayaran')->with('success', 'Pembayaran Sukses Dibuat!');
    }
    
    public function destroy($id)
    {
        Pembayaran::destroy($id);

        return redirect()->route('pembayaran')->with('success', 'Pembayaran Sukses Dihapus!');
    }
}
