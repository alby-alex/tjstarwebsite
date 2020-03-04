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
			/*$process = proc_open("/usr/bin/kinit $username@LOCAL.TJHSST.EDU", $descriptors, $pipes, NULL, $env);
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
				 	redirect("presentation.php");

			       }
			       else {
					$errors[] = "Your username and password did not match";
				}
				              
			}
			else {
*/
				$errors[] = "Internal system error, please try again";

//			}

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
	                redirect("presentation.php?timeout=1");

	        } //End of it((time() - $_SESSION['login_time']) > 3600)

        	$_SESSION['last_activity_time'] = time();

	} //End of if($_COOKIE['TJSTAR'] != NULL)


?>

<?php include("header.php"); ?>
<h1>Presentations: tjSTAR 2010</h1>
<p>tjSTAR 2010 was a great success. See the presenters and topics showcased at the 2010 event.</p>
<h2>Guest Presentations</h2>
<ul>
<li><a href="speakers_anon.php">Speakers and Topics</a>
</ul>
<h2>Student Presentations</h2>
<ul>
<li><a href="ibet_anon.php">Freshman Presentations</a>
<li>Senior Tech Lab Projects
<ul>
<li><a href="seniortech_anon.php?lab=Astronomy">Astronomy and Astrophysics</a>
<li><a href="seniortech_anon.php?lab=Robotics">Automation and Robotics</a>
<li><a href="seniortech_anon.php?lab=Biotech">Biotechnology and Life Sciences</a>
<li><a href="seniortech_anon.php?lab=Chemical Analysis">Chemical Analysis</a>
<li><a href="seniortech_anon.php?lab=CAD">Computer Aided Design</a>
<li><a href="seniortech_anon.php?lab=Communication Systems">Communication Systems</a>
<li><a href="seniortech_anon.php?lab=Computer Systems">Computer Systems</a>
<li><a href="seniortech_anon.php?lab=Energy Systems">Energy Systems</a>
<li><a href="seniortech_anon.php?lab=Microelectronics">Microelectronics</a>
<li><a href="seniortech_anon.php?lab=Neuroscience">Neuroscience</a>
<li><a href="seniortech_anon.php?lab=Oceanography">Oceanography and Geophysical Systems</a>
<li><a href="seniortech_anon.php?lab=Physics">Optics and Modern Physics</a>
<li><a href="seniortech_anon.php?lab=Prototyping">Prototyping and Engineering Materials</a>
</ul>
<li><a href="seniortech_anon.php?lab=Other">Grant Projects and Student Initiatives</a>
</ul>
<h2>Other Events</h2>
<ul>
<li><a href="design_anon.php">Design Challenges</a>
</ul>


<h2>Anonymous Searching</h2>
<p>
Search through presentations by title, descriptions, and room number.  (Trailers are noted as T#)  Presenter names will not be displayed. 
<blockquote><form name="anonsearch" method="post" action="results_anon.php">
Seach for: <input type="text" name="find" /> 
<input type="hidden" name="searching" value="yes" />
<input type="submit" name="anonsearch" value="Search" />
</form>
</blockquote>
</p>

<h2>Student Search (for TJ students)</h2>
<?php 

if(!empty($errors)) {

	echo "The following errors occurred: <br /><ul>";
	foreach($errors as $error)
		echo "<li>$error</li>";

	echo "</ul>";

}
	
if(isset($_SESSION['agent'])) {

	

	echo "	<blockquote><form name=\"search\" method=\"post\" action=\"results.php\">
		Search for: <input type=\"text\" name=\"find\" /> <input type=\"hidden\" name=\"searching\" value=\"yes\" /> <input type=\"submit\" name=\"search\" value=\"Search\" />
		</form></blockquote>";
} //End of if(isset($_SESSION['agent']))

else {

	echo "<form method=\"post\" action=\"presentation.php\">";
	echo "<blockquote><table><tr><td>Username:</td><td><input type=\"text\" name=\"username\" size=\"15\" maxlength=\"15\" /></td></tr>";
	echo "<tr><td>Password:</td><td><input type=\"password\" name=\"password\" size=\"15\" maxlength\"50\" /></td></tr></table>";
	echo "<input type=\"submit\" name=\"submit\" value=\"Login\" />";
	echo "</form></blockquote>";
} //End of else
?>

<?php include("footer.php"); ?>
