<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Category::create([
            'name' => 'Celulares y tablets',
            'slug' => Str::slug('Celulares y tablets'),
            'state'=>1,
        ]);

        Category::create([
            'name' => 'blusas damas',
            'slug' => Str::slug('blusas damas'),
            'state'=>1,
        ]);

        Category::create([
            'name' => 'artefactos electricos',
            'slug' => Str::slug('artefactos electricos'),
            'state'=>1,
        ]);

        Category::create([
            'name' => 'monitores y placas',
            'slug' => Str::slug('monitores y placas'),
            'state'=>1,
        ]);

        Category::create([
            'name' => 'colegios',
            'slug' => Str::slug('Colegios'),
            'state'=>1,
        ]);

        Category::create([
            'name' => 'laptops y notebooks',
            'slug' => Str::slug('laptops y notebooks'),
            'state'=>1,
        ]);

        Category::create([
            'name' => 'muebles en melamine',
            'slug' => Str::slug('muebles en melamine'),
            'state'=>1,
        ]);


        
    }
}
