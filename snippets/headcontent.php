<?php
	// the default header, change the variables to what suits you in order to effect the final output of the content
	/*Page meta data and Open graph content manipulation
	*$magedescription; this sorts out the default pagecontent for the description meta tag
	*$magekeywords; for the possible keywords to locate the current page
	*$mageimage; path tothe icon for the website
	*$mageurl; path to the current page
	*$mageimage; path tothe icon for the website
	*/
	$mpagedescription=isset($mpagedescription)?$mpagedescription:"welcome to CHEET, The aim of this social media is to provide students with all academic materials (i.e. past questions (already solved), projects, project topics, class notes, course materials, project materials etc.), and also all information regarding their school and various departments (e.g. campus news, nysc info, lecturers and courses they handle, yearbooks for each department, classes and timetable etc.) and all other schools.";
	$mpagekeywords=isset($mpagekeywords)?$mpagekeywords:"CHEET, best online student news portal, latest school news in nigeria, latest admission lists in nigeria, niegierian schools admission list, admission list, final year projects, how to wirte a project proposal, sections of project writeup, post utme exam date, post utme";
	$mpageimage=isset($mpageimage)?$mpageimage:$host_addr."images/favicon.ico";
	$mpagetitle=isset($mpagetitle)?$mpagetitle:"Welcome | CHEET";
	$mpageurl=isset($mpageurl)?$mpageurl:$host_addr;
	$mpagefbappid=isset($mpagefbappid)?$mpagefbappid:"";
	$mpagefbadmins=isset($mpagefbadmins)?$mpagefbadmins:"";
	$mpagesitename=isset($mpagesitename)?$mpagesitename:"CHEET Official Website";
	$mpagecrumbclass=isset($mpagecrumbclass)?$mpagecrumbclass:"hidden";
	$mpagecrumbtitle=isset($mpagecrumbtitle)?$mpagecrumbtitle:"";
	$mpagecrumbpath=isset($mpagecrumbpath)?$mpagecrumbpath:"";
	$mpageheadingstyledisplay="hidden"; //variable for holding headerbar style switch for the home page 
	$mpageheadingstyletwodisplay=""; //variable for holding headerbar style switch for other pages 

	// check for active user or subadmin session
	// session variable for logged in user
	if(isset($_SESSION['schooladminh'])||isset($_SESSION['userh'])){
		$mpageuserdisplay=""; // this variable holds the class for hiding or showing the content of the user bar at the top of every page 
		isset($_SESSION['schooladminh'])?$mpageprofilepageout="schooladmindashboard.php":$mpageprofilepageout="userdashboard.php";
		isset($_SESSION['schooladminh'])?$mpageusertype="schooladmin":$mpageusertype="users";
		$mpageloginstyle="hidden";
	}else{
		$mpageuserdisplay="hidden";
		$mpageprofilepageout="";
		$mpageusertype="";
		$mpageloginstyle="";
	}
	/*Active page variable sections
	*$activepage1=index.php
	*$activepage2=.php
	*/
	if(isset($activepage1)){	
		$mpageheadingstyletwodisplay="hidden"; //variable for holding headerbar style switch for other pages 
		$mpageheadingstyledisplay="";
	}
	if(isset($activepage2)){
		$mpagedescription="Learn about CHEET, what it stands for, offers and how you can be a part of it";
		$mpagekeywords="about CHEET, learn more about cheet, CHEET history, about past quesitons and how to use them";
		$mpagetitle="About | CHEET";
		$mpageurl=$host_addr."about.php";
		$mpagecrumbclass="";
		$mpagecrumbtitle="ABOUT US";
		$mpagecrumbpath='<a href="'.$host_addr.'">Home</a><i class="ci_icon-chevron-right"></i><span class="current">About us</span>';
	}
	if(isset($activepage3)){
		$mpagedescription="Getting information about your school has never been easier, at cheet, we obtain quality information about social gatherings, group events, school events and the likes,";
		$mpagekeywords="Events in Yabatech, Events in Yaba college of technology, events in polytechnics, events in nigerian schools";
		$mpagetitle="Events | CHEET";
		$mpageurl=$host_addr."events.php";
		$mpagecrumbclass="";
		$mpagecrumbtitle="EVENTS";
		$mpagecrumbpath='<a href="'.$host_addr.'">Home</a><i class="ci_icon-chevron-right"></i><span class="current">Services</span>';
	}
	if(isset($activepage4)){
		$mpagedescription="Get in touch with us, we are availlable to receive your calls from 8am - 5pm weekdays";
		$mpagekeywords="get in touch, Cheet contacts, contact us CHEET, Contacts Cheet";
		$mpagetitle="Contact Us | CHEET";
		$mpageurl=$host_addr."contact.php";
		$mpagecrumbclass="";
		$mpagecrumbtitle="CONTACT US";
		$mpagecrumbpath='<a href="'.$host_addr.'">Home</a><i class="ci_icon-chevron-right"></i><span class="current">Contact Us</span>';
	}
	/*if(isset($activepage5)){
		$mpagedescription=".";
		$mpagekeywords="latest cds projects in nysc, cds projects in NYSC LAGOS, comunity development scheme, corp members cds, orientation camp, lagos camp, lagos nysc camp";
		$mpagetitle="Community Development Scheme | NYSC Lagos State";
		$mpageurl=$host_addr."cds.php";
	}
	if(isset($activepage6)){
		$mpagedescription="The Skill Acquisition and Entrepreneurship Development scheme is an initiative of the NYSC driven to aid corp members in obtaining necessary skills that will encourage them in turn to pursue entrepreneurship careers in order to reduce their possible time spent in the labour market in search of paid employment. ";
		$mpagekeywords="latest cds projects in nysc, cds projects in NYSC LAGOS, comunity development scheme, corp members cds, orientation camp, lagos camp, lagos nysc camp";
		$mpagetitle="Skill Acquisition and Entrepreneural Development | NYSC Lagos State";
		$mpageurl=$host_addr."saed.php";
	}
	if(isset($activepage7)){
		$mpagedescription="We at NYSC Lagos State understand that corp members and prospective corp members have questions that need answering, though we may not be available at the time
								to attend to you this faq section covers most common ones asked and have well detailsed answers to aid you.";
		$mpagekeywords="NYSC FAQ, frequently asked quesitons, NYSC LAGOS frequently asked questions, questions, orientation camp, lagos camp, lagos nysc camp";
		$mpagetitle="Frequently Asked Questions | NYSC Lagos State";
		$mpageurl=$host_addr."faq.php";
	}
	if(isset($activepage8)){
		$mpagedescription="They say a picture can say a thousand words, well NYSC Lagos must be saying a million with our photo gallery of past and present happenings from the orientation camp to the state coordinators office, and everywhere anything concernining each batch that has gone through the state is happeninig take a look and enjoy.";
		$mpagekeywords="latest galleries in nysc, photos of NYSC LAGOS, eko kopa, corp members galleries, gallery, orientation camp, lagos camp, lagos nysc camp";
		$mpagetitle="Gallery | NYSC Lagos State";
		$mpageurl=$host_addr."gallery.php";
	}*/

?>
<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $mpagetitle;?></title>
		<meta http-equiv="Content-Language" content="en-us">
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta http-equiv="Content-Type" content="text/html;"/>
		<meta name="keywords" content="<?php echo $mpagekeywords;?>"/>
		<meta name="description" content="<?php echo $mpagedescription;?>">
		<meta property="og:locale" content="en_US"/>
		<meta property="fb:app_id" content=""/>
		<meta property="fb:admins" content=""/>
		<meta property="og:type" content="website"/>
		<meta property="og:image" content="<?php echo $mpageimage;?>"/>
		<meta property="og:title" content="<?php echo $mpagetitle;?>"/>
		<meta property="og:description" content="<?php echo $mpagedescription;?>"/>
		<meta property="og:url" content="<?php echo $mpageurl;?>"/>
		<meta property="og:site_name" content="<?php echo $mpagesitename;?>"/>
		<link rel="canonical" href="<?php echo $mpageurl;?>"/>
		<link rel="stylesheet" href="<?php echo $host_addr;?>bootstrap/css/bootstrap.css"/>
		<!-- Light Box -->
		<link href="./stylesheets/lightbox.css" rel="stylesheet"/>
		<link rel="stylesheet" href="<?php echo $host_addr;?>font-awesome/css/font-awesome.min.css"/>
		<link rel="stylesheet" href="<?php echo $host_addr;?>stylesheets/jquery.raty.css"/>
		<link rel="stylesheet" href="<?php echo $host_addr;?>stylesheets/jssorskins.css"/>
		<link rel="icon" href="<?php echo $host_addr;?>images/favicon.ico" sizes="16x16 32x32 64x64" type="image/vnd.microsoft.icon">
		<script src="<?php echo $host_addr;?>scripts/jquery.js"></script>
		<script src="<?php echo $host_addr;?>scripts/lightbox.js"></script>
		<script src="<?php echo $host_addr;?>scripts/mylib.js"></script>
		<?php 
			include('./snippets/themestylesdump.php');
		?>
	</head>