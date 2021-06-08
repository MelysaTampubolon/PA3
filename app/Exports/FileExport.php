<?php

namespace App\Exports;

use App\Models\Product;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class FileExport implements FromQuery, ShouldAutoSize, WithHeadings
{
    use Exportable;

    public function getID(int $id)
    {
        $this->id = $id;

        return $this;
    }


    public function query()
    {
        return DB::table('product')
            ->where('riwayat_id', $this->id)
            ->orderBy('nama_produk')
            ->select(
                'dummyColumn as errorMsg',
                'nama_produk',
                'deskripsi',
                'kategoriToped',
                'berat',
                'dummyColumn as minOrder',
                'dummyColumn as etalaseNum',
                'waktuPreorder',
                'dummyColumn as kondisi',
                'gambar',
                'dummyColumn as gambar2',
                'dummyColumn as gambar3',
                'dummyColumn as gambar4',
                'dummyColumn as gambar5',
                'dummyColumn as vid1',
                'dummyColumn as vid2',
                'dummyColumn as vid3',
                'id',
                'dummyColumn as status',
                'stok',
                'harga',
                'asuransi'
            );
    }

    public function headings(): array
    {
        return [
            'Error Message',
            'Nama Produk',
            'Deskripsi Produk',
            'Kategori Kode',
            'Berat',
            'Minimum Pemesanan',
            'Nomor Etalase',
            'Waktu Proses Preorder',
            'Kondisi',
            'Gambar 1',
            'Gambar 2',
            'Gambar 3',
            'Gambar 4',
            'Gambar 5',
            'URL Video Produk 1',
            'URL Video Produk 2',
            'URL Video Produk 3',
            'SKU Name',
            'Status',
            'Jumlah Stok',
            'Harga',
            'Asuransi Pengiriman',
        ];
    }
}
