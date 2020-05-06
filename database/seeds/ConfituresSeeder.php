<?php

use App\FruitsModel;
use Illuminate\Database\Seeder;

class ConfituresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\ConfituresModel::class, 5)
                ->create()
                ->each(function($u) {
                    $u->recompenses()->saveMany(factory(App\RecompensesModel::class, 2)
                        ->make());
                    $u->fruits()->saveMany(factory(App\FruitsModel::class, 2)
                        ->make());
                    $u->commandes()->saveMany(factory(App\CommandesModel::class, 2)
                        ->make());
                    });
    }
}
