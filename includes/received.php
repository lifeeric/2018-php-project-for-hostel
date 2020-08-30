<?php


require_once '../Core/init.php';

$statement = new User;

$status = $statement->receivedFee( $_POST, $conn );

switch( $status )
{
	case 'Empty':
		echo json_encode([
				'error'    => 'Empty',
				'message'  => '<p class="alert alert-danger"> Fee Must be enter.</p>',
			]);
	break;
	case 'success':
		echo json_encode([
				'success' => 'success',
				'message' => '<p class="alert alert-success"> Amount Submitted.</p>',
				'login'   => '1',
				'url'     => "studentFee.php?cnic={$_POST['cnic']}&submit=Submit"
			]);
	break;
	case 'noStudent':
		echo json_encode([
				'error'    => 'noStudent',
				'message'  => '<p class="alert alert-danger"> No Student Is Existed. Please Enter Carefully.</p>',
			]);
	break;
}