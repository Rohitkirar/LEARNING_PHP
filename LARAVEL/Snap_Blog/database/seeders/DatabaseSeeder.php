<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use App\Models\Image;
use App\Models\PostImage;
use Database\Factories\ImageFactory;
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

        Schema::disableForeignKeyConstraints();   // to disable foreign key checks

        // Schema::enableForeignKeyConstraints();       // to enable foreign key checks

        // User::factory(2)->hasPosts(3)->hasImages(5)->create();

        // User::factory(10)->create();
        
        // Post::factory(10)->create();

        // User::factory()->hasPosts()->has(Image::factory())->create();

        Post::factory()->has(Image::factory())->create();

        // $user = new UserSeeder();
        // $user->run();
    }
}
