@extends('layouts.admin')

@section('judul')
    List Transaksi
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">List Transaksi Sukses</h1>
        <a href="{{route('exportexcel')}}" class="btn btn-success btn-sm mb-3">Cetak Excel</a>
        <a href="{{route('exportpdf')}}" class="btn btn-danger btn-sm mb-3">Cetak PDF</a>
        <div class="card">
            <div class="card-header">
              List Transaksi
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
                          <th>Status</th>
                          <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                          @if ($item->status === 'Sukses')
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
                                  <td>
                                    <a href="#mymodal"
                                         data-remote="{{route('transshowlist', $item->id)}}"
                                         data-toggle="modal"
                                         data-target="#mymodal"
                                         data-title="Detail Transaksi {{$item->code_trans}}"
                                         class="btn btn-info btn-sm">
                                         Detail
                                    </a>
                                  </td>
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
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script>
      $(document).ready(function() {
          $('#table').DataTable();
      } );
    </script>
    <script>
        jQuery(document).ready(function($){
            $('#mymodal').on('show.bs.modal', function(e){
                var button = $(e.relatedTarget);
                var modal = $(this);

                modal.find('.modal-body').load(button.data("remote"));
                modal.find('.modal-title').html(button.data("title"));
            });
        });
    </script>
@endpush
<div class="modal" id="mymodal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <i class="fa fa-spinner fa-spin"></i>
        </div>
      </div>
    </div>
</div>