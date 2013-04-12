<?php
class Userlog extends Eloquent
{
	public  static $table = "user_logs";
	
	public function users()
	{
		return $this->belongs_to('User');
	}

}
?>