<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            "Name"=> "Test",
            "LastName"=>"Tester",
            "User"=>"tester01",
            "Email"=>"tester01@gmail.com",
            "Type" => 1,
            "Password"=> bcrypt('132456'),
            "ProfPic"=> "",
            "LastCnx" => ""
        ]);
    }
}
