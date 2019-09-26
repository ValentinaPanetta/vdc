<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateJobsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('jobs', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->text('description', 65535)->nullable();
			$table->dateTime('start_date')->nullable();
			$table->float('salary', 10)->nullable();
			$table->string('zipCode', 10)->nullable();
			$table->string('city', 55)->nullable();
			$table->string('country', 55)->nullable();
			$table->string('street', 55)->nullable();
			$table->string('working_hours', 55)->nullable();
			$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->bigInteger('FK_profile')->unsigned()->nullable()->index('FK_profile');
			$table->bigInteger('FK_company')->unsigned()->nullable()->index('FK_company');
			$table->bigInteger('FK_language')->unsigned()->nullable()->index('FK_language');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('jobs');
	}

}
