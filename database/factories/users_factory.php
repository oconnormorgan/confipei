<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\UsersModel;
use Faker\Generator as Faker;

$factory->define(UsersModel::class, function (Faker $faker) {
    return [
        'nom' => $faker->firstName(),
        'prenom' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'password' => $faker->password,
        'id_role' => "1",
    ];
});
