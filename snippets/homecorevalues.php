<?php
	// this is a basic template for creating and managing content for the generalinfo
	// table in a manageable and customizable format
	// This particular template serves content that needs multiple entries
	// as well as content that only occurs once per section of the site
	// here, we have to attend to multiple maintypes per section of the
	// form. 
	
	//this is the sample of the map that is used to get here
	/*
		{"vnt":["contententryupdate","contententry"],
		"mt":["homecorevalues","corevaluesintro"],
		"vt":"create",
		"pr":"snippets/homecorevalues.php",
		"preinit":[true,false]}
	*/

	// first, we make sure key variables are made available to us
	if(isset($displaytype)||isset($_gdunitdisplaytype)){
		
		// the basic variables accessible here are:
		// $gd_dataoutput, $datamap,viewtype, variant,maintype and subtype
		// some other variables are also made accessible here, specifically for editting content
		// The gd_ variable here is the processed version of the data map json text,
		// it is an associative array obtained from said text
		/*if(isset($_gdunit_viewtype)){
			$viewtype=$_gdunit_viewtype;
		}else */if(!isset($viewtype)){
			$viewtype="create";
		}
		// specify that this file uses the _gdunit module to work
		$_gdunit="true";
		$formtypeouttwo="submitcustom";
		
		// obtain necessary data to carry out display operations
		if($viewtype=="create"){


			// var_dump($outsdata1);
			
			//this section is for the introductory section form 
			$entryid=isset($outsdata['resultdataset'][0]['id'])?$outsdata['resultdataset'][0]['id']:0;
			
			// initialise content variables for the form below 
			$newin="in";
			$editin="";			
			
			if($entryid>0){
				
				
				$edit_attr='data-edittype="true"';

				// IMPORTANT
				// include the below files only when there is a hit for previous content
				// in the database.
				// these modules parse general data and create the necessary variables
				// needed by the form. they are included manually for single enrty type contents
				// and are automatically used when the content being managed has multiple entries
				// prep the _gdoutput variable, this variable stores the entries of data actions
				// carried out on a single data set
				$_gdoutput=$outsdata;
				include('gdmoduledataparser.php');
				include('gdmoduledataeditdefault.php');	
				$maintotalscript=$totalscripts;
			}else{
				// this means there is no entry for the maintype 
				$contenttitle="";
				$contentsubtitle="";
				$contentpost="";
				// this is a compulsory variable to define
				$totalscripts="";
				$maintotalscript="";
				$edit_attr="";
			}
			
			// set the generaldata
			// setup the admin output headers if necessary.
			// this only occurs for forms that have a seperate section 
			// for editting content
			// specify the total fields you want displayed
			$contentgroupdatageneral['adminheadings']['output']=5;
			
			// specify the table header elements for the fields to be displayed
			$contentgroupdatageneral['adminheadings']['rowdefaults']='<tr>
																		<th>Title</th>
																		<th>Color</th>
																		<th>Details</th>
																		<th>Status</th>
																		<th>View/Edit</th>
																	</tr>';

			// here the datatable table data content is rewriten based on
			// the expected values to be present after the gdmoduleparser is done
			// initialising them.
			$contentgroupdatageneral['evaldata']['single']['initeval']='
				$tddataoutput=\'<td>\'.$contenttitle.\'</td>
								<td>\'.$colourtype.\'</td>
								<td>\'.$contentpost.\'</td>
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

			$outsdata1=getAllGeneralInfo("admin","$maintype2","","",$contentgroupdatageneral);
			$entryid1=isset($outsdata1['resultdataset'][0]['id'])?$outsdata1['resultdataset'][0]['id']:0;
			if($entryid1>0){
				// this means there is at least one entry for this maintype
				// so we show only the edit fields
				$newin="";
				$editin="in";
			}
			// $actionpath2=isset($actionpath2)?$actionpath2:"snippets/edit.php";
?>
<div class="box">
	<div class="box-body">
	    <div class="box-group" id="generaldataaccordion">
			<div class="panel box overflowhidden box-primary">
			    <div class="box-header with-border">
			        <h4 class="box-title">
			          <a data-toggle="collapse" data-parent="#generaldataaccordion" href="#NewPageManagerBlock1">
			            <i class="fa fa-sliders"></i> Core values Section Intro.
			          </a>
			        </h4>
			    </div>
			    <div id="NewPageManagerBlock1" class="panel-collapse collapse">
			        <div class="row">
			            <form name="<?php echo $formtruetype;?>" method="POST" onSubmit="return false" enctype="multipart/form-data" action="<?php echo $host_addr;?><?php echo $actionpath;?>">
							<input type="hidden" name="entryvariant" value="<?php echo $variant;?>"/>
		            		<input type="hidden" name="maintype" value="<?php echo $maintype;?>"/>
		            		<input type="hidden" name="subtype" value="<?php echo $subtype;?>"/>
		            		<input type="hidden" name="entryid" value="<?php echo $entryid;?>"/>
		            		<div class="col-md-12">
                                <div class="col-sm-12"> 
                                  <div class="form-group">
                                    <label>Section Title
                                    </label>
                                    <div class="input-group">
                                      <div class="input-group-addon">
                                        <i class="fa fa-file-text"></i>
                                      </div>
                                      <input type="text" class="form-control" name="contenttitle" value="<?php echo $contenttitle;?>" Placeholder="The message title"/>
                                    </div><!-- /.input group -->
                                  </div><!-- /.form group -->
                                </div>
                                <div class="col-sm-12"> 
                                  <div class="form-group">
                                    <label>Section Subtitle
                                    </label>
                                    <div class="input-group">
                                      <div class="input-group-addon">
                                        <i class="fa fa-file-text"></i>
                                      </div>
                                      <input type="text" class="form-control" name="contentsubtitle" value="<?php echo $contentsubtitle;?>" Placeholder="The message subtitle"/>
                                    </div><!-- /.input group -->
                                  </div><!-- /.form group -->
                                </div>
                                
                                <div class="col-sm-12">
                                    <label>Center Image <small>Pulsating center image</small></label>
                                    <?php
                                    	if(isset($coverimage)&&$coverimage!==""){
                                    		echo $coverimage_filedata['idoutput'];
                                    ?>
                                    <div class="contentpreview _image">
                                    	<a href="<?php echo $host_addr.$coverimage_filedata['location'];?>" data-lightbox="general" data-src="<?php echo $host_addr.$coverimage_filedata['location'];?>">
                                    		<img src="<?php echo $host_addr.$coverimage_filedata['thumbnail'];?>"/>
                                    	</a>
                                    </div>
                                    <?php
                                    	}
                                    ?>
                                    <input type="file" class="form-control" name="coverimage" <?php echo $edit_attr;?>/>
                                </div>
                                 <div class="col-md-12">
                                    <label>Place message here</label>
                                    <textarea class="form-control" rows="3" name="contentpost" data-mce="true" id="adminposter" placeholder="The message here"><?php echo $contentpost;?></textarea>
                                </div>
                            </div>
                            <input type="hidden" name="formdata" value="<?php echo $formtruetype;?>"/>
		                    <input type="hidden" name="extraformdata" value="contenttitle-:-input<|>
		                      contentsubtitle-:-input<|>
		                      contentpost-:-textarea<|>
                      		  coverimage-:-input|image"/>
		                    <input type="hidden" name="errormap" value="contenttitle-:-Please Provide the title for the entry<|>
		                      contentsubtitle-:-NA<|>
		                      contentpost-:-NA<|>
		                      coverimage-:-Please select a valid image file for the core values center image on the home page"/>
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
			          <a data-toggle="collapse" data-parent="#generaldataaccordion" href="#NewPageManagerBlock">
			            <i class="fa fa-sliders"></i> Create Core values entries.
			          </a>
			        </h4>
			    </div>
			    <div id="NewPageManagerBlock" class="panel-collapse collapse <?php echo $newin;?>">
			        <div class="row">
			            <form name="<?php echo $formtruetype2;?>" data-type="create" method="POST" onSubmit="return false" enctype="multipart/form-data" action="<?php echo $host_addr;?><?php echo $actionpath2;?>">
							<input type="hidden" name="entryvariant" value="<?php echo $variant2;?>"/>
		            		<input type="hidden" name="maintype" value="<?php echo $maintype2;?>"/>
		            		<input type="hidden" name="subtype" value="<?php echo $subtype;?>"/>
		            		<input type="hidden" name="entryid" value="0"/>
		            		<div class="col-md-12">
                                <div class="col-sm-12"> 
                                  <div class="form-group">
                                    <label>Core Value Title</label>
                                    <div class="input-group">
                                      <div class="input-group-addon">
                                        <i class="fa fa-file-text"></i>
                                      </div>
                                      <input type="text" class="form-control" name="contenttitle" Placeholder="The message title"/>
                                    </div><!-- /.input group -->
                                  </div><!-- /.form group -->
                                </div>
                                <div class="col-md-12">
	                                <div class="form-group">
	                                    <label>Choose Color Group <small>Default colors are already set</small></label>
	                                    <div class="input-group select2-bootstrap-prepend">
		                                    <div class="input-group-addon">
		                                        <i class="fa fa-file-text"></i>
		                                    </div>
		                                    <select name="colourtype" data-name="select2plain" class="form-control">
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
                                    <label>Details</label>
                                    <textarea class="form-control" rows="3" cols="5" name="contentpost" placeholder="The message here"></textarea>
                                </div>
                                

                            </div>
                                <input type="hidden" name="formdata" value="<?php echo $formtruetype2;?>"/>
			                    <input type="hidden" name="extraformdata" value="contenttitle-:-input<|>
			                      colourtype-:-select<|>
			                      contentpost-:-textarea"/>
			                    <input type="hidden" name="errormap" value="contenttitle-:-Please Provide the title for the entry<|>
			                      colourtype-:-NA<|>
			                      contentpost-:-Please specify the content for the new post section"/>
				                <div class="col-md-12 clearboth">
					                <div class="box-footer">
					                    <input type="button" class="btn btn-danger" name="createentry" data-formdata="<?php echo $formtruetype2;?>" onclick="submitCustom('<?php echo $formtruetype2;?>','complete')" value="Create/Update"/>
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
                      <i class="fa fa-gear"></i> Edit Core Value Entries
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
			curmceadminposter['height']="200px";
			curmceadminposter['toolbar1']="undo redo | bold italic underline | fontselect fontsizeselect | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect";
			curmceadminposter['toolbar2']="| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ";
			callTinyMCEInit("textarea#adminposter",curmceadminposter);
			var curmcethreeposter=[];
			curmcethreeposter['width']="100%";

			curmcethreeposter['height']="250px";

			callTinyMCEInit("textarea[id*=postersmallthree]",curmcethreeposter);
			
			<?php echo $maintotalscript;?>
			if($.fn.select2){
				$('select[data-name=select2plain]').select2({
				    theme: "bootstrap"
				});
			}
			
		});
	</script>
</div>
<?php
		}else if($viewtype=="edit"){
			// the edit file output for the currently selected entry
			// echo "A test occured";
			// the variable values that are needed for the edit form are already available
			// echo $gdunit_id."</br>";
?>
			<div class="row">
	            <form name="edit_<?php echo $formtruetype;?>" method="POST" data-type="edit" onSubmit="return false" enctype="multipart/form-data" action="<?php echo $host_addr;?>snippets/edit.php">
					<input type="hidden" name="entryvariant" value="contententryupdate"/>
            		<input type="hidden" name="maintype" value="<?php echo $maintype;?>"/>
            		<input type="hidden" name="subtype" value="<?php echo $subtype;?>"/>
            		<input type="hidden" name="entryid" value="<?php echo $gdunit_id;?>"/>
            		<div class="col-md-12">
                        <div class="col-sm-12"> 
                          <div class="form-group">
                            <label>Core Value Title</label>
                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-file-text"></i>
                              </div>
                              <input type="text" class="form-control" name="contenttitle" value="<?php echo $contenttitle;?>" Placeholder="The message title"/>
                            </div><!-- /.input group -->
                          </div><!-- /.form group -->
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Choose Color Group <small>Leave Empty if you want to use the defaults.</small></label>
                                <div class="input-group select2-bootstrap-prepend">
                                    <div class="input-group-addon">
                                        <i class="fa fa-file-text"></i>
                                    </div>
                                    <select name="colourtype" data-name="select2plain" class="form-control">
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
                            <label>Details</label>
                            <textarea class="form-control" rows="3" cols="5" name="contentpost" placeholder="The message here"><?php echo $contentpost;?></textarea>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Content Status <small>Disable/Activate this entry?</small></label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-file-text"></i>
                                    </div>
                                    <select name="status" class="form-control">
										<option value="">--Choose--</option>
										<option value="active">Active</option>
										<option value="inactive">Disabled</option>
									</select>
                                </div><!-- /.input group -->
                            </div><!-- /.form group -->
                        </div>

                    </div>
                        <input type="hidden" name="formdata" value="edit_<?php echo $formtruetype;?>"/>
	                    <input type="hidden" name="extraformdata" value="contenttitle-:-input<|>
	                      colourtype-:-select<|>
	                      contentpost-:-textarea"/>
	                    <input type="hidden" name="errormap" value="contenttitle-:-Please Provide the title for the entry<|>
	                      colourtype-:-NA<|>
	                      contentpost-:-Please specify the content for the new post section"/>
		                <div class="col-md-12 clearboth">
			                <div class="box-footer">
			                    <input type="button" class="btn btn-danger" name="createentry" data-formdata="edit_<?php echo $formtruetype;?>" onclick="submitCustom('edit_<?php echo $formtruetype;?>','complete')" value="Update"/>
			                </div>
			            </div>
            	</form>	
	        </div>			
	        <script>
	        	$(document).ready(function(){
	        		$('form[name^=edit] select[name=status]').val("<?php echo $status;?>");
	        		<?php echo $totalscripts;?>
	        		if($.fn.select2){
	        			$('select[data-name=select2plain]').select2({
						    theme: "bootstrap"
						});
	        		}
	        	})
	        </script>
<?php
		}
?>
<?php
	}
?>
