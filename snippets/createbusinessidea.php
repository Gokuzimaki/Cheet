<div id="form" class="whiteit">
	<form action="./snippets/basicsignup.php" name="oyoform" style="background:#fefefe;" method="post">
		<input type="hidden" name="entryvariant" value="createbusinessidea"/>
		<div id="formheader">Own Your Own(Business Idea)</div>
		<span style="color: #FEFEFE;background: #0160BA;left: 100px;position: relative;">* means the field is required. Please fill the necessary fields below.</span>
		<div id="formend">
			<div class="col-md-3">
				Fullname *<br>
				<input type="text" placeholder="Firstname Lastname" name="name" class="curved"/>
			</div>
			<div class="col-md-3">
				Gender *<br>
				<select name="gender" class="curved2">
					<option value="">--Choose--</option>
					<option value="Male">Male</option>
					<option value="Female">Female</option>
				</select>
			</div>
			<div class="col-md-3">
				Age *<br>
				<input type="text" name="age" class="curved"/>
			</div>
			<div class="col-md-3">
				Marital Status *<br>
				<select name="maritalstatus" class="curved2">
					<option value="">--Choose--</option>
					<option value="Single">Single</option>
					<option value="Married">Married</option>
				</select>
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
				Address *<br>
				<input type="text" name="address" class="curved"/>
			</div>
		</div>
		<div id="formend">
			<div id="elementholder">
				Personal Phone Number *<br>
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
				Profession *<br>
				<input type="text" name="profession" class="curved"/>
			</div>
			<div id="elementholder">
				Personal Dream *<br>
				<input type="text" name="personaldream" class="curved"/>
			</div>
			<div id="elementholder">
				Area of Business Interest *<br>
				<input type="text" name="areaofbusiness" class="curved"/>
			</div>
		</div>
		<div id="formend">
			<div id="elementholder">
				Industry *<br>
				<input type="text" name="industry" class="curved"/>
			</div>
			<div id="elementholder">
				Motive *<br>
				<input type="text" name="motive" class="curved"/>
			</div>
		</div>
		<div id="formend">
			<div id="elementholder">
				Additional Information
				<textarea name="additionalinfo" id="" class="curved3"></textarea>
			</div>
		</div>
		<div id="formend">
			<input type="button" name="createbusinessidea" value="Submit" class="submitbutton"/>
		</div>
		<div id="bottomlabel"><img src="./images/muyiwalogo5.png" class="total"></div>
	</form>
</div>