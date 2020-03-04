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


<h1>Teacher Registration</h1>


<form name = "register" method = "post" action = "teacher_register.php">
<p>
<table width="70%" style="margin-left:10px;">
<tr>
<td> Name:</td> <td><input type = "text" name = "Name" /></td></tr>
<tr>
<td>Contact Name (if applicable):</td> <td><input type = "text" name = "Filler" /></td> </tr>

<tr>
<td>Department:</td> <td><input type = "text" name = "Department" /></td> </tr>
<tr>
<td>Email:</td> <td><input type = "text" name = "Email" /></td> </tr>
</table>
</p>
<p>
I would like to participate in the following way(s): <br>

<input type="checkbox" name = "Type[]" value = "Panel" />
<a href="panel_def.php" rel="facebox">Panel participant</a>
<br>

<input type = "checkbox" name = "Type[]" value = "Individual" /> 
<a href= "speaker_def.php" rel="facebox">Individual speaker</a>
<br>

<input type = "checkbox" name = "Type[]" value = "Group" /> 
<a href= "speaker_def.php" rel="facebox">Speaker with team of specialists</a>
<br>

<input type = "checkbox" name = "Type[]" value = "Workshop" /> 
<a href= "workshop_def.php" rel="facebox">Workshop</a>
<br>

<input type = "checkbox" name = "Type[]" value = "Design" /> 
<a href= "designchallenge_def.php" rel="facebox">Design challenge</a>
<br>

<input type = "checkbox" name = "Type[]" value = "Display" /> 
<a href= "displaydemo_def.php" rel="facebox">
Displays/Demonstrations</a>
</p>
<!-- There is probably a way to align these, but doing it by hand for now seems fine. -->
<p>
Check all that apply: This presentation is targeted at students who have a proficient knowledge of... (If none apply, feel free to select none.)
<br>
<table>
<tr>
<td><input type = "checkbox" name = "Audience[]" value = "Physics" /> Physics</td> <td><input type = "checkbox" name = "Audience[]" value = "Chemistry" /> Chemistry</td>
</tr>
<tr>
<td><input type = "checkbox" name = "Audience[]" value = "Biology" /> Biology</td> <td><input type = "checkbox" name = "Audience[]" value = "Economics" /> Economics</td>
</tr>
<tr>
<td><input type = "checkbox" name = "Audience[]" value = "Mathematics" /> Mathematics</td><td> <input type = "checkbox" name = "Audience[]" value = "Problem Solving"/> Problem Solving</td>
</tr>
<tr>
<td><input type = "checkbox" name = "Audience[]" value = "Oceanography" /> Oceanography</td>
<td><input type = "checkbox" name = "Audience[]" value = "Astronomy" /> Astronomy</td>
</tr>
</table>
</P>


<h2>Technology Needs</h2>
<p>
The tjSTAR Committee will provide computer access, a projector and a screen as needed for your presentation.<br>
<input type = "radio" name = "Technology" value = "yes" /> Yes, I anticipate additional technology needs.  (Please describe in the box.) <br>
<textarea cols = "50" rows = "7" name = "TechnologyText" />
</textarea><br>
<input type = "radio" name = "Technology" value = "email" /> Yes, I anticipate additional technology needs. I will contact <a href="mailto:tjstartechnology@gmail.com">tjstartechnology@gmail.com</a> by April 30, 2010. <br>
<input type = "radio" name = "Technology" value = "no" /> No, thank you. I do not anticipate additional needs at this time. </p>


<h2>Presentation Description</h2>
<p>
Please provide a short (up to 100 words) description of your topic or presentation in the box below. A tjSTAR representative will respond promptly to your Symposium Registration to discuss individual needs and answer any questions you may have. <br>
Title of presentation: <input type = "text" name = "Title" /> <br>
Description: <br>
<textarea cols= "50" rows= "7" name= "Description" />
</textarea> <br>
</p>



<p>
You will be contacted shortly by a TJSTAR student representative to discuss the specifics of your presentation.  For any further questions or assistance, feel free to contact us at <a href="mailto:tjstarcommittee@gmail.com">tjstarcommittee@gmail.com</a>.<br><br>

Thank you for your interest!<br>
The TJSTAR Planning Committee
</p>

<p>

<input type = "submit" value = "Submit" />
</p>
</form>

<?php include("footer.php"); ?>

