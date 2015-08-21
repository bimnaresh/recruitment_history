<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalInformationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('personalinformation');
		Schema::create('personalinformation',function(Blueprint $table){
			$table->increments('id');
			$table->integer('agent_id');
			$table->integer('approval_status');
			$table->integer('approved_by');
			$table->integer('agent_approval_delete');
			$table->string('fname');
			$table->string('lname');
			$table->string('resume_photo');
			$table->string('passport');
			$table->string('dob');
			$table->integer('age');
			$table->string('gender');
			$table->integer('height');
			$table->string('email');
			$table->string('nationality');
			$table->string('mobile');
			$table->string('onumber')->nullable();
			$table->string('raddress1');
			$table->string('raddress2')->nullable();
			$table->string('city')->nullable();
			$table->string('postal_code')->nullable();
			$table->string('country');
			$table->string('state')->nullable();
			$table->string('identification');
			$table->string('inumber');
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
		Schema::drop('personalinformation');
	}

}
