<?php

require_once '../Core/init.php';




class Room 
{
	public function roomCheck( $room, $conn )
	{
		$room;
		$sql = "SELECT count(room_no) AS room FROM `student_add` WHERE room_no = '$room';";
		$statement = $conn->query($sql);

		while( $row = $statement->fetch(PDO::FETCH_OBJ) )
		{
			$array[] = $row;
		}
		return $array;
	}
}

$room = $_POST['room'] ?? 'Not Found';

	

$rom = new Room;
$rows = $rom->roomCheck( $room ,$conn)['0'];


	if( $rows->room > 0 )
	{
		echo "<p class='alert alert-success'>In this room Available students are ( {$rows->room} )</p>";
	}
		
	else
	{
		echo "<p class='alert alert-warning'> No student still here {$rows->room}</p>";
	}
		