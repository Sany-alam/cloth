<?php

use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Banner::create([
            'title'=>'Hello Word',
            'description'=>  'lorem ipsum doller teller botkisu etcettrera',
            'image' => 'banner1.jpg',
        ]);
        App\Banner::create([
            'title'=>'Brand gallery',
            'description'=>  'lorem ipsum doller teller botkisu etcettrera',
            'image' => 'banner2.jpg',
        ]);
    }
}
