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
            'image' => 'banner-43f80f923834645ab0c89796fd3552f99563a9e7.jpg',
        ]);
        App\Banner::create([
            'title'=>'Brand gallery',
            'description'=>  'lorem ipsum doller teller botkisu etcettrera',
            'image' => 'banner-data-entry-jobs.jpg',
        ]);
    }
}
