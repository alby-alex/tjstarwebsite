<?php $page='presentation'; include("header.php"); ?>


<!--EDIT START-->







<h1 class="title">Presentation Description<span style="text-decoration: underline;"></span></h1>


<a href="Mentorship%20&amp;%20Senior%20Tech%20Lab%20Research.htm"
 target="_blank">Mentorship and Senior Tech Lab Research
Presentations</a>
<br />
<br />
<a href="IBET.htm" target="_blank">IBET
Presentations</a>
<br>
<br>
<a href="Student Flyer51109.pdf" target="_blank">A Sampling of Activities Scheduled for TjSTAR</a>

<hr style="width: 100%; height: 2px;" />
<br/>

<h1 class="title">Panels/Speakers/Workshop</h1>
Select a category for further information, including room number and sessions.
<br/>
<form name="form1">
<select name="menu" onChange="window.open(document.form1.menu.options[document.form1.menu.selectedIndex].value);">
<option value=''>Please choose</option>
<option value="panel.php">Panels</option>
<option value="speaker.php">Speakers</option>
<option value="workshop.php">Workshops</option>
</select>
</form>
<br />




<!--EDIT END-->

<?php include("footer.php"); ?>