<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientsToCoursesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('clients_to_courses', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->enum('client_status', array('registered','attending','dropped_out','removed','graduated','failed'))->nullable();
			$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->bigInteger('FK_course')->unsigned()->nullable()->index('FK_course');
			$table->bigInteger('FK_client')->unsigned()->nullable()->index('FK_client');
			$table->bigInteger('FK_payments')->unsigned()->nullable()->index('FK_payments');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('clients_to_courses');
	}

}
