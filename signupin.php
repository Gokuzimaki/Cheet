<?php 
	session_start();
	include('./snippets/connection.php');
	$activepage5="active";
	include('./snippets/headcontentcone.php');
?>
	<body>
		<?php 
			include('./snippets/toplinkscone.php');
			// echo $mpageslider;
		?>
		<div class="container"></div>
		<?php 
			include('./snippets/footercone.php');
			include('./snippets/themescriptsdumpcone.php');
		?>
	</body>
</html>