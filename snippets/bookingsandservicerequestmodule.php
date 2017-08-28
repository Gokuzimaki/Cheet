<?php
/* This module acts as a function based interface between the 'bookings' and
 	'servicerequest' table in the database and the application being developed.
	The functions return arrays containing data from the database, for pagination
	at the admin end and front end display where possible
*/

/**
 * Goes through the servicerequest table using a single integer id.
 *
 * @param integer $serviceid the id of a valid service request table entry
 *
 * @return array[] comprises result set of matched row content, 
 * paginated content displays
*/
function getSingleServiceRequest($serviceid){
	include 'globalsmodule.php';
  $row=array();
  $query="SELECT * FROM servicerequest WHERE id=$serviceid";
  $run=mysql_query($query)or die(mysql_error()." Line 4033");
  $row=mysql_fetch_assoc($run);
  $id=$row['id'];
  $fullname=$row['name'];
  $orgname=$row['organizationname'];
  $team=$row['team'];
  $eventtype=$row['eventtype'];
  $startdate=$row['startdateperiod'];
  $enddate=$row['enddateperiod'];
  $participants=$row['expectedattendance'];
  $phoneone=$row['phoneone'];
  $phonetwo=$row['phonetwo'];
  $venue=$row['venue'];
  $extrainfo=$row['extrainfo'];
  $date=$row['datetime'];

  /*$monitorlength=strlen($testimony);
  $testimonyout=$testimony;
  if($monitorlength>140){
  $testimonyout=substr($testimonyout,0,137);
  $testimonyout=$testimonyout."...";
  }*/
  $status=$row['status'];
  $row['adminoutput']='
  <tr data-id="'.$id.'">
   <td>'.$fullname.'</td><td>'.$startdate.'</td><td>'.$enddate.'</td><td>'.$eventtype.'</td><td>'.$participants.'</td><td>'.$phoneone.'</td><td>'.$date.'</td><td name="servicestatus'.$id.'">'.$status.'</td><td name="trcontrolpoint"><a href="#&id='.$id.'" name="editsingleservicerequest" data-type="editsingleservicerequest" data-divid="'.$id.'">Edit</a></td>
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
   <div id="formend">
  <div id="elementholder">
   <b>Fullname:</b> '.$fullname.'<br>
   <b>Organisation Name:</b> '.$orgname.'<br>
   <b>Team:</b> '.$team.'<br>
  </div>
  <div id="elementholder">
   <b>Event Type:</b> '.$eventtype.'<br>
   <b>Start Period:</b> '.$startdate.'<br>
   <b>End Period:</b> '.$enddate.'<br>
  </div>
  <div id="elementholder">
   <b>Expected Attendance:</b> '.$participants.'<br>
   <b>Phone One:</b> '.$phoneone.'<br>
   <b>Phone Two:</b> '.$phonetwo.'<br>
  </div>
   </div>
   <div id="formend">
   <font style="font-size:18px;font-weight:bold;">Venue</font><br>
  <p align="left">'.$venue.'</p>
   </div>
  <div id="formend">
   <font style="font-size:18px;font-weight:bold;">Additional Information</font><br>
  <p align="left">'.$extrainfo.'</p>
  </div>
  </div>
  ';
  return $row;
} 

/**
 * Goes through the servicerequest table to present limit controlled data information.
 *
 * @param string $viewer the type of viewer, values are either 'admin' or 'viewer'
 * @param string $limit the limit of results to be produced by the query value='LIMIT 0,15'
 *
 * @return array[] comprises result set of matched row content, 
 * paginated content displays
*/
function getAllServiceRequests($viewer,$limit){
  $testit=strpos($limit,"-");
  $testit===0||$testit==0||$testit===true||$testit>0?$limit="":$limit=$limit;
  if($limit==""&&$viewer=="admin"){
  $query="SELECT * FROM servicerequest ORDER BY id,status DESC LIMIT 0,15";
  $rowmonitor['chiefquery']="SELECT * FROM servicerequest ORDER BY id,status DESC";
  }elseif($limit!==""&&$viewer=="admin"){
  $query="SELECT * FROM servicerequest ORDER BY id,status DESC $limit";
  $rowmonitor['chiefquery']="SELECT * FROM servicerequest ORDER BY id DESC";
  }/*elseif($viewer=="viewer"){
  $query="SELECT * FROM servicerequest WHERE status='active' ORDER BY id DESC LIMIT 0,10";
  $rowmonitor['chiefquery']="SELECT * FROM servicerequest WHERE status='active'"; 
  }*/
  // echo $query;
  $run=mysql_query($query)or die(mysql_error()." Line 3894");
  $numrows=mysql_num_rows($run);
  $adminoutput="<td colspan=\"100%\">No entries</td>";
  $adminoutputtwo="";
  /*$vieweroutput='<font color="#fefefe">No testimonies have been shared yet, share yours today</font>';
  $vieweroutputtwo='<font color="#fefefe">No testimonies have been shared yet, share yours today</font>';*/
  if($numrows>0){
  $adminoutput="";
  $adminoutputtwo="";
  $vieweroutput="";
  $vieweroutputtwo="";

  while($row=mysql_fetch_assoc($run)){
  $outs=getSingleServiceRequest($row['id']);
  $adminoutput.=$outs['adminoutput'];
  $adminoutputtwo.=$outs['adminoutputtwo'];
  /*$vieweroutput.=$outs['vieweroutput'];
  $vieweroutputtwo.=$outs['vieweroutputtwo'];*/
  }

  }
  $top='<table id="resultcontenttable" cellspacing="0">
   <thead><tr><th>Name</th><th>From</th><th>End Date</th><th>EventType</th><th>ParticipantNo</th><th>ContactNo</th><th>Date</th><th>status</th><th>View/Edit</th></tr></thead>
   <tbody>';
  $bottom=' </tbody>
   </table>';
   $row['chiefquery']=$rowmonitor['chiefquery'];
  $outs=paginatejavascript($rowmonitor['chiefquery']);
  $outsviewer=paginate($rowmonitor['chiefquery']);
  $paginatetop='
  <div id="paginationhold">
   <div class="meneame">
   <input type="hidden" name="curquery" value="'.$rowmonitor['chiefquery'].'"/>
   <input type="hidden" name="outputtype" value="servicerequests"/>
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
  /*$row['vieweroutput']=$vieweroutput;
  $row['vieweroutputtwo']=$vieweroutputtwo;*/

  return $row;
}
/**
 * Minify the data & (optionally) saves it to a file.
 *
 * @param integer $bookingid the id of a valid bookings table entru
 *
 * @return array[] comprises result set of matched row content, 
 * paginated content displays
*/
function getSingleBooking($bookingid){
  include 'globalsmodule.php';
  $row=array();
  $query="SELECT * FROM bookings WHERE id=$bookingid";
  $run=mysql_query($query)or die(mysql_error()." Line ".__LINE__);
  $row=mysql_fetch_assoc($run);
  $id=$row['id'];
  $fullname=$row['orgname'];
  $orgaddress=$row['orgaddress'];
  $themetitle=$row['themetitle'];
  $contact=$row['contactperson'];
  $participants=$row['eattendance'];
  $eventtype=$row['eventtype'];
  $language=$row['language'];
  $startdate=$row['eventstart'];
  $enddate=$row['eventstop'];
  $phoneone=$row['phoneone'];
  $phonetwo=$row['phonetwo'];
  $email=$row['email'];
  $extrainfo=$row['additionalinfo'];
  $date=$row['datetime'];
  $status=$row['status'];
  $row['adminoutputtwo']='
  <div id="form" style="background-color:#fefefe;">
   <div id="formend">
  <div id="elementholder">
   <b>Theme/Title:</b> '.$themetitle.'<br>
   <b>Organisation Name:</b> '.$fullname.'<br>
   <b>Organisation Address:</b> '.$orgaddress.'<br>
   <b>Contact Person:</b> '.$contact.'<br>
   <b>Email:</b> '.$email.'<br>
  </div>
  <div id="elementholder">
   <b>Event Type:</b> '.$eventtype.'<br>
   <b>Language:</b> '.$language.'<br>
   <b>Start Period:</b> '.$startdate.'<br>
   <b>End Period:</b> '.$enddate.'<br>
  </div>
  <div id="elementholder">
   <b>Expected Attendance:</b> '.$participants.'<br>
   <b>Phone One:</b> '.$phoneone.'<br>
   <b>Phone Two:</b> '.$phonetwo.'<br>
  </div>
   </div>
  <div id="formend">
   <font style="font-size:18px;font-weight:bold;">Additional Information</font><br>
  <p align="left">'.$extrainfo.'</p>
  </div>
  </div>
  ';
  $status=$row['status'];
  $row['adminoutput']='
  <tr data-id="'.$id.'">
   <td>'.$fullname.'</td><td>'.$startdate.'</td><td>'.$enddate.'</td><td>'.$eventtype.'</td><td>'.$language.'</td><td>'.$participants.'</td><td>'.$phoneone.'</td><td>'.$date.'</td><td name="bookingstatus'.$id.'">'.$status.'</td><td name="trcontrolpoint"><a href="#&id='.$id.'" name="editsinglebooking" data-type="editsinglebooking" data-divid="'.$id.'">Edit</a></td>
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

function getAllBookings($viewer,$limit){
  $testit=strpos($limit,"-");
  $testit!==false?$limit="":$limit=$limit;
  if($limit==""&&$viewer=="admin"){
  $query="SELECT * FROM bookings ORDER BY id DESC LIMIT 0,15";
  $rowmonitor['chiefquery']="SELECT * FROM bookings ORDER BY id DESC";
  }elseif($limit!==""&&$viewer=="admin"){
  $query="SELECT * FROM bookings ORDER BY id,status DESC $limit";
  $rowmonitor['chiefquery']="SELECT * FROM bookings ORDER BY id DESC";
  }
  // echo $query;
  $run=mysql_query($query)or die(mysql_error()." Line ".__LINE__);
  $numrows=mysql_num_rows($run);
  $adminoutput="<td colspan=\"100%\">No entries</td>";
  $adminoutputtwo="";
  if($numrows>0){
	  $adminoutput="";
	  $adminoutputtwo="";
	  $vieweroutput="";
	  $vieweroutputtwo="";

	  while($row=mysql_fetch_assoc($run)){
		  $outs=getSingleBooking($row['id']);
		  $adminoutput.=$outs['adminoutput'];
		  $adminoutputtwo.=$outs['adminoutputtwo'];
		  
	  }

  }
  $top='<table id="resultcontenttable" cellspacing="0">
   <thead><tr><th>OrganisationName</th><th>From</th><th>End Date</th><th>EventType</th><th>Language</th><th>ParticipantNo</th><th>ContactNo</th><th>Date</th><th>status</th><th>View/Edit</th></tr></thead>
   <tbody>';
  $bottom=' </tbody>
   </table>';
   $row['chiefquery']=$rowmonitor['chiefquery'];
  $outs=paginatejavascript($rowmonitor['chiefquery']);
  $outsviewer=paginate($rowmonitor['chiefquery']);
  $paginatetop='
  <div id="paginationhold">
   <div class="meneame">
   <input type="hidden" name="curquery" value="'.$rowmonitor['chiefquery'].'"/>
   <input type="hidden" name="outputtype" value="bookings"/>
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

  return $row;
}
?>