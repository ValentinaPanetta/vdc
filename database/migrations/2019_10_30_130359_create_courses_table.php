<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCoursesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('courses', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('name', 190)->nullable();
			$table->float('version', 10, 0)->nullable();
			$table->text('description', 65535)->nullable();
			$table->string('zipCode', 10)->nullable();
			$table->string('city', 55)->nullable();
			$table->string('street', 55)->nullable();
			$table->string('country', 55)->nullable();
			$table->integer('course_limit')->nullable();
			$table->dateTime('start_date')->nullable();
			$table->dateTime('end_date')->nullable();
			$table->string('type', 191)->nullable();
			$table->enum('active_status', array('active','inactive'))->nullable();
			$table->float('price', 10)->nullable();
			$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
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
		Schema::drop('courses');
	}

}
