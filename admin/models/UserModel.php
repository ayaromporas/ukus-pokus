<?php
class UserModel extends Model{
	public function register(){
		// Sanitize POST
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		if(isset($post['submit'])){
			if($post['name'] == '' || $post['email'] == '' || $post['password'] == '' || $post['username'] == ''){
				Messages::setMsg('Potrebno je popuniti sva polja', 'error');
				return;
			}

			$password = md5($post['password']);
			// Insert into MySQL
			$this->query('INSERT INTO users (user_name, user_email, username, password, status) VALUES (:name, :email, :username, :password, :status)');
			$this->bind(':name', $post['name']);
			$this->bind(':email', $post['email']);
			$this->bind(':username', $post['username']);
			$this->bind(':password', $password);
			$this->bind(':status', $post['status']);
			$this->execute();
			// Verify
			if($this->lastInsertId()){
				// Redirect
				header('Location: '.ROOT_URL.'users/viev');
			}else{
				Messages::setMsg('Korisnik sa email ili usrename postoji', 'error');
			}
		}
		return;
	}

	public function Login(){


		
		// Sanitize POST
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		$password = md5($post['password']);

		if($post['submit']){
			// Compare Login
			$this->query('SELECT * FROM users WHERE user_email = :email AND password = :password');
			$this->bind(':email', $post['email']);
			$this->bind(':password', $password);
			
			$row = $this->single();
			
			if($row){
				$_SESSION['is_logged_in'] = true;
				$_SESSION['user_data'] = array(
					"user_id"		=> $row['user_id'],
					"user_name"		=> $row['user_name'],
					"user_email"	=> $row['user_email'],
					"status"		=> $row['status']
				);
				header('Location: '.ROOT_URL.'dashboard');
			} else {
				Messages::setMsg('Incorrect Login', 'error');
			}
		}
		return;
	}

	public function edit(){
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		if(isset($post['submit'])){
			if($post['name'] == '' || $post['email'] == '' || $post['password'] == '' || $post['username'] == ''){
				Messages::setMsg('Potrebno je popuniti sva polja', 'error');
				return;
			}

			$password = md5($post['password']);
			// Insert into MySQL
			$this->query('UPDATE users SET user_name = :name , 
										   user_email = :email,
										   username = :username, 
										   password = :password, 
										   status = :status
									   WHERE user_id = :id');
			$this->bind(':name', $post['name']);
			$this->bind(':email', $post['email']);
			$this->bind(':username', $post['username']);
			$this->bind(':password', $password);
			$this->bind(':status', $post['status']);
			$this->bind(':id', $_GET['id']);
			$this->execute();
			echo "string";
			// Verify
				header('Location: '.ROOT_URL.'users/viev');
		}
		$this->query('SELECT * FROM users WHERE user_id = :id');
		$this->bind(':id', $_GET['id']);
		$row = $this->single();
		return $row;
	}
	
	public function viev(){
		if(isset($_POST['delete'])){
		$this->query('UPDATE users SET status = :status WHERE user_id = :id');
		$this->bind(':id', $_POST['delete']);
		$this->bind(':status', 0);
		$this->execute();

		}elseif(isset($_POST['activate'])){
		$this->query('UPDATE users SET status = :status WHERE user_id = :id');
		$this->bind(':id', $_POST['activate']);
		$this->bind(':status', 3);
		$this->execute();
		}

		$this->query('SELECT * FROM users');
		$rows = $this->resultSet();
		return $rows;
	}

}