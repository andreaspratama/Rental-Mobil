@extends('layouts.front')

@section('title')
    Sewa | Rental Mobil
@endsection

@section('content')
    <!-- Page Content -->
  <div class="container">

    <div class="row">

        <div class="col-lg-12 mt-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb" style="background-color: white">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Sewa</li>
                </ol>
            </nav>
        </div>
      <!-- /.col-lg-9 -->

    </div>
    <div class="row">
        <div class="col-lg-8 mb-3 ml-auto mr-auto">
            <div class="card">
                <div class="card-header">
                  Form Sewa Mobil {{$sewa->nama}}
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('checkout_create', $sewa->id)}}">
                        @csrf
                        <div class="form-group">
                            <label for="ktp">No KTP</label>
                            <input type="text" class="form-control @error('noktp') is-invalid @enderror" name="noktp" value="{{old('noktp')}}">
                            @error('noktp')
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{old('alamat')}}">
                            @error('alamat')
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="notlpn">No Telepon</label>
                            <input type="text" class="form-control @error('notlpn') is-invalid @enderror" name="notlpn" value="{{old('notlpn')}}">
                            @error('notlpn')
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tglawal">Tanggal Peminjaman</label>
                            <input type="date" class="form-control @error('tglawal') is-invalid @enderror" name="tglawal" value="{{old('tglawal')}}">
                            @error('tglawal')
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tglakhir">Tanggal Akhir</label>
                            <input type="date" class="form-control @error('tglakhir') is-invalid @enderror" name="tglakhir" value="{{old('tglakhir')}}">
                            @error('tglakhir')
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="supir">Supir</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="supir" value="1">
                                <label class="form-check-label" for="inlineCheckbox1">Yaa</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="supir" value="0">
                                <label class="form-check-label" for="inlineCheckbox2">Tidak</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Sewa Mobil</button>
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