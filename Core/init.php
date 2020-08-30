<?php

session_start();

require_once 'db.php';

function __autoload( $class )
{
	require_once '../classes/' . $class . '.php';
}