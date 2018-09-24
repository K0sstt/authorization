<?php

class Validator {

	public function startCheck($data, $result) {
			// short variables
			$login = $data['login'];
			$password = $data['password'];

			if($this->checkLogin($login, $result) === true && $this->checkPass($password, $result = []) === true)
				return true;
			return false;
	}

	public function checkLogin($login, $result) {
		if(empty($login)) echo "enter login <br>";
		if($login == $result['login']) return true;
		return false;
	}

	public function checkPass($password, $result) {
		if(empty($password)) echo "enter password <br>";
		if($login == $result['password']) return true;
		return false;
	}

}