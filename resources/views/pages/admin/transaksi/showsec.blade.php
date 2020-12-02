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
        <td>Rp. {{number_format($item->hrg_sup)}}</td>
    </tr>
    <tr>
        <th>Total Harga</th>
        <td>Rp. {{number_format($item->tot_harga)}}</td>
    </tr>
    <tr>
        <th>Foto Pembayaran</th>
        <td>
            <img src="{{Storage::url($item->foto)}}" width="100px" alt="">
        </td>
    </tr>
    <tr>
        <th>Status Pengembalian</th>
        <td>
            {{$item->status_kembali}}
        </td>
    </tr>
</table>
<div class="row">
    @if ($item->status_kembali == 'Kembali')
        <div class="col-12 text-center">
            <h5>Mobil Telah Dikembalikan</h5>
        </div>
    @else
        <div class="col-6">
            <a href="{{route('transstatuskemb', $item->id)}}?status_kembali=Kembali" class="btn btn-success btn-block">
                Kembali
            </a>
        </div>
        <div class="col-6">
            <a href="{{route('transstatuskemb', $item->id)}}?status_kembali=Belum Kembali" class="btn btn-warning btn-block">
                Belum Kembali
            </a>
        </div>
    @endif
</div>