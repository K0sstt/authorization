<?php
session_start();
// $_SESSION['count'] = 1;

if($_SESSION['count'] == 3) {
	if($_SERVER['REMOTE_ADDR'] == '127.0.0.1') {
		header('Location: http://authorization.loc/templates/block.php');
		exit;
	}		
}

include 'templates/auth.php';

include 'database/Db.php';
include 'app/Validator.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {

	$db = new Db;
	$valid = new Validator;

	foreach($db->query('SELECT * FROM user') as $user) {
		if($valid->startCheck($_POST, $user) === true) {
			print "hello ".$user['login']."<br> your password ".$user['password'].'<br>';
			$_SESSION['count'] == 1;
			break;
		} else {
			if(empty($_SESSION['count'])) $_SESSION['count'] = 1;
			else $_SESSION['count']++;
			break;
		}
	}

	

}