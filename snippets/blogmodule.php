<?php
function writeRssData($blogid,$blogcatid){
	$row=array();
if($blogid!==""&&$blogid>0){
	$outs=getSingleBlogType($blogid);
	$feedpath="../feeds/rss/".$outs['rssname'].".xml";
	$query="SELECT * FROM rssentries WHERE blogtypeid=$blogid order by id desc";
	$query2="SELECT * FROM rssheaders WHERE blogtypeid=$blogid";
}elseif ($blogcatid!==""&&$blogcatid>0) {
	# code...
	$outs=getSingleBlogCategory($blogcatid);
	$feedpath="../feeds/rss/".$outs['rssname'].".xml";
	$blogmainid=$outs['blogtypeid'];
	$outs=getSingleBlogType($blogmainid);
	$query="SELECT * FROM rssentries WHERE blogcategoryid=$blogcatid order by id desc";
	$query2="SELECT * FROM rssheaders WHERE blogcatid=$blogcatid";
}else{
	return false;
}
$run=mysql_query($query)or die(mysql_error()." Line 896");
$numrows=mysql_num_rows($run);
$run2=mysql_query($query2)or die(mysql_error()." Line 897");
$numrows2=mysql_num_rows($run2);
$feedentries="";
if($numrows2>0){
	$row2=mysql_fetch_assoc($run2);
	$header=stripslashes($row2['headerdetails']);
	$footer=$row2['footerdetails'];
}
if($numrows>0){
//get rss entries
while ($row=mysql_fetch_assoc($run)) {
	# code...
	$feedentries.=stripslashes($row['rssentry']);
}

}
if ($numrows>0||$numrows2>0) {
	# code...
$content=$header.$feedentries.$footer;
// echo $content;
$handle=fopen($feedpath,"w");
fwrite($handle,$content);
fclose($handle);
}
return $row;
}

function sendSubscriberEmail($blogpostid){
  global $host_addr,$host_target_addr,$host_email_addr,$host_email_send;
$outs=getSingleBlogEntry($blogpostid);
$blogtypeid=$outs['blogtypeid'];
$blogcategoryid=$outs['blogcatid'];
 $blogtypename=$outs['blogtypename'];
$blogcatname=$outs['blogcatname'];
 $query="SELECT * FROM subscriptionlist WHERE blogtypeid=$blogtypeid AND status='active'";
 $query2="SELECT * FROM subscriptionlist WHERE blogcatid=$blogcategoryid AND status='active'";
 $run=mysql_query($query)or die(mysql_error()." Line 929");
 $run2=mysql_query($query2)or die(mysql_error()." Line 930");
$numrows=mysql_num_rows($run);
$numrows2=mysql_num_rows($run2);
$coverphoto=$outs['absolutecover'];
$y=date('Y');
$mail = new PHPMailer;
$mail->Mailer='smtp';
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'relay-hosting.secureserver.net';
$mail->Username = 'noreply@bayonlearashi.com';
$mail->Password = 'noreply';
$mail->From = ''.$host_email_addr.'';
$mail->FromName = 'Bayonle Arashi\'s website';
// echo $numrows."<br>the numrows";
$message='
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>'.stripslashes($outs['title']).'</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body style="margin: 0; padding: 0; background-color:#32A602;font-family: \'Microsoft Tai Le\';">
 <table border="" style="border:0px;" cellpadding="0" cellspacing="0" width="100%">
  <tr>
   <td align="center" style="text-align: center;border:0px; font-size: 32px;color: #FFF;text-shadow: -1px -1px 1px #1A1A1A;">
    <img src="'.$host_target_addr.'images/bayonlearashi.png"  alt="Bayonle Arashi" width="170" height="115" style="display: inline-block;" /><br>
    A new blog post in '.$blogtypename.' Blog
   </td>
  <table align="center" border="" cellpadding="0" cellspacing="0" width="600">
 <tr>
  <td style="padding: 40px 30px 40px 30px;background-color:#fefefe; color:#1a1a1a;">
   <table border="" cellpadding="0" cellspacing="0" width="100%">
  <tr>
   <td style="font-size: 22px;text-align: center;color:#03C705;border: 0px;border-bottom: 1px solid #979797;">
    '.stripslashes($outs['title']).'
   </td>
  </tr>
  <tr>
   <td style="font-size:13px;border: 0px;border-bottom: 1px solid #979797;">
    <img src="'.$coverphoto.'" height="112px"style="float:left;"/>'.stripslashes($outs['introparagraph']).'
   </td>
  </tr>
  <tr>
   <td style="border: 0px;border-bottom: 1px solid #979797;font-size: 1.4em;">
    Posted under '.$blogcatname.', on '.$outs['entrydate'].' 
<a href="'.$host_addr.'blog/?p='.$outs['id'].'" target="_blank" title="Continue reading this post">Continue Reading</a>
   </td>
  </tr>
 </table>
  </td>
 </tr>
 <tr>
  <td style="text-align:center; font-size:13px;background: #062E05;color: #FF6100;">
&copy; Bayonle Arashi '.$y.' Developed by Okebukola Olagoke.<br>
<a href="'.$host_target_addr.'unsubscribe.php?t=1&tp='.$blogtypeid.'" style="color: #FD9D9D;">Unsubscribe</a>
  </td>
 </tr>
</table>
  </tr>
 </table>
</body>
</html>
';
$mail->WordWrap = 50;
$mail->isHTML(true);

$mail->Subject = ''.stripslashes($outs['title']).'';
$mail->Body    = ''.$message.'';
$mail->AltBody = 'A new blog post from Muyiwa Afolabi\'s website\n
'.stripslashes($outs['title']).'
Please visit '.$outs['pagelink'].' or '.$host_target_addr.'unsubscribe.php?t=1&tp='.$blogtypeid.'" to unsubscribe.
';
if($numrows>0){
  $count=0;
  //try to break the emails into packets of 300
while($row=mysql_fetch_assoc($run)){
$userid=$row['id'];
$useremail=$row['email'];
/* if($count>0){
$mail->addBCC(''.$useremail.'');
}else{*/
$mail->AddAddress(''.$useremail.'');
// }
//send the email to th
if($count==10){
if($host_email_send===true){ 
if(!$mail->send()) {
  die('Message could not be sent.'. $mail->ErrorInfo);
/*   echo 'Message could not be sent.';
   echo 'Mailer Error: ' . $mail->ErrorInfo;*/
   // exit;
}else{
}
}
$mail->ClearAllRecipients(); // reset the `To:` list to empty
$count=-1;
}
$count++;
}
if($count<10){
if($host_email_send===true){ 
if(!$mail->send()) {
  die('Message could not be sent.'. $mail->ErrorInfo);
/*   echo 'Message could not be sent.';
   echo 'Mailer Error: ' . $mail->ErrorInfo;*/
   // exit;
}
}
}

}
/*if($numrows2>0){
  $count=0;
  //try to break the emails into packets of 300
while($row2=mysql_fetch_assoc($run2)){
$userid=$row2['id'];
$useremail=$row2['email'];
$mail->addAddress(''.$useremail.'');
$mail->WordWrap = 50;
$mail->isHTML(true);
$message='
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>'.stripslashes($outs['title']).'</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body style="margin: 0; padding: 0; background-color:#550101;font-family: \'Microsoft Tai Le\';">
 <table border="" style="border:0px;" cellpadding="0" cellspacing="0" width="100%">
  <tr>
   <td align="center" style="text-align: center;border:0px; font-size: 32px;color: #FFA500;">
    <img src="'.$host_target_addr.'images/muyiwalogo5.png"  alt="Muyiwa Afolabi" width="182" height="206" style="display: inline-block;" /><br>
    A new blog post in '.$blogtypename.' Blog
   </td>
  <table align="center" border="" cellpadding="0" cellspacing="0" width="600">
 <tr>
  <td style="padding: 40px 30px 40px 30px;background-color:#fefefe; color:#1a1a1a;">
   <table border="" cellpadding="0" cellspacing="0" width="100%">
  <tr>
   <td style="font-size: 22px;text-align: center;color:#B800FF;border: 0px;border-bottom: 1px solid #979797;">
    '.stripslashes($outs['title']).'
   </td>
  </tr>
  <tr>
   <td style="font-size:13px;border: 0px;border-bottom: 1px solid #979797;">
    <img src="'.$coverphoto.'" height="112px"style="float:left;"/>'.stripslashes($outs['introparagraph']).'
   </td>
  </tr>
  <tr>
   <td style="border: 0px;border-bottom: 1px solid #979797;font-size: 12px;">
    Posted under '.$blogcatname.', on '.$outs['entrydate'].' 
<a href="'.$outs['pagelink'].'" target="_blank" title="Continue reading this post">Continue Reading</a>
   </td>
  </tr>
 </table>
  </td>
 </tr>
 <tr>
  <td style="text-align:center; font-size:13px;background: #2E0505;color: #FFAD00;">
&copy; Muyiwa Afolabi '.$y.' Developed by Okebukola Olagoke.<br>
<a href="'.$host_target_addr.'unsubscribe.php?t=1&tp='.$blogtypeid.'" style="color: #FD9D9D;">Unsubscribe</a>
  </td>
 </tr>
</table>
  </tr>
 </table>
</body>
</html>
';
$mail->Subject = ''.stripslashes($outs['title']).'';
$mail->Body    = ''.$message.'';
$mail->AltBody = 'A new blog post from Muyiwa Afolabi\'s website\n
'.stripslashes($outs['title']).'
Please visit '.$outs['pagelink'].' or '.$host_target_addr.'unsubscribe.php?t=2&tp='.$blogtypeid.'&eu='.$userid.'" to unsubscribe.
';
if($host_email_send===true){
if(!$mail->send()) {
   echo 'Message could not be sent.';
   echo 'Mailer Error: ' . $mail->ErrorInfo;
   exit;
}
}
//end of message send
}
// end of while loop for numrows2
}*/

}
function getSingleBlogType($blogtypeid){
	global $host_addr,$host_target_addr;
$query="SELECT * FROM blogtype where id=$blogtypeid";
$row=array();
$run=mysql_query($query)or die(mysql_error()." Line 926");
$numrows=mysql_num_rows($run);
/*$query2="SELECT * FROM rssheaders where blogtypeid=$blogtypeid";
$run2=mysql_query($query2)or die(mysql_error()." Line 899");
$row2=mysql_fetch_assoc($run2);*/

$row=mysql_fetch_assoc($run);
$id=$row['id'];
$name=$row['name'];
$foldername=$row['foldername'];
$description=$row['description'];
$status=$row['status'];

$row['adminoutput']='
<tr data-id="'.$id.'">
	<td>'.$name.'</td><td>'.$foldername.'</td><td>'.$description.'</td><td>'.$status.'</td><td name="trcontrolpoint"><a href="#&id='.$id.'" name="edit" data-type="editsingleblogtype" data-divid="'.$id.'">Edit</a></td>
</tr>
<tr name="tableeditcontainer" data-state="inactive" data-divid="'.$id.'">
	<td colspan="100%">
		<div id="completeresultdisplay" data-type="editmodal" data-load="unloaded" data-divid="'.$id.'">
			<div id="completeresultdisplaycontent" data-type="editdisplay" data-divid="'.$id.'">
				
			</div>
		</div>
	</td>
</tr>
';
$row['adminoutputtwo']='
			<div id="form" style="background-color:#fefefe;">
				<form action="../snippets/edit.php" name="editblogtype" method="post">
					<input type="hidden" name="entryvariant" value="editblogtype"/>
					<input type="hidden" name="entryid" value="'.$id.'"/>
					<div id="formheader">Edit '.$name.'</div>
						<div id="formend">
							Change Blog Name <br>
							<input type="text" placeholder="Enter Blog Name" name="name" class="curved"/>
						</div>
						<div id="formend">
							Blog Description *<br>
							<textarea name="description" placeholder="Enter Blog Description" class="" value="'.$description.'" class=""></textarea>
						</div>
						<div id="formend">
							Change Status<br>
							<select name="status" class="curved2">
								<option value="">Change Status</option>
								<option value="active">Active</option>
								<option value="inactive">Inactive</option>
							</select>
						</div>
					<div id="formend">
						<input type="submit" name="Update" value="Submit" class="submitbutton"/>
					</div>
				</form>
			</div>
';
return $row;
}

function getAllBlogTypes($viewer,$limit){
	global $host_addr,$host_target_addr;
  $testit=strpos($limit,"-");
$testit!==false?$limit="":$limit=$limit;
$row=array();
	if($limit!==""&&$viewer=="admin"){
$query="SELECT * FROM blogtype order by id desc ".$limit."";
	}else if($limit==""&&$viewer=="admin"){
$query="SELECT * FROM blogtype order by id desc LIMIT 0,15";		
	}/*elseif($limit!==""&&$viewer=="viewer"){
$query="SELECT * FROM blogtype ".$limit." order by id desc";
	}else if($limit==""&&$viewer=="viewer"){
$query="SELECT * FROM blogtype order by id desc";		
	}*/
$selection="";
$run=mysql_query($query)or die(mysql_error()." Line 998");
$numrows=mysql_num_rows($run);
$top='<table id="resultcontenttable" cellspacing="0">
			<thead><tr><th>Name</th><th>FolderName</th><th>Description</th><th>Status</th><th>View/Edit</th></tr></thead>
			<tbody>';
$bottom='	</tbody>
		</table>';
$adminoutput="";
$monitorpoint="";
if($numrows>0){
while($row=mysql_fetch_assoc($run)){
$outvar=getSingleBlogType($row['id']);
$adminoutput.=$outvar['adminoutput'];
$selection.='<option value="'.$outvar['id'].'">'.$outvar['name'].'</option>';

}
}
$rowmonitor['chiefquery']="SELECT * FROM blogtype order by id desc";
$outs=paginatejavascript($rowmonitor['chiefquery']);
$paginatetop='
<div id="paginationhold">
	<div class="meneame">
		<input type="hidden" name="curquery" value="'.$rowmonitor['chiefquery'].'"/>
		<input type="hidden" name="outputtype" value="blogtype"/>
		<input type="hidden" name="currentview" data-ipp="15" data-page="1" value="1"/>
		<div class="pagination" data-name="paginationpageshold">'.$outs['pageout'].'</div>
		<div class="pagination">
			  '.$outs['usercontrols'].'
		</div>
	</div>
</div>
<div id="paginateddatahold" data-name="contentholder">';

$paginatebottom='
</div><div id="paginationhold">
	<div class="meneame">
		<div class="pagination" data-name="paginationpageshold">'.$outs['pageout'].'</div>
	</div>
</div>';
$row['adminoutput']=$paginatetop.$top.$adminoutput.$bottom.$paginatebottom;
$row['adminoutputtwo']=$top.$adminoutput.$bottom;
$row['selection']=$selection;
return $row;
}
function getSingleBlogCategory($blogtypeid){
	global $host_addr,$host_target_addr;
$query="SELECT * FROM blogcategories WHERE id=$blogtypeid";
$run=mysql_query($query)or die(mysql_error()." Line 799");
$numrows=mysql_num_rows($run);
$row=array();
if($numrows>0){
$row=mysql_fetch_assoc($run);
$id=$row['id'];
$blogtypeid=$row['blogtypeid'];
$catname=$row['catname'];
$subtext=$row['subtext'];
$status=$row['status'];
$outs=getSingleBlogType($blogtypeid);
$postquery="SELECT * FROM blogentries WHERE blogcatid=$id AND status='active' order by id desc";
$postrun=mysql_query($postquery)or die(mysql_error()." Line 1594");
$postcount=mysql_num_rows($postrun);
$postcountmain=$postcount;
if($postcount>1000){
$postcountmain=$postcount/1000;
$postcountmain=round($postcountmain, 0, PHP_ROUND_HALF_UP);
$postcountmain=$postcountmain."K";
}elseif ($postcount>1000000) {
	# code...
	$postcountmain=$postcount/1000000;
$postcountmain=round($postcountmain, 0, PHP_ROUND_HALF_UP);
$postcountmain=$postcountmain."M";
}
$subtextout="";
$coverout="";
}
$row['completeoutput']='
<div id="bloghold">
Sorry but there is no entry here.
</div>
';
$row['pfncatminoutput']="";
if($outs['name']=="Project Fix Nigeria"||$outs['name']=="Frankly Speaking Africa"){
//for page type latest post content
	$theme=array();
	$theme[]="pfntoppurple";
	$theme[]="pfntoporange";
	$theme[]="pfntopred";
	$theme[]="pfntopblue";
	$theme[]="pfntopgreen";
	$theme[]="pfntopyellow";
$random=rand(0,5);
$curtheme=$theme[$random];
$curtheme2="";
$cattotquery="SELECT * FROM blogcategories WHERE blogtypeid=$blogtypeid AND status='active' order by id desc";
$cattotrun=mysql_query($cattotquery)or die(mysql_error()." Line 1629");
$catcurcount=mysql_num_rows($cattotrun);
$catrowouts=array();
$count=0;
if($catcurcount>0){
while($cattotrow=mysql_fetch_assoc($cattotrun)){
$catrowouts[]=$cattotrow['id'];
if($count<6){
if($id==$cattotrow['id']){
$curtheme2=$theme[$count];
}
$count++;
}else{
	$count=0;
	if($id==$cattotrow['id']){
$random2=rand(0,5);		
$curtheme2=$theme[$random2];
}
$count++;
}
}
}
	//for miniature type previous posts
$pfncattop='<div id="bottomcatdetailhold">
				<a href="category.php?cid='.$id.'" data-id="cattitle" title="'.$subtext.'">'.$catname.'</a>';
$pfncattopentries='<div id="microbloghold">No posts under this yet.</div>';
$pfncatbottom="</div>";
$catmainpost='
<div id="bloghold">
Sorry but there is no entry here.
</div>
';
if($postcount>0){
$count=0;
	$pfncattopentries="<div id=\"microbloghold\">No extra posts here</div>";
while ($postrows=mysql_fetch_assoc($postrun)) {
	# code...
$postid=$postrows['id'];
$postdata=getSingleBlogEntry($postid);
if($count==0){
$catmainpost=$postdata['vieweroutput'];
}
if($count>0&&$count<6){
$pfncattopentries=="<div id=\"microbloghold\">No extra posts here</div>"?$pfncattopentries="":$testpfn="holding";
$introparagraph=stripslashes($postdata['introparagraph']);
$headerdescription = convert_html_to_text($introparagraph);
$headerdescription=html2txt($headerdescription);
$monitorlength=strlen($headerdescription);
$headerminidescription=$headerdescription;
$pfncattopentries.='
	<a href="'.$postdata['pagelink'].'"title="'.$headerminidescription.'"><div id="microbloghold">'.$postdata['title'].'<br><span class="microblogdatehold">'.$postdata['entrydate'].'</span> <span class="microblogviewcommenthold">Views: '.$postdata['views'].' <img src="./images/comments.png"/> <font color="orange">'.$postdata['commentcount'].'</font></span></div></a>
';	
}
$count++;
}
}
$pfncatmindispcontent=$pfncattop.$pfncattopentries.$pfncatbottom;
$row['pfncatminoutput']=$pfncatmindispcontent;
$mediaquery="SELECT * FROM media WHERE ownerid=$id AND ownertype='blogcategory' AND maintype='original'";
$mediarun=mysql_query($mediaquery)or die(mysql_error()." Line 1683");
$mediarow=mysql_fetch_assoc($mediarun);
/*echo $mediaquery;
echo $mediarow['location']."here";*/
$row['profpic']=$mediarow['location'];
$row['profpicid']=$mediarow['id'];
if($mediarow['id']>0){
$coverphoto='<img src=".'.$mediarow['location'].'" title="'.$catname.'"/>';
}else{
  $coverphoto="";
}
$postcount==1?$s="":$s='s';

$pfnmaincattop='
<div id="pfndisplayhold" name="'.$curtheme2.'" data-id="'.$id.'">
	<div id="pfnprevcatcontent" title="Click to see the latest post under "'.$catname.'"" data-targetid="'.$id.'" data-state="inactive">
		<img src="'.$mediarow['location'].'"/>
		<div id="postcounthold">
			'.$postcountmain.'<br>
			Post'.$s.'.
		</div>
		<div id="pfnprevcatcontentdetailsmini">'.$row['subtext'].'</div>
		<div id="pfnprevcatcontentdetails">'.$catname.'</div>
	</div>
	<div id="pfnlatestposthold" data-value="'.$id.'">
';
$pfnmaincatentry='
'.$catmainpost.'
';	
$pfnmaincatbottom='
	</div>
</div>
';
$row['completeoutput']=$pfnmaincattop.$pfnmaincatentry.$pfnmaincatbottom;
$coverout='<td>'.$coverphoto.'</td>';
$subtext='<td>'.$row['subtext'].'</td>';
$subtextout='
<div id="formend">
	Change Sub text<br>
	<input type="text" placeholder="'.$row['subtext'].'" name="subtext" class="curved"/>
</div>
<div id="formend">
	Change Image<br>
	<input type="file" name="profpic" class="curved"/>
</div>
';
}
$catnamelength=strlen($catname);
$catnamemini=$catname;
if($catname>48){
$catnamemini=substr($catname,0,45)."...";
}
$row['linkout']='<a href="category.php?cid='.$id.'" title="Click to view the category '.$catname.'">'.$catnamemini.'</a>';
$row['adminoutput']='
<tr data-id="'.$id.'">
	'.$coverout.'<td>'.$outs['name'].'</td><td>'.$catname.'</td>'.$subtext.'<td>'.$postcount.'</td><td>'.$status.'</td><td name="trcontrolpoint"><a href="#&id='.$id.'" name="edit" data-type="editsingleblogcategory" data-divid="'.$id.'">Edit</a></td>
</tr>
<tr name="tableeditcontainer" data-state="inactive" data-divid="'.$id.'">
	<td colspan="100%">
		<div id="completeresultdisplay" data-type="editmodal" data-load="unloaded" data-divid="'.$id.'">
			<div id="completeresultdisplaycontent" data-type="editdisplay" data-divid="'.$id.'">
				
			</div>
		</div>
	</td>
</tr>
';
$row['adminoutputtwo']='
			<div id="form" style="background-color:#fefefe;">
				<form action="../snippets/edit.php" name="editblogcategory" method="post" enctype="multipart/form-data">
					<input type="hidden" name="entryvariant" value="editblogcategory"/>
					<input type="hidden" name="entryid" value="'.$id.'"/>
					<div id="formheader">Edit '.$catname.'</div>
						<div id="formend">
							Change Category Name<br>
							<input type="text" placeholder="'.$catname.'" name="name" class="curved"/>
						</div>
						'.$subtextout.'
						<div id="formend">
							Change Status<br>
							<select name="status" class="curved2">
								<option value="">Change Status</option>
								<option value="active">Active</option>
								<option value="inactive">Inactive</option>
							</select>
						</div>
					<div id="formend">
						<input type="submit" name="updateblogcategory" value="Update" class="submitbutton"/>
					</div>
				</form>
			</div>
';
$row['pfnpageout']='';
return $row;
}
function getAllBlogCategories($viewer,$limit,$blogtypeid){
	global $host_addr,$host_target_addr;
  $testit=strpos($limit,"-");
$testit!==false?$limit="":$limit=$limit;
	if($limit!==""&&$viewer=="admin"){
	$query="SELECT * FROM blogcategories WHERE blogtypeid=$blogtypeid order by id desc ".$limit."";
$rowmonitor['chiefquery']="SELECT * FROM blogcategories WHERE blogtypeid=$blogtypeid order by id desc";
	}else if($limit==""&&$viewer=="admin"){
$query="SELECT * FROM blogcategories WHERE blogtypeid=$blogtypeid order by id desc LIMIT 0,15";		
$rowmonitor['chiefquery']="SELECT * FROM blogcategories WHERE blogtypeid=$blogtypeid order by id desc";
	}else if($viewer=="viewer"){
$query="SELECT * FROM blogcategories where blogtypeid=$blogtypeid and status='active' order by id desc";		
$rowmonitor['chiefquery']="SELECT * FROM blogcategories WHERE blogtypeid=$blogtypeid and status='active' order by id desc";
	}
$row=array();
$selection="";
$run=mysql_query($query)or die(mysql_error()." Line 1156");
$numrows=mysql_num_rows($run);
$adminoutput="";
$monitorpoint="";
	$outs=getSingleBlogType($blogtypeid);
	$coverout="";
	$subtext="";
	if($outs['name']=="Project Fix Nigeria"||$outs['name']=="Frankly Speaking Africa"||$outs['id']==3){
		$coverout='<th>Cover Image</th>';		
		$subtext='<th>Subtext</th>';		

	}

	$top='<table id="resultcontenttable" cellspacing="0">
			<thead><tr>'.$coverout.'<th>Blogtype</th><th>Category Name</th>'.$subtext.'<th>Posts</th><th>Status</th><th>View/Edit</th></tr></thead>
			<tbody>';
$bottom='	</tbody>
		</table>';
		$completeoutput="No categories created yet";
		$catminoutput="";
		$allcatlinkouts="No categories created yet";
if($numrows>0){
	$completeoutput="";
	$allcatlinkouts="";
while($row=mysql_fetch_assoc($run)){
$outvar=getSingleBlogCategory($row['id']);
$adminoutput.=$outvar['adminoutput'];
$completeoutput.=$outvar['completeoutput'];
$catminoutput.=$outvar['pfncatminoutput'];
}
$queryselect="SELECT * FROM blogcategories where blogtypeid=$blogtypeid and status='active' order by id desc";    
$runselect=mysql_query($queryselect)or die(mysql_error()." Line 1156");
while($rowselect=mysql_fetch_assoc($runselect)){
$outvar=getSingleBlogCategory($rowselect['id']);
$selection.='<option value="'.$outvar['id'].'">'.$outvar['catname'].'</option>';
$allcatlinkouts.=$outvar['linkout'];
}
}
$outs=paginatejavascript($rowmonitor['chiefquery']);
$paginatetop='
<div id="paginationhold">
	<div class="meneame">
		<input type="hidden" name="curquery" value="'.$rowmonitor['chiefquery'].'"/>
		<input type="hidden" name="outputtype" value="blogcategory"/>
		<input type="hidden" name="currentview" data-ipp="15" data-page="1" value="1"/>
		<div class="pagination" data-name="paginationpageshold">'.$outs['pageout'].'</div>
		<div class="pagination">
			  '.$outs['usercontrols'].'
		</div>
	</div>
</div>
<div id="paginateddatahold" data-name="contentholder">';

$paginatebottom='
</div><div id="paginationhold">
	<div class="meneame">
		<div class="pagination" data-name="paginationpageshold">'.$outs['pageout'].'</div>
	</div>
</div>';
$row['adminoutput']=$paginatetop.$top.$adminoutput.$bottom.$paginatebottom;
$row['completeoutput']=$completeoutput;
$row['pfncatminoutput']=$catminoutput;
$row['adminoutputtwo']=$top.$adminoutput.$bottom;
$row['chiefquery']=$rowmonitor['chiefquery'];
$row['selection']=$selection;
$row['linkout']=$allcatlinkouts;
return $row;
}
function getSingleComment($commentid){
	global $host_addr,$host_target_addr;
	$row=array();
$query="SELECT * FROM comments WHERE id=$commentid";
$run=mysql_query($query)or die(mysql_error()." Line 1166");
$row=mysql_fetch_assoc($run);
$id=$row['id'];
$fullname=$row['fullname'];
$email=$row['email'];
$blogpostid=$row['blogentryid'];
$blogquery="SELECT * FROM blogentries where id=$blogpostid";
$blogrun=mysql_query($blogquery)or die(mysql_error()." Line 1145");
$blognumrows=mysql_num_rows($blogrun);
$blogrow=mysql_fetch_assoc($blogrun);
$blogtypeid=$blogrow['blogtypeid'];
$blogtypedata=getSingleBlogType($blogtypeid);
$pagename=$blogrow['pagename'];
$pagelink=''.$host_addr.'blog/'.$blogtypedata['foldername'].'/'.$pagename.'.php';
$link='<a href="'.$pagelink.'" target="_blank" title="click to view this blog post">'.$blogrow['title'].'</a>';
$rellink='./blog/'.$blogtypedata['foldername'].'/'.$pagename.'.php';
$comment=$row['comment'];
$comment=str_replace("../../",$host_addr,$comment);
$date=$row['datetime'];
$status=$row['status'];
$tableout='';
if($status=="active"){
$tableout='<a href="#&id='.$id.'" name="disablecomment" data-type="disablecomment" data-divid="'.$id.'">Disable</a>';
}elseif($status=="inactive"){
$tableout='<a href="#&id='.$id.'" name="activatecomment" data-type="activatecomment" data-divid="'.$id.'">Activate</a>';
}elseif($status=="disabled"){
$tableout='<a href="#&id='.$id.'" name="reactivatecomment" data-type="reactivatecomment" data-divid="'.$id.'">Reactivate</a>';
}
$row['vieweroutput']='
<div id="commentholder" data-id="'.$id.'">
	<div id="commentimg">
		<img src="'.$host_addr.'images/default.gif" class="total">
	</div>
	<div id="commentdetails">
		<div id="commentdetailsheading">
			'.$fullname.'&nbsp;&nbsp;&nbsp;&nbsp;<span>'.$date.'</span>
		</div>
		'.$comment.'
	</div>
</div>
';
$row['adminoutput']='
<div id="commentholder" data-id="'.$id.'">
	<div id="commentimg">
		<img src="'.$host_addr.'images/default.gif" class="total">
	</div>
	<div id="commentdetails">
		<div id="commentdetailsheading">
			'.$fullname.'&nbsp;&nbsp;&nbsp;&nbsp;<span>'.$date.'</span>
		</div>
		'.$comment.'
		<a href="##removeComment" class="adminremoval" name="removecomment" title="click here to remove this comment" data-cid="'.$id.'">Click to remove</a>
		<div id="bulkoperation"><input type="checkbox" data-state="off" data-parent="" value="'.$id.'"></div>
	</div>
</div>
';
$row['adminoutputtwo']='
<tr data-id="'.$id.'">
	<td>'.$fullname.'</td><td>'.$email.'</td><td>'.$date.'</td><td>'.$comment.'</td><td>'.$link.'</td><td name="commentstatus'.$id.'">'.$status.'</td><td name="trcontrolpoint">'.$tableout.'</td>
</tr>
<tr name="tableeditcontainer" data-state="inactive" data-divid="'.$id.'">
	<td colspan="100%">
		<div id="completeresultdisplay" data-type="editmodal" data-load="unloaded" data-divid="'.$id.'">
			<div id="completeresultdisplaycontent" data-type="editdisplay" data-divid="'.$id.'">
				
			</div>
		</div>
	</td>
</tr>
';
return $row;
}
function getAllComments($viewer,$limit,$blogpostid){
	global $host_addr,$host_target_addr;
  $testit=strpos($limit,"-");
$testit!==false?$limit="":$limit=$limit;
	$row=array();
  $paginateout="";
  if(is_numeric($blogpostid)){
if($viewer=="admin"){
if($limit=="" && $blogpostid==""){
$query="SELECT * FROM comments WHERE status!='disabled' order by id,status desc LIMIT 0,15";
$rowmonitor['chiefquery']="SELECT * FROM comments WHERE status!='disabled' order by id,status desc";
}else if($limit!==""&& $blogpostid==""){
$query="SELECT * FROM comments WHERE status!='disabled' order by id,status desc $limit";
$rowmonitor['chiefquery']="SELECT * FROM comments WHERE status!='disabled' order by id,status desc";
}elseif ($limit==""&&$blogpostid!=="") {
  # code...
$query="SELECT * FROM comments WHERE blogentryid=$blogpostid AND status!='disabled' order by id,status desc";
$rowmonitor['chiefquery']="SELECT * FROM comments WHERE blogentryid=$blogpostid AND status!='disabled' order by id,status desc";
}elseif ($limit!==""&&$blogpostid!=="") {
  # code...
$query="SELECT * FROM comments WHERE blogentryid=$blogpostid AND status!='disabled' order by id,status desc $limit";
$rowmonitor['chiefquery']="SELECT * FROM comments WHERE blogentryid=$blogpostid AND status!='disabled' order by id,status desc $limit";
}
}elseif ($viewer=="viewer") {
  # code...
$query="SELECT * FROM comments WHERE blogentryid=$blogpostid AND status!='disabled' AND status!='inactive'";
$rowmonitor['chiefquery']="SELECT * FROM comments WHERE blogentryid=$blogpostid AND status!='disabled' AND status!='inactive' order by id,status desc";
}
}else{
 if($blogpostid=='all'){
  $limit==""?$limit="LIMIT 0,15":$limit=$limit;
$query="SELECT * FROM comments order by id desc $limit";
$rowmonitor['chiefquery']="SELECT * FROM comments order by id,status desc";
 }elseif($limit=="" && $blogpostid!==""){
$query="SELECT * FROM comments WHERE status='$blogpostid' order by id,status desc LIMIT 0,15";
$rowmonitor['chiefquery']="SELECT * FROM comments WHERE status='$blogpostid' order by id,status desc";
}else if($limit!==""&& $blogpostid!==""){
$query="SELECT * FROM comments WHERE status='$blogpostid' order by id,status desc $limit";
$rowmonitor['chiefquery']="SELECT * FROM comments WHERE status='$blogpostid' order by id,status desc";
}
 $paginateout=$blogpostid;

 }
 
$run=mysql_query($query)or die(mysql_error()." Line 1189");
$numrows=mysql_num_rows($run);
$adminoutput='<td>No comments yet</td>';
$vieweroutput='No comments yet';
$commentoutput="";
$row['commentout']="No comments here yet.<br>";
if ($numrows>0) {
	# code...
	$adminoutput="";
	$vieweroutput="";
while($row=mysql_fetch_assoc($run)){
$commentout=getSingleComment($row['id']);
$id=$row['id'];
$commentoutput.=$commentout['adminoutput'];
$adminoutput.=$commentout['adminoutputtwo'];
$vieweroutput.=$commentout['vieweroutput'];
}
$row['commentout']=$commentoutput;
}
$row['commentcount']=$numrows;
$top='<table id="resultcontenttable" cellspacing="0">
			<thead><tr><th>Fullname</th><th>Email</th><th>Date</th><th>Comment Entry</th><th>InBlogPost</th><th>Status</th><th>View/Edit</th></tr></thead>
			<tbody>';
$bottom='	</tbody>
		</table>';
$outs=paginatejavascript($rowmonitor['chiefquery']);
$paginatetop='
<div id="paginationhold">
	<div class="meneame">
		<input type="hidden" name="curquery" value="'.$rowmonitor['chiefquery'].'"/>
		<input type="hidden" name="outputtype" value="comments|'.$paginateout.'"/>
		<input type="hidden" name="currentview" data-ipp="15" data-page="1" value="1"/>
		<div class="pagination" data-name="paginationpageshold">'.$outs['pageout'].'</div>
		<div class="pagination">
			  '.$outs['usercontrols'].'
		</div>
	</div>
</div>
<div id="paginateddatahold" data-name="contentholder">';

$paginatebottom='
</div><div id="paginationhold">
	<div class="meneame">
		<div class="pagination" data-name="paginationpageshold">'.$outs['pageout'].'</div>
	</div>
</div>';
$row['adminoutput']=$paginatetop.$top.$adminoutput.$bottom.$paginatebottom;
$row['adminoutputtwo']=$top.$adminoutput.$bottom;
$row['vieweroutput']=$vieweroutput;

return $row;
}
function getSingleBlogEntry($blogentryid){
	global $host_addr,$host_target_addr,$host_addr_root;
$row=array();
$query="SELECT * FROM blogentries where id=$blogentryid";
$run=mysql_query($query)or die(mysql_error()." Line 1145");
$numrows=mysql_num_rows($run);
$row=mysql_fetch_assoc($run);
$id=$row['id'];
// get the account that made the post
$posterid=$row['posterid'];
$postername="Goldlink Admin";
if($posterid>0){
	$pdata=getAdmin($posterid);
	$postername=$pdata['fullname'];
}
$row['numrows']=$numrows;
$commentdata=getAllComments("admin","",$id);
$commentsonoff=$row['commentsonoff'];
$commentsonoff=$row['commentsonoff'];
$commentsonselect="";
$commentsoffselect="";
$commentsonoff==0?$commentsonselect="selected=\"true\"":$commentsoffselect="selected=\"true\"";
$commentdatatwo=getAllComments("viewer","",$id);

$featuredonoff=$row['featuredpost'];
$featuredonselect="";
$featuredoffselect="";
$featuredonoff=="no"?$featuredonselect="selected=\"true\"":$featuredoffselect="selected=\"true\"";
$blogmaintypeid=$row['blogtypeid'];
// get the main blog type name
$blogmaintypequery="SELECT * FROM blogtype WHERE id=$blogmaintypeid";
$blogmaintyperun=mysql_query($blogmaintypequery)or die(mysql_error()." ".__LINE__);
$blogmaintypedata=mysql_fetch_assoc($blogmaintyperun);
$blogtypedata=getSingleBlogType($blogmaintypedata['id']);
$blogtypeid=$row['blogcatid'];
// $blogtypedata=getSingleBlogType($blogtypeid);
$blogcatquery="SELECT * FROM blogcategories WHERE id=$blogtypeid";
$blogcatrun=mysql_query($blogcatquery)or die(mysql_error()." Line 1642");
$blogcategorydata=mysql_fetch_assoc($blogcatrun);
$blogentrytype=$row['blogentrytype'];
$title=$row['title'];
$introparagraph=$row['introparagraph'];
if($blogentrytype!=="gallery" && $blogentrytype!=="banner"){
$headerdescription = convert_html_to_text($introparagraph);
$headerdescription=html2txt($headerdescription);
$monitorlength=strlen($headerdescription);
$headerminidescription=$headerdescription;
if($monitorlength>140){
$headerminidescription=substr($headerdescription,0,137);
$headerminidescription=$headerminidescription."...";
}
}else{
  $headerdescription=$title;
 $monitorlength=strlen($headerdescription);
$headerminidescription=$headerdescription;
if($monitorlength>140){
$headerminidescription=substr($headerdescription,0,137);
$headerminidescription=$headerminidescription."...";
} 
}

$blogpost=$row['blogpost'];
$blogpostout=str_replace("../", $host_addr, $blogpost);
$row['blogpostout']=$blogpostout;
$entrydate=$row['entrydate'];
$entrycomp=explode(" ", $entrydate);
$daydata=explode(",",$entrycomp[0]);
$datedata=$daydata[0];
$monthdata=$entrycomp[1];
$monthout=strtoupper(substr($monthdata, 0,3));
$yeardata=$entrycomp[2];
$timedata=$entrycomp[3];

$modifydate=$row['modifydate'];
if($modifydate==""){
	$modifydate="never";
}
$row['modifydate']=$modifydate;
$views=$row['views'];
$coverid=$row['coverphoto'];
// work om images based on blog entry types
$row['valbum']="";
$row['vfalbum']="";
$row['bannerthumb']="";
$row['bannermain']="";
if ($blogentrytype==""||$blogentrytype=="normal") {
  # code...
//get complete gallery images and create thumbnail where necessary;
$mediaquery="SELECT * FROM media WHERE id=$coverid AND status='active' ORDER BY id DESC";
$mediarun=mysql_query($mediaquery)or die(mysql_error()." Line 2846");
$coverdata=mysql_fetch_assoc($mediarun);
$coverphoto=$coverdata['location'];
$coverphotosmall=$coverdata['details'];
$medianumrows=mysql_num_rows($mediarun);
$absolutecover="".$host_addr."".$coverphoto;
$absolutecoverthumb="".$host_addr."".$coverphotosmall;
if($coverid<1){
$coverphoto=$host_addr_root."img/logo1.png";
$coverphotosmall=$host_addr_root."img/logo2.png";
$absolutecover=$coverphoto;
$absolutecoverthumb=$coverphotosmall;
}
$extraformdata='
<input type="hidden" name="blogentrytype" value="normal"/>
';
$editcoverphotostyle="";
$editcoverphotofloatstyle="";
$editintroparagraphstyle="";
$editblogpoststyle="";
}elseif($blogentrytype=="banner"){
$mediaquery="SELECT * FROM media WHERE ownerid=$id AND ownertype='blogentry' AND maintype='bannerpic' AND status='active' ORDER BY id DESC";
$mediarun=mysql_query($mediaquery)or die(mysql_error()." Line 2846");
$coverdata=mysql_fetch_assoc($mediarun);
$coverphoto=$coverdata['location'];
$row['bannermain']=$host_addr.$coverphoto;
$coverphotothumb=$coverdata['details'];
$row['bannerthumb']=$host_addr.$coverphotothumb;
$coverphotothumb==""?$coverphoto=$coverphoto:$coverphoto=$coverphotothumb;
$medianumrows=mysql_num_rows($mediarun);
$extraformdata='
<div id="formend">
  Change Banner Image<br>
  <input type="file" placeholder="Choose image" name="bannerpic" class="curved"/>
</div>
<input type="hidden" name="blogentrytype" value="banner"/>
<input type="hidden" name="bannerid" value="'.$coverdata['id'].'"/>
';
$editcoverphotostyle="display:none;";
$editcoverphotofloatstyle="display:none;";
$editintroparagraphstyle="display:none;";
$editblogpoststyle="display:none;";
}elseif($blogentrytype=="gallery"){
  $editcoverphotostyle="display:none;";
  $editcoverphotofloatstyle="display:none;";
  $editintroparagraphstyle="display:none;";
  $editblogpoststyle="display:none;";
    $outselect="";
  for($i=1;$i<=10;$i++){
    $pic="";
    $i>1?$pic="photos":$pic="photo";    
    $outselect.='<option value="'.$i.'">'.$i.''.$pic.'</option>';
  }
  $mediaquery="SELECT * FROM media WHERE ownerid=$id AND ownertype='blogentry' AND maintype='gallerypic' AND status='active' ORDER BY id DESC";
  $mediarun=mysql_query($mediaquery)or die(mysql_error()." Line 2087");
  $medianumrows=mysql_num_rows($mediarun);
  $thumbstack="";
  $locationstack="";
  $dimensionstack="";
  $locationstack2="";
  $dimensionstack2="";
  $mediacount=$medianumrows;
  //get the blog gallery
  $album="No Gallery Photos Available";
  $valbum="No Gallery Photos Available for this post";
  $vfalbum="No Gallery Photos Available for this post";
  if($medianumrows>0){
    $count=0;
    $album="";
    $valbum="";
    $vfalbum="";
  while ($mediarow=mysql_fetch_assoc($mediarun)) {
    # code...
    if($count==0){
      // $coverphoto=$mediarow['details'];
      $coverphoto=$mediarow['location'];
	  $coverphotothumb=$mediarow['details'];
	  $coverphotothumb==""?$coverphoto=$coverphoto:$coverphoto=$coverphotothumb;
	  $coverphoto==""?$coverphoto="./img/logo1.png":$coverphoto=$coverphoto;
      $maincoverphoto=$mediarow['location'];
    }

  $imgid=$mediarow['id'];
  $realimg=$mediarow['location'];
  $thumb=$mediarow['details'];
  $width=$mediarow['width'];
  $height=$mediarow['height'];
  $locationstack==""?$locationstack.=$host_addr.$realimg:$locationstack.=">".$host_addr.$realimg;
  $dimensionstack==""?$dimensionstack.=$width.",".$height:$dimensionstack.="|".$width.",".$height;
  $album.='
	  <div id="editimgs" name="albumimg'.$imgid.'">
	    <div id="editimgsoptions">
	      <div id="editimgsoptionlinks">
	        <a href="##" name="deletepic" data-id="'.$imgid.'"data-galleryid="'.$id.'"data-arraypoint="'.$count.'" data-src="'.$host_addr.''.$realimg.'"><img name="deletepic" src="../images/trashfirst.png" title="Delete this photo?" class="total"></a>
	        <a href="##" name="viewpic" data-id="'.$imgid.'" data-galleryid="'.$id.'" data-arraypoint="'.$count.'" data-src="'.$host_addr.''.$realimg.'"><img name="viewpic" src="../images/viewpicfirst.png" title="View full image" class="total"></a>                
	      </div>
	    </div>  
	    <img src=".'.$mediarow['details'].'" name="realimage" data-width="'.$width.'" data-height="'.$height.'" style="height:100%;margin:auto;">
	  </div>
  ';
  $vfalbum.='
  <div class="blogpostgalleryimgholdtwo">
      <img src="'.$host_addr.''.$mediarow['details'].'" data-id="'.$imgid.'" data-galleryid="'.$id.'" data-galleryname="bloggallerydata" data-arraypoint="'.$count.'" data-src="'.$host_addr.''.$realimg.'" style="height:100%;margin:auto;float:none;">
  </div>
  ';
  if($count<8){
  $locationstack2==""?$locationstack2.=$host_addr.$realimg:$locationstack2.=">".$host_addr.$realimg;
  $dimensionstack2==""?$dimensionstack2.=$width.",".$height:$dimensionstack2.="|".$width.",".$height;
  $valbum.='
  <div class="blogpostgalleryimgholdone">
      <img src="'.$mediarow['details'].'" data-id="'.$imgid.'" data-galleryid="'.$id.'" data-galleryname="bloggallerydata" data-arraypoint="'.$count.'" data-src="'.$host_addr.''.$realimg.'" style="height:100%;margin:auto;float:none;">
  </div>
  ';
  }
  $count++;
  }
  $valbum.='<input type="hidden" name="bloggallerydata'.$id.'" data-title="'.$title.'" data-mainimg="'.$host_addr.''.$maincoverphoto.'" data-images="'.$locationstack2.'" data-sizes="'.$dimensionstack2.'" data-details="">';
  $vfalbum.='<input type="hidden" name="bloggallerydata'.$id.'" data-title="'.$title.'" data-mainimg="'.$host_addr.''.$maincoverphoto.'" data-images="'.$locationstack.'" data-sizes="'.$dimensionstack.'" data-details="">';
  $row['valbum']=$valbum;
  $row['vfalbum']=$vfalbum;
  }
	$extraformdata='
		<div id="formend" >
		    <input type="hidden" name="gallerydata'.$id.'" data-title="'.$title.'" data-mainimg="'.$host_addr.''.$maincoverphoto.'" data-images="'.$locationstack.'" data-sizes="'.$dimensionstack.'" data-details=""/>
		    Edit Photos from this blog post album.<br>
		  '.$album.'
		  <div id="formend">
		    Add Gallery Photos for this post:<br>
		    <input type="hidden" name="piccount" value=""/>
		    <select name="photocount" class="curved2" title="Choose the amount of photos you want to upload, max of 10, then click below the selection to continue">
		    <option value="">--choose amount--</option>
		    '.$outselect.'
		    </select>             
		  </div>
		</div>
		<input type="hidden" name="blogentrytype" value="gallery"/>

	';
}
// $coverdata=getSingleMediaData($coverid,'id');

$row['maincoverphoto']=$coverphoto;
$admincover="../".$coverphoto;
$row['admincover']=$admincover;
$row['absolutecover']=$absolutecover;
$row['absolutecoverthumb']=$absolutecoverthumb;
$pagename=$row['pagename'];
$status=$row['status'];
$pagelink=''.$host_addr.'blog/'.$blogtypedata['foldername'].'/'.$pagename.'.php';
$rellink='./blog/'.$blogtypedata['foldername'].'/'.$pagename.'.php';
$row['pagelink']=$pagelink;
$row['rellink']=$rellink;
$row['pagedirectory']=''.$host_addr.'blog/'.$blogtypedata['foldername'].'/';
$row['reldirectory']='./blog/'.$blogtypedata['foldername'].'/';
$link='<a href="'.$pagelink.'" target="_blank" title="click to view this blog post">'.$title.'</a>';
$commentcontent='
	<div id="formend" name="minicommentsearchhold" style="">
	<font style="font-size:18px;">Comments</font><br>
		<div id="formend" name="commentsearchpanehold">
		After a search, if you want to view all comments again simply type in "<b>*fullcommentsview*</b>" to do so.<br>
		<input type="text" class="curved" name="minisearch'.$id.'" data-id="'.$id.'" title="Use this search bar to search by comment word, i.e offensive or in appropriate words or by comment poster name" Placeholder="Search for words within comments..."/>
		</div>
		 <input type="button" name="updateblogentry" style="max-width:150px;" value="Search" onClick="searchComment('.$id.')" class="submitbutton"/>
		<div id="formend" name="commentfullhold'.$id.'">
		'.$commentdata['commentout'].'
		</div>
	</div>
';
$row['viewercomment']=$commentdatatwo['vieweroutput'];
$row['commentcount']=$commentdatatwo['commentcount'];
$row['blogtypename']=$blogtypedata['name'];
$row['blogcatname']=$blogcategorydata['catname'];
//configure viewer output 
if($blogentrytype==""||$blogentrytype=="normal"){
$viewerbodyoutone='   <img src="'.$absolutecover.'"/>'.$introparagraph.'';
$linkcontentout="Continue Reading";
}elseif ($blogentrytype=="banner") {
  # code...
$viewerbodyoutone='<img src="'.$absolutecover.'" style="width:98%;max-height:660px;"/>';
$linkcontentout="View Banner";
}elseif ($blogentrytype=="gallery") {
  # code...
$viewerbodyoutone=$valbum;
$linkcontentout="View All Photos";
}
$row['adminoutput']='
	<tr data-id="'.$id.'">
		<td><img src="'.$absolutecover.'"style="height:150px;"/></td><td>'.$link.'</td><td>'.$blogtypedata['name'].'</td><td>'.$blogcategorydata['catname'].'</td><td>'.$commentdata['commentcount'].'</td><td>'.$views.'</td><td>'.$entrydate.'</td><td>'.$modifydate.'</td><td>'.$status.'</td><td name="trcontrolpoint"><a href="#&id='.$id.'" name="edit" data-type="editsingleblogpost" data-divid="'.$id.'">Edit</a></td>
	</tr>
	<tr name="tableeditcontainer" data-state="inactive" data-divid="'.$id.'">
		<td colspan="100%">
			<div id="completeresultdisplay" data-type="editmodal" data-load="unloaded" data-divid="'.$id.'">
				<div id="completeresultdisplaycontent" data-type="editdisplay" data-divid="'.$id.'">
									
				</div>
			</div>
		</td>
	</tr>
';
$blogplatformshares='
		<div id="blogplatformshares">
			<div class="fb-like" data-href="'.$pagelink.'" data-layout="box_count" data-action="like" data-show-faces="true" data-share="true"></div>
		</div>
		<div id="blogplatformshares">
			<div class="g-plusone" data-action="share" data-annotation="bubble" data-size="tall" data-href="'.$pagelink.'"></div>
		</div>
		<div id="blogplatformshares">
			<a href="https://twitter.com/share" class="twitter-share-button" data-related="twitterapi:midassoccer"data-count="vertical" data-url="'.$pagelink.'">Tweet</a>
		</div>
		<div id="blogplatformshares">
			<script type="IN/Share" data-url="'.$pagelink.'" data-counter="top"></script>
		</div>
';
$blogplatformminishares='
	<div class="minisharecontainers">
		<a href="http://www.facebook.com/sharer/sharer.php?s=100&p[url]='.$pagelink.'&p[images][0]='.$absolutecover.'&p[title]='.$title.'&p[summary]='.$headerdescription.'" target="_blank"><img src="../images/facebookshareimg.jpg"/></a>
	</div>
	<div class="minisharecontainers">
		<a href="http://www.linkedin.com/shareArticle?mini=true&amp;url='.$pagelink.'&amp;title='.$title.'&amp;summary='.$headerminidescription.'" target="_blank"><img alt="" src="'.$host_addr.'/images/linkedinshareimg.jpg" /></a>
	</div>
    <div class="minisharecontainers">
      <a href="http://twitter.com/home?status='.$pagelink.'" target="_blank"><img src="../images/twittershareimg.jpg"></a>
    </div>
    <div class="minisharecontainers">
    <a href="https://plus.google.com/share?url='.$pagelink.'"target="_blank">
      <img src="../images/googleshareimg.jpg">
    </a>
    </div>
';
$row['blogpageshare']='
	<div class="mainblogshare">
		<div class="fb-like" data-href="'.$pagelink.'" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
	</div>
	<div class="mainblogshare">
		<div class="g-plus" data-action="share" data-annotation="bubble" data-href="'.$pagelink.'"></div>
	</div>
	<div class="mainblogshare">
		<a href="https://twitter.com/share" class="twitter-share-button" data-url="'.$pagelink.'">Tweet</a>
	</div>
	<div class="mainblogshare">
		<script type="IN/Share" data-url="'.$pagelink.'" data-counter="right"></script>
	</div>
';
$horizontalshare='
	<div class="blogsharepoint">
			<a href="http://www.facebook.com/sharer/sharer.php?s=100&p[url]='.$pagelink.'&p[images][0]='.$absolutecover.'&p[title]='.$title.'&p[summary]='.$headerdescription.'" target="_blank" name="facebookpagelink">
				<div class="socialiconpoint facebookicon"></div>
			</a>
			<a href="http://twitter.com/home?status='.$pagelink.'" target="_blank" name="twitterpagelink">
				<div class="socialiconpoint twittericon"></div>
			</a>
			<a href="https://plus.google.com/share?url='.$pagelink.'" target="_blank" name="googlepluspagelink">
				<div class="socialiconpoint googleplusicon"></div>
			</a>
			<a href="http://www.linkedin.com/shareArticle?mini=true&amp;url='.$pagelink.'&amp;title='.$title.'&amp;summary='.$headerminidescription.'" target="_blank" name="linkedinpagelink">
				<div class="socialiconpoint linkedinicon"></div>
			</a>
		</div>
		';
$row['coverphotoset']==0?$floatsetout="Left":($row['coverphotoset']==1?$floatsetout="New Line":($row['coverphotoset']==2?$floatsetout="Right":$floatsetout=""));

$row['adminoutputtwo']='
	<script src="'.$host_addr.'scripts/js/tinymce/jquery.tinymce.min.js"></script>
	<script src="'.$host_addr.'scripts/js/tinymce/tinymce.min.js"></script>
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
		        filemanager_title:"Bayonle Arashi\'s Admin Blog Content Filemanager" ,
		        external_plugins: { "filemanager" : ""+host_addr+"scripts/filemanager/plugin.min.js"}
		});
		tinyMCE.init({
	        theme : "modern",
	        selector:"textarea#postersmalltwo",
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
	        toolbar2: "| link unlink anchor | emoticons",
	        image_advtab: true ,
	        editor_css:""+host_addr+"stylesheets/mce.css?"+ new Date().getTime(),
	        content_css:""+host_addr+"stylesheets/mce.css?"+ new Date().getTime(),
			external_filemanager_path:""+host_addr+"scripts/filemanager/",
		   	filemanager_title:"Bayonle Arashi\'s Admin Blog Content Filemanager" ,
		   	external_plugins: { "filemanager" : ""+host_addr+"scripts/filemanager/plugin.min.js"}
		});          
	</script>
	<div id="form" style="background-color:#fefefe;">
		<form action="../snippets/edit.php" name="editblogpost" method="post" enctype="multipart/form-data">
			<input type="hidden" name="entryvariant" value="editblogpost"/>
			<input type="hidden" name="entryid" value="'.$id.'"/>
			<div id="formheader">Edit '.$title.'</div>
				<div id="formend" style="'.$editcoverphotostyle.'">
					Change Cover Photo <br>
					<input type="file" placeholder="Choose image" name="profpic" class="curved"/>
				</div>
				<div id="formend" style="'.$editcoverphotofloatstyle.'">
				Cover Photo Float(Controls the position of the cover photo image, currently set to "'.$floatsetout.'")<br>
					<select name="coverstyle" class="curved2">
						<option value="">Change Status</option>
						<option value="0" title="The Blog text starts inline beside the cover photo on it\'s left">Left</option>
						<option value="1" title="The Blog text starts underneath the cover photo">New Line</option>
						<option value="2" title="The Blog text starts inline beside the cover photo on it\'s right">Right</option>
					</select>
				</div>
				<div id="formend">
				Manually share this post, this is done as a site user so if you want to post to a social account be sure to log in with that  account in the browser where this is opened first then share, don\'t worry the dialog box for sharing will have a login interface for you to do so unless you have logged in as someone else to any of these social networks, in that case you would have to logout and login as the social account required, then you can post. <br>
				<div id="elementholder" style="float:none; margin:auto;">
				'.$blogplatformminishares.'
				</div>
				</div>
				<div id="formend">
					Change Title<br>
					<input type="text" style="max-width:98%;width:87%;" placeholder="Blog Title" name="title" style="width:90%;" value="'.$title.'" class="curved"/>
				</div>
   					 '.$extraformdata.'
	            <div id="formend">
					Put Comments on or off for this post<br>
					<select name="commentsonoff" class="curved2">
						<option value="0" '.$commentsonselect.'>On</option>
						<option value="1" '.$commentsoffselect.'>Off</option>
					</select>
				</div>
				<div id="formend">
					Featured Post<br>
					<select name="featuredpost" class="curved2">
						<option value="no" '.$featuredonselect.'>No</option>
						<option value="yes" '.$featuredoffselect.'>Yes</option>
					</select>
				</div>
				<div id="formend" style="'.$editintroparagraphstyle.'">
					<span style="font-size:18px;">Change Introductory Paragraph:</span><br>
					<textarea name="introparagraph" id="postersmalltwo" Placeholder="" class="">'.$introparagraph.'</textarea>
				</div>
				<div id="formend" style="'.$editblogpoststyle.'">
					<span style="font-size:18px;">Change The Blog Post:</span><br>
					<textarea name="blogentry" id="adminposter" Placeholder="" class="curved3">'.$blogpost.'</textarea>
				</div>
				'.$commentcontent.'
				<div id="formend">
					Change Status<br>
					<select name="status" class="curved2">
						<option value="">Change Status</option>
						<option value="active">Active</option>
						<option value="inactive">Inactive</option>
					</select>
				</div>
			<div id="formend">
				<input type="submit" name="updateblogentry" value="Update" class="submitbutton"/>
			</div>
		</form>
	</div>
';


$row['blogminioutput']='
	<div class="col-md-12 blogminioutput">
		<img class="img-responsive" src="'.$absolutecover.'" />
	    <p class="date">'.$entrydate.'</p>
	    <div>'.$title.' <a href="'.$pagelink.'" target="_blank" data-ajax="false><span class="twoChevrons"><i class="fa fa-chevron-right smallChevron"></i><i class="fa fa-chevron-right smallChevron"></i></span></a></div>
    </div>

	<!--<div class="blogminihold">
		<div class="blogminiimghold">
			<img src="'.$absolutecover.'"/>
		</div>
		<div class="blogminidatehold"><i class="fa fa-calendar posabs blogdateimg"></i><span class="spandateday">'.$datedata.'</span> <span class="spandatemonth">'.$monthout.'</span></div>
		<div class="blogminititlehold"><a href="'.$pagelink.'" title="'.$headerdescription.'">'.$title.'</a></div>
	</div>-->
	<!--<div id="miniblogposthold">
		<a href="'.$pagelink.'" title="'.$headerdescription.'">
			<img src="'.$absolutecover.'"/>
			'.$title.'.</a>
			<span name="miniblogviewshold">Views '.$views.'</span><br><span name="miniblogviewshold">From '.$blogtypedata['name'].' under:<br> <span style="color:#F08D8D;">'.$blogcategorydata['catname'].'</span>
	</div>-->
';
$row['blogtinyoutput']='
	<div id="postundercat">
		<div id="postundercatleft"><a href="'.$pagelink.'">'.$title.'</a></div>
		<div id="postundercatright">'.$entrydate.'</div>
	</div>
';
$row['vieweroutput']='
	<div class="col-md-12 blogvieweroutput">
	    <img class="img-responsive newsBanner" src="'.$absolutecover.'" />
	    <h2 class="newsTitle">'.$title.' <a href="'.$pagelink.'" target="_blank" title="Continue reading this post"><i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right"></i></a></h2>
	    	'.$introparagraph.'
	    <a href="'.$pagelink.'" target="_blank" title="Continue reading this post"><span class="textRed">More</span></a>
	</div>
	<!--<div class="bloghold">
		<div class="blogheader">
			<p class="postdate">'.$datedata.' '.$monthout.' '.$yeardata.'</p>
			<p class="posttitle">'.$title.'</p>
		</div>
		<div class="blogcontent">
			<div class="blogdetails">
			'.$viewerbodyoutone.'
			</div>
			'.$horizontalshare.'
			<div class="blogheaderdetailsleft">
				By Bayonle Arashi, at '.$timedata.', in the Category <a href="'.$host_addr.'category.php?cid='.$blogtypeid.'" class="displayedlink" target="_blank" ><span name="titletype">'.$blogcategorydata['catname'].'</span></a>.Total Views '.$views.'.
			</div>
		</div>
		<div class="blogfooter">
			<a href="'.$pagelink.'" target="_blank" title="Continue reading this post">Continue Reading...</a>
		</div>
	</div>-->

	<!--<div id="bloghold">
		<div id="blogheader">
			<span name="title">'.$title.'.</span>
			<div id="blogheaderdetailshold">
				<div id="blogheaderdetailsleft">
					By Bayonle Arashi, On '.$entrydate.', in the Category <a href="'.$host_addr.'category.php?cid='.$blogtypeid.'" target="_blank"><span name="titletype">'.$blogcategorydata['catname'].'</span></a>.Total Views '.$views.'.
				</div>
				<div id="blogheaderdetailsright"><img src="./images/comments.png"/> '.$commentdata['commentcount'].' Comments</div>
			</div>
		</div>
		<div id="blogbody">
	      '.$viewerbodyoutone.'
			<div id="blogreadermorehold">
				<a href="'.$pagelink.'" target="_blank" title="Continue reading this post">'.$linkcontentout.'</a>
			</div>
		</div>
		<div id="blogfooter">
			'.$blogplatformshares.'
		</div>
	</div>-->
';
$row['vieweroutputtwo']='
	<div class="col-md-12 blogvieweroutputtwo">
		<img class="img-responsive" src="'.$coverphoto.'" />
	    <p class="date">'.$entrydate.'</p>
	    <div>'.$title.' <a href="'.$pagelink.'" target="_blank" data-ajax="false><span class="twoChevrons"><i class="fa fa-chevron-right smallChevron"></i><i class="fa fa-chevron-right smallChevron"></i></span></a></div>
    </div>
';
$row['jobpostingsmini']='
	 <div class="col-sm-12 newsItem" style="border-top: 1px solid #CCC; padding: 20px 0;">
        <img class="img-responsive" src="'.$absolutecover.'" />
        <h4>'.$title.' <a href="'.$pagelink.'"><span class="twoChevrons"><i class="fa fa-chevron-right smallChevron" style="font-size: 12px;"></i><i class="fa fa-chevron-right smallChevron" style="font-size: 12px;"></i></span></a></h4>
        <div>'.$introparagraph.' </div>
    </div>
';
$row['storiesminitwo']='
    
	 <div class="newsItem" style="border-top: 1px solid #CCC; padding: 20px 0;">
        <img class="img-responsive" src="'.$absolutecover.'" />
        <h4>'.$title.' <a href="'.$pagelink.'"><span class="twoChevrons"><i class="fa fa-chevron-right smallChevron" style="font-size: 12px;"></i><i class="fa fa-chevron-right smallChevron" style="font-size: 12px;"></i></span></a></h4>
        <div>'.$introparagraph.' </div>
    </div>
    
';
$row['storiesmini']='
	<li>
        <h4>'.$title.' <a href="'.$pagelink.'"><span class="twoChevrons"><i class="fa fa-chevron-right smallChevron"></i><i class="fa fa-chevron-right smallChevron"></i></span></a></h4>
        
       <div>'.$introparagraph.'</div>
    </li>
';
$row['jobpostingsminitwo']='
	<li>
        <h4>'.$title.' <a href="'.$pagelink.'"><span class="twoChevrons"><i class="fa fa-chevron-right smallChevron"></i><i class="fa fa-chevron-right smallChevron"></i></span></a></h4>
        
       <div>'.$introparagraph.'</div>
    </li>
';
return $row;
}
function getAllBlogEntries($viewer,$limit,$typeid,$type){
	global $host_addr,$host_target_addr;
$testit=strpos($limit,"-");
$testit!==false?$limit="":$limit=$limit;
// echo $testit."testitval".$limit;
$row=array();
$extratype="";
$extradata="";
// for extraparams
if(strpos($type,".cust.")){
	$typedata=explode(".cust.",$type);
	$type=$typedata[0];
	$extratype="".$typedata[1];
	if($extratype=="archive"){
		$extradata=$typedata[1];
	}
}
	// resultpruning secgtion
	$pager="Job Postings";
	$cquery="SELECT * FROM blogcategories WHERE catname LIKE '%$pager%'";
	$crun=mysql_query($cquery)or die(mysql_error()." line ".__LINE__);
	$cnumrows=mysql_num_rows($crun);
	$cnumrows>0?$crow=mysql_fetch_assoc($crun):$crow['id']=0;
	$monid1=$crow['id'];
	$monid1=$crow['id'];
	// resultpruning secgtion
	$pager="Stories";
	$cquery="SELECT * FROM blogcategories WHERE catname LIKE '%$pager%'";
	$crun=mysql_query($cquery)or die(mysql_error()." line ".__LINE__);
	$cnumrows=mysql_num_rows($crun);
	$cnumrows>0?$crow=mysql_fetch_assoc($crun):$crow['id']=0;
	$monid2=$crow['id'];
	$datout="AND blogcatid!=$monid1 AND blogcatid!=$monid2 ";
if(!is_array($viewer)&&$viewer=="admin"){	
if($type=="category"){
	if($limit==""){
		$query="SELECT * FROM blogentries WHERE blogcatid=$typeid order by id desc LIMIT 0,15";
		$rowmonitor['chiefquery']="SELECT * FROM blogentries WHERE blogcatid=$typeid order by id desc";
		// echo $query.$rowmonitor['chiefquery'];
	}else{
		$query="SELECT * FROM blogentries WHERE blogcatid=$typeid order by id desc $limit";
		$rowmonitor['chiefquery']="SELECT * FROM blogentries WHERE blogcatid=$typeid order by id desc";	
	}
}elseif ($type=="blogtype") {
	# code...
	if($limit==""){
		$query="SELECT * FROM blogentries WHERE blogtypeid=$typeid order by id desc LIMIT 0,15";
		$rowmonitor['chiefquery']="SELECT * FROM blogentries WHERE blogtypeid=$typeid order by id desc";
	}else{
		$query="SELECT * FROM blogentries WHERE blogtypeid=$typeid order by id desc $limit";
		$rowmonitor['chiefquery']="SELECT * FROM blogentries WHERE blogtypeid=$typeid order by id desc";	
	}
}
}else if(!is_array($viewer)&&$viewer=="viewer"){
if($type=="category"){
	if($limit==""){
	$query="SELECT * FROM blogentries WHERE blogcatid=$typeid $datout AND status='active' order by id desc LIMIT 0,15";
	$rowmonitor['chiefquery']="SELECT * FROM blogentries WHERE blogcatid=$typeid AND status='active' order by id desc";
	// echo $query.$rowmonitor['chiefquery'];
	}else{
	$query="SELECT * FROM blogentries WHERE blogcatid=$typeid $datout AND status='active' order by id desc $limit";
	$rowmonitor['chiefquery']="SELECT * FROM blogentries WHERE blogcatid=$typeid $datout AND status='active' order by id desc";	
	}
}elseif($type=="jobposting"||$type=="stories"){
	// check for jobposting/stories category
	$pager=$type=="jobposting"?"Job Postings":"Stories";
	$cquery="SELECT * FROM blogcategories WHERE catname LIKE '%$pager%'";
	$crun=mysql_query($cquery)or die(mysql_error()." line ".__LINE__);
	$cnumrows=mysql_num_rows($crun);
	$cnumrows>0?$crow=mysql_fetch_assoc($crun):$crow['id']=0;
	$typeid=$crow['id'];
	// echo $typeid." Category id";
	// end
	if($limit==""){
		$query="SELECT * FROM blogentries WHERE blogcatid=$typeid AND status='active' order by id desc LIMIT 0,15";
		$rowmonitor['chiefquery']="SELECT * FROM blogentries WHERE blogcatid=$typeid AND status='active' order by id desc";
		// echo $query.$rowmonitor['chiefquery'];
	}else{
		$query="SELECT * FROM blogentries WHERE blogcatid=$typeid AND status='active' order by id desc $limit";
		$rowmonitor['chiefquery']="SELECT * FROM blogentries WHERE blogcatid=$typeid AND status='active' order by id desc";	
	}
}elseif ($type=="blogtype") {
	# code...
if($limit==""){
	$query="SELECT * FROM blogentries WHERE blogtypeid=$typeid $datout AND status='active' order by id desc LIMIT 0,15";
	$rowmonitor['chiefquery']="SELECT * FROM blogentries WHERE blogtypeid=$typeid $datout AND status='active' order by id desc";
}else{
	$query="SELECT * FROM blogentries WHERE blogtypeid=$typeid AND status='active' order by id desc $limit";
	$rowmonitor['chiefquery']="SELECT * FROM blogentries WHERE blogtypeid=$typeid $datout AND status='active' order by id desc";	
}
}
}elseif (is_array($viewer)) {
  # code...
$rviewer=$viewer[0];
if($rviewer=="admin"&&$limit==""){
$query=$viewer[1]." LIMIT 0,15";
$rowmonitor['chiefquery']=$viewer[1];
}else if($rviewer=="admin"&&$limit!==""){
$query=$viewer[1].$limit;
$rowmonitor['chiefquery']=$viewer[1];
}elseif($rviewer=="viewer"&&$limit==""){
$query=$viewer[1]." AND status='active' LIMIT 0,15";
$rowmonitor['chiefquery']=$viewer[1];
}elseif ($rviewer=="viewer"&&$limit!=="") {
  # code...
$query=$viewer[1]." AND status='active'$limit";
$rowmonitor['chiefquery']=$viewer[1];
}
$type="search";
}
// echo $query."<br>";
$run=mysql_query($query)or die(mysql_error()." Line 1384");
$numrows=mysql_num_rows($run);
$arcquery="SELECT * , COUNT(`year`) AS  `count` FROM blogentries WHERE status ='active' GROUP BY id ORDER BY year DESC $limit"; 
$arcrun=mysql_query($arcquery)or die(mysql_error()." ".__LINE__);
$arcnumrows=mysql_num_rows($arcrun);
$row['adminoutput']="No Entries yet here";
$row['vieweroutput']="No Entries yet here";
$row['tinyoutput']="<div id=\"postundercat\">No more entries here</div>";
$row['popularposts']="<br>No posts here yet";
$row['recentposts']="<br>No Posts here yet";
$row['adminoutputtwo']="";
$row['vieweroutputtwo']="";	
$row['viewerpostslide']="";	
$row['viewerpostslidetwo']="";	
$row['viewerekooutputone']="Sorry No posts Yet";	
$row['viewerekooutputtwo']="Sorry No posts Yet";	
$row['newsposthold']="Sorry No Posts Yet";	
$row['newspostmini']="Sorry No posts Yet";	
$row['chiefquery']=$rowmonitor['chiefquery'];
$row['numrows']=$numrows;
$viewerekooutputone="Sorry No posts Yet";
$viewerekooutputtwo="Sorry No posts Yet";
$newspostcount=0;
$adminoutput="Sorry No posts Yet";
$vieweroutput="Sorry No posts Yet";
$vieweroutputtwo="";
$vieweroutputthree="";
$storiesmini="No posts Yet";
$storiesminitwo="No posts Yet";
$jobpostingsmini="No posts Yet";
$jobpostingsminitwo="No posts Yet";
$viewerekooutputone="Sorry No posts Yet";
$viewerekooutputtwo="Sorry No posts Yet";
$newsposthold="Sorry No posts Yet";
$newspostmini="Sorry No posts Yet";
$tinyoutput="";
if($numrows>0){
	$adminoutput="";
	$vieweroutput="";
	$vieweroutputtwo="";
	$storiesmini="";
	$storiesminitwo="";
	$jobpostingsmini="";
	$jobpostingsminitwo="";
	$viewerekooutputone="";
	$viewerekooutputtwo="";
	$newsposthold="";
	$newspostmini="";
	$tinyoutput="";
	$row['adminoutput']="";
	$row['vieweroutput']="";
	$row['tinyoutput']="";

	while($row=mysql_fetch_assoc($run)){
		$id=$row['id'];
		$blogpostdata=getSingleBlogEntry($id);
		$vieweroutput.=$blogpostdata['vieweroutput'];		
		$storiesmini.=$blogpostdata['storiesmini'];		
		$storiesminitwo.=$blogpostdata['storiesminitwo'];		
		$jobpostingsmini.=$blogpostdata['jobpostingsmini'];		
		$jobpostingsminitwo.=$blogpostdata['jobpostingsminitwo'];		
		$adminoutput.=$blogpostdata['adminoutput'];
		if($newspostcount>-1&&$newspostcount<4){
			$vieweroutputtwo.=$blogpostdata['vieweroutputtwo'];		
		}

		$newspostcount++;
		$tinyoutput.=$blogpostdata['blogtinyoutput'];
	}
}
$top='<table id="resultcontenttable" cellspacing="0">
			<thead><tr><th>Coverphoto</th><th>PageAddress</th><th>Blogtype</th><th>Category</th><th><img src="'.$host_addr.'images/comments.png" style="height:20px;margin:auto;"></th><th>Views</th><th>PostDate</th><th>LastModified</th><th>Status</th><th>View/Edit</th></tr></thead>
			<tbody>';
$bottom='	</tbody>
		</table>';
$outs=paginatejavascript($rowmonitor['chiefquery']);
$outsviewer=paginate($rowmonitor['chiefquery']);
  $testq=strpos($rowmonitor['chiefquery'],"%'");
  if($testq===0||$testq===true||$testq>0){
	$rowmonitor['chiefquery']=str_replace("%","%'",$rowmonitor['chiefquery']);
  }
$paginatetop='
<div id="paginationhold">
	<div class="meneame">
		<input type="hidden" name="curquery" value="'.$rowmonitor['chiefquery'].'"/>
		<input type="hidden" name="outputtype" value="blogpost'.$type.'"/>
		<input type="hidden" name="currentview" data-ipp="15" data-page="1" value="1"/>
		<div class="pagination" data-name="paginationpageshold">'.$outs['pageout'].'</div>
		<div class="pagination">
			  '.$outs['usercontrols'].'
		</div>
	</div>
</div>
<div id="paginateddatahold" data-name="contentholder">';

$paginatebottom='
</div><div id="paginationhold">
	<div class="meneame">
		<div class="pagination" data-name="paginationpageshold">'.$outs['pageout'].'</div>
	</div>
</div>';
$row['paginatetop']='
	<div id="paginationhold">
		<div class="meneametwo">
			<input type="hidden" name="curquery" data-target="blogpost'.$type.''.$extratype.'" value="'.$rowmonitor['chiefquery'].'"/>
			<input type="hidden" name="outputtype" data-target="blogpost'.$type.''.$extratype.'" value="blogpost'.$type.''.$extratype.'"/>
			<input type="hidden" name="currentview" data-target="blogpost'.$type.''.$extratype.'" data-ipp="15" data-page="1" value="1"/>
			<div class="pagination" data-name="paginationpagesholdtwo" data-target="blogpost'.$type.''.$extratype.'">'.$outs['pageout'].'</div>
			<div class="pagination" data-target="blogpost'.$type.''.$extratype.'">
				  '.$outs['usercontrols'].'
			</div>
		</div>
	</div>
';

$row['paginatebottom']='
	<div id="paginationhold">
		<div class="meneametwo">
			<div class="pagination" data-name="paginationpagesholdtwo" data-target="blogpost'.$type.''.$extratype.'">'.$outs['pageout'].'</div>
		</div>
	</div>
';
$row['adminoutput']=$paginatetop.$top.$adminoutput.$bottom.$paginatebottom;
$row['adminoutputtwo']=$top.$adminoutput.$bottom;
$row['vieweroutput']=$vieweroutput;
$row['vieweroutputtwo']=$vieweroutputtwo;
$row['storiesmini']=$storiesmini;	
$row['storiesminitwo']=$storiesminitwo;	
$row['jobpostingsmini']=$jobpostingsmini;	
$row['jobpostingsminitwo']=$jobpostingsminitwo;	
$row['chiefquery']=$rowmonitor['chiefquery'];
$row['tinyoutput']=$tinyoutput;
$row['numrows']=$numrows;
// produce recent blog posts

$recents="No Posts yet";
$popular="No posts yet";
$featured="No posts yet";
$jobposting="No posts yet";
$stories="No posts yet";
if($viewer=="viewer"){
	$recquery="SELECT * FROM blogentries WHERE status='active' $datout order by id desc LIMIT 0,5";
	$recrun=mysql_query($recquery)or die(mysql_error()." Line 1835");
	$recnumrows=mysql_num_rows($recrun);
	if($recnumrows>0){
		$recents="";
		while($recrow=mysql_fetch_assoc($recrun)){
		$outrec=getSingleBlogEntry($recrow['id']);

		$recents.=$outrec['blogminioutput'];
		}
		}
		// produce popular blog posts
		$popquery="SELECT * FROM blogentries WHERE status='active' $datout order by views desc LIMIT 0,5";
		$poprun=mysql_query($popquery)or die(mysql_error()." Line 1835");
		$popnumrows=mysql_num_rows($poprun);
		if($popnumrows>0){
		$popular="";
		while($poprow=mysql_fetch_assoc($poprun)){
		$outpop=getSingleBlogEntry($poprow['id']);
		$popular.=$outpop['blogminioutput'];
		}
		}
		// produce featured blog posts
		$featuredquery="SELECT * FROM blogentries WHERE featuredpost='yes' $datout AND status='active' order by id desc LIMIT 0,2";
		$featuredrun=mysql_query($featuredquery)or die(mysql_error()." Line ".__LINE__);
		$featurednumrows=mysql_num_rows($featuredrun);
		if($featurednumrows>0){
		$featured="";
		while($featuredrow=mysql_fetch_assoc($featuredrun)){
		$outfeatured=getSingleBlogEntry($featuredrow['id']);
		$featured.=$outfeatured['blogminioutput'];
		}
		}

		// produce jobposts blog posts
		// check for jobposting/stories category
		$pager="job posting";
		$cquery="SELECT * FROM blogcategories WHERE catname LIKE '%$pager%'";
		$crun=mysql_query($cquery)or die(mysql_error()." line ".__LINE__);
		$cnumrows=mysql_num_rows($crun);
		$cnumrows>0?$crow=mysql_fetch_assoc($crun):$crow['id']=0;
		$typeid=$crow['id'];
		$featuredquery="SELECT * FROM blogentries WHERE blogcatid='$typeid' AND status='active' order by id desc LIMIT 0,5";
		$featuredrun=mysql_query($featuredquery)or die(mysql_error()." Line ".__LINE__);
		// echo $featuredquery;
		$featurednumrows=mysql_num_rows($featuredrun);
		if($featurednumrows>0){
		$jobposting="";
		while($featuredrow=mysql_fetch_assoc($featuredrun)){
		$outfeatured=getSingleBlogEntry($featuredrow['id']);
		$jobposting.=$outfeatured['jobpostingsminitwo'];
		}
		}
		// produce stories blog posts
		// check for jobposting/stories category
		$pager="stories";
		$cquery="SELECT * FROM blogcategories WHERE catname LIKE '%$pager%'";
		$crun=mysql_query($cquery)or die(mysql_error()." line ".__LINE__);
		$cnumrows=mysql_num_rows($crun);
		$cnumrows>0?$crow=mysql_fetch_assoc($crun):$crow['id']=0;
		$typeid=$crow['id'];
		$featuredquery="SELECT * FROM blogentries WHERE blogcatid='$typeid' AND status='active' order by id desc LIMIT 0,5";
		$featuredrun=mysql_query($featuredquery)or die(mysql_error()." Line ".__LINE__);
		$featurednumrows=mysql_num_rows($featuredrun);
		if($featurednumrows>0){
		$stories="";
		while($featuredrow=mysql_fetch_assoc($featuredrun)){
		$outfeatured=getSingleBlogEntry($featuredrow['id']);
		$stories.=$outfeatured['storiesmini'];
		}
		}
	}
	$row['popularposts']=$popular;
	$row['recentposts']=$recents;
	$row['featuredposts']=$featured;
	$row['latestjobpostings']=$jobposting;
	$row['lateststories']=$stories;
	return $row;
}

function blogPageCreate($blogentryid){
	global $host_addr,$host_addr_root,$host_target_addr,$host_keywords,$disqus_shortname;
$outs=getSingleBlogEntry($blogentryid);
$c="";
if(isset($_GET['c'])&&$_GET['c']){
    $c=$_GET['c'];
  }
  $alerter="";
if($c=="true"){
$alerter="Thank you for dropping your comment, we will approve it at our end if its appropriate and then it will be available for all to see.<br>";
}
$securitynumber=rand(0,10).rand(1,8).rand(0,5).rand(10,30).rand(200,250).rand(50,80).rand(34,55).rand(46,57);
$blogtypeid=$outs['blogtypeid'];
$blogcatid=$outs['blogcatid'];
$outs2=getSingleBlogType($outs['blogtypeid']);
$outs3=getSingleBlogCategory($outs['blogcatid']);
$coverset=$outs['coverphotoset'];
$coverstyle="";
if($coverset==1){
$coverstyle='style="float:none; display:block; margin:auto;"';
}else if($coverset==2){$coverstyle='style="float:right;"';
}
// $logocontrol='<img src="'.$host_addr.'images/bayonlearashi.png" class="total">';
// resultpruning secgtion
	$pager="Job Postings";
	$cquery="SELECT * FROM blogcategories WHERE catname LIKE '%$pager%'";
	$crun=mysql_query($cquery)or die(mysql_error()." line ".__LINE__);
	$cnumrows=mysql_num_rows($crun);
	$cnumrows>0?$crow=mysql_fetch_assoc($crun):$crow['id']=0;
	$monid1=$crow['id'];
	$monid1=$crow['id'];
	// resultpruning secgtion
	$pager="Stories";
	$cquery="SELECT * FROM blogcategories WHERE catname LIKE '%$pager%'";
	$crun=mysql_query($cquery)or die(mysql_error()." line ".__LINE__);
	$cnumrows=mysql_num_rows($crun);
	$cnumrows>0?$crow=mysql_fetch_assoc($crun):$crow['id']=0;
	$monid2=$crow['id'];
	$datout="AND blogcatid!=$monid1 AND blogcatid!=$monid2 ";
$headerdescription = convert_html_to_text($outs['introparagraph']);
$headerdescription=html2txt($headerdescription);
$nextblogout="End of posts here";
$nextlink="##";
$nextquery="SELECT * FROM blogentries WHERE blogtypeid=$blogtypeid $datout AND id>$blogentryid AND status='active'";
$nextrun=mysql_query($nextquery)or die(mysql_error()." Line 1847");
$nextnumrows=mysql_num_rows($nextrun);
if($nextnumrows>0){
	$nextrow=mysql_fetch_assoc($nextrun);
$nextouts=getSingleBlogEntry($nextrow['id']);
	$nextblogout=$nextouts['title'];
	$nextlink=$nextouts['pagelink'];
}

$prevblogout="End of posts here";
$prevlink="##";
$prevquery="SELECT * FROM blogentries WHERE blogtypeid=$blogtypeid $datout AND id<$blogentryid AND status='active' ORDER BY id DESC";
// $previd=$blogentryid-1;
$prevrun=mysql_query($prevquery)or die(mysql_error()." Line 1847");
$prevnumrows=mysql_num_rows($prevrun);
if($prevnumrows>0){
	$prevrow=mysql_fetch_assoc($prevrun);	
$prevouts=getSingleBlogEntry($prevrow['id']);
	$prevblogout=$prevouts['title'];
	$prevlink=$prevouts['pagelink'];
}

// produce recent blog posts
$recents="";
$recquery="SELECT * FROM blogentries WHERE status='active' $datout order by id desc LIMIT 0,3";
$recrun=mysql_query($recquery)or die(mysql_error()." Line 1835");
while($recrow=mysql_fetch_assoc($recrun)){
$outrec=getSingleBlogEntry($recrow['id']);
$recents.=$outrec['blogminioutput'];
}
// produce recent SPECIFIC blog posts
$recentspecific="";
$recquery="SELECT * FROM blogentries WHERE blogtypeid=$blogtypeid $datout AND status='active' order by id desc LIMIT 0,3";
$recrun=mysql_query($recquery)or die(mysql_error()." Line 1835");
while($recrow=mysql_fetch_assoc($recrun)){
$outrec=getSingleBlogEntry($recrow['id']);
$recentspecific.=$outrec['blogminioutput'];
}
// produce popular blog posts
$popular="";
$popquery="SELECT * FROM blogentries WHERE status='active' $datout order by views desc LIMIT 0,3";
$poprun=mysql_query($popquery)or die(mysql_error()." Line 1835");
while($poprow=mysql_fetch_assoc($poprun)){
$outpop=getSingleBlogEntry($poprow['id']);
$popular.=$outpop['blogminioutput'];
}
// produce popular SPECIFIC blog posts
$popularspecific="";
$popquery="SELECT * FROM blogentries WHERE blogtypeid=$blogtypeid $datout AND status='active' order by views desc LIMIT 0,3";
$poprun=mysql_query($popquery)or die(mysql_error()." Line 1835");
while($poprow=mysql_fetch_assoc($poprun)){
$outpop=getSingleBlogEntry($poprow['id']);
$popularspecific.=$outpop['blogminioutput'];
}
	$featured="No posts yet";
	// produce featured blog posts
	$featuredquery="SELECT * FROM blogentries WHERE featuredpost='yes' $datout AND status='active' order by id desc LIMIT 0,2";
	$featuredrun=mysql_query($featuredquery)or die(mysql_error()." Line ".__LINE__);
	$featurednumrows=mysql_num_rows($featuredrun);
	if($featurednumrows>0){
	$featured="";
	while($featuredrow=mysql_fetch_assoc($featuredrun)){
	$outfeatured=getSingleBlogEntry($featuredrow['id']);
	$featured.=$outfeatured['blogminioutput'];
	}
	}
//
$catpostsquery="SELECT * FROM blogentries WHERE blogcatid=$blogcatid $datout AND blogtypeid=$blogtypeid AND id<$blogentryid AND status='active' order by id desc";
$catpostrun=mysql_query($catpostsquery)or die(mysql_error()." Line 1867");
$catnumrow=mysql_num_rows($catpostrun);
$tinyoutput="No more posts for this ";
$count=0;
$catids=array();
$curlastid="";
if($catnumrow>0){
  // echo $catnumrow;
$tinyoutput="";
while($catpostrow=mysql_fetch_assoc($catpostrun)){
$outcatpost=getSingleBlogEntry($catpostrow['id']);
$catids[]=$catpostrow['id'];
if($count<15){
  // echo "inhere";
$tinyoutput.=$outcatpost['blogtinyoutput'];
$curlastid=$catpostrow['id'];
}
$count++;
}
}
$lastvalidkey=array_search($curlastid,$catids);
if($lastvalidkey<1||$lastvalidkey==""){
$nextcatpostentryid=0;
}else{
$catpostnextid=$lastvalidkey+1;
if(array_key_exists($catpostnextid,$catids)){

$nextcatpostentryid=$catids[$catpostnextid];
}else{
	$nextcatpostentryid="";
}
if(!in_array($nextcatpostentryid,$catids)){
$nextcatpostentryid=0;
}
}
$commentcount=$outs['commentcount'];
if($commentcount>0){
$comments=$outs['viewercomment'];
}else{
	$comments="No comments yet";
}
$subimgpos='';
$pagetag="";
$feedjitsidebar="";
$quoteout="";
$pagetypemini="";

$pagesidecontent='
<div id="adcontentholdlong" style="">
	<div class="contentholdertitle">RECENT</div>
	'.$recents.'
</div>
<div id="adcontentholdlong" style="">
	<div class="contentholdertitle">POPULAR</div>
	'.$popular.'
</div>
<div id="adcontentholdlong" style="" name="feedjit">
	<div class="contentholdertitle">ACTIVITY</div>
	  '.$feedjitsidebar.'  
</div>
';
$advertsidecontent='';
$advertbottomcontent='';
$adbannerquery="SELECT * FROM adverts WHERE type='banneradvert' and activepage='$pagetypemini' AND status='active' OR type='banneradvert' and activepage='all' AND status='active' order by id desc";
$adbannerrun=mysql_query($adbannerquery)or die(mysql_error()."Line 2497");
$adbannernumrow=mysql_num_rows($adbannerrun);
if($adbannernumrow>0){
	while($adbannerrow=mysql_fetch_assoc($adbannerrun)){
	$adid=$adbannerrow['id'];
	$outbanner=getSingleAdvert($adid);
	$advertbottomcontent.=$outbanner['vieweroutput'];
	}
}
$adminiquery="SELECT * FROM adverts WHERE type='miniadvert' and activepage='$pagetypemini' AND status='active' OR type='videoadvert' and activepage='$pagetypemini' AND status='active' OR type='miniadvert' and activepage='all' AND status='active' OR type='videoadvert' and activepage='all' AND status='active' order by id desc";
$adminirun=mysql_query($adminiquery)or die(mysql_error()."Line 2497");
$admininumrow=mysql_num_rows($adminirun);
if($admininumrow>0){
while($adminirow=mysql_fetch_assoc($adminirun)){
$adid=$adminirow['id'];
$outmini=getSingleAdvert($adid);
$advertsidecontent.=$outmini['vieweroutput'];
}
}
$outgallery=getAllGalleries("viewer","");
// echo $headerdescription;
$maincontentstyle="";
$adcontentholdstyle="";
$adcontentholdlongstyle="";
if($outs['blogentrytype']==""||$outs['blogentrytype']=="normal"){
$blogdisplayoutput='
    <img class="blogcoverphoto" '.$coverstyle.' src="'.$outs['absolutecover'].'"/>
    '.$outs['blogpostout'].'
';
}elseif ($outs['blogentrytype']=="gallery") {
  # code...
  $blogdisplayoutput=$outs['vfalbum'];
}elseif ($outs['blogentrytype']=="banner") {
  # code...
$blogdisplayoutput='
<img src="'.$outs['bannermain'].'" style="width:100%;"/>
';
$maincontentstyle='style="width:100%;"';
$adcontentholdstyle='style="width:100%;"';
$adcontentholdlongstyle='
<style type="text/css">
  #adcontentholdlong{
  float: left;
margin-left: 6%;
max-width: 258px;
}
</style>
';
}
$outputs=array();
$bgstyle[0]="blogpagemain";
$bgstyle[1]="blogpageone";
$bgstyle[2]="blogpagetwo";
$bgstyle[3]="blogpagethree";
$bgout=$bgstyle[rand(0,count($bgstyle)-1)];
$outputs['outputpageone']="";
$ga="
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-XXXXXXXX-1', 'yourwewbsite.com');
  ga('send', 'pageview');

</script>
";
$ogimage=str_replace(" ","%20",$outs['absolutecover']);
$facebooksdk='<div id="fb-root"></div><script>  window.fbAsyncInit = function() {    FB.init({      appId      : \'1406231673004362\',      xfbml      : true,      version    : \'v2.2\'    });  };  (function(d, s, id){     var js, fjs = d.getElementsByTagName(s)[0];     if (d.getElementById(id)) {return;}     js = d.createElement(s); js.id = id;     js.src = "//connect.facebook.net/en_US/sdk.js";     fjs.parentNode.insertBefore(js, fjs);   }(document, \'script\', \'facebook-jssdk\'));</script><!-- For google plus --><script type="text/javascript">  (function() {    var po = document.createElement(\'script\'); po.type = \'text/javascript\'; po.async = true;    po.src = \'https://apis.google.com/js/platform.js\';    var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(po, s);  })();</script><!-- For twitter --><script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?\'http\':\'https\';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+\'://platform.twitter.com/widgets.js\';fjs.parentNode.insertBefore(js,fjs);}}(document, \'script\', \'twitter-wjs\');</script><!-- For LinkedIn --><script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: en_US</script><script type="text/javascript">// console.log(typeof(FB ))  if(typeof(FB)=="undefined"){  }else{  FB.XFBML.parse();  }  if(typeof(twttr)=="undefined"){  }else{  twttr.widgets.load();  }  if(typeof(IN)=="undefined"){  }else{      IN.parse();  }</script><script>if(typeof($.mobile)=="undefined"){  var windowheight=$(window).height();$(\'div#main\').css("min-height",""+windowheight+"px");}</script>';
$panelsnippet='
';
		!isset($activemainlink)?$activemainlink="":$activemainlink=$activemainlink;
		!isset($activemainlink2)?$activemainlink2="":$activemainlink2=$activemainlink2;
		!isset($activemainlink3)?$activemainlink3="":$activemainlink3=$activemainlink3;
		!isset($activemainlink4)?$activemainlink4="":$activemainlink4=$activemainlink4;
		!isset($activemainlink5)?$activemainlink5="":$activemainlink5=$activemainlink5;
		!isset($activemainlink6)?$activemainlink6="":$activemainlink6=$activemainlink6;
		!isset($activemainlink7)?$activemainlink7="":$activemainlink7=$activemainlink7;


$outstwo=getAllGeneralInfo("viewer","productservices","");
!isset($activepage)?$activepage=" ":$activepage=$activepage;
$responsivelinkpaneldisplay='
	
';

/*content reorganised*/
$topout='
	<!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <!-- Add your site or application content here -->
    <!-- Navigation -->
	<header>
	        <nav class="navbar navbar-default">
	            <div class="container">
	                <!-- Brand and toggle get grouped for better mobile display -->
	                <div class="navbar-header">
	                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	                        <span class="sr-only">Toggle navigation</span>
	                        <span class="icon-bar"></span>
	                        <span class="icon-bar"></span>
	                        <span class="icon-bar"></span>
	                    </button>
	                    <a class="navbar-brand" href="'.$host_addr_root.'#">
	                        <img alt="Brand" src="'.$host_addr_root.'img/logo1.png">
	                    </a>
	                </div>

	                <!-- Collect the nav links, forms, and other content for toggling -->
	                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	                    <ul class="nav navbar-nav">
	                        <li><a href="'.$host_addr_root.'index.php">Home <span class="sr-only">(current)</span></a></li>
	                        <li class="dropdown aboutLi">
	                            <a href="'.$host_addr_root.'#" class="dropdown-toggle" data-hover="dropdown" role="button" aria-expanded="false">About Us<span class="caret"></span></a>
	                            <ul class="dropdown-menu" role="menu">
	                                <li><a href="'.$host_addr_root.'about.php#history">Our History</a></li>
	                                <li><a href="'.$host_addr_root.'about.php#mission">Our Mission</a></li>
	                                <li><a href="'.$host_addr_root.'about.php#team">Management Team</a></li>
	                            </ul>
	                        </li>
	                        <li class="dropdown productsLi">
	                            <a href="'.$host_addr_root.'#" class="dropdown-toggle" data-hover="dropdown" role="button" aria-expanded="false">Products<span class="caret"></span></a>
	                            <ul class="dropdown-menu" role="menu">
                                   '.$outstwo['vieweroutputmini'].'
	                            </ul>
	                        </li>
	                        <li class="dropdown investorLi">
	                            <a href="'.$host_addr_root.'#" class="dropdown-toggle" data-hover="dropdown" role="button" aria-expanded="false">Investor Relations<span class="caret"></span></a>
	                            <ul class="dropdown-menu" role="menu">
	                                <li>
	                                    <a href="'.$host_addr_root.'investor-relations.php#financialHighlights">Financial Highlights</a>
	                                </li>
	                                <li>
	                                    <a href="'.$host_addr_root.'investor-relations.php#annualReports">Annual Report</a>
	                                </li>
	                                <li>
	                                    <a href="'.$host_addr_root.'investor-relations.php#balanceSheet">Balance Sheet</a>
	                                </li>
	                                <li>
	                                    <a href="'.$host_addr_root.'investor-relations.php#profitLoss">Profit &amp; Loss</a>
	                                </li>
	                            </ul>
	                        </li>
	                        <li class="dropdown mediaLi">
	                            <a href="'.$host_addr_root.'#" class="dropdown-toggle" data-hover="dropdown" role="button" aria-expanded="false">Media<span class="caret"></span></a>
	                            <ul class="dropdown-menu" role="menu">
	                                <li>
	                                    <a href="'.$host_addr_root.'media.php#latestNews">Latest News</a>
	                                </li>
	                                <li>
	                                    <a href="'.$host_addr_root.'media.php#photoGallery">Photo Gallery</a>
	                                </li>
	                                <li>
	                                    <a href="'.$host_addr_root.'media.php#awards">Awards &amp; Ratings</a>
	                                </li>
	                            </ul>
	                        </li>
	                        <li class="careerLi"><a href="'.$host_addr_root.'careers.php">Career</a></li>
	                        <li class="dropdown contactLi">
	                            <a href="'.$host_addr_root.'#" class="dropdown-toggle" data-hover="dropdown" role="button" aria-expanded="false">Contact Us<span class="caret"></span></a>
	                            <ul class="dropdown-menu" role="menu">
	                                <li>
	                                    <a href="'.$host_addr_root.'contact-us.php#headOffice">Head Office</a>
	                                </li>
	                                <li>
	                                    <a href="'.$host_addr_root.'contact-us.php#branchLocator">Branch Locator</a>
	                                </li>
	                            </ul>
	                        </li>
	                    </ul>

	                </div><!-- /.navbar-collapse -->
	            </div><!-- /.container-fluid -->
	    	</nav>
	</header>
';
$followonposts='
	<div id="prevpostscategory">
        <div class="plainheader">Previous Posts Under '.$outs3['catname'].'</div>
        <div id="postundercathold">
	        <div style="background: rgba(71, 43, 5, 0.51);">
              '.$tinyoutput.'
              </div>
            <div id="formend" name="waitinghold"style="min-height:0px;"></div>
            <a href="'.$host_addr.'category.php?cid='.$blogcatid.'" name="moreposts" data-catid="'.$blogtypeid.'">View More Posts</a>
        </div>
      </div>
      <div id="authorintro">
			<p class="authorimg"><img src="../../images/bgimgs/portfolio/P1010312.JPG"/></p>
			<div class="contentholdertitle">
				HELLO!! I\'M BAYONLE ARASHI 
			</div>
			 <p class="authorintrotext">a seasoned Broadcast Entrepreneur, Football Entrepreneur, Scout, Football Analyst and Broadcast Content Provider.<br>
			 This is my official blog, you can check out the rest of my site for more, and if you like this post remember to like the page or link back to it, thanks and God bless.</p>
	  </div>
';
$commentsoutput='
		<div class="plainheader">Comments</div>
		  <div id="commentsholder">
		  '.$alerter.'
		  '.$outs['viewercomment'].'
		  </div>

        <div id="form" appdata-name="commentsform" style="background-color:#fefefe;">
          <form action="'.$host_addr.'snippets/basicsignup.php" name="blogcommentform" method="post">
            <input type="hidden" name="entryvariant" value="createblogcomment"/>
            <input type="hidden" name="sectester" value="'.$securitynumber.'"/>
            <input type="hidden" name="blogentryid" value="'.$blogentryid.'"/>
            <div id="formheader">Add a Comment</div>
            * means the field is required.
            <div id="formend">
              <div id="elementholder">
                Name *
                <input type="text" name="name" Placeholder="Firstname Lastname" class="curved"/>
              </div>
              <div id="elementholder">
                Email *
                <input type="text" name="email" Placeholder="Your email here" class="curved"/>
              </div>
              <div id="elementholder">
                Security('.$securitynumber.');
                <input type="text" name="secnumber" Placeholder="The above digits here" class="curved"/>
              </div>
              <div id="formend">
                Comment:
                <textarea name="comment" id="postersmall" Placeholder="" class="curved3"></textarea>
              </div>
            </div>

            <div id="formend">
              <input type="button" name="createblogcomment" value="Submit" class="submitbutton"/>
              <br><!--By clicking the submit button, you are agreeing to:-->
            </div>
          </form>
        </div>
';
$disqusoutput='
	<div id="disqus_thread"></div>
	<script type="text/javascript">
	    /* * * CONFIGURATION VARIABLES * * */
	    // Required: on line below, replace text in quotes with your forum shortname
	    var disqus_shortname = \''.$disqus_shortname.'\';
	    var disqus_url = "'.$outs['pagelink'].'";
	    /* * * DON\'T EDIT BELOW THIS LINE * * */
	    (function() {
	        var dsq = document.createElement(\'script\'); dsq.type = \'text/javascript\'; dsq.async = true;
	        dsq.src = \'//\' + disqus_shortname + \'.disqus.com/embed.js\';
	        (document.getElementsByTagName(\'head\')[0] || document.getElementsByTagName(\'body\')[0]).appendChild(dsq);
	    })();
	</script>
	<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
';
$outs['commentsonoff']==1?$commentsoutput="":$commentsoutput=$commentsoutput;
$outs['commentsonoff']==1?$disqusoutput="":$disqusoutput=$disqusoutput;
$nplinks='<div id="prevblogpointer">
	        <a href="'.$prevlink.'" data-ajax="false" title="'.$prevblogout.'">'.$prevblogout.'</a>
	        <i class="fa fa-arrow-circle-left" appdata-name=""></i>
			Previous Post
	      </div>
	      <div id="nextblogpointer">
	       Up Next <i class="fa fa-arrow-circle-right" appdata-name=""></i>
	        <a href="'.$nextlink.'" data-ajax="false" title="'.$nextblogout.'">'.$nextblogout.'</a>
	      </div>';
if($outs3['id']==$monid1||$outs3['id']==$monid2){
 $nplinks="";
}
$contentout='
	<div class="col-md-8">
           
    	<div class="col-md-12">
            <h2 class="newsTitle clearfix">'.$outs['title'].'</h2>
			'.$blogdisplayoutput.'

        </div>
		 <div class="mainblogsharehold">
      		Share Post<br>
          '.$outs['blogpageshare'].'<br>
          <div id="formend" class="placer"> 
	          Posted on '.$outs['entrydate'].' in the category '.$outs3['catname'].'<br>
	          Views: '.$outs['views'].'<br>
	          LastModified: '.$outs['modifydate'].'<br>
          </div>
    	</div>
	      '.$nplinks.'
	      
	      '.$disqusoutput.'
	</div>
	
	
';
$socialfooting='
	<!-- Footer -->
    <div class="container-fluid footer">
        <div class="row footerRow">
            <div class="col-md-4 col-xs-12 centerAlign">
                <span style="font-size: 12px; padding-left: 20px; font-weight: 500;">&copy; 2014. Goldlink Insurance PLC. All rights reserved | Terms &amp; Conditions</span>
            </div>
            <div class="col-md-6 col-xs-12 centerAlign" style="font-weight: 500;">
                <ul>
                    <li>
                        <a href="#">Notify Claim</a>
                    </li>
                    <li>
                        <a href="#">Get a Quote</a>
                    </li>
                    <li>
                        <a href="#">Complaints</a>
                    </li>
                    <li>
                        <a href="#">Branch Locator</a>
                    </li>
                    <li>
                        <a href="#">FAQs</a>
                    </li>
                    <li>
                        <a href="#">Live Chat</a>
                    </li>
                </ul>               
            </div>

            <div class="col-md-2 col-xs-12 textWhite centerAlign">
                <i class="fa fa-facebook"></i>
                <i class="fa fa-twitter"></i>
                <i class="fa fa-google-plus"></i>
                <i class="fa fa-youtube"></i>
            </div>

        </div>
        <!-- /.row -->

    </div>

    <!-- /.container -->

    <script src="'.$host_addr.'scripts/jquery-1.11.0.min.js"></script>
    <script>window.jQuery || document.write(\'<script src="js/vendor/jquery-1.11.3.min.js"><\/script>\')</script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="'.$host_addr.'bootstrap/js/bootstrap.min.js"></script>    
    <script src="../../../js/vendor/bootstrap-hover-dropdown.min.js"></script>
    <script src="../../../js/plugins.js"></script>
    <script src="../../../js/main.js"></script> 
';


/*end*/
if($outs['status']=="active"){
	$outputs['outputpageone']='
	<!DOCTYPE html>
	<html>
	<head>
	<title>'.stripslashes($outs['title']).'</title>
	<meta http-equiv="Content-Language" content="en-us">
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta http-equiv="Content-Type" content="text/html;"/>
	<meta property="fb:app_id" content="578838318855511"/>
	<meta property="fb:admins" content=""/>
	<meta property="og:locale" content="en_US">
	<meta property="og:type" content="website">
	<meta property="og:title" content="'.stripslashes($outs['title']).'">
	<meta property="og:description" content="'.$headerdescription.'">
	<meta property="og:url" content="'.$outs['pagelink'].'">
	<meta property="og:site_name" content="Goldlink Website">
	<meta property="og:image" content="'.$ogimage.'">
	<meta name="keywords" content="'.stripslashes($outs['title']).', '.$host_keywords.'"/>
	<meta name="description" content="'.stripslashes($outs['title']).''.$headerdescription.'">
	<link rel="stylesheet" href="'.$host_addr.'bootstrap/css/bootstrap.css"/>
	<link rel="stylesheet" href="'.$host_addr.'font-awesome/css/font-awesome.min.css"/>
	<link rel="stylesheet" href="'.$host_addr.'css/bootstrap-theme.min.css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Palanquin:300,500,700" rel="stylesheet" type="text/css">
	<link rel="icon" href="'.$host_addr.'images/favicon.ico" type="image/vnd.microsoft.icon">
	<link rel="stylesheet" href="'.$host_addr_root.'css/normalize.css">
    <link rel="stylesheet" href="'.$host_addr_root.'css/main.css">
    <script src="'.$host_addr_root.'js/vendor/modernizr-2.8.3.min.js"></script>
	<script src="'.$host_addr.'scripts/jquery.js"></script>
	<script src="'.$host_addr.'scripts/mylib.js"></script>
	<script src="'.$host_addr.'scripts/goldlink.js"></script>
	<script src="'.$host_addr.'scripts/formchecker.js"></script>
	<script language="javascript" type="text/javascript" src="'.$host_addr.'scripts/js/tinymce/jquery.tinymce.min.js"></script>
	<script language="javascript" type="text/javascript" src="'.$host_addr.'scripts/js/tinymce/tinymce.min.js"></script>
	<script language="javascript" type="text/javascript" src="'.$host_addr.'scripts/js/tinymce/basic_config.js"></script>
  </head>
  <body>
    	'.$facebooksdk.'
    	'.$topout.'
	<div role="tabpanel">
	    <div class="pillHeader">
	        <div class="container">
	            <h1 class="textWhite">Media</h1>

	            <!-- Nav tabs -->
	            <ul class="nav nav-pills" role="tablist">
	                <li role="presentation" class="active"><a href="#latestNews" aria-controls="news" role="tab" data-toggle="pill">READ THE NEWS</a></li>
	            </ul>
	        </div>
	    </div>

	    <!-- Tab panes -->
	    <div class="tab-content">
	        <div role="tabpanel" class="tab-pane active" id="latestNews">

	            <div class="container newsContainer">

	                <div class="row">
	                    
						'.$contentout.'

	                    <div class="col-sm-4 col-sm-offset-1">
	                        <div class="col-xs-12 mainblogwidgetsidebar">
	                            <h4 class="latestNewsHead">Latest News</h4>
	                            '.$recents.'
	                        </div>
	                        <div class="mainblogwidgetsidebar">
	                            <h4 class="latestNewsHead">Featured News</h4>
	                            '.$featured.'
	                        </div>
	                        <div class="">
	                            <article class="newsProduct second"></article>
	                        </div>


	                    </div>
	                </div>
	            </div>
	        </div>
		</div>
	</div>
		'.$socialfooting.'

	 '.$ga.'
  </body>
  </html>
';
}else if($outs['status']=="inactive"){
$outputs['outputpageone']='
	<!DOCTYPE html>
	<html>
	<head>
	<title>Post Disabled</title>
	<meta http-equiv="Content-Language" content="en-us">
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta http-equiv="Content-Type" content="text/html;"/>
	<meta property="fb:app_id" content="578838318855511"/>
	<meta property="fb:admins" content=""/>
	<meta property="og:locale" content="en_US">
	<meta property="og:type" content="website">
	<link rel="stylesheet" href="'.$host_addr.'jquerymobile/jquery.mobile-1.4.4.css"/>
	<link rel="stylesheet" href="'.$host_addr.'bootstrap/css/bootstrap.css"/>
	<link rel="stylesheet" href="'.$host_addr.'font-awesome/css/font-awesome.min.css"/>
	<link rel="stylesheet" href="'.$host_addr.'stylesheets/nysclagosresponsive.css"/>
	<link rel="icon" href="'.$host_addr.'images/favicon.ico" type="image/vnd.microsoft.icon">
	<script src="'.$host_addr.'scripts/jquery.js"></script>
	<script src="'.$host_addr.'jquerymobile/jquery.mobile-1.4.4.min.js"></script>
	<script src="'.$host_addr.'jquerymobile/jqueryswipeupdown.js"></script>
	<script src="'.$host_addr.'jssor/jssor.slider.mini.js"></script>
	<script src="'.$host_addr.'scripts/jssorinit.js"></script>
	<script src="'.$host_addr.'scripts/mylib.js"></script>
	<script src="'.$host_addr.'scripts/jquery.raty.js"></script>
	<script src="'.$host_addr.'scripts/nysclagos.js"></script>
	<script src="'.$host_addr.'scripts/responsive.js"></script>
	<script src="'.$host_addr.'scripts/formchecker.js"></script>
	<script language="javascript" type="text/javascript" src="'.$host_addr.'scripts/js/tinymce/jquery.tinymce.min.js"></script>
	<script language="javascript" type="text/javascript" src="'.$host_addr.'scripts/js/tinymce/tinymce.min.js"></script>
	<script language="javascript" type="text/javascript" src="'.$host_addr.'scripts/js/tinymce/basic_config.js"></script>
  </head>
  <body>
	<div id="noclassdiv" data-role="page" style="overflow:hidden;">
	'.$facebooksdk.'
	'.$panelsnippet.'
	'.$topout.'
	<div class="col-md-12" data-backtype="white">
		Sorry but thhis post for some reason has been disabled
	</div> 
</body>
</html>
';
}
// echo $outs['status'];
return $outputs;
}

function getSingleGallery($galleryid){
global $host_addr,$host_target_addr,$glob_options;
$row=array();
$query="SELECT * FROM gallery WHERE id=$galleryid";
$run=mysql_query($query)or die(mysql_error()." Line 2627");
$row=mysql_fetch_assoc($run);
$id=$row['id'];
$gallerytype=$row['type'];
$gallerytitle=$row['gallerytitle'];
$gallerydetails=$row['gallerydetails'];
$date=$row['entrydate'];
$status=$row['status'];
$outselect="";
$styledelete="";
$styleview="";
$stylecaptiondetail="";
$row['caption'][0]="";
$row['imgdetails'][0]="";
for($i=1;$i<=10;$i++){
	$pic="";
	$i>1?$pic="photos":$pic="photo";		
	$outselect.='<option value="'.$i.'">'.$i.''.$pic.'</option>';
}
//get complete gallery images and create thumbnail where necessary;
$mediaquery="SELECT * FROM media WHERE ownerid=$galleryid AND ownertype='$gallerytype' AND status='active' ORDER BY id DESC";
// echo $mediaquery;
$mediarun=mysql_query($mediaquery)or die(mysql_error()." Line 2846");
$medianumrows=mysql_num_rows($mediarun);
$album="No album photos yet.";
$cover='<div id="bottomgalleryholders" title="'.$gallerytitle.'" data-mainimg="" data-images="" data-sizes="" data-details="'.$gallerydetails.'">
  No Photos Yet.
</div>';
$thumbstack="";
$locationstack="";
$dimensionstack="";
$captionstack="";
$imgdetailstack="";
$captionedit="";
$extramsg="";
$caption="";
$imgdetails="";
$gallerytype=="portfoliogallery"||$gallerytype=="bloggallery"?$extramonitor="two":$extramonitor="";
$gallerytype=="portfoliogallery"||$gallerytype=="bloggallery"?$extraout='<div appdata-name="othergalleryphotoholder"><div></div></div>':$extraout="";
$mediacount=$medianumrows;
$maincoverphoto="";
if($medianumrows>0){
	$count=0;
	$album="";
while ($mediarow=mysql_fetch_assoc($mediarun)) {
	# code...
	$caption="";
	$imgdetails="";
	if($count==0){
		$coverphoto=$mediarow['details'];
		$maincoverphoto=$mediarow['location'];
	}
	$row['thumbphotos'][$count]=$mediarow['details'];
	$row['mainphotos'][$count]=$mediarow['location'];
$imgid=$mediarow['id'];
$realimg=$mediarow['location'];
$thumb=$mediarow['details'];
$width=$mediarow['width'];
$height=$mediarow['height'];
$row['dimension'][$count]=$width."x".$height;

if($gallerytype=="portfoliogallery"||$gallerytype=="bloggallery"){
$captiondata=$mediarow['title'];
$captiondata=explode("];[", $captiondata);
if(count($captiondata)>1){
$caption=$captiondata[0];
$imgdetails=$captiondata[1];
$row['caption'][$count]=$caption;
$row['imgdetails'][$count]=$imgdetails;
}
$captionstack==""?$captionstack.=$caption:$captionstack.=">".$caption;
$imgdetailstack==""?$imgdetailstack.=$imgdetails:$imgdetailstack.="|".$imgdetails;
// echo"here";
$captionedit='<a href="##" name="captiondetails"  title="Edit caption and details for this image, when editpane is in view, click this again to hide it" data-id="'.$imgid.'" data-galleryid="'.$id.'" data-arraypoint="'.$count.'" data-src="'.$host_addr.''.$realimg.'" data-caption="'.$caption.'" data-imgdetails="'.$imgdetails.'"><i name="viewpic" class="fa fa-gear fa-spin"></i></a>';
$extramsg="Click the gear icon to edit caption and photo details information";
}

$locationstack==""?$locationstack.=$host_addr.$realimg:$locationstack.=">".$host_addr.$realimg;
$dimensionstack==""?$dimensionstack.=$width.",".$height:$dimensionstack.="|".$width.",".$height;
if($glob_options=="nodelete"){
$styledelete="display:none;";
}
$album.='
<div id="editimgs" name="albumimg'.$imgid.'">
	<div id="editimgsoptions">
		<div id="editimgsoptionlinks">
			<a href="##" name="deletepic" style="'.$styledelete.'" data-id="'.$imgid.'"data-galleryid="'.$id.'"data-arraypoint="'.$count.'" data-src="'.$host_addr.''.$realimg.'"><img name="deletepic" src="../images/trashfirst.png" title="Delete this photo?" class="total"></a>
			<a href="##" name="viewpic" data-id="'.$imgid.'" data-galleryid="'.$id.'" data-arraypoint="'.$count.'" data-src="'.$host_addr.''.$realimg.'"><img name="viewpic" src="../images/viewpicfirst.png" title="View full image" class="total"></a>								
			'.$captionedit.'
		</div>
	</div>	
	<div id="editextradatapoint" data-id="'.$imgid.'" data-galleryid="'.$id.'" data-arraypoint="'.$count.'"></div>
	<img src=".'.$mediarow['details'].'" name="realimage" data-width="'.$width.'" data-height="'.$height.'" style="height:100%;margin:auto;">
</div>
';
$count++;
}
$cover='
<div id="bottomgalleryholders" title="'.$gallerytitle.'" data-mainimg="'.$host_addr.''.$maincoverphoto.'" data-images="'.$locationstack.'" data-sizes="'.$dimensionstack.'" data-details="'.$gallerydetails.'">
	<img src="'.$host_addr.''.$coverphoto.'" height="100%" class=""/>
</div>';	
}
/*$album.='
<div id="editimgsimgs" name="albumimg'.$imgid.'">
	<div id="editimgsoptions">
		<div id="editimgsoptionlinks">
			<a href="##" name="deletepic" data-id="'.$imgid.'"><img name="deletepic" src="../images/trashfirst.png" title="Delete this photo?" class="total"></a>
			<a href="##" name="viewpic" data-id="'.$imgid.'"><img name="viewpic" src="../images/viewpicfirst.png" title="View full image" class="total"></a>								
		</div>
	</div>	
	<img src=".'.$mediarow['details'].'" name="realimage" data-width="'.$width.'" data-height="'.$height.'" style="height:100%;margin:auto;">
</div>
';*/
$row['adminoutput']='
<tr data-id="'.$id.'">
	<td>'.$gallerytype.'</td><td>'.$gallerytitle.'</td><td>'.$gallerydetails.'</td><td>'.$mediacount.'</td><td>'.$date.'</td><td>'.$status.'</td><td name="trcontrolpoint"><a href="#&id='.$id.'" name="edit" data-type="editsinglegallery" data-divid="'.$id.'">Edit</a></td>
</tr>
<tr name="tableeditcontainer" data-state="inactive" data-divid="'.$id.'">
	<td colspan="100%">
		<div id="completeresultdisplay" data-type="editmodal" data-load="unloaded" data-divid="'.$id.'">
			<div id="completeresultdisplaycontent" data-type="editdisplay" data-divid="'.$id.'">
								
			</div>
		</div>
	</td>
</tr>
';
$row['adminoutputtwo']='
<div id="form" style="background-color:#fefefe;">
	<form action="../snippets/edit.php" name="editgallery" method="post" enctype="multipart/form-data">
		<input type="hidden" name="entryvariant" value="editgallery"/>
		<input type="hidden" name="entryid" value="'.$id.'"/>
		<input type="hidden" name="gallerytype" value="'.$gallerytype.'"/>
		<div id="formheader">Edit '.$gallerytitle.'</div>
		<div id="formend">
				Gallery Title *<br>
				<input type="text" name="gallerytitle" value="'.$gallerytitle.'" Placeholder="The album title here." class="curved"/>
		</div>
		<div id="formend">
			 Gallery Details*<br>
			<textarea name="gallerydetails" id="" placeholder="Place all details of the album here." class="curved3" style="width:447px;height:206px;">'.$gallerydetails.'</textarea>
		</div>
		<div id="formend">
			Upload some more album photos to this Gallery:<br>
			<input type="hidden" name="piccount'.$extramonitor.'" value=""/>
			<select name="photocount'.$extramonitor.'" class="curved2" title="Choose the amount of photos you want to upload, max of 10, then click below the selection to continue">
			<option value="">--choose amount--</option>
				'.$outselect.'
			</select>	
			'.$extraout.'						
		</div>
		<div id="formend" name="galleryfullholder'.$id.'">
		Gallery Images, click the target icon to view, click the trash icon to.....trash it,'.$extramsg.' its that simple.<br>
		<input type="hidden" name="gallerydata'.$id.'" data-title="'.$gallerytitle.'" data-mainimg="'.$host_addr.''.$maincoverphoto.'" data-images="'.$locationstack.'" data-sizes="'.$dimensionstack.'" data-details="'.$gallerydetails.'"data-captiondetails="'.$caption.'"/>
			'.$album.'
		</div>
		<div id="formend">
				Change Status<br>
				<select name="status" class="curved2">
					<option value="">Change Status</option>
					<option value="active">Active</option>
					<option value="inactive">Inactive</option>
				</select>
			</div>
		<div id="formend">
			<input type="submit" name="updategallery" value="Update" class="submitbutton"/>
		</div>
	</form>
</div>
';
$row['adminoutputthree']='<input type="hidden" name="gallerydata'.$id.'" data-title="'.$gallerytitle.'" data-mainimg="'.$host_addr.''.$maincoverphoto.'" data-images="'.$locationstack.'" data-sizes="'.$dimensionstack.'" data-details="'.$gallerydetails.'"data-caption="'.$captionstack.'" data-imgdetails="'.$imgdetailstack.'"/>'.$album;
$row['adminoutputfour']='<input type="hidden" name="gallerydata'.$id.'" data-title="'.$gallerytitle.'" data-mainimg="'.$host_addr.''.$maincoverphoto.'" data-images="'.$locationstack.'" data-sizes="'.$dimensionstack.'" data-details="'.$gallerydetails.'"data-caption="'.$captionstack.'" data-imgdetails="'.$imgdetailstack.'"/>';
$row['mediacount']=$mediacount;
$row['maincoverphoto']=$maincoverphoto;

$row['vieweroutput']=$cover;
return $row;
}
function getAllGalleries($viewer,$limit){
$row=array();
$testit=strpos($limit,"-");
$testit!==false?$limit="":$limit=$limit;
if($limit==""&&$viewer=="admin"){
$query="SELECT * FROM gallery ORDER BY id DESC LIMIT 0,15";
$rowmonitor['chiefquery']="SELECT * FROM gallery ORDER BY id DESC";
}elseif($limit!==""&&$viewer=="admin"){
$query="SELECT * FROM gallery ORDER BY id DESC $limit";
$rowmonitor['chiefquery']="SELECT * FROM gallery ORDER BY id DESC";
}elseif($viewer=="viewer"){
$query="SELECT * FROM gallery WHERE status='active' ORDER BY id DESC ";
$rowmonitor['chiefquery']="SELECT * FROM gallery WHERE status='active'";	
}elseif(is_array($viewer)){
	if($viewer[0]=="selection"){
		$ownertype=$viewer[1];
		$query="SELECT * FROM gallery WHERE type='$ownertype' AND status='active' ORDER BY id DESC ";
		$rowmonitor['chiefquery']="SELECT * FROM gallery WHERE type='$ownertype' AND status='active'";	
/*		$query="SELECT * FROM gallery WHERE ownertype='$ownertype' AND status='active' ORDER BY id DESC ";
		$rowmonitor['chiefquery']="SELECT * FROM gallery WHERE ownertype='$ownertype' AND status='active'";	*/

	}else if($viewer[0]=="specific"){
		$ownerid=$viewer[1];
		$query="SELECT * FROM gallery WHERE id=$ownerid AND status='active' ORDER BY id DESC ";
		$rowmonitor['chiefquery']="SELECT * FROM gallery WHERE id=$ownerid AND status='active'";
	}
}
// echo $query;
$run=mysql_query($query)or die(mysql_error()." Line 2744");
$numrows=mysql_num_rows($run);
$adminoutput="<td colspan=\"100%\">No entries</td>";
$adminoutputtwo="";
$vieweroutput='<font color="#fefefe">Sorry, No Galleries have been created Yet</font>';
$vieweroutputtwo='<font color="#fefefe">Sorry, No Galleries have been created Yet</font>';
$selectionoutput='<option value="">-Choose Gallery-</option>';

if($numrows>0){
$adminoutput="";
$adminoutputtwo="";
$vieweroutput="";
while($row=mysql_fetch_assoc($run)){
$outs=getSingleGallery($row['id']);
$adminoutput.=$outs['adminoutput'];
$adminoutputtwo.=$outs['adminoutputtwo'];
$vieweroutput.=$outs['vieweroutput'];
$selectionoutput.='<option value="'.$row['id'].'">'.$row['gallerytitle'].'</option>';
}

}
$top='<table id="resultcontenttable" cellspacing="0">
			<thead><tr><th>Type</th><th>Title</th><th>Details</th><th>Photos</th><th>Date</th><th>status</th><th>View/Edit</th></tr></thead>
			<tbody>';
$bottom='	</tbody>
		</table>';
	$row['chiefquery']=$rowmonitor['chiefquery'];
$outs=paginatejavascript($rowmonitor['chiefquery']);
$outsviewer=paginate($rowmonitor['chiefquery']);
$paginatetop='
<div id="paginationhold">
	<div class="meneame">
		<input type="hidden" name="curquery" value="'.$rowmonitor['chiefquery'].'"/>
		<input type="hidden" name="outputtype" value="gallery"/>
		<input type="hidden" name="currentview" data-ipp="15" data-page="1" value="1"/>
		<div class="pagination" data-name="paginationpageshold">'.$outs['pageout'].'</div>
		<div class="pagination">
			  '.$outs['usercontrols'].'
		</div>
	</div>
</div>
<div id="paginateddatahold" data-name="contentholder">';

$paginatebottom='
</div><div id="paginationhold">
	<div class="meneame">
		<div class="pagination" data-name="paginationpageshold">'.$outs['pageout'].'</div>
	</div>
</div>';
$row['adminoutput']=$paginatetop.$top.$adminoutput.$bottom.$paginatebottom;
$row['adminoutputtwo']=$top.$adminoutput.$bottom;
$row['vieweroutput']=$vieweroutput;
$row['selectionoutput']=$selectionoutput;

return $row;
}


?>