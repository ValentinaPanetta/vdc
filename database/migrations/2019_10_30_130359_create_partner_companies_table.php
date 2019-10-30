<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePartnerCompaniesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('partner_companies', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('company_name', 191)->nullable();
			$table->string('company_phone', 191)->nullable();
			$table->string('company_email', 191)->nullable();
			$table->text('description', 65535)->nullable();
			$table->string('zipCode', 20)->nullable();
			$table->string('street', 191)->nullable();
			$table->string('city', 55)->nullable();
			$table->string('country', 191)->nullable();
			$table->string('website', 191)->nullable();
			$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->enum('type', array('course-provider','employer'))->nullable();
			$table->string('logo', 191)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('partner_companies');
	}

}
