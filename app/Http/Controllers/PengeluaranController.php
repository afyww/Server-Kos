<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    public function index()
    {
        $pengeluaran = Pengeluaran::all();

        return view('pengeluaran', ['pengeluaran' => $pengeluaran]);
    }

    public function create()
    {
        return view('addpengeluaran');
    }

    public function store(Request $request)
    {
        $request->validate([
            'pada_tanggal' => 'required',
            'kebutuhan' => 'required',
            'nominal' => 'required',
        ]);

        $data = [
            'pada_tanggal' => $request->input('pada_tanggal'),
            'kebutuhan' => $request->input('kebutuhan'),
            'nominal' => $request->input('nominal'),
        ];

        Pengeluaran::create($data);

        return redirect()->route('pengeluaran')->with('success', 'Pengeluaran Sukses Dibuat!');
    }

    public function destroy($id)
    {
        Pengeluaran::destroy($id);

        return redirect()->route('pengeluaran')->with('success', 'Pengeluaran Sukses Dihapus!');
    }
}
