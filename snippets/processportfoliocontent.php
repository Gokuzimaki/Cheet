<?php 
	// Here, the contentgroupdata for this entry is created
	// mainly for admin processing, if the data is for the user,
	// changes to the related edit file would suffice 
	$dogeneraldata=isset($dogeneraldata)?$dogeneraldata:"";
	if(!isset($contentgroupdata)){
		$contentgroupdata=array();
	}
	// echo "$dogeneraldata - general data type<br>";
	if($dogeneraldata=="multiple"){
		// for general 
		if(isset($pagetype)&&!isset($maintype)){
			$maintype=$pagetype;
		}
		if($maintype=="portfoliogallery"){
			$contentgroupdata['adminheadings']['rowdefaults']='<tr>
			<th>CoverImage</th>
			<th>MainTitle</th>
			<th>MiniDetails</th>
			<th>Status</th>
			<th>View/Edit</th>
			</tr>';
			$contentgroupdata['adminheadings']['output']=6;
			// create init eval for singlegeneralinfo segment;
			$contentgroupdata['evaldata']['single']['initeval']='
				$imgcoverout=\'<img src="'.$host_addr.'images/fvtimages/fvtdefaultcover.jpg"/>\';
				$wordfileout=\'<a href="##">No file</a>\';
				$pdffileout=\'<a href="##">No file</a>\';
				if(isset($worddoc)&&$worddoc!==""){
					$wordfileout=\'<a href="\'.$worddoc.\'" target="_blank"><i class="fa fa-file-word-o"></i></a>\';

				}
				if(isset($pdfdoc)&&$pdfdoc!==""){
					$pdffileout=\'<a href="\'.$pdfdoc.\'" target="_blank"><i class="fa fa-file-pdf-o"></i></a>\';

				}
				if(isset($coverimage)&&$coverimage!==""){
					// get the portions of the image to use
					$imgcoverout=\'<a href="\'.$coverimage.\'" data-lightbox="admintableimgs" data-src="\'.$coverimage.\'"><img src="\'.$host_addr.\'\'.$coverimage_filedata[\'thumbnail\'].\'"/>\';
				}
				$tddataoutput="";

				if($contenttitle!==""){
					$tddataoutput=\'<td class="tdimg">\'.$imgcoverout.\'</td><td>\'.$contenttitle.\'</td><td>\'.$wordfileout.\'</td><td>\'.$pdffileout.\'</td><td>\'.$status.\'</td><td name="trcontrolpoint"><a href="#&id=\'.$id.\'" name="edit" data-type="editsinglegeneraldata" data-divid="\'.$id.\'">Edit</a></td>\';				
				}
				
				$showhideall="statusonly";
			';
				
		}
		
	}else if($dogeneraldata=="single"){
		// for single
	}else{

	}
?>