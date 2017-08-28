<!-- Scripts -->
<?php 
	// minification library inclusion
	require_once $host_tpath . 'snippets/minifier/minify/src/Minify.php';
	require_once $host_tpath . 'snippets/minifier/minify/src/CSS.php';
	require_once $host_tpath . 'snippets/minifier/minify/src/JS.php';
	require_once $host_tpath . 'snippets/minifier/minify/src/Exception.php';
	require_once $host_tpath . 'snippets/minifier/minify/src/Exceptions/BasicException.php';
	require_once $host_tpath . 'snippets/minifier/minify/src/Exceptions/FileImportException.php';
	require_once $host_tpath . 'snippets/minifier/minify/src/Exceptions/IOException.php';
	require_once $host_tpath . 'snippets/minifier/path-converter/src/ConverterInterface.php';
	require_once $host_tpath . 'snippets/minifier/path-converter/src/Converter.php';
	use MatthiasMullie\Minify;

	$scriptspatharrout=array();
	
	$scriptarray=array();
	if(isset($mpagestyleload)&&$mpagestyleload=="bottom"){
		echo $mpagelibstyleextras;
		include('./snippets/themesnippets/dbrsnippets/themestylesdumpdbr.php');
	}
	// load the styles for the page at the bottom if the mpageload
	if(isset($mpagemergedscripts)&&$mpagemergedscripts!==""){
		// permanently reset the runhomonculusjs script, useful for recreating the
		// homonculus,js files in the event new script changes have occured
		// unset($_SESSION['runhomonculusjs']);
		// check to see if run homonculus session is active
		if(!isset($_SESSION['runhomonculusjs'])){
			$mpagescriptarray[]='scripts/lib/jquery.js';
			$mpagescriptarray[]='bootstrap/js/bootstrap.min.js';
			$mpagescriptarray[]='scripts/lightbox.js';
			$mpagescriptarray[]='scripts/jquery.lazyload.min.js';
			$mpagescriptarray[]='plugins/wow/js/wow.js';
			$mpagescriptarray[]='scripts/themescripts/dbrscripts/hoverIntent.js';
			// $mpagescriptarray[]='plugins/rs-plugin/js/jquery.themepunch.tools.min.js';
			// $mpagescriptarray[]='plugins/rs-plugin/js/jquery.themepunch.revolution.min.js';
			$mpagescriptarray[]='scripts/themescripts/dbrscripts/superfish.js';
			$mpagescriptarray[]='scripts/themescripts/dbrscripts/plugins-scroll.js';
			$mpagescriptarray[]='scripts/themescripts/dbrscripts/owl.carousel.min.js';
			$mpagescriptarray[]='scripts/themescripts/dbrscripts/jquery.bxslider.min.js';
			$mpagescriptarray[]='scripts/themescripts/dbrscripts/imagesloaded.pkgd.min.js';
			$mpagescriptarray[]='scripts/themescripts/dbrscripts/isotope.pkgd.min.js';
			$mpagescriptarray[]='scripts/themescripts/dbrscripts/jquery.prettyPhoto.js';
			$mpagescriptarray[]='scripts/themescripts/dbrscripts/jquery.countTo.js';
			$mpagescriptarray[]='scripts/formchecker.js';
			$mpagescriptarray[]='scripts/mylib.js';
			$mpagescriptarray[]='scripts/themescripts/dbrscripts/main.js';


			$totalcontent="";
			// echo dirname(__FILE__); /*__FILE__*/
			// 
			if($host_servertype=="windows"){
				$tpath=dirname(__FILE__)."\..\\";
				
			}else{
				$tpath=dirname(__FILE__)."/../";
			}
			
	  

			for ($i=0; $i < count($mpagescriptarray); $i++) { 
				# code...
				if($host_servertype=="windows"){
					$cpath=$host_tpath.str_replace("/", "\\", $mpagescriptarray[$i]);
				}else{
					$cpath=$host_tpath.$mpagescriptarray[$i];
				}
					// echo "$cpath <br>";
				if(file_exists($cpath)){
					// echo "$cpath <br>";
					$totalcontent.=file_get_contents($cpath);
				}
			}
			if($totalcontent!==""){
				// $minifier = new Minify\JS();

				// $minifier->add($totalcontent);

				// $totalcontent=$minifier->minify();


				if($host_servertype=="windows"){
					$fpath=$host_tpath.'scripts\themescripts\dbrscripts\homonculusfullmergedbr.js';
				}else{
					$fpath=$host_tpath.'scripts/themescripts/dbrscripts/homonculusfullmergedbr.js';

				}
				// file_put_contents($fpath, $totalcontent); 
				$handle2=fopen("$fpath","w")or die('cant open the file');
				fwrite($handle2,$totalcontent)or die('could not write file');
				if(!isset($_SESSION['runhomonculusjs'])){
					// homonculus is currently active
					$_SESSION['runhomonculusjs']="ran";
				}
			}
		}
?>
	
	<script src="<?php echo $host_addr;?>scripts/themescripts/dbrscripts/homonculusfullmergedbr.js"></script>
	<?php 	
		echo $mpagelibscriptextras;
		echo $mpagemaps;
		echo $mpagescriptextras;
	?>
<?php
	include(''.$host_tpath.'snippets/facebooksdksingle.php');
}else{
	// section for holding  extrascript libraries
	
?>
	<?php 	
	if(isset($mpage_lsb)&&$mpage_lsb=="true"){
		// load scripts bottom 
	?>
		<script src="<?php echo $host_addr;?>scripts/jquery.js"></script>
		<script src="<?php echo $host_addr;?>bootstrap/js/bootstrap.js"></script>
		<script src="<?php echo $host_addr;?>scripts/lightbox.js"></script>
		<script src="<?php echo $host_addr;?>scripts/formchecker.js"></script>
		<script src="<?php echo $host_addr;?>plugins/wow/js/wow.js"></script>
		<script src="<?php echo $host_addr;?>scripts/lib/jquery.lazyload.min.js"></script>
		<script src="<?php echo $host_addr;?>scripts/mylib.js"></script>
		<?php 
			if(isset($mpagetitle)){
				echo $mpagelibscriptextras;
				echo $mpagemaps;
				echo $mpagescriptextras;
			}
		?>
	<?php 	
	}
		
	?>
	<script src="<?php echo $host_addr;?>scripts/themescripts/dbrscripts/hoverIntent.js"></script>
	<script src="<?php echo $host_addr;?>scripts/themescripts/dbrscripts/superfish.js"></script>
	<script src="<?php echo $host_addr;?>scripts/themescripts/dbrscripts/plugins-scroll.js"></script>
	<script src="<?php echo $host_addr;?>scripts/themescripts/dbrscripts/owl.carousel.min.js"></script>
	<script src="<?php echo $host_addr;?>scripts/themescripts/dbrscripts/jquery.bxslider.min.js"></script>
	<script src="<?php echo $host_addr;?>scripts/themescripts/dbrscripts/imagesloaded.pkgd.min.js"></script>
	<script src="<?php echo $host_addr;?>scripts/themescripts/dbrscripts/isotope.pkgd.min.js"></script>
	<script src="<?php echo $host_addr;?>scripts/themescripts/dbrscripts/jquery.prettyPhoto.js"></script>
	<script src="<?php echo $host_addr;?>scripts/themescripts/dbrscripts/jquery.countTo.js"></script>

	<script src="<?php echo $host_addr;?>scripts/themescripts/dbrscripts/main.js"></script>
<?php
		if(isset($mpagetitle)){
			echo $mpagelibscriptextras;
			echo $mpagemaps;
			echo $mpagescriptextras;
		}
}
?>