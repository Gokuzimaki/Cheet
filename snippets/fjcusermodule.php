<?php
	$viewout="";
	function getSingleUser($id){
		global $host_addr,$viewout;
		$viewout=isset($viewout)?$viewout:"";
		$viewout=="admin"?$hidepdata="hidden":$hidepdata="";
		$viewout=="admin"?$outvariant="editrecruitadmin":$outvariant="editrecruit";
		$row=array();
		$query="SELECT * FROM recruits where id=$id";
		$row=array();
		$run=mysql_query($query)or die(mysql_error()." Line 6");
		$numrows=mysql_num_rows($run);
		/*query2="SELECT * FROM surveys where userid=$typeid";
		$run2=mysql_query($query2)or die(mysql_error()." Line 899");
		$row2=mysql_fetch_assoc($run2);*/
		// get industries list
		$frameout="WHERE maintype='fieldnindustries'";
		$fniout=generateMultipleGDataSelect("viewer","$frameout");
	    // hold allscript content in this variable for output
	    $scriptout="";
		/*get professional and educational qualifications*/
		$educationalout=''; //for holding repeating educational history content for admin
		$educationalouttwo=''; //for holding repeating educational history content for viewer
		$workexperiencout=''; // for holding work history content for  admin
		$workexperiencouttwo=''; // for holding work history content for  viewer
		$adminoutput="<tr><td>No Recruits Yet</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>";
		if($numrows>0){
			$row=mysql_fetch_assoc($run);
			$id=$row['id'];
			$fullname=$row['fullname'];
			$ndata=explode(" ",$fullname);
			$firstname=$ndata[0];
			$middlename=$ndata[1];
			$lastname=$ndata[2];
			$gender=$row['gender'];
			$maritalstatus=$row['maritalstatus'];
			$state=$row['state'];
			// $lga=$row['lga'];
			// $lgdata=getSingleLGA($lga);
			// $row['lgdata']=$lgdata;
			// $localgovt=$lgdata['local_govt'];
			$password=$row['pword'];
			$email=$row['email'];
			$phonenumber=$row['phonenumbers'];
			$phonearr=explode("[|><|]", $phonenumber);
			$phoneone=$phonearr[0];
			$phonetwo=$phonearr[1];
			$phonethree=$phonearr[2];
			$dob=$row['dob'];
			$dobdata=explode("-",$dob);
			$dobyear=$dobdata[0];
			$dobmonth=$dobdata[1];
			$dobday=$dobdata[2];
			$curyear=date("Y");
			$age=$curyear-$dobyear;
			$row['age']=$age;
			$regdate=$row['regdate'];
			$address=$row['address'];
			$careerambition=$row['careerambition'];
			$preferredjobtype=$row['preferredjobtype'];
			$preferredjoblocation=$row['preferredjoblocation'];
			$skills=$row['skills'];
			$hobbies=$row['hobbies'];
			$regdate=$row['regdate'];
			$status=$row['status'];
			$viewout=="viewer"?$statoutdata='<input type="hidden" name="status" value="'.$status.'"">':$statoutdata="";

			// get profilepicture
			$facequery2="SELECT * FROM media where ownerid=$id AND ownertype='recruit' AND maintype='profpic'";
			$facerun2=mysql_query($facequery2)or die(mysql_error()." Line 27");
			$facerow2=mysql_fetch_assoc($facerun2);
			$numrowface=mysql_num_rows($facerun2);
			$row['faceid']=$facerow2['id'];
			if($numrowface>0){
				$face='<img src="'.$host_addr.''.$facerow2['location'].'">';
				$face2=''.$host_addr.''.$facerow2['location'].'';
			}else{
				$face2=''.$host_addr.'/images/default.gif';
				$face='<p style="text-align:center;"><i class="fa fa-user fa-3x"></i></p>';
			}
			$row['facefile']=$face2;
			$row['facefile2']=$facerow2['location'];
			// get qualificationas and workexperience
			$eduquery="SELECT * FROM recruitacademicprohistory WHERE recruitid=$id ORDER BY year,type DESC";
		   	$edurun=mysql_query($eduquery)or die(mysql_error()." Line 2818");
		   	$edunumrows=mysql_num_rows($edurun);
		   	$curyear=date("Y");
			$ryear=$curyear-18;
			$syear=$curyear-65;
			$outit=produceOptionDates($syear,$ryear,"--Select Year--");
		   	$educount=0;	//the count for editable content
	   		if($edunumrows>0){
			    $eduhistoryout="";
			    $eduhistoryoutadmin="";
			    $contentout="";
			    while ($edurow=mysql_fetch_assoc($edurun)) {
			        # code...
				    $educount++;
				    $eid=$edurow['id'];
				    $eyear=$edurow['year'];
				    $etype=$edurow['type'];
				    $einstitution=$edurow['institution'];
				    $equalification=$edurow['qualification'];
				    $egrade=$edurow['grade'];
				    $edateentry=$edurow['date'];
				    $estatus=$edurow['status'];
				    $dna='
				    	<div class="row">
	                        <label>Disable/Enable this(<b>'.$edurow['status'].'</b>)</label>
	                        <select name="qualstatus'.$educount.'" id="qualstatus'.$educount.'" class="form-control">
	                        	<option value="">Choose</option>
	                        	<option value="active">Active</option>
	                        	<option value="inactive">Inactive</option>
					  	    </select>
	                    </div>
				    ';
				    if($viewout=="viewer")
				    {
				    	$dna="";
				    }
				    $contentout='
			    		<input type="hidden" name="qualificationid'.$educount.'" value="'.$eid.'" class=""/>
                        <div class="col-md-12">
                          <div class="form-group">
                              <label>Type</label>
                              <div class="input-group">
                                  <div class="input-group-addon">
                                    <i class="fa fa-sliders"></i>
                                  </div>
                                  <select name="qualificationtype'.$educount.'"  class="form-control">
                            		<option value="">--Select Type--</option>
                            		<option value="educational">Educational</option>
                            		<option value="professional">Professional</option>
                              	  </select>
                              </div><!-- /.input group -->
                            </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                              <label>Qualification</label>
                              <div class="input-group">
                                  <div class="input-group-addon">
                                    <i class="fa fa-certificate"></i>
                                  </div>
                                  <input type="text" class="form-control" name="qualification'.$educount.'" value="'.$equalification.'" Placeholder="Qualification"/>
                              </div><!-- /.input group -->
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                  <label>Institution</label>
                                  <div class="input-group">
                                      <div class="input-group-addon">
                                    <i class="fa fa-institution"></i>
                                  </div>
                                  <input type="text" class="form-control" name="institution'.$educount.'" value="'.$einstitution.'" Placeholder="Institution ('.$educount.')"/>
                              </div><!-- /.input group -->
                            </div>
                        </div>
						<div class="col-md-3">
                          <div class="form-group">
                              <label>Grade(if applicable)</label>
                              <div class="input-group">
                                  <div class="input-group-addon">
                                    <i class="fa fa-bars"></i>
                                  </div>
                                  <input type="text" class="form-control" name="grade'.$educount.'" value="'.$egrade.'" Placeholder="Grade ('.$educount.')"/>
                              </div><!-- /.input group -->
                            </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                              <label>Year Obtained</label>
                              <div class="input-group">
                                  <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                  </div>
                                  <input type="number" class="form-control" name="oyear'.$educount.'" value="'.$eyear.'" Placeholder="Year Obtained ('.$educount.')"/>
                              </div><!-- /.input group -->
                            </div>
                        </div>
                        '.$dna.'	
					';
					$educationalout.=$contentout;
					if($viewout=="viewer"&& $estatus=="active")
				    {
				    	$educationalouttwo.=$contentout;
				    }
					$scriptout.='
						$("select[name=qualificationtype'.$educount.']").val("'.$etype.'");
						$("select[name=qualstatus'.$educount.']").val("'.$edurow['status'].'");
					';
			    }
			}
			$educountfinal=$educount+1;
			/*end*/
			/*get work experience*/
			$workquery="SELECT * FROM recruitemploymenthistory WHERE recruitid=$id ORDER BY fromdate DESC";
		   	$workrun=mysql_query($workquery)or die(mysql_error()." Line 2818");
		   	$worknumrows=mysql_num_rows($workrun);
		   	$workhcount=0;
	   		if($worknumrows>0){
			    $workhistoryout="";
			    $workhistoryoutadmin="";
			    $contentout="";
			    while ($employerrow=mysql_fetch_assoc($workrun)) {
			        # code...
			        $workhcount++;
				    $companyname=$employerrow['companyname'];
				  	// $businessaddress=$employerrow['businessaddress'];
				  	$field=$employerrow['field'];
				  	$jobtitle=$employerrow['lastjobtitle'];
				  	// $rfl=$employerrow['reasonforleaving'];
				  	// $remuneration=$employerrow['remuneration'];
				  	$dna='
				    	<div class="row">
	                        <label>Disable/Enable this(<b>'.$employerrow['status'].'</b>)</label>
	                        <select name="workhstatus'.$workhcount.'" id="workhstatus'.$workhcount.'" class="form-control">
	                        	<option value="">Choose</option>
	                        	<option value="active">Active</option>
	                        	<option value="inactive">Inactive</option>
					  	    </select>
	                    </div>
				    ';
				    if($viewout=="viewer")
				    {
				    	$dna="";
				    }
				  	$fromdate=$employerrow['fromdate'];
				  	$todate=$employerrow['todate'];
				  	/*$extraout=explode("-", $fromdate);
				    $year=$extraout[0];
				    $month=$extraout[1];
				    $day=$extraout[2];
				    $fromdate=$day."-".$month."-".$year;*/
				  	$extraout=explode("-", $todate);
				    $year=$extraout[0];
				    $month=$extraout[1];
				    $day=$extraout[2];
				    $todate=$day."-".$month."-".$year;
				  	$employerstatus=$employerrow['status'];
				    $contentout='
							<div class="col-md-6">
	                          <input type="hidden" class="form-control" value="'.$employerrow['id'].'" name="workexperienceid'.$workhcount.'" Placeholder="Company Name"/>
	                          <div class="form-group">
	                              <label>Company Name ('.$workhcount.')</label>
	                              <div class="input-group">
	                                  <div class="input-group-addon">
	                                    <i class="fa fa-building"></i>
	                                  </div>
	                                  <input type="text" class="form-control" value="'.$companyname.'" name="companyname'.$workhcount.'" Placeholder="Company Name"/>
	                              </div><!-- /.input group -->
	                            </div>
	                        </div>
	                        <div class="col-md-6">
	                            <div class="form-group">
	                                  <label>Your Field of Expertise while here</label>
	                                  <div class="input-group">
	                                      <div class="input-group-addon">
	                                    <i class="fa fa-bars"></i>
	                                  </div>
	                                  <select class="form-control" name="field'.$workhcount.'">
	                            			<option value="">--Choose type--</option>
	                                  		'.$fniout['selection'].'
	                                      	<!-- <option value="">Choose an Industry</option>
											<option value="Support Services">Support Services </option>
											<option value="Consulting Services">Consulting Services </option>
											<option value="Customer Service">Customer Service </option>
											<option value="Employment Placement">Employment Placement </option>
											<option value="Agencies/Recruiting">Agencies/Recruiting </option>
											<option value="Human Resources">Human Resources </option>
											<option value="Administration">Administration </option>
											<option value="Contracts/Purchasing">Contracts/Purchasing </option>
											<option value="Secretarial">Secretarial </option>
											<option value="Security">Security </option>
											<option value="Telemarketing">Telemarketing </option>
											<option value="Translation">Translation </option>
											<option value="Management">Management </option>
											<option value="Business">Business Support </option>
											<option value="Pharmaceutical">Pharmaceutical </option>
											<option value="Manufacturing">Manufacturing </option>
											<option value="Mechanical">Mechanical </option>
											<option value="Technical/Maintenance">Technical/Maintenance </option>
											<option value="Aerospace and Defense">Aerospace and Defense </option>
											<option value="Agriculture/Forestry/Fishing">Agriculture/Forestry/Fishing</option>
											<option value="Installation/Maintenance">Installation/Maintenance</option>
											<option value="Mining">Mining</option>
											<option value="Safety/Environment">Safety/Environment</option>
											<option value="Industrial">Industrial</option>
											<option value="Lubricants/Greases Blending">Lubricants/Greases Blending</option>
											<option value="Textiles">Textiles</option> -->
									  </select>
	                              </div><!-- /.input group -->
	                            </div>
	                        </div>
	                        <!-- <h6 class="label clearfix">Duration ('.$workhcount.')</h6> -->
							<div class="col-md-4">
	                            <div class="form-group">
	                                  <label>Position</label>
	                                  <div class="input-group">
	                                      <div class="input-group-addon">
	                                    <i class="fa fa-bars"></i>
	                                  </div>
	                                  <input type="text" class="form-control" name="jobposition'.$workhcount.'" value="'.$jobtitle.'" Placeholder="Position ('.$workhcount.')"/>
	                              </div><!-- /.input group -->
	                            </div>
	                        </div>
							<div class="col-md-4">
	                          <div class="form-group">
	                              <label>From</label>
	                              <div class="input-group">
	                                  <div class="input-group-addon">
	                                    <i class="fa fa-calendar"></i>
	                                  </div>
	                                  <input type="text" class="form-control" name="jobfrom'.$workhcount.'" data-inputmask="\'alias\': \'yyyy-mm-dd\'" value="'.$fromdate.'" data-mask="" Placeholder="From: YYYY-MM-DD"/>
	                              </div><!-- /.input group -->
	                            </div>
	                        </div>
							<div class="col-md-4">
								<div class="form-group">
	                              <label>To</label>
	                              <div class="input-group">
	                                  <div class="input-group-addon">
	                                    <i class="fa fa-calendar"></i>
	                                  </div>
	                                  <input type="text" class="form-control" name="jobto'.$workhcount.'" data-mask="" data-inputmask="\'alias\': \'yyyy-mm-dd\'" value="'.$employerrow['todate'].'" Placeholder="To: YYYY-MM-DD"/>
	                              </div><!-- /.input group -->
	                            </div>
							</div>
							'.$dna.'
					';
					$workexperiencout.="<div class=\"row\">$contentout</div>";
					if($viewout=="viewer"&& $estatus=="active")
				    {
				    	$workexperiencouttwo.=$contentout;
				    }
					$scriptout.='
						$("select[name=field'.$workhcount.']").val("'.$field.'");
						$("select[name=workhstatus'.$workhcount.']").val("'.$employerrow['status'].'");
					';
			    }
			}
			// work history count final
			$workhcountfinal=$workhcount+1;
			/*end*/
			// get industries list
			
			$adminoutput='
				<tr data-id="'.$id.'">
					<td class="tddisplayimg">'.$face.'</td><td>'.$fullname.'</td><td>'.$state.'</td><td><a href="mailto:'.$email.'">'.$email.'</a></td><td>'.$maritalstatus.'</td><td>'.$phoneone.' '.$phonetwo.' '.$phonethree.'</td><td>'.$gender.'</td><td>'.$age.'</td><td>'.$regdate.'</td><td>'.$status.'</td><td name="trcontrolpoint"><a href="#&id='.$id.'" name="edit" data-type="editsinglerecruit" data-divid="'.$id.'">Edit</a></td>
				</tr>
				<tr name="tableeditcontainer" data-state="inactive" data-divid="'.$id.'">
					<td colspan="100%">
						<div id="completeresultdisplay" data-type="editmodal" data-load="unloaded" data-divid="'.$id.'">
							<div id="completeresultdisplaycontent" data-type="editdisplay" data-divid="'.$id.'">
								
							</div>
						</div>
					</td>
				</tr>
			';
			
			$vieweroutputpersonal='
				<div>
					<h2 '.$hidepdata.'>Personal Data</h2>
					<section>
						<h6 class="bottom-line">Personal Info:</h6>
						<!-- <h6 class="label">Name</h6> -->
						<div class="row">
							<div>
								<div class="col-md-3">
									<img class="facefile" src="'.$face2.'">
									<div class="form-group">
		                              <label>Passport Photograph</label>
		                              <div class="input-group">
		                                  <div class="input-group-addon">
		                                    <i class="fa fa-file-image-o"></i>
		                                  </div>
										  <input type="file" class="form-control" id="profpic" name="profpic" placeholder="">
		                              </div><!-- /.input group -->
		                            </div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
		                              <label>Firstname</label>
		                              <div class="input-group">
		                                  <div class="input-group-addon">
		                                    <i class="fa fa-user"></i>
		                                  </div>
										  <input type="text" class="form-control" id="firstname" name="firstname" value="'.$firstname.'" placeholder="Firstname">
		                              </div><!-- /.input group -->
		                            </div>
								</div>

								<div class="col-md-3">
									<div class="form-group">
		                              <label>Middlename</label>
		                              <div class="input-group">
		                                  <div class="input-group-addon">
		                                    <i class="fa fa-user"></i>
		                                  </div>
										  <input type="text" class="form-control" id="middlename" name="middlename" value="'.$middlename.'"placeholder="Middlename">
		                              </div><!-- /.input group -->
		                            </div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
		                              <label>Lastname</label>
		                              <div class="input-group">
		                                  <div class="input-group-addon">
		                                    <i class="fa fa-user"></i>
		                                  </div>
										  <input type="text" class="form-control" id="lastname" name="lastname" value="'.$lastname.'" placeholder="Lastname">
		                              </div><!-- /.input group -->
		                            </div>
								</div>
								
							</div>
							<div class="col-xs-6">
			                    <div class="form-group">
				                    <label>Gender:</label>
				                    <div class="input-group">
				                      <div class="input-group-addon">
				                        <i class="fa fa-transgender"></i>
				                      </div>
				                      <select id="gender" name="gender" class="form-control">
		                            		<option value="">--Choose Sex--</option>
		                            		<option value="male">Male</option>
		                            		<option value="female">Female</option>
		                              </select>
				                    </div><!-- /.input group -->
			                    </div><!-- /.form group -->
		                    </div>
		                    <div class="col-xs-6">
			                    <div class="form-group">
				                    <label>Marital Status:</label>
				                    <div class="input-group">
				                      <div class="input-group-addon">
				                        <i class="fa fa-venus-mars"></i>
				                      </div>
				                      <select id="maritalstatus" name="maritalstatus" class="form-control">
		                            		<option value="">--Choose Status--</option>
		                            		<option value="single">Single</option>
		                            		<option value="married">Married</option>
		                            		<!-- <option value="divorced">Divorced</option> -->
		                              </select>
				                    </div><!-- /.input group -->
			                    </div><!-- /.form group -->
		                    </div>
						</div>
						'.$statoutdata.'
						<h6 class="label">Date of Birth</h6>
						<div class="row">
							<div class="col-sm-12">
								<div class="col-sm-4">
									<select name="dobday" class="form-control" id="dobday">
			                    		<option value="">--Select day--</option><option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option><option value="09">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option>
		                    		</select>
		                    	</div>
	                    		<div class="col-sm-4">
										<select name="dobmonth" class="form-control" id="dobmonth">
			                    		<option value="">--Select month--</option><option value="01">January</option><option value="02">February</option><option value="03">March</option><option value="04">April</option><option value="05">May</option><option value="06">June</option><option value="07">July</option><option value="08">August</option><option value="09">September</option><option value="10">October</option><option value="11">November</option><option value="12">December</option>
		                    		</select>
		                    	</div>
	                    		<div class="col-sm-4">
									
	                                <select name="dobyear" class="form-control" id="dobyear">
	                                	'.$outit.'
		                    		</select>	
		                    	</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-3">
								<div class="form-group">
	                              <label>Email Address</label>
	                              <div class="input-group">
	                                  <div class="input-group-addon">
	                                    <i class="fa fa-at"></i>
	                                  </div>
									  <input type="email" class="form-control" id="useremail" name="useremail" value="'.$email.'" placeholder="Email Address">
	                              </div><!-- /.input group -->
	                            </div>
							</div>
							<div class="col-sm-3">
								<div class="form-group">
	                              <label>Phone(1)</label>
	                              <div class="input-group">
	                                  <div class="input-group-addon">
	                                    <i class="fa fa-phone"></i>
	                                  </div>
									  <input type="number" class="form-control" id="phoneone" name="phoneone" value="'.$phoneone.'" placeholder="Mobile">
	                              </div><!-- /.input group -->
	                            </div>
							</div>

							<div class="col-sm-3">
								<div class="form-group">
	                              <label>Phone(2)</label>
	                              <div class="input-group">
	                                  <div class="input-group-addon">
	                                    <i class="fa fa-phone"></i>
	                                  </div>
									  <input type="number" class="form-control" id="phonetwo" name="phonetwo" value="'.$phonetwo.'" placeholder="Work">
	                              </div><!-- /.input group -->
	                            </div>
							</div>

							<div class="col-sm-3">
								<div class="form-group">
	                              <label>Phone(3)</label>
	                              <div class="input-group">
	                                  <div class="input-group-addon">
	                                    <i class="fa fa-phone"></i>
	                                  </div>
									  <input type="number" class="form-control" id="phonethree" name="phonethree" value="'.$phonethree.'" placeholder="Extra Number">
	                              </div><!-- /.input group -->
	                            </div>
							</div>
						</div>

						<h6 class="label">Address</h6>
						<div class="row">
							<div class="col-sm-6">
								<select name="recruitstate" class="form-control" id="recruitstate">
									<option value="">State</option>
									<option value="">Select your State</option>
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
							</div>
							<div class="col-sm-6">
								<input type="text" class="form-control" id="addressone" name="addressone" value="'.$address.'" placeholder="Address 1">
							</div>
						</div>
					</section>
					<section>
						<h6 class="bottom-line '.$hidepdata.'">Change Password:(Doing this successfully logs you out of your account, login with new credentials then)</h6>
						<div class="row '.$hidepdata.'">
							<div class="col-sm-4">
								<input type="password" class="form-control" id="upassword" name="prevpassword" placeholder="Previous Password">
							</div>

							<div class="col-sm-4">
								<input type="password" class="form-control" id="upasswordconfirm" name="password" placeholder="New Password">
							</div>
						</div>
					</section>
				</div>
			';

			

		}
		$row['vieweroutputotherskills']='
			<section>
				<h6 class="bottom-line">Career Ambition:</h6>
				<textarea name="careerambition" id="careerambition" class="form-control" rows="5" placeholder="State career ambition">'.$careerambition.'</textarea>
			</section>

			<section>
				<h6 class="bottom-line">Job Preferences:</h6>
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
		                    <label>Preferred Job-type:</label>
		                    <div class="input-group">
		                      <div class="input-group-addon">
		                        <i class="fa fa-briefcase"></i>
		                      </div>
		                      <select name="preferredjobtype" id="preferredjobtype" class="form-control">
                            		<option value="">--Choose Type--</option>
                            		<option value="FullTime">Full-Time</option>
                            		<option value="Part-Time">Part-Time</option>
                            		<option value="Contract">Contract</option>
                            		<option value="Internship">Internship</option>
                            		<option value="Freelance">Freelance</option>
                              </select>
		                    </div><!-- /.input group -->
	                    </div><!-- /.form group -->
					</div>
					<div class="col-sm-12">
						<div class="form-group">
		                    <label>Preferred Job-Location:</label>
		                    <div class="input-group">
		                      <div class="input-group-addon">
		                        <i class="fa fa-map-marker"></i>
		                      </div>
		                      <select name="preferredjoblocation" id="preferredjoblocation" class="form-control">	                            		
									<option value="">State</option>
									<option value="">Select your State</option>
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
		                    </div><!-- /.input group -->
	                    </div><!-- /.form group -->
					</div>
				</div>	
			</section>

			<section>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
		                    <label>Hobbies:</label>
		                    <div class="input-group">
		                      <div class="input-group-addon">
		                      	<span class="fa-stack fa-lg stackaddon">
								  <i class="fa fa-soccer-ball-o fa-spin fa-stack-1x faiconfirst"></i>
								  <i class="fa fa-plane fa-stack-1x faiconsecond"></i>
								  <i class="fa fa-camera-retro fa-stack-1x faiconthird"></i>
								</span>
		                      </div>
							  <textarea name="hobbies" id="hobbies" class="form-control" rows="5" placeholder="what are your hobbies?">'.$hobbies.'</textarea>
		                    </div><!-- /.form group-->
						</div>
					</div>
			</section>
			<section>
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
		                    <label>Other Skills:</label>
		                    <div class="input-group">
		                      <div class="input-group-addon">
								<span class="fa-stack fa-lg stackaddon">
								  <i class="fa fa-gear fa-spin fa-stack-1x faiconfirst"></i>
								  <i class="fa fa-language fa-stack-1x faiconsecond"></i>
								  <i class="fa fa-bullseye fa-stack-1x faiconthird"></i>
								</span>
		                      </div>
								<textarea name="skills" id="skills" class="form-control" rows="5" placeholder="What other skills do you believe to be an advantage for you as a recruit? Seperate Skills with a comma">'.$skills.'</textarea>
		                    </div><!-- /.input group -->
	                    </div><!-- /.form group -->
					</div>
				</div>
			</section>
		';
		
		$scriptout.='
			$("select[name=preferredjobtype]").val("'.$preferredjobtype.'");
			$("select[name=preferredjoblocation]").val("'.$preferredjoblocation.'");
		';
		$selectionscripts='
			<script>
				$(document).ready(function(){
					$("select[name=gender]").val("'.$gender.'");
					$("select[name=dobyear]").val("'.$dobyear.'");
					$("select[name=dobmonth]").val("'.$dobmonth.'");
					$("select[name=dobday]").val("'.$dobday.'");
						$("select[name=maritalstatus]").val("'.$maritalstatus.'");
					$("select[name=recruitstate]").val("'.$state.'");
					$("[data-mask]").inputmask();
					'.$scriptout.'
				});
			</script>
		';
		$adminoutputtwo='
			<div class="box">
	            <form action="'.$host_addr.'snippets/edit.php" name="edituser" method="post" enctype="multipart/form-data">
					<input type="hidden" name="entryvariant" value="'.$outvariant.'"/>
					<input type="hidden" name="entryid" value="'.$id.'"/>
		            <div class="box-header with-border">
		              <h3 class="box-title">View/Edit '.$fullname.'\'s Profile</h3>
		              <div class="box-tools pull-right">
		                <!-- <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button> -->
		                <!-- <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button> -->
		              </div>
		            </div>
		            <div class="box-body">
		            	<div class="box-group" id="generaldataaccordion">
		            		<div class="panel box overflowhidden box-primary">
		                      <div class="box-header with-border">
			                        <h4 class="box-title">
			                          <a data-toggle="collapse" data-parent="#generaldataaccordion" href="#NewPageManagerBlock">
			                            <i class="fa fa-sliders"></i> Personal Information
			                          </a>
			                        </h4>
		                      </div>
				                <div id="NewPageManagerBlock" class="panel-collapse collapse in">
									'.$vieweroutputpersonal.'
									<div class="row">
				                        <label>Disable/Enable this(<b>'.$row['status'].'</b>)</label>
				                        <select name="recruitstatus" id="recruitstatus" class="form-control">
				                        	<option value="">Choose</option>
				                        	<option value="active">Active</option>
				                        	<option value="inactive">Inactive</option>
								  	    </select>
				                    </div>
								</div>
							</div>
							<div class="panel box overflowhidden box-primary">
		                      <div class="box-header with-border">
		                        <h4 class="box-title">
		                          <a data-toggle="collapse" data-parent="#generaldataaccordion" href="#EditBlock">
		                            <i class="fa fa-gear"></i> Qualifications And Work Experience
		                          </a>
		                        </h4>
		                      </div>
		                      <div id="EditBlock" class="panel-collapse collapse">
		                        <div class="box-body">
		                        	<div class="col-md-12 ">
			                        	<div class="row dropcoldowndivide">
											<h6 class="bottom-line">Qualifications</h6>
											<div class="col-md-12" name="qualificationssentry">
					                            <input type="hidden" name="curqualificationeditcount" value="'.$educount.'"/>
							                    <input type="hidden" name="curqualificationcount" value="'.$educountfinal.'"/>
												'.$educationalout.'
					                    	</div>
										</div>
										<div class="row">
											<h6 class="bottom-line">Work Experience</h6>
											<div class="col-md-12" name="workexperiencesentry">
												<input type="hidden" name="curworkexperienceeditcount" value="'.$workhcount.'"/>
												<input type="hidden" name="curworkexperiencecount" value="'.$workhcountfinal.'"/>
												'.$workexperiencout.'
											</div>
										</div>
		                        	</div>
		                        </div>
		                      </div>
		                  	</div>
		                  	<div class="panel box overflowhidden box-primary">
		                      <div class="box-header with-border">
		                        <h4 class="box-title">
		                          <a data-toggle="collapse" data-parent="#generaldataaccordion" href="#EditBlocktwo">
		                            <i class="fa fa-gear"></i> Other Information
		                          </a>
		                        </h4>
		                      </div>
		                      <div id="EditBlocktwo" class="panel-collapse collapse">
		                        <div class="box-body">
		                        	<div class="col-md-12">
			                        	'.$row['vieweroutputotherskills'].'
		                        	</div>
		                        </div>
		                      </div>
		                  	</div>
						</div>
						<div class="col-md-12 textleft">
							<input type="submit" name="updaterecruit" class="btn btn-default btn-large pull-left" value="Update Profile"/>
						</div>
					</div>
				</form>
			</div>
			'.$selectionscripts.'
		';
		$ewtabout='
			<div class="accordion">
				<ul>
					<li class="active">
						<a href="##">Qualifications & Professional History</a>
						<div class="row">
							<div class="col-md-12" name="qualificationssentry">
	                            <input type="hidden" name="curqualificationeditcount" value="'.$educount.'"/>
								'.$educationalouttwo.'
								<div class="row">
									<div class="col-md-12" name="qualificationssentry">
			                            <input type="hidden" name="curqualificationcount" value="'.$educountfinal.'"/>
			                            <h4>New Entries</h4>
	                                    <div class="col-md-12">
	                                      <div class="form-group">
	                                          <label>Type</label>
	                                          <div class="input-group">
	                                              <div class="input-group-addon">
	                                                <i class="fa fa-sliders"></i>
	                                              </div>
	                                              <select name="qualificationtype'.$educountfinal.'" class="form-control">
				                            		<option value="">--Select Type--</option>
				                            		<option value="educational">Educational</option>
				                            		<option value="professional">Professional</option>
				                            		<!-- <option value="divorced">Divorced</option> -->
				                              	  </select>
	                                          </div><!-- /.input group -->
	                                        </div>
	                                    </div>
	                                    <div class="col-md-3">
	                                      <div class="form-group">
	                                          <label>Qualification</label>
	                                          <div class="input-group">
	                                              <div class="input-group-addon">
	                                                <i class="fa fa-certificate"></i>
	                                              </div>
	                                              <input type="text" class="form-control" name="qualification'.$educountfinal.'" Placeholder="Qualification"/>
	                                          </div><!-- /.input group -->
	                                        </div>
	                                    </div>
	                                    <div class="col-md-3">
	                                        <div class="form-group">
		                                          <label>Institution</label>
		                                          <div class="input-group">
		                                              <div class="input-group-addon">
	                                                <i class="fa fa-institution"></i>
	                                              </div>
	                                              <input type="text" class="form-control" name="institution'.$educountfinal.'" Placeholder="Institution ('.$educountfinal.')"/>
	                                          </div><!-- /.input group -->
	                                        </div>
	                                    </div>
										<div class="col-md-3">
	                                      <div class="form-group">
	                                          <label>Grade(if applicable)</label>
	                                          <div class="input-group">
	                                              <div class="input-group-addon">
	                                                <i class="fa fa-bars"></i>
	                                              </div>
	                                              <input type="text" class="form-control" name="grade'.$educountfinal.'" Placeholder="Grade ('.$educountfinal.')"/>
	                                          </div><!-- /.input group -->
	                                        </div>
	                                    </div>
	                                    <div class="col-md-3">
	                                      <div class="form-group">
	                                          <label>Year Obtained</label>
	                                          <div class="input-group">
	                                              <div class="input-group-addon">
	                                                <i class="fa fa-calendar"></i>
	                                              </div>
	                                              <input type="number" class="form-control" name="oyear'.$educountfinal.'" Placeholder="Year Obtained ('.$educountfinal.')"/>
							 					  <input type="hidden" name="entryid" value="'.$id.'"/>
	                                          </div><!-- /.input group -->
	                                        </div>
	                                    </div>
	                                    <div name="entryqualificationpoint"></div>
	                                    <a href="##" name="addextraqualification">Click to add another entry</a>
                                	</div>
								</div>
	                    	</div>
						</div>
					</li>
					<li>
						<a href="##">Work Experience</a>
						<div class="row">
							<div class="col-md-12" name="workexperiencesentry">
								<input type="hidden" name="curworkexperienceeditcount" value="'.$workhcount.'"/>
								<input type="hidden" name="curworkexperiencecount" value="'.$workhcountfinal.'"/>
								'.$workexperiencouttwo.'

								<h4>New Entries For Work Experience</h4>
								<div class="row">
									<div class="col-md-6">
	                                  <div class="form-group">
	                                      <label>Company Name ('.$workhcountfinal.')</label>
	                                      <div class="input-group">
	                                          <div class="input-group-addon">
	                                            <i class="fa fa-building"></i>
	                                          </div>
	                                          <input type="text" class="form-control" name="companyname'.$workhcountfinal.'" Placeholder="Company Name"/>
	                                      </div><!-- /.input group -->
	                                    </div>
	                                </div>
	                                <div class="col-md-6">
	                                    <div class="form-group">
	                                          <label>Your Field of Expertise while here</label>
	                                          <div class="input-group">
	                                              <div class="input-group-addon">
	                                            <i class="fa fa-bars"></i>
	                                          </div>
	                                          <select class="form-control" name="field'.$workhcountfinal.'">
					                            	<option value="">--Select Field--</option>
	                                          		'.$fniout['selection'].'
	                                              	<!-- <option value="">Choose an Industry</option>
													<option value="Support Services">Support Services </option>
													<option value="Consulting Services">Consulting Services </option>
													<option value="Customer Service">Customer Service </option>
													<option value="Employment Placement">Employment Placement </option>
													<option value="Agencies/Recruiting">Agencies/Recruiting </option>
													<option value="Human Resources">Human Resources </option>
													<option value="Administration">Administration </option>
													<option value="Contracts/Purchasing">Contracts/Purchasing </option>
													<option value="Secretarial">Secretarial </option>
													<option value="Security">Security </option>
													<option value="Telemarketing">Telemarketing </option>
													<option value="Translation">Translation </option>
													<option value="Management">Management </option>
													<option value="Business">Business Support </option>
													<option value="Pharmaceutical">Pharmaceutical </option>
													<option value="Manufacturing">Manufacturing </option>
													<option value="Mechanical">Mechanical </option>
													<option value="Technical/Maintenance">Technical/Maintenance </option>
													<option value="Aerospace and Defense">Aerospace and Defense </option>
													<option value="Agriculture/Forestry/Fishing">Agriculture/Forestry/Fishing</option>
													<option value="Installation/Maintenance">Installation/Maintenance</option>
													<option value="Mining">Mining</option>
													<option value="Safety/Environment">Safety/Environment</option>
													<option value="Industrial">Industrial</option>
													<option value="Lubricants/Greases Blending">Lubricants/Greases Blending</option>
													<option value="Textiles">Textiles</option> -->
											  </select>
	                                      </div><!-- /.input group -->
	                                    </div>
	                                </div>
	                                <!-- <h6 class="label clearfix">Duration ('.$workhcountfinal.')</h6> -->
									<div class="col-md-4">
	                                    <div class="form-group">
	                                          <label>Position</label>
	                                          <div class="input-group">
	                                              <div class="input-group-addon">
	                                            <i class="fa fa-bars"></i>
	                                          </div>
	                                          <input type="text" class="form-control" name="jobposition'.$workhcountfinal.'" Placeholder="Position ('.$workhcountfinal.')"/>
	                                      </div><!-- /.input group -->
	                                    </div>
	                                </div>
									<div class="col-md-4">
	                                  <div class="form-group">
	                                      <label>From</label>
	                                      <div class="input-group">
	                                          <div class="input-group-addon">
	                                            <i class="fa fa-calendar"></i>
	                                          </div>
	                                          <input type="text" class="form-control" name="jobfrom'.$workhcountfinal.'" data-inputmask="\'alias\': \'yyyy-mm-dd\'" data-mask="" Placeholder="From: YYYY-MM-DD"/>
	                                      </div><!-- /.input group -->
	                                    </div>
	                                </div>
									<div class="col-md-4">
										<div class="form-group">
	                                      <label>To(Leave Blank if you are still working here)</label>
	                                      <div class="input-group">
	                                          <div class="input-group-addon">
	                                            <i class="fa fa-calendar"></i>
	                                          </div>
	                                          <input type="text" class="form-control" name="jobto'.$workhcountfinal.'" data-mask="" data-inputmask="\'alias\': \'yyyy-mm-dd\'" Placeholder="To: YYYY-MM-DD"/>
	                                      </div><!-- /.input group -->
	                                    </div>
									</div>
								</div>
								<div name="entryworkexperiencepoint"></div>
								<a href="##" name="addextraworkexperience">Click to add another entry</a>
							</div>
						</div>
					</li>
				</ul>
			</div>
		';
		$row['scriptout']=$selectionscripts;
		$row['vieweroutputqnw']=$ewtabout; //qualifications and work experience
		$row['vieweroutputpersonal']=$vieweroutputpersonal;
		$row['adminoutput']=$adminoutput;
		$row['adminoutputtwo']=$adminoutputtwo;
		return $row;
	}
	function getAllUsers($viewer,$limit){
		global $host_addr,$viewout;
		$viewout=isset($viewout)?$viewout:"";
		$row=array();
		$testit=strpos($limit,"-");
		$outputtype="recruits";
		$testit!==false?$limit="":$limit=$limit;
		$row=array();
			if($limit!==""&&$viewer=="admin"){
				$query="SELECT * FROM recruits order by id desc ".$limit."";
			    $rowmonitor['chiefquery']="SELECT * FROM recruits order by id desc";
			}else if($limit==""&&$viewer=="admin"){
				$query="SELECT * FROM recruits order by id desc LIMIT 0,15";		
			    $rowmonitor['chiefquery']="SELECT * FROM recruits order by id desc";
			}elseif($limit!==""&&$viewer=="viewer"){
				$query="SELECT * FROM recruits WHERE status='active' $limit";
			    $rowmonitor['chiefquery']="SELECT * FROM recruits order by fullname,id,status asc,asc,desc";
			}else if($limit==""&&$viewer=="viewer"){
				$query="SELECT * FROM recruits WHERE status='active'";		
			    $rowmonitor['chiefquery']="SELECT * FROM recruits order by fullname,id desc";
			}else if($viewer=="inactiveviewer"){
				$query="SELECT * FROM recruits WHERE status='inactive' order by fullname,id desc";		
			    $rowmonitor['chiefquery']="SELECT * FROM recruits WHERE status='inactive' order by fullname,id desc";
			}else if(is_array($viewer)){
				$subtype=$viewer[0];
				$searchval=$viewer[1];
				$viewer=$viewer[2];
	 		  	$outputtype="recruitsearch|$subtype|$searchval|$viewer";
				if($subtype=="recruitname"&&$viewer=="admin"){
					$query="SELECT * FROM recruits WHERE (fullname LIKE '%$searchval%' AND status='active') OR (fullname LIKE '%$searchval%' AND status='inactive') $limit";
			    	$rowmonitor['chiefquery']="SELECT * FROM recruits WHERE (fullname LIKE '%$searchval%' AND status='active') OR (fullname LIKE '%$searchval%' AND status='inactive')";
				}elseif($subtype=="recruitstatus"&&$viewer=="admin"){
					$query="SELECT * FROM recruits WHERE status ='$searchval' $limit";
			    	$rowmonitor['chiefquery']="SELECT * FROM recruits WHERE status ='$searchval'";
				}elseif($subtype=="advancedrecruitsearch"&&$viewer=="admin"){
					$query= $searchval." ".$limit;
			    	$rowmonitor['chiefquery']=$searchval;
				}else{
					echo "search parameters unrecognized, contact your developer";
				}
			}
			// echo $query;
		$selection="";
		$run=mysql_query($query)or die(mysql_error()." Line 77");
		$numrows=mysql_num_rows($run);
		$top='<table id="resultcontenttable" cellspacing="0">
					<thead><tr><th>Photo</th><th>FullName</th><th>State</th><th>Email</th><th>maritalstatus</th><th>PhoneNumbers</th><th>Gender</th><th>Age</th><th>Reg Date</th><th>Status</th><th>View/Edit</th></tr></thead>
					<tbody>';
		$bottom='	</tbody>
				</table>';
		$adminoutput="";
		$monitorpoint="";
		if($numrows>0){
			while($row=mysql_fetch_assoc($run)){
				$outvar=getSingleUser($row['id']);
				$adminoutput.=$outvar['adminoutput'];
				$selection.='<option value="'.$outvar['id'].'">'.$outvar['fullname'].'</option>';

			}
		}
		$outs=paginatejavascript($rowmonitor['chiefquery']);
		$paginatetop='
		<div id="paginationhold">
			<div class="meneame">
				<input type="hidden" name="curquery" value="'.$rowmonitor['chiefquery'].'"/>
				<input type="hidden" name="outputtype" value="'.$outputtype.'"/>
				<input type="hidden" name="currentview" data-ipp="15" data-page="1" value="1"/>
				<div class="pagination" data-name="paginationpageshold">'.$outs['pageout'].'</div>
				<div class="pagination">
					  '.$outs['usercontrols'].'
				</div>
			</div>
		</div>
		<div id="paginateddatahold" data-name="contentholder">';
		$paginatebottom='
		</div><div id="paginationhold">
			<div class="meneame">
				<div class="pagination" data-name="paginationpageshold">'.$outs['pageout'].'</div>
			</div>
		</div>';
		$row['adminoutput']=$paginatetop.$top.$adminoutput.$bottom.$paginatebottom;
		$row['adminoutputtwo']=$top.$adminoutput.$bottom;
		$row['selection']=$selection;
		$row['numrowsactive']=$numrows;
		return $row;
	}
	function getSingleJobPost($id){
		global $host_addr;

	}
	function getAllJobPosts($viewer,$limit){
		global $host_addr;
		$viewout=isset($viewout)?$viewout:"";
		$row=array();
		$testit=strpos($limit,"-");
		$outputtype="jobposts";
		$testit!==false?$limit="":$limit=$limit;
		$row=array();
			if($limit!==""&&$viewer=="admin"){
				$query="SELECT * FROM recruits order by fullname,id desc ".$limit."";
			    $rowmonitor['chiefquery']="SELECT * FROM recruits order by fullname,id desc";
			}else if($limit==""&&$viewer=="admin"){
				$query="SELECT * FROM recruits order by fullname,id desc LIMIT 0,15";		
			    $rowmonitor['chiefquery']="SELECT * FROM recruits order by fullname,id desc";
			}elseif($limit!==""&&$viewer=="viewer"){
				$query="SELECT * FROM recruits WHERE status='active' $limit";
			    $rowmonitor['chiefquery']="SELECT * FROM recruits order by fullname,id,status asc,asc,desc";
			}else if($limit==""&&$viewer=="viewer"){
				$query="SELECT * FROM recruits WHERE status='active'";		
			    $rowmonitor['chiefquery']="SELECT * FROM recruits order by fullname,id desc";
			}else if($viewer=="inactiveviewer"){
				$query="SELECT * FROM recruits WHERE status='inactive' LIMIT 0,15";		
			    $rowmonitor['chiefquery']="SELECT * FROM recruits order by fullname,id desc";
			}else if(is_array($viewer)){
				$subtype=$viewer[0];
				$searchval=$viewer[1];
				$viewer=$viewer[2];
	 		  	$outputtype="jobsearch|$subtype|$searchval|$viewer";
				if($subtype=="recruitname"&&$viewer=="admin"){
					$query="SELECT * FROM recruits WHERE fullname LIKE '%$searchval%' AND status='active'";
			    	$rowmonitor['chiefquery']="SELECT * FROM recruits WHERE fullname LIKE '%$searchval%' AND status='active'";
				}elseif($subtype=="recruitstatus"&&$viewer=="admin"){
					$query="SELECT * FROM recruits WHERE status ='$searchval'";
			    	$rowmonitor['chiefquery']="SELECT * FROM recruits WHERE status ='$searchval'";
				}else{
					echo "search parameters unrecognized, contact your developer";
				}
			}
			// echo $query;
		$selection="";
		$run=mysql_query($query)or die(mysql_error()." Line 77");
		$numrows=mysql_num_rows($run);
		$top='<table id="resultcontenttable" cellspacing="0">
					<thead><tr><th>Photo</th><th>FullName</th><th>State</th><th>Email</th><th>maritalstatus</th><th>PhoneNumbers</th><th>Gender</th><th>Age</th><th>Reg Date</th><th>Status</th><th>View/Edit</th></tr></thead>
					<tbody>';
		$bottom='	</tbody>
				</table>';
		$adminoutput="";
		$monitorpoint="";
		if($numrows>0){
		while($row=mysql_fetch_assoc($run)){
			$outvar=getSingleUser($row['id']);
			$adminoutput.=$outvar['adminoutput'];
			$selection.='<option value="'.$outvar['id'].'">'.$outvar['fullname'].'</option>';

		}
		}
		$outs=paginatejavascript($rowmonitor['chiefquery']);
		$paginatetop='
		<div id="paginationhold">
			<div class="meneame">
				<input type="hidden" name="curquery" value="'.$rowmonitor['chiefquery'].'"/>
				<input type="hidden" name="outputtype" value="'.$outputtype.'"/>
				<input type="hidden" name="currentview" data-ipp="15" data-page="1" value="1"/>
				<div class="pagination" data-name="paginationpageshold">'.$outs['pageout'].'</div>
				<div class="pagination">
					  '.$outs['usercontrols'].'
				</div>
			</div>
		</div>
		<div id="paginateddatahold" data-name="contentholder">';
		$paginatebottom='
		</div><div id="paginationhold">
			<div class="meneame">
				<div class="pagination" data-name="paginationpageshold">'.$outs['pageout'].'</div>
			</div>
		</div>';
		$row['adminoutput']=$paginatetop.$top.$adminoutput.$bottom.$paginatebottom;
		$row['adminoutputtwo']=$top.$adminoutput.$bottom;
		$row['selection']=$selection;
		$row['numrowsactive']=$numrows;
		return $row;
	}
	function getSingleField($id){
		
	}
	function getAllJfields($viewer,$limit){

	}
?>