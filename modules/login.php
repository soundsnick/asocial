<?php
	if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
		if(require_once('connect.php')){
			global $mysqli;
			if($_POST['username'] != null && $_POST['password'] != null){
				$username = $_POST['username'];
				$password = md5($_POST['password']);
				$query = $mysqli->query("SELECT * FROM accounts WHERE username = '$username'");
				if($query->num_rows > 0){
					$account = $query->fetch_assoc();
					if($account['password'] == $password){
						session_start();
						$_SESSION['auth'] = $account['id'];
						echo 'true';
					}
					else echo 'false password';
				}
				else echo 'false username';
			}
			else echo 'empty field';
		}
		else echo 'false';
	}
	else header("location: /404");