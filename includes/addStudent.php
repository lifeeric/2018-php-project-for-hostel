<?php

require_once '../Core/init.php';



$statement = new User;

$status = $statement->studentAdd( $_POST, $conn );

switch($status)
{
	case 'Empty':
		echo json_encode([
				'error'   => 'Empty',
				'message' => '<p class="alert alert-danger"> All fields are mandatory.</p>',
			]);
	break;
	case 'digitError':
		echo json_encode([
				'error'   => 'digitError',
				'message' => '<p class="alert alert-danger"> Should be Digits.</p>'
			]);
	break;
	case 'success':
		echo json_encode([
				'success'   => 'success',
				'message'   => "<p class='alert alert-success'> <strong>Note:</strong> Upload student's image below.</p>",
				'url'    	=> 'spa.php'
			]);
	break;
	case 'error':
		echo json_encode([
				'error'   => 'error',
				'message' => '<p class="alert alert-success"> Something went wrong.</p>',
			]);
	break;
}