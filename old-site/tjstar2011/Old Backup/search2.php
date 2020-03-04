<?
//This is only displayed if they have submitted the form
if ($searching =="yes")
{
echo "<h2>Results</h2><p>";

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
$data = mysql_query("SELECT * FROM Presentations WHERE upper($field) LIKE'%$find%'");


//This counts the number or results - and if there wasn't any it gives them a little message explaining that
$anymatches=mysql_num_rows($data);
if ($anymatches == 0)
{
echo "Sorry, but we can not find an entry to match your query<br><br>";
}
else
{
echo "<b>Searched For:</b> " .$find;
echo "<br />";
//And we display the results
echo "<table cellspacing='10px'><tr colspan='4'><td><b>Presenters</b></td><td><b>Title</b></td><td><b>Room</b></td><td><b>Session</b></td></tr>";
while($result = mysql_fetch_array( $data ))
{
echo "<tr colspan='4'><td width='250px'>";
echo $result['Presenters'];
echo "</td><td width='400px'>";
echo "<span title='";
echo $result['Description'];
echo "'>";
echo $result['Title'];
echo "</span></td><td>";
echo $result['Room'];
echo "</td><td>";
echo $result['Session'];
echo "</td></tr>";
}
echo "</table>";
}

//And we remind them what they searched for

}
?> 