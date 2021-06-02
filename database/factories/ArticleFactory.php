<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Modules\Article\Entities\Article;

$factory->define(Article::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'description' => $faker->text,
        'is_published' => $faker->boolean,
        'category_id' => $faker->randomNumber(1,10),
    ];
});
