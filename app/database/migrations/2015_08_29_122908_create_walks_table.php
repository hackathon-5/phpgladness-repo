<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWalksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('walks', function(Blueprint $table)
		{
      $table->increments('id');
      $table->dateTime('start');
      $table->dateTime('finish');
      $table->integer('host_id')->references('id')->on('users');
      $table->string('comments');
      $table->integer('dog_friendliness');
      $table->integer('pace');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('walks', function(Blueprint $table)
		{
	    Schema::drop('walks');	
		});
	}

}
