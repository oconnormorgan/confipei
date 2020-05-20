<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\CommandesModel;
use App\ConfituresModel;
use App\FruitsModel;
use App\ProducteursModel;
use App\RecompensesModel;
use App\RoleModel;
use App\UsersModel;
use App\ImagesModel;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;


$factory->define(UsersModel::class, function (Faker $faker) {

    $id_roles = RoleModel::all();
    $id_role = $faker->randomElement($id_roles)->id;
    
    return [
        'nom' => $faker->firstName(),
        'prenom' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'password' => $faker->password,
        'id_role' => $id_role,
    ];
});

$factory->define(ConfituresModel::class, function (Faker $faker) {

    $id_producteurs = ProducteursModel::all();
    $id_producteur = $faker->randomElement($id_producteurs)->id;

    $id_images = ImagesModel::all();
    $id_image = $faker->randomElement($id_images)->id;

    return [
        'intitule' => $faker->unique()->firstName(),
        'prix' => $faker->numberBetween($min = 3, $max = 12),
        'id_producteur' => $id_producteur,
        'id_image' => $id_image,
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

