<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateJobProfilesToSkillsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('job_profiles_to_skills', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->integer('min_level')->nullable();
			$table->integer('max_level')->nullable();
			$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->bigInteger('FK_profile')->unsigned()->nullable()->index('FK_profile');
			$table->bigInteger('FK_skill')->unsigned()->nullable()->index('FK_skill');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('job_profiles_to_skills');
	}

}
