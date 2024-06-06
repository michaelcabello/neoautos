<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TiposTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tipos')->delete();
        
        \DB::table('tipos')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'cruze',
                'slug' => 'cruze',
                'shortdescription' => 'cruze',
                'order' => 1,
                'state' => 1,
                'image' => 'tipomodelo/default.jpg',
                'title' => 'cruze',
                'description' => 'cruze',
                'keywords' => 'cruze',
                'brand_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'modelo1',
                'slug' => 'modelo1',
                'shortdescription' => 'modelo1',
                'order' => 2,
                'state' => 1,
                'image' => 'tipomodelo/default.jpg',
                'title' => 'modelo1',
                'description' => 'modelo1',
                'keywords' => 'modelo1',
                'brand_id' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'modelo2',
                'slug' => 'modelo2',
                'shortdescription' => 'modelo2',
                'order' => 3,
                'state' => 1,
                'image' => 'tipomodelo/default.jpg',
                'title' => 'modelo2',
                'description' => 'modelo2',
                'keywords' => 'modelo2',
                'brand_id' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'modelo3',
                'slug' => 'modelo3',
                'shortdescription' => 'modelo3',
                'order' => 3,
                'state' => 0,
                'image' => 'tipomodelo/default.jpg',
                'title' => 'modelo3',
                'description' => 'modelo3',
                'keywords' => 'modelo3',
                'brand_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'modelo4',
                'slug' => 'modelo4',
                'shortdescription' => 'modelo4',
                'order' => 5,
                'state' => 0,
                'image' => 'tipomodelo/default.jpg',
                'title' => 'modelo4',
                'description' => 'modelo4',
                'keywords' => 'modelo4',
                'brand_id' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}