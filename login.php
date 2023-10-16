<?php session_start();

/******************************** 
     DATABASE & FUNCTIONS 
 ********************************/
require('config/config.php');
require('model/functions.fn.php');


/********************************
            PROCESS
 ********************************/

if (isset($_POST['emailForm']) && isset($_POST['passwordForm'])) {
	if (!empty($_POST['emailForm']) && !empty($_POST['passwordForm'])) {

		// TODO

		// Force user connection to access dashboard
		$userConnection = userConnection($db, $_POST['emailForm'], $_POST['passwordForm']);
		if ($userConnection === true) {
			header('Location: dashboard.php');
		} else {
			$error = 'Invalid credentials';
		}
	} else {
		$error = 'Champs requis !';
	}
}

/******************************** 
            VIEW 
 ********************************/
include 'view/_header.php';
include 'view/login.php';
include 'view/_footer.php';
