<?php
	/**
	*	userentries.php. 
	*	this file holds the views for creating/editting user accounts
	*	its has both the create sections and edit sections for the usermoduleadvanced.php
	*	modules
	*	merged into one.
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
		// get state related content
		$statedata=produceStates();
		// manage the datamap to be passed into called function
		if(isset($datamap)&&isset($contentgroupdatageneral['datamap'])){

			$data['single']['datamap']=$contentgroupdatageneral['datamap'];
			$localdatamap=$data['single']['datamap'];
		}

		// seperate data set for displaying only the editsection of blog entries
		// when particular requests are made with the following viewtypes
		$viewertype="viewer";
		// set thre default user viewtype to be 'serviceprovider' to allow selection
		// of only client based data from the users database table
		$data['user']='user';
		if(isset($variant2)&&isset($variant)&&
			($variant=="createuseraccadmin"||$variant2=="edituseraccadmin")){
			$viewertype="admin";

			$data['pcoutput']="adminoutput2";
			$data['subpcoutput']="adminoutputtwo2";
		}
		// this section handles the display of search data
		if($viewtype=="userplain_crt"){
			$viewdata="userplain";
			$extra="";
			$data['pcoutput']="adminoutput";
			$data['subpcoutput']="adminoutputtwo";

			// check for entryvariant data to be used in determining    
			// the generically outputted data
			if(isset($gd_dataoutput['variant'])&&
				$gd_dataoutput['variant']!==""){
				$cvariant=$gd_dataoutput['variant'];
				if($cvariant=="createuseraccadmin"){

					$data['pcoutput']="adminoutput2";
					$data['subpcoutput']="adminoutputtwo2";
					
				}		
			}

			// state
			if(isset($gd_dataoutput['state'])&&
				$gd_dataoutput['state']!==""){
				$qcat=$extra==""?"":" AND";
				$statenameq=$gd_dataoutput['state'];
				// get the id of the state
				// echo "SELECT * FROM state WHERE id_no=$state";
				$sdata=briefquery("SELECT id_no FROM state WHERE state='$statenameq'",__LINE__,
					"mysqli");
				$cdata=$sdata['resultdata'][0];
				$numrows=$sdata['numrows'];
				// if there are any results then set the state id to the current id
				$stateid=$numrows>0?$cdata['id_no']:0;
				$extra.="$qcat state='$stateid'";
			}
			
			// fullname
			if(isset($gd_dataoutput['fullname'])&&
				$gd_dataoutput['fullname']!==""){
				$qcat=$extra==""?"":" AND";
				$fullname=$gd_dataoutput['fullname'];
				$extra.="$qcat fullname LIKE '%$fullname%'";
			}

			// address
			if(isset($gd_dataoutput['address'])&&
				$gd_dataoutput['address']!==""){
				$qcat=$extra==""?"":" AND";
				$address=$gd_dataoutput['address'];
				$extra.="$qcat address LIKE '%$address%'";
			}

			// status
			if(isset($gd_dataoutput['status'])&&
				$gd_dataoutput['status']!==""){
				$qcat=$extra==""?"":" AND";
				$status=$gd_dataoutput['status'];
				$extra.="$qcat status='$status'";
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

			// age range
			// age restriction
			if(isset($gd_dataoutput['prageminmax'])&&$gd_dataoutput['prageminmax']!==""){

				$qcat=$extra==""?"":" AND";
				$prageminmax=$gd_dataoutput['prageminmax'];
				$pragedata=explode(",",$prageminmax);
				$curyear=date("Y");
				$pragemin=$curyear-$pragedata[1]."-01-01";
				$pragemax=$curyear-$pragedata[0]."-01-01";
				$pragemin==$pragemax?$prageout=$pragemin:
				$prageout="$pragemin - $pragemax";
				// generate age restriction query
				$agequery="";
				if($pragemin==$pragemax){
					$outyear=$curyear-$pragedata[1]."-01-01";
					$outyear2=$curyear-$pragedata[1]."-12-31";
					$agequery=" $qcat dob>=$outyear AND dob<='$outyear2'";
				}else if($pragedata[0]<$pragedata[1]){
					$agequery=" $qcat (dob>='$pragemin' AND dob<='$pragemax')";
				}
				$extra.=$agequery;
			}

			// gender
			if(isset($gd_dataoutput['gender'])&&
				$gd_dataoutput['gender']!==""){
				$qcat=$extra==""?"":" AND";
				$gender=$gd_dataoutput['gender'];
				$extra.="$qcat gender='$gender'";

			}

			// email
			if(isset($gd_dataoutput['email'])&&
				$gd_dataoutput['email']!==""){
				$qcat=$extra==""?"":" AND";
				$email=$gd_dataoutput['email'];
				$extra.="$qcat email='$email'";

			}

			// phonenumber
			if(isset($gd_dataoutput['phonenumber'])&&
				$gd_dataoutput['phonenumber']!==""){
				$qcat=$extra==""?"":" AND";
				$phonenumber=$gd_dataoutput['phonenumber'];
				$extra.="$qcat phonenumber='$phonenumber'";

			}


			if(isset($gd_dataoutput['viewextra'])){
				$ve=$gd_dataoutput['viewextra'];
				$qcat=$extra==""?"":" AND";
				if($ve=="inactiveusers_crt"){
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
			$outsdata=getAllUsers("$viewertype",'','blockdeeprun',$data);
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
		
		// end
		// initialise content variables for the form below 
		$newin="in";
		$editin="";	
		$newh="";
		$edith="";
		if($viewtype=="create"||(($_vcrt===true||$_vcrt>0||$_vcrt==1)&&$_vcrt!==-1)){
			// create data content array
			$ctype=$_gdunit_viewtype;
			$fhtitle="User Account";
						

			$data['queryorder']="ORDER by id DESC";
			// set the form type for the edit section
			$data['single']['formtruetype']="edit_".$formtruetype;

			// check if there are currently entries first and prepare the 
			// edit table section

			// $outs=getAllBlogTypes("viewer","all");
			// var_dump($data);

			// variable for setting the viewdata on the edit section
			// search operations fields, this value here allows a seperate kind of 
			// request be made to this file providing an extra set of functions for 
			// manipulating search data results to be presented
			$viewdata="userplain";

			if($viewtype=="newuser_crt"){
				// $viewdata="blogschedule";
				$newh="";
				$edith="hidden";
				$newin="in";
				$editin=""; 
			}else if($viewtype=="edituser_crt"){
				// $viewdata="blogschedule";
				$data["single"]["type"]="blockdeeprun";
				// $data['queryextra']=" (scheduledpost='no' OR scheduledpost='')";
				$outsdata=getAllUsers("$viewertype",'','blockdeeprun',$data);
				$newh="hidden";
				$newin="";
				$edith="";
				$editin="in";
			}else{
				$data["single"]["type"]="blockdeeprun";
				$data['queryextra']=" (scheduledpost='no' OR scheduledpost='')";
				$outsdata=getAllUsers("$viewertype",'','blockdeeprun',$data);
			}

			$lastcode="";
			if(isset($outsdata['numrows'])&&$outsdata['numrows']>0){
				// entries are available
				$editin="in";
				$newin="";
				
			}
			// check for the last code entry data value

?>
<div class="box">
	<div class="box-body">
	    <div class="box-group" id="generaldataaccordion">
	    	<?php
	    		if($newh==""){
	    	?>
			<div class="panel box overflowhidden box-primary">
			    <div class="box-header with-border">
			        <h4 class="box-title">
			          <a data-toggle="collapse" data-parent="#generaldataaccordion" href="#NewPageManagerBlock">
			            <i class="fa fa-sliders"></i> Create <?php echo $fhtitle;?>
			          </a>
			        </h4>
			    </div>
			    <div id="NewPageManagerBlock" class="panel-collapse collapse <?php echo $newin;?>">
			        <div class="row">
			            <form name="<?php echo $formtruetype;?>" method="POST" onSubmit="return false" enctype="multipart/form-data" action="<?php echo $host_addr;?>snippets/basicsignup.php">
							<input type="hidden" name="entryvariant" value="<?php echo $variant;?>"/>
							<div class="col-md-4">
	                        	<div class="form-group">
			                      <label>First Name</label>
			                      <div class="input-group">
				                      <div class="input-group-addon">
				                        <i class="fa fa-file-text"></i>
				                      </div>
			                      	  <input type="text" class="form-control" name="firstname" placeholder="First Name"/>
			                      </div>
			                    </div>
			                </div>
			                <div class="col-md-4">
	                        	<div class="form-group">
			                      <label>Middle Name</label>
			                      <div class="input-group">
				                      <div class="input-group-addon">
				                        <i class="fa fa-file-text"></i>
				                      </div>
			                      	  <input type="text" class="form-control" name="middlename" placeholder="Middle Name"/> 
			                      </div>
			                    </div>
			                </div>
			                <div class="col-md-4">
	                        	<div class="form-group">
			                      <label>Last Name</label>
			                      <div class="input-group">
				                      <div class="input-group-addon">
				                        <i class="fa fa-file-text"></i>
				                      </div>
			                      	  <input type="text" class="form-control" name="lastname" placeholder="Last Name"/>
			                      </div>
			                    </div>
			                </div>
			                <div class="col-md-4">
	                        	<div class="form-group">
			                      <label>Gender</label>
			                      <div class="input-group">
				                      <div class="input-group-addon">
				                        <i class="fa fa-file-text"></i>
				                      </div>
			                      	  <select type="text" class="form-control" name="gender" placeholder="First Name">
			                      	  	<option value="">--Choose Gender--</option>
			                      	  	<option value="male">Male</option>
			                      	  	<option value="female">Female</option>
			                      	  	<option value="other">Other</option>
			                      	  </select>
			                      </div>
			                    </div>
			                </div>
			                <div class="col-md-4">
	                        	<div class="form-group">
			                      <label>Date of Birth</label>
			                      <div class="input-group">
				                      <div class="input-group-addon">
				                        <i class="fa fa-file-text"></i>
				                      </div>
			                      	  <input type="text" class="form-control" data-datepicker="true" name="dob" placeholder="Date of Birth"/> 
			                      </div>
			                    </div>
			                </div>
			                <div class="col-md-4">
	                        	<div class="form-group">
			                      <label>Phone Number</label>
			                      <div class="input-group">
				                      <div class="input-group-addon">
				                        <i class="fa fa-phone"></i>
				                      </div>
			                      	  <input type="text" class="form-control" name="phonenumber" placeholder="Phone Number"/>
			                      </div>
			                    </div>
			                </div>
			                <div class="col-md-4">
	                        	<div class="form-group">
			                      <label>Email Address</label>
			                      <div class="input-group">
				                      <div class="input-group-addon">
				                        <i class="fa fa-at"></i>
				                      </div>
			                      	  <input type="email" class="form-control" name="email" 
			                      	   data-feverify="true" data-fev-state="inactive" 
			                      	   data-fev-tbl="users" data-fev-col="email" 
			                      	   data-fev-map='{"logic":[2],"column":["usertype"],"value":["user"]}' 
			                      	   data-evalidate="true" data-fev-lval="" 
			                      	   placeholder="Email address"/>
			                      	    <div class="input-group-addon rel _fev-group">
			                                <i class="fa fa-database _group _default"></i>
			                                <i class="fa fa-check color-green _group 
			                                success hidden"></i>
			                                <i class="fa fa-times color-lightred 
			                                _group failure hidden"></i>
			                                <img src="<?php echo $host_addr;?>images/loading.gif" 
			                                class=" loadermask loadermini _igloader _upindex hidden">
			                            </div>
			                      </div>
			                    </div>
			                </div>
			                <div class="col-md-4">
			                	<div class="form-group">
			                      <label>Username</label>
			                      <div class="input-group">
				                      <div class="input-group-addon">
				                        <i class="fa fa-user-circle"></i>
				                      </div>
			                      	  <input type="text" class="form-control" name="username" 
			                      	  		data-feverify="true" data-fev-state="inactive" 
				                      	   data-fev-tbl="users" data-fev-col="username" 
				                      	   data-fev-map='{"logic":[2],"column":["usertype"],"value":["user"]}' 
				                      	   data-fev-lval=""
				                      	   placeholder="Username"/>
				                      	<div class="input-group-addon rel _fev-group">
			                                <i class="fa fa-database _group _default"></i>
			                                <i class="fa fa-check color-green _group 
			                                success hidden"></i>
			                                <i class="fa fa-times color-lightred 
			                                _group failure hidden"></i>
			                                <img src="<?php echo $host_addr;?>images/loading.gif" 
			                                class=" loadermask loadermini _igloader _upindex hidden">
			                            </div>
			                      </div>
			                    </div>
			                </div>
			                <div class="col-md-4">
	                        	<div class="form-group">
			                      <label>Account Password</label>
			                      <div class="input-group">
				                      <div class="input-group-addon">
				                        <i class="fa fa-lock"></i>
				                      </div>
			                      	  <input type="password" data-sa="true" data-type="password" class="form-control" name="pword" data-pvalidate="true" data-pvtype="nlcus" data-pvforce="" placeholder="The user Password here"/>
			                      	  <div class="input-group-addon pshow" title="show">
				                        <i class="fa fa-eye-slash"></i>
				                      </div>
			                      </div>
			                    </div>
			                </div>
			                <div class="col-md-4">
	                        	<div class="form-group">
			                      <label>Preferred Contact Method</label>
			                      <div class="input-group">
				                      <div class="input-group-addon">
				                        <i class="fa fa-street-view"></i>
				                      </div>
			                      	  <select type="text" class="form-control" name="pcmethod">
			                      	  	<option value="">--Choose--</option>
			                      	  	<option value="email">Email</option>
			                      	  	<option value="phonenumber">Telephone</option>
			                      	  </select>
			                      </div>
			                    </div>
			                </div>
			                <div class="col-md-12">

	                        	<div class="form-group">
			                      <label>Contact Address</label>
			                      <div class="input-group">
				                      <div class="input-group-addon">
				                        <i class="fa fa-map-marker"></i>
				                      </div>
				                      <select name="state" id="state" class="form-control">
											<option value="">Select State</option>
											// <?php echo $statedata['selectionstatestwo'];?>
									  </select>
			                      	  <textarea class="form-control" name="address" placeholder="Full address"></textarea>
			                      </div>
			                    </div>
			                </div>
			                <input type="hidden" name="formdata" value="<?php echo $formtruetype;?>"/>
		                    <input type="hidden" name="extraformdata" value="firstname-:-input<|>
		                      middlename-:-input<|>
		                      lastname-:-input<|>
		                      gender-:-select<|>
		                      dob-:-input<|>
		                      phonenumber-:-input<|>
		                      email-:-input<|>
		                      pword-:-input<|>
		                      pcmethod-:-select<|>
		                      state-:-select<|>
		                      address-:-textarea"/>
		                    <input type="hidden" name="errormap" value="firstname-:-Please provide Firstname<|>
			                    middlename-:-NA<|>
			                    lastname-:-Please Provide last name<|>
			                    gender-:-Choose gender<|>
			                    dob-:-Specify date of birth<|>
			                    phonenumber-:-Please provide a phone number<|>
			                    email-:-Provide a valid email address<|>
			                    pword-:-Provide a good password of at least 8 characters in length.<|>
			                    pcmethod-:-NA<|>
			                    state-:-Select a state<|>
			                    address-:-Please Provide an address."/>
			                <div class="col-md-12 clearboth">
				                <div class="box-footer">
				                    <input type="button" class="btn btn-danger" name="user" data-formdata="<?php echo $formtruetype;?>" onclick="submitCustom('<?php echo $formtruetype;?>','complete')" value="Save"/>
				                </div>
				            </div>
			            </form>
			        </div>
			    </div>
			</div>
			<?php
	    		}
	    	?>
			<?php
	    		if($edith==""){
	    	?>
			<div class="panel box overflowhidden box-primary">
                <div class="box-header with-border">
                  <h4 class="box-title">
                    <a data-toggle="collapse" data-parent="#generaldataaccordion" href="#EditBlock">
                      <i class="fa fa-gear fa-spin"></i> Edit <?php echo $fhtitle;?>
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
								<?php
									echo $miniviewdata;
								?>
								<div class="col-md-4">
	                            	<div class="form-group">
										<label>Name</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-file-text-o"></i>
											</div>
											<input name="fullname" 
											placeholder="Search by name" 
											class="form-control" data-crt="true"/>
												
										</div>
	                            	</div>
								</div>
	                        	<div class="col-sm-<?php echo $clc;?>"> 
	                                <div class="form-group">
	                                    <label>State</label>
	                                    <div class="input-group select2-bootstrap-prepend">
		                                      <div class="input-group-addon">
		                                        <i class="fa fa-map-marker"></i>
		                                      </div>
											  	<select name="state" data-crt="true" data-name="select2plain" class="form-control">
					                        		<option value="">--Choose--</option>
													<?php echo $statedata['selectionstatestwo'];?>
												</select>
		                                </div><!-- /.input group -->
	                              	</div><!-- /.form group -->
	                            </div>
	                            <div class="col-md-<?php echo $clc;?>">
	                            	<div class="form-group">
										<label>Address <small>Full/Part address</small></label>
										<div class="input-group select2-bootstrap-prepend select2-bootstrap-append">
											<div class="input-group-addon">
												<i class="fa fa-map-marker"></i>
											</div>

											<input name="address"
											placeholder="Registered Address" 
											class="form-control" data-crt="true"/>
										</div>
	                            	</div>
								</div>

								<div class="col-md-4">
	                            	<div class="form-group">
										<label>Email</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-at"></i>
											</div>
											<input name="email" 
											placeholder="Search by email" 
											class="form-control" data-crt="true"/>
												
										</div>
	                            	</div>
								</div>
								<div class="col-md-4">
	                            	<div class="form-group">
										<label>Phonenumber</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-phone"></i>
											</div>
											<input name="phonenumber" 
											placeholder="Search by Phonenumber" 
											class="form-control" data-crt="true"/>
												
										</div>
	                            	</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
					                    <label>Age :<small></small></label>
				                      	<div class="range-slider clearfix">
				                      		<input name="pragemin" type="hidden"/>
				                      		<input name="pragemax" type="hidden"/>
											<input type="hidden" name="prageminmax" class="slider" data-min="10" data-max="60" data-current-min="15" data-current-max="28" data-mintarget="input[name=pragemin]" data-maxtarget="input[name=pragemax]" data-slider-id="purple" data-crt="true">
											<div class="first-value"><span>0</span> Years</div>
											<div class="last-value"><span>0</span> Years</div>
										</div>
				                    </div><!-- /.form group -->
								</div>
								
								<div class="col-md-3">
	                            	<div class="form-group">
										<label>Reg Date Range (Start)</label>
										<div class="input-group select2-bootstrap-prepend">
											<div class="input-group-addon">
												<i class="fa fa-file-text-o"></i>
											</div>
											<input name="entryrangestart"
											data-datetimepicker 
											placeholder="Search Start date" 
											class="form-control" data-crt="true"/>
												
										</div>
	                            	</div>
								</div>
								<div class="col-md-3">
	                            	<div class="form-group">
										<label>Reg Date Range (End)</label>
										<div class="input-group select2-bootstrap-prepend">
											<div class="input-group-addon">
												<i class="fa fa-file-text-o"></i>
											</div>
											<input name="entryrangeend"
											data-datetimepicker 
											placeholder="Search End date" 
											class="form-control" data-crt="true"/>
												
										</div>
	                            	</div>
								</div>
								<div class="col-md-3">
	                            	<div class="form-group">
										<label>Gender</label>
										<div class="input-group select2-bootstrap-prepend">
											<div class="input-group-addon">
												<i class="fa fa-venus-mars"></i>
											</div>
											<select name="gender" 
											data-name="select2plain" data-crt="true"
											class="form-control">
												<option value=""
												>--Choose--</option>
												<option value="male">Male</option>
												<option value="female">Female</option>
											</select>
										</div>
	                            	</div>
								</div>
								<div class="col-md-3">
			                    	<div class="form-group">
				                        <label>Account State</label>
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
            <?php
        		}
	    	?>
		</div>
	</div>
	<script>
		$(document).ready(function(){
			var curmceadminposter=[];
			curmceadminposter['width']="100%";
			curmceadminposter['height']="650px";
			curmceadminposter['toolbar1']="undo redo | bold italic underline | fontselect fontsizeselect | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect";
			curmceadminposter['toolbar2']="| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ";
			callTinyMCEInit("textarea#adminposter",curmceadminposter);


			var curmcethreeposter=[];
			curmcethreeposter['width']="100%";

			curmcethreeposter['height']="300px";
			curmcethreeposter['toolbar2addon']=" | preview code ";
			callTinyMCEInit("textarea[id*=postersmalltwo]",curmcethreeposter);
			
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
			// init ranged slider
			if($.fn.rangedSlider){
				$('body').rangedSlider();
			}

  			if($.fn.datepicker){
  				$('[data-datetimepicker]').datetimepicker({
			        format:"YYYY-MM-DD HH:mm",
			        keepOpen:true
			    })
			    // for disabling previous dates 
			    $('[data-datetimepickerf]').datetimepicker({
			        format:"YYYY-MM-DD HH:mm",
			        keepOpen:true,
			        minDate: moment(1, 'h')
			    });
			    $('[data-datepicker]').datetimepicker({
			        format:"YYYY-MM-DD",
			        keepOpen:true
			        // showClose:true
			        // debug:true
			    });
			    $('[data-datepickerf]').datetimepicker({
			        format:"YYYY-MM-DD",
			        keepOpen:true,
			        minDate: moment(1, 'h')
			        // showClose:true
			        // debug:true
			    });
			    $('[data-timepicker]').datetimepicker({
			        format:"HH:mm",
			        keepOpen:true
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

			// echo $editid;
			// echo $variant2;
			$dataset=getSingleUserPlain($editid,"",$data);
			$row=$dataset;
			$hidestatus="";
			$genderdisabled="";
			if($dataset['genderchangedate']!=="0000-00-00"){
				$genderdisabled='disabled="true" title="A one time change is allowed for errors in the gender option"';
			}
			if(isset($_SESSION['userhmysalvus'])&&isset($variant2)
				&&$variant2=="edituseracc"){
				$hidestatus="hidden";
			}

			$totalscripts=$dataset['totalscripts'];
			// echo $totalscripts;
?>
			<!-- Edit section -->
			<div class="row">
		        <form name="<?php echo $formtruetype2;?>" method="POST" onSubmit="return false" enctype="multipart/form-data" action="<?php echo $host_addr;?>snippets/edit.php">
					<input type="hidden" name="entryvariant" value="<?php echo $variant2;?>"/>

					<input type="hidden" name="entryid" value="<?php echo $editid;?>"/>

					<div class="col-md-12">
			            <h4>Edit Profile</h4>
					</div>
					<div class="col-md-4">
				    	<div class="form-group">
				          <label>First Name</label>
				          <div class="input-group">
				              <div class="input-group-addon">
				                <i class="fa fa-file-text"></i>
				              </div>
				          	  <input type="text" class="form-control" name="firstname" value="<?php echo $dataset['firstname'];?>" placeholder="First Name"/>
				          </div>
				        </div>
				    </div>
				    <div class="col-md-4">
				    	<div class="form-group">
				          <label>Middle Name</label>
				          <div class="input-group">
				              <div class="input-group-addon">
				                <i class="fa fa-file-text"></i>
				              </div>
				          	  <input type="text" class="form-control" name="middlename" value="<?php echo $dataset['middlename'];?>" placeholder="Middle Name"/> 
				          </div>
				        </div>
				    </div>
				    <div class="col-md-4">
				    	<div class="form-group">
				          <label>Last Name</label>
				          <div class="input-group">
				              <div class="input-group-addon">
				                <i class="fa fa-file-text"></i>
				              </div>
				          	  <input type="text" class="form-control" name="lastname" value="<?php echo $dataset['lastname'];?>" placeholder="Last Name"/>
				          </div>
				        </div>
				    </div>
				    <div class="col-md-4">
				    	<div class="form-group">
				          <label>Cover Photo</label>
				          <div class="input-group">
				              <div class="input-group-addon">
				                <i class="fa fa-file-image-o"></i>
				              </div>
				          	  <input type="hidden" class="form-control" name="coverid" value="<?php echo $dataset['faceid'];?>"/>
				          	  <input type="file" class="form-control" name="contentpic"/>
				          </div>
				        </div>
				    </div>
				    <div class="col-md-4">
				    	<div class="form-group">
				          <label>Gender</label>
				          <div class="input-group">
				              <div class="input-group-addon">
				                <i class="fa fa-file-text"></i>
				              </div>
				          	  <select type="text" class="form-control" name="gender" <?php echo $genderdisabled;?>placeholder="First Name">
				          	  	<option value="">--Choose Gender--</option>
				          	  	<option value="male">Male</option>
				          	  	<option value="female">Female</option>
				          	  	<option value="other">Other</option>
				          	  </select>
				          </div>
				        </div>
				    </div>
				    <div class="col-md-4">
				    	<div class="form-group">
				          <label>Date of Birth</label>
				          <div class="input-group">
				              <div class="input-group-addon">
				                <i class="fa fa-file-text"></i>
				              </div>
				          	  <input type="text" class="form-control" data-datepicker="true" value="<?php echo $dataset['dob'];?>" name="dob" placeholder="Date of Birth"/> 
				          </div>
				        </div>
				    </div>
				    <div class="col-md-4">
				    	<div class="form-group">
				          <label>Phone Number</label>
				          <div class="input-group">
				              <div class="input-group-addon">
				                <i class="fa fa-phone"></i>
				              </div>
				          	  <input type="text" class="form-control" name="phonenumber" value="<?php echo $dataset['phonenumber'];?>" placeholder="Phone Number"/>
				          </div>
				        </div>
				    </div>

				    <div class="col-md-4">
				    	<div class="form-group">
				            <label>Email Address</label>
				            <div class="input-group">
				                  <div class="input-group-addon">
				                    <i class="fa fa-at"></i>
				                  </div>
				              	  
				                  <input type="email" class="form-control" name="email" 
				                   data-feverify="true" data-fev-state="done" 
				                   data-fev-tbl="users" data-fev-col="email" 
				                   data-fev-map='{"logic":[2],"column":["usertype"],"value":["user"]}'
				                   data-evalidate="true" data-fev-lval=""
				                   data-fev-elval="<?php echo $dataset['email'];?>" 
				                    data-edittype="true" value="<?php echo $dataset['email'];?>" 
				                   placeholder="Email address"/>
				                  <div class="input-group-addon rel _fev-group">
				                      <i class="fa fa-database _group _default"></i>
				                      <i class="fa fa-check color-green _group 
				                      success hidden"></i>
				                      <i class="fa fa-times color-lightred 
				                      _group failure hidden"></i>
				                      <img src="<?php echo $host_addr;?>images/loading.gif" 
				                      class=" loadermask loadermini _igloader _upindex hidden">
				                  </div>
				            </div>
			            </div>
				    </div>
				    <div class="col-md-4">
				        <div class="form-group">
				              <label>Username(Optional)</label>
				              <div class="input-group">
				                <div class="input-group-addon">
				                  <i class="fa fa-user-circle"></i>
				                </div>

				                  <input type="text" class="form-control" name="username" 
				                      data-feverify="true" data-fev-state="done" 
				                     data-fev-tbl="users" data-fev-col="username" 
				                     data-fev-map='{"logic":[2],"column":["usertype"],"value":["user"]}' 
				                     data-fev-lval=""
				                   data-fev-elval="<?php echo $dataset['username'];?>" 
				                      value="<?php echo $dataset['username'];?>"
				                     placeholder="Username"/>
				                  <div class="input-group-addon rel _fev-group">
				                        <i class="fa fa-database _group _default"></i>
				                        <i class="fa fa-check color-green _group 
				                        success hidden"></i>
				                        <i class="fa fa-times color-lightred 
				                        _group failure hidden"></i>
				                        <img src="<?php echo $host_addr;?>images/loading.gif" 
				                        class=" loadermask loadermini _igloader _upindex hidden">
				                  </div>
				              </div>
				        </div>
				    </div>
				    <div class="col-md-4">
				    	<div class="form-group">
				          <label>Account Password</label>
				          <div class="input-group">
				              <div class="input-group-addon">
				                <i class="fa fa-lock"></i>
				              </div>
				          	  <input type="password" value="<?php echo $dataset['pword'];?>" data-sa="true" data-type="password" class="form-control" name="pword" data-pvalidate="true" data-pvtype="nlcus" data-pvforce="" placeholder="The user Password here"/>
				          	  <div class="input-group-addon pshow" title="show">
				                <i class="fa fa-eye-slash"></i>
				              </div>
				          </div>
				        </div>
				    </div>
				    <div class="col-md-4">
				    	<div class="form-group">
				          <label>Preferred Contact Method</label>
				          <div class="input-group">
				              <div class="input-group-addon">
				                <i class="fa fa-street-view"></i>
				              </div>
				          	  <select type="text" class="form-control" name="pcmethod">
				          	  	<option value="">--Choose--</option>
				          	  	<option value="email">Email</option>
				          	  	<option value="phonenumber">Telephone</option>
				          	  </select>
				          </div>
				        </div>
				    </div>
				    <div class="col-md-12">

				    	<div class="form-group">
				          <label>Contact Address</label>
				          <div class="input-group">
				              <div class="input-group-addon">
				                <i class="fa fa-map-marker"></i>
				              </div>
				              <select name="state" id="state" class="form-control">
									<option value="">Select State</option>
									<option value="Abia">Abia</option>
									<option value="Adamawa">Adamawa</option>
									<option value="Akwa Ibom">Akwa Ibom</option>
									<option value="Anambra">Anambra</option>
									<option value="Bauchi">Bauchi</option>
									<option value="Bayelsa">Bayelsa</option>
									<option value="Benue">Benue</option>
									<option value="Borno">Borno</option>
									<option value="Cross River">Cross River</option>
									<option value="Delta">Delta</option>
									<option value="Ebonyi">Ebonyi</option>
									<option value="Edo">Edo</option>
									<option value="Ekiti">Ekiti</option>
									<option value="Enugu">Enugu</option>
									<option value="FCT">FCT</option>
									<option value="Gombe">Gombe</option>
									<option value="Imo">Imo</option>
									<option value="Jigawa">Jigawa</option>
									<option value="Kaduna">Kaduna</option>
									<option value="Kano">Kano</option>
									<option value="Kastina">Kastina</option>
									<option value="Kebbi">Kebbi</option>
									<option value="Kogi">Kogi</option>
									<option value="Kwara">Kwara</option>
									<option value="Lagos">Lagos</option>
									<option value="Nasarawa">Nasarawa</option>
									<option value="Niger">Niger</option>
									<option value="Ogun">Ogun</option>
									<option value="Ondo">Ondo</option>
									<option value="Osun">Osun</option>
									<option value="Oyo">Oyo</option>
									<option value="Plateau">Plateau</option>
									<option value="Rivers">Rivers</option>
									<option value="Sokoto">Sokoto</option>
									<option value="Taraba">Taraba</option>
									<option value="Yobe">Yobe</option>
									<option value="Zamfara">Zamfara</option>
							  </select>
				          	  <textarea class="form-control" name="address" placeholder="Full address"><?php echo $dataset['address'];?></textarea>
				          </div>
				        </div>
				    </div>

				    <div class="col-md-12 <?php echo $hidestatus;?>">
				    	<div class="form-group">
				          <label>Status<?php 
				          	  		if($hidestatus=="hidden"){
				          	  	?>
				          	  <?php 
				          	  		}
				          	  	?>
				          	  	(Delete/Disable account)
				          	  </label>
				          <div class="input-group">
				              <div class="input-group-addon">
				                <i class="fa fa-trash"></i>
				              </div>
				          	  <select type="text" class="form-control" name="status">
				          	  	<option value="">--Choose--</option>
				          	  	<?php 
				          	  		if($hidestatus!=="hidden"){
				          	  	?>
				          	  	<option value="active">Active</option>
				          	  	<?php 
				          	  		}
				          	  	?>
				          	  	<?php 
				          	  		if($hidestatus=="hidden"){
				          	  	?>
				          	  	<option value="disabled">Delete</option>
				          	  	<?php 
				          	  		}else{
				          	  	?>
				          	  	<option value="disabled">Disable(This stops public access to the account)</option>
				          	  	<?php 
				          	  		}
				          	  	?>
				          	  </select>
				          </div>
				        </div>
				    </div>
				    
				    <input type="hidden" name="formdata" value="useraccform"/>
				    <input type="hidden" name="extraformdata" value="firstname-:-input<|>
				      middlename-:-input<|>
				      lastname-:-input<|>
				      contentpic-:-input|image<|>
				      gender-:-select<|>
				      dob-:-input<|>
				      phonenumber-:-input<|>
				      email-:-input<|>
				      pword-:-input<|>
				      pcmethod-:-select<|>
				      state-:-select<|>
				      address-:-textarea"/>
				    <input type="hidden" name="errormap" value="firstname-:-Please provide Firstname<|>
				        middlename-:-NA<|>
				        lastname-:-Please Provide last name<|>
				        contentpic-:-NA<|>
				        gender-:-Choose gender<|>
				        dob-:-Specify date of birth<|>
				        phonenumber-:-Please provide a phone number<|>
				        email-:-Provide a valid email address<|>
				        pword-:-Provide a good password of at least 8 characters in length.<|>
				        pcmethod-:-NA<|>
				        state-:-Select a state<|>
				        address-:-Please Provide an address."/>
				    <div class="col-md-12 clearboth">
				        <div class="box-footer">
				            <input type="button" class="btn btn-danger" name="user" data-formdata="<?php echo $formtruetype2;?>" onclick="submitCustom('<?php echo $formtruetype2;?>','complete')" value="Save"/>
				        </div>
				    </div>
				</form>

				<script>
					$(document).ready(function(){
						var curmceadminposter=[];
						curmceadminposter['width']="100%";
						curmceadminposter['height']="650px";
						curmceadminposter['toolbar1']="undo redo | bold italic underline | fontselect fontsizeselect | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect";
						curmceadminposter['toolbar2']="| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ";
						callTinyMCEInit("textarea#adminposteredit",curmceadminposter);
												

						var curmcethreeposter=[];
						curmcethreeposter['width']="100%";

						curmcethreeposter['height']="300px";
						curmcethreeposter['toolbar2addon']=" | preview code ";
						callTinyMCEInit("textarea#postersmalltwoedit",curmcethreeposter);
						// totalscripts
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
						if($.fn.datepicker){
			  				$('[data-datetimepicker]').datetimepicker({
						        format:"YYYY-MM-DD HH:mm:ss",
						        keepOpen:true
						    })
						    // for disabling previous dates 
						    $('[data-datetimepickerf]').datetimepicker({
						        format:"YYYY-MM-DD HH:mm:ss",
						        keepOpen:true,
						        minDate: moment(1, 'h')/*,
						        debug:true*/

						    });
						    $('[data-datepicker]').datetimepicker({
						        format:"YYYY-MM-DD",
						        keepOpen:true/*,
						        debug:true*/
						    });
						    $('[data-datepickerf]').datetimepicker({
						        format:"YYYY-MM-DD",
						        keepOpen:true,
						        minDate: moment(1, 'h')
						        // showClose:true
						        // debug:true
						    });
						    $('[data-timepicker]').datetimepicker({
						        format:"HH:mm",
						        keepOpen:true
						    });
			  			}
						if($.fn.wordMAX){
						  // console.log("functional");
						  $('input[type="text"][data-wMax],textarea[data-wMax]').wordMAX(); 
						}
					});
				</script>
	        </div>
<?php
	unset($dataset);
	unset($row);
?>
<?php			
		}else if($viewtype=="paginate"){
			// for pagination there are variables available which are common
			// to the 'paginationpagesout' displaytype in the display.php
			// file
			// $generalpagesdata = the total session array carrying data for current
			// transaction all other variables available are actually gotten
			// from vsarious indexes in this array.

			// $data=array for entry 
			// $outputtype
			// the $outputtype combination is as follows
			// viewtype|viewer|type/type][typeval
			// for search content, the viewer  value must become an array
			// of the form 
			// $viewer[0]=viewer;
			// $viewer[1]=$searchtype;
			// $viewer[2]=$searchval;
			// $limit - current limit of request
			$cdata=explode("|", $outputtype);
			// var_dump($datamap);
			$vtype=$cdata[0];
			$viewer=$cdata[1];
			$type=isset($cdata[2])?$cdata[2]:"";
			$type="blockdeeprun";
			// check to see if the type section is in its compound state
			// echo "the data dump";

			// var_dump($data);
			
			$data["single"]["type"]="blockdeeprun";
			// parse the current datamap
			$curmap=json_decode($data["single"]["datamap"]);
			// $data['pcoutput']="adminoutputtwo2";
			
			$pagout= getAllUsers($viewer,$limit,$type,$data);
			if (isset($data['subpcoutput'])&&$data['subpcoutput']!=="") {
				# code...
				echo $pagout['genericouttwo'];

			}else{

				echo $pagout['adminoutputtwo'];
			}
			unset($pagout);
		}
	}
?>