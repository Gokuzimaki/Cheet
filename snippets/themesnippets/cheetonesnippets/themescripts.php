<?php
	//this section controls the themes available scripts
	//the content here is preset from the headcontentcone.php file in the snippets folder
	if(isset($mpagethemescriptsoutput)&&$mpagethemescriptsoutput!==""){
		echo $mpagethemescriptsoutput;
	}else{
		echo'
			<script type="text/javascript" src="'.$host_addr.'scripts/themescripts/cheetonescripts/plugin/appear/jquery.appear.js"></script> 
			<script type="text/javascript" src="'.$host_addr.'scripts/themescripts/cheetonescripts/plugin/count/jquery.countTo.js"></script> 
			<script type="text/javascript" src="'.$host_addr.'scripts/themescripts/cheetonescripts/plugin/mediaelement/mediaelement-and-player.js"></script> 
			<script type="text/javascript" src="'.$host_addr.'scripts/themescripts/cheetonescripts/plugin/mixitup/jquery.mixitup.js"></script> 
			<script type="text/javascript" src="'.$host_addr.'scripts/themescripts/cheetonescripts/plugin/modernizr/modernizr.custom.js"></script> 
			<script type="text/javascript" src="'.$host_addr.'scripts/themescripts/cheetonescripts/plugin/owl-carousel/owl.carousel.js"></script> 
			<script type="text/javascript" src="'.$host_addr.'scripts/themescripts/cheetonescripts/plugin/parallax/jquery.stellar.js"></script> 
			<script type="text/javascript" src="'.$host_addr.'scripts/themescripts/cheetonescripts/plugin/prettyphoto/js/jquery.prettyPhoto.js"></script> 
			<script type="text/javascript" src="'.$host_addr.'scripts/themescripts/cheetonescripts/plugin/revslider/js/jquery.themepunch.plugins.min.js"></script> 
			<script type="text/javascript" src="'.$host_addr.'scripts/themescripts/cheetonescripts/plugin/revslider/js/jquery.themepunch.revolution.js"></script> 
			<script type="text/javascript" src="'.$host_addr.'scripts/themescripts/cheetonescripts/plugin/single/single.js"></script> 
			<script type="text/javascript" src="'.$host_addr.'scripts/themescripts/cheetonescripts/plugin/wow/wow.js"></script> 
			<script type="text/javascript" src="'.$host_addr.'scripts/themescripts/cheetonescripts/grid-gallery.js"></script> 
			<script type="text/javascript" src="'.$host_addr.'scripts/themescripts/cheetonescripts/bootstrap.js"></script> 
			<script type="text/javascript" src="'.$host_addr.'scripts/themescripts/cheetonescripts/custom.js"></script> 
		';
	}
?>