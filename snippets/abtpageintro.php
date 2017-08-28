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
			// plaincontent hide class variable. This handles the display status
			// of the plain_content section in the form below and is hidden by
			// default
			$pc_hidden="hidden";
			// dualcontent hide class variable. This handles the display status
			// of the dual_content sections
			$dc_hidden="";
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
				
			}else{
				// this means there is no entry for the maintype 
				$contenttitle="";
				$contentsubtitle="";
				$contentpost="";
				$contentpost_1="";
				$contentpost_2="";
				// this is a compulsory variable to define
				$totalscripts="";
				$edit_attr="";
				
			}

?>
<div class="box">
	<div class="box-body">
	    <div class="box-group" id="generaldataaccordion">
			<div class="panel box overflowhidden box-primary">
			    <div class="box-header with-border">
			        <h4 class="box-title">
			          <a data-toggle="collapse" data-parent="#generaldataaccordion" href="#NewPageManagerBlock">
			            <i class="fa fa-sliders"></i> Create About Page Intro <small>Color shortcodes available.</small>
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
	                                    <label>Side Image <small>Rotating side image</small></label>
	                                    <?php
	                                    	if(isset($coverimage)&&$coverimage!==""){
	                                    ?>
	                                    <div class="contentpreview _image">
	                                    	<a href="<?php echo $host_addr.$coverimage_filedata['location'];?>" data-lightbox="general" data-src="<?php echo $host_addr.$coverimage_filedata['location'];?>">
	                                    		<img src="<?php echo $host_addr.$coverimage_filedata['thumbnail'];?>"/>
	                                    	</a>
	                                    </div>
	                                    <?php
	                                    		echo $coverimage_filedata['manageoutput'];
	                                    	}
	                                    ?><!-- specifies the value for the upload width/height format(fieldname_size[t|m)w|h]-->
	                                    <input type="hidden" class="form-control" name="coverimage_sizeth" value="150"/>
	                                    <input type="hidden" class="form-control" name="coverimage_sizemh" value="380"/>
	                                    <input type="file" class="form-control" name="coverimage" <?php echo $edit_attr;?>/>
	                                </div>
                                    <div class="col-sm-6">
                                        <label>Vision Statement </label>
                                        <textarea class="form-control" rows="3" name="contentpost_1"  placeholder="Entry Details top"><?php echo $contentpost_1;?></textarea>
                                    </div>
                                    <div class="col-sm-6 ">
                                        <label>Mission Statement </label>
                                        
                                        <textarea class="form-control" rows="3" name="contentpost_2"  placeholder="Entry Details bottom"><?php echo $contentpost_2;?></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <label>About Content:</label>
                                        <textarea class="form-control" rows="3" name="contentpost" data-mce="true" id="adminposter" placeholder="The message here"><?php echo $contentpost;?></textarea>
                                    </div>
                                </div>
                                <input type="hidden" name="formdata" value="<?php echo $formtruetype;?>"/>
			                    <input type="hidden" name="extraformdata" value="contenttitle-:-input<|>
			                      contentsubtitle-:-input<|>
	                      		  coverimage-:-input|image<|>
			                      contentpost_1-:-textarea<|>
			                      contentpost_2-:-textarea<|>
			                      contentpost-:-textarea"/>
			                    <input type="hidden" name="errormap" value="contenttitle-:-Please Provide the title for the entry<|>
			                      contentsubtitle-:-NA<|>
			                      coverimage-:-NA<|>
			                      contentpost_1-:-Please specify the vision statement<|>
			                      contentpost_2-:-Please specify the mission statement<|>
			                      contentpost-:-Please specify the content for this section"/>
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

			callTinyMCEInit("textarea[id*=postersmallthree]",curmcethreeposter);
			$(document).on("blur","select[name=contententrytype]",function(){
				if($(this).val()=="plain"){
					$('.dual_content').addClass('hidden');
					$('.plain_content').removeClass('hidden');
				}else{
					$('.dual_content').removeClass('hidden');
					$('.plain_content').addClass('hidden');
				}
			})
			
				<?php echo $totalscripts;?>
			
		});
	</script>
</div>
<?php
			}
		}
?>
