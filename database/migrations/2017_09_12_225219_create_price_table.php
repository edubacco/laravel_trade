<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePriceTable extends Migration {

	public function up()
	{
		Schema::create('price', function(Blueprint $table) {
			$table->increments('id');
			$table->string('currency1', 3);
			$table->string('currency2', 3);
			$table->float('buy_price');
			$table->float('sell_price');
			$table->datetimeTz('price_time');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('price');
	}
}