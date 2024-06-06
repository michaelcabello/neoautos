<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \App\Models\User::factory(10)->create();
        $this->call(UserSeeder::class);
        $this->call(ItemSeeder::class);
        //$this->call(ProductSeeder::class);

        /* $this->call(CategorySeeder::class);

        */
        //$this->call(DepartamentoSeeder::class);
        $this->call(SubcategoriesTableSeeder::class);
        $this->call(BrandsTableSeeder::class);
        $this->call(TiposTableSeeder::class);
        $this->call(YearsTableSeeder::class);
        $this->call(ColorsTableSeeder::class);
    }
}
