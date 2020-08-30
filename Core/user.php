<?php

class config {

	public static $host = 'localhost';
	public static $user = 'root';
	public static $pass = '';
	public static $db   = 'hostelpakistan';

}

try
{

	$conn = new PDO('mysql:host=' . config::$host . ';dbname=' . config::$db , config::$user , config::$pass);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


}
catch( PDOException $e )
{
	exit('Please try again some error occur' . $e->getMessage() );
}

if( isset($_POST['submit']) )
{
	
	$user = $_POST['user'];
	$id_card = $_POST['card'];
	
	$pass = $_POST['pass'];

		$pwd  = password_hash($pass, PASSWORD_DEFAULT);
		$sql  = "INSERT INTO `users` (user_name, password, id_card) VALUES(?,?,?);";

		$statement = $conn->prepare($sql);
		$statement->bindValue(1, $user);
		$statement->bindValue(2, $pwd);
		$statement->bindValue(3, $id_card);
		$statement->execute();

}

$a = 110;

$total = 100;
$b = $a <=> $total;
if( $b == -1 )
{
	echo $b . " - 1 <Br />";
}
else
{
	echo $b . "1 <Br />";
}

?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
	<input type="text" name="user" />
	<input type="text" name="card" />
	<input type="password" name="pass" />
	<input type="password" name="c_pass" />
	<input type="submit" value="submit" name="submit" />
</form>
