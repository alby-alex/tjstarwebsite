<?php
if (get_magic_quotes_gpc()) {
	$process = array(&$_GET, &$_POST, &$_COOKIE, &$_REQUEST);
	while (list($key, $val) = each($process)) {
		foreach ($val as $k => $v) {
			unset($process[$key][$k]);
			if (is_array($v)) {
				$process[$key][stripslashes($k)] = $v;
			$process[] = &$process[$key][stripslashes($k)];
			} else {
				$process[$key][stripslashes($k)] = stripslashes($v);
			}
		}
	}
	unset($process);
}
function split_and_replace($arr) {
	$ret_str = "";
	foreach($arr as $tmp)
		$ret_str = $ret_str . str_replace("\t", "", $tmp) . "\t";
	return $ret_str;
}
function redirect($location) {
	$url = 'https://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);
	if(substr($url, -1) == '/' OR substr($url, -1) == '\\')
		$url = substr($url, 0, -1);
	$url .="/";
	$url .= $location;
	header("Location: $url");
	exit();
}
function iodine_login($user, $password, $login_page_name, $session_name) {
	$errors = array();
	$cache = tempnam('/tmp', 'tjstar-krb5-');
	$realm = "LOCAL.TJHSST.EDU";
	$descriptors = array(0 => array('pipe', 'r'), 1 => array('pipe', 'w'), 2 => array('pipe', 'w'));
	$env = array('KRB5CCNAME' => $cache);
	$user = escapeshellcmd(strtolower($user));
	/*
	$process = proc_open("/usr/bin/kinit $user@$realm", $descriptors, $pipes, NULL, $env);
	if(is_resource($process)) {
		fwrite($pipes[0], "$password\n");
		fclose($pipes[0]);
		$output = fread($pipes[1], 1024);
		fclose($pipes[1]);
		$output2 = fread($pipes[2], 1024);
		fclose($pipes[2]);
		$status = proc_close($process);
		if ($status == 0) {
			init_session($session_name, $user);
			redirect("$login_page_name");
		}
		else {
			$errors[] = "Your username and password did not match";
		}
	}
	else { */
		$errors[] = "Internal system error, please try again";
	//}
	return $errors;
}
function failure($fields) {
	echo "<p>The following fields are not filled out: <br>";
	foreach ($fields as $field) {
		echo $field;
		echo "<br>";
	}
	echo "<br></p>";
	echo "Please click back and completely fill out the form.<br>";
	exit();
}
?>
