<?php

use Illuminate\Database\Seeder;
use Coinbase\Wallet\Configuration;
use Coinbase\Wallet\Client;

class CurrenciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //call coinbase
        //todo: create api keys
        $configuration = Configuration::apiKey('', '');
        $client = Client::create($configuration);

        $currencies = $client->getCurrencies();

        foreach ($currencies as $currency) {
            DB::table('currencies')->insert([
                'id' => $currency['id'],
                'name' => $currency['name'],
                'min_size' => $currency['min_size'],
            ]);
        }
    }
}
