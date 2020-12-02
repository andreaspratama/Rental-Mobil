<div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
<div class="carousel-inner" role="listbox">
@foreach ($banners as $aktiv)
    @if ($aktiv->isaktiv == '1')
    <div class="carousel-item active">
        <img class="d-block img-fluid ml-auto mr-auto" src="{{Storage::url($aktiv->gambar)}}" style="height: 321px; width: 80%" alt="First slide">
    </div>
    @else
    <div class="carousel-item">
        <img class="d-block img-fluid ml-auto mr-auto" src="{{Storage::url($aktiv->gambar)}}" style="height: 321px; width: 80%" alt="First slide">
    </div>
    @endif
@endforeach
</div>
<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
<span class="carousel-control-prev-icon" aria-hidden="true"></span>
<span class="sr-only">Previous</span>
</a>
<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
<span class="carousel-control-next-icon" aria-hidden="true"></span>
<span class="sr-only">Next</span>
</a></div>