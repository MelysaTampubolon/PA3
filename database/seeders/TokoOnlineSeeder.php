<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TokoOnlineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('toko_online')->insert([
            'nama_toko' => 'Toba Liquor',
            'nama_platform' => 'Tokopedia',
        ]);
    }
}
