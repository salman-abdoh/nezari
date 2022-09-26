<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call([
            categorySeeder::class,
            productsSeeder::class,
            companySeeder::class,
            contactSeeder::class,
            servicesctsSeeder::class,
        ]);
    }
}
