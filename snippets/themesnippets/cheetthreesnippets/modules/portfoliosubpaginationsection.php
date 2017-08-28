<?php
	// portfolliosubpaginationsection.php
	// this snippet contains content that defines the output data for a section
	// display in portfolio views usually underneath or directly above the top
	// and/or bottom pagination for that view hence the name 'subpagination'  
	// as usual the $b_options array is used in determining or setting the kind of 
	// output required.

	if($b_options['subpaginationtype']=="default"){
?>
	<div class="col-md-12">
		<div class="portfolio-filter">
			<span class="bg-lightorange-gradient 
			bg-orange-gradientafter huespin"><i class="fa fa-filter"></i></span>
			<!-- <a href="##" class="active" data-filter="*">Show All</a>
			<a href="##" data-filter=".portraits">Web Sites</a>
			<a href="##" data-filter=".landscapes">Mobile Apps</a>
			<a href="##" data-filter=".nature">UI Library</a> -->
<?php
		// get the categories of portfolio entries
		$data['queryorder']=" ORDER BY catname";
		$portcatdata=getAllPortfolioCategories("viewer","all","");
		$curportcatactive="active";
		if($portcatdata['numrows']>0){
			for($pci=0;$pci<$portcatdata['numrows'];$pci++){
				$curpcdata=$portcatdata['resultdataset'][$pci];
				$catnameout=strtolower(str_replace(" ", "_", $curpcdata['catname']));
?>	
			<a href="##<?php echo $curpcdata['catname'];?>" 
				data-filter=".<?php echo $catnameout;?>">
				<?php echo $curpcdata['catname'];?>
			</a>
							
<?php
			}
		
		}
			// end subpagination content section
?>	
		</div>
	</div>
<?php
		
			}
			// end subpagination content section
?>