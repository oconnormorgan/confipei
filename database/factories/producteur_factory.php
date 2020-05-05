<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ProducteursModel;
use Faker\Generator as Faker;

$factory->define(ProducteursModel::class, function (Faker $faker) {
    return [
        'nom' => $faker->firstName(),
    ];
});
