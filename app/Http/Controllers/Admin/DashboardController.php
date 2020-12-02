<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mobil;
use App\Models\Transaksi;
use Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $mobil = Mobil::count();
        $menunggupem = Transaksi::where('status', 'Menunggu Pembayaran')->count();
        $menunggukonf = Transaksi::where('status', 'Menunggu Konfirmasi')->count();
        $transaksi = Transaksi::where('status', 'Sukses')->count();
        $pendapatan = Transaksi::where('status', 'Sukses')->sum('tot_harga');
        $mkembali = Transaksi::where('status_kembali', 'Kembali')->count();
        $bkembali = Transaksi::where('status_kembali', 'Belum Kembali')->count();
        return view('pages.admin.dashboard', compact('mobil', 'menunggupem', 'menunggukonf', 'transaksi', 'pendapatan', 'mkembali', 'bkembali'));
    }
}
