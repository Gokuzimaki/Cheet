<?php 
			session_start();
			include('../../snippets/connection.php');
			$pageid=10;
			
			// for running certain test scenarios
			$test=isset($_GET["test"])?$_GET["test"]:"";
			$test=$test==""&&isset($_POST["test"])?$_POST["test"]:"";

			// this variable is an accompanying set of JSON parameters 
			$dt=isset($_GET["dt"])?$_GET["dt"]:"";
			$dt=$dt==""&&isset($_POST["dt"])?$_POST["dt"]:"";

			// get the blogdata
			$blogdata=getSingleBlogEntry("$pageid");
			$newview=$blogdata["views"]+1;

			include($host_tpathplain."modules/blogpagecreate.php");
		?>