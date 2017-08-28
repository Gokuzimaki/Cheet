<?php
	// this is a basic template for creating and managing content for the generalinfo
	// table in a manageable and customizable format
	// This particular template serves content that needs only one entry
	// such as welcome messages or section descriptions on a page
	// the kind of form here is singular for both creating and editting 
	// previously created content
	
	// first, we make sure key variables are made available to us
	if(isset($displaytype)||isset($_gdunitdisplaytype)){
		// the basic variables accessible here are:
		// $gd_dataoutput, $datamap,viewtype, variant,maintype and subtype.
		// The gd_ variable here is the processed version of the data map json text,
		// it is an associative array obtained from said text
		if(!isset($viewtype)){
			$viewtype="create";
		}
		$outfa=pullFontAwesomeClasses();
		sort($outfa['faiconnames']);
		// sort($outfa['famatches']);
		$list="";
		$selection="";
		if($outfa['numrows']>0){
			for ($x = 0;$x < $outfa['numrows'];$x++) 
			{ 
				if(isset($outfa['faiconnames'][$x])&&isset($outfa['famatches'][$x])){

					$omid=$outfa['famatches']['namematch'][$outfa['faiconnames'][$x]];
					$outname=$outfa['famatches'][$omid];
				    $list.='
				    		<a href="##" 
	    						data-type="fapicker" 
	    						data-toggle="tooltip" 
	    						data-original-title="'.$outfa['faiconnames'][$x].'"
	    						title="'.$outfa['faiconnames'][$x].'" 
	    						value="'.$outname.'">
		    					<li class="">
	    							<i class="fa '.$outname.'"></i>
	    						</li>
			    			</a>
			    			';
			    	$selection.='<option value="'.$outname.'">'.$outfa['faiconnames'][$x].'</option>';
					// echo "<br>cur-dataout: ".$outfa['faiconnames'][$x]." \t cur-rdata: ".$outname."<br>";

				}
			}
		}
	
		// echo $viewtype;
		// specify that this file uses the _gdunit module to work
		$_gdunit="true";
		$formtypeouttwo="submitcustom";
		
		// obtain necessary data to carry out display operations
		if($viewtype=="create"){

			// set the generaldata
			// setup the admin output headers if necessary.
			// this only occurs for forms that have a seperate section 
			// for editting content
			// specify the total fields you want displayed
			$contentgroupdatageneral['adminheadings']['output']=6;
			
			// specify the table header elements for the fields to be displayed
			$contentgroupdatageneral['adminheadings']['rowdefaults']='
				<tr>
					<th>Coverphoto</th>
					<th>Type</th>
					<th>Fullname</th>
					<th>Position</th>
					<th>Status</th>
					<th>View/Edit</th>
				</tr>';

			// here the datatable table data content is rewriten based on
			// the expected values to be present after the gdmoduleparser is done
			// initialising them.
			$contentgroupdatageneral['evaldata']['single']['initeval']='
				$coveroutput="";
				if($coverimage!==""){
					$coveroutput=\'<a href="\'.$coverimage.\'" data-lightbox="teamgallery"
									data-src="\'.$coverimage_filedata[\'location\'].\'">
										<img src="\'.$host_addr.\'\'.$coverimage_filedata[\'thumbnail\'].\'"/>
									</a>\';
				}
				$tddataoutput=\'<td class="tdimg">
									\'.$coveroutput.\'	
								</td>
								<td>\'.$subtype.\'</td>
								<td>\'.$contenttitle.\'</td>
								<td>\'.$contentsubtitle.\'</td>
								<td>\'.$status.\'</td>
								<td name="trcontrolpoint">
									<a href="#&id=\'.$id.\'" 
											name="edit" 
											data-type="editsinglegeneraldata" 
											data-divid="\'.$id.\'" \'.$datamapout.\'>
											Edit
									</a>
								</td>\';				
			';
			// get the table entries for editting
			$outsdata1=getAllGeneralInfo("admin","$maintype2","","",$contentgroupdatageneral);
			$entryid1=isset($outsdata1['resultdataset'][0]['id'])?$outsdata1['resultdataset'][0]['id']:0;

			// initialise content variables for the form below 
			$newin="in";
			$editin="";	
			// var_dump($outsdata);			
			$entryid=isset($outsdata['resultdataset'][0]['id'])?$outsdata['resultdataset'][0]['id']:0;
			// initialise content variables for the form below 
			// groupset hide class variable. This handles the display status of the 
			// 'triggerformaddlib' class element
			$hideaddlink="";
			if($entryid1>0){
				// this means there is at least one entry for this maintype
				// so we show only the edit section
				$newin="";
				$editin="in";
			}

			/*if($entryid1>0&&$viewtype=="edit"){
				// echo "test entryid<br>";
				// IMPORTANT
				// include the below files only when there is a hit for previous content
				// in the database.
				// these modules parse general data and create the necessary variables
				// needed by the form. they are included manually for single entry type contents
				// and are automatically used when the content being managed has multiple entries
				// prep the _gdoutput variable, this variable stores the entries of data actions
				// carried out on a single data set
				$_gdoutput=$outsdata;
				include('gdmoduledataparser.php');
				include('gdmoduledataeditdefault.php');
				
				// this section means there is currently a valid entry for the maintype
				// do your fancy variable creation stuff here. If this 
				// entry makes use of extradata column to store more values,
				// the variables you will need to populate the field elements
				// have already been created for you, you just have to use them
				// these variables are the names of your form elements
				// e.g if your form has an input element with name="firstinput"
				// the correspondingvariable that holds its value is $name
				// other variables include 
				// $cgcount currentgroupcount - the total number of entries pergroupset
				// data
				$edit_attr='data-edittype="true"';
				// get the amount of previous entries in the groupset
				// $cedit1="";
				// check to see if there is groupdata available
				// this action is carried out per group set of data in any _gdunit form
				$gdeminimum1=2;
				if(isset($cedit1)){
					$cid=$cedit1+1;
					// echo "$cedit1 $gdeminimum1";
				}else{
					$cedit1=0;
					$cid=1;
				}
				if(isset($cedit2)){
					$cid2=$cedit2+1;
					// echo "$cedit1 $gdeminimum1";
				}else{
					$cedit2=0;
					$cid2=1;
				}
				
			}*/
			// this means there is no entry for the maintype 
			$contenttitle="";
			$contentsubtitle="";

			$contentpost="";

			// this is a compulsory variable to define
			$totalscripts="";
			$edit_attr="";
			//set the amount of previous entries in each groupset
			$cedit1=0;
			$cid=1;
			$cedit2=0;
			$cid2=1;
			$gdeminimum1=2;
		

			
			
?>
<div class="box">
	<div class="box-body">
	    <div class="box-group" id="generaldataaccordion">
			<div class="panel box overflowhidden box-primary">
			    <div class="box-header with-border">
			        <h4 class="box-title">
			          <a data-toggle="collapse" data-parent="#generaldataaccordion" href="#NewPageManagerBlock">
			            <i class="fa fa-sliders"></i> Create Team Members 
			          </a>
			        </h4>
			    </div>
			    <div id="NewPageManagerBlock" class="panel-collapse collapse <?php echo $newin;?>">
			        <div class="row">
			            <form name="<?php echo $formtruetype;?>" method="POST" data-type="create" onSubmit="return false" enctype="multipart/form-data" action="<?php echo $host_addr;?><?php echo $actionpath;?>">
							<input type="hidden" name="entryvariant" value="<?php echo $variant;?>"/>
		            		<input type="hidden" name="maintype" value="<?php echo $maintype;?>"/>
		            		
		            		<div class="col-md-12">
		            			<div class="col-md-3">
	                                <div class="form-group">
	                                    <label>Member Type</label>
	                                    <div class="input-group select2-bootstrap-prepend">
		                                    <div class="input-group-addon">
		                                        <i class="fa fa-adjust"></i>
		                                    </div>
		                                    <select name="subtype" class="form-control">
												<option value="member">Member</option>
												<option value="consultant">Consultant</option>
											</select>
	                                    </div><!-- /.input group -->
	                                </div><!-- /.form group -->
                                </div>
                                <div class="col-sm-3">
                                    <label>Member Photograph</label>
                                    <!-- specifies the value for the upload width/height format(fieldname_size[t|m)w|h]-->
                                    <input type="hidden" class="form-control" name="coverimage_sizeth" value="150"/>
                                    <input type="hidden" class="form-control" name="coverimage_sizemh" value="286"/>
                                    <input type="file" class="form-control" name="coverimage"/>
                                </div>
		            			<div class="col-sm-3"> 
	                                <div class="form-group">
	                                    <label>Memeber Fullname</label>
	                                    <div class="input-group">
		                                      <div class="input-group-addon">
		                                        <i class="fa fa-file-text"></i>
		                                      </div>
		                                      <input type="text" class="form-control" name="contenttitle" Placeholder="Members fullname"/>
		                                </div><!-- /.input group -->
                                  	</div><!-- /.form group -->
                                </div>
                                <div class="col-sm-3"> 
                                  <div class="form-group">
                                    <label>Member Position</label>
                                    <div class="input-group">
                                      <div class="input-group-addon">
                                        <i class="fa fa-file-text"></i>
                                      </div>
                                      <input type="text" class="form-control" name="contentsubtitle"  Placeholder="The position of the member"/>
                                    </div><!-- /.input group -->
                                  </div><!-- /.form group -->
                                </div>
                                <div class="col-md-12">
                                    <label>Member Details:</label>
                                    <textarea class="form-control" rows="3" name="contentpost" data-mce="true" id="postersmallthree_1" placeholder="The members Details"></textarea>
                                </div>
                                <!-- group 1 -->
                                <div class="col-md-12 skills-field-hold">
                                	<h2>Create Skillset Options </h2>
                                    <input name="skillscount" type="hidden" value="1" data-counter="true" class="form-control"/>
                                	<div class="col-md-3 _maxedgroup multi_content_hold" data-name="skills" data-type="triggerprogenitor" data-cid="1">
										<h4 class="group_heading multi_content_countlabels">Skills GroupData (Entry 1)</h4>
                                		<div class="col-md-12">
			                                <div class="form-group">
			                                    <label>Skills Title.</label>
			                                    <div class="input-group">
				                                    <div class="input-group-addon">
				                                        <i class="fa fa-circle"></i>
				                                    </div>
				                                    <input name="skillsname1" class="form-control" type="text" Placeholder="Title for skill entry"/>				                                    
				                                </div><!-- /.input group -->
			                                </div><!-- /.form group -->
		                                </div>
                                		<div class="col-md-12">
			                                <div class="form-group">
			                                    <label>Choose a Color Group</label>
			                                    <div class="input-group select2-bootstrap-prepend">
				                                    <div class="input-group-addon">
				                                        <i class="fa fa-file-text"></i>
				                                    </div>
				                                    <select name="skillscolourtype1" data-name="select2plain" class="form-control">
														<option value="">Choose display Color Group</option>
														<option value="darkred">DarkRed</option>
														<option value="red">Red</option>
														<option value="lightred">LightRed</option>
														<option value="darkorange">DarkOrange</option>
														<option value="orange">Orange</option>
														<option value="lightorange">LightOrange</option>
														<option value="darkyellow">DarkYellow</option>
														<option value="yellow">Yellow</option>
														<option value="lightyellow">LightYellow</option>
														<option value="darkgreen">DarkGreen</option>
														<option value="green">Green</option>
														<option value="lightgreen">LightGreen</option>
														<option value="darkblue">DarkBlue</option>
														<option value="blue">Blue</option>
														<option value="lightblue">LightBlue</option>
														<option value="Darkindigo">DarkIndigo</option>
														<option value="indigo">Indigo</option>
														<option value="lightindigo">LightIndigo</option>
														<option value="darkviolet">DarkViolet</option>
														<option value="violet">Violet</option>
														<option value="lightviolet">LightViolet</option>
													</select>
			                                    </div><!-- /.input group -->
			                                </div><!-- /.form group -->
		                                </div>
		                                <div class="col-md-12">
			                                <div class="form-group">
			                                    <label>Skill Percentage</label>
			                                    <div class="input-group">
				                                    <div class="input-group-addon">
				                                        <i class="fa fa-percent"></i>
				                                    </div>
				                                    <input name="skillspercent1" class="form-control" type="number" min="1" max="100" Placeholder="Percentage value for skill entry."/>				                                    
				                                </div><!-- /.input group -->
			                                </div><!-- /.form group -->
		                                </div>
                                	</div>
                                	<div name="skillsentrypoint" data-marker="true"></div>
                                	<input name="skillsdatamap" type="hidden" value="skillsname-:-input<|>
					                      skillscolourtype-:-select<|>
			                      		  skillspercent-:-input" class="form-control"/>
                                	<!-- <input name="skills_entryminimum" type="hidden" value="<?php echo $gdeminimum1;?>" class="form-control"/> -->
                                	<input name="skillsfuncdata" type="hidden" value="{'func':['select2'],
                                	'selectors':['div.skills-field-hold select[data-name=select2plain]'],
                                	'typegd':['encapsjq'],
                                	'params':[['theme','``bootstrap``']],
                                	'dselectors':['div.skills-field-hold select[data-name=select2plain]'],
                                	'dtypegd':['plainjq'],
                                	'dparams':[['destroy']]}">
                                	
                                	<a href="##" class="generic_addcontent_trigger" 
										data-type="triggerformaddlib" 
										data-form-name="<?php echo $formtruetype;?>" 
										data-name="skillscount_addlink" 
										data-i-type="" 
										data-limit="6"> 
										<i class="fa fa-plus"></i>Add More?
									</a>
                                </div>
                                <!-- group 1 end -->

                                <!-- group 2 -->
                                <div class="col-md-12 social-field-hold">
                                	<h2>Create Social Network Entries  </h2>
                                	<!-- data-valcount="2" data-valset="1,2,3" -->
                                    <input name="socialcount" type="hidden" value="1" data-valcount="2" data-valset="1,2,3" data-counter="true" class="form-control"/>
                                	<div class="col-md-3 _maxedgroup multi_content_hold " data-name="social" data-type="triggerprogenitor" data-cid="1">
										<h4 class="group_heading multi_content_countlabels">Social GroupData (Entry 1)</h4>
                                		<div class="col-md-12">
			                                <div class="form-group">
			                                    <label>Social Title.</label>
			                                    <div class="input-group">
				                                    <div class="input-group-addon">
				                                        <i class="fa fa-circle"></i>
				                                    </div>
				                                    <input name="socialname1" class="form-control" type="text" Placeholder="Social handle"/>				                                    
				                                </div><!-- /.input group -->
			                                </div><!-- /.form group -->
		                                </div>
		                                <div class="col-md-12 ">
	                                        <div class="form-group">
		                                    	<label>Social Icon </label>
												<div class="input-group select2-bootstrap-prepend">
													<div class="input-group-addon _sdp">
														<i class="fa fa-file-text"></i>
													</div>
													<select class="form-control" name="socialicon1" data-name="faselect">
														<option value="">Choose an Icon</option>
														<?php echo $selection;?>
													</select>
												</div><!-- /.input group -->
	                                        </div>
	                                    </div> 
		                                <div class="col-md-12">
			                                <div class="form-group">
			                                    <label>Social Link</label>
			                                    <div class="input-group">
				                                    <div class="input-group-addon">
				                                        <i class="fa fa-chrome"></i>
				                                    </div>
				                                    <input name="socialurl1" class="form-control" type="url" Placeholder="The web address."/>				                                    
				                                </div><!-- /.input group -->
			                                </div><!-- /.form group -->
		                                </div>
                                	</div>
                                	<div name="socialentrypoint" data-marker="true"></div>
                                	<input name="socialdatamap" type="hidden" value="socialname-:-input<|>
					                      socialicon-:-select<|>
			                      		  socialurl-:-input" class="form-control"/>
                                	<input name="social_entryminimum" type="hidden" value="2" class="form-control"/>
                                	<input name="socialfuncdata" type="hidden" value="{'func':['select2'],
                                	'selectors':['div.social-field-hold select[data-name=faselect]'],
                                	'typegd':['encapsjq'],
                                	'params':[['theme','``bootstrap``','templateResult','faSelectTemplate']],
                                	'dselectors':['div.social-field-hold select[data-name=faselect]'],
                                	'dtypegd':['plainjq'],
                                	'dparams':[['destroy']]}">
                                	
                                	<a href="##" class="generic_addcontent_trigger" 
										data-type="triggerformaddlib"
										data-form-name="<?php echo $formtruetype;?>" 
										data-name="socialcount_addlink" 
										data-i-type="" 
										data-limit="4"> 
										<i class="fa fa-plus"></i>Add More?
									</a>
                                </div>
                                <!-- group 2 -->
                            </div>

                            <input type="hidden" name="formdata" value="<?php echo $formtruetype;?>"/>
		                    <input type="hidden" name="extraformdata" value="contenttitle-:-input<|>
		                      contentsubtitle-:-input-:-[group-|-subtype-|-select-|-member]<|>
		                      coverimage-:-input|image<|>
                      		  subtype-:-select<|>
                      		  contentpost-:-textarea<|>
		                      egroup|data-:-[skillscount>|<
		                      skillsname-|-input>|<
		                      skillscolourtype-|-select>|<
		                      skillspercent-|-input]-:-groupfall[1-2,2-3,3-1]-:-[single-|-subtype-|-select-|-member-|-skillsname]<|>
		                      egroup|data-:-[socialcount>|<
		                      socialname-|-input>|<
		                      socialicon-|-select>|<
		                      socialurl-|-input]-:-groupfall[1,2-3,3-1]"/>
		                    <input type="hidden" name="errormap" value="contenttitle-:-Please Provide the fullname<|>
		                      contentsubtitle-:-Please state the members position<|>
		                      coverimage-:-NA<|>
		                      subtype-:-NA<|>
		                      contentpost-:-Please specify the content for this section.<|>
		                      egroup|data-:-[Please provide the Skillset name.>|<No gradient colour Specified>|<Provide the percentage.]<|>
		                      egroup|data-:-[Please provide the Social network handle.>|<Choose the social network icon>|<Provide the link to the social platform.]"/>
			                <div class="col-md-12 clearboth">
				                <div class="box-footer">
				                    <input type="button" class="btn btn-danger" name="createentry" data-formdata="<?php echo $formtruetype;?>" onclick="submitCustom('<?php echo $formtruetype;?>','complete')" value="Create/Update"/>
				                </div>
				            </div>
		            	</form>	
			        </div>
			    </div>
			</div>
			<div class="panel box overflowhidden box-primary">
                <div class="box-header with-border">
                  <h4 class="box-title">
                    <a data-toggle="collapse" data-parent="#generaldataaccordion" href="#EditBlock">
                      <i class="fa fa-gear fa-spin"></i> Edit Team Members
                    </a>
                  </h4>
                </div>
                <div id="EditBlock" class="panel-collapse collapse <?php echo $editin;?>">
                  	<div class="box-body">
                      	<div class="row">
	                        <div class="col-md-12">
	                          <?php
	                            echo $outsdata1['adminoutput'];
	                          ?>
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
			curmceadminposter['height']="500px";
			curmceadminposter['toolbar1']="undo redo | bold italic underline | fontselect fontsizeselect | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect";
			curmceadminposter['toolbar2']="| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ";
			callTinyMCEInit("textarea#adminposter",curmceadminposter);
			var curmcethreeposter=[];
			curmcethreeposter['width']="100%";

			curmcethreeposter['height']="300px";
			curmcethreeposter['toolbar2addon']=" | preview code ";
			callTinyMCEInit("textarea[id*=postersmallthree]",curmcethreeposter);
			
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
			global $variant2,$maintype2,$formtruetype2;
			if(isset($cedit1)){
				$cid=$cedit1+1;
				// echo "$cedit1 $gdeminimum1";
			}else{
				$cedit1=0;
				$cid=1;
			}
			if(isset($cedit2)){
				$cid2=$cedit2+1;
				// echo "$cedit1 $gdeminimum1";
			}else{
				$cedit2=0;
				$cid2=1;
			}
			$edit_attr='data-edittype="true"';
			// at 
?>
			<!-- Edit section -->
			<div class="row">
	            <form name="edit_<?php echo $formtruetype2;?>" method="POST" data-type="edit" onSubmit="return false" enctype="multipart/form-data" action="<?php echo $host_addr;?>snippets/edit.php">
					<input type="hidden" name="entryvariant" value="contententryupdate"/>
            		<input type="hidden" name="maintype" value="<?php echo $maintype2;?>"/>
            		<input type="hidden" name="entryid" value="<?php echo $gdunit_id;?>"/>
            		<div class="col-md-12">
            			<div class="col-md-3">
                            <div class="form-group">
                                <label>Member Type</label>
                                <div class="input-group select2-bootstrap-prepend">
                                    <div class="input-group-addon">
                                        <i class="fa fa-adjust"></i>
                                    </div>
                                    <select name="subtype"  class="form-control">
										<option value="member">Member</option>
										<option value="consultant">Consultant</option>
									</select>
                                </div><!-- /.input group -->
                            </div><!-- /.form group -->
                        </div>
                        <div class="col-sm-3">
                            <label>Member Photograph</label>
                            <?php
                            	if(isset($coverimage)&&$coverimage!==""){
                            		// var_dump($coverimage_filedata);
                            		// echo $gd_general_array['coverimage_filedata']['idoutput'];
                            ?>
		                            <div class="contentpreview _image">
		                            	<a href="<?php echo $host_addr.$gd_general_array['coverimage_filedata']['location'];?>" data-lightbox="general" data-src="<?php echo $host_addr.$gd_general_array['coverimage_filedata']['location'];?>">
		                            		<img src="<?php echo $host_addr.$gd_general_array['coverimage_filedata']['thumbnail'];?>"/>
		                            	</a>
		                            </div>
                            <?php
                            		echo $gd_general_array['coverimage_filedata']['manageoutput'];
                            	}
                            ?>
                            <!-- specifies the value for the upload width/height format(fieldname_size[t|m)w|h]-->
                            <input type="hidden" class="form-control" name="coverimage_sizeth" value="150"/>
                            <input type="hidden" class="form-control" name="coverimage_sizemh" value="286"/>
                            <input type="file" class="form-control" name="coverimage"<?php echo $edit_attr;?>/>
                        </div>
            			<div class="col-sm-3"> 
                            <div class="form-group">
                                <label>Member Fullname</label>
                                <div class="input-group">
                                      <div class="input-group-addon">
                                        <i class="fa fa-file-text"></i>
                                      </div>
                                      <input type="text" class="form-control" name="contenttitle" value="<?php echo $contenttitle;?>" Placeholder="Members fullname"/>
                                </div><!-- /.input group -->
                          	</div><!-- /.form group -->
                        </div>
                        <div class="col-sm-3"> 
                          <div class="form-group">
                            <label>Member Position</label>
                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-file-text"></i>
                              </div>
                              <input type="text" class="form-control" name="contentsubtitle"  value="<?php echo $contentsubtitle;?>" Placeholder="The position of the member"/>
                            </div><!-- /.input group -->
                          </div><!-- /.form group -->
                        </div>
                        <div class="col-md-12">
                            <label>Member Details:</label>
                            <textarea class="form-control" rows="3" name="contentpost" data-mce="true" id="postersmallthree_2" placeholder="The members Details"><?php echo $contentpost;?></textarea>
                        </div>

                        <!-- group 1 -->
                        <div class="col-md-12 skills-field-hold" data-groupid="1">
                        	<h2>Create/Update Skills </h2>
                            <input name="skillscount" type="hidden" value="<?php echo $cid;?>" data-counter="true" class="form-control"/>
                        	<?php 
                        		if($cedit1>0){
                        			// produce previous content for editting
                        	?>
                        	<!-- this holds the value for the number of edittable entries -->
                            <input name="skills_cedit" type="hidden" value="<?php echo $cedit1;?>" class="form-control"/>
                        	<!-- Start edit section accordion -->
                        	<div class="box-group" id="contentaccordion">
								<div class="panel box box-primary overflowhidden">
							    	<div class="box-header with-border">
								        <h4 class="box-title">
								          <a data-toggle="collapse" data-parent="#contentaccordion" href="#headBlock_group1">
								            <i class="fa fa-briefcase"></i><i class="fa fa-gear fa-spin"></i> 
								            Edit Previous Skill Entries
								          </a>
								        </h4>
							    	</div>
							      	<div id="headBlock_group1" class="panel-collapse collapse">
                        	<?php		
                        			for ($i = 1; $i <= $cedit1 ; $i++) {
                        				// create the sets for previous entries
                        	?>
		                            	<div class="col-md-3 _maxedgroup multi_content_hold " data-type="triggerprogeny">
											<h4 class="group_heading multi_content_countlabels">GroupData (Entry <?php echo $i?>)</h4>
		                            		<div class="col-md-12">
				                                <div class="form-group">
				                                    <label>Skills Title.</label>
				                                    <div class="input-group">
					                                    <div class="input-group-addon">
					                                        <i class="fa fa-circle"></i>
					                                    </div>
					                                    <input name="skillsname<?php echo $i;?>" value="<?php echo $gd_general_array['group1']["skillsname$i"];?>" class="form-control" type="text" Placeholder="Title for skill entry"/>				                                    
					                                </div><!-- /.input group -->
				                                </div><!-- /.form group -->
			                                </div>
			                                <div class="col-md-12">
				                                <div class="form-group">
				                                    <label>Choose Color Group</label>
				                                    <div class="input-group select2-bootstrap-prepend">
					                                    <div class="input-group-addon">
					                                        <i class="fa fa-adjust"></i>
					                                    </div>
					                                    <select name="skillscolourtype<?php echo $i?>" data-name="select2plain" class="form-control">
															<option value="">Choose display Gradient Group</option>
															<option value="darkred">DarkRed</option>
															<option value="red">Red</option>
															<option value="lightred">LightRed</option>
															<option value="darkorange">DarkOrange</option>
															<option value="orange">Orange</option>
															<option value="lightorange">LightOrange</option>
															<option value="darkyellow">DarkYellow</option>
															<option value="yellow">Yellow</option>
															<option value="lightyellow">LightYellow</option>
															<option value="darkgreen">DarkGreen</option>
															<option value="green">Green</option>
															<option value="lightgreen">LightGreen</option>
															<option value="darkblue">DarkBlue</option>
															<option value="blue">Blue</option>
															<option value="lightblue">LightBlue</option>
															<option value="Darkindigo">DarkIndigo</option>
															<option value="indigo">Indigo</option>
															<option value="lightindigo">LightIndigo</option>
															<option value="darkviolet">DarkViolet</option>
															<option value="violet">Violet</option>
															<option value="lightviolet">LightViolet</option>
														</select>
				                                    </div><!-- /.input group -->
				                                </div><!-- /.form group -->
			                                </div>
			                                
			                                <div class="col-md-12">
				                                <div class="form-group">
				                                    <label>Skill Percentage</label>
				                                    <div class="input-group">
					                                    <div class="input-group-addon">
					                                        <i class="fa fa-percent"></i>
					                                    </div>
					                                    <input name="skillspercent<?php echo $i;?>" class="form-control" type="number" min="1" max="100" value="<?php echo $gd_general_array['group1']["skillspercent$i"];?>" Placeholder="Percentage value for skill entry."/>				                                    
					                                </div><!-- /.input group -->
				                                </div><!-- /.form group -->
			                                </div>
			                                <?php echo $gd_general_array['group1']["entryremoval$i"];?>
		                            	</div>
                        	<?php 
                        			}
                        	?>
                        			</div>
                        		</div>
                        	</div>		
                        	<!-- end edit section accordion -->
                        	<?php
                        		}
                        		// this section is for new content to be added
                        		// to the groupset
                        		// use this kind of control block to ensure that no new 
                        		// content is created unless there are still available
                        		// entry slots in the case of a control limit being
                        		// used
                        		if($cedit1<6){
                        	?>
		                        	<div class="col-md-3 _maxedgroup multi_content_hold " data-name="skills" data-type="triggerprogenitor" data-cid="<?php echo $cid;?>">
										<h4 class="group_heading multi_content_countlabels">Skills GroupData (Entry <?php echo $cid;?>)</h4>
                                		<div class="col-md-12">
			                                <div class="form-group">
			                                    <label>Skills Title.</label>
			                                    <div class="input-group">
				                                    <div class="input-group-addon">
				                                        <i class="fa fa-circle"></i>
				                                    </div>
				                                    <input name="skillsname<?php echo $cid;?>" class="form-control" type="text" Placeholder="Title for skill entry"/>				                                    
				                                </div><!-- /.input group -->
			                                </div><!-- /.form group -->
		                                </div>
                                		<div class="col-md-12">
			                                <div class="form-group">
			                                    <label>Choose a Color Group</label>
			                                    <div class="input-group select2-bootstrap-prepend">
				                                    <div class="input-group-addon">
				                                        <i class="fa fa-file-text"></i>
				                                    </div>
				                                    <select name="skillscolourtype<?php echo $cid;?>" data-name="select2plain" class="form-control">
														<option value="">Choose display Color Group</option>
														<option value="darkred">DarkRed</option>
														<option value="red">Red</option>
														<option value="lightred">LightRed</option>
														<option value="darkorange">DarkOrange</option>
														<option value="orange">Orange</option>
														<option value="lightorange">LightOrange</option>
														<option value="darkyellow">DarkYellow</option>
														<option value="yellow">Yellow</option>
														<option value="lightyellow">LightYellow</option>
														<option value="darkgreen">DarkGreen</option>
														<option value="green">Green</option>
														<option value="lightgreen">LightGreen</option>
														<option value="darkblue">DarkBlue</option>
														<option value="blue">Blue</option>
														<option value="lightblue">LightBlue</option>
														<option value="Darkindigo">DarkIndigo</option>
														<option value="indigo">Indigo</option>
														<option value="lightindigo">LightIndigo</option>
														<option value="darkviolet">DarkViolet</option>
														<option value="violet">Violet</option>
														<option value="lightviolet">LightViolet</option>
													</select>
			                                    </div><!-- /.input group -->
			                                </div><!-- /.form group -->
		                                </div>
		                                <div class="col-md-12">
			                                <div class="form-group">
			                                    <label>Skill Percentage</label>
			                                    <div class="input-group">
				                                    <div class="input-group-addon">
				                                        <i class="fa fa-percent"></i>
				                                    </div>
				                                    <input name="skillspercent<?php echo $cid;?>" class="form-control" type="number" min="<?php echo $cid;?>" max="100" Placeholder="Percentage value for skill entry."/>				                                    
				                                </div><!-- /.input group -->
			                                </div><!-- /.form group -->
		                                </div>
                                	</div>
		                        	<div name="skillsentrypoint" data-marker="true"></div>
		                        	<input name="skillsdatamap" type="hidden" value="skillsname-:-input<|>
					                      skillscolourtype-:-select<|>
			                      		  skillsdetails-:-textarea" class="form-control"/>
		                        	<!-- <input name="skills_entryminimum" type="hidden" value="<?php echo $gdeminimum1;?>" class="form-control"/> -->
		                        	<input name="skillsfuncdata" type="hidden" value="{'func':['select2','select2'],
			                        	'selectors':['div.skills-field-hold select[data-name=select2plain]',
			                        				 'div.skills-field-hold select[data-name=faselect]'
			                        				],
			                        	'typegd':['encapsjq','encapsjq'],
			                        	'params':[['theme','``bootstrap``'],
			                        			  ['theme','``bootstrap``','templateResult','faSelectTemplate']
			                        			 ],
			                        	'dselectors':['div.skills-field-hold select[data-name=select2plain]',
			                        				 'div.skills-field-hold select[data-name=faselect]'
			                        				],
			                        	'dtypegd':['plainjq','plainjq'],
			                        	'dparams':[['destroy'],['destroy']]}">
		                        	
		                        	<a href="##" class="generic_addcontent_trigger" 
										data-type="triggerformaddlib" 
										data-form-name="<?php echo $formtruetype2;?>" 
										data-name="skillscount_addlink" 
										data-i-type="" 
										data-limit="6"> 
										<i class="fa fa-plus"></i>Add More?
									</a>
                        	<?php 
                        		}
                        	?>
                        </div>
                        <!-- group 1 end -->

                        <!-- group 2 -->
                        <div class="col-md-12 social-field-hold" data-groupid="2">
                        	<h2>Create/Update Social options</h2>
                            <input name="socialcount" type="hidden" value="<?php echo $cid2;?>" data-valcount="2" data-valset="1,2,3" data-counter="true" class="form-control"/>
                        	<?php 
                        		if($cedit2>0){
                        			// produce previous content for editting
                        	?>
                        	<!-- this holds the value for the number of edittable entries -->
                            <input name="social_cedit" type="hidden" value="<?php echo $cedit2;?>" class="form-control"/>
							<!-- Start edit section accordion -->
                        	<div class="box-group" id="contentaccordion">
								<div class="panel box box-primary overflowhidden">
							    	<div class="box-header with-border">
								        <h4 class="box-title">
								          <a data-toggle="collapse" data-parent="#contentaccordion" href="#headBlock_group2">
								            <i class="fa fa-briefcase"></i><i class="fa fa-gear fa-spin"></i> 
								            Edit Previous Social Entries
								          </a>
								        </h4>
							    	</div>
							      	<div id="headBlock_group2" class="panel-collapse collapse">
                        	<?php		
                        			for ($i = 1; $i <= $cedit2 ; $i++) {
                        				// create the sets for previous entries
                        	?>
                        				<div class="col-md-3 _maxedgroup multi_content_hold " data-type="triggerprogeny">
											<h4 class="group_heading multi_content_countlabels">GroupData (Entry <?php echo $i?>)</h4>
											<div class="col-md-12">
				                                <div class="form-group">
				                                    <label>Social Title.</label>
				                                    <div class="input-group">
					                                    <div class="input-group-addon">
					                                        <i class="fa fa-circle"></i>
					                                    </div>
					                                    <input name="socialname<?php echo $i;?>" class="form-control" value="<?php echo $gd_general_array['group2']["socialname$i"];?>" type="text" Placeholder="Title for skill entry"/>				                                    
					                                </div><!-- /.input group -->
				                                </div><!-- /.form group -->
			                                </div>
			                                <div class="col-md-12 ">
		                                        <div class="form-group">
			                                    	<label>Social Icon </label>
													<div class="input-group select2-bootstrap-prepend">
														<div class="input-group-addon _sdp">
															<i class="fa <?php echo $gd_general_array['group2']["socialicon$i"];?>"></i>
														</div>
														<select class="form-control" name="socialicon<?php echo $i;?>" data-name="faselect">
															<option value="">Choose an Icon</option>
															<?php echo $selection;?>
														</select>
													</div><!-- /.input group -->
		                                        </div>
		                                    </div> 
			                                <div class="col-md-12">
				                                <div class="form-group">
				                                    <label>Social Link</label>
				                                    <div class="input-group">
					                                    <div class="input-group-addon">
					                                        <i class="fa fa-chrome"></i>
					                                    </div>
					                                    <input name="socialurl<?php echo $i;?>" class="form-control" type="url" value="<?php echo $gd_general_array['group2']["socialurl$i"];?>" Placeholder="Url value for social entry."/>				                                    
					                                </div><!-- /.input group -->
				                                </div><!-- /.form group -->
			                                </div>
			                                <?php echo $gd_general_array['group2']["entryremoval$i"];?>
		                            	</div>
							<?php 
                        			}
                        	?>
                        				<!-- end edit section accordion -->
                        			</div>
                        		</div>
                        	</div>		
                        	<?php
                        		}
                        		// this section is for new content to be added
                        		// to the groupset
                        		// use this kind of control block to ensure that no new 
                        		// content is created unless there are still available
                        		// entry slots in the case of a control limit being
                        		// used
                        		if($cedit2<4){
                        	?>
                        			<div class="col-md-3 _maxedgroup multi_content_hold " data-name="social" data-type="triggerprogenitor" data-cid="<?php echo $cid2;?>">
										<h4 class="group_heading multi_content_countlabels">Social GroupData (Entry <?php echo $cid2;?>)</h4>
                                		<div class="col-md-12">
			                                <div class="form-group">
			                                    <label>Social Title.</label>
			                                    <div class="input-group">
				                                    <div class="input-group-addon">
				                                        <i class="fa fa-circle"></i>
				                                    </div>
				                                    <input name="socialname<?php echo $cid2;?>" class="form-control" type="text" Placeholder="Title for skill entry"/>				                                    
				                                </div><!-- /.input group -->
			                                </div><!-- /.form group -->
		                                </div>
		                                <div class="col-md-12 ">
	                                        <div class="form-group">
		                                    	<label>Social Icon </label>
												<div class="input-group select2-bootstrap-prepend">
													<div class="input-group-addon _sdp">
														<i class="fa fa-file-text"></i>
													</div>
													<select class="form-control" name="socialicon<?php echo $cid2;?>" data-name="faselect">
														<option value="">Choose an Icon</option>
														<?php echo $selection;?>
													</select>
												</div><!-- /.input group -->
	                                        </div>
	                                    </div> 
		                                <div class="col-md-12">
			                                <div class="form-group">
			                                    <label>Social Link</label>
			                                    <div class="input-group">
				                                    <div class="input-group-addon">
				                                        <i class="fa fa-chrome"></i>
				                                    </div>
				                                    <input name="socialurl<?php echo $cid2;?>" class="form-control" type="url" Placeholder="Url value for social entry."/>				                                    
				                                </div><!-- /.input group -->
			                                </div><!-- /.form group -->
		                                </div>
                                	</div>
                                	<div name="socialentrypoint" data-marker="true"></div>
                                	<input name="socialdatamap" type="hidden" value="socialname-:-input<|>
					                      socialicon-:-select<|>
			                      		  socialurl-:-input" class="form-control"/>
                                	<input name="socialfuncdata" type="hidden" value="{'func':['select2'],
                                	'selectors':['div.social-field-hold select[data-name=faselect]'],
                                	'typegd':['encapsjq'],
                                	'params':[['theme','``bootstrap``','templateResult','faSelectTemplate']],
                                	'dselectors':['div.social-field-hold select[data-name=faselect]'],
                                	'dtypegd':['plainjq'],
                                	'dparams':[['destroy']]}">
                                	
                                	<a href="##" class="generic_addcontent_trigger" 
										data-type="triggerformaddlib"
										data-form-name="edit_<?php echo $formtruetype2;?>" 
										data-name="socialcount_addlink" 
										data-i-type="" 
										data-limit="4"> 
										<i class="fa fa-plus"></i>Add More?
									</a>
							<?php 
                        		}
                        	?>
                            <input name="social_entryminimum" type="hidden" value="2" class="form-control"/>


                        </div>
                        <!-- group 2 end -->
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
                    <input type="hidden" name="formdata" value="edit_<?php echo $formtruetype2;?>"/>
                    <input type="hidden" name="extraformdata" value="contenttitle-:-input<|>
                      contentsubtitle-:-input-:-[group-|-subtype-|-select-|-member]<|>
              		  coverimage-:-input|image<|>
              		  subtype-:-select<|>
              		  contentpost-:-textarea<|>
                      egroup|data-:-[skillscount>|<
                      skillsname-|-input>|<
                      skillscolourtype-|-select>|<
                      skillspercent-|-input]-:-groupfall[1-2,2-3,3-1]-:-[single-|-subtype-|-select-|-member-|-skillsname]<|>
                      egroup|data-:-[socialcount>|<
                      socialname-|-input>|<
                      socialicon-|-select>|<
                      socialurl-|-input]-:-groupfall[1-2,2-3,3-1]"/>
                    <input type="hidden" name="errormap" value="contenttitle-:-Please Provide the title for the entry<|>
                      contentsubtitle-:-NA<|>
              		  coverimage-:-NA<|>
                      subtype-:-NA<|>
                      contentpost-:-Please specify the content for this section.<|>
                      egroup|data-:-[Please provide the Skillset name.>|<No gradient colour Specified>|<Provide the percentage.]<|>
                      egroup|data-:-[Please provide the Social network name.>|<Choose the social network icon>|<Provide the link to the social platform.]
                      "/>
	                <div class="col-md-12 clearboth">
		                <div class="box-footer">
		                    <input type="button" class="btn btn-danger" name="createentry" data-formdata="edit_<?php echo $formtruetype2;?>" onclick="submitCustom('edit_<?php echo $formtruetype2;?>','complete')" value="Update"/>
		                </div>
		            </div>
            	</form>
	        </div>
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
					<?php echo $edittotalscripts;?>
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
<?php			
		}
	}
?>
