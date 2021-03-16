<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user')->insert([
            'username' => 'admin',
            'password' => 'pass123',
            'roles' => 'admin',
            'nama' => 'Alvin Simbolon',
        ]);

        DB::table('user')->insert([
            'username' => 'user1',
            'password' => 'pass123',
            'roles' => 'user',
            'nama' => 'Leonard Sihombing',
        ]);
    }
}