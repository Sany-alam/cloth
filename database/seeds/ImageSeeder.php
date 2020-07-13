<?php

use Illuminate\Database\Seeder;
use App\Image;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i < 21; $i++) {
            Image::create(['product_id'=>$i,'image'=>'jeans1.jpg']);
        }
    }
}
