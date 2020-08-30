<?php

require_once '../Core/init.php';

$statement = new User;

$status = $statement->billing( $_POST, $conn );

switch($status)
{
	case 'Empty':
		echo json_encode([
				'error'   => 'Empty',
				'message' => '<p class="alert alert-danger"> All Fields are mandatory </p>'
			]);
	break;
	case 'success':
		echo json_encode([
				'success'   => 'success',
				'message' 	=> '<p class="alert alert-success"> Successfully Submitted! </p>',
				'url'  		=> 'spa.php'
			]);
	break;
	case 'error':
		echo json_encode([
				'error'   => 'error',
				'message' => '<p class="alert alert-danger"> Error during submitting we do not know why. </p>'
			]);
	break;
}
