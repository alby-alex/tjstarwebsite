<?php $field=$lab; include("spreadsheet_header.php"); ?>
<?

//If they did not enter a search term we give them an error

// Otherwise we connect to our Database
mysql_connect("mysql.tjhsst.edu", "2010jlee", "BsKVsnWS9ZZqDAzA") or die(mysql_error());
mysql_select_db("srs") or die(mysql_error());

$data = mysql_query("SELECT * FROM web_design"); 
?>

<?
//And we display the results

while($result = mysql_fetch_array( $data ))
{
echo '<table id="results">
<tr class="title">
<td id="title2">';
echo $result['Name'];
echo '</td>
<td id="room"><b>Room:</b> ';
echo $result['Room'];
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




?> 



</body>
