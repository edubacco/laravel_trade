<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBrokersTable extends Migration {

	public function up()
	{
		Schema::create('brokers', function(Blueprint $table) {
			$table->increments('id');
            $table->string('name');
            $table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::dropIfExists('brokers');
	}
}