<?php 
	session_start();
	include('snippets/connection.php');
	$activepage1="active";
	include('snippets/themesnippets/cheetonesnippets/headcontent.php');
?>
	<body>
		<?php 
			include('snippets/themesnippets/cheetonesnippets/toplinks.php');
			// echo $mpageslider;
		?>
		<div class="container"></div>
		<?php 

			include('./snippets/themesnippets/cheetonesnippets/footer.php');

			include('./snippets/themesnippets/cheetonesnippets/themescripts.php');

		
		?>
	</body>
</html>