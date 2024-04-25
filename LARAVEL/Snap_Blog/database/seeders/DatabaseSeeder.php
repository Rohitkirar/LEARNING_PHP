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

        User::factory(1)->has(
            Post::factory(2)->has(Image::factory(2))
            )->create();


        // User::factory(1)->hasPosts(2)->hasImages(3)->create();


        // Post::factory(2)->has(PostImage::factory(3))->create();

        // $user = new UserSeeder();
        // $user->run();

        //! To store data in three related table USER->POST->POSTIMAGE

        
        // $users = User::factory(5)->create();

        // $users->each(function($user){

        //     $posts = Post::factory(5)->create([
        //         'user_id' => $user->id 
        //     ]);

        //     $posts->each(function($post){
        //         $image = PostImage::factory(5)->create([
        //             'post_id' => $post->id
        //         ]);
        //     });
        // });

    }
}
