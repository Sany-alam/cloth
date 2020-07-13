<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = ['fada jeans','shada jeans','kala jeans','nil jeans'];
        for ($j=0; $j < 5; $j++) { 
            for ($i=0; $i < 4; $i++) { 
                Product::create(['subcategory_id'=>7,'name'=>$name[$i],'slug'=>str_slug($name[$i]),'price'=>$j.$i.$i.$j, 'size'=>'M,L','color'=>'blue,black']);
            }
        }
    }
}
