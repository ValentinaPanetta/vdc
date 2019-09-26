<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToUsersToUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users_to_users', function(Blueprint $table)
		{
			$table->foreign('FK_userA', 'users_to_users_ibfk_1')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('FK_userB', 'users_to_users_ibfk_2')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users_to_users', function(Blueprint $table)
		{
			$table->dropForeign('users_to_users_ibfk_1');
			$table->dropForeign('users_to_users_ibfk_2');
		});
	}

}
