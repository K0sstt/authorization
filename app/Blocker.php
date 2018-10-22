<?php

class Blocker {

	public $counter;
	public $ipBlock = [];

	public function checkSessionCount() {
		if(empty($_SESSION['count'])) $_SESSION['count'] = 1;
		if($_SESSION['count'] == 3) {
			header('Location: http://authorization.loc/templates/block.php');
			$this->checkIp();
			$this->blockingIP();
		}
		else $_SESSION['count']++;
	}

	public function checkIp() {
		if(!in_array($_SERVER['REMOTE_ADDR'], $this->ipBlock)) $this->ipBlock[] = [$_SERVER['REMOTE_ADDR'], time()];
	}

	public function blockingIp() {
		for($i = 0; $i <= count($this->ipBlock); $i++) {
			if(intval(time()) - intval($this->ipBlock[$i][1]) > 10) {
				unset($this->ipBlock[$i]);
				$_SESSION['count'] = 1;
					// $this->ipBlock[$i] = $this->ipBlock[$i+1];
			}
		}
	}

}