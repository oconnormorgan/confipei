<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role_users_table')->insert([
            'intitule' => 'Clients',
        ]);
        DB::table('role_users_table')->insert([
            'intitule' => 'Producteur',
        ]);
        DB::table('role_users_table')->insert([
            'intitule' => 'Admin',
        ]);

        DB::table('users_table')->insert([
            'nom' => 'admin',
            'prenom' => Str::random(10),
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456789'),
            'id_role' => 3,
        ]);
        DB::table('users_table')->insert([
            'nom' => 'producteur',
            'prenom' => Str::random(10),
            'email' => 'producteur@gmail.com',
            'password' => bcrypt('123456789'),
            'id_role' => 2,
        ]);
        DB::table('users_table')->insert([
            'nom' => 'user',
            'prenom' => Str::random(10),
            'email' => 'user@gmail.com',
            'password' => bcrypt('123456789'),
            'id_role' => 1,
        ]);

        factory(App\User::class, 5)
        ->create();
    }
}
