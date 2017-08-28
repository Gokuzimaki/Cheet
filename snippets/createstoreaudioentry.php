			<div id="form" style="background-color:#fefefe;">
				<form action="../snippets/basicsignup.php" name="storeaudioform" method="post" enctype="multipart/form-data">
					<input type="hidden" name="entryvariant" value="createstoreaudio"/>
					<div id="formheader">Create Online Store Audio entry</div>
					* means the field is required.
					<div id="formend">
							Store *<br>
							<select name="type" class="curved2">
								<option value="">--Choose--</option>
								<option value="1">Frankly Speaking Store</option>
								<option value="2">CSI Store</option>
								<option value="3">TUSOM Store</option>
							</select>
					</div>
					<div id="formend">
							Title<br>
							<input type="text" name="title" Placeholder="The title of the entry." class="curved"/>
					</div>
					<div id="formend">
							Mini Title<br>
							<input type="text" name="minititle" Placeholder="The mini title." class="curved"/>
					</div>
					<div id="formend">
							Price<br>
							<input type="text" name="price" Placeholder="The price, in Dollars $ e.g 5.99." class="curved"/>
					</div>
					<div id="formend">
							Cover Photo<br>
							<input type="file" name="profpic" Placeholder="The Cover pic." class="curved"/>
					</div>
					<div id="formend">
						Mini Description *<br>
						<textarea name="minidescription" id="" placeholder="Place brief description of the file here" class="curved3"></textarea>
					</div>
					<div id="formend">
							Audio File<br>
							<input type="file" name="audio" Placeholder="The Audio file." class="curved"/>
					</div>
					<div id="formend">
							Preview Start(this works when both the start and stop times are set, otherwise it defaults to the first 5minutes of the audio entry!!)<br>
							<input type="text" name="prevstart" Placeholder="Start time in the format (mm:ss)." class="curved"/>
					</div>
					<div id="formend">
							Preview Stop<br>
							<input type="text" name="prevstop" Placeholder="Stop time in the format (mm:ss)." class="curved"/>
					</div>
					<div id="formend">
						<input type="button" name="createstoreaudio" value="Submit" class="submitbutton"/>
					</div>
				</form>
			</div>