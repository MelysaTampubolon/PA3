<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('file_config')->insert([
            'id' => '1',
            'supplier_id' => '1',
            'nama_file' => 'whiskyspider.py',
        ]);

        DB::table('file_config')->insert([
            'id' => '2',
            'supplier_id' => '1',
            'nama_file' => 'vodka.py',
        ]);
    }
}
