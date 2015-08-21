<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdditionalinformationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('additionalinformation');
		Schema::create('additionalinformation',function(Blueprint $table){
			$table->increments('id');
			$table->integer('pid');
			$table->string('currency')->nullable();
			$table->string('salary')->nullable();
			$table->string('preferred_location')->nullable();
			$table->string('add_information')->nullable();
			$table->string('sdocument')->nullable();
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
		Schema::drop('additionalinformation');
	}

}
