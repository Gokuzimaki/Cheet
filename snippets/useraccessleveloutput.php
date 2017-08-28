<?php
	// menu option block
	$uservice="none";
	$ubookings="none";
	$utestimony="none";
	$umessages="none";
	$ucomments="none";
	// echo md5(3);
	/*Options
	* 1 = create/edit user
	* 2 = create/edit home page banner
	* 3 = create/edit About
	* 4 = create/edit Management team
	* 5 = create/edit products and services
	* 6 = create/edit investor relations
	* 7 = create/edit photo gallery
  * 8 = create/edit Awards
  * 14 = create/edit Careers
	* 15 = create/edit Contact
	* 9 = create/edit faq
	* 10 = create/edit blogtype
	* 11 = create/edit blogcategory
	* 12 = create/edit blogpost
	* 13 = create/edit comments
	*/
	$optioncount=15;
	$styleout=array();
	// set the default access levels
	for($i=1;$i<=$optioncount;$i++){
		$styleout[$i]='';
	}
	$accesslevel=$admindata['accesslevel'];
	if($accesslevel==0){
    // $styleout[9]='style="display:none;"';
	}else if ($accesslevel==1) {
		# code...
		$styleout[1]='style="display:none;"';
    $styleout[10]='style="display:none;"';
		// $styleout[9]='style="display:none;"';

	}
	$comquery="SELECT * FROM comments WHERE status='inactive'";
	$comrun=mysql_query($comquery)or die(mysql_error()." Line 16");
	$comrows=mysql_num_rows($comrun);
	$comrows>0?$ucomments="":$ucomments=$ucomments;
	$fullcomout=$comrows>0?'<small class="label pull-right bg-red mainsmall">'.$comrows.'</small>':"";
	$panelcontrolstyle['options']='
		<li class="treeview" '.$styleout[1].'>
          <a href="#" appdata-otype="mainlink" appdata-type="">
          <i class="fa fa-user"></i> <span>Users</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="#New" appdata-otype="sublink" appdata-type="menulinkitem" appdata-name="newuser" appdata-crumb=\'New User\' appdata-fa=\'<i class="fa fa-user"></i>\' appdata-pcrumb="User"><i class="fa fa-plus"></i> New</a></li>
            <li><a href="#Edit" appdata-otype="sublink" appdata-type="menulinkitem" appdata-name="edituser" appdata-crumb=\'Edit User\' appdata-fa=\'<i class="fa fa-user"></i>\' appdata-pcrumb="User"><i class="fa fa-gear"></i> Edit</a></li>
          </ul>
        </li>
        <li class="treeview" '.$styleout[2].'>
          <a href="#" appdata-otype="mainlink" appdata-type="menulinkitem" appdata-name="homebanners" appdata-fa=\'<i class="fa fa-home"></i>\' appdata-pcrumb="Home">
          	<i class="fa fa-file-image-o"></i> <span>Home Banner</span>
          </a>
        </li>
        <li class="treeview" '.$styleout[3].'>
          <a href="#" appdata-otype="mainlink">
            <i class="fa fa-tasks"></i> <span>About</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="#History" appdata-otype="sublink" appdata-type="menulinkitem" appdata-name="history" appdata-crumb="History" appdata-fa=\'<i class="fa fa-info"></i>\' appdata-pcrumb="About"><i class="fa fa-calendar-o"></i> History</a></li>
            <li><a href="#HistoryTab" appdata-otype="sublink" appdata-type="menulinkitem" appdata-name="historytab" appdata-crumb="History" appdata-fa=\'<i class="fa fa-info"></i>\' appdata-pcrumb="About"><i class="fa fa-gear"></i> History Tab</a></li>
            <li><a href="#Mission" appdata-otype="sublink" appdata-type="menulinkitem" appdata-name="mission" appdata-crumb="Mission" appdata-fa=\'<i class="fa fa-info"></i>\' appdata-pcrumb="About"><i class="fa fa-rocket"></i> Mission</a></li>
            <li><a href="#MissionTab" appdata-otype="sublink" appdata-type="menulinkitem" appdata-name="missiontab" appdata-crumb="Mission Tab" appdata-fa=\'<i class="fa fa-info"></i>\' appdata-pcrumb="About"><i class="fa fa-rocket"></i> Mission Tab</a></li>
          </ul>
        </li>
		<li class="treeview" '.$styleout[4].'>
          <a href="#" appdata-otype="mainlink" appdata-type="">
            <i class="fa fa-group"></i> <span>Management Team</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="#New/Edit" appdata-otype="sublink" appdata-type="menulinkitem" appdata-name="newteam" appdata-crumb="Create/Edit Team Member" appdata-fa=\'<i class="fa fa-gift"></i>\' appdata-pcrumb="Management Team"><i class="fa fa-plus"></i> New/Edit</a></li>
            <!-- <li><a href="#Edit" appdata-otype="sublink" appdata-type="menulinkitem" appdata-name="editedit" appdata-crumb="Edit Team Member" appdata-fa=\'<i class="fa fa-gear fa-spin"></i>\' appdata-pcrumb="Management Team"><i class="fa fa-gear"></i> Edit</a></li> -->
          </ul>
        </li>
        <li class="treeview" '.$styleout[5].'>
          <a href="#" appdata-otype="mainlink" appdata-type="">
            <i class="fa fa-gears"></i> <span>Products & Services</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="#New" appdata-otype="sublink" appdata-type="menulinkitem" appdata-name="productservices" appdata-crumb="Create Product/Service" appdata-fa=\'<i class="fa fa-gift"></i>\' appdata-pcrumb="Products And Services"><i class="fa fa-plus"></i> New</a></li>
            <!-- <li><a href="#Edit" appdata-otype="sublink" appdata-type="menulinkitem" appdata-name="productservices" appdata-crumb="Edit Product/Service" appdata-fa=\'<i class="fa fa-gear fa-spin"></i>\' appdata-pcrumb="Products And Services"><i class="fa fa-gear"></i> Edit</a></li> -->
          </ul>
        </li>
        <li class="treeview" '.$styleout[6].'>
          <a href="#" appdata-otype="mainlink" appdata-type="">
            <i class="fa fa-gift"></i> <span>Investor Relations</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="#Financial Highlights" appdata-otype="sublink" appdata-type="menulinkitem" appdata-name="financialhighlights" appdata-crumb="Financial Highlights" appdata-fa=\'<i class="fa fa-gift"></i>\' appdata-pcrumb="Investor Relations"><i class="fa fa-street-view"></i> Financial Highlights</a></li>
            <li><a href="#Financial Highlights" appdata-otype="sublink" appdata-type="menulinkitem" appdata-name="financialhighlightstab" appdata-crumb="Financial Highlights" appdata-fa=\'<i class="fa fa-gift"></i>\' appdata-pcrumb="Investor Relations"><i class="fa fa-street-view"></i> Financial Highlights Tab</a></li>
            <li><a href="#Annual Report" appdata-otype="sublink" appdata-type="menulinkitem" appdata-name="annualreport" appdata-crumb="Annual Repoty" appdata-fa=\'<i class="fa fa-gear fa-spin"></i>\' appdata-pcrumb="Investor Relations"><i class="fa fa-plus"></i> Annual reports</a></li>
            <li><a href="#Annual Report" appdata-otype="sublink" appdata-type="menulinkitem" appdata-name="annualreporttab" appdata-crumb="Annual Repoty" appdata-fa=\'<i class="fa fa-gear fa-spin"></i>\' appdata-pcrumb="Investor Relations"><i class="fa fa-plus"></i> Annual reports Tab</a></li>
            <li><a href="#Balance Sheet" appdata-otype="sublink" appdata-type="menulinkitem" appdata-name="balancesheet" appdata-crumb="Balance Sheet" appdata-fa=\'<i class="fa fa-gear fa-spin"></i>\' appdata-pcrumb="Investor Relations"><i class="fa fa-gear"></i> Balance Sheet </a></li>
            <li><a href="#Balance Sheet" appdata-otype="sublink" appdata-type="menulinkitem" appdata-name="balancesheettab" appdata-crumb="Balance Sheet" appdata-fa=\'<i class="fa fa-gear fa-spin"></i>\' appdata-pcrumb="Investor Relations"><i class="fa fa-gear"></i> Balance Sheet Tab</a></li>
            <li><a href="#Profit and Loss" appdata-otype="sublink" appdata-type="menulinkitem" appdata-name="profitandloss" appdata-crumb="Profit & Loss" appdata-fa=\'<i class="fa fa-gear fa-spin"></i>\' appdata-pcrumb="Investor Relations"><i class="fa fa-gear"></i> Profit and Loss</a></li>
            <li><a href="#MissionTab" appdata-otype="sublink" appdata-type="menulinkitem" appdata-name="profitandlosstab" appdata-crumb="Mission Tab" appdata-fa=\'<i class="fa fa-info"></i>\' appdata-pcrumb="About"><i class="fa fa-rocket"></i> Profit & Loss Tab</a></li>
          </ul>
        </li>
        <li class="treeview" '.$styleout[7].'>
          <a href="#" appdata-otype="mainlink" appdata-type="">
            <i class="fa fa-file-image-o"></i> <span>Photo Gallery</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="#Add/Edit Gallery" appdata-otype="sublink" appdata-type="menulinkitem" appdata-name="photogallery" appdata-crumb="New Gallery Entry" appdata-fa=\'<i class="fa fa-plus"></i>\' appdata-pcrumb="Photo Gallery"><i class="fa fa-street-view"></i> Photo Galleries</a></li>

          </ul>
        </li>
        <li class="treeview" '.$styleout[8].'>
          <a href="#" appdata-otype="mainlink" appdata-type="">
            <i class="fa fa-trophy"></i> <span>Awards</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="#Create/Edit Award" appdata-otype="sublink" appdata-type="menulinkitem" appdata-name="awards" appdata-crumb="Create/Edit Awards" appdata-fa=\'<i class="fa fa-trophy"></i>\' appdata-pcrumb="Awards"><i class="fa fa-plus"></i> Create/Edit Awards</a></li>

          </ul>
        </li>
        <li class="treeview" '.$styleout[15].'>
          <a href="#" appdata-otype="mainlink" appdata-type="">
            <i class="fa fa-location-arrow"></i> <span>Contact</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="#NewBranchEntry" appdata-otype="sublink" appdata-type="menulinkitem" appdata-name="newbranch" appdata-crumb="Create Branch" appdata-fa=\'<i class="fa fa-map-marker"></i>\' appdata-pcrumb="Branches"><i class="fa fa-plus"></i> Create/Edit Branch</a></li>
            <!--<li><a href="#EditBranchEntry" appdata-otype="sublink" appdata-type="menulinkitem" appdata-name="editbranch" appdata-crumb="Edit Branch" appdata-fa=\'<i class="fa fa-map-marker"></i>\' appdata-pcrumb="Branches"><i class="fa fa-gears"></i> Edit Branches</a></li>-->

          </ul>
        </li>
        <li class="treeview" '.$styleout[9].'>
          <a href="#" appdata-otype="mainlink">
            <i class="fa fa-question"></i> <span>FAQ</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="#New" appdata-otype="sublink" appdata-type="menulinkitem" appdata-name="newfaq" appdata-crumb="New FAQ" appdata-fa=\'<i class="fa fa-question"></i>\' appdata-pcrumb="Frequently Asked Questions"><i class="fa fa-plus"></i> New FAQ</a></li>
            <li><a href="#Edit" appdata-otype="sublink" appdata-type="menulinkitem" appdata-name="editfaq" appdata-crumb="Edit FAQ" appdata-fa=\'<i class="fa fa-question"></i>\' appdata-pcrumb="Frequently Asked Questions"><i class="fa fa-gear"></i> Edit FAQ</a></li>
          </ul>
        </li>
        <li class="treeview" '.$styleout[10].'>
          <a href="#" appdata-otype="mainlink" >
            <i class="fa fa-sliders"></i> <span>Blog Type</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="#New" appdata-otype="sublink" appdata-type="menulinkitem" appdata-name="newblogtype" appdata-fa=\'<i class="fa fa-sliders"></i>\' appdata-pcrumb="Blog Type"><i class="fa fa-plus"></i> New</a></li>
            <li><a href="#Edit" appdata-otype="sublink" appdata-type="menulinkitem" appdata-name="editblogtype" appdata-fa=\'<i class="fa fa-sliders"></i>\' appdata-pcrumb="Blog Type"><i class="fa fa-gear"></i> Edit</a></li>
          </ul>
        </li>
        <li class="treeview" '.$styleout[11].'>
          <a href="#" appdata-otype="mainlink" >
            <i class="fa fa-sitemap"></i> <span>Blog Category</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="#New" appdata-otype="sublink" appdata-type="menulinkitem" appdata-name="newblogcategory" appdata-fa=\'<i class="fa fa-sitemap"></i>\' appdata-pcrumb="Blog Category"><i class="fa fa-plus"></i> New</a></li>
            <li><a href="#Edit" appdata-otype="sublink" appdata-type="menulinkitem" appdata-name="editblogcategory" appdata-fa=\'<i class="fa fa-sitemap"></i>\' appdata-pcrumb="Blog Category"><i class="fa fa-gear"></i> Edit</a></li>
          </ul>
        </li>
        <li class="treeview" '.$styleout[12].'>
          <a href="#" appdata-otype="mainlink" >
            <i class="fa fa-newspaper-o"></i> <span>Blog Post</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="#New" appdata-otype="sublink" appdata-type="menulinkitem" appdata-name="newblogpost" appdata-fa=\'<i class="fa fa-text"></i>\' appdata-pcrumb="Blog Post"><i class="fa fa-plus"></i> New</a></li>
            <li><a href="#Edit" appdata-otype="sublink" appdata-type="menulinkitem" appdata-name="editblogposts" appdata-fa=\'<i class="fa fa-text"></i>\' appdata-pcrumb="Blog Post"><i class="fa fa-gear"></i> Edit</a></li>
          </ul>
        </li>
        <li class="treeview" '.$styleout[13].'>
          <a href="#" appdata-otype="mainlink" >
            <i class="fa fa-comment-o"></i> <span>Comments</span> 
            '.$fullcomout.'
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="#AllComments" appdata-otype="sublink" appdata-type="menulinkitem" appdata-name="allcomments" appdata-fa=\'<i class="fa fa-comments-o"></i>\' appdata-pcrumb="Comments"><i class="fa fa-cubes"></i> All</a></li>
            <li><a href="#ActiveComments" appdata-otype="sublink" appdata-type="menulinkitem" appdata-name="activecomments" appdata-fa=\'<i class="fa fa-comments-o"></i>\' appdata-pcrumb="Comments"><i class="fa fa-asterisk"></i> Active</a></li>
            <li><a href="#PendingComments" appdata-otype="sublink" appdata-type="menulinkitem" appdata-name="inactivecomments" appdata-fa=\'<i class="fa fa-comments-o"></i>\' appdata-pcrumb="Comments"><i class="fa fa-clock-o"></i> Pending</a></li>
            <li><a href="#EDisabledcomments" appdata-otype="sublink" appdata-type="menulinkitem" appdata-name="disabledcomments" appdata-fa=\'<i class="fa fa-comments-o"></i>\' appdata-pcrumb="Comments"><i class="fa fa-ban"></i> Disabled</a></li>
          </ul>
        </li>

	';
?>