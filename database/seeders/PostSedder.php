<?php

namespace Database\Seeders;

use App\Models\image;
use App\Models\post;
use Illuminate\Database\Seeder;

class PostSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts =post::factory(50)->create();

        foreach($posts as $post){
            image::factory(1)->create([
                'images_id'=>$post->id,
                'images_type'=>post::class
            ]);
            $post->tags()->attach([
                rand(1,4),
                rand(5,8)
            ]);
        }
     }
}
