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
        // User::factory(10)->create();
        $this->call(LayananSeeder::class);
        $this->call(CafeSeeder::class);
        $this->call(ProdukSeeder::class);
        $this->call(SosialMediaSeeder::class);
        $this->call(GaleriSeeder::class);
    }
}
