<?php $field=$find; include("spreadsheet_header.php"); ?>
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

$data = mysql_query("SELECT * FROM web_speakers WHERE `Presentation Title` LIKE'%$find%' OR Description LIKE'%$find%' OR Room LIKE'%$find%' OR `Name(s)` LIKE'%$find%'") ?>


<?
//This counts the number or results - and if there wasn't any it gives them a little message explaining that
$anymatches=mysql_num_rows($data);
if ($anymatches != 0)
{
//And we display the results

while($result = mysql_fetch_array( $data ))
{
echo '<table id="results">
<tr class="title">
<td colspan="2" id="title2">';
echo $result['Presentation Title'];
echo '</td></tr>
<tr >
<td>';
echo $result['Name(s)'];echo ' (';
echo $result['Organization'];
echo ')</td>
<td id="room"><b>Room:</b> ';
echo $result['Room'];echo '   <b>Session</b> ';
echo $result['Session'];
echo '</td>
</tr>
<tr>
<td colspan="2">';
echo $result['Description'];
echo '</td>
</tr>
</table>

<br />
<br />';
}

}?>

<? $data = mysql_query("SELECT * FROM web_seniors WHERE `Presentation Title` LIKE'%$find%' OR Description LIKE'%$find%' OR Room LIKE'%$find%'") ?>

<?
//This counts the number or results - and if there wasn't any it gives them a little message explaining that
$anymatches=mysql_num_rows($data);
if ($anymatches != 0)
{
//And we display the results

while($result = mysql_fetch_array( $data ))
{
echo '<table id="results">
<tr class="title">
<td id="title2">';
echo $result['Presentation Title'];
echo ' (';
echo $result['Lab'];
echo ')</td>
<td id="room"><b>Room:</b> ';
echo $result['Room'];echo '   <b>Session</b> ';
echo $result['Session'];
echo '</td>
</tr>
<tr>
<td colspan="2">';
echo $result['Description'];
echo '</td>
</tr>
</table>';
}
}?>

<? $data = mysql_query("SELECT * FROM web_ibet WHERE `Presentation Title` LIKE'%$find%' OR Description LIKE'%$find%' OR Room LIKE'%$find%'") ?>

<?
//This counts the number or results - and if there wasn't any it gives them a little message explaining that
$anymatches=mysql_num_rows($data);
if ($anymatches != 0)
{
//And we display the results

while($result = mysql_fetch_array( $data ))
{
echo '<table id="results">
<tr class="title">
<td id="title2">';
echo $result['Presentation Title'];
echo ' (IBET)</td>
<td id="room"><b>Room:</b> ';
echo $result['Room'];echo '   <b>Session</b> ';
echo $result['Session'];
echo '</td>
</tr>
<tr>
<td colspan="2">';
echo $result['Description'];
echo '</td>
</tr>
</table>';
}
}





}

?> 



</body>
