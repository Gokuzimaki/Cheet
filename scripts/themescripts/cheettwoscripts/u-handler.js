
$(document).ready(function(){
	"use strict";
	$("#fileselect").filestyle({
			input: 	false,
			buttonText:"Add Thumbnail",
			iconName:"glyphicon glyphicon-plus",
			badge: false
		});

		$("#fileselect1").filestyle({
			input: 	false,
			buttonText:"Uploaded by Admin",
			iconName:"glyphicon glyphicon-download-alt",
			badge: false
		});
		$("#fileselect2").filestyle({
			input: 	false,
			buttonText:"Add Video",
			iconName:"video-icon",
			badge: false
		});
	/*$('.course-option a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
		    
	});*/
	$('#close').on("click", function(){
		$('.uploading-com').remove();
	});


	//panelOne delete
	$("#u1").on("click", function(){

		var r = confirm("Press OK to delete!");
		if (r == true) {
		    //txt = "You pressed OK!";
		    $("#panel1").hide("slow", function(){
				$(this).remove();
			});
		} else {
		    //txt = "You pressed Cancel!";
		}
	});
	//panelTwo delete
	$("#u2").on("click", function(){
		var r = confirm("Press OK to delete!");
		if (r == true) {
		    //txt = "You pressed OK!";
		    $("#panel2").hide("slow", function(){
				$(this).remove();
			});
		} else {
		    //txt = "You pressed Cancel!";
		}
	});
	//panelThree delete
	$("#u3").on("click", function(){
		var r = confirm("Press OK to delete!");
		if (r == true) {
		    //txt = "You pressed OK!";
		    $("#panel3").hide("slow", function(){
				$(this).remove();
			});
		} else {
		    //txt = "You pressed Cancel!";
		}
	});
	//del button
	$("#del-v").on("click", function(){
		var r = confirm("Press OK to delete!");
		if (r == true) {
		    //txt = "You pressed OK!";
		    $("#panel2").hide("slow", function(){
				$(this).remove();
			});
		} else {
		    //txt = "You pressed Cancel!";
		}
	});

	// Add more Questions

	$("#add-new-button").on("click", function(){
		$("#add-more-questions").append('<div class="form-group clearfix"><div class="col-md-9 no-padding ask-question col-sm-8"><input type="text" class="form-control" placeholder="Question 1 Goes Here"></div><div class="col-md-3 no-padding col-sm-4"><input type="text" class="form-control" placeholder="Type Score"></div></div><div class="form-group clearfix"><div class="col-md-9 no-padding ask-question col-sm-8"><input type="text" class="form-control" placeholder="Question 2 Goes Here"></div><div class="col-md-3 no-padding col-sm-4"><input type="text" class="form-control" placeholder="Type Score"></div></div>');
	});
	$('#add-q-o').on("click", function(){
		$("#add-q-c").append('<ul class="assign-tile clearfix"><li class="col-md-3 col-sm-3 no-padding"><span class="f-lato text-bold dark-purple medium-text">Eva F. Knox</span></li><li class="col-md-3 col-sm-3 no-padding"><span class="f-lato text-bold dark-purple medium-text">Grades</span></li><li class="col-md-4 col-sm-4 no-padding"><span class="f-lato text-bold dark-purple medium-text">Where can I get memorabilia and...</span></li><li class="assign-edit col-md-2 col-sm-2 no-padding text-right"><a href="#"><i class="fa fa-pencil"></i></a><a href="javascript:"><i class="fa fa-trash-o"></i></a></li></ul>');
	});
	$('#add-q-c ul.assign-tile li.assign-edit a i.fa.fa-trash-o').on('click', function(){
		var r = confirm("Press OK to delete!");
		if (r == true) {
		    //txt = "You pressed OK!";
		    $(this).closest('ul.assign-tile').hide("slow", function(){
				$(this).remove();
			});
		} else {
		    //txt = "You pressed Cancel!";
		}
	});
	// adding more assignments
	$('#add-ass').on('click', function(){
		var n = $('#add-ass-c > div.assign-tile').length;
		n++;
		$('#add-ass-c').append('<div class="assign-tile clearfix"><div class="assign-title pull-left"><h6 class="f-lato text-bold text-orange">' +n+'</h6><p class="medium-text text-bold">Add your question...</p><input type="hidden" name="hiddenField" /></div><div class="assign-edit pull-right"><a href="javascript:"><i class="fa fa-pencil"></i></a><a href="#"><i class="fa fa-expand"></i></a><a href="#"><i class="fa fa-trash-o"></i></a></div></div>');
	});
	//Remove assignment
	$('#assignment .assign-area .assign-tile .assign-edit a > i.fa.fa-trash-o').on('click', function(){
		var r = confirm("Press OK to delete!");
		if (r == true) {
		    //txt = "You pressed OK!";
		    $(this).closest('#add-ass-c > div.assign-tile').hide("slow", function(){
				$(this).remove();
			});
		} else {
		    //txt = "You pressed Cancel!";
		}
	});

	// editing assignment

	$.fn.inlineEdit = function(replaceWith, connectWith) {
		"use strict";
	    $(this).hover(function() {
	        $(this).addClass('hover');
	    }, function() {
	        $(this).removeClass('hover');
	    });

	    $(this).click(function() {

	        var elem = $(this);

	        elem.hide();
	        elem.after(replaceWith);
	        replaceWith.focus();

	        replaceWith.blur(function() {

	            if ($(this).val() != "") {
	                connectWith.val($(this).val()).change();
	                elem.text($(this).val());
	            }

	            $(this).remove();
	            elem.show();
	        });
	    });
	};

	var replaceWith = $('<input name="temp" type="text" />'),
    connectWith = $('input[name="hiddenField"]');
	$('#add-ass-c > div.assign-tile > div.assign-title > p').inlineEdit(replaceWith, connectWith);

	$('#add-ass-c .assign-edit a:first-child').on('click', function(e){
		var prev_div = $(this).parent().prev().find('p');
		prev_div.trigger('click');
	});
	
});
// Google Map
