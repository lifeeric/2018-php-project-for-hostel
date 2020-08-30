<?php

require_once '../Core/init.php';

$statement = new User;

$status = $statement->dailyExpenses( $_POST, $conn );

switch($status)
{
	case 'Empty':
		echo json_encode([
				'error'   => 'Empty',
				'message' => '<p class="alert alert-danger"> All Fields are Mandatory Please? </p>'
			]);
	break;
	case 'success':
		echo json_encode([
				'success'   => 'success',
				'message' => '<p class="alert alert-success"> Successfully Submitted! </p>'
			]);
	break;
	case 'error':
		echo json_encode([
				'error'   => 'error',
				'message' => '<p class="alert alert-warning"> We do not know what happen but Try again Or contact to Developer. </p>'
			]);
	break;
}
