<?php
	function getSingleAdminUser($id,$type=""){
		global $host_tpathplain;
		include($host_tpathplain.'globalsmodule.php');
		$row=array();
		$query="SELECT * FROM admin where id=$id";
		$run=mysql_query($query)or die(mysql_error()." Line ".__LINE__);
		$numrows=mysql_num_rows($run);
		$row=mysql_fetch_assoc($run);	
		$id=$row['id'];
		$username=$row['username'];
		$fullname=$row['fullname'];
		$password=$row['password'];
		$accesslevel=$row['parentheader'];
		$accesslevelid=$row['accesslevel'];
		$status=$row['status'];
		$blockdeeprun="";
		if($type=="blockdeeprun"){
			$blockdeeprun="true";

		}
		// for project specific naming, in this case NNPC BPMS
		if($accesslevel=="rootadmin"){
			// $accesslevelout="MACOM";

		}else{
			$accesslevelout=strtoupper($accesslevel);
		}

		$row['accesslevelout']=$accesslevelout;
		//get complete gallery images and create thumbnail where necessary
		$mediaquery="SELECT * FROM media WHERE ownerid=$id AND ownertype='adminuser' AND status='active' ORDER BY id DESC";
		$mediarun=mysql_query($mediaquery)or die(mysql_error()." Line ".__LINE__);
		$coverdata=mysql_fetch_assoc($mediarun);
		
		$coverout="No image set";
		$medianumrows=mysql_num_rows($mediarun);
		$imgid=$coverdata['id'];
		if($medianumrows<1){
			$coverphoto="images/default.gif";
			$coverphotomed="images/default.gif";
			$coverphotothumb="images/default.gif";
			$coverphotosmall="images/default.gif";
			$coverpathout=$coverout;
			$imgid=0;
		}else{
			$coverphoto=$coverdata['location'];
			$coverphotomed=$coverdata['medsize'];
			$coverphotothumb=$coverdata['thumbnail'];
			$coverphotosmall=$coverdata['details'];
			$coverout='<a href="'.$host_addr.''.$coverdata['location'].'" 
						data-lightbox="general" 
						data-src="'.$host_addr.''.$coverdata['location'].'">
							<img src="'.$host_addr.''.$coverdata['thumbnail'].'"/>
						</a>';
		}
		$row['coverphoto']=$coverphoto;
		$row['coverphotomed']=$coverphotomed;
		$row['coverphotothumb']=$coverphotothumb;
		$coverpathout=$coverdata['location']!==""?''.$host_addr.''.$coverphoto.'':"";
		$row['absolutecover']=$host_addr.$coverphoto;
		$row['adminoutput']='
			<tr data-id="'.$id.'">
				<td class="tdimg">'.$coverout.'</td><td>'.$fullname.'</td><td>'.$accesslevelout.'</td><td>'.$status.'</td><td name="trcontrolpoint"><a href="#&id='.$id.'" name="edit" data-type="editsingleuserdata" data-divid="'.$id.'">Edit</a></td>
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
		$initvar[0]="editview";
		$initvar[1]="imgid";
		$initvar[2]="row";
		$initvar[3]="host_addr";

		$initval[0]="true";
		$initval[1]=$imgid;
		$initval[2]=$row;
		$initval[3]=$host_addr;
		if($blockdeeprun==""){
			$row['adminoutputtwo']=get_include_contents("createnewuser.php",$initvar,$initval);
		}
		$row['vieweroutput']="";
		return $row;
	}
	function getAllAdminUsers($viewer,$limit,$type,$data=array()){
		global $host_tpathplain;
		include($host_tpathplain.'globalsmodule.php');
		$row=array();
		
		// this block handles the content of the limit data
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

		$qcat=$viewer=="admin"?"WHERE ":" AND";
		$queryextra="";

		if(isset($data['queryextra'])&&$data['queryextra']!==""){
			if($queryextra!==""){
				$queryextra.=" $qcat ".$data['queryextra'];
			}else{
				$queryextra.=" AND ".$data['queryextra'];
			}
		}
		$outputtype="adminusers";
		$realoutputdata="";
		if($type!==""){
			if(is_array($type)){
				// assign defining properties for type array set in the 
				if($type[0]=="parentheader"){
					$realoutputdata=$type[0];
					for($i=1;$i<count($type);$i++){
						$ctype=$type[$i];
						$queryextra.=$i==1?" $qcat (parentheader='$ctype'": " OR parentheader='$ctype'";
						$realoutputdata.=",$ctype";
						if($i==count($type)-1){
							$queryextra.=")";
						}
					}

				}
			}else{
				$queryextra=" $qcat parentheader='$type'";
				$realoutputdata=$type;
			}
		}
		if($queryextra==""){
			$queryextra.=" $qcat fullname!='Okebukola Olagoke'";

		}else{
			$queryextra.=" AND fullname!='Okebukola Olagoke'";
		}
		if($viewer=="admin"){
			$query="SELECT * FROM admin $queryextra order by id desc ".$limit."";
			$rowmonitor['chiefquery']="SELECT * FROM admin $queryextra order by id desc";

		}else if($viewer=="viewer" && $queryextra!==""){
			$query="SELECT * FROM admin WHERE status='active' $queryextra order by id desc LIMIT 0,15";		
			$rowmonitor['chiefquery']="SELECT * FROM admin WHERE status='active' $queryextra order by id desc";
		
		}else{
			$query="SELECT * FROM admin WHERE id<1 order by id desc ".$limit."";
			$rowmonitor['chiefquery']="SELECT * FROM admin WHERE id<1 order by id desc";
		}
		// echo $query;
		$selection="";
		$phselection="";
		$run=mysql_query($query)or die(mysql_error()." Line ".__LINE__);
		$numrows=mysql_num_rows($run);
		$rmd5=md5($rowmonitor['chiefquery'].date("Y-m-d H:i:s"));
		$_SESSION['cq']["$rmd5"]=$rowmonitor['chiefquery'];

	
		$top='<table id="resultcontenttable" cellspacing="0">
					<thead><tr><th>Coverphoto</th><th>Fullname</th><th>AccessLevel</th><th>Status</th><th>View/Edit</th></tr></thead>
					<tbody>';
		$bottom='	</tbody>
				</table>';
		$adminoutput='<td colspan="100">No entries</td>';
		$vieweroutput='No Entries Yet';
		$monitorpoint="";
		if($numrows>0){
			$vieweroutput="";
			$adminoutput="";
			while($row=mysql_fetch_assoc($run)){
				$outvar=getSingleAdminUser($row['id']);
				$adminoutput.=$outvar['adminoutput'];
				// $vieweroutput.=str_replace("../", "$host_addr",$outvar['vieweroutput']);
				$selection.='<option value="'.$outvar['id'].'" data-img="'.$host_addr.''.$outvar['coverphotothumb'].'">'.$outvar['fullname'].' - '.$outvar['accesslevelout'].'</option>';
				$phselection.='<option value="'.$outvar['parentheader'].'">'.$outvar['fullname'].'</option>';
			}
		}
		$outs=paginatejavascript($rowmonitor['chiefquery']);
		$paginatetop='
		<div id="paginationhold">
			<div class="meneame">
				<input type="hidden" name="curquery" value="'.$rmd5.'"/>
				<input type="hidden" name="outputtype" value="'.$outputtype.'|'.$realoutputdata.'"/>
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
		$row['vieweroutput']='
			<div class="accordion">'.$vieweroutput.'</div>	
		';
		$row['selection']=$selection;
		$row['phselection']=$phselection;
		return $row;
	}
?>