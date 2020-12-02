<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use App\Models\User;
use App\Models\Mobil;
use Auth;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    public function index()
    {
        $items = Transaksi::with(['mobil', 'user'])->orderBy('id', 'DESC')->get();

        return view('pages.front.riwayat', compact('items'));
    }

    public function upload($id)
    {
        $item = Transaksi::findOrFail($id);
        return view('pages.front.upload', compact('item'));
    }

    public function proses(Request $request, $id)
    {
        $mobil = Transaksi::findOrFail($id);
        $mobil->foto = $request->file('foto')->store('assets/mobil', 'public');
        $mobil->status = 'Menunggu Konfirmasi';

        $mobil->save();

        return redirect()->route('riwayat');
    }
}
