<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mobil;
use App\Models\kategori;
use App\Models\Merk;
use App\Models\Fitur;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\MobilRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MobilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategoris = Kategori::all();
        $merks = Merk::all();
        $items = Mobil::orderBy('id', 'DESC')->get();

        return view('pages.admin.mobil.index', compact('items', 'kategoris', 'merks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategoris = Kategori::all();
        $merks = Merk::all();
        $fiturs = Fitur::all();
        return view('pages.admin.mobil.create', compact('kategoris', 'merks', 'fiturs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MobilRequest $request)
    {
        // dd(request('fitur_id'));
        $data = Mobil::create([
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
            'gambar' => request()->file('gambar')->store('assets/mobil', 'public'),
            'slug' => Str::slug(request('nama')),
        ]);

        $data->fitur()->sync(request('fitur'));

        return redirect()->route('mobil.index')->with('success', 'Data berhasi ditambah');
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
        $item = Mobil::findOrFail($id);

        return view('pages.admin.mobil.detail', compact('item', 'kategoris', 'merks'));
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
        $item = Mobil::findOrFail($id);

        return view('pages.admin.mobil.edit', compact('item', 'kategoris', 'merks', 'fiturs'));
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
        $data = Mobil::findOrFail($id);

        if(request('gambar')) {
            Storage::delete($data->gambar);
            $gambar = request()->file('gambar')->store('assets/mobil', 'public');
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

        return redirect()->route('mobil.index')->with('success', 'Data berhasi diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Mobil::findOrFail($id);
        $item->delete();

        return redirect()->route('mobil.index');
    }
}
