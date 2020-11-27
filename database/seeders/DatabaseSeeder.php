<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Database\Seeders\ProductsSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Model::ungaurd();
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        $this->call(ProductsSeeder::class);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }
}
