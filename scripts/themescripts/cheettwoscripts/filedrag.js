
(function() {
	"use strict";

	// getElementById
	function $id(id) {
		return document.getElementById(id);
	}


	// output information
	function Output(msg) {
		var m = $id("messages");
		m.innerHTML = msg + m.innerHTML;3
	}


	// file drag hover
	function FileDragHover(e) {
		e.stopPropagation();
		e.preventDefault();
		e.target.className = (e.type == "dragover" ? "hover" : "");
	}


	// file selection
	function FileSelectHandler(e) {

		// cancel event and hover styling
		FileDragHover(e);

		// fetch FileList object
		var files = e.target.files || e.dataTransfer.files;

		// process all File objects
		for (var i = 0, f; f = files[i]; i++) {
			ParseFile(f);
			UploadFile(f);
		}

		return false;

	}


	// output file information
	function ParseFile(file) {

		/*Output(
			"<p>File information: <strong>" + file.name +
			"</strong> type: <strong>" + file.type +
			"</strong> size: <strong>" + file.size +
			"</strong> bytes</p>"
		);*/

		// display an image
		if (file.type.indexOf("image") == 0) {
			var reader = new FileReader();
			reader.onload = function(e) {
				Output(
					
					'<img class="thumb" src="' + e.target.result + '" />'
				);
			}
			reader.readAsDataURL(file);
		}

		// display text
		if (file.type.indexOf("text") == 0) {
			var reader = new FileReader();
			reader.onload = function(e) {
				Output(
					"<p><strong>" + file.name + ":</strong></p><pre>" +
					e.target.result.replace(/</g, "&lt;").replace(/>/g, "&gt;") +
					"</pre>"
				);
			}
			reader.readAsText(file);
		}

	}


	// upload JPEG files
	function UploadFile(file) {

		//console.log(file);

		var form_data = new FormData();
		form_data.append('fileselect', file);
		
		var xhr = new XMLHttpRequest();
		if (xhr.upload && file.type == "image/jpeg" && file.size <= $id("MAX_FILE_SIZE").value) {

			// create progress bar
			var o = $id("progress");
			var can = o.appendChild(document.createElement("a"));
			can.appendChild(document.createTextNode("Cancel"));
			var progress = o.appendChild(document.createElement("p"));
			progress.appendChild(document.createTextNode("upload " + file.name));


			// progress bar
			xhr.upload.addEventListener("progress", function(e) {
				var pc = parseInt(100 - (e.loaded / e.total * 100));
				progress.style.backgroundPosition = pc + "% 0";
			}, false);

			// file received/failed
			xhr.onreadystatechange = function(e) {
				if (xhr.readyState == 4) {

					$('#progress').addClass('hide').delay(800);
					$('.uploading-com').append( "<div class='del-attechment pull-left mrgt2x'><a class='file-name f-lato dark-purple text-bold medium-text'>" + file.name + " <i id='close' class='fa fa-times'></i></a> <span class='f-lato medium-text'>Uploaded by Admin</span></div>");
					$(".add-img").css("background-color", "transparent"); 
					// do something here
					progress.className = (xhr.status == 200 ? "success" : "failure");
				}
			};

			// start upload
			xhr.open("POST", $id("upload").action, true);
			xhr.setRequestHeader("X_FILENAME", file.name);
			xhr.send(form_data);

		}

	}


	// initialize
	function Init() {

		var fileselect = $id("fileselect"),
			filedrag = $id("filedrag"),
			submitbutton = $id("submitbutton");

		// file select
		fileselect.addEventListener("change", FileSelectHandler, false);
		

		// is XHR2 available?
		var xhr = new XMLHttpRequest();
		if (xhr.upload) {

			// file drop
//			filedrag.addEventListener("dragover", FileDragHover, false);
//			filedrag.addEventListener("dragleave", FileDragHover, false);
//			filedrag.addEventListener("drop", FileSelectHandler, false);
//			filedrag.style.display = "block";

			// remove submit button
			//submitbutton.style.display = "none";
		}

		return false;

	}



	// call initialization file
	if (window.File && window.FileList && window.FileReader) {
		Init();
	}

	document.getElementById("fileselect").onchange = function() {
    	//document.getElementById("upload").submit();
    	
    	return false;
	};

	$('#upload').on('submit', function(e){
		return false;
	});

	$('.button.cancel').click(function (e) {
    	xhr.abort();
	});
})();


/*  Second Uploader
	Upload your files

	*/
(function() {
	"use strict";

	// getElementById
	function $id(id) {
		return document.getElementById(id);
	}


	// output information
	function Output(msg) {
		var m = $id("messages1");
		m.innerHTML = msg + m.innerHTML;
	}


	// file drag hover
	function FileDragHover(e) {
		e.stopPropagation();
		e.preventDefault();
		e.target.className = (e.type == "dragover" ? "hover" : "");
	}


	// file selection
	function FileSelectHandler(e) {

		// cancel event and hover styling
		FileDragHover(e);

		// fetch FileList object
		var files = e.target.files || e.dataTransfer.files;

		// process all File objects
		for (var i = 0, f; f = files[i]; i++) {
			ParseFile(f);
			UploadFile(f);
		}

		return false;

	}


	// output file information
	function ParseFile(file) {

		/*Output(
			"<p>File information: <strong>" + file.name +
			"</strong> type: <strong>" + file.type +
			"</strong> size: <strong>" + file.size +
			"</strong> bytes</p>"
		);*/

		// display an image
		/*if (file.type.indexOf("image") == 0) {
			var reader = new FileReader();
			reader.onload = function(e) {
				Output(
					
					'<img class="thumb" src="' + e.target.result + '" />'
				);
			}
			reader.readAsDataURL(file);
		}*/

		// display text
		if (file.type.indexOf("text") == 0) {
			var reader = new FileReader();
			reader.onload = function(e) {
				Output(
					"<p><strong>" + file.name + ":</strong></p><pre>" +
					e.target.result.replace(/</g, "&lt;").replace(/>/g, "&gt;") +
					"</pre>"
				);
			}
			reader.readAsText(file);
		}

	}


	// upload JPEG files
	function UploadFile(file) {

		//console.log(file);

		var form_data = new FormData();
		form_data.append('fileselect', file);
		
		var xhr = new XMLHttpRequest();
		if (xhr.upload /*&& file.type == "image/jpeg"*/ && file.size <= $id("MAX_FILE_SIZE1").value) {

			// create progress bar
			var o = $id("progress1");
			
			var progress = o.appendChild(document.createElement("p"));
			progress.appendChild(document.createTextNode("upload " + file.name));
			var can = o.appendChild(document.createElement("a"));
			can.appendChild(document.createTextNode("Cancel"));


			// progress bar
			xhr.upload.addEventListener("progress", function(e) {
				var pc = parseInt(100 - (e.loaded / e.total * 100));
				progress.style.backgroundPosition = pc + "% 0";
			}, false);

			// file received/failed
			xhr.onreadystatechange = function(e) {
				if (xhr.readyState == 4) {

					//$('#progress').addClass('hide').delay(800);
					$('.uploading-com1').append( "<div class='del-attechment'><a class='file-name f-lato dark-purple text-bold medium-text'>" + file.name + " <i id='close' class='fa fa-times'></i></a></div>");
					//$(".add-img").css("background-color", "transparent"); 
					progress.className = (xhr.status == 200 ? "success" : "failure");
				}
			};

			// start upload
			xhr.open("POST", $id("upload1").action, true);
			xhr.setRequestHeader("X_FILENAME", file.name);
			xhr.send(form_data);

		}

	}


	// initialize
	function Init() {

		var fileselect = $id("fileselect1"),
			filedrag = $id("filedrag1"),
			submitbutton = $id("submitbutton1");

		// file select
		fileselect.addEventListener("change", FileSelectHandler, false);
		

		// is XHR2 available?
		var xhr = new XMLHttpRequest();
		if (xhr.upload) {

			// file drop
//			filedrag.addEventListener("dragover", FileDragHover, false);
//			filedrag.addEventListener("dragleave", FileDragHover, false);
//			filedrag.addEventListener("drop", FileSelectHandler, false);
//			filedrag.style.display = "block";

			// remove submit button
			//submitbutton.style.display = "none";
		}

		return false;

	}



	// call initialization file
	if (window.File && window.FileList && window.FileReader) {
		Init();
	}

	document.getElementById("fileselect1").onchange = function() {
    	//document.getElementById("upload").submit();
    	
    	return false;
	};

	$('#upload1').on('submit', function(e){
		return false;
	});

	/*$('.button.cancel').click(function (e) {
    	xhr.abort();
	});*/
})();

/*  Upload Video
	just video MP4
	*/

(function() {
	"use strict";

	// getElementById
	function $id(id) {
		return document.getElementById(id);
	}


	// output information
	function Output(msg) {
		var m = $id("messages2");
		m.innerHTML = msg + m.innerHTML;
	}


	// file drag hover
	function FileDragHover(e) {
		e.stopPropagation();
		e.preventDefault();
		e.target.className = (e.type == "dragover" ? "hover" : "");
	}


	// file selection
	function FileSelectHandler(e) {

		// cancel event and hover styling
		FileDragHover(e);

		// fetch FileList object
		var files = e.target.files || e.dataTransfer.files;

		// process all File objects
		for (var i = 0, f; f = files[i]; i++) {
			ParseFile(f);
			UploadFile(f);
		}

		return false;

	}


	// output file information
	function ParseFile(file) {

		/*Output(
			"<p>File information: <strong>" + file.name +
			"</strong> type: <strong>" + file.type +
			"</strong> size: <strong>" + file.size +
			"</strong> bytes</p>"
		);*/

		// display an image
		/*if (file.type.indexOf("image") == 0) {
			var reader = new FileReader();
			reader.onload = function(e) {
				Output(
					
					'<img class="thumb" src="' + e.target.result + '" />'
				);
			}
			reader.readAsDataURL(file);
		}*/

		// display text
		if (file.type.indexOf("text") == 0) {
			var reader = new FileReader();
			reader.onload = function(e) {
				Output(
					"<p><strong>" + file.name + ":</strong></p><pre>" +
					e.target.result.replace(/</g, "&lt;").replace(/>/g, "&gt;") +
					"</pre>"
				);
			}
			reader.readAsText(file);
		}

	}


	// upload files
	function UploadFile(file) {

		//console.log(file);

		var form_data = new FormData();
		form_data.append('fileselect', file);
		
		var xhr = new XMLHttpRequest();
		if (xhr.upload /*&& file.type == "image/jpeg"*/ && file.size <= $id("MAX_FILE_SIZE1").value) {

			// create progress bar
			var o = $id("progress2");
			
			//var progress = o.appendChild(document.createElement("p"));
			//progress.appendChild(document.createTextNode("upload " + file.name));
			//var can = o.appendChild(document.createElement("a"));
			//can.appendChild(document.createTextNode("Cancel"));


			// progress bar
			xhr.upload.addEventListener("progress", function(e) {
				var pc = parseInt(100 - (e.loaded / e.total * 100));
				progress.style.backgroundPosition = pc + "% 0";
			}, false);

			// file received/failed
			xhr.onreadystatechange = function(e) {
				if (xhr.readyState == 4) {

					//$('#progress').addClass('hide').delay(800);
					$('.uploading-com2').append( "<span>" + file.name + "</span>");
					$('.up-size').append( "<span>" + Math.round(file.size/1048576) + " Mb</span>");
					var v_link = document.getElementById('video-link'); //or grab it by tagname etc
					v_link.href = "uploads/"+file.name;
					//$(".add-img").css("background-color", "transparent"); 
					progress.className = (xhr.status == 200 ? "success" : "failure");

				}
			};

			// start upload
			xhr.open("POST", $id("upload2").action, true);
			xhr.setRequestHeader("X_FILENAME", file.name);
			xhr.send(form_data);

		}

	}


	// initialize
	function Init() {

		var fileselect = $id("fileselect2"),
			filedrag = $id("filedrag2"),
			submitbutton = $id("submitbutton2");

		// file select
		fileselect.addEventListener("change", FileSelectHandler, false);
		

		// is XHR2 available?
		var xhr = new XMLHttpRequest();
		if (xhr.upload) {

			// file drop
//			filedrag.addEventListener("dragover", FileDragHover, false);
//			filedrag.addEventListener("dragleave", FileDragHover, false);
//			filedrag.addEventListener("drop", FileSelectHandler, false);
//			filedrag.style.display = "block";

			// remove submit button
			//submitbutton.style.display = "none";
		}

		return false;

	}



	// call initialization file
	if (window.File && window.FileList && window.FileReader) {
		Init();
	}

	document.getElementById("fileselect2").onchange = function() {
    	//document.getElementById("upload").submit();
    	
    	return false;
	};

	$('#upload2').on('submit', function(e){
		return false;
	});

	/*$('.button.cancel').click(function (e) {
    	xhr.abort();
	});*/
})();



