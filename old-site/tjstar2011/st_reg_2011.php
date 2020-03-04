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

include("header_facebox.php"); 
echo "We are not accepting registrations at this time. Thank you for your interest.\n";
die();


$login_name = "st_login_2011.php";

if($_COOKIE['TJSTAR'] == NULL) //The user has not logged in
	redirect("$login_name");

session_name('TJSTAR');
session_start();

if(md5($_SERVER['HTTP_USER_AGENT']) != $_SESSION['agent']) {
	session_destroy();
	setcookie("TJSTAR", time()-3600);
	redirect("$login_name");
}

if((time() - $_SESSION['last_activity_time']) > 1800) {
	session_destroy();
	setcookie("TJSTAR", time()-3600);
	redirect("$login_name");
}

$_SESSION['last_activity_time'] = time();

$allowed_nums = array("1", "2", "3", "4", "5", "6", "7", "8");
$num_students = $_GET['num'];
if ($num_students == NULL) {
	include("header_facebox.php");
	echo "<p>Number of Presenters<br>\n";
	echo "<form name=\"nums\" method=\"get\" action=\"st_reg_2011.php\">\n";
	foreach ($allowed_nums as $tmp)
		echo "<input type=\"radio\" name=\"num\" value=\"$tmp\">$tmp<br>\n";
	echo "<input type = \"submit\" value = \"Submit\" />\n";
	echo "</form></p>\n";
	include("footer.php");
	exit();
}
if (in_array($num_students, $allowed_nums) == false) {
	echo "Fatal error. Please contact the TJSTAR staff.\n";
	exit();
}

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


<h1>Student Registration</h1>

<?php
$str = "<form name=\"register\" method=\"post\" action=\"st_ins_2011.php?num=" . $_GET['num'] . "\">\n";
echo $str;
echo "<p>\n";
for ($i = 1; $i <= (int)$_GET['num']; $i++) {
	echo "<table width=\"70%\" style=\"margin-left:10px;\">\n";
	echo "Student $i:\n";
	echo "<tr><td>Last Name:</td> <td><input type = \"text\" name = \"LastName[]\" /></td></tr>\n";
	echo "<tr><td>First Name:</td> <td><input type = \"text\" name = \"FirstName[]\" /></td></tr>\n";
	echo "<tr><td>Email:</td> <td><input type = \"text\" name = \"Email[]\" /></td> </tr>\n";
	echo "<tr><td>TJ user name:</td> <td><input type = \"text\" name = \"UserName[]\" /></td> </tr>\n";
	echo "</table>\n";
	echo "<br>\n";
}
?>
</p>


<h2>Presentation Description</h2>
<p>
Please provide a short (up to 100 words) description of your topic or presentation in the box below. A tjSTAR representative will respond promptly to your Symposium Registration to discuss individual needs and answer any questions you may have. <br>
<br>
Title of presentation: <input type = "text" name = "Title" /> <br>
Description: <br>
<textarea cols= "50" rows= "7" name= "Description" /></textarea> <br>
<br>
Type of presentation (e.g. CHUM, science fair, etc.): <input type = "text" name = "Type" />
<br>
<br>
</p>

<h2>Technology Needs</h2>
<p>
The tjSTAR Committee will provide computer access, a projector and a screen as needed for your presentation.<br>
<input type = "radio" name = "Technology" value = "yes" /> Yes, I anticipate additional technology needs.  (Please describe in the box.) <br>
<textarea cols = "50" rows = "7" name = "TechnologyText" />
</textarea><br>
<input type = "radio" name = "Technology" value = "email" /> Yes, I anticipate additional technology needs. I will contact <a href="mailto:tjstartechnology@gmail.com">tjstartechnology@gmail.com</a> by April 30, 2010. <br>
<input type = "radio" name = "Technology" value = "no" /> No, thank you. I do not anticipate additional needs at this time. </p>


<br>
<p>
  For any further questions or assistance, feel free to contact us at <a href="mailto:tjstarcommittee@gmail.com">tjstarcommittee@gmail.com</a>.</p>


<p>
<input type = "submit" value = "Submit" />
</p>
</form>

<?php include("footer.php"); ?>

