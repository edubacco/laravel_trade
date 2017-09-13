<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePricesTable extends Migration {

	public function up()
	{
		Schema::create('prices', function(Blueprint $table) {
			$table->increments('id');
			$table->char('base_currency', 3);
            $table->foreign('base_currency')->references('id')->on('currencies');
			$table->char('quote_currency', 3);
			$table->foreign('quote_currency')->references('id')->on('currencies');
			$table->decimal('buy_price', 20, 10);
			$table->decimal('sell_price', 20, 10);
			$table->decimal('spot_price', 20, 10);
            $table->integer('broker_id')->unsigned();
            $table->datetimeTz('price_time');
			$table->foreign('broker_id')->references('id')->on('brokers');
			$table->dateTimeTz('price_time_server');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::dropIfExists('prices');
	}
}