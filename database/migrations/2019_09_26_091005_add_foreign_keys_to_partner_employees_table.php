<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPartnerEmployeesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('partner_employees', function(Blueprint $table)
		{
			$table->foreign('FK_user', 'partner_employees_ibfk_1')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('FK_company', 'partner_employees_ibfk_2')->references('id')->on('partner_companies')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('partner_employees', function(Blueprint $table)
		{
			$table->dropForeign('partner_employees_ibfk_1');
			$table->dropForeign('partner_employees_ibfk_2');
		});
	}

}
