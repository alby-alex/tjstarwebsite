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

        function escape_data($mysqli_connection, $data) {

		//Address Magic Quotes
		if(ini_get('magic_quotes_qpc'))
			$data = stripslashes($data);
		
		$data = mysqli_real_escape_string($mysqli_connection, $data);
		return $data;

	} //End of function escape_data()

	function init_session() {

		session_name('TJSTAR');
		session_start();
		$_SESSION['agent'] = md5($_SERVER['HTTP_USER_AGENT']);
		$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
		$_SESSION['last_activity_time'] = time();

	} //End of function init_session()

	$dbserver = "mysql.tjhsst.edu";
	$dbusername = "2010jlee";
	$dbpassword = "BsKVsnWS9ZZqDAzA";
	$dbname = "srs";
	$dbc = mysqli_connect ($dbserver, $dbusername, $dbpassword);
	mysqli_select_db($dbc, $dbname);

	if(isset($_POST['submit'])) {

		$errors = array();

		if(isset($_POST['username']))
			$username = escape_data($dbc, htmlspecialchars($_POST['username']));
		else
			$errors[] = "You forgot to enter your username";

		if(isset($_POST['password']))
			$password = escape_data($dbc, htmlspecialchars($_POST['password']));
		else
			$errors[] = "You forgot to enter your password";

		if(empty($errors)) {

			$realm = "LOCAL.TJHSST.EDU";
			$cache = tempnam('/tmp', 'tjstar-krb5-');
			$descriptors = array(0 => array('pipe', 'r'), 1 => array('pipe', 'w'), 2 => array('pipe', 'w'));
			$env = array('KRB5CCNAME' => $cache);
			$process = proc_open("/usr/bin/kinit $username@LOCAL.TJHSST.EDU", $descriptors, $pipes, NULL, $env);
			if(is_resource($process)) {

			       fwrite($pipes[0], "$password\n");
			       fclose($pipes[0]);
			       $output = fread($pipes[1], 1024);
		               fclose($pipes[1]);
			       $output2 = fread($pipes[2], 1024);
		               fclose($pipes[2]);
			       $status = proc_close($process);

			       if($status == 0) {

				       exec('kdestroy -c '.$cache);
				       init_session();
				 	redirect("schedule.php");

			       }
			       else {
					$errors[] = "Your username and password did not match";
				}
				              
			}
			else {

				$errors[] = "Internal system error, please try again";

			}

		}

	
	}

	if($_COOKIE['TJSTAR'] != NULL) { //The user has logged in
					                
	    	session_name('TJSTAR');
		session_start();

		if(md5($_SERVER['HTTP_USER_AGENT']) != $_SESSION['agent']) { //The session is compromised, terminate
			session_destroy();
			setcookie("TJSTAR", time()-3600);
                   	redirect("schedule.php?compromised=1");

	        } //End of it(md5($_SERVER['HTTP_USER_AGENT']) != $_SESSION['agent'])

	        if((time() - $_SESSION['last_activity_time']) > 1800) { //The user has been inactive for over 1 hour, log out user.

			session_destroy();
			setcookie("TJSTAR", time()-3600);
	                redirect("schedule.php?timeout=1");

	        } //End of it((time() - $_SESSION['login_time']) > 3600)

        	$_SESSION['last_activity_time'] = time();

	} //End of if($_COOKIE['TJSTAR'] != NULL)


?>


<?php $page='schedule'; include("header.php"); ?>




<?php 

if(!empty($errors)) {

	echo "The following errors occurred: <br /><ul>";
	foreach($errors as $error)
		echo "<li>$error</li>";

	echo "</ul>";

}
	
if(isset($_SESSION['agent'])) {

	echo "<h1 class=\"title\">Search</h1>";

	echo "Search through presentations by presenter name, title, descriptions, and room number.  (Trailers are noted as T#)<br />
		<form name=\"search\" method=\"post\" action=\"results.php\">
		Seach for: <input type=\"text\" name=\"find\" /> in 

		<Select NAME=\"field\">
			<Option VALUE=\"Presenters\">Presenters</option>
			<Option VALUE=\"Title\">Title</option>
			<Option VALUE=\"Description\">Description</option>
			<Option VALUE=\"Room\">Room #</option>
		</Select>
		<input type=\"hidden\" name=\"searching\" value=\"yes\" />
		<input type=\"submit\" name=\"search\" value=\"Search\" />
		</form><br />";
} //End of if(isset($_SESSION['agent']))

else {

	echo "<b>This search is only for IBET and Senior Research Projects. Other presentations and workshops can be found under Presentation tab.</b>";
	echo "<form method=\"post\" action=\"schedule.php\">";
	echo "<table><tr><td>Username:</td><td><input type=\"text\" name=\"username\" size=\"15\" maxlength=\"15\" /></td></tr>";
	echo "<tr><td>Password:</td><td><input type=\"password\" name=\"password\" size=\"15\" maxlength\"50\" /></td></tr></table>";
	echo "<input type=\"submit\" name=\"submit\" value=\"Login\" />";
	echo "</form><br />";
} //End of else
?>
<h1 class="title">Anonymous Search</h1>
Search through presentations by title, descriptions, and room number.  (Trailers are noted as T#)  Presenter names will not be displayed. This search is only for IBET and senior research projects.<br />

<form name="anonsearch" method="post" action="results_anon.php">
Seach for: <input type="text" name="find" /> in 

<Select NAME="field">
<Option VALUE="Title">Title</option>
<Option VALUE="Description">Description</option>
<Option VALUE="Room">Room #</option>
</Select>
<input type="hidden" name="searching" value="yes" />
<input type="submit" name="anonsearch" value="Search" />
</form>
<br/>
<h1 class="title">Schedule</h1>
View the Overview Schedule <a href="TJ%20STAR%20Overview%20Schedule.pdf" alt="">here</a>.<br />
<br />
<b>HOW TO SIGN UP:</b> Use this information to sign up for the appropriate 8th period block(s). <b>Find out the sessions (B-E) and the room numbers</b> in order to sign up through the 8th period activity sign up.  The title and the name of the presenters will not show on the 8th period sign up. The sign up period is from May 18 to May 22, so take prompt action.
<br />
<br/>
<span style="color: rgb(255, 0, 0);">SIGN UP ON LINE FOR
EACH SESSION ON MAY 28, AS YOU WOULD FOR 8TH PERIOD ACTIVITIES</span><br
 style="color: rgb(255, 0, 0);">
<br style="color: rgb(255, 0, 0);">
<span style="color: rgb(255, 0, 0);">You may begin si:gning
up on Monday, May 18.</span><br style="color: rgb(255, 0, 0);">
<br style="color: rgb(255, 0, 0);">
<span
 style="font-weight: bold; text-decoration: underline; color: rgb(255, 0, 0);">Sign
up early!&nbsp; Space in each activity is limited.</span><br
 style="color: rgb(255, 0, 0);">
<ul>
  <li><span style="color: rgb(255, 0, 0);">During A
block, students will go to TA.</span></li>
  <li><span style="color: rgb(255, 0, 0);">During B
block, students should sign up for their FIRST ACTIVITY.</span></li>
  <li><span style="color: rgb(255, 0, 0);">During C
block, students should sign up for their SECOND ACTIVITY.</span></li>
  <li><span style="color: rgb(255, 0, 0);">During D
block, students should sign up for their THIRD ACTIVITY.</span></li>
  <li><span style="color: rgb(255, 0, 0);">During E
block, students should sign up for their FOURTH ACTIVITY.</span></li>
  <li><span style="color: rgb(255, 0, 0);">During F
block, students will return to TA at the end of the day.</span></li>
  <li><span style="color: rgb(255, 0, 0);">Students
who are presenting should check to make sure that they are signed up
for the correct session.</span></li>
</ul>








<?php include("footer.php"); ?>
