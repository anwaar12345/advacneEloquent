<?php

use Illuminate\Database\Seeder;
use App\Address;
class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Address::class,3)->create();
    }
}
