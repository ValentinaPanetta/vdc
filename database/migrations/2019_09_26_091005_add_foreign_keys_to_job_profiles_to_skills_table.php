<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToJobProfilesToSkillsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('job_profiles_to_skills', function(Blueprint $table)
		{
			$table->foreign('FK_profile', 'job_profiles_to_skills_ibfk_1')->references('id')->on('job_profiles')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('FK_skill', 'job_profiles_to_skills_ibfk_2')->references('id')->on('skills')->onUpdate('RESTRICT')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('job_profiles_to_skills', function(Blueprint $table)
		{
			$table->dropForeign('job_profiles_to_skills_ibfk_1');
			$table->dropForeign('job_profiles_to_skills_ibfk_2');
		});
	}

}
