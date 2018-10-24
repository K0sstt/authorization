<?php

class Validator {

	public function startCheck($data, $users = []) {
			// short variables
			$login = $data['login'];
			$password = $data['password'];

			if($this->checkLogin($login, $users = []) === true && $this->checkPass($password, $users) === true)
				return true;
			return false;
	}

	public function checkLogin($login, $user = []) {
		if(empty($login)) echo "<p class=\"d-flex justify-content-center alert alert-danger\">enter login</p> <br>";
		if(in_array($login, $users)) return true;
		return false;
	}

	public function checkPass($password, $user) {
		if(empty($password)) echo "<p class=\"d-flex justify-content-center alert alert-danger\">enter password</p> <br>";
		if(in_array($password, $users)) return true;
		return false;
	}

}