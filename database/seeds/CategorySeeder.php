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
        $domain = [
            [
                'Top Wear','Bottom Wear','Foot Wear','Sports & Active Wear','Fashion Accessories'
            ],
            [
                'Bangladeshi & Fusion Wear','Foot Wear','Lingerie & Sleepwear'
            ],
            [
                'Boys Clothing','Girls Clothing','Boys Footwear','Girls Footwear'
            ]
        ];

        foreach ($domain as $d_key => $categories) {
            foreach ($categories as $c_key => $value) {
                App\Category::create(['domain_id'=>$d_key+1,'name'=>$value,'slug'=>str_slug($value)]);
            }
        }
        
    }
}
