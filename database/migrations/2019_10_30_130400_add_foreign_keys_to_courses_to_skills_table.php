<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCoursesToSkillsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('courses_to_skills', function(Blueprint $table)
		{
			$table->foreign('FK_course', 'courses_to_skills_ibfk_1')->references('id')->on('courses')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('FK_skill', 'courses_to_skills_ibfk_2')->references('id')->on('skills')->onUpdate('RESTRICT')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('courses_to_skills', function(Blueprint $table)
		{
			$table->dropForeign('courses_to_skills_ibfk_1');
			$table->dropForeign('courses_to_skills_ibfk_2');
		});
	}

}
