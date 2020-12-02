<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use App\Models\Mobil;
use App\Models\User;
use Auth;
use App\Exports\TransaksiExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransadminController extends Controller
{
    public function index()
    {
        $items = Transaksi::with(['mobil', 'user'])->orderBy('id', 'DESC')->get();
        
        return view('pages.admin.transaksi.list', compact('items'));
    }

    public function list()
    {
        $items = Transaksi::with(['mobil', 'user'])->orderBy('id', 'DESC')->get();
        
        return view('pages.admin.transaksi.listpengembalian', compact('items'));
    }

    public function menunggu()
    {
        $items = Transaksi::with(['mobil', 'user'])->orderBy('id', 'DESC')->get();

        return view('pages.admin.transaksi.menunggu', compact('items'));
    }

    public function menunggukonf()
    {
        $items = Transaksi::with(['mobil', 'user'])->orderBy('id', 'DESC')->get();

        return view('pages.admin.transaksi.menunggukonf', compact('items'));
    }

    public function show($id)
    {
        $item = Transaksi::with(['mobil', 'user'])->findOrFail($id);

        return view('pages.admin.transaksi.show', compact('item'));
    }

    public function setStatus(Request $request, $id)
    {
        $item = Transaksi::findOrFail($id);

        $item->status = $request->status;
        $item->status_kembali = 'Belum Kembali';
        $item->save();

        return redirect()->route('menunggukonf')->with('success', 'Data berhasi diubah');
    }

    public function showsec($id)
    {
        $item = Transaksi::with(['mobil', 'user'])->findOrFail($id);

        return view('pages.admin.transaksi.showsec', compact('item'));
    }

    public function setStatusKembali(Request $request, $id)
    {
        $tgl = Carbon::now();

        $item = Transaksi::with(['mobil'])->findOrFail($id);
        
        $item->status_kembali = $request->status_kembali;
        $item->tgl_pengembalian = $tgl;
        $item->save();

        return redirect()->route('listtrans')->with('success', 'Data berhasi diubah');
    }

    public function exportExcel() 
    {
        return Excel::download(new TransaksiExport, 'Transaksi.xlsx');
    }

    public function exportPDF()
    {
        $items = Transaksi::with(['mobil'])->get();
        $pdf = PDF::loadView('export.transaksi', compact('items'));
        return $pdf->download('transaksi.pdf');
    }
}
