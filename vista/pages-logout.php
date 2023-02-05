<?php
	 require '../assets/db/config.php';
	session_destroy();

	header('Location: page-login.php');
?>
