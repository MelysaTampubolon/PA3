<?php

namespace Database\Seeders;

use App\Http\Controllers\ProductController;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(SupplierSeeder::class);
        $this->call(TokoOnlineSeeder::class);
        $this->call(ConfigSeeder::class);
//        $this->call(SumberDataSeeder::class);
//        $this->call(ProductController::class);
        // \App\Models\User::factory(10)->create();
    }
}
