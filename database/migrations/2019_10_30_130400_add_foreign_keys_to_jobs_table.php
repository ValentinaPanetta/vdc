<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToJobsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('jobs', function(Blueprint $table)
		{
			$table->foreign('FK_profile', 'jobs_ibfk_1')->references('id')->on('job_profiles')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('FK_company', 'jobs_ibfk_2')->references('id')->on('partner_companies')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('FK_language', 'jobs_ibfk_3')->references('id')->on('languages')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('jobs', function(Blueprint $table)
		{
			$table->dropForeign('jobs_ibfk_1');
			$table->dropForeign('jobs_ibfk_2');
			$table->dropForeign('jobs_ibfk_3');
		});
	}

}
