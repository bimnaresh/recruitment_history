<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('notification');
	       Schema::create('notification',function(Blueprint $table){
	           $table->increments('id');
	           $table->integer('from');
	           $table->string('to');
	           $table->integer('status');
	           $table->integer('employer_status');
	           $table->integer('agent_status');
	           $table->string('subject')->nullable();
	           $table->string('message')->nullable();
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
		Schema::drop('notification');
	}

}
