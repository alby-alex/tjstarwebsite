<?php
function init_session($session_name, $user) {
/*	ini_set('display_errors', 1);
	ini_set("session.use_only_cookies", 1); */
	
	session_name($session_name);
	
/*	if (isset($_COOKIE[session_name()]) && $_COOKIE[session_name()] === '')
{
	# PHP will throw a warning if session cookie is an empty string
	# workaround: delete cookie if set to empty string
	setcookie(session_name(), '', time()-42000, '/');
	unset($_COOKIE[session_name()]);
}
	phpinfo(); */
	session_start();
	$_SESSION['agent'] = md5($_SERVER['HTTP_USER_AGENT']);
	$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
	$_SESSION['last_activity_time'] = time();
	$_SESSION['user'] = (string)$user;
}
include("reg/functions.php");
$dbserver = "mysql.tjhsst.edu";
$dbusername = "2010jlee";
$dbpassword = "BsKVsnWS9ZZqDAzA";
$dbname = "srs";
$dbc = mysqli_connect ($dbserver, $dbusername, $dbpassword);
mysqli_select_db($dbc, $dbname);
$login_name = "seniortech_php_login_2011.php";
if(isset($_POST['submit'])) {
	$errors = array();
	if(isset($_POST['username']))
		$username = $_POST['username'];
	else
		$errors[] = "You forgot to enter your username";
	if(isset($_POST['password']))
		$password = $_POST['password'];
	else
		$errors[] = "You forgot to enter your password";
	if(empty($errors)) {
		$errors = iodine_login($username, $password, $login_name, 'TJSTAR');
	}
}
if ($_GET['timeout'] == 1 || $_GET['compromise'] == 1) {
	setcookie('TJSTAR');
	redirect("$login_name");
}
if($_COOKIE['TJSTAR'] != NULL) {
	session_name("TJSTAR");
	session_start();
	if((time() - $_SESSION['last_activity_time']) > 1800) { //The user has been inactive for over 1 hour, log out user.
		setcookie("TJSTAR", time()-3600);
		session_destroy();
		redirect("$login_name?timeout=1");
	}
	if(md5($_SERVER['HTTP_USER_AGENT']) != $_SESSION['agent']) { //The session is compromised, terminate
		session_destroy();
		setcookie("TJSTAR", time()-3600);
		redirect("$login_name?compromise=1");
	}
	$_SESSION['last_activity_time'] = time();
	$user = $_SESSION['user'];
	redirect("seniortech.php");
}
include("header_facebox.php");

if(!empty($errors)) {
	echo "The following errors occurred: <br /><ul>";
	foreach($errors as $error)
		echo "<li>$error</li>";
	echo "</ul>";
	exit();
}

if ($_COOKIE['TJSTAR'] == NULL) {
	echo "<p>";
	echo "Please log in to view student presentations.\n\n";
	echo "<form method=\"post\" action=\"$login_name\">\n";
	echo "<table width=\"70%\" style=\"margin-left:10px;\">";
	echo "<tr><td>Username: <input type=\"text\" name=\"username\" size=\"15\" maxlength=\"15\" /></td></tr>\n\n";
	echo "<tr><td>Password: <input type=\"password\" name=\"password\" size=\"15\" maxlength\"50\" /></td></tr></table>\n";
	echo "<input type=\"submit\" name=\"submit\" value=\"Login\" />";
	echo "</form>";
	echo "</p>";
}

include("footer.php");

?>