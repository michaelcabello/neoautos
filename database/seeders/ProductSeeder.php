<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Product::create([
            'name' => 'celular motorola 2022',
            'slug' => Str::slug('celular motorola'),
            'longdescription' => 'celular motorola celular motorolacelular motorolacelular motorolacelular motorola',
            'price' => 100,
            'stock' => 10,
            'state' => 1,
            'item_id' => 2,
            'user_id' => 1,

        ]);

        Product::create([
            'name' => 'celular samsung',
            'slug' => Str::slug('celular samsung'),
            'longdescription' => 'celular samsungcelular samsungcelular samsungcelular samsungcelular samsungcelular samsung',
            'price' => 120,
            'stock' => 10,
            'state' => 1,
            'item_id' => 2,
            'user_id' => 1,

        ]);


        Product::create([
            'name' => 'monitores samsung',
            'slug' => Str::slug('monitores samsung'),
            'longdescription' => 'monitores samsungmonitores samsungmonitores samsungmonitores samsungmonitores samsungmonitores samsungmonitores samsungmonitores samsung',
            'price' => 180,
            'stock' => 10,
            'state' => 1,
            'item_id' => 1,
            'user_id' => 1,

        ]);


        Product::create([
            'name' => 'teclados para guemer',
            'slug' => Str::slug('teclados para guemer'),
            'longdescription' => 'teclados para guemerteclados para guemerteclados para guemerteclados para guemerteclados para guemerteclados para guemer',
            'price' => 87,
            'stock' => 10,
            'state' => 1,
            'item_id' => 2,
            'user_id' => 1,

        ]);


        Product::create([
            'name' => 'procesadores intel para pc',
            'slug' => Str::slug('procesadores intel para pc'),
            'longdescription' => 'procesadores intel para pcprocesadores intel para pcprocesadores intel para pcprocesadores intel para pcprocesadores intel para pc',
            'price' => 165,
            'stock' => 10,
            'state' => 1,
            'item_id' => 1,
            'user_id' => 1,

        ]);


        Product::create([
            'name' => 'parlantes con bajos',
            'slug' => Str::slug('parlantes con bajos'),
            'longdescription' => 'parlantes con bajosparlantes con bajosparlantes con bajosparlantes con bajosparlantes con bajosa',
            'price' => 88,
            'stock' => 10,
            'state' => 1,
            'item_id' => 1,
            'user_id' => 1,

        ]);

        Product::create([
            'name' => 'monitor toch cream',
            'slug' => Str::slug('monitor-toch-cream'),
            'longdescription' => 'monitor toch cream monitor toch cream monitor toch cream monitor toch cream',
            'price' => 265,
            'stock' => 10,
            'state' => 1,
            'item_id' => 1,
            'user_id' => 2,

        ]);


        Product::create([
            'name' => 'audifono de marca',
            'slug' => Str::slug('audifono-de-marcas'),
            'longdescription' => 'audifono de marca audifono de marca audifono de marcaaudifono de marcaaudifono de marcaaudifono de marcaaudifono de marcaaudifono de marca',
            'price' => 98,
            'stock' => 10,
            'state' => 1,
            'item_id' => 1,
            'user_id' => 2,

        ]);


    }
}
