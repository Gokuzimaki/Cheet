<div id="closecontainer" name="closefullcontenthold" data-id="theid" class="altcloseposfour"><img src="./images/closefirst.png" title="Close"class="total"/></div>
<div id="form" style="background-color:#fefefe;">
	<form action="./snippets/basicsignup.php" name="oyoform" onSubmit="return:false;" method="post">
		<input type="hidden" name="entryvariant" value="createoyo"/>
		<div id="formheader">Own Your Own</div>
		<div id="formend" >
<div id="contenttopportraithold" style="width:98%;margin:auto;float: none;">
	<img src="./images/Own Your Own Webbannera.jpg" class="total"/>
</div><br>
<p style="text-align:justify;padding:0px 30px 0px 35px;">
OWN YOUR OWN is a detailed entrepreneurship workshop that will teach you how to Start, Build, Manage or Turn-Around any Business for excellent performance and profit in Nigeria!
Many people through this workshop experience have broken through their fears, gotten off the fence and escaped the entrapment of an elongated season of unemployment or paid employment! They're now on the way to making all their dreams for a better life come true!
Many foreign businesses through this package have also made wise and guided investments in Nigeria and are today glad they consulted! 
<br><br>
Do you believe you'll do very well in self-employment?<br>
Do you think you've spent enough years in paid-employment?<br>
Are you afraid of the financial uncertainty of exiting paid-employment?<br>
What is your personal goal, objective and dream in life?<br>
What are your natural gifts and talents?<br>
What skills have you acquired so far?<br>
What qualifications and certifications do you have?<br>
What comprises your personality and psychological make-up?<br>
What are your natural strengths and weaknesses?<br>
What in life are you really passionate about?<br>
What Ideas do you have?<br><br>
Frontiers Academy with the input of several successful business owners in Nigeria has developed this package guaranteed to deliver success for you in your transition and ambition to be self-employed.<br>
This is quite different from text book theories; this is about succeeding in our peculiar Nigerian socio-economic environment! This deals with real business issues! <br>
As you may have guessed, the OWN YOUR OWN self-employment coaching package is usually over-subscribed by many forward thinking participants per occasion, so hurry and register now to take part in the next or subsequent session.<br>
</p>
		</div>
		<span style="color: #FEFEFE;background: #0160BA;">* means the field is required. Please fill the necessary fields below.</span>
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
				<textarea name="qualification" id="" class="curved3"></textarea>
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