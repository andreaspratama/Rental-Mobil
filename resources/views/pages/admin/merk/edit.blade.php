@extends('layouts.admin')

@section('judul')
    Edit Merk
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Merk</h1>

        <div class="card">
            <div class="card-header">
              Edit Merk
            </div>
            <div class="card-body">
              <form method="POST" action="{{route('merk.update', $item->id)}}">
                @csrf
                @method('PUT')
                <div class="form-group">
                  <label for="nama">Nama Merk</label>
                  <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="Nama Merk..." value="{{$item->nama}}">
                  @error('nama')
                      <div id="validationServer03Feedback" class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{route('merk.index')}}" class="btn btn-secondary float-right">Batal</a>
              </form>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection