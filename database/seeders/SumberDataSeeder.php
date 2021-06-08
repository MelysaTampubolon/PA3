<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SumberDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('riwayat_fetch_data')->insert([
            'id' => '1',
            'supplier_id ' => '1',
            'tanggal_fetch' => '2021-06-05',
            'deskripsi ' => 'Scrape Whisky from Whisky.com',
            'config_id ' => '1',
            'user_id  ' => '1',
        ]);

        DB::table('riwayat_fetch_data')->insert([
            'id' => '2',
            'supplier_id ' => '1',
            'tanggal_fetch' => '2021-06-05',
            'deskripsi ' => 'Scrape Vodka from Whisky.com',
            'config_id ' => '2',
            'user_id  ' => '1',
        ]);
    }
}
