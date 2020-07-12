<?php

use Illuminate\Database\Seeder;

class CourierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $couriers = [
            ['name'=>'John Doe','phone'=>'018762652654','email'=>'johndoe@gmail.com'],
            ['name'=>'Mark zuckerberg','phone'=>'0183525645','email'=>'zuckerberg@gmail.com'],
            ['name'=>'Bill Gates','phone'=>'0184548697','email'=>'Gates@gmail.com'],
            ['name'=>'Newton','phone'=>'01875896321','email'=>'Newton@gmail.com'],
            ['name'=>'Lorem Ipsan','phone'=>'01878958697','email'=>'Ipsan@gmail.com'],
        ];

        for($i=0;$i<count($couriers);$i++){
            App\Courier::create(['name'=>$couriers[$i]['name'],'phone'=>$couriers[$i]['phone'],'email'=>$couriers[$i]['email']]);
        }
    }
}
