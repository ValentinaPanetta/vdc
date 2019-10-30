<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostsCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts_comments', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->text('content', 65535)->nullable();
			$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->bigInteger('FK_post')->unsigned()->nullable()->index('FK_post');
			$table->bigInteger('FK_author')->unsigned()->nullable()->index('FK_author');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('posts_comments');
	}

}
