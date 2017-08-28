<?php
	// this is a basic template for creating and managing content for the generalinfo
	// table in a manageable and customizable format
	// This particular template serves content that needs only one entry
	// such as welcome messages or section descriptions on a page
	// the kind of form here is singular for both creating and editting 
	// previously created content

	// first, we make sure key variables are made available to us
	if(isset($displaytype)){
		// the basic variables accessible here are:
		// $gd_dataoutput, $datamap,viewtype, variant,maintype and subtype.
		// The gd_ variable here is the processed version of the data map json text,
		// it is an associative array obtained from said text
		if(!isset($viewtype)){
			$viewtype=="create";
		}
		// specify that this file uses the _gdunit module to work
		$_gdunit="true";
		$formtypeouttwo="submitcustom";
		// setup entry array for generaldata functions
		$contentgroupdatageneral=array();
		// obtain necessary data to carry out display operations
		if($viewtype=="create"||$viewtype=="edit"){
			
			// set the generaldata
			// setup the admin output headers if necessary.
			// this only occurs for forms that have a seperate section for editting content

			/*$contentgroupdatageneral['adminheadings']['rowdefaults']='<tr><th>Image</th><th>Title</th><th>Position</th><th>Status</th><th>View/Edit</th></tr>';
			$contentgroupdatageneral['adminheadings']['output']=5;
			$contentgroupdatageneral['evaldata']['single']['initeval']='
				$positionout=$subtitle==""?"Trustee":$subtitle;
				$row[\'subtitle\']=$positionout;
				$tddataoutput=\'<td class="tdimg"><img src="\'.$coverpathout.\'"/></td><td>\'.$title.\'</td><td>\'.$positionout.\'</td><td>\'.$status.\'</td><td name="trcontrolpoint"><a href="#&id=\'.$id.\'" name="edit" data-type="editsinglegeneraldata" data-divid="\'.$id.\'">Edit</a></td>\';				
			';*/

			// var_dump($outsdata);			
			$entryid=isset($outsdata['resultdataset'][0]['id'])?$outsdata['resultdataset'][0]['id']:0;
			// initialise content variables for the form below 
			// groupset hide class variable. This handles the display status of the 
			// 'triggerformaddlib' class element
			$hideaddlink="";
			if($entryid>0){
				// echo "test entryid<br>";
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
			}else{
				// this means there is no entry for the maintype 
				$contenttitle="";
				$contentsubtitle="";
				$sourcetext="";
				$contentpost="";
				$contentpost_1="";
				$contentpost_2="";
				// this is a compulsory variable to define
				$totalscripts="";
				$edit_attr="";
				// get the amount of previous entries in the groupset
				$cedit1=0;
				$cid=1;
				$gdeminimum1=2;
			}

?>
<div class="box">
	<div class="box-body">
	    <div class="box-group" id="generaldataaccordion">
			<div class="panel box overflowhidden box-primary">
			    <div class="box-header with-border">
			        <h4 class="box-title">
			          <a data-toggle="collapse" data-parent="#generaldataaccordion" href="#NewPageManagerBlock">
			            <i class="fa fa-sliders"></i> Create/Update About Page Ecosystem Section <small>Color shortcodes available. MarkUp allowed</small>
			          </a>
			        </h4>
			    </div>
			    <div id="NewPageManagerBlock" class="panel-collapse collapse in">
			        <div class="row">
			            <form name="<?php echo $formtruetype;?>" method="POST" data-type="create" onSubmit="return false" enctype="multipart/form-data" action="<?php echo $host_addr;?>snippets/edit.php">
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
                                        <label>Section SubTitle
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
	                                    <label>Statistics Infographics Image <small>Image showing statistics on industry ecosystem</small></label>
	                                    <?php
	                                    	if(isset($coverimage)&&$coverimage!==""){
	                                    ?>
	                                    <div class="contentpreview _image">
	                                    	<a href="<?php echo $host_addr.$coverimage_filedata['location'];?>" data-lightbox="general" data-src="<?php echo $host_addr.$coverimage_filedata['location'];?>">
	                                    		<img src="<?php echo $host_addr.$coverimage_filedata['thumbnail'];?>"/>
	                                    	</a>
	                                    </div>
	                                    <?php
	                                    		// echo $coverimage_filedata['manageoutput'];
	                                    	}
	                                    ?><!-- specifies the value for the upload width/height format(fieldname_size[t|m,w|h]-->
	                                    <input type="hidden" class="form-control" name="coverimage_sizeth" value="150"/>
	                                    <input type="hidden" class="form-control" name="coverimage_sizemh" value="428"/>
	                                    <input type="file" class="form-control" name="coverimage" <?php echo $edit_attr;?>/>
	                                    <input type="text" class="form-control" name="sourcetext" placeholder="The short title for the infographic image provided" value="<?php echo $sourcetext;?>"/>
	                                </div>
	                                
                                    <div class="col-md-12 stat-field-hold">
                                    	<h2>Create / Update Statistics <small>This represents the infographic on small screen devices</small></h2>
	                                    <input name="statcount" type="hidden" value="<?php echo $cid;?>" data-valcount="2" data-valset="1,3" data-counter="true" class="form-control"/>
                                    	<?php 
                                    		if($cedit1>0){
                                    			// produce previous content for editting
                                    	?>
                                    	<!-- this holds the value for the number of edittable entries -->
	                                    <input name="stat_cedit" type="hidden" value="<?php echo $cedit1;?>" class="form-control"/>
                                    	<?php		
                                    			for ($i = 1; $i <= $cedit1 ; $i++) {
                                    				// create the sets for previous entries
                                    	?>
                                    	<div class="col-md-3 _maxedgroup multi_content_hold " data-type="triggerprogeny">
											<h4 class="group_heading multi_content_countlabels">StatGroupData (Entry <?php echo $i?>)</h4>
                                    		<div class="col-md-12">
				                                <div class="form-group">
				                                    <label>Statistics title.</label>
				                                    <div class="input-group">
					                                    <div class="input-group-addon">
					                                        <i class="fa fa-circle"></i>
					                                    </div>
					                                    <input name="statname<?php echo $i?>" class="form-control" value="<?php echo $gd_general_array['group1']["statname$i"];?>" type="text" Placeholder="Title for Statistics entry"/>				                                    
					                                </div><!-- /.input group -->
				                                </div><!-- /.form group -->
			                                </div>
                                    		<div class="col-md-12">
				                                <div class="form-group">
				                                    <label>Choose a Color Group <small>Default colors are already set</small></label>
				                                    <div class="input-group">
					                                    <div class="input-group-addon">
					                                        <i class="fa fa-file-text"></i>
					                                    </div>
					                                    <select name="statcolourtype<?php echo $i?>" class="form-control">
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
				                                    <label>StatPercentage</label>
				                                    <div class="input-group">
					                                    <div class="input-group-addon">
					                                        <i class="fa fa-percent"></i>
					                                    </div>
					                                    <input name="statpercent<?php echo $i?>" class="form-control" type="number" min="1" max="100" value="<?php echo $gd_general_array['group1']["statpercent$i"];?>" Placeholder="Percentage value for stat entry."/>				                                    
					                                </div><!-- /.input group -->
				                                </div><!-- /.form group -->
			                                </div>
	                                    	<?php echo $gd_general_array['group1']["entryremoval$i"];?>
                                    	</div>
                                    	<?php 
                                    			}
                                    		}
                                    		// this section is for new content to be added
                                    		// to the groupset
                                    		if($cedit1<8){
                                    	?>
                                    	<div class="col-md-3 _maxedgroup multi_content_hold " data-name="stat" data-type="triggerprogenitor" data-cid="<?php echo $cid?>">
											<h4 class="group_heading multi_content_countlabels">StatGroupData (Entry <?php echo $cid?>)</h4>
                                    		<div class="col-md-12">
				                                <div class="form-group">
				                                    <label>Statistics title.</label>
				                                    <div class="input-group">
					                                    <div class="input-group-addon">
					                                        <i class="fa fa-circle"></i>
					                                    </div>
					                                    <input name="statname<?php echo $cid?>" class="form-control" type="text" Placeholder="Title for Statistics entry"/>				                                    
					                                </div><!-- /.input group -->
				                                </div><!-- /.form group -->
			                                </div>
                                    		<div class="col-md-12">
				                                <div class="form-group">
				                                    <label>Choose a Color Group <small>Default colors are already set</small></label>
				                                    <div class="input-group">
					                                    <div class="input-group-addon">
					                                        <i class="fa fa-file-text"></i>
					                                    </div>
					                                    <select name="statcolourtype<?php echo $cid?>" class="form-control">
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
				                                    <label>StatPercentage</label>
				                                    <div class="input-group">
					                                    <div class="input-group-addon">
					                                        <i class="fa fa-percent"></i>
					                                    </div>
					                                    <input name="statpercent<?php echo $cid?>" class="form-control" type="number" min="1" max="100" Placeholder="Percentage value for stat entry."/>				                                    
					                                </div><!-- /.input group -->
				                                </div><!-- /.form group -->
			                                </div>
                                    	</div>
                                    	<?php
                                    		}
                                    	?>
                                    	<div name="statentrypoint" data-marker="true"></div>
                                    	<input name="statdatamap" type="hidden" value="statname-:-input<|>
						                      statcolourtype-:-select<|>
				                      		  statpercent-:-input" class="form-control"/>
                                    	<input name="stat_entryminimum" type="hidden" value="<?php echo $gdeminimum1;?>" class="form-control"/>
                                    	
                                    	<a href="##" class="generic_addcontent_trigger" 
											data-type="triggerformaddlib" 
											data-form-name="<?php echo $formtruetype;?>" 
											data-name="statcount_addlink" 
											data-i-type="" 
											data-limit="8"> 
											<i class="fa fa-plus"></i>Add More?
										</a>
                                    	
                                    </div>
                                    <div class="col-md-12">
                                        <label>About Content:</label>
                                        <textarea class="form-control" rows="3" name="contentpost" data-mce="true" id="postersmallthree_1" placeholder="The message here"><?php echo $contentpost;?></textarea>
                                    </div>
                                </div>
                                <input type="hidden" name="formdata" value="<?php echo $formtruetype;?>"/>
			                    <input type="hidden" name="extraformdata" value="contenttitle-:-input<|>
			                      contentsubtitle-:-input<|>
	                      		  coverimage-:-input|image<|>
	                      		  sourcetext-:-input-:-[group-|-coverimage-|-input-|-*any*]<|>
			                      contentpost-:-textarea<|>
			                      egroup|data-:-[statcount:*:stat_entryminimum>|<
			                      statname-|-input>|<statcolourtype-|-select>|<statpercent-|-input]-:-groupfall[1-3,3-1]"/>
			                    <input type="hidden" name="errormap" value="contenttitle-:-Please Provide the title for the entry<|>
			                      contentsubtitle-:-NA<|>
			                      coverimage-:-NA<|>
			                      sourcetext-:-Please provide the placholder text for the infographic image.<|>
			                      contentpost-:-Please specify the content for this section.<|>
			                      egroup|data-:-[Please provide the title for this statistic entry.>|<
			                      NA>|<The statistics percentage for an entry is missing.]"/>
				                <div class="col-md-12 clearboth">
					                <div class="box-footer">
					                    <input type="button" class="btn btn-danger" name="createentry" data-formdata="<?php echo $formtruetype;?>" onclick="submitCustom('<?php echo $formtruetype;?>','complete')" value="Create/Update"/>
					                </div>
					            </div>
		            	</form>	
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
			
			
				<?php echo $totalscripts;?>
			
		});
	</script>
</div>
<?php
			}
		}
?>
