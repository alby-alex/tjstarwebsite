<?php $page='schedule'; include("header.php"); ?>


<h1 class="title">Schedule</h1>

Click to view document<br />
<br />
<a href="TJ%20STAR%20Overview%20Schedule.pdf"><img style="border: 0px solid ; width: 100%; height: 71%;" alt="" src="images/schedule.jpg" /></a><br /><br />


<h1 class="title">Search</h1>

Search through presentations by presenter name, title, descriptions, and room number.  (Trailers are noted as T#)<br />
<form name="search" method="post" action="results.php">
Seach for: <input type="text" name="find" /> in 

<Select NAME="field">
<Option VALUE="Presenters">Presenters</option>
<Option VALUE="Title">Title</option>
<Option VALUE="Description">Description</option>
<Option VALUE="Room">Room #</option>
</Select>
<input type="hidden" name="searching" value="yes" />
<input type="submit" name="search" value="Search" />
</form>






<?php include("footer.php"); ?>