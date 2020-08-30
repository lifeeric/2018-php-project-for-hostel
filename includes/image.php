<?php

require_once '../Core/init.php';


if( isset($_POST['img']) )
{
	$cnic = $_POST['cnic'];

	$file = $_FILES['file'];
	$name = $_FILES['file']['name'];
	$type = $_FILES['file']['type'];
	$size = $_FILES['file']['size'];
	$t_na = $_FILES['file']['tmp_name'];
	$error= $_FILES['file']['error'];

	$ext  = explode('.', $name);
	$AExt = strtolower(end($ext));

	$allowed = array('jpg','png','gif','jpeg');

	if( in_array($AExt, $allowed) )
	{
		if( $error === 0 )
		{
			if( $size < 300000 )
			{
				$newName 	= date("mjYHisa") . "." . $AExt;
				$fileDestin = "../public/images/" . $newName;
				move_uploaded_file($t_na, $fileDestin);
				
				echo $sql = "UPDATE `student_add` SET `image` = '{$fileDestin}' WHERE `cnic` = '{$cnic}';";
				if( $conn->query($sql) )
				{
					header("Location: ../pages/spa.php");
				}
				else
				{
					echo 'Unfortunately some error occur we do not know why.';
				}
			}
			else
			{
				echo 'Your File is too big.';
			}
		}
	}
	else
	{
		echo 'You can only upload jpg, png, gif and jpeg extension.';
	}
}