@extends('layouts.admin')

@section('judul')
    Detail Mobil
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Mobil</h1>

        <div class="card">
            <div class="card-header">
              Detail Mobil {{$item->nama}}
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover">
                  <tr>
                    <th width="20%">Foto :</th>
                    <td width="80%">
                      <img src="{{Storage::url($item->gambar)}}" alt="" width="50%" />
                    </td>
                  </tr>
                  <tr>
                    <th>Nama :</th>
                    <td>
                      {{$item->nama}}
                    </td>
                  </tr>
                  <tr>
                    <th>Kategori :</th>
                    <td>
                      {{$item->kategori->nama}}
                    </td>
                  </tr>
                  <tr>
                    <th>Merk :</th>
                    <td>
                      {{$item->merk->nama}}
                    </td>
                  </tr>
                  <tr>
                    <th>Warna :</th>
                    <td>
                      {{$item->warna}}
                    </td>
                  </tr>
                  <tr>
                    <th>Fitur :</th>
                    <td>
                      {{$item->fitur()->get()->implode('nama', ', ')}}
                    </td>
                  </tr>
                  <tr>
                    <th>Tahun :</th>
                    <td>
                      {{$item->tahun}}
                    </td>
                  </tr>
                  <tr>
                    <th>Plat :</th>
                    <td>
                      {{$item->plat}}
                    </td>
                  </tr>
                  <tr>
                    <th>Sewa :</th>
                    <td>
                      {{$item->sewa}}
                    </td>
                  </tr><tr>
                    <th>Status :</th>
                    <td>
                      {{$item->status}} / <p class="text-danger">(Jika 0 -> Tidak Disewa, jika 1 -> Disewa)</p>
                    </td>
                  </tr>
                  <tr>
                    <th>Kursi :</th>
                    <td>
                      {{$item->kursi}}
                    </td>
                  </tr>
                  <tr>
                    <th>Deskripsi :</th>
                    <td>
                      {{$item->deskripsi}}
                    </td>
                  </tr>
                    {{-- <thead>
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
                    </tbody> --}}
                </table>
                <a href="{{route('mobil.index')}}" class="btn btn-secondary">Kembali</a>
            </div>
          </div>

    </div>
    <!-- /.container-fluid -->
    @include('sweetalert::alert')
@endsection