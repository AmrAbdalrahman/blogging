<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use Faker\Generator as Faker;
use Modules\Article\Entities\ArticleComments;

$factory->define(ArticleComments::class, function (Faker $faker) {
    return [
        'comment' => $faker->text,
        'user_id' => $faker->randomNumber(1, 10),
        'article_id' => $faker->randomNumber(1, 20),
    ];
});
