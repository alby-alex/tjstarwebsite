<?php 
function redirect($location) {
	$url = 'https://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);
	if(substr($url, -1) == '/' OR substr($url, -1) == '\\')
		$url = substr($url, 0, -1);

	$url .="/";
	$url .= $location;
	header("Location: $url");
	exit();
}
$login_name = "ibet_login_2011.php";

if($_COOKIE['TJSTAR'] == NULL) //The user has not logged in
	redirect("$login_name");

session_name('TJSTAR');
session_start();

if(md5($_SERVER['HTTP_USER_AGENT']) != $_SESSION['agent']) {
	session_destroy();
	setcookie("TJSTAR", time()-3600);
	redirect("$login_name");
}

if((time() - $_SESSION['last_activity_time']) > 1800) {
	session_destroy();
	setcookie("TJSTAR", time()-3600);
	redirect("$login_name");
}

$_SESSION['last_activity_time'] = time();
?>

<?php include("header_facebox.php"); ?>

<?php 
if(!empty($errors)) {
	echo "The following errors occurred: <br /><ul>";
	foreach($errors as $error)
		echo "<li>$error</li>";
	echo "</ul>";
}


?>

<style type="text/css">
h3 {
	color:#006B67;
}
.tbb {
	font-size:14px;
}
.main {
	border:1px solid gray;
	padding:5px;
	font-size:12px;
}
.topic {
	max-width:105px;
	font-size:14px;
}
.name {
	max-width:105px;
	line-height:20px;
}
.top {
	padding:10px;
}
.panel {
	font-weight:bold;
}
table {
	border-collapse:collapse;
}
hr {
	border:1px solid gray;
}
</style>

<p><div style="padding:20px;">
&#8594; Jump To: <a href="#ablock">Block A</a> | <a href="#cblock">Block C</a> | <a href="#dblock">Block D</a> | <a href="#eblock">Block E</a>
</div></p>

<h1>IBET Projects</h1>

<div style="padding:0 20px 20px 20px:">
<p>
During the IBET presentations, groups of freshmen students will present year-long research projects they have developed in their IBET (integrated biology, English, and technology) classes. The experiments they have completed will address various aspects of biology ranging from environmental protection to extensive research on specific microorganisms. Each project will also incorporate a student-designed technology component.
</p>
</div>

<br />

<h2>IBET Presentations Schedule:</h2>

<!-- A BLOCK -->
<a name="ablock"></a><h3>Block A</h3>
<table class="tbb">
<tr>
<td class="top"><b>Title</b></td>
<td class="top"><b>Presenters</b></td>
<td class="top"><b>Description</b></td>
</tr>

<tr>
<td class="main topic name">A Drop of Oil Will Make the Lifespan of Daphnia Spoil</td>
<td class="main topic">Nikhil Garg, Iris Hyon, Priya Raju, and Karen Xia</td>
<td class="main">This presentation explores the effects of Brassica napus (canola) oil on the lifespan of Daphnia magna and their habitats.</td>
</tr>

<tr>
<td class="main topic name">A Filtering Phenomenon</td>
<td class="main topic">Sarah Kook, Meena Rezazad, Mathhew Jian, and Felix Chen</td>
<td class="main">This presentation describes the effect of light color on the rate of clam filtration.</td>
</tr>

<tr>
<td class="main topic name">A Healthy Infestation of Bacteria</td>
<td class="main topic">Sahitya Allam, Stephanie Hoang, Eric Xie, and Yang Yu</td>
<td class="main">This presentation describes the effect of the rhizobacteria type Bacillus Subtilis on the root growth of Brassica rapa plants.</td>
</tr>

<tr>
<td class="main topic name">A Spoonful of Benadryl Makes the Heart Rate Go Down?</td>
<td class="main topic">David Liu, Vaidehi Patel, Priyanka Raju, and Abby Rose</td>
<td class="main">This experiment tested the potential chemical and biological effects of Benadryl on the cardiovascular system of Daphnia magna.</td>
</tr>

<tr>
<td class="main topic name">Acids and Bases Hurt Their Faces</td>
<td class="main topic">Charith Ratnayake, Henry Tessier, Matt Wattendorf, and Joe Downs</td>
<td class="main">This presentation describes the effect of pH on the survival rate of Macroinvertebrates.</td>
</tr>

<tr>
<td class="main topic name">Aspirin, Please (It&#146;s For Our Water Fleas)!</td>
<td class="main topic">Ben Andr&#233;, Wei Lin, Daniel Noh, and Tom Stone</td>
<td class="main">This presentation describes the effect of aspirin concentration on the heart rate of Daphnia magna.</td>
</tr>

<tr>
<td class="main topic name">BMPs Take Their Toll. Please Have (Exact) Change</td>
<td class="main topic">Ivy Ren, Minji Koo, Cameron Ewell, and Emma Gee</td>
<td class="main">This presentation describes the effect of Best Management Practice (BMP) ponds on overall water quality.</td>
</tr>

<tr>
<td class="main topic name">Bubbles and Babies</td>
<td class="main topic">Lilly Nowlakha, Tabitha Timm, Andrew Yang, and Rachel Zoll</td>
<td class="main">This presentation is about the effect of dissolved oxygen on Daphnia magna reproduction and also goes into detail on the best conditions for culturing Daphnia.</td>
</tr>

<tr>
<td class="main topic name">Can't Stop The Beat!</td>
<td class="main topic">This presentation investigates the heart rate of Daphnia magna when exposed to varying concentrations of a common pesticide.</td>
<td class="main">Ellen Mul&#233;, Julia Suarez, Madeline Naide, and Brian Welch</td>
</tr>

<tr>
<td class="main topic name">Can&#146;t Blame Mirant</td>
<td class="main topic">Melody Fan, Megan Man, John Wilkes, and Jennifer Yin</td>
<td class="main"> This presentation describes the effect of the coal powered Mirant Power Plant on nitrate, phosphate and pH of the Potomac River.</td>
</tr>

<tr>
<td class="main topic name">Curry No Hurry</td>
<td class="main topic">Vashali Jain, Thai Co Nguyen, Sonia Thakur, and Aarthi Prakash</td>
<td class="main">This presentation desecribes the effect of turmeric concentration on lifespan of Arabidopsis thalina.</td>
</tr>

<tr>
<td class="main topic name">Daphnia:  Stressed-Out Singers or Chill Crustaceans?</td>
<td class="main topic">Harleen Bal, Jonathan Colen, Ashwin Ganapathiraju, and Emma Puranen</td>
<td class="main">This presentation describes the effect of different sound frequencies on the oxygen consumption of Daphnia.</td>
</tr>

<tr>
<td class="main topic name">Death by Nitrate</td>
<td class="main topic"> Somya Shankar, You Na An, Katherine Au, and James Eagle</td>
<td class="main">This presentation describes the effect of nitrates that are present in fertilizer on algae growth.</td>
</tr>

<tr>
<td class="main topic name">Downstream Deluge</td>
<td class="main topic">Caleb Goertel, Jung Huh, Yena Seo, and Kyu Kim</td>
<td class="main">This presentation examines the effects of storm drain runoff on the water quality of local streams, and the potential impact it can have on local ecosystems.</td>
</tr>

<tr>
<td class="main topic name">Egg Mass Extravaganza!</td>
<td class="main topic">Neha Agrawal, Nad&#232;ge Aoki, Dhruv Gaba, and Jenny Seo</td>
<td class="main">This presentation compares the number of spotted salamander egg masses (Ambystoma maculatum) in constructed and natural vernal pools over an eight year period and examines the potential of wetland mitigation.</td>
</tr>

<tr>
<td class="main topic name">Eggs! Get Your Eggs Here! Cloudy/Clear Eggs Are Here!</td>
<td class="main topic">Andrew Burns, Akhil Gangu, Richard Mirsky-Ashby, and Adithya Venkatesan</td>
<td class="main">This presentation compares the effect of water depth on the number and distribution of clear egg masses compared to cloudy egg masses of spotted salamanders.</td>
</tr>

<tr>
<td class="main topic name">Hoppity, Hop, Hop, Hop to the Sound</td>
<td class="main topic">Yongkoo Kang, Everi Osofsky, Sowmya Ranga, and Jae Yun</td>
<td class="main">This presentation describes the effects of sound frequency on cricket locomotion.</td>
</tr>

<tr>
<td class="main topic name">How Do They Know When To Go?</td>
<td class="main topic">Sarah Quettawala, Jaidan Ali, Alex Li, and J.C Panagides</td>
<td class="main">This presentation describes the effect of soil temperature on the proximal cues of spotted salamander migration.</td>
</tr>

<tr>
<td class="main topic name">How Do You Like Your Eggs?</td>
<td class="main topic">Miranda Callahan, Jennifer Ko, Ellen Kim, and Dylan Muramoto</td>
<td class="main">This project studies the correlation between the color and attachment in spotted salamander egg masses in Northern Virginia.</td>
</tr>

<tr>
<td class="main topic name">I See the Light!</td>
<td class="main topic">Keshav Rao, Adam Sulucz, and Mason Chee</td>
<td class="main">This presentation describes the correlation between light and a planarian&#146;s regeneration rate over a period of seven days.</td>
</tr>

<tr>
<td class="main topic name">Juvenile Planinquents</td>
<td class="main topic">Stephanie Bao, Tenzin Lhanze, Jesse Judish, and Ramanan Ramesh</td>
<td class="main">This presentation describes the effect of caffeine on the learning rate of Dugesia tigrina.</td>
</tr>

<tr>
<td class="main topic name">Light vs Dark: The Pupa Wars</td>
<td class="main topic">Owen Gray, Robert Young, and Daniel Kwun</td>
<td class="main">This presentation describes the effect of light-dark cycles on the relative fecundity of Drosophila melanogaster.</td>
</tr>

<tr>
<td class="main topic name">Micro Light Sight</td>
<td class="main topic">Alex Monahan, Jonathan Towne, and Chris Haseler</td>
<td class="main">This presentation describes the effect of saccharin concentration on the phototactic movement of Volvox globator.</td>
</tr>

<tr>
<td class="main topic name">Naturally Buff..er</td>
<td class="main topic">Bryan Higgins, Laura Manno, Christine Nguyen, and Miles Oakley</td>
<td class="main">This presentation describes the buffering effect of natural organisms and minerals on the pH of water.</td>
</tr>

<tr>
<td class="main topic name">Planaria Hysteria: Don&#146;t UV Losing Your Head!</td>
<td class="main topic">Emma Hastings, Priyanka Nair, Isabel Roscoe, and May Saito</td>
<td class="main">This presentation describes the effect of ultraviolet radiation duration on the regeneration rate of Dugesia tigrina.</td>
</tr>

<tr>
<td class="main topic name">Rapid Regeneration</td>
<td class="main topic">Ashwin Basana, Kunal Debroy, Ravi Pattapagala, and Adam Reiss</td>
<td class="main">This presentation describes the effect of Vitamin B12 on the regeneration rate of Dugesia tigrina.</td>
</tr>

<tr>
<td class="main topic name">Roads: Decreasing our Eggspectations</td>
<td class="main topic">Josh Chung, Jay Devanathan, Aditya Goodala, and Michael Qu</td>
<td class="main">This presentation describes the effect of the distance from the road to the vernal pool on the amount of egg masses in the vernal pool.</td>
</tr>

<tr>
<td class="main topic name">Some Like It Hot, but Daphnia Do Not!</td>
<td class="main topic">Michelle Chen, Chris Prak, and Peyton Randolph</td>
<td class="main">This presentation describes the effects of thermal pollution on Daphnia.</td>
</tr>

<tr>
<td class="main topic name">Sugar Spurs Spontaneous Movement</td>
<td class="main topic">Srikanth Chelluri, Giovanni Jimenez, Tina Ju, and Jacqueline Szilagyi</td>
<td class="main">This presentation describes the effect of sucrose concentration on hyperactivity in planaria.</td>
</tr>

<tr>
<td class="main topic name">Take about a Dozen Salamander Eggs...</td>
<td class="main topic">Ji Whae Choi, Jay Hebert, Amy Kim, and Ben Stoyen</td>
<td class="main">This presentation describes the effect of the size of a vernal pool (in square meters) on the number of Ambystoma maculatum egg masses (per square meter).</td>
</tr>

<tr>
<td class="main topic name">The Metallic Heart of the Invertebrate</td>
<td class="main topic">Jeff Horowitz, Sam Rohrer, Comfort Sampong, and Simran Singh</td>
<td class="main">This presentation describes the effect of copper on the heart rate of Daphnia magna and its implications on local ecology and the field of cardiology.</td>
</tr>

<tr>
<td class="main topic name">The Truth Behind a Common Drug Store Item</td>
<td class="main topic">Daeland Angle, Joshua Fang, Joshua Goldstein, and Anand Kapadia</td>
<td class="main">This presentation describes the effect of chromium picolinate on the abundance of Hypsibius tardigradum.</td>
</tr>

<tr>
<td class="main topic name">The Veggie Tales of Salamander Egg Masses</td>
<td class="main topic">John Aulabaugh, Ranahdeer Danturthy, and Will Yang</td>
<td class="main">Our presentation describes the effect of vegetation on the amount of salamander egg masses.</td>
</tr>

<tr>
<td class="main topic name">Think Inside the Box</td>
<td class="main topic">Billy Moses, Alice Yuen, Emily Zhou, and Vishal Talasani</td>
<td class="main">The presentation describes the effect of different wavelengths and intensities of light on plant growth.</td>
</tr>

<tr>
<td class="main topic name">Tour de Pure</td>
<td class="main topic">Wendy Sun, Arjun Balaji, Sarah Mohideen, and David Park</td>
<td class="main">This presentation compares different water filtration methods and explains the applications of them in third world countries.</td>
</tr>

<tr>
<td class="main topic name">Turn Up the Heat, Now Let&#146;s See That Heart Beat!</td>
<td class="main topic">Caitlyn Carpio, Jonathan Lin, Tessa Muss, and Andrew Zhang</td>
<td class="main">This presentation describes the effect of temperature on the heart rate of Daphnia magna.</td>
</tr>

<tr>
<td class="main topic name">Vegetable Omelet</td>
<td class="main topic">Jacob Rosenblum, Roshan Sajjad, and Tyler Shepherd</td>
<td class="main">This presentation describes the effect of vegetation on the number of spotted salamander egg masses.</td>
</tr>

<tr>
<td class="main topic name">Zip It Cricket!</td>
<td class="main topic">YoonJi Moon, Sib Shewit, Care Shoaibi, and Nisha Swarup</td>
<td class="main">This presentation describes the effect of Benadryl on crickets&#146; chirping and its affect on the pharmaceutical market.</td>
</tr>

</table>

<br />

<a href="#top" style="float:middle;">&#8593; Back to top</a><br><hr>

<!-- C BLOCK -->

<a name="cblock"></a><h3>Block C</h3>
<table class="tbb">
<tr>
<td class="top"><b>Title</b></td>
<td class="top"><b>Presenters</b></td>
<td class="top"><b>Description</b></td>
</tr>

<tr>
<td class="main topic name">2011: An Egg Odyssey</td>
<td class="main topic">Connor Phillips, David Amini, and Andy Sin</td>
<td class="main">This presentation describes the effect of constructed and non-constructed wetlands on the number of Ambystoma maculatum egg masses.</td>
</tr>

<tr>
<td class="main topic name">Average Kinetic Energy of the Air on Average Kinetic Energy of Salamanders</td>
<td class="main topic">Homer Baker, Niharika Dar, Katherine Hough, and Jocelyn Huang</td>
<td class="main">This presentation describes the effect of soil and air temperature on the number of spotted salamanders migrating into vernal pools.</td>
</tr>

<tr>
<td class="main topic name">BC Doesn't Stand for Being Cold</td>
<td class="main topic">Sarah Brooks, Doowon Kang, Krista Opsahl-Ong, and Jamie Sullivan</td>
<td class="main">This presentation describes the effect of black carbon on the melting rate of glaciers and the potential impact on the environment.</td>
</tr>

<tr>
<td class="main topic name">Bigger, Better, Bio-Remediation</td>
<td class="main topic">Prajeeth Kumar Koyada, Abi Gopal, Vincent Liu, and Alex Barghi</td>
<td class="main">This presentation explains the bio-remedial effects of three species of algae on a crude oil substitute.</td>
</tr>

<tr>
<td class="main topic name">Buff It Up!</td>
<td class="main topic">Bridget Andersen, Betty Huang, Tim Zhong, and Andrew Fountain</td>
<td class="main">This presentation describes the effect of various buffer types on their efficacy at improving water quality around the Chesapeake Bay area.</td>
</tr>

<tr>
<td class="main topic name">Chlorella-Deville 101 Algae Specimens</td>
<td class="main topic">Shayna Hume, Martha Shields, William Woodruff, and Elizabeth Woods</td>
<td class="main">This presentation explores the effect of nitrate on Chlorella algae.</td>
</tr>

<tr>
<td class="main topic name">Cukoo for Cocoa Critters</td>
<td class="main topic">Aadil Refai, Simran Rohatgi, and Philip Yu</td>
<td class="main">This experiment describes the effect of cocoa powder on the heart rate of Daphnia magna.</td>
</tr>

<tr>
<td class="main topic name">Delicate Eyes: How UV Affects the Environment</td>
<td class="main topic">Owen Hoffman, Richard Wang, and Rahul Majumdar</td>
<td class="main">This presentation describes the effect of ultra violet radiation on the color preference of fruit-flies.</td>
</tr>

<tr>
<td class="main topic name">Do Macroinvertebrates Like Salamander Eggs and Ham?</td>
<td class="main topic">Jessica Choi, Sarah Shan, and Christine Tsou</td>
<td class="main">This presentation describes the effect of the number of egg masses on the biodiversity of macroinvertebrates.</td>
</tr>

<tr>
<td class="main topic name">Find Your Path Young Cricket</td>
<td class="main topic">Kabir Brar, Nathan Williams, Jonathan Stewart, and Kia Eskandarian</td>
<td class="main">This presentation describes the effect of magnetism on the maze orientation of house crickets.</td>
</tr>

<tr>
<td class="main topic name">Hot Headed- Capsaicin, That Is!</td>
<td class="main topic">Roshni Bhasin, Nihita Manem, and Jane Werntz</td>
<td class="main">This presentation describes the effect of capsaicin on planarian ability to exhibit negative phototaxis.</td>
</tr>

<tr>
<td class="main topic name">Hot N Cold: Salamander Migration</td>
<td class="main topic">Lekha Narayana, Emily Schneider, Emily Shaw, and Natasha Torrens</td>
<td class="main">This presentation describes the effect of soil temperature on the migration of the Ambystoma maculatum.</td>
</tr>

<tr>
<td class="main topic name">Hot or Cold- The Science of Eggstreme Temperatures</td>
<td class="main topic">Deepa Issar, Anthony Carrington, James Day, and Nikhil Gopalan</td>
<td class="main">This presentation describes the effect of water temperature on the number of salamander egg masses.</td>
</tr>

<tr>
<td class="main topic name">I Can Feel the Temperature In the Air Tonight -- And I'm Coming!</td>
<td class="main topic">James Forcier, Akshith Doddi, Frank Huang, and Randy Yin</td>
<td class="main">This presentation analyzes the effects of air temperature on the number of spotted salamanders migrating.</td>
</tr>

<tr>
<td class="main topic name">I Can&#146;t Believe It&#146;s Not Cannibalism!</td>
<td class="main topic">Victor Shen, Linda Lay, and Sienna Lotenberg</td>
<td class="main">This presentation describes the effect of caffeine concentration on the cannibalism rate of Dugesia tigrina.</td>
</tr>

<tr>
<td class="main topic name">In the Eye of the Fly</td>
<td class="main topic">Alex Wood-Thomas, Alex Xu, Riley Back, and Kevin Luu</td>
<td class="main">This presentation describes the effect of different colored lights on the reproduction rate of fruit flies.</td>
</tr>

<tr>
<td class="main topic name">It&#146;s Raining, It&#146;s Pouring, the Salamanders are Exploring!</td>
<td class="main topic">Tim Lu, Raman Marwah, Rohan Punnoose, and Tony Xiao</td>
<td class="main">In our presentation, we explore the effects of the amount of precipitation on the migration of spotted salamanders.</td>
</tr>

<tr>
<td class="main topic name">Kill the Spill</td>
<td class="main topic">Nikhil Gupta, Rachel Iwicki, Brian Pangilinan, and Isabelle Walton</td>
<td class="main">This presentation describes the effect of organic sorbents on oil absorption.</td>
</tr>

<tr>
<td class="main topic name">Klorox Krunching</td>
<td class="main topic">Brian Clark, Maria Kim, Matt Levonian, and Juliana Said</td>
<td class="main">This presentation describes the relationship between temperature and chlorine filtration through activated carbon.</td>
</tr>

<tr>
<td class="main topic name">Midget Mung Beans</td>
<td class="main topic">Anne Li, Archis Bhandarkar, Nick Jones, and Katherine Tsai</td>
<td class="main">This presentation describes the effect of caffeine on the growth of mung beans over time.</td>
</tr>

<tr>
<td class="main topic name">Mission: Acetaminophen Accelerator</td>
<td class="main topic">Manotri Chaubal, Maria Kanevsky, Kinsey Moser, and Alison Yu</td>
<td class="main">This presentation describes the effect of Tylenol&#174; on the net primary production rate of grass.</td>
</tr>

<tr>
<td class="main topic name">One Mass, Two Mass, Big Pond, Small Pond</td>
<td class="main topic">Tiffney Kathir, Madison Phillips, and Lily Gu</td>
<td class="main">This project studies the effect of vernal pool area of the number of spotted salamander (Ambystoma maculatum) egg masses in the pool.</td>
</tr>

<tr>
<td class="main topic name">pHantastic pH!</td>
<td class="main topic">Angela Pham, Joohwan Kim, Kate Hao, and Varun Jain</td>
<td class="main">This presentation describes the effect of pH of the water at a certain depth on the size and mass of Ambystoma maculatum egg masses.</td>
</tr>

<tr>
<td class="main topic name">pHinding pH</td>
<td class="main topic">Nikhil Bhattasali, Veronica Lee, Priya Shankar, and Jessica Shen</td>
<td class="main">This presentation describes the effect of water pH on the location and abundance of spotted salamander egg masses.</td>
</tr>

<tr>
<td class="main topic name">Protect This House</td>
<td class="main topic"> Tushar Govil, Lucas Kang, Yana Kaplun, and Aaron Zhao</td>
<td class="main">This presentation examines the effect of different types of plants on the effectiveness of green roof insulation.</td>
</tr>

<tr>
<td class="main topic name">Round Up Those Hydra</td>
<td class="main topic">Avand Lakmazaheri, Jonathan Leidenheimer, Caroline Murton, and Alexandra Zytek</td>
<td class="main">This presentation describes the effect of the weed killer Round-Up&#174; has on the reproduction rate of hydra.</td>
</tr>

<tr>
<td class="main topic name">Salamander Spring Break</td>
<td class="main topic">Daniel Fontenot, Ankit Goyal, Roy Rinberg, and Daniel Stiffler</td>
<td class="main">This presentation shows the effect of soil temperature on the  migration patterns of Ambystoma maculatum.</td>
</tr>

<tr>
<td class="main topic name">Say No to Miracle-Gro</td>
<td class="main topic">Maran Ilanchezhian, Parag Shukla, Chris Kim, and Conner Mclernon</td>
<td class="main">This presentation explores how fertilizers such as Miracle-Gro(TM) effect aquatic organisms like Daphnia.</td>
</tr>

<tr>
<td class="main topic name">Stop! Don&#146;t Eat That Shrimp!</td>
<td class="main topic">Edward Chung, Josh Denty, Sara Felsen, and Olivia Sorto</td>
<td class="main">This presentation describes the effects of potassium chloride (a common road salt) on the movement of brine shrimp.</td>
</tr>

<tr>
<td class="main topic name">Swimming Under the Influence</td>
<td class="main topic">Rishi Gupta, Sayed Malawi, and Robert Wang</td>
<td class="main">This presentation describes the effect of ethyl alcohol on the light-induced vertical migration of amphipods (genus Gammarus).</td>
</tr>

<tr>
<td class="main topic name">Take a Chill Pill...of Theanine</td>
<td class="main topic">Irene Hwang, Priyadharshini Seetharaman, and Kameron Wong</td>
<td class="main">This presentation describes the effect of theanine on the relaxation speed of Chlorohydra viridissima.</td>
</tr>

<tr>
<td class="main topic name">Take It With a Grain of Salt</td>
<td class="main topic">Arjun Iyer, Wesley Poon, Daniel Sainati, and Sid Verma</td>
<td class="main">This presentation describes the effect of salt on the photosynthesis rate of B. monnieri.</td>
</tr>

<tr>
<td class="main topic name">The Curry Conjecture</td>
<td class="main topic">Sreenath Are, Naveen Ambati, Deebas Dhar, and Will Xu</td>
<td class="main">This presentation describes the effect of curcumin on the learning rate of planaria.</td>
</tr>

<tr>
<td class="main topic name">The Quick, the Dead, and the Slugly</td>
<td class="main topic">Will Ashe, Eric Bo, Suddy Sriram, and John Wood</td>
<td class="main">This presentation describes the effect of caffeine concentration on planarian regeneration rate.</td>
</tr>

<tr>
<td class="main topic name">The Race Against The Clock</td>
<td class="main topic">Quinnlan Sweeney, Merete Lund, Nathan Dass, and Amelia Griese</td>
<td class="main">This presentation describes the effects of inorganic and organic fertilizer on the learning rate of damselfly nymphs.</td>
</tr>

<tr>
<td class="main topic name">Too Hot? Too Cold? Just Right</td>
<td class="main topic">Luke Kuprenas, Allen Parker, Hannah Pho, and CheyAnne Rivera</td>
<td class="main">This presentation describes the effect of environment temperature on the timing of spotted salamander migration.</td>
</tr>

<tr>
<td class="main topic name">Turn Up the Heat</td>
<td class="main topic">Grace Chuang, Hunter Clark, Maddy Martin, and Kaylyn Buford</td>
<td class="main">This presentation searches for ways to improve the quality of compost, and describes the effect of temperature and oxygen on compost through testing for nitrogen.</td>
</tr>

<tr>
<td class="main topic name">Water Slaughter</td>
<td class="main topic">Larry Hensley, Avin Khera, Hari Sridhar, and Madeleine Guyant</td>
<td class="main">This presentation describes the effects of land use on overall water quality.</td>
</tr>



</table>

<br />

<a href="#top" style="float:middle;">&#8593; Back to top</a><br><hr>

<!-- D BLOCK -->

<a name="dblock"></a><h3>Block D</h3>
<table class="tbb">
<tr>
<td class="top"><b>Title</b></td>
<td class="top"><b>Presenters</b></td>
<td class="top"><b>Description</b></td>
</tr>

<tr>
<td class="main topic name">Beyond the Surface</td>
<td class="main topic">Mijue Kwon, Rachel Laveson, and Victoria Li</td>
<td class="main">This presentation describes the effect of water depth on the number of spotted salamander (Ambystoma maculatum) egg masses found in a Northern Virginian vernal pool.</td>
</tr>

<tr>
<td class="main topic name">Clean Up with Cancer?</td>
<td class="main topic">Hassan El Tinay, Patricia Gallegos, Nithin Bala, and Navya Thippana</td>
<td class="main">This presentation describes the negative effects of UV radiation on the amount of fecal coliform in pond water.</td>
</tr>

<tr>
<td class="main topic name">Clean up, Clean up, Chlorella, Do Your Share</td>
<td class="main topic">Parth Chopra, Nidhi Gandhi, and Rishabh Mazmudar</td>
<td class="main">This presentation describes the effect of light exposure on the bioremediation rate of vegetable oil.</td>
</tr>

<tr>
<td class="main topic name">Damselflies in Distress</td>
<td class="main topic">Mya Abousy, Cara Cunningham, Robert Kelly, and Andy Triculescu</td>
<td class="main">This presentation describes the effect of varying concentrations of caffeine on damselfly nymphs as well as applies it to our modern society which heavily relies on this neuroactive drug.</td>
</tr>

<tr>
<td class="main topic name">Daphnia with a Spin</td>
<td class="main topic">David Chae, Shane Kramer, and Sam Ober</td>
<td class="main">This presentation demonstrates the effect of gravity on the movement of Daphnia magna.</td>
</tr>

<tr>
<td class="main topic name">Do Spotted Salamanders Come Back?</td>
<td class="main topic">Christopher Chen, Nebeyu Daniels, Akshay Mishra, and Victor Wang</td>
<td class="main">This presentation describes The Effect of the Ratio of Cloudy to Clear Egg Masses on Pond Fidelity.</td>
</tr>

<tr>
<td class="main topic name">Eggstraordinary Vernal Pools</td>
<td class="main topic">Gloria Cho, Stacey Chobany, and Caitlin Kim</td>
<td class="main">This presentation describes the effect of constructed vernal pools on the number of spotted salamander egg masses versus the number of egg masses in natural vernal pools.</td>
</tr>

<tr>
<td class="main topic name">Go With the Flow</td>
<td class="main topic">Christine Mayuga, Ashley Xue, Mira Holford, and Andrew Huang</td>
<td class="main">The presentation details on the detrimental effects of water flow on streams.</td>
</tr>

<tr>
<td class="main topic name">Green Up, Cool Down!</td>
<td class="main topic">Saad Guliwala, Varun Kumar, Evan Morris, and Jennie Yun</td>
<td class="main">This presentation describes the insulating properties of a green roof on a building model.</td>
</tr>

<tr>
<td class="main topic name">Hide Your Kids! Hide Your Wife! Cause Those Macroinvertebrates are All Over the Salamanders Tonight!</td>
<td class="main topic">Tarun Prabhala, Raeford Penny, Kenneth Hau, and Anirudh Surumpudi</td>
<td class="main">This presentation describes the effect of benthic macroinvertebrate biodiversity on amount of Ambystoma maculatum egg masses.</td>
</tr>

<tr>
<td class="main topic name">High Voltage Wires, Magnetism, Water, and Daphnia, What Could Go Wrong?</td>
<td class="main topic">Kyle Alexander, Romain Debroux, and David Soukup</td>
<td class="main">This presentation shows the effect of magnetism on the heart rate of Daphnia pulex.</td>
</tr>

<tr>
<td class="main topic name">Hot or Not: Salamander Migration</td>
<td class="main topic">Daniel Carris, Ken Qi, Jamie Simon, and Daniel Suzuki</td>
<td class="main">This presentation discusses the effect of the ratio of soil to air temperature on the migration of the spotted salamander in a northern Virginian vernal pool.</td>
</tr>

<tr>
<td class="main topic name">It&#146;s Not Easy Being Green</td>
<td class="main topic">Alyssa Bruce, Julie Kim, Maria Psarakis, and Megan Ganley</td>
<td class="main">This presentation describes the effect of organic and inorganic fertilizer on the nitrate and phosphate content of runoff water from grass.</td>
</tr>

<tr>
<td class="main topic name">Jurrasic Pond: World Underneath the Leaf Litter</td>
<td class="main topic">Steven Bunting, Tim Ruiter, Jason Huang, and Zartosht Ahlers</td>
<td class="main">This presentation shows the effect of leaf litter abundance on the pH of vernal pools and on spotted salamander egg masses.</td>
</tr>

<tr>
<td class="main topic name">L-O-Elodea</td>
<td class="main topic">James Wang, Turner Arndt, Nathaniel Eubanks, and Andrew Snyder</td>
<td class="main">This presentation shows the effect of pesticides on elodea growth.</td>
</tr>

<tr>
<td class="main topic name">Learning at the Speed of Sound</td>
<td class="main topic">Andrea Li, Jessica Sun, Brian Womeldurf, and Kiwoong Kim</td>
<td class="main">This presentation describes the role of sound frequency in phototaxic conditioning of Schmidtea dorotocephala.</td>
</tr>

<tr>
<td class="main topic name">License to Kill</td>
<td class="main topic">Group 007: Katie Valery, Cyrus Tabrizi, Aditya Chaudhry, and Daniel Belin</td>
<td class="main">This presentation describes the effects of shining various ultraviolet wavelengths on water samples containing fecal coliform.</td>
</tr>

<tr>
<td class="main topic name">Like a Good Neighbor, Riparian is There</td>
<td class="main topic">Jamie Kim, Jason Kim, Clara Pitts, and Rahul Ramraj</td>
<td class="main">This presentation describes the effect of the Lamiastrum galeobdolon as a riparian buffer on the nitrate concentration in water.</td>
</tr>

<tr>
<td class="main topic name">Magnetism, the Invisible Mind Controller</td>
<td class="main topic">Daniel Carballo, Taylor Yohe, Albert Andrews, and Alec Sorensen</td>
<td class="main">This presentation discusses the effect of electromagnetic radiation on navigational abilities of magnetoreceptive organisms.</td>
</tr>

<tr>
<td class="main topic name">Making a Better Mud Pie</td>
<td class="main topic">Mia Gross, Elizabeth Chang, David Weisiger, and Alex Aulabaugh</td>
<td class="main">This presentation compares the soil and water quality of two streams to evaluate the impact of pollutants.</td>
</tr>

<tr>
<td class="main topic name">Nitrates and Phosphates and Daphnia, oh my!</td>
<td class="main topic">Lakshmi Chandran, Jordan Goodson, and Meena Nayagam</td>
<td class="main">This presentation describes the effect of varying nitrate and phosphate levels on Daphnia magna survivorship.</td>
</tr>

<tr>
<td class="main topic name">No Wonder Daphnia Don't Go to the Beach...</td>
<td class="main topic">Jennifer Du, Tushar Maharishi, Anudeep Mangu, and Vamsi Veeramasu</td>
<td class="main">This presentation describes the effect of propylene glycol, a chemical found in many everyday products, on Daphnia heart rate.</td>
</tr>

<tr>
<td class="main topic name">Nothing Stops Nitrate</td>
<td class="main topic">Luke Barbano, Kunal Khurana, Nathan Kim, and Grace Zeng</td>
<td class="main">This presentation describes the effect of nitrates on the growth rate of Bacopa monniera.</td>
</tr>

<tr>
<td class="main topic name">One Egg, Two Egg, Shallow Pond, Deep Pond</td>
<td class="main topic">Pavan Krishnan, Rohan Banerjee, Venkat Kanakala, and Andrew Wu</td>
<td class="main">This presentation describes the effect of vernal pool depth on the concentration of salamander egg masses.</td>
</tr>

<tr>
<td class="main topic name">pHatal pH: pHact or pHiction?</td>
<td class="main topic">Connor Hennessey-Niland, Carl Fremlin, Andrew Corzo, and Erik Haukenes</td>
<td class="main">This project describes the effect of pH levels at different pool depths on the amount of egg masses.</td>
</tr>

<tr>
<td class="main topic name">Planaria Getting High on Caffeine</td>
<td class="main topic">Sooraj Achar, Ravali Goda, Likhitha Kolla, and Ricardo Tucker</td>
<td class="main">This presentation describes the effect of Caffeine on the movement and speed of Planaria.</td>
</tr>

<tr>
<td class="main topic name">Plants Tanning Away Their Future</td>
<td class="main topic">Monica Grover, Aseem Jain, Lohit Palle, and Florencia Son</td>
<td class="main">This presentation describes the effects of ultraviolet radiation on the growth of Elodea densa, and the potential effect on the environment.</td>
</tr>

<tr>
<td class="main topic name">Pump It Up</td>
<td class="main topic">Krishna Jayaraj, Jimmy Wei, Aparajita Sur, and Sunny Song</td>
<td class="main">This presentation describes the effect of varying acidic and basic solutions on the heart rate of Daphnia magna.</td>
</tr>

<tr>
<td class="main topic name">Spice Up Your Daphnia</td>
<td class="main topic">Liesl Jaeger, Navya Kambalapally, and Deepika Mukhara</td>
<td class="main">This presentation describes the effect of the spice turmeric on Daphnia magna.</td>
</tr>

<tr>
<td class="main topic name">Spotty Potter and the Chamber of Soil Temperature</td>
<td class="main topic">Anwar Omeish, Keertana Srinivasan, Snigdha Srivastava, and Lucia Tian</td>
<td class="main">This presentation analyzes the effect of soil temperature on spotted salamander migration numbers.</td>
</tr>

<tr>
<td class="main topic name">Super Mold Me!</td>
<td class="main topic">Matt Zhou, Chandan Singh, Kush Kakkad, and Surya Gourneni</td>
<td class="main">This presentation describes the effects of different types of decomposition on french fries.</td>
</tr>

<tr>
<td class="main topic name">Sweet Dreams, Little Crayfish</td>
<td class="main topic">Sindhura Kolachana, Lauren Mostrom, and Angela Tang</td>
<td class="main">This presentation describes the effect of different dosages of melatonin on the amount of time crayfish sleep.</td>
</tr>

<tr>
<td class="main topic name">Today's Special: Oiled Shrimp with a Side of Fresh Greens</td>
<td class="main topic">Hana Chan, Alexander Le Floch, and Elise Favia</td>
<td class="main">The purpose of this experiment was to demonstrate the bioremediation qualities of different types of freshwater plants on ghost shrimp activity in a simulated oil spill.</td>
</tr>

<tr>
<td class="main topic name">Wee Beasties and Their Egg Mass Buddies</td>
<td class="main topic">Ben Carniol, Adam Friedman, Andy Holsten, and Ryan Lee</td>
<td class="main">This presentation describes the effect of the population of Copepods on the number of Spotted Salamander egg masses.</td>
</tr>

<tr>
<td class="main topic name">When Life Gives You Lemons, Make New Limbs</td>
<td class="main topic">Arvind Gupta, Dillan Chang, Peter Tan, and Stephen Hu</td>
<td class="main">This presentation describes the effect of Vitamin C on the regeneration of planaria.</td>
</tr>

<tr>
<td class="main topic name">Why did the Salamander Cross the Road?  To Lay Eggs. Duh</td>
<td class="main topic">Ashley Kim, Christin Park, Patrick Wang, and David Zhao</td>
<td class="main">This presentation describes the effect of a vernal pool's distance from a paved road on the amount of spotted salamanders and egg masses.</td>
</tr>



</table>

<br />

<a href="#top" style="float:middle;">&#8593; Back to top</a><br><hr>

<!-- E BLOCK -->

<a name="eblock"></a><h3>Block E</h3>
<table class="tbb">
<tr>
<td class="top"><b>Title</b></td>
<td class="top"><b>Presenters</b></td>
<td class="top"><b>Description</b></td>
</tr>

<tr>
<td class="main topic name">Brain Food for Crayfish</td>
<td class="main topic">Daniel Abraham, Chris Doan, Tara Gupta, and Soumya Mishra</td>
<td class="main">This presentation describes the effect of cacao concentration on the learning ability of crayfish.</td>
</tr>

<tr>
<td class="main topic name">Building a Better Future</td>
<td class="main topic">Madeline Reinsel, Catherine Shi, and Nita Takanti</td>
<td class="main">This presentation describes the effect of constructed wetland characteristics on the spotted salamander egg mass count in a vernal pool.</td>
</tr>

<tr>
<td class="main topic name">Egg Masses on the Deep End</td>
<td class="main topic">Heun Min, Saehee Jung, and Joseph Kannarkat</td>
<td class="main">This presentation describes the effect of water depth of Hight Point II Pond on the amount of egg masses laid by the spotted salamanders.</td>
</tr>

<tr>
<td class="main topic name">Let's Hit The Road</td>
<td class="main topic">Dominic Fritz, Asa Kaplan, Josh Kweon, and Miraj Patel</td>
<td class="main">This presentation describes the effect of pond isolations on the egg mass count of spotted salamanders.</td>
</tr>

<tr>
<td class="main topic name">Veggies and Wee-Beasties-- Together Forever!</td>
<td class="main topic">Sparsh Gupta, Seong Jang, Melissa Le, and Anna Seo</td>
<td class="main">This presentation describes the realtionship between vegetaion and macroinvertebrates.</td>
</tr>


</table>

<br />

<a href="#top" style="float:middle;">&#8593; Back to top</a><br><hr>

<?php include("footer.php"); ?>
