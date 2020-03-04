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

function redirect($location) {
	$url = 'https://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);
	if(substr($url, -1) == '/' OR substr($url, -1) == '\\')
		$url = substr($url, 0, -1);

	$url .="/";
	$url .= $location;
	header("Location: $url");
	exit();
} //End of function redirect()

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
					"Email", "Phone", "Field", "Title", "Description", "User name", "Password");
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


$user = strtolower($p_data[$f[10]]);
$result = mysqli_query($dbc, "SELECT UserName from `srs`.`Speakers`");
while ($row = mysqli_fetch_row($result)) {
	if ($row[0] == $user) {
		echo "<p>This username is already used. Please go back and select another one.</p>";
		die();
	}
}

$pass = $p_data[$f[11]];
if (ctype_alnum($user) == false) {
	echo "User name must be alphanumeric. Please select another user name.";
	die();
}
if ($pass == "" || $pass == NULL) {
	echo "Password cannot be empty. Please choose a password.";
	die();
}


$email_txt = "Dear tjSTAR Participants,\n\nThank you for your registration to the tjSTAR event!  We appreciate your interest and support for our event.  Our committee members will be in touch with you to discuss further details regarding your participation.  Please feel free to contact us at tjstarguest@gmail.com for any question.\n\ntjSTAR Committee\nThomas Jefferson High School for Science and Technology\n6560 Braddock Road\nAlexandria, VA 22312\n(703) 750-8300";

//Automatic email. Die if email doesn't get there.

$email = $p_data[$f[5]];
if (mail($p_data[$f[5]], "TJSTAR Registration Confirmation", $email_txt) == false) {
	echo "An automatic confirmation email has failed to reach your registered email. Please check your email again.";
	die();
}



$today = date('F j');
$sql_qry = "INSERT INTO `srs`.`Speakers` (
`Name`, `ContactName`, `JobTitle`, `Organization`, 
`Address`, `Email`, `Phone`, `Field`, 
`Contact`, `PresentationType`, `Audience`, 
`Technology`, `TechnologyText`, 
`Title`, `Description`, 
`Date` , `UserName`, `Password`
)
VALUES (
'".$p_data[$f[0]]."', '".$p_data[$f[1]]."', '".$p_data[$f[2]]."', '".$p_data[$f[3]]."', 
'".$p_data[$f[4]]."', '".$p_data[$f[5]]."', '".$p_data[$f[6]]."', '".$p_data[$f[7]]."', 
'$contact', '$types_string', '$audience_string', 
'$technology', '$technology_text', 
'".$p_data[$f[8]]."', '".$p_data[$f[9]]."', 
'$today', '$user', '$pass'
);";


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

echo "<br>\n";
echo "User name: " . $user . "<br>\n";
echo "</p>\n";

?>

<?php include("footer.php"); ?>

