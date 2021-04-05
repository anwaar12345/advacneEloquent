<?php

use Illuminate\Database\Seeder;
use App\Comment;
class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\City::class,3)->create();
    }
}
