<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Mobil;
use App\Models\Banner;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::all();
        $mobils = Mobil::all();
        $banners = Banner::orderBy('id', 'DESC')->get();

        return view('pages.front.home', compact('kategoris', 'mobils', 'banners'));
    }

    public function show($slug)
    {
        $mobil = Mobil::with(['kategori', 'merk', 'fitur'])->where('slug', $slug)->first();

        return view('pages.front.detail', compact('mobil'));
    }

    public function sewa()
    {
        return view('pages.front.sewa');
    }

    public function kategori($kategori)
    {
        $kategoris = Kategori::all();
        $banners = Banner::orderBy('id', 'DESC')->get();
        $data = Mobil::with(['kategori'])->where('kategori_id', $kategori)->get();

        return view('pages.front.kategori', compact('data', 'kategoris', 'banners'));
    }
}
