<?php

use Illuminate\Database\Seeder;

class BrokersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brokers')->insert([
            'name' => 'Coinbase',
            'created_at' => '',
            'updated_at' => '',
            'deleted_at' => '',
        ]);
    }
}
