<?php
class UserModel extends Model{

	public function Index(){

		$this->query('SELECT * FROM users ORDER BY user_name ASC');
		$users = $this->resultSet();

		$resultArray = array($users);

		return $resultArray;

	}

	public function Insert(){
		return;
	}



}
