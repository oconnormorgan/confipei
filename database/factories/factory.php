<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\CommandesModel;
use App\ConfituresModel;
use App\FruitsModel;
use App\ProducteursModel;
use App\RecompensesModel;
use App\RoleModel;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;


$factory->define(User::class, function (Faker $faker) {

    return [
        'nom' => $faker->firstName(),
        'prenom' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'password' => $faker->password,
        'id_role' => '1',
    ];
});

$factory->define(ConfituresModel::class, function (Faker $faker) {

    $id_producteurs = ProducteursModel::all();
    $id_producteur = $faker->randomElement($id_producteurs)->id;

    return [
        'intitule' => $faker->unique()->firstName(),
        'prix' => $faker->numberBetween($min = 3, $max = 12),
        'id_producteur' => $id_producteur,
    ];
});

$factory->define(ProducteursModel::class, function (Faker $faker) {
    return [
        'nom' => $faker->firstName(),
    ];
});

$factory->define(RecompensesModel::class, function (Faker $faker) {
    return [
        'nom' => $faker->firstName(),
        'annee' => $faker->year($max = 'now'),
    ];
});

$factory->define(CommandesModel::class, function (Faker $faker) {
    return [
        'id' => $faker->unique()->randomDigit,
    ];
});

$factory->define(FruitsModel::class, function (Faker $faker) {
    return [
        'nom' => $faker->firstName(),
    ];
});

