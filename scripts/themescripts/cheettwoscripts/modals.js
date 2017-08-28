$(document).ready(function(){
	"use strict";
	$('.panel-body > .clearfix > ul > li > a').on('click', function(){
		$('body').addClass('modal-window');
	});
	$('.panel-body > div.clearfix > ul > li > a').on('click', function(){
		$.featherlight('#submission', {
			otherClose:     "#submission #closed",
			afterClose: function() {
				console.log('test');
				$('body').removeClass('modal-window');
			}
		});
	});
	$('#pre-modal').trigger("click");
});