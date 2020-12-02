@extends('layouts.front')

@section('title')
    Detail | Rental Mobil
@endsection

@section('content')
    <!-- Page Content -->
  <div class="container">

    <div class="row">

        <div class="col-lg-12 mt-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb" style="background-color: white">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detail</li>
                </ol>
            </nav>
        </div>
      <!-- /.col-lg-9 -->

    </div>
    <div class="row">
        <div class="col-lg-6 mb-3">
            <div class="card h-70">
                <img src="{{Storage::url($mobil->gambar)}}" width="100%" height="350px" alt="">
            </div>
        </div>

        <div class="col-lg-6 mb-3">
            <div class="card h-100">
            <div class="card-body">
                <table>
                    <tr>
                        <td>Nama</td>
                        <td class="isi">{{$mobil->nama}}</td>
                    </tr>
                    <tr>
                        <td>Tahun</td>
                        <td class="isi">{{$mobil->tahun}}</td>
                    </tr>
                    <tr>
                        <td>Plat</td>
                        <td class="isi">{{$mobil->plat}}</td>
                    </tr>
                    <tr>
                        <td>Kategori</td>
                        <td class="isi">{{$mobil->kategori->nama}}</td>
                    </tr>
                    <tr>
                        <td>Merk</td>
                        <td class="isi">{{$mobil->merk->nama}}</td>
                    </tr>
                    <tr>
                        <td>Harga</td>
                        <td class="isi">Rp. {{number_format($mobil->sewa)}} / hari</td>
                    </tr>
                    <tr>
                        <td>Warna</td>
                        <td class="isi">{{$mobil->warna}}</td>
                    </tr>
                    <tr>
                        <td>Kursi</td>
                        <td class="isi">{{$mobil->kursi}}</td>
                    </tr>
                    <tr>
                        <td>Fitur</td>
                        <td class="isi">
                            {{$mobil->fitur()->get()->implode('nama', ' - ')}}
                        </td>
                    </tr>
                </table>
                @guest
                    @if ($mobil->status == True)
                        <a href="#" class="btn btn-secondary btn-block mt-3">Mobil Telah Disewa</a>
                    @else
                        <a href="{{route('login')}}" class="btn btn-primary btn-block mt-3">Sewa Mobil</a>
                    @endif
                @endguest
                @auth
                    @if ($mobil->status == True)
                        <a href="#" class="btn btn-secondary btn-block mt-3">Mobil Telah Disewa</a>
                    @else
                        <a href="{{route('sewamobil', $mobil->id)}}" class="btn btn-primary btn-block mt-3">Sewa Sekarang</a>
                    @endif
                @endauth
            </div>
            </div>
        </div>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->
@endsection

@push('after-style')
    <style>
        table td {
            font-size: 18px;
            padding-bottom: 10px;
        }

        table .isi {
            padding-left: 100px;
        }
    </style>
@endpush