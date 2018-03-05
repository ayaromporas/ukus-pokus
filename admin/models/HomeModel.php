<?php
class HomeModel extends Model{

	public function Index(){

		if(isset($_POST['submit'])){

			if( ($_POST['username'] == "") || ($_POST['password'] == "")){
				
				Messages::setMsg('Sva polja moraju biti popunjena', 'error');
			}else{

				$postArray = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

				$username = $postArray['username'];	
				$password = $postArray['password']; 			

	 			$this->query('SELECT * FROM users WHERE user_email = :username OR username = :username');
				$this->bind(':username', $username);
				$this->execute();

				$user = $this->single();

				$passwordDB = $user['password'];

				if(password_verify($password, $passwordDB)){

					if ($user['status'] != 0) {

						$_SESSION['logged'] = true;
						$_SESSION['username'] = $user['username'];
						$_SESSION['user_name'] = $user['user_name'];
						$_SESSION['user_id'] = $user['user_id'];
						$_SESSION['status'] = $user['status'];
						header('Location: ' . ROOT_URL . 'dashboard');
						
					}else{
						Messages::setMsg('Zabranjen pristup', 'error');
					}					
				}else{
					Messages::setMsg('Podaci ne odgovaraju ni jednom korisniku.', 'error');
				}

				


			}
		}

		return;


		
	}

	
}


