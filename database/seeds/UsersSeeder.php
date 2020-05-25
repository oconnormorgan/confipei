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
            'intitule' => 'clients',
        ]);
        DB::table('role_users_table')->insert([
            'intitule' => 'producteur',
        ]);
        DB::table('role_users_table')->insert([
            'intitule' => 'admin',
        ]);

        DB::table('users_table')->insert([
            'nom' => 'producteur',
            'prenom' => Str::random(10),
            'email' => 'producteur@gmail.com',
            'password' => bcrypt('123456789'),
            'id_role' => 2,
        ]);
        DB::table('users_table')->insert([
            'nom' => 'admin',
            'prenom' => Str::random(10),
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456789'),
            'id_role' => 3,
        ]);

        factory(App\UsersModel::class, 5)
        ->create()
        ->each(function($u) {
            $u->commandes()->saveMany(factory(App\CommandesModel::class, 2)
                ->make());
            });
    }
}
