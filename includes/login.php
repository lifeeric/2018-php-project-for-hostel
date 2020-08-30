<?php


require_once '../Core/init.php';

$statement = new User;

$status = $statement->login( $_POST, $conn );

switch($status)
{
	case 'Empty':
		echo json_encode([
				'error'   => 'Empty',
				'message' => '<p class="alert alert-danger"> All Fields are mandatory. </p>'
			]);
	break;
	case 'error':
		echo json_encode([
				'error'   => 'wrong',
				'message' => '<p class="alert alert-danger"> UserName are Wrong. </p>'
			]);
	break;
	case 'success':
		echo json_encode([
				'success' => 'success',
				'message' => '<p class="alert alert-success"> success. </p>',
				'url'     => 'pages/spa.php',
				'login'   => '1'
			]);

	break;

}