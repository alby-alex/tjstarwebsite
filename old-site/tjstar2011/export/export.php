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

//$struct = mysqli_query($dbc, "DESCRIBE $table");
//print_r($struct['Field']);
//exit();

	$out = "";
	while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
		$extra_rows = array();
		$flag = false;
		for ($i = 0; $i < count($row); $i++) {
			$split = explode("\t", 
						str_replace('"' ,"'" , str_replace("\n", "", 
						trim($row[$i])))
					);
			$extra_rows[$i] = $split;
			if (count($split) > 1) {
				$flag = true;
			}
			$tmp =  $out . '"' . $split[0] . '",';
			$out = $tmp;
		}
		$out = substr($out, 0, -1) . "\n";

		if ($flag == true) {
			for ($i = 1; $i < count($extra_rows); $i++) {
				$tmp = "";
				for ($j = 0; $j < count($row); $j++) {
					if (count($extra_rows[$i]) <= 1)
						$tmp = $tmp . ",";
					else
						$tmp = $tmp . '"' . $extra_rows[$j][$i] . '",';
				}
				if (strlen(
					str_replace(",", "", str_replace('"', "", $tmp))
				) > 1)
					$out = $out . substr($tmp, 0, -1) . "\n";
			}
		}
		
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
	$allowed_tables = array('Seniors', 'Teacher', 'Student', 'Speaker', 'IBET');
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
	if ($table == "IBET") {
		export_csv("IBET", "IBET.csv");
	}
}

?>

<?php include("../header.php"); ?>

<p>
Click which table you wish to export:

<form name = "exp" method = "post" action = "export.php">

<input type = "radio" name = "Table" value = "Seniors" /> Seniors <br />
<input type = "radio" name = "Table" value = "Student" /> Student <br />
<input type = "radio" name = "Table" value = "Teacher" /> Teacher <br />
<input type = "radio" name = "Table" value = "Speaker" /> Speaker <br />
<input type = "radio" name = "Table" value = "IBET" /> IBET <br />

<input type = "submit" value = "Submit" />
</form>

</p>

<?php include("../footer.php"); ?>

