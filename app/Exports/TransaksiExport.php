<?php

namespace App\Exports;

use App\Models\Transaksi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TransaksiExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Transaksi::all();
    }

    public function map($transaksi): array
    {
        return [
            $transaksi->mobil->nama,
            $transaksi->nama,
            $transaksi->email,
            $transaksi->noktp,
            $transaksi->alamat,
            $transaksi->notlpn,
            $transaksi->tglawal,
            $transaksi->tglakhir,
            $transaksi->durasi . ' hari',
            $transaksi->hrg_sup,
            $transaksi->tot_harga,
        ];
    }

    public function headings(): array
    {
        return [
            'Mobil',
            'Nama',
            'Email',
            'No KTP',
            'Alamat',
            'No Telepon',
            'Tanggal Peminjaman',
            'Tanggal Pengembalian',
            'Durasi',
            'Harga Supir',
            'Total Harga',
        ];
    }
}
