<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class PagesTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();

        foreach(range(1, 10) as $index)
        {
            EloquentPage::create([
                'slug' => $faker->sentence(5),
                'title' => $faker->sentence(5),
                'author_id' => rand(0,3)
            ]);
        }
    }

}