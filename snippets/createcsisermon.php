			<div class="row" style="background-color:#fefefe;">
				<form action="../snippets/basicsignup.php" name="csisermonform" enctype="multipart/form-data" method="post">
					<input type="hidden" name="entryvariant" value="createcsisermon"/>
					<div id="formheader">Create New Sermon.</div>
					<div class="text-center">* means the field is required.</div>	
					<div class="col-md-12">				
						<div class="col-md-4">
							Title *<br>
							<input type="text" placeholder="Enter Title" name="title" class="form-control"/>
						</div>
						<div class="col-md-4">
							Sermon Date *<br>
							<input type="text" placeholder="Format: 18th July 2015 | 10:04 AM" name="sermondate" class="form-control"/>
						</div>
						<div class="col-md-4">
							Cover Photo <br>
							<input type="file" placeholder="Choose image" name="profpic" class="form-control"/>
						</div>
					</div>
					<div class="col-md-12">
						Intro *<br>
						<textarea placeholder="Provide a very short description or introduction for this sermon" name="intro" class="form-control"/>
					</div>
					<div class="col-md-12 emu-row">
						<h4 class="emu-row section-marker-header text-center"><i class="fa fa-volume-up"></i> Audio Section</h4>
						<div class="col-md-12 emu-row text-center">
							Audio Type <br>
							<select name="audiotype">
								<option value="">--Choose--</option>
								<option value="local">Local Audio</option>
								<option value="embed">Embedded</option>
							</select>
						</div>
						<div class="col-md-6" data-name="local" >
							Audio file *<br>
							<input type="file" placeholder="Choose a mp3 file" name="audio" class="form-control"/>
						</div>
						<div class="col-md-6" data-name="embed" >
							Audio Embed Code <br>
							<textarea placeholder="Provide the audio embed code" name="audioembed"  class="form-control"></textarea>
						</div>
					</div>
					<div class="col-md-12 emu-row">
						<h4 class="emu-row section-marker-header text-center"><i class="fa fa-film"></i> Video Section</h4>
						<div class="col-md-12 emu-row text-center">
							Video Type <br>
							<select name="videotype">
								<option value="">--Choose--</option>
								<option value="local">Local Video</option>
								<option value="embed">Embedded</option>
							</select>
						</div>
						<div class="col-md-12 emu-row" data-name="localvideo" >
							Video Files *(you can upload more than one video codec type as specified, but it is advisable you do your video uploads one at a time i.e upload first, edit and upload more later)<br>
							<p class="col-md-4">
								FLV<br>
								<input type="file" placeholder="Choose a video file" name="videoflv" class="form-control"/>
							</p>
							<p class="col-md-4">
								MP4<br>
								<input type="file" placeholder="Choose a video file" name="videomp4" class="form-control"/>
							</p>
							<p class="col-md-4">
								3GP<br>
								<input type="file" placeholder="Choose a video file" name="video3gp" class="form-control"/>
							</p>
						</div>
						<div class="col-md-12 emu-row" data-name="embedvideo" >
							Video Embed Code *<br>
							<textarea placeholder="Place your embed code here" name="videoembed"  class="form-control"></textarea>
						</div>
					</div>

					<div class="col-md-12">
						<input type="button" name="createcsisermon" value="Submit" class="submitbutton"/>
					</div>
				</form>
			</div>