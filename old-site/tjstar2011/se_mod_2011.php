<?php
include("reg/functions.php");

function success() {
	echo "Thank you for registering.  A TJSTAR student representative will contact you at a later time to discuss the specifics of your presentation.<br> ";
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




include("header_facebox.php");

if(!empty($errors)) {
	echo "The following errors occurred: <br /><ul>";
	foreach($errors as $error)
		echo "<li>$error</li>";
	echo "</ul>";
}




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
$lab_arr = $_POST["Lab"];

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
if ($lab_arr == NULL || is_array($lab_arr) == false ||
	count($lab_arr) != (int)$num_students) { $not_filled[] = "Lab"; }

if ($technology == NULL) { $not_filled[] = "Technology needs"; }
if ($title == NULL) { $not_filled[] = "Title"; }
if ($description == NULL) { $not_filled[] = "Description"; }

if (empty($not_filled) == false) {
	failure($not_filled);
}

$first_name = split_and_replace($first_name_arr);

$last_name = split_and_replace($last_name_arr);

$email = split_and_replace($email_arr);

$user_name = split_and_replace($user_name_arr);

$senior_tech = split_and_replace($lab_arr);

//Connect to the database and insert the data.

$dbserver = "mysql.tjhsst.edu";
$dbusername = "2010jlee";
$dbpassword = "BsKVsnWS9ZZqDAzA";
$dbname = "srs";
$dbc = mysqli_connect($dbserver, $dbusername, $dbpassword);
if (!$dbc) {
	echo "Fatal error. Please contact the TJSTAR staff.<br>";
	exit();
}
mysqli_select_db($dbc, $dbname);


$today = date('F j');
$type = 'SeniorTech';
$IBET = '';
$other = '';

$f = array(
	"LastName"=>$i++, "FirstName"=>$i++, "Title"=>$i++, "Description"=>$i++, "Room"=>$i++,
	"Lab"=>$i++, "IBET"=>$i++, "Other"=>$i++, "Email"=>$i++, "Technology"=>$i++, "TechnologyText"=>$i++,
	"Type"=>$i++, "Username"=>$i++, "Date"=>$i++
);

$sql_qry = "UPDATE `srs`.`Seniors` SET
`".$f[ 0]."`='$last_name',
`".$f[ 1]."`='$first_name',
`".$f[ 2]."`='$title',
`".$f[ 3]."`='$description',
`".$f[ 4]."`='',
`".$f[ 5]."`='$senior_tech',
`".$f[ 6]."`='$IBET',
`".$f[ 7]."`='$other',
`".$f[ 8]."`='$email',
`".$f[ 9]."`='$technology',
`".$f[10]."`='$technology_text',
`".$f[11]."`='$type',
`".$f[12]."`='$user_name',
`".$f[13]."`='$today'
WHERE `Seniors`.`Username` LIKE %".$_SESSION['user']."%
LIMIT 1
";

/*$sql_qry = "INSERT INTO `srs`.`Seniors` (`FirstName`, `LastName`, `Title`, `Description`, `Room`, `Lab`, `IBET`,
`Other`, `Email`, `Technology`, `TechnologyText`, `Type`, `Username`, `Date`)
VALUES ('$first_name', '$last_name', '$title', '$description', '', '$senior_tech', '$IBET', 
'$other', '$email', '$technology', '$technology_text', '$type', '$user_name', '$today')";*/

if (!mysqli_query($dbc, $sql_qry)) {
	echo "Fatal error. Please contact the TJSTAR staff.<br><br>";
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
echo "</p>\n";

?>

<?php include("footer.php"); ?>

