<?php
	// this file contains sidebar content for the pages using this theme
	// absolute urls must be used as required for handling assets
	// here widgets are defined and knitted together to form sidebar contents 
	// for varying purposes.
	// usually, most of the b_options variable settings array could be defined 
	// before including this file
		
	// or the options can be set based on the preset sidebartype variable

	$sidebartype=!isset($sidebartype)||(isset($sidebartype)&&$sidebartype=="")?"default"
	:$sidebartype;

	$blogtypeid=!isset($blogtypeid)||(isset($blogtypeid)&&$blogtypeid=="")?""
	:$blogtypeid;
	// use this section to init the b_options array variables for each 
	// widget type to be used
	if($sidebartype=="default"){
		// $b_options['querydebug']=true;

		$b_options['pagination']=false;

		// adjust the blog most commented post data output
		$b_options['bmcptype']="mainsidebarmini2";
		
		// handle the number of comment posts to be displayed
		$b_options['bmcplimit']=1;

	}

	// bring in the system default widget set
	include($host_tpathplain.'modules/defaultwidgets.php');

	// widget titles the defaultwidgets bring in
	// theme_blpwidget: for blog latest posts
	// theme_bppwidget: for blog popular posts(mostviewed)
	// theme_bmcpwidget: for blog most commented posts
	// theme_bfpwidget: for blog featured posts


	//  begin widget definitions as per theme
	// include sorted widget definitions file
	include('widgets.php');
	
	if($sidebartype=="default"){
		// blog search widget
		echo $theme_bswidget;

		// single advert space mini
		echo $theme_sasmwidget;

		// popular blog post
		echo $theme_pbpwidget;

		// quad advert
		// echo $theme_qaswidget;

		// most commented blog post
		echo $theme_mcbpwidget;

		// single advert space large
		echo $theme_saslwidget;		

		echo'<div class="widget widget_subscribe">
				<h5 class="underlined"><strong>Subscribe</strong> to this Blog</h5>
				<form class="sidebar-searchbox" method="post" 
				action="'.$host_addr.'basicsignup.php">

					<input type="hidden" name="entryvariant" 
					value="blogtypesubscription">
					<input type="hidden" name="catid" 
					value="'.$blogtypeid.'">
					<input type="email" name="q" placeholder="Type and hit Enter!">
				</form>
			</div>';
	}
?>
		