<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product')->insert([
            'id' => '1',
            'riwayat_id' => '1',
            'kategoriToped' => '2785',
            'kategoriShopee' => '27157',
            'kategoriBukaLapak' => '',
            'kode_produk' => '',
            'url_produk' => 'https://www.whiskyshop.com/grey-goose-vodka-la-collection-4-x-5cl',
            'nama_produk' => 'Grey Goose Vodka La Collection 4 x 5cl',
            'stok' => '15',
            'harga' => '313609',
            'gambar' => 'https://cdn.whiskyshop.com/pub/media/catalog/product/cache/917393f93da2b5d295a9e892fd6c1900/g/r/greygoose_lacollection_ps.jpg',
            'deskripsi' => '',
            'berat' => '1000',
            'waktuPreorder' => '15',
            'asuransi' => 'Tidak',
            'dummyColumn' => '',
        ]);


        DB::table('product')->insert([
            'id' => '2',
            'riwayat_id' => '1',
            'kategoriToped' => '2785',
            'kategoriShopee' => '27157',
            'kategoriBukaLapak' => '',
            'kode_produk' => '',
            'url_produk' => 'https://www.whiskyshop.com/grey-goose-vodka-london-limited-edition',
            'nama_produk' => 'Grey Goose Vodka London Limited Edition',
            'stok' => '15',
            'harga' => '1045360',
            'gambar' => 'https://cdn.whiskyshop.com/pub/media/catalog/product/cache/917393f93da2b5d295a9e892fd6c1900/g/r/greygoose_london_ps.jpg',
            'deskripsi' => '',
            'berat' => '1000',
            'waktuPreorder' => '15',
            'asuransi' => 'Tidak',
            'dummyColumn' => '',
        ]);


        DB::table('product')->insert([
            'id' => '3',
            'riwayat_id' => '1',
            'kategoriToped' => '2785',
            'kategoriShopee' => '27157',
            'kategoriBukaLapak' => '',
            'kode_produk' => '',
            'url_produk' => 'https://www.whiskyshop.com/grey-goose-la-vanille-vodka',
            'nama_produk' => 'Grey Goose La Vanille Vodka',
            'stok' => '15',
            'harga' => '714332',
            'gambar' => 'https://cdn.whiskyshop.com/pub/media/catalog/product/cache/917393f93da2b5d295a9e892fd6c1900/3/0/30603_b.jpg',
            'deskripsi' => '',
            'berat' => '1000',
            'waktuPreorder' => '15',
            'asuransi' => 'Tidak',
            'dummyColumn' => '',
        ]);
    }
}
