<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <title>tjSTAR ** Symposium to Advance Research</title>


  <meta name="keywords" content="" />

  <meta name="description" content="" />

  <link href="results.css" rel="stylesheet" type="text/css" />

</head>

<body>

<?
//This is only displayed if they have submitted the form
if ($searching =="yes")
{

//If they did not enter a search term we give them an error
if ($find == "")
{
echo "<p>You forgot to enter a search term";
exit;
}

// Otherwise we connect to our Database
mysql_connect("mysql.tjhsst.edu", "2010jlee", "BsKVsnWS9ZZqDAzA") or die(mysql_error());
mysql_select_db("srs") or die(mysql_error());

// We preform a bit of filtering
$find = strtoupper($find);
$find = strip_tags($find);
$find = trim ($find);

//Now we search for our search term, in the field the user specified
$data = mysql_query("SELECT * FROM Presentations WHERE upper($field) LIKE'%$find%'"); ?>

<div id="header">
<img src="images/resultsheader.gif" alt="tjSTAR"> <a href="index.php" alt="">Home</a> <a href="about.php" alt="">About</a> <a href="presentation.php" alt="">At a Glance</a> <a href="schedule.php" alt="">Schedule</a> <a href="contact.php" alt="">Contact</a><br>
</div>
<div id="searchstats">
<?php echo mysql_num_rows($data) ?> results for <b><?php echo $find ?></b> in <?php echo $field ?>
</div>
<div id="search">
<form name="search" method="post" action="results.php">
Seach for: <input type="text" name="find" /> in 

<Select NAME="field">
<Option VALUE="Title">Title</option>
<Option VALUE="Description">Description</option>
<Option VALUE="Room">Room #</option>
</Select>
<input type="hidden" name="searching" value="yes" />
<input type="submit" name="search" value="Search" />
</form>
</div>




<?
//This counts the number or results - and if there wasn't any it gives them a little message explaining that
$anymatches=mysql_num_rows($data);
if ($anymatches == 0)
{
echo "Sorry, but we can not find an entry to match your query<br><br>";
}
else
{

//And we display the results

while($result = mysql_fetch_array( $data ))
{
echo '<table id="results">
<tr>
<td colspan="2" id="title">';
echo $result['Title'];
echo '</td></tr>
<tr >
<td colspan="2">';
echo '(';
echo $result['Project'];
echo ')  ';
echo $result['Description'];
echo '</td>
</tr>
<tr>
<td> <b>Session:</b> ';
echo $result['Session'];
echo '</td>
<td>
<b>Room:</b> ';
echo $result['Room'];
echo '</td>
</tr>
</table>
<br />
<br />';
}

}

//And we remind them what they searched for

}
?> 



</body>
