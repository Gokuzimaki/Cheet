<form name="advancedrecruitsearch" method="GET" onSubmit="return false;" action="../snippets/display.php">
	  <input type="hidden" name="displaytype" value="advancedrecruitsearch"/>
	  <input type="hidden" name="extraval" value="admin"/>
	  <div style="display:; background:#fefefe;" class="col-md-12">
			<div>
				<h2>Advanced Recruit Search</h2>
				<section>
					<div class="row">
						<div class="col-md-12">
							<div class="col-md-4">
								<div class="form-group">
	                              <label>Field :</label>
	                              <div class="input-group">
	                                  <div class="input-group-addon">
	                                    <i class="fa fa-briefcase"></i>
	                                  </div>
									  <select class="form-control" name="jobfield">
											<option value="">Choose an Industry</option>
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
											<option value="Textiles">Textiles</option>
											<!-- <option value="4"></option> -->
									  </select>
	                              </div><!-- /.input group -->
	                            </div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
	                              <label>Position Available:</label>
	                              <div class="input-group">
	                                  <div class="input-group-addon">
	                                    <i class="fa fa-briefcase"></i>
	                                  </div>
									  <input type="text" class="form-control" id="positionavailable" name="positionavailable" placeholder="Position Available">
	                              </div><!-- /.input group -->
	                            </div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
	                              <label>Nature of Employment:</label>
	                              <div class="input-group">
	                                  <div class="input-group-addon">
	                                    <i class="fa fa-briefcase"></i>
	                                  </div>
									  <select name="termsofemployment" id="termsofemployment" class="form-control">
		                            		<option value="">--Choose Type--</option>
		                            		<option value="Full-Time">Full-Time</option>
		                            		<option value="Part-Time">Part-Time</option>
		                            		<option value="Contract">Contract</option>
		                            		<option value="Internship">Internship</option>
		                            		<option value="Freelance">Freelance</option>
		                              </select>
	                              </div><!-- /.input group -->
	                            </div>
							</div>
						</div>
						
						
						
					</div>
					<div class="col-sm-12">
						<div class="form-group">
		                    <label>Minimum Qualification:</label>
		                    <div class="input-group">
		                      <div class="input-group-addon">
								  <i class="fa fa-graduation-cap"></i>
		                      </div>
								<textarea name="minqualification" id="minqualification" class="form-control" rows="5" placeholder="Minimum qualification(s) seperate with semicolon ';' for this to work"></textarea>
		                    </div><!-- /.input group -->
	                    </div><!-- /.form group -->
					</div>
				</section>
				<section>
					<h6 class="bottom-line">Recruit Preferences :</h6>
					<div class="alert alert-info">
						<p>Use the range slider to change values, by clicking or tapping the knobs and dragging</p>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
			                    <label>Age :</label>
			                    <!-- <div class="input-group">
			                      <div class="input-group-addon">
			                        <i class="fa fa-clock-o"></i>
			                      </div>
			                    </div> --><!-- /.input group -->
		                      	<div class="range-slider clearfix">
		                      		<input name="pragemin" type="hidden"/>
		                      		<input name="pragemax" type="hidden"/>
									<input type="text" name="prageminmax" class="slider" data-min="17" data-max="60" data-current-min="18" data-current-max="26" data-mintarget="input[name=pragemin]" data-maxtarget="input[name=pragemax]" data-slider-id="purple">
									<div class="first-value"><span>0</span> Years</div>
									<div class="last-value"><span>0</span> Years</div>
								</div>
		                    </div><!-- /.form group -->
						</div>
						<div class="col-sm-12">
							<div class="form-group">
			                    <label>Work Experience in industry (how long should the recruit have functioned in the above selected industry):</label>
			                    <!-- <div class="input-group">
			                      <div class="input-group-addon">
			                        <i class="fa fa-clock-o"></i>
			                      </div>
			                    </div> --><!-- /.input group -->
		                      	<div class="range-slider clearfix">
		                      		<input name="pwemin" type="hidden" value="0"/>
		                      		<input name="pwemax" type="hidden" value="0"/>
									<input type="text" name="pweminmax" class="slider" data-min="0" data-max="10" data-current-min="2" data-current-max="6" data-mintarget="input[name=pwemin]" data-maxtarget="input[name=pwemax]" data-slider-id="blue">
									<div class="first-value">From: <span>0</span> Years</div>
									<div class="last-value">To: <span>0</span> Years</div>
								</div>
		                    </div><!-- /.form group -->
						</div>
						<div class="col-sm-12">
							<div class="form-group">
			                    <label>Work Experience in Job Role (how long should the recruit have functioned in the job position you need):</label>
			                    <!-- <div class="input-group">
			                      <div class="input-group-addon">
			                        <i class="fa fa-clock-o"></i>
			                      </div>
			                    </div> --><!-- /.input group -->
		                      	<div class="range-slider clearfix">
		                      		<input name="pwejmin" type="hidden" value="0"/>
		                      		<input name="pwejmax" type="hidden" value="0"/>
									<input type="text" name="pwejminmax" class="slider" data-min="0" data-max="10" data-current-min="3" data-current-max="8" data-mintarget="input[name=pwejmin]" data-slider-value="[3,8]" data-maxtarget="input[name=pwejmax]" data-slider-id="green">
									<div class="first-value">From: <span>0</span> Years</div>
									<div class="last-value">To: <span>0</span> Years</div>
								</div>
	              				<!-- <input type="text" value="" class="slidermini form-control" data-slider-min="-200" data-slider-max="200" data-slider-step="5" data-slider-value="[-100,100]" data-slider-orientation="horizontal" data-slider-selection="before" data-slider-tooltip="show" data-slider-id="aqua"> -->

		                    </div><!-- /.form group -->
						</div>
						<div class="col-sm-12">
							<div class="form-group">
			                    <label>Preferred Gender of Recruits:</label>
			                    <div class="input-group">
			                      <div class="input-group-addon">
			                        <i class="fa fa-transgender"></i>
			                      </div>
			                      <select name="prefgender" id="prefgender" class="form-control">
			                      		<option value="">Choose Gender</option>
			                      		<option value="male">Male</option>
			                      		<option value="female">Female</option>
	                              </select>
			                    </div><!-- /.input group -->
		                    </div><!-- /.form group -->
						</div>
					</div>
					<div class="col-sm-12">
						<div class="form-group">
		                    <label>Helpfull Natural Talents:</label>
		                    <div class="input-group">
		                      <div class="input-group-addon">
		                      	<span class="fa-stack fa-lg stackaddon">
								  <i class="fa fa-soccer-ball-o fa-spin fa-stack-1x faiconfirst"></i>
								  <i class="fa fa-plane fa-stack-1x faiconsecond"></i>
								  <i class="fa fa-camera-retro fa-stack-1x faiconthird"></i>
								</span>
		                      </div>
								<textarea name="hobbies" id="hobbies" class="form-control" rows="5" placeholder="Seperate Hobbies with a semicolod"></textarea>
		                    </div><!-- /.input group -->
	                    </div><!-- /.form group -->
					</div>
					<div class="col-sm-12">
						<div class="form-group">
		                    <label>Helpfull Soft Skills:</label>
		                    <div class="input-group">
		                      <div class="input-group-addon">
								<span class="fa-stack fa-lg stackaddon">
								  <i class="fa fa-gear fa-spin fa-stack-1x faiconfirst"></i>
								  <i class="fa fa-language fa-stack-1x faiconsecond"></i>
								  <i class="fa fa-bullseye fa-stack-1x faiconthird"></i>
								</span>
		                      </div>
								<textarea name="helpfullskills" id="helpfullskills" class="form-control" rows="5" placeholder="Seperate Skills with a semicolon ';'"></textarea>
		                    </div><!-- /.input group -->
	                    </div><!-- /.form group -->
					</div>
				</section>
			</div>
	  </div>
	  <div class="col-md-12 textleft">
		<input type="button" name="advancedrecruitsearch" class="btn btn-default btn-large pull-left" value="Advanced Search"/>
	  </div>
</form>
<script>
	$(function () {
		$('section.content .range-slider .slider').each(function () {
			var doUpdate=function(){
				$(this).parent().find('.first-value span').text(ui.values[0]);
				$(this).parent().find('.last-value span').text(ui.values[1]);
				$(mintarget).val(ui.values[0]);
				$(maxtarget).val(ui.values[1]);	
			}
			var $this = $(this),
				min = $this.data('min'),
				max = $this.data('max'),
				current_min= $this.data('current-min'),
				current_max= $this.data('current-max'),
				mintarget= $this.data('mintarget'),
				maxtarget= $this.data('maxtarget');
			$this.slider({
				range: true,
				min: min,
				max: max,
				step: 1,
				value: [current_min,current_max],
				on: function (slide,doUpdate) {
					/*console.log(ui,event);
					$(this).parent().find('.first-value span').text(ui.values[0]);
					$(this).parent().find('.last-value span').text(ui.values[1]);
					$(mintarget).val(ui.values[0]);
					$(maxtarget).val(ui.values[1]);*/
					console.log(this);
				}
			});
		});
        var mySlider=$('.slidermini').slider();
		
	});					
</script>
<section class="results">
	<div class="col-md-12" data-name="rowresults">
	</div>
</section>