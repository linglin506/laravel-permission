<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 191)->unique();
			$table->string('realname')->nullable();
			$table->integer('sex')->nullable()->default(0);
			$table->string('phone')->nullable();
			$table->string('email', 191)->unique();
			$table->string('password', 191);
			$table->string('remember_token', 100)->nullable();
			$table->integer('check')->nullable()->default(0);
			$table->integer('role_id')->nullable()->default(0);
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
		Schema::drop('users');
	}

}
