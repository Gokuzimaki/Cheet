<div class="box">
	<div class="box-body">
	    <div class="box-group" id="generaldataaccordion">
			<div class="panel box overflowhidden box-primary">
			    <div class="box-header with-border">
			        <h4 class="box-title">
			          <a data-toggle="collapse" data-parent="#generaldataaccordion" href="#NewPageManagerBlock">
			            <i class="fa fa-sliders"></i> Create Blog Type
			          </a>
			        </h4>
			    </div>
			    <div id="NewPageManagerBlock" class="panel-collapse collapse in">
			        <div class="row">

						<div id="form" style="background-color:#fefefe;">
							<form action="../snippets/basicsignup.php" name="blogtype" method="post">
								<input type="hidden" name="entryvariant" value="createblogtype"/>
									<div class="col-sm-12"> 
		                                <div class="form-group">
		                                    <label>Blog Name</label>
		                                    <div class="input-group">
			                                      <div class="input-group-addon">
			                                        <i class="fa fa-file-text"></i>
			                                      </div>
			                                      
												  <input type="text" placeholder="Enter Blog Name"  name="name" class="form-control"/>
			                                </div><!-- /.input group -->
		                              	</div><!-- /.form group -->
		                            </div>
		                            <div class="col-sm-12"> 
		                                <div class="form-group">
		                                    <label>Blog Description</label>
		                                    <div class="input-group">
			                                      <div class="input-group-addon">
			                                        <i class="fa fa-file-text"></i>
			                                      </div>
			                                      
												  <textarea name="description" rows="5" placeholder="Enter Blog Description" class="form-control"></textarea>

			                                </div><!-- /.input group -->
		                              	</div><!-- /.form group -->
		                            </div>

								<div id="formend">
									<div class="col-md-12 clearboth">
						                <div class="box-footer">
						                    <input type="button" class="btn btn-danger" name="createblogtype" value="Create/Update"/>
						                </div>
						            </div>
								</div>
							</form>
						</div>
					</div>
			    </div>
			</div>
		</div>
	</div>
</div>