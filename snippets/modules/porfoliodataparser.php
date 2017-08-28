<?php
	
	// porfoliodataparser.php.
	// This file parses content for the portfolio page
	// it functions by checking if the parameter 'pid' is present in the url and
	// attempts to utilise it in page data generation, in addition, the 'mpage'
	// variables for the page are setup here as well
	// other data such as related portfolio entries are made available here
	// not the default provided for the sidebar
	// final data is made available to the theme with the array variable $portdata;
	$runportdata=false;
	$portid="";
	// verify if there is a get or post pid value in the page this is included
	if(isset($_GET['pid'])&&is_numeric($_GET['pid'])&&$_GET['pid']>0){
		$portid=$_GET['pid'];
		$runportdata=true;
	}

	if(isset($_POST['pid'])&&is_numeric($_POST['pid'])&&$_POST['pid']>0){
		$runportdata=true;
		$portid=$portid==""?$_POST['pid']:$portid;
	}
	

	if($runportdata==true){
		$mpdata['single']['viewer']="viewer";
		$portdata=getSinglePortfolioEntry($portid,"",$mpdata);
		$curportdata=$portdata;
		$mpageimage=$portdata['profpicdata']['location'];
		$mpageportid=$portdata['id'];
		
		$mpagetitle=$portdata['title'];
		$mpageurl=$host_addr."blog/?p=$mpageportid&trender=true";
		$mpagecanonicalurl=$host_addr."portfolio/?p=$mpageportid&trender=true";
		$mpageogtype="CreativeWork";
		$mpagedescription=$portdata['plaindescription'];
		$mpagekeywords=$portdata['seometakeywords'];
		// utilise the share plugin to count the social shares for the post url
		$mpagescriptextras='
			<script>
				$(document).ready(function(){
					if($.fn.sharre){
						$(\'#sharecounter span.counter\').sharrre({
						  share: {
						    googlePlus: true,
						    facebook: true,
						    twitter: true,
						    digg: true,
						    delicious: true
						  },
						  url: \''.$mpagecanonicalurl.'\',
						  enableHover: false,
						  render: function(api, options){
						  	var total=options.count.googlePlus+options.count.twitter;
						  	total+=options.count.facebook+options.count.linkedin;
						  	total+=options.count.digg+options.count.delicious;
						  	total+=options.count.stumbleupon;
						  	$(\'#sharecount span.counter\').html(total);
						  }
						});
						
					}
				})
			</script>
		';
		// loads up tinymce just incase
		$mpagescriptextras='

			<script language="javascript" 
			type="text/javascript" 
			src="'.$host_addr.'plugins/sharrre/jquery.sharrre.min.js"></script>
			<script language="javascript" 
			type="text/javascript" 
			src="'.$host_addr.'scripts/lib/tinymce/jquery.tinymce.min.js"></script>
		    <script language="javascript"  type="text/javascript" 
		    src="'.$host_addr.'scripts/lib/tinymce/tinymce.min.js"></script>
		    <script language="javascript"  type="text/javascript" 
		    src="'.$host_addr.'scripts/lib/tinymce/basic_config.js"></script>
		';
		// disable the default maps
		$mpagemaps="";
		$mpagescriptarray[]="plugins/sharrre/jquery.sharrre.min.js";
		$mpagescriptarray[]="scripts/lib/tinymce/jquery.tinymce.min.js";
		$mpagescriptarray[]="scripts/lib/tinymce/tinymce.min.js";
		$mpagescriptarray[]="scripts/lib/tinymce/basic_config.js";
		// create the social platform share urls
		$facebook_url="http://www.facebook.com/sharer/sharer.php?u=$mpagecanonicalurl";
		$twitter_url="https://twitter.com/share?url=$mpagecanonicalurl&text=$mpagetitle";
		$googleplus_url="https://plus.google.com/share?url=$mpagecanonicalurl";
		$linkedin_url="https://www.linkedin.com/cws/share?url=$mpagecanonicalurl";
		$stumbleupon_url="http://www.stumbleupon.com/submit?url=$mpagecanonicalurl&title=$mpagetitle";
		$whatsapp_url="whatsapp://send?text=$mpagetitle%20$mpagecanonicalurl";
		// "https://mail.google.com/mail/u/0/?ui=2&view=cm&fs=1&tf=1&su=$mpagetitle&body=$mpagedescription% Follow the link to learn more."
		$googlemail_url="http://www.addtoany.com/add_to/google_gmail?linkurl=$mpagecanonicalurl&linkname=$mpagetitle.&linknote=$mpagedescription%20 Follow the link to learn more. $mpagecanonicalurl";
		$reddit_url="http://reddit.com/submit?url=$mpagecanonicalurl&title=$mpagetitle";
		$digg_url="https://digg.com/submit?url=$mpagecanonicalurl&title=$mpagetitle&bodytext=$mpagedescription";
		$hackernews_url="https://news.ycombinator.com/submitlink?u=$mpagecanonicalurl&sref=$host_website_name";
		$odnoklassniki_url="https://connect.ok.ru/dk?st.cmd=OAuth2Login&st.layout=w&st.redirect=%252Fdk%253Fcmd%253DWidgetSharePreview%2526amp%253Bst.cmd%253DWidgetSharePreview%2526amp%253Bst.shareUrl%253D$mpagecanonicalurl&st.client_id=-1";
		$skype_url="https://web.skype.com/share?url=$mpagecanonicalurl";
		$evernote_url="https://www.evernote.com/clip.action?url=$mpagecanonicalurl&title=$mpagetitle";
		$flipboard_url="https://share.flipboard.com/u/login?done=%2Fbookmarklet%2Fpopout%3Fv%3D2%26url%3D$mpagecanonicalurl%26title%3D$mpagetitle%26utm_medium%3Dweb%26utm_campaign%3Dwidgets%26utm_source%3D$host_website_name&fromBookmarklet=1";
		$email_url="mailto:?subject=$mpagetitle&body=$mpagedescription%20 Follow the link to learn more. $mpagecanonicalurl";
		// parse the tags into easy to use format by exploding them into an array
		$tagcloud=explode(",",$portdata['tags']);
		if(!isset($themeid)){
			include($host_renderpath."/modules/portfoliodataparser.php");

		}
		
	}
?>