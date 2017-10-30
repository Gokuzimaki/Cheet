<?php
	/**
	*	@see file - ROOT/snippets/modules/appmodules/questionsmodules/questionsmodule.php 	
	*	This files purpose is to serve as the central point for handling questions 
	*	data in the cheetmini platform. 	
	*	@author Okebukola Olagoke
	*	@version 1.0.0
	*	
	*	@todo
	*	This module contains functions that interact and provide an interface with
	*	the cheet questions system. The functions here cover 
	*	question group(q.group) retrieval, display and search/sorting.
	*	questions data display as per q.group they are under.
	*	questions answer sheet retrieval and display.
	*	questions answers data retreival search/sort and display as per user interactions
	*	with the questions.
	*/	

	


	/**
	*	@see getSingleQuestionGroup() 
	*	
	*	@todo this function gets a single question group(qgroup) based on id  
	*	from the 'qgroup' database table, obtains other information related to
	*	that questiongroup as well such as attached subjects.  
	*	
	*	
	*	
	*	@param int $id is the id for an existing qgroup  
	*
	*	@param string/array $type is a string/array carrying definitive content
	*	used in affecting query value, usually for simple operations
	*
	*	@param array $data is an array carrying extra content.
	*	
	*	@return array $row is a multidimensional array that carries the results
	*	for the data retrieval based on id of the current qgroup, amongst others
	*	var_dump($row) would give a full list if necessary
	*
	*/
	function getSingleQuestionGroup($id,$type="",$data=array()){
		global $host_tpathplain;
		include($host_tpathplain.'globalsmodule.php');

		$row=array();
	  
	  	$query="SELECT * FROM qgroup WHERE id=$id";

	  	// for overriding the default query
		$queryoverride="";
		if(isset($data['single']['queryoverride'])&&$data['single']['queryoverride']!==""){
			$queryoverride=$data['single']['queryoverride'];
			$query="$queryoverride AND id='$id'";
			
		}


		// check to see if there already is a row index carrying the intended
		// for the current transaction 
		if(isset($data['single']['row'])&&$data['single']['row']!==""){
			$qdata['resultdata'][0]=$data['single']['row'];
			$qdata['numrows']=1;
			
		}else{
			$qdata=briefquery($query,__LINE__,"mysqli");
		}

		$numrows=$qdata['numrows'];
		$adminoutput='<tr><td colspan="100%">No entries found</td></tr>';
		
		// init important variable values pertaining to content in the $data array 
		
		$datamapout="";// caries the datamap for current operations
		$datamap="";

		$tdataoutput="";// carries the td dataoutput for the tr data cells 
		
		$formtruetype="edit_";// carries the name of the formtruetype

		$processroute=""; //carries the path to the process file for this function 

		$editroute=""; 
		$totalscripts="";
		$gc="";	
		$crmd5="";	
		$blockdeeprun="";

		// stops inclusion of the current file handling this function
		// in generating the edit table 
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

			// strictly for the current function, this section carries only non-generic
			// $data['single'] second level array index functions 

			
		}


		// variable for holding script elements for selection box values and other 
		// related data setup
		$selectionscripts="";
		
		if($numrows>0){

			$adminoutput="";

			for($i=0;$i<$numrows;$i++){

				$row=$qdata['resultdata'][$i];

				$id=$row['id'];
				$type=$row['type'];
				$mainid=$row['mainid'];
				$title=$row['title'];
				$acronym=$row['acronym'];
				$details=$row['details'];
				$seometakeywords=$row['seometakeywords'];
				$seometadescription=$row['seometadescription'];
				$status=$row['status'];
				
				$grouptype="hassubject";

				if($formtruetype!==""){
					$selectionscripts.='$("form[name='.$formtruetype.'] select[name=status]").val("'.$status.'");';

				}

				// check to see if the current entry has any subjects attached directly
				// to it
				$mq="SELECT * FROM qscentries WHERE qgid=$id AND status='active'";
				$mqrun=briefquery($mq,__LINE__,"mysqli");
				$row['qscdata']=array();
				$coursecount=$mqrun['numrows'];
				if($mqrun['numrows']>0){
					$row['qscdata']=$mqrun['resultdata'];
					for($tp=0;$tp<$mqrun['numrows'];$tp++){
						$t=$tp+1;
						if($formtruetype!==""){
							$selectionscripts.='$("form[name='.$formtruetype.'] select[name=qscstatus'.$t.']").val("'.$mqrun['resultdata'][$tp]['status'].'");';
						}
					}
				}
				$row['qscdata']['total']=$mqrun['numrows'];

				// if there are no direct subjects attached, check to see if there
				// are any subjects attached to its subgroup entries
				if($coursecount==0){
					$mq="SELECT * FROM qscentries WHERE id>0 AND status='active' 
					AND EXISTS(SELECT * FROM `cheet`.`qgroup` WHERE 
					`qgroup`.`mainid`=$id AND `qgroup`.`status`='active' AND
					`qgroup`.`id`=`qscentries`.`qgid`)";
					
					// block function from pulling any data, making it only get the total
					// number of rows available
					$mqdatarun['rr']=false;
					$mqrun=briefquery($mq,__LINE__,"mysqli","",$mqdatarun);
					
					$coursecount=$mqrun['numrows'];
				}

				// check if the current entry has subgroups

				$mq="SELECT * FROM qgroup WHERE mainid=$id AND type='sub' 
				AND status='active'";
				$mqrun=briefquery($mq,__LINE__,"mysqli");
				$row['subgroupdata']=array();
				$subgroupcount=$mqrun['numrows'];
				if($mqrun['numrows']>0){
					$grouptype="hassubgroup";
					$row['subgroupdata']=$mqrun['resultdata'];
					for($tp=0;$tp<$mqrun['numrows'];$tp++){
						$t=$tp+1;
						if($formtruetype!==""){
							$selectionscripts.='$("form[name='.$formtruetype.'] select[name=csstatus'.$t.']").val("'.$mqrun['resultdata'][$tp]['status'].'");';
						}
					}
				}
				$row['subgroupdata']['total']=$mqrun['numrows'];
				
				// create the grouptype of value
				$row['grouptype']=$grouptype;

				// id for the current element 
				$picid=$id;
				// check to see if the current entry has a parent element
				if($type=="sub"){
					$picid=$mainid;
					// echo $picid;
				}

				// get the cover image for the question group if any is available
				$mediaquery="SELECT * FROM media WHERE ownerid=$picid AND ownertype='qgroup' 
				AND maintype='coverphoto'";
				$mediarun=briefquery($mediaquery,__LINE__,"mysqli");
				// echo $mediaquery;

				if($mediarun['numrows']>0){
					$mediarow=$mediarun['resultdata'][0];
					$row['profpicdata']['location']=$host_addr.$mediarow['location'];
					$row['profpicdata']['medsize']=$host_addr.$mediarow['medsize'];
					$row['profpicdata']['thumbnail']=$host_addr.$mediarow['thumbnail'];
					$row['profpicdata']['id']=$mediarow['id'];

					$coverphoto='<a href="'.$host_addr.''.$mediarow['location'].'" 
									data-lightbox="cat'.$id.'" 
									data-src="'.$host_addr.''.$mediarow['location'].'">
									<img src="'.$host_addr.''.$mediarow['medsize'].'" 
									title="'.$title.'"/>
								</a>';
				}else{
					$row['profpicdata']['location']="";

					$row['profpicdata']['medsize']="";

					$row['profpicdata']['thumbnail']="";

					$row['profpicdata']['id']=0;

					$coverphoto='<i class="fa fa-file-image-o td-pag-fa"></i>';
				}

				// create the table data display
				if(isset($tdataoutput)){
					// perform replacement of '{variablename}'' values in the inputted
					// table data row string provided

				}

				// create the default table dat display if nothing prior was provided
				$tddataoutput=isset($tdataoutput)&&$tdataoutput!==""?$tdataoutput:'
		    		<td class="tdimg">'.$coverphoto.'</td>
		    		<td>'.$title.'</td>
		    		<td>'.$acronym.'</td>
		    		<td>'.$subgroupcount.'</td>
		    		<td>'.$coursecount.'</td>
		    		<td>'.$status.'</td>
					
					<td name="trcontrolpoint">
						<a href="#&id='.$id.'" name="edit" data-type="editgeneraldata" 
							data-divid="'.$id.'" '.$datamapout.'>
							Edit
						</a>
					</td>
				';
				
				$adminoutput.='
					<tr data-id="'.$id.'">
						'.$tddataoutput.'
					</tr>
					<tr name="tableeditcontainer" data-state="inactive" 
					data-divid="'.$id.'" '.$datamapout.'>
						<td colspan="100%">
							<div id="completeresultdisplay" 
							data-type="editmodal" 
							data-load="unloaded" 
							data-divid="'.$id.'">
								<div id="completeresultdisplaycontent" 
								data-type="editdisplay" data-divid="'.$id.'">
									
								</div>
							</div>
						</td>
					</tr>
				';
			}
		}

		$selectionscriptsout='<script>$(document).ready(function(){'.$selectionscripts.'});</script>';
		$row['datamapout']=$datamapout;

	  	$row['totalscripts']=$selectionscripts;
		$row['adminoutput']=$adminoutput;
		$initvar[0]="editid";
		$initvar[1]="viewtype";
		$initvar[2]="row";
		$initvar[3]="maintype2";
		$initval[0]=$id;
		$initval[1]="edit";
		$initval[2]=$row;
		$initval[3]="editqgroup";
		$row['adminoutputtwo']="";

		if($blockdeeprun==""){
			// $row['adminoutputtwo']=get_include_contents("../forms/blogmetadatas.php",$initvar,$initval);
		}

		// this array is used to remove sensitive data coloumns, if any, in the the 
		// retrieved data query value. 
		$trow=$row;
		// example removal 
		if(isset($trow['username'])){
			unset($trow['username']);
		}
		$row['catdata']=$trow;

		return $row;
	}

	function getAllQuestionGroups($viewer,$limit,$type="",$data=array()){
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


		// this section is legacy based to allow support for previous versions of the
		// pagination system. It also plays a major role for pagination in mobile apps
		// that request data via this function. The real action will occur in the 
		// api handler file

		$realoutputdata="";
		$mtype="";
		$addq="";
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

		// set the viewer type value for the single data retrieval function for
		// this current function
		$data['single']['viewer']=$viewer;

		// run through the data array and obtain only the 'single' index
		// of it. This index flows into the single data retrieval version
		// of the current function.
		$singletype="";
		if(isset($data['single']['type'])&&$data['single']['type']!==""){
			$singletype=$data['single']['type'];
		}

		// the 'pagpath' variable defines the current file name/path for the form file 
		// handling the data display for the current function if its within a path,
		// this path must be in the '$ROOT/snippets/forms' folder
		$pagpath="appforms/qgroups.php"; 
		if(isset($data['pagpath'])&&$data['pagpath']!==""){
			$pagpath=$data['pagpath'];	
		}

		// the 'pagtype' variable defines the title for the current functions 
		// pagination
		$pagtype="qgroup";
		if(isset($data['pagtype'])&&$data['pagtype']!==""){
			$pagtype=$data['pagtype'];	
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

		// the 'viewerdata' index and variable carry a sql query
		// part that plays into the final data retrieval query string,
		// the variable/ index is used to define a compulsory
		// portion of the base query. 
		// Instances for its use involve situations
		// where only the data function has to pull only a subset of a larger
		// set of values by default.
		$viewerdata="WHERE type='main'";
		if(isset($data['viewerdata'])&&$data['viewerdata']!==""){
			$viewerdata=$data['viewerdata'];
		}

		// this section is for attaching data to the viewerdata element
		// according to the $viewer parameter value i.e 'admin','viewer'
		if(isset($data['viewerdatasubq'])&&$data['viewerdatasubq']!==""){
			$viewerdata=$viewerdata.$data['viewerdatasubq'];
		}else{
			$viewerdata=$viewer=="viewer"?$viewerdata." AND status='active'":$viewerdata;
		}

		
		$outputtype="generalpages|qgroup|".$viewer;
		$queryoverride="";
		$queryextra="";
		$ordercontent="order by id desc";
		$qcat=$viewer=="admin"?"WHERE":"AND";
		$qcat="AND";
		

		// query order 
		if(isset($data['queryorder'])&&$data['queryorder']!==""){
			$ordercontent=$data['queryorder'];
		}

		
		// completely overrides the default query 
		if(isset($data['queryoverride'])&&$data['queryoverride']!==""){
			$queryoverride=$data['queryoverride'];
		}

		// chec to see if extra query data are to be appended
		if(isset($data['queryextra'])&&str_replace(" ", "", $data['queryextra'])!==""){
			if($queryextra==""){
				$queryextra.=" $qcat ".$data['queryextra']." $addq";
			}else{
				$queryextra.=" AND ".$data['queryextra']." $addq";
			}
		}


		/*** MAIN DATA FUNCTION QUERY SECTION***/
		$query="SELECT * FROM qgroup $viewerdata $queryextra $ordercontent ".$limit."";
		$rowmonitor['chiefquery']="SELECT * FROM qgroup $viewerdata $queryextra 
		$ordercontent";
		/*** END MAIN DATA FUNCTION QUERY SECTION***/
		
		// echo $query;

		// override default query if necessary
		if($queryoverride!==""){
			$query="$queryoverride $queryextra $ordercontent $limit";
			$rowmonitor['chiefquery']="$queryoverride $queryextra $ordercontent";
		}

		// variable for holding script elements for selection box values and other 
		// related data setup
		$selectionscripts="";
		$selection="";
		$selectiontwo="";
		
		// unique hash per data transaction call
		$rmd5=md5($rowmonitor['chiefquery'].date("Y-m-d H:i:s"));

		// create a $data array single index entry for the rmd5 hash
		if(!isset($data['single']['rmd5'])){
			$data['single']['rmd5']=$rmd5;
		}

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
			$_SESSION['generalpagesdata']["$rmd5"]['pagpath']="forms/$pagpath";

			// set the pagintation type variable which helps differentiate what to be
			// paginated in the case of single 'form' file handling serving 
			// several modules
			$_SESSION['generalpagesdata']["$rmd5"]['pagtype']="$pagtype";

			// use the 'cq' session index to secure this query
			$_SESSION['cq']["$rmd5"]=$rowmonitor['chiefquery'];

			/*This section is for indexes that are specific to the current function*/

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
		
		$run=mysqli_query($host_connli,$query)or 
		die(mysqli_error($host_connli)." Line ".__LINE__);
		$numrows=mysqli_num_rows($run);

		$adminoutput='<tr><td colspan="100%">No entries found</td></tr>';

		$catdata=array();

		if($numrows>0){

			$adminoutput='';

			while($row=mysqli_fetch_assoc($run)){

				$data['row']=$row;

				$outvartwo=getSingleQuestionGroup($row['id'],$singletype,$data);

				$datamapout=$outvartwo['datamapout'];

				$catdata[]=$outvartwo['catdata'];

				$totalscripts.=$outvartwo['totalscripts'];

				$selectiondata.='<option value="'.$outvartwo['id'].'">
				'.$outvartwo['title'].'</option>';

				// generate result dataset for the current functions output
				// but in this instance manipulate its content based on the 
				// the presence and corresponding value of a $data array index
				// 'grouptypedata'. This index is only present when a search is carried
				// out in the search section of the handler file for this function
				if(isset($data['grouptypedata'])&&$data['grouptypedata']!==""){

					// only add new data if they satisfy the condition
					// of having sub groups
					if($data['grouptypedata']=="hassubgroup"&&
						$outvartwo['grouptype']=="hassubgroup"){
						// echo " grouptypedata here";
						$adminoutput.=$outvartwo['adminoutput'];
						$row['resultdataset'][]=$outvartwo;
						// reduce the total number of rows as needed
						$numrows--;
					}

				}else{
					// this section means that everything should be done as needed
					$adminoutput.=$outvartwo['adminoutput'];
					$row['resultdataset'][]=$outvartwo;
					
				}
			}
		}

		// return the query, only for tests with Ajax json 
		$row['cqtdata']=$query;


		/* PREPARE UTPUT CONTENT DATA SECTION*/
		$outs=paginatejavascript($numrows);

		$row['selectiondata']=$selectiondata;

		$row['chiefquery']=$rowmonitor['chiefquery'];

		$row['num_pages']=$outs['num_pages'];

		$row['paginatedata']=$outs;

		$top='<table id="resultcontenttable" cellspacing="0">
				<thead><tr>
				<th>CoverPhoto</th>
				<th>Title</th>
				<th>Acronym</th>
				<th>SubGroups</th>
				<th>Courses</th>
				<th>Status</th>
				<th>View/Edit</th>
				</tr></thead>
				<tbody>';

		$bottom='	</tbody>
				</table>';

		$paginatetop='

		<div id="paginationhold">

			<div class="meneame">
				<input type="hidden" name="curquery" value="'.$rmd5.'"/>
				<input type="hidden" name="outputtype" value="'.$outputtype.'|'.$realoutputdata.'"/>
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

		$row['numrows']=$numrows;

		//define the nature of the current output;

		$row['outputtype']=$realoutputdata;

		$row['catdata']=$catdata;

		$row['resultdataset']=$catdata;

		$row['genericout']=$pcoutput!==""?$row[''.$pcoutput.'']:$row['adminoutput'];

		$row['genericouttwo']=$subpcoutput!==""?$row[''.$subpcoutput.'']:
		$row['adminoutputtwo'];


		return $row;
	}


	/**
	*	@see getSingleQuestionEntry() 
	*	
	*	@todo this function gets a single question entry(qentries) based on id  
	*	from the 'questions' database table, obtains other information related to
	*	that questiongroup as well, such as attached subjects.  
	*	
	*	
	*	
	*	@param int $id is the id for an existing qgroup  
	*
	*	@param string/array $type is a string/array carrying definitive content
	*	used in affecting query value, usually for simple operations
	*
	*	@param array $data is an array carrying extra content.
	*	
	*	@return array $row is a multidimensional array that carries the results
	*	for the data retrieval 
	*
	*/
	function getSingleQuestionEntry($id,$type="",$data=array()){
		global $host_tpathplain;
		include($host_tpathplain.'globalsmodule.php');

		$row=array();
	  
	  	$query="SELECT * FROM questions WHERE id=$id";

	  	// for overriding the default query
		$queryoverride="";
		if(isset($data['single']['queryoverride'])&&$data['single']['queryoverride']!==""){
			$queryoverride=$data['single']['queryoverride'];
			$query="$queryoverride AND id='$id'";
			
		}


		// check to see if there already is a row index carrying the intended data
		// for the current transaction 
		if(isset($data['single']['row'])&&$data['single']['row']!==""){
			$qdata['resultdata'][0]=$data['single']['row'];
			$qdata['numrows']=1;
			
		}else{
			$qdata=briefquery($query,__LINE__,"mysqli");
		}

		$numrows=$qdata['numrows'];
		$adminoutput='<tr><td colspan="100%">No entries found</td></tr>';
		
		// init important variable values pertaining to content in the $data array 
		
		$datamapout="";// caries the datamap for current operations
		$datamap="";

		$tdataoutput="";// carries the td dataoutput for the tr data cells 
		
		$formtruetype="edit_";// carries the name of the formtruetype

		$processroute=""; //carries the path to the process file for this function 

		$editroute=""; 
		$totalscripts="";
		$gc="";	
		$crmd5="";	
		$blockdeeprun="";

		// stops inclusion of the current file handling this function
		// in generating the edit table 
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

			// strictly for the current function, this section carries only non-generic
			// $data['single'] second level array index functions 

			
		}


		// variable for holding script elements for selection box values and other 
		// related data setup
		$selectionscripts="";
		
		if($numrows>0){

			$adminoutput="";

			for($i=0;$i<$numrows;$i++){

				$row=$qdata['resultdata'][$i];

				$id=$row['id'];
				$qgid=$row['qgid'];
				$scid=$row['scid'];
				$qdate=$row['qdate'];
				list($year,$month,$day)=explode("-", $qdate);
				$duration=$row['duration'];
				$qetype=$row['qetype'];
				$qdatatype=$row['qdatatype'];
				$totalobj=$row['totalobj'];
				$totaltheory=$row['totaltheory'];
				$totalobjscore=$row['totalobjscore'];
				$totaltheoryscore=$row['totaltheoryscore'];
				$objinfo=$row['objinfo'];
				$theoryinfo=$row['theoryinfo'];
				$status=$row['status'];
				
				 
				// set the value of select fields in the edit form
				if($formtruetype!==""){
					$selectionscripts.='$("form[name='.$formtruetype.'] select[name=qgroupset]").val("'.$qgid.'");';
					$selectionscripts.='$("form[name='.$formtruetype.'] select[name=course]").val("'.$scid.'");';
					$selectionscripts.='$("form[name='.$formtruetype.'] select[name=qentrytype]").val("'.$qetype.'");';
					$selectionscripts.='$("form[name='.$formtruetype.'] select[name=qdatatype]").val("'.$qdatatype.'");';
					$selectionscripts.='$("form[name='.$formtruetype.'] select[name=status]").val("'.$status.'");';

				}

				// pull question group data
				$qgdata=getSingleQuestionGroup($qgid);
				$row['profpicdata']=$qgdata['profpicdata'];

				if($row['profpicdata']['id']>0){

					$coverphoto='<a href="'.$row['profpicdata']['location'].'" 
									data-lightbox="cat'.$id.'" 
									data-src="'.$row['profpicdata']['location'].'">
									<img src="'.$row['profpicdata']['medsize'].'" 
									title="'.$qgdata['title'].'"/>
								</a>';
				}else{
					$coverphoto='<i class="fa fa-file-image-o td-pag-fa"></i>';
				}

				// get the current course list
				$select="";
				$curcourse="";
				if($qgdata['qscdata']['total']>0){
					for ($i=1; $i <=$qgdata['qscdata']['total']; $i++) { 
						$n=$i-1;
						$cdata=$qgdata['qscdata'][$n];
						$curcourse=$cdata['id']==$scid?$cdata['title']:$curcourse;
						$select.='<option value="'.$cdata['id'].'"
						>'.$cdata['title'].'</option>';
					}
				}

				$row['courselist']=$select;

				// parse the obj json data

				$row['pdobj']=json_decode($totalobj,true);
				$row['pdtheory']=json_decode($totaltheory,true);

				// create the selection script values for the obj and theory data sections
				// and perform media data retrieval for the options
				$pdobj=$row['pdobj'];
				$pdtheory=$row['pdtheory'];
				$row['qmediadata']['numrows']=0;
				$row['qmanswerdata']['numrows']=0;
				if($qdatatype=="media"){
					if($pdobj['totalnumber']>0){
						for ($i=0; $i < $pdobj['totalnumber']; $i++) { 
							# code...
							$j=$i+1;
							$cobj=$pdobj[$i]["options"];

							// add the selection script data
							if($cobj[1]!==""){
								$selectionscripts.='$("form[name='.$formtruetype.'] select[name=qmediaobjans'.$j.']").val("'.$cobj[1].'");';
							}
						}
					}
					
					// check the media table for uploaded past questions images
					$mediaquery="SELECT * FROM media WHERE ownerid=$id AND 
					ownertype='qentry' AND maintype='qimage'";
					$mediarun=briefquery($mediaquery,__LINE__,"mysqli");
					$row['qmediadata']=$mediarun;

					// check the media table for uploaded model answer images
					$mediaquery="SELECT * FROM media WHERE ownerid=$id AND 
					ownertype='qentry' AND maintype='qmanswer'";
					$mediarun=briefquery($mediaquery,__LINE__,"mysqli");
					$row['qmanswerdata']=$mediarun;


				}else if($qdatatype=="plain"){
					if($pdobj['totalnumber']>0){
						for ($i=0; $i < $pdobj['totalnumber']; $i++) { 
							# code...
							$j=$i+1;
							$cobj=$pdobj[$i]["options"];
							
							// search for attached media on the options
							
							// add the selection script data
							if($cobj[1]!==""){
								$selectionscripts.='$("form[name='.$formtruetype.'] select[name=answer'.$j.']").val("'.$cobj[1].'");';
							}
						}
					}
				}

				// check and perform sata operaions if the question entry type 

				// create the table data display
				if(isset($tdataoutput)){
					// perform replacement of '{variablename}'' values in the inputted
					// table data row string provided

				}

				// create the default table data display if nothing prior was provided
				$tddataoutput=isset($tdataoutput)&&$tdataoutput!==""?$tdataoutput:'
		    		<td class="tdimg">'.$coverphoto.'</td>
		    		<td>'.$qgdata['title'].'</td>
		    		<td>'.$curcourse.'</td>
		    		<td>'.$year.'</td>
		    		<td>'.$qdatatype.'</td>
		    		<td>'.$qetype.'</td>
		    		<td>'.$status.'</td>
					
					<td name="trcontrolpoint">
						<a href="#&id='.$id.'" name="edit" data-type="editgeneraldata" 
							data-divid="'.$id.'" '.$datamapout.'>
							Edit
						</a>
					</td>
				';
				
				$adminoutput.='
					<tr data-id="'.$id.'">
						'.$tddataoutput.'
					</tr>
					<tr name="tableeditcontainer" data-state="inactive" 
					data-divid="'.$id.'" '.$datamapout.'>
						<td colspan="100%">
							<div id="completeresultdisplay" 
							data-type="editmodal" 
							data-load="unloaded" 
							data-divid="'.$id.'">
								<div id="completeresultdisplaycontent" 
								data-type="editdisplay" data-divid="'.$id.'">
									
								</div>
							</div>
						</td>
					</tr>
				';
			}
		}

		$selectionscriptsout='<script>$(document).ready(function(){'.$selectionscripts.'});</script>';
		$row['datamapout']=$datamapout;

	  	$row['totalscripts']=$selectionscripts;
		$row['adminoutput']=$adminoutput;
		$initvar[0]="editid";
		$initvar[1]="viewtype";
		$initvar[2]="row";
		$initvar[3]="maintype2";
		$initval[0]=$id;
		$initval[1]="edit";
		$initval[2]=$row;
		$initval[3]="editqgroup";
		$row['adminoutputtwo']="";

		if($blockdeeprun==""){
			// $row['adminoutputtwo']=get_include_contents("../forms/blogmetadatas.php",$initvar,$initval);
		}

		// this array is used to remove sensitive data coloumns, if any, in the the 
		// retrieved data query value. 
		$trow=$row;
		// example removal 
		/*if(isset($trow['username'])){
			unset($trow['username']);
		}*/
		$row['catdata']=$trow;

		return $row;
	}

	function getAllQuestionEntries($viewer,$limit,$type="",$data=array()){
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


		// this section is legacy based to allow support for previous versions of the
		// pagination system. It also plays a major role for pagination in mobile apps
		// that request data via this function. The real action will occur in the 
		// api handler file

		$realoutputdata="";
		$mtype="";
		$addq="";
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

		// set the viewer type value for the single data retrieval function for
		// this current function
		$data['single']['viewer']=$viewer;

		// run through the data array and obtain only the 'single' index
		// of it. This index flows into the single data retrieval version
		// of the current function.
		$singletype="";
		if(isset($data['single']['type'])&&$data['single']['type']!==""){
			$singletype=$data['single']['type'];
		}

		// the 'pagpath' variable defines the current file name/path for the form file 
		// handling the data display for the current function if its within a path,
		// this path must be in the '$ROOT/snippets/forms' folder
		$pagpath="appforms/qentries.php"; 
		if(isset($data['pagpath'])&&$data['pagpath']!==""){
			$pagpath=$data['pagpath'];	
		}

		// the 'pagtype' variable defines the title for the current functions 
		// pagination
		$pagtype="qentries";
		if(isset($data['pagtype'])&&$data['pagtype']!==""){
			$pagtype=$data['pagtype'];	
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

		// the 'viewerdata' index and variable carry a sql query
		// part that plays into the final data retrieval query string,
		// the variable/ index is used to define a compulsory
		// portion of the base query. 
		// Instances for its use involve situations
		// where only the data function has to pull only a subset of a larger
		// set of values by default.
		$viewerdata="";
		if(isset($data['viewerdata'])&&$data['viewerdata']!==""){
			$viewerdata=$data['viewerdata'];
		}

		// this section is for attaching data to the viewerdata element
		// according to the $viewer parameter value i.e 'admin','viewer'
		if(isset($data['viewerdatasubq'])&&$data['viewerdatasubq']!==""){
			$viewerdata=$viewerdata.$data['viewerdatasubq'];
		}else{
			$viewerdata=$viewer=="viewer"?$viewerdata." AND status='active'":$viewerdata;
		}

		
		$outputtype="generalpages|qentries|".$viewer;
		$queryoverride="";
		$queryextra="";
		$ordercontent="order by id desc";
		$qcat=$viewer=="admin"?"WHERE":"AND";
		// $qcat="AND";
		

		// query order 
		if(isset($data['queryorder'])&&$data['queryorder']!==""){
			$ordercontent=$data['queryorder'];
		}

		
		// completely overrides the default query 
		if(isset($data['queryoverride'])&&$data['queryoverride']!==""){
			$queryoverride=$data['queryoverride'];
		}

		// chec to see if extra query data are to be appended
		if(isset($data['queryextra'])&&str_replace(" ", "", $data['queryextra'])!==""){
			if($queryextra==""){
				$queryextra.=" $qcat ".$data['queryextra']." $addq";
			}else{
				$queryextra.=" AND ".$data['queryextra']." $addq";
			}
		}


		/*** MAIN DATA FUNCTION QUERY SECTION***/
		$query="SELECT * FROM questions $viewerdata $queryextra $ordercontent ".$limit."";
		$rowmonitor['chiefquery']="SELECT * FROM questions $viewerdata $queryextra 
		$ordercontent";
		/*** END MAIN DATA FUNCTION QUERY SECTION***/
		
		// echo $query;

		// override default query if necessary
		if($queryoverride!==""){
			$query="$queryoverride $queryextra $ordercontent $limit";
			$rowmonitor['chiefquery']="$queryoverride $queryextra $ordercontent";
		}

		// variable for holding script elements for selection box values and other 
		// related data setup
		$selectionscripts="";
		$selection="";
		$selectiontwo="";
		
		// unique hash per data transaction call
		$rmd5=md5($rowmonitor['chiefquery'].date("Y-m-d H:i:s"));

		// create a $data array single index entry for the rmd5 hash
		if(!isset($data['single']['rmd5'])){
			$data['single']['rmd5']=$rmd5;
		}

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
			$_SESSION['generalpagesdata']["$rmd5"]['pagpath']="forms/$pagpath";

			// set the pagintation type variable which helps differentiate what to be
			// paginated in the case of single 'form' file handling serving 
			// several modules
			$_SESSION['generalpagesdata']["$rmd5"]['pagtype']="$pagtype";

			// use the 'cq' session index to secure this query
			$_SESSION['cq']["$rmd5"]=$rowmonitor['chiefquery'];

			/*This section is for indexes that are specific to the current function*/

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
		
		$run=mysqli_query($host_connli,$query)or 
		die(mysqli_error($host_connli)." Line ".__LINE__);
		$numrows=mysqli_num_rows($run);

		$adminoutput='<tr><td colspan="100%">No entries found</td></tr>';

		$catdata=array();

		if($numrows>0){

			$adminoutput='';

			while($row=mysqli_fetch_assoc($run)){

				$data['row']=$row;

				$outvartwo=getSingleQuestionEntry($row['id'],$singletype,$data);

				$datamapout=$outvartwo['datamapout'];

				$catdata[]=$outvartwo['catdata'];

				$totalscripts.=$outvartwo['totalscripts'];

				$selectiondata.='<option value="'.$outvartwo['id'].'">
				'.$outvartwo['title'].'</option>';

				// this section means that everything should be done as needed
				$adminoutput.=$outvartwo['adminoutput'];
				$row['resultdataset'][]=$outvartwo;
			}
		}

		// return the query, only for tests with Ajax json 
		$row['cqtdata']=$query;


		/* PREPARE OUTPUT CONTENT DATA SECTION*/
		$outs=paginatejavascript($numrows);

		$row['selectiondata']=$selectiondata;

		$row['chiefquery']=$rowmonitor['chiefquery'];

		$row['num_pages']=$outs['num_pages'];

		$row['paginatedata']=$outs;

		$top='<table id="resultcontenttable" cellspacing="0">
				<thead><tr>
				<th>CoverPhoto</th>
				<th>QGroup</th>
				<th>Course</th>
				<th>Year</th>
				<th>Data Type</th>
				<th>Entry Type</th>
				<th>Status</th>
				<th>View/Edit</th>
				</tr></thead>
				<tbody>';

		$bottom='	</tbody>
				</table>';

		$paginatetop='

		<div id="paginationhold">

			<div class="meneame">
				<input type="hidden" name="curquery" value="'.$rmd5.'"/>
				<input type="hidden" name="outputtype" value="'.$outputtype.'|'.$realoutputdata.'"/>
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

		$row['numrows']=$numrows;

		//define the nature of the current output;

		$row['outputtype']=$realoutputdata;

		$row['catdata']=$catdata;

		$row['resultdataset']=$catdata;

		$row['genericout']=$pcoutput!==""?$row[''.$pcoutput.'']:$row['adminoutput'];

		$row['genericouttwo']=$subpcoutput!==""?$row[''.$subpcoutput.'']:
		$row['adminoutputtwo'];


		return $row;
	}

?>