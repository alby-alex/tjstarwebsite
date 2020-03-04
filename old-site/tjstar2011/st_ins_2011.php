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


if($_COOKIE['TJSTAR'] == NULL) //The user has not logged in
	redirect("login.php");

session_name('TJSTAR');
session_start();

if(md5($_SERVER['HTTP_USER_AGENT']) != $_SESSION['agent']) {
	session_destroy();
	setcookie("TJSTAR", time()-3600);
	redirect("login.php");
}

if((time() - $_SESSION['last_activity_time']) > 1800) {
	session_destroy();
	setcookie("TJSTAR", time()-3600);
	redirect("login.php");
}

$_SESSION['last_activity_time'] = time();

$cur_user = $_SESSION['user'];

?>

<?php include("header_facebox.php"); ?>

<?php
if(!empty($errors)) {
	echo "The following errors occurred: <br /><ul>";
	foreach($errors as $error)
		echo "<li>$error</li>";
	echo "</ul>";
}
?>

<?php
function success() {
	echo "Thank you for registering.  A TJSTAR student representative will contact you at a later time to discuss the specifics of your presentation.<br> ";
}

//fields are the fields that aren't filled out.
function failure($fields) {
	echo "<p>The following fields are not filled out: <br>";
	foreach ($fields as $field) {
		echo $field;
		echo "<br>";
	}
	echo "<br></p>";
	echo "Please click back and completely fill out the form.<br>";
	exit();
}
?>


<?php
//Getting all the data.
$allowed_nums = array("1", "2", "3", "4", "5", "6", "7", "8");
$num_students = $_GET['num'];
if (in_array($num_students, $allowed_nums) == false) {
	echo "Fatal error. Please contact the TJSTAR staff.\n";
	exit();
}

$first_name_arr = $_POST["FirstName"];
$last_name_arr = $_POST["LastName"];
$email_arr = $_POST["Email"];
$user_name_arr = $_POST["UserName"];

$technology = $_POST["Technology"];
$technology_text = $_POST["TechnologyText"];

$title = $_POST["Title"];
$description = $_POST["Description"];

$type = $_POST["Type"];
$IBET = $_POST["IBET"];
$other = $_POST["Other"];


//Validating data.
$valid = true;
$not_filled = array();
//Silly boiler plate code. None of the fields should be null.
if ($first_name_arr == NULL || is_array($first_name_arr) == false || 
	count($first_name_arr) != (int)$num_students) { $not_filled[] = "First Name"; }
if ($last_name_arr == NULL || is_array($last_name_arr) == false || 
	count($last_name_arr) != (int)$num_students) { $not_filled[] = "Last Name"; }
if ($email_arr == NULL || is_array($email_arr) == false || 
	count($email_arr) != (int)$num_students) { $not_filled[] = "Email"; }
if ($user_name_arr == NULL || is_array($user_name_arr) == false ||
	count($user_name_arr) != (int)$num_students) { $not_filled[] = "User Name"; }

if ($technology == NULL) { $not_filled[] = "Technology needs"; }
if ($title == NULL) { $not_filled[] = "Title"; }
if ($description == NULL) { $not_filled[] = "Description"; }
if ($type == NULL) { $not_filled[] = "Type of presentation"; }

if (empty($not_filled) == false) {
	failure($not_filled);
}

$first_name = "";
foreach($first_name_arr as $tmp)
	$first_name = $first_name . str_replace("\t", "", $tmp) . "\t";
$first_name = substr($first_name, 0, -1);

$last_name = "";
foreach($last_name_arr as $tmp)
	$last_name = $last_name . str_replace("\t", "", $tmp) . "\t";
$last_name = substr($last_name, 0, -1);

$email = "";
foreach($email_arr as $tmp)
	$email = $email . str_replace("\t", "", $tmp) . "\t";
$email = substr($email, 0, -1);

$user_name = "";
foreach($user_name_arr as $tmp)
	$user_name = $user_name . str_replace("\t", "", $tmp) . "\t";
$user_name = substr($user_name, 0, -1);


//Connect to the database and insert the data.

$dbserver = "mysql.tjhsst.edu";
$dbusername = "2010jlee";
$dbpassword = "BsKVsnWS9ZZqDAzA";
$dbname = "srs";
$dbc = mysqli_connect($dbserver, $dbusername, $dbpassword);
if (!$dbc) {
	echo "Fatal error. Please contact the TJSTAR staff with the information dbc.<br>";
	exit();
}
mysqli_select_db($dbc, $dbname);


$today = date('F j');
$IBET = '';
$senior_tech = '';
$other = '';
$sql_qry = "INSERT INTO `srs`.`Students` (`FirstName`, `LastName`, `Title`, `Description`, `Room`, `Lab`, `IBET`,
`Other`, `Email`, `Technology`, `TechnologyText`, `Type`, `Username`, `Date`)
VALUES ('$first_name', '$last_name', '$title', '$description', '', '$senior_tech', '$IBET', 
'$other', '$email', '$technology', '$technology_text', '$type', '$user_name', '$today')";

if (!mysqli_query($dbc, $sql_qry)) {
	echo "Fatal error. Please contact the TJSTAR staff with the error dbf.<br><br>";
	exit();
}
mysqli_close($dbc);



echo "<p>The following information has been submitted to the TJSTAR committee:
\n<br><br>\n";
if ($technology != NULL && $technology == "email") {
	echo "Technology needs: $technology_text <br>\n";
}
echo "<br>\n";
echo "Title: $title <br>\n";
echo "Description: $description <br>\n";
echo "Type of presentation: $type <br>\n";
echo "</p>\n";

?>

<?php include("footer.php"); ?>

