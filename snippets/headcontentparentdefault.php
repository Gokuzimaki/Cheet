<?php
	// This snippets carries the basic theme setup default variables that span accross
	// multiple theme based web apps.
	// the default header, change the variables to what suits you in order to effect the final output of the content
	
	// Global config variable for the session variable prefix for the current project
	!isset($host_sessionvar_prefix)?$host_sessionvar_prefix="ct_":$host_sessionvar_prefix;

	/*Page meta data and Open graph content manipulation
	*$magedescription; this sorts out the default pagecontent for the description meta tag
	*$magekeywords; for the possible keywords to locate the current page
	*$mageimage; path tothe icon for the website
	*$mageurl; path to the current page
	*$mageimage; path to the icon for the website
	*/
	$mpagedescription=isset($mpagedescription)?$mpagedescription:"welcome to CHEET, The aim of this social media is to provide students with all academic materials (i.e. past questions (already solved), projects, project topics, class notes, course materials, project materials etc.), and also all information regarding their school and various departments (e.g. campus news, nysc info, lecturers and courses they handle, yearbooks for each department, classes and timetable etc.) and all other schools.";
	$mpagekeywords=isset($mpagekeywords)?$mpagekeywords:"CHEET, best online student news portal, latest school news in nigeria, latest admission lists in nigeria, nigerian schools admission list, admission list, final year projects, how to write a project proposal, sections of project writeup, post utme exam date, post utme, Okebukola Olagoke, Developed by Okebukola Olagoke, Dream bench Technologies, IVX technologies";
	$mpageimage=isset($mpageimage)?$mpageimage:$host_addr."images/favicon.ico";
	$mpagetitle=isset($mpagetitle)?$mpagetitle:"Welcome | CHEET";
	$mpageogtype=isset($mpageogtype)?$mpageogtype:"website";
	$mpageurl=isset($mpageurl)?$mpageurl:$host_addr;
	$mpagefbappid=isset($mpagefbappid)?$mpagefbappid:"";
	$mpagefbadmins=isset($mpagefbadmins)?$mpagefbadmins:"";
	$mpagesitename=isset($mpagesitename)?$mpagesitename:"CHEET Official Website";
	$mpagecrumbclass=isset($mpagecrumbclass)?$mpagecrumbclass:"hidden";
	$mpagecrumbtitle=isset($mpagecrumbtitle)?$mpagecrumbtitle:"";
	$mpagecrumbtitlepath=isset($mpagecrumbtitlepath)?$mpagecrumbtitlepath:"";
	$mpagecrumbpath=isset($mpagecrumbpath)?$mpagecrumbpath:"";
	/*end page meta defaults*/

	$mpageheadingstyledisplay="hidden"; //variable for holding headerbar style switch for the home page 
	$mpageheadingstyletwodisplay=""; //variable for holding headerbar style switch for other pages 
	
	//for holding varying color stylesheet output content
	$mpagecolorstylesheet="";
	
	// variable to hold the class profile content display on page header navbar
	$mpageuserdisplay='';

	// variable for holding the logout link for any profile type
	$mpagelogoutlink="##";

	// variable for holding the relative path for a users profile image
	$mpageuserimage="images/default.gif";
	
	// variable for telling if a user is logged in and triggering display of profile
	// content on the page header navbar, values are on and off
	$mpageuserloggedin='';
	
	$mpagebanner=""; // for holding the page banner value if one is present
	
	$mpageforcescriptasync="async"; //for holding a default async script value
	
	// google analytics
	$mpagega="
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	      ga('create', 'UA-49730962-1', 'auto');
		  ga('send', 'pageview');
		</script>
	";
	
	$mpagelibscriptextras='';//for holding extra lib scripts to be imported,loads above page
							 //action handling scripts, in this case muyiwasblog.js
	$mpagescriptextras='';//for holding extra scripts to be imported
	$mpagestylesextras='';//for holding extra styles to be imported
	
	$mpagelogostyle='';//for adding extra styling to the logo when necessary, using class
					   //names
	
	$mpagemaps='
		<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
		<script src="'.$host_addr.'scripts/js/maplace.min.js"></script>
	';
	
	$mpagecontactpanel=""; //stores the contact panel section information
	/*shopping and store based variables here */
		// Variable to carry current value of the cart
		$mpagecartcounter=isset($mpagecartcounter)?$mpagecartcounter:"0";

	/*end*/

	// for holding sidebarcontent that sits at the top of the sidebar widget
	$mpagemidsidebarcontent=isset($mpagemidsidebarcontent)?$mpagemidsidebarcontent:"";
	$mpagetopsidebarcontent=isset($mpagetopsidebarcontent)?$mpagetopsidebarcontent:"";
	$mpagesidebarextras=isset($mpagesidebarextras)?$mpagesidebarextras:"";

	// check for active user or subadmin session
	// session variable for logged in user
	if(isset($_SESSION[''.$host_sessionvar_prefix.'schooladminh'])||
		isset($_SESSION[''.$host_sessionvar_prefix.'lecturerh'])||
		isset($_SESSION[''.$host_sessionvar_prefix.'studenth'])||
		isset($_SESSION[''.$host_sessionvar_prefix.'userh'])||
		isset($_SESSION[''.$host_sessionvar_prefix.'instructionh'])||
		isset($_SESSION[''.$host_sessionvar_prefix.'bookstoreh'])||
		isset($_SESSION[''.$host_sessionvar_prefix.'projectmerch'])){
		$mpageuserdisplay=""; // this variable holds the class for hiding or showing the content of the user bar at the top of every page 
		if($_SESSION[''.$host_sessionvar_prefix.'schooladminh']){
			$mpageprofilepageout="schooladmindashboard.php";
			$mpageusertype="schooladmin";
		}elseif($_SESSION[''.$host_sessionvar_prefix.'lecturerh']){
			$mpageprofilepageout="lectureradmindashboard.php";
			$mpageusertype="lecturer";
		}elseif($_SESSION[''.$host_sessionvar_prefix.'studenth']){
			$mpageprofilepageout="studentadmindashboard.php";
			$mpageusertype="student";
		}elseif($_SESSION[''.$host_sessionvar_prefix.'userh']){
			$mpageprofilepageout="useradmindashboard.php";
			$mpageusertype="user";
		}elseif($_SESSION[''.$host_sessionvar_prefix.'instructorh']){
			$mpageprofilepageout="instructoradmindashboard.php";
			$mpageusertype="instructor";
		}elseif($_SESSION[''.$host_sessionvar_prefix.'bookstoreh']){
			$mpageprofilepageout="bookstoreadmindashboard.php";
			$mpageusertype="bookstore";
		}elseif($_SESSION[''.$host_sessionvar_prefix.'projectmerch']){
			$mpageprofilepageout="projectmerchadmindashboard.php";
			$mpageusertype="projectmerc";
		}

		$mpageloginstyle="";
		$mpageprofileheaderdisplayclass="";
		$mpageuserloggedin='on';
		$mpagelogoutlink=$host_addr."logout.php?type=$mpageusertype";
	}else{
		$mpageuserdisplay="hidden";
		$mpageprofilepageout="##";
		$mpageusertype="";
		$mpageusernametext="Guest";
		$mpageloginstyle="";
		$mpageuserimage="images/default.gif";
		
	}

	// preloaderout variable controls if the display of the websites preloader content
	// occurs or doesn't
	$mpagepreloaderout='';
	
	//variable to control default slider display for a pae
	$mpageslider='';
	//variable to control default revolution slider display for a page
	$mpagerevslider='';

	/*Section for customizing page specific meta content*/
		/*Active page variable sections
		*$activepage1=index.php
		*$activepage2=library.php
		*$activepage3=resources.php - (Resource Store)
		*$activepage4=news.php
		*$activepage5=signupin.php - (Login - Register)
		*$activepage6=faq.php
		*$activepage7=forums.php
		*$activepage8=contactus.php
		*/
		if(isset($activepage1)){

		}
		if(isset($activepage2)){
			$mpagedescription="Learn about CHEET, what it stands for, offers and how you can be a part of it";
			$mpagekeywords="Special courses, cheets library, CHEET courses, about past quesitons and how to use them, online courses in Nigeria";
			$mpagetitle="Courses Library | CHEET";
			$mpageurl=$host_addr."library.php";
		}
		if(isset($activepage3)){
			$mpagedescription="Need help with that final year project? ask a friend. Need pro help from notable project creators and assistants on your final project, ask a cheet Project Merc, they get the job done";
			$mpagekeywords="help with final year project, polytechnic past projects, university projects, final year project helper, ready made final year projects, school projects, help with school projects";
			$mpagetitle="Resources | CHEET";
			$mpageurl=$host_addr."resources.php";
		}
		if(isset($activepage4)){
			$mpagedescription="From our platform news and updates, to the latest in project mercenaries and bookstore offerings, cheet is here to give you the best and keep you in the know of it all";
			$mpagekeywords="get in touch, Cheet contacts, contact us CHEET, Contacts Cheet";
			$mpagetitle="News | CHEET";
			$mpageurl=$host_addr."news.php";
		}
		if(isset($activepage5)){
			$mpagedescription="Come on board the cheet platform today, we have what it takes to help you CHEET your way ahead";
			$mpagekeywords="login to cheet, sign in to cheet account, register with cheet, signup with cheet, how to signup on cheet, create a cheet profile, make a cheet profile";
			$mpagetitle="Login - Register | CHEET";
			$mpageurl=$host_addr."signupin.php";
		}
		if(isset($activepage6)){
			$mpagedescription="Our FAQ page has all the information  you need to guide you from registeration to complete mastery of our platform and how to make it work for you";
			$mpagekeywords="frequently asked questions, how to on cheet, how to use cheet, how to signup on cheet, how to post a course on cheet, how to create a paid course on cheet, creating a book store account on cheet, how to make money with cheet";
			$mpagetitle="Frequently Asked Questions | CHEET";
			$mpageurl=$host_addr."faq.php";
		}
		if(isset($activepage7)){
			$mpagedescription="Our exciting forums are a nexus for intelligent individuals to ask and share answers to questions, be it coursed based questions or just general requests we have you covered";
			$mpagekeywords="Forums on cheet, cheet forums, course forums on cheet, bookstore forums on cheet, project mercenaries on cheet";
			$mpagetitle="Forums | CHEET";
			$mpageurl=$host_addr."forums.php";
		}
		if(isset($activepage8)){
			$mpagedescription="Get in touch with us, we are available to receive your calls and messages from 8am - 5pm weekdays";
			$mpagekeywords="get in touch, Cheet contacts, contact us CHEET, Contacts Cheet";
			$mpagetitle="Contact Us | CHEET";
			$mpageurl=$host_addr."contactus.php";
		}

	/*end of specific meta content section*/

?>