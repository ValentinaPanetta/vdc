<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCoursesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('courses', function(Blueprint $table)
		{
			$table->foreign('FK_company', 'courses_ibfk_1')->references('id')->on('partner_companies')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('FK_language', 'courses_ibfk_2')->references('id')->on('languages')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('courses', function(Blueprint $table)
		{
			$table->dropForeign('courses_ibfk_1');
			$table->dropForeign('courses_ibfk_2');
		});
	}

}
