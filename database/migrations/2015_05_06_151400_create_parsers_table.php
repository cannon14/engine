<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('parsers', function(Blueprint $table)
		{
			$table->increments('parser_id');
			$table->string('parser_name');
			$table->text('parser_description');
			$table->text('parser_fields');
			$table->tinyInteger('for_test_only');
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
		Schema::drop('parsers');
	}

}
