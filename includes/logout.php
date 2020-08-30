<?php
session_start();
if( isset($_SESSION['logged_in']) )
{
	setcookie(session_name, session_id, date()-1000, '/');
	session_unset();
	session_destroy();
	header("Location: ../index.php");
	exit();
}
else
{
	header("Location: ../index.php");
}