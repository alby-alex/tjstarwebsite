<?php include("header_facebox.php"); ?>

<?php 
if(!empty($errors)) {
	echo "The following errors occurred: <br /><ul>";
	foreach($errors as $error)
		echo "<li>$error</li>";
	echo "</ul>";
}
?>

We are not accepting registrations at this time. Thank you for your interest.

<!--
<h1>Registration Form</h1>
<p>If you have already filled out this form and have a user name, please <a href = "extern_change.php">go here</a> to modify your information.</p>
<form name = "register" method = "post" action = "r2_test.php">
<p>
<table width="70%" style="margin-left:10px;">
<tr>
<td>Presenter's name:</td> <td><input type = "text" name = "Data[]" id = "Name" /></td></tr>
<tr>
<td>Contact person (if different from the presenter):</td> <td><input type = "text" name = "Data[]" id = "Contact Person" /></td> </tr>
<tr>
<td>Job title:</td> <td><input type = "text" name = "Data[]" id = "Job Title" /></td></tr>
<tr>
<td>Organization:</td> <td><input type = "text" name = "Data[]" id = "Organization" /></td></tr>
<tr>
<td>Mailing address:</td> <td><input type = "text" name = "Data[]" id = "Address" /></td></tr>
<tr>
<td>Email:</td> <td><input type = "text" name = "Data[]" id = "Email" /></td> </tr>
<tr>
<td>Phone number:</td> <td><input type = "text" name = "Data[]" id = "Phone" /></td> </tr>
<tr>
<td>Field or specialty:</td> <td><input type = "text" name = "Data[]" id = "Field" /></td> </tr>
<tr>
<td>Preferred method of Contact: </td>
<td><input type = "radio" name = "Contact" value = "email" /> Email<br />
<input type = "radio" name = "Contact" value = "phone" /> Phone</td>
</tr>
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
<p>
Check all that apply: This presentation is targeted at students who have a proficient knowledge of... (If none apply, feel free to select none.)
<br>
<input type = "checkbox" name = "Audience[]" value = "Physics" /> Physics <br>
<input type = "checkbox" name = "Audience[]" value = "Chemistry" /> Chemistry <br>
<input type = "checkbox" name = "Audience[]" value = "Biology" /> Biology <br>
<input type = "checkbox" name = "Audience[]" value = "Economics" /> Economics <br>
<input type = "checkbox" name = "Audience[]" value = "Mathematics" /> Mathematics <br>
<input type = "checkbox" name = "Audience[]" value = "Problem Solving"/> Problem Solving <br>
<input type = "checkbox" name = "Audience[]" value = "Oceanography" /> Oceanography <br>
<input type = "checkbox" name = "Audience[]" value = "Astronomy" /> Astronomy <br>
</p>
<br>
<h2>Technology Needs</h2>
<p>
The tjSTAR Committee will provide computer access, a projector and a screen as needed for your presentation.<br><br>
<input type = "radio" name = "Technology" value = "yes" /> Yes, I anticipate additional technology needs.  (Please describe in the box.) <br>
<textarea cols = "50" rows = "7" name = "TechnologyText" />
</textarea><br>
<input type = "radio" name = "Technology" value = "email" /> Yes, I anticipate additional technology needs. I will contact <a href="mailto:tjstarcommittee@gmail.com">tjstarcommittee@gmail.com</a> by March 1, 2011. <br>
<input type = "radio" name = "Technology" value = "no" /> No, thank you. I do not anticipate additional needs at this time. </p>
<br>

<h2>Presentation Description</h2>
<p>
Please provide a short (up to 100 words) description of your topic or presentation in the box below. A tjSTAR representative will respond promptly to your Symposium Registration to discuss individual needs and answer any questions you may have. <br><br>
Title of presentation: <input type = "text" name = "Data[]" id = "Title" /> <br>
Description: <br>
<textarea cols= "50" rows= "7" name= "Data[]" id = "Description" />
</textarea> <br>
</p>

<br>
<h2>User Information</h2>
<p>
Please set up the user name and password in order to allow you to modify the submitted information later.
<table width="70%" style="margin-left:10px;">
<tr>
<td>User name:</td> <td><input type = "text" name = "Data[]" id = "User Name" /></td></tr>
<tr>
<td>Password:</td> <td><input type = "password" name = "Data[]" id = "Password" /></td> </tr>
</table>
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


-->
<?php include("footer.php"); ?>

