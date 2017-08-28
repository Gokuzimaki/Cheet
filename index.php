<?php 
	session_start();
	include('snippets/connection.php');
	$activepage1="active";
	include('snippets/themesnippets/cheetonesnippets/headcontent.php');
?>
	<body>
		<?php 
			include('snippets/themesnippets/cheetonesnippets/toplinks.php');
			echo $mpageslider;
		?>
		<div class="container">
			<!--Our Best Services start-->
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12">
				  <div class="lms_title_center">
				    <div class="lms_heading_1">
				      <h2 class="lms_heading_title">Welcome to Cheet</h2>
				    </div>
				    <p>So glad you could make it, we've been expecting you<br>
				    	Cheet is a multifaceted online platform concerned with aiding 
				    	anyone, anywhere in preparing for important examinations, our
				    	honest hope is that your using our application ensures you're 
				    	prepared to take on your exams confidently, without breaking	
				    	a sweat.
					</p>
					<!-- <p class="text-center icon_display_inline">
						<a href="##" title="Facebook"><span class="lms_social_icon_point facebookicon"></span></a>
						<a href="##" title="Google+"><span class="lms_social_icon_point googleplusicon"></span></a>
						<a href="##" title="Twitter"><span class="lms_social_icon_point twittericon"></span></a>
						<a href="##" title="Pinterest"><span class="lms_social_icon_point pinteresticon"></span></a>
					</p> -->
					<p>Here, we want to help you succeed.</p>
				  </div>
				</div>
			</div>
			<div class="row">
		   	  <div class="col-lg-4 col-md-4 col-sm-4">
		      	<div class="lms_service_3">
		            	<div class="lms_service_icon">
		            		<!-- <img src="images/cheetimagesone/services/services1.png" 
		            		alt="service icon"> -->
		            		<span class="lms_service_icon_span"><i class="fa fa-signal fa-3x"></i></span>
		            	</div>
		                <a href="##">
		                	<h3 class="lms_service_title">Performance Monitoring</h3></a>
		                	<p>Cheet Allows you view your performance history with exams 
		                		you have attempted on the platform, showing you how well 
		                		you are doing at a glance.</p>
		            </div>
		      </div>
		      
		      <div class="col-lg-4 col-md-4 col-sm-4">
		      	<div class="lms_service_3">
		            	<div class="lms_service_icon"><img src="images/cheetimagesone/services/services2.png" alt="service icon"></div>
		                <a href="##"><h3 class="lms_service_title">Talk to Our Expertse</h3></a>
		                <p>Lorem ipsum dolor sit amet, consectetur adDonec idiam dapibus, sodales odio quis, fgilla maurisorci. Nullam vel laoreet dui.</p>
		            </div>
		      </div>
		      
		      <div class="col-lg-4 col-md-4 col-sm-4">
		      	<div class="lms_service_3">
		            	<div class="lms_service_icon"><img src="images/cheetimagesone/services/services3.png" alt="service icon"></div>
		                <a href="##"><h3 class="lms_service_title">Communicate with People</h3></a>
		                <p>Lorem ipsum dolor sit amet, consectetur adDonec idiam dapibus, sodales odio quis, fgilla maurisorci. Nullam vel laoreet dui.</p>
		            </div>
		      </div>
		      <div class="col-md-12 text-center">
					<div class="lms_social8">	
						<!-- <h4>We are social</h4> -->
			        	<ul>
			            	<li class="facebook"><a href="##" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a></li>
			                <li class="twitter"><a href="##" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a></li>
			                <li class="google-plus"><a href="##" data-toggle="tooltip" data-placement="top" title="Google+"><i class="fa fa-google-plus"></i></a></li>
							<li class="youtube"><a href="##" data-toggle="tooltip" data-placement="top" title="Youtube"><i class="fa fa-youtube-play"></i></a></li>
			          	</ul>
					</div>
				</div>
		   </div>
		</div>
		<!--Cheet Intro end--> 

		<!--Cheet Statistics overview--> 
		<div class="container-fluid">
		  <div class="row">	
		    <div class="lms_our_success">
		    	<div class="lms_our_success_bg" data-stellar-background-ratio="0.5">
		        <div class="lms_our_success_bg_overlay">
		        	<div class="container">
		               <!--Our Success in Numbers start-->
		               <div class="row">
		                   <div class="col-lg-12 col-md-12 col-sm-12 text-center">
		                    <div class="lms_our_success_title wow fadeInDown">
		                   	  <h3>Cheet's Stats</h3>
		                      <p>How we're doing so far.</p>
		                    </div>  
		                   </div> 
		               </div>
		               
		               <div class="row">
			               	<div class="col-lg-3 col-md-3 col-sm-3 wow fadeInLeft">
			                	<div class="lms_count">
			                    	<i class="fa fa-user"></i>
			                    	<div class="lms_progress_value count appear-count"  data-from="0" data-to="2848" data-speed="2000" data-refresh-interval="50"></div>
				                   <p class="lms_progess_label"> Users </p>
			                    </div>
			                </div>
			                
			                <div class="col-lg-3 col-md-3 col-sm-3 wow fadeInDown">
			                	<div class="lms_count">
			                    	<i class="fa fa-graduation-cap"></i>
			                    	<div class="lms_progress_value count appear-count"  data-from="0" data-to="1048" data-speed="2000" data-refresh-interval="50"></div>
			                   <p class="lms_progess_label"> Instructors </p>
			                    </div>
			                </div>
			                
			                <div class="col-lg-3 col-md-3 col-sm-3 wow fadeInDown">
			                	<div class="lms_count">
			                    	<i class="fa fa-institution"></i>
			                    	<div class="lms_progress_value count appear-count"  data-from="0" data-to="200" data-speed="2000" data-refresh-interval="50"></div>
			                   <p class="lms_progess_label"> Exams </p>
			                    </div>
			                </div>
			                
			                <div class="col-lg-3 col-md-3 col-sm-3 wow fadeInRight">
			                	<div class="lms_count">
			                    	<i class="fa fa-book"></i>
			                    	<div class="lms_progress_value count appear-count"  data-from="0" data-to="1005" data-speed="2000" data-refresh-interval="50"></div>
			                   		<p class="lms_progess_label"> Tests Taken </p>
			                    </div>
			                </div>
		               </div>
		               
		               <!--Our Success in Numbers end-->
		            </div>
		        </div>
		       </div> 
		    </div>
		  </div>
		</div>
		<!-- Cheet Statistics overview end -->

		
		<!-- Cheet Testimonials content end -->
		<div class="container-fluid">
			<div class="row">
				<div class="lms_testimonial_section">
					<div class="lms_title_center">
						<div class="lms_heading_3">
			            	<h2 class="lms_heading_title">Testimonials</h2>
			            </div>
					</div>
					<div class="col-md-6 border-right lms_testimonial_section_right">
						<div class="lms_testimonials_bg" data-stellar-background-ratio="0.8">
					      <div class="lms_testimonials_bg2">
					        <div class="col-md-12">
					          <div class="lms_testimonials wow bounce">
					            <div id="lms_testimonials_slider" class="owl-carousel owl-theme">
					              <div class="lms_testimonials_slider_item">
					                <p class="lms_testimonial_quote">"</p>
					                <p class="lms_testimonials_txt">Suspendisse posuere consectetur sodales. Etiam faucibus rhoncus nunc et pretium. Praesent tortor massa,
					                  malesuada sed ornare in, dignissim adipiscing felis. Donec eget hendrerit magna,</p>
					                <img src="images/default.gif" alt="Testimonials" />
					                <h4>Olivia Liam</h4>
					              </div>
					              <div class="lms_testimonials_slider_item">
					                <p class="lms_testimonial_quote">"</p>
					                <p class="lms_testimonials_txt">Suspendisse posuere consectetur sodales. Etiam faucibus rhoncus nunc et pretium. Praesent tortor massa,
					                  malesuada sed ornare in, dignissim adipiscing felis. Donec eget hendrerit magna,</p>
					                <img src="images/default.gif" alt="Testimonials" />
					                <h4>Olivia Liam</h4>
					              </div>
					              <div class="lms_testimonials_slider_item">
					                <p class="lms_testimonial_quote">"</p>
					                <p class="lms_testimonials_txt">Suspendisse posuere consectetur sodales. Etiam faucibus rhoncus nunc et pretium. Praesent tortor massa,
					                  malesuada sed ornare in, dignissim adipiscing felis. Donec eget hendrerit magna,</p>
					                <img src="images/default.gif" alt="Testimonials" />
					                <h4>Olivia Liam</h4>
					              </div>
					            </div>
					            <div class="customNavigation"> <a class="lms_prev_next prev"><i class="fa fa-angle-left"></i></a> <a class="lms_prev_next next"><i class="fa fa-angle-right"></i></a> </div>
					          </div>
					        </div>
					      </div>
					    </div>
					</div>
					<div class="col-md-6 lms_testimonial_section_right">
						<h3 class="text-center">Share your CHEET Story</h3>
			            <form action="<?php echo $host_addr;?>snippets/basicsignup.php" method="POST" id="testimonial-form">
			              <input type="hidden" name="displaytype" value="guesttestimonial"/>
			              <input type="hidden" name="entryvariant" value="guesttestimonial"/>
			              <p class="reg_user_data">Okebukola Olagoke</p>
			              
			              <p class="col-md-6">
			                <input type="text" name="fullname" placeholder="Your Fullname" class="form-control"/><br>
			                <input type="email" name="eaddr" placeholder="Your email address" class="form-control"/><br>
			                <input type="hidden" name="sectester" value="<?php echo $mpagesecuritynumber;?>"/>
			                 Security(<?php echo $mpagesecuritynumber;?>);
			                <input type="text" name="secnumber" Placeholder="The above digits here" class="form-control"/>
			              </p>
			              <p class="col-md-6">
			                <textarea rows="5" class="form-control testimonial_field_wide" placeholder="How has CHEET helped you"></textarea>
			              </p>
			              <p class="col-md-12 last text-center">
			                  <input class="btn text-uppercase dstyle" id="submit" type="submit" name="submit" value="TESTIFY"/>
			              </p>
			            </form>
					</div>
				</div>
			</div>
		</div>
		<!-- Cheet testimonials content end -->


		<!-- Call to action one-->
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12 lms_cta_one">
					<div class="lms_cta_text text-center">
						Let's help you be better. If not the best.
					</div>
					<div class="lms_cta_btn text-center">
						<a href="<?php echo $host_addr;?>signupin.php?t=register">Join Now</a>
					</div>
				</div>
			</div>
		</div>
		<!-- Call to action one end-->
		<?php 
			include('./snippets/themesnippets/cheetonesnippets/footer.php');
			include('./snippets/themesnippets/cheetonesnippets/themescripts.php');
		?>
	</body>
</html>