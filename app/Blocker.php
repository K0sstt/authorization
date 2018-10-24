<?php

class Blocker {

	public $counter;
	public $ipBlock = [];

	public function checkSessionCount() {

		if($_SESSION['count'] < 3) {
			include 'templates/auth.php';
		}

		if($_SESSION['count'] == 3) {
			$this->checkIp();
			$this->blockingIP();
		}
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
			} else {
				include_once 'templates/block.php';
			}
		}
	}

}