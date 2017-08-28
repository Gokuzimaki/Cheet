<?php
	// this file will be called on blog section views and the following variables 
	// are compulsory to its function and without it the function should not function
	if(isset($portdata)){
		// the blog data set has full data entry content for blog posts
		// valid return content can be found in the 'return_data' index

?>
<?php
		// generate pagination content from the compulsory accompanying $outs variable
		$showtoppag=isset($b_options['showtoppages'])?$b_options['showtoppages']:true;
		$showbottompag=isset($b_options['showbottompages'])?
		$b_options['showbottompages']:true;
		if(isset($portdata['rvpagination'])&&isset($b_options['pagination'])
			&&$b_options['pagination']==true && $showtoppag==true){
			
			// the indexes $outs['prev_url'], $outs['next_url'] are used for
			// carrying the previous and next pointer url values
			
			// the indexes $outs['num_url'] & $outs['pagenumbers'] are used for
			// holding the urls for the pages to be displayed and the corresponding 
			// numeric value attached to each url

			// the indexes $outs['current_page'] is used for carrying the number
			// of the current page being viewed
			
			// the indexes $outs['usercontrols'] is used for carrying the jump menu
			// set of options comprising of two select boxes on carrying the current
			// number of available pages and the other carrying the number of 
			// result instances per page,i.e number of results shown per view
			
			// with this options one can be really creative with how thier pagination
			// should work/look
		
			// the following variables can be used to determine if you want pagination
			// to include next, previous and all buttons, the values are preset and 
			// can be toggled from true to false depending on what is required

			$showprevbtn=true;
			$shownextbtn=true;
			$showallbtn=false;
			// NB. the minimum value for['num_pages'] before the next and previous 
			// buttons are fully utulised is 11 by default, if you have 11 pages, the 
			// next_url and prev_url indexes will start having proper values

			// echo "we paging";
			// var_dump($outs);
			
			// first of all we work with the previous next and all values for the page
?>
	<?php
		// this brings in the pagination section for the blog 
		include("portfoliopaginationsection.php");
	?>
<?php
		}
		// end pagination section
?>
<?php
		// generate sub content under the pagination output if necessary, useful for 
		// showing more data besides pagination such as a list of categories
		// or more

		$showtopsubpag=isset($b_options['showtopsubpages'])?
		$b_options['showtopsubpages']:false;
		$showbottomsubpag=isset($b_options['showbottomsubpages'])?
		$b_options['showsubbottompages']:false;
		
		if(isset($portdata['rvpagination'])&&isset($b_options['subpaginationdata'])
			&&$b_options['subpaginationdata']==true && $showtopsubpag==true){
			include('portfoliosubpaginationsection.php');

		}
		// end subpagination content section
?>
<?php
		// generate blog post contents
		if(isset($portdata['numrows'])&&$portdata['numrows']>0){
			// any other alterations to the blog post content outputted is made available
			// by using the multidimensional array $b_options, basic indexes for this 
			// array are as follows:
			// 'type' : tells the nature of the output to be produced, the major 'type'
			// values are : "maintrailer", "maincontent", "mainsidebar", "mainfooter".
			// variations can be made for individual themes to suit any purposed output
			// e.g maincontent2 or mainsidebarmini, e.t.c can represent other kinds of
			// output content
			// the blogposts results are available in the 'resultdataset' 
			$maxrows=$portdata['numrows'];

			// check if a limit has been placed on the number of results to be produced
			// via the b_options array
			if(isset($b_options['outlimit'])&&$b_options['outlimit']!==""){
				$maxrows=$b_options['outlimit'];
			}	
			for($i=0;$i<$maxrows;$i++){
				// current blog data
				if(isset($portdata['resultdataset'][$i])){
					$cportdata=$portdata['resultdataset'][$i];
					// $i==0?var_dump($cportdata):$city="donothing";
					// clear the coverdata variable to ensure no duplicate content
					// is entring
					if(isset($coverdata)){
						unset($coverdata);
					}
					$coverdata=$cportdata['coverimagedata'];
					
					// check to see if the post actuallyhas an image, if not use your 
					// default placeholder image or nothing, whatever works
					// the  propicdata 

					$extra='';//for carrying extra markup data for cover related content
					// for holding the name for the default jpg images associated with 
					// each blogentrytype when no coverphoto is specified
					$fname="blognormal";

					if($cportdata['blogentrytype']=="gallery"){
						$fname="bloggallery";
					}
					if($cportdata['blogentrytype']=="banner"){
						$fname="bloggallery";
						$extra='<div class="blog-video-cover">
				                    <a href="'.$cportdata['pagelink'].'" class="video-play 
				                      	color-white color-whitehover 
				                      	bg-darkindigo-gradient bg-lightred-gradienthover">
				                      	<i class="fa fa-file-image-o"></i>
				                    </a>
			                    </div>';
					}
					if($cportdata['blogentrytype']=="video"){
						$fname="blogvideo";
						$extra='<div class="blog-video-cover">
				                    <a href="'.$cportdata['pagelink'].'" class="video-play 
				                      	color-white color-whitehover 
				                      	bg-darkindigo-gradient bg-lightred-gradienthover">
				                      	<i class="fa fa-play"></i>
				                    </a>
			                    </div>';
					}
					if($cportdata['blogentrytype']=="audio"){
						$fname="blogaudio";
						$extra='<div class="blog-video-cover">
				                    <a href="'.$cportdata['pagelink'].'" class="video-play 
				                      	color-white color-whitehover 
				                      	bg-darkindigo-gradient bg-lightred-gradienthover">
				                      	<i class="fa fa-volume-up"></i>
				                    </a>
			                    </div>';
					}

					if($coverdata['location']!==""){
						// place your covercontent image details 
						$covercontent='
							<div class="blog-image">
								<picture>
									<source media="(max-width: 767px)" 
								  	srcset="'.$coverdata['medsize'].'">
								  	<source media="(max-width: 320px)" 
								  	srcset="'.$coverdata['thumbnail'].'">
								  	<img src="'.$coverdata['location'].'" 
								  	alt="'.$cportdata['projecttitle'].'">
								</picture>
								'.$extra.'
							</div>
						';

						$coverimgurl=$coverdata['location'];
						$coverimgmedsizeurl=$coverdata['medsize'];
						$coverimgthumbnailurl=$coverdata['thumbnail'];
					}else{
						$coverimgurl='
						'.$host_addr.'images/dbrimages/defaults/'.$fname.'.jpg';
						$coverimgmedsizeurl=
						''.$host_addr.'images/dbrimages/defaults/'.$fname.'.jpg';
						$coverimgthumbnailurl=
						''.$host_addr.'images/dbrimages/defaults/'.$fname.'.jpg';
						$covercontent='
							<div class="blog-image">
								<img 
								src="'.$host_addr.'images/dbrimages/defaults/'.$fname.'.jpg" 
								  	alt="'.$cportdata['projecttitle'].'"/>
								'.$extra.'
							</div>

						';
					}
					
					$contenticon='fa-file-text-o';


					if($cportdata['gallerydata']['total']>0){
						$covercontent="";
						$covercontent.='
							<div class="blog-gallery blog-carousel-slider">
						';
						// place your covercontent image details 
						$gallerydata=$cportdata['gallerydata'];
						for($t=0;$t<4;$t++){
							$cimgdata=$gallerydata[$t];
							if($cimgdata['location']!==""){

								$caption=$cimgdata['caption']!==""?'<h2 
								class="gallery-title">'.$cimgdata['caption'].'</h2>
									':"";
								$details=$cimgdata['details']!==""?'<div 
								class="gallery-details">'.$cimgdata['details'].'</div>
									':"";
								$covercontent.='
									<div class="blog-gallery-item">
										<picture>
										  	<source media="(max-width: 767px)" 
										  	srcset="'.$cimgdata['medsize'].'">
										  	<source media="(max-width: 240px)" 
										  	srcset="'.$cimgdata['thumbnail'].'">
										  	<img src="'.$cimgdata['location'].'" 
										  	alt="'.$cportdata['projecttitle'].'">
										</picture>
										<div class="blog-gallery-details">
											'.$caption.'
											'.$details.'
										</div>
									</div>
								';
							}
						}
						$covercontent.='</div>';
						$contenticon='fa-file-image-o';
					}
					


					if($cportdata['viddata']['total']>0){
						$viddata=$cportdata['viddata'];
						// this array carries the following indexes
						// 'videowebm','videoflv','videomp4','video3gp',
						// 'videoembed'(embed code for a video), 'caption'
						// but for multiple displays you would concern yourself
						// with the coverphoto only 

						$contenticon='fa-television';
					}

					
					
					if($cportdata['audiodata']['total']>0){
						$audiodata=$cportdata['audiodata'];
						// this array carries the following indexes
						// 'videowebm','videoflv','videomp4','video3gp',
						// 'videoembed'(embed code for a video), 'caption'
						// but for multiple displays you would concern yourself
						// with the coverphoto only 
						
						$contenticon='fa-volume-up';
					}
					
				
					if($cportdata['bannerdata']['total']>0){
						$bannerdata=$cportdata['bannerdata'];
						// this array carries the following indexes
						 
						
						$contenticon='fa-file-image-o';
					}
					

					// handle comment count data
					/*if($cportdata['commenttype']=="normal"){
						$comment_count=$cportdata['viewercommentcount'];
					}else{
						$comment_count=$cportdata['comment_count'];
					}*/
			
?>
				<?php
					if($b_options['type']=="maintrailercontent"){
						// for displaying usually text only data can be used in 
						// a small slider/marquee
				?>
						
				<?php
					}
				?>

				<?php
					if($b_options['type']=="maincontent"){
						// this section is for producing content in a multiview format
						// usually used in displaying the main blog posts to site
						// visitors on the 'blog' page
					
						
				?>
						<!--  -->

						
				<?php
					}
				?>
				<?php
					if($b_options['type']=="maincontent2"){
						// this is for multiple related posts on the main blog post
						// view
				?>
					<div class="related-post-item">
						<div class="related-post-container _blog" 
						style="background-image: url('<?php echo $coverimgmedsizeurl;?>');"
						data-thumb="<?php echo $coverimgthumbnailurl;?>"
						data-med="<?php echo $coverimgmedsizeurl;?>">
							<div class="related-post-overlay"></div>
							<div class="related-post">
								<div class="related-post-content">
									<h4>
										<a href="<?php echo $cportdata['pagelink'];?>">
											<?php echo $cportdata['projecttitle'];?>
										</a><br>
										<small>
											<i class="fa fa-comments"></i> 
											<?php echo $cportdata['viewercommentcount'];?>
										</small>
										<small>
											<i class="fa fa-eye"></i> 
											<?php echo $cportdata['views'];?>
										</small>
									</h4>
									<p><?php echo $cportdata['plaindescription'];?></p>
								</div>
							</div>
						</div>
					</div>
				<?php
					}
				?>

				<?php
					if($b_options['type']=="mainsidebar"){
						// this is for single blog side bar view
				?>
				<?php
					}
				?>
				<?php
					if($b_options['type']=="mainsidebarmini"){
						// this is for multiple list blog sidebar view

				?>
					<li class="post-item">
						<a href="<?php echo $cportdata['pagelink'];?>" class="post-image">

							<img src="<?php echo $coverimgthumbnailurl;?>" 
							alt="<?php echo $cportdata['projecttitle'];?>">
						</a>
						<div class="post-content">
							<h5 class="post-title">
								<a href="<?php echo $cportdata['pagelink'];?>">
									<?php echo $cportdata['projecttitle'];?>
								</a>
							</h5>
							<span class="post-date">
								<?php echo $cportdata['day'];?>,
								<?php echo $cportdata['month2'];?>
								<?php echo $cportdata['year'];?>
							</span>
						</div>
					</li>
				<?php
					}
				?>
				
				<?php
					if($b_options['type']=="mainsidebarmini2"){
						// this is for single list blog sidebar view
						// 

				?>
					<li class="post-item">
						<a href="<?php echo $cportdata['pagelink'];?>" 
							class="post-image mini">
							<picture>
								<source media="(max-width: 320px)" 
							  	srcset="<?php echo $coverimgthumbnailurl;?>">
								<img src="<?php echo $coverimgmedsizeurl;?>" 
								alt="<?php echo $cportdata['projecttitle'];?>">
							</picture>
						</a>
						<div class="post-content mini">
							<h5 class="post-title">
								<a href="<?php echo $cportdata['pagelink'];?>">
									<?php echo $cportdata['projecttitle'];?>
								</a>
							</h5>
							<span class="post-date">
								<?php echo $cportdata['day'];?>,
								<?php echo $cportdata['month2'];?>
								<?php echo $cportdata['year'];?>,
							</span>
							<span class="post-comments">
								Comments: <?php echo $cportdata['viewercommentcount'];?>
							</span>
							<div class="post-mini-details">
								<?php echo $cportdata['plaindescription'];?>
							</div>

						</div>
					</li>

				<?php
					}
				?>


				<?php
					if($b_options['type']=="mainfooter"){
						// this is for producing footer related blog post segments
						// the data presented here is usually minimal
				?>
				<?php
					}
				?>

<?php 				
					// end if
				}
				// end for loop
			} 
		}else{

			$deftag=isset($b_options['defaulttag'])&&$b_options['defaulttag']!==""?
			$b_options['defaulttag']:"div";
			$defclass=isset($b_options['defaultclass'])&&$b_options['defaultclass']!==""?
			$b_options['defaultclass']:"col-md-12 _genericnopost";
			$deftext=isset($b_options['defaulttext'])&&$b_options['defaulttext']!==""?
			$b_options['defaulttext']:"
			<p>No posts to display yet</p>
			";
?>
		<<?php echo $deftag;?> class=" <?php echo $defclass;?>">
			<?php echo $deftext;?>	
		</<?php echo $deftag;?>>
<?php
		}
?>
<?php
		// generate sub content under the pagination output if necessary, useful for 
		// showing more data besides pagination such as a list of categories
		// or more
		
		if(isset($portdata['rvpagination'])&&isset($b_options['subpaginationdata'])
			&&$b_options['subpaginationdata']==true && $showbottomsubpag==true){
			include('portfoliosubpaginationsection.php');

		}
		// end subpagination content section
?>
<?php
		// generate bottom pagination content from the compulsory accompanying 
		// $outs variable
		if(isset($portdata['rvpagination'])&&isset($b_options['pagination'])
			&&$b_options['pagination']==true && $showtoppag==true){
			// the indexes $outs['prev_url'] && $outs['next_url'] are used for
			// carrying the previous and next pointer url values
		
?>
			<?php
				// this brings in the pagination section for the blog 
				include("portfoliopaginationsection.php");
			?>

<?php
		}
?>
<?php
	}else{
		// this means no portdata variable was provided and as such graceful death is
		// necessary, the raiseMainModal() function can be used to throw out the error
		// simple text based outputs should do as well
		// bootstrap is the default system ui css and as such could be taken advantage
		// of too
?>
	<div class="col-md-12">
		<h4>An Error has Occured While Parsing</h4>
		<blockquote><p>No valid data provided</p></blockquote>
	</div>
<?php
	}
?>