<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name' => "Sany",
            'email' => "mazharulalam26@gmail.com",
            'phone' => "01876626011",
            'is_admin' => true,
            'password' => 'asd',
        ]);
        App\User::create([
            'name' => "Sabbir",
            'email' => "Sabbir@gmail.com",
            'phone' => "01876625555",
            'password' => 'dsa',
        ]);
    }
}
