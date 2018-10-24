<?php
session_start();



include 'app/Validator.php';
include 'app/Blocker.php';
include 'database/Db.php';


$valid = new Validator;
$blocker = new Blocker;
$db = new Db;

// $_SESSION['count'] = 1;
echo $_SESSION['count'];
$blocker->checkSessionCount();

// include 'templates/auth.php';


if($_SERVER['REQUEST_METHOD'] == 'POST') {

	// foreach($db->query('SELECT * FROM user') as $user) {

	$users = $db->getUsers();
	print_r($users);

		if($valid->startCheck($_POST, $users) === true) {
			print "hello ".$$_POST['login']."<br> your password ".$$_POST['password'].'<br>';
			$_SESSION['count'] = 1;
			// break;
		} else {
			if(empty($_SESSION['count'])) {
				$_SESSION['count'] = 2;
			} else {
				$_SESSION['count']++;
			}
			echo "<p class=\"d-flex justify-content-center alert alert-danger\">incorrect data</p> <br>";
			// break;
		}
	// }

	

}