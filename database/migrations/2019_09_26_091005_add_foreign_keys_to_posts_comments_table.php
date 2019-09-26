<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPostsCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('posts_comments', function(Blueprint $table)
		{
			$table->foreign('FK_post', 'posts_comments_ibfk_1')->references('id')->on('posts')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('FK_author', 'posts_comments_ibfk_2')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('posts_comments', function(Blueprint $table)
		{
			$table->dropForeign('posts_comments_ibfk_1');
			$table->dropForeign('posts_comments_ibfk_2');
		});
	}

}
