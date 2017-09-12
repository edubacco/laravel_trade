<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBrokerTable extends Migration {

	public function up()
	{
		Schema::create('broker', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('broker');
	}
}