<?php

use App\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str; 
use Faker\Generator as Faker;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0 ; $i < 10; $i++){
          $new_post = new Post();
          $new_post->title = "Titolo post ".($i+1);
          $new_post->slug = Str::slug($new_post->title ,'-');
          $new_post->content = ($i + 1) . " " . $faker->paragraph();
          $new_post->save();
        }
    }
}
