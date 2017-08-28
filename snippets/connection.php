<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
require_once 'paginator.class.php';
require_once "gifresizer.class.php";    //Including our class $host_addr="http://localhost/muyiwasblog/";
require_once 'html2text.class.php';
require_once('php_image_magician.php');
require_once "SocialAutoPoster/SocialAutoPoster.php";
// require_once('tmhOAuth-master/tmhOAuth.php');
require 'PHPMailer-master/PHPMailerAutoload.php';
date_default_timezone_set("Africa/Lagos");
$host_cur_page = 'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . "{$_SERVER['HTTP_HOST']}/{$_SERVER['REQUEST_URI']}";
$host_target_addr="http://".$_SERVER['HTTP_HOST']."/";
$host_addr="http://localhost/cheetmini/";
$host_email_addr="no-reply@cheet.org";
$host_rendername="cheet";

// setup smtp default values for sending blog emails out
// via the server provided details
$host_smtp="relay-hosting.secureserver.net";
$host_smtp_email="no-reply@dreambench.com";
$host_smtp_username="no-reply@dreambench.com";
$host_smtp_pwrd="noreply";

$host_keywords="";
$host_env="local";
$host_blog_catpost_max=6;

// filemanager for blog upload section
$host_name="cheetmini";
//variable for holding filemanager header title
$host_website_name="Cheet";  

//variable for holding filemanager header title
$host_default_blog_name="Cheet Blog";  

//variable for holding filemanager header title
$host_admin_title_name="Cheet Admin";  

//variable for holding default name of the site owner
$host_title_name="Cheet";  

//variable for holding the host default filemanager upload dir
$host_relative_upload_dir='/cheetmini/media/multimedia/'; 

// relative path to the fileupload section  
$host_current_path='../../media/multimedia/'; 

$host_thumbs_base_path='../../media/thumbs/';
/*Social block*/
// links to social address
$host_social_instagram='##';

// plain file manager config variables for website media
$host_media_content_dir='';

// basic global variable for controlling redirects due to multiple administrators
// $rurladmin="nourl";

//set to true on upload to allow emails be sent when actions are carried out
$host_email_send=false;

// database setup variable
$hostname_pvmart = "localhost";
$db = "cheet";
$username_pvmart = "root";
//change pword when uploading to live server
$password_pvmart = "";

// &#8358; - naira symbol

/*controlblock
  this block is used to change several '$host_' variables that are crucial
  to file management and database access
*/
if(strpos($host_target_addr, "localhost/")){
  // for local server
  $host_addr="http://localhost/cheetmini/";
}else if(strpos($host_target_addr, "ngrok.io/dreambench")){
  $host_test="ngrok1";
  $host_addr=$host_target_addr!=="http://"&&$host_target_addr!=="https://"?$host_target_addr."":"http://dreambench.io/";
  header("Access-Control-Allow-Origin: *");
  $host_env="online";

}else if(strpos($host_target_addr, "ngrok.io")){
  $host_test="ngrok2";
  $host_addr=$host_target_addr!=="http://"&&$host_target_addr!=="https://"?
  $host_target_addr."cheetmini/":"http://cheet.org/";
  header("Access-Control-Allow-Origin: *");
  $host_env="online";

}else if(strpos($host_target_addr, "ngrok")){
  $host_test="ngrok3";
  $host_addr=$host_target_addr!=="http://"&&$host_target_addr!=="https://"?
  $host_target_addr."cheetmini/":"http://cheet.org/";
  header("Access-Control-Allow-Origin: *");
  $host_env="online";
  
}else{
  $host_env="online";
  $host_relative_upload_dir='/media/multimedia/'; //variable for holding the host default filemanager upload dir
  $host_current_path='../../media/multimedia/'; // relative path to the fileupload section  
  $host_thumbs_base_path='../../media/thumbs/';
  // for remote server
  $host_addr=$_SERVER['HTTP_HOST']!==""&&isset($_SERVER['HTTP_HOST'])?$host_target_addr:"http://dreambench.io/";
  $host_email_send=true;
  $hostname_pvmart = "localhost";
  $db = "dreambench";
  $username_pvmart = "dreambenchdb";
  //change pword when uploading to server
  $password_pvmart = 'Admin!p@55';
}





$host_servertype="windows";
// check if server is windows or linux
if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
    $host_servertype="windows";
} else {
    $host_servertype="linux";
}

if($host_servertype=="windows"){
  $host_tpathplain=dirname(__FILE__).'\\';
  $host_tpath=dirname(__FILE__)."\..\\";
  
}else{
  $host_tpathplain=dirname(__FILE__)."/";
  $host_tpath=dirname(__FILE__)."/../";
}

// set the default renderpath
$host_renderpath=$host_tpathplain."".$host_rendername."snippets/";

// set the default site logo url
$host_logo_image=$host_addr."images/logo_text_dark.png";
$host_favicon='<link rel="shortcut icon" href="'.$host_addr.'images/favicon.ico" 
sizes="64x64" type="image/vnd.microsoft.icon">';

$host_default_cover_image=$host_addr."images/dbp_1.jpg";
$logpart=md5($host_addr);
// default counter variable for mini content, e.g blog displays in sidebars etc
$host_minipagecount=5;
// mysql_connect
$host_conn = @mysql_connect($hostname_pvmart, $username_pvmart, $password_pvmart) or 
die(mysql_error());
// connect the database
mysql_select_db($db) or die ("Unable to select database!");
// mysqli_connect
$host_connli = mysqli_connect($hostname_pvmart, $username_pvmart, $password_pvmart, $db)
or die("Connection Failed");
mysqli_select_db($host_connli,$db);
/*end*/


include_once('utilities.php');
include_once('Gravatar.php');
include_once('adminusersmodule.php');
// include('usermodule.php');
include_once('modules/usermoduleadvanced.php');
include_once('storemodule.php');
include_once('generaldatamodule.php');
// include_once('blogpagemodule.php');
// include_once('modules/shortcodes.php');
include_once('modules/blogpagemoduleadvanced.php');
include_once('publishpost.php');
include_once('modules/notificationsmodule.php');
// include_once('homebannermodule.php');
// include_once('managementteammodule.php');
// include_once('clientandrecommendationmodule.php');
include_once('eformparsermodule.php');
include_once('contactsmodule.php');
include_once('eventsmodule.php');
include_once('gallerymodule.php');
include_once('modules/portfoliomodule.php');
include_once('modules/widget_func.php');
include_once('faqmodule.php');
// bring in application specific modules here
include_once('modules/appmodules/questionsmodule/questionsmodule.php');
// print memory_get_usage(true)." :memory usage";
?>