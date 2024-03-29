<?php

class Alter_Authentication_Profile_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('user_authentication', function($table)
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
		Schema::table('user_authentication', function($table)
		{
			$table->drop_foreign('user_authentication_user_id_foreign');
		});
	}

}