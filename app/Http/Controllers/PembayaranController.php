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
        $pembayaran = Pembayaran::with('kamar')->get();

        return view('pembayaran', ['pembayaran' => $pembayaran]);
    }

    public function create()
    {
        $penghuni = Penghuni::all();
        $kamar = Kamar::all();

        return view('addpembayaran', [
            'penghuni' => $penghuni,
            'kamar' => $kamar
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'pada_tanggal' => 'required',
            'nama' => 'required',
            'kamar_id' => 'required',
        ]);

        $data = [
            'pada_tanggal' => $request->input('pada_tanggal'),
            'nama' => $request->input('nama'),
            'kamar_id' => $request->input('kamar_id'),
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
