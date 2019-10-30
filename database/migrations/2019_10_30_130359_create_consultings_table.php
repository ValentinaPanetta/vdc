<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateConsultingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('consultings', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->dateTime('consult_date')->nullable();
			$table->integer('duration')->nullable();
			$table->string('city', 55)->nullable();
			$table->string('street', 55)->nullable();
			$table->string('zipCode', 10)->nullable();
			$table->string('country', 55)->nullable();
			$table->integer('consult_limit')->nullable();
			$table->enum('type', array('individual','group','coaching'))->nullable();
			$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->bigInteger('FK_consultant')->unsigned()->nullable()->index('FK_consultant');
			$table->bigInteger('FK_trainer')->unsigned()->nullable()->index('FK_trainer');
			$table->string('title', 192)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('consultings');
	}

}
