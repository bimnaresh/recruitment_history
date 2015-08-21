<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	   {
	       Schema::dropIfExists('members');
	       Schema::create('members',function(Blueprint $table){
	           $table->increments('id');
	           $table->string('name');
	           $table->string('address');
	           $table->string('contactNumber');
	           $table->integer('type')->nullable();
	           $table->integer('loginas')->nullable();
	           $table->integer('status')->nullable();
	           $table->string('email')->unique();
	           $table->string('password', 60);
	           $table->rememberToken();
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
		Schema::drop('members');
	}

}
