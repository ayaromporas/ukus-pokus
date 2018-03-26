<?php
class UserModel extends Model{

	public function Index(){

		$this->query('SELECT * FROM users WHERE status > 0 ORDER BY user_name ASC');
		$users = $this->resultSet();
		return $users;

	}
	public function edit(){
		$id = $_GET['id'];
		$this->query("SELECT * FROM users WHERE user_id = {$id}");//
		$user = $this->single();
		return $user;
		
	}
}
