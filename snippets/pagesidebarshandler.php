<?php
	// get testimonials data
    $mpagetestimonialsdata=getAllClientRecommendations("viewer",'testimonial',"LIMIT 0,20");
    // create testimonial for sidebar
    $testdataout='<li class="side-bar-null">No testimonials available yet</li>';
    $testdataoutmain=$testdataout;
    if($mpagetestimonialsdata['numrows']>0){
    	$testdataout="";
    	$testdataoutmain="";
    	// var_dump($mpagetestimonialsdata['resultdataset']);
    	for ($i=0; $i <$mpagetestimonialsdata['numrows'] ; $i++) { 
    		# code...
    		$curdataset=$mpagetestimonialsdata['resultdataset'][$i];
    		$testdataout.='
    			<li>
	                <div class="testimonial-mini-hold">
	                	<div class="testimonial-mini">
	                		<div class="testimony">
	                			<blockquote>
	                				<q>
	                                <i class="fa fa-quote-left"></i>
	                    			'.$curdataset['content'].'
	                			</blockquote>
	                		</div>
	                		<div class="testimoner">
	                			<div class="user-detail">
	                                <a href="'.$curdataset['personalsite'].'" class="user">
	                    				<img src="'.$curdataset['coverphotothumb'].'"/>
	                                </a>
	                                <strong class="name">'.$curdataset['fullname'].'</strong>
	                                <a href="'.$curdataset['companysite'].'" class="web">'.$curdataset['companyname'].'</a>
	                            </div>
	                		</div>
	                	</div>
	                </div>
	        	</li>
    		';
    		$testdataoutmain.='
    			<li>
                	<div class="testimonial-slide-item-holder">
                		<div class="col-sm-8 testimonial-slide">
                			<div class="testimonial-text">
                				<div class="testimony">
	                    			'.$curdataset['content'].'
                					
                				</div>
                			</div>
                		</div>
                		<div class="col-sm-4 testimonial-slide-user-img">
                			<img src="'.$curdataset['coverphotothumb'].'"/>
                			<p class="name">'.$curdataset['fullname'].'</p>
                			<h3><a href="'.$curdataset['companysite'].'" class="url">'.$curdataset['companyname'].'</a></h3>
                		</div>
                	</div>
            	</li>
    		';
    	}
    }
    /*end testimonial data*/

    // get events data
    $mpagelatestevents="";
    $eventoutdata='<p class="side-bar-null">No events available</p>';
    if(function_exists('getSingleEventEntry')){
	    $mpagelatestevents=getSingleEventEntry(0,"lastupcoming");
	    if($mpagelatestevents['numrows']>0){
	    	$eventoutdata=$mpagelatestevents['vieweroutputminisb'];
	    }
    }
    // end events data
	$mpagedefaultsidebar='
		
	';
?>