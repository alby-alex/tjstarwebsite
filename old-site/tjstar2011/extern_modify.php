<?php
function redirect($location) {
	$url = 'https://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);
	if(substr($url, -1) == '/' OR substr($url, -1) == '\\')
		$url = substr($url, 0, -1);

	$url .="/";
	$url .= $location;
	header("Location: $url");
	exit();
} //End of function redirect()


if($_COOKIE['TJSTAR'] == NULL) //The user has not logged in
	redirect("extern_login.php");

session_name('TJSTAR');
session_start();

if(md5($_SERVER['HTTP_USER_AGENT']) != $_SESSION['agent']) {
	session_destroy();
	setcookie("TJSTAR", time()-3600);
	redirect("extern_login.php");
}

if((time() - $_SESSION['last_activity_time']) > 1800) {
	session_destroy();
	setcookie("TJSTAR", time()-3600);
	redirect("extern_login.php");
}

$_SESSION['last_activity_time'] = time();


if(!empty($errors)) {
	echo "The following errors occurred: <br /><ul>";
	foreach($errors as $error)
		echo "<li>$error</li>";
	echo "</ul>";
}


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
	echo "<br></p>\nPlease click back and completely fill out the form.<br>";
	exit();
}

?>

<?php include("header_facebox.php"); ?>


<?php
function escape_data($mysqli_connection, $data) {
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
if (isset($_POST['Data']) == false || is_array($_POST['Data']) == false) {
	echo "Please fill out the form completely.<br>";
	exit();
}
$tmp_arr = $_POST['Data'];
$all_fields = array("Name", "Contact Name", "Job Title", "Organization", "Address", 
					"Email", "Phone", "Field", "Title", "Description", "User name", "Password");
$f = $all_fields;
$req_fields = array("Name", "Job Title", "Organization", "Address", 
					"Email", "Phone", "Field", "Title", "Description");
$p_data = array();
for ($i = 0; $i < sizeof($tmp_arr); $i++) {
	$p_data[$f[$i]] = escape_data($dbc, htmlspecialchars($tmp_arr[$i]));
}

if (isset($_POST['Contact']))
	$contact = escape_data($dbc, htmlspecialchars($_POST["Contact"]));
else $contact = NULL;

if (isset($_POST['Type'])) {
	$type = $_POST["Type"];
	if (is_array($type)) {
		$tmp_arr = array();
		foreach($type as $tmp) 
			$tmp_arr[] = escape_data($dbc, htmlspecialchars($tmp));
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
		foreach($audience as $tmp)
			$tmp_arr[] = escape_data($dbc, htmlspecialchars($tmp));
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


//Validating data.
$not_filled = array();

foreach($req_fields as $field) {
	if ($p_data[$field] == '') {
		$not_filled[] = $field;
	}
}
if ($type == NULL) { $not_filled[] = "Presentation Type"; }
if ($technology == NULL) { $not_filled[] = "Technology needs"; }

if (empty($not_filled) == false) {
	failure($not_filled);
}

//We assume the texts are valid. Going on to the checkboxes and stuff.
$allowed_types = array("Panel", "Individual", "Group", "Workshop", "Design", "Display", NULL);
$allowed_audiences = array("Physics", "Chemistry", "Biology", "Economics", "Mathematics", 
	"Problem Solving", "Oceanography", "Astronomy", NULL);

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

$sql_qry = "UPDATE `srs`.`Speakers` SET 
`Name` = '".$p_data[$f[0]]."', 
`ContactName` = '".$p_data[$f[1]]."',
`JobTitle` = '".$p_data[$f[2]]."',
`Organization` = '".$p_data[$f[3]]."',
`Address` = '".$p_data[$f[4]]."',
`Email` = '".$p_data[$f[5]]."',
`Phone` = '".$p_data[$f[6]]."',
`Field` = '".$p_data[$f[7]]."',
`Contact` = '".$contact."',
`PresentationType` = '".$types_string."',
`Audience` = '".$audience_string."',
`Technology` = '".$technology."',
`TechnologyText` = '".$technology_text."',
`Title` = '".$p_data[$f[8]]."',
`Description` = '".$p_data[$f[9]]."',
`Date` = '".$today."' 
WHERE `Speakers`.`UserName` = '".$_SESSION["user"]."' LIMIT 1;";


if (!mysqli_query($dbc, $sql_qry)) {
	echo "Fatal error. Please contact the TJSTAR staff.<br><br>";
	exit();
}
mysqli_close($dbc);






echo "<p>The following information has been submitted to the TJSTAR committee:
\n<br><br>\n";

echo "Presenter's name: " . $p_data[$all_fields[0]] . "<br>\n";
if ($p_data[$all_fields[1]] != '') {
	echo "Contact person: " . $p_data[$all_fields[1]] . "<br>\n";
}
echo "Job title: " . $p_data[$f[2]] . "<br>\n";
echo "Office: " . $p_data[$f[3]] . "<br>\n";
echo "Mailing address: " . $p_data[$f[4]] . "<br>\n";
echo "Email: " . $p_data[$f[5]] . "<br>\n";
echo "Phone: " . $p_data[$f[6]] . "<br>\n";
echo "Field: " . $p_data[$f[7]] . " <br>\n";
echo "Contact type: $contact <br>\n";
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
else {
	echo "None specified";
}
echo "<br>\n";

if ($technology != NULL && $technology == "email") {
	echo "Technology needs: $technology_text <br>\n";
}
echo "<br>\n";
echo "Title: " . $p_data[$f[8]] . "<br>\n";
echo "Description: " . $p_data[$f[9]] . " <br>\n";

echo "</p>\n";

?>

<?php include("footer.php"); ?>

