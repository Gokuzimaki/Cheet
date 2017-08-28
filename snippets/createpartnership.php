			<div id="closecontainer" name="closefullcontenthold" data-id="theid" class="altcloseposfour"><img src="./images/closefirst.png" title="Close"class="total"/></div>
			<div id="form" style="background-color:#fefefe;">
				<form action="./snippets/basicsignup.php" name="partnershiprequestform" method="post">
					<input type="hidden" name="entryvariant" value="createpartnershiprequest"/>
					<div id="formheader">International Partnership Request Form</div>
					* means the field is required.
					<div class="row partnerform">
						<div class="col-md-12">
							<div class="col-md-3">
								Company Name *
								<input type="text" name="name" Placeholder="The organization name" class="curved"/>
							</div>
							<div class="col-md-3">
								Country *
								<input type="text" name="country" placeholder="Country" class="curved"/>
							</div>
							<div class="col-md-3">
								City *
								<input type="text" name="city" placeholder="City" class="curved"/>
							</div>
							<div class="col-md-3">
								Address *
								<input type="text" name="address" placeholder="Address" class="curved"/>
							</div>
						</div>
						<div class="col-md-12">
							<div class="col-md-4">
								Industry*
								<input type="text" name="industry" title="Industry" placeholder="Industry" class="curved"/>
							</div>
							<div class="col-md-4">
								 Interest*<br>
								<select name="interest" class="curved2">
									<option value="">--Choose--</option>
									<option value="Marketing Strategy Development">Marketing Strategy Development</option>
									<option value="Marketing Planning Implementation">Marketing Planning Implementation</option>
									<option value="Sales Agent And Distributors">Sales Agent & Distributors</option>
									<option value="Franchise">Franchise</option>
									<option value="Others">Others</option>
								</select>
							</div>
							<div class="col-md-4">
								Product/Service Type *
								<input type="text" name="productservicetype" Placeholder="Product or Service Type" class="curved"/>
							</div>
							
						</div>
						<div class="col-md-12">
							<div class="col-md-3">
								Contact Person *
								<input type="text" name="contactperson" Placeholder="Contact Person" class="curved"/>
							</div>
							<div class="col-md-3">
								Designation *
								<input type="text" name="designation" Placeholder="Contact Person Designation" class="curved"/>
							</div>
							<div class="col-md-3">
								Phone*
								<input type="text" name="phone1" class="curved"/>
							</div>
							<div class="col-md-3">
								Phone Two
								<input type="text" name="phone2" class="curved"/>
							</div>
							<div class="col-md-4">
								Email Address *
								<input type="text" name="email"  placeholder="Email Address" class="curved"/>
							</div>
							<div class="col-md-4">
								Office Location*
								<textarea name="officelocation" id="" placeholder="Office Location" class="curved3"></textarea>
							</div>
							<div class="col-md-4">
								Other Details:
								<textarea name="otherdetails" id="" Placeholder="Other details" class="curved3"></textarea>
							</div>
						</div>
						<div class="col-md-12">
							<input type="button" name="createpartnershiprequest" value="Submit" class="submitbutton"/>
						</div>
					</div>
					<div id="bottomlabel"><img src="./images/frontierslogoalbumart.jpg" class="total"></div>
				</form>
			</div>