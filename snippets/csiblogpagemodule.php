<?php 
	function csiblogPageCreate($blogentryid){
		global $host_addr,$host_target_addr,$host_keywords;
		$outs=getSingleBlogEntry($blogentryid);
		// in case the blog type has oits own special full blog page with no external design
		$preblogpostout=isset($outs['vieweroutputcsiblogsingle'])?$outs['vieweroutputcsiblogsingle']:"Review code, <b>Full blog post setting disabled</b> for this blog type";
		$title=$outs['title'];
		$introparagraph=$outs['introparagraph'];
		$c="";
		if(isset($_GET['c'])&&$_GET['c']){
		    $c=$_GET['c'];
		}
	  	$alerter="";
		if($c=="true"){
			$alerter="<p>Thank you for dropping your comment, It will be made Visible shortly<p><br>";
		}
		$securitynumber=rand(0,10).rand(1,8).rand(0,5).rand(10,30);
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
		$logocontrol='<img src="'.$host_addr.'images/muyiwalogo5.png" class="total">';
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
			// $nextblogoutimg=;
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
		$tinyoutputll="No more posts for this ";
		$count=0;
		$catids=array();
		$curlastid="";
		if($catnumrow>0){
		  // echo $catnumrow;
		$tinyoutput="";
		$tinyoutputll="";
		while($catpostrow=mysql_fetch_assoc($catpostrun)){
		$outcatpost=getSingleBlogEntry($catpostrow['id']);
		$catids[]=$catpostrow['id'];
		if($count<15){
		  // echo "inhere";
		$tinyoutput.=$outcatpost['blogtinyoutput'];
		$tinyoutputll.='
			<div class="item">
				<div class="image">
					<a href="'.$outcatpost['pagelink'].'">
						<img src="'.$outcatpost['absolutecover'].'" alt="'.$outcatpost['blogcatname'].'" />
					</a>
					<div class="category">'.$outcatpost['blogcatname'].'</div>
				</div>
				<div class="desc">
					<ul>
						<li>Muyiwa Afolabi</li>
						<li class="separate"></li>
						<li>'.$outcatpost['maindayout'].'</li>
					</ul>
					<h3><a href="'.$outcatpost['pagelink'].'">'.$outcatpost['title'].'</a></h3>
				</div>
			</div>
		';
		/*<!-- ITEM START -->
			<div class="item">
				<div class="image">
					<a href="single.html">
						<img src="assets/img/related2.jpg" alt="Related" />
					</a>
					<div class="category">Beauty</div>
				</div>
				<div class="desc">
					<ul>
						<li>Gloria Theme</li>
						<li class="separate"></li>
						<li>August 04, 2015</li>
					</ul>
					<h3><a href="single.html">Swimwear Fashion 2015</a></h3>
				</div>
			</div>
			<!-- ITEM END -->*/
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
				<div class="post-img">
				    <img class="blogcoverphoto" '.$coverstyle.' src="'.$outs['absolutecover'].'"/>
				    '.$outs['blogpostout'].'
			    </div>
			';
		}elseif ($outs['blogentrytype']=="gallery") {
		  # code...
		  $blogdisplayoutput=$outs['csialbum'];
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
		$mpageimage=$outs['absolutecover'];
		$seout=stripslashes($outs['seometakeywords']).",";
		$mpagekeywords=$seout.stripslashes($outs['title']).", Christ Society International Outreach, fjconnect, Frontiers Job, best recruitment offers, frontiers recruits, frontiers recruitment, Frontiers consulting, recruitment opportunities, Muyiwa afolabi, Frankly Speaking";
		$mpagedescription=isset($mpagedescription)?$mpagedescription:"Welcome to Christ Society International Outreach; a social reformation project packaged to effect physical, mental and spiritual transformation for mankind.";
		$mpagekeywords=isset($mpagekeywords)?$mpagekeywords:"Christ Society International Outreach, csio, csi, best christian blog in nigeria, Muyiwa Afolabi, divine mysteries for total victory, blog, christian blog, motivational blog, educational blog, spiritual upliftment, financial advancement, marital guidance";
		$mpageimage=isset($mpageimage)?$mpageimage:$host_addr."images/favicon.png";
		$mpagetitle=isset($mpagetitle)?$mpagetitle:"Welcome | CSI Outreach";
		$mpageurl=isset($mpageurl)?$mpageurl:$host_addr;
		$mpagefbappid=isset($mpagefbappid)?$mpagefbappid:"";
		$mpagefbadmins=isset($mpagefbadmins)?$mpagefbadmins:"";
		$mpagesitename=isset($mpagesitename)?$mpagesitename:"Christ Society International Outreach Official Website";
		$mpagecrumbclass=isset($mpagecrumbclass)?$mpagecrumbclass:"hidden";
		$mpagecrumbtitle=isset($mpagecrumbtitle)?$mpagecrumbtitle:"";
		$mpagecrumbpath=isset($mpagecrumbpath)?$mpagecrumbpath:"";
		$mpageauthor=isset($mpageauthor)?$mpageauthor:"Muyiwa Afolabi";
		$mpageheaderclass=isset($mpageheaderclass)?$mpageheaderclass:"";
		$mpagelinkclass=isset($mpagelinkclass)?$mpagelinkclass:"";
		$mpagelinkclass2=isset($mpagelinkclass2)?$mpagelinkclass2:"";
		$mpagelinkclass3=isset($mpagelinkclass3)?$mpagelinkclass3:"";
		$mpagecolorstylesheet="";
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
		// $careeradvice=getAllGeneralInfo("viewer","careeradvice","");
		// $quoteout=getAllGeneralInfo("viewer","fjcquote","");
		// for holding sidebarcontent that sits at the top of the sidebar widget
		$mptopsidebarcontent='';
		// generate the page share content
		$contentshare=strlen(stripslashes($introparagraph))>70? substr(stripslashes($introparagraph), 0,70):stripslashes($introparagraph);
		// get some specific popular posts
		$query="SELECT * FROM blogentries WHERE blogtypeid=2 AND status='active' ORDER BY id desc";
		// echo $query;
		$mpageouts=paginatecustom($query,"csi");
		$mpageblogoutone=getAllBlogEntries("viewer",$mpageouts['limit'],2,"blogtype");
		$mpagefooterlatestposts='
			<!-- WIDGET START -->
			<div class="col-sm-4 col-xs-12">
				<div class="sidebar-right-wrap widget-box widget_jupios_latest_latest_posts_widget">
					<div class="widget-title">
						<h4>Latest Posts</h4>
					</div>
					<div class="widget-content">
						<ul class="latest-posts-widget">
							'.$mpageblogoutone['recentpostspecificll'].'
						</ul>
					</div>
				</div>
			</div>
			<!-- WIDGET END -->
		';
		// header top bar small
		// header top bar small
		$mpageheadertopbarsmall='
			<div class="top-bar-small clearfix" id="topBarSmallMenu">
	            <div class="row">
	                <div class="medium-12 columns">
	                    <ul class="left">
	                        <li><a href="tel:+234-809-912-0702"><i class="flaticon-telephone46"></i> <span class="hide-for-small">+234-809-912-0702</span></a></li>
	                        <li><a href="mailto:csiofellowship@gmail"><i class="flaticon-mail59"></i> <span class="hide-for-small">csiofellowship@gmail.com</span></a></li>
	                        <li><a href="https://www.facebook.com/pages/Christ-Society-International-Outreach/449404825182031" class="icon"><i class="fa fa-facebook-official"></i></a></li>
	                        <li><a href="https://www.twitter.com/CSIFellowship" class="icon"><i class="fa fa-twitter-square"></i></a></li>
	                        <li><a href="https://www.youtube.com/channel/UCBJSs1AkjaOaPVQ6jgrHKfw" class="icon"><i class="fa fa-youtube-square"></i></a></li>
	                        <li><a href="https://www.pinterest.com/csioutreach" class="icon"><i class="fa fa-pinterest-square"></i></a></li>
	                        <li><a href="https://plus.google.com/100010173230194927842" class="icon"><i class="fa fa-google-plus"></i></a></li>
	                    </ul>
	                    <ul class="right">
	                        <li><a href="'.$host_addr.'index.php" class=""><i class="fa fa-home"></i> <span class="hide-for-small">Home</span></a></li>
	                        <li><a href="'.$host_addr.'csisermons.php"><i class="fa fa-microphone"></i> <span class="hide-for-small">Sermons</span></a></li>
	                        <li><a href="'.$host_addr.'csiregister.php"><i class="fa fa-file-text"></i> <span class="hide-for-small">Register</span></a></li>
	                        <li><a href="'.$host_addr.'csiblog.php" class=""><i class="fa fa-book"></i> <span class="hide-for-small">Blog</span></a></li>
	                    </ul>
	                </div>
	            </div>
	        </div><!-- /.topBarSmallMenu -->
		';
		// for holding default sidebar
		$mpageoutcat=getAllBlogCategories("viewer","",2);
		$mpageblogquery="SELECT * FROM blogentries where blogtypeid=1 AND status='active' ORDER BY id desc";
		$mpageouts=paginatecustom($mpageblogquery,"csi");
		$mpageblogout=getAllBlogEntries("viewer",$mpageouts['limit'],2,"blogtype");
		$mpageoutsquote=getAllQuotes('viewer','','csi');
		$mpagesidebar='
			<div class="blog-box">
	            <div class="inner">
	                <div class="ws-title left-line">
	                    <h1 class="title">Categories</h1>
	                </div>
	                <div class="content">
	                    <ul class="list-arrow categories">
							'.$mpageoutcat['csilinkout'].'
	                    </ul>
	                </div><!-- /.content -->
	            </div><!-- /.inner -->
	        </div><!-- /.blog-box -->
	        <div class="blog-box">
	            <div class="inner">
	                <div class="ws-title left-line">
	                    <h1 class="title">Meet Jesus</h1>
	                </div>
	                <div class="content">
	                    <div class="row item">
	                        <div class="medium-12 columns control-testimony-widget">
	                        	<div class="row">
	                            	<div class="medium-12 columns control-testimony-banner">
	                            		<img src="'.$host_addr.'images/csiimages/bleedingchrist.png"/>
	                            	</div>
                            	</div>
	                            <div class="flexslider flexslider-meetjesus">
			                        <ul class="slides">
			                        	<li class="item">
			                        		<img src="'.$host_addr.'images/csiimages/prayer31.png"/>
			                        	</li>
			                        	<li class="item">
			                        		<img src="'.$host_addr.'images/csiimages/prayer32.png"/>
			                        	</li>
			                        	<li class="item">
			                        		<img src="'.$host_addr.'images/csiimages/prayer33.png"/>
			                        	</li>
			                        	<li class="item">
			                        		<img src="'.$host_addr.'images/csiimages/prayer34.png"/>
			                        	</li>
			                        	<li class="item">
			                        		<img src="'.$host_addr.'images/csiimages/prayer35.png"/>
			                        	</li>
			                        </ul>
			                    </div>
	                        </div>
	                    </div><!-- /.item -->
	                </div><!-- /.content -->
	            </div><!-- /.inner -->
	        </div><!-- /.blog-box -->
	        <div class="blog-box">
	            <div class="inner">
	                <div class="ws-title left-line">
	                    <h1 class="title">Interact</h1>
	                </div>
	                <div class="content">
	                    <div class="row item">
	                        <div class="medium-12 columns">
	                            <p>Place Video Commercials here!<br>
								</p>
									<video title="" id="example_video_1" class="video-js vjs-default-skin" controls preload="false" height="" style="width:100%; max-width:360px;" poster="'.$host_addr.'images/csiimages/csihappinessvidcover.png" data-setup="{}">
										<source src="'.$host_addr.'files/videos/Happiness in 2016.flv"/>
			                            <source src="'.$host_addr.'files/videos/Happiness in 2016.mp4"/>
									 </video>
	                        </div>
	                    </div><!-- /.item -->
	                </div><!-- /.content -->
	            </div><!-- /.inner -->
	        </div><!-- /.blog-box -->
	        <div class="blog-box">
	            <div class="inner">
	                <div class="ws-title left-line">
	                    <h1 class="title">Popular Posts</h1>
	                </div>
	                <div class="content">
	                    '.$mpageblogout['popularpostspecificcsitwo'].'
	                </div><!-- /.content -->
	            </div><!-- /.inner -->
	        </div><!-- /.blog-box -->
	        <div class="blog-box">
	            <div class="inner">
	                <div class="ws-title left-line">
	                    <h1 class="title">Quotes</h1>
	                </div>
	                <div class="content">
			        <div class="quote-wrapper">
						'.$mpageoutsquote['randomoutputfour'].'
			        </div><!-- /.quote-wrapper -->
		        </div><!-- /.content -->
	            </div><!-- /.inner -->
	        </div><!-- /.blog-box -->
	        <div class="blog-box">
	            <div class="inner">
	                <div class="ws-title left-line">
	                    <h1 class="title">CSI Event</h1>
	                </div>
	                <div class="content">
	                	<div class="row item">
                            <div class="medium-12 columns imgonly">
                                <img src="'.$host_addr.'images/csiimages/olai 3.jpg"/>
                            </div>
                        </div><!-- /.item -->
	                    <div class="row item">
	                        <div class="medium-12 columns imgonly">
	                            <img src="'.$host_addr.'images/csiimages/csisidebar.jpg"/>
	                        </div>
	                    </div><!-- /.item -->
	                </div><!-- /.content -->
	            </div><!-- /.inner -->
	        </div><!-- /.blog-box -->
	        <div class="most-commented">
	            <div class="ws-title left-line">
	                <h1 class="title">Most commented</h1>
	            </div>
	            <div class="most-commented-items">
	                '.$mpageblogout['mostcommentedpostviewer'].'
	            </div><!-- /.most-commented-items -->
	        </div><!-- /.most-commented -->
		';
		$mpageminibanner='
			<section class="intro-text-section" id="blog">
	            <div class="inner mini-banner">
					<img src="'.$host_addr.'images/csiimages/slide10.jpg"/>
	            </div><!-- /.inner -->
	        </section><!-- /.blog-section -->
		';
		$mpagefooteroutput=$mpagefooterlatestposts;
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
		$mpagecrumbtitle="$title";
		$mpagecrumbpath='
			<!-- ***** Dark line section ***** -->
            <section class="dark-line-section shadowed-section">
                <div class="inner">
                    <div class="row">
                        <div class="small-12 columns">
                            <h1 class="title">'.$mpagecrumbtitle.'</h1>
                            <nav class="breadcrumbs">
                                <a href="'.$host_addr.'csioutreach.php">CSI Outreach</a>
                                <a href="'.$host_addr.'csioblog.php">Blog</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </section>
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
			<!-- ***** Page loader ***** -->
			<section class="page-loader" id="pageLoader">
			    <div class="spinner">
			        <div class="bounce1"></div>
			        <div class="bounce2"></div>
			        <div class="bounce3"></div>
			    </div><!-- /.spinner -->
			</section><!-- /.page-loader -->
			<!-- ***** Header ***** -->
			<header class="header" id="header">
			    <div class="navigation" id="navigation">
			        <div class="contain-to-grid">
			        	'.$mpageheadertopbarsmall.'
			            <nav class="top-bar" id="topBar" data-topbar role="navigation" data-options="custom_back_text: true;back_text: Back;is_hover: true;mobile_show_parent_link: false; scrolltop : true">
			                <ul class="title-area">
			                    <li class="name">
			                        <h1><a href="'.$host_addr.'/csioutreach.php"><img alt="Christ Society International Outreach" class="logo" src="'.$host_addr.'images/csiimages/csi.png"></a></h1>
			                    </li>
			                    <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
			                </ul>
			                <section class="top-bar-section">
			                    <div class="top-bar-menu clearfix" id="topBarMenu">
			                        <ul class="left">
			                        	<li class="">
			                                <a href="'.$host_addr.'index.php" name="home" title="">Home</a>
			                            </li>
			                        	<li class="'.$activepage1.'">
											<a href="'.$host_addr.'csioutreach.php" name="csio" title="">CSI Outreach</a>
										</li>
										<!--<li class="'.$activepage3.'">
											<a href="'.$host_addr.'csiblog.php" name="csiblog" title="Check Out the CSIO\'s Blog; Divine Mysteries for total victory">CSIO Blog</a>
										</li>-->
										<li class="'.$activepage2.'">
											<a href="'.$host_addr.'blog.php" name="blog" title="Frankly Speaking Blog">Frankly Speaking Blog</a>						
										</li>
										<!-- <li class="'.$activepage4.'">
											<a href="'.$host_addr.'csisermons.php" name="frontiers" title="Listen to past CSI Sermons">Sermons</a>
										</li> -->
										<li class="'.$activepage5.'">
											<a href="'.$host_addr.'lovelanguage.php" name="lovelanguage" title="Love Language Blog">Love Language</a>
										</li>
										<li class="">
											<a href="'.$host_addr.'onlinestore.php" name="onlinestore" title="Visit Muyiwa Afolabi\'s online store to sample and purchase all his life changing, enlightnening multimedia content">Online Store</a>
										</li>
			                            <!-- <li class="desktop-search">
			                                <a class="btn-ps-modal" data-ps-modal-id="#searchModal">
			                                    <i class="fa fa-search"></i>
			                                </a>
			                            </li> -->
			                        </ul>
			                    </div><!-- /.topBarMenu -->
			                </section><!-- /.top-bar-section -->
			            </nav><!-- /nav -->
			        </div><!-- /.fixed -->
			    </div><!-- /#navigation -->
			</header><!-- /#header -->
		';
		$commentsoutput='
			<div id="" class="comments-area">
			  '.$alerter.'
			  '.$outs['viewercommentcsi'].'
		        <div id="respond" class="comment-respond" appdata-name="commentsform" style="background-color:#fefefe;">
	                <h3 class="text-center">Post a Comment</h3>

		          <form action="'.$host_addr.'snippets/basicsignup.php" name="blogcommentform" data-ajax="false" method="post">
		            <input type="hidden" name="entryvariant" value="createblogcomment"/>
		            <input type="hidden" name="sectester" value="'.$securitynumber.'"/>
		            <input type="hidden" name="blogentryid" value="'.$blogentryid.'"/>
		            <p> * means the field is required.<p>
		            <div class="row">
		              <div class="medium-4 column">
		                <p>Name *</p>
		                <input type="text" name="name" Placeholder="Firstname Lastname" class="curved"/>
		              </div>
		              <div class="medium-4 column">
		                <p>Email *</p>
		                <input type="text" name="email" Placeholder="Your email here" class="curved"/>
		              </div>
		              <div class="medium-4 column">
		                <p>Security('.$securitynumber.');</p>
		                <input type="text" name="secnumber" Placeholder="The above digits here" class="curved"/>
		              </div>
		              <div class="medium-12 column">
		                <p>Comment:</p>
		                <textarea name="comment" id="postersmall" Placeholder="" class="curved3"></textarea>
		              </div>
		            </div>
		            <div class="form-submit">
						<input type="button" name="createblogcomment" value="Submit" data-ajax="false" class="btn btn-send submitbutton" value="SUBMIT">
					</div>
		          </form>
		        </div>
	        </div>
		';
		$nextprevposts='
			<div class="clearfix">
                <div class="small-6 columns">
                	<span class="nextprevtext">Previous Post</span><br>
                    <a href="'.$prevlink.'" class="button"><i class="fa fa-chevron-left"></i> '.$prevblogout.'</a>
                </div>
                <div class="small-6 columns text-right">
                	<span class="nextprevtext">Up Next</span><br>
                    <a href="'.$nextlink.'" class="button">'.$nextblogout.' <i class="fa fa-chevron-right"></i></a>
                </div>
            </div>
		';
		$outs['commentsonoff']==1?$commentsoutput="":$commentsoutput=$commentsoutput;
		$followonposts='
		      <!-- POST RELATED START -->
				<div class="post-related">
					<div class="post-related-row">
						<div class="title">
							<h3>You May Also Like</h3>
						</div>
						<div class="relatedposts">
							'.$tinyoutputll.'
						</div>
					</div>
				</div>
				<!-- POST RELATED END -->
		';
		$contentout='
			<section class="blog-section" id="blog">
			    <div class="inner">
			        <div class="row">
			            <div class="medium-8 columns">
			            	'.$preblogpostout.'
			            	'.$nextprevposts.'
			            	'.$commentsoutput.'
						</div><!-- /.row -->
                        <div class="medium-4 columns">
							'.$mpagesidebar.'
                        </div><!-- /.columns -->
			    </div><!-- /.inner -->
			</section><!-- /.blog-section -->
		';
		// footer related data
		// for holding socialnetwork initiation scripts
		// for holding fixed nav type footer class
		$mpagefixedfooterstyle="footerSection";
		$mpagefixedfooterstyletwo=""; //style= footerStyleTwo
		$mpagesdksmarkuproot='
			<div id="fb-root"></div>
		';
		$mpagesdks='
			<script type="text/javascript">
				$(window).load(function(){
					(function(d, s, id) {
					  var js, fjs = d.getElementsByTagName(s)[0];
					  if (d.getElementById(id)) return;
					  js = d.createElement(s); js.id = id;
					  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=223614291144392";
					  fjs.parentNode.insertBefore(js, fjs);
					}(document, \'script\', \'facebook-jssdk\'));
				});
			</script>
			<!-- For google plus -->
			<script type="text/javascript">
				$(window).load(function(){

					  (function() {
					    var po = document.createElement(\'script\'); po.type = \'text/javascript\'; po.async = true;
					    po.src = \'https://apis.google.com/js/platform.js\';
					    var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(po, s);
					  })();
				});
			</script>

			<!-- For twitter -->
			<script>
				$(window).load(function(){
					!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?\'http\':\'https\';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+\'://platform.twitter.com/widgets.js\';fjs.parentNode.insertBefore(js,fjs);}}(document, \'script\', \'twitter-wjs\');
				});
			</script>

			<!-- For LinkedIn -->
			<script src="//platform.linkedin.com/in.js" async="true" type="text/javascript">
			 lang: en_US
			</script>
		';
		// footer intro for muyiwa afolabi
		$mpagefooterintroma='
			<div class="fixed-wrapper">
			    <div class="row">
			        <div class="medium-2 large-2 large-push-4 columns">
			            <img alt="" src="'.$host_addr.'images/csiimages/macsi.jpg" alt="Muyiwa Afolabi, Frontiers Job-Connect"/>
			        </div>
			        <div class="medium-10 large-4 large-pull-2 columns">
			            <div class="thanx-box">
			                <h1>Muyiwa Afolabi</h1>
			                <p><span class="strong">Muyiwa Afolabi</span> is the Group CEO of Frontiers International Services Limited; a human capital development and social reformation outfit.
								He is a strategic thinker with world-class experience in value chain process management.<br>
								<!--<a href="http://muyiwaafolabi.com/profile.php" target="_blank">Read More</a></p>-->
			            </div>
			        </div>
			    </div>
			</div>
		';
		$socialfooting='
			<!-- ***** Footer section ***** -->
			<footer class="footer-section '.$mpagefixedfooterstyletwo.'" id="'.$mpagefixedfooterstyle.'">
			    <div class="content">
			        <div class="inner">
			            <div class="row">
			                <div class="large-3 columns info-box">
			                    <h1>Twitter</h1>
			                    <div class="tweet">
									<a class="twitter-timeline"  href="https://twitter.com/franklyafolabi" data-widget-id="653559116712046592">Tweets by @franklyafolabi</a>
			          				<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?\'http\':\'https\';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
								</div>
			                </div><!-- /.columns -->
			                <div class="large-3 columns blogroll-box">
			                    <h1>More Links</h1>
			                    <ul class="list-arrow">
			                        <li><a href="frontierscounsulting.php">Frontiers Consulting</a></li>
			                        <li><a href="http://frontiersjobconnect.com">Frontiers Job-Connect</a></li>
			                        <li><a href="ownyourowntwo.php">Own Your Own</a></li>
			                    </ul>
			                    <h1>Facebook</h1>
								<div class="fb-like-box" data-href="https://www.facebook.com/FranklySpeakingWithMuyiwaAfolabi" data-width="250" data-height="250" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="true"></div>
			                </div><!-- /.columns -->
			                <div class="large-3 columns">
			                    <!-- <img alt="" src="assets/img/elements/cross.png"> -->
			                    <h1><a href="https://www.instagram.com/frankyafolabi" class="footer-header-link" target="_blank">Instagram</a></h1>
			                    <!-- www.intagme.com -->
			                    <iframe src="http://www.intagme.com/in/?u=ZnJhbmtseWFmb2xhYml8aW58MTAwfDJ8NHx8eWVzfDV8dW5kZWZpbmVkfHllcw==" allowTransparency="true" frameborder="0" scrolling="no" style="border:none; overflow:hidden; width:auto; min-height:460px;" ></iframe>
			                </div><!-- /.columns -->
			                <div class="large-3 columns contact-box">
			                    <img alt="Christ Society International Outreach" class="logo" src="'.$host_addr.'images/csiimages/csi.png">
			                    <ul class="contact">
			                        <li>Join us at</li>
			                        <li>THE EVENTS CENTRE</li>
			                        <li>1B, Hakeem Balogun Street, Off Agigingbi Road, Behind MKO Gardens, Ikeja, Lagos, Nigeria.</li>
			                        <li>5:30PM, Every sunday </li>
			                    </ul>
			                    <div class="text-center">
			                        <a href="home1.html#" class="button btn-dark">Connect With us</a>
			                    </div>
			                    <ul class="socials">
			                        <li><a href="https://www.facebook.com/pages/Christ-Society-International-Outreach/449404825182031" class="icon"><i class="fa fa-facebook-official"></i></a></li>
			                        <li><a href="https://www.twitter.com/CSIFellowship" class="icon"><i class="fa fa-twitter-square"></i></a></li>
			                        <li><a href="https://www.youtube.com/channel/UCBJSs1AkjaOaPVQ6jgrHKfw" class="icon"><i class="fa fa-youtube-square"></i></a></li>
			                        <li><a href="https://www.pinterest.com/csioutreach" class="icon"><i class="fa fa-pinterest-square"></i></a></li>
			                        <li><a href="https://plus.google.com/100010173230194927842" class="icon"><i class="fa fa-google-plus"></i></a></li>
			                    </ul>
			                </div><!-- /.columns -->
			            </div><!-- /.row -->
			        </div><!-- /.inner -->
			    </div><!-- /.content -->
			    <div class="copyright">
			        <div class="inner">
			            <div class="row">
			                <div class="medium-10 columns">
									&copy; <a href="http://muyiwaafolabi.com/profile.php">Muyiwa Afolabi</a>
									'.date('Y').'
									Developed by Okebukola Olagoke;
			                </div>
			                <div class="medium-2 columns">
			                    <a href="pageTop" class="scroll-to"><i class="fa fa-angle-up"></i>Page top</a>
			                </div>
			            </div>
			        </div>
			    </div>
			    
					'.$mpagefooterintroma.'
					'.$mpagesdksmarkuproot.'
					'.$mpagesdks.'
					
			</footer><!-- #footerSection -->
		';
		/*Page Schema section*/
		$schema='
			<div itemscope itemtype="'.$mpageurl.'">
			  <h2 itemprop="headline">'.$title.'</h2>
			  <h3 itemprop="alternativeHeadline">'.$title.'</h3>
			  <span itemprop="author">Muyiwa Afolabi</span>
			  <span itemprop="description">'.$headerdescription.'</span>
			  <span itemprop="articleBody">'.$headerdescription.'</span>
			  <img itemprop="image" src="'.$mpageimage.'" alt="Post Cover Photo"/>
			  <meta itemprop="datePublished" content="'.$outs['schemadayout'].'"/>
			</div>
		';
		/*end*/
		/*theme control section*/
		$themescriptsdump='
			<script src="'.$host_addr.'scripts/csiscripts/modernizr.js"></script>
			<!-- // <script src="'.$host_addr.'scripts/csiscripts/jquery.js"></script> -->
			<script src="'.$host_addr.'scripts/csiscripts/jquery.cookie.js"></script>
			<script src="'.$host_addr.'scripts/csiscripts/foundation.js"></script>
			<script src="'.$host_addr.'scripts/csiscripts/classie.js"></script>
			<script src="'.$host_addr.'scripts/csiscripts/owl.carousel.js"></script>
			<script src="'.$host_addr.'scripts/csiscripts/jquery.validate.js"></script>
			<script src="'.$host_addr.'scripts/csiscripts/jquery.countdown.js"></script>
			<script src="'.$host_addr.'scripts/csiscripts/jquery.counterup.js"></script>
			<script src="'.$host_addr.'scripts/csiscripts/jquery.scrollTo.js"></script>
			<script src="'.$host_addr.'scripts/csiscripts/parallax.js"></script>
			<script src="'.$host_addr.'scripts/csiscripts/jquery.waypoints.js"></script>
			<script src="'.$host_addr.'scripts/csiscripts/jquery.flexslider.js"></script>
			<script type="text/javascript" src="'.$host_addr.'plugins/csirevolution/revolution/js/jquery.themepunch.tools.min.js"></script>
			<script type="text/javascript" src="'.$host_addr.'plugins/csirevolution/revolution/js/jquery.themepunch.revolution.min.js"></script>

			<!-- Application main -->
			<script src="'.$host_addr.'scripts/csiscripts/application.js"></script>

			<script>
			    APP.init();
			    APP.initPlugins();
			</script>
		';
		$themestylesdump='
			<!-- Stylesheets -->
				<link rel="stylesheet" href="'.$host_addr.'stylesheets/csicss/plugins.css">
			    <!-- Revolution slider -->
			    <link rel="stylesheet" type="text/css" href="'.$host_addr.'plugins/csirevolution/revolution/css/settings.css">
			    <link rel="stylesheet" type="text/css" href="'.$host_addr.'plugins/csirevolution/revolution/css/layers.css">
			    <link rel="stylesheet" type="text/css" href="'.$host_addr.'plugins/csirevolution/revolution/css/navigation.css">

			    <!-- Template styles -->
			    <link rel="stylesheet" href="'.$host_addr.'stylesheets/csicss/backgrounds.css">
			    <link rel="stylesheet" href="'.$host_addr.'stylesheets/csicss/style-blue.css">

			<!--[if IE 9]>
				<script src="'.$host_addr.'scripts/js/media.match.min.js"></script>
			<![endif]-->
		';
		/*end theme control section*/
		/*end*/
		if($outs['status']=="active"){
			$outputs['outputpageone']='
				<!DOCTYPE html>
				<html>
					<head>
						<title>'.stripslashes($title).' | CSI Outreach</title>
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
						<link rel="icon" href="'.$host_addr.'images/csiimages/favicon.ico" sizes="16x16 32x32 64x64" type="image/vnd.microsoft.icon"/>
						'.$themestylesdump.'
						'.$ga.'
					</head>
				  <body id="pageTop" class="fixed-navbar">
				  	<noscript>
				        <div class="javascript-required">
				            <i class="fa fa-times-circle"></i> You seem to have Javascript disabled. This website needs javascript in order to function properly!
				        </div>
				    </noscript>
					    '.$topout.'
				        '.$mpageminibanner.'
					    '.$mpagecrumbpath.'
						<div class="off-canvas-wrap" data-offcanvas>
							<div class="inner-wrap">
								<!-- ***** Blog section ***** -->
				                <section class="blog-section" id="blog">
				                    <div class="inner">
				                        <div class="row">
											'.$contentout.'

										</div><!-- /.row -->
				                    </div><!-- /.inner -->
				                </section><!-- /.blog-section -->
							</div>
						</div>
					'.$socialfooting.'
					<script src="'.$host_addr.'scripts/jquery.js"></script>
					<script src="'.$host_addr.'scripts/lightbox.js"></script>
					<script src="'.$host_addr.'bootstrap/js/bootstrap.js"></script>
					<script src="'.$host_addr.'scripts/formchecker.js"></script>
					<script src="'.$host_addr.'scripts/mylib.js"></script>
					<script language="javascript" type="text/javascript" src="../../scripts/js/tinymce/tinymce.min.js"></script>
					<script language="javascript" type="text/javascript" src="../../scripts/js/tinymce/basic_config.js"></script>
					'.$themescriptsdump.'
					'.$schema.'
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