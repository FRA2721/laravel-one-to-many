<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
// use Illuminate\Support\Str;

// use faker
use Faker\Generator as Faker;

/**
 * PostSeeder calss created
 * @author FRANCESCO CIMINO
 */
class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // posts creation (item(s));
        for ($i = 0; $i < 20; $i++){
            $post = new Post();
            $post->title = $faker->sentence(3);
            $post->description = $faker->text(333);
            $post->slug = Post::generateSlug($post->title, "-"); //elimination of title's spaces;
            $post->save();
        }
    }
}
