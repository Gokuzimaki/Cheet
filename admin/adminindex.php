<?php  
	session_start();
	include('../snippets/connection.php');
	// var_dump(xdebug());
	// echo "$rurladmin<br>";
	// $_SESSION['rurladmin']="../fjcadmin/adminindex.php";
	/*echo $rurladmin;*/
	$logpart=md5($host_addr);
	// unset();
	if (isset($_SESSION['logcheck'.$logpart.''])&&$_SESSION['logcheck'.$logpart.'']=="on"||$_SESSION['logcheck'.$logpart.'']==""||!isset($_SESSION['logcheck'.$logpart.''])) {
		header('location:index.php?error=true');
	}
	if(strpos($host_target_addr, "localhost/")||strpos($host_target_addr, "wamp")){
	  	// for local server
		include('../snippets/cronit.php');
	}
	$uid=$_SESSION['aduid'.$logpart.'']?$_SESSION['aduid'.$logpart.'']:header('location:index.php?error=nosession');
	// $uid=1;
	if($_SESSION['accesslevel'.$logpart.'']!==0&&$_SESSION['accesslevel'.$logpart.'']!==3){
		// header('location:index.php?error=accessdenied');
	}
	// create notification set entries
	// unset($_SESSION['notification'.$uid.''.$logpart.'']);
	if (!isset($_SESSION['notification'.$uid.''.$logpart.''])){
		$_SESSION['notification'.$uid.''.$logpart.'']=array();
	}
	// produce Notification data
	$mnotoutput="";
	$fnotoutput="";
	if(function_exists('notificationsPlainArray')){
		if(isset($_GET['compid'])&&is_numeric($_GET['compid'])){
			$i=$_GET['compid'];
			$rtype=isset($_GET['rtype'])&&$_GET['rtype']?$_GET['rtype']:"";
			$type=isset($_GET['type'])&&$_GET['type']?$_GET['type']:"";
			$ut=isset($_GET['v'])&&$_GET['v']?$_GET['v']:"";
			$d=isset($_GET['d'])&&$_GET['d']?$_GET['d']:0;
			$curnotification=notificationsPlainArray($i,$rtype,$type,$ut,$d);
			// for one time notifications
			$_SESSION['lastsuccess']=isset($_SESSION['lastsuccess'])&&
			$_SESSION['lastsuccess']==0&&$_SESSION['lastsuccess']!=="null"?1:"null";
			if($_SESSION['lastsuccess']==1){
				$soutput='
		            <script>
			            $(document).ready(function(){
			            	$("#notificationModal").modal("show");
			            });
		            </script>
					<div id="notificationModal" class="modal modal-success" role="dialog">
		              <div class="modal-dialog" role="document">
		                <div class="modal-content">
		                  <div class="modal-header">
		                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		                    <h4 class="modal-title">Success</h4>
		                  </div>
		                  <div class="modal-body">
		                    <p>Last action was carried out successfully on </p>
		                  </div>
		                  <div class="modal-footer">
		                  	<p>Click/tap the close button in the dialog box to dismiss</p>
		                  </div>
		                </div><!-- /.modal-content -->
		              </div><!-- /.modal-dialog -->
		            </div><!-- /.modal -->
				';
				$_SESSION['notification'.$uid.''.$logpart.''][count($_SESSION['notification'.$uid.''.$logpart.''])]=$curnotification['output'];
				unset($_SESSION['lastsuccess']);
			}
		}
		if (isset($_SESSION['notification'.$uid.''.$logpart.''])){

			if(count($_SESSION['notification'.$uid.''.$logpart.''])>0){
				for ($i = count($_SESSION['notification'.$uid.''.$logpart.'']); $i > count($_SESSION['notification'.$uid.''.$logpart.''])-6; $i--) {
					if(isset($_SESSION['notification'.$uid.''.$logpart.''][$i])&&$_SESSION['notification'.$uid.''.$logpart.''][$i]!==""){
						// echo $i;
						$coutput="<p>".$_SESSION['notification'.$uid.''.$logpart.''][$i]."</p>";
						$mnotoutput=$coutput.$mnotoutput;
					}
				}
				$fnotoutput='
					<div class="callout callout-success _nogreen _border_dark clearboth marginbottom">
	                    <h2>Notifications <small>Last Five</small></h2>
	                    '.$mnotoutput.'
	                  </div>
				';
			}
		}
	}
	$alevel=$_SESSION['accesslevel'.$logpart.''];
	// echo $alevel."<br>";
	// echo $_SESSION['logcheck'.$logpart.'']." logcheck<br>";
	// echo $_SESSION['accesslevel'.$logpart.'']." accesslevel<br>";
	// echo $_SESSION['aduid'.$logpart.'']." aduid<br>";
	$mview="";
	$sview="";
	if(isset($_GET['sview'])&&isset($_GET['mview'])){
		$sview=$_GET['sview'];
		$mview=$_GET['mview'];
		// echo $sview." ".$mview;
	}

	$uservice="none";
	$ubookings="none";
	$utestimony="none";
	$umessages="none";
	$ucomments="none";
	// echo md5(3);
	$comrows=0;
	// $comdata=getAllComments("inactivecount","","");
	// $comrows=$comdata['countout'];
	$comrows>0?$ucomments="":$ucomments=$ucomments;
	$fullcomout=$comrows>0?'<small class="label pull-right bg-red mainsmall">'.$comrows.'</small>':"";
	$admindata=getAdmin($uid);
	/*
		data:text/html;base64,PGh0bWw+PGhlYWQ+PC9oZWFkPjxib2R5PjxkaXYgc3R5bGU9J2Rpc3BsYXk6IG5vbmUnIGlkPSdyZWRpcmVjdFVybCc+IGh0dHA6Ly9lY2xrc3Bibi5jb20vYWRTZXJ2ZS9zYT9jaWQ9MzE3NzBfNDU4NTBfMCZwaWQ9JnE9TGlua1Nocmluay5uZXQlMjAtJTIwRWFybiUyMG1vbmV5JTIwc2hhcmluZyUyMHNocmlua2VkJTIwbGlua3MlMjEmYXA9Y21wJTNEUE9QVU5ERVIlMjZldnAlM0REREdibmZWV1RHbkpHaXNLSzR3V3ZmYld3dnppTnBfMVRvODBhY2phaFRCOHVhWm9vdFJlVW9PZ1QyUm55SjJpJTI2dGlwJTNETGlua1Nocmluay5uZXQlMjAtJTIwRWFybiUyMG1vbmV5JTIwc2hhcmluZyUyMHNocmlua2VkJTIwbGlua3MhJnBvcGV5ZT1iWGc5TVRReE5pWnRlVDB4TURVbVkzZzlNVFF6T0NaamVUMHpNeVozUFRFMk1EQW1hRDA0TXpJbVl6MHhKbk05TVNaMFBUZzRNRFklM0Qmb2xpdmU9MTwvZGl2PjxzY3JpcHQ+dHJ5IHt3aW5kb3cub3BlbmVyLnBvc3RNZXNzYWdlKCczMTc3MF80NTg1MF8wJywgJyonKTt9Y2F0Y2goZSkge31maW5hbGx5e3NldFRpbWVvdXQoZnVuY3Rpb24oKXsgd2luZG93LmxvY2F0aW9uLmhyZWY9ZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ3JlZGlyZWN0VXJsJykudGV4dENvbnRlbnQ7fSwxMCk7IH08L3NjcmlwdD48L2JvZHk+PC9odG1sPg==
	*/
	// $userdataadmin=getAllUsers("viewer","");
	// $userdatatwoadmin=getAllUsers("inactiveviewer","");
	// $flooz=base64_decode('PGh0bWw+PGhlYWQ+PC9oZWFkPjxib2R5PjxkaXYgc3R5bGU9J2Rpc3BsYXk6IG5vbmUnIGlkPSdyZWRpcmVjdFVybCc+IGh0dHA6Ly9lY2xrc3Bibi5jb20vYWRTZXJ2ZS9zYT9jaWQ9MzE3NzBfNDU4NTBfMCZwaWQ9JnE9TGlua1Nocmluay5uZXQlMjAtJTIwRWFybiUyMG1vbmV5JTIwc2hhcmluZyUyMHNocmlua2VkJTIwbGlua3MlMjEmYXA9Y21wJTNEUE9QVU5ERVIlMjZldnAlM0REREdibmZWV1RHbkpHaXNLSzR3V3ZmYld3dnppTnBfMVRvODBhY2phaFRCOHVhWm9vdFJlVW9PZ1QyUm55SjJpJTI2dGlwJTNETGlua1Nocmluay5uZXQlMjAtJTIwRWFybiUyMG1vbmV5JTIwc2hhcmluZyUyMHNocmlua2VkJTIwbGlua3MhJnBvcGV5ZT1iWGc5TVRReE5pWnRlVDB4TURVbVkzZzlNVFF6T0NaamVUMHpNeVozUFRFMk1EQW1hRDA0TXpJbVl6MHhKbk05TVNaMFBUZzRNRFklM0Qmb2xpdmU9MTwvZGl2PjxzY3JpcHQ+dHJ5IHt3aW5kb3cub3BlbmVyLnBvc3RNZXNzYWdlKCczMTc3MF80NTg1MF8wJywgJyonKTt9Y2F0Y2goZSkge31maW5hbGx5e3NldFRpbWVvdXQoZnVuY3Rpb24oKXsgd2luZG93LmxvY2F0aW9uLmhyZWY9ZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ3JlZGlyZWN0VXJsJykudGV4dENvbnRlbnQ7fSwxMCk7IH08L3NjcmlwdD48L2JvZHk+PC9odG1sPg==');

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    
    <!-- Bootstrap 3.3.2 -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- daterange picker -->
	<link href="../plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
	<!-- daterange picker -->
	<link href="../plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
	<!-- Bootstrap time Picker -->
	<link href="../plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet"/>
	<!-- Bootstrap datetime Picker -->
	<link href="../plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.css" rel="stylesheet"/>
	
	<!-- Select 2 css -->
    <link rel="stylesheet" href='<?php echo $host_addr;?>plugins/select2/dist/css/select2-bootstrap.css' type="text/css"/>
    <!-- Select2 (Selection customizer) -->
    <link href='<?php echo $host_addr;?>plugins/select2/dist/css/select2.min.css' rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <link href="../icons/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="../icons/ionicons/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!-- DATA TABLES -->
    <link href="../plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap slider -->
    <link href="../plugins/bootstrap-slider/slider.css" rel="stylesheet" type="text/css" />
	<link async href="<?php echo $host_addr;?>stylesheets/lightbox.css" rel="stylesheet"/>
	<link rel="icon" href="<?php echo $host_addr;?>/favicon.ico" sizes="16x16 32x32 64x64" type="image/vnd.microsoft.icon">
	    <!-- bootstrap slider -->
    <link href="../plugins/bootstrap-slider/slider.css" rel="stylesheet" type="text/css" />

	<!-- color-control section 2.1.3 -->
    <link href="dist/css/my-color.css" rel="stylesheet" type="text/css" />
	<!-- jQuery 2.1.3 -->
    <script src="../plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="skin-yellow">
    <!-- Site wrapper -->
    <div class="wrapper">
		<header class="main-header">
		    <a href="index.php" class="logo"><b>CHEET</b></a>
		    <!-- Header Navbar: style can be found in header.less -->
		    <nav class="navbar navbar-static-top" role="navigation">
		      <!-- Sidebar toggle button-->
		      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </a>
		      <div class="navbar-custom-menu">
		            <ul class="nav navbar-nav">
		              
		              <!-- User Account: style can be found in dropdown.less -->
		              <li class="dropdown user user-menu">
			                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
			                  <img src="../images/default.gif" class="user-image" alt="User Image"/>
			                  <span class="hidden-xs">
			                      <?php echo $admindata['fullname'];?>
			                  </span>
			                </a>
			                <ul class="dropdown-menu">
			                  <!-- User image -->
			                  <li class="user-header">
			                    <img src="../images/default.gif" class="img-circle" alt="User Image" />
			                    <p>
			                      <?php echo $admindata['fullname'];?>
			                      <!-- <small>Member since Nov. 2012</small> -->
			                    </p>
			                  </li>
			                  
			                  <!-- Menu Footer-->
			                  <li class="user-footer">
			                    <div class="pull-right">
			                      <a href="../snippets/logout.php?type=adminfjc" class="btn btn-default btn-flat">Sign out</a>
			                    </div>
			                  </li>
			                </ul>
		              </li>
		            </ul>
		      </div>
		    </nav>
		</header>

      <!-- =============================================== -->

      <!-- Left side column. contains the sidebar -->
       <aside class="main-sidebar">
	        <!-- sidebar: style can be found in sidebar.less -->
	        <section class="sidebar">
	          <!-- Sidebar user panel -->
	          <div class="user-panel">
	            <div class="pull-left image">
	              <img src="../images/default.gif" class="img-circle" alt="User Image" />
	            </div>
	            <div class="pull-left info">
	              <p>
						<?php echo $admindata['fullname'];?>
	              </p>
	            </div>
	          </div>
	          <!-- search form -->
	          <!-- <form action="#" method="get" name="mainsearchform" class="sidebar-form">
		            <div class="input-group">
		              <input type="text" name="q" class="form-control" placeholder="Search..."/>
		              <span class="input-group-btn">
		                <button type='button' name='mainsearch' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
		              </span>
		            </div>
		            <div class="input-group">
	                    <div class="input-group-btn">
	                      <button type="button" class="btn btn-warning dropdown-toggle customsearchbtn" data-name="searchbyspace" data-toggle="dropdown" aria-expanded="false">Search By <span class="fa fa-caret-down"></span></button>
	                      <input type="hidden" name="searchby" value=""/>
	                      <ul class="dropdown-menu customdrop" data-type="appsearchbyoption">
	                        <li><a href="##Search" data-name="mainsearchbyoption" data-value="recruitname" data-placeholder="Firstname Othernames">Recruit Name</a></li>
	                        <li><a href="##Search" data-name="mainsearchbyoption" data-value="recruitstatus" data-placeholder="active or inactive">Recruit Status</a></li>
	                        <li><a href="##Search" data-name="mainsearchbyoption" data-value="orgname" data-placeholder="Organisation Name">Organisation Name</a></li>
	                        <li><a href="##Search" data-name="mainsearchbyoption" data-value="blogtitle" data-placeholder="Blog title Search...">Blog title</a></li>
	                        <li><a href="##Search" data-name="mainsearchbyoption" data-value="blogintro" data-placeholder="Intro Paragraph Search...">Blog Intro</a></li>                        
	                        <li><a href="##Search" data-name="mainsearchbyoption" data-value="blogentry" data-placeholder="Blog Post Search...">Blog Post</a></li>                        
	                        <li class="divider"></li>
	                        <li><a href="#">Separated link</a></li>
	                      </ul>
	                    </div>
	                </div>
	          </form> -->
	          <!-- /.search form -->
	          <!-- sidebar menu: : style can be found in sidebar.less -->
	          <ul class="sidebar-menu">
		            <li class="header">MENU</li>
		            <!-- <li class="treeview">
		              <a href="#" appdata-otype="mainlink" appdata-type="">
		              <i class="fa fa-user"></i> <span>Clients</span> <i class="fa fa-angle-left pull-right"></i>
		              </a>
		              <ul class="treeview-menu">
		                <li><a href="#New" appdata-otype="sublink" appdata-type="menulinkitem" appdata-name="newclient" appdata-crumb='New Client' appdata-fa='<i class="fa fa-user"></i>' appdata-pcrumb="Client"><i class="fa fa-plus"></i> New</a></li>
		                <li><a href="#Edit" appdata-otype="sublink" appdata-type="menulinkitem" appdata-name="editclient" appdata-crumb='Edit Client' appdata-fa='<i class="fa fa-user"></i>' appdata-pcrumb="Client"><i class="fa fa-gear"></i> Edit</a></li>
		              </ul>
		            </li> -->
		            <li class="treeparent treeview">
						<a href="#">
			                <i class="fa fa-object-group"></i> <span>CHEET Profiles</span> <i class="fa fa-angle-left pull-right"></i>
			            </a>
						<ul class="treeview-menu treeview-menu-parent">
							<li class="treeview treeparent-child">
				              <a href="#" appdata-otype="mainlink">
				                <i class="fa fa-sticky-note-o"></i> <span>Users</span> <i class="fa fa-angle-left pull-right"></i>
				              </a>
				              <ul class="treeview-menu">
				                <li><a href="#Create User" appdata-otype="sublink" appdata-type="menulinkitem" 
				                	appdata-name="_gdunit" 
				                	appdata-datamap='{"vnt":["createuseraccadmin","edituseraccadmin"],
				                	"mt":["useracc","useracc"],
				                	"vt":"newuser_crt","pr":"snippets/forms/userentries.php",
				                	"preinit":[true,false],"ugi":false,
				                	"actionpath":["snippets/basicsignup.php","snippets/edit.php"]}' 
				                	appdata-fa='<i class="fa fa-user-plus"></i>' appdata-pcrumb="Cheet Profiles > Users "><i class="fa fa-user-plus"></i> New</a></li>
				                <li><a href="#View User" appdata-otype="sublink" 
				                	appdata-type="menulinkitem" 
				                	appdata-name="_gdunit" 
				                	appdata-datamap='{"vnt":["createuseraccadmin","edituseraccadmin"],
				                	"mt":["useracc","useracc"],
				                	"vt":"edituser_crt","pr":"snippets/forms/userentries.php",
				                	"preinit":[true,false],"ugi":false,
				                	"actionpath":["snippets/basicsignup.php","snippets/edit.php"]}' 
				                	appdata-fa='<i class="fa fa-users"></i>' appdata-pcrumb="Cheet Profiles > Users "><i class="fa fa-gear"></i> View</a></li>
				              </ul>
				            </li>
				            <li class="treeview treeparent-child">
				              <a href="#" appdata-otype="mainlink">
				                <i class="fa fa-sticky-note-o"></i> <span>Instructors</span> <i class="fa fa-angle-left pull-right"></i>
				              </a>
				              <ul class="treeview-menu">
				                <li><a href="#Create instructors" appdata-otype="sublink" 
				                	appdata-type="menulinkitem" 
				                	appdata-name="_gdunit" 
				                	appdata-datamap='{"vnt":["createserviceprovideradmin",
				                	"editserviceprovideradmin"],
				                	"mt":["newinstructor","newinstructor"],
				                	"vt":"newserviceprovider_crt","pr":"snippets/forms/cliententries.php",
				                	"preinit":[true,false],"ugi":false,
				                	"actionpath":["snippets/basicsignup.php","snippets/edit.php"]}'
				                	appdata-fa='<i class="fa fa-briefcase"></i>' appdata-pcrumb="Cheet Profiles > ServiceProviders "><i class="fa fa-plus"></i> New</a></li>
				                <li><a href="#Edit Instructors" appdata-otype="sublink" 
				                	appdata-type="menulinkitem" 
				                	appdata-name="_gdunit" 
				                	appdata-datamap='{"vnt":["createserviceprovideradmin",
				                	"editserviceprovideradmin"],
				                	"mt":["editinstructor","editinstructor"],
				                	"vt":"editserviceprovider_crt",
				                	"pr":"snippets/forms/cliententries.php",
				                	"preinit":[true,false],"ugi":false,
				                	"actionpath":["snippets/basicsignup.php","snippets/edit.php"]}' 
				                	appdata-fa='<i class="fa fa-briefcase"></i>' appdata-pcrumb="Cheet Profiles > ServiceProviders "><i class="fa fa-gear"></i> View</a></li>
				              </ul>
				            </li>
						</ul>
					</li>
		            <li class="treeparent treeview">
						<a href="#">
			                <i class="fa fa-info"></i> <span>Q. Data</span> 
			                <i class="fa fa-angle-left pull-right"></i>
			            </a>
						<ul class="treeview-menu treeview-menu-parent">
							<li class="treeview treeparent-child">
				              <a href="#" appdata-otype="mainlink">
				                <i class="fa fa-sticky-note-o"></i> <span>Q. Groups</span> <i class="fa fa-angle-left pull-right"></i>
				              </a>
				              <ul class="treeview-menu">
				                <li><a href="#Create/Edit" appdata-otype="sublink" appdata-type="menulinkitem" 
				                	appdata-name="_gdunit" 
				                	appdata-datamap='{"vnt":["createqgroup","editqgroup"],
				                	"mt":["qgroup","qgroup"],
				                	"vt":"newqgroup_crt","pr":"snippets/forms/appforms/qgroups.php",
				                	"preinit":[true,false],"ugi":false,
				                	"actionpath":["","snippets/basicsignup.php"]}' 
				                	appdata-fa='<i class="fa fa-sticky-note-o"></i>' 
				                	appdata-pcrumb="Q.Groups > New"><i class="fa fa-file-text-o"></i> New</a></li>
				                <li><a href="#Edit qgroup" appdata-otype="sublink" 
				                	appdata-name="_gdunit" 
				                	appdata-datamap='{"vnt":["createqgroup","editqgroup"],
				                	"mt":["qgroup","qgroup"],
				                	"vt":"editqgroup_crt","pr":"snippets/forms/appforms/qgroups.php",
				                	"preinit":[false,true],"ugi":false,
				                	"actionpath":["","snippets/edit.php"]}'
				                	appdata-type="menulinkitem" appdata-fa='<i class="fa fa-sticky-note-o"></i>' 
				                	appdata-pcrumb="Q.Groups > Home Page "><i class="fa fa-file-image-o"></i> Edit</a></li>
				              </ul>
				            </li>
				            <li class="treeview treeparent-child">
				              <a href="#" appdata-otype="mainlink">
				                <i class="fa fa-sticky-note-o"></i> <span>QGroup Courses/Subjects</span> <i class="fa fa-angle-left pull-right"></i>
				              </a>
				              <ul class="treeview-menu">
				                <li><a href="#Create/Edit" appdata-otype="sublink" appdata-type="menulinkitem" 
				                	appdata-name="_gdunit" 
				                	appdata-datamap='{"vnt":["createqgroup","editqgroup"],
				                	"mt":["editqgsubjects_crt","editqgsubjects_crt"],
				                	"vt":"editqgsubjects_crt","pr":"snippets/forms/appforms/qgroups.php",
				                	"preinit":[false,true],"ugi":true,
				                	"actionpath":["","snippets/edit.php"]}' 
				                	appdata-fa='<i class="fa fa-sticky-note-o"></i>' 
				                	appdata-pcrumb="Q.Groups > New"><i class="fa fa-file-text-o"></i> New/Edit</a></li>
				              </ul>
				            </li>
				            <li class="treeview treeparent-child">
				              <a href="#" appdata-otype="mainlink">
				                <i class="fa fa-sticky-note-o"></i> <span>Question Entries</span> <i class="fa fa-angle-left pull-right"></i>
				              </a>
				              <ul class="treeview-menu">
				                <li><a href="#homecorevalues" appdata-otype="sublink" 
				                	appdata-name="_gdunit" 
				                	appdata-datamap='{"vnt":["createqgroup","editqgroup"],
				                	"mt":["qgroup","qgroup"],
				                	"vt":"create","pr":"snippets/forms/appforms/qgroups.php",
				                	"preinit":[true,false],"ugi":true,"actionpath":["","snippets/basicsignup.php"]}' 
				                	appdata-type="menulinkitem" appdata-fa='<i class="fa fa-sticky-note-o"></i>' 
				                	appdata-pcrumb="Pages > Home Page "><i class="fa fa-file-image-o"></i> Home Core Values</a></li>
				              </ul>
				            </li>
						</ul>
					</li>
					<li class="divider"></li>

					<li class="treeparent treeview">
						<a href="#">
			                <i class="fa fa-object-group"></i> <span>Pages</span> <i class="fa fa-angle-left pull-right"></i>
			            </a>
						<ul class="treeview-menu treeview-menu-parent">
							<li class="treeview treeparent-child">
				              <a href="#" appdata-otype="mainlink">
				                <i class="fa fa-sticky-note-o"></i> <span>Home Page</span> <i class="fa fa-angle-left pull-right"></i>
				              </a>
				              <ul class="treeview-menu">
				                <li><a href="#Welcome Message" appdata-otype="sublink" appdata-type="menulinkitem" 
				                	appdata-name="_gdunit" 
				                	appdata-datamap='{"vnt":"contententryupdate","mt":"homewelcomemsgcustom","vt":"create",
				                	"pr":"snippets/welcomemsgcustom.php","preinit":true}' 
				                	appdata-fa='<i class="fa fa-sticky-note-o"></i>' 
				                	appdata-pcrumb="Pages > Home Page "><i class="fa fa-file-text-o"></i> Welcome Message</a></li>
				                
				              </ul>
				            </li>
				            <li class="treeview treeparent-child">
				              <a href="#" appdata-otype="mainlink">
				                <i class="fa fa-sticky-note-o"></i> <span>About Page</span> <i class="fa fa-angle-left pull-right"></i>
				              </a>
				              <ul class="treeview-menu">
				                <li><a href="#Page Intro" appdata-otype="sublink" appdata-type="menulinkitem" 
				                	appdata-name="_gdunit" 
				                	appdata-datamap='{"vnt":"contententryupdate","mt":"aboutcontent","vt":"create",
				                	"pr":"snippets/abtpageintro.php","preinit":true}'
				                	appdata-fa='<i class="fa fa-sticky-note-o"></i>' appdata-pcrumb="Pages > About Page "><i class="fa fa-file-text-o"></i> Welcome Message</a></li>
				              </ul>
				            </li>
				            
				            <li class="treeview treeparent-child">
					          <a href="#" appdata-otype="mainlink" appdata-type="">
					            <i class="fa fa-gift"></i> <span>Defaults</span> <i class="fa fa-angle-left pull-right"></i>
					          </a>
					          <ul class="treeview-menu">
					            <li><a href="#Default Site Data" appdata-otype="sublink" appdata-type="menulinkitem" 
					            	appdata-name="_gdunit"
					            	appdata-datamap='{"vnt":"contententryupdate","mt":"defaultdata","vt":"create",
				                	"pr":"snippets/defaultcontents.php","preinit":true}' 
					            	appdata-crumb="Social Accounts" appdata-fa="<i class='fa fa-gift'></i>" appdata-pcrumb="Defaults/Social"><i class="fa fa-street-view"></i> Default Data</a></li>
					            <!-- <li><a href="#Defaultinformation" appdata-otype="sublink" appdata-type="menulinkitem" appdata-name="defaultinfo" appdata-crumb="DefaultInfo" appdata-fa="<i class='fa fa-gear fa-spin'></i>" appdata-pcrumb="Defaults/Social"><i class="fa fa-plus"></i> Default Information</a></li> -->
					            <!-- <li><a href="#Business Hours" appdata-otype="sublink" appdata-type="menulinkitem" appdata-name="businesshours" appdata-crumb="Business Hours" appdata-fa="<i class='fa fa-clock-o'></i>" appdata-pcrumb="Defaults/Social"><i class="fa fa-plus"></i> Business Hours</a></li> -->
					          </ul>
					        </li>
				            
				            <li class="treeview treeparent-child">
								<a href="#" appdata-otype="mainlink">
									<i class="fa fa-question"></i> <span>FAQ</span> <i class="fa fa-angle-left pull-right"></i>
								</a>
								<ul class="treeview-menu menu-open">
									<li><a href="#New" appdata-otype="sublink" appdata-type="menulinkitem" appdata-name="newfaq" appdata-crumb="New FAQ" appdata-fa="<i class=&quot;fa fa-question&quot;></i>" appdata-pcrumb="Frequently Asked Questions"><i class="fa fa-plus"></i> New FAQ</a></li>
									<li><a href="#Edit" appdata-otype="sublink" appdata-type="menulinkitem" appdata-name="editfaq" appdata-crumb="Edit FAQ" appdata-fa="<i class=&quot;fa fa-question&quot;></i>" appdata-pcrumb="Frequently Asked Questions"><i class="fa fa-gear"></i> Edit FAQ</a></li>
								</ul>
					        </li>
						</ul>
					</li>
					<li class="divider"></li>
					<li class="treeparent treeview">
                        <a href="#">
                            <i class="fa fa-sliders"></i> <span>Blog</span> <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu treeview-menu-parent">
                            <li class="treeview treeparent-child">
                              <a href="#" appdata-otype="mainlink" >
                                <i class="fa fa-sliders"></i> <span>Blog Type</span> <i class="fa fa-angle-left pull-right"></i>
                              </a>
                              <ul class="treeview-menu">
                                <li><a href="#New" appdata-otype="sublink" appdata-type="menulinkitem" 
                                	appdata-name="_gdunit" 
				                	appdata-datamap='{"vnt":["createblogtype","editblogtype"],
				                	"mt":["blogtype","blogtype"],
				                	"vt":"blogtype_crt",
				                	"pr":"snippets/forms/blogmetadatas.php","preinit":false}'   
                                	appdata-fa='<i class="fa fa-sliders"></i>' appdata-pcrumb="Blog Type">
                                	<i class="fa fa-plus"></i> Create/Edit</a></li>
                                <!-- <li><a href="#Edit" appdata-otype="sublink" appdata-type="menulinkitem" appdata-name="editblogtype" appdata-fa='<i class="fa fa-sliders"></i>' appdata-pcrumb="Blog Type"><i class="fa fa-gear"></i> Edit</a></li> -->
                              </ul>
                            </li>
                            <li class="treeview treeparent-child">
                              <a href="#" appdata-otype="mainlink" >
                                <i class="fa fa-sitemap"></i> <span>Blog Category</span> <i class="fa fa-angle-left pull-right"></i>
                              </a>
                              <ul class="treeview-menu">

                                <li><a href="#New" appdata-otype="sublink" appdata-type="menulinkitem" 
                                	appdata-name="_gdunit" 
				                	appdata-datamap='{"vnt":["createblogcategory","editblogcategory"],
				                	"mt":["blogcategory","blogcategory"],
				                	"vt":"blogcategory_crt",
				                	"pr":"snippets/forms/blogmetadatas.php","preinit":false}'
				                	appdata-fa='<i class="fa fa-sitemap"></i>' 
				                	appdata-pcrumb="Blog Category">
				                	<i class="fa fa-plus"></i> Create/Edit</a></li>
                                <!-- <li><a href="#Edit" appdata-otype="sublink" appdata-type="menulinkitem" appdata-name="editblogcategory" appdata-fa='<i class="fa fa-sitemap"></i>' appdata-pcrumb="Blog Category"><i class="fa fa-gear"></i> Edit</a></li> -->
                              </ul>
                            </li>
                            <li class="treeview treeparent-child">
                              <a href="#" appdata-otype="mainlink" >
                                <i class="fa fa-newspaper-o"></i> <span>Blog Post</span> <i class="fa fa-angle-left pull-right"></i>
                              </a>
                              <ul class="treeview-menu">
                                <li><a href="#New" appdata-otype="sublink" appdata-type="menulinkitem" 

                                	appdata-name="_gdunit" 
				                	appdata-datamap='{"vnt":["createblogpost","editblogpost"],
				                	"mt":["blogentries","blogentries"],
				                	"vt":"create",
				                	"pr":"snippets/forms/blogentries.php","preinit":false}' 
                                	appdata-fa='<i class="fa fa-text"></i>' 
                                	appdata-pcrumb="Blog Post"><i class="fa fa-plus"></i> Create/Edit</a></li>
                                <li><a href="#Edit Scheduled Posts" appdata-otype="sublink" appdata-type="menulinkitem" 
                                	appdata-name="_gdunit" 
				                	appdata-datamap='{"vnt":["createblogpost","editblogpost"],
				                	"mt":["blogentries","blogentries"],
				                	"vt":"blogscheduled_crt",
				                	"pr":"snippets/forms/blogentries.php","preinit":false}' 
                                	appdata-fa='<i class="fa fa-text"></i>' 
                                	appdata-pcrumb="Scheduled Blog Post"><i class="fa fa-clock-o"></i> Scheduled Posts</a></li>
                                <li><a href="#Edit Featured Posts" appdata-otype="sublink" appdata-type="menulinkitem" 
                                	appdata-name="_gdunit" 
				                	appdata-datamap='{"vnt":["createblogpost","editblogpost"],
				                	"mt":["blogentries","blogentries"],
				                	"vt":"blogfeatured_crt",
				                	"pr":"snippets/forms/blogentries.php","preinit":false}' 
                                	appdata-fa='<i class="fa fa-text"></i>' 
                                	appdata-pcrumb="Featured Blog Post"><i class="fa fa-list"></i> Featured Posts</a></li>
                              </ul>
                            </li>
                            <li class="treeview treeparent-child">
                              <a href="#" appdata-otype="mainlink" >
                                <i class="fa fa-comment-o"></i> <span>Comments</span> 
                                    <?php echo $fullcomout;?>
                                <i class="fa fa-angle-left pull-right"></i>
                              </a>
                              <ul class="treeview-menu">
                                <li><a href="#AllComments" appdata-otype="sublink" 
                                	appdata-type="menulinkitem" 
                                	appdata-name="all_comments" 
                                	appdata-fa='<i class="fa fa-comments-o"></i>' 
                                	appdata-pcrumb="Comments">
                                	<i class="fa fa-cubes"></i> All</a></li>
                                <li><a href="#ActiveComments" appdata-otype="sublink" 
                                	appdata-type="menulinkitem" 
                                	appdata-name="active_comments" 
                                	appdata-fa='<i class="fa fa-comments-o"></i>' 
                                	appdata-pcrumb="Comments">
                                	<i class="fa fa-asterisk"></i> Active</a></li>
                                <li><a href="#PendingComments" appdata-otype="sublink" 
                                	appdata-type="menulinkitem" 
                                	appdata-name="inactive_comments" 
                                	appdata-fa='<i class="fa fa-comments-o"></i>' 
                                	appdata-pcrumb="Comments">
                                	<i class="fa fa-clock-o"></i> Pending</a></li>
                                <li><a href="#Disabledcomments" appdata-otype="sublink" 
                                	appdata-type="menulinkitem" 
                                	appdata-name="disabled_comments" 
                                	appdata-fa='<i class="fa fa-comments-o"></i>' 
                                	appdata-pcrumb="Comments">
                                	<i class="fa fa-ban"></i> Disabled</a></li>
                              </ul>
                            </li>
                        </ul>
                    </li>
					
		            <li class="treeview">
		              <a href="../snippets/logout.php?type=admin" appdata-otype="mainlink" appdata-type="menulinkitem" appdata-name="logout">
		                <i class="fa fa-sign-out"></i> <span>Logout</span>
		              </a>
		            </li>
	          </ul>
	        </section>
	        <!-- /.sidebar -->
      </aside>

      <!-- =============================================== -->

      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1 appdata-name="notifylinkheader">
            Welcome
            <small>Administrator</small>
          </h1>
          <ol class="breadcrumb" appdata-name="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- end last surveys taken box -->
          <!-- sTATS box -->
          <div class="box">
	            <div class="box-header with-border">
	              <h3 class="box-title">Admin Panel</h3>
	              <div class="box-tools pull-right">
	                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
	                <!-- <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button> -->
	              </div>
	            </div>
	            <div class="box-body">
	            	<?php
	            		// set the default formtruetype value
						$formtruetype="qentries";
						$variant="createqentries";
						$inimaxupload=ini_get('post_max_size');
						$viewertype="admin";
						$qgsetdata=array();
						$qgsetdata["single"]["type"]="blockdeeprun";
						$qgsetdata['viewerdata']="WHERE status='active'";
						$qgsetdata['queryextra']=" EXISTS(SELECT * FROM qscentries WHERE 
							qgid=`qgroup`.`id` AND `qscentries`.`status`='active') OR 
							(type='sub' AND status='active')";
						$qgset=getAllQuestionGroups($viewertype,'all','blockdeeprun',$qgsetdata);
						$yout=produceOptionDates(1960,'current','Choose Year');
						
	            	?>
	            	<div class="row">
	            		<div class="col-lg-12">
	            			Welcome to your admin panel, please use the options to your left to carry out actions here
			            </div>
	            	</div>
        			<?php 
        				// var_dump($jsonenc);
        				// var_dump($jd);
        				// echo $jd['widget'];
        				// var_dump($testfunc);
        				// var_dump($primes);
        				echo $fnotoutput;
        				// echo $flooz2;
        				// echo stripslashes($flooz);
        			?>
	            </div><!-- /.box-body -->
	            <div class="box-footer">
	              
	            </div><!-- /.box-footer-->
          </div><!-- /.box -->
          <!-- Stats Box end -->
          <!-- form test box start -->
			<div class="box">
				<div class="box-body clearboth">
				    <div class="box-group" id="generaldataaccordion">
						<div class="panel box box-primary">
						    <div class="box-header with-border">
						        <h4 class="box-title">
						          <a data-toggle="collapse" data-parent="#generaldataaccordion" href="#NewPageManagerBlock">
						            <i class="fa fa-sliders"></i> New 
						          </a>
						        </h4>
						    </div>
						    <div id="NewPageManagerBlock" class="panel-collapse collapse in">
						        <div class="row">
						            <form name="<?php echo $formtruetype;?>" method="POST" 
						            	data-type="create" data-fdgen="true" 
						            	onSubmit="return false" 
						            	enctype="multipart/form-data" 
						            	action="<?php echo $host_addr;?>snippets/basicsignup.php">
										<input type="hidden" name="entryvariant" value="<?php echo $variant;?>"/>
										<!-- Question Group -->
										<div class="col-md-4">
			                            	<div class="form-group">
												<label>Choose Question Group</label>
												<div class="input-group select2-bootstrap-prepend">
													<div class="input-group-addon">
														<i class="fa fa-file-text-o"></i>
													</div>
													<select name="qgroupset" 
													data-name="select2plain"
													class="form-control">
														<?php echo $qgset['selectiondata'];?>
													</select>
												
												</div>
			                            	</div>
										</div>
										<!-- Course/Subject -->
										<div class="col-md-4">
			                            	<div class="form-group">
												<label>Choose Course/Subject</label>
												<div class="input-group select2-bootstrap-prepend
												select2-bootstrap-append">
													<div class="input-group-addon">
														<i class="fa fa-file-text-o"></i>
													</div>
													<select name="course" 
													data-name="select2plain"
													class="form-control">
														<option value=""
														>--Choose A Question Group First--</option>
													</select>
													<div class="input-group-addon rel">
				                                        <i class="fa fa-database"></i>
				                                        <img src="<?php echo $host_addr;?>images/loading.gif" class=" loadermask loadermini _igloader _upindex hidden"/>
				                                    </div>
												</div>
			                            	</div>
										</div>
										<!-- Question data Type -->
										<div class="col-md-4">
			                            	<div class="form-group">
												<label>Question Data type</label>
												<div class="input-group">
													<div class="input-group-addon">
														<i class="fa fa-code-fork"></i>
													</div>
													<select name="qdatatype" 
													class="form-control">
														<option value="plain"
														>Plain (Direct Question data entry)</option>
														<option value="media"
														>Media(Upload scanned question data)</option>
														
													</select>
												</div>
			                            	</div>
										</div>
										<!-- Question Data Type -->
										<div class="col-md-6">
			                            	<div class="form-group">
												<label>Question Entry type</label>
												<div class="input-group">
													<div class="input-group-addon">
														<i class="fa fa-code-fork"></i>
													</div>
													<select name="qdatatype" 
													class="form-control">
														<option value="mixed"
														>Mixed(Obj&Theory)</option>
														<option value="obj"
														>Objective Only</option>
														<option value="theory"
														>Theory Only</option>
													</select>
												</div>
			                            	</div>
										</div>

										<!-- Question Set date-->
										<div class="col-md-4">
			                            	<div class="form-group">
												<label>Select the Year/Date</label>
												<div class="input-group select2-bootstrap-prepend
												select2-bootstrap-append">
													<div class="input-group-addon">
														<i class="fa fa-calendar"></i>
													</div>
					                      			<input type="text" 
					                      			name="qdate" 
					                      			placeholder="Choose Date"
					                      			data-datepicker="true" 
					                      			class="form-control" />
												</div>
			                            	</div>
										</div>


										<!-- Questions data Section -->
										
										<!-- Question media entry-->
										<div class="col-md-12 qmediadata _qdsection">

											<!-- Questions image upload-->
											<div class="col-md-7">
												<h4>Upload Question Images</h4>
												<div class="col-sm-6 clearboth marginauto">
													<div class="form-group">
										                <label>Select Number of images to be uploaded</label>
										      			<div class="input-group">
												            <div class="input-group-addon">
												                <i class="fa fa-book"></i>
												            </div>
												            <input class="form-control" name="qmediacount" 
												            type="number" value="1" min="1" max="" 
												            data-valset="1" data-valcount="1" data-counter="true"/>
												          	<div class="input-group-addon nopadding">
												      														
											      				<a href="##" data-type="" 
										                		data-name="qmediacount_addlink" 
										                		data-i-type="" 
										                		data-limit=""
											      				onclick="multipleElGenerator('form[name=<?php echo $formtruetype;?>] a[data-name=qmediacount_addlink]','','form[name=<?php echo $formtruetype;?>] div.qmedia-field-hold',$('form[name=<?php echo $formtruetype;?>] div.qmedia-field-hold .multi_content_hold').length,$('form[name=<?php echo $formtruetype;?>] input[name=qmediacount]').val(),'form[name=<?php echo $formtruetype;?>] input[name=qmediacount]')" class="bs-igicon blockdisplay bg-gradient-darkgreen background-color-darkgreen background-color-orangehover bg-orange-gradienthover color-white color-darkredhover">
											                    	<i class="fa fa-arrow-right"></i>
											      				</a>
												            </div>
												        </div>
										  			</div>
										  		</div>
												<div class="col-md-12 qmedia-field-hold float-none">
													<div class="col-sm-6 multi_content_hold" data-type="triggerprogenitor" data-cid="1" data-name="qmedia">
														<div class="form-group">
															<label class="multi_content_countlabels"
																>Question Image <small>Entry 1</small>
															</label>
															<div class="input-group">
																<div class="input-group-addon">
																	<i class="fa fa-file-image-o"></i>
																</div>
																<input type="file" onchange="isPrev($(this))"
																placeholder="Choose image" 
																name="qimage1" 
																class="form-control"/>
															</div>
														</div>
													</div>
													<div name="qmediaentrypoint" data-marker="true"></div>
						                        	<input name="qmediadatamap" 
						                        	type="hidden" data-map="true" 
						                        	value="qimage-:-input">
												</div>
											</div>
											
											<!-- Questions Onjective answer Section -->
											<div class="col-md-5">
											</div>
										</div><!-- /.col -->

										<!-- Plain data entry -->
										<div class="col-md-12 qplaindata _qdsection hidden">
							              	<!-- Custom Tabs (Pulled to the right) -->
							              	<div class="nav-tabs-custom _fcustomized">
								                <ul class="nav nav-tabs pull-right">
													<li>
														<a href="#tab_1-2" class="_mdsize" data-toggle="tab">Theory Section</a>
													</li>
													<li class="active">
														<a href="#tab_1-1" class="_mdsize" data-toggle="tab">Objective Section</a>
													</li>
													<li class="pull-left header">
														<i class="fa fa-question-circle"></i> Question Data Entries
													</li>
								                </ul>
								                <div class="tab-content">
								                	<!-- Objective Section -->
									                <div class="tab-pane active" id="tab_1-1">
									                	<!-- Start sub-questiongroup entry section accordion -->
								                        	<div class="col-md-12 objentry-field-hold float-none">
								                            	<input type="hidden" name="objentrycount" class="form-control" value="1" data-counter="true"/>
									                        	<!-- <h3>Maximum of 10 images at a time</h3> -->
									                        	<div class="col-md-12 multi_content_hold" data-type="triggerprogenitor" data-cid="1" data-name="objentry">
								                        			<!-- main question section -->
								                        			<div class="col-sm-7">
								                        				<div class="col-xs-12">
								                        					<h4 class="multi_content_countlabels pull-left"
								                        						>(Entry 1)
								                        					</h4>
								                        					<div class="_qoptions pull-right">
								                        						
								                        						<div class="_qoption _wide">
								                        							<span class="fileinput-button btn btn-primary ">
								                        								<i class="fa fa-plus qofdata"></i>
								                        								<span>Attach Image</span>
								                        								<input type="file" name="fattach1" 
								                        								title="Attach Image"
								                        								data-tip="Attach Image"/>
								                        								<!-- fileviewer -->
								                        								<a href="##" data-src="" class="qoptimgprev"
								                        								data-lightbox="img2{gc_x}">
								                        									<i class="fa fa-plus qofdata _view hidden"></i>
								                        								</a>
								                        							</span>
								                        						</div>
								                        					</div>
								                        				</div>
								                        				<div class="col-xs-12 _objquestionsection">
								                        					<div class="form-group">
				                              									<textarea class="form-control" rows="5" name="question1" placeholder="Optional Description"></textarea>

								                        					</div>
								                        				</div>
								                        				<div class="col-xs-12 _editoptionsection">
								                        				</div>
								                        			</div>
								                        			<!-- Question options -->
								                        			<div class="col-sm-5">

								                        			</div>
									                        		
									                        		
									                        	</div>
									                        	<div name="objentryentrypoint" data-marker="true"></div>
									                        	<input name="objentrydatamap" 
									                        	type="hidden" data-map="true" 
									                        	value="title-:-input<|>acronymini-:-input<|>description-:-textarea">
									                        	<a href="##" class="generic_addcontent_trigger" 
									                        		data-type="triggerformaddlib" 
									                        		data-name="objentrycount_addlink" 
									                        		data-i-type="" 
									                        		data-limit="100"> 
									                        		<i class="fa fa-plus"></i>Add More?
									                        	</a>
								                            </div>
								                        <!-- end edit section accordion -->
									                </div><!-- /.tab-pane -->

								                  	<div class="tab-pane" id="tab_1-2">
								                  		<!-- Theory Section -->


								                    </div><!-- /.tab-pane -->

								                </div><!-- /.tab-content -->

								            </div><!-- nav-tabs-custom -->
								        </div><!-- /.col -->

		                                
			                            <input type="hidden" name="extraformdata" 
			                            value="qgrouptitle-:-input<|>
			                            acronym-:-input<|>
			                            profpic-:-input|image<|>
			                            details-:-textarea<|>

			                            egroup|data-:-[subqgroupcount>|<
					                    title-|-input>|<
					                    acronymini-|-input>|<
					                    description-|-textarea]-:-groupfall[1]-:-[single-|-grouptype-|-select-|-hassubgroup-|-title]<|>

					                    egroup|data-:-[csgroupscount>|<
					                    coursetitle-|-input>|<
					                    duration-|-input]-:-groupfall[1,2]-:-[single-|-grouptype-|-select-|-hassubject-|-coursetitle]<|>
			                            seometakeywords-:-textarea<|>
			                            seodescription-:-textarea"/>
					                    <input type="hidden" name="errormap" value="qgrouptitle-:-Please provide the title for this question group<|>
					                    acronym-:-Please State the acronym for this exam type<|>
					                    profpic-:-NA<|>
			                            details-:-Please give a good description for the current question group<|>
						                egroup|data-:-[Please give the subgroup title>|<NA>|<NA]<|>
					                    egroup|data-:-[Please give the course/subject title>|<
					                    Specify the duration for this course/subject entry examination/test]<|>
					                    seometakeywords-:-NA<|>
					                    seodescription-:-NA"/>
						                <div class="col-md-12 clearboth">
							                <div class="box-footer">
							                    <input type="button" class="btn btn-danger" name="createentry" data-formdata="<?php echo $formtruetype;?>" onclick="submitCustom('<?php echo $formtruetype;?>','complete')" value="Create/Update"/>
							                     <small>Maximum file upload size for server is:<?php echo $inimaxupload;?></small>
							                </div>
							            </div>
					            	</form>	
						        </div>
						    </div>
						    <script data-type="multiscript">
						    	$(document).ready(function(){
									var curmceadminposter=[];
									curmceadminposter['width']="100%";
									curmceadminposter['height']="650px";
									curmceadminposter['toolbar1']="undo redo | bold italic underline | fontselect fontsizeselect | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect";
									curmceadminposter['toolbar2']="| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ";
									callTinyMCEInit("textarea#adminposter",curmceadminposter);
									
									var curmcethreeposter=[];
									curmcethreeposter['width']="100%";

									curmcethreeposter['height']="300px";
									curmcethreeposter['toolbar2addon']=" | preview code ";
									callTinyMCEInit("textarea[id*=postersmallthree]",curmcethreeposter);
									var curmcethreeposter=[];
									curmcethreeposter['width']="100%";

									curmcethreeposter['height']="300px";
									curmcethreeposter['toolbar2addon']=" | preview code ";
									callTinyMCEInit("textarea[id*=postersmalltwo]",curmcethreeposter);
									// init inputmask
									if($.fn.inputmask){
        								$(".timemask,[data-timemask]").inputmask("hh:mm", {"placeholder": "hh:mm"});
									}
									// init select2
									if($.fn.select2){
										$('select[data-name=select2plain]').select2({
										    theme: "bootstrap"
										});
										$('select[data-name=faselect]').select2({
										    theme: "bootstrap",
										    templateResult: faSelectTemplate
										});
									}
									
								});
							</script>
						</div>
						<div class="panel box overflowhidden box-primary">
						    <div class="box-header with-border">
						      <h4 class="box-title">
						        <a data-toggle="collapse" data-parent="#generaldataaccordion" href="#EditBlock">
						          <i class="fa fa-gear"></i> Edit 
						        </a>
						      </h4>
						    </div>
						    <div id="EditBlock" class="panel-collapse collapse ">
						      <div class="box-body">
						          <div class="row">
						            <div class="col-md-12">
						              <?php
						                // echo $outsdata['adminoutput'];
						              ?>
						            </div>
						        </div>
						      </div>
						    </div>
						</div>
					</div>
				</div>
				<script>
				
				</script>

			</div>
          <!-- form test box end -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Administrator Central.</b>
        </div>
        <strong>Copyright &copy; 2014-<?php echo date('Y');?> <a href="##">Cheet</a>.</strong> All rights reserved. Developed by Okebukola Olagoke, Dream Bench Technologies.
      </footer>
    </div><!-- ../wrapper -->

    
    <!-- Bootstrap 3.3.2 JS -->
    <script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- jplayer -->
	<script src="../plugins/jPlayer/jquery.jplayer.min.js"></script>
    <!-- Moment js -->
    <script src="<?php echo $host_addr;?>plugins/moment/moment.js" type="text/javascript"></script>
	<!-- jquery ui widget -->
	<script src="../plugins/jQueryUI/jquery.ui.widget.js"></script>
    <script src="../scripts/mylib.js" type="text/javascript"></script>
    <script src="../scripts/formchecker.js" type="text/javascript"></script>
    <script src="../scripts/homonculusadmin.js" type="text/javascript"></script>
    <!-- SlimScroll -->
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='../plugins/fastclick/fastclick.min.js'></script>
    <!-- DATA TABES SCRIPT -->
    <script src="../plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="../plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
    <!-- InputMask -->
    <script src="../plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
    <script src="../plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
    <script src="../plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>
	<!-- bootstrap time picker -->
    <script src="../plugins/timepicker/bootstrap-timepicker.min.js" type="text/javascript"></script>
    <!-- Bootstrap Slider -->
    <script src="../plugins/bootstrap-slider/bootstrap-slider.js" type="text/javascript"></script>
    <!-- Select2 (Selection customizer) -->
    <script src='<?php echo $host_addr;?>plugins/select2/dist/js/select2.full.min.js'></script>
    <!-- date-range-picker -->
	<script src="../plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
	<!-- // <script src="../plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script> -->
    <!-- iCheck 1.0.1 -->
    <script src="../plugins/iCheck/icheck.min.js" type="text/javascript"></script>

    <script src="../plugins/knob/jquery.knob.js" type="text/javascript"></script>
    <!-- Bootstrap Slider -->
    <script src="../plugins/bootstrap-slider/bootstrap-slider.js" type="text/javascript"></script>
    <!-- Sparkline -->
    <script src="../plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    
	<!-- bootstrap Date-time picker -->
    <script src="<?php echo $host_addr;?>plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.js" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.js" type="text/javascript"></script>
    <script src="../scripts/lightbox.js" type="text/javascript"></script>
	<script language="javascript" type="text/javascript" src="../scripts/lib/tinymce/jquery.tinymce.min.js"></script>
    <script language="javascript" type="text/javascript" src="../scripts/lib/tinymce/tinymce.min.js"></script>
    <script language="javascript" type="text/javascript" src="../scripts/lib/tinymce/basic_config.js"></script>
	
	<!-- end -->
  </body>
</html>