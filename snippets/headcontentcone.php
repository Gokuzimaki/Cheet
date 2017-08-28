<?php
	// load up the default header parent content here
	include('headcontentparentdefault.php'); 
	// this snippets handles the theme display content for the first design of cheet
	// the main unchanged contents are located in the headcontentparentdefault.php file
	// in the snippets folder
	/*
		display control variables for handling what shows up on a page
	*/
	
	// preloaderout variable controls if the display of the websites preloader content
	// occurs or doesn't
	$mpagepreloaderout='
		<!--Pre loader start-->
		<div id="preloader">
		  <div id="status"> 
		  	<p>Loading</p>
		  </div>
		</div>
		<!--pre loader end--> 
	';

	// control the background style for the links and mega menu panel
	// set this variable to nothing if the mega menu has a slider
	// behind it. This variable is used in the toplinkscone.php file in the snippets folder
	$mpagetopbgclass='class="top_bg_image"'; 

	// check to see if a user is logged in then proceed to activate the user profile display
	// section
	if(isset($mpageuserloggedin)&&$mpageuserloggedin!==""){
		$mpageprofileheaderdisplayclass='';
	}

	$mpageslider='
		<!--slider start-->
		<div class="lms_slider">
		  <div id="lms_simple_slider" class="carousel slide" data-ride="carousel"> 
		    <!-- Indicators -->
		    <ol class="carousel-indicators">
		      <li data-target="#lms_simple_slider" data-slide-to="0" class="active"></li>
		      <li data-target="#lms_simple_slider" data-slide-to="1"></li>
		      <li data-target="#lms_simple_slider" data-slide-to="2"></li>
		    </ol>
		    
		    <!-- Wrapper for slides -->
		    <div class="carousel-inner">
		      <div class="item active"> 
		        <img src="'.$host_addr.'images/cheetimagesone/slider/slider3.jpg" class="animated bounceInRight lms_delay_01" alt="simple slider slide-1">
		        <div class="carousel-caption lms_ss_caption animated bounceInRight lms_delay_03">
		            <h1 class="lms_label lms_ss_heading">"Education is not preparation for life; Education is life itself"</h1>
		        	<h3>John Dowey</h3>
		        </div>
		      </div>
		      <div class="item"> 
		        <img src="'.$host_addr.'images/cheetimagesone/slider/slider2.jpg" class="animated bounceInRight lms_delay_01" alt="simple slider slide-1">
		        <div class="carousel-caption lms_ss_caption animated bounceInRight lms_delay_03">
		        	<div class="lms_ss_icon">
		            	<div class="lms_ss_laptop"><i class="fa fa-laptop"></i></div>
		            </div>
		            <h1 class="lms_ss_heading lms_label">"Learn, Learn and Learn some more"</h1>	
		        	<h3>Cheet</h3>
		        </div>
		      </div>
		      <div class="item"> 
		        <img src="'.$host_addr.'images/cheetimagesone/slider/slider1.jpg" class="animated bounceInRight lms_delay_01" alt="simple slider slide-1">
		        <div class="carousel-caption lms_ss_caption animated bounceInRight lms_delay_03">
		            <h1 class="lms_ss_heading lms_label">"Education is the key to unlock the golden door of freedom"</h1>			
		            <h3>George Washington Carver</h3>
		        </div>
		      </div>
		    </div>
		    
		    <!-- Controls --> 
		  </div>
		  <div class="lms_slider_overlay"></div> 
		</div>
		<!--slider end-->
	';
	// prepare securitynumber variable
    $mpagesecuritynumber=rand(0,10).rand(1,8).rand(0,5).rand(10,30).rand(200,250).rand(50,80).rand(34,55).rand(46,57);
	//variable to hold the default library megamenu content
	// first we check if the function that handles the megamanu content generation exists
	$mpagemegamenulibrary='';
	if(function_exists('generateMegaMenu')){

	}else{
		$mpagemegamenulibrary='
			<div class="col-md-2">
			    <ul class="sub-menu">
			      <li> <span class="mega-menu-sub-title">Discipline</span>
			        <ul class="sub-menu">
			          <li><a href="##" title="Computer Science">Computer Science</a></li>
			          <li><a href="##"title="Business Administration">Business Administration</a></li>
			          <li><a href="##" title="Statistics">Statistics</a></li>
			          <li><a href="##" title="Urban and regional Planning">Urban and regional Planning</a></li>
			          <li><a href="##" title="Lab Technology">Lab Technology</a></li>
			        </ul>
			      </li>
			    </ul>
			</div>
			<div class="col-md-2">
			    <ul class="sub-menu">
			      <li> <span class="mega-menu-sub-title">Design software</span>
			        <ul class="sub-menu">
			          <li><a href="##">CorelDRAW</a></li>
			          <li><a href="##">GIMP</a></li>
			          <li><a href="##">iBooks Author</a></li>
			          <liu><a href="##">Illustrator</a></li>
			          <li><a href="##">InDesign</a></li>
			          <li><a href="##">Muse</a></li>
			        </ul>
			      </li>
			    </ul>
			</div>
			<div class="col-md-2">
			    <ul class="sub-menu">
			      <li> <span class="mega-menu-sub-title">Video software</span>
			        <ul class="sub-menu">
			          <li><a href="##">Blackboard</a></li>
			          <li><a href="##">Captivate</a></li>
			          <li><a href="##">Evernote</a></li>
			        </ul>
			      </li>
			    </ul>
			</div>
		';
		
	}

	if(isset($activepage1)){	
		

	}
	if(isset($activepage2)){
		$mpagecrumbclass="";
		$mpagecrumbtitle="Library";
		$mpagecrumbtitlepath="Library";
		$mpagecrumbpath='
			<!-- page title Start -->
			<div class="lms_page_title">
			  <div class="lms_page_title_bg" data-stellar-background-ratio="0.7"></div>
			  <div class="lms_page_title_bg_overlay">
			   <div class="container"> 
			    
			        <div class="lms_title">'.$mpagecrumbtitle.'</div>
			        <div class="pull-right">
			          <ol class="breadcrumb">
			            <li><a href="'.$host_addr.'">Home</a></li>
			            <li class="active">'.$mpagecrumbtitlepath.'</li>
			          </ol>
			        </div>
			    
			   </div>
			  </div>
			</div>
			<!-- page title end -->
		';
	}
	if(isset($activepage3)){
		$mpagecrumbclass="";
		$mpagecrumbtitle="Resource Store";
		$mpagecrumbtitlepath="Resources";
		$mpagecrumbpath='
			<!-- page title Start -->
			<div class="lms_page_title">
			  <div class="lms_page_title_bg" data-stellar-background-ratio="0.7"></div>
			  <div class="lms_page_title_bg_overlay">
			   <div class="container"> 
			    
			        <div class="lms_title">'.$mpagecrumbtitle.'</div>
			        <div class="pull-right">
			          <ol class="breadcrumb">
			            <li><a href="'.$host_addr.'">Home</a></li>
			            <li class="active">'.$mpagecrumbtitlepath.'</li>
			          </ol>
			        </div>
			    
			   </div>
			  </div>
			</div>
			<!-- page title end -->
		';
	}
	if(isset($activepage4)){
		$mpagecrumbclass="";
		$mpagecrumbtitle="News";
		$mpagecrumbtitlepath="News";
		$mpagecrumbpath='
			<!-- page title Start -->
			<div class="lms_page_title">
			  <div class="lms_page_title_bg" data-stellar-background-ratio="0.7"></div>
			  <div class="lms_page_title_bg_overlay">
			   <div class="container"> 
			    
			        <div class="lms_title">'.$mpagecrumbtitle.'</div>
			        <div class="pull-right">
			          <ol class="breadcrumb">
			            <li><a href="'.$host_addr.'">Home</a></li>
			            <li class="active">'.$mpagecrumbtitlepath.'</li>
			          </ol>
			        </div>
			    
			   </div>
			  </div>
			</div>
			<!-- page title end -->
		';
	}
	if(isset($activepage5)){
		$mpagecrumbclass="";
		$mpagecrumbtitle="Login - Register";
		$mpagecrumbtitlepath="Login - Register";
		$mpagecrumbpath='
			<!-- page title Start -->
			<div class="lms_page_title">
			  <div class="lms_page_title_bg" data-stellar-background-ratio="0.7"></div>
			  <div class="lms_page_title_bg_overlay">
			   <div class="container"> 
			    
			        <div class="lms_title">'.$mpagecrumbtitle.'</div>
			        <div class="pull-right">
			          <ol class="breadcrumb">
			            <li><a href="'.$host_addr.'">Home</a></li>
			            <li class="active">'.$mpagecrumbtitlepath.'</li>
			          </ol>
			        </div>
			    
			   </div>
			  </div>
			</div>
			<!-- page title end -->
		';
	}
	if(isset($activepage6)){
		$mpagecrumbclass="";
		$mpagecrumbtitle="Frequently Asked Questions";
		$mpagecrumbtitlepath="FAQ";
		$mpagecrumbpath='
			<!-- page title Start -->
			<div class="lms_page_title">
			  <div class="lms_page_title_bg" data-stellar-background-ratio="0.7"></div>
			  <div class="lms_page_title_bg_overlay">
			   <div class="container"> 
			    
			        <div class="lms_title">'.$mpagecrumbtitle.'</div>
			        <div class="pull-right">
			          <ol class="breadcrumb">
			            <li><a href="'.$host_addr.'">Home</a></li>
			            <li class="active">'.$mpagecrumbtitlepath.'</li>
			          </ol>
			        </div>
			    
			   </div>
			  </div>
			</div>
			<!-- page title end -->
		';
	}
	if(isset($activepage7)){
		$mpagecrumbclass="";
		$mpagecrumbtitle="Forums";
		$mpagecrumbtitlepath="Forums";
		$mpagecrumbpath='
			<!-- page title Start -->
			<div class="lms_page_title">
			  <div class="lms_page_title_bg" data-stellar-background-ratio="0.7"></div>
			  <div class="lms_page_title_bg_overlay">
			   <div class="container"> 
			    
			        <div class="lms_title">'.$mpagecrumbtitle.'</div>
			        <div class="pull-right">
			          <ol class="breadcrumb">
			            <li><a href="'.$host_addr.'">Home</a></li>
			            <li class="active">'.$mpagecrumbtitlepath.'</li>
			          </ol>
			        </div>
			    
			   </div>
			  </div>
			</div>
			<!-- page title end -->
		';
	}
	if(isset($activepage8)){
		$mpagecrumbclass="";
		$mpagecrumbtitle="Contact Us";
		$mpagecrumbtitlepath="Contact Us";
		$mpagecrumbpath='
			<!-- page title Start -->
			<div class="lms_page_title">
			  <div class="lms_page_title_bg" data-stellar-background-ratio="0.7"></div>
			  <div class="lms_page_title_bg_overlay">
			   <div class="container"> 
			    
			        <div class="lms_title">'.$mpagecrumbtitle.'</div>
			        <div class="pull-right">
			          <ol class="breadcrumb">
			            <li><a href="'.$host_addr.'">Home</a></li>
			            <li class="active">'.$mpagecrumbtitlepath.'</li>
			          </ol>
			        </div>
			    
			   </div>
			  </div>
			</div>
			<!-- page title end -->
		';
	}
	

?>
<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $mpagetitle;?></title>
		<meta http-equiv="Content-Language" content="en-us">
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta content="width=device-width, initial-scale=1.0" name="viewport" />
		<meta name="MobileOptimized" content="320"/>
		<meta http-equiv="Content-Type" content="text/html;"/>
		<meta name="keywords" content="<?php echo $mpagekeywords;?>"/>
		<meta name="description" content="<?php echo $mpagedescription;?>">
		<meta property="fb:app_id" content="<?php echo $mpagefbappid;?>"/>
		<meta property="og:type" content="<?php echo $mpageogtype;?>"/>
		<meta property="og:url" content="<?php echo $mpageurl;?>"/>
		<meta property="og:title" content="<?php echo $mpagetitle;?>"/>
		<meta property="og:description" content="<?php echo $mpagedescription;?>"/>
		<meta property="og:image" content="<?php echo $mpageimage;?>"/>
		<meta property="og:site_name" content="<?php echo $mpagesitename;?>"/>
		<meta property="fb:admins" content=""/>
		<meta property="og:locale" content="en_US"/>
		<link rel="canonical" href="<?php echo $mpageurl;?>"/>
		<!-- <link rel="stylesheet" href="<?php echo $host_addr;?>bootstrap/css/bootstrap.css"/> -->
		<!-- Light Box -->
		<link href="./stylesheets/lightbox.css" rel="stylesheet"/>
		<link rel="stylesheet" href="<?php echo $host_addr;?>font-awesome/css/font-awesome.min.css"/>
		<!-- <link rel="stylesheet" href="<?php echo $host_addr;?>stylesheets/jquery.raty.css"/> -->
		<!-- <link rel="stylesheet" href="<?php echo $host_addr;?>stylesheets/jssorskins.css"/> -->
		<link rel="icon" href="<?php echo $host_addr;?>images/favicon.ico" sizes="16x16 32x32 64x64" type="image/vnd.microsoft.icon">
		<script src="<?php echo $host_addr;?>scripts/jquery.js"></script>
		<script src="<?php echo $host_addr;?>scripts/mylib.js"></script>
		<script src="<?php echo $host_addr;?>scripts/cheet.js"></script>
		<?php 
			include('./snippets/themestylesdumpcone.php');
		?>
	</head>