<div class="row">
	            <form name="contentform" method="POST" enctype="multipart/form-data" action="../snippets/basicsignup.php">
            		<input type="hidden" name="entryvariant" value="contententry"/>
            		<input type="hidden" name="maintype" value="units"/>
            		<input type="hidden" name="subtype" value="content"/>
                    <div class="col-md-12">
                    	<h4>New Content Entry</h4>
                    	<div class="col-md-6">
                    		<div class="form-group">
			                  <label>Unit Title</label>
			                  <div class="input-group">
			                      <div class="input-group-addon">
			                        <i class="fa fa-bars"></i>
			                      </div>
			                      <input type="text" class="form-control" name="contenttitle" Placeholder=""/>
			                   </div><!-- /.input group -->
			                </div>
			            </div>
			            <div class="col-md-6">
                    		<div class="form-group">
			                  <label>Cover Photo</label>
			                  <div class="input-group">
			                      <div class="input-group-addon">
			                        <i class="fa fa-image"></i>
			                      </div>
			                      <input type="file" class="form-control" name="contentpic" Placeholder=""/>
			                   </div><!-- /.input group -->
			                </div>
			            </div>
                    	<div class="col-md-12">
                    		<div class="form-group">
			                  <label>Unit Details </label>
			                  <textarea class="form-control" rows="3" name="contentpost" id="postersmallfour" placeholder="Provide Post"></textarea>
			                </div>
			            </div>
                	</div>
                	<div class="col-md-12">
            			<div class="box-footer">
		                    <input type="button" class="btn btn-danger" name="submitcontent2" value="Create/Update"/>
		                </div>
	            	</div>
                </form>
	        </div>
	        <script>
					tinyMCE.init({
				        theme : "modern",
				        selector: "textarea#adminposter",
				        skin:"lightgray",
				        width:"94%",
				        height:"650px",
				        external_image_list_url : ""+host_addr+"snippets/mceexternalimages.php",
				        plugins : [
				         "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
				         "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
				         "save table contextmenu directionality emoticons template paste textcolor responsivefilemanager"
				        ],
				        // toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons",
				        toolbar1: "undo redo | bold italic underline | fontselect fontsizeselect | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
				        toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",
				        image_advtab: true ,
				        editor_css:""+host_addr+"stylesheets/mce.css?"+ new Date().getTime(),
				        content_css:""+host_addr+"stylesheets/mce.css?"+ new Date().getTime(),
				        external_filemanager_path:""+host_addr+"scripts/filemanager/",
				        filemanager_title:"Adsbounty Admin Blog Content Filemanager" ,
				        external_plugins: { "filemanager" : ""+host_addr+"scripts/filemanager/plugin.min.js"}
					});
					tinyMCE.init({
					        theme : "modern",
					        selector:"textarea#postersmallthree",
					        menubar:false,
					        statusbar: false,
					        plugins : [
					         "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
					         "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
					         "save table contextmenu directionality emoticons template paste textcolor responsivefilemanager"
					        ],
					        width:"100%",
					        toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
					        toolbar2: "| link unlink anchor | emoticons",
					        image_advtab: true ,
					        content_css:""+host_addr+"stylesheets/mce.css",
					        external_filemanager_path:""+host_addr+"scripts/filemanager/",
					        filemanager_title:"Site Content Filemanager" ,
					        external_plugins: { "filemanager" : ""+host_addr+"scripts/filemanager/plugin.min.js"}
					});
					tinyMCE.init({
					        theme : "modern",
					        selector:"textarea#postersmallfour",
					        menubar:false,
					        statusbar: false,
					        plugins : [
					         "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
					         "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
					         "save table contextmenu directionality emoticons template paste textcolor responsivefilemanager"
					        ],
					        width:"80%",
					        height:"300px",
					        toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
					        toolbar2: "| responsivefilemanager | link unlink anchor | emoticons | code",
					        image_advtab: true ,
					        editor_css:""+host_addr+"stylesheets/mce.css?"+ new Date().getTime(),
					        content_css:""+host_addr+"stylesheets/mce.css?"+ new Date().getTime(),
							external_filemanager_path:""+host_addr+"scripts/filemanager/",
						   	filemanager_title:"NYSC Admin Blog Content Filemanager" ,
						   	external_plugins: { "filemanager" : ""+host_addr+"scripts/filemanager/plugin.min.js"}
					});   
			</script>