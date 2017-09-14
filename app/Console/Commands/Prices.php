<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Coinbase\Wallet\Configuration;
use Coinbase\Wallet\Client;
use App\Model\Price;
use App\Model\Broker;


class Prices extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'prices:read';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Read and store on db prices';

    /**
     * Conbase client
     *
     * @var Client
     */
    protected $cbClient;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $configuration = Configuration::apiKey('', '');
        $this->cbClient = Client::create($configuration);
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $broker = 'coinbase';
        $base_curr = 'BTC';
        $quote_curr = 'EUR';
        $buy_price = $this->cbClient->getBuyPrice("$base_curr-$quote_curr");
        $sell_price = $this->cbClient->getSellPrice("$base_curr-$quote_curr");
        $spot_price = $this->cbClient->getSpotPrice("$base_curr-$quote_curr");

        $price = new Price();
        $price->broker_id       = Broker::where('name', $broker)->first()->id;
        $price->base_currency   = $base_curr;
        $price->quote_currency  = $quote_curr;
        $price->buy_price       = $buy_price->getAmount();
        $price->sell_price      = $sell_price->getAmount();
        $price->spot_price      = $spot_price->getAmount();
        $price->price_time      = now();
        $price->save();
    }
}
