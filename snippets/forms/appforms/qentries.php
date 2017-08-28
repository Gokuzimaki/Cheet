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
		$viewertype="admin";
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