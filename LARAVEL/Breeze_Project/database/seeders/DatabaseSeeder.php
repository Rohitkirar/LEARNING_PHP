<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();


        // used to add real data in our database


        // executing factory class

        // User::factory(10)->create();


        #relationship factory data inserted

        // User::factory()->has(Post::factory(3))->create();

        User::factory(2)->hasPosts(5)->create();


        // calling seeder class

        // $this->call([
        //     UserSeeder::class
        // ]);

    }
}
