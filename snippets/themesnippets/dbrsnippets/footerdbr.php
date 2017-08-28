<?php
	if(isset($mpagelegacyfullbackground)){
		// echo $mpagelegacyfullbackground;
	}
	$mpagefooteroutput="";
	if(isset($mpagefooterstylemarker)){
		if($mpagefooterstylemarker==0){
			$mpagefooteroutput=$mpagefootermorelinks;
		}else if($mpagefooterstylemarker==1){
			$mpagefooteroutput=$mpagefooterlatestposts;
		}
	}
    // holds an iframe leading to the download page
    if(isset($mpagedownloadframe)){

    }
    // test to see if we are currently on the contact page
    $hidereachus="";
    if(isset($activepage7)&&$activepage7=="active"){
    	$hidereachus="hidden";
    }
?>
<footer class="">
	<div class="up-footer">
		<div class="row">
			<?php
			    // bring in the footer widget for the current theme
			    include("modules/footerparser.php");
			?>
		</div>				
		<div class="footer-label <?php echo $hidereachus;?>">
			<div class="footer-button"><a target="_blank" href="<?php echo $host_addr;?>contact.php">Reach Us</a></div>
			<div class="underline"></div>
		</div>
	</div>
	<div class="footer-line">
		<div class="container">
			<div class="row">
				<div class="col-md-9">
					<?php 
						if(isset($defaultfootertrailer)&&$defaultfootertrailer!==""){
							echo "<p>".$defaultfootertrailer."</p>";
						}else{
					?>
							<p>&copy; Copyright <?php echo date('Y');?> Dream Bench Technology. All Rights Reserved</p>
					<?php
						}
					?>
				</div>
				<div class="col-md-3">
					<ul class="footer-social">
						<li class=""><a href="<?php echo $defaultfacebook;?>" target="_blank"><i class="fa fa-facebook-square"></i></a></li>
						<li class=""><a href="<?php echo $defaulttwitter;?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
						<li class=""><a href="<?php echo $defaultlinkedin;?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
						<li class=""><a href="<?php echo $defaultinstagram;?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
						<li class=""><a href="<?php echo $defaultgoogleplus;?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>			
	<div class="go-top"><a href="#">Back to Top <i class="fa fa-chevron-up"></i></a></div>
</footer>

