<?php

use Illuminate\Database\Seeder;

class FruitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\FruitsModel::class, 50)->create();
    }
}
