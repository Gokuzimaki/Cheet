<?php 
	function fjcblogPageCreate($blogentryid){
		global $host_addr,$host_target_addr,$host_keywords;
		$outs=getSingleBlogEntry($blogentryid);
		$title=$outs['title'];
		$introparagraph=$outs['introparagraph'];
		$c="";
		if(isset($_GET['c'])&&$_GET['c']){
		    $c=$_GET['c'];
		  }
	  	$alerter="";
		if($c=="true"){
		$alerter="Thank you for dropping your comment, we will approve it at our end if its appropriate and then it will be available for all to see.<br>";
		}
		$securitynumber=rand(0,10).rand(1,8).rand(0,5).rand(10,30).rand(200,250).rand(50,80).rand(34,55).rand(46,57);
		$blogtypeid=$outs['blogtypeid'];
		$blogcatid=$outs['blogcatid'];
		$outs2=getSingleBlogType($outs['blogtypeid']);
		$outs3=getSingleBlogCategory($outs['blogcatid']);
		$coverset=$outs['coverphotoset'];
		$coverstyle="";
		if($coverset==1){
		$coverstyle='style="float:none; display:block; margin:auto;"';
		}else if($coverset==2){$coverstyle='style="float:right;"';
		}
		$logocontrol='<img src="'.$host_addr.'images/bayonlearashi.png" class="total">';

		$headerdescription = convert_html_to_text($outs['introparagraph']);
		$headerdescription=html2txt($headerdescription);
		$nextblogout="End of posts here";
		$nextlink="##";
		$nextquery="SELECT * FROM blogentries WHERE blogtypeid=$blogtypeid AND id>$blogentryid AND status='active'";
		$nextrun=mysql_query($nextquery)or die(mysql_error()." Line 1847");
		$nextnumrows=mysql_num_rows($nextrun);
		if($nextnumrows>0){
			$nextrow=mysql_fetch_assoc($nextrun);
		$nextouts=getSingleBlogEntry($nextrow['id']);
			$nextblogout=$nextouts['title'];
			$nextlink=$nextouts['pagelink'];
		}

		$prevblogout="End of posts here";
		$prevlink="##";
		$prevquery="SELECT * FROM blogentries WHERE blogtypeid=$blogtypeid AND id<$blogentryid AND status='active' ORDER BY id DESC";
		// $previd=$blogentryid-1;
		$prevrun=mysql_query($prevquery)or die(mysql_error()." Line 1847");
		$prevnumrows=mysql_num_rows($prevrun);
		if($prevnumrows>0){
			$prevrow=mysql_fetch_assoc($prevrun);	
		$prevouts=getSingleBlogEntry($prevrow['id']);
			$prevblogout=$prevouts['title'];
			$prevlink=$prevouts['pagelink'];
		}

		// produce recent blog posts
		$recents="";
		$recquery="SELECT * FROM blogentries WHERE status='active' order by id desc LIMIT 0,3";
		$recrun=mysql_query($recquery)or die(mysql_error()." Line 1835");
		while($recrow=mysql_fetch_assoc($recrun)){
			$outrec=getSingleBlogEntry($recrow['id']);
			$recents.=$outrec['blogminioutputfjc'];
		}
		// produce recent SPECIFIC blog posts
		$recentspecific="";
		$recquery="SELECT * FROM blogentries WHERE blogtypeid=$blogtypeid AND status='active' order by id desc LIMIT 0,3";
		$recrun=mysql_query($recquery)or die(mysql_error()." Line 1835");
		while($recrow=mysql_fetch_assoc($recrun)){
			$outrec=getSingleBlogEntry($recrow['id']);
			$recentspecific.=$outrec['blogminioutputfjc'];
		}
		// produce popular blog posts
		$popular="";
		$popquery="SELECT * FROM blogentries WHERE status='active' order by views desc LIMIT 0,3";
		$poprun=mysql_query($popquery)or die(mysql_error()." Line 1835");
		while($poprow=mysql_fetch_assoc($poprun)){
		$outpop=getSingleBlogEntry($poprow['id']);
		$popular.=$outpop['blogminioutputfjc'];
		}
		// produce popular SPECIFIC blog posts
		$popularspecific="";
		$popquery="SELECT * FROM blogentries WHERE blogtypeid=$blogtypeid AND status='active' order by views desc LIMIT 0,3";
		$poprun=mysql_query($popquery)or die(mysql_error()." Line 1835");
		while($poprow=mysql_fetch_assoc($poprun)){
			$outpop=getSingleBlogEntry($poprow['id']);
			$popularspecific.=$outpop['blogminioutputfjc'];
		}
		//
		$catpostsquery="SELECT * FROM blogentries WHERE blogcatid=$blogcatid AND blogtypeid=$blogtypeid AND id<$blogentryid AND status='active' order by id desc";
		$catpostrun=mysql_query($catpostsquery)or die(mysql_error()." Line 1867");
		$catnumrow=mysql_num_rows($catpostrun);
		$tinyoutput="No more posts for this ";
		$count=0;
		$catids=array();
		$curlastid="";
		if($catnumrow>0){
		  // echo $catnumrow;
		$tinyoutput="";
		while($catpostrow=mysql_fetch_assoc($catpostrun)){
		$outcatpost=getSingleBlogEntry($catpostrow['id']);
		$catids[]=$catpostrow['id'];
		if($count<15){
		  // echo "inhere";
		$tinyoutput.=$outcatpost['blogtinyoutput'];
		$curlastid=$catpostrow['id'];
		}
		$count++;
		}
		}
		$lastvalidkey=array_search($curlastid,$catids);
		if($lastvalidkey<1||$lastvalidkey==""){
		$nextcatpostentryid=0;
		}else{
		$catpostnextid=$lastvalidkey+1;
		if(array_key_exists($catpostnextid,$catids)){

		$nextcatpostentryid=$catids[$catpostnextid];
		}else{
			$nextcatpostentryid="";
		}
		if(!in_array($nextcatpostentryid,$catids)){
		$nextcatpostentryid=0;
		}
		}
		$commentcount=$outs['commentcount'];
		if($commentcount>0){
		$comments=$outs['viewercomment'];
		}else{
			$comments="No comments yet";
		}
		$subimgpos='';
		$pagetag="";
		$feedjitsidebar="";
		$quoteout="";
		$pagetypemini="";

		$pagesidecontent='
		<div id="adcontentholdlong" style="">
			<div class="contentholdertitle">RECENT</div>
			'.$recents.'
		</div>
		<div id="adcontentholdlong" style="">
			<div class="contentholdertitle">POPULAR</div>
			'.$popular.'
		</div>
		<div id="adcontentholdlong" style="" name="feedjit">
			<div class="contentholdertitle">ACTIVITY</div>
			  '.$feedjitsidebar.'  
		</div>
		';
		$advertsidecontent='';
		$advertbottomcontent='';
		$adbannerquery="SELECT * FROM adverts WHERE type='banneradvert' and activepage='$pagetypemini' AND status='active' OR type='banneradvert' and activepage='all' AND status='active' order by id desc";
		$adbannerrun=mysql_query($adbannerquery)or die(mysql_error()."Line 2497");
		$adbannernumrow=mysql_num_rows($adbannerrun);
		if($adbannernumrow>0){
			while($adbannerrow=mysql_fetch_assoc($adbannerrun)){
			$adid=$adbannerrow['id'];
			$outbanner=getSingleAdvert($adid);
			$advertbottomcontent.=$outbanner['vieweroutput'];
			}
		}
		$adminiquery="SELECT * FROM adverts WHERE type='miniadvert' and activepage='$pagetypemini' AND status='active' OR type='videoadvert' and activepage='$pagetypemini' AND status='active' OR type='miniadvert' and activepage='all' AND status='active' OR type='videoadvert' and activepage='all' AND status='active' order by id desc";
		$adminirun=mysql_query($adminiquery)or die(mysql_error()."Line 2497");
		$admininumrow=mysql_num_rows($adminirun);
		if($admininumrow>0){
		while($adminirow=mysql_fetch_assoc($adminirun)){
		$adid=$adminirow['id'];
		$outmini=getSingleAdvert($adid);
		$advertsidecontent.=$outmini['vieweroutput'];
		}
		}
		$outgallery=getAllGalleries("viewer","");
		// echo $headerdescription;
		$maincontentstyle="";
		$adcontentholdstyle="";
		$adcontentholdlongstyle="";
		if($outs['blogentrytype']==""||$outs['blogentrytype']=="normal"){
			$blogdisplayoutput='
			    <img class="blogcoverphoto" '.$coverstyle.' src="'.$outs['absolutecover'].'"/>
			    '.$outs['blogpostout'].'
			';
		}elseif ($outs['blogentrytype']=="gallery") {
		  # code...
		  $blogdisplayoutput=$outs['vfalbum'];
		}elseif ($outs['blogentrytype']=="banner") {
			  # code...
			$blogdisplayoutput='
			<img src="'.$outs['bannermain'].'" style="width:100%;"/>
			';
		$maincontentstyle='style="width:100%;"';
		$adcontentholdstyle='style="width:100%;"';
		$adcontentholdlongstyle='
		<style type="text/css">
			  #adcontentholdlong{
			  float: left;
			margin-left: 6%;
			max-width: 258px;
			}
		</style>
		';
		}
		$outputs=array();
		$bgstyle[0]="blogpagemain";
		$bgstyle[1]="blogpageone";
		$bgstyle[2]="blogpagetwo";
		$bgstyle[3]="blogpagethree";
		$bgout=$bgstyle[rand(0,count($bgstyle)-1)];
		$outputs['outputpageone']="";
		$ga="
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-49730962-1', 'muyiwaafolabi.com');
		  ga('send', 'pageview');

		</script>
		";
		$ogimage=str_replace(" ","%20",$outs['absolutecover']);
		$facebooksdk='<div id="fb-root"></div><script>  window.fbAsyncInit = function() {    FB.init({      appId      : \'1406231673004362\',      xfbml      : true,      version    : \'v2.2\'    });  };  (function(d, s, id){     var js, fjs = d.getElementsByTagName(s)[0];     if (d.getElementById(id)) {return;}     js = d.createElement(s); js.id = id;     js.src = "//connect.facebook.net/en_US/sdk.js";     fjs.parentNode.insertBefore(js, fjs);   }(document, \'script\', \'facebook-jssdk\'));</script><!-- For google plus --><script type="text/javascript">  (function() {    var po = document.createElement(\'script\'); po.type = \'text/javascript\'; po.async = true;    po.src = \'https://apis.google.com/js/platform.js\';    var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(po, s);  })();</script><!-- For twitter --><script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?\'http\':\'https\';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+\'://platform.twitter.com/widgets.js\';fjs.parentNode.insertBefore(js,fjs);}}(document, \'script\', \'twitter-wjs\');</script><!-- For LinkedIn --><script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: en_US</script><script type="text/javascript">// console.log(typeof(FB ))  if(typeof(FB)=="undefined"){  }else{  FB.XFBML.parse();  }  if(typeof(twttr)=="undefined"){  }else{  twttr.widgets.load();  }  if(typeof(IN)=="undefined"){  }else{      IN.parse();  }</script><script>if(typeof($.mobile)=="undefined"){  var windowheight=$(window).height();$(\'div#main\').css("min-height",""+windowheight+"px");}</script>';
		$panelsnippet='
		
		';
		/*content reorganised*/
		// the default header, change the variables to what suits you in order to effect the final output of the content
		$mpagedescription=$headerdescription;
		$mpageurl=$outs['pagelink'];
		$mpagetitle=$title;
		$mpagekeywords=stripslashes($outs['title'])." Frontiers Job Connect, fjconnect, Frontiers Job, best recruitment offers, frontiers recruits, frontiers recruitment, Frontiers consulting, recruitment opportunities, Muyiwa afolabi, Frankly Speaking";
		$mpagedescription=isset($mpagedescription)?$mpagedescription:"Frontiers Job-connect is a career platform connecting business organisations with quality employees for value creation and a mutually rewarding experience. This is a hub where progressive employers/organisations can find qualified, competent and creative employees capable of adding great value in several capacities to their businesses.";
		$mpagekeywords=isset($mpagekeywords)?$mpagekeywords:"Frontiers Job Connect, fjconnect, Frontiers Job, best recruitment offers, frontiers recruits, frontiers recruitment, Frontiers consulting, recruitment opportunities";
		$mpageimage=isset($mpageimage)?$mpageimage:$host_addr."images/favicon.png";
		$mpagetitle=isset($mpagetitle)?$mpagetitle:"Welcome | Frontiers Job-Connect";
		$mpageurl=isset($mpageurl)?$mpageurl:$host_addr;
		$mpagefbappid=isset($mpagefbappid)?$mpagefbappid:"";
		$mpagefbadmins=isset($mpagefbadmins)?$mpagefbadmins:"";
		$mpagesitename=isset($mpagesitename)?$mpagesitename:"Frontiers Job Connect Official Website";
		$mpagecrumbclass=isset($mpagecrumbclass)?$mpagecrumbclass:"hidden";
		$mpagecrumbtitle=isset($mpagecrumbtitle)?$mpagecrumbtitle:"";
		$mpagecrumbpath=isset($mpagecrumbpath)?$mpagecrumbpath:"";
		$mpageheaderclass=isset($mpageheaderclass)?$mpageheaderclass:"";
		$mpagelinkclass=isset($mpagelinkclass)?$mpagelinkclass:"";
		$mpagelinkclass2=isset($mpagelinkclass2)?$mpagelinkclass2:"";
		$mpagelinkclass3=isset($mpagelinkclass3)?$mpagelinkclass3:"";
		$mpagemaps='
			<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
			<script src="'.$host_addr.'scripts/js/maplace.min.js"></script>
		';
		$mpageflexout="";
		// check for active user or employee session
		$mpagersearchstyle="hidden"; // control variable for displaying recruit search panel
		$mpagejobsearchstyle="hidden"; // control variable for displaying job search panel
		$mpageloginstyle="";
		if((isset($_SESSION['employeeh'])&&$_SESSION['employeeh']!=="")||(isset($_SESSION['recruith'])&&$_SESSION['recruith']!=="")){
			$mpageuserdisplay="";
			isset($_SESSION['employeeh'])?$mpageprofilepageout="fjcemployer.php":$mpageprofilepageout="fjcrecruit.php";
			isset($_SESSION['employeeh'])?$mpageusertype="employee":$mpageusertype="recruits";
			if(isset($_SESSION['employeeh'])){
				$mpagersearchstyle="hidden";
				$mpagejobsearchstyle="";
			}
			if(isset($_SESSION['recruith'])&&$_SESSION['recruith']!==""){
				$mpagersearchstyle="";
				$mpagejobsearchstyle="hidden";
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
		// get career and quote content
		$careeradvice=getAllGeneralInfo("viewer","careeradvice","");
		$quoteout=getAllGeneralInfo("viewer","fjcquote","");
		// for holding sidebarcontent that sits at the top of the sidebar widget
		$mptopsidebarcontent='';
		// generate the page share content
		$contentshare=strlen(stripslashes($introparagraph))>70? substr(stripslashes($introparagraph), 0,70):stripslashes($introparagraph);
		// for holding default sidebar
		$mpagesidebar='
			<aside>
				<div class="widget sidebar-widget white-container social-widget">
					<h5 class="widget-title">Share This Post</h5>
					<div class="widget-content">
						<div class="row row-p5">
							<p>Tap or hover mouse on share counter</p>
							<div id="sharefjcsidebar" data-url="'.$outs['pagelink'].'" data-text="'.$contentshare.'" data-title="'.stripslashes($title).'"></div>
						</div>
					</div>
				</div>
				<div class="widget sidebar-widget white-container social-widget">
					<h5 class="widget-title">Connect With Us</h5>
					<div class="widget-content">
						<div class="row row-p5">
							<div class="col-xs-6 col-md-6 share-box facebook">
								<a href="https://facebook.com/frontiersjobconnect">Facebook</a>
							</div>

							<div class="col-xs-6 col-md-6 share-box twitter">
								<a href="http://twitter.com/FrontiersJC">Twitter</a>
							</div>
						</div>
					</div>
				</div>

				<div class="white-container">
					<div class="widget sidebar-widget">
						<h5 class="widget-title">Latest Posts</h5>
						<div class="widget-content">	
							<div class="miniblogholder">
								<div class="flexslider clearfix">
									<ul class="slides">
										'.$recentspecific.'
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="widget sidebar-widget">
						<h5 class="widget-title">Popular Posts</h5>
						<div class="widget-content">	
							<div class="miniblogholder">
								<div class="flexslider clearfix">
									<ul class="slides">
										'.$popularspecific.'
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="widget sidebar-widget">
						<h5 class="widget-title">Career Advice</h5>

						<div class="widget-content">
							<h4 class="ctitlepost">'.$careeradvice['contenttitle'].'</h4>
							<div>
								'.$careeradvice['contentdata'].'
							</div>
						</div>
					</div>
					<div class="widget sidebar-widget">
						<h5 class="widget-title">Quotes</h5>

						<div class="widget-content">
						<blockquote>'.$quoteout['contentdata'].'</blockquote>
						<p class="textright">'.$quoteout['contenttitle'].'</p>
						</div>
					</div>
				
					
					<div class="widget sidebar-widget">
						<h5 class="widget-title">Our Partners</h5>

						<div class="widget-content">
							<div class="our-partners-section white-container">
								<div class="partnersholder">
									<div class="flexslider clearfix">
										<ul class="slides">
											<li>
												<div class="css-table">
													<div class="css-table-cell">
														<a href="#"><img src="'.$host_addr.'images/scopeemojis/accounting.png" alt="accounting"></a>
													</div>
												</div>
											</li>

											<li>
												<div class="css-table">
													<div class="css-table-cell">
														<a href="#"><img src="'.$host_addr.'images/scopeemojis/advertising.png" alt="advertising"></a>
													</div>
												</div>
											</li>

											<li>
												<div class="css-table">
													<div class="css-table-cell">
														<a href="#"><img src="'.$host_addr.'images/scopeemojis/agriculture.png" alt="agriculture"></a>
													</div>
												</div>
											</li>

											<li>
												<div class="css-table">
													<div class="css-table-cell">
														<a href="#"><img src="'.$host_addr.'images/scopeemojis/aviation.png" alt="aviation"></a>
													</div>
												</div>
											</li>

											<li>
												<div class="css-table">
													<div class="css-table-cell">
														<a href="#"><img src="'.$host_addr.'images/scopeemojis/banking.png" alt="banking"></a>
													</div>
												</div>
											</li>

											<li>
												<div class="css-table">
													<div class="css-table-cell">
														<a href="#"><img src="'.$host_addr.'images/scopeemojis/broadcasting.png" alt="broadcasting"></a>
													</div>
												</div>
											</li>
											<li>
												<div class="css-table">
													<div class="css-table-cell">
														<a href="#"><img src="'.$host_addr.'images/scopeemojis/consultancy.png" alt="consultancy"></a>
													</div>
												</div>
											</li>
											<li>
												<div class="css-table">
													<div class="css-table-cell">
														<a href="#"><img src="'.$host_addr.'images/scopeemojis/energy.png" alt="energy"></a>
													</div>
												</div>
											</li>
											<li>
												<div class="css-table">
													<div class="css-table-cell">
														<a href="#"><img src="'.$host_addr.'images/scopeemojis/engineering.png" alt="engineering"></a>
													</div>
												</div>
											</li>
											<li>
												<div class="css-table">
													<div class="css-table-cell">
														<a href="#"><img src="'.$host_addr.'images/scopeemojis/hospitality.png" alt="hospitality"></a>
													</div>
												</div>
											</li>
											<li>
												<div class="css-table">
													<div class="css-table-cell">
														<a href="#"><img src="'.$host_addr.'images/scopeemojis/insurance.png" alt="insurance"></a>
													</div>
												</div>
											</li>
											<li>
												<div class="css-table">
													<div class="css-table-cell">
														<a href="#"><img src="'.$host_addr.'images/scopeemojis/medicine.png" alt="medicine"></a>
													</div>
												</div>
											</li>
											<li>
												<div class="css-table">
													<div class="css-table-cell">
														<a href="#"><img src="'.$host_addr.'images/scopeemojis/oilandgas.png" alt="oilandgas"></a>
													</div>
												</div>
											</li>
											<li>
												<div class="css-table">
													<div class="css-table-cell">
														<a href="#"><img src="'.$host_addr.'images/scopeemojis/pharmacy.png" alt="pharmacy"></a>
													</div>
												</div>
											</li>
											<li>
												<div class="css-table">
													<div class="css-table-cell">
														<a href="#"><img src="'.$host_addr.'images/scopeemojis/tourism.png" alt="tourism"></a>
													</div>
												</div>
											</li>
											<li>
												<div class="css-table">
													<div class="css-table-cell">
														<a href="#"><img src="images/scopeemojis/transportation.png" alt="transportation"></a>
													</div>
												</div>
											</li>
										</ul>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</aside>
		';

		$userfullname=isset($_SESSION['recruitname'])?$_SESSION['recruitname']:"Recruit";
		// if active page not set, initalize all affected variables for each link
		!isset($activepage1)?$activepage1="":$activepage1=$activepage1;
		!isset($activepage2)?$activepage2="":$activepage2=$activepage2;
		!isset($activepage3)?$activepage3="":$activepage3=$activepage3;
		!isset($activepage4)?$activepage4="":$activepage4=$activepage4;
		!isset($activepage5)?$activepage5="":$activepage5=$activepage5;
		!isset($activepage6)?$activepage6="":$activepage6=$activepage6;
		!isset($activepage7)?$activepage7="":$activepage7=$activepage7;
		!isset($activepage8)?$activepage8="":$activepage8=$activepage8;
		$mpagecrumbclass="";
		$mpagecrumbtitle="Jobs";
		$mpagecrumbpath='
			<div class="header-page-title">
				<div class="container">
					<h1>'.$title.'</h1>

					<ul class="breadcrumbs">
						<li><a href="'.$host_addr.'frontiersjobconnect.php">Home</a></li>
						<li><a href="'.$host_addr.'fjcnews.php">News</a></li>
						<li><span class="current">'.$title.'</span></li>
					</ul>
				</div>
			</div>
		';
		$descbanner='
			<div class="row">
				  <div class="col-md-12 descbannerhold">
				        <img src="'.$host_addr.'images/mabanner3.jpg" class="descbanner" style="width:100%;"/>
				  </div>
			</div>
	    ';
		$mpageflexout=$descbanner;

		$topout='
			<header id="header" class="header-style-1">
					<div class="header-top-bar">
						<div class="container">
							<!-- Header Language -->
							<div class="header-language clearfix">
								<ul>
									<li>
										<a href="http://muyiwaafolabi.com">Muyiwa Afolabi\'s Website</a>
									</li>
									<li class="'.$mpageuserdisplay.'">
										<a href="'.$host_addr.''.$mpageprofilepageout.'">'.$userfullname.'</a>
									</li>
									<li class="'.$mpageuserdisplay.'">
										<a href="'.$host_addr.'logout.php?type='.$mpageusertype.'">Logout</a>
									</li>
								</ul>
							</div> <!-- end .header-language -->

							<!-- Bookmarks -->
							<!-- <a href="'.$host_addr.'index.html#" class="btn btn-link bookmarks">Bookmarks</a> -->


						</div> <!-- end .container -->
					</div> <!-- end .header-top-bar -->

					<div class="header-nav-bar">
						<div class="container">

							<!-- Logo -->
							<div class="css-table logo">
								<div class="css-table-cell">
									<a href="'.$host_addr.'">
										<img src="'.$host_addr.'images/fjclogo.png" alt="Frontiers Job-Connect"/>
									</a> <!-- end .logo -->
								</div>
							</div>

							<!-- Mobile Menu Toggle -->
							<a href="'.$host_addr.'##" id="mobile-menu-toggle"><span></span></a>

							<!-- Primary Nav -->
							<nav>
								<ul class="primary-nav">
									<li class="'.$activepage1.'">
										<a href="'.$host_addr.'frontiersjobconnect.php">Home</a>
									</li>
									<li class="'.$activepage4.'">
										<a href="'.$host_addr.'fjcnews.php">Blog</a>
									</li>
									<li class="'.$activepage8.' has-submenu '.$mpageloginstyle.'">
										<a href="##">Login</a>
										<ul>
											<li>
												<div class="droplogin">
													<form action="" id="login-form">
														<p class="col-md-12">
															<!-- <select class="form-control" name="logtype">
																<option value="">Select Account</option>
																<option value="recruit">Recruit</option>
															</select> -->
															<input type="hidden" name="logtype" value="recruit"/>
														</p>
														<p class="col-md-12">
															<input type="text" name="username" id="username" class="form-control" placeholder="Username">
														</p>
														<p class="col-md-12">
															<input type="password" name="password" id="password" class="form-control" placeholder="Password">
														</p>
														<p class="col-md-12">
															<input type="submit" id="submit" class="btn btn-default pull-right" value="Applicant Login">
														</p>
														<!-- <a href="'.$host_addr.'##" class="btn btn-link">Forgot Password?</a> -->
													</form>
												</div>
											</li>
										</ul>
									</li>
									<li class="'.$activepage5.' '.$mpagelinkclass3.'">
										<a href="'.$host_addr.'fjcregister.php">Register</a>
									</li>
									<li class="'.$activepage6.'">
										<a href="'.$host_addr.'fjccontactus.php">Contact Us</a>
									</li>
									<!-- <li class="'.$activepage7.'"><a href="'.$host_addr.'fjcfaq.php">FAQ</a></li> -->
								</ul>
							</nav>
						</div> <!-- end .container -->

						<div id="mobile-menu-container" class="container">
							<div class="login-register"></div>
							<div class="menu"></div>
						</div>
					</div> <!-- end .header-nav-bar -->
					
					'.$mpagecrumbpath.'
					'.$mpageflexout.'
			</header> <!-- end #header -->
		';
		$commentsoutput='
				<div class="plainheader">Comments</div>
				  <div id="commentsholder">
				  '.$alerter.'
				  '.$outs['viewercommenttwo'].'
				  </div>
		        <div class="row" appdata-name="commentsform" style="background-color:#fefefe;">
		          <form action="'.$host_addr.'snippets/basicsignup.php" name="blogcommentform" data-ajax="false" method="post">
		            <input type="hidden" name="entryvariant" value="createblogcomment"/>
		            <input type="hidden" name="sectester" value="'.$securitynumber.'"/>
		            <input type="hidden" name="blogentryid" value="'.$blogentryid.'"/>
		            <h2>Add a Comment</h2>
		            <p> means the field is required.<p>
		            <div class="col-md-12">
		              <div class="col-md-4">
		                Name *
		                <input type="text" name="name" Placeholder="Firstname Lastname" class="curved"/>
		              </div>
		              <div class="col-md-4">
		                Email *
		                <input type="text" name="email" Placeholder="Your email here" class="curved"/>
		              </div>
		              <div class="col-md-4">
		                Security('.$securitynumber.');
		                <input type="text" name="secnumber" Placeholder="The above digits here" class="curved"/>
		              </div>
		              <div class="col-md-12">
		                Comment:
		                <textarea name="comment" id="postersmall" Placeholder="" class="curved3"></textarea>
		              </div>
		            </div>

		            <div id="formend">
		              <input type="button" name="createblogcomment" value="Submit" data-ajax="false" class="submitbutton"/>
		              <br><!--By clicking the submit button, you are agreeing to:-->
		            </div>
		          </form>
		        </div>
		';
		$outs['commentsonoff']==1?$commentsoutput="":$commentsoutput=$commentsoutput;
		$followonposts='
			<div class="col-md-12">
		        <h2 class="plainheader">Previous Posts Under '.$outs3['catname'].'</h2>
		        <div class="col-md-12 postundercathold">
			        <div style="background: rgb(241, 241, 241);">
		              '.$tinyoutput.'
		              </div>
		            <div id="col-md-12" name="waitinghold"style="min-height:0px;"></div>
		            <a href="'.$host_addr.'category.php?cid='.$blogcatid.'" name="moreposts" data-catid="'.$blogtypeid.'">View More Posts</a>
		        </div>
		      </div>
		';
		$contentout='
			<div class="row">
				<div class="col-sm-8 page-content">
					<div class="title-lines">
						<h3 class="mt0">'.$outs['title'].'</h3>
					</div>
					<div class="latest-jobs-section white-container">
			    		'.$blogdisplayoutput.'
			    		<div>
						      <div id="prevblogpointer">
						        <span class="drnote">
							        <i class="fa fa-arrow-circle-left" appdata-name=""></i>
									Previous Post
								</span>
						        <a href="'.$prevlink.'" class="crlinktwo" data-ajax="false" title="'.$prevblogout.'">'.$prevblogout.'</a>
						      </div>
						      <div id="nextblogpointer">
						        <span class="drnote">
						       		Up Next <i class="fa fa-arrow-circle-right" appdata-name=""></i>
						       	</span>
						        <a href="'.$nextlink.'" class="recruitlinktwo" data-ajax="false" title="'.$nextblogout.'">'.$nextblogout.'</a>
						      </div>
						</div>
						'.$commentsoutput.'
						'.$followonposts.'
			    	</div>
				</div>
				<div class="col-sm-4 page-sidebar">
					'.$mpagesidebar.'
				</div>
			</div>
			
		';
		$socialfooting='
			<footer id="footer">
				<div class="container">
					<div class="row">
						<div class="col-sm-3 col-md-4">
							<div class="widget">
								<h5 class="widget-title footerminiheading">Muyiwa Afolabi.</h5>
								<div class="widget-content">
									<img class="logo" src="'.$host_addr.'images/fjcmacoversmall.jpg" alt="Muyiwa Afolabi, Frontiers Job-Connect">
									<p>
										Muyiwa Afolabi is the Group CEO of Frontiers International Services Limited; a human capital development and social reformation outfit.
										He is a strategic thinker with world-class experience in value chain process management.<br>
										<a href="http://muyiwaafolabi.com/profile.php" target="_blank">Read More</a>
									</p>
								</div>
							</div>
						</div>
						<div class="col-sm-3 col-md-4">
							<div class="widget">
								<h6 class="widget-title">Navigation</h6>
								<div class="widget-content">
									<div class="row">
										<div class="col-xs-6 col-sm-12 col-md-6">
											<ul class="footer-links">
												<li class="'.$activepage1.'">
													<a href="'.$host_addr.'frontiersjobconnect.php">Home</a>
												</li>
												<!-- <li class="'.$mpagelinkclass2.' '.$activepage2.'">
													<a href="'.$host_addr.'fjcjobs.php">Jobs</a>
												</li> -->
												<!-- <li class="'.$mpagelinkclass2.' '.$activepage3.'">
													<a href="'.$host_addr.'fjcsrecruits.php">Recruits</a>
												</li> -->
												<li class="'.$activepage4.'">
													<a href="'.$host_addr.'fjcnews.php">Blog</a>
												</li>
											</ul>
										</div>

										<div class="col-xs-6 col-sm-12 col-md-6">
											<ul class="footer-links">
												<li class="'.$activepage5.'">
													<a href="'.$host_addr.'fjcregister.php">Register</a>
												</li>
												<li class="'.$activepage6.'">
													<a href="'.$host_addr.'fjccontactus.php">Contact Us</a>
												</li>
												<!-- <li class="'.$activepage6.'"><a href="<?php echo $host_addr;?>fjcfaq.php">FAQ</a></li> -->
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>		
						<div class="col-sm-3 col-md-4">
							<div class="widget">
								<h6 class="widget-title">Follow Us</h6>
								<div class="widget-content">
									<ul class="footer-links">
										<li><a href="http://twitter.com/FrontiersJC">Twitter</a></li>
										<li><a href="">Facebook</a></li>
										<!-- <li><a href="">Linkedin</a></li>
										<li><a href="">Google+</a></li> -->
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="copyright">
					<div class="container">
						<p> 
							&copy; <a href="'.$host_addr.'frontiersconsulting.php">Frontiers Consulting</a> 
							'.date('Y').'
							Developed by Okebukola Olagoke;
						</p>

						<ul class="footer-social">
							<li><a href="" class="fa fa-facebook"></a></li>
							<li><a href="" class="fa fa-twitter"></a></li>
							<!-- <li><a href="" class="fa fa-linkedin"></a></li> -->
							<!-- <li><a href="" class="fa fa-google-plus"></a></li> -->
							<!-- <li><a href="" class="fa fa-pinterest"></a></li> -->
							<!-- <li><a href="" class="fa fa-dribbble"></a></li> -->
						</ul>
					</div>
				</div>
			</footer> <!-- end #footer -->
		';
		/*theme control section*/
		$themescriptsdump='
			<script src="'.$host_addr.'scripts/js/jquery.ba-outside-events.min.js"></script>
			<script src="'.$host_addr.'scripts/js/jquery.responsive-tabs.js"></script>
			<script src="'.$host_addr.'scripts/js/jquery.flexslider-min.js"></script>
			<script src="'.$host_addr.'scripts/js/jquery.fitvids.js"></script>
			<script src="'.$host_addr.'scripts/js/jquery-ui-1.10.4.custom.min.js"></script>
			<script src="'.$host_addr.'scripts/js/jquery.inview.min.js"></script>
			<script src="'.$host_addr.'scripts/js/bxslider/jquery.bxslider.min.js"></script>
			<script src="'.$host_addr.'scripts/js/jqueryvalidate/jquery.validate.min.js"></script>
			<script src="'.$host_addr.'scripts/js/input-mask/jquery.inputmask.js" type="text/javascript"></script>
			<script src="'.$host_addr.'scripts/js/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>
			<script src="'.$host_addr.'scripts/js/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
			<script src="'.$host_addr.'scripts/jquery.sharrre.min.js"></script>
			<script src="'.$host_addr.'scripts/js/script.js"></script>
		';
		$themestylesdump='
			<!-- Stylesheets -->
			<!-- <link rel="stylesheet" href="'.$host_addr.'ionicons/css/ionicons.min.css"> -->
			<link rel="stylesheet" href="'.$host_addr.'stylesheets/fjccss/flexslider.css">
			<link rel="stylesheet" href="'.$host_addr.'stylesheets/fjccss/style.css">
			<!-- <link rel="stylesheet" href="'.$host_addr.'scripts/js/bxslider/jquery.bxslider.css"> -->
			<link rel="stylesheet" href="'.$host_addr.'stylesheets/fjccss/responsive.css">
			<!--[if IE 9]>
				<script src="js/media.match.min.js"></script>
			<![endif]-->
		';
		/*end theme control section*/
		/*end*/
		if($outs['status']=="active"){
			$outputs['outputpageone']='
			<!DOCTYPE html>
			<html>
				<head>
					<title>'.stripslashes($title).' | Frontiers Job-Connect</title>
					<meta http-equiv="Content-Language" content="en-us">
					<meta charset="utf-8"/>
					<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
					<meta http-equiv="Content-Type" content="text/html;"/>
					<meta name="keywords" content="'.$mpagekeywords.'"/>
					<meta name="description" content="'.$mpagedescription.'">
					<meta property="og:locale" content="en_US"/>
					<meta property="fb:app_id" content=""/>
					<meta property="fb:admins" content=""/>
					<meta property="og:type" content="website"/>
					<meta property="og:image" content="'.$ogimage.'"/>
					<meta property="og:title" content="'.$mpagetitle.'"/>
					<meta property="og:description" content="'.$mpagedescription.'"/>
					<meta property="og:url" content="'.$outs['pagelink'].'"/>
					<meta property="og:site_name" content="'.$mpagesitename.'"/>
					<link rel="canonical" href="'.$mpageurl.'"/>
					<link rel="stylesheet" href="'.$host_addr.'bootstrap/css/bootstrap.css"/>
					<!-- Light Box -->
					<link href="'.$host_addr.'stylesheets/lightbox.css" rel="stylesheet"/>
					<link rel="stylesheet" href="'.$host_addr.'stylesheets/font-awesome/css/font-awesome.min.css"/>
					<link rel="stylesheet" href="'.$host_addr.'stylesheets/jquery.raty.css"/>
					<link rel="stylesheet" href="'.$host_addr.'stylesheets/jssorskins.css"/>
					<link rel="icon" href="'.$host_addr.'images/muyiwaslogo.png" type="image/png"/>
					<script src="'.$host_addr.'scripts/jquery.js"></script>
					<script src="'.$host_addr.'scripts/lightbox.js"></script>
					<script src="'.$host_addr.'bootstrap/js/bootstrap.js"></script>
					<script src="'.$host_addr.'scripts/formchecker.js"></script>
					<script src="'.$host_addr.'scripts/mylib.js"></script>
					<script language="javascript" type="text/javascript" src="../../scripts/js/tinymce/tinymce.min.js"></script>
					<script language="javascript" type="text/javascript" src="../../scripts/js/tinymce/basic_config.js"></script>
					'.$themestylesdump.'
				</head>
			  <body>
			  	<noscript>
			        <div class="javascript-required">
			            <i class="fa fa-times-circle"></i> You seem to have Javascript disabled. This website needs javascript in order to function properly!
			        </div>
			    </noscript>
				<div id="main-wrapper">
			    	'.$topout.'
					<div id="page-content">
						<div class="container">
							<div class="row">
								'.$contentout.'
							</div>
						</div>
					</div>
					'.$ga.'
				</div>
					'.$socialfooting.'
					'.$themescriptsdump.'
			  </body>
		  	</html>
		';
		}else if($outs['status']=="inactive"){
		$outputs['outputpageone']='
			<!DOCTYPE html>
			<html>
			<head>
			<title>Post Disabled</title>
			<meta http-equiv="Content-Language" content="en-us">
			<meta charset="utf-8"/>
			<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
			<meta http-equiv="Content-Type" content="text/html;"/>
			<meta property="fb:app_id" content="578838318855511"/>
			<meta property="fb:admins" content=""/>
			<meta property="og:locale" content="en_US">
			<meta property="og:type" content="website">
			<link rel="stylesheet" href="'.$host_addr.'bootstrap/css/bootstrap.css"/>
			<!-- Light Box -->
			<link href="'.$host_addr.'stylesheets/lightbox.css" rel="stylesheet"/>
			<link rel="stylesheet" href="'.$host_addr.'stylesheets/font-awesome/css/font-awesome.min.css"/>
			<link rel="stylesheet" href="'.$host_addr.'stylesheets/jquery.raty.css"/>
			<link rel="stylesheet" href="'.$host_addr.'stylesheets/jssorskins.css"/>
			<link rel="icon" href="'.$host_addr.'images/muyiwaslogo.png" type="image/png"/>
			<script src="'.$host_addr.'scripts/jquery.js"></script>
			<script src="'.$host_addr.'scripts/lightbox.js"></script>
			<script src="'.$host_addr.'bootstrap/js/bootstrap.js"></script>
			<script src="'.$host_addr.'scripts/formchecker.js"></script>
			<script src="'.$host_addr.'scripts/mylib.js"></script>
		  </head>
		  <body>
			<div id="noclassdiv" data-role="page" style="overflow:hidden;">
			'.$facebooksdk.'
			'.$panelsnippet.'
		    	'.$topout.'
		    	<div class="mainholdtwo" data-backtype="white">
				<div class="main">
					<!-- <div class="mainpagecontent"> -->
						<div class="nobusiness">
							<div class="promhold">
							Sorry but thhis post for some reason has been disabled
							</div>
							<div class="promhold">
								<p class="promholdcontentaddhead">Social Feed</p>
								'.$socialfooting.'
							</div>
						</div>
				</div>
		  	</div>  
		</body>
		</html>
		';
		}
		// echo $outs['status'];
		return $outputs;
	}
?>