<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(BrokersTableSeeder::class);
         $this->call(CurrenciesTableSeeder::class);
    }
}
