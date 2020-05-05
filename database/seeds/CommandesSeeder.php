<?php

use Illuminate\Database\Seeder;

class CommandesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\CommandesModel::class, 10)->create();
    }
}
