<?php $field='IBET'; include("spreadsheet_header.php"); ?>
<?

//If they did not enter a search term we give them an error

// Otherwise we connect to our Database
mysql_connect("mysql.tjhsst.edu", "2010jlee", "BsKVsnWS9ZZqDAzA") or die(mysql_error());
mysql_select_db("srs") or die(mysql_error());


//Now we search for our search term, in the field the user specified
$data = mysql_query("SELECT * FROM web_ibet"); ?>


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
<tr class="title">
<td id="title2">';
echo $result['Presentation Title'];
echo '</td>
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

}


?> 



</body>