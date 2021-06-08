<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\FileExport;

class ExportController extends Controller
{
    public function export(){

        return (new FileExport)->getID(2)->download('whisky.xlsx');


//        $product_data = DB::table('product')->get()->toArray();
//        $data_array[] = array('Nama Produk', 'Deskripsi Produk', 'Kategori Kode', 'Berat', 'Waktu Preorder', 'Kondisi', 'Gambar', 'SKU Name', 'Status', 'Jumlah Stok', 'Harga');
//
//        foreach ($product_data as $data){
//            $data_array[] = array(
//                'Nama Produk' => $data->nama_produk,
//                'Deskripsi Produk' => $data->deskripsi,
//                'Kategori Kode' => $data->kategoriToped,
//                'Berat' => $data->berat,
//                'Waktu Preorder' => $data->waktuPreorder,
//                'Kondisi' => 'Baru',
//                'Gambar' => $data->gambar,
//                'SKU Name' => $data->id,
//                'Status' => 'Aktif',
//                'Jumlah Stok' => $data->stok,
//                'Harga' => $data->harga
//            );
//        }
//        Excel::create('whisky', function($excel) use($data_array){
//            $excel->setTitle
//        });
    }
}
