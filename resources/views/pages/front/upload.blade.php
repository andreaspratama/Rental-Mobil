@extends('layouts.front')

@section('title')
    Upload Pembayaran | Rental Mobil
@endsection

@section('content')
    <!-- Page Content -->
  <div class="container">

    <div class="row">

        <div class="col-lg-12 mt-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb" style="background-color: white">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Upload Pembayaran</li>
                </ol>
            </nav>
        </div>
      <!-- /.col-lg-9 -->

    </div>
    <div class="row">
        <div class="col-lg-8 mb-3 ml-auto mr-auto">
            <div class="card">
                <div class="card-header">
                  Upload Pembayaran
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('uploadproses', $item->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="nama_mobil">Nama Mobil</label>
                            <input type="text" class="form-control" name="nama_mobil" value="{{$item->mobil->nama}}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama Pemesan</label>
                            <input type="text" class="form-control" name="nama" value="{{$item->nama}}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="email" value="{{$item->email}}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="ktp">No KTP</label>
                            <input type="text" class="form-control" name="noktp" value="{{$item->noktp}}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" name="alamat" value="{{$item->alamat}}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="notlpn">No Telepon</label>
                            <input type="text" class="form-control" name="notlpn" value="{{$item->notlpn}}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="tglawal">Tanggal Peminjaman</label>
                            <input type="date" class="form-control" name="tglawal" value="{{$item->tglawal}}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="tglakhir">Tanggal Kembali</label>
                            <input type="date" class="form-control" name="tglakhir" value="{{$item->tglakhir}}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="durasi">Durasi</label>
                            <input type="text" class="form-control" name="durasi" value="{{$item->durasi}} Hari" disabled>
                        </div>
                        <div class="form-group">
                            <label for="supir">Supir</label>
                            @if ($item->supir == '1')
                                <input type="text" class="form-control" name="supir" value="Yaa" disabled>
                            @else
                                <input type="text" class="form-control" name="supir" value="Tidak" disabled>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="harga_supir">Harga Supir</label>
                            <input type="text" class="form-control" name="harga_supir" value="Rp. {{number_format($item->hrg_sup)}}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="harga_sewa">Harga Sewa / hari</label>
                            <input type="text" class="form-control" name="harga_sewa" value="Rp. {{number_format($item->mobil->sewa)}}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="tot_harga">Total Harga</label>
                            <input type="text" class="form-control" name="tot_harga" value="Rp. {{number_format($item->tot_harga)}}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="foto">Upload</label>
                            <input type="file" class="form-control-file" name="foto">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Upload</button>
                    </form>
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