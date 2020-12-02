@extends('layouts.admin')

@section('judul')
    Edit Mobil
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Mobil</h1>

        <div class="card">
            <div class="card-header">
              Edit Mobil {{$item->nama}}
            </div>
            <div class="card-body">
              <form method="POST" action="{{route('mobil.update', $item->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                  <label for="nama">Nama Mobil</label>
                  <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="Nama Mobil..." value="{{$item->nama}}">
                  @error('nama')
                      <div id="validationServer03Feedback" class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="kategori_id">Kategori</label>
                  <select class="form-control @error('kategori_id') is-invalid @enderror" name="kategori_id">
                    <option value="{{$item->kategori_id}}">-- Ubah Bila Perlu --</option>
                    @foreach ($kategoris as $k)
                      <option value="{{$k->id}}">{{$k->nama}}</option>
                    @endforeach
                  </select>
                  @error('kategori_id')
                      <div id="validationServer03Feedback" class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="merk_id">Merk</label>
                  <select class="form-control @error('merk_id') is-invalid @enderror" name="merk_id">
                    <option value="{{$item->merk_id}}">-- Ubah Bila Perlu --</option>
                    @foreach ($merks as $m)
                      <option value="{{$m->id}}">{{$m->nama}}</option>
                    @endforeach
                  </select>
                  @error('merk_id')
                      <div id="validationServer03Feedback" class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="fitur_id">Fitur</label>
                  <select multiple class="form-control multi @error('fitur') is-invalid @enderror" name="fitur[]">
                    @foreach ($fiturs as $f)
                      <option {{$item->fitur()->find($f->id) ? 'selected' : ''}} value="{{$f->id}}">{{$f->nama}}</option>
                    @endforeach
                  </select>
                  @error('fitur')
                      <div id="validationServer03Feedback" class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="warna">Warna Mobil</label>
                  <input type="text" class="form-control @error('warna') is-invalid @enderror" name="warna" placeholder="Warna Mobil..." value="{{$item->warna}}">
                  @error('warna')
                      <div id="validationServer03Feedback" class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="tahun">Tahun Mobil</label>
                  <input type="text" class="form-control @error('tahun') is-invalid @enderror" name="tahun" placeholder="Tahun Mobil..." value="{{$item->tahun}}">
                  @error('tahun')
                      <div id="validationServer03Feedback" class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="plat">Plat Mobil</label>
                  <input type="text" class="form-control @error('plat') is-invalid @enderror" name="plat" placeholder="Plat Mobil..." value="{{$item->plat}}">
                  @error('plat')
                      <div id="validationServer03Feedback" class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="sewa">Harga Sewa</label>
                  <input type="text" class="form-control @error('sewa') is-invalid @enderror" name="sewa" placeholder="Harga Sewa..." value="{{$item->sewa}}">
                  @error('sewa')
                      <div id="validationServer03Feedback" class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="status">Status</label>
                  <select class="form-control @error('status') is-invalid @enderror" name="status">
                    <option>-- Pilih Status --</option>
                    <option value="0" @if($item->status == '0') selected @endif>Tidak Disewa</option>
                    <option value="1" @if($item->status == '1') selected @endif>Disewa</option>
                  </select>
                  @error('status')
                      <div id="validationServer03Feedback" class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="kursi">Jumlah Kursi</label>
                  <input type="text" class="form-control @error('kursi') is-invalid @enderror" name="kursi" placeholder="Jumlah Kursi..." value="{{$item->kursi}}">
                  @error('kursi')
                      <div id="validationServer03Feedback" class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="deskripsi">Deskripsi</label>
                  <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" rows="3">{{$item->deskripsi}}</textarea>
                  @error('deskripsi')
                      <div id="validationServer03Feedback" class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="gambar">Gambar</label>
                  <input type="file" class="form-control-file @error('gambar') is-invalid @enderror" name="gambar">
                  @error('gambar')
                      <div id="validationServer03Feedback" class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
                  <p class="text-danger mt-2">Ubah Gambar Bila Perlu</p>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{route('mobil.index')}}" class="btn btn-secondary float-right">Batal</a>
              </form>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection

@push('after-style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@push('after-script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>
      $(document).ready(function() {
          $('.multi').select2();
      });
    </script>
@endpush