<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberprofileTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('memberprofile');
	       Schema::create('memberprofile',function(Blueprint $table){
	           $table->increments('id');
	           $table->integer('uid');
	           $table->string('company_name')->nullable();
	           $table->string('company_address')->nullable();
	           $table->string('company_information')->nullable();
	           $table->string('company_document')->nullable();	           
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
		Schema::drop('memberprofiel');
	}

}
