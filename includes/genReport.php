<?php

require_once '../Core/init.php';

$statement = new User;

$status = $statement->generateReport( $_POST, $conn );

switch($status)
{
	case 'Empty':
		echo json_encode([
				'error'   => 'Empty',
				'message' => '<p class="alert alert-danger"> All Fields are Required.</p>'
			]);
	break;
	case 'success':
		echo json_encode([
				'success'   => 'success',
				'message' => '<p class="alert alert-success"> Successfully Submitted!</p>'
			]);
	break;
	case 'error':
		echo json_encode([
				'error'   => 'error',
				'message' => '<p class="alert alert-warning"> Something went wrong Try again or Contact to Developer.</p>'
			]);
	break;
}