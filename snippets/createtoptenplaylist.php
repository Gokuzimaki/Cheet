			<div id="form" style="background-color:#fefefe;">
				<form action="../snippets/basicsignup.php" name="toptenplaylistform" enctype="multipart/form-data" method="post">
					<input type="hidden" name="entryvariant" value="createtoptenplaylist"/>
					<div id="formheader">Create New Playlist Music.</div>
					* means the field is required.					
						<div id="formend">
							Title *<br>
							<input type="text" placeholder="Enter Title" name="title" class="curved"/>
						</div>
						<div id="formend">
							Artist *<br>
							<input type="text" placeholder="Enter the name of the artist" name="artist" class="curved"/>
						</div>
						<div id="formend">
							Album Photo *<br>
							<input type="file" placeholder="Choose image" name="profpic" class="curved"/>
						</div>
						<div id="formend">
							Music File *<br>
							<input type="file" placeholder="Choose a mp3 file" name="music" class="curved"/>
						</div>
					<div id="formend">
						<input type="button" name="createtoptenplaylist" value="Submit" class="submitbutton"/>
					</div>
				</form>
			</div>