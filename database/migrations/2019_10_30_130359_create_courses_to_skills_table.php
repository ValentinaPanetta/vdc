<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCoursesToSkillsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('courses_to_skills', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->integer('lvl')->nullable();
			$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->bigInteger('FK_course')->unsigned()->nullable()->index('FK_course');
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
		Schema::drop('courses_to_skills');
	}

}
