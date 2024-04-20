<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('users')->insert([
            'first_name' => fake()->name(),
            'last_name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'number' => fake()->unique()->phoneNumber(),
            'date_of_birth' => fake()->date('Y-m-d' , '2001-01-01' ),
            'gender' => fake()->randomElement(['male' , 'female' , 'other']),
            'password' => md5('12345678') , // password
            'username' => fake()->userName(),
        ]);


    }
}
