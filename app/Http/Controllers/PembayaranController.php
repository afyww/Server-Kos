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
        $pembayaran = Pembayaran::with('penghuni', 'kamar')->get();

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
            'penghuni_id' => 'required',
            'kamar_id' => 'required',
        ]);

        $data = [
            'pada_tanggal' => $request->input('pada_tanggal'),
            'penghuni_id' => $request->input('penghuni_id'),
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
