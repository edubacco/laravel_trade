<?php

namespace App\Jobs;

use App\Model\Broker;
use App\Model\Price;
use Coinbase\Wallet\Client;
use Coinbase\Wallet\Configuration;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ReadPrice implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var Client
     */
    protected $cbClient;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        $configuration = Configuration::apiKey('', '');
        $this->cbClient = Client::create($configuration);
    }

    /**
     * Execute the job.
     *
     * @return void
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
