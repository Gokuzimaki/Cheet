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
	$stylesarray=array();
	// echo '<meta name="break">';
	if(isset($mpagemergedstyles)&&$mpagemergedstyles!==""){
		// check to see if run homonculus session is active
		unset($_SESSION['runhomonculuscss']);
		if(!isset($_SESSION['runhomonculuscss'])){
			$stylesarray[]='bootstrap/css/bootstrap.css';
			$stylesarray[]='stylesheets/lightbox.css';
			// $stylesarray[]='stylesheets/font-awesome/css/font-awesome.min.css';
			$stylesarray[]='stylesheets/themestyles/dbrcss/bootstrap.min.css';
			$stylesarray[]='stylesheets/themestyles/dbrcss/owl.carousel.css';
			$stylesarray[]='stylesheets/themestyles/dbrcss/jquery.bxslider.css';
			$stylesarray[]='stylesheets/themestyles/dbrcss/animate.min.css';
			$stylesarray[]='stylesheets/themestyles/dbrcss/prettyPhoto.css';
			$stylesarray[]='stylesheets/themestyles/dbrcss/style.css';
			$stylesarray[]='stylesheets/themestyles/dbrcss/my-color.css';
			$stylesarray[]='stylesheets/themestyles/dbrcss/responsive.css';

			$totalcontent="";
			// echo dirname(__FILE__); /*__FILE__*/
			// 
			/*if($host_servertype=="windows"){
				$tpath=dirname(__FILE__)."\..\\";
				
			}else{
				$tpath=dirname(__FILE__)."/../";
			}
			*/
	  

			for ($i=0; $i < count($stylesarray); $i++) { 
				# code...
				if($host_servertype=="windows"){
					$cpath=$host_tpath.str_replace("/", "\\", $stylesarray[$i]);
				}else{
					$cpath=$host_tpath.$stylesarray[$i];
				}
					// echo "$cpath <br>";
				if(file_exists($cpath)){
					// echo "$cpath <br>";
					$totalcontent.=file_get_contents($cpath);
				}
			}
			if($totalcontent!==""){
				// minify
				// $sourcePath = $fpath;
				$minifier = new Minify\CSS();
				// $minifier = new CSS();
				// $minifier = new CSS($totalcontent);
				// we can even add another file, they'll then be
				// joined in 1 output file
				// $sourcePath2 = '/path/to/second/source/css/file.css';
				// $minifier->add($sourcePath2);

				// or we can just add plain CSS
				// $css = 'body { color: #000000; }';
				$minifier->add($totalcontent);

				// save minified file to disk
				// $ftpath=str_replace("/tempdir", "", $fpath);
				// $ftpath=str_replace("\\tempdir", "", $ftpath);
				// $minifiedPath = $ftpath;
				$totalcontent=$minifier->minify();

				// or just output the content
				// echo $minifier->minify();
				if($host_servertype=="windows"){
					// $fpath=$host_tpath.'stylesheets\themestyles\dbrcss\tempdir\homonculusfullmergedbr.css';
					$fpath=$host_tpath.'stylesheets\themestyles\dbrcss\homonculusfullmergedbr.css';
				}else{
					// $fpath=$host_tpath.'stylesheets/themestyles/dbrcss/tempdir/homonculusfullmergedbr.css';
					$fpath=$host_tpath.'stylesheets/themestyles/dbrcss/homonculusfullmergedbr.css';
				}
				// file_put_contents($fpath, $totalcontent); 
				$handle2=fopen("$fpath","w")or die('cant open the file');
				fwrite($handle2,$totalcontent)or die('could not write file');
				if(!isset($_SESSION['runhomonculuscss'])){
					// homonculus is currently active
					$_SESSION['runhomonculuscss']="ran";
				}
			}
		
		}

?>

<link async="true" rel="stylesheet" href="<?php echo $host_addr?>icons/font-awesome/css/font-awesome.min.css">
<link async="true" href="<?php echo $host_addr;?>stylesheets/themestyles/dbrcss/homonculusfullmergedbr.css" rel="stylesheet"/>
<?php
}else{
?>
<?php 
	// sectionfor holding 
	if(isset($mpagetitle)){
		echo $mpagestylesextras;
	}
?>
<!-- 	<link rel="stylesheet" href="<?php echo $host_addr?>plugins/wow/css/animate.css"> -->
	<link async="true" rel="stylesheet" href="<?php echo $host_addr?>icons/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo $host_addr?>stylesheets/themestyles/dbrcss/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo $host_addr?>stylesheets/themestyles/dbrcss/owl.carousel.css">
	<link rel="stylesheet" href="<?php echo $host_addr?>stylesheets/themestyles/dbrcss/jquery.bxslider.css">
	<link rel="stylesheet" href="<?php echo $host_addr?>stylesheets/themestyles/dbrcss/animate.min.css">
	<link rel="stylesheet" href="<?php echo $host_addr?>stylesheets/themestyles/dbrcss/prettyPhoto.css">
	<link rel="stylesheet" href="<?php echo $host_addr?>stylesheets/themestyles/dbrcss/style.css">
	<link rel="stylesheet" href="<?php echo $host_addr?>stylesheets/themestyles/dbrcss/my-color.css">
	<link rel="stylesheet" href="<?php echo $host_addr?>stylesheets/themestyles/dbrcss/responsive.css">
<?php 
}
?>