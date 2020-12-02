@extends('layouts.admin')

@section('judul')
    Menunggu Pembayaran
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Menunggu Pembayaran</h1>

        <div class="card">
            <div class="card-header">
              Menunggu Pembayaran
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover table-sm" id="table">
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
                          <th>Tanggal</th>
                          <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                          @if ($item->status === 'Menunggu Pembayaran')
                              <tr>
                                  <td>{{$loop->iteration}}</td>
                                  <td>{{$item->mobil->nama}}</td>
                                  <td>{{$item->noktp}}</td>
                                  <td>{{$item->tglawal}}</td>
                                  <td>{{$item->tglakhir}}</td>
                                  <td>{{$item->durasi}} Hari</td>
                                  <td>Rp. {{number_format($item->hrg_sup)}}</td>
                                  <td>Rp. {{number_format($item->tot_harga)}}</td>
                                  <td>{{$item->tanggal}}</td>
                                  <td>{{$item->status}}</td>
                              </tr>
                          @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
    @include('sweetalert::alert')
@endsection

@push('after-style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
@endpush

@push('after-script')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script>
      $(document).ready(function() {
          $('#table').DataTable();
      } );
    </script>
@endpush