@extends('layouts.admin')

@section('judul')
    Mobil
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Mobil</h1>

        <div class="card">
            <div class="card-header">
              <a href="{{route('mobil.create')}}" class="btn btn-primary btn-sm">Tambah Mobil</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover table-sm" id="table">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Mobil</th>
                        <th>Kategori</th>
                        <th>No Plat</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($items as $item)
                        <tr>
                            <th>{{$loop->iteration}}</th>
                            <td>{{$item->nama}}</td>
                            <td>{{$item->kategori->nama}}</td>
                            <td>{{$item->plat}}</td>
                            <td>{{$item->sewa}}</td>
                            <td>
                                <a href="{{route('mobil.edit', $item->id)}}" class="btn btn-warning btn-sm">Edit</a>
                                <a href="{{route('mobil.show', $item->id)}}" class="btn btn-info btn-sm">Detail</a>
                                <form action="{{route('mobil.destroy', $item->id)}}" method="POST" class="d-inline" onclick="return confirm('Anda yakin mau menghapus ini ?')">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
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