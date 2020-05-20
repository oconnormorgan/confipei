<?php

use Illuminate\Database\Seeder;

class ImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('image_confiture')->insert([
            'image' => 'https://cdn.vuetifyjs.com/images/cards/docks.jpg',
        ]);
        DB::table('image_confiture')->insert([
            'image' => 'https://cdn.vuetifyjs.com/images/cards/cooking.png',
        ]);
        DB::table('image_confiture')->insert([
            'image' => 'https://cdn.vuetifyjs.com/images/cards/sunshine.jpg',
        ]);
    }
}
