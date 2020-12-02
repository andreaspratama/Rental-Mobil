<table class="table table-bordered">
    <tr>
        <th>Tanggal Pinjam</th>
        <td>{{$item->tanggal}}</td>
    </tr>    
    <tr>
        <th>Nama Mobil</th>
        <td>{{$item->mobil->nama}}</td>
    </tr>    
    <tr>
        <th>Nama</th>
        <td>{{$item->nama}}</td>
    </tr>
    <tr>
        <th>Email</th>
        <td>{{$item->email}}</td>
    </tr>
    <tr>
        <th>No KTP</th>
        <td>{{$item->noktp}}</td>
    </tr>
    <tr>
        <th>Alamat</th>
        <td>{{$item->alamat}}</td>
    </tr>
    <tr>
        <th>No Telepon</th>
        <td>{{$item->notlpn}}</td>
    </tr>
    <tr>
        <th>Tanggal Peminjaman</th>
        <td>{{$item->tglawal}}</td>
    </tr>
    <tr>
        <th>Tanggal Kembali</th>
        <td>{{$item->tglakhir}}</td>
    </tr>
    <tr>
        <th>Durasi</th>
        <td>{{$item->durasi}} Hari</td>
    </tr>
    <tr>
        <th>Supir</th>
        <td>{{$item->hrg_sup}}</td>
    </tr>
    <tr>
        <th>Total Harga</th>
        <td>{{$item->tot_harga}}</td>
    </tr>
    <tr>
        <th>Foto Pembayaran</th>
        <td>
            <img src="{{Storage::url($item->foto)}}" width="100px" alt="">
        </td>
    </tr>
</table>
<div class="row">
    <div class="col-4">
        <a href="{{route('transstatus', $item->id)}}?status=Sukses" class="btn btn-success btn-block">
            Sukses
        </a>
    </div>
    <div class="col-4">
        <a href="{{route('transstatus', $item->id)}}?status=Menunggu Pembayaran" class="btn btn-warning btn-block">
            Menunggu Pembayaran
        </a>
    </div>
    <div class="col-4">
        <a href="{{route('transstatus', $item->id)}}?status=Menunggu Konfirmasi" class="btn btn-info btn-block">
            Menunggu Konfirmasi
        </a>
    </div>
</div>