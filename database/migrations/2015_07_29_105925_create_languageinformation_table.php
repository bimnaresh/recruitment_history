<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLanguageinformationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('languageinformation');
		Schema::create('languageinformation',function(Blueprint $table){
			$table->increments('id');
			$table->integer('pid');
			$table->string('language')->nullable();
			$table->string('lspoken')->nullable();
			$table->string('lwritten')->nullable();
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
		Schema::drop('languageinformation');
	}
	

}
