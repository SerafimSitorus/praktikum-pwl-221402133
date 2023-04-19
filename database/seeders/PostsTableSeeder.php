<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;
use DB;

class PostsTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        $posts = [];
        $faker = Factory::create();
        $i;

        for($i = 1; $i <= 5; $i++){
            $posts [] = [
                'title'     => $faker->sentence($nbWords = 3, $variableNbWords = true),
                'excerpt'   => $faker->text,
                'content'   => $faker->paragraph($nbSentences = 6, $variableNbSentences = true),
                'image'     => $faker->imageUrl($width = 640, $height = 480),
                'author_id' => $faker->numberBetween(1,10)
            ];

        }
        DB::table("posts")->insert($posts);
    }
}
