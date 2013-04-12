<?php

class Fblogin_controller extends Base_Controller
{
	
	public function get_home()
	{
		return View::make('home.login');
	}
	
	public function post_loginpart()
	{
		$retVal=array("status"=>0,"message"=>"");
		try
		{
			DB::connection()->pdo->beginTransaction();
			$uname=Input::get('uname');
			$email=Input::get('emailId');
			$newUser = User::where('email','=',$email)->first();
			if($newUser == NULL)
			{
			$newUser= new User();
			$newUser->full_name=$uname;
			$newUser->email=$email;
			$newUser->save();
			$authType = new Userauthentication();
			$authType->auth_type = "FACEBOOK";
			$authType->user_id = $newUser->id;
			$authType->save();
			
			$retVal["message"]="User Logged in For first time";
			}
			else
			{
				$retVal["message"]="Welcome back";
			}
			$log = new Userlog();
			$log->user_id = $newUser->id;
			$log->save();
			DB::connection()->pdo->commit();
		}
		catch(Exception $e)
		{
			$retVal["status"]=-1;
			$retVal["message"]=$e->getMessage();
			DB::connection()->pdo->rollBack();
		}
		return json_encode($retVal);
	}
	
	public function get_landing()
	{
		return View::make('home.landing');
	}

}
?>