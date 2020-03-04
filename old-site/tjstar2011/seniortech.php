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
$login_name = "seniortech_php_login_2011.php";

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
	max-width:250px;
	font-size:14px;
}
.name {
	max-width:250px;
	line-height:20px;
}
.top{
	padding:5px;
}
.panel{
	font-weight:bold;
}
table {
	border-collapse:collapse;
}
hr {
	border:1px solid gray;
}
</style>

&#8594; Jump to: <a href="#astro">Astronomy</a> | <a href="#bio">Biotechnology</a> | <a href="#cad">CAD</a> | <a href="#chem">Chemical Analysis</a> | <a href="#comm">Communication Systems</a> | <a href="#cs">Computer Systems</a> | <a href="#energy">Energy Systems</a> | <a href="#micro">Microelectronics</a> | <a href="#neuro">Neuroscience</a> | <a href="#ocean0">Oceanography</a> | <a href="#optics">Optics/Modern Physics</a> | <a href="#proto">Prototyping</a> | <a href="#robo">Robotics</a>

<h1>Senior Tech Projects</h1>

<p>
Senior Tech Lab Projects are year-long projects that all Seniors must complete in a research lab of their choosing.  Labs range from the Chemical Analysis Lab and the Neuroscience Lab to the Energy Systems Lab and the Computer Systems Lab.  Senior students will be presenting the results of their research during the symposium.  Find out more about the research labs at the <a href="http://www.tjhsst.edu/discovery/labs/">main TJ website</a>.
</p>

<!-- Astronomy -->

<a name="astro"></a><h3>Astronomy</h3>
<table class="tbb">
<tr>
<td class="top"><b>Presenters</b></td>
<td class="top"><b>Title</b></td>
<td class="top"><b>Description</b></td>
</tr>

<tr>
<td class="main topic name">Cassidy Walsh and Holly Jachowski - Block A</td>
<td class="main topic">The Search for Subsurface Ice In and Around Gusev Crater</td>
<td class="main">The objective of this project was to compare evidence of water-ice in Mars Louth and Korolev craters
to features in the sub-equatorial region in and around Gusev crater on Mars to determine the existence
of subsurface ice and pingos there.</td>
</tr>

<tr>
<td class="main topic name">Bartholomew Bachman - Block A</td>
<td class="main topic">Calculating the Age of Iapetus through the use of a Crater Density Count</td>
<td class="main">Iapetus has long been the source of wonder due to its strange walnut-like shape and its di-tonal surface coloration. In this project, a crater density count was performed to calculate an age of the surface of Iapetus, giving a good idea of when the satellite was formed. Two separate ages were also calculated for the bright and dark regions of Iapetus for comparison and speculation about possible causes of the different coloration.</td>
</tr>

<tr>
<td class="main topic name">Kelli Keith - Block A</td>
<td class="main topic">The Effect of X-Ray Flare Radiation on the Occurance of Geomagnetic Storms in the Earth's Magnetosphere</td>
<td class="main">This project explores the effects of x-ray flare radiation on the Earth's magnetosphere and the geomagnetic storms that result from it.</td>
</tr>

<tr>
<td class="main topic name">Casey Huang - Block A</td>
<td class="main topic">Simulation of Solar Magnetic Field Strength</td>
<td class="main">Sunspots are generally thought to be formed as a magnetic flux tube pierces the sun's surface, though little is actually known. This study attempts to uncover more of the unknown, describing the change in the magnetic field strength as sunspots are formed.</td>
</tr>

<tr>
<td class="main topic name">Trami Pham - Block A</td>
<td class="main topic">Analyzing Supernova 1987A</td>
<td class="main">The closest supernovae event to occur before supernova 1987A was in 1604. Since then, astronomers have been trying to make close observations of this event. However, after SN 1987A, astronomers have the chance to closely observe a supernova and make conclusions about supernovae in general.</td>
</tr>

<tr>
<td class="main topic name">Katya Davydova - Block B</td>
<td class="main topic">Seeking Supernovae and Gazing for Galaxies</td>
<td class="main">This project aims to draw conclusions based on classification of static images of both supernovae and galaxies obtained from the Galaxy Zoo database. Certain variables, such as roundness of the supernova or shape of the galaxy will be used to find correlations between properties of the two phenomena.</td>
</tr>

<tr>
<td class="main topic name">Philip Song - Block B</td>
<td class="main topic">The Location, Strength, and Behavior of Martian Methane</td>
<td class="main">There has been a recent detection of methane on Mars, coming from 3 very localized areas.  A mystery about the methane is that it is being destroyed in the atmosphere rapidly.  This project is to simulate the movement of the methane through the use of a computer program and analyzing the winds on Mars.</td>
</tr>

<tr>
<td class="main topic name">Alla Herman - Block B</td>
<td class="main topic">Tracking Storms on Jupiter</td>
<td class="main">Using the radio equipment on the roof of TJ, radio emissions resulting from the interaction between Jupiter and its innermost moon, Io, were able to be collected and analyzed. This will give us more information about the relationship between planets and their moons.</td>
</tr>

<tr>
<td class="main topic name">Benedict Nguyen - Block B</td>
<td class="main topic">Estimating the Age of Eros with a Crater Density Count</td>
<td class="main">In 2000, the NEAR Shoemaker spacecraft entered the orbit of the asteroid 433 Eros, an irregularly-shaped near Earth object. A crater density count was performed on available images of the asteroid 433 Eros to determine relative aging and various cratering trends throughout the body.</td>
</tr>

<tr>
<td class="main topic name">Catherin Zucker - Block B</td>
<td class="main topic">Study of Martian Dune Migration</td>
<td class="main">Analyzing how the wind regime and atmospheric conditions on Mars affect dune migration. The image processing package ImageJ was used in order to document changes in the dunes.</td>
</tr>

<tr>
<td class="main topic name">Miles Le - Block B</td>
<td class="main topic">Effect of Sunspot Polarity on Solar Flare Magnitude</td>
<td class="main">This project attempts to find a correlation between the polarity of sunspots and the strength of solar flares, which are caused by magnetic activity hence the focus on sunspots, which are areas of intense magnetic activity on the Sun's surface.</td>
</tr>

<tr>
<td class="main topic name">Tracy Esman - Block B</td>
<td class="main topic">An Investigation of Exoplanets: Hot Jupiters and Habitable Zones</td>
<td class="main">The characteristics of hot Jupiters and planets within habitable zones were investigated in order to look for trends in the data and characterize exoplanets within habitable zones. The goal was to better understand how planetary systems hosting hot Jupiters form and determine the best locations to search for alien life.</td>
</tr>

<tr>
<td class="main topic name">Robin Lashof - Block B</td>
<td class="main topic">The Effects of Planetary Perturbations on Comet Orbits</td>
<td class="main"></td>
</tr>

<tr>
<td class="main topic name">Samantha Schipani - Block D</td>
<td class="main topic">Observing Narrow Band Regions of Low Energy Active Galactic Nuclei</td>
<td class="main">Using the Multimission Archie at STSci (MAST) to retrieve data and the IRAF software to analyze the data, I observed the narrow-band regions, specifically the O-III and H-alpha regions, of Active Galactic Nuclei (AGN).  These observatiosn will beused to determine if a correlation exists betweent he properties of the narrow-band regions (including similarities in size and angular extent) and the energy they emit.</td>
</tr>

<tr>
<td class="main topic name">Candice Kaplan - Block D</td>
<td class="main topic">The Effect of Solar Weather on the Ionosphere</td>
<td class="main">Solar radio storms were recorded at TJHSST using NASA's Radio JOVE materials, and sudden ionospheric disturbance data were recorded at TJHSST using the Stanford SIDs materials. The two data sets were compared to find a correlation between solar radio storms and increased ionization in Earth's ionosphere.</td>
</tr>

<tr>
<td class="main topic name">Tiffany Wu - Block D</td>
<td class="main topic">Analysis of Host Galaxies of Active Galactic Nuclei</td>
<td class="main">This project examines the differences in features between host galaxies of Active Galactic Nuclei (AGNs) and other galaxies to determine whether there is a relationship between the presence of an AGN and the distortion of the host galaxy, particularly due to merging.</td>
</tr>

<tr>
<td class="main topic name">William Bundy - Block D</td>
<td class="main topic">A Crater Density Count of Regions of Mars to Determine Relative Age</td>
<td class="main">This project was an observation of the crater impacts on the Olympus Mons and Arsis Mons volcanoes as well as the Noachian, Hesperian, and Amazonian regions of Mars. Through analysis of the crater density counts, I have determined how the various regions rank in age.</td>
</tr>

<tr>
<td class="main topic name">Taylor Carter - Block D</td>
<td class="main topic">Inflated Lava Flows on Mars</td>
<td class="main"></td>
</tr>


</table>

<br />

<a href="#top" style="float:right;">&#8593; Back to top</a><br /><hr>

<!-- Biotech -->

<a name="bio"></a><h3>Biotechnology</h3>
<table class="tbb">
<tr>
<td class="top"><b>Presenters</b></td>
<td class="top"><b>Title</b></td>
<td class="top"><b>Description</b></td>
</tr>

<tr><td class="main topic name" style="text-align:center; font-weight:bold;" colspan=3>Cobb</td></tr>

<tr>
<td class="main topic name">Amber Lee - Block A</td>
<td class="main topic">Airway Epithelium's Role in Asthmatic Inflammation and Remodeling</td>
<td class="main">Dexamethasone or untreated normal and asthmatic human airway epithelia were exposed to scrape wounding and cytokines were measured from these cells.</td>
</tr>
<tr>
<td class="main topic name">Sulan Zheng - Block A</td>
<td class="main topic">RNA-based functional genomics approach to identify markers related to vascular leakage and/or adhesion using Y. pestis</td>
<td class="main">The biological mechanism with which Y. pestis disrupts cellular adhesion in endothelial cells remains unclear. This study takes a top-down approach to characterizing this pathway by utilizing a custom library of short interfering RNA (siRNA) to knock down gene expression in human lung microvascular endothelial cells (HMVEC-L). HMVEC-L were shown to maintain ~80% viability post-transfection. We targeted genes which may play a role in Y. pestis' interference with the formation of endothelial cellular junctions.</td>
</tr>
<tr>
<td class="main topic name">Vaishnavi Kosuri - Block A</td>
<td class="main topic">A Novel Transgenic Mouse Model Identifies Early Onset of Atherosclerosis in ApoE deficient Mice</td>
<td class="main">Atherosclerosis is a prevalent disorder in arterial wall, where plaque buildup causes narrowing of blood vessels leading to heart attack or stroke. Atherosclerosis indirectly results in the activation of vascular cell adhesion molecule 1 (VCAM1). Secretaory alkaline phosphatase (SEAP) is a secreted enzyme that is stable in blood and is a reasonable reporter system for gene activation. We predicted that generating transgenic mice with the SEAP gene attached to a VCAM1 promoter will facilitate detection of early onset atherosclerosis. Using these transgenic mice, SEAP levels can be correlated to atherosclerosis levels in mice. Because we test by blood withdrawal instead of measuring aortic lesions, we keep mice from sacrifice.</td>
</tr>
<tr>
<td class="main topic name">Divya Madhusudhan - Block B</td>
<td class="main topic">Cytogenetic and thrombopoietic abnormalities in megakaryocytes of patients with myelodysplastic syndrome</td>
<td class="main">Myelodysplastic syndromes (MDS) are disorders in which platelet-forming cells, megakaryocytes, are defective. This study tests a technique to sort these cells and examines the effect of the platelet-producing drug, eltrombopag, on megakaryocyte death and maturation. Megakaryocyte DNA was stained and the cells were sorted based on DNA content. Cells with more DNA were normal, and with less, abnormal. Separating these cells will allow us to examine differences in protein expression and develop MDS therapies. Megakaryocytes cultured in eltrombopag were stained with antibodies to test cell death and maturation. Findings showed cell death decreased with eltrombopag, a potential MDS therapy. MDS megakaryocyte research will hopefully lead to better treatments.</td>
</tr>
<tr>
<td class="main topic name">Gireesh Reddy - Block B</td>
<td class="main topic">Characterization of Gulf of Mexico  Aquatic Bacterial Populations in vitro after  Corexit EC9500A and Oil Exposure</td>
<td class="main">By analyzing Corexit and oil contaminated Gulf water, we hope to understand the effects of dispersant use on the hydrocarbon degrading microbial community of the Gulf.  In this study, Corexit 9500A and oil are shown to affect the microbial populations of the Gulf of Mexico significantly from the control group. The oil group most closely resembles that of the control group in terms of bacterial diversity and population intensity. When corexit is added, it promotes the increased abundance of different operational taxonomic units (OTUs), namely those in the 310 to 313 base pair range. From the Bray-Curtis dissimilarity analysis we note that the control, oil, and some of the corexit + oil samples are closely clustered together, indicating similar population characteristics. The two end points of both corexit groups are very different from the two end points of the control and oil group. Through this study using the methods of DNA fingerprinting and bacterial plating, we can strongly suggest that corexit may indeed have a role in changing the microbial populations of the Gulf of Mexico.</td>
</tr>
<tr>
<td class="main topic name">Jad Tabbara - Block B</td>
<td class="main topic">Analyzing and Comparing Transitional Tumor Cells with Stem-like Qualities</td>
<td class="main">To discover new targets for cancer therapy, I set out to define cancer stem cells through in vitro analyses of tumors from neuroblastoma human models, derived from NB cell line IMR-32. Analysis of these cells revealed stem-like features. These cells grow in tumorspheres in serum free media (Neurocult) and -under appropriate conditions- are capable of eliciting self-renewal capacity and multi-lineage differentiation. The tumor cells are transitional and can be induced to either the adhered (epithelial) or anchorage independent (mesenchymal/stem-like) phenotype.  I use these observations to define a growth factor mediated transitional tumor cell with stem-like qualities and enhanced malignant properties.</td>
</tr>
<tr>
<td class="main topic name">Lydia Luu - Block B</td>
<td class="main topic">The formation and propagation of the prion [PSI+] in the yeast Saccharomyces cerevisiae in response to exposure to acidic conditions</td>
<td class="main">This presentation explores prions, or misfolded proteins, and their role in the model yeast organism S. cerevisiae. Though prions cause neurological diseases such as Alzheimer's and mad cow disease in mammals, they may be linked to increasing species' fitness in environmentally stressful conditions.</td>
</tr>
<tr>
<td class="main topic name">Venkat Iyer - Block B</td>
<td class="main topic">Crystallization of a Novel Malarial Protein, CelTOS, for X-ray Crystal Structure Determination and Anti-malarial Development</td>
<td class="main">Ookinetes and sporozoites are the malarial parasites that promote transmission of malaria between mosquito and vertebrate hosts. A critical function of the parasite is its ability to traverse layers of cells to establish itself in the livers of vertebrate hosts. CelTOS is a novel protein involved in the movement of the parasite through single-cell epithelial layers. CelTOS is localized to motility (movement) organelles called micronemes, which translocate proteins along the surface of the cell. Research studies have shown that disruption of the CelTOS gene diminished parasite infectivity in mosquitoes and in liver.  In order to examine the druggability of CelTOS, a proposal was made to elucidate the X-ray crystal structure of the protein.  By determining the structure of CelTOS through X-ray crystallographic techniques, subsequent research can be conducted to aid in the development of anti-malarials that target the mosquito vector as well as humans..</td>
</tr>
<tr>
<td class="main topic name">Jamie Kim - Block B</td>
<td class="main topic">Can a Stem Cell Dye Be Used to Characterize Populations of Cancer Cells?</td>
<td class="main">Cancer tumors are heterogeneous in nature and thus difficult to treat.  Can a stem cell dye be used to characterize the tumor cells?</td>
</tr>
<tr>
<td class="main topic name">Jee In Seo - Block B</td>
<td class="main topic">The Effect of CuI(Bpy)(Phen) on CHO Cancer Cell Cytotoxicity</td>
<td class="main">To see whether CuI(bpy)(phen) can kill CHO cells at different concentrations and different incubation time levels.</td>
</tr>
<tr>
<td class="main topic name">Johnny Pulice - Block B</td>
<td class="main topic">Mutation Rate Analysis in E. coli</td>
<td class="main">E. coli use the DNA Polymerase III enzyme to replicate their genome. By inserting and extracting a replicated plasmid, mutation rates were analyzed based on effects UV light and mutagens.</td>
</tr>
<tr>
<td class="main topic name">Luis Bourgeois - Block B</td>
<td class="main topic">Oil Spill Bioremediation: Comparing the Effectiveness of Dispersants Produced by Two Marine Bacteria</td>
<td class="main">An environmentally friendly way of cleaning up oil spills is through bioremediation, or using microorganisms to return an environment to its original state. I compared the effectiveness of dispersants produced by two marine bacteria, Alcanivorax borkumensis and Acinetobacter calcoaceticus RAG-1, on oil spills.</td>
</tr>
<tr>
<td class="main topic name">Rachel Song - Block B</td>
<td class="main topic">The Effect of Mycosporine-like Amino Acids on UV Radiation Absorption</td>
<td class="main">The sun gives off both warmth and radiation. Some of this radiation however falls in the harmful range of UV-B radiation. UV-B radiation, if exposed to it for a long period of time, can cause skin diseases and cancers. Meanwhile, some algae species flourish in shallow waters which are exposed to large amounts of sunlight however do not experience great damage from UV-B radiation. Among other sun-protectants, these algae have secondary metabolites called mycosporine-like amino acids (MAAs). This study works with MAAs and their ability to effectively absorb UV-B radiation which causes damage to cells.</td>
</tr>
<tr>
<td class="main topic name">Ester Yang - Block B</td>
<td class="main topic">Water Soluble New Materials for Photosensitization of Singlet Oxygen via One-,or Two-Photon Excitation</td>
<td class="main">The objective of this project is to develop a novel class of highly efficient and photostable photosensitizers based on modified porphyrins or squaraine moieties which absorb at long wavelength or can utilize near IR light (700 ~ 900 nm). Many modifications are aimed at decreasing the band-gap energy, thus shifting the linear absorbance further into the near IR.</td>
</tr>
<tr>
<td class="main topic name">Graham Lobel - Block B</td>
<td class="main topic">Wound Healing In Astrocytes</td>
<td class="main">We are looking for the transcription factor that induces astrocytes to begin reactive gliosis.</td>
</tr>
<tr>
<td class="main topic name">Riley Ennis - Block B</td>
<td class="main topic">Understanding the Crosstalk Between Contrasting Receptor Systems of the Kidney</td>
<td class="main">The present study looks at hypertension, a multifactorial disorder that is defined as sustained elevated blood pressure, and how certain receptor systems play a role in blood pressure regulation.</td>
</tr>
<tr>
<td class="main topic name">So-Hyun Baik - Block B </td>
<td class="main topic">The Heterodimerization between PDGFR and other Cell Surface Receptors using In vivo Proximity Ligation Assay</td>
<td class="main">Study focused on using sensitive and specific technology in order to detect heterodimierzation of receptor tyrosine kinases.</td>
</tr>
<tr>
<td class="main topic name">Swetha Rao - Block B</td>
<td class="main topic">Understanding Dynamic Interactions of Self Organization of Danio rerio Lateral Line</td>
<td class="main">Computational models were built and tested to predict how posterior lateral line primordium migrates and deposites neuromasts for lateral line formation. </td>
</tr>
<tr>
<td class="main topic name">Jennifer Zhao - Block C</td>
<td class="main topic">How Cytokines Employ Transcription Factors to Control MicroRNAs</td>
<td class="main">STAT are a family of transcription factors that mediate cytokine induction of MicroRNAs.  Our model studies how genes are activated and deactivated.</td>
</tr>
<tr>
<td class="main topic name">Monica Liu - Block C</td>
<td class="main topic">Human GRK4 variants regulate renal angiotensin AT1 receptor expression</td>
<td class="main">A clarification of the genetic basis and pathway behind essential hypertension</td>
</tr>
<tr>
<td class="main topic name">Virginia Lehman - Block C</td>
<td class="main topic">Expression and Characterization of Human Prolidase Variants</td>
<td class="main">Recombinant human prolidase variants were tested for their specificity and speed in binding nerve gas agents.</td>
</tr>
<tr>
<td class="main topic name">Kevin Zhou & Michael Nguyen - Block D</td>
<td class="main topic">Novel chimeric NR2 subunits may explain the molecular basis for spatial learning and memory</td>
<td class="main">How old were you when you had your first memory? Most people have their first memories when they were 3 - 5 years of age, when their hippocampi come online. These memories of one's past, called episodic memories, are deficient in many neurological disorders and thus was our area of study. We used spatial learning in mice as a model for human episodic memories because we can't ask a mouse, 'When was your first memory?' and expect a meaningful response. Our research, done at George Mason University, involved the molecular mechanisms for spatial learning and its implications.</td>
</tr>
<tr>
<td class="main topic name">Nayan Lamba - Block D</td>
<td class="main topic">The Effect of Alpha Tubulin (TUBA1A) Mutations on Neuronal Morphology and Migration</td>
<td class="main">In this study, we developed a system to study alpha tubulin mutations identified in patients with lissencephaly, a neuronal migration disorder. We then modeled these mutations in neurons to study their effects on the shapes and migration patterns of the neurons.</td>
</tr>
<tr>
<td class="main topic name">Akaash Gupta - Block D</td>
<td class="main topic">PDZ Binding Kinase as a Novel Biomarker for Prostate Cancer</td>
<td class="main">Prostate cancer is the second leading cause of cancer death in American men. Though we know the magnitude of the problem, our current methods of early detection are extremely inaccurate. This project aims to find a new, more accurate method of screening for prostate cancer.</td>
</tr>
<tr>
<td class="main topic name">Choong-Seoup Youn - Block D</td>
<td class="main topic">Regulation of Telomerase Activity in Prostate Cancer Cell by a Novel Protein, DEK</td>
<td class="main">The purpose of my project was to investigate the relationship between the oncoprotein DEK and the enzyme telomerase, which has been strongly implicated in many different cancers. Specifically, my project focused on the relationship between DEK and telomerase in a prostate cancer model to determine new potential anti-cancer drugs and genetic treatment options.</td>
</tr>
<tr>
<td class="main topic name">Jasleen Singh - Block D</td>
<td class="main topic">Examination of the Role of a Human Cytomegalovirus (HCMV) Short UL37 Protein Isoform</td>
<td class="main">"Human cytomegalovirus (HCMV), commonly known as Human Herpesvirus-5, is a member of the Herpesvirus family that causes opportunistic pathogenesis in immunocompromised individuals. HCMV is the leading viral cause of congenital birth defects in developed nations, with about 50-80% of Americans infected by age 40. The HCMV genome is organized into four regions: a unique long (UL) region, a unique short region, and two inverted repeats. One protein associated with this virus is the UL37 immediate early protein, which has many isoforms associated.This study aids in adding to these recent findings as the significance of understanding pUL37s is intrinsic to the overall understanding of HCMV. Understanding its mechanism in a basic science environment is the first step to developing treatments that will help those suffering from this disease."</td>
</tr>
<tr>
<td class="main topic name">Alvina Jiao - Block E</td>
<td class="main topic">Predicting the Hemotoxic Potential of 8-Aminoquinolines (8-AQs) in Glucose-6-Phosphate Dehydrogenase (G6PD)-Deficient Mice</td>
<td class="main">Glucose-6-phosphate-dehydrogenase (G6PD) deficiency is the most widespread human enzyme disorder, and can result from any of over 300 different mutations to the G6PD gene. The condition reduces the ability of erythrocytes to produce NADPH in the hexose monophosphate pathway, resulting in increased vulnerability to oxidative damage. Affected individuals may develop severe hemolytic anemia upon contact with a variety of substances, including infectious microbes, drugs, and certain foods. Hemolysis-inducing agents of particular interest are the 8-aminoquinolines (8-AQs), a class of potent and widely-used antimalarial drugs. The primary challenge pertaining to 8-AQs is to identify the specific drugs and dosages that are effective against malaria while minimizing any hemotoxic effects. The creation of an in vivo model to predict the hemolytic potential of 8-AQs is crucial to further antimalarial drug development.</td>
</tr>
<tr>
<td class="main topic name">Claire Cooper - Block E</td>
<td class="main topic">Specific microRNAs shift mouse embryonic stem cell fate towards the motor neural lineage through interaction with the JAK/STAT pathway</td>
<td class="main">The present study seeks to determine whether four miRNAs expressed upon the birth of neurons in the embryonic spinal cord can shift the differentiation of mouse embryonic stem (mES) cells toward the neural lineage, and if so, what types of neurons or neural precursors are generated and what mechanism is at work. Based on the literature and preliminary data, we hypothesize that the up regulation of these miRNAs in both in vivo and in vitro neurogenesis results in the differentiation of NPCs into Tuj1+ neurons. Furthermore, we hypothesize that the mechanism involves some combination of the four miRNAs binding to, and thus inhibiting, JAK family members, which are responsible for phosphorylating, and thus activating STAT3. The expression of STAT3 has been found to correlate with the onset of gliogenesis, the process that gives rise to astrocytes and oligodendrocytes, which occurs several days after neurogenesis. Our proposed mechanism thus implies a dynamic role for both the miRNAs and JAK/STAT family members in neurogenesis of the spinal cord.</td>
</tr>
<tr>
<td class="main topic name">Evan Liu - Block E</td>
<td class="main topic">The Development and Optimization of a qPCR Assay for Rickettsia aeschlimannii</td>
<td class="main">Rickettsiae are small, Gram-negative bacteria found in various arthropods such as lice, mites, ticks, and fleas, which can serve as vectors and hosts. These arthropod vectors transmit the bacteria to vertebrate hosts, causing mild to life-threatening diseases, but with common symptoms including fever, headache, and nausea, which are hard to distinguish from those of other diseases. Rickettsia aeschlimannii, the species of interest in this study, causes a disease characterized by maculopapular rash (not yet named). A quick and efficient method for detection of the species' DNA in clinical and environmental samples was developed.</td>
</tr>
<tr>
<td class="main topic name">Hojae Lee - Block E</td>
<td class="main topic">The Effect of Oxidative Stress on Mitochondrial hTERT Activity in Breast Cancer Cells</td>
<td class="main">Recent studies have shown that human telomerase reverse transcriptase (hTERT), the enzymatic subunit of telomerase, is not only found in the nucleus but also in the mitochondria of cancer cells. Since mitochondrial DNA (mtDNA) does not have telomeric ends, scientists suggested novel functions for hTERT. One potential function was that hTERT protects mtDNA from the effects of oxidative stress. This study investigates the effects of oxidative stress induced by hydrogen peroxide to the change in hTERT activity level in the mitochondria of human breast cancer cells.</td>
</tr>
<tr>
<td class="main topic name">Kelly Yoo - Block E</td>
<td class="main topic">The Examination of  Modifiers of GMR-Gal4.UAS-Gef26zÎ”N1/Cyo Virgins with UAS-RNAi Male Drosophila melanogaster</td>
<td class="main">A gene mutation in Drosophila has been recently discovered that disrupts germline stem cells and causes neuronal defects. The homologue of the mutation has been generated in mice and has become a knockout gene, causing a negative effect on blood stem cell formation. In order to find out the role of certain genes in the signal transduction pathway of the specific gene mutation Gef26, I conducted a genetic screen test. I crossed GMR-Gal4.UAS-Gef26zÎ”N1/Cyo (Rap-Gef26) virgin Drosophila melanogaster with UAS-RNAi maleDrosophila melanogaster, and checked the eye phenotype of the next generation for modifiers of GMR-Gal4.UAS-Gef26zÎ”N1 eye phenotype. By methods of virgining, crossing, and screening, I compiled the data for most of the 6000 UAS-RNAi lines. By observing which of the crosses have different GMR-Gal4.UAS-Gef26zÎ”N1 eye phenotype, resulting in a â€œlibrary of data,â€ further research can be done with the combination of the specific RNAi with the Gef26 mutation, such as the signal transduction pathway of the interaction.</td>
</tr>
<tr>
<td class="main topic name">Brianna Buch & Nazila Shafagati - Block E</td>
<td class="main topic">The effects of Boswellic Acid and IgM Shark  antibodies on SKBR3 Breast Cancer</td>
<td class="main">We will be testing the effects of Boswellic Acid components, as well as IgM shark antibodies, on SKBR3 Breast Cancer cell line survival, with the hopes of killing living cells and preventing further growth. We will be tested in vitro and in vivo, in a zebra fish embryo.</td>
</tr>
<tr>
<td class="main topic name">Karinna Vivanco & Ziyi Fan - Block E</td>
<td class="main topic">The Effect of pH on the Ability of Geobacter Metallireducens to Reduce Iron(III)</td>
<td class="main">We altered the pH of growth culture medium for different microbe cultures. This metal-reducing microbe was discovered over two decades ago and has had application in a variety of fields. We are trying to find the optimal conditions for its reduction ability.</td>
</tr>
<tr>
<td class="main topic name">Kathleen Atkatsch - Block E</td>
<td class="main topic">The Effect of Selection Pressure, Antibiotic Gene Expression and Protein Levels on Plasmid Copy Number in E. coli</td>
<td class="main">RTPCR is used to determine how selection pressures alters plasmid copy number.</td>
</tr>
<tr>
<td class="main topic name">Natasha Bandopadhay - Block E</td>
<td class="main topic">The Effect of Para-Benzoquinone on the Ability of Synechocystis to Perform Photosynthesis</td>
<td class="main">Para-benzoquinone is a metabolite of benzene, a chemical found in crude oil. Due to the recent oil spill, many important aquatic producers have been affected. This experiment explores the effect of para-benzoquinone on the photosynthetic rate of the algae Synechocystis</td>
</tr>

<tr><td class="main topic name" style="text-align:center; font-weight:bold;" colspan=3>Gaudreault</td></tr>

<tr>
<td class="main topic name">Lisa Yang & Jun Hong Kim - Block A</td>
<td class="main topic">An Investigation of Various Parameters of Electron Tomography of HIV and SIV to Optimize the Microscopy Procedure</td>
<td class="main">The Human Immunodeficiency Virus (HIV) is an infamous retrovirus that leads to Acquired Immunodeficiency Syndrome (AIDS), causing over 3 million lives around the world every year. Our project studies the envelope glycoprotein trimers located on the surface of the virus that interact with the CD4 receptors on white blood cells to initiate the infection.  Looking at the 3D structure of the trimers can help discover an antibody or vaccine. In collaboration with the National Institutes of Health, we used electron tomography, a 3D reconstruction method using a series of projections taken by an electron microscope at different tilt angles. This project will focus on examining various parameters of the electron tomography of HIV and SIV in order to facilitate the â€œpipelineâ€ process and produce high resolution 3D images of Env spikes.</td>
</tr>
<tr>
<td class="main topic name">Andrew Rice - Block A</td>
<td class="main topic">Analysis of HSP Expression in Cancerous versus Non-Cancerous Cells</td>
<td class="main">Heat shock proteins (HSPs) are integral to cellular regulation.  HSPs are molecular chaperones that serve to assist protein folding and reduce aggregation.  HSPs, as their name implies, have a major role in preventing cellular damage as a result of elevated temperature and preventing apoptosis.  Because cancer cells do not undergo apoptosis under normal circumstances, I am investigating whether cancer cells express HSP at equivalent levels to non-cancerous cells.  If there is a significant difference in expression, it may be an indication that changes to HSP expression have an effect on cancer formation.</td>
</tr>
<tr>
<td class="main topic name">Phan Quan & Allison Brouckman - Block A</td>
<td class="main topic">Characterization of the prolyl isomerase CfaC protein in enterotoxigenic E. coli</td>
<td class="main">Enterotoxigenic E. coli is the cause of fatal food poisoning in developing countries.  Infection is caused by CFA fimbriae.  By isolating and characterizing a protein of these fimbriae - the N-terminal domain - and seeing if its properties mimic a prolyl isomerase (a formation enzyme), this N-terminal can be targeted for future vaccination.</td>
</tr>
<tr>
<td class="main topic name">Nadine Skaff & Jackie Browning - Block A</td>
<td class="main topic">The Effect of Carbon Dioxide Level on Micrasterias waris Biofuel Production</td>
<td class="main">Through photosynthesis, algae take up a small fraction of energy from the sun, capturing carbon dioxide and producing biofuels so efficiently that they can double their weight several times a day. In this experiment, the input of carbon dioxide is altered in order to increase algae oil yields. Results will shed further light on the significance of algae to the atmosphere and confirm its industrial ecology possibilities.</td>
</tr>
<tr>
<td class="main topic name">Kevin Lim & Erin Corey - Block A</td>
<td class="main topic">The Effect of Chloramphenicol on the Hearing of Zebrafish</td>
<td class="main">Hearing loss is a problem for more than 250 million individuals worldwide; ear hair cell degeneration has been the most common reason for this.  However, a way has yet to be found to regenerate these hair cells or inhibit their death.  Studies have shown that certain antibiotics have caused hearing lossses in young children.  The goal of this project was to compare the wild-type and mutant hair cells of zebrafish,a model organism, after they have been exposed to an ototoxic drug, zebrafish.</td>
</tr>
<tr>
<td class="main topic name">Timothy Tran - Block A</td>
<td class="main topic">The Effect of Engystol on Human Respiratory Syncytial Virus</td>
<td class="main">Have you ever heard of RSV? Would you be surprised if I told you it was the leading cause of respiratory tract infections worldwide? Come learn about how RSV causes bronchitis, pneumonia, and other harmful diseases, and how scientists are working to stop it in its tracks.</td>
</tr>
<tr>
<td class="main topic name">Pallavi Ravada & Rola Elamin - Block B</td>
<td class="main topic">Determining the optimum growth medium for SK-Br-3 human breast cancer cells (adenocarcinoma)</td>
<td class="main"></td>
</tr>
<tr>
<td class="main topic name">Zachary Seid - Block B</td>
<td class="main topic">The effect of Thalassiosira pseudonana silaffin-long chain polyamine interactions on in vitro silica formation</td>
<td class="main">Diatoms, a type of algae, are unique among plants for their ability to synthesize silica cell walls which exhibit extraordinary strength and structure. This experiment purifies several polyamines and tests their reactivity with raw materials outside of the cell to clarify the mechanism for cell wall formation.</td>
</tr>
<tr>
<td class="main topic name">John Sununu & Brianna Kim - Block B</td>
<td class="main topic">Error Analysis of the Electron Tomography of Surface Glycoprotein Spikes from Human Immunodeficiency Virus Samples</td>
<td class="main">No vaccine currently exists to permanently treat or prevent the Human Immunodeficiency Virus, a disease that currently affects more than 30 million people worldwide.  More accurate three-dimensional representations of HIV surface glycoprotein spikes would allow scientists to engineer better antibodies against HIV, a potential vaccine trigger.  The use of electron tomography, a scanning technique that can produce high-quality three-dimensional digital images of a microscopic object, will enable us to model protein molecules on the outermost layer of HIV.  UNIX-based computer imaging software will allow us to manipulate these glycoproteins and search for potential viral docking sites.  In addition, we will analyze different parameters of electron microscopy by plotting data sets obtained under different confounding variables against one another to determine what, if any, outside factors hamper the data collection and modeling processes.  In doing this, we hope to be able to provide conclusive research to those wanting to create a better-engineered antibody to create a vaccine for HIV in the future.</td>
</tr>
<tr>
<td class="main topic name">Steve Qian & Sarah Beisler - Block B</td>
<td class="main topic">Factoring the Factors: The Effect of Factor I Supplementation on C3 Deficient Human Serum</td>
<td class="main">The number of people around the world who suffer from failing immune systems, and thus malfunctioning complement systems, is astounding. While many treatments have become available in attempts to counteract the diseasesâ€™ symptoms, no absolute solutions have been determined. But the study of complement systems and their activation components, specifically Factor I and complement component 3 (C3), looks promising and may just hold the key to a cure. 1 A shortage of Factor I in human plasma has been found to cause the activation of the complement alternative pathway to become unregulated, consequently leading the blood to comprise of insufficient levels of C3. In hopes of compensating for this deficiency, samples of C3 deficient human serum will be supplemented with varying amounts of Factor I.6 This practice if successful may lead to the development of possible treatments for those who suffer from defective complement disorders, including rheumatoid arthritis, systemic lupus erythematosus, and dermatomyositis.</td>
</tr>
<tr>
<td class="main topic name">Aria Sharma & Sapir Nachum - Block B</td>
<td class="main topic">Gender and Alcohol</td>
<td class="main">A study to determine the effects of estradiol concentrations on alcohol consumption.</td>
</tr>
<tr>
<td class="main topic name">Bethany Connor - Block B</td>
<td class="main topic">The Effect of H19 RNA on the Imprinting of Igf-2</td>
<td class="main">Could just two genes hold the key to cancer and possibly even other diseases?  Come to this presentation to find out!</td>
</tr>
<tr>
<td class="main topic name">Aaron Williams - Block B</td>
<td class="main topic">The Effect of Low Concentration Hydrogen Peroxide on Apoptosis in Saccharomyces Cerevisiae Yeast</td>
<td class="main">Apoptosis is a type of programmed cell death in which a cell actively uses caspases, a family of cysteine proteases, to kill itself. It is present in eukaryotic and multicellular organisms, but a prokaryotic analogous process has been discovered. It is critical in the immune system, growth homeostasis, and senescence. In experimentation, the most widely used trigger for apoptosis is exposure to hydrogen peroxide, a reactive oxygen species. It is used in a wide range of concentrations, from 0.5 mM to 150 mM. It would be beneficial to determine the optimal concentration of hydrogen peroxide for inducing apoptosis. I would add different concentrations of hydrogen peroxide to suspensions of Saccharomyces cerevisiae. Apoptosis is characterized by DNA fragmentation, which is apparent in agarose gel electrophoresis by DNA laddering. Due to the expectedly large size of the DNA fragments, the agarose gel concentration would be low and the run time would be high. After many trials, if the resulting gel is conclusive, the optimal hydrogen peroxide concentration could be determined.</td>
</tr>
<tr>
<td class="main topic name">Hannah Tam & Liana Cramer - Block B</td>
<td class="main topic">The Effect of Myostatin-inhibition on Duchenne Muscular Dystrophy in Caenorhabditis elegans</td>
<td class="main">We tested the effects of a myostatin-inhibitor to encourage muscle growth in Caenorhabditis elegans effected by muscular dystrophy. Research in myostatin-inhibition could counteract the effects of muscle wasting in muscular dystrophy and other diseases in which muscle deterioration is a symptom, such as AIDS.</td>
</tr>
<tr>
<td class="main topic name">Nikki Pangilinan - Block B</td>
<td class="main topic">The Effect of Nitrogen and Non-Nitrogen Containing Bisphosphonates on Farnesyl Diphosphate Production in Breast Cancer</td>
<td class="main"></td>
</tr>
<tr>
<td class="main topic name">Anna Burke - Block B</td>
<td class="main topic">The Effect of pH Changes on Endogenous Repair of DNA Irradiated with UV-B Radiation in Saccharomyces cerevisiae</td>
<td class="main">In the process of nucleotide excision repair, organisms remove harmful DNA lesions (such as pyrimidine dimers caused by UV radiation) by excising a small piece of the DNA, transcribing it again using a template, and using DNA ligase to rejoin the two strands. This process is driven by a set of protein complexes and enzymes, which may be affected by changes in pH. The possibility of a correlation between pH values and effectiveness of nucleotide excision repair will be investigated using S.cerevisiae as a model organism, as it makes an excellent eukaryotic substitute for genetic research.</td>
</tr>
<tr>
<td class="main topic name">Hari Devanathan - Block C</td>
<td class="main topic">G-quadruplexes in the mammalian promoters: analysis of the evolutionary conservaativeness in six species</td>
<td class="main"></td>
</tr>
<tr>
<td class="main topic name">Akshay Seth - Block C</td>
<td class="main topic">Life in an Extreme Environment</td>
<td class="main">An investigation of Halobacterium sp. NRC-1 and its growth in an extremely halophilic environment.</td>
</tr>
<tr>
<td class="main topic name">Ronit Malka - Block C</td>
<td class="main topic">Purification of Procoagulant Factor X Activating Protein from Bothrops moojeni (Brazilian Lancehead) Snake Venom</td>
<td class="main">Snake venoms contain many medically important proteins affecting the body in a wide variety of ways, including promoting blood clotting (coagulation). This experiment set out to purify the protein found in Bothrops moojeni (Brazilian lancehead) venom that is responsible for activating factor X, a key factor involved in triggering blood clotting through the blood coagulation cascade.</td>
</tr>
<tr>
<td class="main topic name">Sin Kim - Block C</td>
<td class="main topic">The Effect of Soy Genistein on Prostate Cancer Cells Expressing Fusion Oncogene TMPRSS2-ERG</td>
<td class="main">"Genistein is a phytoestrogen, or a substance that can bind to human estrogen receptors, found in soy. TMPRSS2-ERG is an important oncogene that plays a role in evolution of prostatic intraepithelial neoplasia into metastatic prostate cancer. Also, TMPRSS2-ERG has been implicated to promote androgen-independence in androgen-sensitive tumor cells. Based on genistein's known effects on androgen receptor production, it is unclear whether TMPRSS2-ERG would increase or decrease in activity after genistein treatment. Genistein could inhibit TMPRSS2-ERG, since genistein can restrict growth of androgen-independent prostate cancer cells. This experiment investigates this relationship through in vitro genistein treatments."</td>
</tr>
<tr>
<td class="main topic name">Rebecca Kolkmeyer & Joowon Choi - Block C</td>
<td class="main topic">The Effect of VEGF Concentration on the Growth Rate of Mouse Endothelial Cells</td>
<td class="main">Vascular endothelial growth factor, or VEGF, has become a subject of interest in cancer research due to its role in tumor growth and development. In this project we exposed cancerous endothelial cells to different concentrations of VEGF and observed the effect on the growth rate of the cells.</td>
</tr>
<tr>
<td class="main topic name">Gloria Duan - Block C</td>
<td class="main topic">The Effect of Silicon Dioxide on the Allergenicity of the American House-Dust Mite</td>
<td class="main">The American House dust mite (Dermatophagoides farinae) is a microscopic crustacean invisible to the human eye. Living by the millions inside of fibrous household materials such as carpeting, mattresses, pillows and etc., D. farinae feed off the dead skin cells of humans and animals. The antigens in their fecal matter have been found to be the main cause of asthma, constituting 50-80 percent of all asthmatic reactions. Although strategies have been employed to decrease their allergenicity, currently, there is no way to isolate or eradicate them on a commercial level. However, since D. farinae have been found to proliferate more efficiently in areas with high humidity, it may be hypothesized that decreasing the atmospheric humidity around the dust mite specimen would decrease the rate of proliferation, and thereby the allergic potential.</td>
</tr>
<tr>
<td class="main topic name">Jillian Wen - Block D</td>
<td class="main topic">Silencing the c-myc gene in SKBr3 human breast cancer cells using RNA interference</td>
<td class="main">In my experiment, I used RNAi to silence the c-myc gene in human breast cancer cells and observed the effect it had on growth efficiency. While the mechanism for RNAi is largely unknown, it holds much potential for future research and treatment of a variety of genetic, viral, and cancerous diseases.</td>
</tr>
<tr>
<td class="main topic name">Art Kulatti & Elizabeth King - Block D</td>
<td class="main topic">Teaching Bacteria to Shut Up</td>
<td class="main">Our project tested the effects of various antibiotics on the quorum sensing (communication) system in Pseudomonas fluorescens (substituted for Pseudomonas aeruginose) using an Agrobacterium tumefaciens model.</td>
</tr>
<tr>
<td class="main topic name">Limor Steinberg & Amber Kuo - Block D</td>
<td class="main topic">The antibacterial effect of the American Cranberry Vaccinium macrocarpon on Escherichia Coli 85.1743 and K12</td>
<td class="main">The American Cranberry contains phenolic compounds which may have antibacterial effects on certain strains of E.Coli. This experiment looks to determine whether cranberry extract can act as a prophylaxis against the E.Coli that causes urinary tract infections in dogs. Successful results could lead to the possibility of using cranberry products as a natural treatment of UTI in humans.</td>
</tr>
<tr>
<td class="main topic name">Eugenie Quan & Ramya Kollu - Block D</td>
<td class="main topic">The Production of Antigens for Hepatitis B in Vibrio cholerae within Nicotiana tabacum</td>
<td class="main">The purpose of this experiment is to generate the antigens able to produce an immune response to Hepatitis B within Nicotiana tabacum plant cells. Because few studies have been conducted to show the ability of plants to produce the antigen for Hepatitis B, this experiment will be able to provide more in depth understanding on the processes involved in the development of plant-based vaccines. The results from this experiment will also have far-reaching effects, as Hepatitis B is still a huge international problem today, especially within developing, impoverished countries.</td>
</tr>
<tr>
<td class="main topic name">Jonathan Phillips & Peter Hansen - Block D</td>
<td class="main topic">What the Buzz is About</td>
<td class="main">Over the past few years, bee colonies have been dying en masse due to a condition called Colony Collapse Disorder (CCD). It is not known what causes CCD,but it is thought to be related to the Dicistroviridae family of viruses and the parasitic Varroa mites. We are testing how the mites help the effectiveness of infection of one of these viruses, the Acute Bee Paralysis Virus.</td>
</tr>
<tr>
<td class="main topic name">Sitara Sundar - Block D</td>
<td class="main topic">Wnt7b protein concentration: An analysis of differences in Wnt7b concentration in kidney cancer cells compared to breast cancer cells.</td>
<td class="main"></td>
</tr>
<tr>
<td class="main topic name">Scott Badgett - Block E</td>
<td class="main topic">The comparative effects of berberine and ampicillin on non-paqthogenic Escherichia coli</td>
<td class="main"></td>
</tr>
<tr>
<td class="main topic name">Lydia Luu - Block E</td>
<td class="main topic">The effect of acidic conditions on the formation and propagation of the prion [PSI+] in the yeast S. cerevisiae</td>
<td class="main"></td>
</tr>
<tr>
<td class="main topic name">Katherine Wang & Kathleen Roche - Block E</td>
<td class="main topic">The Effect of Acute and Chronic Ethanol Exposure On Alcohol Dehydrogenase Activity in Caenorhabditis elegans</td>
<td class="main">The purpose of this study is to investigate both the short-term and long-term effects of alcohol exposure.  C. elegans will be exposed to various concentrations of ethanol under various time frames to simulate intoxication in humans.</td>
</tr>
<tr>
<td class="main topic name">Tvissha Goel - Block E</td>
<td class="main topic">The Effect of Antipsychotics on Biological Toxicity in Zebrafish</td>
<td class="main">Antipsychotics are known to induce side effects in humans. There are claims that the conventional antipsychotics cause more side effects such as muscle stiffness and movement disorders than do their newer counterparts. However, such claims are questionable due to biased pharmaceutical companies, lack of evidence, and dependency on observational studies rather than experimental studies. This project examines the difference between the toxicity caused by older antidepressants and newer antidepressants.</td>
</tr>
<tr>
<td class="main topic name">Alisha Geldert - Block E</td>
<td class="main topic">The Effect of Bisphenol A on the Methylation of the ESR1 Promoter in Human Prostate Cancer Cells</td>
<td class="main">Is BPA linked to cancer? In search of an answer, I used TJ's new DNA sequencer to measure the methylation of a region of DNA in cancer cells exposed to BPA.</td>
</tr>

</table>

<br />

<a href="#top" style="float:right;">&#8593; Back to top</a><br /><hr>

<!-- CAD -->

<a name="cad"></a><h3>CAD</h3>
<table class="tbb">
<tr>
<td class="top"><b>Presenters</b></td>
<td class="top"><b>Title</b></td>
<td class="top"><b>Description</b></td>
</tr>

<tr>
<td class="main topic name">Aditi Gadre - Block A</td>
<td class="main topic">Implementation of a Rainwater Collection System in a Student College Campus Community Center</td>
<td class="main">We will discuss the implementation of a rainwater collection system in an urban setting. The purpose of this project was to maximize the efficiency of a rainwater collection system through the design of a building.  We will also discuss our reasoning behind using Google Sketchup as opposed to Auto Cad.</td>
</tr>

<tr>
<td class="main topic name">Suyeon Son - Block A</td>
<td class="main topic"></td>
<td class="main"></td>
</tr>

<tr>
<td class="main topic name">Thalia Aoki - Block A</td>
<td class="main topic">Green2house</td>
<td class="main">We will describe our design for a 'green' greenhouse. We will talk about the different eco-friendly aspects of the design, including the geodesic dome shape, solar power technology, and irrigation system. We will discuss how our greenhouse design could benefit agriculture and the environment.</td>
</tr>

<tr>
<td class="main topic name">Emily Crowe - Block B</td>
<td class="main topic"></td>
<td class="main"></td>
</tr>

<tr>
<td class="main topic name">Hunter Merrill - Block B</td>
<td class="main topic">Environmentally Friendly Skyscraper</td>
<td class="main">The design of an environmentally friendly building using Revit Architechural software.</td>
</tr>

<tr>
<td class="main topic name">Katie Bailey - Block B</td>
<td class="main topic">Green Design: Designing an Eco-Friendly Building Complex for a Community of Extreme Poverty</td>
<td class="main">The purpose of this project is to design a multi-use building complex for a community with limited funds. This project incorporates humanities and engineering design. Not only is the goal to build a green building on a tight budget, but also to reach out and help the local community in need.</td>
</tr>

<tr>
<td class="main topic name">Quasar Wei - Block B</td>
<td class="main topic">A Turbine Design that Accelerates Fluids in order to Produce Electricity</td>
<td class="main">This turbine design accelerates and generates electricity by concentrating fluids into a cyclone. This design can be used in both wind and water turbines. Benefits include low cost to produce and simplicity of the design compared to conventional horizontal axis wind turbines and the ability to 'stack' a number of them in one area.</td>
</tr>

<tr>
<td class="main topic name">Salil Gupta - Block B</td>
<td class="main topic"></td>
<td class="main"></td>
</tr>

<tr>
<td class="main topic name">Daniel Barnes - Block C</td>
<td class="main topic">House of Hoops</td>
<td class="main">House of Hoops is the name of the sportsplex I am designing using Revit Architecture. It is an energy efficient rec center primarily used for basketball, but designed with other purposes in mind. It can host a travel basketball tournament or even yoga classes.</td>
</tr>

<tr>
<td class="main topic name">Elizabeth Pina - Block C</td>
<td class="main topic">Design of  a Bicycle Powered Flour Mill</td>
<td class="main">I will discuss the engineering and development of a bicycle powered grinding mill that could be implemented by small scale grain farmers.</td>
</tr>

<tr>
<td class="main topic name">Katherine Helmick - Block C</td>
<td class="main topic">Model of the Millennium Temple</td>
<td class="main">I created 2-D and 3-D models in Revit Architecture of the Millennium Temple, based on the revelations of the prophet Ezekiel. For design and dimensioning purposes, I relied on the description recorded in the Old Testament, scholars' interpretations of that description, and the Biblical practice of 'drawing lots.'</td>
</tr>

<tr>
<td class="main topic name">Ariel Copeland - Block D</td>
<td class="main topic">Designing a Vertical Farm</td>
<td class="main">In the near future, our planet's growing population will lead to a shortage of available farmland.  One possible solution to this problem is the creation of urban 'farms' that go up, eliminating the need for space and transportation.  My project is a design for a vertical farm, a very relevant creation which we may need soon.</td>
</tr>

<tr>
<td class="main topic name">Haemee Kang - Block D</td>
<td class="main topic">Flour Power Bakery</td>
<td class="main">This bakery was designed using the Revit Architecture program. In order to make an eco-friendly building, innovative aspects have been added to resolve heating issues, and deforestation.</td>
</tr>

<tr>
<td class="main topic name">Sarah Thomas - Block D</td>
<td class="main topic">Shipping Container Nature Center</td>
<td class="main">The design of a community nature center using recycled shipping containers, which have been piling up in American port cities.</td>
</tr>

<tr>
<td class="main topic name">Brenna Daroch - Block E</td>
<td class="main topic"></td>
<td class="main"></td>
</tr>

<tr>
<td class="main topic name">Eugenia Kim - Block E</td>
<td class="main topic">Green Restaurant</td>
<td class="main">A restaurant designed with an emphasis on environmental friendliness and nature as well as a focus on openness.</td>
</tr>

<tr>
<td class="main topic name">Jenny Tobat - Block E</td>
<td class="main topic">Efficient Infant Incubator Design</td>
<td class="main">The Inventor design of an infant incubator, efficient and cost-effective so as to be used for developing countries.</td>
</tr>

<tr>
<td class="main topic name">Rachel Kuprenas - Block E</td>
<td class="main topic">Design of a Human Powered Submarine</td>
<td class="main">Using Autodesk Inventer I designed a submarined powered by a person pedaling that allows the user to dive, surface, and turn.</td>
</tr>

<tr>
<td class="main topic name">Young Ji Kim - Block E</td>
<td class="main topic">Design of an Eco-art studio integrated with living space</td>
<td class="main">To incorporate an innovative aspect to my project, I chose to create a design of an art studio that was integrated with living quarters. Following the global trend of environmental consciousness, the design will be environmentally friendly.</td>
</tr>

</table>

<br />

<a href="#top" style="float:right;">&#8593; Back to top</a><br /><hr>

<!-- Chemical Analysis -->

<a name="chem"></a><h3>Chemical Analysis</h3>
<table class="tbb">
<tr>
<td class="top"><b>Presenters</b></td>
<td class="top"><b>Title</b></td>
<td class="top"><b>Description</b></td>
</tr>
<tr>
<td class="main topic name">Ankit Kapoor and Meghan Anand - Block A</td>
<td class="main topic">Optimization of Biodiesel Production from Different Vegetable Oils</td>
<td class="main">In order to ultimately make the creation of biodiesel more cost-effective and help work towards an eventual movement towards alternative energy, this project hopes to optimize the production of the biodiesel by testing the transesterification process using different oils as feed-stocks, as well as different catalysts. Vegetable oil, soybean oil, and rapeseed oil (canola oil) will be used as feedstocks for the synthesis of biodiesel. The fatty acid methyl esters (FAME) will be produced via acid catalyzed Fischer esterification as well as base catalyzed esterification. To determine which oil yields the most effective product, the resulting products√¢‚Ç¨‚Ñ¢ glycerol content, viscosity, and solubility will be analyzed. The results of this project will lead to further research using the optimal oil/catalyst combination, a valuable piece of information to today's scientific community as well as future companies producing these biofuels.</td>
</tr>
<tr>
<td class="main topic name">Haina Lee and Sundeep Kutumbaka - Block A</td>
<td class="main topic">Analysis of Amino Acid-Metal Ion Complexes</td>
<td class="main">In this lab, eight transition metal complexes with amino acids are formed: Iron-Glycine, Iron-Tyrosine, Iron-Histidine, Copper (III)-Glycine, Copper (III)-Tyrosine, Copper (III)-Histidine, Zinc (II)-Glycine, Zinc (II)-Tyrosine, and Zinc (II)-Histidine. Then via spectrometry and titration, we will characterize the complexes by their metal ion verses ligand proportions and by their empirical formula. Transition metal ions and amino acid ligands will form complexes that have a central metal ion surrounded by a certain number of ligands. This number is typically twice the charge of the ion. The second part of this experiment involves finding the formation constants of these complexes using their concentration; [Fe(SCN)]2+ will be used as a convenient dye to enhance the data taken by the Spec 20. The calculations could be completed with the aid of a graphing calculator. The complexes with the greatest formation constant value will tend to be the ones that follow the general rule for transition metal complex for</td>
</tr>
<tr>
<td class="main topic name">Moira Poje and Sarah McManis - Block A</td>
<td class="main topic">Gas Chromatography-Mass Spectrometry analysis with an emphasis on report generation and secondary school education</td>
<td class="main">This project focused on experimentation with the GC/MS and using the Post-run analysis application to generate reports. These skills were used to determine the caffeine concentration in beverages and to develop an introductory lab for future students. Specific components included peak identification and integration, chromatogram analysis and sample comparisons.</td>
</tr>
<tr>
<td class="main topic name">Bianca Kim and Rebecca Zhang - Block A</td>
<td class="main topic">Synthesis and Analysis of Thermochromic Transition Metal Complexes</td>
<td class="main">Thermochromic materials change color (i.e., undergo phase transitions) with variations in temperature. In this project, we synthesized cobalt hexahydrate complexes, bis(diethyl)tetrachlorocuprate, and bis(diethyl)tetrachloronickelate. UV-Vis and FT-IR analyses yielded further insight into the molecular geometry of these fascinating compounds.</td>
</tr>
<tr>
<td class="main topic name">Hamed Eramian - Block A</td>
<td class="main topic">A Revision of van der Waals Radii for Certain Elements</td>
<td class="main">Values for van der Waals radii are usually used without consideration of the anisotropy of those values based on angle differences with the surrounding atoms. This project was an statistical and theoretical analysis of this anisotropy and revised van der Waals values were tabulated for certain elements for future use in the scientific community.</td>
</tr>
<tr>
<td class="main topic name">Michael Monte and Rachel Nissen - Block A</td>
<td class="main topic">The Effect of Radical Quenching of 1,1-Diphenyl-2-picrylhydrazyl on Antioxidant Behavior</td>
<td class="main">We use DPPH to test the antioxidant activity of different acids.</td>
</tr>
<tr>
<td class="main topic name">Andrew Yang and Jonathan Yun - Block A</td>
<td class="main topic">Computational Study of Reaction Kinetics: Calcium Carbonate/Hydrochloric Acid System</td>
<td class="main">A model was created of the rate of reaction between hydrochloric acid and calcium carbonate in a relatively isolated environment. The model involves regression methods and differential equation analysis and was tested against experimental results. The experiments were performed at two different temperatures, as manner of another independent variable: at room temperature (298 K) and while heated on a plate and at a regulated 348 K. In addition, an approximate activation energy was derived in order to make quantitative observations about the Boltzmann distribution.</td>
</tr>
<tr>
<td class="main topic name">Kevin Shu - Block A</td>
<td class="main topic"></td>
<td class="main"></td>
</tr>
<tr>
<td class="main topic name">Rhitwika Sensharma and Stephanie Marzen - Block A</td>
<td class="main topic">Electrochemical Synthesis of Conducting Polymers</td>
<td class="main">This project compares the conductivities of electrochemically synthesized polypyrrole, polyaniline, and polythiophene films formed on ITO glass. By increasing the thickness of the polymer films, we hope to also increase the conductivity. In addition to film thickness, we are also comparing the conductivities of fully oxidized and fully reduced polymer films.</td>
</tr>
<tr>
<td class="main topic name">Alex Lowman - Block B</td>
<td class="main topic">Temperature Effects on Polylactide Formed By Ring-Opening Polymerization</td>
<td class="main">Polylactide is a biodegradable plastic with many commercial and biomedical applications.  It is a good alternative to petroleum-derived plastics because it is entirely derived from agricultural by-products, but it is currently more expensive.  This presentation focuses on the effects of reaction temperature on the efficiency of the ring-opening polymerization of lactide to produce polylactide.</td>
</tr>
<tr>
<td class="main topic name">Alison Jarmas and Stefani Karp - Block B</td>
<td class="main topic">Investigating the Chemical Kinetics of Aspirin Hydrolysis via UV Spectroscopy</td>
<td class="main">This project utilizes ultraviolet (UV) spectroscopy to investigate the rate of hydrolysis of acetylsalicylic acid, a component of aspirin.  Various buffer systems are used to adjust the pH of the system, and the relationship between pH and reaction rate is observed.  Results are compared to prior research, which indicates that the precise relationship between pH and reaction rate should differ in various distinct pH ranges.</td>
</tr>
<tr>
<td class="main topic name">Christopher Au - Block B</td>
<td class="main topic">Acid Leaching Method for Recycling Zinc from Batteries</td>
<td class="main">Acid leaching method for recycling zinc from batteries</td>
</tr>:
<tr>
<td class="main topic name">Halden Libby, Marc Wechsler, and Sung Won Byun - Block B</td>
<td class="main topic">Production and Analysis of Biofuels from Various Biomasses</td>
<td class="main">We used various sources of biomass to create ethanol. For each biomass, a specific pretreatment technique was used to prepare it for fermentation. The resulting solution was distilled to obtain ethanol.  As an extension, we will also use bacteria from the genus Clostridium to produce biobutanol.  We will analyze the ethanol and butanol yield as well as other factors of each biomass.</td>
</tr>
<tr>
<td class="main topic name">Jin Kyung Kim and Sang Min Han - Block B</td>
<td class="main topic">Analysis of Melamine in Milk by Gas Chromatography/Mass Spectroscopy</td>
<td class="main">Melamine spiked in milk of varying fat contents (whole, skim, and fat-free) was analyzed using gas chromatography/mass spectroscopy (GC/MS).  Samples were analyzed through the solid phase extraction (SPE) method.  This experiment determined whether or not fat content in melamine-spiked milk affects the SPE and the instrumental analysis of melamine.</td>
</tr>
<tr>
<td class="main topic name">Aman Kansal and Sabrina Mohamed - Block B</td>
<td class="main topic">Growth and Characterization of Quantum Dot Particles</td>
<td class="main">The purpose of this project is to characterize various quantum dots and to analyze their electronic properties for implementation in practical devices. The four particles which this project compares are indium nitride (InN), zinc oxide (ZnO), cadmium selenide (CdSe), and silver (Ag). Particles will be synthesized in the laboratory following procedures outlined in the Journal of Chemical Education. The resulting outcome will be an evaluation of various quantum dots and their various applications in electronics.</td>
</tr>
<tr>
<td class="main topic name">Anthony Lim - Block B</td>
<td class="main topic">Low Cost Portable Visible Light Spectrophotometer</td>
<td class="main">The goal of this project was to build a low cost visible light spectrophotometer that provided accurate data that was comparable to a commercial spectrophotometer.  Another goal that was to be fulfilled was to keep the spectrophotometer light and small, so as to give it greater portability.</td>
</tr>
<tr>
<td class="main topic name">Kevin Stahl and Siddharth Hariharan - Block B</td>
<td class="main topic">Flow Designs of Zero-Valent Iron Permeable Reactive Barriers</td>
<td class="main">We are working with designs of chambers to see how well we can filter simulated groundwater using iron. The project involves UV-vis spectrophotometry analysis and extensive knowledge of laboratory equipment.</td>
</tr>
<tr>
<td class="main topic name">Kevin Sun - Block B</td>
<td class="main topic">Cathodic Electron Receivers and Microbial Fuel Cell Performance</td>
<td class="main">My project studied microbial fuel cells, a form of fuel cell which uses microbes to biologically oxidize a feedstock and produce electricity.  The experiment tested the effect of different electron acceptors on microbial fuel cell voltage potential, and used two-chamber MFC.  The project tested several chemicals, including Potassium Ferricyanide and Potassium Permanganate, and yielded results that compared favorably to values found in literature.</td>
</tr>
<tr>
<td class="main topic name">Robert Orleans-Pobee - Block B</td>
<td class="main topic">Investigating the Suitability of Graphene in Nanocomposites using Graphene</td>
<td class="main">Nanocomposites involve adding small amounts of a filler material to a plastic in order to improve the physical properties of the composite. Graphene, the one atom thin sp2 allotrope of carbon, was the filler material used with a plastic called VectraA950. I used Inverse Gas Chromatography to analyze the graphene and the VectraA950 separately in order to try and predict the physical improvement of the composite.</td>
</tr>
<tr>
<td class="main topic name">Ashutosh Goel - Block C</td>
<td class="main topic">Transformation of dxf (AutoCAD) files to G-Code for Use in Biological Laser Printing (BioLP)</td>
<td class="main">This project used a cell laser printer (BioLP) to create cell structures for use in tissue engineering. A program was created to transform AutoCAD drawings into code that is then printable by the BioLP system. Applications of this project extend to tissue engineering and organ generation.</td>
</tr>
<tr>
<td class="main topic name">Michael Wu - Block C</td>
<td class="main topic"></td>
<td class="main"></td>
</tr>
<tr>
<td class="main topic name">Tiffany Dong - Block C</td>
<td class="main topic">Rapid Thermal Annealing on Al2O3 Deposited by Atomic Layer Deposition</td>
<td class="main">As smaller electronic devices are being produced, there is a growing need for thinner and higher-k gate dielectric materials, such as Al2O3. While manmade Al2O3contain impurities that degrade its dielectric abilities, rapid thermal annealing, if used within the optimal temperature and time range, can ameliorate the material through rapid heating. To determine the optimal annealing time and temperature conditions for Al2O3, Al2O3 films deposited on Si via ALD were individually annealed under different conditions: 2-15 minutes and 350-950√Ç¬∫C. The optimal RTA conditions were based on the smallest hysteresis voltage differences, dielectric constants closest to aluminum oxide's natural dielectric constant, and indexes of refraction closest to the accepted.</td>
</tr>
<tr>
<td class="main topic name">Andrea Lorico and Jeremey Weller - Block D</td>
<td class="main topic">Development of a Method to Analyze Endocrine Disrupting Chemicals (EDCs) and Pharmaceuticals and Personal Care Products (PPCPs) in Surface Waters of the Potomac River Watershed.</td>
<td class="main">This project's aim was to develop various methods utilizing HPLC-MS/MS  and other technologies with the goal of accurately measuring the concentration of a wide range of endocrine disrupting chemicals (EDCs) and pharmaceuticals and personal care products (PPCPs) in water samples collected from the Potomac River and its tributaries.</td>
</tr>
<tr>
<td class="main topic name">Kelly Ivins-O'Keefe - Block D</td>
<td class="main topic"></td>
<td class="main"></td>
</tr>

</table>

<br />

<a href="#top" style="float:right;">&#8593; Back to top</a><br /><hr>

<!-- Communication Systems -->

<a name="comm"></a><h3>Communication Systems</h3>
<table class="tbb">
<tr>
<td class="top"><b>Presenters</b></td>
<td class="top"><b>Title</b></td>
<td class="top"><b>Description</b></td>
</tr>


<tr>
<td class="main topic name">Leah Gonzalez - Block A</td>
<td class="main topic">Informative and Interesting? The Art of Educational Television</td>
<td class="main">What do Sesame Street, Blue's Clues, and Dora the Explorer have in common? Besides being entertaining educational television shows, they all had years of research behind the scenes to make them so successful. Similarly, this project explores the visual and audio cues behind educational television for maximizing recall and interest at the same time.</td>
</tr>

<tr>
<td class="main topic name">Winona Mantelli - Block A</td>
<td class="main topic">Object Removal and Image Manipulation in Adobe After Effects</td>
<td class="main">Unwanted objects in footage are a common issue, but Adobe After Effects can be utilized to fix such problems. Using a combination of motion tracking and rotoscoping, I explored the various methods of image manipulation and the improvement of video using After Effects and Photoshop.</td>
</tr>

<tr>
<td class="main topic name">Andrew Barlow and Mike Crumplar - Block B</td>
<td class="main topic">An Investigative Approach To Audiovisual Entrainment</td>
<td class="main">Our project examines the optimal construction technique of an Audiovisual Entrainment device using video production equipment and software, and qualitatively measures its effects on a panel of test subjects.</td>
</tr>

<tr>
<td class="main topic name">Saman Kamgar-Parsi and Janie Willner - Block B</td>
<td class="main topic">Multi-Track Recording of Music</td>
<td class="main">We will explain the process of layering and mixing recorded audio tracks to create a song.</td>
</tr>

<tr>
<td class="main topic name">Chris Choi - Block C</td>
<td class="main topic">Waveform Manipulation using Modern Audio Software</td>
<td class="main">Using modern software designed for use with audio to manipulate tracks, namely wave deconstruction to extract certain segments of audio.</td>
</tr>

<tr>
<td class="main topic name">Sara Suarez and Rachel Dorn - Block C</td>
<td class="main topic">Subliminal Messaging in Video with Visual and Auditory Cues</td>
<td class="main">Can subliminal messages tell you what to think? Presentation of findings from an exploration into the extent subliminal messaging can affect the human mind.</td>
</tr>

<tr>
<td class="main topic name">Jeffrey Fu - Block D</td>
<td class="main topic">Implementation of a Motion Interpolation Algorithm in a Python Environment</td>
<td class="main">The goal of the project is to design an algorithm that will track objects between progressive frames of motion and interpolate this motion to run smoother video. The program will analyze frames of matrix color bit-data, identify objects through edge detection operators, and identify the type(s) of object change, namely position, rotation, scale, and opacity. The changes are then interpolated along a larger number of frames based on user input. </td>
</tr>

<tr>
<td class="main topic name">Daniella Miller - Block D</td>
<td class="main topic">The Effects of Different Video Soundtracks On the Visual Memory Retention of the Viewers</td>
<td class="main">The effect of soundtrack on the visual memory retention of viewers of a five minute video clip.</td>
</tr>

</table>

<br />

<a href="#top" style="float:right;">&#8593; Back to top</a><br /><hr>

<!-- Computer Systems -->

<a name="cs"></a><h3>Computer Systems</h3>
<table class="tbb">
<tr>
<td class="top"><b>Presenters</b></td>
<td class="top"><b>Title</b></td>
<td class="top"><b>Description</b></td>
</tr>

<tr>
<td class="main topic name">Alexander Oshiro - Block A</td>
<td class="main topic">Artificially Intelligent Jazz</td>
<td class="main">This project uses Genetic Algorithms to create an application that automatically generates an improvised melody like one those in Jazz Music.</td>
</tr>

<tr>
<td class="main topic name">Derek Morris - Block A</td>
<td class="main topic">Creating an Adaptive Distributed Security System</td>
<td class="main">I developed a program to defend a network of computers from attacks as they happen by recognizing what an attack looks like and communicating this information. This is a strong improvement over the current model, where weeks can pass before security programs are updated to defend against new viruses and other threats. By dynamically learning how new threats behave, this software provides a security system ready for real-world attacks.</td>
</tr>

<tr>
<td class="main topic name">Hailey Johnson - Block A</td>
<td class="main topic">Analysis of an Elementary Programing Language</td>
<td class="main">Scratch is a programming language designed to introduce elementary school children of all ages to programming ideas.  Based on my teaching experience with Scratch at a local elementary school, I evaluate the use of Scratch to create an outline for a simplistic programming language geared to first graders.</td>
</tr>

<tr>
<td class="main topic name">Joshua Olson - Block A</td>
<td class="main topic">Ankose  An Automated Approach to Website Description for Search Engines</td>
<td class="main">Ankose, A New Kind of Search Engine, is a proposed improvement to description-based searching. Association between webpages and descriptive tags can be automated without messy interpretation of webpage content.</td>
</tr>

<tr>
<td class="main topic name">Joubin Izadi - Block A</td>
<td class="main topic">Manipulating Yahoo! Mail's Folder System</td>
<td class="main">While some users retain almost no emails, many users keep their old emails and now have several thousand.  The flat directory structures provided by Yahoo, Hotmail, Gmail and most other such email providers is inadequate.  A solution for multilevel directories is provided in the form of a simple Greasemonkey javascript add-on for several browsers such as Chrome and Firefox.</td>
</tr>

<tr>
<td class="main topic name">Kevin Dodd and Matt Spain - Block A</td>
<td class="main topic">Simulating Human Conversation</td>
<td class="main">Making a program that sounds intelligent is different from making one that actually is.  In this project we find what it is that makes sentences sound appropriate and run a chatbot that can emulate a human conversational partner.</td>
</tr>

<tr>
<td class="main topic name">Lucia Melgarejo - Block A</td>
<td class="main topic">Evaluation of the Effect of Visual Learning on Understanding the Concepts of Programming </td>
<td class="main">Scratch is a programming language designed to introduce elementary school children of all ages to programming ideas.  This project addresses how visual learning enhances teaching first grade students to program using the Scratch language.</td>
</tr>

<tr>
<td class="main topic name">Olivia Hurley - Block A</td>
<td class="main topic">Non-Partisan Redistricting of American States</td>
<td class="main">A redistricting scheme was developed to yield contiguous districts roughly equal in population while revising the partisan methods currently in place to create a greater number of politically balanced districts, thereby giving candidates a greater incentive to listen to both parties.</td>
</tr>

<tr>
<td class="main topic name">Willis Wendler - Block A</td>
<td class="main topic">Liquid  War AI</td>
<td class="main">This project is about creating a computer opponent for the game Liquid War.</td>
</tr>

<tr>
<td class="main topic name">Andre Kessler - Block B</td>
<td class="main topic">Adapting Analog Circuits for Convex Optimization to the Time Domain</td>
<td class="main">The human brain is significantly better than a computer at tasks such as facial recognition. Fundamentally, the difference lies in the way neurons compute with information (time domain) versus the way that traditional computers work (analog or digital domain). In this project, I developed a mathematical formalization for converting between traditional optimization problems and a formulation that might be able to naturally arise in the brain. Additionally, I used this formalization to implement several circuits for convex optimization in such a way as to take advantage of modern processing power.</td>
</tr>

<tr>
<td class="main topic name">Andy Crump - Block B</td>
<td class="main topic">Implementing Encryption Algorithms</td>
<td class="main">Ever wonder how safe your Gmail login is? Or how online banking is secure? This project will be studying the mathematical basis of popular encryption methods used on the web.</td>
</tr>

<tr>
<td class="main topic name">Andy Hanson - Block B</td>
<td class="main topic">Server-Based Programmable Image Editor</td>
<td class="main">An image editor that runs through a browser, images and instructions are sent to a server which performs the computation, reducing the user's computer's workload. The editor supports Python scripting as a main method of input.</td>
</tr>

<tr>
<td class="main topic name">Catherine Dworak - Block B</td>
<td class="main topic">Binned Image Searching</td>
<td class="main">Usage of bins (pixel averages) rather than keywords and search terms to compare images.</td>
</tr>

<tr>
<td class="main topic name">Chinmay Patwardhan - Block B</td>
<td class="main topic">Algorithmic Music Composition</td>
<td class="main">This project combines the use of a genetic algorithm with a knowledge based system to produce high quality classical music at the touch of a button. In the future, this could bring new meaning to sight reading for practicing musicians, as well as provide other useful applications for musicians.</td>
</tr>

<tr>
<td class="main topic name">Chris Reffett - Block B</td>
<td class="main topic">Identification of Different Musical Instruments from a Sound Wave</td>
<td class="main">Creation of an algorithm that will sort out different musical instruments based on timbre. The method implements a Fourier Transform, a technique for splitting a signal wave into its component frequencies. </td>
</tr>

<tr>
<td class="main topic name">Chris Reffett - Block B</td>
<td class="main topic">Development of a Distributed Firewall</td>
<td class="main">This project aims to create a program that will run on top of existing firewalls to coordinate defenses across a network.</td>
</tr>

<tr>
<td class="main topic name">Christopher Lee - Block B</td>
<td class="main topic">Audio Pattern Recognition</td>
<td class="main">An analysis of audio geared towards speech recognition with a focus on compensating for environmental noise, analyzing discrete and neural-net based approaches.</td>
</tr>

<tr>
<td class="main topic name">Christopher Lee - Block B</td>
<td class="main topic">Implementing User Recognition Based on Typing Profile</td>
<td class="main">By collecting samples of user data such as key dwell averages, left/right shift usage, and traversal times, a typing profile indicative of a particular user can be built and hopefully recognized to potentially load particular marcos or preference profiles in future applications.</td>
</tr>

<tr>
<td class="main topic name">Connor Cheong - Block B</td>
<td class="main topic">Creating an Image-Based Self-Localization System</td>
<td class="main">An image based robot self localization system was developed so that it could navigate using only a camera. It has a database of stored images which it uses in comparison against the current image taken by the camera to decide where it is.</td>
</tr>

<tr>
<td class="main topic name">David Murillas - Block B</td>
<td class="main topic">Applications of Cloud Computing</td>
<td class="main">The objective of this research project is to explore the main ideas and benefits of cloud computing. Cloud computing is a paradigm shift where data and applications rely more on the Internet and less on physical hardware. This project will explore these benefits by developing an application to remotely control different computers via clients and servers.</td>
</tr>

<tr>
<td class="main topic name">Laura Handley - Block B</td>
<td class="main topic">Development of an Image Comparison Program</td>
<td class="main">This project develops a way to accurately and efficiently evaluate the similarity between two images based on their characteristics (such as colors and edge locations) and uses this heuristic to determine, out of a set of images, which is most similar to an input image.</td>
</tr>

<tr>
<td class="main topic name">Michael Gurlitz - Block B</td>
<td class="main topic">Wikipedia Data Extraction and Analysis</td>
<td class="main">This project will create a framework for extracting information from the Wikipedia corpus for research tasks with massive amounts of data, and to improve Wikipedia article quality and accuracy.</td>
</tr>

<tr>
<td class="main topic name">Mitchell Stern - Block B</td>
<td class="main topic">Optimization of Unmanned Underwater Vehicle Communications through Simulation and Modeling</td>
<td class="main">The use of unmanned underwater vehicles (UUVs) in mine countermeasure operations has become increasingly popular over the past few decades, in part due to recent advancements in acoustic communication technology. In order to evaluate strategies and algorithms for the deployment of UUVs, this project aims to build a simulation environment that incorporates ocean physics, UUV dynamics, the capabilities of acoustic transmitters, and the current state of acoustic propagation modeling.</td>
</tr>

<tr>
<td class="main topic name">Richard Nguyen - Block B</td>
<td class="main topic">Exploration of Optimization Techniques for Parallel Processing</td>
<td class="main"></td>
</tr>

<tr>
<td class="main topic name">Richard Qin - Block B</td>
<td class="main topic">Identification of Different Musical Instruments from a Sound Wave</td>
<td class="main">Creation of an algorithm that will sort out different musical instruments based on timbre. The method implements a Fourier Transform, a technique for splitting a signal wave into its component frequencies. </td>
</tr>

<tr>
<td class="main topic name">Timothy Yuan - Block B</td>
<td class="main topic">Creating an Automated System to Create Captions and Labels for Announcement Videos</td>
<td class="main">The TJHSST morning announcements are currently edited and captioned manually. By using face detection, edge detection, and video processing algorithms, this project develops an automated application for editing video announcements, merging clips, adding captions and descriptions, and leveling audio levels, as well as exporting them to an efficient codec.</td>
</tr>

<tr>
<td class="main topic name">Caelan Garret - Block C</td>
<td class="main topic">An Image Processing System for Enhancing Perceptual Visibility of Imagery</td>
<td class="main">A patent pending digital image processing system is presented that enhances visibility in low visibility situations.  I developed my method based on Retinex theory, and it has applications in varied areas such as driving in fog and reconstruction of shadowy imagery.</td>
</tr>

<tr>
<td class="main topic name">Daniel Kang - Block C</td>
<td class="main topic">Destroying Steganography in Digital Audio Files</td>
<td class="main">Steganography (hidden messages) can be used in many different and potentially malicious ways, as the Russian spies did last summer. To defeat steganography, both detection and destruction of the hidden message can be employed. However, detection fails in many scenarios, so my project focuses on destroying steganography in digital audio.</td>
</tr>

<tr>
<td class="main topic name">Jack Borsi - Block C</td>
<td class="main topic">Basic Music Transcription Package</td>
<td class="main">A program is presented for converting audio input files into musical score notation. The algorithms for pitch detection and rhythm event detection and processing will be discussed.</td>
</tr>

<tr>
<td class="main topic name">Lisa Junta - Block C</td>
<td class="main topic">Development of a Neural Network to Predict Running Performance</td>
<td class="main">Using data from the school track team, including oxygen consumption rate, muscle strength, and body composition, along with subsequent performance times, I created a neural network for prediction of how fast one can run a mile based on future measurements before a race.</td>
</tr>

<tr>
<td class="main topic name">Nimesh Chakravarthi - Block C</td>
<td class="main topic">Generalized Collision Detection in Deformable Body Simulations</td>
<td class="main">Working with a professor at George Washington University, I developed an extension of a three-dimensional collision detection algorithm to account for deformable bodies. This algorithm is essential for the accuracy of simulations and will allow products to be created with another level of precision. Simulations such as the removal of a cloth from an automobile will be possible with the implementation of this algorithm.</td>
</tr>

<tr>
<td class="main topic name">Stephanie Colen - Block C</td>
<td class="main topic">Ice Skating Judging System</td>
<td class="main">While the International Judging System (IJS) used in high level skating events removes much of the subjectivity of the 6.0 system (judging system used at most other skating events), it is generally too complicated and expensive.  I developed an internet-based system that combines features of both (including point values of the IJS and simplicity of the 6.0 system) allowing for more consistent results with less subjectivity at lower level competitions.</td>
</tr>

<tr>
<td class="main topic name">Stephen Eltinge - Block C</td>
<td class="main topic">Optimization of Molecular Configurations Using Optimization Algorithms on Potential Functions</td>
<td class="main">Starting with basic data about atoms and chemical bonds, the configuration of atoms in a molecule can be found by minimizing its total energy. This is done by iterative optimization algorithms, and a user interface is provided for a user to view, interact with, and modify the completed molecular configuration.</td>
</tr>

<tr>
<td class="main topic name">Aditi Chaudhry - Block D</td>
<td class="main topic">Development of a Lewis Dot Structure Modeling Program</td>
<td class="main">A chemistry tutorial application is developed that will graphically display the Lewis Dot Structure and resonance structure of a given compound. The program will be displayed as an animation.</td>
</tr>

<tr>
<td class="main topic name">Andrew Cheong - Block D</td>
<td class="main topic">Analyzing the Behavior of Solar Particle Events Using Cumulative Distribution Functions</td>
<td class="main">With only a limited amount of information pertaining to solar particle events, there is difficulty to predict the behavior of these erratic events. By using data from past events, I generate expected values to predict future solar particle events. </td>
</tr>

<tr>
<td class="main topic name">Esha Maharishi - Block D</td>
<td class="main topic">Computer Tutorials for Hands-on Science Experiments</td>
<td class="main">A program is presented for the visual simulation of several scientific experiments geared to elementary and middle school students.</td>
</tr>

<tr>
<td class="main topic name">Ji Young Lim - Block D</td>
<td class="main topic">Computer Tutorials for Hands-on Science Experiments</td>
<td class="main">A program is presented for the visual simulation of several scientific experiments geared to elementary and middle school students.</td>
</tr>

<tr>
<td class="main topic name">Keon Woo Kim - Block D</td>
<td class="main topic">Extracting Information from a Broadband Sonogram using Fuzzy Logic</td>
<td class="main"></td>
</tr>

<tr>
<td class="main topic name">Roberto Valle - Block D</td>
<td class="main topic">A Physics Simulator with Alterable Rules and Constants</td>
<td class="main">This project details a robust physics simulator program and corresponding graphical user interface allowing users to accurately simulate interaction of physical bodies, such as planets and moons orbiting a star or set of stars or a field of dust mites floating and colliding.  The program also contains tools for the user to easily edit the laws of physics the simulation follows.</td>
</tr>

<tr>
<td class="main topic name">Roneil Rumburg - Block D</td>
<td class="main topic">Creating a Linux-based Embeddable Hypervisor</td>
<td class="main">A hypervisor is an operating system whose sole purpose is to virtualize other operating systems, allowing the virtualized systems to use more of the computer's resources and for the hypervisor to split resources more effectively. Hypervisor use is growing quickly in the IT world, but commercial hypervisors are cost prohibitive (over $1000) in many cases. I have created a lean and fast embeddable hypervsor based on open source software which would be freely available to anyone.</td>
</tr>

<tr>
<td class="main topic name">Soon Kwoen - Block D</td>
<td class="main topic">Extracting Information from a Broadband Sonogram using Fuzzy Logic</td>
<td class="main"></td>
</tr>

<tr>
<td class="main topic name">William Dalton - Block D</td>
<td class="main topic">Evolving Chemical Compounds for Specific Characteristics</td>
<td class="main">Using a combination of molecular modeling software and genetic algorithms, this project is a proof-of-concept for suggesting compounds matching user specifications (for example, specifying something such as gasoline might lead to the suggestion of a lipid in order to mix with it)</td>
</tr>

<tr>
<td class="main topic name">Xiaodi Sun - Block D</td>
<td class="main topic">Matching Chemical Names through Regular Expressions</td>
<td class="main">Using normal search engines to find complex chemical names is difficult or impossible. The developed program can accept any number of scientific articles and search them all using regular expressions for an appropriate name. </td>
</tr>

<tr>
<td class="main topic name">Andrew Watson - Block E</td>
<td class="main topic">Design of a Multi-Touch Robot Control Interface</td>
<td class="main"></td>
</tr>

<tr>
<td class="main topic name">Brett McLean - Block E</td>
<td class="main topic">Development of a Neural Network Based Artificial Intelligence for Video Games</td>
<td class="main">This project's goal is to develop a neural network or several to play various competitive video games. The idea is to study the advantages and disadvantages of such a method of AI as compared with several other methods such as finite state machines. A user interface will allow humans to play against the machine.</td>
</tr>

<tr>
<td class="main topic name">Connor Docherty - Block E</td>
<td class="main topic">Exploring Concepts of Self-Improving Artificial Intelligences and their Applications in the Game of Othello</td>
<td class="main">I undertook to create a program capable of learning how to play Othello at a high level by learning via playing the game.  The program uses a neural network based artificial intelligence.</td>
</tr>

<tr>
<td class="main topic name">Dylan Ladwig - Block E</td>
<td class="main topic">Evaluating Game AI Design Concepts</td>
<td class="main">Creation, evaluation, and testing of a game-style AI, with an emphasis on reaching outputs which appear human-like using methods including behavior trees, advanced pathfinding, and various ways of representing the AI and its interaction with the game world. Our demonstration environment is that of a museum,with AI guards.</td>
</tr>

<tr>
<td class="main topic name">Robert Carlson - Block E</td>
<td class="main topic">Investigation into Computer AI methods for Go</td>
<td class="main">This project entails a program that play the board game Go against humans or other AI.  Go is even more complex than chess, so the program uses a combination of basic human strategies and computational methods, such as Monte Carlo, or the collection of odds based on randomly generated moves.</td>
</tr>

<tr>
<td class="main topic name">Stephen Boris - Block E</td>
<td class="main topic">Optimizing Player-Computer Interactions of Games</td>
<td class="main">The creation and optimization of a game that will actively adjust to the skill of the current player. The system uses an algorithm to determine how to respond to the player's ability. The algorithm was then optimized to adjust to the player as fast and reliably as possible.</td>
</tr>

<tr>
<td class="main topic name">Steven Godofsky - Block E</td>
<td class="main topic">Using Spam Filters to Detect and Isolate Security Failures on Web Sites</td>
<td class="main">The aftermath of a web site break-in looks a lot like a spam email.  Effective damage control depends on rapid, preferably automated detection.</td>
</tr>

<tr>
<td class="main topic name">Steven Jackson - Block E</td>
<td class="main topic">Rapid Mass Deployment of Virtual machines using VMWare's Linked Clones over a Network</td>
<td class="main">By using Linked Clones, a feature of VMWare, it is possible to deploy many virtual machines to developers very rapidly when they require a new environment to test in. This can result in deployment times in excess of one hour being reduced to under a minute in many cases.</td>
</tr>

</table>

<br />

<a href="#top" style="float:right;">&#8593; Back to top</a><br /><hr>

<!-- Energy Systems -->

<a name="energy"></a><h3>Energy Systems</h3>
<table class="tbb">
<tr>
<td class="top"><b>Presenters</b></td>
<td class="top"><b>Title</b></td>
<td class="top"><b>Description</b></td>
</tr>

<tr>
<td class="main topic name">Nick Babyak, Brendan Corbett, Kelsey Henderson, Barbara Lantz, Janet Schirm, and Albert Tholen - Block A</td>
<td class="main topic">The installation of solar panels, wind turbine, power monitoring system, electrical system, and operational green roof onto the Alternative Energy House</td>
<td class="main">The installation of solar panels, wind turbine, power monitoring system, The installation of solar panels, wind turbine, power monitoring system, electrical system, and operational green roof onto the Alternative Energy House.</td>
</tr>

<tr>
<td class="main topic name">Ciara Prencipe - Block B</td>
<td class="main topic">Door Power: Opening new doors in small scale renewable energy</td>
<td class="main">Creating electrical energy from the motion of a door.</td>
</tr>

<tr>
<td class="main topic name">Drew Spears - Block B</td>
<td class="main topic">Determining the effectiveness and practicality of piezoelectric generators installed in school floor surfaces</td>
<td class="main">I designed a sub-surface floor panel with integrated springs and piezo buzzers, wired in an array, to harvest the energy from human traffic. I also manually counted students moving through doorways around the school with a hand-held counter, to be able to report where the technologies would be most useful. Although many applications have referenced transducers, or piezoceramic cylinders, I decided on using piezo 'buzzers'. This models the Japanese's subway system, and is relatively inexpensive; a main component of the project was to decide whether or not the system would be cost effective for a school system.</td>
</tr>

<tr>
<td class="main topic name">Janiel Li and Venkat Muruganandam - Block B</td>
<td class="main topic">Designing and Implementing an ROV Thruster using a Magnetic Thruster</td>
<td class="main">This project examines the potential of a magnetic coupler in an underwater ROV thruster. We will show the design of our alternative motor shaft and propeller coupling and explain the reasoning behind the its use. Our presentation focuses on the analysis of magnetic thrusters compared to other waterproof thrusters.</td>
</tr>

<tr>
<td class="main topic name">Katie Lin and Crystal Yi - Block B</td>
<td class="main topic">Production and Comparison of Watermelon-based Butanol</td>
<td class="main">Watermelon juice was fermented with the bacteria Clostridium acetobutylicum to create butanol, which was then extracted via a continuous distiller. The butanol was then compared to lab-grade butanol and gasoline in a combustion engine.</td>
</tr>

<tr>
<td class="main topic name">Nick Mathis - Block B</td>
<td class="main topic">Design and Implementation of AUV Technology with 3-D Underwater Mapping</td>
<td class="main">Research was continued on AUV technology from last year's lab. New motor pods were designed using CAD software and then several parts were created using laser cutters. The group then constructed the rest of AUV and planned to use sonar to create 3-D models of underwater surfaces.</td>
</tr>

<tr>
<td class="main topic name">AJ Swoboda - Block C</td>
<td class="main topic">Optimization of Resistivity of Membrane Electrode Assemblies through the Decal Method</td>
<td class="main">An issue with carbon decals at this moment is that the resistivity of the decal surface is too high for platinum to be deposited on. My project is focused on decreasing the resistivity of carbon electrodes so the platinum catalyst is able to be electrochemically deposited on the surface.</td>
</tr>

<tr>
<td class="main topic name">Cindy Han - Block C</td>
<td class="main topic">One Cell, Two Cell, Green Cell, FUEL CELL</td>
<td class="main">Platinum nanoparticles size and effect on PEM (Proton Exchange Membrane) Fuel Cells.</td>
</tr>

<tr>
<td class="main topic name">Kevin Kim - Block C</td>
<td class="main topic">Comparative Power Outputs of Direct Methanol vs. Hydrogen Fuel Cell on RC Car</td>
<td class="main">1/10th scale RC car was modded to fit direct methanol fuel cell and h-cell 2.0. The two are the most common alternative fuel cell type for automobile power sources.</td>
</tr>

<tr>
<td class="main topic name">Arjun Chavern, Nolen Ramminger, Johnathan Spitz, and Jim Skehan - Block D</td>
<td class="main topic">The Design and Construction of an Underwater ROV</td>
<td class="main">We designed and built an underwater ROV robot to compete in the MATE underwater robotics competition.</td>
</tr>

<tr>
<td class="main topic name">Jon Han and Daniel Yoo - Block D</td>
<td class="main topic">Into the Blue</td>
<td class="main">The design, creation, and observational study of an underwater remotely operated vehicle</td>
</tr>

<tr>
<td class="main topic name">Myles Cook, Alex Harasty, Kailin Lu, Christina Popps, Allison Smedberg, and Patrick Still - Block D</td>
<td class="main topic">Go-Go-Gadget Underwater ROV</td>
<td class="main">The design, construction, and testing of a remotely operated underwater vehicle for the MATE ROV Competition. </td>
</tr>

<tr>
<td class="main topic name">Drew Hayes, Sean Long, Ian Plunk, and Jason Schwartz - Block E</td>
<td class="main topic">The Design and Implementation of a High Altitude Balloon</td>
<td class="main">(Near)space: the final frontier. We designed a high altitude weather balloon capable of reaching an altitude of 100,000 feet. With the help of University of Kansas graduate student Paul Verhage, we used a GPS tracker to retrieve information and we attached a camera to take pictures throughout the voyage.</td>
</tr>

<tr>
<td class="main topic name">Jacob Baldwin, Clint Johnson, and Subeer Talapatra - Block E</td>
<td class="main topic">Analysis of Biodiesel in a Generator</td>
<td class="main">The purpose of our presentation will be to show our work done with the effects of biodiesel on a diesel generator, and we will be discussing emissions and power output.</td>
</tr>

<tr>
<td class="main topic name">Julian Do and William Qu - Block E</td>
<td class="main topic">Electric Vehicle Conversion</td>
<td class="main">My project is the conversion of a 1975 Cushman Turf Truckster from an Internal Combustion Engine (ICE) to a fully Electric Vehicle (EV). I designed an interface between the transmission and the electric motor. In addition, I install;ed the motor and drive components and tested the efficiency. My partner was in charge of circuitry and battery components. High fuel cost, maintenance, and environmental impact costs of a 1975 Cushman Turf Truckster. As opposed to a gas combustion engine, a small electric vehicle produces up to 90% fewer emissions, including exhaust from a coal burning power plant. These factors have made electric vehicles a viable alternative to traditional forms of transportation.</td>
</tr>

<tr>
<td class="main topic name">Lio Kang and Elvin Lee - Block E</td>
<td class="main topic">Design and Implementation of a Wave Energy Generator</td>
<td class="main">Come learn about a lesser known method of alternative energy.</td>
</tr>

</table>

<br />

<a href="#top" style="float:right;">&#8593; Back to top</a><br /><hr>

<!-- Microelectronics -->

<a name="micro" ></a><h3>Microelectronics</h3>
<table class="tbb">
<tr>
<td class="top"><b>Presenters</b></td>
<td class="top"><b>Title</b></td>
<td class="top"><b>Description</b></td>
</tr>

<tr>
<td class="main topic name">Jacob Brooks and Connor O'Sullivan - Block A</td>
<td class="main topic">Exploration of the Technology Behind Musical Effects</td>
<td class="main">An inquiry into the electronics behind the musical effects commonly found in popular music.</td>
</tr>

<tr>
<td class="main topic name">Peter Godofsky - Block A</td>
<td class="main topic">Using Super-Capacitors as Power Supplies</td>
<td class="main"></td>
</tr>

<tr>
<td class="main topic name">Emilio Esteban - Block B</td>
<td class="main topic">Sound From Ultrasound</td>
<td class="main">An exploration of nonlinear acoustics and their application in disappearing sound</td>
</tr>

<tr>
<td class="main topic name">George Bocchetti and Ben Chao - Block B</td>
<td class="main topic">Investigation of the Efficiency of Class D Amplifiers</td>
<td class="main">Class D amplifiers are more efficient than typical audio amplifiers. We investigated the specifics of Class D amplifications and attempted to build our own amplifier out of discrete components on a breadboard.</td>
</tr>

<tr>
<td class="main topic name">Jackie Harris - Block B</td>
<td class="main topic">Investigation into Wireless Power Transfer</td>
<td class="main">In this presentation I talk about my Senior Research Project in which I built different circuits that transmit power wirelessly and observed factors in these circuits, such as coil shape and choice of components, that effect efficiency of power transfer.</td>
</tr>

<tr>
<td class="main topic name">Caroline Crockett - Block C</td>
<td class="main topic">Microphone Beamforming</td>
<td class="main">Using microphones to listen in one direction.</td>
</tr>

<tr>
<td class="main topic name">Andrew Rowberg - Block C</td>
<td class="main topic">Tying into the Grid: Converting Power for Use in the Smart Grid</td>
<td class="main">I will describe one of the features of the Smart Grid, scheduled for construction within the next few decades, whereby users may transfer unused electricity into the Grid system as a whole, and I will discuss my basic model of that technology.</td>
</tr>

</table>

<br />

<a href="#top" style="float:right;">&#8593; Back to top</a><br /><hr>

<!-- Neuroscience -->

<a name="neuro" ></a><h3>Neuroscience</h3>
<table class="tbb">
<tr>
<td class="top"><b>Presenters</b></td>
<td class="top"><b>Title</b></td>
<td class="top"><b>Description</b></td>
</tr>

<tr>
<td class="main topic name">Anna Knight - Block A</td>
<td class="main topic"></td>
<td class="main"></td>
</tr>

<tr>
<td class="main topic name">Darcey Pancoast - Block A</td>
<td class="main topic">Exploration of Neurorobotic Technologies for the Development of a Brain-Wheelchair Interface</td>
<td class="main">Two different systems for interfacing with electroencephalography (EEG) technology, one utilizing the LabVIEW software and one using MATLAB software, were investigated and developed to create a brain-computer interface. This connected to a rewired motorized wheelchair and a 32- channel electroencephalographic (EEG) cap to move the chair without manual input.</td>
</tr>

<tr>
<td class="main topic name">Elena Lagon - Block A</td>
<td class="main topic"></td>
<td class="main"></td>
</tr>

<tr>
<td class="main topic name">Jane Hu - Block A</td>
<td class="main topic">Investigation of Serotonin-Induced Electrical Activity in the Abdominal Ganglion of Aplysia californica</td>
<td class="main">Serotonin is the primary neurotransmitter in the central nervous system of Aplysia californica. A serotonin antagonist, methiothepin, was applied to the abdominal ganglion of this sea slug to analyze the direct effects of serotonin on the propagation of action potentials across the siphon nerve.</td>
</tr>

<tr>
<td class="main topic name">Jeremy Owen - Block A</td>
<td class="main topic">Mathematical Model of Stroke Damage and Rehabilitation</td>
<td class="main">Mathematica is a useful computer tool for graphically representing the effects of stroke on the brain.  Following neuronal damage to a portion of the brain, a rewiring process often occurs that allows the stroke victim to recover somewhat.  A Mathematica model of this system is presented.</td>
</tr>

<tr>
<td class="main topic name">Akshay Deverakonda - Block B</td>
<td class="main topic">Strengthening a neuronal network through Long Term Potentiation</td>
<td class="main">The purpose of this experiment was to determine the ideal conditions for neuronal networks and examine how stimulation them. Snails of the specimen Helix aspersa were anesthetized and their ganglia were removed. Neurons were isolated via enzymatic and mechanical methods and plated onto various dishes to determine the ideal substrate/medium. Once the ideal conditions for the neurons were determined, stimulation was attempted. The neurons were not connected enough, so Aplysia hemolymph was used to enhance growth and synaptic connections. Currently, more stimulation tests are underway and the significance of dishes with hemolymph is being verified.</td>
</tr>

<tr>
<td class="main topic name">Kainan Wang - Block B</td>
<td class="main topic"></td>
<td class="main"></td>
</tr>

<tr>
<td class="main topic name">Kathyrn Kingsbury - Block B</td>
<td class="main topic">Central Nervous System Control of the Gastrointestinal Tract</td>
<td class="main">Fasted, anesthetized, adult male Sprague-Dawley rats were microinjected with either an MC4-R agonist or antagonist, MT-II and SHU9119 respectively. Gastric motility and tone were measured using a 3-centimeter latex balloon inserted into the stomach of the rat. This balloon measures stomach motility and tone (referred to as intra-gastric pressure in mmHg). Preliminary results indicate that MT-II (an agonist) abolishes gastric motility when microinjected into the DMV. This inhibition of motility was noted minutes after microinjection and lasted for more than one hour. In contrast, the microinjection of SHU9119 (an antagonist) into the DMV raises gastric tone, suggesting an endogenous effect of melanocortins in the DMV. Together, these data suggest that activation of MC4-Rs in the DMV can inhibit stomach motility, inferring an effect on the food intake circuit.</td>
</tr>

<tr>
<td class="main topic name">Katrina Loncar - Block B</td>
<td class="main topic">Optimization of dissection, isolation, and recording procedures of neural electrical activity in Aplysia abdominal ganglion</td>
<td class="main">Aplysia californica abdominal ganglion were isolated and transferred to a recording chamber. The recording methods of electrical neural activity were optimized. The techniques described will serve as indispensible tools for further studies of Aplysia neurophysiological mechanisms, including studies of memory development which could also be applied to mammalian systems.</td>
</tr>
<tr>
<td class="main topic name">Max Wang - Block B</td>
<td class="main topic">Efficacy of Gene Therapy on Cockayne Syndrome in Mice</td>
<td class="main">Cockayne Syndrome (CS) is a neurodegenerative DNA repair disorder that specifically affects transcription-coupled repair. CSA and CSB genes are known to contribute to the pathogenesis of CS, but little is known about how mutations in the proteins lead to the classical phenotypes. At the same time, gene therapy has shown promising results in genetic neurological disorders with the introduction of AAV vectors and especially AAV9 because of its ability to bypass the blood brain barrier. By knocking out the CSB and XPA genes of mice, they display similar symptoms to human CS patients including stunted growth and neural abnormalities and can act as test subjects for the AAV9 vector containing CSB.</td>
</tr>
<tr>
<td class="main topic name">Evan McMurray - Block C</td>
<td class="main topic"></td>
<td class="main"></td>
</tr>
<tr>
<td class="main topic name">Katilin Kressin - Block C</td>
<td class="main topic">Methodology for Electrode Implantation and Signal Collection in Procambarus clarkii</td>
<td class="main">Tail-flipping in crayfish is a characteristic behavior that creates large neuronal signals. The techniques we developed for fashioning and implanting electrodes, combined with the improved methodology for recording these electrical signals internally, increase the accuracy and reduce the noise of the neuronal signals.</td>
</tr>
<tr>
<td class="main topic name">Madhu Karamset - Block C</td>
<td class="main topic">Characterization of Downstream Effectors Mediating Cut Transcriptional Regulation of Class Specific Dendrite Morphogenesis</td>
<td class="main">A neuron?EUR(TM)s form dictates its function and in a circuitry as complex as the human brain the post-synaptic functional properties of the neuron are established by dendritic morphology. This study focused on phenotypic characterization of putative downstream effectors of the Cut homeodomain transcription factor in directing class-specific dendrite morphogenesis. To characterize putative transcriptional targets of Cut regulation, a genetic suppressor screen was performed in which Cut overexpression was coupled with target gene-specific RNA interference (RNAi) knockdown of gene function. Since Cut is also evolutionarily conserved in humans and regulates dendrite development the studies presented here provide new insight into the possible targets for the human Cut gene in this process which can now be directly addressed in translational studies in a vertebrate model.</td>
</tr>
<tr>
<td class="main topic name">Mithun Dhinikaran - Block C</td>
<td class="main topic">Exploration of Neurorobotic Technologies for the Development of a Brain-Wheelchair Interface</td>
<td class="main">In this project, we investigated and developed a system combining LABVIEW software and elecroencephalography (EEG) technology to create a brain-wheelchair interface. Neural activity read by an EEG cap placed on the user?EUR(TM)s head is processed by our Labview program which then outputs voltages to the wheelchair?EUR(TM)s motors, directing movement.</td>
</tr>
<tr>
<td class="main topic name">Olivia Murton - Block C</td>
<td class="main topic"></td>
<td class="main"></td>
</tr>
<tr>
<td class="main topic name">Anna Green - Block D</td>
<td class="main topic">Effect of Haloperidol and Levodopa on Swmming in the Medicinal Leech</td>
<td class="main">Dopamine is the main neurotransmitter involved in swimming in the medicinal leech (Hirudo medicinalis). Haloperidol is a dopamine antagonist, whereas Levodopa/L-dopa is the precursor to dopamine. The effect of these two chemicals on leech swimming was studied through electrophysiology. This experiment may serve as a model for Parkinson's Disease.</td>
</tr>
<tr>
<td class="main topic name">Kevin Boehm - Block D</td>
<td class="main topic">Use of prototype optical imaging system, optical coherence tomography, to study nerve regeneration of the medicinal leech</td>
<td class="main">We obtained a prototype optical coherence tomography (OCT) system from ThorLabs and improved imaging resolution for a semester before beginning an experiment using OCT to study leech nerve cord regeneration.  The nerve cord is imaged prior to and after damage and subsequent recovery.  Swim tests are used to observe the effect of nerve regeneration on mobility.</td>
</tr>
<tr>
<td class="main topic name">Serena Saffarini - Block D</td>
<td class="main topic"></td>
<td class="main"></td>
</tr>
<tr>
<td class="main topic name">Yunan Nie - Block D</td>
<td class="main topic"></td>
<td class="main"></td>
</tr>
<tr>
<td class="main topic name">Diana Gerr - Block E</td>
<td class="main topic">Habituation in gill and siphon withdrawal reflex of Aplysia californica</td>
<td class="main">Brefeldin-A is thought to inhibit synaptic depression in Aplysia californica, a sea slug that can model the human nervous system.  We isolated a piece of tissue that exhibits the gill and siphon withdrawal reflex, and we studied its movement to examine the effect of this drug.</td>
</tr>
<tr>
<td class="main topic name">Elizabeth Denning - Block E</td>
<td class="main topic"></td>
<td class="main"></td>
</tr>
<tr>
<td class="main topic name">Janice Park - Block E</td>
<td class="main topic"></td>
<td class="main"></td>
</tr>
<tr>
<td class="main topic name">Karthik Krishnan - Block E</td>
<td class="main topic">Metabolite Combination as a Treatment Strategy for Traumatic Brain Injury</td>
<td class="main">We sought to assess the recovery of rats with motor cortex injuries with a combined treatment regimen of GTA and melatonin. This approach was meant to address several post-injury mechanisms of neuronal damage in the days and weeks following injury.</td>
</tr>
<tr>
<td class="main topic name">Sarah Khan - Block E</td>
<td class="main topic">Effect of Color on Serotonin-Modulated Social Interactions of Juvenile Crayfish</td>
<td class="main">We determined the effects of red and blue enviornments on the social hierarchies of juvenile crayfish. These hierarchies were amplified using serotonin, a neurotransmitter known for its relation to aggression. Our methodology made use of electrode implantation and observation of live crayfish several weeks after enviornmental change and injection.</td>
</tr>
<tr>
<td class="main topic name">Shreyas Mahapatra - Block E</td>
<td class="main topic">Efficacy of Valproic Acid as a GSK-3 Beta Inhibitor in the Treatment of Amyloid-Beta Aggregation and Neuronal Apoptosis</td>
<td class="main"></td>
</tr>
<tr>
<td class="main topic name">Vy Ton - Block E</td>
<td class="main topic">BV-2 Activation by Double Mutant and Wild Type Alpha Synuclein</td>
<td class="main">Parkinson's disease is the second most common neurodegenerative disease characterized by the loss of dopaminergic neurons in the substantia nigra pars compacta.  Alpha synuclein is a protein that is hypothesized to play a role if the pathogenesis of PD.</td>
</tr>


</table>

<br />

<a href="#top" style="float:right;">&#8593; Back to top</a><br /><hr>

<!-- Oceanography -->

<a name="ocean" ></a><h3>Oceanography</h3>
<table class="tbb">
<tr>
<td class="top"><b>Presenters</b></td>
<td class="top"><b>Title</b></td>
<td class="top"><b>Description</b></td>
</tr>

<tr>
<td class="main topic name">Daniel Choo and Junhyuck Kim - Block A</td>
<td class="main topic">Effect of Bisphenol A on Crab Heart Rate</td>
<td class="main"></td>
</tr>

<tr>
<td class="main topic name">Jason Yang - Block A</td>
<td class="main topic">Application of Rapid Assessment of Marine Pollution (RAMP) Protocols to Determine Relative Toxicity</td>
<td class="main">Marine toxicology assays performed on locally raised oysters to determine relative levels of toxicity present in the environment.</td>
</tr>

<tr>
<td class="main topic name">Kyle Slugg - Block A</td>
<td class="main topic">Effects of Substrate of Settlement on Ephyra Production in Polyps of Aurelia labiata</td>
<td class="main">While jellyfish populations are counted by the number of medusae in a given area, total population numbers are largely determined by polyp populations, and the efficiency with which they produce ephyrae.  Studying how substrate affects ephyra production may give insight into how human construction and marine litter affect jellyfish bloom populations.</td>
</tr>

<tr>
<td class="main topic name">Sara Gokturk and Elizabeth Herbst - Block A</td>
<td class="main topic">The Effect of Cerium Oxide on the Embryonic Development of Lytechinus Pictus</td>
<td class="main">With the increasing use of cerium oxide in household products, scientists and researchers will need to investigate the potential negative effects of cerium oxide on human physiology.  Studying the effect of cerium oxide on sea urchin embryology can provide valuable information about how it might affect humans.</td>
</tr>

<tr>
<td class="main topic name">Adithya Simha - Block B</td>
<td class="main topic">Monitoring Algal Biomass in Bay Areas Through the Use of Bioluminescence</td>
<td class="main">Have you ever used a cell phone before? Have you texted your family and friends in order to stay in touch? This project utilizes a type of text message to send data remotely from bay ecosystems. Marine ecosystems are home to a diverse array of abundant life. From fish and mammals to phytoplankton. Phytoplankton are free-floating, generally microscopic, organisms that are transported by tides and currents. Some of these phytoplankton cause harmful algal blooms. These poisonous blooms can cause adverse effects to species residing in the ecosystem. The goal of this project is to use a state of the art buoy to collect real-time bioluminescence data that are critical for modeling and predicting bioluminescence; which in some cases is a predictor of harmful algal blooms.The buoy contains a solid state photometric device that measures bioluminescence. It contains a transmissometer to measure water clarity and a temperature monitor. A text file is transmitted, via satellite, to TJHSST for data analysis.</td>
</tr>

<tr>
<td class="main topic name">Amanda Cordray, Emily Goldfein, and Taylor Enders - Block B</td>
<td class="main topic">The Efficiency of Various Microorganisms For Bioremediation Of Oil</td>
<td class="main">Analyzing the efficiency of the microorganisms Penicillium, Bacillus, and Pseudomonas for the bioremediation of motor oil. Our project was inspired by the recent oil spill in the Gulf of Mexico and the subsequent clean-up efforts.</td>
</tr>

<tr>
<td class="main topic name">Denise Taylor and Alice Lu - Block B</td>
<td class="main topic">Determining the difference in water quality for runoff and non runoff streams</td>
<td class="main"></td>
</tr>

<tr>
<td class="main topic name">Fifi Zhang, Rachel Kim, and April Hyon - Block B</td>
<td class="main topic">The Effect of Temperature on Hemolymph pH in the American Lobster</td>
<td class="main"></td>
</tr>

<tr>
<td class="main topic name">Kelly Rogers, Natalie Cauley, and Marta Moore - Block B</td>
<td class="main topic">Dinoflagellates as Bioindicators of Potomac River Water Toxicity</td>
<td class="main">Using the bioluminescence of dinoflagellates, this experiment continued the evaluation of the water quality of identified pollution hot spots along the Potomac River. Toxicity levels will be compared to the findings of prior research to analyze whether the Potomac's health is declining, remaining stable or improving.</td>
</tr>

<tr>
<td class="main topic name">Connor Barett - Block C</td>
<td class="main topic">A Comparison Between Two Methods of Detecting Bisphenol-A in the Marine Environment</td>
<td class="main">This project is a comparison between two methods of detecting the bisphenol-A chemical in the marine environment. One method serves as a known basis for comparison, and assesses the immobilization of Daphnia magna. The other method is more experimental, and measures the light output of bioluminescent dinoflagellates.</td>
</tr>

<tr>
<td class="main topic name">Jahangir Iqbal - Block C</td>
<td class="main topic">Biodiesel Production from Sulfur Depleted Algae</td>
<td class="main">Alternative fuels are a hot topic of research today, especially with the oil worries and depletion in the Middle East. Interest in algae has risen greatly because of its oil rich composition and potential for bio diesel production. However depletion of sulfur from media also induces algae to produce Hydrogen, another alternative fuel. This project focuses on finding out if bio diesel can be produced from algae that has already produced hydrogen.</td>
</tr>

<tr>
<td class="main topic name">YeNa Kim - Block C</td>
<td class="main topic">Jellyfishin'</td>
<td class="main">Design/Construction of a Jellarium.</td>
</tr>

<tr>
<td class="main topic name">Abigail Xu - Block D</td>
<td class="main topic">Effect of Bisphenol-A on the Heart Rate of Carcinus maenus</td>
<td class="main">The experiment explores the effect of Bisphenol-A (BPA) on the heart rate of the Carcinus maenas. The experiment measures the heart rate of the green shore crabs, which will show a link between BPA exposure and heart rate. The experiment will add to the growing knowledge of BPAâs effects on living organisms. BPA is found in the plastics of water bottles, metal cans, baby bottles, tableware and food storage containers (Kang 80).</td>
</tr>

<tr>
<td class="main topic name">Annie Lin, Allister Nelson, and Kate Shipman - Block D</td>
<td class="main topic">The Dirt on Dyke Marsh</td>
<td class="main">We investigated the effect of human activity on toxicity levels in Dyke Marsh sediment, a tidal freshwater marsh. We collected monthly soil samples from tiles throughout the marsh and created solutions from the sediment. Then we introduced bioluminescent dinoflagellates to the samples. Photons emitted were measured to determine toxicity levels.</td>
</tr>

<tr>
<td class="main topic name">Calvin Hartanto, Evan Cheng, Amanuel Shitaye, Daniel Park, and Kathy Shi - Block D</td>
<td class="main topic">Into the Blue</td>
<td class="main">The design, creation, and observational study of an underwater remotely operated vehicle.</td>
</tr>

<tr>
<td class="main topic name">Ivy Le - Block D</td>
<td class="main topic">Using hydrogeomorphology and biogeochemistry to determine nutrient availability in floodplain wetland trees</td>
<td class="main">A thorough analysis of the chemical and structural properties of sediment collected at Dyke Marsh Wildlife Preserve, including a precise inventory of chemical characteristics which will allow tracking of the age of the marsh, metamorphosis of the sediment, and the cycling of nutrients. Sediment was collected using ceramic tiles which were separated, dried, and weighed for mud and sand concentrations then sent to University of Marylandâs Horn Point Laboratory to determine inorganic and organic levels of material. Other raw samples of sediment were taken from the sediment site locations for testing done with the DR/2000 spectrophotometer which determine levels of concentration of specific chemicals.</td>
</tr>

<tr>
<td class="main topic name">Jeremy McAndrew and Sungmin Sohn - Block D</td>
<td class="main topic">Design and Construction of an Underwater ROV</td>
<td class="main"></td>
</tr>

<tr>
<td class="main topic name">Maren Leibowitz - Block D</td>
<td class="main topic">Go Go Gadget Underwater ROV</td>
<td class="main"></td>
</tr>

<tr>
<td class="main topic name">Ritu Dwivedy and Jackline Yim - Block D</td>
<td class="main topic">Chemical and Structural Analysis of the Marsh</td>
<td class="main"></td>
</tr>

<tr>
<td class="main topic name">Andrew Koons - Block E</td>
<td class="main topic">The Effect of Seed Size on the Dispersal Distance of the Seeds of Fourteen Plant Species in the Dyke Marsh</td>
<td class="main">Although numerous studies have been performed with plants in the Dyke Marsh, located in Alexandria, Virginia, little is known about the seeds that produce these plants. Physical characteristics were measured to determine the dispersal pattern of the seeds with consequences on the future productivity and ultimate success of the marsh.</td>
</tr>

<tr>
<td class="main topic name">Blair Graham - Block E</td>
<td class="main topic">Algal Symbiosis with Aiptasia anemones</td>
<td class="main">The rising ocean temperatures are causing mass bleaching events around the world. A heat-tolerant species of zooxanthellae might be a way to make coral and other symbiotic creatures more resistant to heat-induced bleaching.</td>
</tr>

<tr>
<td class="main topic name">James Heron - Block E</td>
<td class="main topic">Killer Algae</td>
<td class="main">Using biotechnology to track invasive species.</td>
</tr>

<tr>
<td class="main topic name">Julia Truelove - Block E</td>
<td class="main topic">Comparing filtration efficiency of farmed vs. wild Crassostrea virginica, Eastern Oyster</td>
<td class="main">Due to the effects of overharvesting, disease, and habitat destruction, the population of Crassostrea virginica, Eastern oyster, is currently less than 1% of calculated pristine levels. Examination of size and measurement of filtration efficiency, and data available about the development disparity between farmed and wild oysters and the effect of size on clearance rate, support the theory that farmed oysters with a greater meat to shell mass ratio were more efficient in filtering sediment than wild oysters. Increased turbidity as a result of underpopulation of filter feeders in the Chesapeake Bay has led to the creation of anoxic zones detrimental to the survival of healthy ecosystems.</td>
</tr>

<tr>
<td class="main topic name">Olivia Walton, Alexander Hoffman, and Debbie Yu - Block E</td>
<td class="main topic">The effect of gender segregation on the behavior of Hippocampus erectus</td>
<td class="main">Seahorses were separated into four groups, one for each sex, and two mixed groups. Their behavior was monitored for a period of one day, and the groups were rotated for a total of four trials. The frequency of certain behaviors in each group was recorded and analyzed.</td>
</tr>

<tr>
<td class="main topic name">Rachel Marzen - Block E</td>
<td class="main topic">Climate induced regime shifts in the Bering Sea: Evidence from the benthic ostracode assemblage</td>
<td class="main">In this study, the relative abundances of the most common Bering Sea ostracode species since 1976 were compared before and after periods of warmer temperatures to understand how regime shifts affect benthic meiofauna.</td>
</tr>

</table>

<br />

<a href="#top" style="float:right;">&#8593; Back to top</a><br /><hr>

<!-- Physics-->

<a name="optics" ></a><h3>Optics/Modern Physics</h3>
<table class="tbb">
<tr>
<td class="top"><b>Presenters</b></td>
<td class="top"><b>Title</b></td>
<td class="top"><b>Description</b></td>
</tr>

<tr>
<td class="main topic name">Craig Saperstein - Block A</td>
<td class="main topic">Reducing binary images to iterated maps</td>
<td class="main">Compress images by translating them into an equations.</td>
</tr>
<tr>
<td class="main topic name">Max Beckhard - Block A</td>
<td class="main topic">Changing behavior of light as a response to complex which-path information</td>
<td class="main">The wave-particle duality of matter has always been a source of some confusion in the quantum model. This project attempts to answer whether particles retain their wave-or-particle nature during their travel through a path, via a system containing a double-slit to produce questionable which-path information and a down-converter to produce entangled particles.</td>
</tr>
<tr>
<td class="main topic name">Sanjeet Das - Block A</td>
<td class="main topic"></td>
<td class="main"></td>
</tr>
<tr>
<td class="main topic name">Zachary Brunt - Block A </td>
<td class="main topic">Non Turbine Hydroelectric Power.</td>
<td class="main">Environmentally friendly hydroelastic electricity generation<./td>
</tr>
<tr>
<td class="main topic name">Manhas Narra - Block B</td>
<td class="main topic">Solution Method for Growth of Oxide based Nanostructures for SERS Applications</td>
<td class="main">ZnO and Ga2O3 are widely used as the basis of nanostructures due to their useful intrinsic properties. In this work, growths of ZnO and Ga2O3 nanostructures in solution were optimized for basic conditions in order to develop an effective and efficient growth technique. The method yields homogenous particle size distribution. Surface Enhanced Raman Spectroscopy (SERS) using these nanostructures, synthesized from the solution method developed in this work, as substrates showed significant enhancement of the Raman effect, especially for ZnO nanowires, due to dense growth and geometric alignment. This enhancement of the scattering is pertinent to many applications ranging from gas sensing to individual molecule detection.</td>
<tr>
<td class="main topic name">Margaret Coad - Block B</td>
<td class="main topic">Analysis of the Laser Heating of a Water Droplet</td>
<td class="main">This project explores the motion inside a water droplet placed in the path of a laser beam.  The motion is quantified by using polyethylene microspheres to track the velocities of the moving water molecules.</td>
</tr>
<tr>
<td class="main topic name">Marshall Main - Block B</td>
<td class="main topic"></td>
<td class="main"></td>
</tr>
<tr>
<td class="main topic name">Martin Scherr - Block B</td>
<td class="main topic">Design of a Viable Space Based Power Satellite Utilizing Wireless Microwave Power Transmission</td>
<td class="main">The primary focus of the project was performing critical trade studies of DC-to-RF conversion element candidates. The ultimate goal was to conduct lab testing and performance characterization and use the data to develop and integrate proof of principle RF-DC converter units. Secondary areas of focus included the analysis of thermal challenges and approaches for integrating the all elements of the module.</td>
</tr>
<tr>
<td class="main topic name">William Bunting - Block B</td>
<td class="main topic">Neutrino and Antineutrino Mass Bounds by a New Method</td>
<td class="main">Over the past summer I developed a new technique for bounding (ie. the masses must be less than some number) the masses of particles called neutrinos and antineutrinos. I was awarded Intel Science Talent Search Semifinalist status for this research.</td>
</tr>
<tr>
<td class="main topic name">Apoorva Lonkar - Block C</td>
<td class="main topic">Super Resolution Image Reconstruction</td>
<td class="main">Super resolution (SR) image reconstruction is a process by which a series of low resolution images are combined to produced a high resolution single-frame output image.  This is achieved by registering the low resolution input images to one another and adding the images together, resulting in a high-spatial-resolution output image. This project tests the super resolution techniques developed at The Aerospace Corporation in their success with low resolution images in black and white as well as explores the potential usage for color images.</td>
</tr>
<tr>
<td class="main topic name">Eli Auerhan - Block C</td>
<td class="main topic">Inverse Doppler Effect</td>
<td class="main">My presentation will be a description of the inverse doppler effect, how one can create it, and its possible practical applications.</td>
</tr>
<tr>
<td class="main topic name">Kaylee Yocum - Block C</td>
<td class="main topic">The Effect of Radio Wave Frequency Modulation on the Spectral Line Width  of Quadrupolar Nuclei  using NMR</td>
<td class="main">This project will look at how modulating the frequency of the radio waves transmitted to the nuclei affects the width of spectral lines of Quadrupolar Nuclei i.e. Sapphire.</td>
</tr>
<tr>
<td class="main topic name">Adam Hood - Block D</td>
<td class="main topic">Attaching layers of graphene using carbon nanobud structures</td>
<td class="main">Our goal in this research project is to connect sheets of graphene a fixed distance apart using a carbon structure as a connecting mechanism such that sheets cannot move laterally, keeping layers from scraping off.  Our initial thought is that the carbon structure should keep the distance between graphene layers at about 0.335 nanometers, which is approximately the natural distance between layers.</td>
</tr>
<tr>
<td class="main topic name">Alex Weissenfels - Block D</td>
<td class="main topic">Determining the Refractive Indices of Birefringent Materials Using Interferometry</td>
<td class="main">Birefringent materials have two different refractive indices along separate dimensions, and because of the transverse oscillation of light waves, light polarized in different directions travels at different speeds through such materials.  Observation of the interference pattern resulting from a polarized laser beam passing through a birefringent material and a likewise polarized reference beam from the same source can help determine the difference between the material√¢‚Ç¨‚Ñ¢s two refractive indices.  This is accomplished by rotating the polarization and observing the change in the interference pattern.  This presentation discusses the results of such tests on various birefringent materials.</td>
</tr>
<tr>
<td class="main topic name">Jason Miller - Block D</td>
<td class="main topic">Self_Organization in an Electromechanical System</td>
<td class="main">Emergent properties of systems when placed in different situations are one of the most fascinating aspects of science. In this experiment, an extension of investigations performed by Jun and Hubler, I will continue to examine the network properties that emerge when small metallic beads are placed in an oil solution and subject to a force of roughly 20,000 volts. The beads have been shown to self-organize in different patterns based on starting constraints and have been noted to re-organize into new patterns when the system is perturbed. The goal of the project will be to perform a variety of different experiments on this set up, catalog the results, attempt to make some sort of computational model to better understand the phenomenology of the system, and lastly try and understand why the beads organize as they do. I will take detailed statistics and record data through photographs and video of the beads as they move through and in the system and all materials have been graciously provided by TJHSST.</td>
</tr>
<tr>
<td class="main topic name">Byung Joo Shin - Block E</td>
<td class="main topic">Modeling the Zeer Refrigeration System</td>
<td class="main">Zeer Refrigerator is a simple refrigeration system that does not need any electricity or mechanized parts. My project focuses on modeling this system computationally and analyzing the simple geometry and structure.</td>
</tr>
<tr>
<td class="main topic name">Krishnan Chander - Block E</td>
<td class="main topic">Analysis of Discrete Wavelet Transforms on Short-Wave Infrared (SWIR) Imagery</td>
<td class="main">I apply different kinds of discrete wavelet transforms, coded in the MATLAB computational environment, to short-wave infrared imagery taken in maritime settings. From the results, I try to find characteristics of the image that can be useful in maritime sensing.</td>
</tr>
<tr>
<td class="main topic name">Matthew Craddock - Block E</td>
<td class="main topic">Seeing Subatomics</td>
<td class="main">Subatomic particles are weird and confusing. Why not try to make them easier to see and understand, so curious people can have and easier time learning about them? Let's see if we can pull it off.</td>
</tr>
<tr>
<td class="main topic name">William Bergan - Block E</td>
<td class="main topic">Analysis of the Thermodynamics of Accelerating AdS-dS Kerr-Newman Black Holes</td>
<td class="main">I will derive and examine the ramifications of an explicit first law of black hole thermodynamics in the general case of an accelerating, charged, and rotating black hole in a universe with a non-zero cosmological constant.</td>
</tr>
<tr>
<td class="main topic name">Zachary Perconti - Block E</td>
<td class="main topic">Investigating Current Limiting Mechanisms in Commerical Infrared Detectors</td>
<td class="main">This project will delve into the realm of Semiconductor physics, by investigating the dark current magnitude in commercial infrared detectors, using a variety of sophisticated equipment. The project also explores the current limiting mechanism of Generation-Recombination current, as well as the lifetime of minority charge carriers within the semiconductor material.</td>
</tr>


</table>

<br />

<a href="#top" style="float:right;">&#8593; Back to top</a><br /><hr>

<!-- Prototyping -->

<a name="proto" ></a><h3>Prototyping</h3>
<table class="tbb">
<tr>
<td class="top"><b>Presenters</b></td>
<td class="top"><b>Title</b></td>
<td class="top"><b>Description</b></td>
</tr>

<tr>
<td class="main topic name">Astin Housely - Block A</td>
<td class="main topic">An Automatic Target Return System</td>
<td class="main">The development of a target return system for an indoor firearm range.</td>
</tr>

<tr>
<td class="main topic name">Charles Eubanks - Block A</td>
<td class="main topic">Wind-Powered Vehicle</td>
<td class="main">My project was to design, build, and test a wind-powered vehicle.  The idea was to use a turbine to capture the air flowing past the vehicle as it moved.  Turning the turbine would generate electricity that was then used to power the vehicle and recharge the batteries.</td>
</tr>

<tr>
<td class="main topic name">Hareesh Nagaraj - Block A</td>
<td class="main topic">Implementation of an Acoustic Guitar Tremolo System</td>
<td class="main">Acoustic guitars are rarely, if ever, known to have tremolo systems. As one of the premier innovations in the prototyping lab, one of the seniors has implemented a tremolo system on an acoustic guitar.</td>
</tr>

<tr>
<td class="main topic name">Matt Bloom and Shekhar Chalasani - Block A</td>
<td class="main topic">Go Go Gadget Secret Touch Opener</td>
<td class="main">The presentation will be on the use of a capacitive sensor to detect human contact on a doorknob to operate a lock. A microprocessor analyzes the pattern of touch events, and if it passes as the key, will unlock the door.</td>
</tr>

<tr>
<td class="main topic name">Daniel Kang and Seong Jin Hahn - Block C</td>
<td class="main topic">Solar Car Development</td>
<td class="main">Utilization of accessible resources to develop a energy efficient and cost efficient solar car.</td>
</tr>

<tr>
<td class="main topic name">Garrett Hoppin, Richie Hernandez, and Sid Sethi - Block C</td>
<td class="main topic">Design and Construction of a Basic Utility Vehicle (BUV) for Implementation in Developing Nations</td>
<td class="main">Developing nations have no need for a luxurious, fully-equipped commercial vehicle. To provide them with a simple method of transportation, the Institute of Affordable Transportation holds an annual BUV competition. Our project follows this concept, as we design and construct a full-sized, multi-purpose BUV while minimizing cost and resources.</td>
</tr>

<tr>
<td class="main topic name">Mircea Cernev and Will Pyrak - Block C</td>
<td class="main topic">Design, Implementation, and Performance Evaluation of Pulsejet Propulsion</td>
<td class="main">After studying the design and uses of pulsejet engines, a pulsejet engine was built and tested. During the testing pressure transducers and thermocouples measured the temperature and pressure in the combustion chamber, while a special rig measured the thrust produced. A new innovative valve system was also tested using the same body.</td>
</tr>



</table>

<br />

<a href="#top" style="float:right;">&#8593; Back to top</a><br /><hr>

<!-- Robotics -->

<a name="robo" ></a><h3>Robotics</h3>
<table class="tbb">
<tr>
<td class="top"><b>Presenters</b></td>
<td class="top"><b>Title</b></td>
<td class="top"><b>Description</b></td>
</tr>

<tr>
<td class="main topic name">Connor Cheong and Soon Kwoen - Block A</td>
<td class="main topic">Creating an Image-Based Self-Localization System</td>
<td class="main">An image based robot self localization system was developed so that it could navigate using only a camera. It has a database of stored images which it uses in comparison against the current image taken by the camera to decide where it is.</td>
</tr>

<tr>
<td class="main topic name">Nate Skolink - Block A</td>
<td class="main topic">Prototyping of LUNAR Antenna Deployment System</td>
<td class="main">Prototype of Lunar Rover that will release the Kapton polymide film antenna for the use of signal transfer from the moon to the Earth.</td>
</tr>

<tr>
<td class="main topic name">Victor Youk - Block A</td>
<td class="main topic">HaptiVision: a Haptic Feedback System for the Visually impaired.</td>
<td class="main">HaptiVision is a device that provides 3-D spatial information to a visually imapried user. A rangefinder captures a snapshot of thte distances of objects in front of the user and sends this data to the user through a matrix of vibration motors.</td>
</tr>

<tr>
<td class="main">Albert Khim, Amanda Ko, Brad Stalcup, Chris Gibson, Claudia Trigo, Dean Shute, Ian Anderson, JB Reiter, Jeff Menzin, Joo-Ah Lee, Jordan Basl, Julian Whitman, Kathryn McAtamney, Kyleigh Johnson, Michelle Gahagan, Mitchell Smith, Nathan Hamal, Omar Abed, Richard Garrett, Steven Olin, Suhas Patel, Vivian Lu, Yasodakishore Rao, William Greer, and Xavier Ferrier - Block B</td>
<td class="main topic">FIRST Robotics Competition</td>
<td class="main">The FIRST Robotics team presents the challenges they faced and the methods used to participate in the FIRST Robotics Competition.</td>
</tr>
</table>

<br />

<a href="#top" style="float:right;">&#8593; Back to top</a><br /><hr>

<?php include("footer.php"); ?>
