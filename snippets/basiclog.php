<?php
include('connection.php');
$logtype=$_POST['logtype'];
$sublogtype=isset($_POST['sublogtype'])?$_POST['sublogtype']:"";
// echo $logtype;
if($logtype=="adminlogin"){
	$username=mysql_real_escape_string($_POST['username']);
	$password=mysql_real_escape_string($_POST['password']);
	$crypttype=isset($_POST['crypttype'])?mysql_real_escape_string($_POST['crypttype']):"";

	if($crypttype!==""){
		$iniquery="SELECT * FROM admin WHERE username='$username' AND status='active'";
	}else{
		$iniquery="SELECT * FROM admin WHERE username='$username' AND password='$password' AND status='active'";
	}
	$inirun=briefquery($iniquery,__LINE__,"mysqli");
	$numrows=$inirun['numrows'];
	if($numrows>0){
		if(session_id() == ''){
			session_start();
		}
		$row=$inirun['resultdata'][0];
		$logpart=md5($host_addr);
		$_SESSION['logcheck'.$logpart.'']="off";
		$_SESSION['aduid'.$logpart.'']=$row['id'];
		$_SESSION['accesslevel'.$logpart.'']=$row['accesslevel'];
		$_SESSION['parentheader'.$logpart.'']=$row['parentheader'];
		if($crypttype==""){
			// echo $_SESSION['accesslevel'.$logpart.'']." accesslevel<br>";
			// echo $_SESSION['aduid'.$logpart.'']." aduid<br>";
			header('location:../admin/adminindex.php');
		}else if($crypttype=="crypted"){
			$chash=$row['password'];
			$matched=passwordTest($password,$chash);
			if($matched['matched']=="valid"){
				header('location:../admin/adminindex.php');
			}else{
				header('location:../admin/index.php?error=true');
			}
		}
	}else{
		// $_SESSION['adminerror']=$_SESSION['adminerror']+1;
		// echo $_SESSION['adminerror'];
		$logtype=="adminlogin"?header('location:../admin/index.php?error=true'):header('location:../fjcadmin/index.php?error=true');
	}
}elseif($logtype=="user"||$logtype=="serviceprovider"){
	$username=mysql_real_escape_string($_POST['username']);
	$password=mysql_real_escape_string($_POST['password']);
	$crypttype=isset($_POST['cr'])?mysql_real_escape_string($_POST['cr']):"";
	$returl=isset($_POST['returl'])?mysql_real_escape_string($_POST['returl']):"";
	$weblog=isset($_POST['weblog'])?mysql_real_escape_string($_POST['weblog']):"";
	$qextra="";
	$qcat="AND";

	if($sublogtype!==""){
		$qextra.="$qcat usersubtype='$sublogtype'";
	}
	if($crypttype!==""){
		$iniquery="SELECT * FROM users WHERE email='$username' AND usertype='$logtype' 
		$qextra";
	}else{
		$iniquery="SELECT * FROM users WHERE email='$username' AND pword='$password' 
		AND usertype='$logtype' $qextra";
		
	}

	$inirun=briefquery($iniquery,__LINE__,"mysqli");
	$numrows=$inirun['numrows'];
	if($numrows>0){
		$row=$inirun['resultdata'][0];
		$id=$row['id'];
		session_start();
		$md5id=md5($id);

		if($row['usertype']=="business"||$row['usertype']=="serviceprovider"){
			if($crypttype==""){
				$_SESSION['clienti'.$host_name.''.$md5id.'']=$row['id'];
				$_SESSION['clienth'.$host_name.'']=$md5id;
				$_SESSION['clienth'.$host_name.'']=$host_addr."clientdashboard.php";
				if($weblog==""){
					header('location:../clientdashboard.php');
				}else{
					$success="true";
					$msg="Successful login";
					echo json_encode(array("success"=>"$success","msg"=>"$msg"));
				}
			}else if($crypttype=="crypted"){
				$chash=$row['pword'];
				$matched=passwordTest($password,$chash);
				if($matched['matched']=="valid"){
					$_SESSION['clienti' .$host_name.''.$md5id.'']=$row['id'];
					$_SESSION['clienth'.$host_name.'']=$md5id;
					$_SESSION['clienth'.$host_name.'']=$host_addr."clientdashboard.php";
					if($weblog==""){
						header('location:../clientdashboard.php');
					}else{
						$success="true";
						$msg="Successful login";
						echo json_encode(array("success"=>"$success","msg"=>"$msg"));
					}
				}
			}
		}else{
			if($crypttype==""){
				$_SESSION['useri'.$host_name.''.$md5id.'']=$row['id'];
				$_SESSION['userh'.$host_name.'']=$md5id;
				if($weblog==""){
					header('location:../userdashboard.php');
				}else{
					$success="true";
					$msg="Successful login";
					echo json_encode(array("success"=>"$success","msg"=>"$msg"));
				}	
			}else if($crypttype=="crypted"){
				$chash=$row['pword'];
				$matched=passwordTest($password,$chash);
				if($matched['matched']=="valid"){
					$_SESSION['useri'.$host_name.''.$md5id.'']=$row['id'];
					$_SESSION['userh'.$host_name.'']=$md5id;
					if($weblog==""){
						header('location:../userdashboard.php');
					}else{
						$success="true";
						$msg="Successful login";
						echo json_encode(array("success"=>"$success","msg"=>"$msg"));
					}
				}
			}
		}
		if(isset($matched)&&$matched['matched']=="invalid"){
			if($row['usertype']=="business"||$row['usertype']=="serviceprovider"){
				//	echo $_SESSION['adminerror'];
				header('location:../clientlogin.php?ctype=logerror');
			}else{
				header('location:../login.php?ctype=logerror');

			}
		}
	}else{
		if($row['usertype']=="business"||$row['usertype']=="serviceprovider"){
			//	echo $_SESSION['adminerror'];
			header('location:../clientlogin.php?ctype=logerror');
		}else{
			header('location:../login.php?ctype=logerror');

		}
	}
}
?>