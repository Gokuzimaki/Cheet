<div id="form" class="whiteit">
	<form action="./snippets/basicsignup.php" name="oyoform" style="background:#fefefe;" method="post">
		<input type="hidden" name="entryvariant" value="createoyo"/>
		<div id="formheader">Own Your Own(Training and Empowerment)</div>
		<span style="color: #FEFEFE;background: #0160BA;left: 100px;position: relative;">* means the field is required. Please fill the necessary fields below.</span>
		<div id="formend">
			<div id="elementholder">
				Fullname/Organisation Name *<br>
				<input type="text" placeholder="Firstname Lastname/ Organisation Name" name="name" class="curved"/>
			</div>
			<div id="elementholder">
				Contact Person *<br>
				<input type="text" name="contactperson" class="curved"/>
			</div>
			<div id="elementholder">
				Theme/Title *<br>
				<input type="text" name="themetitle" class="curved"/>
			</div>
			
		</div>
		<div id="formend">
			<div id="elementholder">
				State of origin *<br>
				<?php
					$stateout=produceStates(0,"");
					echo $stateout['selectionoutput'];
				?>
			</div>
			<div id="elementholder">
				City *<br>
				<input type="text" placeholder="City." name="city" class="curved"/>
			</div>
			<div id="elementholder">
				Address/Organisation address *<br>
				<input type="text" name="address" class="curved"/>
			</div>
		</div>
		<div id="formend">
			<div id="elementholder">
				Phone Number *<br>
				<input type="text" name="phone1" class="curved"/>
			</div>
			<div id="elementholder">
				Phone Two <br>
				<input type="text" name="phone2" class="curved"/>
			</div>
			<div id="elementholder">
				Email Address *<br>
				<input type="text" name="email" class="curved"/>
			</div>
		</div>
		<div id="formend">
			<div id="elementholder">
				New or Existing Business? *<br>
				<select name="businessruntype" class="curved2">
					<option value="">--Choose--</option>
					<option value="Existing Business">Existing Business</option>
					<option value="New Business">New Business</option>
				</select><br>
			</div>
			<div id="elementholder">
				Other Details<br>
				<textarea name="otherdetails" id="" class="form-control"></textarea>
			</div>
			<div id="elementholder">
				Type Of Event * <br>
				<select name="eventtype" class="curved2">
					<option value="">--Choose--</option>
					<option value="Career">Career</option>
					<option value="Business">Business</option>
					<option value="Religion">Religion</option>
					<option value="Government">Government</option>
					<option value="School/University">School/University</option>
				</select>
			</div>
		</div>
		<div id="formend">
			<div class="col-md-4">
				Industry *<br>
				<input type="text" name="industry" class="curved"/>
			</div>
			<div class="col-md-4">
				No of Participants * <br>
				<input type="text" name="expectedattendance" class="curved"/>
			</div>
			<div class="col-md-4">
				Dates for event *<br>
				<input type="text" name="from" title="(Date DD-MM-YYYY, Duration e.g '8:30AM to 5:40PM')" placeholder="From (Date DD-MM-YYYY, Duration e.g 8:30AM to 5:40PM)" class="curved"/>
				<input type="text" name="to" title="(Date DD-MM-YYYY, Duration e.g '8:30AM to 5:40PM')"placeholder="To (Date DD-MM-YYYY, Duration e.g 8:30AM to 5:40PM)" class="curved"/>
			</div>		
		</div>
		<div id="formend">
			<!-- <div id="elementholder">
				Preferred Location *<br>
				<input type="text" name="location" class="curved"/>
			</div> -->
			<div id="elementholder">
				Additional Information
				<textarea name="additionalinfo" id="" class="curved3"></textarea>
			</div>
		</div>
		<div id="formend">
			<input type="button" name="createtrainingandempowerment" value="Submit" class="submitbutton"/>
		</div>
		<div id="bottomlabel"><img src="./images/muyiwalogo5.png" class="total"></div>
	</form>
</div>