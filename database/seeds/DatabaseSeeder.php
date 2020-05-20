<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ProducteursSeeder::class,
            ImagesSeeder::class,
            ConfituresSeeder::class,
            UsersSeeder::class,
            ]);
    }
}
