<?php


require_once '../Core/init.php';

$statement = new User;

$status = $statement->selecteStudent( $_POST, $conn );

switch( $status )
{
	case 'Empty':
		echo json_encode([
				'error'    => 'Empty',
				'message'  => '<p class="alert alert-danger"> You must be enter CNIC For Fee.</p>',
			]);
	break;
	case 'success':
		echo json_encode([
				'success'    => 'success',
				'message'  => '<p class="alert alert-success"> Found Data. </p>',
				'login'   => '1',
				'url'  => 'studentFee.php'
			]);
	break;
	case 'noStudent':
		echo json_encode([
				'error'    => 'noStudent',
				'message'  => '<p class="alert alert-danger"> No Student Is Existed. Please Enter Carefully.</p>',
			]);
	break;
}