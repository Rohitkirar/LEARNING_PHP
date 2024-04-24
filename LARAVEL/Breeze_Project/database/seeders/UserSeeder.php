<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            "first_name" => "Hariom",
            "last_name" => "Kirar",
            "date_of_birth" => strtotime("12-12-2001"),
            "gender" => "male",
            "email" => "hariomkirar@gmail.com" ,
            "number" => "5434567454" ,
            "username" => "hariom090" ,
            "password" => Hash::make("12345678")
        ]);
        
    }
}
