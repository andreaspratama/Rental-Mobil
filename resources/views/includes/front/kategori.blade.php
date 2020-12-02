<div class="kategori">
    <h6>Kategori</h6>
</div>
<div class="list-group">
    <a href="{{route('home')}}" class="list-group-item" style="text-decoration: none; background-color: #303030; color: #fff; text-transform: uppercase">Semua</a>
    @foreach ($kategoris as $k)
    <a href="{{route('kategori', $k->id)}}" class="list-group-item" style="text-decoration: none; background-color: #303030; color: #fff; text-transform: uppercase">> {{$k->nama}}</a>
    @endforeach
</div>