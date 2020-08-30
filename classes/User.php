<?php

class User {


	// Student Adding
	public function studentAdd( $user,  $conn ) {

		if( $this->empty([$user['full-name'],$user['father-name'],$user['cnic'],$user['contact'],$user['occupation'],$user['program'],$user['college'],$user['semester'],$user['room_no'],$user['fee'],$user['advance'],$user['address'],$user['guardian_contact'],$user['email'],$user['addmission_date'], $user['admission_fee']]) )
		{
			return 'Empty';
		}
		else
		{
			
			$fields    = ['full_name' => $user['full-name'], 'F_name' => $user['father-name'], 'cnic' => $user['cnic'], 'contact_no' => $user['contact'], 'occupation' => $user['occupation'], 'program' => $user['program'], 'c_name' => $user['college'], 'semester' => $user['semester'], 'room_no' => $user['room_no'], 'fee' => $user['fee'], 'advance' => $user['advance'], 'address' => $user['address'], 'guardian_cont' => $user['guardian_contact'], 'email' => $user['email'], 'admission_date' => $user['addmission_date'], 'image' => '../public/images/user.png', 'admission_fee' => $user['admission_fee']];
			$keys      = array_keys($fields);
			$values    = array_values($fields);

			$value = '';
			$x = 1;

			foreach( $fields as $field )
			{
				$value .= "?";

				if( $x < count($fields) )
				{
					$value .= ",";
				}
				$x++;
			}

			

			$sql 		= "INSERT INTO `student_add` (`" . implode('`,`', $keys) . "`) VALUES({$value});";
			$statement  = $conn->prepare($sql);

			$x = 1;

			foreach( $values as $v )
			{
				$statement->bindValue($x, $v);
				$x++;
			}
			$statement->execute();
			$cnic = $user['cnic'];
			$statement = $conn->query("SELECT * FROM student_add WHERE cnic = '$cnic';");
			while( $row = $statement->fetch(PDO::FETCH_OBJ) )
			{
				$s_id = $row->s_id;
			}
			$date = $user['addmission_date'];

			$sql2 = "INSERT INTO `student_fee`(`fee_received`,`fee_dues`,`s_id`,`date`) VALUES('0','0', '$s_id', '$date');";
			
			if( $conn->query($sql2)  )
			{
				return 'success';
			}
			return 'error';
	
		}

	}

	public function empty( Array $params ) {

		foreach( $params as $param )
		{
			if( empty(trim($param)) )
			{
				return true;
			}
			
		}
		return false;

	}


	// Retrive Student List
	public function retriveStudent( $conn ) {

		$sql = "SELECT * FROM `student_add` ORDER BY `s_id` DESC;";
		$statement = $conn->prepare($sql);
		$statement->execute();
		if( $statement->rowCount() )
		{
			while( $row = $statement->fetch(PDO::FETCH_OBJ) )
			{
				$array[] = $row;
			}
			return $array;	
		}

	}


	// Billing System
	public function billing( $user, $conn ) {

		if( $this->empty([$user['bill_name'],$user['bill_id'],$user['bill_amount'],$user['bill-due-date'],$user['date']]) )
		{
			return 'Empty';
		}
		else
		{
			$fields = ['bill_name' => $user['bill_name'], 'bill_id' => $user['bill_id'], 'bill_amount' => $user['bill_amount'], 'bill_due_date' => $user['bill-due-date'], 'date' => $user['date']];
			$keys 	= array_keys($fields);
			$values = array_values($fields);

			$sign = null;
			$x 	  = 1;

			foreach( $fields as $field)
			{
				$sign .= "?";

				if( $x < count($fields) )
				{
					$sign .= ",";
				}
				$x++;
			}

			$sql 		= "INSERT INTO `utility_bill`(`" . implode('`,`', $keys) . "`) VALUES({$sign});";
			$statement 	= $conn->prepare($sql);

			$x = 1;
			foreach( $fields as $field )
			{
				$statement->bindValue($x, $field);
				$x++;
			}

			if( $statement->execute() )
			{
				return 'success';
			}
			return 'error';

		}

	}

	
	// Other Account
	public function otherAccount( $user, $conn ) {


	
			$fields = ['marketing_exp' => $user['market'], 'rent_amount' => $user['rent-amount'], 'laundry' => $user['laundry'], 'date' => $user['date']];
			$keys   = array_keys($fields);
			$values = array_values($fields);

			$sign = null;
			$x = 1;

			foreach( $fields as $field )
			{
				$sign .= "?";

				if( $x < count($fields) )
				{
					$sign .= ",";
				}
				$x++;
			}

			$sql 	   = "INSERT INTO `other_accounts` (`" . implode('`,`', $keys) . "`) VALUES({$sign});";
			$statement = $conn->prepare($sql);

			$x = 1;

			foreach( $fields as $field )
			{
				$statement->bindValue($x, $field);
				$x++;
			}

			if( $statement->execute() )
			{
				return 'success';
			}
			return 'error';
		

	}


	// Daily Expenses
	public function dailyExpenses( $data, $conn ) {

		if( $this->empty([$data['item'],$data['price'],$data['addmission_date']]) )
		{
			return 'Empty';
		}
		else
		{
			$fields = ['items' => $data['item'], 'price' => $data['price'], 'date' => $data['addmission_date']];
			$keys   = array_keys($fields);
			$values = array_values($fields);

			$x 	  = 1;
			$sign = null;

			foreach( $fields as $field )
			{
				$sign .= "?";

				if( $x < count($fields) )
				{
					$sign .= ",";
				}
				$x++;

			}

			$sql 	   = "INSERT INTO `daily_mess`(`" . implode('`,`', $keys) . "`) VALUES({$sign});";
			$statement = $conn->prepare($sql);

			$x = 1;

			foreach( $fields as $field )
			{
				$statement->bindValue($x, $field);
				$x++;
			}

				if( $statement->execute() )
				{
					return 'success';
				}
				return 'error';

		}
	}


	// Other Expenses
	public function adminExp( $data, $conn ) {

		if( $this->empty([$data['admin'],$data['price'],$data['date']]) )
		{
			return 'Empty';
		}
		else 
		{
			$fields = [ 'name_exp' => $data['admin'], 'price' => $data['price'],'date' => $data['date']];
			$keys   = array_keys($fields);
			$sign   = null;
			$x 		= 1;

			foreach( $fields as $field )
			{
				$sign .= "?";

				if( $x < count($fields) )
				{
					$sign .= ",";
				}
				$x++;
			}

			$sql 	   = "INSERT INTO `admin_exp`(`" . implode('`,`', $keys) . "`) VALUES({$sign});";
			$statement = $conn->prepare($sql);

			$x = 1;

			foreach( $fields as $field )
			{
				$statement->bindValue($x, $field);
				$x++;
			}

			if( $statement->execute() )
			{
				return 'success';
			}
			return 'error';
		}

	}


	//Employee Salaries
	public function employee( $data, $conn ) {

		if( $this->empty([$data['employee_name'],$data['salaries'],$data['date']]) )
		{
			return 'Empty';
		}
		else 
		{
			$fields = [ 'employee_name' => $data['employee_name'], 'emp_salaries' => $data['salaries'],'date' => $data['date']];
			$keys   = array_keys($fields);
			$sign   = null;
			$x 		= 1;

			foreach( $fields as $field )
			{
				$sign .= "?";

				if( $x < count($fields) )
				{
					$sign .= ",";
				}
				$x++;
			}

			$sql 	   = "INSERT INTO `employee_salaries`(`" . implode('`,`', $keys) . "`) VALUES({$sign});";
			$statement = $conn->prepare($sql);

			$x = 1;

			foreach( $fields as $field )
			{
				$statement->bindValue($x, $field);
				$x++;
			}

			if( $statement->execute() )
			{
				return 'success';
			}
			return 'error';
		}

	}


	// Rent Data Retrive
	public function rentData( $conn ) {

		$sql 	   = "SELECT * FROM `billing` ORDER BY `id` DESC;";
		$statement = $conn->prepare($sql);
		$statement->execute();
		if( is_object($statement) )
		{
			while( $row = $statement->fetch(PDO::FETCH_OBJ) )
			{
				$array[] = $row;
			}
			return $array;
		}
	}


	// Login admin
	public function login( $user, $conn ) {

		if( $this->empty([$user['email'], $user['password']]) )
		{
			return 'Empty';
		}
		else {
			$sql = "SELECT * FROM `users` WHERE `user_name` = ? OR `id_card` = ?;";
			$statement = $conn->prepare($sql);

			$statement->bindValue(1, $user['email']);
			$statement->bindValue(2, $user['email']);
			$statement->execute();

			if( $row = $statement->fetch(PDO::FETCH_OBJ) )
			{
				if( isset($_POST['remember']) )
				{
					$cookie = $_POST['email'];
					$cookie_pass = $_POST['password'];
					setcookie('cookie_user', $cookie, time()+60*60*24*7, '/');
					setcookie('cookie_pass', $cookie_pass, time()+60*60*24*7, '/');
				}

				$pass = password_verify($user['password'], $row->password);
					
				if( $pass === true ) 
				{

					$_SESSION['logged_in'] = [
						'id'   => $row->id,
						'name' => $row->user_name,
					];

					return 'success';
				}
				return 'error';
			}
			return 'error';
		}
	}



	// Received Fee
	public function receivedFee( $user, $conn ) {

		if( $this->empty([$user['received'],$user['date'], $user['id'], $user['fee']]) )
		{
			return 'Empty';
		}
		else
		{	
			$fields = ['fee_received' ,'fee_dues','s_id','date'];

			$x 		= 1;
			$sign   = null;
			foreach( $fields as $field )
			{
				$sign .= "?";

				if( $x < count($fields) )
				{
					$sign .= ",";
				}
				$x++;
			}

			 $id = $user['id'];
			 $received = $user['received'];
			 $total = $user['fee'];
			 $date = $user['date'];
			 $test = $received <=> $total;
			 
			 if( $test == 1 )
			 {
				$fields = ['fee_received' ,'s_id','date'];
				$dues = $received - $total;
				$sql = "INSERT INTO `student_fee` (`" . implode('`,`', $fields) . "`) VALUES(?,?,?);";
				$statement = $conn->prepare($sql);
	
				$statement->bindValue(1, $received);
				$statement->bindValue(2, $id);
				$statement->bindValue(3, $date);
	
				if( $statement->execute() )
				{
					return 'success';
				}
				return 'error';
			 }
			 else
			 {
				$dues = abs($received - $total);
				$fields = ['fee_received' ,'fee_dues','s_id','date'];
				$sql = "INSERT INTO `student_fee` (`" . implode('`,`', $fields) . "`) VALUES({$sign});";
				$statement = $conn->prepare($sql);
	
				$statement->bindValue(1, $received);
				$statement->bindValue(2, $dues);
				$statement->bindValue(3, $id);
				$statement->bindValue(4, $date);
	
				if( $statement->execute() )
				{
					return 'success';
				}
				return 'error';
				
			 }
		}

	}

	// Dues Updating
	public function due( $user, $conn ) {
			
		if( $this->empty([$user['DuesReceived'], $user['dues'],$user['date'], $user['id'],$user['fee']]) )
		{
			return 'Empty';
		}
		else
		{
			
			if( $user['dues'] === 'due' )
			{
				
				$id = $user['id'];
				$due  = $user['DuesReceived'];
				$sql = "SELECT SUM(fee_dues) AS noGreater FROM `student_fee` WHERE s_id =  $id;";
				$statement = $conn->query($sql);
				while( $fetch = $statement->fetch(PDO::FETCH_OBJ) )
				{
					$price =  $fetch->noGreater;
				}
				 
				 if( $due > $price )
				{
					return "Greater";
				}
				else
				{
					$due  = $user['DuesReceived'];
					$id   = $user['id'];
					$date = $user['date'];
					$add = $user['DuesReceived'];

					$sql = "SELECT * FROM student_fee WHERE s_id = $id";
					$statement = $conn->prepare($sql);
					$statement->execute();
					
					$rows = $statement->fetchAll(PDO::FETCH_OBJ);
					
					foreach( $rows as $row )
					{


						$sql = $conn->query("SELECT * FROM `student_fee` WHERE id = $row->id and fee_dues != 0;");

						while( $row2 = $sql->fetch(PDO::FETCH_OBJ) )
						{
							$mDues = & $due;

							if( $mDues >= $row2->fee_dues )
							{
								$due = $mDues - $row2->fee_dues;

								$conn->query("UPDATE student_fee SET fee_dues = 0, date = '$date' WHERE student_fee.id = $row2->id");

								if( $mDues == '0' )
								{
									$conn->query("UPDATE student_fee SET fee_received = fee_received + $add WHERE student_fee.id = $row2->id");
									return 'success';
									break;

								}
								
												
							}
							else
							{
								
								if(  ($due = $row2->fee_dues - $mDues) !== '0' )
								{
									$conn->query("UPDATE student_fee SET fee_dues = $mDues, fee_received = fee_received + $add, date = '$date' WHERE id = $row->id;");
									return 'success';
									break;
								}
								break;

							
							}
						}

					}
				}					
	
			}
			else if( $user['dues'] === 'securityReturn' )
			{
				$due  = $user['DuesReceived'];
				$due  = $user['DuesReceived'];
				$id   = $user['id'];
				$date = $user['date'];

				$sql = "SELECT * FROM `student_add` WHERE `student_add`.`s_id` = '$id';";
				$statement = $conn->prepare($sql);
				$statement->execute();

				while( $row = $statement->fetch(PDO::FETCH_OBJ) )
				{
					$myDues = & $due;

					if(  $myDues === $row->advance  )
					{
						$conn->query("UPDATE `student_add` SET `advance` = '0', `departure_date` = '$date' WHERE `student_add`.`s_id` = '$row->s_id';");
						$due = abs($myDues - $row->advance);

						if( $due == '0' )
						{
							return 'success';
							break;
						}
					}
					else
					{
						$due = abs($myDues - $row->advance);
						$conn->query("UPDATE `student_add` SET `advance` = '$myDues', `departure_date` = '$date' WHERE `student_add`.`s_id` = '$row->s_id';");
						return 'success';
						break;
					}
				}

			}
		}
			
	}

}