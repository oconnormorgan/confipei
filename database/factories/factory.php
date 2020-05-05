<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\CommandesModel;
use App\ConfituresModel;
use App\FruitsModel;
use App\Model;
use App\ProducteursModel;
use App\RecompensesModel;
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

$factory->define(RecompensesModel::class, function (Faker $faker) {
    return [
        'nom' => $faker->firstName(),
        'annee' => $faker->year($max = 'now'),
    ];
});

$factory->define(ProducteursModel::class, function (Faker $faker) {
    return [
        'nom' => $faker->firstName(),
    ];
});

$factory->define(CommandesModel::class, function (Faker $faker) {
    return [
        'id' => $faker->unique()->randomDigit,
    ];
});

$factory->define(ConfituresModel::class, function (Faker $faker) {
    return [
        'intitule' => $faker->unique()->firstName(),
        'prix' => $faker->numberBetween($min = 3, $max = 12),
        'id_producteur' => $faker->numberBetween($min = 1, $max = 10),
    ];
});

$factory->define(FruitsModel::class, function (Faker $faker) {
    return [
        'nom' => $faker->firstName(),
    ];
});

