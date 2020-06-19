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
            'image'=>"Liseaven-T-Shirt-Men-Cotton-T-Shirt-Full-Sleeve-tshirt-Men-Solid-Color-T-shirts-topsjpg640x6402020-06-18-060628.webp",
        ]);
        App\Category::create([
            'name'=>"Panjabi",
            'image'=>"P-103-300x300.jpg",
        ]);
    }
}
