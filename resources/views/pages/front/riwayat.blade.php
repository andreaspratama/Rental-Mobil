@extends('layouts.front')

@section('title')
    Riwayat Sewa | Rental Mobil
@endsection

@section('content')
    <!-- Page Content -->
  <div class="container-fluid">

    <div class="row">

        <div class="col-lg-12 mt-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb" style="background-color: white">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Riwayat Sewa</li>
                </ol>
            </nav>
        </div>
      <!-- /.col-lg-9 -->

    </div>
    <div class="row">
        <div class="col-lg-12 mb-3 ml-auto mr-auto">
            <div class="card">
                <div class="card-header">
                  Riwayat Sewa Mobil
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Mobil</th>
                            <th>No Ktp</th>
                            <th>Tanggal Peminjaman</th>
                            <th>Tanggal Kembali</th>
                            <th>Durasi</th>
                            <th>Supir</th>
                            <th>Total Harga</th>
                            <th>Status</th>
                            <th>Foto</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($items as $item)
                            @if ($item->nama === Auth::user()->name)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->mobil->nama}}</td>
                                    <td>{{$item->noktp}}</td>
                                    <td>{{$item->tglawal}}</td>
                                    <td>{{$item->tglakhir}}</td>
                                    <td>{{$item->durasi}} Hari</td>
                                    <td>Rp. {{number_format($item->hrg_sup)}}</td>
                                    <td>Rp. {{number_format($item->tot_harga)}}</td>
                                    <td>{{$item->status}}</td>
                                    @if ($item->foto == True)
                                        <td>
                                            <img src="{{Storage::url($item->foto)}}" alt="" width="200px">
                                        </td>
                                    @else
                                        <td>
                                            <a href="{{route('upload', $item->id)}}" class="btn btn-primary btn-sm">Upload Pembayaran</a>
                                        </td>
                                    @endif
                                </tr>
                            @endif
                          @endforeach
                        </tbody>
                    </table>
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