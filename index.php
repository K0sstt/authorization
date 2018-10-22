<?php
session_start();

include 'database/Db.php';

include 'app/Validator.php';
include 'app/Blocker.php';

$db = new Db;
$valid = new Validator;
$blocker = new Blocker;

// $_SESSION['count'] = 1;
echo $_SESSION['count'];
// $blocker->checkSessionCount();

include 'templates/auth.php';


if($_SERVER['REQUEST_METHOD'] == 'POST') {


	foreach($db->query('SELECT * FROM user') as $user) {
		if($valid->startCheck($_POST, $user) === true) {
			print "hello ".$user['login']."<br> your password ".$user['password'].'<br>';
			$_SESSION['count'] = 1;
			break;
		} else {
			$blocker->checkSessionCount();
			echo $_SESSION['count'];
			break;
		}
	}

	

}