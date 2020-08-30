<?php

require_once '../Core/init.php';

$statement = new User;

$status = $statement->due( $_POST, $conn );

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
				'message' 	=> '<p class="alert alert-success">Amount submitted Successfully. </p>',
				'url'  		=> "studentFee.php?cnic={$_POST['cnic']}&submit=Submit",
				'login'		=> '1'
			]);
	break;
	case 'error':
		echo json_encode([
				'error'   => 'error',
				'message' => '<p class="alert alert-danger"> Error during submitting we do not know why. </p>'
			]);
	break;
case 'Greater':
		echo json_encode([
				'error'   => 'Greater',
				'message' => '<p class="alert alert-danger"> You Have Entered amount greater than Dues. </p>'
			]);
	break;
}
