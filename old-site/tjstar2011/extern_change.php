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

?>

<?php include("header_facebox.php"); ?>

<?php 
if(!empty($errors)) {
	echo "The following errors occurred: <br /><ul>";
	foreach($errors as $error)
		echo "<li>$error</li>";
	echo "</ul>";
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

$p_data = mysqli_fetch_row(
	mysqli_query($dbc, "SELECT * FROM `srs`.`Speakers` WHERE UserName = '".$_SESSION['user']."'")
);
$f = array(
	"Name"=>0, "ContactName"=>1, "JobTitle"=>2, "Organization"=>3, "Address"=>4, "Email"=>5, 
	"Phone"=>6, "Field"=>7, "Contact"=>8, "PresentationType"=>9, "Audience"=>10, 
	"Technology"=>11, "TechnologyText"=>12, "Title"=>13, "Description"=>14
);

if ($p_data[$f["Contact"]] == "email")
	$contact = array("checked", "");
else
	$contact = array("", "checked");

$type_arr = split("  ", $p_data[$f["PresentationType"]]);
foreach($type_arr as $tmp)
	$type[$tmp] = "checked";

$aud_arr = split("  ", $p_data[$f["Audience"]]);
foreach($aud_arr as $tmp)
	$aud[$tmp] = "checked";

if ($p_data[$f["Technology"]] == "yes")
	$tech = array("checked", "", "");
else if ($p_data[$f["Technology"]] == "email")
	$tech = array("", "checked", "");
else
	$tech = array("", "", "checked");
?>


<h1>Modificaiton of Data</h1>

<form name = "register" method = "post" action = "extern_modify.php">
<p>
<table width="70%" style="margin-left:10px;">
<tr>
<td>Presenter's name:</td> <td><input type = "text" name = "Data[]" id = "Name" value = "<?php echo $p_data[$f["Name"]];?>"/></td></tr>
<tr>
<td>Contact person (if different from the presenter):</td> <td><input type = "text" name = "Data[]" id = "Contact Person" value = "<?php echo $p_data[$f["ContactName"]];?>"/></td> </tr>
<tr>
<td>Job title:</td> <td><input type = "text" name = "Data[]" id = "Job Title" value = "<?php echo $p_data[$f["JobTitle"]];?>"/></td></tr>
<tr>
<td>Organization:</td> <td><input type = "text" name = "Data[]" id = "Organization" value = "<?php echo $p_data[$f["Organization"]];?>"/></td></tr>
<tr>
<td>Mailing address:</td> <td><input type = "text" name = "Data[]" id = "Address" value = "<?php echo $p_data[$f[Address]];?>"/></td></tr>
<tr>
<td>Email:</td> <td><input type = "text" name = "Data[]" id = "Email" value = "<?php echo $p_data[$f["Email"]];?>"/></td> </tr>
<tr>
<td>Phone number:</td> <td><input type = "text" name = "Data[]" id = "Phone" value = "<?php echo $p_data[$f["Phone"]];?>"/></td> </tr>
<tr>
<td>Field or specialty:</td> <td><input type = "text" name = "Data[]" id = "Field" value = "<?php echo $p_data[$f["Field"]];?>"/></td> </tr>
<tr>
<td>Preferred method of Contact: </td>
<td><input type = "radio" name = "Contact" value = "email" <?php echo $contact[0];?>/> Email<br>
<input type = "radio" name = "Contact" value = "phone" /<?php echo $contact[1];?>> Phone</td>
</tr>
</table>
</p>
<p>

I would like to participate in the following way(s): <br>

<input type="checkbox" name = "Type[]" value = "Panel" <?php echo $type["Panel"];?>/>
<a href="panel_def.php" rel="facebox">Panel participant</a>
<br>

<input type = "checkbox" name = "Type[]" value = "Individual" <?php echo $type["Individual"];?>/> 
<a href= "speaker_def.php" rel="facebox">Individual speaker</a>
<br>

<input type = "checkbox" name = "Type[]" value = "Group" <?php echo $type["Group"];?>/> 
<a href= "speaker_def.php" rel="facebox">Speaker with team of specialists</a>
<br>

<input type = "checkbox" name = "Type[]" value = "Workshop" <?php echo $type["Workshop"];?>/> 
<a href= "workshop_def.php" rel="facebox">Workshop</a>
<br>

<input type = "checkbox" name = "Type[]" value = "Design" <?php echo $type["Design"];?>/> 
<a href= "designchallenge_def.php" rel="facebox">Design challenge</a>
<br>

<input type = "checkbox" name = "Type[]" value = "Display" <?php echo $type["Display"];?>/> 
<a href= "displaydemo_def.php" rel="facebox">
Displays/Demonstrations</a>
</p>
<p>
Check all that apply: This presentation is targeted at students who have a proficient knowledge of... (If none apply, feel free to select none.)
<br>
<input type = "checkbox" name = "Audience[]" value = "Physics" <?php echo $aud["Physics"];?>/> Physics <br>
<input type = "checkbox" name = "Audience[]" value = "Chemistry" <?php echo $aud["Chemistry"];?>/> Chemistry <br>
<input type = "checkbox" name = "Audience[]" value = "Biology" <?php echo $aud["Biology"];?>/> Biology <br>
<input type = "checkbox" name = "Audience[]" value = "Economics" <?php echo $aud["Economics"];?>/> Economics <br>
<input type = "checkbox" name = "Audience[]" value = "Mathematics" <?php echo $aud["Mathematics"];?>/> Mathematics <br>
<input type = "checkbox" name = "Audience[]" value = "Problem Solving" <?php echo $aud["Problem Solving"];?>/> Problem Solving <br>
<input type = "checkbox" name = "Audience[]" value = "Oceanography" <?php echo $aud["Oceanography"];?>/> Oceanography <br>
<input type = "checkbox" name = "Audience[]" value = "Astronomy" <?php echo $aud["Astronomy"];?>/> Astronomy <br>
</p>
<br>
<h2>Technology Needs</h2>
<p>
The tjSTAR Committee will provide computer access, a projector and a screen as needed for your presentation.<br><br>
<input type = "radio" name = "Technology" value = "yes" <?php echo $tech[0];?>/> Yes, I anticipate additional technology needs.  (Please describe in the box.) <br>
<textarea cols = "50" rows = "7" name = "TechnologyText" />
<?php echo $p_data[$f["TechnologyText"]];?>
</textarea><br>
<input type = "radio" name = "Technology" value = "email" <?php echo $tech[1];?>/> Yes, I anticipate additional technology needs. I will contact <a href="mailto:tjstarcommittee@gmail.com">tjstarcommittee@gmail.com</a> by March 1, 2011. <br>
<input type = "radio" name = "Technology" value = "no" <?php echo $tech[2];?>/> No, thank you. I do not anticipate additional needs at this time. </p>
<br>

<h2>Presentation Description</h2>
<p>
Please provide a short (up to 100 words) description of your topic or presentation in the box below. A tjSTAR representative will respond promptly to your Symposium Registration to discuss individual needs and answer any questions you may have. <br><br>
Title of presentation: <input type = "text" name = "Data[]" id = "Title" value = "<?php echo $p_data[$f["Title"]];?>"/> <br>
Description: <br>
<textarea cols= "50" rows= "7" name= "Data[]" id = "Description"  />
<?php echo $p_data[$f["Description"]];?>
</textarea> <br>
</p>

<br>
<p>
You will be contacted shortly by a TJSTAR student representative to discuss the specifics of your presentation.<br><br>

Thank you for your interest!<br>
The TJSTAR Planning Committee
</p>
<br>
<p>

<input type = "submit" value = "Submit" />
</p>
</form>


<?php include("footer.php"); ?>

