@extends('layouts.admin')

@section('judul')
    Tambah Merk
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Merk</h1>

        <div class="card">
            <div class="card-header">
              Tambah Merk
            </div>
            <div class="card-body">
              <form method="POST" action="{{route('merk.store')}}">
                @csrf
                <div class="form-group">
                  <label for="nama">Nama Merk</label>
                  <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="Nama Merk...">
                  @error('nama')
                      <div id="validationServer03Feedback" class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{route('merk.index')}}" class="btn btn-secondary float-right">Batal</a>
              </form>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection