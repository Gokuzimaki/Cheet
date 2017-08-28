<?php
    $mpagesecuritynumber=substr($mpagesecuritynumber,0,6);
?>
<footer id="lms_footer">
  <div class="lms_footer_top">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6">
          <div class="lms_newsletter">
            <h3>Newsletter</h3>
            <div class="form-group">
              <div class="input-group">
                <input class="form-control" type="text" placeholder="Enter email">
                <div class="input-group-addon">Ok</div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6">
          <div class="lms_happening">
            <h3>Happening Now</h3>
            <div class="lms_happy_user"> <img src="<?php echo $host_addr;?>images/default.gif" alt="happy user">
              <p><span class="lms_theme_color">Sunny Valim</span> Has Unlocked the New badge</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="lms_footer_center">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="lms_footer_logo"> <img src="<?php echo $host_addr;?>images/cheetminilogo.png" alt="Cheet logo"/> </div>
          <p>
            Cheet is a multifaceted online platform concerned with aiding anyone,
            anywhere in learning the things that they want or love, at an easy and
            affordable rate where and when possible, we aim to unite people who love
            teaching and those that love learning.<br>
            Learn, learn and learn some more.
          </p>
          <div class="lms_social">
            <ul>
              <li><a href="##" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook"><i class="fa fa-facebook"></i></a></li>
              <li><a href="##" data-toggle="tooltip" data-placement="top" title="" data-original-title="Twitter"><i class="fa fa-twitter"></i></a></li>
              <li><a href="##" data-toggle="tooltip" data-placement="top" title="" data-original-title="Google+"><i class="fa fa-google-plus"></i></a></li>
              <li><a href="##" data-toggle="tooltip" data-placement="top" title="" data-original-title="Pinterest"><i class="fa fa-pinterest"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="lms_footer_popular_course">
            <h3>Popular Courses</h3>
            <div class="lms_footer_course"> 
              <!-- <img src="images/footer/popular_course1.jpg" alt="Popular Course"/>  -->
              <span class="btn btn-circle btn-primary btn-lg footer_course_default_img"><i class="fa fa-graduation-cap fa-3x"></i></span>
              <a href="index-simple-slider.html">
                <h4>Donec velit diam</h4>
              </a>
              <p>Integer triagna. Praesent bibendum quam....</p>
            </div>
            <div class="lms_footer_course">
              <!-- <img src="images/footer/popular_course2.jpg" alt="Popular Course"/> <a href="index-simple-slider.html"> -->
              <span class="btn btn-circle btn-primary btn-lg footer_course_default_img"><i class="fa fa-graduation-cap fa-3x"></i></span>
              <h4>Donec velit diam</h4>
              </a>
              <p>Integer triagna. Praesent bibendum quam....</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="lms_footer_course_category">
            <h3>Links</h3>
            <ul>
              <li><a href="##">Privacy.</a></li>
              <li><a href="##">Terms and Conditions</a></li>
              <li><a href="##">Disclaimer</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="lms_footer_feedback">
            <h3>Feed Back</h3>
            <form action="<?php echo $host_addr;?>snippets/basicsignup.php" method="POST" id="guest-feedback-form">
              <input type="hidden" name="displaytype" value="guestfeedback"/>
              <input type="hidden" name="entryvariant" value="guestfeedback"/>
              <p class="col-md-12">
                <input type="text" name="fullname" placeholder="Your Fullname" class="form-control"/>
                <input type="email" name="eaddr" placeholder="Your email address" class="form-control"/>
              </p>
              <p class="col-md-12">
                <input type="hidden" name="sectester" value="<?php echo $mpagesecuritynumber;?>"/>
                 Security(<?php echo $mpagesecuritynumber;?>);
                <input type="text" name="secnumber" Placeholder="The above digits here" class="form-control"/>
              </p>
              <p class="col-md-12">
                <textarea rows="5" class="form-control" placeholder="Your feedback here,.... Please be sincere"></textarea>
              </p>
              <p class="text-center feedback_bottom_text">Help us be better</p>
              <p class="last">
                  <input class="btn text-uppercase dstyle" id="submit" type="submit" name="submit" value="Submit"/>
              </p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="lms_footer_bottom">
    <p>Copyright &copy; <?php echo date("Y");?> Developed by IVx Techologies in collaboration with Dream Bench Technologies.</p>
  </div>
</footer>
<a href="#" class="scrollToTop"><i class="fa fa-arrow-up"></i></a>
