<?php

include("../reg/functions.php");

if ($_COOKIE['testDatabase'] == NULL) //The user has not logged in
	redirect("auth.php");

session_name("testDatabase");
session_start();

if(md5($_SERVER['HTTP_USER_AGENT']) != $_SESSION['agent']) {
	session_destroy();
	setcookie("testDatabase", time()-3600);
	redirect("auth.php");
}

if((time() - $_SESSION['last_activity_time']) > 1800) {
	sessionr_destroy();
	setcookie("testDatabase", time()-3600);
	redirect("auth.php");
}

$_SESSION['last_activity_time'] = time();

$user_name = $_SESSION['user'];

function testIt($look, $filename) {
	//Connect to the database
	$dbserver = "mysql.tjhsst.edu";
	$dbusername = "2010jlee";
	$dbpassword = "BsKVsnWS9ZZqDAzA";
	$dbname = "srs";
	$dbc = mysqli_connect($dbserver, $dbusername, $dbpassword);
	
}
>
