<?php
	// make default site information available
	include(''.$host_tpathplain.'defaultsmodule.php');

	// the default header, change the variables to what suits you in order to effect the final output of the content
	$mpagedescription=isset($mpagedescription)?$mpagedescription:
	"Dream Bench technology, is a tech based services provider company located in Nigeria, 
	started an run by a group of entrepreneurs, completely enamoured by technology and 
	having years of experince in the industry individually.";

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
	$mpageimage=isset($mpageimage)?$mpageimage:$host_addr."images/favicon.ico";
	$mpagetitle=isset($mpagetitle)?$mpagetitle:"Welcome | Dream Bench Technologies";
	$mpageurl=isset($mpageurl)?$mpageurl:$host_addr;
	$mpagecanonicalurl=isset($mpagecanonicalurl)?$mpagecanonicalurl:$host_addr;
	$mpageogtype=isset($mpageogtype)?$mpageogtype:"website";
	$mpageextrametas=isset($mpageextrametas)?$mpageextrametas:"";
	$mpagefbappid=isset($mpagefbappid)?$mpagefbappid:"";
	$mpagefbadmins=isset($mpagefbadmins)?$mpagefbadmins:"";
	$mpagesitename=isset($mpagesitename)?$mpagesitename:"Dream Bench Technologies";
	$mpagecrumbclass=isset($mpagecrumbclass)?$mpagecrumbclass:"hidden";
	$mpagecrumbtitle=isset($mpagecrumbtitle)?$mpagecrumbtitle:"";
	$mpagecrumbpath=isset($mpagecrumbpath)?$mpagecrumbpath:"";
	$mpageheaderclass=isset($mpageheaderclass)?$mpageheaderclass:"";
	$mpagelinkclass=isset($mpagelinkclass)?$mpagelinkclass:"";
	$mpageblogid=isset($mpageblogid)?$mpageblogid:1;
	$mpagelinkclass2=isset($mpagelinkclass2)?$mpagelinkclass2:"";
	$mpagelinkclass3=isset($mpagelinkclass3)?$mpagelinkclass3:"";
	$mpage_lsb=isset($mpage_lsb)?$mpage_lsb:"";
	$mpagecolorstylesheet="";
	// google analytics
	$mpagega="
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	      ga('create', 'auto', '$defaultgatrackcode');
		  ga('send', 'pageview');
		</script>
	";
	
	
	// control the load point for the styles on the page
    $mpagestyleload="top";
	$mpagemergedscripts="";
	$mpagemergedstyles="";
	if(!isset($mpagemaps)){
		$mpagemaps='
			<script src="http://maps.google.com/maps/api/js?key=AIzaSyCA7H4Akqm2e2FpcsOVg4L6dppS7bmETJQ"></script>
			<!-- // <script src="'.$host_addr.'scripts/js/maplace.min.js"></script>-->
		';
	}
	// for holding socialnetwork initiation scripts
	$mpagesdksmarkuproot='
		<div id="fb-root"></div>
	';
	$mpagesdks='
		<script type="text/javascript">
		(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=223614291144392";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, \'script\', \'facebook-jssdk\'));</script>
		<!-- For google plus -->
		<script type="text/javascript">
		  (function() {
		    var po = document.createElement(\'script\'); po.type = \'text/javascript\'; po.async = true;
		    po.src = \'https://apis.google.com/js/platform.js\';
		    var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(po, s);
		  })();
		</script>

		<!-- For twitter -->
		<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?\'http\':\'https\';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+\'://platform.twitter.com/widgets.js\';fjs.parentNode.insertBefore(js,fjs);}}(document, \'script\', \'twitter-wjs\');</script>

		<!-- For LinkedIn -->
		<script src="//platform.linkedin.com/in.js" type="text/javascript">
		 lang: en_US
		</script>
	';
	// generate link for clients to job post, only show when there is a user logged in
	$clientlink='';
	
	$mpagebannerone='
		<div class="site-content-banner">
	    	<img src="'.$host_addr.'images/fiwl/slide2.jpg"/>
	    </div>
	';
	$mpagebannermobileone='
		
	';
	$mpagevegasone='
		
	';
	
	//for holding extra lib scripts to be imported,loads above page
	//action handling scripts
	$mpagelibscriptextras=isset($mpagelibscriptextras)?$mpagelibscriptextras:'';
	
	// for holding extra lib styles in a per page scenario. also loads in page header
	$mpagelibstyleextras=isset($mpagelibstyleextras)?$mpagelibstyleextras:'';

	//for holding extra scripts to be imported in the themescripts file
	$mpagescriptextras=isset($mpagescriptextras)?$mpagescriptextras:'';
	
	//for holding extra styles to be imported themestylesheets file
	$mpagestylesextras='';
	
	//for adding extra styling to the logo when necessary, using class
	//names
	$mpagelogostyle='';
	// get career and quote content
	// $careeradvice=getAllGeneralInfo("viewer","businessadvice","");
	// $quoteout=getAllGeneralInfo("viewer","oyoquote","");
	$mpageblogcarousel='';
	$mpageblogcarouselrecent='';

	// for carrying home page banner or background images for oage header
	$mpagetopbanner="";
	// for carrying top banners for plain pages
	$mpagetopbannersplain[0]=$host_addr.'images/dreambenchimages/backgrounds/topbanners/dreambenchtopbanner1.jpg';
	$mpagetopbannersplain[1]=$host_addr.'images/dreambenchimages/backgrounds/topbanners/dreambenchtopbanner2.jpg';
	$mpagetopbannersplain[2]=$host_addr.'images/dreambenchimages/backgrounds/topbanners/dreambenchtopbanner3.jpg';
	$mpagetopbannersplain[3]=$host_addr.'images/dreambenchimages/backgrounds/topbanners/dreambenchtopbanner4.jpg';
	$mpagetopbanners='
		<div class="inner-banner"><img src="'.$mpagetopbannersplain[rand(0,count($mpagetopbannersplain)-1)].'" alt="img"></div>
	';
	
	// for holding sidebarcontent that sits at the top of the sidebar widget
	$mpagemidsidebarcontent=isset($mpagemidsidebarcontent)?$mpagemidsidebarcontent:"";
	$mpagetopsidebarcontent=isset($mpagetopsidebarcontent)?$mpagetopsidebarcontent:"";
	$mpagesidebarextras=isset($mpagesidebarextras)?$mpagesidebarextras:"";


	/*Active page variable sections
	*$activepage1=index.php
	*$activepage2=blog.php
	*$activepage3=portfolio.php
	*$activepage4=services.php
	*$activepage5=about.php
	*$activepage6=team.php
	*$activepage7=contact.php
	*/
	$mpagesearchclass="hidden"; // control variable for displaying header search panel
	
	$data=array();
	$hwdata=array();
	$rweldata=array();
	$iweldata=array();
	if(isset($activepage1)){
		if(isset($host_env)&&$host_env=="online"){
			$mpagemergedscripts="true";
			$mpagemergedstyles="true";
		}
		$mpage_lsb="";
		// $mpagestyleload="bottom";
		$mpagelinkclass3="hidden";
		$mpagemaps="";
		$mpagehomeheaderclass="home-page";
		
		$mpagetopbanners="";
		// prepdata variables for the home page
		// get the home page welcome message
		$data[0]="homewelcomemsg";
		$data[1]="viewer";
		$hwdata=getSingleGeneralInfo("",$data);
		// var_dump($hwdata);
		// destroy data array when done with it
		// unset($data);

		// get top and bottom collage boxes

		$vtype[0]="hometopcollagebox";
		$vtype['order']="order by id asc";
		// $vtype[2]="rundouble";
		$tcbdata=getAllGeneralInfo("viewer",$vtype,'');
		$vtype[0]="homebottomcollagebox";
		// $vtype[2]="rundouble";
		$bcbdata=getAllGeneralInfo("viewer",$vtype,'');
		// var_dump($tcbdata);
		// $tcbintrodata=getAllGeneralInfo("viewer","hometopcollageboxintro",'');
		// var_dump($tcbintrodata);
		// $bcbintrodata=getAllGeneralInfo("viewer","homebottomcollageboxintro",'');
		$mpagelibscriptextras='
			<script type="text/javascript" src="'.$host_addr.'plugins/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
			<script type="text/javascript" src="'.$host_addr.'plugins/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
			<script async>
				jQuery(document).ready(function() {
				   jQuery(\'.tp-banner\').show().revolution(
					{
						delay:9000,
						startwidth:1170,
						startheight:500,
						hideThumbs:200,
						
						thumbWidth:100,
						thumbHeight:50,
						thumbAmount:5,
						
						navigationType:"none",
						navigationArrows:"solo",
						navigationStyle:"preview1",
						
						navigationHAlign:"center",
						navigationVAlign:"bottom",
						navigationHOffset:0,
						navigationVOffset:20,

						soloArrowLeftHalign:"left",
						soloArrowLeftValign:"center",
						soloArrowLeftHOffset:20,
						soloArrowLeftVOffset:0,

						soloArrowRightHalign:"right",
						soloArrowRightValign:"center",
						soloArrowRightHOffset:20,
						soloArrowRightVOffset:0,
						
						parallax:"mouse",
						parallaxBgFreeze:"on",
						parallaxLevels:[7,4,3,2,5,4,3,2,1,0],
						
						spinner:"spinner3",

						hideThumbsOnMobile:"on",
						hideNavDelayOnMobile:1500,
						hideBulletsOnMobile:"on",
						hideArrowsOnMobile:"on",
						hideThumbsUnderResolution:320,
						
						touchenabled:"on",
						onHoverStop:"on",
						
						hideTimerBar: "on"
					});
				});
			</script>
			';
		$mpagelibstyleextras='
			<link rel="stylesheet"  type="text/css" href="'.$host_addr.'plugins/rs-plugin/css/settings.css" media="screen"/>
		';
	}

	if(isset($activepage2)){
		$mpagedescription="";
		$mpagekeywords.="dreambench resources, dreambench, resources, resource content, multimedia resources, dreambench case studies, dreambench articles, seminars, articles, videos, case studies";
		$mpagetitle="Blog | Dream Bench";
		$data[0]="blogwelcomemsg";
		$data[1]="viewer";
		$rweldata=getSingleGeneralInfo("",$data);
		$mpageurl==""?$host_addr."blog.php":$mpageurl;
		$mpagecrumbclass="";
		$mpagecrumbtitle==""?$mpagecrumbtitle="Blog":$mpagecrumbtitle;
		$mpagecrumbpath='
			<div class="breadcrumb-bar">
				<ul class="breadcrumb">
					<li><a href="'.$host_addr.'">Home</a></li>
					<li class="active">'.$mpagecrumbtitle.'</li>
				</ul>
			</div>
			<div class="default-text-banner">
				<div class="container">
					<h1 class="banner-text">Our Blog</h1>
				</div>
			</div>
		';
		// $mpagescriptextras.='<script src="'.$host_addr.'scripts/themescripts/owl.carousel.min.js"></script>';	
		// $mpagelibstyleextras.='<link rel="stylesheet" href="'.$host_addr.'plugins/bootpag/css/bootpag.css"/>';	
		$mpagemaps="";

	}

	if(isset($activepage3)){
		$mpagedescription="Our achievements, and jobs completed in the field of technology amongst others, on show case for you.";
		$mpagekeywords="";
		$mpagetitle="Portfolio | Dream Bench";
		$mpageurl==""?$host_addr."portfolio.php":$mpageurl;
		$mpagecrumbtitle="Portfolio";
		$mpagecrumbclass="";
		$mpagecrumbpath='
			<div class="breadcrumb-bar">
				<ul class="breadcrumb">
					<li><a href="'.$host_addr.'">Home</a></li>
					<li class="active">'.$mpagecrumbtitle.'</li>
				</ul>
			</div>
			<div id="slider" class="top-banner white-left-skew-bc">
				<img alt="img" src="'.$host_addr.'images/backgrounds/background7.jpg">
				<div class="banner-content banner-shortcodes">
					<p class="banner-text">The best of what we DO</p>
				</div>
			</div>
		';
		$mpageflexout='';
		$mpagemaps="";
		$data[0]="infodeskwelcomemsg";
		$data[1]="viewer";
		$iweldata=getSingleGeneralInfo("",$data);
		// $blogoutcarousel=getAllBlogEntries("viewer",'',$mpageblogid,"blogtype");

		// $mpageblogcarousel=$blogoutcarousel['recentpostspecificllcarousel'];
		$mpagescriptextras.='<script src="'.$host_addr.'plugins/bootpag/jquery.bootpag.min.js"></script>';	
		$mpagelibstyleextras.='<link rel="stylesheet" href="'.$host_addr.'plugins/bootpag/css/bootpag.css"/>';
	}

	if(isset($activepage4)){
		$mpagedescription="Our Services";
		$mpagekeywords="See how we help and effect positive change to the society at large via the services we offer";
		$mpagetitle="Our Services | Dream Bench";
		$mpageurl=$host_addr."services.php";
		$data[0]="servicewelcomemsg";
		$data[1]="viewer";
		$sweldata=getSingleGeneralInfoPlain("servicewelcomemsg");
		$data[0]="productservices";
		// $data[1]="viewer";
		$servicesdata=getAllGeneralInfo("viewer",$data,"all");
		$mpagecrumbclass="";
		$mpagecrumbtitle="Our Services";
		$mpagecrumbpath='
			<div class="breadcrumb-bar">
				<ul class="breadcrumb">
					<li><a href="'.$host_addr.'">Home</a></li>
					<li class="active">'.$mpagecrumbtitle.'</li>
				</ul>
			</div>
			<div id="slider" class="top-banner white-right-skew">
				<img alt="img" src="'.$host_addr.'images/backgrounds/background6.jpg">
				<div class="banner-content banner-services-2">
					<p class="banner-head">Encompasing the vastness of technology</p>
					<p class="banner-text">Providing Future proof Solutions.</p>
				</div>
			</div>
		';
		$mpageflexout='';
		$mpagemaps="";
		$mpagescriptextras.='
		<script src="'.$host_addr.'plugins/timeliner/js/timeliner.js"></script>
		<script>
			$(document).ready(function() {
                $.timeliner({});
        	});
		</script>

		';	
		$mpagelibstyleextras='
			<link rel="stylesheet" href="'.$host_addr.'plugins/timeliner/css/timeliner.css"/>
			<link rel="stylesheet" href="'.$host_addr.'plugins/timeliner/css/responsive.css"/>
		';	
	}
	
	if(isset($activepage5)){
		$mpagedescription="Get more information about who we are, and what our team comprises individually";
		$mpagekeywords.="Dream bench team, developers in Nigeria, Business Managers in Nigeria, who is dreambench, what is dreambench, what does dreambench stand for, ";
		$mpagetitle="Meet The Team | DreamBench";
		/*$data[0]="aboutwelcomemsg";
		$data[1]="viewer";
		$aweldata=getSingleGeneralInfoPlain("aboutwelcomemsg");
		$data[0]="directorsection";
		$data[1]="viewer";
		$directordata=getSingleGeneralInfoPlain("directorsection");
		$data[0]="trustees";*/
		// $data[1]="viewer";
		

		/*$data[0]="directorsection";
		$data[1]="viewer";
		$directordata=getSingleGeneralInfo("",$data);*/
		$mpageurl==""?$host_addr."team.php":$mpageurl;
		$mpagecrumbtitle==""?$mpagecrumbtitle="About Us":$mpagecrumbtitle;
		$mpagecrumbclass="";

		$mpagecrumbpath='
			<div class="breadcrumb-bar">
				<ul class="breadcrumb">
					<li><a href="'.$host_addr.'">Home</a></li>
					<li class="active">'.$mpagecrumbtitle.'</li>
				</ul>
			</div>
			<div id="slider" class="top-banner white-right-skew">
				<img alt="img" src="'.$host_addr.'images/dbrimages/career-banner.jpg">
				<div class="banner-content banner-career">
					<p class="banner-head">Enamoured with technology</p>
					<p class="banner-text">And Excellence Driven</p>
				</div>
			</div>
		';
		// remove path crumb
		// $mpagecrumbpath="";
		// $mpageflexout='';
		$mpagemaps="";
	}

	if(isset($activepage6)){
		$mpagedescription="Learn more about Dream Bench Technologies, who we are what we represent";
		$mpagekeywords.="About Dream Bench, Dream Bench, Who is dream bench, tech industry in Nigeria,
		 Dream Bench Tech, who is dream bench, what is dreambench, companies transforming technology in Nigeria";
		$mpagetitle="About Us | Dream Bench Tech";
		$mpageurl=$host_addr."about.php";
		$mpagecrumbclass="";
		$mpagecrumbtitle="About DreamBench";
		$data[0]="portfoliogallerywelcomemsg";
		$data[1]="viewer";
		$pweldata=getSingleGeneralInfo("",$data);
		// var_dump($pweldata);
		// echo $pweldata['numrows'];
		$visiondata=getSingleGeneralInfoPlain("dreambenchvision");
		$missiondata=getSingleGeneralInfoPlain("dreambenchmission");
		$valuesdata=getSingleGeneralInfoPlain("dreambenchvalues");
		$objectivesdata=getSingleGeneralInfoPlain("dreambenchobjectives");
		$mpagecrumbpath='
			<div class="breadcrumb-bar">
				<ul class="breadcrumb">
					<li><a href="'.$host_addr.'">Home</a></li>
					<li class="active">'.$mpagecrumbtitle.'</li>
				</ul>
			</div>
			<div id="slider" class="top-banner white-right-skew">
				<img alt="img" src="'.$host_addr.'images/backgrounds/background4.jpg">
				<div class="banner-content banner-about">
					<p class="banner-head">Pioneering Solutions</p>
					<p class="banner-text">We help you DO things BETTER</p>
				</div>
			</div>
		';
		$mpageflexout='';
		$mpagemaps="";
		$mpagelibscriptextras='';
		$mpagescriptextras='
		';	
	}

	if(isset($activepage7)){
		$mpagedescription="We are completely reachable at dreambench, simply view all our contact details and get in touch whenever and how ever you want.";
		$mpagekeywords.="Contact us, contact, DreamBench contact information, dreambench contact details, DreamBench contact details, contacts at DreamBench";
		$mpagetitle="Contact Us | DreamBench Africa";
		$mpageurl=$host_addr."contact.php";
		$mpagecrumbclass="";
		$mpagecrumbtitle="Contact Us";
		$data[0]="contactwelcomemsg";
		$data[1]="viewer";
		// $cweldata=getSingleGeneralInfo("",$data);
		$mpagecrumbpath='
			<div class="breadcrumb-bar">
				<ul class="breadcrumb">
					<li><a href="'.$host_addr.'">Home</a></li>
					<li class="active">'.$mpagecrumbtitle.'</li>
				</ul>
			</div>
			<div id="slider" class="top-banner white-right-skew">
				<img alt="img" src="'.$host_addr.'images/dbrimages/bg7b2.jpg">
				<div class="banner-content banner-contact">
					<p class="banner-head">We are reachable</p>
					<p class="banner-text">Whenever, However</p>
				</div>
			</div>
		';
		$mpageflexout='';
		// $mpagemaps="";
	}

	// get some specific popular posts
	// $mpageblogoutone=getAllBlogEntries("viewer","",$mpageblogid,"blogtype");

	// create the blog carousel output
	$mpageblogcarouselout='';
	$mpageblogoutone=array();
	if ($mpageblogcarousel!==""&&$mpageblogoutone['numrows']>2) {
		# code...
		$mpageblogcarouselout='
			<!-- CAROUSEL START -->
			<div class="blog-carousel-area">
				<div class="blog-carousel">
					'.$mpageblogcarousel.'
				</div>
			</div>
		';
		
	}else{
		$mpageblogcarouselout=$mpagevegasone;
	}
	// for holding default sidebar
	$mpagesidebar='';

	
	// for footer widget content
	// for holding footer widget manipulation, combination of values for this determines 
	// what other content the foooter has
	$mpagefooterstylemarker=0; 
	$mpagefootermorelinks='
		<!-- WIDGET START -->
			<div class="col-sm-2 col-xs-12">
				<div class="sidebar-right-wrap widget-box widget_tags">
					<div class="widget-title">
						<h4>Links</h4>
					</div>
					<div class="widget-content">
						<ul class="bottom-links-widget">
							<li><a href="'.$host_addr.'blog.php">Blog</a></li>
							<li><a href="'.$host_addr.'profile.php">Profile</a></li>
						</ul>
					</div>
				</div>
			</div>
		<!-- WIDGET END -->
	';
	
	$mpagedosinglescriptload="off";
	$theme_data['renderpath']=$host_tpathplain."themesnippets/dbrsnippets";
	// block google analytics 
	// if not on live server o no tracking code available or 
	// no 
	if((isset($defaultgatrackcode)&&$defaultgatrackcode=="")
		||($host_env=="online"&&isset($host_test))){
		$mpagega="";
	}
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
	<meta property="fb:app_id" content="<?php echo $mpagefbappid;?>"/>
	<meta property="fb:admins" content="<?php echo $mpagefbadmins;?>"/>
	<meta property="og:type" content="<?php echo $mpageogtype;?>"/>
	<meta property="og:image" content="<?php echo $mpageimage;?>"/>
	<meta property="og:title" content="<?php echo $mpagetitle;?>"/>
	<meta property="og:description" content="<?php echo $mpagedescription;?>"/>
	<meta property="og:url" content="<?php echo $mpageurl;?>"/>
	<meta property="og:site_name" content="<?php echo $mpagesitename;?>"/>
	<?php echo $mpageextrametas;?>
	<?php echo $host_favicon;?>
	<link rel="canonical" href="<?php echo $mpagecanonicalurl;?>"/>
	
	<?php 
		if((isset($mpagestyleload)&&$mpagestyleload=="top")||!isset($mpagestyleload)||$mpagestyleload==""){	
			// echo "<link rel='Test here'/>"; 
			echo $mpagelibstyleextras;
			
			include(''.$host_tpathplain.'themesnippets/dbrsnippets/themestylesdumpdbr.php');
		} 
	?>

	<?php
		if((isset($mpagemergedscripts)&&$mpagemergedscripts=="")||!isset($mpagemergedscripts)){
			if(!isset($mpage_lsb)||(isset($mpage_lsb)&&$mpage_lsb=="")){


	?>
				<script src="<?php echo $host_addr;?>scripts/jquery.js"></script>
				<script src="<?php echo $host_addr;?>bootstrap/js/bootstrap.js"></script>
				<script src="<?php echo $host_addr;?>scripts/lightbox.js"></script>
				<script src="<?php echo $host_addr;?>scripts/formchecker.js"></script>
				<script src="<?php echo $host_addr;?>plugins/wow/js/wow.js"></script>
				<script src="<?php echo $host_addr;?>scripts/lib/jquery.lazyload.min.js"></script>
				<script src="<?php echo $host_addr;?>scripts/mylib.js"></script>
				<?php echo $mpagelibscriptextras;?>
	<?php 
			}
		
		}
	?>
	<?php echo $mpagega;?>
</head>