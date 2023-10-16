<?php session_start();
require('config/config.php');
require('model/functions.fn.php');

/*===============================
    Register
===============================*/

if (isset($_POST['emailForm']) && isset($_POST['passwordForm']) && isset($_POST['usernameForm'])) {
	if (!empty($_POST['emailForm']) && !empty($_POST['passwordForm']) && !empty($_POST['usernameForm'])) {

		// TODO
		$emailAvailability = isEmailAvailable($db, $_POST['emailForm']);
		$usernameAvailability = isUsernameAvailable($db, $_POST['usernameForm']);
		if ($usernameAvailability !== true || $emailAvailability !== true) {
			$error = 'Either the email or username is not available';
		}
		// Force user connection to access dashboard
		userRegistration($db, $_POST['usernameForm'], $_POST['emailForm'], $_POST['passwordForm']);
	} else {
		$error = 'Champs requis !';
	}
}

include 'view/_header.php';
include 'view/register.php';
include 'view/_footer.php';
