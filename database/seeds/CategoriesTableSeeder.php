<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'sport',
        ]);

        DB::table('categories')->insert([
            'name' => 'politica',
        ]);

        DB::table('categories')->insert([
            'name' => 'video',
        ]);

        DB::table('categories')->insert([
            'name' => 'news',
        ]);

    }
}