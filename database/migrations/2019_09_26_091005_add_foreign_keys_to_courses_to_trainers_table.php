<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCoursesToTrainersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('courses_to_trainers', function(Blueprint $table)
		{
			$table->foreign('FK_course', 'courses_to_trainers_ibfk_1')->references('id')->on('courses')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('FK_trainer', 'courses_to_trainers_ibfk_2')->references('id')->on('partner_employees')->onUpdate('RESTRICT')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('courses_to_trainers', function(Blueprint $table)
		{
			$table->dropForeign('courses_to_trainers_ibfk_1');
			$table->dropForeign('courses_to_trainers_ibfk_2');
		});
	}

}
