			<div id="form" style="background-color:#fefefe;">
				<form action="../snippets/basicsignup.php" name="topaudioform" enctype="multipart/form-data" method="post">
					<input type="hidden" name="entryvariant" value="createtopaudio"/>
					<div id="formheader">Create New Frankly Speaking Episode.</div>
					* means the field is required.					
						<div id="formend">
							Title *<br>
							<input type="text" placeholder="Enter Title" name="title" class="curved"/>
						</div>
						<div id="formend">
							Audio File *<br>
							<input type="file" placeholder="Choose a mp3 file" name="music" class="curved"/>
						</div>
					<div id="formend">
						<input type="button" name="createtopaudio" value="Submit" class="submitbutton"/>
					</div>
				</form>
			</div>