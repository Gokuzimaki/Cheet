function downloadPdf(el) {
    var iframe = document.createElement("iframe");
    iframe.src = "./snippets/download.php?id=1";
    iframe.onload = function() {
        // iframe has finished loading, download has started
        el.innerHTML = "Download";
    }
    iframe.style.display = "none";
    document.body.appendChild(iframe);
}
$(document).ready(function(){
	hideBind("div[name=closepromholdmoredata]",".promholdmoredata","fadeOut",500,"","");
	hideBind("div[name=closefullcontenthold]","#fullbackground","fadeOut",1000,"","");
	hideBind("div[name=closefullcontenthold]","#fullcontenthold","fadeOut",1000,"","");
	hideBind("div[name=closefullcontenthold]","#fullcontent","html",1000,"","");
	hideBind("div[name=closefullcontenthold]","#fullcontentheader","html",1000,"","");
	hideBind("div[name=closefullcontenthold]","#fullcontentdetails","html",1000,"","");
	hideBind("div[name=closefullcontenthold]","#fullcontentheader","fadeOut",1000,"","");
	hideBind("div[name=closefullcontenthold]","#fullcontentdetails","fadeOut",1000,"","");
	hideBind("div[name=closefullcontenthold]","#fullcontentpointerhold","fadeOut",1000,"","");
	hideBind("div[name=closefullcontenthold]",".fullbackground","fadeOut",1000,"","");
	hideBind("div[name=closefullcontenthold]",".fullcontenthold","fadeOut",1000,"","");
	hideBind("div[name=closefullcontenthold]",".fullcontent","html",1000,"","");
	hideBind("div[name=closefullcontenthold]",".fullcontentheader","html",1000,"","");
	hideBind("div[name=closefullcontenthold]",".fullcontentdetails","html",1000,"","");
	hideBind("div[name=closefullcontenthold]",".fullcontentheader","fadeOut",1000,"","");
	hideBind("div[name=closefullcontenthold]",".fullcontentdetails","fadeOut",1000,"","");
	hideBind("div[name=closefullcontenthold]",".fullcontentpointerhold","fadeOut",1000,"","");
	$(document).on("click","#toppanelfixedright ul.fixedul li a",function(){
		var dataid=$(this).attr("data-id");
		var thepage=$(this).attr("href");

	})
	// var curpage=getPageName();
	$(document).on("click",".trenddatahold a",function(){
		var theid=$(this).attr("data-id");
		$('select[name=branchunits]').val(""+theid+"");
		var theparent=$(this).parent();
		// 		console.log($(this).parent(),theparent,);		
		$('.trenddatahold').removeClass("active");
		theparent.addClass("active");
		var thecontent=$('div[data-name=branchunit][data-id='+theid+']').html();
		var thetitle=$(this).find('span').html();
		thetitle='<div class="mediumheadertwo">'+thetitle+'</div>';
		thecontent=thetitle+thecontent;
		$('div[data-name=branchunitcontenthold]').html(thecontent);
		scrollToElement('div#About div.mainpagecontent','div.nobusiness','div[data-name=branchunitcontent]');
		console.log(thecontent);

	});
	$(document).on("click","select[name=branchunits]",function(){
		var theid=$(this).val();
		if(theid!=="undefined"&&theid!==""){

		// $('select[name=branchunits]').val(""+theid+"");
		var theparent=$('a[data-name=branchunit][data-id='+theid+']').parent();
		// 		console.log($(this).parent(),theparent,);		
		$('.trenddatahold').removeClass("active");
		theparent.addClass("active");
		var thecontent=$('div[data-name=branchunit][data-id='+theid+']').html();
		var thetitle=$('a[data-name=branchunit][data-id='+theid+']').find('span').html();
		thetitle='<div class="mediumheadertwo">'+thetitle+'</div>';
		thecontent=thetitle+thecontent;
		$('div[data-name=branchunitcontenthold]').html(thecontent);
		scrollToElement('div#About div.mainpagecontent','div.nobusiness','div[data-name=branchunitcontent]');
		// console.log(thecontent);

		}
	})

	$(document).on("click","#toppanelfixedright ul.fixedul li:not(li[data-name=more])",function(){
		// event.stopPropagation();
		var dataname=$(this).attr("data-name");
		console.log(dataname);
		$('#toppanelfixedright ul.fixedul li').removeClass("active");
		$('#toppanelfixedright ul.fixedul li[data-name='+dataname+']').addClass("active");
		$('#toppanelfixedright ul.fixedul li ul li[data-name='+dataname+']').addClass("active");
	});

	$(document).on("click","#toppanelfixedright ul.fixedul li:not(li[data-name=more]) a",function(){
		// event.stopPropagation();
		var dataname=$(this).attr("data-name");
		var dataid=$(this).attr("data-id");
		var control=Math.floor(dataid)-1;
		var curpg=100*control;
		$('div.mainhold').attr('data-state',"");
		$('div.mainhold[data-dataid='+dataid+']').attr('data-state',"active");
  		// $('.noclasscontent').css("top","-"+curpg+"%");
  		 $('.noclasscontent').animate({"top":"-"+curpg+"%"},500,"swing",function(){});

		// console.log(control,curpg,$('.noclasscontent'));
	});
	$(document).on("click","a[data-name=pagepointer]",function(){
		var dataname=$(this).attr("data-linkname");
		var dataid=$(this).attr("data-id");
		var control=Math.floor(dataid)-1;
		var curpg=100*control;
		if(curpg>0){
			
		}else{
			
		}
		$('div.mainhold').attr('data-state',"");
		$('div.mainhold[data-dataid='+dataid+']').attr('data-state',"active");
  		// $('.noclasscontent').css("top","-"+curpg+"%");
  		 $('.noclasscontent').animate({"top":"-"+curpg+"%"},500,"swing",function(){});
		$('#toppanelfixedright ul.fixedul li ul li').removeClass("active");
		$('#toppanelfixedright ul.fixedul li').removeClass("active");
		$('#toppanelfixedright ul.fixedul li[data-name='+dataname+']').addClass("active");
		$('#toppanelfixedright ul.fixedul li[data-name=more]').addClass("active");
		$('#toppanelfixedright ul.fixedul li ul li[data-name='+dataname+']').addClass("active");
		console.log(control,curpg,$('.noclasscontent'));		
	});
	/*$(document).on("swipeup","div.mainhold",function(){
		var dataname=$(this).attr("data-linkname");
		var dataid=$(this).attr("data-dataid");
		var control=Math.floor(dataid);
		control>7?control=7:control=control;
		var curpg=100*control;
		$('div.mainhold').attr('data-state',"");
		$(this).attr('data-state',"active");
  		// $('.noclasscontent').css("top","-"+curpg+"%");
  		 $('.noclasscontent').animate({"top":"-"+curpg+"%"},500,"swing",function(){});
		$('#toppanelfixedright ul.fixedul li ul li').removeClass("active");
		$('#toppanelfixedright ul.fixedul li').removeClass("active");
		$('#toppanelfixedright ul.fixedul li[data-name='+dataname+']').addClass("active");
		$('#toppanelfixedright ul.fixedul li[data-name=more]').addClass("active");
		$('#toppanelfixedright ul.fixedul li ul li[data-name='+dataname+']').addClass("active");
		console.log("up",dataid,control,curpg,$('.noclasscontent'));		
	})
	$('.mainpagecontent').tap(function(event){
		event.stopPropagation();
	})
	$(document).on("swipedown","div.mainhold",function(){
		var dataname=$(this).attr("data-linkname");
		var dataid=$(this).attr("data-dataid");
		var control=Math.floor(dataid)-2;
		control<0?control=0:control=control;
		var curpg=100*control;
		$('div.mainhold').attr('data-state',"");
		$(this).attr('data-state',"active");
  		// $('.noclasscontent').css("top","-"+curpg+"%");
  		 $('.noclasscontent').animate({"top":"-"+curpg+"%"},500,"swing",function(){});
		$('#toppanelfixedright ul.fixedul li ul li').removeClass("active");
		$('#toppanelfixedright ul.fixedul li').removeClass("active");
		$('#toppanelfixedright ul.fixedul li[data-name='+dataname+']').addClass("active");
		$('#toppanelfixedright ul.fixedul li[data-name=more]').addClass("active");
		$('#toppanelfixedright ul.fixedul li ul li[data-name='+dataname+']').addClass("active");
		console.log('down',dataid,control,curpg,$('.noclasscontent'));		
	})*/
	$(document).on("click","a[data-type=fixednav]",function(){

	});
	$(document).on("click","#toppanelfixedright ul.fixedul li ul li",function(){
		event.stopPropagation();
		var dataname=$(this).attr("data-name");
		console.log(dataname);
		// $('#toppanelfixedright ul.fixedul li').removeClass("active");
		$('#toppanelfixedright ul.fixedul li ul li').removeClass("active");
		$('#toppanelfixedright ul.fixedul li[data-name='+dataname+']').addClass("active");
		$('#toppanelfixedright ul.fixedul li[data-name=more]').addClass("active");
		$('#toppanelfixedright ul.fixedul li ul li[data-name='+dataname+']').addClass("active");
	});
// if(curpage=="index"||curpage==""){  
 // $("#maintwo").onepage_scroll();
// $('.main').jScrollPane();
var lastScrollTop = 0;
$(window).scroll(function(event){
   var st = $(this).scrollTop();
  var windowheight=$(window).height();

	// console.log(windowheight);

   if (st > lastScrollTop){
       // downscroll code
       	// console.log(windowheight,"downscroll");

   // $('body').animate({scrollTop:"+="+windowheight+""},'slow',function(){});
   } else {
      // upscroll code
             	// console.log(windowheight,"downscroll");

         // $('body').animate({scrollTop:"-="+windowheight+""},'slow',function(){});
	}

   lastScrollTop = st;
});
// }
$(document).on("click","a[data-name=prevbutton]",function(){
	var theid=$(this).attr("data-id");
	var image=$('input[name=promdatacontent][data-id='+theid+']').attr("data-image");
	var content=$('input[name=promdatacontent][data-id='+theid+']').attr("data-content");	
	var title=$('input[name=promdatacontent][data-id='+theid+']').attr("data-title");	
	var maxside=$('input[name=promdatacontent][data-id='+theid+']').attr("data-maxside");	
	$('div.promholdmoredata').hide();
	var outmarkup='<div class="promholdmoredataimg"><img src="'+image+'" style="'+maxside+':100%;"></div>'+
'<p class="promholdmoredatahead">'+title+'</p>'+ 
'<p class="promholdmoredatatext">'+content+'</p>'; 
$('div.promholdmoredata .promholdmoredatacontent').html(outmarkup);
	$('div.promholdmoredata').show(500,function(){

// scrollToElement('div.mainhold[id=index] div.mainpagecontent','div.nobusiness','div.promholdmoredata');
	});

})
$('.stars').each(function(){
	$('.stars').raty({
		readOnly: true,
		space: false,
	  score: function() {
	    return $(this).attr('data-score');
	  }
	});
	// console.log($(document).raty());
});

$(document).on("click","a[name=mediagallerydisplay]",function(){
	var appdatatype=$(this).attr("appdata-type");
	var appdataid=$(this).attr("appdata-id");
	// $('a[name=portmediacontent][appdata-id='+appdataid+']').removeClass("activemediacontrol");
	// $(this).addClass("activemediacontrol");
		$('.fullcontent img[name=fullcontentwait]').show();
		// var gallery_name=$('input[name=bloggallerydata]').attr('title');
		var gallery_name="";
		// var gallery_details=$('input[name=bloggallerydata]').attr('data-details');
		var posterpoint=0;
		var galleryimgsrcsarray=new Array();
		var galleryimgsizesarray=new Array();
		var galid=$(this).attr("appdata-galid");
		var galname=$(this).attr("appdata-tdata");
		galname==""||typeof(galname)=="undefined"?galname="gallerydata":galname=galname;
		console.log($('input[name='+galname+''+galid+']'),'input[name='+galname+''+galid+']');
		var galleryimgsrcs=$('input[name='+galname+''+galid+']').attr('data-images');
		var galleryimgsizes=$('input[name='+galname+''+galid+']').attr('data-sizes');
		var galleryimgsrcsarray=galleryimgsrcs.split(">");
		var galleryimgsizesarray=galleryimgsizes.split("|");
		var posterimg=galleryimgsrcsarray[posterpoint];
		// for the caption and details of the image

		var gallerycaptions=$('input[name='+galname+''+galid+']').attr('data-caption');
		var galleryimgdetails=$('input[name='+galname+''+galid+']').attr('data-imgdetails');
		typeof(gallerycaptions)=="undefined"?gallerycaptions="":gallerycaptions=gallerycaptions;
		typeof(galleryimgdetails)=="undefined"?galleryimgdetails="":galleryimgdetails=galleryimgdetails;
		var gallerycaptionsarray=gallerycaptions.split(">");
		var galleryimgdetailsarray=galleryimgdetails.split("|");
		var postercaption="";
		gallerycaptions!==""?postercaption=gallerycaptionsarray[posterpoint]:postercaption="";
		var posterimgdetails="";
		galleryimgdetails!==""?posterimgdetails=galleryimgdetailsarray[posterpoint]:posterimgdetails="";
		// end
		var gallerydata="";
		var gallerytotal=galleryimgsrcsarray.length-1;
		gallery_name+='<input type="hidden" name="gallerycount" value="'+gallerytotal+'"/><input type="hidden" name="currentgalleryview" value="'+posterpoint+'"/><input type="hidden" name="curgallerydata" data-images="'+galleryimgsrcs+'" data-sizes="'+galleryimgsizes+'" data-galleryname="'+galname+'" data-caption="'+gallerycaptions+'" data-imgdetails="'+galleryimgdetails+'" value="'+galid+'"/>'+postercaption;

		if(galleryimgsrcsarray.length>1){
		for(var i=0;i<galleryimgsrcsarray.length;i++){
		// console.log(galleryimgsrcsarray[i],galleryimgsizesarray[i],posterimg);
		}
		var prevpoint=Math.floor(posterpoint)-1;
		var nextpoint=Math.floor(posterpoint)+1;
		prevpoint<0?prevpoint=0:prevpoint=prevpoint;
		console.log(prevpoint,nextpoint);
		nextpoint>=galleryimgsrcsarray.length?nextpoint=galleryimgsrcsarray.length-1:nextpoint=nextpoint;
		$('img[name=pointleft]').attr("data-point",""+prevpoint+"");
		$('img[name=pointright]').attr("data-point",""+nextpoint+"");
		}
		var cursize=galleryimgsizesarray[posterpoint].split(',');
		var imgwidth=Math.floor(cursize[0]);
		var imgheight=Math.floor(cursize[1]);
		var contwidth=$('.fullcontent').width();
		var contheight=$('.fullcontent').height();
		contwidth=Math.floor(contwidth);
		contheight=Math.floor(contheight);
		var outs= new Array();
		var windowwidth=$(window).width();
		 var ninesixty=960;
		 if(Math.floor(windowwidth)<960){
		  ninesixty=windowwidth;
		  
		 }
		outs=produceImageFitSize(imgwidth,imgheight,ninesixty,700,"off");
		var firstcontent='<div id="closecontainer" name="closefullcontenthold" data-id="theid" class="altcloseposfour"><img src="'+host_addr+'images/closefirst.png" title="Close"class="total"/></div>'+
		'<img src="'+posterimg+'" name="galleryimgdisplay" style="'+outs['style']+'" title=""/>'+
		'<img src="'+host_addr+'images/waiting.gif" name="fullcontentwait" style="margin-top:285px;margin-left:428px;z-index:80;">'
		;
		$('.fullcontent').html(""+firstcontent+"");
		$('.fullcontentheader').html(gallery_name);
		$('.fullcontentdetails').html(posterimgdetails);
		var topdistance=$(window).scrollTop();
		// console.log(topdistance);
		if(topdistance>100){
		  var pointerpos=topdistance+100;
		$('.fullcontent').css("margin-top",""+topdistance+"px");
		$('.fullcontentpointerhold').css("margin-top",""+topdistance+"px");
		}else{
		$('.fullcontent').css("margin-top","0px");
		$('.fullcontentpointerhold').css("margin-top","0px");
		}

		$('.fullbackground').fadeIn(1000);
		$('.fullcontenthold').fadeIn(1000);
		$('.fullcontent').fadeIn(1000);
		$('.fullcontentheader').fadeIn(1000);
		$('.fullcontentdetails').fadeIn(1000);
		$('.fullcontentpointerhold').fadeIn(1000);
		$('img[name=galleryimgdisplay]').load(function(){
		$('.fullcontent img[name=fullcontentwait]').hide();
		});	
	
});

$('.fullcontenthold img[name=pointleft]').on("click",function(){
var totalcount=$('.fullcontentheader input[name=gallerycount]').attr("value");
var currentview= $('.fullcontentheader input[name=currentgalleryview]').attr("value");
var galleryimgsrcsarray=new Array();
var galleryimgsizesarray=new Array();
var galleryimgsrcs=$('.fullcontentheader input[name=curgallerydata]').attr('data-images');
var galleryimgsizes=$('.fullcontentheader input[name=curgallerydata]').attr('data-sizes');
var galname=$('.fullcontentheader input[name=curgallerydata]').attr('data-galleryname');
var galid=$('.fullcontentheader input[name=curgallerydata]').attr('value');
galname==""||typeof(galname)=="undefined"?galname="gallerydata":galname=galname;
galleryimgsrcsarray=galleryimgsrcs.split(">");
galleryimgsizesarray=galleryimgsizes.split("|");
var gallery_name="";
// for the caption and details of the image
var gallerycaptions=$('input[name='+galname+''+galid+']').attr('data-caption');
var galleryimgdetails=$('input[name='+galname+''+galid+']').attr('data-imgdetails');
typeof(gallerycaptions)=="undefined"?gallerycaptions="":gallerycaptions=gallerycaptions;
typeof(galleryimgdetails)=="undefined"?galleryimgdetails="":galleryimgdetails=galleryimgdetails;
var gallerycaptionsarray=gallerycaptions.split(">");
var galleryimgdetailsarray=galleryimgdetails.split("|");

// end
// gallery caption details initialization
var postercaption="";
var posterimgdetails="";
// end
var nextview;
console.log(currentview,totalcount);
if(Math.floor(currentview)<=Math.floor(totalcount)){
nextview=Math.floor(currentview)-1;
console.log(nextview);
//nextview works in array index format meaning 0 holds a valid position
if(nextview>-1&&nextview<=totalcount){
  $('.fullcontent img[name=fullcontentwait]').show();
  $('div.fullcontent img[name=galleryimgdisplay]').attr("src","").hide();
var nextimg=galleryimgsrcsarray[nextview];
console.log(nextview,nextimg);
var cursize=galleryimgsizesarray[nextview].split(',');
// update the caption of incoming image
gallerycaptions!==""?postercaption=gallerycaptionsarray[nextview]:postercaption="";
galleryimgdetails!==""?posterimgdetails=galleryimgdetailsarray[nextview]:posterimgdetails="";
// end 
var imgwidth=Math.floor(cursize[0]);
var imgheight=Math.floor(cursize[1]);
var contwidth=$('.fullcontent').width();
var contheight=$('.fullcontent').height();
contwidth=Math.floor(contwidth);
contheight=Math.floor(contheight);
var outs= new Array();
gallery_name+='<input type="hidden" name="gallerycount" value="'+totalcount+'"/><input type="hidden" name="currentgalleryview" value="'+nextview+'"/><input type="hidden" name="curgallerydata" data-images="'+galleryimgsrcs+'" data-sizes="'+galleryimgsizes+'" data-galleryname="'+galname+'" data-captions="'+gallerycaptions+'" data-imgdetails="'+galleryimgdetails+'" value="'+galid+'"/>'+postercaption;

 var windowwidth=$(window).width();
var ninesixty=960; 
 if(Math.floor(windowwidth)<960){
  ninesixty=windowwidth;
  
 }
outs=produceImageFitSize(imgwidth,imgheight,ninesixty,700,"off");

$('.fullcontent img[name=galleryimgdisplay]').attr({"src":""+nextimg+"","style":""+outs['style']+""}).load(function(){
$(this).fadeIn(1000);
$('.fullcontent img[name=fullcontentwait]').hide();
});
$('.fullcontentheader').html(gallery_name);
$('.fullcontentdetails').html(posterimgdetails);
$('.fullcontentheader input[name=currentgalleryview]').attr("value",""+nextview+"");
}
}
});

$('.fullcontentpointerright img[name=pointright]').on("click",function(){
var totalcount=Math.floor($('.fullcontentheader input[name=gallerycount]').attr("value"));
var currentview=Math.floor($('.fullcontentheader input[name=currentgalleryview]').attr("value"));
var galleryimgsrcsarray=new Array();
var galleryimgsizesarray=new Array();
var galleryimgsrcs=$('.fullcontentheader input[name=curgallerydata]').attr('data-images');
var galleryimgsizes=$('.fullcontentheader input[name=curgallerydata]').attr('data-sizes');
galleryimgsrcsarray=galleryimgsrcs.split(">");
galleryimgsizesarray=galleryimgsizes.split("|");
var galname=$('.fullcontentheader input[name=curgallerydata]').attr('data-galleryname');
var galid=$('.fullcontentheader input[name=curgallerydata]').attr('value');
galname==""||typeof(galname)=="undefined"?galname="gallerydata":galname=galname;
galleryimgsrcsarray=galleryimgsrcs.split(">");
galleryimgsizesarray=galleryimgsizes.split("|");
var gallery_name="";
// for the caption and details of the image
var gallerycaptions=$('input[name='+galname+''+galid+']').attr('data-caption');
var galleryimgdetails=$('input[name='+galname+''+galid+']').attr('data-imgdetails');
typeof(gallerycaptions)=="undefined"?gallerycaptions="":gallerycaptions=gallerycaptions;
typeof(galleryimgdetails)=="undefined"?galleryimgdetails="":galleryimgdetails=galleryimgdetails;
var gallerycaptionsarray=gallerycaptions.split(">");
var galleryimgdetailsarray=galleryimgdetails.split("|");

// end
// gallery caption details initialization
var postercaption="";
var posterimgdetails="";
// end
var nextview=Math.floor(currentview);
console.log($(this).attr("name"),totalcount);
if(currentview<=totalcount){
nextview=Math.floor(currentview)+1;
//nextview works in array index format meaning 0 holds a valid position
if(nextview>-1&&nextview<=totalcount){
$('.fullcontent img[name=fullcontentwait]').show();
$('div.fullcontent img[name=galleryimgdisplay]').attr("src","").hide();
$('.fullcontent img[name=galleryimgdisplay]').attr({"src":""+host_addr+"images/waiting.gif","style":"margin-top:285px;margin-left:428px;"});
var nextimg=galleryimgsrcsarray[nextview];
console.log(nextview,nextimg,totalcount);
var cursize=galleryimgsizesarray[nextview].split(',');
// update the caption of incoming image
gallerycaptions!==""?postercaption=gallerycaptionsarray[nextview]:postercaption="";
galleryimgdetails!==""?posterimgdetails=galleryimgdetailsarray[nextview]:posterimgdetails="";
// end 
var imgwidth=Math.floor(cursize[0]);
var imgheight=Math.floor(cursize[1]);
var contwidth=$('.fullcontent').width();
var contheight=$('.fullcontent').height();
contwidth=Math.floor(contwidth);
contheight=Math.floor(contheight);
gallery_name+='<input type="hidden" name="gallerycount" value="'+totalcount+'"/><input type="hidden" name="currentgalleryview" value="'+nextview+'"/><input type="hidden" name="curgallerydata" data-images="'+galleryimgsrcs+'" data-sizes="'+galleryimgsizes+'" data-galleryname="'+galname+'" data-captions="'+gallerycaptions+'" data-imgdetails="'+galleryimgdetails+'" value="'+galid+'"/>'+postercaption;
var outs= new Array();
 var windowwidth=$(window).width();
var ninesixty=960;
 if(Math.floor(windowwidth)<960){
  ninesixty=windowwidth;
  
 }
outs=produceImageFitSize(imgwidth,imgheight,ninesixty,700,"off");
$('.fullcontent img[name=galleryimgdisplay]').attr({"src":""+nextimg+"","style":""+outs['style']+""}).load(function(){
$('.fullcontent img[name=fullcontentwait]').hide();
$(this).fadeIn(1000);
});
$('.fullcontentheader').html(gallery_name);
$('.fullcontentdetails').html(posterimgdetails);
$('.fullcontentheader input[name=currentgalleryview]').attr("value",""+nextview+"");
}
}

});	

$(document).on("click",".lms_search_ajax_display a.close_ajax_search",function(){
	$(this).parent().fadeOut(500);
	// console.log(this);
});

});