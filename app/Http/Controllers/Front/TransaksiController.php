<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use App\Models\Mobil;
use DateTime;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\TransaksiRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $item = Transaksi::with(['mobil', 'user'])->findOrFail($id);

        return view('pages.front.detailcheck', compact('item'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $sewa = Mobil::findOrFail($id);

        return view('pages.front.sewa', compact('sewa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TransaksiRequest $request, $id)
    {
        $mobil = Mobil::findOrFail($id);

        $tgla = Carbon::parse($request->tglawal);
        $tglak = Carbon::parse($request->tglakhir);
        $tgl = Carbon::now();
        $hasil = $tgla->diff($tglak);
        if ($request->supir == True) {
            $sup = 100000;
        } else {
            $sup = 0;
        }

        $transaction = Transaksi::create([
            'code_trans' => 'TRX' . mt_rand(10000,99999) . mt_rand(100,999),
            'mobil_id' => $mobil->id,
            'nama' => Auth::user()->name,
            'email' => Auth::user()->email,
            'noktp' => $request->noktp,
            'alamat' => $request->alamat,
            'notlpn' => $request->notlpn,
            'supir' => $request->supir,
            'hrg_sup' => $sup,
            'tglawal' => $tgla,
            'tglakhir' => $tglak,
            'durasi' => $hasil->days,
            'tot_harga' => $mobil->sewa * $hasil->days + $sup,
            'status' => 'Pending',
            'tanggal' => $tgl,
        ]);

        $mobil->status = True;
        $mobil->save();

        return redirect()->route('checkout_detail', $transaction->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kategoris = Kategori::all();
        $merks = Merk::all();
        $item = Transaksi::findOrFail($id);

        return view('pages.admin.transaksi.detail', compact('item', 'kategoris', 'merks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategoris = Kategori::all();
        $merks = Merk::all();
        $fiturs = Fitur::all();
        $item = Transaksi::findOrFail($id);

        return view('pages.admin.transaksi.edit', compact('item', 'kategoris', 'merks', 'fiturs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Transaksi::findOrFail($id);

        if(request('gambar')) {
            Storage::delete($data->gambar);
            $gambar = request()->file('gambar')->store('assets/transaksi', 'public');
        } elseif($data->gambar) {
            $gambar = $data->gambar;
        } else {
            $gambar = null;
        }

        $data->update([
            'nama' => request('nama'),
            'kategori_id' => request('kategori_id'),
            'merk_id' => request('merk_id'),
            'warna' => request('warna'),
            'tahun' => request('tahun'),
            'plat' => request('plat'),
            'sewa' => request('sewa'),
            'status' => request('status'),
            'kursi' => request('kursi'),
            'deskripsi' => request('deskripsi'),
            'gambar' => $gambar,
            'slug' => Str::slug(request('nama')),
        ]);

        $data->fitur()->sync(request('fitur'));

        return redirect()->route('transaksi.index')->with('success', 'Data berhasi ditambah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Transaksi::findOrFail($id);
        $item->delete();

        return redirect()->route('transaksi.index');
    }

    public function success(Request $request, $id)
    {
        $transaction = Transaksi::findOrFail($id);
        $transaction->status = 'Menunggu Pembayaran';

        $transaction->save();

        return view('pages.front.success');
    }
}
