<?php

namespace Database\Seeders;

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
        \App\Models\UserDetail::factory(10)->create();
        \App\Models\Shops::factory(10)->create();
        \App\Models\Discounts::factory(1000)->create();
        \App\Models\Categories::factory(10)->create();
        \App\Models\Products::factory(10)->create();

    }
}
