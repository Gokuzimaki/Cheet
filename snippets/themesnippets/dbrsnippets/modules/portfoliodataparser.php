<?php
	// portfoliodataparser.php
	// This snippet is concerned with parsing data from the blogpost table into useable
	// component formats for rendering in markup on the single blog post page
	// for the current theme in the event the default provided is unsatisfactoryt
	// the variable $curportdata is made available where this file is included for
	//  it to work properly

	$coverdata= $curportdata['profpicdata'];
	
	// check to see if the post actually has an image, if not use your 
	// default placeholder image or nothing, whatever works
	// the  propicdata 

	$extra='';//for carrying extra markup data for cover related content


	$contenticon='fa-file-text-o';

	if($coverdata['location']!==""){
		// place your covercontent image details 
		$covercontent='
				<picture>
					<source media="(max-width: 767px)" 
				  	srcset="'.$coverdata['medsize'].'">
				  	<source media="(max-width: 320px)" 
				  	srcset="'.$coverdata['thumbnail'].'">
				  	<img src="'.$coverdata['location'].'" 
				  	alt="'.$curportdata['projecttitle'].'">
				</picture>	
		';
		$coverimgurl=$coverdata['location'];
		$coverimgmedsizeurl=$coverdata['medsize'];
		$coverimgthumbnailurl=$coverdata['thumbnail'];
	}else{
		$fname="blognormal";
		$coverimgurl=''.$host_addr.'images/'.$host_rendername.'images/defaults/'.$fname.'.jpg';
		$coverimgmedsizeurl=
		''.$host_addr.'images/dbrimages/defaults/'.$fname.'.jpg';
		$coverimgthumbnailurl=
		''.$host_addr.'images/dbrimages/defaults/'.$fname.'.jpg';
		$covercontent='
			<div class="blog-image">
				<img 
				src="'.$host_addr.'images/dbrimages/defaults/'.$fname.'.jpg" 
				  	alt="'.$curportdata['projecttitle'].'"/>
				'.$extra.'
			</div>

		';
	}
	
	if($curportdata['blogentrytype']=="gallery"){

		if($curportdata['gallerydata']['total']>0){
			$covercontent="";
			$covercontent.='
				<div class="owl-slider-container top-banner">
					<div class="owl-slider">
			';
			// place your covercontent image details 
			$gallerydata=$curportdata['gallerydata'];
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
						<div class="slider-image">
							<picture>
							  	<source media="(max-width: 767px)" 
							  	srcset="'.$cimgdata['medsize'].'">
							  	<source media="(max-width: 240px)" 
							  	srcset="'.$cimgdata['thumbnail'].'">
							  	<img src="'.$cimgdata['location'].'" 
							  	alt="'.$curportdata['projecttitle'].'">
							</picture>
							<div class="blog-gallery-details">
								'.$caption.'
								'.$details.'
							</div>
						</div>
					';
				}
			}
			$covercontent.='</div></div>';
		}
		$contenticon='fa-file-image-o';
	}
	if($curportdata['blogentrytype']=="video"){
		if($curportdata['viddata']['total']>0){
			$viddata=$curportdata['viddata'];
			// this array carries the following indexes
			// 'videowebm','videoflv','videomp4','video3gp',
			// 'videoembed'(embed code for a video), 'caption'
			// but for multiple displays you would concern yourself
			// with the coverphoto only 

		}

		$contenticon='fa-television';
	}
	if($curportdata['blogentrytype']=="audio"){
		if($curportdata['audiodata']['total']>0){
			$audiodata=$curportdata['audiodata'];
			// this array carries the following indexes
			// 'location','audiocaption','audioembed','disptype',
			
			
		}
		$contenticon='fa-volume-up';
	}
	if($curportdata['blogentrytype']=="banner"){
		if($curportdata['bannerdata']['total']>0){
			$bannerdata=$curportdata['bannerdata'];
			// this array carries the following indexes
			 
			
		}
		$contenticon='fa-file-image-o';
	}
	
	include($host_tpath."modules/portfoliocommentparser.php");
?>