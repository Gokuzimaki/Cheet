<?php
	/**
	*	qgroups.php. 
	*	this file holds the views for creating/editting question groups, e.g 
	*	SAT, TOEFL e.t.c
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
		$viewertype=isset($viewertype)?$viewertype:"admin";

		// manage the datamap to be passed into called function
		if(isset($datamap)&&isset($contentgroupdatageneral['datamap'])){

			$data['single']['datamap']=$contentgroupdatageneral['datamap'];
			$localdatamap=$data['single']['datamap'];
		}

		// seperate data set for displaying only the editsection of blog category entries
		// when particular requests are made with the following viewtypes
		
		
		// this section handles the display of search data
		if($viewtype=="qgroupplain_crt"){
			$viewdata="qgroupplain";
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
				$extra.="$qcat (title LIKE '%$title%' OR acronym LIKE '%$title%')";
				$titlesq="$qcat (title LIKE '%$title%' OR acronym LIKE '%$title%')";
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
				$col="regdate";
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

			

			// grouptype
			$grouptypesq="";
			if(isset($gd_dataoutput['grouptype'])&&
				$gd_dataoutput['grouptype']!==""){
				$qcat=$extra==""?"":" AND";
				$grouptype=$gd_dataoutput['grouptype'];
				if($grouptype=="hassubgroup"){
					$data['grouptypedata']=$grouptype;

				}else if ($grouptype=="hassubject") {
					# code...
					$extra.="$qcat EXISTS(SELECT * FROM qscentries WHERE 
					qgid=`qgroup`.`id` AND `qscentries`.`status`='active')";
					$grouptypesq="$qcat EXISTS(SELECT * FROM qscentries WHERE 
					qgid=`qgroup`.`id` AND `qscentries`.`status`='active')";

				}

			}

			// status
			$statussq="";
			if(isset($gd_dataoutput['status'])&&
				$gd_dataoutput['status']!==""){
				$qcat=$extra==""?"":" AND";
				$status=$gd_dataoutput['status'];
				$extra.="$qcat status='$status'";
				$statussq="$qcat status='$status'";
			}

			// coursetitle
			$coursetitlesq="";
			if(isset($gd_dataoutput['coursetitle'])&&
				$gd_dataoutput['coursetitle']!==""){
				$qcat=$extra==""?"":" AND";
				$coursetitle=$gd_dataoutput['coursetitle'];
				$extra.="$qcat EXISTS(SELECT * FROM qscentries WHERE 
					qgid=`qgroup`.`id` AND `qscentries`.`status`='active'
					AND title LIKE '%$coursetitle%')";
				$coursetitlesq="$qcat EXISTS(SELECT * FROM qscentries WHERE 
					qgid=`qgroup`.`id` AND `qscentries`.`status`='active'
					AND title LIKE '%$coursetitle%')";
			}

			// custom viewtype
			if(isset($gd_dataoutput['cvtype'])&&
				$gd_dataoutput['cvtype']!==""){
				$cvtype=$gd_dataoutput['cvtype'];
				// change the viewerdata index so the query can search for
				// all question group types
				$data['viewerdata']="WHERE id>0";
				if($cvtype=="editqgsubjects_crt"){
					// $qcat=$extra==""?"":" AND";
					// in this section, the grouptype value has already been set
					// to "hassubject" so this query simply completes it
					$titlesq2=$titlesq!==""?"AND $titlesq":"";
					$extra.=" OR (type='sub' $titlesq2 $coursetitlesq $statussq)";
				}
			}

			

			if(isset($gd_dataoutput['viewextra'])){
				$ve=$gd_dataoutput['viewextra'];
				$qcat=$extra==""?"":" AND";
				if($ve=="inactiveqgroups_crt"){
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

			$viewdata="qgroupplain";

			if($viewtype=="newqgroup_crt"){
				// $viewdata="blogschedule";
				$newh="";
				$edithide="hidden";
				$newin="in";
				$editin=""; 
				$outsdata['numrows']=0;
			}else if($viewtype=="editqgroup_crt"){
				// $viewdata="blogschedule";
				$data["single"]["type"]="blockdeeprun";
				// $data['queryextra']=" (scheduledpost='no' OR scheduledpost='')";
				$outsdata=getAllQuestionGroups("$viewertype",'','blockdeeprun',$data);
				$newhide="hidden";
				$newin="";
				$edithide="";
				$editin="in";
			}else if($viewtype=="editqgsubjects_crt"){
				// $viewdata="blogschedule";
				$title="Question Group Courses/Subjects";
				$data["single"]["type"]="blockdeeprun";
				$data['viewerdata']="WHERE status='active'";
				$data['queryextra']=" EXISTS(SELECT * FROM qscentries WHERE 
					qgid=`qgroup`.`id` AND `qscentries`.`status`='active') OR 
					(type='sub' AND status='active')";
				$outsdata=getAllQuestionGroups("$viewertype",'','blockdeeprun',$data);
				// echo $outsdata['cqtdata'];
				$newhide="hidden";
				$newin="";
				$edithide="";
				$editin="in";
			}else{
				$data["single"]["type"]="blockdeeprun";
				$data['queryextra']=" ";
				$outsdata=getAllQuestionGroups('admin','','',$data);
	
			}


			if($outsdata['numrows']>0){
				// entries are available
				// $editin="in";
				// $newin="";
				
			}
			// check for the last code entry data value

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
							<!-- Full title -->
							<div class="col-sm-4"> 
                                <div class="form-group">
                                    <label>Full Title</label>
                                    <div class="input-group">
	                                      <div class="input-group-addon">
	                                        <i class="fa fa-file-text"></i>
	                                      </div>
										  <input type="text" 
										  placeholder="Q.Group Full Title" 
										  name="qgrouptitle" class="form-control"/>
										  	
	                                </div><!-- /.input group -->
                              	</div><!-- /.form group -->
                            </div>
                            <!-- Acronym -->
                            <div class="col-sm-4"> 
                                <div class="form-group">
                                    <label>Acronym <small>Short form title</small>
                                    </label>
                                    <div class="input-group">
	                                      <div class="input-group-addon">
	                                        <i class="fa fa-file-text"></i>
	                                      </div>
										  <input type="text" 
										  placeholder="Q.Group Acronym"  
										  name="acronym" class="form-control"/>
										  	
	                                </div><!-- /.input group -->
                              	</div><!-- /.form group -->
                            </div>
                            <!-- Coverphoto -->
                            <div class="col-sm-4"> 
                                <div class="form-group">
                                    <label>Image</label>
                                    <div class="input-group">
	                                      <div class="input-group-addon">
	                                        <i class="fa fa-file-image-o"></i>
	                                      </div>
											<input type="file" placeholder="Choose image" name="profpic" class="form-control"/>
	                                </div><!-- /.input group -->
                              	</div><!-- /.form group -->
                            </div>
                            <!-- keywords -->
                            <div class="col-sm-6"> 
                                <div class="form-group">
                                    <label>SEO Keywords 
                                    	<small>Comma seperated search word list</small></label>
                                    <div class="input-group">
	                                      <div class="input-group-addon">
	                                        <i class="fa fa-file-text-o"></i>
	                                      </div>
										<textarea rows="4" 
										placeholder="Provide comma seperated list of possible search words and phrases" 
										name="seometakeywords" 
										class="form-control"></textarea>
	                                </div><!-- /.input group -->
                              	</div><!-- /.form group -->
                            </div>
                            <!-- seo description -->
                            <div class="col-md-6">
                            	<div class="form-group">
									<label>SEO Description
										<small>Short and conscise description for
										 question group content</small>
									</label>
									<textarea name="seodescription" rows="4"
									data-wMax="160"
									data-wMax-type="length" 
									data-wMax-fname="<?php echo $formtruetype;?>"
									Placeholder="Put something that interests possible readers here." 
									class="form-control"></textarea>
                            	</div>
							</div>
							<!-- details -->
                            <div class="col-md-12">
                                <label>Full Question Group details:</label>
                                <textarea class="form-control" rows="3" 
                                name="details" data-mce="true" id="postersmallthree" 
                                placeholder="The message here"
                                ></textarea>
                            </div>
                            <!-- grouptype -->
                            <div class="col-sm-6"> 
                                <div class="form-group">
                                    <label>Data Details</label>
                                    <div class="input-group select2-bootstrap-prepend">
	                                      <div class="input-group-addon">
	                                        <i class="fa fa-file-text"></i>
	                                      </div>
										  	<select name="grouptype"
										  	class="form-control">
												<option value="hassubject">Has Course/Subject Entries</option>
												<option value="hassubgroup">Has Sub groups</option>
											</select>
	                                </div><!-- /.input group -->
                              	</div><!-- /.form group -->
                            </div>

                            <!-- Start course-group entry section accordion -->
	                        	<div class="box-group top_pad high_bottom_margin _hassubject _gt" 
	                        	data-type="" id="contentaccordion2">
									<div class="panel box box-primary overflowhidden">
								    	<div class="box-header with-border">
									        <h4 class="box-title">
									          <a data-toggle="collapse" data-parent="#contentaccordion2" href="#headBlock_group">
									            <i class="fa fa-file-image-o"></i>
									            	Question Group Course/Subjects 
									          </a>
									        </h4>
								    	</div>
								      	<div id="headBlock_group" class="panel-collapse collapse in">
								      		<div class="col-md-6 clearboth marginauto">
								      			<div class="form-group">
								                    <label>Select Number of Course/Subjects for entry</label>
									      			<div class="input-group">
											            <div class="input-group-addon">
											                <i class="fa fa-book"></i>
											            </div>
											            <input class="form-control" name="csgroupscount" 
											            type="number" value="1" min="1" max="100" 
											            data-valset="1" data-valcount="1" data-counter="true"/>
											          	<div class="input-group-addon nopadding">
											      														
										      				<a href="##" data-type="" 
							                        		data-name="csgroupscount_addlink" 
							                        		data-i-type="" 
							                        		data-limit="100"
										      				onclick="multipleElGenerator('form[name=<?php echo $formtruetype;?>] a[data-name=csgroupscount_addlink]','','form[name=<?php echo $formtruetype;?>] div.csgroups-field-hold',$('form[name=<?php echo $formtruetype;?>] div.csgroups-field-hold .multi_content_hold').length,$('form[name=<?php echo $formtruetype;?>] input[name=csgroupscount]').val(),'form[name=<?php echo $formtruetype;?>] input[name=csgroupscount]')" class="bs-igicon blockdisplay bg-gradient-darkgreen background-color-darkgreen background-color-orangehover bg-orange-gradienthover color-white color-darkredhover">
										                    	<i class="fa fa-arrow-right"></i>
										      				</a>
											            </div>
											        </div>
								      			</div>
								      		</div>
				                            <div class="col-md-12 csgroups-field-hold ">
					                        	<div class="col-md-3 multi_content_hold" data-type="triggerprogenitor" data-cid="1" data-name="csgroups">
					                        		<h4 class="multi_content_countlabels">Course/Subject (Entry 1)</h4>
					                        		<div class="col-sm-12">
					                        			<div class="form-group">
								                            <label>Course/Subject Details</label>
								                            <div class="input-group">
								                              <div class="input-group-addon">
								                                <i class="fa fa-file-text"></i>
								                              </div>
								                              <input type="text" 
								                              class="form-control" 
								                              name="coursetitle1" 
								                              placeholder="Provide Title">
								                            </div><!-- /.input group -->
								                            <div class="input-group">
								                              <div class="input-group-addon">
								                                <i class="fa fa-clock-o"></i>
								                              </div>
								                              <input type="text" 
								                              class="form-control" 
								                              data-timepick="true{gc_x}"
								                              name="duration1" 
											          		  onblur="negateDefault($(this),['00:00'])"
								                              placeholder="Exam Duration hh:mm">
								                            </div><!-- /.input group -->
								                        </div><!-- /.form group -->
					                        		</div>
					                        	</div>
					                        	<input name="csgroupsdatamap" type="hidden" 
					                        	data-map="true" 
					                        	value="coursetitle-:-input<|>duration-:-input">
					                        	<input name="csgroupsfuncdata" type="hidden" value="{'func':['datetimepicker'],
		                                    	'selectors':['[data-timepick*=true]'],
		                                    	'typegd':['encapsjq'],
		                                    	'params':[['format','``HH:mm``']]}">
					                        	<div name="csgroupsentrypoint" data-marker="true"></div>
				                            </div>
			                        	</div>
	                        		</div>
	                        	</div>		
	                        <!-- end course-group entry section accordion -->

                            <!-- Start sub-questiongroup entry section accordion -->
	                        	<div class="box-group top_pad high_bottom_margin _hassubgroup _gt hidden" data-type="subqgroup"
	                        	id="contentaccordion">
									<div class="panel box box-primary overflowhidden">
								    	<div class="box-header with-border">
									        <h4 class="box-title">
									          <a data-toggle="collapse" data-parent="#contentaccordion" href="#headBlock_group2">
									            <i class="fa fa-file-image-o"></i>
									            	Sub Question Groups
									          </a>
									        </h4>
								    	</div>
								      	<div id="headBlock_group2" class="panel-collapse collapse in">
				                            <div class="col-md-12 subqgroup-field-hold ">
				                            	<input type="hidden" name="subqgroupcount" class="form-control" value="1" data-counter="true"/>
					                        	<!-- <h3>Maximum of 10 images at a time</h3> -->
					                        	<div class="col-md-3 multi_content_hold" data-type="triggerprogenitor" data-cid="1" data-name="subqgroup">
					                        		<h4 class="multi_content_countlabels">Sub Q.Group (Entry 1)</h4>
					                        		<div class="col-sm-12">
					                        			<div class="form-group">
								                            <label>SubGroup Details</label>
								                            <div class="input-group">
								                              <div class="input-group-addon">
								                                <i class="fa fa-file-text"></i>
								                              </div>
								                              <input type="text" class="form-control" name="title1" placeholder="Provide Title ">
								                            </div><!-- /.input group -->
								                            <div class="input-group">
								                              <div class="input-group-addon">
								                                <i class="fa fa-file-text"></i>
								                              </div>
								                              <input type="text" class="form-control" 
								                              name="acronymini1" placeholder="Acronym if applicable">
								                            </div><!-- /.input group -->
								                        </div><!-- /.form group -->
					                        		</div>
					                        		<div class="col-sm-12">
					                        			<div class="form-group">
								                            <label>Description</label>
								                            <div class="input-group">
								                              <div class="input-group-addon">
								                                <i class="fa fa-file-text"></i>
								                              </div>
								                              <textarea class="form-control" rows="3" name="description1" placeholder="Optional Description"></textarea>
								                            </div><!-- /.input group -->
								                        </div><!-- /.form group -->
					                        		</div>
					                        	</div>
					                        	<div name="subqgroupentrypoint" data-marker="true"></div>
					                        	<input name="subqgroupdatamap" 
					                        	type="hidden" data-map="true" 
					                        	value="title-:-input<|>acronymini-:-input<|>description-:-textarea">
					                        	<a href="##" class="generic_addcontent_trigger" 
					                        		data-type="triggerformaddlib" 
					                        		data-name="subqgroupcount_addlink" 
					                        		data-i-type="" 
					                        		data-limit="100"> 
					                        		<i class="fa fa-plus"></i>Add More?
					                        	</a>
				                            </div>
			                        	</div>
	                        		</div>
	                        	</div>		
	                        <!-- end edit section accordion -->
                            
                            <input type="hidden" name="extraformdata" 
                            value="qgrouptitle-:-input<|>
                            acronym-:-input<|>
                            profpic-:-input|image<|>
                            details-:-textarea<|>

                            egroup|data-:-[subqgroupcount>|<
		                    title-|-input>|<
		                    acronymini-|-input>|<
		                    description-|-textarea]-:-groupfall[1]-:-[single-|-grouptype-|-select-|-hassubgroup-|-title]<|>

		                    egroup|data-:-[csgroupscount>|<
		                    coursetitle-|-input>|<
		                    duration-|-input]-:-groupfall[1,2]-:-[single-|-grouptype-|-select-|-hassubject-|-coursetitle]<|>
                            seometakeywords-:-textarea<|>
                            seodescription-:-textarea"/>
		                    <input type="hidden" name="errormap" value="qgrouptitle-:-Please provide the title for this question group<|>
		                    acronym-:-Please State the acronym for this exam type<|>
		                    profpic-:-NA<|>
                            details-:-Please give a good description for the current question group<|>
			                egroup|data-:-[Please give the subgroup title>|<NA>|<NA]<|>
		                    egroup|data-:-[Please give the course/subject title>|<
		                    Specify the duration for this course/subject entry examination/test]<|>
		                    seometakeywords-:-NA<|>
		                    seodescription-:-NA"/>
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
								<div class="col-md-4">
	                            	<div class="form-group">
										<label>Title</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-file-text-o"></i>
											</div>
											<input name="title" 
											placeholder="Search by Q.Group Title" 
											class="form-control" data-crt="true"/>
												
										</div>
	                            	</div>
								</div>
	                        	
								
								<?php
									if($viewtype=="editqgsubjects_crt"){

								?>
								<input type="hidden" name="grouptype" data-crt="true" value="hassubject"/>
								<!-- Course Title -->
								<div class="col-md-4">
	                            	<div class="form-group">
										<label>Course Title</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-file-text-o"></i>
											</div>
											<input name="coursetitle" 
											placeholder="Search by course/Subject Title" 
											class="form-control" data-crt="true"/>
												
										</div>
	                            	</div>
								</div>
								<?php
									}else{
								?>
								<!-- Grouptype -->
								<div class="col-md-3">
	                            	<div class="form-group">
										<label>GroupType <small>Has subgroup Or Has Courses</small></label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-file-text-o"></i>
											</div>
											<select name="grouptype" data-crt="true"
											class="form-control">
												<option value=""
												>--Choose--</option>
												<option value="hassubject">Has Courses/Subjects</option>
												<option value="hassubgroup">Has Subgroups</option>
											</select>
										</div>
	                            	</div>
								</div>
								<?php
									}
								?>

								<!-- Status -->
								<div class="col-md-4">
			                    	<div class="form-group">
				                        <label>Status <small>Disabled groups are deleted
				                        	at the end of the day</small></label>
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
			$dataset=getSingleQuestionGroup($editid,"",$data);
			$row=$dataset;
			
			$totalscripts=$row['totalscripts'];
			
?>
			<!-- Edit section -->
			<div class="row">
		        <form name="<?php echo $formtruetype2;?>" method="POST" data-type="edit" onSubmit="return false" enctype="multipart/form-data" action="<?php echo $host_addr;?>snippets/edit.php">
					<input type="hidden" name="entryvariant" value="<?php echo $variant2;?>"/>

					<input type="hidden" name="entryid" value="<?php echo $editid;?>"/>
                    <input name="maintype" type="hidden" value="<?php echo $maintype;?>"/>
					<?php
						// hide the mainportion of editcontent to allow focus on only
						// the courses portion
						// echo $viewtype;
                    	if($maintype=="editqgsubjects_crt"){
                    		echo '<div class="hidden">';
                    	}
                    ?>
					<!-- Full title -->
					<div class="col-sm-4"> 
                        <div class="form-group">
                            <label>Full Title</label>
                            <div class="input-group">
                                  <div class="input-group-addon">
                                    <i class="fa fa-file-text"></i>
                                  </div>
								  <input type="text" 
								  placeholder="Q.Group Full Title" 
								  name="qgrouptitle" value="<?php echo $row['title'];?>" class="form-control"/>
								  	
                            </div><!-- /.input group -->
                      	</div><!-- /.form group -->
                    </div>
                    <!-- Acronym -->
                    <div class="col-sm-4"> 
                        <div class="form-group">
                            <label>Acronym <small>Short form title</small>
                            </label>
                            <div class="input-group">
                                  <div class="input-group-addon">
                                    <i class="fa fa-file-text"></i>
                                  </div>
								  <input type="text" 
								  placeholder="Q.Group Acronym"  
								  name="acronym" value="<?php echo $row['acronym'];?>"
								  class="form-control"/>
								  	
                            </div><!-- /.input group -->
                      	</div><!-- /.form group -->
                    </div>
                    <!-- Coverphoto -->
                    <div class="col-sm-4"> 
                        <div class="form-group">
                            <label>Image</label>
                            <div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-file-image-o"></i>
								</div>
								<?php
									if($row['profpicdata']['id']>0){
								?>
									<input type="hidden" name="imgid" value="<?php echo $row['profpicdata']['id'];?>"/>
								<?php
									}
								?>
								<input type="file" placeholder="Choose image" name="profpic" class="form-control"/>
                            </div><!-- /.input group -->
                      	</div><!-- /.form group -->
                    </div>
                    <!-- keywords -->
                    <div class="col-sm-6"> 
                        <div class="form-group">
                            <label>SEO Keywords 
                            	<small>Comma seperated search word list</small></label>
                            <div class="input-group">
                                  <div class="input-group-addon">
                                    <i class="fa fa-file-text-o"></i>
                                  </div>
								<textarea rows="4" 
								placeholder="Provide comma seperated list of possible search words and phrases" 
								name="seometakeywords" 
								class="form-control"
								><?php echo $row['seometakeywords'];?></textarea>
                            </div><!-- /.input group -->
                      	</div><!-- /.form group -->
                    </div>
                    <!-- seo description -->
                    <div class="col-md-6">
                    	<div class="form-group">
							<label>SEO Description
								<small>Short and conscise description for
								 question group content</small>
							</label>
							<textarea name="seodescription" rows="4"
							data-wMax="160"
							data-wMax-type="length" 
							data-wMax-fname="<?php echo $formtruetype2;?>"
							Placeholder="Put something that interests possible readers here." 
							class="form-control"
							><?php echo $row['seometadescription'];?></textarea>
                    	</div>
					</div>
					<!-- details -->
                    <div class="col-md-12">
                        <label>Full Question Group details:</label>
                        <textarea class="form-control" rows="3" 
                        name="details" data-mce="true" id="postersmallthree1" 
                        placeholder="The message here"
                        ><?php echo $row['details'];?></textarea>
                    </div>
                    <div class="col-md-12">
                    	<div class="form-group">
	                        <label>Enable / Disable</label>
	                        <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-exclamation-triangle"></i>
                                </div>
		                        <select name="status" class="form-control">
		                        	<option value="">--Choose--</option>
		                        	<option value="active">Active</option>
		                        	<option value="inactive">Inactive</option>
						  	    </select>
						  	</div>
					  	</div>
                    </div>
                    
                    <?php
						// hide the mainportion of editcontent to allow focus on only
						// the courses portion
						// echo $viewtype;
                    	if($maintype=="editqgsubjects_crt"){
                    		echo '</div>';
                    	}
                    ?>

                    <!-- grouptype -->
                    <input type="hidden" name="grouptype" value="<?php echo $row['grouptype'];?>"/>
                    
                    <?php
                    	$csgcount=$row['qscdata']['total']>0?$row['qscdata']['total']+1:1;
                    	if($row['grouptype']=="hassubject"){

                    ?>
                    <!-- Start course-group entry section accordion -->
                    	<div class="box-group top_pad high_bottom_margin _hassubject _gt" 
                    	data-type="" id="contentaccordion21">
							<div class="panel box box-primary overflowhidden">
						    	<div class="box-header with-border">
							        <h4 class="box-title">
							          <a data-toggle="collapse" data-parent="#contentaccordion21" href="#headBlock_group">
							            <i class="fa fa-file-image-o"></i>
							            	Question Group Course/Subjects 
							          </a>
							        </h4>
						    	</div>
						      	<div id="headBlock_group" class="panel-collapse collapse in">
						      		<div class="col-md-6 clearboth marginauto">
						      			<div class="form-group">
						                    <label>Select Number of Course/Subjects for entry</label>
							      			<div class="input-group">
									            <div class="input-group-addon">
									                <i class="fa fa-book"></i>
									            </div>

									            <input class="form-control" name="csgroupscount" 
									            type="number" 
									            value="<?php echo $csgcount;?>" 
									            min="<?php echo $csgcount;?>" 
									            max="100" 
									            data-valset="1" data-valcount="1" data-counter="true"/>
									          	<div class="input-group-addon nopadding">
									      														
								      				<a href="##" data-type="" 
					                        		data-name="csgroupscount_addlink" 
					                        		data-i-type="" 
					                        		data-limit="100"
								      				onclick="multipleElGenerator('form[name=<?php echo $formtruetype2;?>] a[data-name=csgroupscount_addlink]','','form[name=<?php echo $formtruetype2;?>] div.csgroups-field-hold',$('form[name=<?php echo $formtruetype2;?>] div.csgroups-field-hold .multi_content_hold').length,$('form[name=<?php echo $formtruetype2;?>] input[name=csgroupscount]').val(),'form[name=<?php echo $formtruetype2;?>] input[name=csgroupscount]')" class="bs-igicon blockdisplay bg-gradient-darkgreen background-color-darkgreen background-color-orangehover bg-orange-gradienthover color-white color-darkredhover">
								                    	<i class="fa fa-arrow-right"></i>
								      				</a>
									            </div>
									        </div>
									        <?php
												// hide the mainportion of editcontent to allow focus on only
												// the courses portion
												// echo $viewtype;
						                    	if($maintype=="editqgsubjects_crt"){
						                    	
						                    	
						                    ?>
									        <div class="input-group">
									            <div class="input-group-addon">
									                <i class="fa fa-search"></i>
									            </div>

									            <input class="form-control" 
									            name="csgroupsearch" 
									            type="text"
									            placeholder="Search..." 
									            value="" />
									            <script>
									            	$(document).ready(function(){
									            		$('input[name=csgroupsearch]').CSearch('.csgroups-field-hold div[data-csgview=true]','attribute','data-meta');
									            	})
									            </script>
									        </div>
									        <!-- end input group -->
									        <?php
									        	}
									        ?>
						      			</div>
						      		</div>
		                            <div class="col-md-12 csgroups-field-hold ">
		                            	<?php
		                            		for ($i=1; $i <=$row['qscdata']['total']; $i++) { 
		                            			$n=$i-1;
		                            			$cdata=$row['qscdata'][$n];
		                            			# code...
												$datatype=$i==1?"triggerprogenitor":"triggerprogeny";		                            		
		                            	?>
		                            	
		                            	<div class="col-md-3 multi_content_hold"
		                            	data-csgview="true" data-meta="<?php echo $cdata['title'];?> <?php echo $cdata['duration'];?>" 
		                            	data-type="triggerprogeny" data-name="csgroups">
			                        		<h4 class="multi_content_countlabels">Course/Subject (Entry <?php echo $i;?>)</h4>
			                        		<div class="col-sm-12" >
					                            <input type="hidden" 
					                            	class="form-control" 
					                              	name="qscentryid<?php echo $i;?>" 
					                              	value="<?php echo $cdata['id'];?>"/>

			                        			<div class="form-group">
						                            <label>Course/Subject Details</label>
						                            <div class="input-group">
						                              <div class="input-group-addon">
						                                <i class="fa fa-file-text"></i>
						                              </div>
						                              <input type="text" 
						                              class="form-control" 
						                              title="Course Title"
						                              name="coursetitle<?php echo $i;?>" 
						                              placeholder="Provide Title"
						                              value="<?php echo $cdata['title'];?>">
						                            </div><!-- /.input group -->
						                            <div class="input-group">
						                              <div class="input-group-addon">
						                                <i class="fa fa-clock-o"></i>
						                              </div>
						                              <input type="text" 
						                              class="form-control" 
						                              data-timepick="true{gc_x}"
						                              title="Exam Duration in hh:mm"
						                              name="duration<?php echo $i;?>" 
											          onblur="negateDefault($(this),['00:00'])"
						                              placeholder="Exam Duration hh:mm"
						                              value="<?php echo substr($cdata['duration'], 0,5);?>">
						                            </div><!-- /.input group -->
						                            <div class="input-group">
						                              <div class="input-group-addon">
						                                <i class="fa fa-trash"></i>
						                              </div>
						                              <select name="qscstatus<?php echo $i;?>" 
						                              	class="form-control">
								                        	<option value="">--Choose--</option>
								                        	<option value="active">Active</option>
								                        	<option value="inactive">Inactive</option>
												  	  </select>
						                            </div><!-- /.input group -->
						                        </div><!-- /.form group -->
			                        		</div>
			                        	</div>
		                            	<?php
		                            		}
		                            	?>
			                        	<div class="col-md-3 multi_content_hold" data-type="triggerprogenitor" data-cid="<?php echo $csgcount;?>" data-name="csgroups">
			                        		<h4 class="multi_content_countlabels">Course/Subject (Entry <?php echo $csgcount;?>)</h4>
			                        		<div class="col-sm-12">
			                        			<div class="form-group">
						                            <label>Course/Subject Details</label>
						                            <div class="input-group">
						                              <div class="input-group-addon">
						                                <i class="fa fa-file-text"></i>
						                              </div>
						                              <input type="text" 
						                              class="form-control" 
						                              name="coursetitle<?php echo $csgcount;?>" 
						                              placeholder="Provide Title">
						                            </div><!-- /.input group -->
						                            <div class="input-group">
						                              <div class="input-group-addon">
						                                <i class="fa fa-clock-o"></i>
						                              </div>
						                              <input type="text" 
						                              class="form-control" 
						                              data-timepick="true{gc_x}"
						                              name="duration<?php echo $csgcount;?>" 
											          onblur="negateDefault($(this),['00:00'])"
						                              placeholder="Exam Duration hh:mm">
						                            </div><!-- /.input group -->
						                            <div class="input-group pad_type">
						                              <div class="input-group-addon">
						                                <i class="fa fa"></i>
						                              </div>
						                              
						                            </div><!-- /.input group -->
						                        </div><!-- /.form group -->
			                        		</div>
			                        	</div>
			                        	<input name="csgroupsdatamap" type="hidden" 
			                        	data-map="true" 
			                        	value="coursetitle-:-input<|>duration-:-input">
			                        	<input name="csgroupsfuncdata" type="hidden" value="{'func':['datetimepicker'],
                                    	'selectors':['[data-timepick*=true]'],
                                    	'typegd':['encapsjq'],
                                    	'params':[['format','``HH:mm``']]}">
			                        	<div name="csgroupsentrypoint" data-marker="true"></div>
		                            </div>
	                        	</div>
                    		</div>
                    	</div>		
                    <!-- end course-group entry section accordion -->
                    <?php
                		}
                	?>

                	<?php
                    	$sgcount=$row['subgroupdata']['total']>0?$row['subgroupdata']['total']+1:1;
                    	if($row['grouptype']=="hassubgroup"){
                    ?>

                    <!-- Start sub-questiongroup entry section accordion -->
                    	<div class="box-group top_pad high_bottom_margin _hassubgroup _gt" data-type="subqgroup"
                    	id="contentaccordion11">
							<div class="panel box box-primary overflowhidden">
						    	<div class="box-header with-border">
							        <h4 class="box-title">
							          <a data-toggle="collapse" data-parent="#contentaccordion11" href="#headBlock_group2">
							            <i class="fa fa-file-image-o"></i>
							            	Sub Question Groups
							          </a>
							        </h4>
						    	</div>
						      	<div id="headBlock_group2" class="panel-collapse collapse in">
						      		<div class="col-md-6 clearboth marginauto">
						      			<div class="form-group">
						                    <label>Select Number of Course/Subjects for entry</label>
							      			<div class="input-group">
									            <div class="input-group-addon">
									                <i class="fa fa-book"></i>
									            </div>
									            <input class="form-control" name="subqgroupcount" 
									            type="number" value="<?php echo $sgcount;?>" min="<?php echo $sgcount;?>" max="100" 
									            data-counter="true"/>
									          	<div class="input-group-addon nopadding">
									      														
								      				<a href="##" data-type="" 
					                        		data-name="subqgroupcount_addlink" 
					                        		data-i-type="" 
					                        		data-limit="100"
								      				onclick="multipleElGenerator('form[name=<?php echo $formtruetype2;?>] a[data-name=subqgroupcount_addlink]','','form[name=<?php echo $formtruetype2;?>] div.subqgroup-field-hold',$('form[name=<?php echo $formtruetype2;?>] div.subqgroup-field-hold .multi_content_hold').length,$('form[name=<?php echo $formtruetype2;?>] input[name=subqgroupcount]').val(),'form[name=<?php echo $formtruetype2;?>] input[name=subqgroupcount]')" 
								      				class="bs-igicon blockdisplay bg-gradient-darkgreen background-color-darkgreen background-color-orangehover bg-orange-gradienthover color-white color-darkredhover">
								                    	<i class="fa fa-arrow-right"></i>
								      				</a>
									            </div>
									        </div>
						      			</div>
						      		</div>
		                            <div class="col-md-12 subqgroup-field-hold ">
		                            	<!-- <input type="hidden" name="subqgroupcount" class="form-control" value="1" data-counter="true"/> -->
			                        	<?php
		                            		for ($i=1; $i <=$row['subgroupdata']['total']; $i++) { 
		                            			$n=$i-1;
		                            			$cdata=$row['subgroupdata'][$n];
		                            			# code...
												$datatype=$i==1?"triggerprogenitor":"triggerprogeny";		                            		
		                            	?>
		                            	<div class="col-md-3 multi_content_hold" data-type="triggerprogeny" data-cid="1" data-name="subqgroup">
			                        		<h4 class="multi_content_countlabels">Sub Q.Group (Entry <?php echo $i;?>)</h4>
			                        		<div class="col-sm-12">
			                        			<input type="hidden" 
					                            	class="form-control" 
					                              	name="csentryid<?php echo $i;?>" 
					                              	value="<?php echo $cdata['id'];?>"/>
			                        			<div class="form-group">
						                            <label>SubGroup Details</label>
						                            <div class="input-group">
						                              <div class="input-group-addon">
						                                <i class="fa fa-file-text"></i>
						                              </div>
						                              <input type="text" class="form-control" name="title<?php echo $i;?>" 
						                               placeholder="Provide Title" title="Title" value="<?php echo $cdata['title'];?>"> 
						                            </div><!-- /.input group -->
						                            <div class="input-group">
						                              <div class="input-group-addon">
						                                <i class="fa fa-file-text"></i>
						                              </div>
						                              <input type="text" class="form-control" 
						                              name="acronymini<?php echo $i;?>" title="Acronym" value="<?php echo $cdata['acronym'];?>" placeholder="Acronym if applicable">
						                            </div><!-- /.input group -->
						                            <div class="input-group">
						                              <div class="input-group-addon">
						                                <i class="fa fa-file-text"></i>
						                              </div>
						                              <textarea class="form-control" rows="3" title="Details" name="description<?php echo $i;?>" 
						                              	placeholder="Optional Description"
						                              	><?php echo $cdata['details'];?></textarea>
						                            </div><!-- /.input group -->
						                            <div class="input-group">
						                              <div class="input-group-addon">
						                                <i class="fa fa-trash"></i>
						                              </div>
						                              <select name="csstatus<?php echo $i;?>" 
						                              	class="form-control">
								                        	<option value="">--Choose--</option>
								                        	<option value="active">Active</option>
								                        	<option value="inactive">Disable</option>
												  	  </select>
						                            </div><!-- /.input group -->
						                        </div><!-- /.form group -->
			                        		</div>
			                        	</div>
		                            	<?php
		                            		}
		                            	?>

			                        	<div class="col-md-3 multi_content_hold" data-type="triggerprogenitor" data-cid="<?php echo $sgcount;?>" data-name="subqgroup">
			                        		<h4 class="multi_content_countlabels">Sub Q.Group (Entry <?php echo $sgcount;?>)</h4>
			                        		<div class="col-sm-12">
			                        			<div class="form-group">
						                            <label>SubGroup Details</label>
						                            <div class="input-group">
						                              <div class="input-group-addon">
						                                <i class="fa fa-file-text"></i>
						                              </div>
						                              <input type="text" class="form-control" name="title<?php echo $sgcount;?>" placeholder="Provide Title ">
						                            </div><!-- /.input group -->
						                            <div class="input-group">
						                              <div class="input-group-addon">
						                                <i class="fa fa-file-text"></i>
						                              </div>
						                              <input type="text" class="form-control" 
						                              name="acronymini<?php echo $sgcount;?>" placeholder="Acronym if applicable">
						                            </div><!-- /.input group -->
						                            <div class="input-group">
						                              <div class="input-group-addon">
						                                <i class="fa fa-file-text"></i>
						                              </div>
						                              <textarea class="form-control" rows="5" 
						                              name="description<?php echo $sgcount;?>" 
						                              placeholder="Optional Description"></textarea>
						                            </div><!-- /.input group -->
						                        </div><!-- /.form group -->
			                        		</div>
			                        	</div>

			                        	<div name="subqgroupentrypoint" data-marker="true"></div>
			                        	<input name="subqgroupdatamap" 
			                        	type="hidden" data-map="true" 
			                        	value="title-:-input<|>acronymini-:-input<|>description-:-textarea">
			                        	
		                            </div>
	                        	</div>
                    		</div>
                    	</div>		
                    <!-- end edit section accordion -->
					<?php
                		}
                	?>                    
                    <input type="hidden" name="extraformdata" 
                    value="qgrouptitle-:-input<|>
                    acronym-:-input<|>
                    profpic-:-input|image<|>
                    details-:-textarea<|>

                    egroup|data-:-[subqgroupcount>|<
                    title-|-input>|<
                    acronymini-|-input>|<
                    description-|-textarea]-:-groupfall[1]-:-[single-|-grouptype-|-select-|-hassubgroup-|-title]<|>

                    egroup|data-:-[csgroupscount>|<
                    coursetitle-|-input>|<
                    duration-|-input]-:-groupfall[1,2]-:-[single-|-grouptype-|-select-|-hassubject-|-coursetitle]<|>
                    seometakeywords-:-textarea<|>
                    seodescription-:-textarea"/>
                    <input type="hidden" name="errormap" value="qgrouptitle-:-Please provide the title for this question group<|>
                    acronym-:-Please State the acronym for this exam type<|>
                    profpic-:-NA<|>
                    details-:-Please give a good description for the current question group<|>
	                egroup|data-:-[Please give the subgroup title>|<NA>|<NA]<|>
                    egroup|data-:-[Please give the course/subject title>|<
                    Specify the duration for this course/subject entry examination/test]<|>
                    seometakeywords-:-NA<|>
                    seodescription-:-NA"/>
					
	                
	                <div class="col-md-12 clearboth">
		                <div class="box-footer">
		                    <input type="button" class="btn btn-danger" name="updateentry" data-formdata="<?php echo $formtruetype2;?>" onclick="submitCustom('<?php echo $formtruetype2;?>','complete')" value="Update"/>
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
?>
<?php			
		}else if($viewtype=="vieweroutput"){
			// this section is concerned with handling frontend related outputs
			// associated with this module
	
?>
		
<?php			
		}
		
	}
?>

