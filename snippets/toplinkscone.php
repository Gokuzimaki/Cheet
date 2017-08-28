<?php
    // obtain the values, if present, representing the class for an active page being
    // being viewed, these pages can be found in the headcontentparentdefault.php file
    // in the snippets folder.
    !isset($activepage1)?$activepage1="":$activepage1=$activepage1;
    !isset($activepage2)?$activepage2="":$activepage2=$activepage2;
    !isset($activepage3)?$activepage3="":$activepage3=$activepage3;
    !isset($activepage4)?$activepage4="":$activepage4=$activepage4;
    !isset($activepage5)?$activepage5="":$activepage5=$activepage5;
    !isset($activepage6)?$activepage6="":$activepage6=$activepage6;
    !isset($activepage7)?$activepage7="":$activepage7=$activepage7;
    !isset($activepage8)?$activepage8="":$activepage8=$activepage8;
    echo $mpagepreloaderout;
    
    
?>
<!--Header start-->  
<header id="lms_header" <?php echo $mpagetopbgclass;?>>
  <div class="profile_display_point <?php echo $mpageuserdisplay;?>">
    <div class="container">
      <div class="lms_header_profile_display">
        <div class="position_control">
          <div class="profile_display_cart pull-right"><a href="##"><i class="fa fa-shopping-cart"></i> <span class="profile_display_cart_counter"><?php echo $mpagecartcounter;?></span> </a></div>
          <div class="profile_display_name text pull-right"><a href="<?php echo $mpagelogoutlink;?>" title="Log out"><!-- Log out --><i class="fa fa-sign-out fa-2x"></i></a></div>
          <div class="profile_display_name pull-right"><a href="<?php echo $mpageprofilepageout;?>"><?php echo $mpageusernametext;?></a></div>
          <div class="profile_display_image pull-right"><img src="<?php echo $host_addr;?><?php echo $mpageuserimage;?>"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <h1 class="logo"> <a href="<?php echo $host_addr;?>"> <img alt="Cheet Logo" class="logoimgcone" data-sticky-width="82" data-sticky-height="40" src="<?php echo $host_addr;?>images/cheetminilogo.png"> </a> </h1>
    <button class="lms_menu_toggle btn-responsive-nav btn-inverse" data-toggle="collapse" data-target=".nav-main-collapse"><i class="fa fa-bars"></i> </button>
    <div class="navbar-collapse nav-main-collapse collapse">
      <div class="container">
        <nav class="nav-main mega-menu">
          <ul class="nav nav-pills nav-main" id="mainMenu">
            <li class="<?php echo $activepage1;?>"> <a href="<?php echo $host_addr;?>"> Home</a></li>
            <li class="dropdown mega-menu-item mega-menu-fullwidth <?php echo $activepage2?>"> <a class="dropdown-toggle" href="<?php echo $host_addr;?>library.php"> Library <i class="icon icon-angle-down"></i> </a>
              <ul class="dropdown-menu">
                <li>
                  <div class="mega-menu-content">
                    <div class="row">
                      <?php echo $mpagemegamenulibrary;?>
                    </div>
                  </div>
                </li>
              </ul>
            </li>
            <li class="dropdown <?php echo $activepage4;?>"><a href="<?php echo $host_addr;?>news.php" class="dropdown-toggle">News <i class="icon icon-angle-down"></i> </a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo $host_addr;?>news.php?t=school">In Schools</a></li>
                <li><a href="<?php echo $host_addr;?>news.php?t=public">Public</a></li>
                <li><a href="<?php echo $host_addr;?>news.php?t=admin">From Cheet</a></li>
              </ul>
            </li>
            <li class="dropdown <?php echo $activepage3;?>"> <a href="<?php echo $host_addr;?>resources.php" class="dropdown-toggle"> Resources <i class="icon icon-angle-down"></i> </a>
              <ul class="dropdown-menu">
                <li><a href="bookstores.php">Book Stores</a></li>
                <li><a href="projectmerc.php">Project Mercenaries</a></li> 
              </ul>
            </li>
            <li class="dropdown <?php echo $activepage6;?>"><a href="<?php echo $host_addr;?>faq.php" class="dropdown-toggle">FAQ <i class="icon icon-angle-down"></i> </a>
              <ul class="dropdown-menu">
                <li><a href="##">How to register on Cheet?</a></li>
                <li><a href="##">Creating Cheet Courses</a></li>
                <li><a href="##">What is a Student Profile?</a></li>
              </ul>
            </li>
            <li class="dropdown mega-menu-item <?php echo $activepage5; echo $mpageloginstyle;?>"> <a class="dropdown-toggle"> Login/Register <i class="icon icon-angle-down"></i> </a>
              <ul class="dropdown-menu">
                <li>
                  <div class="mega-menu-content">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="droplogin">
                          <form action="<?php echo $host_addr;?>snippets/basiclog.php" method="POST" id="login-form">
                            <p class="col-md-12">
                              <select class="form-control" name="logtype">
                                <option value="">Select Account Type</option>
                                <option value="member">Member</option>
                                <option value="instructor">Instructor</option>
                                <option value="school">School</option>
                                <option value="lecturer">Lecturer</option>
                                <option value="student">Student</option>
                                <option value="bookstore">Bookstore</option>
                                <option value="projmerc">Project Mercenary</option>
                              </select>
                              <!-- <input type="hidden" name="logtype" value="recruit"/> -->
                            </p>
                            <p class="col-md-12">
                              <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                            </p>
                            <p class="col-md-12">
                              <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                            </p>
                            <p class="col-md-12">
                              <a href="<?php echo $host_addr;?>signupin.php" class="btn btn-link forgot-password-link">Register with cheet</a>
                              <a href="##" class="btn btn-link forgot-password-link" name="forgotpassword">Forgot Password?</a>
                              <input type="submit" id="submit" class="btn btn-default pull-right" value="Login">
                            </p>
                          </form>
                          <div class="col-md-12 hidden" name="resetpassword">
                            <h3 class="texttogglelogreg">RESET PASSWORD</h3>
                            <form name="resetform" class="fixed" id="reset-form" name="reset-form" action="<?php echo $host_addr;?>reset.php" method="POST">
                              <div id="formstatus"></div>
                              <fieldset>
                                <input type="hidden" name="displaytype" value="passwordreset"/>
                                <p>
                                  <input type="email" class="maxplain" id="resetemail" name="resetemail" placeholder="Your registered email address"/>
                                </p>                        
                                <p class="last">
                                    <input class="btn text-uppercase" id="submit" type="submit" name="submit" value="Submit">
                                </p>
                              </fieldset>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
            </li>
            <li class="<?php echo $activepage7;?>"><a href="forums.php">Forums</a></li>
            <li class="<?php echo $activepage8;?>"><a href="contactus.php">Contact Us</a></li>
          </ul>
        </nav>
        <div class="lms_search_toggle"><a><i class="fa fa-search"></i></a></div>
        <div class="lms_search_wrapper">
          <form action="<?php echo $host_addr;?>snippets/search.php" method="POST" id="guest-search-form">
            <p class="col-md-12">
              <input type="hidden" name="displaytype" value="guestsearch">
              <input type="hidden" name="entryvariant" value="guestsearch">
              <select class="form-control" name="searchtype">
                <option value="">Choose a search parameter (Current: All)</option>
                <option value="coursetitle">Course title</option>
                <option value="coursedetails">Course Details(extensive search)</option>
                <option value="forums">In Forums</option>
                <option value="school">Instructor</option>
                <option value="school">School</option>
                <!-- <option value="student">Student</option> -->
                <option value="bookstore">Bookstore</option>
                <!-- <option value="lecturer">Lecturer</option> -->
                <option value="projmerc">Project Mercenary</option>
                <option value="newstitle">News Title</option>
                <option value="newspost">News Content</option>
              </select>
              <!-- <input type="hidden" name="logtype" value="recruit"/> -->
            </p>
            <p class="col-md-12">
              <input type="search" name="searchval" placeholder="Search..." />
            </p>  
            <p class="last">
                <input class="btn text-uppercase" id="submit" type="submit" name="submit" value="Search"/>
            </p>
          </form>
        </div>
      </div>
    </div>
  </div>
</header>
<!--Header end-->  