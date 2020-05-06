<?php

use Illuminate\Database\Seeder;

class ProducteursSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\ProducteursModel::class, 10)->create();
    }
}
