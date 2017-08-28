<?php
	!isset($activepage1)?$activepage1="":$activepage1=$activepage1;
	!isset($activepage2)?$activepage2="":$activepage2=$activepage2;
	!isset($activepage3)?$activepage3="":$activepage3=$activepage3;
	!isset($activepage4)?$activepage4="":$activepage4=$activepage4;
	!isset($activepage5)?$activepage5="":$activepage5=$activepage5;
	!isset($activepage6)?$activepage6="":$activepage6=$activepage6;
	!isset($activepage7)?$activepage7="":$activepage7=$activepage7;
	!isset($activepage8)?$activepage8="":$activepage8=$activepage8;
?>
				
<!-- Header Starts Here -->
<header class="clearfix">
	<div class="navbar navbar-default navbar-white" role="navigation">
		<div class="top-line">
			<div class="container-fluid">
				<p class="top-bar-address">
					<i class="fa fa-map-marker"></i> <?php echo $defaultmainaddress;?>
				</p>
				<ul class="top-bar-menu">
					<li><a href="tel:+2349051143917"><i class="fa fa-phone"></i> +2349051143917</a></li>
					<li><a href="<?php echo $host_addr;?>contact.php">Contact Us</a></li>
				</ul>
			</div>
		</div>			
		<div class="container-fluid">
			<div class="navbar-header">
				<!-- Responsive Menu Trigger -->
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-menu" aria-expanded="false" aria-controls="main-menu">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<!-- End Responsive Menu Trigger -->
				<a class="navbar-brand" href="<?php echo $host_addr;?>">
					<div class="sk-box">
						<div class="logo-container">
							<img class="logo" src="<?php echo $host_addr;?>images/logo_text_light.png" alt="logo">
						</div>
					</div>
				</a>
			</div>
			
			<!-- Main Menu Starts -->
			<nav id="main-menu" class="navbar-collapse collapse sf-menu">
				<ul class="nav navbar-nav navbar-right">
					<li class="menu-item">
						<a class="<?php echo $activepage1;?>" href="<?php echo $host_addr;?>">Home</a>
					</li>
					<li class="menu-item ">
						<a class="<?php echo $activepage6;?>" href="<?php echo $host_addr;?>about.php">About DreamBench</a>								
					</li>
					<li class="menu-item ">
						<a class="<?php echo $activepage4;?>" href="<?php echo $host_addr;?>services.php">What We Do</a>
					</li>
					<li class="menu-item ">
						<a class="<?php echo $activepage5;?>" href="<?php echo $host_addr;?>team.php">The Team</a>								
					</li>
					<li class="menu-item ">
						<a class="<?php echo $activepage2;?>" href="<?php echo $host_addr;?>blog.php">Blog</a>
					</li>
					<li class="menu-item ">
						<a class="<?php echo $activepage3;?>" href="<?php echo $host_addr;?>portfolio.php">Portfolio</a>
					</li>
					<li class="menu-item ">
						<a class="<?php echo $activepage7;?>" href="<?php echo $host_addr;?>contact.php">Contact Us</a>								
					</li>
				</ul>
			</nav><!-- End Menu -->
		</div>
	</div>
</header>
<!-- End Header -->
<?php echo $mpagecrumbpath;?>