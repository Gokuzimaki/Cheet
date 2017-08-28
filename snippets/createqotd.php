			<div id="form" style="background-color:#fefefe;">
				<form action="../snippets/basicsignup.php" name="qotdform" enctype="multipart/form-data" method="post">
					<input type="hidden" name="entryvariant" value="createqotd"/>
					<div id="formheader">Quote of the Day</div>
					* means the field is required.
					<div id="formend">
							Quote Type *<br>
							<select name="quotetype" class="curved2">
								<option value="">--Choose--</option>
								<option value="general">General</option>
								<option value="pfn">Frankly Speaking Africa</option>
								<option value="csi">CSI Outreach</option>
							</select>
					</div>
					<div id="formend">
							Quoted Person(Leave empty to default to "Muyiwa Afolabi")<br>
							<input type="text" name="quotedperson" Placeholder="The name of the person you are quoting." class="curved"/>
					</div>
					<div id="formend" data-name="image">
						Quoted Person Image(Leave this to use the default Muyiwa Afolabi image)<br>
						<input type="file" name="profpic" Placeholder="The name of the person you are quoting." class="curved"/>
					</div>
					<div id="formend">
						Quote of the Day *<br>
						<textarea name="quoteoftheday" id="" placeholder="Put the quote text here without any quotes please the quote will be added automatically when this entry is displayed" class="curved3"></textarea>
					</div>

					<div id="formend">
						<input type="button" name="createqotd" value="Submit" class="submitbutton"/>
					</div>
				
				</form>
			</div>