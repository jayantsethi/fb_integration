<?php

class Create_Authentication_Profile_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('authentication_profile', function($table)
			{
			$table->create();
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->string('service');
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
		Schema::drop('authentication_profile');
	}

}