function searchComment(blogid){
  var searchval=$('input[name=minisearch'+blogid+']').val(); 
  var presentcontent=searchval.replace(/\s\s*/g,"");
  if(searchval!==""&&presentcontent!==""){
    searchval=="*fullcommentsview*"?searchval="gwolcomments":searchval=searchval;
    console.log(searchval,presentcontent);
    var searchcomreq=new Request();
    searchcomreq.generate('div#formend div[name=commentfullhold'+blogid+']',true);
    //enter the url
    searchcomreq.url('../snippets/display.php?displaytype=searchcomments&searchval='+searchval+'&blogid='+blogid+'&extraval=admin');
    //send request
    searchcomreq.opensend('GET');
    //update dom when finished, takes four params targetElement,entryType,entryEffect,period
    searchcomreq.update('div#formend div[name=commentfullhold'+blogid+']','html','fadeIn',1000);
  }
}
$(document).ready(function(){
hideBind("div[name=closefullcontenthold]","#fullbackground","fadeOut",1000,"","");
hideBind("div[name=closefullcontenthold]","#fullcontenthold","fadeOut",1000,"","");
hideBind("div[name=closefullcontenthold]","#fullcontent","html",1000,"","");
hideBind("div[name=closefullcontenthold]","#fullcontentheader","html",1000,"","");
hideBind("div[name=closefullcontenthold]","#fullcontentdetails","html",1000,"","");
hideBind("div[name=closefullcontenthold]","#fullcontentheader","fadeOut",1000,"","");
hideBind("div[name=closefullcontenthold]","#fullcontentdetails","fadeOut",1000,"","");
hideBind("div[name=closefullcontenthold]","#fullcontentpointerhold","fadeOut",1000,"","");
$('div[name=closefullcontenthold]').on("click",function(){
$('#fullcontent').attr("style","");
});
  
/*$(document).on("click","div#menulinkcontainer a[data-type=mainlink]",function(){
var linkname=$(this).attr("data-name");
$('div#contentdisplayhold').html(help[''+linkname+'']);
});*/
$(document).on("blur","select[name=editblogcategory]",function(){
var theval=$(this).val();
// console.log(theval);
if(theval!==""){
  var editcatreq=new Request();
  editcatreq.generate('#contentdisplayhold,section.content',true);
  //enter the url
  var url='../snippets/display.php?displaytype=editblogcategorymain&blogtypeid='+theval+'&extraval=admin';
  editcatreq.url('../snippets/display.php?displaytype=editblogcategorymain&blogtypeid='+theval+'&extraval=admin');
  //send request
  editcatreq.opensend('GET');
  //update dom when finished, takes four params targetElement,entryType,entryEffect,period
  editcatreq.update('div#contentdisplayhold,section.content','html','fadeIn',1000);
}else{
  
}

});
$(document).on("click","div#menulinkcontainer a[data-type=sublink]",function(){
var linkname=$(this).attr("data-name");
//$('div#contentdisplayhold').html(help[''+linkname+'']);
var sublinkreq=new Request();
  sublinkreq.generate('#contentdisplayhold,section.content',true);
  //enter the url
  sublinkreq.url('../snippets/display.php?displaytype='+linkname+'&extraval=admin');
  //send request
  sublinkreq.opensend('GET');
  //update dom when finished, takes four params targetElement,entryType,entryEffect,period
  sublinkreq.update('div#contentdisplayhold,section.content','html','fadeIn',1000);
});

$(document).on("change","select[name=blogtypeid]",function(){
  var theid=$(this).val();
  var parent=$(this).parent().parent().parent().parent();
  
  var target=parent.find('select[name=blogcategoryid]');
  var item_loader=target.parent().find('.loadermask');
  // console.log("target: ",target," loader: ",item_loader);
  item_loader.removeClass('hidden');
  if(theid==""){
    target.val("");
    target.html("<option value=''>--Choose a Blog Type First--</option>");
    target.select2({
      theme:'bootstrap',
      placeholder: '--Choose a Blog Type First--'
    });
    item_loader.addClass('hidden');
  }
  // send ajax request to verify email existing in database
  var url = '' + host_addr + 'snippets/display.php';
  var opts = { 
      type: 'GET',
      url: url,
      data: {
          displaytype: 'getblogcategories',
          blogtypeid: theid,
          retval: "json",
          extraval: "admin"
      },
      // dataType: 'json',
      success: function(output) {
          // console.log(endtarget);
          console.log(output);
          // item_loader.className += ' hidden';
          item_loader.addClass('hidden');
          target.html(output);
          // item_loader.remove();
          /*if (output.success == "true") {
            
          }else if(output.success == "false"){
            console.log(output);
          }
          target.val("");
          target.select2({
            theme:'bootstrap',
            placeholder: '--Choose a Blog Type First--'
          });*/
      },
      error: function(error) {
          if (typeof (error) == "object") {
              console.log(error.responseText);
          }else{
              console.log("Error: ",error);
          }
          var errmsg = "Sorry, something went wrong, possibl&&&& your internet connect is inactive, we apologise if this is from our end. Try the action again";
          // item_loader.remove();
          item_loader.addClass('hidden');
          // item_loader.className += ' hidden';
          raiseMainModal('Failure!!', '' + errmsg + '', 'fail');
          // alert("Sorry, something went wrong, possibly your internet connect is inactive, we apologise if this is from our end. Try the action again ");
      }
  };
  // console.log("In here");
  if(theid>0){
    $.ajax(opts);
  } else{
    item_loader.addClass('hidden');

  } 
});

// this section controls the population of courses in the 'course'
// selection box when creating questions for them from the question 
// groups
$(document).on("change","select[name=qgroupset]",function(){
  var theid=$(this).val();
  var parent=$(this).parent().parent().parent().parent();
  
  var target=parent.find('select[name=course]');
  var item_loader=target.parent().find('.loadermask');
  // console.log("target: ",target," loader: ",item_loader);
  item_loader.removeClass('hidden');
  if(theid==""){
    target.val("");
    target.html("<option value=''>--Choose a Question Group First--</option>");
    target.select2({
      theme:'bootstrap',
      placeholder: '--Choose a Question Group First--'
    });
    item_loader.addClass('hidden');
  }
  // send ajax request to verify email existing in database
  var url = '' + host_addr + 'snippets/display.php';
  var opts = { 
      type: 'GET',
      url: url,
      data: {
          displaytype: 'getqgroupcourses',
          tid: theid,
          retval: "json",
          extraval: "admin"
      },
      // dataType: 'json',
      success: function(output) {
          // console.log(endtarget);
          console.log(output);
          // item_loader.className += ' hidden';
          item_loader.addClass('hidden');
          target.html(output);
          /*target.val("");
          // item_loader.remove();
          if (output.success == "true") {
            
          }else if(output.success == "false"){
            console.log(output);
          }*/
          target.val("");
          target.select2({
            theme:'bootstrap',
            placeholder: '--Choose a Question Group First--'
          });
      },
      error: function(error) {
          if (typeof (error) == "object") {
              console.log(error.responseText);
          }else{
              console.log("Error: ",error);
          }
          var errmsg = "Sorry, something went wrong, possibly your internet connect is inactive, we apologise if this is from our end. Try the action again";
          // item_loader.remove();
          item_loader.addClass('hidden');
          // item_loader.className += ' hidden';
          raiseMainModal('Failure!!', '' + errmsg + '', 'fail');
          // alert("Sorry, something went wrong, possibly your internet connect is inactive, we apologise if this is from our end. Try the action again ");
      }
  };
  // console.log("In here");
  if(theid>0){
    $.ajax(opts);
  } else{
    item_loader.addClass('hidden');

  } 
});


// this section controls the question data entry form types
$(document).on("blur","select[name=qdatatype]",function(){
  var cval=$(this).val();
  var par=$(this).parent().parent().parent().parent();
  par.find('._qdsection').addClass("hidden");
  par.find('.q'+cval+'data').removeClass("hidden");
  
});





$(document).on("click","input[data-type=submitcrt]",function(){
      // console.log(this);
      var formname='div[name='+this.name+']';
      
      var displaytype=$(this).attr("name");

      var datamap=$(''+formname+' input[name=datamap]').val();

      

      var cursmap=JSON.parse(datamap.replace(/'{1,}/g,'"'));

      // ensure to attach the '_crt' to any custom viewtype you want in your 
      // map to allow the system function accurately with it
      if(displaytype=="create"||displaytype=="edit"){
        cursmap.vt=displaytype;
      }else{
        cursmap.vt=displaytype+"_crt";
        
      }
      // only for the categroies section
      // proceed to add all data-crt elements present in the form to the cursmap
      // json object
      var tlen=$(''+formname+'').find('input[data-crt=true],select[data-crt=true],textarea[data-crt=true]').length;
      var tdata=$(''+formname+'').find('input[data-crt=true], select[data-crt=true], textarea[data-crt=true]');
      var str="";
      if(tlen>0){
        for(var i=0; i<tlen ; i++){
          var curdata=tdata.get(i);
          str+='cursmap.'+curdata.name+'=$("'+formname+' '+curdata.localName+'[name='+curdata.name+']").val();';
          // console.log(str);
        }
        eval(str);
      }

      var doajax="true";
      
      var datamap=JSON.stringify(cursmap);


      var renderpoint=$(''+formname+' div.renderpoint');
      var item_loader=$(''+formname+' div.loadmask');
      var target=$(''+formname+' div.renderpoint');
      item_loader.removeClass('hidden');

      // console.log("itemloader: ",item_loader);
      console.log("datamap: ",datamap);
      // send ajax request to verify email existing in database
      var url = '' + host_addr + 'snippets/display.php';
      var opts = {
          type: 'GET',
          url: url,
          data: {
              displaytype: "_gdunit",
              datamap: datamap,
              retval: "json",
              extraval: "admin"
          },
          dataType: 'json',
          success: function(output) {
              // console.log(endtarget);
              console.log(output);
              // item_loader.className += ' hidden';
              item_loader.addClass('hidden');
              // item_loader.remove();
              if (output.success == "true") {
                
                target.html(output.catdata);
              }else if(output.success == "false"){
                console.log(output);
                var errmsg = "Apologies, no results were found for you current request. Either no data exists or you have not provided necessary information to the application";
                raiseMainModal('Failure!!', '' + errmsg + '', 'fail');
                target.html("");
              }
          },
          error: function(error) {
              if (typeof (error) == "object") {
                  console.log(error.responseText);
              }else{
                  console.log("Error: ",error);
              }
              var errmsg = "Sorry, something went wrong, possibly your internet connect is inactive, we apologise if this is from our end. Try the action again";
              // item_loader.remove();
              item_loader.addClass('hidden');
              // item_loader.className += ' hidden';
              raiseMainModal('Failure!!', '' + errmsg + '', 'fail');
              // alert("Sorry, something went wrong, possibly your internet connect is inactive, we apologise if this is from our end. Try the action again ");
          }
      };
      if(doajax=="true"){
        $.ajax(opts);
        
      }else{
        item_loader.addClass('hidden');

      }

      // console.log("In here");
})



$(document).on("click","input[name=viewblogpostsoptional]",function(){
  var theid=$('select[name=blogtypeid]').val();
  var secondid=$('select[name=blogcategoryid]').val();
  var typeout=$('input[name=varianttype]').val();
  if(typeout==""||typeout=="undefined"){
    typeout="viewblogposts";
  }
  if(theid!==""){
  var blogpostreq=new Request();
    blogpostreq.generate('#contentdisplayhold,section.content',false);
    //enter the url
    blogpostreq.url('../snippets/display.php?displaytype=viewblogpostsoptional&blogtypeid='+theid+'&blogcategoryid='+secondid+'&extraval='+typeout+'');
    //send request
    blogpostreq.opensend('GET');
    //update dom when finished, takes four params targetElement,entryType,entryEffect,period
    blogpostreq.update('div#contentdisplayhold,section.content','html','fadeIn',1000);

  }else{
    
  }
});

$(document).on("click","input[name=viewsubscribers]",function(){

  var theid=$('select[name=blogtypeid]').val();
  var secondid=$('select[name=blogcategoryid]').val();
  if(theid!==""){
    var blogpostreq=new Request();
    blogpostreq.generate('#contentdisplayhold,section.content',false);
    //enter the url
    blogpostreq.url('../snippets/display.php?displaytype=viewsubscribers&blogtypeid='+theid+'&blogcategoryid='+secondid+'&extraval=admin');
    //send request
    blogpostreq.opensend('GET');
    //update dom when finished, takes four params targetElement,entryType,entryEffect,period
    blogpostreq.update('div#contentdisplayhold,section.content','html','fadeIn',1000);

  }else{
    
  }
});
$(document).on("click","input[name=viewqotd]",function(){

var theid=$('select[name=qotdcat]').val();
// var secondid=$('select[name=blogcategoryid]').val();
if(theid!==""){
var qotdcatreq=new Request();
  qotdcatreq.generate('#contentdisplayhold,section.content',false);
  //enter the url
  qotdcatreq.url('../snippets/display.php?displaytype=viewqotd&qotdcat='+theid+'&extraval=admin');
  //send request
  qotdcatreq.opensend('GET');
  //update dom when finished, takes four params targetElement,entryType,entryEffect,period
  qotdcatreq.update('div#contentdisplayhold,section.content','html','fadeIn',1000);
}else{
  
}
});
$(document).on("click","input[name=viewadverts]",function(){
var theid=$('select[name=advertcat]').val();
// var secondid=$('select[name=blogcategoryid]').val();
if(theid!==""){
var advertscatreq=new Request();
  advertscatreq.generate('#contentdisplayhold,section.content',false);
  //enter the url
  advertscatreq.url('../snippets/display.php?displaytype=viewadverts&advertcat='+theid+'&extraval=admin');
  //send request
  advertscatreq.opensend('GET');
  //update dom when finished, takes four params targetElement,entryType,entryEffect,period
  advertscatreq.update('div#contentdisplayhold,section.content','html','fadeIn',1000);
}else{

}
});

$(document).on("click","input[name=viewadverts]",function(){
var theid=$('select[name=advertcat]').val();
// var secondid=$('select[name=blogcategoryid]').val();
if(theid!==""){
var advertscatreq=new Request();
  advertscatreq.generate('#contentdisplayhold,section.content',false);
  //enter the url
  advertscatreq.url('../snippets/display.php?displaytype=viewadverts&advertcat='+theid+'&extraval=admin');
  //send request
  advertscatreq.opensend('GET');
  //update dom when finished, takes four params targetElement,entryType,entryEffect,period
  advertscatreq.update('div#contentdisplayhold,section.content','html','fadeIn',1000);
}else{

}
});
$(document).on("click","input[name=viewstores]",function(){
var theid=$('select[name=storecat]').val();
// var secondid=$('select[name=blogcategoryid]').val();
if(theid!==""){
var advertscatreq=new Request();
  advertscatreq.generate('#contentdisplayhold,section.content',true);
  //enter the url
  advertscatreq.url('../snippets/display.php?displaytype=viewstores&storecat='+theid+'&extraval=admin');
  //send request
  advertscatreq.opensend('GET');
  //update dom when finished, takes four params targetElement,entryType,entryEffect,period
  advertscatreq.update('div#contentdisplayhold,section.content','html','fadeIn',1000);
}else{

}
});
$(document).on("click","input[name=viewevent]",function(){
var theid=$('select[name=eventcat]').val();
// var secondid=$('select[name=blogcategoryid]').val();
if(theid!==""){
var eventcatreq=new Request();
  eventcatreq.generate('#contentdisplayhold,section.content',false);
  //enter the url
  eventcatreq.url('../snippets/display.php?displaytype=viewevent&eventcat='+theid+'&extraval=admin');
  //send request
  eventcatreq.opensend('GET');
  //update dom when finished, takes four params targetElement,entryType,entryEffect,period
  eventcatreq.update('div#contentdisplayhold,section.content','html','fadeIn',1000);

}else{
  
}
});
$(document).on("click","a[name=morecatposts]",function(){
var catid=$(this).attr("data-catid");
var nextid=$(this).attr("data-next");
if(nextid>0){
var blogcatpostreq=new Request();
  blogcatpostreq.generate('div[name=waitinghold]',true);
  //enter the url
  blogcatpostreq.url('../snippets/display.php?displaytype=viewblogposts&blogtypeid='+theid+'&blogcategoryid='+secondid+'&extraval=admin');
  //send request
  blogcatpostreq.opensend('GET');
  //update dom when finished, takes four params targetElement,entryType,entryEffect,period
  blogcatpostreq.update('div#contentdisplayhold div:last,section.content div:last','insertAfter','fadeIn',1000);
  
}else{
  
}
});
$(document).on("click","a[name=removecomment]",function(){
  var cid=$(this).attr("data-cid");
  var comremreq=new Request();
  comremreq.generate('div[name=minicommentsearchhold] div[data-id='+cid+']',false);
  //enter the url
  comremreq.url('../snippets/display.php?displaytype=removecomment&cid='+cid+'&extraval=admin');
  //send request
  comremreq.opensend('GET');
  //update dom when finished, takes four params targetElement,entryType,entryEffect,period
  comremreq.update('div[name=minicommentsearchhold] div[data-id='+cid+']','html','',0);
  $('div[name=minicommentsearchhold] div[data-id='+cid+']').fadeOut(500); 
  console.log($('div[name=minicommentsearchhold] div[data-id='+cid+']'));
});

$(document).on("click","td[name=trcontrolpoint] a",function(){
  if(tinymce){
    /*tinymce.EditorManager.execCommand('mceRemoveEditor',true, "adminposter");
    tinymce.EditorManager.execCommand('mceRemoveEditor',true, "postersmall");
    tinymce.EditorManager.execCommand('mceRemoveEditor',true, "postersmallone");
    tinymce.EditorManager.execCommand('mceRemoveEditor',true, "postersmalltwo");
    tinymce.EditorManager.execCommand('mceRemoveEditor',true, "postersmallthree");
    tinymce.EditorManager.execCommand('mceRemoveEditor',true, "postersmallfour");
    tinymce.EditorManager.execCommand('mceRemoveEditor',true, "postersmallfive");*/
    /*tinymce.EditorManager.execCommand('mceRemoveEditor',true, "postersmallsix");
    tinymce.EditorManager.execCommand('mceRemoveEditor',true, "postersmallseven");
    tinymce.EditorManager.execCommand('mceRemoveEditor',true, "postersmalleight");
    tinymce.EditorManager.execCommand('mceRemoveEditor',true, "postersmallnine");
    tinymce.EditorManager.execCommand('mceRemoveEditor',true, "postersmallten");
    tinymce.EditorManager.execCommand('mceRemoveEditor',true, "postersmalleleven");
    tinymce.EditorManager.execCommand('mceRemoveEditor',true, "postersmalltwelve");*/
    
  }
  var linkname=$(this).attr("name");
  var linkid=$(this).attr("data-divid");
  // console.log(linkid,linkname);
  if(linkname=="disablecomment"){
  $(this).attr({"name":"reactivatecomment","data-type":"reactivatecomment"}).text('Reactivate');
  $("td[name=commentstatus"+linkid+"]").text("disabled");
  }else if(linkname=="activatecomment"||linkname=="reactivatecomment"){
  $(this).attr({"name":"disablecomment","data-type":"disablecomment"}).text('Disable');
  $("td[name=commentstatus"+linkid+"]").text("active");

  }else if(linkname=="editsingleservicerequest"||linkname=="editsinglebooking"){
  $("td[name=servicestatus"+linkid+"]").text("active");
  $("td[name=bookingstatus"+linkid+"]").text("active");
  }else if(linkname=="disablesubscriber"){
    $(this).attr({"name":"activatesubscriber","data-type":"activatesubscriber"}).text('activate');
  $("td[name=subscriptionstatus"+linkid+"]").text("inactive");
  }else if(linkname=="activatesubscriber"){
  $(this).attr({"name":"disablesubscriber","data-type":"disablesubscriber"}).text('disable');
  $("td[name=subscriptionstatus"+linkid+"]").text("active");
  }
});

$(document).on("click","input[type=checkbox]",function(){
var datastate=$(this).attr("data-state");
if(datastate=="off"){
$(this).attr("data-state","on");
}else{
$(this).attr("data-state","off");
}
});

$(document).on("click","td[data-type=subtablelink] a",function(){
  var cura=$(this);
  var linkname=$(this).attr('name');
  var editid=$(this).attr('data-divid');
  var item_loader=$(this).parent().find('.loadmask');
  item_loader.removeClass('hidden');
  var dotarget="";
  if(linkname=="disablecomment"){
    dotarget="none";
  }else if(linkname=="activatecomment"||linkname=="reactivatecomment"){
    dotarget="none";
  }
  console.log(linkname,editid,dotarget,item_loader);

  // send ajax request to verify email existing in database
  var url = '' + host_addr + 'snippets/display.php';
  var opts = { 
      type: 'GET',
      url: url,
      data: {
          displaytype: linkname,
          editid: editid,
          extraval: "admin"
      },
      // dataType: 'json',
      success: function(output) {
          // item_loader.className += ' hidden';
          item_loader.addClass('hidden');
          // console.log(endtarget);
          // console.log(output);
          // if(dotarget!=="none"){

            // target.html(output);
          // }
          
          if(linkname=="disablecomment"){
            cura.attr({"name":"reactivatecomment","data-type":"reactivatecomment"}).text('Reactivate');
            $("td[name=commentstatus"+editid+"]").text("disabled");
          }else if(linkname=="activatecomment"||linkname=="reactivatecomment"){
            cura.attr({"name":"disablecomment","data-type":"disablecomment"}).text('Disable');
            $("td[name=commentstatus"+editid+"]").text("active");
          }
          if($.fn.dataTable){
            $("table[data-dTable=true]").dataTable();
          }

      },
      error: function(error) {
          if (typeof (error) == "object") {
              console.log(error.responseText);
          }else{
              console.log("Error: ",error);
          }
          var errmsg = "Sorry, something went wrong, possibly your internet connect is inactive, we apologise if this is from our end. Try the action again";
          // item_loader.remove();
          item_loader.addClass('hidden');
          // item_loader.className += ' hidden';
          raiseMainModal('Failure!!', '' + errmsg + '', 'fail');
          // alert("Sorry, something went wrong, possibly your internet connect is inactive, we apologise if this is from our end. Try the action again ");
      }
  };
  // console.log("In here");
  if(editid>0){
    $.ajax(opts);
  }  
});

$(document).on("click",'#editimgsoptionlinks a',function(){
var linkname=$(this).attr('name');
var linkid=$(this).attr('data-id');
   var albumreq=new Request();
  var albumlinkreq=new Request();
if(linkname=="deletepic"){
//   $('div[name=profimg'+;linkid+']').css("display","none");
var confirm=window.confirm('Are you sure you want to delete this, click "OK" to delete this or "Cancel" to stop')
if(confirm===true){
  albumlinkreq.generate('#fullcontent',false);
  albumlinkreq.url(''+host_addr+'snippets/display.php?displaytype='+linkname+'&extraval='+linkid+'');
  //send request
  albumlinkreq.opensend('GET');
  albumlinkreq.update('#fullcontent','none','none',0);  
  $('div[name=albumimg'+linkid+']').fadeOut(500).html("");
var galid=$(this).attr("data-galleryid");
var thesrc=$(this).attr("data-src");
var galname=$(this).attr("data-galleryname");
galname==""||typeof(galname)=="undefined"?galname="gallerydata":galname=galname;
var galleryimgsrcs=$('input[name='+galname+''+galid+']').attr('data-images');
var galleryimgsizes=$('input[name='+galname+''+galid+']').attr('data-sizes');
var posterpoint=$(this).attr('data-arraypoint');
galleryimgsrcsarray=galleryimgsrcs.split(">");
galleryimgsizesarray=galleryimgsizes.split("|");
var id=$.inArray(thesrc,galleryimgsrcsarray);
var dlength=galleryimgsrcsarray.length;
var newimgsrcs="";
var newsizes="";
for(var t=0;t<dlength;t++){
if(t!==id){
  newimgsrcs==""?newimgsrcs+=galleryimgsrcsarray[t]:newimgsrcs+="]"+galleryimgsrcsarray[t];
  newsizes==""?newsizes+=galleryimgsizesarray[t]:newsizes+="|"+galleryimgsizesarray[t];
}
}
/*$('input[name='+galname+''+galid+']').attr('data-images',''+newimgsrcs+'');
$('input[name='+galname+''+galid+']').attr('data-sizes',''+newsizes+'');*/
var galname=$(this).attr("data-galleryname");
galname==""||typeof(galname)=="undefined"?galname="gallerydata":galname=galname;
var galleryimgsrcs=$('input[name='+galname+''+galid+']').attr('data-images');
var galleryimgsizes=$('input[name='+galname+''+galid+']').attr('data-sizes');
var posterpoint=$(this).attr('data-arraypoint');
var galleryimgsrcsarray=galleryimgsrcs.split(">");
var galleryimgsizesarray=galleryimgsizes.split("|");
var dlength=galleryimgsrcsarray.length;
$('input[name='+galname+''+galid+']').attr({'data-images':''+newimgsrcs+'','data-sizes':''+newsizes+''});
/*$('input[name=gallerycount]').attr('value',''+dlength+'');
$('input[name=currentgalleryview]').attr('value','');
$('input[name=curgallerydata]').attr('data-images',''+newimgsrcs+'');
$('input[name=curgallerydata]').attr('data-sizes',''+newsizes+'');*/
var tlength=$('div[name=galleryfullholder'+galid+']').find("a[name=deletepic]").length;
console.log(id,tlength);
for(var i=0;i<tlength;i++){
var curpoint=$('div[name=galleryfullholder'+galid+']').find("a[name=deletepic]")[i].attributes[4].value;
if(curpoint>posterpoint){
var newpoint=curpoint-1;
$('div[name=galleryfullholder'+galid+']').find("a[name=deletepic]")[i].attributes[4].value=newpoint;
$('div[name=galleryfullholder'+galid+']').find("a[name=viewpic]")[i].attributes[4].value=newpoint;
}
}  
}

}else if (linkname=="viewpic") {
 $('#fullcontent img[name=fullcontentwait]').show();
// var gallery_name=$('input[name=bloggallerydata]').attr('title');
var gallery_name="";
// var gallery_details=$('input[name=bloggallerydata]').attr('data-details');
var posterpoint=$(this).attr('data-arraypoint');
var galleryimgsrcsarray=new Array();
var galleryimgsizesarray=new Array();
var galid=$(this).attr("data-galleryid");
var galname=$(this).attr("data-galleryname");
galname==""||typeof(galname)=="undefined"?galname="gallerydata":galname=galname;
console.log($('input[name='+galname+''+galid+']'),'input[name='+galname+''+galid+']');
var galleryimgsrcs=$('input[name='+galname+''+galid+']').attr('data-images');
var galleryimgsizes=$('input[name='+galname+''+galid+']').attr('data-sizes');
var galleryimgsrcsarray=galleryimgsrcs.split(">");
var galleryimgsizesarray=galleryimgsizes.split("|");
var posterimg=galleryimgsrcsarray[posterpoint];
var gallerydata="";
var gallerytotal=galleryimgsrcsarray.length-1;
gallery_name+='<input type="hidden" name="gallerycount" value="'+gallerytotal+'"/><input type="hidden" name="currentgalleryview" value="'+posterpoint+'"/><input type="hidden" name="curgallerydata" data-images="'+galleryimgsrcs+'" data-sizes="'+galleryimgsizes+'" data-galleryname="'+galname+'" value=""/>';
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
var contwidth=$('#fullcontent').width();
var contheight=$('#fullcontent').height();
contwidth=Math.floor(contwidth);
contheight=Math.floor(contheight);
var outs= new Array();
outs=produceImageFitSize(imgwidth,imgheight,960,700,"off");
var firstcontent='<div id="closecontainer" name="closefullcontenthold" data-id="theid" class="altcloseposfour"><img src="'+host_addr+'images/closefirst.png" title="Close"class="total"/></div>'+
'<img src="'+posterimg+'" name="galleryimgdisplay" style="'+outs['style']+'" title="'+gallery_name+'"/>'+
'<img src="'+host_addr+'images/waiting.gif" name="fullcontentwait" style="margin-top:285px;margin-left:428px;z-index:80;">'
;
$('#fullcontent').html(""+firstcontent+"");
$('#fullcontentheader').html(gallery_name);
// $('#fullcontentdetails').html(gallery_details);
var topdistance=$(window).scrollTop();
// console.log(topdistance);
if(topdistance>100){
  var pointerpos=topdistance+100;
$('#fullcontent').css("margin-top",""+topdistance+"px");
$('#fullcontentpointerhold').css("margin-top",""+topdistance+"px");
}else{
$('#fullcontent').css("margin-top","0px");
$('#fullcontentpointerhold').css("margin-top","0px");
}

$('#fullbackground').fadeIn(1000);
$('#fullcontenthold').fadeIn(1000);
$('#fullcontent').fadeIn(1000);
$('#fullcontentheader').fadeIn(1000);
$('#fullcontentdetails').fadeIn(1000);
$('#fullcontentpointerhold').fadeIn(1000);
$('img[name=galleryimgdisplay]').load(function(){
$('#fullcontent img[name=fullcontentwait]').hide();
});

}else{
  
}
});

 $(document).on("blur",'div#formend select[name=photocount]',function(){
    //window.alert('event called');
    var photocount=$(this).val();
    var photocountmain=photocount;
    var curpics=$('input[name=piccount]').val();
    console.log(curpics,this,photocount)
    var totoptions='<option value="">--add More?--</option>';
    if(curpics==""||curpics<1){
    while(photocount>0){
      $('<br><br><input type="file" class="curved" name="defaultpic'+photocount+'"/>').insertAfter('#formend select[name=photocount]');
      photocount--;
    }
  //update the current number of photo fields displayed
    $('input[name=piccount]').attr('value',''+photocountmain+'');
  //update selection options
  var totpics=10-Math.floor(photocountmain);
  var rempics=Math.floor(totpics);
  console.log(rempics,photocount);
   if(rempics>0){
    //updates the selection box for he remainning possible photo uploads
    while(rempics>0){
    totoptions+='<option value="'+rempics+'">'+rempics+' Photos</option>';   
    // $('<option value="'+rempics+'">'+rempics+' Photos</option>').insertBefore('select[name=photocount] option');      
    rempics--;
    }
    $(this).html(totoptions);
  }else{
  totoptions='<option value="">Max Of 10</option>';
  $(this).html(totoptions);    
  }
}else{
//
var photoentry;
while(photocount>0){
photoentry=Math.floor(photocount)+Math.floor(curpics);
      $('<br><br><input type="file" class="curved" name="defaultpic'+photoentry+'"/>').insertAfter('select[name=photocount]');
    photocount--;
}
console.log("In here");
  var totpics=Math.floor(curpics)+Math.floor(photocountmain);
  var checkpicleft=10-totpics;
  var rempics=checkpicleft;
  console.log(rempics,totpics);
  $('input[name=piccount]').attr('value',''+totpics+'');
  if(rempics>0){
    while(rempics>0){
    totoptions+='<option value="'+rempics+'">'+rempics+' Photos</option>';   
    // $('<option value="'+rempics+'">'+rempics+' Photos</option>').insertBefore('select[name=photocount] option');      
    rempics--;
    }
    $(this).html(totoptions);
  }else{
  totoptions='<option value="">Max Of 10</option>';
  $(this).html(totoptions);
  }
}
  });
$(document).on("click","#formend a, a[data-content-type=addcontent]",function(){
  var linkname=$(this).attr('name');
  var targetcontainer=$(this).attr('data-target');
  var branchcount=$('input[name=containercount]').val();
  var nextcount=Math.floor(branchcount)+1;
  if(linkname=="childadd"){
    var branchcount=$('input[name=childcount]').val();
    var nextcount=Math.floor(branchcount)+1;
    // console.log(nextcount,branchcount);
    if(nextcount<=5){

    var outs='<div class="small-6 column">'+
    '                Childs Name and Birthday('+nextcount+') *'+
    '                <input name="child'+nextcount+'"  placeholder="Childs name and birthday ('+nextcount+')" class="curved"/>'+
    '             </div>';
    $(outs).insertAfter('div[name=childrenhold] div:last');
    //selection.appendTo(outs);
    $('input[name=childcount]').attr('value',''+nextcount+'');
    }else{
      window.alert('Max of five entries, thank you');
    }
  }
})
$(document).on("blur","form[name*=sermon] select[name=audiotype],form[name*=sermon] select[name=audiotype]",function(){
})

$('#fullcontenthold img[name=pointleft]').on("click",function(){
var totalcount=$('#fullcontentheader input[name=gallerycount]').attr("value");
var currentview= $('#fullcontentheader input[name=currentgalleryview]').attr("value");
var galleryimgsrcsarray=new Array();
var galleryimgsizesarray=new Array();
var galleryimgsrcs=$('#fullcontentheader input[name=curgallerydata]').attr('data-images');
var galleryimgsizes=$('#fullcontentheader input[name=curgallerydata]').attr('data-sizes');
/*var galname=$('#fullcontentheader input[name=curgallerydata]').attr('data-galleryname');
galname==""||typeof(galname)=="undefined"?galname="gallerydata":galname=galname;*/
galleryimgsrcsarray=galleryimgsrcs.split(">");
galleryimgsizesarray=galleryimgsizes.split("|");
var nextview;
console.log(currentview,totalcount);
if(Math.floor(currentview)<=Math.floor(totalcount)){
nextview=Math.floor(currentview)-1;
console.log(nextview);
//nextview works in array index format meaning 0 holds a valid position
if(nextview>-1&&nextview<=totalcount){
  $('#fullcontent img[name=fullcontentwait]').show();
  $('div#fullcontent img[name=galleryimgdisplay]').attr("src","").hide();
var nextimg=galleryimgsrcsarray[nextview];
console.log(nextview,nextimg);
var cursize=galleryimgsizesarray[nextview].split(',');
var imgwidth=Math.floor(cursize[0]);
var imgheight=Math.floor(cursize[1]);
var contwidth=$('#fullcontent').width();
var contheight=$('#fullcontent').height();
contwidth=Math.floor(contwidth);
contheight=Math.floor(contheight);
var outs= new Array();
outs=produceImageFitSize(imgwidth,imgheight,960,700,"off");

$('#fullcontent img[name=galleryimgdisplay]').attr({"src":""+nextimg+"","style":""+outs['style']+""}).load(function(){
$(this).fadeIn(1000);
$('#fullcontent img[name=fullcontentwait]').hide();
});
$('#fullcontentheader input[name=currentgalleryview]').attr("value",""+nextview+"");
}
}
});

$('#fullcontentpointerright img[name=pointright]').on("click",function(){
var totalcount=Math.floor($('#fullcontentheader input[name=gallerycount]').attr("value"));
var currentview=Math.floor($('#fullcontentheader input[name=currentgalleryview]').attr("value"));
var galleryimgsrcsarray=new Array();
var galleryimgsizesarray=new Array();
var galleryimgsrcs=$('#fullcontentheader input[name=curgallerydata]').attr('data-images');
var galleryimgsizes=$('#fullcontentheader input[name=curgallerydata]').attr('data-sizes');
galleryimgsrcsarray=galleryimgsrcs.split(">");
galleryimgsizesarray=galleryimgsizes.split("|");
var nextview;
console.log($(this).attr("name"),totalcount);
if(currentview<=totalcount){
nextview=Math.floor(currentview)+1;
//nextview works in array index format meaning 0 holds a valid position
if(nextview>-1&&nextview<=totalcount){
$('#fullcontent img[name=fullcontentwait]').show();
$('div#fullcontent img[name=galleryimgdisplay]').attr("src","").hide();
$('#fullcontent img[name=galleryimgdisplay]').attr({"src":""+host_addr+"images/waiting.gif","style":"margin-top:285px;margin-left:428px;"});
var nextimg=galleryimgsrcsarray[nextview];
console.log(nextview,nextimg);
var cursize=galleryimgsizesarray[nextview].split(',');
var imgwidth=Math.floor(cursize[0]);
var imgheight=Math.floor(cursize[1]);
var contwidth=$('#fullcontent').width();
var contheight=$('#fullcontent').height();
contwidth=Math.floor(contwidth);
contheight=Math.floor(contheight);
var outs= new Array();
outs=produceImageFitSize(imgwidth,imgheight,960,700,"off");
$('#fullcontent img[name=galleryimgdisplay]').attr({"src":""+nextimg+"","style":""+outs['style']+""}).load(function(){
$('#fullcontent img[name=fullcontentwait]').hide();
$(this).fadeIn(1000);
});
$('#fullcontentheader input[name=currentgalleryview]').attr("value",""+nextview+"");
}
}

});

$(document).on("click","#contentdisplayhold table td audio",function(){
// console.log($('#contentdisplayhold table td audio'),$('#contentdisplayhold table td audio').length);
for(var i=0;i<=$('#contentdisplayhold table td audio').length;i++){
  // check if the current audio element has buffered information
  var loadtest=$('#contentdisplayhold table td audio')[i].buffered.length;
  if(loadtest==1 && $('#contentdisplayhold table td audio')[i]!==this){
    $('#contentdisplayhold table td audio')[i].pause();
    $('#contentdisplayhold table td audio')[i].currentTime = 0;
  }
}
// $(this).addClass('activeaudio');

});

// multiple markup entries point
    $(document).on("click", "a[name=addextrabannerslide]", function() {
        var branchcount = $('input[name=curbannerslidecount]').val();
        var nextcount = Math.floor(branchcount) + 1;
        // var nextcountout=nextcount-3;
        // var nextcountmain=nextcount-1;
        if (nextcount <= 10) {
            var outs = '<div class="col-xs-6">' 
            + '  <div class="form-group">' 
            + '    <label>Select Slide Image(Preferrably 1920x460 or 1170x460):</label>' 
            + '    <div class="input-group">' 
            + '      <div class="input-group-addon">' 
            + '        <i class="fa fa-image"></i>' 
            + '      </div>' 
            + '      <input type="file" class="form-control" name="slide' + nextcount + '" Placeholder=""/>' 
            + '    </div><!-- /.input group -->' 
            + '  </div><!-- /.form group -->' 
            + '<div class="form-group">' 
            + '  <label>Header Caption(Large size caption):</label>' 
            + '  <div class="input-group">' 
            + '  <div class="input-group-addon">' 
            + '        <i class="fa fa-image"></i>' 
            + '      </div>' 
            + '      <input type="text" class="form-control" name="headercaption' + nextcount + '" Placeholder=""/>' 
            + '    </div><!-- /.input group -->' 
            + '  </div><!-- /.form group -->' 
            + '  <div class="form-group">' 
            + '    <label>Mini Caption(Small size caption):</label>' 
            + '    <div class="input-group">' 
            + '      <div class="input-group-addon">' 
            + '        <i class="fa fa-image"></i>' 
            + '      </div>' 
            + '      <input type="text" class="form-control" name="minicaption' + nextcount + '" Placeholder=""/>' 
            + '    </div><!-- /.input group -->' 
            + '  </div><!-- /.form group -->' 
            + '<div class="form-group">' 
            + '   <label>link Address(for links in the caption):</label>' 
            + '    <div class="input-group">' 
            + '      <div class="input-group-addon">' 
            + '        <i class="fa fa-file-text"></i>' 
            + '      </div>' 
            + '      <input type="text" class="form-control" name="linkaddress' + nextcount + '" Placeholder=""/>' 
            + '    </div><!-- /.input group -->' 
            + '  </div><!-- /.form group -->' 
            + '  <div class="form-group">' 
            + '    <label>link Title(The text the link displays):</label>' 
            + '    <div class="input-group">' 
            + '      <div class="input-group-addon">' 
            + '        <i class="fa fa-file-text"></i>' 
            + '      </div>' 
            + '      <input type="text" class="form-control" name="linktitle' + nextcount + '" Placeholder=""/>' 
            + '    </div><!-- /.input group -->' 
            + '  </div><!-- /.form group -->' 
            + '</div>';
            // console.log(nextcount, outs);
            $(outs).insertBefore('div[name=entrybannerslidepoint]');
            //selection.appendTo(outs);
            $('input[name=curbannerslidecount]').attr('value', '' + nextcount + '');
        } else {
            window.alert("maximum of ten slides please");
        }
    })  
    $(document).on("click", "a[name=addextrateamslide]", function() {
        var branchcount = $('input[name=curteamslidecount]').val();
        var nextcount = Math.floor(branchcount) + 1;
        // var nextcountout=nextcount-3;
        // var nextcountmain=nextcount-1;
        if (nextcount <= 10) {
            var outs = '<div class="col-xs-6">' 
            + '  <div class="form-group">' 
            + '    <label>Select Slide Image(Preferrably 1920x460 or 1170x460):</label>' 
            + '    <div class="input-group">' 
            + '      <div class="input-group-addon">' 
            + '        <i class="fa fa-image"></i>' 
            + '      </div>' 
            + '      <input type="file" class="form-control" name="slide' + nextcount + '" Placeholder=""/>' 
            + '    </div><!-- /.input group -->' 
            + '  </div><!-- /.form group -->' 
            + '<div class="form-group">' 
            + '  <label>Member Name:</label>' 
            + '  <div class="input-group">' 
            + '  <div class="input-group-addon">' 
            + '        <i class="fa fa-image"></i>' 
            + '      </div>' 
            + '      <input type="text" class="form-control" name="fullname' + nextcount + '" Placeholder=""/>' 
            + '    </div><!-- /.input group -->' 
            + '  </div><!-- /.form group -->' 
            + '  <div class="form-group">' 
            + '    <label>Member Position</label>' 
            + '    <div class="input-group">' 
            + '      <div class="input-group-addon">' 
            + '        <i class="fa fa-image"></i>' 
            + '      </div>' 
            + '      <input type="text" class="form-control" name="position' + nextcount + '" Placeholder=""/>' 
            + '    </div><!-- /.input group -->' 
            + '  </div><!-- /.form group -->' 
            + '  <div class="form-group">' 
            + '    <label>Qualifications:</label>' 
            + '    <div class="input-group">' 
            + '      <div class="input-group-addon">' 
            + '        <i class="fa fa-image"></i>' 
            + '      </div>' 
            + '      <input type="text" class="form-control" name="qualifications' + nextcount + '" Placeholder=""/>' 
            + '    </div><!-- /.input group -->' 
            + '  </div><!-- /.form group -->' 
            + '<div class="form-group">' 
            + '   <label>Member Details</label>' 
            + '    <div class="input-group">' 
            + '      <div class="input-group-addon">' 
            + '        <i class="fa fa-file-text"></i>' 
            + '      </div>' 
            + '      <textarea rows="4" class="form-control" name="details' + nextcount + '" id="postersmallthree" Placeholder="Place the team members details here"/>' 
            + '    </div><!-- /.input group -->' 
            + '  </div><!-- /.form group -->' 
            + '</div>';
            // console.log(nextcount, outs);
            $(outs).insertBefore('div[name=entryteamslidepoint]');
            //selection.appendTo(outs);
            $('input[name=curteamslidecount]').attr('value', '' + nextcount + '');
        } else {
            window.alert("maximum of ten slides please");
        }
    })
    $(document).on("click", "a[name=addextraclientelleslide],a[name=addextrarecommendationslide],a[name=addextratestimonialslide]", function() {
        var entrypointtype = "entryrecommendationslidepoint";
        var fullnamedisplay = "";
        var contentpicdisplay = "";
        var pwebsitedisplay = "";
        var companynamedisplay = "";
        var cwebsitedisplay = "";
        var positiondisplay = "";
        var contentdisplay = "";
        var formelemcountertitle = "currecommendationslidecount";
        var formelemcountertrigger = "addextrarecommendationslide";
        var formelemsubmittrigger = "recommendationsubmit";
        var branchcounttype = $('input[name=currecommendationslidecount]');
        if ($(this).attr("name") == "addextraclientelleslide") {
            fullnamedisplay = "display:none;";
            contentpicdisplay = "";
            pwebsitedisplay = "display:none;";
            companynamedisplay = "";
            cwebsitedisplay = "";
            positiondisplay = "display:none;";
            contentdisplay = "";
            formelemcountertitle = "curclientelelslidecount";
            formelemcountertrigger = "addextraclientelleslide";
            formelemsubmittrigger = "clientsubmit";
            branchcounttype = $('input[name=curclientelleslidecount]');
            entrypointtype = "entryclientelleslidepoint";
        } else if ($(this).attr("name") == "addextratestimonialslide") {
            fullnamedisplay = "";
            contentpicdisplay = "";
            pwebsitedisplay = "";
            companynamedisplay = "";
            cwebsitedisplay = "";
            positiondisplay = "";
            contentdisplay = "";
            formelemcountertitle = "curtestimonialslidecount";
            formelemcountertrigger = "addextratestimonialslide";
            formelemsubmittrigger = "testimonialsubmit";
            branchcounttype = $('input[name=curtestimonialslidecount]');
            entrypointtype = "entrytestimonialslidepoint";
        }
        var branchcount = branchcounttype.val();
        var nextcount = Math.floor(branchcount) + 1;
        // var nextcountout=nextcount-3;
        // var nextcountmain=nextcount-1;
        console.log(nextcount, branchcounttype, branchcount, this.name);
        if (nextcount <= 10) {
            var outs = '<div class="col-md-6">' 
            + '  <div class="form-group" style="' + contentpicdisplay + '">' 
            + '    <label>Select Image:</label>' 
            + '    <div class="input-group">' 
            + '      <div class="input-group-addon">' 
            + '        <i class="fa fa-file-text"></i>' 
            + '      </div>' 
            + '      <input type="file" class="form-control" name="slide' + nextcount + '" Placeholder=""/>' 
            + '    </div><!-- /.input group -->' 
            + '  </div><!-- /.form group -->' 
            + '<div class="form-group" style="' + fullnamedisplay + '">' 
            + '  <label>Fullname:</label>' 
            + '  <div class="input-group">' 
            + '  <div class="input-group-addon">' 
            + '        <i class="fa fa-image"></i>' 
            + '      </div>' 
            + '      <input type="text" class="form-control" name="fullname' + nextcount + '" Placeholder="Fullname"/>' 
            + '    </div><!-- /.input group -->' 
            + '  </div><!-- /.form group -->' 
            + '  <div class="form-group" style="' + positiondisplay + '">' 
            + '    <label>Position</label>' 
            + '    <div class="input-group">' 
            + '      <div class="input-group-addon">' 
            + '        <i class="fa fa-file-text"></i>' 
            + '      </div>' 
            + '      <input type="text" class="form-control" name="position' + nextcount + '" Placeholder="Position"/>' 
            + '    </div><!-- /.input group -->' 
            + '  </div><!-- /.form group -->' 
            + '  <div class="form-group" style="' + pwebsitedisplay + '">' 
            + '    <label>Personal Website</label>' 
            + '    <div class="input-group">' 
            + '      <div class="input-group-addon">' 
            + '        <i class="fa fa-file-text"></i>' 
            + '      </div>' 
            + '      <input type="text" class="form-control" name="personalwebsite' + nextcount + '" Placeholder="Personal Website"/>' 
            + '    </div><!-- /.input group -->' 
            + '  </div><!-- /.form group -->' 
            + '  <div class="form-group" style="' + companynamedisplay + '">' 
            + '    <label>Company Name</label>' 
            + '    <div class="input-group">' 
            + '      <div class="input-group-addon">' 
            + '        <i class="fa fa-image"></i>' 
            + '      </div>' 
            + '      <input type="text" class="form-control" name="companyname' + nextcount + '" Placeholder="Company name"/>' 
            + '    </div><!-- /.input group -->' 
            + '  </div><!-- /.form group -->' 
            + '  <div class="form-group" style="' + cwebsitedisplay + '">' 
            + '    <label>Company Website</label>' 
            + '    <div class="input-group">' 
            + '      <div class="input-group-addon">' 
            + '        <i class="fa fa-image"></i>' 
            + '      </div>' 
            + '      <input type="text" class="form-control" name="companywebsite' + nextcount + '" Placeholder="Company Website"/>' 
            + '    </div><!-- /.input group -->' 
            + '  </div><!-- /.form group -->' 
            + '<div class="form-group" style="' + contentdisplay + '">' 
            + '   <label>Details</label>' 
            + '    <div class="input-group">' 
            + '      <div class="input-group-addon">' 
            + '        <i class="fa fa-file-text"></i>' 
            + '      </div>' 
            + '      <textarea rows="4" class="form-control" name="details' + nextcount + '" id="' + entrypointtype + 'postersmall' + nextcount + '" Placeholder="Place the team members details here"/>' 
            + '    </div><!-- /.input group -->' 
            + '  </div><!-- /.form group -->' 
            + '<script>' 
            + '    tinyMCE.init({' 
            + '        theme : "modern",' 
            + '        selector:"textarea#' + entrypointtype + 'postersmall' + nextcount + '",' 
            + '        menubar:false,' 
            + '        statusbar: false,' 
            + '        plugins : [' 
            + '         "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",' 
            + '         "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",' 
            + '         "save table contextmenu directionality emoticons template paste textcolor responsivefilemanager"' 
            + '        ],' 
            + '        width:"100%",' 
            + '        height:"auto",' 
            + '        toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",' 
            + '        toolbar2: "| responsivefilemanager | link unlink anchor | emoticons",' 
            + '        image_advtab: true ,' 
            + '        editor_css:"' + host_addr + 'stylesheets/mce.css?"+ new Date().getTime(),' 
            + '        content_css:"' + host_addr + 'stylesheets/mce.css?"+ new Date().getTime(),' 
            + '        external_filemanager_path:"' + host_addr + 'scripts/filemanager/",' 
            + '        filemanager_title:"NYSC Admin Blog Content Filemanager" ,' 
            + '        external_plugins: { "filemanager" : "' + host_addr + 'scripts/filemanager/plugin.min.js"}' 
            + '  });   ' 
            + '</script>' 
            + '</div>';
            $(outs).insertBefore('div[name=' + entrypointtype + ']');
            //selection.appendTo(outs);
            branchcounttype.attr('value', '' + nextcount + '');
        } else {
            window.alert("maximum of ten slides please");
        }
    })
    $(document).on("click", "a[name=addextracontact],a[name=addextracontactedit]", function() {
        var thename = $(this).attr("name");
        var edit = thename == "addextracontactedit" ? "edit" : "";
        var branchcount = $('input[name=curcontactcount' + edit + ']').val();
        var nextcount = Math.floor(branchcount) + 1;
        // var nextcountout=nextcount-3;
        // var nextcountmain=nextcount-1;
        if (nextcount <= 10) {
            var outs = '<div class="col-md-4">' 
            + '    <div class="form-group">' 
            + '          <label>Contact Persons (' + nextcount + ')</label>' 
            + '          <div class="input-group">' 
            + '              <div class="input-group-addon">' 
            + '                <i class="fa fa-bars"></i>' 
            + '              </div>' 
            + '              <input type="text" class="form-control" name="contactpersons' + nextcount + '" Placeholder="Contact Persons e.g Segun Ibrahim"/>' 
            + '          </div><!-- /.input group -->' 
            + '        </div>' 
            + '    </div>' 
            + '    <div class="col-md-4">' 
            + '      <div class="form-group">' 
            + '          <label>Phone Numbers</label>' 
            + '          <div class="input-group">' 
            + '              <div class="input-group-addon">' 
            + '                <i class="fa fa-bars"></i>' 
            + '              </div>' 
            + '              <input type="text" class="form-control" name="phonenumbers' + nextcount + '" Placeholder="Phone Numbers (' + nextcount + ')"/>' 
            + '          </div><!-- /.input group -->' 
            + '        </div>' 
            + '    </div>' 
            + '    <div class="col-md-4">' 
            + '      <div class="form-group">' 
            + '          <label>Email </label>' 
            + '          <div class="input-group">' 
            + '              <div class="input-group-addon">' 
            + '                <i class="fa fa-at"></i>' 
            + '              </div>' 
            + '              <input type="text" class="form-control" name="email' + nextcount + '" Placeholder="Email Address (' + nextcount + ')"/>' 
            + '          </div><!-- /.input group -->' 
            + '        </div>' 
            + '    </div>';
            // console.log(nextcount, outs);
            $(outs).insertBefore('div[name=entrycontactpoint' + edit + ']');
            //selection.appendTo(outs);
            $('input[name=curcontactcount' + edit + ']').attr('value', '' + nextcount + '');
        } else {
            window.alert("maximum of ten please");
        }
    })
    $(document).on("click", "a[name=addextrasubproducts],a[name=addextrasubproductsedit]", function() {
        var thename = $(this).attr("name");
        var edit = thename == "addextrasubproductsedit" ? "edit" : "";
        var branchcount = $('input[name=cursubproductcount' + edit + ']').val();
        var nextcount = Math.floor(branchcount) + 1;
        // var nextcountout=nextcount-3;
        // var nextcountmain=nextcount-1;
        if (nextcount <= 10) {
            var outs = '<div class="col-md-6">' 
            + '    <div class="form-group">' 
            + '          <label>SUB product/service Title (<b>' + nextcount + '</b>)</label>' 
            + '          <div class="input-group">' 
            + '              <div class="input-group-addon">' 
            + '                <i class="fa fa-bars"></i>' 
            + '              </div>' 
            + '              <input type="hidden" class="form-control" name="subcontentid' + nextcount + '" Placeholder="" value="0"/>' 
            + '              <input type="text" class="form-control" name="subcontenttitle' + nextcount + '" Placeholder="Product/Service Title"/>' 
            + '          </div><!-- /.input group -->' 
            + '        </div>' 
            + '    </div>';
            // console.log(nextcount, outs);
            $(outs).insertBefore('div[name=entrysubproductpoint' + edit + ']');
            //selection.appendTo(outs);
            $('input[name=cursubproductcount' + edit + ']').attr('value', '' + nextcount + '');
        } else {
            window.alert("maximum of ten please");
        }
    })

    $(document).on("blur","select[name=dogallery]",function(){
        var curval=$(this).val();
        if(curval==""){
          $(this).parent().parent().parent().parent().find('div.dogalleryslides.multi_content_hold_generic').addClass("hidden");
          // reset the values for all form content within the fields
          $(this).parent().parent().parent().parent().find('div.dogalleryslides.multi_content_hold_generic input:not(input[type=hidden])').val("");
          $(this).parent().parent().parent().parent().find('div.dogalleryslides.multi_content_hold_generic select').val("");
          $(this).parent().parent().parent().parent().find('div.dogalleryslides.multi_content_hold_generic textarea').val("");
        }else{
          $(this).parent().parent().parent().parent().find('div.dogalleryslides.multi_content_hold_generic').removeClass("hidden");

        }
    });
    $(document).on("blur","select[name=dovideouploads]",function(){
        var curval=$(this).val();
        // console.log(curval);
        if(curval=="localvideo"){
          // console.log("localvideos");
          $(this).parent().parent().parent().parent().find('div.localvideos').removeClass("hidden");
          $(this).parent().parent().parent().parent().find('div.embedvideo').addClass("hidden");
          // reset the values for all form content within the fields
          $(this).parent().parent().parent().parent().find('div.embedvideo input[type!=hidden]').val("");
          $(this).parent().parent().parent().parent().find('div.embedvideo select').val("");
          // $(this).parent().parent().parent().parent().find('div.embedvideo textarea').val("");
        }else{
          // console.log("embedvideo");
          $(this).parent().parent().parent().parent().find('div.embedvideo').removeClass("hidden");
          $(this).parent().parent().parent().parent().find('div.localvideos').addClass("hidden");
          // reset the values for all form content within the fields
          $(this).parent().parent().parent().parent().find('div.localvideos input[type!=hidden]').val("");
          $(this).parent().parent().parent().parent().find('div.localvideos select').val("");
          $(this).parent().parent().parent().parent().find('div.localvideos textarea').val("");

        }
    });
    $(document).on("blur","select[name=doarticlefiles]",function(){
        var curval=$(this).val();
        if(curval==""){
          $('div.articles_files').addClass("hidden");
          // reset the values for all form content within the fields
          $('div.articles_files input[type!=hidden]').val("");
          $('div.articles_files select').val("");
          $('div.articles_files textarea').val("");
        }else{
          $('div.articles_files').removeClass("hidden");

        }
    });
    $(document).on("blur","select[name=isbookable]",function(){
        var curval=$(this).val();
        if(curval==""){
          $('div.bookingsrequirements').addClass("hidden");
        }else{
          $('div.bookingsrequirements').removeClass("hidden");

        }
    });
    
// end
$(document).on("click","a[data-name=mainsearchbyoption]",function(){
  var thetype=$(this).attr("data-value");
  var theplaceholder=$(this).attr("data-placeholder");
  var thetext=$(this).text();
  $('input[name=searchby]').val(""+thetype+"");
  $('input[name=q]').attr("placeholder",""+theplaceholder+"");
  $('button[data-name=searchbyspace]').html(""+thetext+" <span class=\"fa fa-caret-down\"></span>");
});
$(document).on("click","input[type=button][name=mainsearch]",function(){
  var searchby=$('form[name=mainsearchform] select[name=searchby').val();
  var searchval=$('form[name=mainsearchform] input[name=mainsearch').val();
  if(searchby!==""&&searchval!==""){
    var searchreq=new Request();
    searchreq.generate('#contentdisplayhold,section.content',true);
    //enter the url
    searchreq.url('../snippets/display.php?displaytype=mainsearch&searchby='+searchby+'&mainsearch='+searchval+'&extraval=admin');
    //send request
    searchreq.opensend('GET');
    //update dom when finished, takes four params targetElement,entryType,entryEffect,period
    searchreq.update('div#contentdisplayhold,section.content','html','fadeIn',1000);
    
  }else{
    window.alert("To use the search feature you must choose a 'Search By' option first then enter your search value next, then you can search, if any is empty you would keep seeing this.....until you follow the simple instruction.");
  }
});

$(document).on("click","a[data-type=fapicker]",function(){
  // console.log("it was clicked");
  curval=$(this).attr("value");
  icontitle=$(this).attr("title");

  var target_input=$(this).parent().parent().parent().parent().find('input[data-name=icontitle]');
  var target_display=$(this).parent().parent().parent().parent().find('.currentfa i');
  var prevval=target_input.val();
  // console.log(target_input,target_display);
  if(prevval!==curval){
    target_input.val(curval);
    target_display.attr("class","fa "+curval);
    
  }else{
    target_input.removeAttr("value");
    target_input.val("");
    target_display.attr("class","");
  }

});
$(document).on("click","div.currentfa i",function(){
  // console.log("it was clicked");
  curval=$(this).attr("class","");
  icontitle=$(this).attr("title");

  var target_input=$(this).parent().parent().find('input[name=icontitle]');
  var prevval=target_input.val();
  target_input.val("");

});
if($.fn.select2){
  $('select[name*=faselect],select[data-name=faselect]').select2({
    theme: "bootstrap",
    templateResult: faSelectTemplate
  });
  $('select[data-name*=select2plain]').select2({
    theme: "bootstrap"
  });
  $(document).on('change','select[name*=faselect],select[data-name=faselect]',function(){
    var cval=$(this).val();
    var faelem=$(this).parent().find('._sdp i');
    if(cval!==""){
      faelem.attr({"class":"fa "+cval,"title":cval});
      
    }else{
      faelem.attr({"class":"","title":""});

    }
  });
}
if($.fn.CSearch){
  $('input[data-name=iconsearch]').CSearch('ul.fadisplaylist a[data-type=fapicker]','html');
}
if($.fn.wordMAX){
  // console.log("functional");
  $('input[type="text"][data-wMax],textarea[data-wMax]').wordMAX(); 
  $(document).on("click",'input[type="text"][data-wMax],textarea[data-wMax]',function(){
    $(this).wordMAX();
    /*if(!$(this).wordMAX()){
    }*/
  })
}
$(document).on("click","form[name=mainsearchform].sidebar-form button[type=button][name=mainsearch]",function(){
  var searchby=$('form[name=mainsearchform].sidebar-form input[name=searchby]').val();
  var searchval=$('form[name=mainsearchform].sidebar-form input[name=q]').val();
  if(searchby!==""&&searchval!==""){
  var searchreq=new Request();
    searchreq.generate('section.content',true);
    //enter the url
    searchreq.url('../snippets/display.php?displaytype=mainsearch&searchby='+searchby+'&mainsearch='+searchval+'&extraval=admin');
    //send request
    searchreq.opensend('GET');
    //update dom when finished, takes four params targetElement,entryType,entryEffect,period
    searchreq.update('section.content','html','fadeIn',1000);
    
  }else{
    window.alert("To use the search feature you must choose a 'Search By' option first then enter your search value next, then you can search, if any is empty you would keep seeing this.....until you follow the simple instruction.");
    $('form[name=mainsearchform].sidebar-form input[name=q]').focus();
  }
});


// control section for qgroup in administrator account
$(document).on("blur","select[name=grouptype]",function(){
  var cval=$(this).val();
  // hide/show the associated div
  $('._gt').addClass("hidden");
  $('._'+cval+'._gt').removeClass("hidden");
})
/*$(document).on("click","select[name=grouptype]",function(){
  var cval=$(this).val();
  // console.log(cval);
  // hide/show the associated div
  $('._gt').addClass("hidden");
  $('._'+cval+'._gt').removeClass("hidden");
})*/

  $(document).on("change","select[name=blogentrytype]",function(){
    var curtype=$(this).val();
    if($(this).parent().parent().find('div[data-name=introparagraph]').length>0){
      var parent=$(this).parent().parent();
      console.log("Parent 1: ",parent);
    }else{
      var parent=$(this).parent().parent().parent().parent();
      // console.log("Parent 2: ",parent);
    }
    if(curtype=="normal"||curtype==""){
      parent.find('div[data-name=introparagraph]').show(300);
      parent.find('div[data-name=blogentry]').show(300);
      parent.find('div[data-name=coverphoto]').show(300);
      parent.find('div[data-name=coverphotofloat]').show(300);
      parent.find('div[data-name=bannerpicentry]').hide(300);
      parent.find('div[data-name=galleryentry]').hide(300);
      parent.find('div[data-name=videosection]').hide(300);
      parent.find('div[data-name=audiosection]').hide(300);
    }else if(curtype=="gallery"){
      parent.find('div[data-name=introparagraph]').show(300);
      parent.find('div[data-name=blogentry]').show(300);
      parent.find('div[data-name=coverphoto]').hide(300);
      parent.find('div[data-name=coverphotofloat]').hide(300);
      parent.find('div[data-name=bannerpicentry]').hide(300);
      parent.find('div[data-name=galleryentry]').show(300);
      parent.find('div[data-name=videosection]').hide(300);
      parent.find('div[data-name=audiosection]').hide(300);
    }else if(curtype=="banner"){
      parent.find('div[data-name=introparagraph]').show(300);
      parent.find('div[data-name=blogentry]').show(300);
      parent.find('div[data-name=coverphoto]').hide(300);
      parent.find('div[data-name=coverphotofloat]').hide(300);
      parent.find('div[data-name=bannerpicentry]').show(300);
      parent.find('div[data-name=galleryentry]').hide(300);
      parent.find('div[data-name=videosection]').hide(300);
      parent.find('div[data-name=audiosection]').hide(300);
    }else if(curtype=="video"){
      parent.find('div[data-name=introparagraph]').show(300);
      parent.find('div[data-name=blogentry]').show(300);
      parent.find('div[data-name=coverphoto]').show(300);
      parent.find('div[data-name=coverphotofloat]').show(300);
      parent.find('div[data-name=bannerpicentry]').hide(300);
      parent.find('div[data-name=galleryentry]').hide(300);
      parent.find('div[data-name=videosection]').show(300);
      parent.find('div[data-name=audiosection]').hide(300);
    }else if(curtype=="audio"){
      parent.find('div[data-name=introparagraph]').show(300);
      parent.find('div[data-name=blogentry]').show(300);
      parent.find('div[data-name=coverphoto]').show(300);
      parent.find('div[data-name=coverphotofloat]').show(300);
      parent.find('div[data-name=bannerpicentry]').hide(300);
      parent.find('div[data-name=galleryentry]').hide(300);
      parent.find('div[data-name=videosection]').hide(300);
      parent.find('div[data-name=audiosection]').show(300);
    }else if(curtype=="poll"){
      parent.find('div[data-name=introparagraph]').show(300);
      parent.find('div[data-name=blogentry]').show(300);
      parent.find('div[data-name=coverphoto]').show(300);
      parent.find('div[data-name=coverphotofloat]').show(300);
      parent.find('div[data-name=bannerpicentry]').hide(300);
      parent.find('div[data-name=galleryentry]').hide(300);
      parent.find('div[data-name=videosection]').hide(300);
      parent.find('div[data-name=audiosection]').hide(300);
    }

  });
  if($.fn.datetimepicker){
    $('[data-timepick*=true]').each(function(){
      // console.log("The timed element: ",$(this));
      $(this).datetimepicker({
          format:"HH:mm"/*,
          keepOpen:true*/
      });
    })
   
  }

  if($.fn.datepicker){
    //bootstrap Date range picker
    // var datepicker = $.fn.datepicker.noConflict(); 
    // $.fn.bootstrapDP = datepicker;
    $('[data-datetimepicker]').datetimepicker({
        format:"YYYY-MM-DD HH:mm",
        keepOpen:true
    })
    // for disabling previous dates 
    $('[data-datetimepickerf]').datetimepicker({
        format:"YYYY-MM-DD HH:mm",
        keepOpen:true,
        minDate: moment(1, 'h')
    });
    $('[data-datepicker]').datetimepicker({
        format:"YYYY-MM-DD",
        keepOpen:true
        // showClose:true
        // debug:true
    });
    $('[data-datepickerf]').datetimepicker({
        format:"YYYY-MM-DD",
        keepOpen:true,
        minDate: moment(1, 'h')
        // showClose:true
        // debug:true
    });
    $('[data-timepicker]').datetimepicker({
        format:"HH:mm"/*,
        keepOpen:true*/
    });
    // $('#reservation').datepicker();
    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });
  }
  if($.fn.daterangepicker){

    //Date range picker with time picker
    $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
    $('[data-datetimerange]').daterangepicker({format: 'YYYY-MM-DD HH:mm:ss'});
    
    $('[data-datetimerangef]').daterangepicker({format: 'YYYY-MM-DD'});
    if($(document).inputmask){
        $("#datemask").inputmask("dd-mm-yyyy", {"placeholder": "dd-mm-yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        $("[data-mask]").inputmask();
        //timemask
        $(".timemask,[data-timemask=true]").inputmask("hh:mm", {"placeholder": "hh:mm"});

    }
  }
  $(document).on("blur","select[name=portfoliotype]",function(){
    var theval=$(this).val();
    if(theval=="client"){
      $('div.client-name').removeClass('hidden');
      // $('div.office-position').addClass('hidden');
    }else{
      // $('div.office-position').addClass('hidden');
      $('div.client-name').addClass('hidden');

    }
  });

  $(document).on("blur","select[name=pwrdd]",function(){
    // console.log('Pwrdd');
    var theval=$(this).val();
    var mainparent=$(this).parent().parent().parent().parent();
    if(theval=="yes"){
      mainparent.find('div.portfolio-pwrd').removeClass('hidden');
    }else{
      mainparent.find('div.portfolio-pwrd').addClass('hidden');

    }
  });

  $(document).on("blur","select[name=galleryattach]",function(){
    // console.log('Gallery Attach');
    var theval=$(this).val();
    if(theval=="yes"){
      $('div.portgallery').removeClass('hidden');
    }else{
      $('div.portgallery').addClass('hidden');
      resetValues('div.portgallery');
    }
  });
  $(document).on("blur","select[name=featured]",function(){
    // console.log('Gallery Attach');
    var theval=$(this).val();
    if(theval=="yes"){
      $('div.featured-details').removeClass('hidden');
    }else{
      $('div.featured-details').addClass('hidden');
      resetValues('div.featured-details');

    }
  });

  $(document).on("blur","select[name=vidattach]",function(){
    // console.log('Gallery Attach');
    var theval=$(this).val();
    var elgroup=$('div.portvideos');
    if(theval=="yes"){
      $('div.portvideos').removeClass('hidden');
    }else{
      $('div.portvideos').addClass('hidden');
      // reset all fields in 
      resetValues('div.portvideos');
      
    }
  });

  $(document).on("blur","select[name=audioattach]",function(){
    // console.log('Gallery Attach');
    var theval=$(this).val();
    if(theval=="yes"){
      $('div.portaudio').removeClass('hidden');
    }else{
      $('div.portaudio').addClass('hidden');
      resetValues('div.portaudio');

    }
  });
  
  $(document).on("blur","select[name*=portvtype],select[name*=videotype]",function(){
    // console.log('Gallery Attach');
    var theval=$(this).val();
    var parent=$(this).parent().parent().parent().parent();
    console.log('The parent: ',parent);
    if(theval=="local"){
      parent.find('div.portvideolocal, div.blogvideolocal').removeClass('hidden');
      parent.find('div.portvideoembed,div.blogvideoembed').addClass('hidden');
      parent.find('div.contentpreview._video .local_video');
    }else if(theval=="embed"){
      parent.find('div.portvideoembed,div.blogvideoembed').removeClass('hidden');
      parent.find('div.portvideolocal,div.blogvideolocal').addClass('hidden');
      parent.find('div.portvideolocal input[type=file],div.blogvideolocal input[type=file]').val('');
      parent.find('div.contentpreview._video .embed_video');
    }else if(theval==""){
      parent.find('div.portvideoembed,div.blogvideoembed').addClass('hidden');
      parent.find('div.portvideolocal,div.blogvideolocal').addClass('hidden');
      parent.find('div.portvideolocal input[type=file],div.blogvideolocal input[type=file]').val('');
    }
  });
  $(document).on("blur","select[name*=portatype],select[name*=audiotype]",function(){
    var theval=$(this).val();
    var parent=$(this).parent().parent().parent().parent();
    // console.log('The parent: ',parent);
    if(theval=="local"){
      parent.find('div.portaudiolocal,div.blogaudiolocal').removeClass('hidden');
      parent.find('div.portaudioembed,div.blogaudioembed').addClass('hidden');
      parent.find('div.contentpreview._audio .embed_audio');
    }else if(theval=="embed"){
      parent.find('div.portaudioembed, div.blogaudioembed').removeClass('hidden');
      parent.find('div.portaudiolocal, div.blogaudiolocal').addClass('hidden');
      parent.find('div.portaudiolocal input[type=file], div.blogaudiolocal input[type=file]').val('');
      parent.find('div.contentpreview._video .embed_video');
    }else if(theval==""){
      parent.find('div.portaudioembed').addClass('hidden');
      parent.find('div.portaudiolocal,div.blogaudiolocal').addClass('hidden');
      parent.find('div.portaudiolocal input[type=file], div.blogaudiolocal input[type=file]').val('');
    }
  });

  $(document).on("change","select[name=schedulestatus]",function(){
    console.log('Gallery Attach');
    var theval=$(this).val();
    var parent=$(this).parent().parent().parent().parent();
    console.log(parent);
    if(theval=="yes"){
      parent.find('div.scheduled').removeClass('hidden');
    }else{
      parent.find('div.scheduled').addClass('hidden');
      // reset all fields in 
      resetValues('div.scheduled');
      
    }
  });

  $(document).on("click","input[name=advancedrecruitsearch]",function(){
    var params=$('form[name=advancedrecruitsearch]').serialize();
    // console.log(params);
    // post parameters
      $('section.results div[data-name=rowresults]').html('<img src="'+host_addr+'images/waiting.gif" class="total2"/>')
          $.ajax({
              type: "GET",
              data:params,
              url: ""+host_addr+"snippets/display.php",
              success: function(result) {
              // console.log(result);
              $('section.results div[data-name=rowresults]').html(result);
                  
                    // console.log(inputname1.val(),inputname2.val(),inputname3.val(),inputname3.val().length);
      
              },
              error: function() {
      
                /*result = '<div class="alert error"><i class="fa fa-times-circle"></i>There was an error sending the message!</div>';
                $("#formstatus-3").html(result);*/
      
              }
          });
  });
});

