<?php
include('connection.php');
// so we can get @ session variables
if(session_id() == ''){
	session_start();
}
$today=date('Y-m-d');
$todaytime=date('Y-m-d H:i:s');
$entryvariant=isset($_GET['entryvariant'])?$_GET['entryvariant']:"";
$entryvariant=isset($_POST['entryvariant'])?$_POST['entryvariant']:"";
$returl=isset($_POST['returl'])&&$_POST['returl']!==""?$_POST['returl']
	:"../admin/adminindex.php";
// echo $entryvariant." variant";
$rurladmin=isset($_SESSION['rurladmin'])&&$_SESSION['rurladmin']!==""?
$_SESSION['rurladmin']:"";
if ($entryvariant=="blogtypesubscription") {
	# code...
	// var_dump($_POST);
	$email=mysql_real_escape_string($_POST['email']);
	$catid=mysql_real_escape_string($_POST['catid']);	

	$returl=isset($_POST['returl'])?
	mysql_real_escape_string($_POST['returl']):"../completion.php";	
	// echo $returl;

	$testquery="SELECT * FROM subscriptionlist WHERE email='$email' AND 
	blogtypeid=$catid AND type='blog'";
	
	$testrun=briefquery($testquery,__LINE__,"mysqli");
	$testnumrows=$testrun['numrows'];
	
	
	if($testnumrows<1){	
		$query="INSERT INTO subscriptionlist(blogtypeid,blogcatid,email,
			subscriptiondate)VALUES
		('$catid','0','$email',CURRENT_TIMESTAMP)";
		$run=briefquery($query,__LINE__,"mysqli",true);

		$notid=$run['resultdata'][0]['id'];

		// prepare content for the notification redirect portion
		$action="Create";
		$actiontype="subscription";
		$actiondetails="Blog Subscription Created";
		$appendedparams="&t=blogsubsuccess&id=".$notid;

	}else{
		$data=$testrun['resultdata'][0];
		$appendedparams="&t=emailexists&id=".$data['id'];
		$notid=0;
		// echo "which";
	}
	
	$nonottype="none";// stops notification table update
	// $notrdtype="none";//stops redirection

	// bring in the nrsection.php file
	include('nrsection.php');
}elseif ($entryvariant=="eventsubscription") {
	# code...
	$type=isset($_POST['subscriptiontype'])?mysql_real_escape_string($_POST['subscriptiontype']):"fvtevent";
	$email=mysql_real_escape_string($_POST['email']);
	$catid=1;	
	$testquery="SELECT * FROM subscriptionlist WHERE email='$email' AND type='$type'";
	$testrun=mysqli_query($host_connli,$testquery)or die(mysqli_error($host_connli)." Line ".__LINE__);
	$testnumrows=mysqli_num_rows($testrun);
	$returnurl="";
	if($testnumrows<1){	
		$query="INSERT INTO subscriptionlist(type,email)VALUES('fvtevent','$email')";
		$run=mysqli_query($host_connli,$query)or die(mysqli_error($host_connli)." Line ".__LINE__);
	}else{
		header('location:../completion.php?t=eventemailexists&gt=1');
	}
	header('location:../completion.php?t=eventsubscription&rurl='.$returnurl.'');
}elseif ($entryvariant=="categorysubscription") {
	# code...
	$email=mysql_real_escape_string($_POST['email']);
	$pageid=mysql_real_escape_string($_POST['pageid']);
	$catid=$_POST['categoryid'];
	$testquery="SELECT * FROM blogcategories WHERE id=$catid";
	$testrun=mysqli_query($host_connli,$testquery)or die(mysqli_error($host_connli)." Line ".__LINE__);
	$testnumrows=mysqli_num_rows($testrun);
	if($testnumrows>0){
		$testquery="SELECT * FROM subscriptionlist WHERE email='$email' AND blogtypeid=$catid";
		$testrun=mysqli_query($host_connli,$testquery)or die(mysqli_error($host_connli)." Line ".__LINE__);
		$testnumrows=mysqli_num_rows($testrun);
		if($testnumrows<1){	
			$query="INSERT INTO subscriptionlist(blogtypeid,blogcatid,email)VALUES('0','$catid','$email')";
			$run=mysqli_query($host_connli,$query)or die(mysqli_error($host_connli)." Line ".__LINE__);
			echo "Success";
		}else{
			echo "Subscribed";
		}
		// $testnumrows=mysqli_num_rows($testrun);
	}else{
		header('location:../index.php');
	}
}elseif ($entryvariant=="createblogtype") {
	# code...
	$blogname=$_POST['name'];
	$pattern='/[\s]/';
	$foldername=preg_replace($pattern,"-", $blogname);
	$rssname=preg_replace($pattern,"", $blogname);
	$rssname=mysql_real_escape_string($rssname);
	$rssname=strtolower($rssname);
	$foldername=preg_replace('/[\'.\"$]/',"",$foldername);
	
	// echo $foldername;
	$blogname=mysql_real_escape_string($blogname);
	$testquery="SELECT * FROM blogtype WHERE name='$blogname' OR rssname='$rssname'";
	// echo $testquery;
	$testrun=mysqli_query($host_connli,$testquery)or die(mysqli_error($host_connli)." Line ".__LINE__);
	$testnumrows=mysqli_num_rows($testrun);
	if($testnumrows>0){
		// echo "in here";
		$_SESSION['lastsuccess']=0;
		if($rurladmin==""){
			header('location:../admin/adminindex.php?compid=0&type='.$entryvariant.'&v=admin&error=true');
		}else{
			header('location:'.$rurladmin.'?compid=0&type='.$entryvariant.'&v=admin&error=true');
		}
	}
	$blogdescription=mysql_real_escape_string($_POST['description']);
	$blogid=getNextId("blogtype");
	$query="INSERT INTO blogtype (name,foldername,rssname,description)VALUES('$blogname','$foldername','$rssname','$blogdescription')";
	$run=mysqli_query($host_connli,$query)or die(mysqli_error($host_connli)." Line ".__LINE__);
	
	mkdir('../blog/'.$foldername.'/',0777);
	$title=''.$blogname.' | '.$host_website_name.'';
	$title=mysql_real_escape_string($title);

	if(isset($_POST['blogtypecontrol'])&&$_POST['blogtypecontrol']!=="default"){
		$page=''.$blogname.'.php';

	}else if((isset($_POST['blogtypecontrol'])&&
		$_POST['blogtypecontrol']=="default")||
		!isset($_POST['blogtypecontrol'])){
		$page='blog.php';

	}

	$landingpage=$host_target_addr.$page;
	$rssheader='<?xml version="1.0" encoding="utf-8"?>
		<rss xmlns:atom="http://www.w3.org/2005/Atom" version="2.0">
		<channel>
		<title>'.$title.'</title>
		<atom:link href="'.$host_target_addr.'feeds/rss/'.$rssname.'.xml" rel="self" type="application/rss+xml"/>
		<description>
		'.$blogdescription.'
		</description>
		<link>'.$landingpage.'</link>
	';
	$rssfooter='</channel></rss>';
	$rsscontent=$rssheader.$rssfooter;
	// $handle=fopen("../".$blogname.".php","w")or die('cant open the file');
	$handle2=fopen("../feeds/rss/".$rssname.".xml","w")or die('cant open the file');
	fwrite($handle2,$rsscontent);	
	// fclose($handle);
	fclose($handle2);
		// echo $query;
	$query2="INSERT INTO rssheaders (blogtypeid,headerdetails,footerdetails)VALUES('$blogid','$rssheader','$rssfooter')";
	$run2=mysqli_query($host_connli,$query2)or die(mysqli_error($host_connli)."Line ".__LINE__);	
	// echo $query;
	if($rurladmin==""){

		$_SESSION['lastsuccess']=0;
		header('location:../admin/adminindex.php?compid=1&type='.$entryvariant.'&v=admin');
	}else{
		header('location:'.$rurladmin.'?compid=1&type='.$entryvariant.'&v=admin');
	}
}elseif ($entryvariant=="createblogcategory") {
	$curid=getNextId("blogcategories");
	
	$compid=3;	
	$categoryid=$_POST['categoryid'];

	$blogcategory=mysql_real_escape_string($_POST['name']);
	
	$pattern2='/[\n\s\$!#\%\^<>@\(\),\'\"\/\%\*\{\}\&\[\]\?\_\-\+\=:;’]/';
	
	$rssname=clean($blogcategory);
	$rssname=mysql_real_escape_string($rssname);
	$rssname=$categoryid.strtolower($rssname);
	
	$testquery="SELECT * FROM blogcategories WHERE blogtypeid=$categoryid AND catname='$blogcategory' OR blogtypeid=$categoryid AND rssname='$rssname'";
	// echo $testquery;
	$testrun=mysqli_query($host_connli,$testquery)or die(mysqli_error($host_connli)." Line ".__LINE__);
	$testnumrows=mysqli_num_rows($testrun);
	
	if($testnumrows>0){
		// echo "in here";
		if($rurladmin==""){
			$_SESSION['lastsuccess']=0;
			header('location:../admin/adminindex.php?compid=2&type='.$entryvariant.'&v=admin&error=true');
		}else{
			header('location:'.$rurladmin.'?compid=2&v=admin');
		}
	}
	
	$outs=getSingleBlogType($categoryid);
	
	$subtext=isset($_POST['subtext'])?mysql_real_escape_string($_POST['subtext']):"";

	if(isset($_FILES['profpic'])&&$_FILES['profpic']['tmp_name']!==""){
		$image="profpic";
		$imgpath[0]='../files/originals/';
		$imgpath[1]='../files/medsizes/';
		$imgpath[2]='../files/thumbnails/';
		$imgsize[0]="default";
		$imgsize[1]=",300";
		$imgsize[2]=",100";
		$acceptedsize="";
		$imgouts=genericImageUpload($image,"varying",$imgpath,$imgsize,$acceptedsize);
		
		$imagepath=substr($imgouts[0], 1,strlen($imgouts[0]));//original
		$imagepath2=substr($imgouts[1], 1,strlen($imgouts[1]));//medsize
		$imagepath3=substr($imgouts[2], 1,strlen($imgouts[2]));//thumbnail
		
		// get image size details
		list($width,$height)=getimagesize($imgouts[0]);
		$imagesize=$_FILES[''.$image.'']['size'];
		
		$filesize=$imagesize/1024;
		//echo $filefirstsize;
		
		$filesize=round($filesize, 0, PHP_ROUND_HALF_UP);
		
		if(strlen($filesize)>3){
			$filesize=$filesize/1024;
			$filesize=round($filesize,2);	
			$filesize="".$filesize."MB";
		}else{
			$filesize="".$filesize."KB";
		}
		// store the category image in the database
		$mediaquery="INSERT INTO media(ownerid,ownertype,maintype,mediatype,location,
			medsize,thumbnail,filesize,width,height)
			VALUES('$curid','blogcategory','original','image','$imagepath','$imagepath2',
				'$imagepath3','$filesize','$width','$height')";
	
		$mediarun=mysqli_query($host_connli,$mediaquery)or die(mysqli_error($host_connli)." LINE ".__LINE__);
	}

	$query="INSERT INTO blogcategories (blogtypeid,catname,rssname,subtext)
	VALUES('$categoryid','$blogcategory','$rssname','$subtext')";
	// echo $query;

	$run=mysqli_query($host_connli,$query)or die(mysqli_error($host_connli)." Line ".__LINE__);

	$title=mysql_real_escape_string($outs['name']);

	$landingpage=$host_addr."category.php?cid=".$curid;
	$page=$landingpage;
	$rssheader='<?xml version="1.0" encoding="utf-8"?>
		<rss xmlns:atom="http://www.w3.org/2005/Atom" version="2.0">
		<channel>
		<title>'.$title.'</title>
		<atom:link href="'.$host_target_addr.'feeds/rss/'.$rssname.'.xml" rel="self" type="application/rss+xml"/>
		<description>
		Category '.$blogcategory.'
		</description>
		<link>'.$landingpage.'</link>
	';
	$rssfooter='</channel></rss>';

	$rsscontent=$rssheader.$rssfooter;
	$handle2=fopen("../feeds/rss/".$rssname.".xml","w")or die('cant open the file');
	fwrite($handle2,$rsscontent);

	// insert into the rssheaders table 
	$query2="INSERT INTO rssheaders (blogtypeid,blogcatid,headerdetails,footerdetails)
	VALUES('$categoryid','$curid','$rssheader','$rssfooter')";
	$run2=mysqli_query($host_connli,$query2)or die(mysqli_error($host_connli)." Line ".__LINE__);


	$notid=$curid;
	// prepare content for the notification redirect portion
	$action="Create";
	$actiontype="blogcategories";
	$actiondetails="Blog Category $blogcategory Created";
	
	// $notrdtype="none";//stops redirection

	// $nonottype="none";// stops notification table update

	// bring in the nrsection.php file
	include('nrsection.php');
	

}elseif($entryvariant=="createblogpost"){
	$compid=4;
	// var_dump($_POST);
	$blogtypeid=$_POST['blogtypeid'];
	$status="active";
	//the id of the blog page when it goes into the database
	$pageid=getNextId('blogentries');
	
	//getting the main blog type information
	$outblog=getSingleBlogType($blogtypeid);
	
	$foldername=$outblog['foldername'];
	$blogcategoryid=$_POST['blogcategoryid'];
	
	$seometakeywords=isset($_POST['seokeywords'])?
	mysql_real_escape_string($_POST['seokeywords']):"";

	$seometadescription=isset($_POST['seodescription'])?
	mysql_real_escape_string($_POST['seodescription']):"";
	
	$pwrdd=isset($_POST['pwrdd'])?
	mysql_real_escape_string($_POST['pwrdd']):"nopwrd";

	$pwrd=isset($_POST['pwrd'])?
	mysql_real_escape_string($_POST['pwrd']):"";

	$commentsonoff=isset($_POST['commentsonoff'])?
	mysql_real_escape_string($_POST['commentsonoff']):"";
	$commenttype=isset($_POST['commenttype'])?
	mysql_real_escape_string($_POST['commenttype']):"normal";

	$featured=isset($_POST['featured'])?
	mysql_real_escape_string($_POST['featured']):"";

	$tags=isset($_POST['tags'])?
	mysql_real_escape_string($_POST['tags']):"";


	//blog cover photo management
	$blogentrytype=$_POST['blogentrytype'];
	$datetwo=date("Y-m-d H:i:s");
	
	$profpic=$_FILES['profpic']['tmp_name'];
	$coverid=0;
	if($_FILES['profpic']['tmp_name']!==""&&
		($blogentrytype==""||$blogentrytype=="normal"
			||$blogentrytype=="audio"
			||$blogentrytype=="video")){

		$image="profpic";
		$imgpath[0]='../files/originals';
		$imgpath[1]='../files/medsizes/';
		$imgpath[2]='../files/thumbnails/';
		$imgsize[0]="default";
		$imgsize[1]=",300";
		$imgsize[2]=",100";
		$acceptedsize="";
	
		$imgouts=genericImageUpload($image,"varying",$imgpath,$imgsize,$acceptedsize);

		$imagepath=substr($imgouts[0], 1,strlen($imgouts[0]));
		$imagepath2=substr($imgouts[1], 1,strlen($imgouts[1]));
		$imagepath3=substr($imgouts[2], 1,strlen($imgouts[2]));
		// get image size details
		$filedata=getFileDetails($imgouts[0],"image");
		$filesize=$filedata['size'];
		$width=$filedata['width'];
		$height=$filedata['height'];

		// get the cover photo's media table id for storage with the blog entry
		$coverid=getNextIdExplicit("media");
		$mediaquery="INSERT INTO media(ownerid,ownertype,maintype,mediatype,location,
			medsize,thumbnail,filesize,width,height)
			VALUES('$pageid','blogentry','coverphoto','image','$imagepath','$imagepath2',
				'$imagepath3','$filesize','$width','$height')";
		// echo $mediaquery;
		$mediarun=mysqli_query($host_connli,$mediaquery)or die(mysqli_error($host_connli)." Line ".__LINE__);
	}

	$title=mysql_real_escape_string($_POST['title']);

	//create physical pagename for the blog by using regex to remove whitespaces and 
	// replacing it with -
	
	$pattern='/[\s]{1,}/';
	$pagename=clean(stripslashes($_POST['title']));
	if(file_exists('../blog/'.$foldername.'/'.$pagename.'.php')){
		$pagename=$pagename.$pageid;
	}

	$schedulestatus=isset($_POST['schedulestatus'])?
	mysql_real_escape_string($_POST['schedulestatus']):"";
	
	$scheduledate=isset($_POST['scheduledate'])?
	mysql_real_escape_string($_POST['scheduledate']):"";
	
	$scheduletime=isset($_POST['scheduletime'])?
	mysql_real_escape_string($_POST['scheduletime']):"";

	$rprev=isset($_POST['scheduletime'])?
	mysql_real_escape_string($_POST['scheduletime']):"none";
	
	//make sure schedule date and time have appropriate values
	$scheduletime!==""&&$scheduledate!==""&&
	($schedulestatus=="on"||$schedulestatus=="yes")?
	$scheduletime=$scheduletime.":00":$scheduletime="";
	
	$scheduledate==""&&($schedulestatus=="on"||$schedulestatus=="yes")?
	$scheduledate=date('Y-m-d H:i:s', strtotime('1 day')):$scheduledate;
	
	$scheduletime==""&&($schedulestatus=="on"||$schedulestatus=="yes")?
	$scheduletime="08:00:00":$scheduletime.":00";
	
	$fullschedulepostperiod="";
	
	//verify that the set date has not passed
	$datetime1 = new DateTime("$scheduledate"); // specified scheduled time
	if($rprev!=="none"){
		$datetime1 = new DateTime("$scheduledate $scheduletime"); // specified scheduled time
	}
	$datetime2 = new DateTime(); // current time 
	if($datetime2>$datetime1){
		//if the current date time is greater than the one specified then the user chose 
		// past date
		//set date to a day ahead
		//echo "inside comparison operator<br>";

		$scheduledate=date('Y-m-d H:i:s', strtotime('1 day'));
		if($rprev!=="none"){
			$scheduledate=date('Y-m-d', strtotime('1 day'));

		}

	}

	// $enddate=date('Y-m-d', strtotime('2 days'));
	if($schedulestatus=="on"||$schedulestatus=="yes"){
		// echo "inside comparison operator<br>";
		$fullschedulepostperiod=$scheduledate;
		if($rprev!=="none"){
			$fullschedulepostperiod=$scheduledate." ".$scheduletime;
		}
		
		$datetwo="0000-00-00 00:00:00";
	}

	

	$betype="";
	$becode="";
	
	// echo "<br>".$title."<br>";
	$introparagraph=mysql_real_escape_string($_POST['introparagraph']);
	
	$blogentrymain=$_POST['blogentry'];
	// echo $blogentrymain;
	
	$blogentry=mysql_real_escape_string($_POST['blogentry']);
	
	// for banner post type
	// $bannerpic=$_FILES['bannerpic']['tmp_name'];
	if($_FILES['bannerpic']['tmp_name']!==""&&$blogentrytype=="banner"){

		// legacy behaviour
		if($rprev!=="none"){
			$introparagraph=$title;
		}
		
		$image="bannerpic";
		$imgpath[0]='../files/originals/';
		$imgpath[1]='../files/medsizes/';
		$imgpath[2]='../files/thumbnails/';
		$imgsize[0]="default";
		$imgsize[1]="300,";
		$imgsize[2]="150,";
		$acceptedsize="";
		$imgouts=genericImageUpload($image,"varying",$imgpath,$imgsize,$acceptedsize);

		$imagepath=substr($imgouts[0], 1,strlen($imgouts[0]));
		$imagepath2=substr($imgouts[1], 1,strlen($imgouts[1]));
		$imagepath3=substr($imgouts[2], 1,strlen($imgouts[2]));

		// get image size details
		$filedata=getFileDetails($imgouts[0],"image");
		$filesize=$filedata['size'];
		$width=$filedata['width'];
		$height=$filedata['height'];
		// echo '<img src="'.$imgouts[0].'"> '.$filesize.' '.$width.' '.$height.'';
		// get the cover photo's media table id for storage with the blog entry
		$coverid=getNextId("media");
		$mediaquery="INSERT INTO media(ownerid,ownertype,maintype,mediatype,location,
			medsize,thumbnail,filesize,width,height)VALUES('$pageid','blogentry','bannerpic',
			'image','$imagepath','$imagepath2','$imagepath3','$filesize','$width','$height')";
		$mediarun=mysqli_query($host_connli,$mediaquery)or die(mysqli_error($host_connli));
	}

	// for gallery post
	if($blogentrytype=="gallery"){
		// $introparagraph=$title;
		$piccount=isset($_POST['piccount'])?$_POST['piccount']:0;
		$bloggallerycount=isset($_POST['bloggallerycount'])?
		mysql_real_escape_string($_POST['bloggallerycount']):0;

		//echo $piccount;
		// legacy
		if($piccount>0){
		    for($i=1;$i<=$piccount;$i++){
		      $albumpic=$_FILES['defaultpic'.$i.'']['tmp_name'];
		      if($albumpic!==""){
		        $image="defaultpic".$i."";
		        if(isset($imagepath)){
		          unset($imagepath);
		          unset($imagesize);
		        }
		        $imagepath=array();
		        $imagesize=array();
		        $imgpath[0]='../files/originals/';
		        $imgpath[1]='../files/medsizes/';
		        $imgpath[2]='../files/thumbnails/';
		        $imgsize[0]="default";
		        $imgsize[1]=",530";
		        $imgsize[2]=",150";

		        // // echo count($imgsize);
		        $acceptedsize="";
		        $imgouts=genericImageUpload($image,"varying",$imgpath,$imgsize,$acceptedsize);
		        $len=strlen($imgouts[0]);
		        // // echo $imgouts[0]."<br>";
		        $imagepath=substr($imgouts[0], 1,$len);
		        $len2=strlen($imgouts[1]);
		        // // echo $imgouts[1]."<br>";
		        $imagepath2=substr($imgouts[1], 1,$len2);
		        $len3=strlen($imgouts[2]);
		        // // echo $imgouts[1]."<br>";
		        $imagepath3=substr($imgouts[2], 1,$len3);
		        // get image size details
		        $filedata=getFileDetails($imgouts[0],"image");
		        $filesize=$filedata['size'];
		        $width=$filedata['width'];
		        $height=$filedata['height'];
		        $coverid="";
		        // insert current blog gallery content into database as original 
		        // image and thumbnail
		        $mediaquery="INSERT INTO media(ownerid,ownertype,maintype,mediatype,
		        	location,medsize,thumbnail,details,filesize,width,height)VALUES(
		        	'$pageid','blogentry','gallerypic','image','$imagepath','$imagepath2',
		        	'$imagepath3','$imagepath3','$filesize','$width','$height')";
		        $mediarun=mysqli_query($host_connli,$mediaquery)or die(mysqli_error($host_connli));
		      }
		    }
		}

		// update
		if($bloggallerycount>0){
			$galentrycount=0;
			for($i=1;$i<=$bloggallerycount;$i++){
				$picout=isset($_FILES['galimage'.$i.'']['tmp_name'])?
				$_FILES['galimage'.$i.'']['tmp_name']:"";
				if($picout!==""){
					$caption=mysql_real_escape_string($_POST["caption$i"]);
					$details=mysql_real_escape_string($_POST["details$i"]);

					$image="galimage$i";
					$imgpath[0]='../files/originals/';
				    $imgpath[1]='../files/medsizes/';
				    $imgpath[2]='../files/thumbnails/';
				    $imgsize[0]="default";
				    $imgsize[1]=",240";
				    $imgsize[2]=",85";
				    $acceptedsize="";
				    $imgouts=genericImageUpload($image,"varying",$imgpath,$imgsize,$acceptedsize);

				    $len=strlen($imgouts[0]);
				    $len2=strlen($imgouts[1]);
				    $len3=strlen($imgouts[2]);
				    $imagepath=substr($imgouts[0], 1,$len);
				    $imagepath2=substr($imgouts[1], 1,$len2);
				    $imagepath3=substr($imgouts[2], 1,$len3);

				    // get image size details
				    list($width,$height)=getimagesize($imgouts[0]);
				    $imagesize=$_FILES[''.$image.'']['size'];
				    $filesize=$imagesize/1024;
				    //// echo $filefirstsize;
				    $filesize=round($filesize, 0, PHP_ROUND_HALF_UP);
				    if(strlen($filesize)>3){
					    $filesize=$filesize/1024;
					    $filesize=round($filesize,2); 
					    $filesize="".$filesize."MB";
				    }else{
				    	$filesize="".$filesize."KB";
				    }
				    //maintype variants are original, medsize, thumb for respective size image.
				    $mediaquery="INSERT INTO media
				    (ownerid,ownertype,maintype,mediatype,location,medsize,thumbnail,title,
				    	details,filesize,width,height)
					VALUES
					('$pageid','blogentry','gallerypic','image','$imagepath',
						'$imagepath2','$imagepath3','$caption','$details','$filesize',
						'$width','$height')";
				    // echo $mediaquery."<br>";
				    $mediarun=mysqli_query($host_connli,$mediaquery)or die(mysqli_error($host_connli)." ".__LINE__."<br>$mediaquery<br>");
				}
			}
		}
	}
	// echo $blogentrytype;
	// echo $pwrdd;
	// for audio post
	if ($blogentrytype=="audio") {
		# code...
		isset($_POST['audiotype'])?$betype=mysql_real_escape_string($_POST['audiotype']):$betype="";
		isset($_POST['audioembed'])?$becode=mysql_real_escape_string($_POST['audioembed']):$becode="";
		if($pwrdd=="nopwrd"){
			if (isset($_FILES['audio']['tmp_name'])&&$_FILES['audio']['tmp_name']!=="") {
				# code...
				$outsaudio=simpleUpload('audio','../files/audio/');
				$audiofilepath=$outsaudio['filelocation'];
				$len=strlen($audiofilepath);
				$audiofilepath=substr($audiofilepath, 1,$len);
				$audiofilesize=$outsaudio['filesize'];
				$mediaquery2="INSERT INTO media(ownerid,ownertype,maintype,mediatype,
					location,filesize)VALUES('$pageid','blogentry','blogentryaudio',
					'audio','$audiofilepath','$audiofilesize')";
				echo "<!--$mediaquery2-->";
				$mediarun2=mysqli_query($host_connli,$mediaquery2)or 
				die(mysqli_error($host_connli)." LINE ".__LINE__);
			}
			
		}else{
			echo $blogentrytype;

			isset($_POST['audiocaption'])?
			$becaption=mysql_real_escape_string($_POST['audiocaption']):$becaption="";
			$audiofilepath="";
			$audiofilesize="0KB";
			if (isset($_FILES['audio']['tmp_name'])&&
				$_FILES['audio']['tmp_name']!=="") {
				# code...
				$outsaudio=simpleUpload('audio','../files/audio/');
				$audiofilepath=$outsaudio['filelocation'];
				$len=strlen($audiofilepath);
				$audiofilepath=substr($audiofilepath, 1,$len);
				$audiofilesize=$outsaudio['filesize'];
			}
			if($audiofilepath!==""||$becode!==""){
				$mediaquery2="INSERT INTO media(ownerid,ownertype,maintype,mediatype,
					location,filesize,title,details)
				VALUES
				('$pageid','blogentry','blogentryaudio','$betype','$audiofilepath',
					'$audiofilesize','$becaption','$becode')";
				// echo "<!--$mediaquery2--> updatecode";
				// echo $mediaquery2." updatecode";
				$mediarun2=mysqli_query($host_connli,$mediaquery2)or 
				die(mysqli_error($host_connli)." LINE ".__LINE__);
			}
		}

	}

	// for video posts
	if ($blogentrytype=="video") {
		# code...
		isset($_POST['videotype'])?$betype=mysql_real_escape_string($_POST['videotype']):$betype="";
		isset($_POST['videoembed'])?$becode=mysql_real_escape_string($_POST['videoembed']):$becode="";

		// legacy
		if($pwrdd=="nopwrd"){

			if (isset($_FILES['videoflv']['tmp_name'])&&$_FILES['videoflv']['tmp_name']!=="") {
				# code...
				$outsaudio=simpleUpload('videoflv','../files/videos/');
				$audiofilepath=$outsaudio['filelocation'];
				$len=strlen($audiofilepath);
				$audiofilepath=substr($audiofilepath, 1,$len);
				$audiofilesize=$outsaudio['filesize'];
				$mediaquery2="INSERT INTO media(ownerid,ownertype,maintype,mediatype,location,filesize)VALUES('$pageid','blogentry','blogentryvideo','videoflv','$audiofilepath','$audiofilesize')";
				$mediarun2=mysqli_query($host_connli,$mediaquery2)or die(mysqli_error($host_connli));
			}
			if (isset($_FILES['videomp4']['tmp_name'])&&$_FILES['videomp4']['tmp_name']!=="") {
				# code...
				$outsaudio=simpleUpload('videomp4','../files/videos/');
				$audiofilepath=$outsaudio['filelocation'];
				$len=strlen($audiofilepath);
				$audiofilepath=substr($audiofilepath, 1,$len);
				$audiofilesize=$outsaudio['filesize'];
				$mediaquery2="INSERT INTO media(ownerid,ownertype,maintype,mediatype,location,filesize)VALUES('$pageid','blogentry','blogentryvideo','videomp4','$audiofilepath','$audiofilesize')";
				$mediarun2=mysqli_query($host_connli,$mediaquery2)or die(mysqli_error($host_connli));
			}
			if (isset($_FILES['video3gp']['tmp_name'])&&$_FILES['video3gp']['tmp_name']!=="") {
				# code...
				$outsaudio=simpleUpload('video3gp','../files/videos/');
				$audiofilepath=$outsaudio['filelocation'];
				$len=strlen($audiofilepath);
				$audiofilepath=substr($audiofilepath, 1,$len);
				$audiofilesize=$outsaudio['filesize'];
				$mediaquery2="INSERT INTO media(ownerid,ownertype,maintype,mediatype,location,filesize)VALUES('$pageid','blogentry','blogentryvideo','video3gp','$audiofilepath','$audiofilesize')";
				$mediarun2=mysqli_query($host_connli,$mediaquery2)or die(mysqli_error($host_connli));
			}
			if (isset($_FILES['videowebm']['tmp_name'])&&$_FILES['videowebm']['tmp_name']!=="") {
				# code...
				$outsaudio=simpleUpload('videowebm','../files/videos/');
				$audiofilepath=$outsaudio['filelocation'];
				$len=strlen($audiofilepath);
				$audiofilepath=substr($audiofilepath, 1,$len);
				$audiofilesize=$outsaudio['filesize'];
				$mediaquery2="INSERT INTO media(ownerid,ownertype,maintype,mediatype,
					location,filesize)VALUES('$pageid','blogentry','blogentryvideo',
					'videowebm','$audiofilepath','$audiofilesize')";
				$mediarun2=mysqli_query($host_connli,$mediaquery2)or die(mysqli_error($host_connli));
			}
		}
		// update
		if($pwrdd!=="nopwrd"){

			// setup default variables first
			$videofilepath1=""; // webm
			$videofilesize1=0; 
			$videofilepath2=""; // 3gp
			$videofilesize2=0;
			$videofilepath3=""; // flv
			$videofilesize3=0;
			$videofilepath4=""; // mp4
			$videofilesize4=0;


			if (isset($_FILES['videowebm']['tmp_name'])&&
				$_FILES['videowebm']['tmp_name']!=="") {
				# code...
				$outsvideo=simpleUpload('videowebm','../files/videos/');
				$videofilepath=$outsvideo['filelocation'];
				$len=strlen($videofilepath);
				$videofilepath1=substr($videofilepath, 1,$len);
				$videofilesize1=$outsvideo['filesize'];
				
			}


			if (isset($_FILES['video3gp']['tmp_name'])&&$_FILES['video3gp']['tmp_name']!=="") {
				# code...
				$outsvideo=simpleUpload('video3gp','../files/videos/');
				$videofilepath=$outsvideo['filelocation'];
				$len=strlen($videofilepath);
				$videofilepath2=substr($videofilepath, 1,$len);
				$videofilesize2=$outsvideo['filesize'];
			}

			if (isset($_FILES['videoflv']['tmp_name'])&&$_FILES['videoflv']['tmp_name']!=="") {
				# code...
				$outsvideo=simpleUpload('videoflv','../files/videos/');
				$videofilepath=$outsvideo['filelocation'];
				$len=strlen($videofilepath);
				$videofilepath3=substr($videofilepath, 1,$len);
				$videofilesize3=$outsvideo['filesize'];
				
			}
			if (isset($_FILES['videomp4']['tmp_name'])&&$_FILES['videomp4']['tmp_name']!=="") {
				# code...
				$outsvideo=simpleUpload('videomp4','../files/videos/');
				$videofilepath=$outsvideo['filelocation'];
				$len=strlen($videofilepath);
				$videofilepath4=substr($videofilepath, 1,$len);
				$videofilesize4=$outsvideo['filesize'];
				
			}

			// convert data to json
			if($videofilepath1!==""||$videofilepath2!==""||$videofilepath3!==""
				||$videofilepath3!==""||$becode!==""){		
				$videofiletotal='{"videotype":"'.$betype.'",
									  "videowebm":{"location":"'.$videofilepath1.'",
												  "size":"'.$videofilesize1.'"},
									  "video3gp":{"location":"'.$videofilepath2.'",
												  "size":"'.$videofilesize2.'"},
									  "videoflv":{"location":"'.$videofilepath3.'",
												  "size":"'.$videofilesize3.'"},
									  "videomp4":{"location":"'.$videofilepath4.'",
												  "size":"'.$videofilesize4.'"},
									  "videoembed":"'.$becode.'"
									}';
				$videofiletotal=mysql_real_escape_string($videofiletotal);
				$mediaquery2="INSERT INTO media(ownerid,ownertype,maintype,mediatype,
				title,details)
					VALUES
					('$pageid','blogentry','blogentryvideo','json_details','',
						'$videofiletotal')";
					// echo $mediaquery2;
				$mediarun2=mysqli_query($host_connli,$mediaquery2)or die(mysqli_error($host_connli)." LINE ".__LINE__);
			}
		}
	}

	// echo "<br>".$blogentry;
	
	//create the rss pubDate format for rss entry
	$datetime= date("D, d M Y H:i:s")." +0100";
	$date=date("d, F Y H:i:s");
	$fullpage="$pagename.php";
	// echo $fullpage;
	// create the physical page based on preobtained page name
	$pagepath='../blog/'.$foldername.'/'.$pagename.'.php';
	$handle = fopen($pagepath, 'w') or die('Cannot open file:  '.$pagepath);
	//set the new page up

	// legacy page setup
	if($pwrdd=="nopwrd"){
		$pagesetup = '<?php 
			session_start();
			include(\'../../snippets/connection.php\');
			$outpage=blogPageCreate('.$pageid.');
			echo $outpage[\'outputpageone\'];
			$blogdata=getSingleBlogEntry('.$pageid.');
			$newview=$blogdata[\'views\']+1;
			genericSingleUpdate("blogentries","views",$newview,"id",'.$pageid.');
		?>';
	}
	// update page setup
	if($pwrdd!=="nopwrd"){
		$pagesetup = '<?php 
			if(session_id()==\'\'){
				session_start();
			}
			if(!function_exists(\'getExtension\')){
				include(\'../../snippets/connection.php\');
			}
			$pageid='.$pageid.';
			
			include($host_tpathplain."modules/blogtemp.php");
			include($host_tpathplain."modules/blogpagecreate.php");
		?>';
	}

	fwrite($handle, $pagesetup);
	fclose($handle);
	if(($schedulestatus!=="yes"&&$schedulestatus!=="on")||$schedulestatus==""){
		//create blog post rss entry
		$introrssentry=str_replace("../",$host_addr,$introparagraph);
		$rssentry='<item>
		<title>'.$title.'</title>
		<link>'.$host_addr.'blog/'.$foldername.'/'.$pagename.'.php</link>
		<pubDate>'.$datetime.'</pubDate>
		<guid isPermaLink="false">'.$host_addr.'blog/?p='.$pageid.'</guid>
		<description>
		<![CDATA['.$introrssentry.']]>
		</description>
		</item>
		';
		$rssentry=mysql_real_escape_string($rssentry);
		// echo $rssentry;
		$rssquery="INSERT INTO rssentries(blogtypeid,blogcategoryid,blogentryid,
			rssentry)VALUES('$blogtypeid','$blogcategoryid','$pageid','$rssentry')";
		$rssrun=mysqli_query($host_connli,$rssquery)or die(mysqli_error($host_connli));
		// write rss information to respective blog type(for autoposting) and blog category
		writeRssData($blogtypeid,0);
		writeRssData(0,$blogcategoryid);
	}else{
		//change the status to schedule to prevent viewers from getting access to it
		$status="schedule";
	}

	//insert the new blog entry to the database
	$pagename=mysql_real_escape_string($pagename);
	$query="INSERT INTO blogentries(blogtypeid,blogcatid,blogentrytype,betype,becode,
		title,introparagraph,blogpost,entrydate,coverphoto,pagename,seometakeywords,
		seometadescription,featuredpost,commentsonoff,commenttype,pwrdd,pwrd,tags,scheduledpost,
		postperiod,date,status)
	VALUES
	('$blogtypeid','$blogcategoryid','$blogentrytype','$betype','$becode','$title',
		'$introparagraph','$blogentry','$date','$coverid','$pagename','$seometakeywords',
		'$seometadescription','$featured','$commentsonoff','$commenttype','$pwrdd','$pwrd',
		'$tags','$schedulestatus','$fullschedulepostperiod','$datetwo','$status')";
	// echo $query;
	$run=mysqli_query($host_connli,$query)or die(mysqli_error($host_connli)." Line ".__LINE__);
	//send new email on blog post to all subscribed users
	if(($schedulestatus!=="yes"&&$schedulestatus!=="on")||$schedulestatus==""){
		if($host_email_send===true){
			sendSubscriberEmail($pageid);
		}
	}
	//end
	$notid=$pageid;
	// prepare content for the notification redirect portion
	$action="Create";
	$actiontype="blogentries";
	$actiondetails="Blog Entry: \"$title\" Created";
	
	// $notrdtype="none";//stops redirection

	// $nonottype="none";// stops notification table update

	// bring in the nrsection.php file
	include('nrsection.php');
	
}elseif ($entryvariant=="createblogcomment") {
	# code...
	$success="true";
	$msg="Comment Created Successfully";
	// get the 
	$ctype="";
	if($entryvariant=="createblogcomment"){
		$ctypeid=0;
		$blogentryid=mysql_real_escape_string($_POST['blogentryid']);
	}else{
		$blogentryid=0;

		$ctypeid=0;
	}

	
	// get the comment type if any
	$type=isset($_POST['type'])?mysql_real_escape_string($_POST['type']):"comment";
	// get the comment id in case of reply type value 
	$commentid=isset($_POST['cid'])?mysql_real_escape_string($_POST['cid']):0;

	$name=mysql_real_escape_string($_POST['fullname']);
	$email=mysql_real_escape_string($_POST['email']);
	
	$website=isset($_POST['website'])?mysql_real_escape_string($_POST['website']):0;
	
	$sectester=isset($_POST['sectester'])?
	mysql_real_escape_string($_POST['sectester']):"none";
	
	$secnumber=isset($_POST['secnumber'])?
	mysql_real_escape_string($_POST['secnumber']):"none";
	
	$comment=mysql_real_escape_string($_POST['comment']);
	
	$date=date("d, F Y H:i:s");

	$query="INSERT INTO comments(fullname,email,website,type,cid,blogentryid,
		comment,datetime)
	VALUES('$name','$email','$website','$type','$commentid','$blogentryid','$comment',
		CURRENT_TIMESTAMP)";
	
	
	if($sectester!=="none"&&$secnumber!=="none"&&$sectester==$secnumber&&$comment!==""){
		$run=briefquery($query,__LINE__,"mysqli",true);
		$appendedparams="&c=success&comid=".$run['resultdata'][0]['id'];
	}else if(trim($comment)!==""){
		$run=briefquery($query,__LINE__,"mysqli",true);
		$appendedparams="&c=success&comid=".$run['resultdata'][0]['id'];
	}else{
		$appendedparams="&c=failed&comid=0";
		$msg="AN Error Occured, No data detected";
		$success="false";
	}
	$returl=isset($_POST['returl'])?
	mysql_real_escape_string($_POST['returl']):"../completion.php";	
	
	// for return json based responses
	if(isset($_POST['rettype'])&&$_POST['rettype']=="json"){
		$output=array("success"=>"$success","msg","$msg");
		echo json_encode($output);
	}else{

		$notid=0;
		$nonottype="none";// stops notification table update
		// $notrdtype="none";//stops redirection

		// bring in the nrsection.php file
		include('nrsection.php');

	}
}elseif ($entryvariant=="createfaq") {
	# code...
	$title=mysql_real_escape_string($_POST['title']);
	$content=mysql_real_escape_string($_POST['content']);
	$query="INSERT INTO faq (title,content)VALUES('$title','$content')";
	// // echo $query;
	$run=briefquery($query,__LINE__,"mysqli","true");

	$notid=$run['resultdata'][0]['id'];
	// prepare content for the notification redirect portion
	$action="Create";
	$actiontype="faq";
	$actiondetails="FAQ Entry: \"$title\" Created";
	
	// $notrdtype="none";//stops redirection

	// $nonottype="none";// stops notification table update

	// bring in the nrsection.php file
	include('nrsection.php');
	 
}elseif ($entryvariant=="createqotd") {
	# code...
	$nextid=getNextIdExplicit('qotd');
	$quotetype=mysql_real_escape_string($_POST['quotetype']);
	$quotedperson=mysql_real_escape_string($_POST['quotedperson']);
	$quoteoftheday=mysql_real_escape_string($_POST['quoteoftheday']);
	$query="INSERT INTO qotd(type,quote,quotedperson)VALUES('$quotetype','$quoteoftheday','$quotedperson')";
	$run=mysqli_query($host_connli,$query)or die(mysqli_error($host_connli)." Line 325");
	if(isset($_FILES['profpic']['tmp_name'])&&$_FILES['profpic']['tmp_name']!==""){
		$image="profpic";
		$imgpath[]='../files/';
		$imgsize[]="default";
		$acceptedsize=",200";
		$imgouts=genericImageUpload($image,"single",$imgpath,$imgsize,$acceptedsize);
		$len=strlen($imgouts[0]);
		$imagepath=substr($imgouts[0], 1,$len);
		// get image size details
		$filedata=getFileDetails($imgouts[0],"image");
		$filesize=$filedata['size'];
		$width=$filedata['width'];
		$height=$filedata['height'];
		// echo '<img src="'.$imgouts[0].'"> '.$filesize.' '.$width.' '.$height.'';
		// get the cover photo's media table id for storage with the blog entry
		$coverid=getNextId("media");
		$mediaquery="INSERT INTO media(ownerid,ownertype,maintype,mediatype,location,filesize,width,height)VALUES('$nextid','qotd','coverphoto','image','$imagepath','$filesize','$width','$height')";
		$mediarun=mysqli_query($host_connli,$mediaquery)or die(mysqli_error($host_connli));
	}
	if(isset($_FILES['bannerpic']['tmp_name'])&&$_FILES['bannerpic']['tmp_name']!==""){
		$image="profpic";
		$imgpath[]='../files/';
		$imgsize[]="default";
		$acceptedsize=",450";
		$imgouts=genericImageUpload($image,"single",$imgpath,$imgsize,$acceptedsize);
		$len=strlen($imgouts[0]);
		$imagepath=substr($imgouts[0], 1,$len);
		// get image size details
		$filedata=getFileDetails($imgouts[0],"image");
		$filesize=$filedata['size'];
		$width=$filedata['width'];
		$height=$filedata['height'];
		// echo '<img src="'.$imgouts[0].'"> '.$filesize.' '.$width.' '.$height.'';
		// get the cover photo's media table id for storage with the blog entry
		$coverid=getNextId("media");
		$mediaquery="INSERT INTO media(ownerid,ownertype,maintype,mediatype,location,filesize,width,height)VALUES('$nextid','qotd','bannerphoto','image','$imagepath','$filesize','$width','$height')";
		$mediarun=mysqli_query($host_connli,$mediaquery)or die(mysqli_error($host_connli));
	}
	if($rurladmin==""){
		$_SESSION['lastsuccess']=0;
		header('location:../admin/adminindex.php?compid=5&type='.$entryvariant.'&v=admin');
	}else{
		header('location:'.$rurladmin.'?compid=5&type='.$entryvariant.'&v=admin');
	}
}elseif ($entryvariant=="createevent") {
	# code...
	$id=getNextIdExplicit('events');
	$type=isset($_POST['eventtype'])?mysql_real_escape_string($_POST['eventtype']):"general";
	$eventtitle=mysql_real_escape_string($_POST['eventtitle']);
	$eventdetails=mysql_real_escape_string($_POST['eventdetails']);
	$coverimage=isset($_FILES['eventcoverimage']['tmp_name'])?$_FILES['eventcoverimage']['tmp_name']:"";
    if($coverimage!=="") {
        # code...
        $image="eventcoverimage";
        $imgpath[0]='../files/originals/';
        $imgpath[1]='../files/medsizes/';
        $imgpath[2]='../files/thumbnails/';
        $imgsize[0]="default";
        $imgsize[1]=",300";
        $imgsize[2]=",85";
        $acceptedsize="";
        $imgouts=genericImageUpload($image,"varying",$imgpath,$imgsize,$acceptedsize);
        $len=strlen($imgouts[0]);
        $len2=strlen($imgouts[1]);
        $len3=strlen($imgouts[2]);
        $imagepath=substr($imgouts[0], 1,$len);
        $imagepath2=substr($imgouts[1], 1,$len2);
        $imagepath3=substr($imgouts[2], 1,$len3);
        // get image size details
        list($width,$height)=getimagesize($imgouts[0]);
        $imagesize=$_FILES[''.$image.'']['size'];
        $filesize=$imagesize/1024;
        //// echo $filefirstsize;
        $filesize=round($filesize, 0, PHP_ROUND_HALF_UP);
        if(strlen($filesize)>3){
        $filesize=$filesize/1024;
        $filesize=round($filesize,2); 
        $filesize="".$filesize."MB";
        }else{
        $filesize="".$filesize."KB";
        }
        //$coverpicid=getNextId("media");
        //maintype variants are original, medsize, thumb for respective size image.
        $mediaquery="INSERT INTO media
        (ownerid,ownertype,maintype,mediatype,location,medsize,thumbnail,filesize,width,height)
		VALUES('$id','event','coverphoto','image','$imagepath','$imagepath2','$imagepath3','$filesize','$width','$height')";
        // echo $mediaquery."<br>";
        $mediarun=mysqli_query($host_connli,$mediaquery)or die(mysqli_error($host_connli)." ".__LINE__."<br>$mediaquery<br>");
    }
	$eventstartdate=mysql_real_escape_string($_POST['eventstartdate']);
	$eventenddate=mysql_real_escape_string($_POST['eventenddate']);
	//verify that the set dates are in the right order
	$datetime1 = new DateTime("$eventstartdate"); // specified scheduled time
	$datetime2 = new DateTime("$eventenddate");
	if($datetime1>$datetime2){
		$sd=$eventstartdate;
		$eventstartdate=$eventenddate;
		$eventenddate=$sd;
	}
	$contactperson=mysql_real_escape_string($_POST['contactperson']);
	$contactnumber=mysql_real_escape_string($_POST['contactnumber']);
	$contactemail=mysql_real_escape_string($_POST['contactemail']);
	$addressslidescount=mysql_real_escape_string($_POST['addressslidescount']);
	if($addressslidescount>0){
		for ($i=1; $i <=$addressslidescount ; $i++) { 
			# code...
			$locationtitle=mysql_real_escape_string($_POST['locationtitle'.$i.'']);
			$address=mysql_real_escape_string($_POST['address'.$i.'']);
			$lat=mysql_real_escape_string($_POST['lat'.$i.'']);
			$lng=mysql_real_escape_string($_POST['lng'.$i.'']);
			$addrquery="INSERT INTO eventaddresses(eventid,locationtitle,address,lat,lng)
					VALUES
					('$id','$locationtitle','$address','$lat','$lng')";
			// echo "<br>$addrquery<br>";
			$addrrun=mysqli_query($host_connli,$addrquery)or die(mysqli_error($host_connli)." Line ".__LINE__);
		}
	}
	$isbookable=mysql_real_escape_string($_POST['isbookable']);
	$bookingsrequirement=mysql_real_escape_string($_POST['bookingsrequirement']);
	$query="INSERT INTO events(type,eventtitle,eventdetails,contactperson,contactnumber,
		contactemail,isbookable,bookingrequirements,startdate,stopdate)
	VALUES
	('$type','$eventtitle','$eventdetails','$contactperson','$contactnumber','$contactemail',
		'$isbookable','$bookingsrequirement','$eventstartdate','$eventenddate')";
	// echo "<br>$query<br>";
	$run=mysqli_query($host_connli,$query)or die(mysqli_error($host_connli)." Line ".__LINE__);
	if($rurladmin==""){
		$_SESSION['lastsuccess']=0;
		header('location:../admin/adminindex.php?compid=6&type='.$entryvariant.'&v=admin');
	}else{
		header('location:'.$rurladmin.'?compid=6&type='.$entryvariant.'&v=admin');
	}
}elseif ($entryvariant=="creategallery") {
	$galleryid=getNextId("gallery");
	$gallerytitle=mysql_real_escape_string($_POST['gallerytitle']);
	$gallerydetails=mysql_real_escape_string($_POST['gallerydetails']);
	$date=date("d, F Y H:i:s");
	$piccount=$_POST['piccount'];
	//echo $piccount;
	if($piccount>0){
		for($i=1;$i<=$piccount;$i++){
		$albumpic=$_FILES['defaultpic'.$i.'']['tmp_name'];
	if($albumpic!==""){
	$image="defaultpic".$i."";
	if(isset($imagepath)){
	unset($imagepath);
	unset($imagesize);
	}
	$imagepath=array();
	$imagesize=array();
	$imgpath[0]='../files/medsizes/';
	$imgpath[1]='../files/thumbnails/';
	$imgsize[0]="default";
	$imgsize[1]=",107";
	// echo count($imgsize);
	$acceptedsize="";
	$imgouts=genericImageUpload($image,"varying",$imgpath,$imgsize,$acceptedsize);
	$len=strlen($imgouts[0]);
	// echo $imgouts[0]."<br>";
	$imagepath=substr($imgouts[0], 1,$len);
	$len2=strlen($imgouts[1]);
	// echo $imgouts[1]."<br>";
	$imagepath2=substr($imgouts[1], 1,$len2);
	// get image size details
	$filedata=getFileDetails($imgouts[0],"image");
	$filesize=$filedata['size'];
	$width=$filedata['width'];
	$height=$filedata['height'];
	// get the cover photo's media table id for storage with the blog entry
	$mediaquery="INSERT INTO media(ownerid,ownertype,details,mediatype,location,filesize,width,height)VALUES('$galleryid','gallery','$imagepath2','image','$imagepath','$filesize','$width','$height')";
	$mediarun=mysqli_query($host_connli,$mediaquery)or die(mysqli_error($host_connli));
	}
	}
	}
	$query="INSERT INTO gallery(gallerytitle,gallerydetails,entrydate)VALUES('$gallerytitle','$gallerydetails','$date')";
	// echo $query;
	$run=mysqli_query($host_connli,$query)or die(mysqli_error($host_connli)." Line 325");
	// header('location:../admin/adminindex.php?compid=5&type='.$entryvariant.'&v=admin');
	if($rurladmin==""){
		$_SESSION['lastsuccess']=0;
		header('location:../admin/adminindex.php?compid=7&type='.$entryvariant.'&v=admin');
	}else{
		header('location:'.$rurladmin.'?compid=7&type='.$entryvariant.'&v=admin');
	}
}elseif ($entryvariant=="creategallerystream") {
	$galleryid=getNextId("gallery");
	$gallerytitle=isset($_POST['type'])&&$_POST['type']!==""?$_POST['type']:"portfoliogallerystream";
	$qdata=briefquery("SELECT * FROM gallery WHERE gallerytitle='$gallerytitle'");
	$date=date('Y-m-d H:i:s');
	if($qdata['numrows']>0){
		$galleryid=$qdata['resultdata'][0]['id'];
	}else{
		$query="INSERT INTO gallery
		(gallerytitle,gallerydetails,entrydate)
		VALUES
		('$gallerytitle','A gallery Stream','$date')";
		$run=mysqli_query($host_connli,$query)or die(mysqli_error($host_connli)." Line ".__LINE__);

	}
	$piccount=$_POST['galleryslidescount'];
	//echo $piccount;
	if($piccount>0){
		for($i=1;$i<=$piccount;$i++){
			$albumpic=$_FILES['galimage'.$i.'']['tmp_name'];
			if($albumpic!==""){
				$caption=$_POST['caption'.$i.''];
				$details=$_POST['details'.$i.''];

				$image="galimage".$i."";
				if(isset($imagepath)){
					unset($imagepath);
					unset($imagesize);
				}
				$imagepath=array();
				$imagesize=array();
				$imgpath[0]='../files/originals/';
				$imgpath[1]='../files/medsizes/';
				$imgpath[2]='../files/thumbnails/';
				$imgsize[0]="default";
				$imgsize[1]=",300";
				$imgsize[2]=",85";
				// echo count($imgsize);
				$acceptedsize="";
				$imgouts=genericImageUpload($image,"varying",$imgpath,$imgsize,$acceptedsize);
				// get the orignal filepath
				$len=strlen($imgouts[0]);
				$imagepath=substr($imgouts[0], 1,$len);
				// get the medsize filepath
				$len2=strlen($imgouts[1]);
				$imagepath2=substr($imgouts[1], 1,$len2);
				// get the medsize filepath
				$len3=strlen($imgouts[2]);
				$imagepath3=substr($imgouts[2], 1,$len3);
				// get image size details
				$filedata=getFileDetails($imgouts[0],"image");
				$filesize=$filedata['size'];
				$width=$filedata['width'];
				$height=$filedata['height'];
				// get the cover photo's media table id for storage with the blog entry
				$mediaquery="INSERT INTO media(ownerid,ownertype,maintype,title,details,mediatype,location,medsize,thumbnail,filesize,width,height)
				VALUES
				('$galleryid','$gallerytitle','gallery','$caption','$details','image','$imagepath','$imagepath2','$imagepath3','$filesize','$width','$height')";
				echo $mediaquery;
				$mediarun=mysqli_query($host_connli,$mediaquery)or die(mysqli_error($host_connli)." Line ".__LINE__);
			}
		}
	}
	// header('location:../admin/adminindex.php?compid=5&type='.$entryvariant.'&v=admin');
	if($rurladmin==""){
		$_SESSION['lastsuccess']=0;
		header('location:../admin/adminindex.php?compid=8&type='.$entryvariant.'&v=admin');
	}else{
		header('location:'.$rurladmin.'?compid=8&type='.$entryvariant.'&v=admin');
	}
}else if ($entryvariant=="createbranch") {
  # code... 
  echo "In Here ".__LINE__;
  $bid=getNextId("branches");
  $location=mysql_real_escape_string($_POST['locationtitle']);
  $lat=mysql_real_escape_string($_POST['latitude']);
  $lng=mysql_real_escape_string($_POST['longitude']);
  $address=mysql_real_escape_string($_POST['address']);
  $mphonenumbers=mysql_real_escape_string($_POST['phonenumbers1']);
  $memail=mysql_real_escape_string($_POST['email1']);
  $mcontactpersons=mysql_real_escape_string($_POST['contactpersons1']);
  $extracontacts=mysql_real_escape_string($_POST['curcontactcount']);
  $mainbranch=isset($_POST['mainbranch'])&&$_POST['mainbranch']!==""?mysql_real_escape_string($_POST['mainbranch']):"subbranch";
  if($extracontacts>1){
    for($i=2;$i<=$extracontacts;$i++){
      $phonenumbers=mysql_real_escape_string($_POST['phonenumbers'.$i.'']);
      $email=mysql_real_escape_string($_POST['email'.$i.'']);
      $contactpersons=mysql_real_escape_string($_POST['contactpersons'.$i.'']);
      if($phonenumbers!==""&&$email!==""&&$contactpersons!==""){
          $subquery="INSERT INTO branchsubcontacts(bid,contactname,phonenumbers,email)VALUES('$bid','$contactpersons','$phonenumbers','$email')";
          $subrun=mysqli_query($host_connli,$subquery)or die(mysqli_error($host_connli)." Line ".__LINE__);        
      }
    }
  }
  $query="INSERT INTO branches(location,lat,lng,address,contactname,phonenumbers,email,branchtype)VALUES('$location','$lat','$lng','$address','$mcontactpersons','$mphonenumbers','$memail','$mainbranch')";
  $run=mysqli_query($host_connli,$query)or die(mysqli_error($host_connli)." Line ".__LINE__);
  // echo $query;
  if ($mainbranch!==""&&$mainbranch=="mainbranch") {
    # code...
    // update all previous branch entries
    $query="UPDATE branches SET branchtype='subbranch' WHERE id!='$bid'";
    $run=mysqli_query($host_connli,$query)or die(mysqli_error($host_connli)." Line ".__LINE__);
  }
		$_SESSION['lastsuccess']=0;
  header('location:../admin/adminindex.php?compid=9&type='.$entryvariant.'&v=admin&d='.$bid.'');
}elseif ($entryvariant=="createtrendingtopic") {
	$trendid=getNextId("trendingtopics");
	$details=mysql_real_escape_string($_POST['name']);
	$image="profpic";
	$imgpath[0]='../files/';
	$imgsize[0]="default";
	$acceptedsize=",150";
	$imgouts=genericImageUpload($image,"single",$imgpath,$imgsize,$acceptedsize);
	$len=strlen($imgouts[0]);
	$imagepath=substr($imgouts[0], 1,$len);
	// get image size details
	$filedata=getFileDetails($imgouts[0],"image");
	$filesize=$filedata['size'];
	$width=$filedata['width'];
	$height=$filedata['height'];
	// echo '<img src="'.$imgouts[0].'"> '.$filesize.' '.$width.' '.$height.'';
	// get the cover photo's media table id for storage with the blog entry
	$mediaquery="INSERT INTO media(ownerid,ownertype,maintype,mediatype,location,filesize,width,height)VALUES('$trendid','trendingtopic','coverphoto','image','$imagepath','$filesize','$width','$height')";
	$mediarun=mysqli_query($host_connli,$mediaquery)or die(mysqli_error($host_connli));
	# code...

	$query="INSERT INTO trendingtopics(details)VALUES('$details')";
	// echo $query;
	$run=mysqli_query($host_connli,$query)or die(mysqli_error($host_connli)." Line ".__LINE__);
	// header('location:../admin/adminindex.php?compid=9&type='.$entryvariant.'&v=admin');
	if($rurladmin==""){
		$_SESSION['lastsuccess']=0;
		header('location:../admin/adminindex.php?compid=10&type='.$entryvariant.'&v=admin');
	}else{
		header('location:'.$rurladmin.'?compid=10&type='.$entryvariant.'&v=admin');
	}
}elseif ($entryvariant=="createtoptenplaylist") {
	# code...
	$toptenid=getNextId("toptenplaylist");
	$image="profpic";
	$imgpath[0]='../files/';
	$imgsize[0]="default";
	$acceptedsize=",150";
	$imgouts=genericImageUpload($image,"single",$imgpath,$imgsize,$acceptedsize);
	$len=strlen($imgouts[0]);
	$imagepath=substr($imgouts[0], 1,$len);
	// get image size details
	$filedata=getFileDetails($imgouts[0],"image");
	$filesize=$filedata['size'];
	$width=$filedata['width'];
	$height=$filedata['height'];
	// echo '<img src="'.$imgouts[0].'"> '.$filesize.' '.$width.' '.$height.'';
	// get the cover photo's media table id for storage with the blog entry
	$mediaquery="INSERT INTO media(ownerid,ownertype,maintype,mediatype,location,filesize,width,height)VALUES('$toptenid','toptenplaylist','coverphoto','image','$imagepath','$filesize','$width','$height')";
	$mediarun=mysqli_query($host_connli,$mediaquery)or die(mysqli_error($host_connli));
		# code...
	$outsaudio=simpleUpload('music','../files/audio/');
	$audiofilepath=$outsaudio['filelocation'];
	$len=strlen($audiofilepath);
	$audiofilepath=substr($audiofilepath, 1,$len);
	$audiofilesize=$outsaudio['filesize'];
	$mediaquery2="INSERT INTO media(ownerid,ownertype,maintype,mediatype,location,filesize)VALUES('$toptenid','toptenplaylist','musicfile','audio','$audiofilepath','$audiofilesize')";
	$mediarun2=mysqli_query($host_connli,$mediaquery2)or die(mysqli_error($host_connli));
	$title=mysql_real_escape_string($_POST['title']);
	$artist=mysql_real_escape_string($_POST['artist']);
	// echo $title.$artist;
	$query="INSERT INTO toptenplaylist(title,artist)VALUES('$title','$artist')";
	// echo $query;
	$run=mysqli_query($host_connli,$query)or die(mysqli_error($host_connli)." Line 437");
	// header('location:../admin/adminindex.php?compid=10&type='.$entryvariant.'&v=admin');
	if($rurladmin==""){
		$_SESSION['lastsuccess']=0;
		header('location:../admin/adminindex.php?compid=11&type='.$entryvariant.'&v=admin');
	}else{
		header('location:'.$rurladmin.'?compid=11&type='.$entryvariant.'&v=admin');
	}
}elseif ($entryvariant=="createtopaudio") {
	# code...
	$topaudioid=getNextId("topaudio");
	# code...
	$outsaudio=simpleUpload('music','../files/audio/');
	$audiofilepath=$outsaudio['filelocation'];
	$len=strlen($audiofilepath);
	$audiofilepath=substr($audiofilepath, 1,$len);
	$audiofilesize=$outsaudio['filesize'];
	$mediaquery2="INSERT INTO media(ownerid,ownertype,maintype,mediatype,location,filesize)VALUES('$topaudioid','topaudio','musicfile','audio','$audiofilepath','$audiofilesize')";
	$mediarun2=mysqli_query($host_connli,$mediaquery2)or die(mysqli_error($host_connli));
	$title=mysql_real_escape_string($_POST['title']);
	// echo $title.$artist;
	$date= date("Y-m-d")."";
	$query="INSERT INTO topaudio(title,entrydate)VALUES('$title','$date')";
	// echo $query;
	$run=mysqli_query($host_connli,$query)or die(mysqli_error($host_connli)." Line 757");
	// header('location:../admin/adminindex.php?compid=10&type='.$entryvariant.'&v=admin');
	if($rurladmin==""){
		$_SESSION['lastsuccess']=0;
		header('location:../admin/adminindex.php?compid=12&type='.$entryvariant.'&v=admin');
	}else{
		header('location:'.$rurladmin.'?compid=12&type='.$entryvariant.'&v=admin');
	}
}elseif ($entryvariant=="createportfolio") {
	# code...
	$entryid=getNextId('portfolio');
	$portfoliotype=$_POST['portfoliotype'];
	$fromperiod=$_POST['fromperiod'];
	$toperiod=$_POST['toperiod'];
	$toperiod==""?$toperiod="Ongoing":$toperiod;
	$audiotitle1=$_POST['audiotitle1'];
	$audio1=$_FILES['audio1']['tmp_name'];
	if($audio1!==""){
		$outsaudio=simpleUpload('audio1','../files/audio/');
		$audiofilepath=$outsaudio['filelocation'];
		$len=strlen($audiofilepath);
		$audiofilepath=substr($audiofilepath, 1,$len);
		$audiofilesize=$outsaudio['filesize'];
		$mediaquery2="INSERT INTO media(ownerid,ownertype,maintype,mediatype,location,filesize,title)VALUES('$entryid','portfolio','musicfile','audio','$audiofilepath','$audiofilesize','$audiotitle1')";
		// echo $mediaquery2;
		$mediarun2=mysqli_query($host_connli,$mediaquery2)or die(mysqli_error($host_connli));
	}
	$audiotitle2=$_POST['audiotitle2'];
	$audio2=$_FILES['audio2']['tmp_name'];
	if($audio2!==""){
		$outsaudio=simpleUpload('audio2','../files/audio/');
		$audiofilepath=$outsaudio['filelocation'];
		$len=strlen($audiofilepath);
		$audiofilepath=substr($audiofilepath, 1,$len);
		$audiofilesize=$outsaudio['filesize'];
		$mediaquery2="INSERT INTO media(ownerid,ownertype,maintype,mediatype,location,filesize,title)VALUES('$entryid','portfolio','musicfile','audio','$audiofilepath','$audiofilesize','$audiotitle2')";
		// echo $mediaquery2;
		$mediarun2=mysqli_query($host_connli,$mediaquery2)or die(mysqli_error($host_connli));
	}
	$audiotitle3=$_POST['audiotitle3'];
	$audio3=$_FILES['audio3']['tmp_name'];
	if($audio3!==""){
	    $outsaudio=simpleUpload('audio3','../files/audio/');
		$audiofilepath=$outsaudio['filelocation'];
		$len=strlen($audiofilepath);
		$audiofilepath=substr($audiofilepath, 1,$len);
		$audiofilesize=$outsaudio['filesize'];
		$mediaquery2="INSERT INTO media(ownerid,ownertype,maintype,mediatype,location,filesize,title)VALUES('$entryid','portfolio','musicfile','audio','$audiofilepath','$audiofilesize','$audiotitle3')";
	  	// echo $mediaquery2;
	    $mediarun2=mysqli_query($host_connli,$mediaquery2)or die(mysqli_error($host_connli));
	}
  	$youtubeembed=$_POST['youtubeembed'];
	if($youtubeembed!==""){
		$mediaquery2="INSERT INTO media(ownerid,ownertype,maintype,mediatype,location)VALUES('$entryid','portfolio','youtubeembed','video','$youtubeembed')";
		// echo $mediaquery2;
		$mediarun2=mysqli_query($host_connli,$mediaquery2)or die(mysqli_error($host_connli));
	}
	$galid=$_POST['attachgallery'];
	$companyname=$_POST['companyname'];
	$positionheld=$_POST['positionheld'];
	$projecttitle=$_POST['projecttitle'];
	$entrydetails=$_POST['entrydetails'];
	if($portfoliotype=="companyentry"){
		$projecttitle="";
	}else if($portfoliotype=="projectentry"){
		$companyname="";
		$positionheld="";
	}
	$query="INSERT INTO portfolio (type,galid,companyname,position,projecttitle,periodstart,periodend,details)VALUES
	('$portfoliotype','$galid','$companyname','$positionheld','$projecttitle','$fromperiod','$toperiod','$entrydetails')";
	// echo $query;
	$run=mysqli_query($host_connli,$query)or die(mysqli_error($host_connli)." Line ".__LINE__);
	header('location:../admin/adminindex.php?compid=7&t=1&v=admin');
}elseif ($entryvariant=="createadvert") {
	# code...
	echo "in here";
	$advertid=getNextId("adverts");	
	$advertpage=mysql_real_escape_string($_POST['advertpage']);
	$adverttype=mysql_real_escape_string($_POST['adverttype']);
	$adverttitle=mysql_real_escape_string($_POST['adverttitle']);
	$advertowner=mysql_real_escape_string($_POST['advertowner']);
	if($adverttype=="banneradvert"||$adverttype=="miniadvert"){
	$image="profpic";
	$adverttype=="banneradvert"?$imgpath[0]="../images/adverts/banners/":$imgpath[0]="../images/adverts/miniadverts/";
	$imgsize[0]="default";
	$adverttype=="banneradvert"?$acceptedsize=",250":$acceptedsize=",200";
	$imgouts=genericImageUpload($image,"single",$imgpath,$imgsize,$acceptedsize);
	$len=strlen($imgouts[0]);
	$imagepath=substr($imgouts[0], 1,$len);
	// get image size details
	$filedata=getFileDetails($imgouts[0],"image");
	$filesize=$filedata['size'];
	$width=$filedata['width'];
	$height=$filedata['height'];
	// echo '<img src="'.$imgouts[0].'"> '.$filesize.' '.$width.' '.$height.'';
	// get the cover photo's media table id for storage with the blog entry
	$mediaquery="INSERT INTO media(ownerid,ownertype,maintype,mediatype,location,filesize,width,height)VALUES('$advertid','advert','$adverttype','image','$imagepath','$filesize','$width','$height')";
	$mediarun=mysqli_query($host_connli,$mediaquery)or die(mysqli_error($host_connli));
	}else if($adverttype=="videoadvert"){
	$outsvideo=simpleUpload('profpic','../files/video/');
	$videofilepath=$outsvideo['filelocation'];
	$len=strlen($videofilepath);
	$videofilepath=substr($videofilepath, 1,$len);
	$videofilesize=$outsvideo['filesize'];
	$mediaquery2="INSERT INTO media(ownerid,ownertype,maintype,mediatype,location,filesize)VALUES('$advertid','advert','video','video','$videofilepath','$videofilesize')";
	$mediarun2=mysqli_query($host_connli,$mediaquery2)or die(mysqli_error($host_connli));
	}

	$advertlandingpage=mysql_real_escape_string($_POST['advertlandingpage']);
	$query="INSERT INTO adverts(owner,landingpage,type,title,activepage)VALUES('$advertowner','$advertlandingpage','$adverttype','$adverttitle','$advertpage')";
	// echo $query;
	$run=mysqli_query($host_connli,$query)or die(mysqli_error($host_connli)." Line 437");
	// header('location:../admin/adminindex.php?compid=13&type='.$entryvariant.'&v=admin');
	if($rurladmin==""){
		$_SESSION['lastsuccess']=0;
	 	header('location:../admin/adminindex.php?compid=13&type='.$entryvariant.'&v=admin');
	}else{
		header('location:'.$rurladmin.'?compid=13&type='.$entryvariant.'&v=admin');
	}
}elseif($entryvariant=="createstoreaudio"){
    $entryid=getNextId("onlinestoreentries");
    $type=mysql_real_escape_string($_POST['type']);
    $title=mysql_real_escape_string($_POST['title']);
    $minititle=mysql_real_escape_string($_POST['minititle']);
    $minidescription=mysql_real_escape_string($_POST['minidescription']);
    $price=mysql_real_escape_string($_POST['price']);
    if(isset($_FILES['audio']['tmp_name'])&&$_FILES['audio']['tmp_name']!==""){ 
      require_once 'phpmp3.php';
      $defstrt=20;
      $defstop=300;
      $pstrt=$_POST['prevstart'];
      $pstop=$_POST['prevstop'];
      $prevstartprev=$_POST['prevstart'];
      $prevstopprev=$_POST['prevstop'];
      if(isset($_POST['prevstart'])&&isset($_POST['prevstop'])){
        if($_POST['prevstart']!==""){
          $pstrt=explode(":",$pstrt);
          $pmantis=$pstrt[0]*60;
          isset($pstrt[0])&&$pstrt[0]>=0?$pmantis=$pstrt[0]*60:$pmantis=20;
          isset($pstrt[1])&&$pstrt[1]!==""?$pmantis2=$pstrt[1]:$pmantis2=0;
          $pstrt=$pmantis+$pmantis2;
        }
        if($_POST['prevstop']!==""){
          $pstop=explode(":",$pstop);
          isset($pstop[0])&&$pstop[0]>=0?$pmantis=$pstop[0]*60:$pmantis=300;
          isset($pstop[1])&&$pstop[1]!==""?$pmantis2=$pstop[1]:$pmantis2=0;
          $pstop=$pmantis+$pmantis2;
        }
        $pstrt>$pstop?$defstop=$pstrt:$defstop=$pstop;
        $pstrt<$pstop?$defstart=$pstrt:$defstart=$pstop;
        // $defstop=$defstop-$defstart;
      }
          // echo "i here $defstart - $defstop";
      $defstop=$defstop-$defstart;

      $outsaudio=simpleUpload('audio','../files/audio/');
      $filerealname=$_FILES['audio']['name'];
      $teepy=explode(".",$_FILES['audio']['name']);
      $step="";
      for ($t=0;$t<count($teepy);$t++) {
        # code...
        if($t!==count($teepy)-1&&$t>0){
          $step.=$teepy[$t];
        }

      }
      
      // echo "<br> tco: $tco<br> teepy2: $teepy[0]";
      $filerealname=$teepy[0].$step;
      // $filerealname=$teepy[0];
      $audiofilepath=$outsaudio['filelocation'];
      $mp3 = new PHPMP3($audiofilepath);
      $mp3=$mp3->extract($defstart, $defstop);
      $mp3->save('../files/audio/'.$filerealname.''.md5($entryid).'.mp3');
      $audiofilepath2='../files/audio/'.$filerealname.''.md5($entryid).'.mp3';
      require_once("../getid3/getid3.php");
      $TaggingFormat = 'UTF-8';
      // Initialize getID3 engine
      $getID3 = new getID3;
      $getID3->setOption(array('encoding'=>$TaggingFormat));
      $Filename = (isset($_REQUEST['Filename']) ? $_REQUEST['Filename'] : $audiofilepath);
      $TagFormatsToWrite = (isset($_POST['TagFormatsToWrite']) ? $_POST['TagFormatsToWrite'] : array());
      $TagFormatsToWrite['Tags']="id3v2.4";
      getid3_lib::IncludeDependency(GETID3_INCLUDEPATH.'write.php', __FILE__, true);
      $tagwriter = new getid3_writetags;
      $tagwriter->filename       = $Filename;
      $tagwriter->tagformats     = $TagFormatsToWrite;
      $tagwriter->overwrite_tags = true;
      $tagwriter->tag_encoding   = $TaggingFormat;
      $TagData=array();
      $commonkeysarray = array('Title', 'Artist', 'Album', 'Year', 'Comment');
      $TagData['title'][] = "$title";
      $TagData['artist'][] = "Muyiwa Afolabi";
      $TagData['album'][] = "$album";
      $TagData['year'][] = "2015";
      $TagData['comment'][] = "";
      $TagData['genre'][] = "MOTIVATION";
      $TagData['genre'][] = "Inspirational";
      $TagData['track'][] = isset($_POST['Track'])&&$_POST['Track'].(!empty($_POST['TracksTotal']) ? '/'.$_POST['TracksTotal'] : '01');
  
      if (!empty($audiofilepath)) {
        if (in_array('id3v2.4', $tagwriter->tagformats) || in_array('id3v2.3', $tagwriter->tagformats) || in_array('id3v2.2', $tagwriter->tagformats)|| in_array('id3v2', $tagwriter->tagformats)||in_array('id3v2.0', $tagwriter->tagformats)) {
          if (file_exists($audiofilepath)) {
            ob_start();
            if ($fd = fopen(''.$albumart.'', 'rb')) {
              ob_end_clean();
              $APICdata = fread($fd, filesize(''.$albumart.''));
              fclose ($fd);
              list($APIC_width, $APIC_height, $APIC_imageTypeID) = GetImageSize(''.$albumart.'');
              $imagetypes = array(1=>'gif', 2=>'jpeg', 3=>'png');
              if (isset($imagetypes[$APIC_imageTypeID])) {
                $TagData['attached_picture'][0]['data']          = $APICdata;
                $TagData['attached_picture'][0]['picturetypeid'] = "2";
                $TagData['attached_picture'][0]['description']   = "Cover Art";
                $TagData['attached_picture'][0]['mime']          = 'image/'.$imagetypes[$APIC_imageTypeID];
              } else {
                echo '<b>invalid image format (only GIF, JPEG, PNG)</b><br>';
              }
            } else {
              $errormessage = ob_get_contents();
              ob_end_clean();
              echo '<b>cannot open '.$audiofilepath.'</b><br>';
            }
          } else {
            echo '<b>!is_uploaded_file('.$audiofilepath.')</b><br>';
          }
        } else {
          echo '<b>WARNING:</b> Can only embed images for ID3v2<br>';
        }
      }

      $tagwriter->tag_data = $TagData;
      if ($tagwriter->WriteTags()) {
        echo 'Successfully wrote tags<BR>';
        if (!empty($tagwriter->warnings)) {
          echo 'There were some warnings:<BLOCKQUOTE STYLE="background-color:#FFCC33; padding: 10px;">'.implode('<br><br>', $tagwriter->warnings).'</BLOCKQUOTE>';
        }
      } else {
        echo 'Failed to write tags!<BLOCKQUOTE STYLE="background-color:#FF9999; padding: 10px;">'.implode('<br><br>', $tagwriter->errors).'</BLOCKQUOTE>';
      }
      /*end*/
      $len=strlen($audiofilepath);
      $audiofilepath=substr($audiofilepath, 1,$len);
      //mini audio file
      $len2=strlen($audiofilepath2);
      $audiofilepath2=substr($audiofilepath2, 1,$len2);
      $audiofilesize=$outsaudio['filesize'];
      $aid=getNextIdExplicit("media");
      $mediaquery2="INSERT INTO media(ownerid,ownertype,maintype,mediatype,location,details,filesize)VALUES('$entryid','storeaudio','audiofile','audio','$audiofilepath','$audiofilepath2','$audiofilesize')";
      // echo $mediaquery2;
      $mediarun2=mysqli_query($host_connli,$mediaquery2)or die(mysqli_error($host_connli));

    }
    if(isset($_FILES['profpic']['tmp_name'])&&$_FILES['profpic']['tmp_name']!==""){ 
      $image="profpic";
      $imgpath[0]='../files/';
      $imgsize[0]="default";
      $acceptedsize=",250";
      $imgouts=genericImageUpload($image,"single",$imgpath,$imgsize,$acceptedsize);
      $len=strlen($imgouts[0]);
      $imagepath=substr($imgouts[0], 1,$len);
      // get image size details
      $filedata=getFileDetails($imgouts[0],"image");
      $filesize=$filedata['size'];
      $width=$filedata['width'];
      $height=$filedata['height'];
      $coverid=getNextIdExplicit("media");
      $mediaquery="INSERT INTO media(ownerid,ownertype,maintype,mediatype,location,filesize,width,height)VALUES('$entryid','storeaudio','','image','$imagepath','$filesize','$width','$height')";
      // echo $mediaquery;
      $mediarun=mysqli_query($host_connli,$mediaquery)or die(mysqli_error($host_connli));
    }
    // echo $title.$artist;
    $date= date("Y-m-d")."";
    $query="INSERT INTO onlinestoreentries(typeid,title,minititle,minidescription,price,aid,coverid,starttime,stoptime,entrydate)VALUES('$type','$title','$minititle','$minidescription','$price','$aid','$coverid','$prevstartprev','$prevstopprev','$date')";
    // echo $query;
    $run=mysqli_query($host_connli,$query)or die(mysqli_error($host_connli)." Line 757");
    // header('location:../admin/adminindex.php?compid=10&type='.$entryvariant.'&v=admin');
    if($rurladmin==""){
		$_SESSION['lastsuccess']=0;
	 	header('location:../admin/adminindex.php?compid=14&type='.$entryvariant.'&v=admin');
	}else{
		header('location:'.$rurladmin.'?compid=14&type='.$entryvariant.'&v=admin');
	}
}else if($entryvariant=="minicontactform"){
	$fullname=mysql_real_escape_string($_POST['name']);
	$email=mysql_real_escape_string($_POST['email']);
	$comments=mysql_real_escape_string($_POST['message']);
	$title=isset($_POST['title'])?mysql_real_escape_string($_POST['title']):"Contact Request";
	$content='
		<p style="text-align:left;">
			Hello Admin,<br>
			A contact request occured on '.$host_website_name.', <br><br>
			Fullname: '.$fullname.'<br>
		 	Email: '.$email.'<br>
		</p>
		<p>
		 	Comments: '.$comments.'<br>

		</p>
		<a href="mailto:'.$email.'">Click to reply</a>
		<p style="text-align:right;">Thank You.</p>
	';
	$footer='

	';
	$emailout=generateMailMarkUp("dreambench.io","$email","$title","$content","$footer","");
	// // echo $emailout['rowmarkup'];
	$toemail="info@fvtafrica.com";
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$headers .= 'From: <no-reply@fvtafrica.com>' . "\r\n";
	// $headers .= 'Cc: info@fvtafrica.com' . "\r\n";
	$subject=$title;
	if($host_email_send===true){
		if(mail($toemail,$subject,$emailout['rowmarkup'],$headers)){
				// echo "OK";
				header('location:../completion.php?t=contactform&rurl=');
		}else{
		  die('Could not send Your email, something went wrong and we are handling it, meantime you could click the back button in your browser to get you out of here, we are really sorry');
		}
	}else{
		echo $emailout['rowmarkup'];
		// header('location:../completion.php?t=contactform&rurl=');
	}
	// echo "OK";
}else if($entryvariant=="contacthelpdesk"||$entryvariant=="contacthelpdesktwo"){
  $email=mysql_real_escape_string($_POST['email']);
  $name=mysql_real_escape_string($_POST['name']);
  $subject=mysql_real_escape_string($_POST['subject']);
  $message=mysql_real_escape_string($_POST['message']);
  $title="$subject";
  $content='
    <p style="text-align:left;">Hello Admin,<br>
    An individual named <b>'.$name.'</b> sent/asked the following, <br>
    Subject: <b>'.$subject.'</b><br>
    '.$message.'
    </p>
    <a href="mailto:'.$email.'">Click to reply</a>
    <p style="text-align:right;">Thank You.</p>
  ';
  $footer='
    <!--<ul>
        <li><strong>Phone 1: </strong>0701-682-9254</li>
        <li><strong>Phone 2: </strong>0802-916-3891</li>
        <li><strong>Phone 3: </strong>0803-370-7244</li>
        <li><strong>Email: </strong><a href="mailto:info@fvtafrica.com">info@fvtafrica.com</a></li>
    </ul>-->
  ';
  $emailout=generateMailMarkUp("fvtafrica.com","$email","$title","$content","$footer","");
  // // echo $emailout['rowmarkup'];
  $toemail="admin@fvtafrica.com";
  $headers = "MIME-Version: 1.0" . "\r\n";
  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
  $headers .= 'From: <no-reply@fvtafrica.com>' . "\r\n";
  $headers .= 'Cc: info@fvtafrica.com' . "\r\n";
  $headers .= 'Cc: kenni3000000@gmail.com' . "\r\n";
  $subject="A new contact message";
  if($host_email_send===true){
    if(mail($toemail,$subject,$emailout['rowmarkup'],$headers)){
  		echo "OK";
    }else{
      die('Could not send Your email, something went wrong and we are handling it, meantime you could click the back button in your browser to get you out of here, we are really sorry');
    }
  }else{
		echo $emailout['rowmarkup'];
		// header('location:../completion.php?t=membership&rurl=');
	}

}else if($entryvariant=="infoandbookingform"){
  $name=mysql_real_escape_string($_POST['name']);
  $email=mysql_real_escape_string($_POST['email']);
  $eventtitle=mysql_real_escape_string($_POST['eventtitle']);
  $eventid=mysql_real_escape_string($_POST['eventid']);
  $phonenumber=mysql_real_escape_string($_POST['phonenumber']);
  $subject=mysql_real_escape_string($_POST['messagereason']);
  $message=mysql_real_escape_string($_POST['message']);
  $title="$subject";
  $content='
    <p style="text-align:left;">Hello Admin,<br>
	    In response to the event posted <br>
	    <h2>'.$eventtitle.'</h2>
	    An individual with the details<br>
	    Name: <b>'.$name.'</b> , <br>
	    Phone Number: <b>'.$phonenumber.'</b> , <br>
	    Subject: <b>'.$subject.'</b><br>
	    <b>Message</b><br>'.$message.'
    </p>
    <a href="mailto:'.$email.'">Click to reply</a>
    <p style="text-align:right;">Thank You.</p>
  ';
  $footer='
    <!--<ul>
        <li><strong>Phone 1: </strong>0701-682-9254</li>
        <li><strong>Phone 2: </strong>0802-916-3891</li>
        <li><strong>Phone 3: </strong>0803-370-7244</li>
        <li><strong>Email: </strong><a href="mailto:info@fvtafrica.com">info@fvtafrica.com</a></li>
    </ul>-->
  ';
  $emailout=generateMailMarkUp("fvtafrica.com","$email","$title","$content","$footer","");
  // // echo $emailout['rowmarkup'];
  $toemail="admin@fvtafrica.com";
  $headers = "MIME-Version: 1.0" . "\r\n";
  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
  $headers .= 'From: <no-reply@fvtafrica.com>' . "\r\n";
  $headers .= 'Cc: info@fvtafrica.com' . "\r\n";
  $headers .= 'Cc: kenni3000000@gmail.com' . "\r\n";
  $subject="A new contact message";
  if($host_email_send===true){
    if(mail($toemail,$subject,$emailout['rowmarkup'],$headers)){
  		// echo "OK";
		header('location:../completion.php?t=eventinforegistration&rurl=');
    }else{
      die('Could not send Your email, something went wrong and we are handling it, meantime you could click the back button in your browser to get you out of here, we are really sorry');
    }
  }else{
		echo $emailout['rowmarkup'];
		// header('location:../completion.php?t=eventinforegistration&rurl=');
  }

}else if ($entryvariant=="recommendation"||
	$entryvariant=="clientelle"||
	$entryvariant=="testimonial") {
  # code...
  $type=$entryvariant;
  $curbannerslidecount=$entryvariant=="recommendation"?$_POST['currecommendationslidecount']:($entryvariant=="testimonial"?$_POST['curtestimonialslidecount']:($entryvariant=="clientelle"?$_POST['curclientelleslidecount']:$_POST['currecommendationslidecount']));
  for($i=1;$i<=$curbannerslidecount;$i++){
    $cnrid=getNextId('clientnrec');
    $picout=$_FILES['slide'.$i.'']['tmp_name'];
    $fullname=mysql_real_escape_string($_POST['fullname'.$i.'']);
    $position=mysql_real_escape_string($_POST['position'.$i.'']);
    $personalwebsite=mysql_real_escape_string($_POST['personalwebsite'.$i.'']);
    $companyname=mysql_real_escape_string($_POST['companyname'.$i.'']);
    $companywebsite=mysql_real_escape_string($_POST['companywebsite'.$i.'']);
    $details=mysql_real_escape_string($_POST['details'.$i.'']);
    // $captioncombo=$fullname.'[|><|]'.$position.'[|><|]'.$details.'[|><|]'.$qualifications;
    if($picout!=="") {
        # code...
        $image="slide$i";
        $imgpath[0]='../files/originals/';
        $imgpath[1]='../files/medsizes/';
        $imgpath[2]='../files/thumbnails/';
        $imgsize[0]="default";
        $imgsize[1]=",540";
        $imgsize[2]=",85";
        $acceptedsize="";
        $imgouts=genericImageUpload($image,"varying",$imgpath,$imgsize,$acceptedsize);
		$len=strlen($imgouts[0]);
        $len2=strlen($imgouts[1]);
        $len3=strlen($imgouts[2]);
        $imagepath=substr($imgouts[0], 1,$len);
        $imagepath2=substr($imgouts[1], 1,$len2);
        $imagepath3=substr($imgouts[2], 1,$len3);
        
        // get image size details
        list($width,$height)=getimagesize($imgouts[0]);
        $imagesize=$_FILES[''.$image.'']['size'];
        $filesize=$imagesize/1024;
        //// echo $filefirstsize;
        $filesize=round($filesize, 0, PHP_ROUND_HALF_UP);
        if(strlen($filesize)>3){
        $filesize=$filesize/1024;
        $filesize=round($filesize,2); 
        $filesize="".$filesize."MB";
        }else{
        $filesize="".$filesize."KB";
        }
        //$coverpicid=getNextId("media");
        //maintype variants are original, medsize, thumb for respective size image.
        $mediaquery="INSERT INTO media(ownertype,ownerid,maintype,mediatype,location,medsize,thumbnail,filesize,width,height)VALUES
        ('$type','$cnrid','slide','image','$imagepath','$imagepath2','$imagepath3','$filesize','$width','$height')";
        // // echo $mediaquery."<br>";
        $mediarun=mysqli_query($host_connli,$mediaquery)or die(mysqli_error($host_connli)." ".__LINE__);
    }
    $query="INSERT INTO clientnrec(type,companyname,fullname,position,officialwebsite,personalwebsite,content)VALUES('$type','$companyname','$fullname','$position','$companywebsite','$personalwebsite','$details')";
    // // echo $query."<br>";
    $run=mysqli_query($host_connli,$query)or die(mysqli_error($host_connli)." ".__LINE__);
  }
		$_SESSION['lastsuccess']=0;
  header('location:../admin/adminindex.php?compid=15&type='.$entryvariant.'&v=admin&d='.$cnrid.'');
}else if ($entryvariant=="contententry") {
  	# code...
	$cid=getNextId("generalinfo");
	$maintype=mysql_real_escape_string($_POST['maintype']);
	$subtype=mysql_real_escape_string($_POST['subtype']);
	$title=isset($_POST['contenttitle'])?mysql_real_escape_string($_POST['contenttitle']):"";
	$subtitle=isset($_POST['contentsubtitle'])?mysql_real_escape_string($_POST['contentsubtitle']):"";
	$intro=isset($_POST['contentintro'])?mysql_real_escape_string($_POST['contentintro']):"";
	$content=mysql_real_escape_string(str_replace("../", "$host_addr",$_POST['contentpost']));
	$extraformdata=isset($_POST['extraformdata'])?mysql_real_escape_string($_POST['extraformdata']):"";
	$errormap=isset($_POST['errormap'])?mysql_real_escape_string($_POST['errormap']):"";
	$formdata=isset($_POST['formdata'])?mysql_real_escape_string($_POST['formdata']):"";
	if($errormap!==""){
	  	$errormap=preg_replace("/(\\\\\\r\\\\\\n)|(\\\\r\\\\n)|(\n\r)|(\r\n)|[\r\n]/","",$errormap);	
	  	$errormap=str_replace("\r\n", "", $errormap);
	  	$errormap=str_replace('\r\n', "", $errormap);
	  	$errormap=str_replace("\r", "", $errormap);
	  	$errormap=trim(str_replace("\n", "", $errormap));

	}
	// $extraformtypes=isset($_POST['extraformtypes'])?$_POST['extraformtypes']:"";
	$extradatastorage="";
	$extradata="";
	if($extraformdata!==""){
		$eformparserdata=array();
		$eformparserdata['extraformdata']=$extraformdata;
		$eformparserdata['errormap']=$errormap;
		$eformparserdata['entryid']=$cid;
		$eformparserdata['formdata']=$formdata;
		$eformparserdata['maintype']=$maintype;
		$eformparserdata['subtype']=$subtype;
		$eformparsed=parseEFormData($eformparserdata);
		$extraformdata=$eformparsed['extraformdata'];
		$extradata=mysql_real_escape_string($eformparsed['finaltally']);
	}
  if($intro!==""){
    $headerdescription = $intro;    
  }else if($intro==""&&$content==""){
    $headerdescription="";
  }else{
    // $headerdescription = $content!==""?convert_html_to_text($content):"";
    $headerdescription=$content!==""?html2txt($content):"";
    $monitorlength=strlen($headerdescription);
    $headerdescription=$monitorlength<600?$headerdescription."...":substr($headerdescription, 0,600)."...";
  }
  	$entrydate=date("Y-m-d H:i:s");
  	// check to makesure there are no previous entries matching the current subtype 
  	// or maintype
  	
	$query="INSERT INTO generalinfo
	  (maintype,subtype,title,subtitle,intro,content,extradata,formdata,extraformdata,formerrordata,entrydate)VALUES
	  ('$maintype','$subtype','$title','$subtitle','$headerdescription','$content','$extradata',
	  	'$formdata','$extraformdata','$errormap','$entrydate')";
    // echo "<br>".str_replace("<", "&lt;",$query)."<br>";
    $run=mysqli_query($host_connli,$query)or die(mysqli_error($host_connli)." ".__LINE__);
    $contentpic=isset($_FILES['contentpic']['tmp_name'])?$_FILES['contentpic']['tmp_name']:"";
    if($contentpic!==""){
      $image="contentpic";
      $imgpath[]='../files/medsizes/';
      $imgpath[]='../files/thumbnails/';
      $imgsize[]="default";
      if($maintype=="about"){
        $imgsize[]="374,";
        $acceptedsize="";
        
      }else{
        $imgsize[]=",300";
        $acceptedsize="";
      }
      $imgouts=genericImageUpload($image,"varying",$imgpath,$imgsize,$acceptedsize);
      $len=strlen($imgouts[0]);
      $imagepath=substr($imgouts[0], 1,$len);
      // medsize
      $len2=strlen($imgouts[1]);
      $imagepath2=substr($imgouts[1], 1,$len2);
      // get image size details
      list($width,$height)=getimagesize($imgouts[0]);
      $imagesize=$_FILES[''.$image.'']['size'];
      $filesize=$imagesize/1024;
      //echo $filefirstsize;
      $filesize=round($filesize, 0, PHP_ROUND_HALF_UP);
      if(strlen($filesize)>3){
      $filesize=$filesize/1024;
      $filesize=round($filesize,2); 
      $filesize="".$filesize."MB";
      }else{
      $filesize="".$filesize."KB";
      }
      //$coverpicid=getNextId("media");
      //maintype variants are original, medsize, thumb for respective size image.
      $mediaquery="INSERT INTO media(ownerid,ownertype,maintype,mediatype,location,thumbnail,filesize,width,height)VALUES('$cid','$maintype','coverphoto','image','$imagepath','$imagepath2','$filesize','$width','$height')";
      $mediarun=mysqli_query($host_connli,$mediaquery)or die(mysqli_error($host_connli));
    }
    if($rurladmin==""){
		$_SESSION['lastsuccess']=0;
    	header('location:../admin/adminindex.php?compid=16&type='.$entryvariant.'&v=admin&d='.$cid.'');
	}else{
		header('location:'.$rurladmin.'?compid=16&type='.$entryvariant.'&v=admin&d='.$cid.'');
	}
}else if($entryvariant=="createhomesliderbanners"){
  	$curbannerslidecount=$entryvariant=="createhomesliderbanners"?6:($entryvariant=="createhomebannerentry"?$_POST['curhomebannerslidecount']:($entryvariant=="edithomebanner"?1:6));
  	for($i=1;$i>=$curbannerslidecount;$i++){
	    $imgid=isset($_POST['imgid'.$i.''])?$_POST['imgid'.$i.'']:0;
	    $maintype=$_POST['maintype'];
	    $subtype=isset($_POST['subtype'.$i.''])?$_POST['subtype'.$i.'']:$_POST['subtype'];
	    $headercaption=isset($_POST['subtype'.$i.''])?$_POST['headercaption'.$i.'']:"";
	    $minicaption=isset($_POST['subtype'.$i.''])?$_POST['minicaption'.$i.'']:"";
	    $captionout=$headercaption.$minicaption;
	    $contentpic=isset($_FILES['contentpic'.$i.'']['tmp_name'])?$_FILES['contentpic'.$i.'']['tmp_name']:"";
	    // perform an update
	    $imgdata=getSingleMediaDataTwo($imgid);
	    if($contentpic!==""){
	        $image="contentpic";
	        $imgpath[]='../files/medsizes/';
	        $imgpath[]='../files/thumbnails/';
	        $imgsize[]="300";
	        $imgsize[]=",85";
	        $imgouts=genericImageUpload($image,"varying",$imgpath,$imgsize,$acceptedsize);
	        $len=strlen($imgouts[0]);
	        $imagepath=substr($imgouts[0], 1,$len);
	        // medsize
	        $len2=strlen($imgouts[1]);
	        $imagepath2=substr($imgouts[1], 1,$len2);
	        // get image size details
	        list($width,$height)=getimagesize($imgouts[0]);
	        $imagesize=$_FILES[''.$image.'']['size'];
	        $filesize=$imagesize/1024;
	        //// echo $filefirstsize;
	        $filesize=round($filesize, 0, PHP_ROUND_HALF_UP);
	        if(strlen($filesize)>3){
	        $filesize=$filesize/1024;
	        $filesize=round($filesize,2); 
	        $filesize="".$filesize."MB";
	        }else{
	        $filesize="".$filesize."KB";
	        }
	        //$coverpicid=getNextId("media"); 
	        //maintype variants are original, medsize, thumb for respective size image.
	        $cid=$entryid;
	        if($imgid<1){
	          $mediaquery="INSERT INTO media(ownerid,ownertype,maintype,mediatype,location,details,filesize,width,height,title)VALUES
	          ('0','$maintype','$subtype','image','$imagepath','$imagepath2','$filesize','$width','$height','$captionout')";
	          $mediarun=mysqli_query($host_connli,$mediaquery)or die(mysqli_error($host_connli)." ".__LINE__);
	          
	        }else{
	          $imgdata=getSingleMediaDataTwo($imgid);
	          $prevpic=$imgdata['location'];
	          $prevthumb=isset($imgdata['thumbnail'])?$imgdata['thumbnail']:$imgdata['details'];
	          $realprevpic=".".$prevpic;
	          $realprevthumb=".".$prevthumb;
	          if(file_exists($realprevpic)&&$realprevpic!=="."){
	            unlink($realprevpic);
	          }
	          if(file_exists($realprevthumb)&&$realprevthumb!=="."){
	            unlink($realprevthumb);
	          }
		        genericSingleUpdate("media","location",$imagepath,"id",$imgid);
		        genericSingleUpdate("media","thumbnail",$imagepath2,"id",$imgid);
		        genericSingleUpdate("media","details",$imagepath2,"id",$imgid);
		        genericSingleUpdate("media","filesize",$filesize,"id",$imgid);
		        genericSingleUpdate("media","width",$width,"id",$imgid);
		        genericSingleUpdate("media","height",$height,"id",$imgid);
		        // // echo "in here";
	        }
      	}    
    }
	$_SESSION['lastsuccess']=0;
    header('location:adminindex.php?compid=17&type='.$entryvariant.'&v=admin');
}else if($entryvariant=="createhomebanner"){
	$type="homebanner";
	$curbannerslidecount=$_POST['curbannerslidecount'];
	$mainid=1;
	for($i=1;$i<=$curbannerslidecount;$i++){
		$picout=$_FILES['slide'.$i.'']['tmp_name'];
		if($picout!=="") {
			$sq="SELECT * FROM media WHERE ownertype='homebanner' ORDER BY mainid DESC";
			$sqdata=briefquery($sq,__LINE__);
			if($sqdata['numrows']>0){
				$mainid=$sqdata['resultdata'][0]['mainid']+1;
			}
		    # code...
		    $headercaption=$_POST['headercaption'.$i.''];
		    $minicaption=$_POST['minicaption'.$i.''];
		    $linkaddress=$_POST['linkaddress'.$i.''];
		    $linktitle=$_POST['linktitle'.$i.''];
		    $captioncombo=$headercaption.'[|><|]'.$minicaption.'[|><|]'.$linkaddress.'[|><|]'.$linktitle;
		    $image="slide$i";
		    $imgpath[0]='../files/originals/';
		    $imgpath[1]='../files/medsizes/';
		    $imgpath[2]='../files/thumbnails/';
		    $imgsize[0]="default";
		    $imgsize[1]=",300";
		    $imgsize[2]=",85";
		    $acceptedsize="";
		    $imgouts=genericImageUpload($image,"varying",$imgpath,$imgsize,$acceptedsize);
		    $len=strlen($imgouts[0]);
		    $len2=strlen($imgouts[1]);
		    $len3=strlen($imgouts[2]);
		    $imagepath=substr($imgouts[0], 1,$len);
		    $imagepath2=substr($imgouts[1], 1,$len2);
		    $imagepath3=substr($imgouts[2], 1,$len3);
		    // get image size details
		    list($width,$height)=getimagesize($imgouts[0]);
		    $imagesize=$_FILES[''.$image.'']['size'];
		    $filesize=$imagesize/1024;
		    //// echo $filefirstsize;
		    $filesize=round($filesize, 0, PHP_ROUND_HALF_UP);
		    if(strlen($filesize)>3){
		    $filesize=$filesize/1024;
		    $filesize=round($filesize,2); 
		    $filesize="".$filesize."MB";
		    }else{
		    $filesize="".$filesize."KB";
		    }
		    //$coverpicid=getNextId("media");
		    //maintype variants are original, medsize, thumb for respective size image.
		    $mediaquery="INSERT INTO media
		    (ownertype,maintype,mainid,mediatype,
		    	location,
		    	medsize,
		    	thumbnail,
		    	details,
		    	filesize,
		    	width,
		    	height)VALUES('$type','slide','$mainid','image','$imagepath','$imagepath2','$imagepath3','$captioncombo','$filesize','$width','$height')";
		    // // echo $mediaquery."<br>";
		    $mediarun=mysqli_query($host_connli,$mediaquery)or die(mysqli_error($host_connli)." ".__LINE__."<br>$mediaquery<br>");
		}
	}
	$_SESSION['lastsuccess']=0;
  	header('location:../admin/adminindex.php?compid=18&type='.$entryvariant.'&v=admin&d='.$categoryid.'');
}else if($entryvariant=="createportfoliocategory"){
	// echo $entryvariant;
	$compid=19;
	$catname=mysql_real_escape_string($_POST['catname']);
	$catdetails=mysql_real_escape_string($_POST['catdetails']);
	$query="INSERT INTO portfoliocategories(catname,catdetails)VALUES
			('$catname','$catdetails')";
	// echo $query; 
	$qdata=briefquery($query,__LINE__,"mysqli",true);
	$cid=$qdata['resultdata'][0]['id'];
	// prepare content for the notification redirect portion
	$notid=$qdata['resultdata'][0]['id'];

	// prepare content for the notification redirect portion
	$action="Create";
	$actiontype="portfoliocategory";
	$actiondetails="New portfolio category Created";
	// bring in the nrsection.php file
	include('nrsection.php');


}elseif($entryvariant=="createportfolioentry"){
	// echo $entryvariant;
	$compid=20;
	$portfoliotype=mysql_real_escape_string($_POST['portfoliotype']);
	$portfoliotitle=mysql_real_escape_string($_POST['portfoliotitle']);
	$catid=mysql_real_escape_string($_POST['catid']);
	$clientname=mysql_real_escape_string($_POST['clientname']);
	
	$startdate=mysql_real_escape_string($_POST['startdate']);
	$enddate=mysql_real_escape_string($_POST['enddate']);
	if($startdate!==""&&$enddate!==""){
		$sd=$startdate;
		$ed=$enddate;
		// make sure startdate is less than end date 
		$datetime1 = new DateTime("$startdate"); // specified scheduled time
		$datetime2 = new DateTime("$enddate"); // current time 
		if($datetime2>$datetime1){
			$sd=$enddate;
			$ed=$startdate;
		}
		$startdate=$sd;
		$enddate=$ed;
	}
	
	$featured=mysql_real_escape_string($_POST['featured']);
	$fdoption=mysql_real_escape_string($_POST['fdoption']);
	
	$galleryattach=mysql_real_escape_string($_POST['galleryattach']);
	$vidattach=mysql_real_escape_string($_POST['vidattach']);
	$audioattach=mysql_real_escape_string($_POST['audioattach']);

	$shorttext=mysql_real_escape_string($_POST['shorttext']);
	$tags=mysql_real_escape_string($_POST['tags']);
	$entrydetails=mysql_real_escape_string($_POST['entrydetails']);
	$pwrdd=mysql_real_escape_string($_POST['pwrdd']);
	$pwrd=mysql_real_escape_string($_POST['pwrd']);
	if($pwrdd=="yes"){
		$pwrd=password_hash($pwrd, PASSWORD_DEFAULT);
	}
	$seometakeywords=isset($_POST['seometakeywords'])?
	mysql_real_escape_string($_POST['seometakeywords']):"";

	$socialcount=mysql_real_escape_string($_POST['socialcount']);
	$totalsocials="";
	for($i=1;$i<=$socialcount;$i++){
		$socialname=$_POST["socialname$i"];
		$socialicon=$_POST["socialicon$i"];
		$socialurl=mysql_real_escape_string($_POST["socialurl$i"]);
		if($socialname!==""&&$socialicon!==""){
			$i==1?$totalsocials.='{"socialentry'.$i.'":
			{"socialname":"'.$socialname.'","socialicon":"'.$socialicon.'",
			"socialurl":"'.$socialurl.'"}':
			$totalsocials.=',"socialentry'.$i.'":
			{"socialname'.$i.'":"'.$socialname.'","socialicon'.$i.'":"'.$socialicon.'",
			"socialurl":"'.$socialurl.'"}';
			if($i==$socialcount){
				$totalsocials.=',"total":"'.$socialcount.'"}';
			}
		}
	}
	$totalsocials=mysql_real_escape_string($totalsocials);

	$query="INSERT INTO portfolio(catid,type,seometakeywords,projecttitle,gattach,vidattach,audattach,
		companyname,periodstart,periodend,entrydate,shorttext,tags,details,
		projectsocials,featured,fdtype,pwrdd,pwd)VALUES
		('$catid','$portfoliotype','$seometakeywords','$portfoliotitle','$galleryattach','$vidattach',
			'$audioattach','$clientname','$startdate','$enddate',CURRENT_DATE,'$shorttext',
			'$tags','$entrydetails','$totalsocials','$featured','$fdoption','$pwrdd','$pwrd')";
	// echo $query; 
	$qdata=briefquery($query,__LINE__,"mysqli",true);
	// extract id of last entry
	$pid=$qdata['resultdata'][0]['id'];
	// for tests
	// $pid=1;
	// echo $pid;
	// prepare content for the notification redirect portion
	$notid=$qdata['resultdata'][0]['id'];
	// for tests
	// $notid=1;
	// echo $pid;

	/*cover image section*/
	$imgname=isset($_FILES['coverimage']['tmp_name'])?$_FILES['coverimage']['tmp_name']:"";
	if($imgname!==""){
		$image='coverimage';
		$imgpath[0]='../files/originals/';
	    $imgpath[1]='../files/medsizes/';
	    $imgpath[2]='../files/thumbnails/';
	    $imgsize[0]="default";
	    $imgsize[1]=",300";
	    $imgsize[2]=",85";
	    $acceptedsize="";
	    $imgouts=genericImageUpload($image,"varying",$imgpath,$imgsize,$acceptedsize);

	    $len=strlen($imgouts[0]);
	    $len2=strlen($imgouts[1]);
	    $len3=strlen($imgouts[2]);
	    $imagepath=substr($imgouts[0], 1,$len);
	    $imagepath2=substr($imgouts[1], 1,$len2);
	    $imagepath3=substr($imgouts[2], 1,$len3);

	    // get image size details
	    list($width,$height)=getimagesize($imgouts[0]);
	    $imagesize=$_FILES[''.$image.'']['size'];
	    $filesize=$imagesize/1024;
	    //// echo $filefirstsize;
	    $filesize=round($filesize, 0, PHP_ROUND_HALF_UP);
	    if(strlen($filesize)>3){
		    $filesize=$filesize/1024;
		    $filesize=round($filesize,2); 
		    $filesize="".$filesize."MB";
	    }else{
	    	$filesize="".$filesize."KB";
	    }
	    //maintype variants are original, medsize, thumb for respective size image.
	    $mediaquery="INSERT INTO media
	    (ownerid,ownertype,maintype,mediatype,location,medsize,thumbnail,title,
	    details,filesize,width,height)
		VALUES
		('$pid','portfolio','coverimage','image','$imagepath',
			'$imagepath2','$imagepath3','','','$filesize',
			'$width','$height')";
	    // echo $mediaquery."<br>";
	    $mediarun=mysqli_query($host_connli,$mediaquery)or die(mysqli_error($host_connli)." ".__LINE__."<br>$mediaquery<br>");
	}

	/*banner image section*/
	$imgname=isset($_FILES['bannerimage']['tmp_name'])?$_FILES['bannerimage']['tmp_name']:"";
	if($imgname!==""){
		$image='bannerimage';
		$imgpath[0]='../files/originals/';
	    $imgpath[1]='../files/medsizes/';
	    $imgpath[2]='../files/thumbnails/';
	    $imgsize[0]="default";
	    $imgsize[1]=",300";
	    $imgsize[2]=",85";
	    $acceptedsize="";
	    $imgouts=genericImageUpload($image,"varying",$imgpath,$imgsize,$acceptedsize);

	    $len=strlen($imgouts[0]);
	    $len2=strlen($imgouts[1]);
	    $len3=strlen($imgouts[2]);
	    $imagepath=substr($imgouts[0], 1,$len);
	    $imagepath2=substr($imgouts[1], 1,$len2);
	    $imagepath3=substr($imgouts[2], 1,$len3);

	    // get image size details
	    list($width,$height)=getimagesize($imgouts[0]);
	    $imagesize=$_FILES[''.$image.'']['size'];
	    $filesize=$imagesize/1024;
	    //// echo $filefirstsize;
	    $filesize=round($filesize, 0, PHP_ROUND_HALF_UP);
	    if(strlen($filesize)>3){
		    $filesize=$filesize/1024;
		    $filesize=round($filesize,2); 
		    $filesize="".$filesize."MB";
	    }else{
	    	$filesize="".$filesize."KB";
	    }
	    //maintype variants are original, medsize, thumb for respective size image.
	    $mediaquery="INSERT INTO media
	    (ownerid,ownertype,maintype,mediatype,location,medsize,thumbnail,title,
	    details,filesize,width,height)
		VALUES
		('$pid','portfolio','bannerimage','image','$imagepath',
			'$imagepath2','$imagepath3','','','$filesize',
			'$width','$height')";
	    // echo $mediaquery."<br>";
	    $mediarun=mysqli_query($host_connli,$mediaquery)or die(mysqli_error($host_connli)." ".__LINE__."<br>$mediaquery<br>");
	}

	/*featured image section*/
		$featuredadlaptop=$_FILES['featuredadlaptop'];
		$featuredadiphone=$_FILES['featuredadiphone'];
		$featuredadandroid=$_FILES['featuredadandroid'];
		$featuredadtablet=$_FILES['featuredadtablet'];
		for($i=1;$i<=4;$i++){
			$curimage="";
			$curtype="";
			$ph="";
			if($i==1){
				if($featuredadlaptop['tmp_name']!==""){
					$curimage="featuredadlaptop";
					$ph="268";
				}
			}else if($i==2){
				if($featuredadiphone['tmp_name']!==""){
					$curimage="featuredadiphone";
					$ph="198";
				}
			}else if($i==3){
				if($featuredadandroid['tmp_name']!==""){
					$curimage="featuredadandroid";
					$ph="275";
				}
			}else if($i==4){
				if($featuredadtablet['tmp_name']!==""){
					$curimage="featuredadtablet";
					$ph="268";
				}
			}  
			$curtype=$curimage;
			if($curtype!==""){
				$image=$curimage;
				$imgpath[0]='../files/originals/';
			    $imgpath[1]='../files/medsizes/';
			    $imgpath[2]='../files/thumbnails/';
			    $imgsize[0]="default";
			    $imgsize[1]=",$ph";
			    $imgsize[2]=",85";
			    $acceptedsize="";
			    $imgouts=genericImageUpload($image,"varying",$imgpath,$imgsize,$acceptedsize);

			    $len=strlen($imgouts[0]);
			    $len2=strlen($imgouts[1]);
			    $len3=strlen($imgouts[2]);
			    $imagepath=substr($imgouts[0], 1,$len);
			    $imagepath2=substr($imgouts[1], 1,$len2);
			    $imagepath3=substr($imgouts[2], 1,$len3);

			    // get image size details
			    list($width,$height)=getimagesize($imgouts[0]);
			    $imagesize=$_FILES[''.$image.'']['size'];
			    $filesize=$imagesize/1024;
			    //// echo $filefirstsize;
			    $filesize=round($filesize, 0, PHP_ROUND_HALF_UP);
			    if(strlen($filesize)>3){
				    $filesize=$filesize/1024;
				    $filesize=round($filesize,2); 
				    $filesize="".$filesize."MB";
			    }else{
			    	$filesize="".$filesize."KB";
			    }
			    //maintype variants are original, medsize, thumb for respective size image.
			    $mediaquery="INSERT INTO media
			    (ownerid,ownertype,maintype,mediatype,location,medsize,thumbnail,title,
			    details,filesize,width,height)
				VALUES
				('$pid','portfolio','$curtype','image','$imagepath',
					'$imagepath2','$imagepath3','','','$filesize',
					'$width','$height')";
			    // echo $mediaquery."<br>";
			    $mediarun=mysqli_query($host_connli,$mediaquery)or die(mysqli_error($host_connli)." ".__LINE__."<br>$mediaquery<br>");
			}
		}
	/*end*/

	/*group set data handling*/
	$portgallerycount=mysql_real_escape_string($_POST['portgallerycount']);
	if($galleryattach=="yes"&&$portgallerycount>0){
		$galentrycount=0;
		for($i=1;$i<=$portgallerycount;$i++){
			$picout=$_FILES['galimage'.$i.'']['tmp_name'];
			if($picout!==""){
				$caption=mysql_real_escape_string($_POST["caption$i"]);
				$details=mysql_real_escape_string($_POST["details$i"]);

				$image="galimage$i";
				$imgpath[0]='../files/originals/';
			    $imgpath[1]='../files/medsizes/';
			    $imgpath[2]='../files/thumbnails/';
			    $imgsize[0]="default";
			    $imgsize[1]=",240";
			    $imgsize[2]=",85";
			    $acceptedsize="";
			    $imgouts=genericImageUpload($image,"varying",$imgpath,$imgsize,$acceptedsize);

			    $len=strlen($imgouts[0]);
			    $len2=strlen($imgouts[1]);
			    $len3=strlen($imgouts[2]);
			    $imagepath=substr($imgouts[0], 1,$len);
			    $imagepath2=substr($imgouts[1], 1,$len2);
			    $imagepath3=substr($imgouts[2], 1,$len3);

			    // get image size details
			    list($width,$height)=getimagesize($imgouts[0]);
			    $imagesize=$_FILES[''.$image.'']['size'];
			    $filesize=$imagesize/1024;
			    //// echo $filefirstsize;
			    $filesize=round($filesize, 0, PHP_ROUND_HALF_UP);
			    if(strlen($filesize)>3){
				    $filesize=$filesize/1024;
				    $filesize=round($filesize,2); 
				    $filesize="".$filesize."MB";
			    }else{
			    	$filesize="".$filesize."KB";
			    }
			    //maintype variants are original, medsize, thumb for respective size image.
			    $mediaquery="INSERT INTO media
			    (ownerid,ownertype,maintype,mediatype,location,medsize,thumbnail,title,
			    	details,filesize,width,height)
				VALUES
				('$pid','portfolio','portgallery','image','$imagepath',
					'$imagepath2','$imagepath3','$caption','$details','$filesize',
					'$width','$height')";
			    // echo $mediaquery."<br>";
			    $mediarun=mysqli_query($host_connli,$mediaquery)or die(mysqli_error($host_connli)." ".__LINE__."<br>$mediaquery<br>");
			}
		}
	}

	$portvideocount=mysql_real_escape_string($_POST['portvideocount']);
	if($vidattach=="yes"&&$portvideocount>0){
		for($i=1;$i<=$portvideocount;$i++){
			// setup default variables first
			$videofilepath1="";
			$videofilesize1=0;
			$videofilepath2="";
			$videofilesize2=0;
			$videofilepath3="";
			$videofilesize3=0;

			isset($_POST['portvtype'.$i.''])?$petype=mysql_real_escape_string($_POST['portvtype'.$i.'']):$petype="";
			isset($_POST['portvcaption'.$i.''])?$pecaption=mysql_real_escape_string($_POST['portvcaption'.$i.'']):$pecaption="";
			isset($_POST['portvembed'.$i.''])?$pecode=mysql_real_escape_string($_POST['portvembed'.$i.'']):$pecode="";

			if (isset($_FILES['portvwebm'.$i.'']['tmp_name'])&&
				$_FILES['portvwebm'.$i.'']['tmp_name']!=="") {
				# code...
				$outsvideo=simpleUpload('portvwebm'.$i.'','../files/videos/');
				$videofilepath=$outsvideo['filelocation'];
				$len=strlen($videofilepath);
				$videofilepath1=substr($videofilepath, 1,$len);
				$videofilesize1=$outsvideo['filesize'];
				
			}

			if (isset($_FILES['portvflv'.$i.'']['tmp_name'])&&$_FILES['portvflv'.$i.'']['tmp_name']!=="") {
				# code...
				$outsvideo=simpleUpload('portvflv'.$i.'','../files/videos/');
				$videofilepath=$outsvideo['filelocation'];
				$len=strlen($videofilepath);
				$videofilepath3=substr($videofilepath, 1,$len);
				$videofilesize3=$outsvideo['filesize'];
				
			}

			if (isset($_FILES['portv3gp'.$i.'']['tmp_name'])&&$_FILES['portv3gp'.$i.'']['tmp_name']!=="") {
				# code...
				$outsvideo=simpleUpload('portv3gp'.$i.'','../files/videos/');
				$videofilepath=$outsvideo['filelocation'];
				$len=strlen($videofilepath);
				$videofilepath2=substr($videofilepath, 1,$len);
				$videofilesize2=$outsvideo['filesize'];
			}

			// convert data to json
			if($videofilepath1!==""||$videofilepath2!==""||$videofilepath3!==""
				||$pecode!==""){		
				$videofiletotal='{"portvtype":"'.$petype.'",
									  "portvwebm":{"location":"'.$videofilepath1.'",
												  "size":"'.$videofilesize1.'"},
									  "portv3gp":{"location":"'.$videofilepath2.'",
												  "size":"'.$videofilesize2.'"},
									  "portvflv":{"location":"'.$videofilepath3.'",
												  "size":"'.$videofilesize3.'"},
									  "portvembed":"'.$pecode.'"
									}';
				$videofiletotal=mysql_real_escape_string($videofiletotal);
				$mediaquery2="INSERT INTO media(ownerid,ownertype,maintype,mediatype,
				title,details)
					VALUES
					('$pid','portfolio','portfoliovideo','json_details','$pecaption','$videofiletotal')";
					// echo $mediaquery2;
				$mediarun2=mysqli_query($host_connli,$mediaquery2)or die(mysqli_error($host_connli));
			}
		}
	}

	$portaudiocount=mysql_real_escape_string($_POST['portaudiocount']);
	if($audioattach=="yes"&&$portaudiocount>0){
		for($i=1;$i<=$portaudiocount;$i++){

			isset($_POST['portatype'.$i.''])?
			$petype=mysql_real_escape_string($_POST['portatype'.$i.'']):$petype="";
			isset($_POST['portacaption'.$i.''])?
			$pecaption=mysql_real_escape_string($_POST['portacaption'.$i.'']):$pecaption="";
			isset($_POST['portaembed'.$i.''])?
			$pecode=mysql_real_escape_string($_POST['portaembed'.$i.'']):$pecode="";
			$audiofilepath="";
			$audiofilesize="0KB";
			if (isset($_FILES['portaudio'.$i.'']['tmp_name'])&&
				$_FILES['portaudio'.$i.'']['tmp_name']!=="") {
				# code...
				$outsaudio=simpleUpload('portaudio'.$i.'','../files/audio/');
				$audiofilepath=$outsaudio['filelocation'];
				$len=strlen($audiofilepath);
				$audiofilepath=substr($audiofilepath, 1,$len);
				$audiofilesize=$outsaudio['filesize'];
			}
			if($audiofilepath!==""||$pecode!==""){

				$mediaquery2="INSERT INTO media(ownerid,ownertype,maintype,mediatype,
					location,filesize,title,details)
				VALUES
				('$pid','portfolio','portfolioaudio','$petype','$audiofilepath',
					'$audiofilesize','$pecaption','$pecode')";
				// echo $mediaquery2;
				$mediarun2=mysqli_query($host_connli,$mediaquery2)or die(mysqli_error($host_connli));
			}
		}
	}	

	// prepare content for the notification redirect section (nrsection)
	$action="Create";
	$actiontype="portfolio";
	$actiondetails="New portfolio entry Created";
	// bring in the nrsection.php file
	include('nrsection.php');
}else if($entryvariant=="createuseraccadmin"||
	$entryvariant=="createuseraccweb"||
	$entryvariant=="createuseracc"){
	// echo $entryvariant;
	$usertype="user";
	$firstname=mysql_real_escape_string($_POST['firstname']);
	$middlename=mysql_real_escape_string($_POST['middlename']);
	$lastname=mysql_real_escape_string($_POST['lastname']);
	$fullname=$firstname.' '.$middlename.' '.$lastname;
	$gender=strtolower(mysql_real_escape_string($_POST['gender']));
	$dob=mysql_real_escape_string($_POST['dob']);
	$phonenumber=isset($_POST['phonenumber'])?
	mysql_real_escape_string($_POST['phonenumber']):"";
	$username=isset($_POST['username'])?mysql_real_escape_string($_POST['username']):"";
	$email=mysql_real_escape_string($_POST['email']);
	$pword=mysql_real_escape_string($_POST['pword']);
	$pcmethod=isset($_POST['pcmethod'])?mysql_real_escape_string($_POST['pcmethod']):"";
	$state=strtolower(mysql_real_escape_string($_POST['state']));
	// echo $state;
	// get the state id
	$sdata=briefquery("SELECT * FROM state WHERE state='$state'",__LINE__,"mysqli");
	$cdata=$sdata['resultdata'][0];
	$numrows=$sdata['numrows'];
	// if there are any results then set the state id to the current id
	$sid=$numrows>0?$cdata['id_no']:0;
	$address=isset($_POST['address'])?mysql_real_escape_string($_POST['address']):"";

	// data entry to db
	$query="INSERT INTO users(usertype,fullname,dob,gender,state,email,username,
		pword,phonenumber,address,regdate)VALUES
	('$usertype','$fullname','$dob','$gender','$sid','$email','$username',
		'$pword','$phonenumber','$address',CURRENT_DATE())";
	// echo $query."<br>";
	$qdata=briefquery($query,__LINE__,"mysqli",true);
	$uid=$qdata['resultdata'][0]['id'];
	$contentpic=isset($_FILES['contentpic']['tmp_name'])?
	$_FILES['contentpic']['tmp_name']:"";
    if($contentpic!==""){
      	$image="contentpic";
		$imgpath[0]='../files/originals/';
		$imgpath[1]='../files/medsizes/';
		$imgpath[2]='../files/thumbnails/';
		$imgsize[0]="default";
		$imgsize[1]=",300";
		$imgsize[2]=",85";
		$acceptedsize="";
		$imgouts=genericImageUpload($image,"varying",$imgpath,$imgsize,$acceptedsize);
		$len=strlen($imgouts[0]);
		$imagepath=substr($imgouts[0], 1,$len);
		// medsize
		$len2=strlen($imgouts[1]);
		$imagepath2=substr($imgouts[1], 1,$len2);
		// thumbnail
		$len3=strlen($imgouts[2]);
		$imagepath3=substr($imgouts[2], 1,$len3);
		// get image size details
		list($width,$height)=getimagesize($imgouts[0]);
		$imagesize=$_FILES[''.$image.'']['size'];
		$filesize=$imagesize/1024;
		//echo $filefirstsize;
		$filesize=round($filesize, 0, PHP_ROUND_HALF_UP);
		if(strlen($filesize)>3){
			$filesize=$filesize/1024;
			$filesize=round($filesize,2); 
			$filesize="".$filesize."MB";
		}else{
			$filesize="".$filesize."KB";
		}
		//$coverpicid=getNextId("media");
		//maintype variants are original, medsize, thumb for respective size image.
		$mediaquery="INSERT INTO media(ownerid,ownertype,maintype,mediatype,location,
			medsize,thumbnail,filesize,width,height)VALUES
			('$uid','$usertype','profpic','image','$imagepath','$imagepath2',
				'$imagepath3','$filesize','$width','$height')";
		$mediarun=mysqli_query($host_connli,$mediaquery)or die(mysqli_error($host_connli));
    }
	// echo $uid;
	if($entryvariant=="createuseraccadmin"){
		$_SESSION['lastsuccess']=0;
		header('location:../admin/adminindex.php?compid=17&type='.$entryvariant.'&v=admin&d='.$uid.'');
	}else if($entryvariant=="createuseracc"){
		$_SESSION['lastsuccess']=0;
		$returl=isset($_POST['returl'])?$_POST['returl']:
		"../login.php?compid=17&type='.$entryvariant.'&v=admin&d='.$entryid.'";

		// $url='../login.php?compid=17&type='.$entryvariant.'&v=admin&d='.$entryid.'';
		header('location:'.$returl.'');
	}else if($entryvariant=="createuseraccweb"){
		$success="true";
		$msg="Successfully registered";
		echo json_encode(array("success"=>"$success","msg"=>"$msg","uid"=>"$uid"));

	}
}else if($entryvariant=="createserviceprovideracc"||
	$entryvariant=="createserviceprovideraccweb"||
	$entryvariant=="createserviceprovideradmin"){
	$usertype="serviceprovider";
	// theses variables hold extra column and corresponding column value entroews
	$qcolextra="";
	$qcolvalueextra="";

	// handle column value entries for query if the one submitting 
	// is an administrator
	if($entryvariant=="createserviceprovideradmin"){
		// ensure the service provider account is immediately activated
		$qcolextra=",activationstatus";
		$qcolvalextra=",'active'";

	}

	$usersubtype=isset($_POST['usersubtype'])?
	mysql_real_escape_string($_POST['usersubtype']):"";
	$businessname=isset($_POST['businessname'])?
	mysql_real_escape_string($_POST['businessname']):"";
	$bntype=isset($_POST['bntype'])?mysql_real_escape_string($_POST['bntype']):"";
	$dataurl=isset($_POST['dataurl'])?mysql_real_escape_string($_POST['dataurl']):"";
	$references=isset($_POST['references'])?mysql_real_escape_string($_POST['references']):"";
	$email=mysql_real_escape_string($_POST['email']);
	$username=isset($_POST['username'])?mysql_real_escape_string($_POST['username']):"";
	$pword=mysql_real_escape_string($_POST['pword']);
	$phonenumber=isset($_POST['phonenumber'])?
	mysql_real_escape_string($_POST['phonenumber']):"";
	$firstname=isset($_POST['firstname'])?
	mysql_real_escape_string($_POST['firstname']):"";
	$middlename=isset($_POST['middlename'])?
	mysql_real_escape_string($_POST['middlename']):"";
	$lastname=isset($_POST['lastname'])?
	mysql_real_escape_string($_POST['lastname']):"";
	$contactname=$firstname.' '.$middlename.' '.$lastname;
	$contactname=isset($_POST['fullname'])?
	mysql_real_escape_string($_POST['fullname']):$contactname;
	$contactemail=isset($_POST['contactemail'])?
	mysql_real_escape_string($_POST['contactemail']):"";
	$contactphonenumber=isset($_POST['contactphonenumber'])?
	mysql_real_escape_string($_POST['contactphonenumber']):"";
	$businessnature=isset($_POST['businessnature'])?
	mysql_real_escape_string($_POST['businessnature']):"";
	$businessnature2=isset($_POST['businessnature2'])?
	mysql_real_escape_string($_POST['businessnature2']):"";
	$bnid=0;
	$bnid2=0;
	if($businessnature!==""&&$businessnature>0){
		$bndata=getAllBusinessTypes($businessnature);
		if($bndata['numrows']>0){
			// var_dump($bndata);
			$bnid=$businessnature;
			$businessnature=$bndata['resultdata'][0]['businessnature'];
		}
	}
	
	if($businessnature2!==""&&$businessnature2>0){
		$bndata=getAllBusinessTypes("","WHERE type='secondary' AND businessnature='$businessnature2'");
		if($bndata['numrows']>0){
			// var_dump($bndata);
			$bnid2=$businessnature2;
			$businessnature2=$bndata['resultdata'][0]['businessnature'];
		}
	}
	$spduration=isset($_POST['spduration'])?
	mysql_real_escape_string($_POST['spduration']):"";;
	$state=strtolower(mysql_real_escape_string($_POST['state']));
	$address=isset($_POST['address'])?mysql_real_escape_string($_POST['address']):"";
	$bio=isset($_POST['bio'])?mysql_real_escape_string($_POST['bio']):"";
	// get the state id
	$sdata=briefquery("SELECT * FROM state WHERE state='$state'",__LINE__,"mysqli");
	$cdata=$sdata['resultdata'][0];
	$numrows=$sdata['numrows'];
	// if there are any results then set the state id to the current id
	$sid=$numrows>0?$cdata['id_no']:0;

	// data entry to db
	$query="INSERT INTO users(usertype,usersubtype,fullname,businessname,bntype,
		contactemail,contactphone,bnid,businessnature,sbnid,sbn,businessdescription,
		spduration,state,email,username,pword,phonenumber,address,websiteurl,referees,
		regdate $qcolextra)VALUES
	('$usertype','$usersubtype','$contactname','$businessname','$bntype','$contactemail',
	'$contactphonenumber','$bnid','$businessnature','$bnid2','$businessnature2',
	'$bio','$spduration','$sid','$email','$username','$pword','$phonenumber','$address',
	'$dataurl','$references',CURRENT_DATE() $qcolvalextra)";
	
	$qdata=briefquery($query,__LINE__,"mysqli",true);
	$uid=$qdata['resultdata'][0]['id'];
	$contentpic=isset($_FILES['contentpic']['tmp_name'])?
	$_FILES['contentpic']['tmp_name']:"";
    if($contentpic!==""){
      	$image="contentpic";
		$imgpath[0]='../files/originals/';
		$imgpath[1]='../files/medsizes/';
		$imgpath[2]='../files/thumbnails/';
		$imgsize[0]="default";
		$imgsize[1]=",300";
		$imgsize[2]=",85";
		$acceptedsize="";
		$imgouts=genericImageUpload($image,"varying",$imgpath,$imgsize,$acceptedsize);
		$len=strlen($imgouts[0]);
		$imagepath=substr($imgouts[0], 1,$len);
		// medsize
		$len2=strlen($imgouts[1]);
		$imagepath2=substr($imgouts[1], 1,$len2);
		// thumbnail
		$len3=strlen($imgouts[2]);
		$imagepath3=substr($imgouts[2], 1,$len3);
		// get image size details
		list($width,$height)=getimagesize($imgouts[0]);
		$imagesize=$_FILES[''.$image.'']['size'];
		$filesize=$imagesize/1024;
		//echo $filefirstsize;
		$filesize=round($filesize, 0, PHP_ROUND_HALF_UP);
		if(strlen($filesize)>3){
			$filesize=$filesize/1024;
			$filesize=round($filesize,2); 
			$filesize="".$filesize."MB";
		}else{
			$filesize="".$filesize."KB";
		}
		//$coverpicid=getNextId("media");
		//maintype variants are original, medsize, thumb for respective size image.
		$mediaquery="INSERT INTO media(ownerid,ownertype,maintype,mediatype,location,
			medsize,thumbnail,filesize,width,height)VALUES
			('$uid','$usertype','profpic','image','$imagepath','$imagepath2',
				'$imagepath3','$filesize','$width','$height')";
		$mediarun=mysqli_query($host_connli,$mediaquery)or die(mysqli_error($host_connli));
    }
	// upload company profile and cac
	for($i=0;$i<=1;$i++){
		$i==0?$fname="orgprofile":$fname="orgcac";
		$contentpic=isset($_FILES[''.$fname.'']['tmp_name'])?
		$_FILES[''.$fname.'']['tmp_name']:"";
	    if($contentpic!==""){
			$image="$fname";
			$maintype=$fname;
			$nm=$_FILES[''.$fname.'']['name'];
	      	// check the type of the file
	      	$ft=getExtensionAdvanced($nm);
			$imagepath2="";
			$imagepath3="";
			$width=0;
			$height=0;
			$ftype=$ft['type'];
			if($ftype=="image"){
			  $imgpath[0]='../files/originals/';
			  $imgpath[1]='../files/medsizes/';
			  $imgpath[2]='../files/thumbnails/';
			  $imgsize[0]="default";
			  $imgsize[1]=",150";
			  $imgsize[2]=",80";
			  $acceptedsize="";
			  $imgouts=genericImageUpload($image,"varying",$imgpath,$imgsize,$acceptedsize);
			  $len=strlen($imgouts[0]);
			  $imagepath=substr($imgouts[0], 1,$len);
			  // medsize
			  $len2=strlen($imgouts[1]);
			  $imagepath2=substr($imgouts[1], 1,$len2);

			  // medsize
			  $len3=strlen($imgouts[2]);
			  $imagepath3=substr($imgouts[2], 1,$len3);	      

			  // get image size details
			  list($width,$height)=getimagesize($imgouts[0]);
			  $imagesize=$_FILES[''.$image.'']['size'];
			  $filesize=$imagesize/1024;
			  //echo $filefirstsize;
			  $filesize=round($filesize, 0, PHP_ROUND_HALF_UP);
			  if(strlen($filesize)>3){
			      $filesize=$filesize/1024;
			      $filesize=round($filesize,2); 
			      $filesize="".$filesize."MB";
			  }else{
			  		$filesize="".$filesize."KB";
			  }
			}else{
		      	$outs=simpleUpload($image,'../files/');
				$filepath=$outs['filelocation'];
				$imagepath=substr($filepath, 1,strlen($filepath));
				$filesize=$outs['filesize'];
	      	}
	      	if($imagepath!==""){
		      	$mediaquery="INSERT INTO media(ownerid,ownertype,maintype,mediatype,
			      	location,medsize,thumbnail,filesize,width,height)
			      VALUES
			      ('$uid','$usertype','$maintype','$ftype','$imagepath','$imagepath2',
			      	'$imagepath3','$filesize','$width','$height')";
			      // echo $mediaquery;
				$qdata=briefquery($mediaquery,__LINE__,"mysqli",true);
	      		
	      	}
	    }
	}
	// for test purposes
	// $uid=1;
	$hash=md5($uid);
	genericSingleUpdate("users","uhash","$hash","id","$uid");
	$title="Confirm your Cheet Account";
	$content='
		<h2 class="h2fjc">Thanks for Registering</h2>
		We at Cheet are glad you want to come on board and offer services to capacity, 
		we hope to have a lovely relationship with
		you as we press on to help our users perfomer better .<br>
		Please confirm your account by clicking on the following link<br>
		<a href="'.$host_addr.'completion.php?t=spconfirm&h='.$hash.'.'.$uid.'">
		Validate email address.
		</a>
					
	';
	  $content=stripslashes($content);
	  $footer='
	    
	  ';

	  $emailout=generateMailMarkUp("cheet.org","$email","$title","$content","$footer","fjc");
	    // // echo $emailout['rowmarkup'];
	    $toemail="$email";
	    $headers = "MIME-Version: 1.0" . "\r\n";
	    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	    $headers .= 'From: <no-reply@cheet.org>' . "\r\n";
	    $subject="Confirm you account with cheet";
	    if($host_email_send===true){
	      if(mail($toemail,$subject,$emailout['rowmarkup'],$headers)){

	      }else{
	        die('could not send Your email, something went wrong and we are handling it, meantime you could click the back button in your browser to get you out of here, we are really sorry');
	      }
	    }else{
	    	// view the email markup
	    	// echo $emailout['rowmarkup'];
	    	// stop redirection
	    	// $entryvariant="";
	    }
	// echo $entryvariant;
	$_SESSION['lastsuccess']=0;
	if($entryvariant=="createserviceprovideradmin"){
		header('location:../admin/adminindex.php?compid=18&type='.$entryvariant.'&v=admin&d='.$uid.'');
	}else if($entryvariant=="createserviceprovideracc"){
		$returl=isset($_POST['returl'])?$_POST['returl']:
		"../clientlogin.php?reg=completed";		
		// $url='../clientlogin.php?reg=completed';
		header('location:'.$returl.'');

	}else if($entryvariant=="createserviceprovideraccweb"){
		$success="true";
		$msg="Successfully registered";
		echo json_encode(array("success"=>"$success","msg"=>"$msg"));
	}
}else if($entryvariant=="createqgroup"){
	$compid=21;
	

	$qgrouptitle=mysql_real_escape_string($_POST['qgrouptitle']);
	$acronym=mysql_real_escape_string($_POST['acronym']);
	$details=mysql_real_escape_string($_POST['details']);
	// data entry to db
	$query="INSERT INTO qgroup(type,mainid,title,acronym,details)VALUES
	('main','0','$qgrouptitle','$acronym','$details')";
	
	$qdata=briefquery($query,__LINE__,"mysqli",true);
	$entryid=$qdata['resultdata'][0]['id'];
	// echo $query."<br>";
	// $entryid=1;//for test purposes only

	$contentpic=isset($_FILES['profpic']['tmp_name'])?
	$_FILES['profpic']['tmp_name']:"";
    if($contentpic!==""){
      	$image="profpic";
		$imgpath[0]='../files/originals/';
		$imgpath[1]='../files/medsizes/';
		$imgpath[2]='../files/thumbnails/';
		$imgsize[0]="default";
		$imgsize[1]=",300";
		$imgsize[2]=",85";
		$acceptedsize="";
		$imgouts=genericImageUpload($image,"varying",$imgpath,$imgsize,$acceptedsize);

		// original image
		$imagepath=substr($imgouts[0], 1,strlen($imgouts[0]));

		// medsize
		$imagepath2=substr($imgouts[1], 1,strlen($imgouts[1]));

		// thumbnail
		$imagepath3=substr($imgouts[2], 1,strlen($imgouts[2]));
		
		// get image size details
		list($width,$height)=getimagesize($imgouts[0]);
		$imagesize=$_FILES[''.$image.'']['size'];
		$filesize=$imagesize/1024;
		//echo $filefirstsize;
		$filesize=round($filesize, 0, PHP_ROUND_HALF_UP);
		if(strlen($filesize)>3){
			$filesize=$filesize/1024;
			$filesize=round($filesize,2); 
			$filesize="".$filesize."MB";
		}else{
			$filesize="".$filesize."KB";
		}
		//$coverpicid=getNextId("media");
		//maintype variants are original, medsize, thumb for respective size image.
		$mediaquery="INSERT INTO media(ownerid,ownertype,maintype,mediatype,location,
			medsize,thumbnail,filesize,width,height)VALUES
			('$entryid','qgroup','coverphoto','image','$imagepath','$imagepath2',
				'$imagepath3','$filesize','$width','$height')";
		$mediarun=mysqli_query($host_connli,$mediaquery)or die(mysqli_error($host_connli));
    }
    
    // proceed to check for and create subjects or sub-question groups
    $grouptype=mysql_real_escape_string($_POST['grouptype']);
    $subjectcount=mysql_real_escape_string($_POST['csgroupscount']);
    $subqcount=mysql_real_escape_string($_POST['subqgroupcount']);
    $targetcount=mysql_real_escape_string($_POST['grouptype'])=="hassubject"?
    $subjectcount:$subqcount;
    $coldata="";
    $querydata="";
    for($i=1;$i<=$targetcount;$i++){
    	if($grouptype=="hassubject"){
    		if(isset($_POST['coursetitle'.$i.''])){
    			$table="qscentries";
	    		$at="New Course entry Created";
	    		$coursetitle=mysql_real_escape_string($_POST['coursetitle'.$i.'']);
	    		$duration=mysql_real_escape_string($_POST['duration'.$i.'']);
	    		$duration=$duration!==""&&$duration!=="00:00"?$duration.":00":"01:00:00";
	    		// concatenate the query data 
	    		if($coursetitle!==""&&$duration!==""){
		    		$coldata="qgid,title,duration";
		    		$comma=$querydata!==""?",":"";
		    		$querydata.="$comma('$entryid','$coursetitle','$duration')";
	    		}
    			
    		}
    	}else if($grouptype=="hassubgroup"){
    		$table="qgroup";
    		$at="New Sub Question Group entry Created";
    		// first verify that the current entry has a value
    		if(isset($_POST['title'.$i.''])){
	    		$cstitle=mysql_real_escape_string($_POST['title'.$i.'']);
	    		$description=mysql_real_escape_string($_POST['description'.$i.'']);
	    		$acronym2=mysql_real_escape_string($_POST['acronymini'.$i.'']);
	    		$coldata="type,mainid,title,acronym,details";
		    	$comma=$querydata!==""?",":"";
	    		$querydata.="$comma('sub','$entryid','$cstitle','$acronym2','$description')";
	    	}

    	}
    }

    if($querydata!==""){
    	$subq="INSERT INTO $table($coldata) VALUES $querydata";
    	// echo $subq;
		$action="Create";
		$actiontype="$table";
		$actiondetails="$at";
		$notrdtype="none";//stops redirection

		// $nonottype="none";// stops notification table update

		$sqdata=briefquery($subq,__LINE__,"mysqli",true);
		$notid=$sqdata['resultdata'][0]['id'];
		
		// bring in the nrsection.php file
		include('nrsection.php');

		// resets the notrdtype variable to nothing to allow further use of the 
		// nrsection code
		$notrdtype="";

    }

	// prepare content for the notification redirect section (nrsection)
	$action="Create";
	$actiontype="qgroup";
	$actiondetails="New Question Group entry Created";
	$notid=$entryid;// the current notification data id for storage
	// $notrdtype="none";//stops redirection

	// $nonottype="none";// stops notification table update
	// bring in the nrsection.php file
	include('nrsection.php');
}	
?>