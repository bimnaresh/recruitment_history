<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExperienceInformationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('experienceinformation');
		Schema::create('experienceinformation',function(Blueprint $table){
			$table->increments('id');
			$table->integer('pid');
			$table->string('position_title')->nullable();
			$table->string('company_name')->nullable();
			$table->integer('experience');
			$table->string('from_date')->nullable();
			$table->string('to_date')->nullable();
			$table->string('specialization')->nullable();
			$table->string('role')->nullable();
			$table->string('country')->nullable();
			$table->string('industry')->nullable();
			$table->string('position_level')->nullable();
			$table->string('currency')->nullable();
			$table->string('salary')->nullable();
			$table->string('experience_certificate')->nullable();
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
		Schema::drop('experinceinformation');
	}

}
