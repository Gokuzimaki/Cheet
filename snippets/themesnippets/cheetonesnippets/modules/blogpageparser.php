<?php
	// this file is responsible for producing the final render of the blog page
	// based on the current theme
	if($blogdata['status']=="active"){
		// reassign the blogdata variable and unset it to allow other file includes
		// that rely on it function properly 
		// var_dump($blogdata);
		$curblogdata= $blogdata;
		// unset($blogdata);
		$mcolc=9;
		$sbcolc=3;
		$sbstyle="";
		if($curblogdata['blogentrytype']=="banner"){
			$mcolc=12;
			$sbcolc="12 _fullwidth";
			$sbstyle='style="display:hidden;"';

		}
		// this files handles the parsing and output of blog page content
		// it is a system module
		include($host_tpathplain.'modules/blogdataparser.php');
		// bring in the system default widgets	

		// control options content for empty brp retrieval
		$b_options['brpdefaulttext']="No more posts here";
		$b_options['brpdefaultclass']="related-post-item";
		include($host_tpathplain.'modules/defaultwidgets.php');

		// this file is the blogdataparser for the current theme, make any changes to
		// it to provide you desired output should the default above prove 
		// unsatisfactory

		// this variable represents the content of the full-width-section class
		// based on the type of the blog being displayed
		$eclass="";
		if($curblogdata['blogentrytype']=="video"){
			$eclass="_video";

		}
		if($curblogdata['blogentrytype']=="audio"){
			$eclass="_audio";

		}

?>
<?php  
		// the main opengraph meta tags used in the header content are as follows
		
		// this mpage variable can carry and deposit multple meta tags in the theme
		// header file
		$mpageextrametas='';
		
		// NB to get the total comments for a page, style out an element with the attr
		// id="sharecounter" and a span element in it with the class="count"
		// the span element will carry the count data for the shares across the platforms
		// googleplus, facebook, twitter, linkedin, digg, delicious and stumbleupon

		// the share urls for the post are given to you via the format variables
		// $socialnetwork_url e.g $facebook_url
		// note that you have to verify the variable exists before applying it
		// or if you want you can create your own sharing mechanism here, but remember
		// to use the url stored in $mpagecanonicalurl for sharing.

		// obtain data
		include($host_tpathplain.'themesnippets/dbrsnippets/headcontentdbr.php');

?>
	<body>
		<!--[if lt IE 8]>
			<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
		<![endif]-->
		<div id="container" class="boxed">
			<?php
				include($host_tpathplain.'themesnippets/dbrsnippets/toplinksdbr.php');
			?>
			<div id="content" class="background-color-white">
				<div class="container padded-bottom">
					<div class="row top-margin-sm ">
						<div class="col-md-<?php echo $mcolc;?>">
							<div class="blog-header">
								<div class="blog-date">
									<span class="blog-day">
										<?php echo $curblogdata['day'];?>
									</span>
									<span class="blog-month _2">
										<?php echo $curblogdata['month'];?>

									</span>
									<span class="blog-month">
										<?php echo $curblogdata['year'];?>
									</span>
								</div>
								<div class="blog-info">
									<h1 class="blog-title">
										<?php echo $curblogdata['title'];?>
									</h1>
									<div class="blog-details">
										by <?php echo $curblogdata['poster']['fullname'];?>/ 
										in <?php echo $curblogdata['blogcatdata']['catname'];?>/ 
										Comments: <?php echo $blog_comment_count;?>
										Views: <?php echo number_format($curblogdata['views']);?>
									</div>
								</div>
							</div>
							<div class="full-width-section <?php echo $eclass?>">
								<?php
									echo $covercontent;
								?>
							
							</div>

							
							<div class="blog-post-content">
								<?php echo $curblogdata['blogpost'];?>
							</div>
							<div class="blog-under">
								<div class="blog-tags">
									<i class="fa fa-tag"></i>
									<div class="tags">
										<?php
											// the post tags have been stored in an array
											// $tagcloud
											// the default url for a tag is
											// $host/theblogpage?tag=thetagname
											// unless otherwise changed by the theme
											// user
											if(count($tagcloud)>0){
												$tagvalid=false;
												for($tc=0;$tc<count($tagcloud);$tc++){
													$ctag=$tagcloud[$tc];
													$comma=$tc<count($tagcloud)-1?",":"";
													if($ctag!==""){
														$tagvalid=true;
										?>
														<a href="<?php echo $host_addr;?>/blog.php?tag=<?php echo $ctag;?>">
															<?php echo $ctag;?>
														</a>
															<?php echo $comma;?>
										<?php
													}
										?>
										<?php
												}
												if($tagvalid==false){
										?>
										<a href="#">No tags for this post</a>
										<?php
												}
										 	}else{

										?>
										<a href="#">No tags for this post</a>

										<?php
											}
										?>
									</div>
								</div>
								<div class="blog-share">
									<i class="fa fa-share-alt"></i>
									<div class="blog-share-socials">
										<a href="<?php echo $facebook_url;?>">
											<i class="fa fa-facebook"></i>
										</a>
										<a href="<?php echo $twitter_url;?>">
											<i class="fa fa-twitter"></i>
										</a> 
										<a href="<?php echo $googleplus_url;?>">
											<i class="fa fa-google-plus"></i></a>
										<a href="<?php echo $googlemail_url;?>">
											<i class="fa fa-google-plus-official"></i></a>
										<a href="<?php echo $email_url;?>">
											<i class="fa fa-envelope-o"></i></a>
									</div>								
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<h4 class="underlined">
										You Might <strong>Also Like</strong></h4>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="related-posts-slider tmq-3-cols">
									<?php echo $theme_brpwidget;?>
									</div>
								</div>
							</div>
							<?php
								if(file_exists($host_tpathplain.'themesnippets/dbrsnippets/modules/blogcommentparser.php')){
									include($host_tpathplain.'themesnippets/dbrsnippets/modules/blogcommentparser.php');
								}
							?>
						</div>
						<div class="col-md-<?php echo $sbcolc;?>">
							<div id="sidebar-area">
								<?php 
									include($host_tpathplain.'themesnippets/dbrsnippets/modules/sidebarparser.php');

								?>	
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
				include($host_tpathplain.'themesnippets/dbrsnippets/footerdbr.php');
			?>
		</div>
		<?php
			include($host_tpathplain.'themesnippets/dbrsnippets/themescriptsdumpdbr.php');
		?>
	</body>
</html>

<?php
	}else{
?>

<?php
	}
?>