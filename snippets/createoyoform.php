<?php 
	if(isset($mpagehidelegacyfullbackground)){
		echo $mpagehidelegacyfullbackground;
	}
?>
<div id="form" class="whiteit">
	<form action="./snippets/basicsignup.php" name="oyoform" style="background:#fefefe;" method="post">
		<input type="hidden" name="entryvariant" value="createoyo"/>
		<div id="formheader">Own Your Own(Starting Up)</div>
		<span style="color: #FEFEFE;background: #0160BA;left: 100px;position: relative;">* means the field is required. Please fill the necessary fields below.</span>
		<div id="formend">
			<div id="elementholder">
				Fullname *<br>
				<input type="text" placeholder="Firstname Lastname" name="name" class="curved"/>
			</div>
			<div id="elementholder">
				Gender *<br>
				<select name="gender" class="curved2">
					<option value="">--Choose--</option>
					<option value="Male">Male</option>
					<option value="Female">Female</option>
				</select>
			</div>
			<div id="elementholder">
				Age *<br>
				<input type="text" name="age" class="curved"/>
			</div>
		</div>
		<div id="formend">
			<div id="elementholder">
				Marital Status *<br>
				<select name="maritalstatus" class="curved2">
					<option value="">--Choose--</option>
					<option value="Single">Single</option>
					<option value="Married">Married</option>
				</select>
			</div>
			<div id="elementholder">
				Religion *<br>
				<select name="religion" class="curved2">
					<option value="">--Choose--</option>
					<option value="Christian">Christianity</option>
					<option value="Muslim">Islam</option>
				</select><br>
				Others(Specify).<br>
				<input type="text" placeholder="Specify Other Religion here" name="otherreligion" class="curved"/>
			</div>
			<div id="elementholder">
				State of origin *<br>
				<?php
					$stateout=produceStates(0,"");
					echo $stateout['selectionoutput'];
				?>
			</div>
		</div>
		<div id="formend">
			<div id="elementholder">
				Tribe *<br>
				<input type="text" placeholder="State the name of your tribe." name="tribe" class="curved"/>
			</div>
			<div id="elementholder">
				Local Government *<br>
				<input type="text" name="lga" class="curved"/>
			</div>
				<div id="elementholder">
				Personal Phone Number *<br>
				<input type="text" name="phone1" class="curved"/>
			</div>
		</div>
		<div id="formend">
			<div id="elementholder">
				Email Address *<br>
				<input type="text" name="email" class="curved"/>
			</div>
			<div id="elementholder">
				Occupation *<br>
				<input type="text" name="occupation" class="curved"/>
			</div>
			<div id="elementholder">
				Qualification(s) *<br>
				<textarea name="qualification" id="" class="curved3" style="width:218px;"></textarea>
			</div>
		</div>
		<div id="formend">
			<div id="elementholder">
				Current Employment Status *<br>
				<select name="curempstatus" class="curved2">
					<option value="">--Choose--</option>
					<option value="Employed">Employed</option>
					<option value="Self Employed">Self Employed</option>
					<option value="Unemployed">Unemployed</option>
				</select><br>
			</div>
			<div id="elementholder">
				Past Work Experience.*<br>
				(Work Place - Role - Number of Years) <br>
				<textarea name="pastworkexperience" id="" class="curved3"></textarea>
			</div>
			<div id="elementholder">
				Area of Business Interest *<br>
				<input type="text" name="areaofbusiness" class="curved"/>
			</div>
		</div>
		<div id="formend">
			<div id="elementholder">
				Start off Time *<br>
				<input type="text" name="starttime" class="curved"/>
			</div>
			<div id="elementholder">
				Preferred Location *<br>
				<input type="text" name="location" class="curved"/>
			</div>
			<div id="elementholder">
				Nature of Business Ownership *<br>
				<select name="businesstype" class="curved2">
					<option value="">--Choose--</option>
					<option value="Sole Ownership">Sole Ownership</option>
					<option value="Joint Ownership">Joint Ownership</option>
				</select><br>
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
				Additional Information
				<textarea name="additionalinfo" id="" class="curved3"></textarea>
			</div>
		</div>
		<div id="formend">
			<input type="button" name="createoyo" value="Submit" class="submitbutton"/>
		</div>
		<div id="bottomlabel"><img src="./images/muyiwalogo5.png" class="total"></div>
	</form>
</div>