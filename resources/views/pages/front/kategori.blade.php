@extends('layouts.front')

@section('title')
    Home | Kategori
@endsection

@section('content')
    <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3">

        <h1 class="my-4">Pratama Mobil</h1>
        @include('includes.front.kategori')

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

        @include('includes.front.carausel')

        <div class="row">

          @foreach ($data as $m)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                <a href="#"><img class="card-img-top" src="{{Storage::url($m->gambar)}}" width="100%" height="250px" alt=""></a>
                <div class="card-body">
                    <h4 class="card-title">
                        <p>{{$m->nama}}</p>
                        
                    </h4>
                    <h5>Rp. {{number_format($m->sewa)}} / hari</h5>
                    <p class="card-text">{{$m->deskripsi}}</p>
                </div>
                <div class="card-footer">
                    <a href="{{route('detail', $m->slug)}}" class="btn btn-info float-right btn-block">Detail</a>
                </div>
                </div>
            </div>
          @endforeach

        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->
@endsection