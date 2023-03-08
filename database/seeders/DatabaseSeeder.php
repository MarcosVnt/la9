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
       // \App\Models\User::factory(10)->create();
        \App\Models\User::factory()->create(
            ['name' => 'Admin',
            'email' => 'admin@iracustica.com'
            ]
        );
        
        \App\Models\Category::factory()->create([ 'id' => 1,'name' => 'Mate']);
        \App\Models\Category::factory()->create([ 'id' => 2,'name' => 'Satinado']);
        \App\Models\Category::factory()->create([ 'id' => 3,'name' => 'Brillo']);
        \App\Models\Category::factory()->create([ 'id' => 4,'name' => 'Textura']);
        
        \App\Models\Product::factory()->create(
            ['category_id' => '1',
            'code' => '9001',
            'ean' => '901',
            'name' => 'blanco',
            'description' => 'blanco',
            'price' => 0,
            'medida' => 'kg',
            'status' => 0,
            'id' => 1,

            ]
               

            

        );
        \App\Models\Product::factory()->create(
            ['category_id' => '2',
            'code' => '9001',
            'ean' => '901',
            'name' => 'blanco',
            'description' => 'blanco',
            'price' => 15.90,
            'medida' => 'kg',
            'status' => 0,
            'id' => 2,

            ]
        );

        \App\Models\Product::factory()->create(
            ['category_id' => '3',
            'code' => '9001',
            'ean' => '901',
            'name' => 'blanco',
            'description' => 'blanco',
            'price' => 15.90,
            'medida' => 'kg',
            'status' => 0,
            'id' => 3,

            ]
        );

        \App\Models\Product::factory()->create(
            ['category_id' => '4',
            'code' => '9001',
            'ean' => '901',
            'name' => 'blanco',
            'description' => 'blanco',
            'price' => 15.90,
            'medida' => 'kg',
            'status' => 0,
            'id' => 4,

            ]
        );




        /* 
        \App\Models\Product::factory(10)->create();
       
        \App\Models\Movement::factory(10)->create();
 */

        
       

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
