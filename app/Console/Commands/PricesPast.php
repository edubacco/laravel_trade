<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class PricesPast extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'prices:past:read';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Read and store prices of last year on db';

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
        //
    }
}
