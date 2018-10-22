<?php

class Validator {

	public function startCheck($data, $user) {
			// short variables
			$login = $data['login'];
			$password = $data['password'];

			if($this->checkLogin($login, $user) === true && $this->checkPass($password, $user = []) === true)
				return true;
			return false;
	}

	public function checkLogin($login, $user) {
		if(empty($login)) echo "<p class=\"d-flex justify-content-center alert alert-danger\">enter login</p> <br>";
		if($login == $user['login']) return true;
		return false;
	}

	public function checkPass($password, $user) {
		if(empty($password)) echo "<p class=\"d-flex justify-content-center alert alert-danger\">enter password</p> <br>";
		if($login == $user['password']) return true;
		return false;
	}

}