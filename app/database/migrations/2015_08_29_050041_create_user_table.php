<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->string('name');
      $table->string('username')->unique();
      $table->string('password');
			$table->string('street')->nullable();
			$table->string('city')->nullable();
			$table->string('state')->nullable();
			$table->string('zip')->nullable();
			$table->double('xCoordinate', 10, 6);
			$table->double('yCoordinate', 10, 6);
      $table->integer('gender')->default(0);
      $table->string('email');
      $table->rememberToken();
			$table->increments('id');
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
    Schema::table('users', function() {
		  Schema::drop('users');
    });
	}

}
