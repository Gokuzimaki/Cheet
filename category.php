<?php 
session_start();
include('./snippets/connection.php');
$activepage="Categories";
$blogcategoryid="";
$blogsingle="";
$blogname="";
$blogout=array();
if(isset($_GET['cid'])&&is_numeric($_GET['cid'])){
$blogcategoryid=$_GET['cid'];
	$testquery="SELECT * FROM blogcategories WHERE id=$blogcategoryid";
$testrun=mysql_query($testquery)or die(mysql_error()." Line 91");
$testnumrows=mysql_num_rows($testrun);
if($testnumrows<1){
	header('location:index.php');
}
$blogsingle=getSingleBlogCategory($blogcategoryid);
$blogtype=getSingleBlogType($blogsingle['blogtypeid']);
$blogname=$blogtype['name'];
unset($_SESSION['cid']);
$_SESSION['cid']=$blogcategoryid;

$blogout=getAllBlogEntries("viewer","",$blogcategoryid,"category");
// echo $blogcategoryid;
// echo "<br>".$blogout['chiefquery'];
$outs=paginate($blogout['chiefquery']);
}elseif(isset($_SESSION['cid'])&&$_SESSION['cid']!==""&&is_numeric($_SESSION['cid'])){
$blogcategoryid=$_SESSION['cid'];
$blogsingle=getSingleBlogCategory($blogcategoryid);
$blogtype=getSingleBlogType($blogsingle['blogtypeid']);
$blogname=$blogtype['name'];
$blogout=getAllBlogEntries("viewer","",$blogcategoryid,"category");
$outs=paginate($blogout['chiefquery']);
}else{
	header('location:index.php');
}
$subimgpos='';
$blogbanner="";
$blogthemestyle="blogpg";
$topdisp="";
$maincontentstyle="";
$descriptor="";
$subscribe='
Subscribe to the category <b>'.$blogsingle['catname'].'</b> of the <b>'.$blogname.'</b> blog.
<form name="csiblogsubscription" method="POST" onSubmit="return false;" action="./snippets/basicsignup.php">
	<input type="hidden" name="entryvariant" value="categorysubscription"/>
	<input type="hidden" name="categoryid" value="'.$blogcategoryid.'"/>
	<div id="formend"><input type="text" style="text-align:center;"name="email" placeholder="Enter email here..." value=""class="curved"/></div>
	<div id="formend"><input type="button" class="submitbutton" name="categorysubscription" value="Subscribe"/></div>
</form>
';
?>
<!DOCTYPE html/>
<html>
<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo $blogsingle['catname']." | ".$blogname?></title>
<meta name="keywords" content="<?php echo $blogsingle['catname'].", ".$blogname?>?>"/>
<meta name="description" content="<?php echo $descriptor?>">
<link rel="stylesheet" href="./stylesheets/font-awesome/css/font-awesome.min.css"/>
<link rel="stylesheet" href="./jquerymobile/jquery.mobile-1.4.4.css"/>
<link rel="stylesheet" href="./stylesheets/ba.css"/>
<link rel="stylesheet" href="./stylesheets/baresponsive.css"/>
<link rel="icon" href="./images/logoicon.ico" sizes="16x16 32x32 64x64" type="image/vnd.microsoft.icon">
<script src="./scripts/jquery.js"></script>
<script src="./scripts/mylib.js"></script>
<script src="./scripts/ba.js"></script>
<script src="./scripts/responsice.js"></script>
<script src="./scripts/formchecker.js"></script>
<?php include('./snippets/tinymce.php');?>
<?php //include_once("./snippets/ga.php");?>

</head>
<body>
	<div id="main" appdata-name="<?php echo $blogthemestyle;?>" data-role="page">
	<?php include("./snippets/facebooksdk.php");?>
		<?php include "./snippets/panelsnippet.php";?>
		<div id="toppanel">
			<div id="toppanelmain">
			<div id="mainlogopanel">
				<img class="extraclass" src="./images/bayonlearashi.png"/>
			</div>
			<div id="linkspanel">
				<ul>
					<?php include("./snippets/toplinks.php");?>
				</ul>
			</div>
						<?php include("./snippets/responsivelinkpaneldisplay.php");?>
			
			</div>
		</div>
<div id="contentpanel">
	<div id="contentpanelcontentleft">
		<?php echo $topdisp;?>
			<div id="paginationhold">
				<div class="meneame">
					<div class="pagination"><?php  echo $outs['pageout']; ?></div>
					<div class="pagination">
						<?php echo $outs['usercontrols'];?>
					</div>
				</div>
			</div>
			<?php
			if($blogout['numrows']>0){
				$blogout2=getAllBlogEntries("viewer",$outs['limit'],$blogcategoryid,"category");
				echo $blogout2['vieweroutput'];
			}else{
				echo "No Entries for this category yet";
			}				
			?>
			<div id="paginationhold">
				<div class="meneame">
					<div class="pagination"><?php echo $outs['pageout']; ?></div>
				</div>

			</div>		
	</div>
		<div id="contentpanelcontentright">
			<div id="adcontentholdlong" name="popularposts">
				<div class="contentholdertitle">Popular Posts</div>
				<?php echo $blogout['popularposts'];?>
			</div>
			<div id="adcontentholdlong" name="feedjit">
				
				<?php include './snippets/feedjit.php';?>  
			</div>
<!-- 			<div id="adcontentholdshort" name="subscription">
				Subscribe<br>
					<?php echo $subscribe;?>
			</div> -->
			<div id="adcontentholdshort" name="sportstango">
				<div class="contentholdertitle">Sports Tango</div>
				<img src="./images/sporttangoimg.png" class="tangosideimg"/>
			</div>

			<div id="adcontentholdlong" name="facebooklikebox">
				<div class="contentholdertitle">MIDAS ON FACEBOOK</div>
				<div class="fb-like-box" data-href="https://www.facebook.com/midasfootballacademy" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="true" data-show-border="true"></div>
			</div>
		</div>
	</div>
</div>
	<div id="footerpanel">
		<div id="footerpanelcontent">
			<div id="copyright">
	<?php include('./snippets/footer.php');?>
			</div>
		</div>
	</div>
	</div>
</body>
</html>