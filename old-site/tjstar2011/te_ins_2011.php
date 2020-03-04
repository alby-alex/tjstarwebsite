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

$login_page = "te_login_2011.php";


if($_COOKIE['TEACHER'] == NULL) //The user has not logged in
	redirect("$login_page");

session_name('TEACHER');
session_start();

if(md5($_SERVER['HTTP_USER_AGENT']) != $_SESSION['agent']) {
	session_destroy();
	setcookie("TEACHER", time()-3600);
	redirect("$login_page");
}

if((time() - $_SESSION['last_activity_time']) > 1800) {
	session_destroy();
	setcookie("TEACHER", time()-3600);
	redirect("$login_page");
}

$_SESSION['last_activity_time'] = time();

$user_name = $_SESSION['user'];

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

function escape_data($mysqli_connection, $data) {
	//Address Magic Quotes
	if(ini_get('magic_quotes_qpc'))
		$data = stripslashes($data);

	$data = mysqli_real_escape_string($mysqli_connection, $data);
	return $data;
}


$dbserver = "mysql.tjhsst.edu";
$dbusername = "2010jlee";
$dbpassword = "BsKVsnWS9ZZqDAzA";
$dbname = "srs";
$dbc = mysqli_connect ($dbserver, $dbusername, $dbpassword);
if (!$dbc) {
	echo "Fatal error. Please contact the TJSTAR staff.<br>";
	exit();
}
mysqli_select_db($dbc, $dbname);

//Getting all the data.
if (isset($_POST['Name']))
	$name = escape_data($dbc, htmlspecialchars($_POST["Name"]));
else $name = NULL;
if (isset($_POST['Filler']))
	$filler = escape_data($dbc, htmlspecialchars($_POST["Filler"]));
else $filler = NULL;
if (isset($_POST['Department']))
	$department = escape_data($dbc, htmlspecialchars($_POST["Department"]));
else { $department = NULL; }
if (isset($_POST['Email']))
	$email = escape_data($dbc, htmlspecialchars($_POST["Email"]));
else $email = NULL;

if (isset($_POST['Type'])) {
	$type = $_POST["Type"];
	if (is_array($type)) {
		$tmp_arr = array();
		foreach($type as $tmp) {
			$tmp_arr[] = escape_data($dbc, htmlspecialchars($tmp));
		}
		$type = $tmp_arr;
	}
	else
		$type = escape_data($dbc, htmlspecialchars($_POST['Type']));
}
else $type = NULL;

if (isset($_POST['Audience'])) {
	$audience = $_POST["Audience"];
	if (is_array($audience)) {
		$tmp_arr = array();
		foreach($audience as $tmp) {
			$tmp_arr[] = escape_data($dbc, htmlspecialchars($tmp));
		}
		$audience = $tmp_arr;
	}
	else
		$audience = escape_data($dbc, htmlspecialchars($_POST['Audience']));
}
else $audience = NULL;

if (isset($_POST['Technology']))
	$technology = escape_data($dbc, htmlspecialchars($_POST["Technology"]));
else $technology = NULL;
if (isset($_POST['TechnologyText']))
	$technology_text = escape_data($dbc, htmlspecialchars($_POST["TechnologyText"]));
else $technology_text = NULL;

if (isset($_POST['Title']))
	$title = escape_data($dbc, htmlspecialchars($_POST["Title"]));
else $title = NULL;
if (isset($_POST['Description']))
	$description = escape_data($dbc, htmlspecialchars($_POST["Description"]));
else $description = NULL;


//Validating data.
$valid = true;
$not_filled = array();
//Silly boiler plate code. None of the fields should be null.
if ($name == NULL) { $not_filled[] = "Name"; }
//No need for filler.
if ($department == NULL) { $not_filled[] = "Department"; }
if ($email == NULL) { $not_filled[] = "Email"; }

if ($type == NULL) { $not_filled[] = "Type"; }
if ($audience == NULL) { $not_filled[] = "Audience"; }
if ($technology == NULL) { $not_filled[] = "Technology needs"; }
if ($title == NULL) { $not_filled[] = "Title"; }
if ($description == NULL) { $not_filled[] = "Description"; }

if (empty($not_filled) == false) {
	failure($not_filled);
}

//We assume the texts are valid. Going on to the checkboxes and stuff.
$allowed_types = array("Panel", "Individual", "Group", "Workshop", "Design", "Display");
$allowed_audiences = array("Physics", "Chemistry", "Biology", "Economics", "Mathematics", 
	"Problem Solving", "Oceanography", "Astronomy");

//The only time this is reached should be when someone is doing something naughty.
$types_string = "";
if (is_array($type)) {
	foreach ($type as $tmp) {
		if (in_array($tmp, $allowed_types) == false) {
			echo "Fatal error. Please contact the TJSTAR staff with the items you selected.<br>";
			exit();
		}
		$types_string .= $tmp;
		$types_string .= "  ";
	}
}

$audience_string = "";
if (is_array($audience)) {
	foreach ($audience as $tmp) {
		if (in_array($tmp, $allowed_audiences) == false) {
			echo "Fatal error. Please contact the TJSTAR staff with the items you selected.<br>";
			exit();
		}
		$audience_string .= $tmp;
		$audience_string .= "  ";
	}
}


$today = date('F j');
$sql_qry = "INSERT INTO `srs` . `Teachers` 
(`Name` , `Filler` , `Department` , `Email` , `Type` , `Audience` , 
`Technology` , `TechnologyText` , `Title` , `Description`, `Username` , `Date`)
VALUES ('$name', '$filler', '$department', '$email', '$types_string', 
'$audience_string', '$technology', '$technology_text', '$title', '$description', '$user_name', '$today')";

if (!mysqli_query($dbc, $sql_qry)) {
	echo "Fatal error. Please contact the TJSTAR staff.<br><br>";
	exit();
}
mysqli_close($dbc);



echo "<p>The following information has been submitted to the TJSTAR committee:
\n<br><br>\n";

echo "Name: $name <br>\n";
if ($filler != NULL) {
	echo "Contact name: $filler <br>\n";
}
echo "Email: $email <br>\n";
echo "Department: $department <br>\n";
echo "<br>";

echo "Type of presentation: <br>\n";
if (is_array($type)) {
	foreach ($type as $tmp) {
		echo $tmp;
		echo "<br>\n";
	}
}
echo "<br>\n";
echo "Audience: <br>\n";
if (is_array($audience)) {
	foreach ($audience as $tmp) {
		echo $tmp;
		echo "<br>\n";
	}
}
echo "<br>\n";

if ($technology != NULL && $technology == "email") {
	echo "Technology needs: $technology_text <br>\n";
}
echo "<br>\n";
echo "Title: $title <br>\n";
echo "Description: $description <br>\n";
echo "</p>\n";

?>

<?php include("footer.php"); ?>

