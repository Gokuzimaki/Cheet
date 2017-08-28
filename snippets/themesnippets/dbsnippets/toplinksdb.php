<?php
		!isset($activemainlink)?$activemainlink="":$activemainlink=$activemainlink;
		!isset($activemainlink2)?$activemainlink2="":$activemainlink2=$activemainlink2;
		!isset($activemainlink3)?$activemainlink3="":$activemainlink3=$activemainlink3;
		!isset($activemainlink4)?$activemainlink4="":$activemainlink4=$activemainlink4;
		!isset($activemainlink5)?$activemainlink5="":$activemainlink5=$activemainlink5;
		!isset($activemainlink6)?$activemainlink6="":$activemainlink6=$activemainlink6;
		!isset($activemainlink7)?$activemainlink7="":$activemainlink7=$activemainlink7;
		!isset($activemainlink8)?$activemainlink8="":$activemainlink8=$activemainlink8;
		!isset($activepage1)?$activepage1="":$activepage1=$activepage1;
		!isset($activepage2)?$activepage2="":$activepage2=$activepage2;
		!isset($activepage3)?$activepage3="":$activepage3=$activepage3;
		!isset($activepage4)?$activepage4="":$activepage4=$activepage4;
		!isset($activepage5)?$activepage5="":$activepage5=$activepage5;
		!isset($activepage6)?$activepage6="":$activepage6=$activepage6;
		!isset($activepage7)?$activepage7="":$activepage7=$activepage7;
		!isset($activepage8)?$activepage8="":$activepage8=$activepage8;
?>
				
<section id="header-container">
	<header id="header">
		<div class="container">
			<a href="index.html" id="logo"><img src="<?php echo $host_addr;?>images/sitelogodefault.jpg"/></a>

			<a id="menu-tog" href="javascript:void(0);"><span class="base-bg-color"></span></a>

			<nav id="navigation" class="fl-r" role="navigation">
				<ul>
					<li class="<?php echo $activepage1;?>">
						<a href="<?php echo $host_addr;?>index.php" name="home" title="Welcome to Dream Bench Technologies">Home</a>						
					</li>
					<li class="<?php echo $activepage2;?>">
						<a href="<?php echo $host_addr;?>blog.php" name="blog" title="Our Blog has some of the latest tech based news that are relevant, check them out">Blog</a>
					</li>
					<li class="<?php echo $activepage3;?>">
						<a href="<?php echo $host_addr;?>portfolio.php" name="portfolio" title="Our portfolio. See where we started and how far we've come">Portfolio</a>
					</li>
					<li class="<?php echo $activepage3;?>">
						<a href="<?php echo $host_addr;?>productsandservices.php" name="whatwedo" title="Learn more on our services and products">What we DO</a>
					</li>
					<li class="<?php echo $activepage4;?>">
		          		<a href="<?php echo $host_addr;?>profile.php" name="profile" title="Our team Profiles" class="">The Team</a>
					</li>
					<li class="<?php echo $activepage5;?>">
						<a href="<?php echo $host_addr;?>about.php" name="about" title="About Dream Bench">About</a>
					</li>
					
				</ul>
			</nav>
		</div>
	</header>
</section>