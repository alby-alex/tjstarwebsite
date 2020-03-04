<?php

function redirect($location) {
	$url = 'https://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);
	if(substr($url, -1) == '/' OR substr($url, -1) == '\\')
		$url = substr($url, 0, -1);

	$url .="/";
	$url .= $location;
	header("Location: $url");
	exit();
}

function escape_data($mysqli_connection, $data) {
	//Address Magic Quotes
	if(ini_get('magic_quotes_qpc'))
		$data = stripslashes($data);

	$data = mysqli_real_escape_string($mysqli_connection, $data);
	return $data;
}

function init_session($user) {
	session_name('TJSTAR');
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

if(isset($_POST['submit'])) {
	$errors = array();
	
	if(isset($_POST['username']))
		$username = strtolower(escape_data($dbc, htmlspecialchars($_POST['username'])));
	else
		$errors[] = "You forgot to enter your username";
	
	if(isset($_POST['password']))
		$password = $_POST['password'];
	else
		$errors[] = "You forgot to enter your password";
	
	if(empty($errors)) {
		$result = mysqli_query($dbc, "SELECT UserName, Password FROM `srs`.`Speakers`");
		while ($row = mysqli_fetch_row($result)) {
			if ($row[0] == $username) {
				if ($row[1] != $password) {
					$errors[] = "Your username and password did not match";
					break;
				}
				else {
					init_session($username);
					redirect("extern_change.php");
				}
			}
		}
	}
}

if ($_GET['timeout'] == 1 || $_GET['compromise'] == 1) {
	setcookie('TJSTAR');
	redirect("extern_login.php");
}

if($_COOKIE['TJSTAR'] != NULL) {
	session_name("TJSTAR");
	session_start();
	
	if((time() - $_SESSION['last_activity_time']) > 1800) { //The user has been inactive for over 1 hour, log out user.
		setcookie("TJSTAR", time()-3600);
		session_destroy();
		redirect("extern_login.php?timeout=1");
	}

	if(md5($_SERVER['HTTP_USER_AGENT']) != $_SESSION['agent']) { //The session is compromised, terminate
		session_destroy();
		setcookie("TJSTAR", time()-3600);
		redirect("extern_login.php?compromise=1");
	}
	
	$_SESSION['last_activity_time'] = time();
	$user = $_SESSION['user'];
	redirect("extern_change.php");
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

if ($_COOKIE['TJSTAR'] == NULL) {
	echo "<p>";
	echo "Please log in to change your information.\n\n";
	echo "<form method=\"post\" action=\"extern_login.php\">\n";
	echo "<table width=\"70%\" style=\"margin-left:10px;\">";
	echo "<tr><td>Username: <input type=\"text\" name=\"username\" size=\"15\" maxlength=\"15\" /></td></tr>\n\n";
	echo "<tr><td>Password: <input type=\"password\" name=\"password\" size=\"15\" maxlength\"50\" /></td></tr></table>\n";
	echo "<input type=\"submit\" name=\"submit\" value=\"Login\" />";
	echo "</form>";
	echo "</p>";
}

?>

<?php include("footer.php"); ?>

