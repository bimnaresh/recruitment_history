<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDemandTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('demand');
	       Schema::create('demand',function(Blueprint $table){
	           $table->increments('id');
	           $table->integer('eid');
	           $table->string('title');
	           $table->string('no_vacancy');
	           $table->string('qualification');
	           $table->string('location');
	           $table->string('status');
	           $table->string('description')->nullable();
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
		Schema::drop('demand');
	}
}