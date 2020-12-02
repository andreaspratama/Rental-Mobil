@extends('layouts.admin')

@section('judul')
    Tambah Banner
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Banner</h1>

        <div class="card">
            <div class="card-header">
              Tambah Banner
            </div>
            <div class="card-body">
              <form method="POST" action="{{route('banner.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="gambar">Gambar</label>
                  <input type="file" class="form-control-file @error('gambar') is-invalid @enderror" name="gambar">
                  @error('gambar')
                      <div id="validationServer03Feedback" class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="isaktiv">Is Aktiv</label>
                  <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="isaktiv" value="1">
                      <label class="form-check-label" for="inlineCheckbox1">Yaa</label>
                  </div>
                  <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" name="isaktiv" value="0">
                      <label class="form-check-label" for="inlineCheckbox2">Tidak</label>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{route('banner.index')}}" class="btn btn-secondary float-right">Batal</a>
              </form>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection