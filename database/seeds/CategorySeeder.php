<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Category::create([
            'name'=>"T-Shirt",
            'image'=>"ct1.webp",
        ]);
        App\Category::create([
            'name'=>"Panjabi",
            'image'=>"ct2.jpg",
        ]);
    }
}
