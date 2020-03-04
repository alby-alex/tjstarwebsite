<?php

/* ------------------------------------------------------- */
/* Author: Markus Kramer                                   */
/* Version: 1.1                                            */
/* Date: 17/09/2011                                        */
/* ------------------------------------------------------- */


// the URL to your Google Forms document that you got from Google
$surveyUrl = "https://docs.google.com/spreadsheet/embeddedform?formkey=dGxOaTRzR3RkdlNlQ09oLTgzTlp1Rnc6MA";


// replacements of text strings with some other text
$replacements = array(
	"<link href='/static/spreadsheets" => "<link href='https://spreadsheets.google.com/static/spreadsheets",
                      "<div class=\"ss-form-container\">" => "<div class=\"ss-form-container\"> <img src='https://www.tjhsst.edu/studentlife/events/srs/trans_logo.png' style='margin-top:-50px; float:left;'/>",
                      "IMG001" => " ",
                      "Thank you."=>"Thank you.</div>",
                      "Please complete"=>"<div style='margin-bottom:70px; margin-top:-20px;'>Please complete",
                      "<h1 class=\"ss-form-title\">"=>"<h1 class=\"ss-form-title\" style='margin-left:0px;'>",
                      "<div class=\"ss-form\">"=>"<div class=\"ss-form\" style='margin-left:35px; margin-bottom:50px;'>",
                      "ss-required-asterisk\"" => "ss-required-asterisk\" style='margin-left:35px;'"
);








/* ------------------------------------------------------- */
/* Internal code */
/* ------------------------------------------------------- */

// check fopen is allowed
if (ini_get('allow_url_fopen') != '1') {
	die('no fopen support');
}

// load content
$content = "";
$proxiedUrl = $_REQUEST["proxiedUrl"];
if( $proxiedUrl == "" ) {
	$surveyUrl = str_replace("https", "http", $surveyUrl);
	$content = file_get_contents($surveyUrl);
	if ($content === false) {
	   die("Failed to load content of $surveyUrl");
	}
} else {
	$proxiedUrl = str_replace("https", "http", $proxiedUrl);
	$response = httpRequest($proxiedUrl, $_SERVER['QUERY_STRING'], "POST");
	$content = $response["content"];
}

// change form target and method to our proxy
preg_match('/action=\\"(\S*)\\"/', $content, $matches);
$googleUrl = $matches[1];
$content = str_replace($googleUrl, "rsvp_form.php", $content);

// add the real action URL as a hidden field
$proxiedUrlTag = '<input type="hidden" name="proxiedUrl" value="' . $googleUrl . '"/></form>';
$content = str_replace("</form>", $proxiedUrlTag, $content);

// change form method to GET
$content = str_replace('method="POST"', 'method="GET"', $content);

// actual replacements
foreach ($replacements as $k => $v) {
    $content = str_replace($k, $v, $content);
}

// print
echo $content;




function httpRequest($url, $data, $method = "GET", $referer='') {
    $url = parse_url($url);
    $host = $url['host'];
    $path = $url['path'];
    $query = $url['query'];
    $method = strtoupper($method);
 
    $fp = fsockopen($host, 80, $errno, $errstr, 60);
    if ($fp){
        fputs($fp, "$method http://$host$path?$query HTTP/1.1\r\n");
        fputs($fp, "Host: $host\r\n");
        fputs($fp, "Content-type: application/x-www-form-urlencoded\r\n");
        if ($referer != '') fputs($fp, "Referer: $referer\r\n");
 		if ($method == 'POST') fputs($fp, "Content-length: ". strlen($data) ."\r\n");
        fputs($fp, "Connection: close\r\n\r\n");
        if ($method == 'POST') fputs($fp, $data);
 
        $result = ''; 
        while(!feof($fp)) {
            // receive the results of the request
            $result .= fgets($fp, 128);
        }
    } else {
    	die("$errstr ($errno)");
    }
 
    fclose($fp);
    $result = explode("\r\n\r\n", $result, 2);
    $header = isset($result[0]) ? $result[0] : '';
    $content = isset($result[1]) ? $result[1] : '';
    return array(
        'status' => 'ok',
        'header' => $header,
        'content' => $content
    );
}

?>