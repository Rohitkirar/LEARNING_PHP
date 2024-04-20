<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema ;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // FacadesSchema::disableForeignKeyConstraints();   // to disable foreign key checks
        Schema::enableForeignKeyConstraints();       // to enable foreign key checks

        
        // User::factory(10)->create();
        // Post::factory(10)->create();

        $user = new UserSeeder();
        $user->run();
    }
}
