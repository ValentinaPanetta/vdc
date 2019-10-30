<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToClientsToSkillsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('clients_to_skills', function(Blueprint $table)
		{
			$table->foreign('FK_client', 'clients_to_skills_ibfk_1')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('FK_skill', 'clients_to_skills_ibfk_2')->references('id')->on('skills')->onUpdate('RESTRICT')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('clients_to_skills', function(Blueprint $table)
		{
			$table->dropForeign('clients_to_skills_ibfk_1');
			$table->dropForeign('clients_to_skills_ibfk_2');
		});
	}

}
