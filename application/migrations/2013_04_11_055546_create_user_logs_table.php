<?php

class Create_User_Logs_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('user_logs', function($table)
			{
			$table->create();
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->timestamps();
			});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_logs');
	}

}