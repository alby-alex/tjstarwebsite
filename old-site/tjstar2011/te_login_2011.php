<?php

include("reg/functions.php");

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

$login_page = "te_login_2011.php";

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
		$errors = iodine_login($username, $password, $login_page, 'TEACHER');
	}
}

if ($_GET['timeout'] == 1 || $_GET['compromise'] == 1) {
	setcookie('TEACHER');
	redirect("$login_page");
}

if($_COOKIE['TEACHER'] != NULL) {
	session_name("TEACHER");
	session_start();
	
	if((time() - $_SESSION['last_activity_time']) > 1800) { //The user has been inactive for over 1 hour, log out user.
		setcookie("TEACHER", time()-3600);
		session_destroy();
		redirect("$login_page?timeout=1");
	}

	if(md5($_SERVER['HTTP_USER_AGENT']) != $_SESSION['agent']) { //The session is compromised, terminate
		session_destroy();
		setcookie("TEACHER", time()-3600);
		redirect("$login_page?compromise=1");
	}
	
	$_SESSION['last_activity_time'] = time();
	$user = $_SESSION['user'];
	redirect("te_reg_2011.php");
}

?>


<?php include("header_facebox.php"); ?>

<?php

if(!empty($errors)) {
	echo "The following errors occurred: <br /><ul>";
	foreach($errors as $error)
		echo "<li>$error</li>";
	echo "</ul>";
	exit();
}

$login_page = "te_login_2011.php";

if ($_COOKIE['TEACHER'] == NULL) {
	echo "<p>";
	echo "Please log in to sign up.\n\n";
	echo "<form method=\"post\" action=\"$login_page\">\n";
	echo "<table width=\"70%\" style=\"margin-left:10px;\">";
	echo "<tr><td>Username: <input type=\"text\" name=\"username\" size=\"15\" maxlength=\"15\" /></td></tr>\n\n";
	echo "<tr><td>Password: <input type=\"password\" name=\"password\" size=\"15\" maxlength\"50\" /></td></tr></table>\n";
	echo "<input type=\"submit\" name=\"submit\" value=\"Login\" />";
	echo "</form>";
	echo "</p>";
}

?>

<?php include("footer.php"); ?>

