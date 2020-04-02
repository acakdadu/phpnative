<?php
	// Helper
	require_once '../helper.php';
	 
  if(isset($_SESSION["loggedin"])){

		// Unset all of the session variables
		$_SESSION = array();
		 
		// Destroy the session.
		session_destroy();
		 
		// Redirect to login page
		header("Location: ".BASE_URL);
		exit;

	}