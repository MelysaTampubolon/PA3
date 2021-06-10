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

class FileExportShopee implements FromQuery, ShouldAutoSize, WithHeadings
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
                'kategoriShopee',
                'nama_produk',
                'nama_produk as Deskripsi',
                'harga',
                'stok',
                'gambar',
                'berat',
                'jasa_kirim as jaskir1',
                'waktuPreorder as waktuPengiriman'
            );
    }

    public function headings(): array
    {
        return [
            'Kategori',
            'Nama Produk',
            'Deskripsi Produk',
            'Harga',
            'Stok',
            'Foto Sampul',
            'Berat',
            'Jasa Kirim 1',
            'Dikirim Dalam',
        ];
    }
}
