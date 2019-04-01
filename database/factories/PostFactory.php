<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(5,10),
        'content' => $faker->paragraphs(5),
        'category_id' => random_int(1,7),
        'user_id' => random_int(1,3),
        'slug' => str_slug($this->title),
        'featured' => 'car_'.random_int(1,15),
    ];
});
