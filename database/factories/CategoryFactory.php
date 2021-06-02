<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Modules\Category\Entities\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});
