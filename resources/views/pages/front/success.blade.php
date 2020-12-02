@extends('layouts.front')

@section('title')
    Sukses | Rental Mobil
@endsection

@section('content')
    <!-- Page Content -->
  <div class="container">
    <div class="row">
        <div class="col-lg-12 ml-auto mr-auto">
            <div class="gambar text-center mt-5 mb-5">
                <img src="{{url('success.jpg')}}" width="40%" height="300px" alt="">
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