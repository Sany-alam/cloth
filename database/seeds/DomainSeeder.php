<?php

use Illuminate\Database\Seeder;

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
            App\Domain::create(['name'=>$name[$i],'slug'=>str_slug($name[$i])]);
        }
    }
}
