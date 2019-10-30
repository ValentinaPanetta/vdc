<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientsToConsultingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('clients_to_consultings', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->bigInteger('FK_consulting')->unsigned()->nullable()->index('FK_consulting');
			$table->bigInteger('FK_client')->unsigned()->nullable()->index('FK_client');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('clients_to_consultings');
	}

}
