<?php
	// this file contains sidebar content for the pages using this theme
	// absolute urls must be used as required for handling assets
	// here widgets are defined and knitted together to form sidebar contents 
	// for varying purposes.
	// usually, most of the b_options variable settings array could be defined 
	// before including this file
		
	// or the options can be set based on the preset sidebartype variable
	
	// clear all previous options
	unset($b_options);
	// $b_options=NULL;
	$footertype=!isset($footertype)||(isset($footertype)&&$footertype=="")?"default"
	:$footertype;

	$blogtypeid=!isset($blogtypeid)||(isset($blogtypeid)&&$blogtypeid=="")?1
	:$blogtypeid;
	// use this section to init the b_options array variables for each 
	// widget type to be used
	if($footertype=="default"){
		// $b_options['querydebug']=true;

		$b_options['pagination']=false;

		// adjust the blog most commented post data output
		// $b_options['bmcptype']="mainsidebarmini2";
		
		// handle the number of comment posts to be displayed
		// $b_options['bmcplimit']=1;

		// handle the number of latest posts to be displayed
		$b_options['blplimit']=3;
		$widget_options['theme_blpwidget']=true;
	}

	// bring in the system default widget set
	include($host_tpathplain.'modules/defaultwidgets.php');
		// echo "$b_options[blplimit] blp limit";

	// widget titles the defaultwidgets bring in
	// theme_blpwidget: for blog latest posts
	// theme_bppwidget: for blog popular posts(mostviewed)
	// theme_bmcpwidget: for blog most commented posts
	// theme_bfpwidget: for blog featured posts


	//  begin widget definitions as per theme
	// include sorted widget definitions file

	include('widgets.php');
	
	if($footertype=="default"){
?>
	<div class="col-md-4 footer-widget">
		<h4 class="underlined">More <strong>About</strong> Us</h4>
		<div>
			<?php 
				if(isset($defaultshorttext)&&$defaultshorttext!==""){
					// var_dump($defaultshorttext);
					echo $defaultshorttext;
				}else{
			?>
					Dream Bench Tech is a startup concerned with providing web 
					and mobile based application solutions to companies or 
					individuals amidst a myriad of other tech based services.
			<?php
				}
			?>
		</div>
		
	</div>
	<div class="col-md-4 footer-widget">
		<?php 
			if(isset($theme_lbpfwidget)){
				echo $theme_lbpfwidget;
			}else{
		?>
			<h4 class="underlined">Latest <strong>Posts</strong></h4>
			<ul class="latest-posts">
				<li class="post-item">
					<a href="#" class="post-image"><img src="<?php echo $host_addr;?>images/dbrimages/post-thumb-01.jpg" alt="image"></a>
					<div class="post-content">
						<h5 class="post-title"><a href="#">Looking into world for you but who cares?</a></h5>
						<span class="post-date">May 21, 2015</span>
					</div>
				</li>
				<li class="post-item">
					<a href="#" class="post-image"><img src="<?php echo $host_addr;?>images/dbrimages/post-thumb-02.jpg" alt="image"></a>
					<div class="post-content">
						<h5 class="post-title"><a href="#">Dog in the real world is like a friend in your home</a></h5>
						<span class="post-date">May 20, 2015</span>
					</div>
				</li>
				<li class="post-item">
					<a href="#" class="post-image"><img src="<?php echo $host_addr;?>images/dbrimages/post-thumb-03.jpg" alt="image"></a>
					<div class="post-content">
						<h5 class="post-title"><a href="#">Ageh to ye rooz nabashi, nafasam bala nemiad, chon ke in delam be joz to...</a></h5>
						<span class="post-date">May 20, 2015</span>
					</div>
				</li>
			</ul>
		<?php
			}
		?>
	</div>
	<div class="col-md-4 footer-widget">
		<h4 class="underlined">Like Us on <strong>Facebook</strong></h4>
		<div class="tagcloud">
			<div class="fb-like-box" data-href="https://www.facebook.com/DreamBenchTech/" data-width="320" data-height="400" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="true"></div>
				<?php
                if((isset($mpagemergedscripts)&&$mpagemergedscripts=="")||
                	!isset($mpagemergedscripts)){
                	include($host_tpathplain.'facebooksdksingle.php');

                }
            ?>

		</div>	
	</div>
<?php
	}
?>