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
