<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToClientsToConsultingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('clients_to_consultings', function(Blueprint $table)
		{
			$table->foreign('FK_client', 'clients_to_consultings_ibfk_2')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('FK_consulting', 'clients_to_consultings_ibfk_3')->references('id')->on('consultings')->onUpdate('RESTRICT')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('clients_to_consultings', function(Blueprint $table)
		{
			$table->dropForeign('clients_to_consultings_ibfk_2');
			$table->dropForeign('clients_to_consultings_ibfk_3');
		});
	}

}
