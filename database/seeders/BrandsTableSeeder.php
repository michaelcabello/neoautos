<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BrandsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('brands')->delete();
        
        \DB::table('brands')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'toyota',
                'slug' => 'toyota',
                'shortdescription' => 'toyota',
                'order' => 1,
                'state' => 1,
                'image' => 'brands/default.jpg',
                'title' => 'toyota',
                'description' => 'toyota',
                'keywords' => 'toyota',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'chevrolet',
                'slug' => 'chevrolet',
                'shortdescription' => 'chevrolet',
                'order' => 2,
                'state' => 1,
                'image' => 'brands/default.jpg',
                'title' => 'chevrolet',
                'description' => 'chevrolet',
                'keywords' => 'chevrolet',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'mazda',
                'slug' => 'mazda',
                'shortdescription' => 'mazda',
                'order' => 1,
                'state' => 1,
                'image' => 'brands/default.jpg',
                'title' => 'mazda',
                'description' => 'mazda',
                'keywords' => 'mazda',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'audi',
                'slug' => 'audi',
                'shortdescription' => 'audi',
                'order' => 1,
                'state' => 1,
                'image' => 'brands/default.jpg',
                'title' => 'audi',
                'description' => 'audi',
                'keywords' => 'audi',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}