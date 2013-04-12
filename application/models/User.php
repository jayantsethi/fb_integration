<?php


class User extends Eloquent
{
public function userauthentication()
{
	return $this->has_one('Userauthentication');
}
public function userlogs()
{
	return $this->has_many('Userlog');
}
public function set_password($string)
{
	$this->set_attribute('password', Hash::make($string));
}	

}
?>