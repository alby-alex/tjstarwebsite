<?php

include("../reg/functions.php");

function init_session($session_name, $user) {
	session_name($session_name);
	session_start();
	$_SESSION['agent'] = md5($_SERVER['HTTP_USER_AGENT']);
	$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
	$_SESSION['last_activity_time'] = time();
	$_SESSION['user'] = (string)$user;
}



$dbserver = "mysql.tjhsst.edu";
$dbusername = "2010jlee";
$dbpassword = "BsKVsnWS9ZZqDAzA";
$dbname = "srs";
$dbc = mysqli_connect ($dbserver, $dbusername, $dbpassword);
mysqli_select_db($dbc, $dbname);

$login_name = "auth.php";

if(isset($_POST['submit'])) {
	//$allowed_users = array('2011dkang', 'kotani', 'ecsandstrom', 'acvaden');
	$errors = array();
	
	if(isset($_POST['username']) /*&& in_array($_POST['username'], $allowed_users) == true*/)
		$username = $_POST['username'];
	else
		$errors[] = "You forgot to enter your username";
	
	if(isset($_POST['password']))
		$password = $_POST['password']; 
	else
		$errors[] = "You forgot to enter your password";
	
	if(empty($errors)) {
		$errors = iodine_login($username, $password, $login_name, 'EXPORT');
	}
}

if ($_GET['timeout'] == 1 || $_GET['compromise'] == 1) {
	setcookie('EXPORT');
	redirect("auth.php");
}

if($_COOKIE['EXPORT'] != NULL) {
	session_name("EXPORT");
	session_start();
	
	if((time() - $_SESSION['last_activity_time']) > 1800) { //The user has been inactive for over 1 hour, log out user.
		setcookie("EXPORT", time()-3600);
		session_destroy();
		redirect("auth.php?timeout=1");
	}

	if(md5($_SERVER['HTTP_USER_AGENT']) != $_SESSION['agent']) { //The session is compromised, terminate
		session_destroy();
		setcookie("EXPORT", time()-3600);
		redirect("auth.php?compromise=1");
	}
	
	$_SESSION['last_activity_time'] = time();
	$user = $_SESSION['user'];
	redirect("export.php");
}

?>


<?php 

include("header_facebox.php");


if(!empty($errors)) {
	echo "The following errors occurred: <br /><ul>";
	foreach($errors as $error)
		echo "<li>$error</li>";
	echo "</ul>";
	exit();
}

if ($_COOKIE['EXPORT'] == NULL) {
	echo "<p>";
	echo "<h4>Export data</h4>\n\n";
	echo "Please log in to export.\n\n";
	echo "<form method=\"post\" action=\"auth.php\">\n";
	echo "<table width=\"70%\" style=\"margin-left:10px;\">";
	echo "<tr><td>Username: <input type=\"text\" name=\"username\" size=\"15\" maxlength=\"15\" /></td></tr>\n\n";
	echo "<tr><td>Password: <input type=\"password\" name=\"password\" size=\"15\" maxlength\"50\" /></td></tr></table>\n";
	echo "<input type=\"submit\" name=\"submit\" value=\"Login\" />";
	echo "</form>";
	echo "</p>";
}

?>

<?php include("../footer.php"); ?>

