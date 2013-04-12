<?php
class Userauthentication extends Eloquent
{
	public  static $table = "user_authentication";
	
	public function users()
	{
		return $this->belongs_to('User');
	}

}
?>