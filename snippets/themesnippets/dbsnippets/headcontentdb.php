<?php
	// the default header, change the variables to what suits you in order to effect the final output of the content
	$mpagedescription=isset($mpagedescription)?$mpagedescription:"Dream Bench technology, is a tech based services provider company located in Nigeria, started an run by a group of entrepreneurs, completely enamoured by technology and having years of experince in the industry individually.";
	$mpagekeywords=isset($mpagekeywords)?$mpagekeywords:"Dream Bench, 
	Dream Bench technologies, Dream Bench Technology, Technology, 
	Nigerian based tech companies, tech company in Nigeria, 
	technology equipment supplier in Nigeria, Technology Business, 
	business technology, latest computer systems supplier in Nigeria, 
	Latest computers, Laptop Supplier in Nigeria, latest laptop supplier in Nigeria, 
	Odemene Wilson, Okebukola Olagoke, Alexander Ewetumo, Emmanuel Edeh, Odemene George, 
	Top Programmers in Africa, Top programming company in Africa, 
	Top Programming company in Nigeria, best program solutions in Nigeria, 
	Software Company, Software Company in Nigeria, 
	Best mobile application development company in Nigeria, 
	Best website development company in Nigeria, 
	Best web based software solution provider in Nigeria, 
	Best Graphic Design Companies in Nigeria, 
	mobile applications development companies in Nigeria, 
	mobile application company, 
	networking equipment supplier in Nigeria, 
	complete computer system management provider in Nigeria, 
	Enterprise Resource Planning Software provider, 
	Business profile development services, 
	staff Information technology education services";
	$mpageimage=isset($mpageimage)?$mpageimage:$host_addr."images/favicon.png";
	$mpagetitle=isset($mpagetitle)?$mpagetitle:"Welcome | Dream Bench Technologies";
	$mpageurl=isset($mpageurl)?$mpageurl:$host_addr;
	$mpagefbappid=isset($mpagefbappid)?$mpagefbappid:"";
	$mpagefbadmins=isset($mpagefbadmins)?$mpagefbadmins:"";
	$mpagesitename=isset($mpagesitename)?$mpagesitename:"Dream Bench Technologies";
	$mpagecrumbclass=isset($mpagecrumbclass)?$mpagecrumbclass:"hidden";
	$mpagecrumbtitle=isset($mpagecrumbtitle)?$mpagecrumbtitle:"";
	$mpagecrumbpath=isset($mpagecrumbpath)?$mpagecrumbpath:"";
	$mpageheaderclass=isset($mpageheaderclass)?$mpageheaderclass:"";
	$mpagelinkclass=isset($mpagelinkclass)?$mpagelinkclass:"";
	$mpagelinkclass2=isset($mpagelinkclass2)?$mpagelinkclass2:"";
	$mpagelinkclass3=isset($mpagelinkclass3)?$mpagelinkclass3:"";
	$mpagecolorstylesheet="";
	// google analytics
	$mpagega="
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	      ga('create', 'auto', '');
		  ga('send', 'pageview');
		</script>
	";
	$mpagemaps='
		<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
		<script src="'.$host_addr.'scripts/js/maplace.min.js"></script>
	';
	$mpagecontactpanel=""; //stores the contact panel section information
	// generate link for clients to job post, only show when there is a user logged in
	$clientlink='';
	// for holding default flexslider
	$mpageflexout='
		<div class="header-banner">
			<div class="flexslider header-slider">
				<ul class="slides">
					<li>
						<img src="'.$host_addr.'images/transparent.png" alt="">
						<div data-image="'.$host_addr.'images/content/slide1.jpg"></div>
					</li>

					<li>
						<img src="'.$host_addr.'images/transparent.png" alt="">
						<div data-image="'.$host_addr.'images/content/slide4.jpg"></div>
					</li>

					<li>
						<img src="'.$host_addr.'images/transparent.png" alt="">
						<div data-image="'.$host_addr.'images/content/slide7.jpg"></div>
					</li>
				</ul>
			</div
		</div><!-- end .header-banner -->
	'; 
	// get career and quote content
	$careeradvice=getAllGeneralInfo("viewer","careeradvice","");
	$quoteout=getAllGeneralInfo("viewer","fjcquote","");
	// for holding sidebarcontent that sits at the top of the sidebar widget
	$mpagemidsidebarcontent=isset($mpagemidsidebarcontent)?$mpagemidsidebarcontent:"";
	$mpagetopsidebarcontent=isset($mpagetopsidebarcontent)?$mpagetopsidebarcontent:"";
	$mpagesidebarextras=isset($mpagesidebarextras)?$mpagesidebarextras:"";
	/*Active page variable sections
	*$activepage1=frontiersconsultingtwo.php
	*$activepage2=fjcjobs.php
	*$activepage3=fjcrecruits.php
	*$activepage4=fjcnews.php
	*$activepage5=fjcregister.php
	*$activepage6=fjccontactus.php
	*$activepage7=fjcfaq.php
	*/
	// check for active user or employee session
	$mpagersearchstyle="hidden"; // control variable for displaying recruit search panel
	$mpagejobsearchstyle="hidden"; // control variable for displaying job search panel
	$mpageloginstyle="";
	$recruitname="";
	if((isset($_SESSION['employerh'])&&$_SESSION['employerh']!=="")||(isset($_SESSION['recruith'])&&$_SESSION['recruith']!=="")){
		$mpageuserdisplay="";
		isset($_SESSION['employerh'])?$mpageprofilepageout="fjcemployer.php":$mpageprofilepageout="fjcrecruits.php";
		isset($_SESSION['employerh'])?$mpageusertype="employer":$mpageusertype="recruit";
		if(isset($_SESSION['employerh'])){
			$mpagersearchstyle="hidden";
			$mpagejobsearchstyle="hidden";
		}
		if(isset($_SESSION['recruith'])&&$_SESSION['recruith']!==""){
			$mpagersearchstyle="hidden";
			$mpagejobsearchstyle="hidden";
			$recruitname=$_SESSION['recruitname'];
			$mpagelinkclass3="hidden";
			$clientlink='
				<li class="">
					<a href="'.$host_addr.'fjcregister.php?t=client">Job Post</a>
				</li>
			';
		}
		$mpageloginstyle="hidden";
		$mpagesearchstyle="hidden";
	}else{
		$mpageuserdisplay="hidden";
		$mpageprofilepageout="";
		$mpageusertype="";
		$mpageloginstyle="";
		$mpagersearchstyle="hidden";
		$mpagejobsearchstyle="hidden";
	}

	if(isset($activepage1)){
		$mpagecontactpanel='
			<section id="contact-panel">
				<div class="container">
					<div id="contact-panel_social">
						<a class="icon-twitter-bird" href="index_3.html#"></a>
						<a class="icon-linkedin-rect" href="index_3.html#"></a>
						<a class="icon-facebook-rect" href="index_3.html#"></a>
					</div>

					<p><i class="icon-phone base-text-color"></i>Call: 8 800 625 32 48</p>

					<p><i class="icon-mail base-text-color"></i> <a href="index_3.html">Contact us via email</a></p>
				</div>
			</section>
		';
		$mpagelinkclass3="hidden";
		$mpagemaps="";
		$mpagecrumbclass="";
		$mpagecrumbtitle="Jobs";
		$mpagecrumbpath='
			<section id="headline">
				<div class="container">
					<div class="section-title clearfix">
						<h2 class="fl-l">'.$mpagecrumbtitle.'</h2>

						<ul id="breadcrumbs" class="fl-r">
							<li><a href="'.$host_addr.'">Home</a></li>
							<li>'.$mpagecrumbtitle.'</li>
							<li><a class="icon-twitter-bird sociallink" href="http://www.twitter.com/franklyafolabi"></a></li>
							<li><a class="icon-linkedin-rect sociallink" href="http://www.linkedin.com/profile/view?id=37212987"></a></li>
							<li><a class="icon-facebook-rect sociallink" href="http://www.facebook.com/franklyspeakingwithmuyiwaafolabi"></a></li>
						</ul>
					</div>
				</div>
			</section>
		';
	}
	// current_page_item current-menu-ancestor current-menu-parent current_page_parent current_page_ancestor
	if(isset($activepage2)){
		$mpagedescription="Frontiers International Services limited is a world class Commercial Capacity Development and Work-Attitude Upgrade firm,supporting and equipping Businesses and Managers with commercial abilities, attitudes and behaviors required for sustainable superlative growth. Our service quality and diagnostic approach to delivery has sustained  partnerships and growing relationships with major clients in Nigeria and overseas.";
		$mpagekeywords="Frontiers Consulting, Muyiwa Afolabi, muyiwa afolabi, frontiers consulting, frankly speaking with muyiwa afolabi, frankly speaking, motivational speaker in nigeria, business strategists in the world, reformation packages, Christ Society Internationa Outreach, Project Fix Nigeria, Own Your Own, Nigerian career radio talk show";
		$mpagetitle="Frontiers Consulting | Muyiwa Afolabi's Website";
		$mpageurl=$host_addr."frontiersconsulting.php";
		$mpagecrumbclass="";
		$mpagecrumbtitle="Frontiers Consulting";
		$mpagecrumbpath='
			<section id="headline">
				<div class="container">
					<div class="section-title clearfix">
						<h2 class="fl-l">'.$mpagecrumbtitle.'</h2>
						<ul id="breadcrumbs" class="fl-r">
							<li><a href="'.$host_addr.'">Home</a></li>
							<li>'.$mpagecrumbtitle.'</li>
							<li><a class="icon-twitter-bird sociallink" href="http://www.twitter.com/franklyafolabi"></a></li>

							<li><a class="icon-linkedin-rect sociallink" href="http://www.linkedin.com/profile/view?id=37212987"></a></li>

							<li><a class="icon-facebook-rect sociallink" href="http://www.facebook.com/franklyspeakingwithmuyiwaafolabi"></a></li>
						</ul>
					</div>
				</div>
			</section>
		';
		$mpageflexout='';
		$mpagemaps="";
	}
	if(isset($activepage3)){
		$mpagedescription="Frontiers Marketing International; in order to achieve 
								rapid and successful market penetration with Longrich 
								brands in Nigeria and Africa, has adopted an uncommon 
								sales and distribution strategy.<br> 
								We trust Longrich products and we are convinced you'd continue 
								to use and even recommend to friends and family after using them 
								yourself.";
		$mpagekeywords="FBI Trade network, frontiers business trade network, Long rich international";
		$mpagetitle="FBI Trade network | Frontiers International Marketing Services";
		$mpageurl=$host_addr."fbitradenetwork.php";
		$mpagecrumbclass="";
		$mpagecrumbtitle="FBI Trade Network";
		$mpagecrumbpath='
			<section id="headline">
				<div class="container">
					<div class="section-title clearfix">
						<h2 class="fl-l">'.$mpagecrumbtitle.'</h2>

						<ul id="breadcrumbs" class="fl-r">
							<li><a href="'.$host_addr.'">Home</a></li>
							<li>'.$mpagecrumbtitle.'</li>
						</ul>
					</div>
				</div>
			</section>';
		$mpageflexout='';
		$mpagemaps="";
	}
	if(isset($activepage4)){
		$mpagedescription=" News on Frontiers Job-Connect, keeping you informed on what you need to know about the Nigerian Job market";
		$mpagekeywords="Best News on latest available jobs, best kjobs, kickstart my career, stepping stone jobs in Nigeria";
		$mpagetitle="News | Frontiers Job Connect";
		$mpageurl=$host_addr."fjcblog.php";
		$mpagecrumbclass="";
		$mpagecrumbtitle="News";
		$mpagecrumbpath='
			<div class="header-page-title">
				<div class="container">
					<h1>'.$mpagecrumbtitle.'</h1>

					<ul class="breadcrumbs">
						<li><a href="'.$host_addr.'">Home</a></li>
						<li><span class="current">'.$mpagecrumbtitle.'</span></li>
					</ul>
				</div>
			</div>
		';
		$mpageflexout='';
		$mpagemaps="";
	}
	if(isset($activepage5)){
		$mpagedescription="Register with Frontiers Job-Connect, kickstart a wonderful fulfilling career today, or get the best person for that job. Join as a recruit or an employer";
		$mpagekeywords="register, register frontiers job consulting, job consulting, recruit registration";
		$mpagetitle="Register | Frontiers Job Connect";
		$mpageurl=$host_addr."fjcregister.php";
		$mpagecrumbclass="";
		$mpagecrumbtitle="REGISTER";
		$mpagecrumbpath='
			<section id="headline">
				<div class="container">
					<div class="section-title clearfix">
						<h2 class="fl-l">'.$mpagecrumbtitle.'</h2>

						<ul id="breadcrumbs" class="fl-r">
							<li><a href="'.$host_addr.'">Home</a></li>
							<li>'.$mpagecrumbtitle.'</li>
						</ul>
					</div>
				</div>
			</section>
		';
		$mpageflexout='';
		$mpagemaps="";
	}
	if(isset($activepage6)){
		$mpagedescription="Get in touch with us, we are availlable to receive your calls from 8am - 5pm weekdays";
		$mpagekeywords="get in touch, Frontiers Consulting, contact us frontiers job-connect, reach frontiers consulting";
		$mpagetitle="Contact Us | Frontiers Job Connect";
		$mpageurl=$host_addr."contact.php";
		$mpagecrumbclass="";
		$mpagecrumbtitle="Contact Us";
		$mpagecrumbpath='
			<section id="headline">
				<div class="container">
					<div class="section-title clearfix">
						<h2 class="fl-l">'.$mpagecrumbtitle.'</h2>

						<ul id="breadcrumbs" class="fl-r">
							<li><a href="'.$host_addr.'">Home</a></li>
							<li>'.$mpagecrumbtitle.'</li>
						</ul>
					</div>
				</div>
			</section>
		';
		$mpageflexout='';
	}
	if(isset($activepage7)){
		$mpagedescription="Frequently Asked Questions on Frontiers Job-connect, confused, don't know what to do, can't get in touch with us, this section is ,we are availlable to receive your calls from 8am - 5pm weekdays,";
		$mpagekeywords="Frequently asked questions, FAQ Frontiers Conculting, contact us frontiers job-connect, reach paul Erubami";
		$mpagetitle="F.A.Q | Frontiers Job Connect";
		$mpageurl=$host_addr."fjcfaq.php";
		$mpagecrumbclass="";
		$mpagecrumbtitle="Frequently Asked Questions";
		$mpagecrumbpath='
			<section id="headline">
				<div class="container">
					<div class="section-title clearfix">
						<h2 class="fl-l">'.$mpagecrumbtitle.'</h2>

						<ul id="breadcrumbs" class="fl-r">
							<li><a href="'.$host_addr.'">Home</a></li>
							<li>'.$mpagecrumbtitle.'</li>
						</ul>
					</div>
				</div>
			</section>
		';
		$mpageflexout='';
		$mpagemaps="";
	}
	if(isset($activepage8)){
		$mpagedescription="Login to your Frontiers Job-connect Acount. Need to change you information on the frontiers job connect platform, Login to your account and do just that with ease.";
		$mpagekeywords="Login, Login Frontiers Conculting, frontiers job-connect Login, Login FJC";
		$mpagetitle="Login | Frontiers Job Connect";
		$mpageurl=$host_addr."fjclogin.php";
		$mpagecrumbclass="";
		$mpagecrumbtitle="Login";
		$mpagecrumbpath='
			<div class="header-page-title">
				<div class="container">
					<h1>'.$mpagecrumbtitle.'</h1>

					<ul class="breadcrumbs">
						<li><a href="'.$host_addr.'">Home</a></li>
						<li><span class="current">'.$mpagecrumbtitle.'</span></li>
					</ul>
				</div>
			</div>
		';
		$mpageflexout='';
		$mpagemaps="";
	}
	// for holding default sidebar
	$mpagesidebar='
		
	';
	// for holding my leagacy fullbackground markup
	$mpagelegacyfullbackground='
		<div id="fullbackground"></div>
		<div id="fullcontenthold">
			<div id="fullcontent">
				<span name="specialheader">28-09-2014 Events</span><br>
				<div id="eventhold">
					<div id="eventtitle">The  Event title</div>
					<div id="eventdetails">The full event details</div>
				</div>

				<div id="closecontainer" name="closefullcontenthold" data-id="theid" class="altcloseposfour"><img src="./images/closefirst.png" title="Close"class="total"/></div>
	 			<img src="" name="galleryimgdisplay" title="gallerytitle" />
	 			<img src="http://localhost/muyiwasblog/images/waiting.gif" name="fullcontentwait"/>
			</div>
			<div id="fullcontentheader">
				<input type="hidden" name="gallerycount" value="0"/>
				<input type="hidden" name="currentgalleryview" value="0"/>			
			</div>
			<div id="fullcontentdetails">
			</div>

			<div id="fullcontentpointerhold">
				<!--<div id="fullcontentpointerholdholder">
					<div id="fullcontentpointerleft">
						<img src="./images/pointerleft.png" name="pointleft" id="" data-pointer="" class="total"/>
					</div>
					<div id="fullcontentpointerright">
						<img src="./images/pointerright.png" name="pointright" id="" data-pointer="" class="total"/>
					</div>
				</div>-->
			</div>
		</div>
	';
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
	<!-- <link rel="stylesheet" href="<?php echo $host_addr;?>bootstrap/css/bootstrap.css"/> -->
	<!-- Light Box -->
	<link href="<?php echo $host_addr;?>stylesheets/lightbox.css" rel="stylesheet"/>
	<link rel="stylesheet" href="./stylesheets/jquery.zrssfeed.css"/>
	<link rel="stylesheet" href="<?php echo $host_addr;?>stylesheets/font-awesome/css/font-awesome.min.css"/>
	<link rel="stylesheet" href="<?php echo $host_addr;?>stylesheets/jquery.raty.css"/>
	<link rel="stylesheet" href="<?php echo $host_addr;?>stylesheets/jssorskins.css"/>
	<link rel="icon" href="<?php echo $host_addr;?>images/muyiwaslogo.png" type="image/png"/>
	<script src="<?php echo $host_addr;?>scripts/jquery.js"></script>
	<!-- // <script src="<?php echo $host_addr;?>scripts/jquery.zrssfeed.min.js"></script> -->
	<!-- // <script src="<?php echo $host_addr;?>scripts/jquery.vticker.js"></script> -->
	<!-- // <script src="<?php echo $host_addr;?>scripts/zrssreaderconfig.js"></script> -->
	<script src="<?php echo $host_addr;?>scripts/lightbox.js"></script>
	<script src="<?php echo $host_addr;?>bootstrap/js/bootstrap.js"></script>
	<script src="<?php echo $host_addr;?>scripts/mylib.js"></script>
	<script src="<?php echo $host_addr;?>scripts/formchecker.js"></script>
	<script src="<?php echo $host_addr;?>scripts/dreambench.js"></script>
	<?php 
		include('./snippets/dbthemestylesdump.php');
		echo $mpagega;
	?>
</head>