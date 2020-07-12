<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DomainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = [
            'Men','Women','Kids'
        ];

        for ($i=0; $i < sizeof($name); $i++) {
            $slug = Str::slug($name[$i],'-');
            App\Domain::create(['name'=>$name[$i],'slug'=>$slug]);
        }
    }
}
