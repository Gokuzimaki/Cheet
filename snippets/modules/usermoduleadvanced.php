<?php 
	function getAllBusinessTypes($id=0,$qe=""){
		global $host_tpathplain;
		include($host_tpathplain.'globalsmodule.php');
		$row=array();
		if($qe==""){
			$qe="WHERE type='primary'";
		}
		$query="SELECT * FROM businessnature $qe AND status='active' ORDER BY businessnature";
		if($id>0){
			$query="SELECT * FROM businessnature WHERE id=$id";

		}
		$run=mysqli_query($host_connli,$query)or die(mysqli_error($host_connli)." Line ".__LINE__);
		$numrows=mysqli_num_rows($run);
		$selection="";
		$selectiontwo="";
		$rowout=array();
		if($numrows>0){
			$i=0;
			while ($row=mysqli_fetch_assoc($run)) {
				# code...
				$rowout[$i]=$row;
				$i++;
				$selection.='<option value="'.$row['businessnature'].'">'.$row['businessnature'].'</option>';
				$selectiontwo.='<option value="'.$row['id'].'">'.$row['businessnature'].'</option>';
			}
		}
		$row['selection']=$selection;
		$row['selectiontwo']=$selectiontwo;
		$row['resultdata']=$rowout;
		$row['numrows']=$numrows;
		return $row;
	};

	function getSingleUserPlain($id,$type="",$data=array()){
		global $host_tpathplain;
    	include($host_tpathplain."globalsmodule.php");

		$row=array();
		$query="SELECT * FROM users where id=$id";
		// check to see if there is already a result in the 'data'
		$dorow=false;
		if(isset($data['row'])&&is_array($data['row'])){
			$dorow=true;
			$row=$data['row'];
			$numrows=1;
		}else{
			$run=mysqli_query($host_connli,$query)or die(mysqli_error($host_connli)." Line  ".__LINE__);
			$numrows=mysqli_num_rows($run);
		}
		// for overriding the default query
		$queryoverride="";
		if(isset($data['single']['queryoverride'])&&$data['single']['queryoverride']!==""){
			$queryoverride=$data['single']['queryoverride'];
			$query="$queryoverride WHERE id='$id'";
			
		}
		// init important variable values pertaining to content in the $data array 
		
		$datamapout="";// caries the datamap for current operations
		
		$tdataoutput="";// carries the td dataoutput for the tr data cells 
		
		$formtruetype="edit_";// carries the name of the edit form

		$processroute=""; //carries the path to the process file for this function 
		$viewer="admin";
		$editroute=""; 
		$totalscripts="";
		$gc="";	
		$crmd5="";	
		$blockdeeprun="";
		if($type=="blockdeeprun"){
			$blockdeeprun="true";
		}

		if(isset($data['single'])){
			// var_dump($data);

			// create a data array single index entry for the rmd5 hash
			if(isset($data['single']['rmd5'])&&$data['single']['rmd5']!==""){
				$crmd5=$data['single']['rmd5'];	
			}

			if(isset($data['single']['datamap'])&&$data['single']['datamap']!==""){
				$datamap=$data['single']['datamap'];
				$gd_testdata=JSONtoPHP($datamap);
				$gd_dataoutput=$gd_testdata['arrayoutput'];
				// var_dump($gd_dataoutput);

				$processroute=isset($gd_dataoutput['pr'])?$gd_dataoutput['pr']:"";

				$editroute=isset($gd_dataoutput['er'])?$gd_dataoutput['er']:$processroute;
				if($queryoverride!==""){
					// add the session access hash and 
					// the 'overriden index to the datamap'
					$gd_dataoutput['pr']=stripslashes($processroute);
					$gd_dataoutput['er']=stripslashes($editroute);
					$gd_dataoutput['rmd5']=$crmd5;
					$gd_dataoutput['overriden']="true";
					$datamap=json_encode($gd_dataoutput);
					// var_dump($cd);
				}
				$datamapout='data-edata=\''.$datamap.'\'';
			}

			if(isset($data['single']['rowdefaults'])&&$data['single']['rowdefaults']!==""){
				$tdataoutput=$data['single']['rowdefaults'];
			}

			if(isset($data['single']['formtruetype'])&&$data['single']['formtruetype']!==""){
				$formtruetype=$data['single']['formtruetype'];
				// echo $formtruetype;
			}

			if(isset($data['single']['blockdeeprun'])&&$data['single']['blockdeeprun']!==""){
				$blockdeeprun=$data['single']['blockdeeprun'];
				// echo $blockdeeprun;
			}

			// get the count for the current entry in a group
			if(isset($data['single']['groupcount'])&&$data['single']['groupcount']!==""){
				$gc=$data['single']['groupcount'];
			}

			// strictly for the getsingleblogentry function
			// get the count for the current entry in a group
			if(isset($data['single']['viewer'])&&$data['single']['viewer']!==""){
				$viewer=$data['single']['viewer'];
			}
		}

		$row['datamapout']=$datamapout;

		// variable for holding script elements for selection box values and other 
		// related data setup
		$selectionscripts="";
		/*Image output section*/
			$originalimage=$host_addr."images/default.gif";
			$medimage=$host_addr."images/default.gif";
			$thumbimage=$host_addr."images/default.gif";
			$faceid=0;
			$banneroriginalimage="";
			$bannermedimage="";
			$bannerthumbimage="";
			$orgprofileimage="";
			$orgcacimage="";
			$poriginalimage='';
			$pmedimage='';
			$pthumbimage='';
			$cacoriginalimage='';
			$cacmedimage='';
			$cacthumbimage='';
			$bizprofileid=0;
			$bizcacid=0;

		/*end*/
		$nameout="";
		if($numrows>0){
			if($dorow==false){
				$row=mysqli_fetch_assoc($run);
			}
			$id=$row['id'];
			$fullname=$row['fullname'];
			$ndata=explode(" ",$fullname);
			$firstname=$ndata[0];
			$middlename=isset($ndata[1])?$ndata[1]:"";
			$lastname=isset($ndata[2])?$ndata[2]:"";
			$row['firstname']=$firstname;
			$row['middlename']=$middlename;
			$row['lastname']=$lastname;
			$gender=$row['gender'];
			$maritalstatus=$row['maritalstatus'];
			$state=$row['state'];
			// echo "SELECT * FROM state WHERE id_no=$state";
			$sdata=briefquery("SELECT * FROM state WHERE id_no=$state",__LINE__,"mysqli");
			$cdata=$sdata['resultdata'][0];
			$numrows=$sdata['numrows'];
			// if there are any results then set the state id to the current id
			$statename=$numrows>0?$cdata['state']:"";
			$row['statename']=$statename;
			// $state==""?$state="None specified":$state=$state;
			$lga=$row['lga'];
			$lgdata=$lga!==""?getSingleLGA($lga):"";
			// $row['lgdata']=$lgdata;
			$localgovt=isset($lgdata['local_govt'])?$lgdata['local_govt']:"";
			$row['lgdata']=$localgovt;
			$password=$row['pword'];
			$email=$row['email'];
			$phonenumber=$row['phonenumber'];
			if($phonenumber!==""){
				$phonearr=explode("[|><|]", $phonenumber);
				if(count($phonearr)>1){
					$phoneone=strlen($phonearr[0])==11?substr($phonearr[0], 1,9):$phonearr[0];
					$phonetwo=isset($phonearr[1])&&strlen($phonearr[1])==11?substr($phonearr[1], 1,9):$phonearr[1];
					$phonethree=isset($phonearr[2])&&strlen($phonearr[2])==11?substr($phonearr[2], 1,9):$phonearr[2];
				}else{
					$phoneone=$phonenumber;$phonetwo="";$phonethree="";
				}
			}else{
				$phoneone="";$phonetwo="";$phonethree="";
			}
			$row['phoneone']=$phoneone;
			$row['phonetwo']=$phonetwo;
			$row['phonethree']=$phonethree;
			$dob=$row['dob'];
			$age="";
			if($dob!=="0000-00-00"){
				$dobdata=explode("-",$dob);
				$dobyear=$dobdata[0];
				$curyear=date("Y");
				$age=$dobyear>0?$curyear-$dobyear:0;
			}
			$row['age']=$age;
			$regdate=$row['regdate'];
			$dobchangedate=$row['dobchangedate'];
			$genderchangedate=$row['genderchangedate'];
			$maritalstatuschangedate=$row['maritalstatuschangedate'];
			$today=date("Y-m-d");
			$timenow=date("H:i:s");
			$statechangedate=$row['statechangedate'];
			$pcmethod=$row['pcmethod'];
			$address=$row['address'];

			// comma seperated list of business properties or tags defining the business
			$bdata=$row['businessnature'];
			$bnid=$row['bnid'];
			if ($bnid>0) {
				// echo $bnid;
				$bndata=getAllBusinessTypes($bnid);
				$tbn=$bndata['resultdata'][0]['businessnature'];
				if($bdata!==$tbn){
					$bdata=$tbn;
					// run a table update reflecting the changes
					$cq="UPDATE users SET businessnature='$tbn' WHERE bnid='$bnid'";
					$cqrun=mysqli_query($host_connli,$cq)or die(mysqli_error($host_connli)." Line ".__LINE__);

				}
				# code...
			}else{
				$row['bnid']="";
				$row['businessnature']="";
			}
			$row['businessnature']=$bdata;
			// for secondary service provided
			$bnid2=$row['sbnid'];
			if ($bnid2>0) {
				// echo $bnid;
				$bndata=getAllBusinessTypes($bnid2);
				$tbn=$bndata['resultdata'][0]['businessnature'];
				if($bdata!==$tbn){
					$bdata=$tbn;
					// run a table update reflecting the changes to the name
					// of the businessnature
					$cq="UPDATE users SET sbn='$tbn' WHERE sbnid='$bnid2'";
					$cqrun=mysqli_query($host_connli,$cq)or die(mysqli_error($host_connli)." Line ".__LINE__);
				}
				# code...
				$row['businessnature2']=$bdata;
			}else{
				$row['sbnid']="";
				$row['businessnature2']="";
			}

			$bplode=explode(",", $bdata);
			$row['businessnaturecount']=count($bplode);
			$row['businessnaturedata']=array();
			for($i=0;$i<count($bplode);$i++){
				$row['businessnaturedata'][$i]=$bplode[$i];
			}
			// period of time the business has provided said services
			$spduration=$row['spduration'];
			$websiteurl=isset($row['websiteurl'])?$row['websiteurl']:"";
			$websiteurltwo=$websiteurl;
			if($websiteurl!==""){
				if($websiteurl!== "##"&&!strpos($websiteurl, "http://")&&
					!strpos($websiteurl, "https://")){
					$websiteurltwo="http://".$websiteurl;
				}
			}
			// forcefully ensure that a website url value is present
			$row['websiteurl']=$websiteurl;
			$row['websiteurltwo']=$websiteurltwo;
			$status=$row['status'];
			$nameout=$fullname; // variable holds default name by usertype
			if(isset($row['usertype'])&&($row['usertype']=='user'
				||$row['usertype']=='serviceprovider'||
					$row['usertype']=='client')){
				$cusertype=$row['usertype'];
				// get profile picture
				$facequery2="SELECT * FROM media where ownerid=$id AND 
				ownertype='$cusertype' AND maintype='profpic'";
				$facerun2=mysqli_query($host_connli,$facequery2)or die(mysqli_error($host_connli)." Line ".__LINE__);
				$facerow2=mysqli_fetch_assoc($facerun2);
				$numrowface=mysqli_num_rows($facerun2);
				$faceid=$facerow2['id'];
				if($numrowface>0){
					$originalimage=$host_addr.$facerow2['location'];
					$medimage=$host_addr.$facerow2['medsize'];
					$thumbimage=$host_addr.$facerow2['thumbnail'];
				}
				$nameout=$fullname;
			}
			$row['faceid']=$faceid;

			if ($row['usertype']=='client'||$row['usertype']=='serviceprovider') {
				# code...
				// get biz logo and banner
				$bizlogoquery2="SELECT * FROM media where ownerid=$id AND (ownertype='client' OR ownertype='serviceprovider') AND maintype='bizlogo'";
				$bizlogorun2=mysqli_query($host_connli,$bizlogoquery2)or die(
					mysqli_error($host_connli)." Line ".__LINE__);
				
				$nameout=$row['businessname'];
				$bizlogorow2=mysqli_fetch_assoc($bizlogorun2);
				$numrowbizlogo=mysqli_num_rows($bizlogorun2);
				$row['bizlogoid']=$bizlogorow2['id'];
				$row['bizlogofile']=$bizlogorow2['location'];
				$bizlogoid=0;
				if($numrowbizlogo>0){
					$originalimage=$host_addr.$bizlogorow2['location'];
					$medimage=$host_addr.$bizlogorow2['medsize'];
					$thumbimage=$host_addr.$bizlogorow2['thumbnail'];
				}
				$bannerlogoquery2="SELECT * FROM media where ownerid=$id AND (ownertype='client' OR ownertype='serviceprovider') AND maintype='bannerlogo'";
				$bannerlogorun2=mysqli_query($host_connli,$bannerlogoquery2)or die(
					mysqli_error($host_connli)." Line 27");
				$bannerlogorow2=mysqli_fetch_assoc($bannerlogorun2);
				$numrowbannerlogo=mysqli_num_rows($bannerlogorun2);
				$row['bannerlogoid']=$bannerlogorow2['id'];
				$row['bannerlogofile']=$bannerlogorow2['location'];
				$bannerlogoid=0;
				if($numrowbannerlogo>0){
					$banneroriginalimage=$host_addr.$bannerlogorow2['location'];
					$bannermedimage=$host_addr.$bannerlogorow2['medsize'];
					$bannerthumbimage=$host_addr.$bannerlogorow2['thumbnail'];
				}

				$bizprofilequery2="SELECT * FROM media where ownerid=$id AND (ownertype='client' OR ownertype='serviceprovider') AND maintype='orgprofile'";
				$bizprofilerun2=mysqli_query($host_connli,$bizprofilequery2)or die(mysqli_error($host_connli)." Line ".__LINE__);
				$numrowsbizprofile=mysqli_num_rows($bizprofilerun2);
				$bizprofileid=0;
				
				if($numrowsbizprofile>0){
					$bizprofilerow2=mysqli_fetch_assoc($bizprofilerun2);
					$bizprofileid=$bizprofilerow2['id'];
					$poriginalimage=$host_addr.$bizprofilerow2['location'];
					$pmedimage=$host_addr.$bizprofilerow2['medsize'];
					$pthumbimage=$host_addr.$bizprofilerow2['thumbnail'];	
				}

				$bizcacquery2="SELECT * FROM media where ownerid=$id AND (ownertype='client' OR ownertype='serviceprovider') AND maintype='orgcac'";
				$bizcacrun2=mysqli_query($host_connli,$bizcacquery2)or die(mysqli_error($host_connli)." Line ".__LINE__);
				$numrowsbizcac=mysqli_num_rows($bizcacrun2);
				$bizcacid=0;
				
				if($numrowsbizcac>0){
					$bizcacrow2=mysqli_fetch_assoc($bizcacrun2);
					$bizcacid=$bizcacrow2['id'];
					$cacoriginalimage=$host_addr.$bizcacrow2['location'];
					$cacmedimage=$host_addr.$bizcacrow2['medsize'];
					$cacthumbimage=$host_addr.$bizcacrow2['thumbnail'];	
				}

			}

			if ($row['usertype']=='appuser') {
				# code...
				// get profilepicture
				$facequery2="SELECT * FROM media where ownerid=$id AND ownertype='appuser' AND maintype='profpic'";
				$facerun2=mysqli_query($host_connli,$facequery2)or die(mysqli_error($host_connli)." Line 27");
				$facerow2=mysqli_fetch_assoc($facerun2);
				$numrowface=mysqli_num_rows($facerun2);
				$row['faceid']=$facerow2['id'];
				if($numrowface>0){
					$originalimage=$host_addr.$facerow2['location'];
					$medimage=$host_addr.$facerow2['medsize'];
					$thumbimage=$host_addr.$facerow2['thumbnail'];
				}
				$nameout=$fullname;
			}
			if($formtruetype!==""){

				$selectionscripts.='
            			$("form[name='.$formtruetype.'] select[name=businessnature]").val("'.$bnid.'");

						$("form[name='.$formtruetype.'] select[name=businessnature2]").val("'.$bnid2.'");


						$("form[name='.$formtruetype.'] select[name=activationstatus]").val("'.$row['activationstatus'].'");

				$("form[name='.$formtruetype.'] select[name=status]").val("'.$status.'");';
				$selectionscripts.='$("form[name='.$formtruetype.'] select[name=state]").val("'.$statename.'");';
				$selectionscripts.='$("form[name='.$formtruetype.'] select[name=gender]").val("'.$gender.'");';
				$selectionscripts.='$("form[name='.$formtruetype.'] select[name=pcmethod]").val("'.$pcmethod.'");';
			}

		}
		!isset($adminsuboutput)?$adminsuboutput="":$test="true";
		$selectionscriptsout='<script>$(document).ready(function(){'.$selectionscripts.'});</script>';

	  	$row['totalscripts']=$selectionscripts;
		
		$row['numrows']=$numrows;
		$row['nameout']=$nameout;
		$row['fullname']=$fullname;
		$row['originalimage']=$originalimage;
		$row['medimage']=$medimage;
		$row['thumbimage']=$thumbimage;
		$row['banneroriginalimage']=$banneroriginalimage;
		$row['bannermedimage']=$bannermedimage;
		$row['bannerthumbimage']=$bannerthumbimage;
		$row['bizprofileid']=$bizprofileid;
		$row['bizporiginalimage']=$poriginalimage;
		$row['bizpmedimage']=$pmedimage;
		$row['bizpthumbimage']=$pthumbimage;
		$row['bizcacid']=$bizcacid;
		$row['bizcacoriginalimage']=$cacoriginalimage;
		$row['bizcacmedimage']=$cacmedimage;
		$row['bizcacthumbimage']=$cacthumbimage;
		$trow=$row;
		unset($trow['pword']);
		unset($trow['email']);
		if(isset($trow['username'])){
			unset($trow['username']);
		}
		$catdata=$trow;
		// $rpword=array_shift($catdata['pword']);
		$row['catdata']=$catdata;
		return $row;
	}

	
	
	function getAllUsers($viewer,$limit,$type="",$data=array()){
		global $host_tpathplain;
		include($host_tpathplain.'globalsmodule.php');
		$row=array();

		// this block handles the content of the limit data
	 	// testing and stripping it of unnecessary/unwanted characters
		str_replace("-", "", $limit);

		$testittwo=strpos($limit,",");
		// echo $testittwo;
		if($testittwo!==false||$testittwo===true||$testittwo>0){
			$limit=$limit;
		}else{
			if(strtolower($limit)=="all"){
				$limit="";
			}else{
				$limit="LIMIT 0,15";				
			}
		}
		$realoutputdata="";
		$mtype="";
		if($type!==""){
			$mtype=$type;
			if (is_array($type)) {
				# code...
				if(isset($mtype['lastid'])||isset($mtype['nextid'])){
					$callpage="true";
					if(isset($mtype['lastid'])){
						$addq=" AND id>".$mtype['lastid'];
					}
					if(isset($mtype['nextid'])){
						$addq=" AND id<".$mtype['nextid'];
					}
				}
				$type=$mtype[0];
				$typeval=$mtype[1];
				$realoutputdata="$type][$typeval";
			
				
			}else{
				$realoutputdata=$type;
			}
		}

		// check to see if the 'displaytype' index is present and assign it a variable
		$displaytype="";
		if(isset($data['displaytype'])&&$data['displaytype']!==""){
			$displaytype=$data['displaytype'];

		}		

		$data['single']['viewer']=$viewer;
		// run through the data array and obtain only the 'single' index
		// of it
		$singletype="";
		if(isset($data['single']['type'])&&$data['single']['type']!==""){
			$singletype=$data['single']['type'];
		}

		// these variable controls the generic $row output index, it can be used to 
		// explicitly control the output of the current query being run. 
		// Prior knowledge of the functions output
		// index values is required.
		$pcoutput="";
		if(isset($data['pcoutput'])&&$data['pcoutput']!==""){
			$pcoutput=$data['pcoutput'];
		}
		$subpcoutput="";
		if(isset($data['subpcoutput'])&&$data['subpcoutput']!==""){
			$subpcoutput=$data['subpcoutput'];
		}


		$user="user";
		if(isset($data['user'])&&$data['user']!==""){
			$user=$data['user'];

		}
		// defines the current file name for the form file handling the current
		// usertype entry
		// the values are 'userentries' and 'serviceproviderentries'
		// the latter represents the file that handles non user/business accounts
		// on the platform
		$curpath="userentries.php"; 
		if(isset($data['curpath'])&&$data['curpath']!==""){
			$curpath=$data['curpath'];	
		}
		
		$viewerdata="WHERE (usertype='$user' OR usersubtype='$user')";

		if($viewer=="viewer"){
			$viewerdata="WHERE usertype='$user' $statusdata";
		}
		$outputtype="generalpages|$user|".$viewer;
		$queryoverride="";
		$queryextra="";
		$ordercontent="order by id desc";
		$qcat=$viewer=="admin"?"WHERE":"AND";
		$qcat="AND";
		
		
		// query order 
		if(isset($data['queryorder'])&&$data['queryorder']!==""){
			$ordercontent=$data['queryorder'];
		}

		// variable for holding script elements for selection box values and other 
		// related data setup
		$selectionscripts="";
		// completely overrides the default query 
		if(isset($data['queryoverride'])&&$data['queryoverride']!==""){
			$queryoverride=$data['queryoverride'];
		}

		// chect to see if extra query data are to be appended
		if(isset($data['queryextra'])&&$data['queryextra']!==""){
			if($queryextra==""){
				$queryextra.=" $qcat ".$data['queryextra'];
			}else{
				$queryextra.=" AND ".$data['queryextra'];
			}
		}


		if($viewer=="admin"){
			$query="SELECT * FROM users $viewerdata $queryextra $ordercontent ".$limit."";
			$rowmonitor['chiefquery']="SELECT * FROM users $viewerdata $queryextra 
			$ordercontent";
		}else if($viewer=="viewer"){
			$query="SELECT * FROM users $viewerdata $queryextra $ordercontent ".$limit."";
			$rowmonitor['chiefquery']="SELECT * FROM users $viewerdata $queryextra  
			$ordercontent";
		}
		// echo $query;

		// override default query if necessary
		if($queryoverride!==""){
			$query="$queryoverride $queryextra $ordercontent $limit";
			$rowmonitor['chiefquery']="$queryoverride $queryextra $ordercontent";
		}
		$selection="";
		$selectiontwo="";
		// unique hash per data transaction call
		$rmd5=md5($rowmonitor['chiefquery'].date("Y-m-d H:i:s"));

		// create a data array single index entry for the rmd5 hash
		if(!isset($data['single']['rmd5'])){
			$data['single']['rmd5']=$rmd5;
		}

		// return the query, only for tests with Ajax json 
		$row['cqtdata']=$query;

		// create the $_SESSION['generalpagesdata'] array value to ensure continuity
		// when paginating content. This is done by checking the sessionuse 
		if((!isset($data['sessionuse'])&&!isset($data['chash']))||
			($data['sessionuse']==""&&$data['chash']=="")){

			// store current output type
			$_SESSION['generalpagesdata']["$rmd5"]['outputtype']=$outputtype;

			// store current data array
			$_SESSION['generalpagesdata']["$rmd5"]['data']=$data;

			// store custom ipp array if available
			$_SESSION['generalpagesdata']["$rmd5"]['ipparr_override']=
			isset($ipparr_override)?$ipparr_override:"";
			
			// store current type entry
			$_SESSION['generalpagesdata']["$rmd5"]['type']=$mtype;
			
			// set the value for the pagination handler file path
			// using the 'snippets' folder as the root. 
			$_SESSION['generalpagesdata']["$rmd5"]['pagpath']="forms/$curpath";

			// set the pagintation type variable which helps differentiate what to be
			// paginated in the case of single 'form' file handling serving 
			// several modules
			$_SESSION['generalpagesdata']["$rmd5"]['pagtype']="blogcategory";

			// use the 'cq' session index to secure this query
			$_SESSION['cq']["$rmd5"]=$rowmonitor['chiefquery'];

			/*This section is for indexes that are specific to the current function*/

			// store current blogtypeid used for the query
			$_SESSION['generalpagesdata']["$rmd5"]['usertype']=$user;


		}else{
			// echo __LINE__;
			// var_dump($data);
			if(isset($data['single']['rmd5'])&&$data['single']['rmd5']!==""){
				$rmd5=$data['single']['rmd5'];
			}
		}

		// prep the datamap element
		$mapelement="";
		if(isset($data['datamap'])&&$data['datamap']!==""){
			// array map element map data for handling custom gd request
			// echo "maptrick<br>";
			$curdatamap=JSONtoPHP($data['datamap']);
			if($curdatamap['error']=="No error"){
				if($queryoverride!==""){
					$cd=$curdatamap['arrayoutput'];
					$cd['rmd5']=$rmd5;
					$cd['overriden']="true";
					$data=json_encode($cd);
				}

				$mapelement='
					<input type="hidden" name="datamap" value=\''.$data['datamap'].'\'/>
				';

			}else{
				echo"<br>Map error<br>";
			}
		}

		$qdata=briefquery($query,__LINE__,"mysqli");
		
		$adminoutput='<tr><td colspan="100%">No entries found</td></tr>';
		
		$row['resultdataset']=array();
		$numrows=$qdata['numrows'];
    	$selectiondata='<option value="">--Choose--</option>';
		$formoutput="";
		$formoutputtwo="";
		$totalscripts="";

		$monitorpoint="";
		$run=mysqli_query($host_connli,$query)or die(mysqli_error($host_connli)." Line ".__LINE__);
		$numrows=mysqli_num_rows($run);

		
		$adminoutput='<tr><td colspan="100%">No entries found</td></tr>';
		$adminoutput2='<tr><td colspan="100%">No entries found</td></tr>';
		$adminoutput3='<tr><td colspan="100%">No entries found</td></tr>';
		$adminoutput4='<tr><td colspan="100%">No entries found</td></tr>';
		$adminoutputappuser="";
		$monitorpoint="";
		$catdata=array();
		if($numrows>0){
			$adminoutput='';
			$adminoutput2='';
			$adminoutput3='';
			$adminoutput4='';
			while($row=mysqli_fetch_assoc($run)){
				$data['row']=$row;
				// $outvar=getSingleUser($row['id'],$singletype,$data);
				// for plain user acc
				$outvartwo=getSingleUserPlain($row['id'],$singletype,$data);
				$datamapout=$outvartwo['datamapout'];
				//	 get client profile and cac reg
				$clientprofile='<a href="##">none</a>';
				$clientcac='<a href="##">none</a>';
				$profileimg='<i class="fa fa-user fa-2x"></i>';
				if($outvartwo['originalimage']!==""){
						$profileimg='<a href="'.$outvartwo['originalimage'].'" data-lightbox="default_gallery_'.$row['id'].'" data-src="'.$outvartwo['originalimage'].'" data-title="<h4 class=\'galimgdetailshigh\'>'.$outvartwo['nameout'].' </h4>: Right click the image and click \'Save as\' to download.">
				                            <img src="'.$outvartwo['thumbimage'].'" alt="img">
										</a>';
						
				}

				if($outvartwo['bizpmedimage']!==""){
					$ft=getExtensionAdvanced($outvartwo['bizporiginalimage']);
					if($ft['type']=="image"){
						$clientprofile='<a href="'.$outvartwo['bizporiginalimage'].'" data-lightbox="default_gallery_'.$row['id'].'" data-src="'.$outvartwo['bizporiginalimage'].'" data-title="<h4 class=\'galimgdetailshigh\'>'.$outvartwo['businessname'].' Profile</h4>: Right click the image and click \'Save as\' to download.">
				                            <img src="'.$outvartwo['bizpthumbimage'].'" alt="img">
										</a>';
						
					}else{
						$downloadurl=$host_addr.'/snippets/display.php?displaytype=gd_download&datapath='.str_replace($host_addr,".",$outvartwo['bizporiginalimage']).'';
						$clientprofile='<a href="##profile_download" 
										title="Click to download" data-gddownload="true"
										data-gd-url="'.$downloadurl.'"
										>
				                            Download Profile ('.$ft['ext'].');
										</a>';
					}
				}else if($outvartwo['websiteurl']!==""){
					$clientprofile='<a href="'.$outvartwo['websiteurltwo'].'" >
				                            View Profile (Web Address);
										</a>';
				}
				if($outvartwo['bizcacmedimage']!==""){
					$ft=getExtensionAdvanced($outvartwo['bizcacoriginalimage']);
					if($ft['type']=="image"){
					
						$clientcac='<a href="'.$outvartwo['bizcacoriginalimage'].'" data-lightbox="default_gallery_'.$row['id'].'" data-src="'.$outvartwo['bizcacoriginalimage'].'" data-title="<h4 class=\'galimgdetailshigh\'>'.$outvartwo['businessname'].' CAC</h4>: Right click the image and click \'Save as\' to download.">
		                            <img src="'.$outvartwo['bizcacthumbimage'].'" alt="img">
								</a>';
					}else{
						$downloadurl=$host_addr.'/snippets/display.php?displaytype='
						.'gd_download&datapath='.
						str_replace($host_addr,".",$outvartwo['bizcacoriginalimage']).'';
						$clientcac='<a href="##profile_download" 
										title="Click to download" data-gddownload="true"
										data-gd-url="'.$downloadurl.'">
				                            Download Profile ('.$ft['ext'].');
										</a>';
					}
				}

				// $row['resultdataset'][]=$outvartwo['catdata'];
				$catdata[]=$outvartwo['catdata'];
				// for user acc
				$adminoutput2.='<tr data-id="'.$outvartwo['id'].'">
									<td class="tddisplayimg">'.$profileimg.'</td>
									<td>'.$outvartwo['nameout'].'</td>
									<td>'.$outvartwo['gender'].'</td>
									<td>'.$outvartwo['age'].'</td>
									<td>'.$outvartwo['email'].'</td>
									<td>'.$outvartwo['phonenumber'].'</td>
									<td>'.$outvartwo['regdate'].'</td>
									<td>'.$outvartwo['status'].'</td>
									<td name="trcontrolpoint">
										<a href="#&id='.$outvartwo['id'].'" data-oname="View" 
										name="edit" data-type="editgeneraldata" 
										data-divid="'.$outvartwo['id'].'" '.$datamapout.'>View</a>
									</td>
								</tr>
								<tr name="tableeditcontainer" data-state="inactive" data-divid="'.$outvartwo['id'].'">
									<td colspan="100%">
										<div id="completeresultdisplay" data-type="editmodal" data-load="unloaded" data-divid="'.$outvartwo['id'].'">
											<div id="completeresultdisplaycontent" data-type="editdisplay" data-divid="'.$outvartwo['id'].'">
												
											</div>
										</div>
									</td>
								</tr>';
				// for business accounts
				$adminoutput3.='<tr data-id="'.$outvartwo['id'].'">
									<td>'.$outvartwo['businessname'].'</td>
									<td class="tdimg">'.$clientprofile.'</td>
									<td class="tdimg">'.$clientcac.'</td>
									<td>'.$outvartwo['businessnature'].'</td>
									<td>'.$outvartwo['businessnature2'].'</td>
									<td>'.$outvartwo['fullname'].'</td>
									<td>'.$outvartwo['contactemail'].'</td>
									<td>'.$outvartwo['contactphone'].'</td>
									<td>'.$outvartwo['activationstatus'].'</td>
									<td>'.$outvartwo['status'].'</td>
									<td name="trcontrolpoint">
										<a href="#&id='.$outvartwo['id'].'" name="edit" data-type="editgeneraldata" data-oname="View" data-divid="'.$outvartwo['id'].'" '.$datamapout.'>View</a>
									</td>
								</tr>
								<tr name="tableeditcontainer" data-state="inactive" data-divid="'.$outvartwo['id'].'">
									<td colspan="100%">
										<div id="completeresultdisplay" data-type="editmodal" data-load="unloaded" data-divid="'.$outvartwo['id'].'">
											<div id="completeresultdisplaycontent" data-type="editdisplay" data-divid="'.$outvartwo['id'].'">
												
											</div>
										</div>
									</td>
								</tr>';
				
				// for single profile business accounts
				$adminoutput4.='<tr data-id="'.$outvartwo['id'].'">
									<td class="tddisplayimg">'.$profileimg.'</td>
									<td>'.$outvartwo['fullname'].'</td>
									<td>'.$outvartwo['usersubtype'].'</td>
									<td>'.$outvartwo['email'].'</td>
									<td>'.$outvartwo['contactphone'].'</td>
									<td>'.$outvartwo['regdate'].'</td>
									<td>'.$outvartwo['activationstatus'].'</td>
									<td>'.$outvartwo['status'].'</td>
									<td name="trcontrolpoint">
										<a href="#&id='.$outvartwo['id'].'" data-oname="View" 
										name="edit" data-type="editgeneraldata" 
										data-divid="'.$outvartwo['id'].'" '.$datamapout.'>View</a>
									</td>
								</tr>
								<tr name="tableeditcontainer" data-state="inactive" data-divid="'.$outvartwo['id'].'">
									<td colspan="100%">
										<div id="completeresultdisplay" data-type="editmodal" data-load="unloaded" data-divid="'.$outvartwo['id'].'">
											<div id="completeresultdisplaycontent" data-type="editdisplay" data-divid="'.$outvartwo['id'].'">
												
											</div>
										</div>
									</td>
								</tr>';



				$totalscripts.=$outvartwo['totalscripts'];
				// $adminoutputappuser.=$outvar['adminoutputappuser'];
				$selection.='<option value="'.$outvartwo['id'].'">'.$outvartwo['fullname'].'</option>';
				$selectiontwo.='<option value="'.$outvartwo['id'].'">'.$outvartwo['businessname'].'</option>';
				$selectiondata.='<option value="'.$outvartwo['id'].'">'.$outvartwo['fullname'].'</option>';
			}
			// create the current query target data output value
			// this index is used in testing the current executed query

		}
		$row['cqtdata']=$query;
		$outs=paginatejavascript($numrows);
		$row['selectiondata']=$selectiondata;
		$row['chiefquery']=$rowmonitor['chiefquery'];
		$row['num_pages']=$outs['num_pages'];
		$row['paginatedata']=$outs;
		$row['num_pages']=$outs['num_pages'];

		$top='<table id="resultcontenttable" cellspacing="0">
					<thead><tr><th>Photo</th><th>FullName</th><th>Content Category</th><th>State</th><th>LGA</th><th>PhoneNumbers</th><th>Gender</th><th>Reg Date</th><th>Status</th><th>View/Edit</th></tr></thead>
					<tbody>';
		// basic user content
		$toptwo='<table id="resultcontenttable" cellspacing="0">
					<thead><tr><th>Profile Img</th><th>FullName</th><th>Gender</th><th>Age</th>
					<th>Email</th><th>PhoneNumber</th><th>Reg Date</th><th>Status</th>
					<th>View/Edit</th></tr></thead>
					<tbody>';
		// basic client organisation
		$topthree='<table id="resultcontenttable" cellspacing="0">
					<thead><tr><th>Organisation Name</th><th>Profile</th><th>CAC</th>
					<th>Business Nature</th><th>Secondary Service</th><th>Contact Fullname</th>
					<th>Contact Email</th><th>Contact Phone</th><th>Act. Status</th>
					<th>Status</th><th>View/Edit</th></tr></thead>
					<tbody>';
		// basic client single service provider
		$topfour='<table id="resultcontenttable" cellspacing="0">
					<thead><tr><th>Photo</th><th>Full Name</th> 
					<th>Account Type</th><th>Contact Email</th><th>Contact Phone</th>
					<th>Reg Date</th><th title="ActivationStatus">Act. Status</th>
					<th>Status</th><th>View/Edit</th></tr></thead>
					<tbody>';
		$bottom='	</tbody>
				</table>';
		$paginatetop='
		<div id="paginationhold">
			<div class="meneame">
				<input type="hidden" name="curquery" value="'.$rmd5.'"/>
				<input type="hidden" name="outputtype" 
				value="'.$outputtype.'|'.$realoutputdata.'"/>
				'.$mapelement.'
				<input type="hidden" name="currentview" data-ipp="15" 
				data-page="1" value="1"/>
				<div class="pagination" data-name="paginationpageshold">
				'.$outs['pageout'].'</div>
				<div class="pagination">
					  '.$outs['usercontrols'].'
				</div>
			</div>
		</div>
		<div id="paginateddatahold" data-name="contentholder">';
		$paginatebottom='
		</div><div id="paginationhold">
			<div class="meneame">
				<div class="pagination" data-name="paginationpageshold">
				'.$outs['pageout'].'
				</div>
			</div>
		</div>';
		$row['adminoutput']=$paginatetop.$top.$adminoutput.$bottom.$paginatebottom;
		$row['adminoutputtwo']=$top.$adminoutput.$bottom;
		// $row['adminoutputappuser']=$paginatetop.$toptwo.$adminoutputappuser.$bottom.$paginatebottom;
		// $row['adminoutputtwoappuser']=$toptwo.$adminoutputappuser.$bottom;
		// basic user display
		$row['adminoutput2']=$paginatetop.$toptwo.$adminoutput2.$bottom.$paginatebottom;
		$row['adminoutputtwo2']=$toptwo.$adminoutput2.$bottom;

		$row['numrows']=$numrows;

		// basic organisation  details
		$row['adminoutput3']=$paginatetop.$topthree.$adminoutput3.$bottom.$paginatebottom;
		$row['adminoutputtwo3']=$topthree.$adminoutput3.$bottom;

		// basic single service provider details
		$row['adminoutput4']=$paginatetop.$topfour.$adminoutput4.$bottom.$paginatebottom;
		$row['adminoutputtwo4']=$topfour.$adminoutput4.$bottom;

		//define the nature of the current output;
		$row['outputtype']=$realoutputdata;
		$row['selection']=$selection;
		$row['selectiontwo']=$selectiontwo;
		// $uarun=mysqli_query($host_connli,$rowmonitor['chiefquery']);
		// $numrowsactive=mysqli_num_rows($uarun);
		// $row['numrowsactive']=$numrowsactive;
		$row['catdata']=$catdata;
		$row['resultdataset']=$catdata;

		$row['genericout']=$pcoutput!==""?$row[''.$pcoutput.'']:$row['adminoutput'];
		$row['genericouttwo']=$subpcoutput!==""?$row[''.$subpcoutput.'']:$row['adminoutputtwo'];
		return $row;
	}


	function getUserGroup($viewer,$limit){
		$row=array();
		str_replace("-", "", $limit);

		$testit=strpos($limit,"-");

		$testit?$limit="":$limit=$limit;
		$testittwo=strpos($limit,",");
		if($testittwo===0||$testittwo===true||$testittwo>0){
			$limit=$limit;
		}else{
			if(strtolower($limit)=="all"){
				$limit="";
			}else{
				$limit="LIMIT 0,15";				
			}
		}
		if($viewer=="admin"){
			$query="SELECT * FROM users WHERE usertype='user' order by fullname,id desc ".$limit."";
			$rowmonitor['chiefquery']="SELECT * FROM users WHERE usertype='user' order by fullname,id desc";
		}elseif($viewer=="viewer"){
			$query="SELECT * FROM users WHERE usertype='user' AND status='active' $limit";
			$rowmonitor['chiefquery']="SELECT * FROM users WHERE usertype='user' AND status='active' order by fullname,id desc";
		}else if($viewer=="inactiveviewer"){
			$query="SELECT * FROM users WHERE usertype='user' AND status='inactive'";		
			$rowmonitor['chiefquery']="SELECT * FROM users WHERE usertype='user' AND status='inactive'order by fullname,id desc";
		}else if(is_array($viewer)){
			$prevval=$viewer;
			$subtype=$viewer[0];
			$searchval=mysqli_real_escape_string($viewer[1]);
			$viewer=$viewer[2];
 		  	$outputtype="usersearch|$subtype|$searchval|$viewer";
			if($subtype=="username"&&$viewer=="admin"){
				$query="SELECT * FROM users WHERE (fullname LIKE '%$searchval%' AND usertype='user' AND status='active') OR (fullname LIKE '%$searchval%' AND usertype='user' AND status='inactive')  AND usertype='user' ORDER BY firstname,middlename,lastname,id $limit";
		    	$rowmonitor['chiefquery']="SELECT * FROM users WHERE (fullname LIKE '%$searchval%' AND usertype='user' AND status='active') OR (fullname LIKE '%$searchval%' AND usertype='user' AND status='inactive') AND usertype='user' ORDER BY fullname, id";
			}else if($subtype=="usercategorysearch"&&$viewer=="admin"){
				$catid=$prevval[3];
				$query="SELECT * FROM users WHERE catid ='$catid' AND usertype='user' AND fullname LIKE '%$searchval%' ORDER BY fullname,id $limit";
		    	$rowmonitor['chiefquery']="SELECT * FROM users WHERE catid ='$catid' AND usertype='user' AND fullname LIKE '%$searchval%' ORDER BY fullname,id";
			}elseif($subtype=="userstatus"&&$viewer=="admin"){
				$query="SELECT * FROM users WHERE status ='$searchval' AND usertype='user' $limit";
		    	$rowmonitor['chiefquery']="SELECT * FROM users WHERE status ='$searchval' AND usertype='user'";
			}elseif($subtype=="advancedusersearch"&&$viewer=="admin"){
				$query= $searchval." ".$limit;
		    	$rowmonitor['chiefquery']=$searchval;
			}else if($subtype=="userslist"&&$viewer=="admin"){
				$query="SELECT * FROM users WHERE usertype='user' ORDER BY fullname $limit";
		    	$rowmonitor['chiefquery']="SELECT * FROM users WHERE catid ='$searchval' AND usertype='user' ORDER BY fullname";
 		  		$outputtype="userslist|$subtype|$searchval|$viewer";
			}else if($subtype=="usercatlist"&&$viewer=="admin"){
				$catid=$prevval[3];
				$query="SELECT * FROM users WHERE catid =$catid AND usertype='user' ORDER BY fullname $limit";
		    	$rowmonitor['chiefquery']="SELECT * FROM users WHERE catid ='$catid' AND usertype='user' ORDER BY fullname";
 		  		$outputtype="usercatlist|$subtype|$searchval|$viewer";
			}else{
				echo "search parameters unrecognized, contact your developer";
			}
		}
		// echo $viewer."<br>";
		// echo $query;
		$selection='<option value="">Select a User</option>';
		$minisearch="";
		$run=mysqli_query($host_connli,$query)or die(mysqli_error($host_connli)." Line ".__LINE__);
		$numrows=mysqli_num_rows($run);
		// generate full user list
		if($numrows>0){
			$rowquery=mysqli_query($host_connli,$rowmonitor['chiefquery']);
			while($fullrows=mysqli_fetch_array($rowquery)){
				$selection.='<option value="'.$fullrows['id'].'">'.$fullrows['fullname'].'</option>';
				$minisearch.='<span class="username_display"><a href="##" data-id="'.$fullrows['id'].'">'.$fullrows['fullname'].'</a></span>';
			}
		}
		$row['selection']=$selection;
		$row['minisearch']=$minisearch;
		$row['numrows']=$numrows;
		return $row;
	}
?>