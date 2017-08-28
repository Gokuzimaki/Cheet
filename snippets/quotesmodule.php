<?php
	// this module acts as an interface between the 'qotd' table and the application
	// being developed
	// The functions return arrays containing data from the database, for pagination
	// at the admin end and front end display where possible
	
	/**
	 * Goes through the qotd table using a single integer id as the primary reference.
	 *
	 * @param integer $serviceid the id of a valid service request table entry
	 *
	 * @return array[] comprises result set of matched row content, 
	 * paginated content displays
	*/
	function getSingleQuote($quoteid){
		include('globalsmodule.php');
		$row=array();
		$query="SELECT * FROM qotd WHERE id=$quoteid";
		$run=mysql_query($query)or die(mysql_error()." Line 2509");
		$row=mysql_fetch_assoc($run);
		$id=$row['id'];
		$type=$row['type'];
		$typeout="Unknown";
		if($type=="general"){
		$typeout="General";
		}elseif ($type=="pfn") {
			# code...
		$typeout="Project Fix Nigeria";
		}elseif ($type=="csi") {
		# code...
		$typeout="Christ Society International";
		}
		$quote=$row['quote'];
		$status=$row['status'];
		// check the database for media image
		$mediaquery="SELECT * FROM media WHERE ownerid=$quoteid AND ownertype='qotd' AND maintype='coverphoto' AND status='active' ORDER BY id DESC";
		$mediarun=mysql_query($mediaquery)or die(mysql_error()." Line 2846");
		$coverdata=mysql_fetch_assoc($mediarun);
		$coverphoto=$coverdata['location'];
		$fid=$coverdata['id'];
		$bid=0;
		$medianumrows=mysql_num_rows($mediarun);
		if($medianumrows<1){
		$coverphoto="".$host_addr."images/csiimages/macsi.jpg";
		$fid=0;
		$bid=0;
		}else{

		$coverphoto=''.$host_addr.''.$coverphoto.'';
		}
		// $quotedperson=$row['quotedperson'];
		$row['quotedperson']==""?$quotedperson="Muyiwa Afolabi":$quotedperson=$row['quotedperson'];
		$row['adminoutput']='
		<tr data-id="'.$id.'">
			<td class="tdimg"><img src="'.$coverphoto.'"/></td><td>'.$typeout.'</td><td>'.$quote.'</td><td>'.$quotedperson.'</td><td>'.$status.'</td><td name="trcontrolpoint"><a href="#&id='.$id.'" name="edit" data-type="editsingleqotd" data-divid="'.$id.'">Edit</a></td>
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
						<form action="../snippets/edit.php" name="editqotd" method="post" enctype="multipart/form-data">
							<input type="hidden" name="entryvariant" value="editqotd"/>
		        <input type="hidden" name="entryid" value="'.$id.'"/>
		        <input type="hidden" name="coverid" value="'.$fid.'"/>
							<input type="hidden" name="bannerid" value="'.$bid.'"/>
							<div id="formheader">Edit '.$quotedperson.'\'s Quote</div>
							<div id="formend">
							Quotetype *<br>
							<select name="quotetype" class="curved2">
								<option value="">--Choose--</option>
								<option value="general">General</option>
		          <option value="pfn">Project Fix Nigeria</option>
		          <option value="csi">CSI Outreach</option>
							</select>
							</div>
							<div id="formend">
									Quoted Person<br>
									<input type="text" name="quotedperson" Placeholder="The name of the person you are quoting." class="curved"/>
							</div>
							<div id="formend">
								Quote of the Day *<br>
								<textarea name="quoteoftheday" id="" placeholder="Put the quote text here without any quotes please the quote will be added automatically when this entry is displayed" class="curved3">'.$quote.'</textarea>
							</div>
		        <div id="formend" data-name="image">
		          Quoted Person Image(Leave this to use the default Muyiwa Afolabi image)<br>
		          <input type="file" name="profpic" Placeholder="The name of the person you are quoting." class="curved"/>
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
								<input type="submit" name="updateblogentry" value="Update" class="submitbutton"/>
							</div>
						</form>
					</div>
		';
		$row['quotesingleout']=$quote;
		$row['quotee']=$quotedperson;

		return $row;
	}

	function getAllQuotes($viewer,$limit,$type){
		$row=array();
		$testit=strpos($limit,"-");
		$testit!==false?$limit="":$limit=$limit;
		$type=mysql_real_escape_string($type);
		if($limit==""&&$viewer=="admin"){
			$query="SELECT * FROM qotd WHERE type='$type' LIMIT 0,15";
			$rowmonitor['chiefquery']="SELECT * FROM qotd WHERE type='$type'";
		}elseif($limit!==""&&$viewer=="admin"){
			$query="SELECT * FROM qotd WHERE type='$type' $limit";
			$rowmonitor['chiefquery']="SELECT * FROM qotd WHERE type='$type'";
		}elseif($viewer=="viewer"){
			$query="SELECT * FROM qotd WHERE type='$type' AND status='active'";
			$rowmonitor['chiefquery']="SELECT * FROM qotd WHERE type='$type' AND status='active'";	
		}
		$run=mysql_query($query)or die(mysql_error()." Line 2517");
		$numrows=mysql_num_rows($run);
		$adminoutput="No entries";
		$adminoutputtwo="";
		$vieweroutput="Sorry, No Quotes yet";
		$vieweroutputtwo="Sorry, No Quotes yet";
		$vieweroutputthree="Sorry, No Quotes yet";
		$vieweroutputfour="<p>Sorry, No Quotes yet</p>";
		$vieweroutputfive="<p>Sorry, No Quotes yet</p>";
		$singleoutput="Sorry, No Quotes yet";
		$randoutput="Sorry, No Quotes yet";
		$singleoutput2="Sorry, No Quotes yet";
		$randoutput2="Sorry, No Quotes yet";
		$randoutput3="Sorry, No Quotes yet";
		$singleoutput3="Sorry, No Quotes yet";
		$randoutput4="Sorry, No Quotes yet";
		$singleoutput4="Sorry, No Quotes yet";
		$randoutput5="Sorry, No Quotes yet";
		$singleoutput5="Sorry, No Quotes yet";
		$viewcombinedoutputcsi='
		<li class="item">
		    <div class="table">
		        <div class="text-center title">
		            <h1>"No quotes yet"</h1>
		            <span>No quotes</span>
		        </div>
		    </div><!-- .table -->
		</li>
		';
		$quote="";
		$quotee="";
		if($numrows>0){
			$adminoutput="";
			$adminoutputtwo="";
			$viewcombinedoutputcsi="";
			$vieweroutputmaintwo=array();
			$vieweroutputmainthree=array();
			$vieweroutputmainfour=array();
			$vieweroutputmainfive=array();
			$vieweroutputmain=array();
			$quoteoutputmain=array();
			$quoteeoutputmain=array();
			while($row=mysql_fetch_assoc($run)){
				$outs=getSingleQuote($row['id']);
				$adminoutput.=$outs['adminoutput'];
				$adminoutputtwo.=$outs['adminoutputtwo'];
				$vieweroutputmain[].=$outs['vieweroutput'];
				$vieweroutputmaintwo[].=$outs['vieweroutputtwo'];
				$vieweroutputmainthree[].=$outs['vieweroutputthree'];
				// for csi
				$vieweroutputmainfour[].=$outs['vieweroutputfour'];
				$vieweroutputmainfive[].=$outs['vieweroutputfive'];
				// for csi slider
				$viewcombinedoutputcsi.=$outs['vieweroutputfive'];
				// end csi
				$quoteoutputmain[].=$outs['quotesingleout'];
				$quoteeoutputmain[].=$outs['quotee'];
			}
			$totentry=count($vieweroutputmain);
			$random=rand(0,$totentry-1);
			$singlechoose=$totentry-1;
			$singleoutput=$vieweroutputmain[$singlechoose];
			$randoutput=$vieweroutputmain[$random];
			$totentry=count($vieweroutputmaintwo);
			$singleoutput2=$vieweroutputmaintwo[$singlechoose];
			$randoutput2=$vieweroutputmaintwo[$random];
			$singleoutput3=$vieweroutputmainthree[$singlechoose];
			$randoutput3=$vieweroutputmainthree[$random];
			// for csi
			$singleoutput4=$vieweroutputmainfour[$singlechoose];
			$randoutput4=$vieweroutputmainfour[$random];
			$singleoutput5=$vieweroutputmainfive[$singlechoose];
			$randoutput5=$vieweroutputmainfive[$random];
			// end csi
			$quote=$quoteoutputmain[$random];
			$quotee=$quoteeoutputmain[$random];
		}
		$top='<table id="resultcontenttable" cellspacing="0">
					<thead><tr><th>Photo</th><th>Type</th><th>Quote</th><th>QuotedPerson</th><th>status</th><th>View/Edit</th></tr></thead>
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
				<input type="hidden" name="outputtype" value="qotd'.$type.'"/>
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
		$row['singleoutput']=$singleoutput;
		$row['randomoutput']=$randoutput;
		$row['singleoutput']=$singleoutput;
		$row['randomoutput']=$randoutput;
		$row['singleoutputtwo']=$singleoutput2;
		$row['randomoutputtwo']=$randoutput2;
		$row['singleoutputthree']=$singleoutput3;
		$row['randomoutputthree']=$randoutput3;
		// for csi
		$row['singleoutputfour']=$singleoutput4;
		$row['randomoutputfour']=$randoutput4;
		$row['singleoutputfive']=$singleoutput5;
		$row['randomoutputfive']=$randoutput5;
		$row['viewcombinedoutputcsi']=$viewcombinedoutputcsi;
		// end csi
		$row['quote']=$quote;
		$row['quotee']=$quotee;
		return $row;
	}
?>