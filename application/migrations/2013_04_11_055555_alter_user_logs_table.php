<?php

class Alter_User_Logs_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('user_logs', function($table)
			{
			$table->foreign('user_id')->references('id')->on('users');
			});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('user_logs', function($table)
		{
			$table->drop_foreign('user_logs_user_id_foreign');
		});
	}

}