<?php 
	session_start();
	include('./snippets/connection.php');
	$activepage2="active";
	include('./snippets/headcontentcone.php');
    $mpagesecuritynumberoutput=substr($mpagesecuritynumber,0,6);
?>
	<body>
		<?php 
			include('./snippets/toplinkscone.php');
			echo $mpagecrumbpath;

		?>
		<!-- maincontainer start -->
		<div class="container">
			<div class="row">
				<div class="lms_title_center">
				    <div class="lms_heading_1">
				      <h2 class="lms_heading_title">The Cheet Course Library</h2>
				    </div>
				    <p>
				    	Hello, welcome to our course library, peruse, search and choose the course that
				    	suits whatever you want to learn, we have several free and paid courses here,
				    	search, go on and start learning. Also, check out our resources page to get access
				    	to the bookstores amongst other things.

					</p>
				  </div>
				<div class="col-md-12 lms_search_sort_bar">
					<form name="course_search_form" action="" method="GET">
						<div class="col-md-12">
							<div class="form-group">
					          <div class="input-group">
					            <input class="form-control" type="search" name="searchtext" placeholder="Search...">
					            <div class="input-group-addon">
					            	<a href="##" data-type="submit" class="addon_submit_link">
					            		<i class="fa fa-search"></i>
					            	</a>
					            </div>
					          </div>
					        </div>
						</div>
				        <div class="col-md-12 lms_search_ajax_display top_bg_image hidden">
				        	<a href="##Close" class="close_ajax_search"><i class="fa fa-times"></i></a>
				        	<img src="<?php echo $host_addr;?>images/loading.gif" class="loadermini"/>
				        	<div class="col-md-12 lms_search_ajax_content">
				        		<div class="col-sm-2 lms_search_ajax_result_image">
				        			<img src="./images/search_image_small.jpeg"/>
				        		</div>
				        		<div class="col-sm-10 lms_search_ajax_result_content">
				        			<h3><a href="##theresultssolopage">No results found</a></h3>
				        			<div class="contenthold">
				        				<p>
				        					Your search for "<b>Some text</b>", yielded no results.
				        				</p>
				        			</div>
				        		</div>
				        	</div>
				        	<div class="col-md-12 lms_search_ajax_content">
				        		<div class="col-sm-2 lms_search_ajax_result_image">
				        			<img src="./images/default.gif"/>
				        		</div>
				        		<div class="col-sm-10 lms_search_ajax_result_content">
				        			<h3><a href="##theresultssolopage">The search result header</a></h3>
				        			<div class="contenthold">
				        				<p>
				        					some details go here<br>
				        					and some go here
				        				</p>
				        			</div>
				        		</div>
				        	</div>
				        	<div class="col-md-12 lms_search_ajax_content">
				        		<div class="col-sm-2 lms_search_ajax_result_image">
				        			<img src="./images/default.gif"/>
				        		</div>
				        		<div class="col-sm-10 lms_search_ajax_result_content">
				        			<h3>The search result header</h3>
				        			<div class="contenthold">
				        				<p>
				        					some details go here<br>
				        					and some go here
				        				</p>
				        			</div>
				        		</div>
				        	</div>
				        	<div class="col-md-12 lms_search_ajax_content">
				        		<div class="col-sm-2 lms_search_ajax_result_image">
				        			<img src="./images/default.gif"/>
				        		</div>
				        		<div class="col-sm-10 lms_search_ajax_result_content">
				        			<h3>The search result header</h3>
				        			<div class="contenthold">
				        				<p>
				        					some details go here<br>
				        					and some go here
				        				</p>
				        			</div>
				        		</div>
				        	</div>
				        	<div class="col-md-12 lms_search_ajax_content">
				        		<div class="col-sm-2 lms_search_ajax_result_image">
				        			<img src="./images/default.gif"/>
				        		</div>
				        		<div class="col-sm-10 lms_search_ajax_result_content">
				        			<h3>The search result header</h3>
				        			<div class="contenthold">
				        				<p>
				        					some details go here<br>
				        					and some go here
				        				</p>
				        			</div>
				        		</div>
				        	</div>
				        	<div class="col-md-12 lms_search_ajax_content">
				        		<div class="col-sm-2 lms_search_ajax_result_image">
				        			<img src="./images/default.gif"/>
				        		</div>
				        		<div class="col-sm-10 lms_search_ajax_result_content">
				        			<h3>The search result header</h3>
				        			<div class="contenthold">
				        				<p>
				        					some details go here<br>
				        					and some go here
				        				</p>
				        			</div>
				        		</div>
				        	</div>
				        	<div class="col-md-12 lms_search_ajax_content">
				        		<div class="col-sm-2 lms_search_ajax_result_image">
				        			<img src="./images/default.gif"/>
				        		</div>
				        		<div class="col-sm-10 lms_search_ajax_result_content">
				        			<h3>The search result header</h3>
				        			<div class="contenthold">
				        				<p>
				        					some details go here<br>
				        					and some go here
				        				</p>
				        			</div>
				        		</div>
				        	</div>
				        </div>
						<div class="col-md-12">
							<div class="col-md-4">
								<div class="col-sm-6">
									<select name="searchbycategory" class="form-control" data-toggle="tooltip" data-placement="top"
									 title="Select a Category first, the sub-category option will be auto populated for you to choose.">
										<option value="">Category(All)</option>
										<option value="">Discipline</option>
										<option value="">Web Software</option>
										<option value="">Design Software</option>
									</select>
								</div>
								<div class="col-sm-6">
									<select name="searchbysubcategory" class="form-control">
										<option value="">Sub-Category(All)</option>
									</select>
								</div>
							</div>
							<div class="col-md-4">
								<!-- <p class="search_option_header">Price Range</p> -->
								<div class="col-sm-6">
									<div class="form-group">
										<div class="input-group">
					                    	<div class="input-group-addon">
					                    		&#8358;
					                    	</div>
											<input type="number" class="form-control" Placeholder="Low Price" name="minsearchval" min="0" max="500000"/>
					                    </div>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<div class="input-group">
					                    	<div class="input-group-addon">
					                    		&#8358;
					                    	</div>
											<input type="number" class="form-control" Placeholder="High Price" name="maxsearchval" min="0" max="500000"/>
									    </div>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="col-sm-6">
									<div class="form-group">
										<div class="input-group">
					                    	<div class="input-group-addon">
					                    		<i class="fa fa-sort"></i>
					                    	</div>
											<select class="form-control" name="pricesort" data-toggle="tooltip" data-placement="top"
											title="Specify the order you want your results to show up according to their prices">
												<option value="">Sort</option>
												<option value="decreasing">Highest to Lowest Price </option>
												<option value="increasing">Lowest to Highest Price</option>
											</select>
									    </div>
									</div>
								</div>
								<div class="col-sm-6">
									<select class="form-control" data-toggle="tooltip" data-placement="top" name="courserating"
									title="Order your search output according to the rating">
										<option value="">Rating</option>
										<option value="1">1 Star </option>
										<option value="2">2 Stars</option>
										<option value="3">3 Stars</option>
										<option value="4">4 Stars</option>
										<option value="5">5 Stars</option>
									</select>
								</div>
							</div>
						</div>
						<input type="hidden" name="entryvariant" value="coursesearch"/>
						<input type="hidden" name="displaytype" value="coursesearch"/>
				    </form>
				</div>
			</div>
			<div class="row lms_library_content">
				<!-- Library section start -->
			    <div class="col-lg-9 col-md-8 col-sm-7">
			    	<!-- pagination start -->
			    	<div class="lms_pagination_1">
		                <a href="##" class="pagination_pointer"><i class="fa fa-arrow-left"></i> Prev</a>
		            	<ul>
		                	<li class="active"><a href="##">1</a></li>
		                    <li><a href="##">2</a></li>
		                    <li><a href="##">3</a></li>
		                    <li><a href="##">4</a></li>
		                    <li><a href="##">5</a></li>
		                    <li><a href="##" class="disabled">...</a></li>
		                    <li><a href="##">200</a></li>
		                    <li><a href="##">All</a></li>
		                </ul>
		                <a href="##" class="pagination_pointer">Next <i class="fa fa-arrow-right"></i></a>
		                <div class="sub_options_hold">
		                	<select name="entriesperpage" class="form-control" data-toggle="tooltip"
		                	 data-placement="top" title="Choose the results amount per page">
		                		<option value="">Entries per page</option>
		                		<option value="">15</option>
		                		<option value="">25</option>
		                		<option value="">40</option>
		                		<option value="">60</option>
		                	</select>
		                </div>
		            </div>
			    	<!-- pagination end -->
			    	<div class="col-md-12 pagination_content_hold">
			    		<?php
			    			$lim=15;
			    			$outcarttest="";
			    			$stars[]="one_stars";
			    			$stars[]="two_stars";
			    			$stars[]="three_stars";
			    			$stars[]="four_stars";
			    			$stars[]="all_stars";
			    			$outdefbgimage[]=$host_addr.'images/cheetdefaultbg.png';
			    			$outdefbgimage[]=$host_addr.'images/cheetdefaultbg_2.png';
			    			$outdefbgimage[]=$host_addr.'images/cheetdefaultbg_3.png';
			    			$moncount=1;
			    			for($i=1;$i<=$lim;$i++){
			    				$randone=rand(0,count($outdefbgimage)-1);
			    				$randdispl=rand(0,1);
			    				$randdispl2=rand(0,1);
			    				$randdispl3=rand(0,4);
			    				$usercount=rand(0,2700000);
			    				$usercount=numberSizeConvert($usercount);
			    				$starout=$stars[$randdispl3];
			    				$courseadminposter='
				    				<div class="course_head_poster">
				    					<a href="##theadminprofile">
				    						<img src="'.$host_addr.'images/cheetminilogo.png"/>
				    					</a>
				    				</div>
								';
								$courserealposter='
									<div class="course_real_poster">
				    					<a href="##theinstructorprofile">
				    						<img src="'.$host_addr.'images/default.gif"/>
				    					</a>
				    				</div>
								';
								if($randdispl==0&&$randdispl2==0){
									$courseadminposter="";
								}else{
									if($randdispl!==1){
										$courseadminposter="";
									}
									if($randdispl2!==1){
										$courserealposter="";
									}
								}
			    				if($i==1){
			    					$outcarttest.='<!--<p class="pull-left">'.$moncount.'</p>--><div class="col-md-12 content_line_hold">';
			    					$moncount++;
			    				}

			    				$outcarttest.='<div class="col-md-4">
									    			<div class="lms_course_content_display">
										    			<div class="content_header">
										    				<img src="'.$outdefbgimage[$randone].'" class="course_img"/>
										    				<div class="course_sub_category">Urban and regional planning</div>
										    				'.$courseadminposter.'
										    				'.$courserealposter.'
										    				<div class="course_img_overlay top_bg_image"></div>
										    			</div>
										    			<div class="content_middle">
										    				<h4>Introduction to computer science</h4>
										    				<div class="course_details">
										    					Lorem ipsum dolor sit amet, consectetur scing elit. Vivamus egestas augue ac nisi pharetra sagittis. Pellentesque fringilla li at risus asan commodo. Integer suscipit eros sed erotibulum ornare nec ac tor.
										    				</div>
										    				<div class="col-sm-12">
										    					<div class="col-sm-6 text-center course_price">
										    						&#8358; 1,500
										    					</div>
										    					<div class="col-sm-6 text-center course_limit">
										    						Limit:
										    						&#8734;
										    					</div>
										    					<div class="rating">
										    						<ul class="'.$starout.'">
										    							<li><i class="fa fa-star"></i></li>
										    							<li><i class="fa fa-star"></i></li>
										    							<li><i class="fa fa-star"></i></li>
										    							<li><i class="fa fa-star"></i></li>
										    							<li><i class="fa fa-star"></i></li>
										    						</ul>
										    						<p>From Users: '.$usercount.'</p>
										    					</div>
										    				</div>
										    			</div>
										    			<div class="col_sm-12 content_footer">
										    				<div class="col-sm-6 add_to_cart">
										    					<a href="##addtocart" data-type="addtocart" data-prodid="'.$i.'">Cart This <i class="fa fa-shopping-cart"></i></a>
										    					<div class="cart_content_status_out_hold">
										    						<div class="loader_item hidden"><img src="'.$host_addr.'images/loading.gif"></div>
										    						<div class="loader_status">
										    							<i class="fa fa-check hidden"></i>
										    							<i class="fa fa-times hidden"></i>
										    						</div>
										    					</div>
										    				</div>
										    				<div class="col-sm-6 more_info">
										    					<a href="##">More Info <i class="fa fa-search-plus"></i></a>
										    				</div>
										    			</div>
										    		</div>
									    	   </div>';
			    				if($i%3==0){
			    					$outcarttest.='
				    					</div>
				    					<!--<p class="pull-left">'.$moncount.'</p>-->
				    					<div class="col-md-12 content_line_hold">
				    				';
			    					$moncount++;
			    				}
			    				
			    				if($i==$lim){
			    					$outcarttest.='</div> <!--<p class="pull-left">-->'.$moncount.'</p>';
			    				}
			    			}
			    			echo $outcarttest;
			    		?>
			    		
				    	
			    	</div>
			    	<!-- pagination start -->
			    	<div class="lms_pagination_1">
		                <a href="##" class="pagination_pointer"><i class="fa fa-arrow-left"></i> Prev</a>
		            	<ul>
		                	<li class="active"><a href="##">1</a></li>
		                    <li><a href="##">2</a></li>
		                    <li><a href="##">3</a></li>
		                    <li><a href="##">4</a></li>
		                    <li><a href="##">5</a></li>
		                    <li><a href="##" class="disabled">...</a></li>
		                    <li><a href="##">200</a></li>
		                    <li><a href="##">All</a></li>
		                </ul>
		                <a href="##" class="pagination_pointer">Next <i class="fa fa-arrow-right"></i></a>
		            </div>
			    	<!-- pagination end -->
			    </div>
				<!-- Library section end -->
				<!--sidebar start-->
			    <div class="col-lg-3 col-md-4 col-sm-5">
			      	<div class="lms_sidebar_item">
			       		<h3>Help</h3>
			       		<p>Couldn't find a course or having trouble? Drop us a line.</p>
				        <form action="<?php echo $host_addr;?>snippets/basicsignup.php" method="POST" id="course-help-form">
			              <input type="hidden" name="displaytype" value="coursehelp"/>
			              <input type="hidden" name="entryvariant" value="coursehelp"/>
			              <p class="col-md-12">
			                <input type="text" name="fullname" placeholder="Your Fullname" class="form-control"/>
			              </p>
			              <p class="col-md-12">
			                <input type="email" name="eaddr" placeholder="Your email address" class="form-control"/>
			              </p>
			              <p class="col-md-12">
			                <input type="hidden" name="sectester" value="<?php echo $mpagesecuritynumberoutput;?>"/>
			                 Security(<?php echo $mpagesecuritynumberoutput;?>);
			                <input type="text" name="secnumber" Placeholder="The above digits here" class="form-control"/>
			              </p>
			              <p class="col-md-12">
			                <textarea rows="5" class="form-control" placeholder="How can we help you?"></textarea>
			              </p>
			              <p class="last">
			                  <input class="btn text-uppercase dstyle block_full_width_btn" id="submit" type="submit" name="submitcoursehelp" value="Submit"/>
			              </p>
			            </form>
			      	</div>
			      	<div class="lms_sidebar_item">
				        <h3>Courses Category</h3>
				        <div class="lms_sidebar_category">
				          <ul>
				            <li><a><i class="fa fa-angle-right"></i> Character Animation</a>
				              <ul>
				                <li><a href="##"><i class="fa fa-angle-right"></i> Character Animation</a></li>
				                <li><a href="##"><i class="fa fa-angle-right"></i> Game Design</a></li>
				              </ul>
				            </li>
				            <li><a href="##"><i class="fa fa-angle-right"></i> Game Design</a></li>
				            <li><a href="##"><i class="fa fa-angle-right"></i> Materials</a></li>
				            <li><a href="##"><i class="fa fa-angle-right"></i> Modeling</a></li>
				            <li><a href="##"><i class="fa fa-angle-right"></i> Particles</a></li>
				            <li><a href="##"><i class="fa fa-angle-right"></i> Product Design</a></li>
				            <li><a href="##"><i class="fa fa-angle-right"></i> Visual Effects</a></li>
				            <li><a href="##"><i class="fa fa-angle-right"></i> View all</a></li>
				          </ul>
				        </div>
			      	</div>
			    </div>
			    <!--sidebar end--> 
			</div>
		</div>
		<!-- maincontainer end -->
		<?php 
			include('./snippets/footercone.php');
			include('./snippets/themescriptsdumpcone.php');
		?>
	</body>
</html>