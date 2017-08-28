			<div id="closecontainer" name="closefullcontenthold" data-id="theid" class="altcloseposfour"><img src="./images/closefirst.png" title="Close"class="total"/></div>
			<div id="form" style="background-color:#fefefe;">
				<form action="./snippets/basicsignup.php" name="bookingform" method="post">
					<input type="hidden" name="entryvariant" value="createbooking"/>
					<div id="formheader">Book Muyiwa Afolabi</div>
					* means the field is required.
					<div id="formend">
						<div id="elementholder">
							Organization Name * <br>
							<input type="text" name="name" class="curved"/>
						</div>
						<div id="elementholder">
							Organization Address * <br>
							<textarea name="address" class="curved3"></textarea>
						</div>
						<div id="elementholder">
							Theme/Title * <br>
							<input type="text" name="themetitle" class="curved"/>
						</div>
					</div>
					<div id="formend">
						<div id="elementholder">
							Contact Person * <br>
							<input type="text" name="contactperson" class="curved"/>
						</div>
						<div id="elementholder">
							Dates For Event * <br>
							<input type="text" name="from" title="(Date DD-MM-YYYY, Duration e.g '8:30AM to 5:40PM')" placeholder="From (Date DD-MM-YYYY, Duration e.g 8:30AM to 5:40PM)" class="curved"/>
							<input type="text" name="to" title="(Date DD-MM-YYYY, Duration e.g '8:30AM to 5:40PM')"placeholder="To (Date DD-MM-YYYY, Duration e.g 8:30AM to 5:40PM)" class="curved"/>
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
						<div id="elementholder">
							Language * <br>
							<select name="language" class="curved2">
								<option value="">--Choose--</option>
								<option value="English">English</option>
								<option value="Yoruba">Yoruba</option>
								<option value="Hausa">Hausa</option>
								<option value="Spanish">Spanish</option>
								<option value="French">French</option>
							</select>
						</div>
						<div id="elementholder">
							No of Participants * <br>
							<input type="text" name="expectedattendance" class="curved"/>
						</div>
						<div id="elementholder">
							Phone1 * <br>
							<input type="text" name="phone1" class="curved"/>
						</div>
					</div>
					<div id="formend">
						<div id="elementholder">
							Phone2 (Optional)
							<input type="text" name="phone2" class="curved"/>
						</div>
						<div id="elementholder">
							Email Address * <br>
							<input type="text" name="email" class="curved"/>
						</div>
						<div id="elementholder">
							Additional Information
							<textarea name="additionalinfo" id="poster" class="curved3"></textarea>
						</div>
					</div>
					<div id="formend">
						<input type="button" name="createbooking" value="Submit" class="submitbutton"/>
					</div>
					<div id="bottomlabel"><img src="./images/muyiwalogo5.png" class="total"></div>
				</form>
			</div>