<?php 

	$formtruetype="serviceprovideraccform";
	if(!isset($evar)){
		$evar="createclientaccadmin";	
	}
	$hidenew="";
	$newin="";
	$hideedit="";
	$editin="";
	$func_classvar="";
	$usersubtype="serviceprovider";
	if($displaytype=="serviceprovidersnew"||
		$displaytype=="newbookstore"||
		$displaytype=="newprojectmerc"||
		$displaytype=="newinstructor"){
		$hideedit="hidden";
		if($displaytype!=="serviceprovidersnew"){
			$usersubtype=str_replace("new", "", $displaytype);
		}
		// this variable is for the main websites design detail conttrol
		$func_classvar="";
		$newin="in";
		$usersubtype=str_replace("new", "", $displaytype);
	}else if($displaytype=="serviceprovidersedit"||
		$displaytype=="editbookstore"||
		$displaytype=="editprojectmerc"||
		$displaytype=="editinstructor"){
		$hidenew="hidden";
		$editin="in";
		$usersubtype=str_replace("edit", "", $displaytype);
		if($displaytype!=="serviceprovidersedit"){
			$usersubtype=str_replace("edit", "", $displaytype);
		}
	}
	$outsdata=getAllUsers("admin","","$usersubtype","adminoutputtwo3");

	$bizarr=getAllBusinessTypes();
	$bizarrsec=getAllBusinessTypes("","WHERE type='secondary'");

?>
<div class="box-body background-color-white clearboth">
    <div class="box-group" id="generaldataaccordion">
		<div class="panel box box-primary <?php echo $hidenew;?>">
		    <div class="box-header with-border">
		        <h4 class="box-title">
		          <a data-toggle="collapse" data-parent="#generaldataaccordion" href="#NewPageManagerBlock">
		            <i class="fa fa-sliders"></i> New 
		          </a>
		        </h4>
		    </div>
		    <div id="NewPageManagerBlock" class="panel-collapse collapse <?php echo $newin;?>">
		        <div class="row">

		            <form name="<?php echo $formtruetype;?>" method="POST" onSubmit="return false" enctype="multipart/form-data" action="../snippets/basicsignup.php">
						<input type="hidden" name="entryvariant" value="createserviceprovideradmin"/>
						<input type="hidden" name="usersubtype" value="<?php echo $usersubtype?>"/>
						<?php
		                	if($usersubtype!==""&&$usersubtype=="bookstore"){ 
		                ?>
						<div class="col-md-3">
                        	<div class="form-group">
		                      <label>Organisation Name</label>
		                      <div class="input-group">
			                      <div class="input-group-addon">
			                        <i class="fa fa-file-text"></i>
			                      </div>
		                      	  <input type="text" class="form-control" name="businessname" placeholder="Organisation Name"/>
		                      </div>
		                    </div>
		                </div>
		                <?php
		                	}
		                ?>
		                <?php
		                	if($usersubtype=="instructor"){ 
		                ?>
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
						<?php
		                	}
		                ?>
		                <div class="col-md-3">
                        	<div class="form-group">
		                      <label>Email Address</label>
		                      <div class="input-group">
			                      <div class="input-group-addon">
			                        <i class="fa fa-at"></i>
			                      </div>
		                      	  <input type="email" class="form-control" name="email" 
		                      	   data-feverify="true" data-fev-state="inactive" 
		                      	   data-fev-tbl="users" data-fev-col="email" 
		                      	   data-fev-map='{"logic":[2,2],"column":["usertype","usersubtype"],
		                      	   "value":["serviceprovider","instructor"]}' 
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
		                <div class="col-md-3">
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
		                <div class="col-md-3">
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
		                <?php
		                	if($usersubtype=="bookstore"){ 
		                ?>
		                <div class="col-md-4">
                        	<div class="form-group">
		                      <label>Organisation Phone Number</label>
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
		                      <label>Contact Name</label>
		                      <div class="input-group">
			                      <div class="input-group-addon">
			                        <i class="fa fa-file-text"></i>
			                      </div>
		                      	  <input type="text" class="form-control" name="fullname" placeholder="Contact's full name"/> 
		                      </div>
		                    </div>
		                </div>
		                <div class="col-md-4">
                        	<div class="form-group">
		                      <label>Contact Email</label>
		                      <div class="input-group">
			                      <div class="input-group-addon">
			                        <i class="fa fa-at"></i>
			                      </div>
		                      	  <input type="email" class="form-control" name="contactemail" data-evalidate="true" placeholder="Email address"/>
		                      </div>
		                    </div>
		                </div>
		                <?php
		                	}
		                ?>
		                <div class="col-md-4">
                        	<div class="form-group">
		                      <label>Contact Phone Number</label>
		                      <div class="input-group">
			                      <div class="input-group-addon">
			                        <i class="fa fa-phone"></i>
			                      </div>
		                      	  <input type="text" class="form-control" name="contactphonenumber" placeholder="Contact Phone Number"/>
		                      </div>
		                    </div>
		                </div>

		                <div class="col-md-4">
                        	<div class="form-group">
		                      <label>Experience <small>How long you've done what you do</small></label>
		                      <div class="input-group">
			                      <div class="input-group-addon">
			                        <i class="fa fa-file-text"></i>
			                      </div>
		                      	  <input type="text" class="form-control" name="spduration" placeholder="How long the main service has been provided"/> 
		                      </div>
		                    </div>
		                </div>
		                <div class="col-md-12">
                        	<div class="form-group">
		                      <label>Address</label>
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
		                      	  <textarea class="form-control" name="address" placeholder="Full address"></textarea>
		                      </div>
		                    </div>
		                </div>
		                <?php
		                	if($usersubtype=="bookstore"){ 
		                ?>
		                <div class="col-md-12">
                        	<div class="form-group">
		                      <label>Organisation Bio(50-100 words)</label>
		                      <div class="input-group">
			                      <div class="input-group-addon">
			                        <i class="fa fa-history"></i>
			                      </div>
		                      	  <textarea class="form-control" name="bio" placeholder="Organisation Bio"></textarea>
		                      </div>
		                    </div>
		                </div>
		                <div class="col-md-12">
		                	<div class="form-group">
		                      <label>References</label>
		                      <div class="input-group">
			                      <div class="input-group-addon">
			                        <i class="fa fa-users"></i>
			                      </div>
		                      	  <textarea class="form-control" rows="4" name="references" 
		                      	  placeholder="References" ></textarea>
		                      </div>
		                    </div>
		                </div>
		                <div class="col-md-4">
                        	<div class="form-group">
		                      <label>Organisation Profile</label>
		                      <div class="input-group">
			                      <div class="input-group-addon">
			                        <i class="fa fa-folder"></i>
			                      </div>
		                      	  <input type="file" class="form-control" name="orgprofile" placeholder="Organisation Profile"/>
		                      </div>
		                    </div>
		                </div>
		                <div class="col-md-4">
		                	<div class="form-group">
		                      <label>Organization Profile URL (if Available)</label>
		                      <div class="input-group">
			                      <div class="input-group-addon">
			                        http://
			                      </div>
		                      	  <input type="url" class="form-control" 
		                      	  name="dataurl" placeholder="Profile URL"/>
		                      </div>
		                    </div>
		                </div>
		                <div class="col-md-4">
                        	<div class="form-group">
		                      <label>Organisation CAC File</label>
		                      <div class="input-group">
			                      <div class="input-group-addon">
			                        <i class="fa fa-file-text"></i>
			                      </div>
		                      	  <input type="file" class="form-control" name="orgcac" placeholder="Organisation CAC"/>
		                      </div>
		                    </div>
		                </div>
		                <?php
		                	}
		                ?>
		                <input type="hidden" name="formdata" value="<?php echo $formtruetype;?>"/>
		                <?php
		                	if($usersubtype!==""&&$usersubtype=="instructor"){ 
		                ?>
						<input type="hidden" name="extraformdata" value="email-:-input<|>
	                      pword-:-input<|>
	                      phonenumber-:-input<|>
	                      firstname-:-input<|>
	                      middlename-:-input<|>
	                      lastname-:-input<|>
	                      spduration-:-input<|>
	                      state-:-select<|>
	                      address-:-textarea"/>
	                    <input type="hidden" name="errormap" value="email-:-Provide a valid email address<|>
		                    pword-:-Provide a good password of at least 8 characters in length.<|>
		                    phonenumber-:-Please provide a phone number<|>
		                    firstname-:-Please give your First name<|>
		                    middlename-:-NA<|>
		                    lastname-:-Please give your Last name<|>
		                    spduration-:-Pleace specify how much experience you have in the capacity you\'re
		                    registering for<|>
		                    state-:-Select a state<|>
		                    address-:-Please Provide an address."/>		                
		                <?php
		                	}else if($usersubtype=="bookstore"){
		                ?>

	                    <input type="hidden" name="extraformdata" value="businessname-:-input<|>
	                      email-:-input<|>
	                      pword-:-input<|>
	                      phonenumber-:-input<|>
	                      fullname-:-input<|>
	                      contactemail-:-input<|>
	                      contactphonenumber-:-input<|>
	                      businessnature-:-select<|>
	                      spduration-:-input<|>
	                      state-:-select<|>
	                      address-:-textarea<|>
	                      bio-:-textarea<|>
	                      orgprofile-:-input|image,office,pdf-:-[group-|-businessnature-|-select-|-*any*]<|>
	                      orgcac-:-input|image,office,pdf-:-[group-|-businessnature-|-select-|-*any*]"/>
	                    <input type="hidden" name="errormap" value="businessname-:-Please provide Organisation name<|>
		                    email-:-Provide a valid email address<|>
		                    pword-:-Provide a good password of at least 8 characters in length.<|>
		                    phonenumber-:-Please provide a phone number<|>
		                    fullname-:-Please give the name of a contact readily available for communication<|>
		                    contactemail-:-Provide contact email address<|>
		                    phonenumber-:-Provide contact phonenumber<|>
		                    businessnature-:-Choose the main support service the organisation performs<|>
		                    spduration-:-Pleace specify how long this support service has been provided<|>
		                    state-:-Select a state<|>
		                    address-:-Please Provide an address.<|>
		                    bio-:-Please give a short detailed description of the organisation<|>
		                    orgprofile-:-Choose a valid image file containing the organisation profile<|>
		                    orgcac-:-Choose a valid image file containing the organisation cac certificate"/>
		                <?php
		                	}
		                ?>
		                <div class="col-md-12 clearboth">
			                <div class="box-footer">
			                    <input type="button" class="btn btn-danger" name="user" data-formdata="<?php echo $formtruetype;?>" onclick="submitCustom('<?php echo $formtruetype;?>','complete')" value="Create"/>
			                </div>
			            </div>
		            </form>
		        </div>
		    </div>
		    <script data-type="multiscript">
		    	$(document).ready(function(){
			    	$('[data-datetimepicker]').datetimepicker({
			            format:"YYYY-MM-DD HH:mm",
			            keepOpen:true
		        	})
		        	$('[data-datepicker]').datetimepicker({
			            format:"YYYY-MM-DD",
			            keepOpen:true
		        	});
		        	$('[data-timepicker]').datetimepicker({
			            format:"HH:mm",
			            keepOpen:true
		        	});
		    	})
			</script>

		</div>
		<div class="panel box overflowhidden box-primary <?php echo $hideedit;?>">
		    <div class="box-header with-border">
		      <h4 class="box-title">
		        <a data-toggle="collapse" data-parent="#generaldataaccordion" href="#EditBlock">
		          <i class="fa fa-gear"></i> Edit 
		        </a>
		      </h4>
		    </div>
		    <div id="EditBlock" class="panel-collapse collapse <?php echo $editin;?>">
		      <div class="box-body">
		          <div class="row">
		            <div class="col-md-12">
		              <?php
		                echo $outsdata['adminoutput3'];
		              ?>
		            </div>
		        </div>
		      </div>
		    </div>
		</div>
	</div>
</div>