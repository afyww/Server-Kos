<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Pembayaran;
use App\Models\Pengeluaran;
use App\Models\Penghuni;

class PagesController extends Controller
{
    public function vdashboard()
    {
        //TOTAL POST
        $total_kamar = Kamar::count();

        //TOTAL PROJECT
        $total_penghuni = Penghuni::count();

        //TOTAL PEMBAYARAN
        $total_pembayaran = Pembayaran::join('kamars', 'pembayarans.kamar_id', '=', 'kamars.id')
            ->sum('kamars.harga');

        //TOTAL PENGELUARAN
        $total_pengeluaran = Pengeluaran::sum('nominal');

        $pembayaran = Pembayaran::join('kamars', 'pembayarans.kamar_id', '=', 'kamars.id')
            ->selectRaw("SUM(kamars.harga) as total_harga, DATE_FORMAT(pembayarans.created_at, '%M') as month_name, MONTH(pembayarans.created_at) as month_number")
            ->whereYear('pembayarans.created_at', date('Y'))
            ->groupBy('month_number', 'month_name')
            ->orderBy('month_number')
            ->pluck('total_harga', 'month_name');
        
        $labels1 = $pembayaran->keys();
        $data1 = $pembayaran->values();
        
        // PENGELUARAN CHART
        $pengeluaran = Pengeluaran::selectRaw("SUM(nominal) as total_nominal, DATE_FORMAT(pada_tanggal, '%M') as month_name, MONTH(pada_tanggal) as month_number")
            ->whereYear('pada_tanggal', date('Y'))
            ->groupBy('month_number', 'month_name')
            ->orderBy('month_number')
            ->pluck('total_nominal', 'month_name');

        $labels2 = $pengeluaran->keys();
        $data2 = $pengeluaran->values();

        return view('dashboard', [
            'total_kamar' => $total_kamar,
            'total_penghuni' => $total_penghuni,
            'total_pembayaran' => $total_pembayaran,
            'total_pengeluaran' => $total_pengeluaran,
            'labels1' => $labels1,
            'data1' => $data1,
            'labels2' => $labels2,
            'data2' => $data2,
        ]);
    }
}
