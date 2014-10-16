<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTradesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('trades', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('item_name');
            $table->double('buy_price');
            $table->double('sell_price');
            $table->timestamp('buy_date');
            $table->timestamp('sell_date');
            $table->boolean('is_active');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('trades');
	}

}
