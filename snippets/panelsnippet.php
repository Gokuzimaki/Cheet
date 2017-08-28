<div data-role="panel" appdata-name="responsivepanel" appdata-monitor="responsiveplain" appdata-state="" data-display="push" data-theme="b" id="nav-panel" class="ui-panel ui-panel-position-left ui-panel-display-push ui-body-b ui-panel-animate ui-panel-open">
    <div class="ui-panel-inner"><ul data-role="listview" class="ui-listview">
	    <li data-icon="delete"class="ui-first-child"><a href="#" data-rel="close" onClick="responsiveMenu()" class="ui-btn ui-btn-icon-right ui-icon-delete">Close</a></li>
	        <li data-name="index" class="active"><a href="<?php echo $host_addr;?>index.php" title="Welcome to the NYSC Lagos Home page"><i class="fa fa-home"></i> Home</a></li>
			<li data-name="about"><a href="<?php echo $host_addr;?>about.php" class="ui-btn ui-btn-icon-right ui-icon-carat-r" title="Learn about the NYSC scheme and its importance"><i class="fa fa-info-circle"></i> About</a></li>
			<li data-name="byelaws"><a href="<?php echo $host_addr;?>byelaws.php" class="ui-btn ui-btn-icon-right ui-icon-carat-r" title="A system without rules is chaos, get educated on the Laws of the scheme"><i class="fa fa-gavel"></i> Byelaws</a></li>
			<li data-name="infohub"><a href="<?php echo $host_addr;?>infohub.php" class="ui-btn ui-btn-icon-right ui-icon-carat-r" title="If its important, you need to know about it, then its right here"><i class="fa fa-newspaper-o"></i> News</a></li>
			<li data-name="faq"><a href="<?php echo $host_addr;?>faq.php" class="ui-btn ui-btn-icon-right ui-icon-carat-r" title="Some answers to important questions commonly asked"><i class="fa fa-question-circle"></i> FAQ</a></li>
			<li data-name="cdsprojects"><a href="<?php echo $host_addr;?>cds.php" class="ui-btn ui-btn-icon-right ui-icon-carat-r" title="The Community development scheme and executed projects"><i class="fa fa-child"></i> CDS</a></li>
			<li data-name="saed"><a href="<?php echo $host_addr;?>saed.php" class="ui-btn ui-btn-icon-right ui-icon-carat-r" title="Skill Acquistion and Entrepreneural Development"><i class="fa fa-smile-o"></i> SAED</a></li>
			<li data-name="gallery"><a href="<?php echo $host_addr;?>gallery.php" class="ui-btn ui-btn-icon-right ui-icon-carat-r" data-ajax="false" title="CHeck out the nsc lagos galleries, its quite a journey"><i class="fa fa-image"></i> Gallery</a></li>
	</ul></div>
</div>
<script>
	 windowwidth=$(window).width();
 if(typeof($.mobile)=="undefined"){
  var windowheight=$(window).height();
$('div#maintwo').css({"height":""+windowheight+"px","min-height":"240px"});
}
</script>