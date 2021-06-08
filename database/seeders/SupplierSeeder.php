<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('supplier')->insert([
            'id' => '1',
            'link' => 'https://www.whiskyshop.com/',
            'nama_toko' => 'The Whisky Shop',
        ]);
    }
}
