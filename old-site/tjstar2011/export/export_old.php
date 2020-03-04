<?php

include("../reg/functions.php");

if($_COOKIE['EXPORT'] == NULL) //The user has not logged in
	redirect("auth.php");

session_name('EXPORT');
session_start();

if(md5($_SERVER['HTTP_USER_AGENT']) != $_SESSION['agent']) {
	session_destroy();
	setcookie("EXPORT", time()-3600);
	redirect("auth.php");
}

if((time() - $_SESSION['last_activity_time']) > 1800) {
	session_destroy();
	setcookie("EXPORT", time()-3600);
	redirect("auth.php");
}

$_SESSION['last_activity_time'] = time();

$user_name = $_SESSION['user'];


function export_csv($table, $filename) {
	// Connect database
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

	if ($table == 'Speakers') {
		$result = mysqli_query($dbc, "SELECT `Name`,`ContactName`,`JobTitle`,`Organization`,`Address`,`Email`,`Phone`,`Field`,`Contact`,`PresentationType`,`Audience`,`Technology`,`TechnologyText`,`Title`,`Description`,`Date` FROM $table");
	}
	else {
		$result = mysqli_query($dbc, "SELECT * FROM $table");
	}
	$num_rows = mysqli_num_rows($result);
	
	$out = "";
	while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
		$extra_rows = array();
		$split = explode("\t", $row[0]);
		$tmp = $out . '"' . $split[0] . '"' . ",";
		$out = $tmp;
		for ($i = 1; $i < count($row)-1; $i++) {
			$split = explode("\t", $row[$i]);
			$tmp =  $out . '"' . $split[0] . '"' . ",";
			$out = $tmp;
		}
		$tmp = $out . '"' . $row[count($row)-1] . '"' . "\n";
		$out = $tmp;
	}
	header("Pragma: public");
	header("Expires: 0");
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	header("Content-Length: " . strlen($out));
	header("Content-type: application/csv");
	header("Content-Disposition: attachment; filename=$filename");
	header("Content-Transfer-Encoding: binary");
	echo $out;
	exit();
}


if ($_POST['Table'] != NULL) {
	$allowed_tables = array('Seniors', 'Teacher', 'Student', 'Speaker');
	$table = $_POST['Table'];
	if (in_array($table, $allowed_tables) == false) {
		echo "Fatal error. Please report this error.<br>\n";
		die();
	}
	if ($table == "Seniors") {
		export_csv("Seniors", "Seniors.csv");
	}
	if ($table == "Student") {
		export_csv("Students", "Students.csv");
	}
	if ($table == "Teacher") {
		export_csv("Teachers", "Teachers.csv");
	}
	if ($table == "Speaker") {
		export_csv("Speakers", "Speakers.csv");
	}
}

?>

<?php include("header_facebox.php"); ?>

<p>
Click which table you wish to export:

<form name = "exp" method = "post" action = "export.php">

<input type = "radio" name = "Table" value = "Seniors" /> Seniors <br />
<input type = "radio" name = "Table" value = "Student" /> Student <br />
<input type = "radio" name = "Table" value = "Teacher" /> Teacher <br />
<input type = "radio" name = "Table" value = "Speaker" /> Speaker <br />

<input type = "submit" value = "Submit" />
</form>

</p>

<?php include("footer.php"); ?>

