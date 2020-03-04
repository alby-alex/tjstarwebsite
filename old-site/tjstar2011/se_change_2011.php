<?php 
include("reg/functions.php");

$login_name = "se_login_2011.php";
$cur_name = "se_change_2011.php";

if($_COOKIE['TJSTAR'] == NULL) //The user has not logged in
	redirect("$login_name");

session_name('TJSTAR');
session_start();

if(md5($_SERVER['HTTP_USER_AGENT']) != $_SESSION['agent'] || 
	(time() - $_SESSION['last_activity_time']) > 1800 ||
	$_SESSION['user'] == null) {
	session_destroy();
	setcookie("TJSTAR", time()-3600);
	redirect("$login_name");
}

$_SESSION['last_activity_time'] = time();


//extract user information
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

$data = mysqli_fetch_row(
	mysqli_query($dbc, "SELECT * FROM `srs`.`Seniors` 
						WHERE UserName LIKE '%".$_SESSION['user']."\t%'
						LIMIT 0,1")
);

if (count($data) == 0) {
	echo "Have you registered? If you have, please contact the TJSTAR staff with your TJ username and the information you registered with.\n";
	echo "<br>\n";
	echo "If you have not registered, please go to <a href=\"https://academics.tjhsst.edu/srs/se_reg_2011.php\">here to register</a>.\n";
	exit();
}

$i = 0;
$f = array(
	"LastName"=>$i++, "FirstName"=>$i++, "Title"=>$i++, "Description"=>$i++, "Room"=>$i++,
	"Lab"=>$i++, "IBET"=>$i++, "Other"=>$i++, "Email"=>$i++, "Technology"=>$i++, "TechnologyText"=>$i++,
	"Type"=>$i++, "Date"=>$i++, "Username"=>$i++  
);


$num_students = substr_count(trim($data[$f["Username"]]), "\t")+1;

$last_name = explode("\t", trim($data[$f["LastName"]]));
$firs_name = explode("\t", trim($data[$f["FirstName"]]));
$email = explode("\t", trim($data[$f["Email"]]));
$user_name = explode("\t", trim($data[$f["Username"]]));
$lab = explode("\t", trim($data[$f["Lab"]]));


if ($data[$f["Technology"]] == "yes")
	$tech = array("checked", "", "");
else if ($data[$f["Technology"]] == "email")
	$tech = array("", "checked", "");
else
	$tech = array("", "", "checked");


$all_labs = array(
	"Astronomy"=>"Astronomy and Astrophysics", "Robotics"=>"Automation and Robotics",
	"Biotech"=>"Biotechnology and Life Sciences", "Chemical Analysis"=>"Chemical Analysis",
	"Communication Systems"=>"Communication Systems", "CAD"=>"Computer Aided Design",
	"Computer Systems"=>"Computer Systems", "Energy Systems"=>"Energy Systems",
	"Microelectronics"=>"Microelectronics", "Neuroscience"=>"Neuroscience",
	"Oceanography"=>"Oceanography and Geophysical Systems", "Physics"=>"Optics and Modern Physics",
	"Prototyping"=>"Prototyping and Engineering Materials"
);

?>

<?php include("header_facebox.php"); ?>

<h1>Student Registration</h1>

<?php
$str = "<form name=\"register\" method=\"post\" action=\"se_mod_2011.php?num=" . $num_students . "\">\n";
echo $str;
echo "<p>\n";
for ($i = 1; $i <= $num_students; $i++) {
	echo "<table width=\"70%\" style=\"margin-left:10px;\">\n";
	echo "Student $i:\n";
	echo "<tr><td>Last Name:</td> <td><input type = \"text\" name = \"LastName[]\" value = " . $last_name[$i-1] . " /></td></tr>\n";
	echo "<tr><td>First Name:</td> <td><input type = \"text\" name = \"FirstName[]\" value = \"" . $firs_name[$i-1] . "\" /></td></tr>\n";
	echo "<tr><td>Email:</td> <td><input type = \"text\" name = \"Email[]\" value = \"" . $email[$i-1] . "\" /></td> </tr>\n";
	echo "<tr><td>TJ user name:</td> <td><input type = \"text\" name = \"UserName[]\" value = \"" . $user_name[$i-1] . "\" /></td> </tr>\n";
	echo "<tr>\n";
	echo "<td>Senior Tech Lab:</td>";
	echo "<td><select name = \"Lab[]\">\n";
	foreach ($all_labs as $k => $v) {
		$prefix = "";
		if ($k == $lab[$i-1])
			$prefix = "<option selected";
		else
			$prefix = "<option";
		echo $prefix . " value = " . $k . ">" . $v . "</option>\n";
	}
	echo "</select>\n";
	echo "</td></table>\n";
	echo "<br>\n";
}
?>
</p>

<h2>Presentation Description</h2>
<p>
Please provide a short (up to 100 words) description of your topic or presentation in the box below. A tjSTAR representative will respond promptly to your Symposium Registration to discuss individual needs and answer any questions you may have. <br>
<br>
Title of presentation: <input type = "text" name = "Title" value = "<?php echo $data[$f["Title"]];?>"/> <br>
Description: <br>
<textarea cols= "50" rows= "7" name= "Description" />
<?php echo $data[$f["Description"]];?>
</textarea> <br>
<br>
Type of presentation (e.g. CHUM, science fair, etc.): <input type = "text" name = "Type" />
<br>
<br>
</p>

<h2>Technology Needs</h2>
<p>
The tjSTAR Committee will provide computer access, a projector and a screen as needed for your presentation.<br>
<input type = "radio" name = "Technology" value = "yes" <?php echo $tech[0];?> /> Yes, I anticipate additional technology needs.  (Please describe in the box.) <br>
<textarea cols = "50" rows = "7" name = "TechnologyText" />
<?php echo $data[$f["TechnologyText"]];?>
</textarea><br>
<input type = "radio" name = "Technology" value = "email" <?php echo $tech[1];?> /> Yes, I anticipate additional technology needs. I will contact <a href="mailto:tjstartechnology@gmail.com">tjstartechnology@gmail.com</a> by April 30, 2010. <br>
<input type = "radio" name = "Technology" value = "no" <?php echo $tech[2];?> /> No, thank you. I do not anticipate additional needs at this time. </p>


<br>
<p>
  For any further questions or assistance, feel free to contact us at <a href="mailto:tjstarcommittee@gmail.com">tjstarcommittee@gmail.com</a>.</p>


<p>
<input type = "submit" value = "Submit" />
</p>
</form>

<?php include("footer.php"); ?>

