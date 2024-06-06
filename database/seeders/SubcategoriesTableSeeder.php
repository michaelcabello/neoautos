<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SubcategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('subcategories')->delete();
        
        \DB::table('subcategories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Suv',
                'slug' => 'Suv',
                'shortdescription' => 'Suv',
                'longdescription' => 'Suv',
                'order' => 1,
                'state' => 1,
                'image' => 'subcategories/default.jpg',
                'title' => 'Suv',
                'description' => 'Suv',
                'keywords' => 'Suv',
                'item_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'hatchback',
                'slug' => 'hatchback',
                'shortdescription' => 'hatchback',
                'longdescription' => 'hatchback',
                'order' => 2,
                'state' => 1,
                'image' => 'subcategories/default.jpg',
                'title' => 'hatchback',
                'description' => 'hatchback',
                'keywords' => 'hatchback',
                'item_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Vans',
                'slug' => 'vans',
                'shortdescription' => 'vans',
                'longdescription' => 'vans',
                'order' => 4,
                'state' => 1,
                'image' => 'subcategories/default.jpg',
                'title' => 'vans',
                'description' => 'vans',
                'keywords' => 'vans',
                'item_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'sedan',
                'slug' => 'sedan',
                'shortdescription' => 'sedan',
                'longdescription' => 'sedan',
                'order' => 3,
                'state' => 1,
                'image' => 'subcategories/default.jpg',
                'title' => 'sedan',
                'description' => 'sedan',
                'keywords' => 'sedan',
                'item_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Deportivo',
                'slug' => 'deportivo',
                'shortdescription' => 'deportivo',
                'longdescription' => 'deportivo',
                'order' => 5,
                'state' => 0,
                'image' => 'subcategories/default.jpg',
                'title' => 'deportivo',
                'description' => 'deportivo',
                'keywords' => 'deportivo',
                'item_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}