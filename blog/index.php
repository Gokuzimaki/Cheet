<?php 
session_start();
include('../snippets/connection.php');
if(isset($_GET['p'])&&is_numeric($_GET['p'])){
	$pageid=$_GET['p'];
	$c="";
	if(isset($_GET['c'])&&$_GET['c']){
		$c="?c=true";
		// $ccs=true;
	}
	$data['single']['viewer']='viewer';
	$outs=getSingleBlogEntry($pageid,"",$data);
	$location=$outs['pagelink'];
	$relpath=substr($outs['rellink'],1);
	if(isset($_GET['trender'])&&$_GET['trender']=="true"){
		include($host_tpath.''.$relpath.'');
	}else{
		header('location:'.$location.''.$c.'');
	}

}else{
	header('location:../index.php');
}
// echo $outpage['outputpageone'];
?>