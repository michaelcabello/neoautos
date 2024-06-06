<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Item::create([
            'name' => 'Autos',
            'slug' => Str::slug('autos'),
            'image' => 'items/'.Str::slug('auto').'.jpg',
            'shortdescription' => 'autos',
            'title' => 'autos',
            'description' => 'autos',
            'keywords' => 'autos',
            'state'=>1,
        ]);

        Item::create([
            'name' => 'Motos',
            'slug' => Str::slug('Motos'),
            'image' => 'items/'.Str::slug('Motos').'.jpg',
            'shortdescription' => 'Motos',
            'title' => 'Motos',
            'description' => 'Motos',
            'keywords' => 'Motos',
            'state'=>1,
        ]);

        Item::create([
            'name' => 'Camiones',
            'slug' => Str::slug('Camiones'),
            'shortdescription' => 'Camiones',
            'title' => 'Camiones',
            'description' => 'Camiones',
            'keywords' => 'Camiones',
            'image' => 'items/'.Str::slug('Camiones').'.jpg',
            'state'=>1,
        ]);






    }
}
