<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatutsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuts_table')->insert([
            'key' => 'encours',
            'statut' => 'En cours',
        ]);
        DB::table('statuts_table')->insert([
            'key' => 'valider',
            'statut' => 'Valider',
        ]);
        DB::table('statuts_table')->insert([
            'key' => 'rembourser',
            'statut' => 'Rembourser',
        ]);
    }
}
