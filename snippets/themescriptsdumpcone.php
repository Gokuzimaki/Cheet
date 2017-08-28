<?php
	//this section controls the themes available scripts
	//the content here is preset from the headcontentcone.php file in the snippets folder
	if(isset($mpagethemescriptsoutput)&&$mpagethemescriptsoutput!==""){
		echo $mpagethemescriptsoutput;
	}else{
		echo'
			<script type="text/javascript" src="'.$host_addr.'scripts/cheetscriptsone/plugin/appear/jquery.appear.js"></script> 
			<script type="text/javascript" src="'.$host_addr.'scripts/cheetscriptsone/plugin/count/jquery.countTo.js"></script> 
			<script type="text/javascript" src="'.$host_addr.'scripts/cheetscriptsone/plugin/mediaelement/mediaelement-and-player.js"></script> 
			<script type="text/javascript" src="'.$host_addr.'scripts/cheetscriptsone/plugin/mixitup/jquery.mixitup.js"></script> 
			<script type="text/javascript" src="'.$host_addr.'scripts/cheetscriptsone/plugin/modernizr/modernizr.custom.js"></script> 
			<script type="text/javascript" src="'.$host_addr.'scripts/cheetscriptsone/plugin/owl-carousel/owl.carousel.js"></script> 
			<script type="text/javascript" src="'.$host_addr.'scripts/cheetscriptsone/plugin/parallax/jquery.stellar.js"></script> 
			<script type="text/javascript" src="'.$host_addr.'scripts/cheetscriptsone/plugin/prettyphoto/js/jquery.prettyPhoto.js"></script> 
			<script type="text/javascript" src="'.$host_addr.'scripts/cheetscriptsone/plugin/revslider/js/jquery.themepunch.plugins.min.js"></script> 
			<script type="text/javascript" src="'.$host_addr.'scripts/cheetscriptsone/plugin/revslider/js/jquery.themepunch.revolution.js"></script> 
			<script type="text/javascript" src="'.$host_addr.'scripts/cheetscriptsone/plugin/single/single.js"></script> 
			<script type="text/javascript" src="'.$host_addr.'scripts/cheetscriptsone/plugin/wow/wow.js"></script> 
			<script type="text/javascript" src="'.$host_addr.'scripts/cheetscriptsone/grid-gallery.js"></script> 
			<script type="text/javascript" src="'.$host_addr.'scripts/cheetscriptsone/bootstrap.js"></script> 
			<script type="text/javascript" src="'.$host_addr.'scripts/cheetscriptsone/custom.js"></script> 
		';
	}
?>