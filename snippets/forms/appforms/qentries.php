<?php
	/**
	*	qentries.php. 
	*	this file holds the views for creating/editting question entries for 
	*	question groups.
	*	its has both the create and edit sections 
	*
	*	
	*/
	
	
	// first, we make sure key variables are made available to us
	if(isset($displaytype)||isset($_gdunitdisplaytype)){
		// unset($_SESSION['generalpagesdata']);
		// check to ensure the type of
		$_vcrt=strpos($viewtype, "_crt");

		$inimaxupload=ini_get('post_max_size');

		!isset($data)?$data=array():$data;	
		$localdatamap="";	
		$viewertype="admin";
		// manage the datamap to be passed into called function
		if(isset($datamap)&&isset($contentgroupdatageneral['datamap'])){

			$data['single']['datamap']=$contentgroupdatageneral['datamap'];
			$localdatamap=$data['single']['datamap'];
		}

		// seperate data set for displaying only the editsection of blog category entries
		// when particular requests are made with the following viewtypes
		
		// this section handles the display of search data
		if($viewtype=="qentryplain_crt"){
			$viewdata="qentryplain";
			$extra="";
			$data['pcoutput']="adminoutput";
			$data['subpcoutput']="adminoutputtwo";

			// check for entryvariant data to be used in determining    
			// the generically outputted data
			if(isset($gd_dataoutput['variant'])&&
				$gd_dataoutput['variant']!==""){
				$cvariant=$gd_dataoutput['variant'];

				if($cvariant=="somevariantvalue"){

					// $data['pcoutput']="adminoutput2";
					// $data['subpcoutput']="adminoutputtwo2";
				}		
			}


			
			// title
			$titlesq="";
			if(isset($gd_dataoutput['title'])&&
				$gd_dataoutput['title']!==""){
				$qcat=$extra==""?"":" AND";
				$title=$gd_dataoutput['title'];
				$extra.="$qcat title LIKE '%$title%'";
			}

			

			// entryrangestart
			// entryrangeend
			if((isset($gd_dataoutput['entryrangestart'])&&
				$gd_dataoutput['entryrangestart']!=="")||
				(isset($gd_dataoutput['entryrangeend'])&&
				$gd_dataoutput['entryrangeend']!=="")){
				$qcat=$extra==""?"":" AND";
				// $col handles column name values in the event a search is being done 
				// on a scheduled item.
				/*$col=isset($gd_dataoutput['viewextra'])&&
				$gd_dataoutput['viewextra']=="blogscheduled_crt"?"postperiod":"date";
				*/
				$col="entrydate";
				$startdate="";
				$enddate="";
				if($gd_dataoutput['entryrangestart']!==""){
					$startdate=$gd_dataoutput['entryrangestart'];
				}
				if($gd_dataoutput['entryrangeend']!==""){
					$enddate=$gd_dataoutput['entryrangeend'];
				}

				if($enddate!==""&&$startdate!==""){
					// perform date comparison and reassignment
					$datetime1 = new DateTime("$startdate"); 
					$datetime2 = new DateTime("$enddate"); 
					if($datetime1<$datetime2){
						$ers="$qcat $col>='$startdate'";
						$ere="AND $col<='$enddate'";
					}else{
						$ers="$qcat $col<='$startdate'";
						$ere="AND $col>='$enddate'";
					}
				}else{
					$ers=$startdate!==""?"$qcat $col>='$startdate'":"";
					$ere=$enddate!==""?"$qcat $col<='$enddate'":"";
				}
				$extra.="$ers $ere";
			}

			
			// date. This refers to the question year
			if((isset($gd_dataoutput['date'])){
				$qcat=$extra==""?"":" AND";
				// $col handles column name values in the event a search is being done 
				// on a date related item.
				/*$col=isset($gd_dataoutput['viewextra'])&&
				$gd_dataoutput['viewextra']=="blogscheduled_crt"?"postperiod":"date";
				*/
				$col="entrydate";
				$startdate="";
				$enddate="";
				$ers="";


				if($gd_dataoutput['date']!==""){
					$date=$gd_dataoutput['date'];
					$ers="$qcat $col>='$date'";
				}

				
				$extra.="$ers $ere";
			}

			// qgroup question group
			$qgroup="";
			if(isset($gd_dataoutput['qgroup'])&&
				$gd_dataoutput['qgroup']!==""){
				$qcat=$extra==""?"":" AND";
				$qgroup=$gd_dataoutput['qgroup'];
				$extra.="$qcat qgid='$qgroup'";
			}

			// status
			$statussq="";
			if(isset($gd_dataoutput['status'])&&
				$gd_dataoutput['status']!==""){
				$qcat=$extra==""?"":" AND";
				$status=$gd_dataoutput['status'];
				$extra.="$qcat status='$status'";
			}

			// coursetitle
			$coursetitlesq="";
			if(isset($gd_dataoutput['coursetitle'])&&
				$gd_dataoutput['coursetitle']!==""){
				$qcat=$extra==""?"":" AND";
				$coursetitle=$gd_dataoutput['coursetitle'];
				$extra.="$qcat scid='$coursetitle'";

			}


			// qdobj question data obj
			if(isset($gd_dataoutput['qdobj'])&&
				$gd_dataoutput['qdobj']!==""){
				$qcat=$extra==""?"":" AND";
				$qdobj=$gd_dataoutput['qdobj'];
				$extra.="$qcat totalobj LIKE '%$qdobj%'";
			}

			// qdtheory question data theory
			if(isset($gd_dataoutput['qdtheory'])&&
				$gd_dataoutput['qdtheory']!==""){
				$qcat=$extra==""?"":" AND";
				$qdtheory=$gd_dataoutput['qdtheory'];
				$extra.="$qcat totaltheory LIKE '%$qdtheory%'";
			}

			

			if(isset($gd_dataoutput['viewextra'])){
				$ve=$gd_dataoutput['viewextra'];
				$qcat=$extra==""?"":" AND";
				if($ve=="inactiveqentries_crt"){
					$extra.="$qcat status='inactive'";

				}
			}
			/*if((isset($ve)&&$ve!=="blogscheduled_crt")||!isset($ve)){
				$qcat=$extra==""?"":" AND";
				$extra.=" $qcat (scheduledpost='no' OR scheduledpost='')";	
			}*/
			
			$_vcrt=-1;
			$data['queryextra']=$extra;
			// echo $extra;
			$data["single"]["type"]="blockdeeprun";
			$outsdata=getAllQuestionGroups("$viewertype",'','blockdeeprun',$data);
			$newh="hidden";
			$editin="in";
			$fhtitle="";
			// echo $viewertype." ViewerType";
			// var_dump($outsdata);
			echo json_encode(array("success"=>"true","qt"=>$outsdata['cqtdata'],
				"msg"=>"Transaction Successful",
				"dump"=>"",
				"catdata"=>$outsdata['genericout']));
		}else{
			// $viewdata="viewblogposts";

		}


		if($viewtype=="create"||(($_vcrt===true||$_vcrt>0||$_vcrt==1)&&$_vcrt!==-1)){
			// create data content array
			$ctype=$_gdunit_viewtype;
			
			

			$data['queryorder']="ORDER by id DESC";
			// set the form type for the edit section
			$data['single']['formtruetype']="edit_".$formtruetype;

			// check if there are currently entries first and prepare the 
			// edit table section

			$title="Question Group";
			
						// var_dump($data);
			// variables to be used in manipulating the current view on the form
			$edithide="";
			$newhide="";
			// initialise content variables for the form below 
			$newin="in";
			$editin="";	

			$viewdata="qentriesplain";

			$qgsetdata=array();
			$qgsetdata["single"]["type"]="blockdeeprun";
			$qgsetdata['viewerdata']="WHERE status='active'";
			$qgsetdata['queryextra']=" EXISTS(SELECT * FROM qscentries WHERE 
				qgid=`qgroup`.`id` AND `qscentries`.`status`='active') OR 
				(type='sub' AND status='active')";
			$qgset=getAllQuestionGroups($viewertype,'all','blockdeeprun',$qgsetdata);
			$yout=produceOptionDates(1960,'current','Choose Year');
			// tinymce reinit tools foe question entries
			$mcetools='<input type="hidden" name="toolbar1"
							data-type="tinymce"
						value="undo redo | bold italic underline | styleselect charmap bullist numlist outdent indent | image code">
						<input type="hidden" name="toolbar2"
							data-type="tinymce"
						value=" ">
						<input type="hidden" name="width"
							data-type="tinymce"
						value="100%">
						<input type="hidden" name="height"
							data-type="tinymce"
						value="250px">';

			$yearopts=produceOptionDates(1990,'current',"Choose Year","reversedyear");

			if($viewtype=="newqentries_crt"){
				// $viewdata="blogschedule";
				$newh="";
				$edithide="hidden";
				$newin="in";
				$editin=""; 
				$outsdata['numrows']=0;
			}else if($viewtype=="editqentries_crt"){
				// $viewdata="blogschedule";
				$data["single"]["type"]="blockdeeprun";
				// $data['queryextra']=" (scheduledpost='no' OR scheduledpost='')";
				$outsdata=getAllQuestionEntries("$viewertype",'','blockdeeprun',$data);
				$newhide="hidden";
				$newin="";
				$edithide="";
				$editin="in";
			}else{
				$data["single"]["type"]="blockdeeprun";
				$data['queryextra']=" ";
				$outsdata=getAllQuestionEntries('admin','','',$data);
	
			}


			if($outsdata['numrows']>0){
				// entries are available
				// $editin="in";
				// $newin="";
				
			}
			

?>
<div class="box">
	<div class="box-body">
	    <div class="box-group" id="generaldataaccordion">
			<div class="panel box overflowhidden box-primary <?php echo $newhide;?>">
			    <div class="box-header with-border">
			        <h4 class="box-title">
			          <a data-toggle="collapse" data-parent="#generaldataaccordion" href="#NewPageManagerBlock">
			            <i class="fa fa-sliders"></i> Create <?php echo $title;?>
			          </a>
			        </h4>
			    </div>
			    <div id="NewPageManagerBlock" class="panel-collapse collapse <?php echo $newin;?>">
			        <div class="row">
			            <form name="<?php echo $formtruetype;?>" method="POST" 
			            	data-type="create" data-fdgen="true" 
			            	onSubmit="return false" 
			            	enctype="multipart/form-data" 
			            	action="<?php echo $host_addr;?>snippets/basicsignup.php">
							<input type="hidden" name="entryvariant" value="<?php echo $variant;?>"/>
							
                            <!-- Question Group -->
							<div class="col-md-4">
                            	<div class="form-group">
									<label>Choose Question Group</label>
									<div class="input-group select2-bootstrap-prepend">
										<div class="input-group-addon">
											<i class="fa fa-file-text-o"></i>
										</div>
										<select name="qgroupset" 
										data-name="select2plain"
										class="form-control">
											<?php echo $qgset['selectiondata'];?>
										</select>
									
									</div>
                            	</div>
							</div>
							<!-- Course/Subject -->
							<div class="col-md-4">
                            	<div class="form-group">
									<label>Choose Course/Subject</label>
									<div class="input-group select2-bootstrap-prepend
									select2-bootstrap-append">
										<div class="input-group-addon">
											<i class="fa fa-file-text-o"></i>
										</div>
										<select name="course" 
										data-name="select2plain"
										class="form-control">
											<option value=""
											>--Choose A Question Group First--</option>
										</select>
										<div class="input-group-addon rel">
	                                        <i class="fa fa-database"></i>
	                                        <img src="<?php echo $host_addr;?>images/loading.gif" class=" loadermask loadermini _igloader _upindex hidden"/>
	                                    </div>
									</div>
                            	</div>
							</div>
							<!-- Question Title-->
							<div class="col-md-4">
                            	<div class="form-group">
									<label>Title</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
		                      			<input type="text" 
		                      			name="title" 
		                      			placeholder="Provide a title, if any"
		                      			class="form-control" />
									</div>
                            	</div>
							</div>
							<!-- Question data Type -->
							<div class="col-md-6">
                            	<div class="form-group">
									<label>Question Data type</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-code-fork"></i>
										</div>
										<select name="qdatatype" 
										class="form-control">
											<option value="plain"
											>Plain (Direct Question data entry)</option>
											<option value="media"
											>Media(Upload scanned question data)</option>
											
										</select>
									</div>
                            	</div>
							</div>
							<!-- Question Entry Type -->
							<div class="col-md-6">
                            	<div class="form-group">
									<label>Question Entry type</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-code-fork"></i>
										</div>
										<select name="qentrytype" 
										class="form-control">
											<option value="mixed"
											>Mixed(Obj&Theory)</option>
											<option value="obj"
											>Objective Only</option>
											<option value="theory"
											>Theory Only</option>
										</select>
									</div>
                            	</div>
							</div>

							<!-- Question Set date-->
							<div class="col-md-4">
                            	<div class="form-group">
									<label>Select the Year/Date</label>
									<div class="input-group select2-bootstrap-prepend
									select2-bootstrap-append">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
		                      			<input type="text" 
		                      			name="qdate" 
		                      			placeholder="Choose Date"
		                      			data-datepicker="true" 
		                      			class="form-control" />
									</div>
                            	</div>
							</div>

							<!-- Question duration-->
							<div class="col-md-4">
                            	<div class="form-group">
									<label>Specify exam duration</label>
									<div class="input-group ">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
		                      			<input type="text" 
		                      			name="qtime"
		                      			data-timepicker="true"
		                      			placeholder="Choose Duration" 
		                      			class="form-control" />
									</div>
                            	</div>
							</div>

							<!-- Question Update Status -->
							<div class="col-md-4">
                            	<div class="form-group">
									<label>Upload Status 
										<small>Publish this or save for later</small>
									</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-code-fork"></i>
										</div>
										<select name="status" 
										class="form-control">
											<option value="active"
											>Publish</option>
											<option value="saved"
											>Save for later</option>
										</select>
									</div>
                            	</div>
							</div>

							<!-- Questions data Section -->
							
							<!-- Question media entry-->
							<div class="col-md-12 qmediadata _qdsection hidden">

								<!-- Questions model answer image upload-->
								<div class="col-md-7 _first">
									<h4 class="text-center">Upload Question Images</h4>
									<!-- Questions image counter -->
									<div class="col-sm-6 clearboth marginauto">
										<div class="form-group">
							                <label>Select Number of images to be uploaded <small>Max of 10</small></label>
							      			<div class="input-group">
									            <div class="input-group-addon">
									                <i class="fa fa-book"></i>
									            </div>
									            <input class="form-control" name="qmediacount" 
									            type="number" value="1" min="1" max="10" 
									            data-valset="" data-valcount="" data-counter="true"/>
									          	<div class="input-group-addon nopadding">
									      														
								      				<a href="##" data-type="" 
							                		data-name="qmediacount_addlink" 
							                		data-i-type="" 
							                		data-limit="10"
								      				onclick="multipleElGenerator('form[name=<?php echo $formtruetype;?>] a[data-name=qmediacount_addlink]','','form[name=<?php echo $formtruetype;?>] div.qmedia-field-hold',$('form[name=<?php echo $formtruetype;?>] div.qmedia-field-hold .multi_content_hold').length,$('form[name=<?php echo $formtruetype;?>] input[name=qmediacount]').val(),'form[name=<?php echo $formtruetype;?>] input[name=qmediacount]')" 
								      				class="bs-igicon blockdisplay bg-gradient-darkgreen background-color-darkgreen background-color-orangehover bg-orange-gradienthover color-white color-darkgreyfocus color-darkgreyhover">
								                    	<i class="fa fa-arrow-right"></i>
								      				</a>
									            </div>
									        </div>
							  			</div>
							  		</div>

							  		<!-- Questions image entries section -->
									<div class="col-md-12 qmedia-field-hold float-none">
										<div class="col-sm-6 _xs-margin multi_content_hold" data-type="triggerprogenitor" data-cid="1" data-name="qmedia">
											<div class="form-group">
												<label class="multi_content_countlabels"
													>Question Image <small>Entry 1</small>
												</label>
												<div class="input-group">
													<div class="input-group-addon">
														<i class="fa fa-file-image-o"></i>
													</div>
													<input type="file" onchange="isPrev($(this))"
													placeholder="Choose image" 
													name="qimage1" 
													class="form-control"/>
												</div>
											</div>
										</div>
										<div name="qmediaentrypoint" data-marker="true"></div>
			                        	<input name="qmediadatamap" 
			                        	type="hidden" data-map="true" 
			                        	value="qimage-:-input">
									</div>

									<h4 class="text-center _modelanswers">Upload Model Answer</h4>
									<!-- questions model answers section -->
									<div class="col-sm-6  _modelanswers ">
										<div class="form-group">
							                <label>Select Number of images to be uploaded <small>Max of 5</small></label>
							      			<div class="input-group">
									            <div class="input-group-addon">
									                <i class="fa fa-book"></i>
									            </div>
									            <input class="form-control" name="qmanswerscount" 
									            type="number" value="1" min="1" max="5" 
									            data-valset="" data-valcount="" data-counter="true"/>
									          	<div class="input-group-addon nopadding">
									      														
								      				<a href="##" data-type="" 
							                		data-name="qmanswerscount_addlink" 
							                		data-i-type="" 
							                		data-limit="5"
								      				onclick="multipleElGenerator('form[name=<?php echo $formtruetype;?>] a[data-name=qmanswerscount_addlink]','','form[name=<?php echo $formtruetype;?>] div.qmanswers-field-hold',$('form[name=<?php echo $formtruetype;?>] div.qmanswers-field-hold .multi_content_hold').length,$('form[name=<?php echo $formtruetype;?>] input[name=qmanswerscount]').val(),'form[name=<?php echo $formtruetype;?>] input[name=qmanswerscount]')" 
								      				class="bs-igicon blockdisplay bg-gradient-darkgreen background-color-darkgreen background-color-orangehover bg-orange-gradienthover color-white color-darkgreyfocus color-darkgreyhover">
								                    	<i class="fa fa-arrow-right"></i>
								      				</a>
									            </div>
									        </div>
							  			</div>
							  		</div>
							  		<!-- questions model answers section -->
									<div class="col-sm-6 _modelanswers ">
										<div class="form-group">
							                <label>Total Theory score</label>
							      			<div class="input-group">
									            <div class="input-group-addon">
									                <i class="fa fa-list"></i>
									            </div>
									            <input class="form-control" name="qmtheorytotalscore"
									            type="number" min="1" placeholder="The total theory score"/>
									        </div>
							  			</div>
							  		</div>
							  		<!-- Questions image entries section -->
									<div class="col-md-12 qmanswers-field-hold float-none _modelanswers">
										<div class="col-sm-6 _xs-margin multi_content_hold" 
											data-type="triggerprogenitor" 
											data-cid="1" data-name="qmanswers">
											<div class="form-group">
												<label class="multi_content_countlabels"
													>Model Answers <small>Entry 1</small>
												</label>
												<div class="input-group">
													<div class="input-group-addon">
														<i class="fa fa-file-image-o"></i>
													</div>
													<input type="file" onchange="isPrev($(this))"
													placeholder="Choose image" 
													name="qmanswer1" 
													class="form-control"/>
												</div>
											</div>
										</div>
										<div name="qmanswersentrypoint" data-marker="true"></div>
			                        	<input name="qmanswersdatamap" 
			                        	type="hidden" data-map="true" 
			                        	value="qmanswer-:-input">
									</div>																								
								</div>
								
								<!-- Questions Objective answer Section -->
								<div class="col-md-5 _second">
									<h4 class="text-center">Objective Answer Sheet</h4>
									<!--Total question media objective score -->
									<div class="col-sm-12 clearboth marginauto">
										<div class="form-group">
							                <label>Total Objective score <small></small></label>
							      			<div class="input-group">
									            <div class="input-group-addon">
									                <i class="fa fa-percent"></i>
									            </div>
									            <input class="form-control" name="qmobjtotalscore" 
									            type="number" placeholder="Total Objective Score"/>
									          	
									        </div>
							  			</div>
							  		</div>
							  		<div class="col-sm-12 clearboth marginauto">
										<div class="form-group">
							                <label>Number Of Obj Entries <small>Max of 150</small></label>
							      			<div class="input-group">
									            <div class="input-group-addon">
									                <i class="fa fa-check"></i>
									            </div>
									            <input class="form-control" name="worksheet" 
									            type="file"/>
									        </div>
							  			</div>
							  		</div>
									<!-- Question media objective counter and model answers upload section-->
									<div class="col-sm-12 clearboth marginauto">
										<div class="form-group">
							                <label>Number Of Obj Entries <small>Max of 150</small></label>
							      			<div class="input-group">
									            <div class="input-group-addon">
									                <i class="fa fa-check"></i>
									            </div>
									            <input class="form-control" name="qmobjoptionscount" 
									            type="number" value="1" min="1" max="150" 
									            data-valset="" data-valcount="" data-counter="true"/>

									          	<div class="input-group-addon nopadding">
									      														
								      				<a href="##" data-type="" 
							                		data-name="qmobjoptionscount_addlink" 
							                		data-i-type="" 
							                		data-limit="150"
								      				onclick="multipleElGenerator('form[name=<?php echo $formtruetype;?>] a[data-name=qmobjoptionscount_addlink]','','form[name=<?php echo $formtruetype;?>] div.qmobjoptions-field-hold',$('form[name=<?php echo $formtruetype;?>] div.qmobjoptions-field-hold .multi_content_hold').length,$('form[name=<?php echo $formtruetype;?>] input[name=qmobjoptionscount]').val(),'form[name=<?php echo $formtruetype;?>] input[name=qmobjoptionscount]')" 
								      				class="bs-igicon blockdisplay bg-gradient-darkgreen background-color-darkgreen background-color-orangehover bg-orange-gradienthover color-white color-darkgreyfocus color-darkgreyhover">
								                    	<i class="fa fa-arrow-right"></i>
								      				</a>
									            </div>
									        </div>
							  			</div>
							  		</div>
							  		<!-- Question Media Objective answers section -->
									<div class="col-md-12 qmobjoptions-field-hold float-none">
										<div class="col-sm-6 _no-margin multi_content_hold" data-type="triggerprogenitor" data-cid="1" data-name="qmobjoptions">
											<div class="form-group">
												<label class="multi_content_countlabels"
													>Obj Options <small>Entry 1</small>
												</label>
												<div class="input-group">
													<div class="input-group-addon">
														<i class="fa fa-file-image-o"></i>
													</div>

													<select name="qmediaobjans1" data-crt="true"
													class="form-control">
														<option value=""
														>--Choose--</option>
														<option value="1">Option A</option>
														<option value="2">Option B</option>
														<option value="3">Option C</option>
														<option value="4">Option D</option>
														<option value="5">Option E</option>
														<option value="6">Option F</option>
													</select>
												</div>
											</div>
										</div>
										<div name="qmobjoptionsentrypoint" data-marker="true"></div>
			                        	<input name="qmobjoptionsdatamap" 
			                        	type="hidden" data-map="true" 
			                        	value="qmediaobjans-:-input">
									</div>
								</div>
							</div><!-- /.col -->

							<!-- Plain data entry -->
							<div class="col-md-12 qplaindata _qdsection">
				              	<!-- Custom Tabs (Pulled to the right) -->
				              	<div class="nav-tabs-custom _fcustomized">
					                <ul class="nav nav-tabs pull-right">
										<li>
											<a href="#tab_1-2" class="_mdsize" data-toggle="tab">Theory Section</a>
										</li>
										<li class="active">
											<a href="#tab_1-1" class="_mdsize" data-toggle="tab">Objective Section</a>
										</li>
										<li class="pull-left header">
											<i class="fa fa-question-circle"></i> Question Data Entries
										</li>
					                </ul>
					                <div class="tab-content">
					                	<!-- Objective Section -->
						                <div class="tab-pane active" id="tab_1-1">
						                	<!-- Start sub-questiongroup entry section accordion -->
					                        	<div class="col-md-12 objdata-field-hold float-none">
					                        		<!-- Obj Information -->
					                        		<div class="col-sm-6 pull-left">
			                        					<div class="form-group">
			                        						<label>Objective Details</label>
			                        							<textarea class="form-control" 
			                        							rows="5" 
                              									name="objdetails" 
                              									placeholder="Specify any information concerning the objective section"
                              									></textarea>	
			                        					</div>
				                        			</div>
					                        		<!-- Objective total score -->
													<div class="col-sm-6  pull-right">
														<div class="form-group">
											                <label>Specify total objective score</label>
											      			<div class="input-group">
													            <div class="input-group-addon">
													                <i class="fa fa-book"></i>
													            </div>
													            <input class="form-control" name="objtotalscore" 
													            type="number" placeholder="Provide total score for objective questions"/>
													        </div>
											  			</div>
											  		</div>
					                            	<!-- Objective Questions counter -->
													<div class="col-sm-6  pull-right">
														<div class="form-group">
											                <label>Select Number of Objective Questions <small>Max of 60 at a time</small></label>
											      			<div class="input-group">
													            <div class="input-group-addon">
													                <i class="fa fa-book"></i>
													            </div>
													            <input class="form-control" name="objdatacount" 
													            type="number" value="1" min="1" max="60" 
													            data-valset="" data-valcount="" data-counter="true"/>
													          	<div class="input-group-addon nopadding">
													      														
												      				<a href="##" data-type="" 
											                		data-name="objdatacount_addlink" 
											                		data-i-type="" 
											                		data-limit="60"
												      				onclick="multipleElGenerator('form[name=<?php echo $formtruetype;?>] a[data-name=objdatacount_addlink]','','form[name=<?php echo $formtruetype;?>] div.objdata-field-hold',$('form[name=<?php echo $formtruetype;?>] div.objdata-field-hold .multi_content_hold').length,$('form[name=<?php echo $formtruetype;?>] input[name=objdatacount]').val(),'form[name=<?php echo $formtruetype;?>] input[name=objdatacount]')" 
												      				class="bs-igicon blockdisplay bg-gradient-darkgreen background-color-darkgreen background-color-orangehover bg-orange-gradienthover color-white color-darkgreyfocus color-darkgreyhover">
												                    	<i class="fa fa-arrow-right"></i>
												      				</a>
													            </div>
													        </div>
											  			</div>
											  		</div>

						                        	<div class="col-md-12 multi_content_hold" data-type="triggerprogenitor" data-cid="1" data-name="objdata">
					                        			<!-- main question section -->
					                        			<div class="col-sm-6 nopadding _first">
					                        				<div class="col-xs-12">
					                        					<h4 class="multi_content_countlabels pull-left"
					                        						>Question Entry 1
					                        					</h4>
					                        					
					                        				</div>
					                        				<div class="col-xs-12 _objquestionsection">
					                        					<div class="form-group">
					                        						<?php echo $mcetools;?>
	                              									<textarea class="form-control" rows="10" 
	                              									name="question1" 
	                              									placeholder="Optional Description"
	                              									data-mce="true"
	                              									data-type="tinymcefield"
	                              									id="questionentry"
	                              									></textarea>

					                        					</div>
					                        				</div>
					                        				<div class="col-xs-12 _editoptionsection">
					                        				</div>
					                        			</div>
					                        			<!-- Question options -->
					                        			<div class="col-sm-6 _second">
					                        				<?php
					                        					for($i=1;$i<=6;$i++){
					                        						// this represents the value of the current question being managed
					                        						$v=1;
					                        				?>
					                        				<!-- OPTION -->
					                        				<div class="form-control overflowhidden clearboth _optionview">
					                        					<div class="input-group" data-isprev-parent="<?php echo "$i";?>gd_countx">
					                        						<input type="text" name="option<?php echo "$i$v";?>"
					                        						class="form-control" placeholder="Option Entry <?php echo "$i";?>"/>
					                        						<!-- Attachment section -->
					                        						<div class="input-group-addon nopadding rel">
					                        							<span class="fileinput-button btn btn-primary _optionattach">
																			<i class="fa fa-plus qofdata"></i>
																			<input type="file" 
																			data-isprev-id="<?php echo "$i";?>gd_countx"
																			name="qoptimg<?php echo "$i$v";?>" 
																			title="Attach Image"
																			data-toggle="tooltip"
																			data-tip="Attach Image"
																			onchange="isPrev($(this),'true')"/>
																		</span>
					                        						</div>
																	<!-- fileviewer -->
					                        						<div class="input-group-addon nopadding _isprev hidden">
																		<a href="##" data-src="" class="_isprevlink bs-igicon bg-darkgreen-gradient bg-green-gradienthover color-white color-whitehover"
																		data-lightbox="qoptimg<?php echo "$i$v";?>"
														                    title="View image" >
														                    <i class="fa fa-eye"></i>
														                </a>
					                        						</div>
					                        						<!-- Delete file section -->
					                        						<div class="input-group-addon nopadding hidden">
																		<a href="##" data-src="" class="bs-igicon _stacked bg-red-gradient 
																		 color-white color-whitehover color-whitefocus"
														                    title="Delete Attached Image" >
														                    <i class="fa fa-trash"></i>
														                    <input type="checkbox" 
																			data-isprev-id="<?php echo "$i$v";?>"
																			name="qoptimg<?php echo "$i$v";?>" 
																			title="Mark to Delete Attached Image"
																			data-tip="Mark to Delete Attached Image"/>
														                </a>
														                <input type="hidden" 
																			data-isprev-id="<?php echo "$i$v";?>"
																			name="qoptimgdelete<?php echo "$i$v";?>" 
																			data-tip="Delete Attached Media"/>
																		
					                        						</div>
					                        					</div>
					                        				</div>
					                        				<?php
					                        					}
					                        				?>
					                        				<!-- OPTION Answer-->
					                        				<div class="form-control overflowhidden clearboth _optionview">
					                        					<div class="input-group">
					                        						<div class="input-group-addon">
					                        							<i class="fa fa-check"></i>
					                        						</div>
						                        					<select name="answer1" class="form-control">
						                        						<option value="">--Select Options Answer--</option>
						                        						<?php
								                        					for($i=1;$i<=6;$i++){
								                        				?>
						                        						<option value="<?php echo $i;?>">Option Entry <?php echo $i;?></option>
						                        						<?php
								                        					}
								                        				?>
						                        					</select>
					                        					</div>
					                        				</div>
					                        			</div>
						                        	</div>
						                        	<div name="objdataentrypoint" data-marker="true"></div>
						                        	<input name="objdatadatamap" 
						                        	type="hidden" data-map="true" 
						                        	value="question-:-textarea<|>
						                        	option1-:-input<|>qoptimg1-:-input<|>
						                        	option2-:-input<|>qoptimg2-:-input<|>
						                        	option3-:-input<|>qoptimg3-:-input<|>
						                        	option4-:-input<|>qoptimg4-:-input<|>
						                        	option5-:-input<|>qoptimg5-:-input<|>
						                        	option6-:-input<|>qoptimg6-:-input<|>
						                        	answer-:-select" />
					                            </div>
					                        <!-- end edit section accordion -->
						                </div><!-- /.tab-pane -->

					                  	<!-- Theory Section -->
					                  	<div class="tab-pane" id="tab_1-2">
						                	<!-- Start Theory entry section accordion -->
					                        	<div class="col-md-12 theorydata-field-hold float-none">
					                        		<!-- Theory Information -->
					                        		<div class="col-sm-6 pull-left">
			                        					<div class="form-group">
			                        						<label>Theory Details</label>
			                        							<textarea class="form-control" 
			                        							rows="5" 
                              									name="theorydetails" 
                              									placeholder="Specify any information concerning the theory section"
                              									></textarea>	
			                        					</div>
				                        			</div>
					                        		
											  		<!-- total theory score  -->
													<div class="col-sm-6 _modelanswers">
														<div class="form-group">
											                <label>Total Theory score</label>
											      			<div class="input-group">
													            <div class="input-group-addon">
													                <i class="fa fa-list"></i>
													            </div>
													            <input class="form-control" name="theorytotalscore"
													            type="number" min="1" placeholder="The total theory score"/>
													        </div>
											  			</div>
											  		</div>
											  		<!-- Total theory score -->
											  		<div class="col-sm-6 ">
														<div class="form-group">
											                <label>Select Number of Theory questions to be uploaded <small>Max of 10 at a time</small></label>
											      			<div class="input-group">
													            <div class="input-group-addon">
													                <i class="fa fa-book"></i>
													            </div>
													            <input class="form-control" name="theorydatacount" 
													            type="number" value="1" min="1" max="10" 
													            data-valset="" data-valcount="" data-counter="true"/>
													          	<div class="input-group-addon nopadding">
													      														
												      				<a href="##" data-type="" 
											                		data-name="theorydatacount_addlink" 
											                		data-i-type="" 
											                		data-limit="10"
												      				onclick="multipleElGenerator('form[name=<?php echo $formtruetype;?>] a[data-name=theorydatacount_addlink]','','form[name=<?php echo $formtruetype;?>] div.theorydata-field-hold',$('form[name=<?php echo $formtruetype;?>] div.theorydata-field-hold .multi_content_hold').length,$('form[name=<?php echo $formtruetype;?>] input[name=theorydatacount]').val(),'form[name=<?php echo $formtruetype;?>] input[name=theorydatacount]')" 
												      				class="bs-igicon blockdisplay bg-gradient-darkgreen background-color-darkgreen background-color-orangehover bg-orange-gradienthover color-white color-darkgreyfocus color-darkgreyhover">
												                    	<i class="fa fa-arrow-right"></i>
												      				</a>
													            </div>
													        </div>
											  			</div>
											  		</div>
											  		<div class="clearboth"></div>
						                        	<div class="col-md-6 nopadding multi_content_hold" data-type="triggerprogenitor" data-cid="1" data-name="theorydata">
					                        			<!-- main question section -->
					                        			<div class="col-sm-12  nopadding _first">
					                        				<div class="col-xs-12">
					                        					<h4 class="multi_content_countlabels pull-left"
					                        						>Theory Question Entry 1
					                        					</h4>
					                        					
					                        				</div>
					                        				<div class="col-xs-12">
					                        					<div class="form-group">
					                        						<div class="input-group">
					                        							<div class="input-group-addon">
					                        								<i class="fa fa-list"></i>
					                        							</div> 
						                        						<input class="form-control" name="theoryqscore1" 
															            type="number"  min="1" max="" placeholder="Total Score for current question" />
					                        						</div>
					                        					</div>
						                        			</div>
					                        				<div class="col-xs-12  _objquestionsection">
					                        					<div class="form-group">
					                        						<?php echo $mcetools;?>
	                              									<textarea class="form-control" rows="10" 
	                              									name="theoryquestion1" 
	                              									placeholder="Theory Question"
	                              									data-mce="true"
	                              									data-type="tinymcefield"
	                              									id="questionentryt"
	                              									></textarea>
	                              									

					                        					</div>
					                        				</div>
					                        				<div class="col-xs-12 _objquestionsection">
					                        					<div class="form-group">
					                        						<label>Model Answer </label>
					                        							<textarea class="form-control" rows="10" 
		                              									name="theoryqmodelanswer1" 
		                              									placeholder="Model Answer"
		                              									></textarea>	
					                        					</div>
						                        			</div>
					                        				<div class="col-xs-12 _editoptionsection">
					                        				</div>
					                        			</div>

						                        	</div>
													<div name="theorydataentrypoint" data-marker="true"></div>
						                        	<input name="theorydatadatamap" 
						                        	type="hidden" data-map="true" 
						                        	value="theoryqscore-:-input<|>
						                        	theoryquestion-:-textarea<|>theoryqmodelanswer-:-textarea" />
					                            </div>

					                        <!-- end theory section accordion -->


					                    </div><!-- /.tab-pane -->

					                </div><!-- /.tab-content -->

					            </div><!-- nav-tabs-custom -->
					        </div><!-- /.col -->

							<input type="hidden" name="fdgenmax" data-fdgen="true" value="<?php echo $inimaxupload;?>"/> 
                            <input type="hidden" name="extraformdata" 
                            value="qgroupset-:-select<|>
                            course-:-select<|>
                            qdatatype-:-select<|>
                            qentrytype-:-select<|>
                            qdate-:-input<|>
                            qtime-:-input<|>
                            status-:-select<|>

                            qmtheorytotalscore-:-input-:-[group-|-qdatatype-|-select-|-media-|-qentrytype-|-select-|-mixed:*:theory]<|>
                            egroup|data-:-[qmediacount>|<
		                    qimage-|-input|image]-:-groupfall[1]-:-[single-|-qdatatype-|-select-|-media-|-qimage]<|>
		                    egroup|data-:-[qmanswerscount>|<
		                    qmanswer-|-input|image]-:-groupfall[1]-:-[group-|-qdatatype-|-select-|-media-|-qentrytype-|-select-|-mixed:*:theory-|-qimage]<|>
                            qmobjtotalscore-:-input-:-[group-|-qdatatype-|-select-|-media-|-qentrytype-|-select-|-mixed:*:obj]<|>
		                    egroup|data-:-[qmobjoptionscount>|<
		                    qmediaobjans-|-select]-:-groupfall[1]-:-[group-|-qdatatype-|-select-|-media-|-qentrytype-|-select-|-mixed:*:obj-|-qmediaobjans]<|>
		                    
                            objtotalscore-:-input-:-[group-|-qdatatype-|-select-|-plain-|-qentrytype-|-select-|-mixed:*:obj]<|>
		                    egroup|data-:-[objdatacount>|<
		                    question-|-textarea>|<
		                    option1-|-input>|<
		                    option2-|-input>|<
		                    option3-|-input-|-(group-*-answer-*-select-*-3)>|<
		                    option4-|-input-|-(group-*-answer-*-select-*-4)>|<
		                    option5-|-input-|-(group-*-answer-*-select-*-5)>|<
		                    option6-|-input-|-(group-*-answer-*-select-*-6)>|<
		                    answer-|-select]-:-groupfall[1,2,3,8,4-8,5-8,6-8,7-8]-:-[group-|-qdatatype-|-select-|-plain-|-qentrytype-|-select-|-mixed:*:obj-|-question]<|>
                            theorytotalscore-:-input-:-[group-|-qdatatype-|-select-|-plain-|-qentrytype-|-select-|-mixed:*:theory]<|>
		                    egroup|data-:-[theorydatacount>|<
		                    theoryquestion-|-textarea]-:-groupfall[1]-:-[group-|-qdatatype-|-select-|-plain-|-qentrytype-|-select-|-mixed:*:theory-|-theoryquestion]"/>
		                    
		                    <input type="hidden" name="errormap" 
		                    value="qgroupset-:-Please select a question group<|>
		                    course-:-Please choose a course<|>
		                    qdatatype-:-NA<|>
		                    qdataentry-:-NA<|>
		                    qdate-:-Please choose the date for this examination entry<|>
		                    qtime-:-Please choose the duration of this examination entry<|>
                            status-:-NA<|>
                            qmtheorytotalscore-:-Please give the total score accrueable to the theory<|>
			                egroup|data-:-[Please Choose the scanned question image]<|>
			                egroup|data-:-[Please Choose the scanned model answer image]<|>
		                    qmobjtotalscore-:-Please provide the total score of the objective data entries<|>
		                    egroup|data-:-[Please provide the correct answer to objective questions]<|>
		                    objtotalscore-:-Please provide the total score of the objective data entries<|>
		                    egroup|data-:-[Please provide the question>|<
		                    Please provide the option>|<
		                    Please provide another option>|<
		                    Please Provide Option 3>|<
		                    Please Provide Option 4>|<
		                    Please Provide Option 5>|<
		                    Please Provide Option 6>|<
		                   	Please Choose the correct answer]<|>
		                   	theorytotalscore-:-Please give the total score accrueable to the theory questions<|>
		                    egroup|data-:-[Please provide the Theory question. Check the Theory Tab]"/>

			                <div class="col-md-12 clearboth">
				                <div class="box-footer">
				                    <input type="button" class="btn btn-danger" name="createentry" data-formdata="<?php echo $formtruetype;?>" onclick="submitCustom('<?php echo $formtruetype;?>','complete')" value="Create/Update"/>
				                     <small>Maximum file upload size for server is:<?php echo $inimaxupload;?></small>
				                </div>
				            </div>
		            	</form>	
			        </div>
			    </div>
			</div>
			<div class="panel box overflowhidden box-primary <?php echo $edithide;?>">
                <div class="box-header with-border">
                  <h4 class="box-title">
                    <a data-toggle="collapse" data-parent="#generaldataaccordion" href="#EditBlock">
                      <i class="fa fa-gear fa-spin"></i> Edit <?php echo $title;?>
                    </a>
                  </h4>
                </div>
                <div id="EditBlock" class="panel-collapse collapse <?php echo $editin;?>">
                  	<div class="box-body">
                      	<div class="row">
                      		<?php
								// create the unique viewdata variable for
								// handling entries into the database
                      			$miniviewdata="";
                      			$clc="4";
								

							?>
	                        <div class="col-md-12 render-field-hold" name="<?php echo $viewdata;?>">
								<input type="hidden" name="datamap" data-crt="true" value='<?php echo $localdatamap;?>'/>
								<input type="hidden" name="variant" data-crt="true" value='<?php echo $variant;?>'/>
								<input type="hidden" name="cvtype" data-crt="true" value='<?php echo $viewtype;?>'/>
								<?php
									echo $miniviewdata;
								?>
								<!-- QGroup title-->
								<div class="col-md-4">
	                            	<div class="form-group">
										<label>QGroup Title</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-file-text-o"></i>
											</div>
											<select name="qgroup" data-crt="true"
											data-name="select2plain"
											class="form-control">
												<?php echo $qgset['selectiondata'];?>
											</select>
												
										</div>
	                            	</div>
								</div>
	                        	
								<!-- Course Title -->
								<div class="col-md-4">
	                            	<div class="form-group">
										<label>Course Title</label>
										<div class="input-group select2-bootstrap-prepend
										select2-bootstrap-append">
											<div class="input-group-addon">
												<i class="fa fa-file-text-o"></i>
											</div>
											<select name="coursetitle" data-crt="true" 
											data-name="select2plain"
											class="form-control">
												<option value=""
												>--Choose A Question Group First--</option>
											</select>
											<div class="input-group-addon rel">
		                                        <i class="fa fa-database"></i>
		                                        <img src="<?php echo $host_addr;?>images/loading.gif" class=" loadermask loadermini _igloader _upindex hidden"/>
		                                    </div>
										</div>
	                            	</div>
								</div>

								<!-- qdate -->
								<div class="col-md-4">
	                            	<div class="form-group">
										<label>Course Title</label>
										<div class="input-group select2-bootstrap-prepend
										select2-bootstrap-append">
											<div class="input-group-addon">
												<i class="fa fa-calendar"></i>
											</div>
											<select name="qdate" data-yearpicker
											 data-crt="true" 
											data-name="select2plain"
											class="form-control">
												<option value=""
												>--Select Question Year--</option>
												<?php echo $yearopts;?>

											</select>
											
										</div>
	                            	</div>
								</div>
								
								<!-- qdobj search obj based info  -->
								<div class="col-md-6">
	                            	<div class="form-group">
										<label>Obj Data <small>Search plain text obj questions </small></label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-file-text-o"></i>
											</div>
											<input name="qdobj" 
											placeholder="Search Obj questions" 
											class="form-control" data-crt="true"/>
										</div>
	                            	</div>
								</div>
								<!-- qdtheory search only typed theory data -->
								<div class="col-md-6">
	                            	<div class="form-group">
										<label>Theory Data <small>Search plain text theory questions </small></label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-file-text-o"></i>
											</div>
											<input name="qdtheory" 
											placeholder="Search in theory data" 
											class="form-control" data-crt="true"/>
										</div>
	                            	</div>
								</div>

								<!-- Status -->
								<div class="col-md-4">
			                    	<div class="form-group">
				                        <label>Status</small></label>
				                        <div class="input-group">
			                                <div class="input-group-addon">
			                                    <i class="fa fa-exclamation-triangle 
			                                    color-red"></i>
			                                </div>
					                        <select name="status" data-crt="true" 
					                        class="form-control">
					                        	<option value="">--Choose--</option>
					                        	<option value="active">Active</option>
					                        	<option value="inactive">Inactive</option>
									  	    </select>
									  	</div>
								  	</div>
			                    </div>
	                            <div class="col-md-12 clearboth">
					                <div class="box-footer margin-auto text-center">
					                    <input type="button" class="btn btn-danger" 
					                    data-type="submitcrt" name="<?php echo $viewdata?>" 
					                    value="Load/Refresh View"/>
					                </div>
					            </div>
	                        	<div class="col-md-12 renderpoint">
			                        <?php 
			                        	// echo $outsdata['cqtdata'];
			                        	echo $outsdata['genericout'];
				                          
			                        ?>	
			                    </div>
								<div class="loadmask loadmask hidden">
                                    <img src="<?php echo $host_addr;?>images/loading.gif" class="loadermini "/>
                                </div>
                    		</div>
                    	</div>
                  	</div>
                </div>
            </div>
		</div>
	</div>
	<script>
		$(document).ready(function(){
			var curmceadminposter=[];
			curmceadminposter['width']="100%";
			curmceadminposter['height']="300px";
			curmceadminposter['toolbar1']="undo redo | bold italic underline | fontselect fontsizeselect | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect";
			curmceadminposter['toolbar2']="| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ";
			callTinyMCEInit("textarea#adminposter",curmceadminposter);
			var curmcethreeposter=[];
			curmcethreeposter['width']="100%";

			curmcethreeposter['height']="300px";
			curmcethreeposter['toolbar2addon']=" | preview code ";
			callTinyMCEInit("textarea[id*=postersmallthree]",curmcethreeposter);
			
			// timepicker
			if($.fn.datetimepicker){
			    $('[data-timepick*=true]').each(function(){
			      // console.log("The timed element: ",$(this));
			      $(this).datetimepicker({
			          format:"HH:mm"/*,
			          keepOpen:true*/
			      });
			    })
			   
			}
			// init select2
			if($.fn.select2){
				$('select[data-name=select2plain]').select2({
				    theme: "bootstrap"
				});
				$('select[data-name=faselect]').select2({
				    theme: "bootstrap",
				    templateResult: faSelectTemplate
				});
			}
			
		});
	</script>
</div>
<?php
		}else if($viewtype=="edit"){
			// echo $viewtype;
			// var_dump($datamap);
			// parse current datamap[''];
			$cdmap=JSONtoPHP($datamap);
			$cmap=$cdmap['arrayoutput'];
			// var_dump($cmap);

			//check to see if the current map has the 'overriden' index and see if
			// the index value is 'true' meaning that the current query to be used
			// is not the defaule but one present in the initial datamap
			if(isset($cmap['overriden'])&&$cmap['overriden']=="true"){
				$rmd5=$cmap['rmd5'];
				// get the current data overriding queries from active session and
				// place the values into the current data array element
				$cdata=$_SESSION['generalpagesdata']["$rmd5"]['data'];
				$data=$cdata;
				// ensure the calling function knows which hash to call
				$data['rmd5']=$rmd5;
			}

			$formtruetype2="edit_$formtruetype2";
			$data['single']['formtruetype']=$formtruetype2;
			// var_dump($data);
			// echo $variant2;
			$dataset=getSingleQuestionEntry($editid,"",$data);
			$row=$dataset;
			
			$totalscripts=$row['totalscripts'];
			
?>
			<!-- Edit section -->
			<div class="row">
		        <form name="<?php echo $formtruetype2;?>" method="POST" data-type="edit" 
		        	onSubmit="return false" enctype="multipart/form-data" 
		        	action="<?php echo $host_addr;?>snippets/edit.php">
					<input type="hidden" name="entryvariant" value="<?php echo $variant2;?>"/>

					<input type="hidden" name="entryid" value="<?php echo $editid;?>"/>
                    <input name="maintype" type="hidden" value="<?php echo $maintype;?>"/>

                    <!-- Question Group -->
					<div class="col-md-4">
                    	<div class="form-group">
							<label>Choose Question Group</label>
							<div class="input-group select2-bootstrap-prepend">
								<div class="input-group-addon">
									<i class="fa fa-file-text-o"></i>
								</div>
								<select name="qgroupset" 
								data-name="select2plain"
								class="form-control">
									<?php echo $qgset['selectiondata'];?>
								</select>
							</div>
                    	</div>
					</div>
					<!-- Course/Subject -->
					<div class="col-md-4">
                    	<div class="form-group">
							<label>Choose Course/Subject</label>
							<div class="input-group select2-bootstrap-prepend
							select2-bootstrap-append">
								<div class="input-group-addon">
									<i class="fa fa-file-text-o"></i>
								</div>
								<select name="course" 
								data-name="select2plain"
								class="form-control">
									<option value=""
									>--Choose A Question Group First--</option>
									<?php echo $row['courselist'];?>
								</select>
								<div class="input-group-addon rel">
                                    <i class="fa fa-database"></i>
                                    <img src="<?php echo $host_addr;?>images/loading.gif" class=" loadermask loadermini _igloader _upindex hidden"/>
                                </div>
							</div>
                    	</div>
					</div>
					<!-- Question Title-->
					<div class="col-md-4">
                    	<div class="form-group">
							<label>Title</label>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-file-text"></i>
								</div>
                      			<input type="text" 
                      			name="title"
                      			value="<?php echo $row['title'];?>" 
                      			placeholder="Provide a title, if any"
                      			class="form-control" />
							</div>
                    	</div>
					</div>
					<!-- Question data Type -->
					<div class="col-md-6">
                    	<div class="form-group">
							<label>Question Data type</label>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-code-fork"></i>
								</div>
								<select name="qdatatype" 
								class="form-control">
									<option value="plain"
									>Plain (Direct Question data entry)</option>
									<option value="media"
									>Media(Upload scanned question data)</option>
									
								</select>
							</div>
                    	</div>
					</div>
					<!-- Question Entry Type -->
					<div class="col-md-6">
                    	<div class="form-group">
							<label>Question Entry type</label>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-code-fork"></i>
								</div>
								<select name="qentrytype" 
								class="form-control">
									<option value="mixed"
									>Mixed(Obj&Theory)</option>
									<option value="obj"
									>Objective Only</option>
									<option value="theory"
									>Theory Only</option>
								</select>
							</div>
                    	</div>
					</div>

					<!-- Question Set date-->
					<div class="col-md-4">
                    	<div class="form-group">
							<label>Select the Year/Date</label>
							<div class="input-group select2-bootstrap-prepend
							select2-bootstrap-append">
								<div class="input-group-addon">
									<i class="fa fa-calendar"></i>
								</div>
                      			<input type="text" 
                      			name="qdate" 
                      			placeholder="Choose Date"
                      			data-datepicker="true" 
                      			value="<?php echo $row['qdate'];?>"
                      			class="form-control" />
							</div>
                    	</div>
					</div>

					<!-- Question duration-->
					<div class="col-md-4">
                    	<div class="form-group">
							<label>Specify exam duration</label>
							<div class="input-group ">
								<div class="input-group-addon">
									<i class="fa fa-calendar"></i>
								</div>
                      			<input type="text" 
                      			name="qtime"
                      			data-timepicker="true"
                      			value="<?php echo $row['duration'];?>"
                      			placeholder="Choose Duration" 
                      			class="form-control" />
							</div>
                    	</div>
					</div>

					<!-- Question Update Status -->
					<div class="col-md-4">
                    	<div class="form-group">
							<label><?php if($row['status']=="saved"):?>Upload Status 
								<small>Publish this now or save for later</small>
							<?php else:?>
								Status <small>Disable or enable this entry</small>
							<?php endif;?>
							</label>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-code-fork"></i>
								</div>
								<select name="status" 
								class="form-control">
									<?php if($row['status']=="saved"):?>
										<option value="active"
										>Publish</option>
										<option value="saved"
										>Save for later</option>
									<?php else:?>
										<option value="active"
										>Active</option>
										<option value="inactive"
										>Disabled</option>
									<?php endif;?>
								</select>
							</div>
                    	</div>
					</div>

					<!-- Questions data Section -->
					
					<!-- Question media entry-->
					<div class="col-md-12 qmediadata _qdsection <?php if($row['qdatatype']=="plain"):?>hidden<?php endif;?>">

						<!-- Questions model answer image upload-->
						<div class="col-md-7 _first">
							<h4 class="text-center">Upload Question Images</h4>
							<!-- Questions image counter -->
							<div class="col-sm-6 clearboth marginauto">
								<div class="form-group">
					                <label>Select Number of images to be uploaded <small>Max of 10</small></label>
					      			<div class="input-group">
							            <div class="input-group-addon">
							                <i class="fa fa-book"></i>
							            </div>
							            <input class="form-control" name="qmediacount" 
							            type="number" value="1" min="1" max="10" 
							            data-counter="true"/>
							          	<div class="input-group-addon nopadding">
							      														
						      				<a href="##" data-type="" 
					                		data-name="qmediacount_addlink" 
					                		data-i-type="" 
					                		<?php if($row['pdobj']['totalnumber']>0):?>
					                		data-sentineltype="<?php echo $row['pdobj']['totalnumber'];?>"
					                		<?php endif;?>
					                		data-limit="10"
						      				onclick="multipleElGenerator('form[name=<?php echo $formtruetype2;?>] a[data-name=qmediacount_addlink]','','form[name=<?php echo $formtruetype2;?>] div.qmedia-field-hold',$('form[name=<?php echo $formtruetype2;?>] div.qmedia-field-hold .multi_content_hold').length,$('form[name=<?php echo $formtruetype2;?>] input[name=qmediacount]').val(),'form[name=<?php echo $formtruetype2;?>] input[name=qmediacount]')" 
						      				class="bs-igicon blockdisplay bg-gradient-darkgreen background-color-darkgreen background-color-orangehover bg-orange-gradienthover color-white color-darkgreyfocus color-darkgreyhover">
						                    	<i class="fa fa-arrow-right"></i>
						      				</a>
							            </div>
							        </div>
					  			</div>
					  		</div>

					  		<!-- Questions image entries section -->
							<div class="col-md-12 qmedia-field-hold float-none">
								<div class="col-sm-6 _xs-margin multi_content_hold" data-type="triggerprogenitor" data-cid="1" data-name="qmedia">
									<div class="form-group">
										<label class="multi_content_countlabels"
											>Question Image <small>Entry 1</small>
										</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-file-image-o"></i>
											</div>
											<input type="file" onchange="isPrev($(this))"
											placeholder="Choose image" 
											name="qimage1" 
											class="form-control"/>
										</div>
									</div>
								</div>
								<div name="qmediaentrypoint" data-marker="true"></div>
	                        	<input name="qmediadatamap" 
	                        	type="hidden" data-map="true" 
	                        	value="qimage-:-input">
							</div>

							<h4 class="text-center _modelanswers">Upload Model Answer</h4>
							<!-- questions model answers section -->
							<div class="col-sm-6  _modelanswers ">
								<div class="form-group">
					                <label>Select Number of images to be uploaded <small>Max of 5</small></label>
					      			<div class="input-group">
							            <div class="input-group-addon">
							                <i class="fa fa-book"></i>
							            </div>
							            <input class="form-control" name="qmanswerscount" 
							            type="number" value="1" min="1" max="5" 
							            data-valset="" data-valcount="" data-counter="true"/>
							          	<div class="input-group-addon nopadding">
							      														
						      				<a href="##" data-type="" 
					                		data-name="qmanswerscount_addlink" 
					                		data-i-type="" 
					                		data-limit="5"
						      				onclick="multipleElGenerator('form[name=<?php echo $formtruetype2;?>] a[data-name=qmanswerscount_addlink]','','form[name=<?php echo $formtruetype2;?>] div.qmanswers-field-hold',$('form[name=<?php echo $formtruetype2;?>] div.qmanswers-field-hold .multi_content_hold').length,$('form[name=<?php echo $formtruetype2;?>] input[name=qmanswerscount]').val(),'form[name=<?php echo $formtruetype2;?>] input[name=qmanswerscount]')" 
						      				class="bs-igicon blockdisplay bg-gradient-darkgreen background-color-darkgreen background-color-orangehover bg-orange-gradienthover color-white color-darkgreyfocus color-darkgreyhover">
						                    	<i class="fa fa-arrow-right"></i>
						      				</a>
							            </div>
							        </div>
					  			</div>
					  		</div>
					  		<!-- questions model answers section -->
							<div class="col-sm-6 _modelanswers ">
								<div class="form-group">
					                <label>Total Theory score</label>
					      			<div class="input-group">
							            <div class="input-group-addon">
							                <i class="fa fa-list"></i>
							            </div>
							            <input class="form-control" name="qmtheorytotalscore"
							            type="number" min="1" placeholder="The total theory score"/>
							        </div>
					  			</div>
					  		</div>
					  		<!-- Questions image entries section -->
							<div class="col-md-12 qmanswers-field-hold float-none _modelanswers">
								<div class="col-sm-6 _xs-margin multi_content_hold" 
									data-type="triggerprogenitor" 
									data-cid="1" data-name="qmanswers">
									<div class="form-group">
										<label class="multi_content_countlabels"
											>Model Answers <small>Entry 1</small>
										</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-file-image-o"></i>
											</div>
											<input type="file" onchange="isPrev($(this))"
											placeholder="Choose image" 
											name="qmanswer1" 
											class="form-control"/>
										</div>
									</div>
								</div>
								<div name="qmanswersentrypoint" data-marker="true"></div>
	                        	<input name="qmanswersdatamap" 
	                        	type="hidden" data-map="true" 
	                        	value="qmanswer-:-input">
							</div>																								
						</div>
						
						<!-- Questions Objective answer Section -->
						<div class="col-md-5 _second">
							<h4 class="text-center">Objective Answer Sheet</h4>
							<!--Total question media objective score -->
							<div class="col-sm-12 clearboth marginauto">
								<div class="form-group">
					                <label>Total Objective score <small></small></label>
					      			<div class="input-group">
							            <div class="input-group-addon">
							                <i class="fa fa-percent"></i>
							            </div>
							            <input class="form-control" name="qmobjtotalscore" 
							            type="number" placeholder="Total Objective Score"/>
							          	
							        </div>
					  			</div>
					  		</div>
							<!-- Question media objective counter and model answers upload section-->
							<div class="col-sm-12 clearboth marginauto">
								<div class="form-group">
					                <label>Number Of Obj Entries <small>Max of 150</small></label>
					      			<div class="input-group">
							            <div class="input-group-addon">
							                <i class="fa fa-check"></i>
							            </div>
							            <input class="form-control" name="qmobjoptionscount" 
							            type="number" value="1" min="1" max="150" 
							            data-valset="" data-valcount="" data-counter="true"/>

							          	<div class="input-group-addon nopadding">
							      														
						      				<a href="##" data-type="" 
					                		data-name="qmobjoptionscount_addlink" 
					                		data-i-type="" 
					                		data-limit="150"
						      				onclick="multipleElGenerator('form[name=<?php echo $formtruetype2;?>] a[data-name=qmobjoptionscount_addlink]','','form[name=<?php echo $formtruetype2;?>] div.qmobjoptions-field-hold',$('form[name=<?php echo $formtruetype2;?>] div.qmobjoptions-field-hold .multi_content_hold').length,$('form[name=<?php echo $formtruetype2;?>] input[name=qmobjoptionscount]').val(),'form[name=<?php echo $formtruetype2;?>] input[name=qmobjoptionscount]')" 
						      				class="bs-igicon blockdisplay bg-gradient-darkgreen background-color-darkgreen background-color-orangehover bg-orange-gradienthover color-white color-darkgreyfocus color-darkgreyhover">
						                    	<i class="fa fa-arrow-right"></i>
						      				</a>
							            </div>
							        </div>
					  			</div>
					  		</div>
					  		<!-- Question Media Objective answers section -->
							<div class="col-md-12 qmobjoptions-field-hold float-none">
								<div class="col-sm-6 _no-margin multi_content_hold" data-type="triggerprogenitor" data-cid="1" data-name="qmobjoptions">
									<div class="form-group">
										<label class="multi_content_countlabels"
											>Obj Options <small>Entry 1</small>
										</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-file-image-o"></i>
											</div>

											<select name="qmediaobjans1" data-crt="true"
											class="form-control">
												<option value=""
												>--Choose--</option>
												<option value="1">Option A</option>
												<option value="2">Option B</option>
												<option value="3">Option C</option>
												<option value="4">Option D</option>
												<option value="5">Option E</option>
												<option value="6">Option F</option>
											</select>
										</div>
									</div>
								</div>
								<div name="qmobjoptionsentrypoint" data-marker="true"></div>
	                        	<input name="qmobjoptionsdatamap" 
	                        	type="hidden" data-map="true" 
	                        	value="qmediaobjans-:-input">
							</div>
						</div>
					</div><!-- /.col -->

					<!-- Plain data entry -->
					<div class="col-md-12 qplaindata _qdsection <?php if($row['qdatatype']=="media"):?>hidden<?php endif;?>">
		              	<!-- Custom Tabs (Pulled to the right) -->
		              	<div class="nav-tabs-custom _fcustomized">
			                <ul class="nav nav-tabs pull-right">
								<li>
									<a href="#tab_1-2" class="_mdsize" data-toggle="tab">Theory Section</a>
								</li>
								<li class="active">
									<a href="#tab_1-1" class="_mdsize" data-toggle="tab">Objective Section</a>
								</li>
								<li class="pull-left header">
									<i class="fa fa-question-circle"></i> Question Data Entries
								</li>
			                </ul>
			                <div class="tab-content">
			                	<!-- Objective Section -->
				                <div class="tab-pane active" id="tab_1-1">
				                	<!-- Start sub-questiongroup entry section accordion -->
			                        	<div class="col-md-12 objdata-field-hold float-none">
			                        		<!-- Obj Information -->
			                        		<div class="col-sm-6 pull-left">
	                        					<div class="form-group">
	                        						<label>Objective Details</label>
	                        							<textarea class="form-control" 
	                        							rows="5" 
                      									name="objdetails" 
                      									placeholder="Specify any information concerning the objective section"
                      									></textarea>	
	                        					</div>
		                        			</div>
			                        		<!-- Objective total score -->
											<div class="col-sm-6  pull-right">
												<div class="form-group">
									                <label>Specify total objective score</label>
									      			<div class="input-group">
											            <div class="input-group-addon">
											                <i class="fa fa-book"></i>
											            </div>
											            <input class="form-control" name="objtotalscore" 
											            type="number" placeholder="Provide total score for objective questions"/>
											        </div>
									  			</div>
									  		</div>
			                            	<!-- Objective Questions counter -->
											<div class="col-sm-6  pull-right">
												<div class="form-group">
									                <label>Select Number of Objective Questions <small>Max of 60 at a time</small></label>
									      			<div class="input-group">
											            <div class="input-group-addon">
											                <i class="fa fa-book"></i>
											            </div>
											            <input class="form-control" name="objdatacount" 
											            type="number" value="1" min="1" max="60" 
											            data-valset="" data-valcount="" data-counter="true"/>
											          	<div class="input-group-addon nopadding">
											      														
										      				<a href="##" data-type="" 
									                		data-name="objdatacount_addlink" 
									                		data-i-type="" 
									                		data-limit="60"
										      				onclick="multipleElGenerator('form[name=<?php echo $formtruetype2;?>] a[data-name=objdatacount_addlink]','','form[name=<?php echo $formtruetype2;?>] div.objdata-field-hold',$('form[name=<?php echo $formtruetype2;?>] div.objdata-field-hold .multi_content_hold').length,$('form[name=<?php echo $formtruetype2;?>] input[name=objdatacount]').val(),'form[name=<?php echo $formtruetype2;?>] input[name=objdatacount]')" 
										      				class="bs-igicon blockdisplay bg-gradient-darkgreen background-color-darkgreen background-color-orangehover bg-orange-gradienthover color-white color-darkgreyfocus color-darkgreyhover">
										                    	<i class="fa fa-arrow-right"></i>
										      				</a>
											            </div>
											        </div>
									  			</div>
									  		</div>

				                        	<div class="col-md-12 multi_content_hold" data-type="triggerprogenitor" data-cid="1" data-name="objdata">
			                        			<!-- main question section -->
			                        			<div class="col-sm-6 nopadding _first">
			                        				<div class="col-xs-12">
			                        					<h4 class="multi_content_countlabels pull-left"
			                        						>Question Entry 1
			                        					</h4>
			                        					
			                        				</div>
			                        				<div class="col-xs-12 _objquestionsection">
			                        					<div class="form-group">
			                        						<?php echo $mcetools;?>
                          									<textarea class="form-control" rows="10" 
                          									name="question1" 
                          									placeholder="Optional Description"
                          									data-mce="true"
                          									data-type="tinymcefield"
                          									id="questionentry"
                          									></textarea>

			                        					</div>
			                        				</div>
			                        				<div class="col-xs-12 _editoptionsection">
			                        				</div>
			                        			</div>
			                        			<!-- Question options -->
			                        			<div class="col-sm-6 _second">
			                        				<?php
			                        					for($i=1;$i<=6;$i++){
			                        						// this represents the value of the current question being managed
			                        						$v=1;
			                        				?>
			                        				<!-- OPTION -->
			                        				<div class="form-control overflowhidden clearboth _optionview">
			                        					<div class="input-group" data-isprev-parent="<?php echo "$i";?>gd_countx">
			                        						<input type="text" name="option<?php echo "$i$v";?>"
			                        						class="form-control" placeholder="Option Entry <?php echo "$i";?>"/>
			                        						<!-- Attachment section -->
			                        						<div class="input-group-addon nopadding rel">
			                        							<span class="fileinput-button btn btn-primary _optionattach">
																	<i class="fa fa-plus qofdata"></i>
																	<input type="file" 
																	data-isprev-id="<?php echo "$i";?>gd_countx"
																	name="qoptimg<?php echo "$i$v";?>" 
																	title="Attach Image"
																	data-toggle="tooltip"
																	data-tip="Attach Image"
																	onchange="isPrev($(this),'true')"/>
																</span>
			                        						</div>
															<!-- fileviewer -->
			                        						<div class="input-group-addon nopadding _isprev hidden">
																<a href="##" data-src="" class="_isprevlink bs-igicon bg-darkgreen-gradient bg-green-gradienthover color-white color-whitehover"
																data-lightbox="qoptimg<?php echo "$i$v";?>"
												                    title="View image" >
												                    <i class="fa fa-eye"></i>
												                </a>
			                        						</div>
			                        						<!-- Delete file section -->
			                        						<div class="input-group-addon nopadding hidden">
																<a href="##" data-src="" class="bs-igicon _stacked bg-red-gradient 
																 color-white color-whitehover color-whitefocus"
												                    title="Delete Attached Image" >
												                    <i class="fa fa-trash"></i>
												                    <input type="checkbox" 
																	data-isprev-id="<?php echo "$i$v";?>"
																	name="qoptimgdelete<?php echo "$i$v";?>" 
																	title="Mark to Delete Attached Image"
																	data-tip="Mark to Delete Attached Image"/>
												                </a>
												                <input type="hidden" 
																	data-isprev-id="<?php echo "$i$v";?>"
																	name="qoptimgdelete<?php echo "$i$v";?>" 
																	data-tip="Delete Attached Media"/>
																
			                        						</div>
			                        					</div>
			                        				</div>
			                        				<?php
			                        					}
			                        				?>
			                        				<!-- OPTION Answer-->
			                        				<div class="form-control overflowhidden clearboth _optionview">
			                        					<div class="input-group">
			                        						<div class="input-group-addon">
			                        							<i class="fa fa-check"></i>
			                        						</div>
				                        					<select name="answer1" class="form-control">
				                        						<option value="">--Select Options Answer--</option>
				                        						<?php
						                        					for($i=1;$i<=6;$i++){
						                        				?>
				                        						<option value="<?php echo $i;?>">Option Entry <?php echo $i;?></option>
				                        						<?php
						                        					}
						                        				?>
				                        					</select>
			                        					</div>
			                        				</div>
			                        			</div>
				                        	</div>
				                        	<div name="objdataentrypoint" data-marker="true"></div>
				                        	<input name="objdatadatamap" 
				                        	type="hidden" data-map="true" 
				                        	value="question-:-textarea<|>
				                        	option1-:-input<|>qoptimg1-:-input<|>
				                        	option2-:-input<|>qoptimg2-:-input<|>
				                        	option3-:-input<|>qoptimg3-:-input<|>
				                        	option4-:-input<|>qoptimg4-:-input<|>
				                        	option5-:-input<|>qoptimg5-:-input<|>
				                        	option6-:-input<|>qoptimg6-:-input<|>
				                        	answer-:-select" />
			                            </div>
			                        <!-- end edit section accordion -->
				                </div><!-- /.tab-pane -->

			                  	<!-- Theory Section -->
			                  	<div class="tab-pane" id="tab_1-2">
				                	<!-- Start Theory entry section accordion -->
			                        	<div class="col-md-12 theorydata-field-hold float-none">
			                        		<!-- Theory Information -->
			                        		<div class="col-sm-6 pull-left">
	                        					<div class="form-group">
	                        						<label>Theory Details</label>
	                        							<textarea class="form-control" 
	                        							rows="5" 
                      									name="theorydetails" 
                      									placeholder="Specify any information concerning the theory section"
                      									></textarea>	
	                        					</div>
		                        			</div>
			                        		
									  		<!-- total theory score  -->
											<div class="col-sm-6 _modelanswers">
												<div class="form-group">
									                <label>Total Theory score</label>
									      			<div class="input-group">
											            <div class="input-group-addon">
											                <i class="fa fa-list"></i>
											            </div>
											            <input class="form-control" name="theorytotalscore"
											            type="number" min="1" placeholder="The total theory score"/>
											        </div>
									  			</div>
									  		</div>
									  		<!-- Total theory score -->
									  		<div class="col-sm-6 ">
												<div class="form-group">
									                <label>Select Number of Theory questions to be uploaded <small>Max of 10 at a time</small></label>
									      			<div class="input-group">
											            <div class="input-group-addon">
											                <i class="fa fa-book"></i>
											            </div>
											            <input class="form-control" name="theorydatacount" 
											            type="number" value="1" min="1" max="10" 
											            data-valset="" data-valcount="" data-counter="true"/>
											          	<div class="input-group-addon nopadding">
											      														
										      				<a href="##" data-type="" 
									                		data-name="theorydatacount_addlink" 
									                		data-i-type="" 
									                		data-limit="10"
										      				onclick="multipleElGenerator('form[name=<?php echo $formtruetype2;?>] a[data-name=theorydatacount_addlink]','','form[name=<?php echo $formtruetype2;?>] div.theorydata-field-hold',$('form[name=<?php echo $formtruetype2;?>] div.theorydata-field-hold .multi_content_hold').length,$('form[name=<?php echo $formtruetype2;?>] input[name=theorydatacount]').val(),'form[name=<?php echo $formtruetype2;?>] input[name=theorydatacount]')" 
										      				class="bs-igicon blockdisplay bg-gradient-darkgreen background-color-darkgreen background-color-orangehover bg-orange-gradienthover color-white color-darkgreyfocus color-darkgreyhover">
										                    	<i class="fa fa-arrow-right"></i>
										      				</a>
											            </div>
											        </div>
									  			</div>
									  		</div>
									  		<div class="clearboth"></div>
				                        	<div class="col-md-6 nopadding multi_content_hold" data-type="triggerprogenitor" data-cid="1" data-name="theorydata">
			                        			<!-- main question section -->
			                        			<div class="col-sm-12  nopadding _first">
			                        				<div class="col-xs-12">
			                        					<h4 class="multi_content_countlabels pull-left"
			                        						>Theory Question Entry 1
			                        					</h4>
			                        					
			                        				</div>
			                        				<div class="col-xs-12">
			                        					<div class="form-group">
			                        						<div class="input-group">
			                        							<div class="input-group-addon">
			                        								<i class="fa fa-list"></i>
			                        							</div> 
				                        						<input class="form-control" name="theoryqscore1" 
													            type="number"  min="1" max="" placeholder="Total Score for current question" />
			                        						</div>
			                        					</div>
				                        			</div>
			                        				<div class="col-xs-12  _objquestionsection">
			                        					<div class="form-group">
			                        						<?php echo $mcetools;?>
                          									<textarea class="form-control" rows="10" 
                          									name="theoryquestion1" 
                          									placeholder="Theory Question"
                          									data-mce="true"
                          									data-type="tinymcefield"
                          									id="questionentryt"
                          									></textarea>
                          									

			                        					</div>
			                        				</div>
			                        				<div class="col-xs-12 _objquestionsection">
			                        					<div class="form-group">
			                        						<label>Model Answer </label>
			                        							<textarea class="form-control" rows="10" 
                              									name="theoryqmodelanswer1" 
                              									placeholder="Model Answer"
                              									></textarea>	
			                        					</div>
				                        			</div>
			                        				<div class="col-xs-12 _editoptionsection">
			                        				</div>
			                        			</div>

				                        	</div>
											<div name="theorydataentrypoint" data-marker="true"></div>
				                        	<input name="theorydatadatamap" 
				                        	type="hidden" data-map="true" 
				                        	value="theoryqscore-:-input<|>
				                        	theoryquestion-:-textarea<|>theoryqmodelanswer-:-textarea" />
			                            </div>

			                        <!-- end theory section accordion -->


			                    </div><!-- /.tab-pane -->

			                </div><!-- /.tab-content -->

			            </div><!-- nav-tabs-custom -->
			        </div><!-- /.col -->

					<input type="hidden" name="fdgenmax" data-fdgen="true" value="<?php echo $inimaxupload;?>"/> 
                    <input type="hidden" name="extraformdata" 
                    value="qgroupset-:-select<|>
                    course-:-select<|>
                    qdatatype-:-select<|>
                    qentrytype-:-select<|>
                    qdate-:-input<|>
                    qtime-:-input<|>
                    status-:-select<|>

                    qmtheorytotalscore-:-input-:-[group-|-qdatatype-|-select-|-media-|-qentrytype-|-select-|-mixed:*:theory]<|>
                    egroup|data-:-[qmediacount>|<
                    qimage-|-input|image]-:-groupfall[1]-:-[single-|-qdatatype-|-select-|-media-|-qimage]<|>
                    egroup|data-:-[qmanswerscount>|<
                    qmanswer-|-input|image]-:-groupfall[1]-:-[group-|-qdatatype-|-select-|-media-|-qentrytype-|-select-|-mixed:*:theory-|-qimage]<|>
                    qmobjtotalscore-:-input-:-[group-|-qdatatype-|-select-|-media-|-qentrytype-|-select-|-mixed:*:obj]<|>
                    egroup|data-:-[qmobjoptionscount>|<
                    qmediaobjans-|-select]-:-groupfall[1]-:-[group-|-qdatatype-|-select-|-media-|-qentrytype-|-select-|-mixed:*:obj-|-qmediaobjans]<|>
                    
                    objtotalscore-:-input-:-[group-|-qdatatype-|-select-|-plain-|-qentrytype-|-select-|-mixed:*:obj]<|>
                    egroup|data-:-[objdatacount>|<
                    question-|-textarea>|<
                    option1-|-input>|<
                    option2-|-input>|<
                    option3-|-input-|-(group-*-answer-*-select-*-3)>|<
                    option4-|-input-|-(group-*-answer-*-select-*-4)>|<
                    option5-|-input-|-(group-*-answer-*-select-*-5)>|<
                    option6-|-input-|-(group-*-answer-*-select-*-6)>|<
                    answer-|-select]-:-groupfall[1-2,2-3,3-8,8-1,4-8,5-8,6-8,7-8]-:-[group-|-qdatatype-|-select-|-plain-|-qentrytype-|-select-|-mixed:*:obj-|-question]<|>
                    theorytotalscore-:-input-:-[group-|-qdatatype-|-select-|-plain-|-qentrytype-|-select-|-mixed:*:theory]<|>
                    egroup|data-:-[theorydatacount>|<
                    theoryquestion-|-textarea]-:-groupfall[1]-:-[group-|-qdatatype-|-select-|-plain-|-qentrytype-|-select-|-mixed:*:theory-|-theoryquestion]"/>
                    
                    <input type="hidden" name="errormap" 
                    value="qgroupset-:-Please select a question group<|>
                    course-:-Please choose a course<|>
                    qdatatype-:-NA<|>
                    qdataentry-:-NA<|>
                    qdate-:-Please choose the date for this examination entry<|>
                    qtime-:-Please choose the duration of this examination entry<|>
                    status-:-NA<|>
                    qmtheorytotalscore-:-Please give the total score accrueable to the theory<|>
	                egroup|data-:-[Please Choose the scanned question image]<|>
	                egroup|data-:-[Please Choose the scanned model answer image]<|>
                    qmobjtotalscore-:-Please provide the total score of the objective data entries<|>
                    egroup|data-:-[Please provide the correct answer to objective questions]<|>
                    objtotalscore-:-Please provide the total score of the objective data entries<|>
                    egroup|data-:-[Please provide the question>|<
                    Please provide the option>|<
                    Please provide another option>|<
                    Please Provide Option 3>|<
                    Please Provide Option 4>|<
                    Please Provide Option 5>|<
                    Please Provide Option 6>|<
                   	Please Choose the correct answer]<|>
                   	theorytotalscore-:-Please give the total score accrueable to the theory questions<|>
                    egroup|data-:-[Please provide the Theory question. Check the Theory Tab]"/>
                    <div class="col-md-12 clearboth">
		                <div class="box-footer">
		                    <input type="button" class="btn btn-danger" name="createentry" data-formdata="<?php echo $formtruetype2;?>" onclick="submitCustom('<?php echo $formtruetype2;?>','complete')" value="Create/Update"/>
		                     <small>Maximum file upload size for server is:<?php echo $inimaxupload;?></small>
		                </div>
		            </div>
				</form>	
	      

				<script>
					$(document).ready(function(){
						var curmceadminposter=[];
						curmceadminposter['width']="100%";
						curmceadminposter['height']="500px";
						curmceadminposter['toolbar1']="undo redo | bold italic underline | fontselect fontsizeselect | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect";
						curmceadminposter['toolbar2']="| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ";
						callTinyMCEInit("textarea#adminposter",curmceadminposter);
						
						var curmcethreeposter=[];
						curmcethreeposter['width']="100%";
						curmcethreeposter['height']="300px";
						curmcethreeposter['toolbar2addon']=" | preview code ";
						callTinyMCEInit("textarea[id*=postersmallthree]",curmcethreeposter);
						
						var curmcethreeposter=[];
						curmcethreeposter['width']="100%";
						curmcethreeposter['height']="300px";
						curmcethreeposter['toolbar2addon']=" | preview code ";
						callTinyMCEInit("textarea[id*=postersmalltwo]",curmcethreeposter);
						<?php echo $totalscripts;?>
						// init select2
						if($.fn.select2){
							$('select[data-name=select2plain]').select2({
							    theme: "bootstrap"
							});
							$('select[data-name=faselect]').select2({
							    theme: "bootstrap",
							    templateResult: faSelectTemplate
							});
						}
						// inputmask
						if($.fn.datetimepicker){
						    $('[data-timepick*=true]').datetimepicker({
					          format:"HH:mm"/*,
					          keepOpen:true*/
						    });
						}
						
					});
				</script>	
	        </div>
<?php			
		}else if($viewtype=="paginate"){
			// for pagination there are variables available which are common
			// to the 'paginationpagesout' displaytype in the display.php
			// file
			// $generalpagesdata = the total session array carrying data for current
			// transaction all other variables available are actually gotten
			// from various indexes in this array.

			// $data=array for entry 
			// $outputtype
			// the $outputtype combination is as follows
			// viewtype|viewer|type/type][typeval
			
			$cdata=explode("|", $outputtype);
			// var_dump($datamap);
			$vtype=$cdata[0];
			$viewer=$cdata[1];
			$type=isset($cdata[2])?$cdata[2]:"";
			$type="blockdeeprun";
			// echo "the data dump";
			// var_dump($data);

			
			// check to see if the type section is in its compound state
			$data["single"]["type"]="blockdeeprun";
			
			// parse the current datamap, this will throw an error if the 
			// map is malformed, its here mainly for debugging purposes
			$curmap=json_decode($data["single"]["datamap"]);

			// get the next set of paginated content
			$pagout= getAllQuestionGroups($viewer,$limit,$type,$data);
			
			if (isset($data['subpcoutput'])&&$data['subpcoutput']!=="") {
				# code...
				// output the secondary generic function output
				echo $pagout['genericouttwo'];

			}else{
				// output the default secondary pagination output of the 
				// current function
				echo $pagout['adminoutputtwo'];

			}

			// destroy the outputted array to free up some space... just in case
			unset($pagout);
		}
	}
?>