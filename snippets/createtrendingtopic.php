			<div id="form" style="background-color:#fefefe;">
				<form action="../snippets/basicsignup.php" name="trendingtopicform" enctype="multipart/form-data" method="post">
					<input type="hidden" name="entryvariant" value="createtrendingtopic"/>
					<div id="formheader">Create New Trending Topic.</div>
					* means the field is required.					
						<div id="formend">
							Topic *<br>
							<input type="text" placeholder="Enter Title" name="name" class="curved"/>
						</div>
						<div id="formend">
							Cover Photo *<br>
							<input type="file" placeholder="Choose image" name="profpic" class="curved"/>
						</div>
					<div id="formend">
						<input type="button" name="createtrendingtopic" value="Submit" class="submitbutton"/>
					</div>
				</form>
			</div>