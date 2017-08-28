<?php
	$mablogout=getAllBlogEntries("viewer","",1,"blogtype");
	$fsablogout=getAllBlogEntries("viewer","",3,"blogtype");
	$oyoblogout=getAllBlogEntries("viewer","",4,"blogtype");
?>
<footer>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
				<div class="footer-item">
					<h4>Muyiwa Afolabi</h4>
					<img class="proflogo" src="<?php echo $host_addr;?>images/fjcmacoversmall.jpg" alt="Muyiwa Afolabi, Frontiers Job-Connect">
					<p>
						Muyiwa Afolabi is the Group CEO of Frontiers International Services Limited; a human capital development and social reformation outfit.
						He is a strategic thinker with world-class experience in value chain process management.<br>
						<a href="http://muyiwaafolabi.com/profile.php" target="_blank">Read More</a>
					</p>
					<img id="footer-logo" src="<?php echo $host_addr;?>images/frontierslogoalbumart.jpg" alt="Frontiers Consulting" />

					<div id="footer-social">
						<a class="icon-twitter-bird sociallink" href="http://www.twitter.com/franklyafolabi"></a>

						<a class="icon-linkedin-rect sociallink" href="http://www.linkedin.com/profile/view?id=37212987"></a>

						<a class="icon-facebook-rect sociallink" href="http://www.facebook.com/franklyspeakingwithmuyiwaafolabi"></a>
					</div>
				</div>
			</div>

			<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
				<div class="footer-item">
					<h4>Tweets</h4>

					<div class="tweet">
						<!-- <article>
							<p>Check out this great #themeforest item 'FR – Elegant One Page Fashion PSD Template' http://themeforest.net/item/fr-elegant-one-page-fashion-psd-template/5339674</p>

							<span><i class="icon-twitter-bird"></i> about 1 week ago</span>
						</article>

						<article>
							<p>Check out new work on my @Behance portfolio: "American University"</p>

							<span><i class="icon-twitter-bird"></i> about 1 week ago</span>
						</article> -->
						<a class="twitter-timeline"  href="https://twitter.com/franklyafolabi" data-widget-id="645258476789309440">Tweets by @franklyafolabi</a>
            			<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
					</div>
				</div>
			</div>

			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<div class="footer-item">
					<h4>Recent Posts</h4>
					<div class="col-md-12">
						<ul class="widget col-md-6">
							<li class="posttypeheading">Muyiwa's Blog</li>
							<?php 
								echo $mablogout['recentpostspecificfc'];
							?>
						</ul>
						<ul class="widget col-md-6">
							<li class="posttypeheading">Own Your Own</li>
							<?php 
								echo $oyoblogout['recentpostspecificfc'];
							?>
						</ul>
					</div>
					<div class="col-md-12">
						<ul class="widget col-md-6">
							<li class="posttypeheading">Frankly Speaking Africa</li>
							<?php 
								echo $fsablogout['recentpostspecificfc'];
							?>
							<!-- <li>Extra excellent perfomance UI/UX and flat design style</li>
							<li>Extra excellent perfomance UI/UX and flat design style</li> -->
						</ul>
					</div>
				</div>
			</div>

			<!-- <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
				<div class="footer-item">
					<h4>Get In Touch</h4>

					<form class="style2 clearfix" action="../../idealui_default.html">
						<input type="text" placeholder="Name *">

						<input type="text" placeholder="Your Email *">

						<textarea placeholder="Your Message"></textarea>

						<input class="fl-r" type="submit" value="Send" />
					</form>

					<p>
						Rockefeller Center, 45 Rockefeller Plaza, New York, NY, USA
						<br />
						P:
					</p>
				</div>
			</div> -->
		</div>
	</div>
</footer>

<section id="copy">
	<div class="container">
		<div class="fl-r">
			<a href="<?php echo $host_addr;?>franklyspeakingafrica.php" name="franklyspeakingafrica" title="A social reformation project enacted to transform the mindset and thinking of Africans towards value creation, patriotism and discipline, click here and be a part of this">Frankly Speaking Africa</a>				
			<a href="<?php echo $host_addr;?>csioutreach.php" name="csi" title="Click to learn more about this social reformation project">CSI Outreach</a>
			<a href="<?php echo $host_addr;?>onlinestore.php" name="onlinestore" title="" >Online Store</a>
		</div>

		<p>
			<?php 
				echo'&copy; <a href="http://muyiwaafolabi.com/">Muyiwa Afolabi</a> ';
				echo date('Y');
				echo'. Developed by Okebukola Olagoke, Dream Bench Technologies.';
			?>
		</p>
	</div>
</section>