<?php

class Create_Authentication_Profile_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('user_authentication', function($table)
			{
			$table->create();
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->string('auth_type');
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
		Schema::drop('user_authentication');
	}

}