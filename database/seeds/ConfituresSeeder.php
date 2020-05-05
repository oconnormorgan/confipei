<?php

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
        factory(App\ConfituresModel::class, 100)->create();
    }
}
