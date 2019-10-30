<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePartnerEmployeesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('partner_employees', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->date('date_birth')->nullable();
			$table->text('description', 65535)->nullable();
			$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->bigInteger('FK_user')->unsigned()->nullable()->index('FK_user');
			$table->bigInteger('FK_company')->unsigned()->nullable()->index('FK_company');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('partner_employees');
	}

}
