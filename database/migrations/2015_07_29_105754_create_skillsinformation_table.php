<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkillsinformationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('skillsinformation');
		Schema::create('skillsinformation',function(Blueprint $table){
			$table->increments('id');
			$table->integer('pid');
			$table->string('skills')->nullable();
			$table->string('proficiency')->nullable();
			$table->string('skills_certificate')->nullable();
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
		Schema::drop('skillsinformation');
	}
	

}
