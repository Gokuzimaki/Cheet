<?php
	// this file will be called on blog section views and the following variables 
	// are compulsory to its function and without it the function should not function
	if(isset($blogdata)){
		// the blog data set has full data entry content for blog posts
		// valid return content can be found in the 'return_data' index

?>
<?php
		// generate pagination content from the compulsory accompanying $outs variable
		if(isset($blogdata['rvpagination'])&&isset($b_options['pagination'])
			&&$b_options['pagination']=="true"){
			// the indexes $outs['prev_url'] && $outs['next_url'] are used for
			// carrying the previous and next pointer url values
			
?>

<?php
		}
?>

<?php
		// generate blog post contents
		if(isset($blogdata['numrows'])&&$blogdata['numrows']>0){
			// any other alterations to the blog post content outputted is made available
			// by using the multidimensional array $b_options, basic indexes for this 
			// array are as follows:
			// 'type' : tells the nature of the output to be produced, the major 'type'
			// values are : "maintrailercontent", "maincontent", "mainsidebar", 
			// "mainfooter".
			// variations can be made for individual themes to suit any purposed output
			// e.g maincontent2 or mainsidebarmini, e.t.c can represent other kinds of
			// output content
			// the blogposts results are available in the 'resultdataset' 
			for($i=0;$i<$blogdata['numrows']);$i++{
				// current blog data
				$cblogdata=$blogdata['resultdataset'][$i];			
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
					if($b_options['type']=="mainfooter"){
						// this is for producing footer related blog post segments
						// the data presented here is usually minimal
				?>
				<?php
					}
				?>

<?php
			}
		}else{

?>
		<div class="col-md-12">
			<p>No posts yet</p>
		</div>
<?php
		}
?>

<?php
		// generate bottom pagination content from the compulsory accompanying 
		// $outs variable
		if(isset($blogdata['rvpagination'])&&isset($b_options['pagination'])
			&&$b_options['pagination']=="true"){
			// the indexes $outs['prev_url'] && $outs['next_url'] are used for
			// carrying the previous and next pointer url values
		
?>
<?php
		}
?>
<?php
	}else{
		// this means no blogdata variable was provided and as such graceful death is
		// necessary, the raiseMainModal() function can be used to throw out the error
		// simple text based outputs should do as well
		// bootstrap is the default system ui css and as such could be taken advantage
		// of too
?>
	<div class="col-md-12">
		<h4>An Error has Occured while Parsing</h4>
		<blockquote><p>No valid data provided</p></blockquote>
	</div>
<?php
	}
?>