<?php 
/*
Template Name: Calculator Feature Template
*/


?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="favicon.ico">
<title><?php      
      /*
       * Print the <title> tag based on what is being viewed.
       */
      global $page, $paged;
    
      wp_title( '|', true, 'right' );
    
      // Add the blog name.
      bloginfo( 'name' );
    
      // Add the blog description for the home/front page.
      $site_description = get_bloginfo( 'description', 'display' );
      if ( $site_description && ( is_home() || is_front_page() ) )
        echo " | $site_description";
    
      // Add a page number if necessary:
      if ( $paged >= 2 || $page >= 2 )
        echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );     
      ?>
    </title>

<!-- Bootstrap core CSS -->
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo get_template_directory_uri(); ?>/assets/css/font-awesome.min.css" rel="stylesheet">
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<!-- Custom styles for this template -->
<link href="<?php echo get_template_directory_uri(); ?>/assets/css/theme.css" rel="stylesheet">
<link href="<?php echo get_template_directory_uri(); ?>/assets/css/responsive.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/js/source/jquery.fancybox.css?v=2.1.4" media="screen" />
</head>
<!-- NAVBAR
================================================== -->

<body>
  
  <input type="hidden" id="postUrl" value="<?php echo bloginfo('wpurl'); ?>/wp-admin/admin-ajax.php">
  <?php 
  $showCalc = get_field('show_calculator');
  $onlyCalc = get_field('only_calculator'); 
 ?>
<h3 class="text-muted"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/makesbridge-logo.png" width="225" height="51" alt=""/></h3>
<div class="container">
  <div class="masthead set-calc">
    <ul class="nav nav-justified" style="<?php if($onlyCalc == 1){?> display:none; <?php } ?>">
      <li><a href="#features"  class="scroll-link" data-id="features">Features</a></li>
      <li><a href="#comparision" class="scroll-link" data-id="comparision">Comparision</a></li>
      <li><a href="#pricing" class="scroll-link" data-id="pricing">Pricing</a></li>
      <li style="<?php if($showCalc != 1){?> display:none; <?php } ?>"><a href="#calculator" class="scroll-link" data-id="calculator">Calculator</a></li>
    </ul>
  </div>
</div>
<h3 class="topcalltoaction"><span class="glyphicon glyphicon-earphone"></span> <span>+1 408 740 8224</span>
  <button type="button" class="btn btn-success freeBtn" onclick="showsupop('signup_now','1');">Free 30 day Trial</button>
</h3>
<!-- Carousel
    ================================================== -->
<div id="myCarousel" class="carousel slide" data-ride="carousel" style="<?php if($onlyCalc == 1){?> display:none; <?php } ?>">
  <div class="carousel-inner">
    <div class="item active"> <img class="makesbridge-slide" src="//www.makesbridge.com/wp-content/uploads/2014/11/unnamed2-or.jpg" alt="First slide">
      <div class="container">
        <div class="carousel-caption">
          <div class="headerblock">mass email marketing with a difference<span>.</span></div>
          <div class="signupform"> SIGNUP FOR A FREE<br>
            TRIAL ACCOUNT HERE
            <div class="signupformInner">
              <form class="form-horizontal" role="form">
                <div class="form-group form-group-lg">
                  <input class="form-control fc-name" type="text" id="formGroupInputLarge" placeholder="Full name">
                </div>
                <div class="form-group form-group-lg">
                  <input class="form-control fc-email" type="text" id="formGroupInputLarge" placeholder="Work email">
                </div>
                <div class="form-group form-group-lg">
                  <input class="form-control fc-phone" type="text" id="formGroupInputLarge" placeholder="Telephone">
                </div>
                <p><a class="btn btn-lg btn-success 30daybtn" href="#" role="button" onclick="showsupop('signup_now','1');">Signup Free 30 Day Trial</a></p>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="strapline">Used by over 8 million people, rated 5 Stars by Salesforce customers.</div>
    </div>
  </div>
</div>
<!-- /.carousel -->

<div id="features"></div>
<div class="container marketing" style="<?php if($onlyCalc == 1){?> display:none; <?php } ?>"> 
  <!-- Three columns of text below the carousel -->
  <div class="row">
    <div class="features-title">features tailored to your needs<span class="greendot">.</span></div>
    <div class="col-lg-4 col-md-4">
      <div class="sprite-camera"></div>
      <h2>Mass email marketing</h2>
      <p>On a platform rated 4.9 out of 5 Stars.</p>
    </div>
    <!-- /.col-lg-4 -->
    <div class="col-lg-4 col-md-4">
      <div class="sprite-controls"></div>
      <h2 class="headerico_nudge1">Cherry pick prospects</h2>
      <p>From a simple interactive display.</p>
    </div>
    <!-- /.col-lg-4 -->
    <div class="col-lg-4 col-md-4">
      <div class="sprite-robots"></div>
      <h2>Set up automated tasks</h2>
      <p>Dozens of efficient workers on the job 24/7.</p>
    </div>
    <!-- /.col-lg-4 --> 
  </div>
   <!-- Three columns of text below the carousel -->
  <div class="row">
    <div class="col-lg-4 col-md-4">
      <div class="sprite-analytics"></div>
      <h2>Deep Reporting are and analytics</h2>
      <p>Customizable so you can get to the information you need most, right away!</p>
    </div>
    <!-- /.col-lg-4 -->
    <div class="col-lg-4 col-md-4">
      <div class="sprite-plugins"></div>
      <h2 class="headerico_nudge2">Connect CRM cloud apps in seconds</h2>
      <p>and be wowed by seamless data exchange.</p>
    </div>
    <!-- /.col-lg-4 -->
    <div class="col-lg-4 col-md-4">
      <div class="sprite-packs"></div>
      <h2>Choose a package that suits you</h2>
      <p>Enjoy only the flexibility we offer.</p>
    </div>
    <!-- /.col-lg-4 --> 
  </div>
  <!-- /.row -->
</div>
<!-- /.row -->

<div id="comparision"></div>
<div class="container marketing" style="<?php if($onlyCalc == 1){?> display:none; <?php } ?>"> 
 
<!-- <div id="comparision"></div> -->
  <div class="features-title">compare the competition<span class="greendot">.</span></div>
    <div class="salesforce-image"><img src="//www.makesbridge.com/wp-content/uploads/2014/11/rating1.png"></div>
  <div class="table-responsive">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th class="comparisonHead">Comparison <span class="visible-xs redtxt">>> Swipe Left >></span></th>
          <th>Makesbridge</th>
          <th>Mailchimp</th>
          <th>Constant Contact</th>
          <th>Hubspot</th>
          <th>Marketo</th>
        </tr>
      </thead>
      <tbody>
        <tr class="darkgrey">
          <td class="titleproduct">CRM Integration</td>
          <td><i class="fa fa-check green"></i></td>
          <td><i class="fa fa-times green"></i></td>
          <td><i class="fa fa-times green"></i></td>
          <td><i class="fa fa-check green"></i></td>
          <td><i class="fa fa-check green"></i></td>
        </tr>
        <tr class="lightgrey">
          <td class="titleproduct">Contact management</td>
          <td><i class="fa fa-check green"></i></td>
          <td><i class="fa fa-times green"></i></td>
          <td><i class="fa fa-times green"></i></td>
          <td><i class="fa fa-times green"></i></td>
          <td><i class="fa fa-times green"></i></td>
        </tr>
        <tr class="darkgrey">
          <td class="titleproduct">Advanced targeting</td>
          <td><i class="fa fa-check green"></i></td>
          <td><i class="fa fa-times green"></i></td>
          <td><i class="fa fa-times green"></i></td>
          <td><i class="fa fa-times green"></i></td>
          <td><i class="fa fa-check green"></i></td>
        </tr>
        <tr class="lightgrey">
          <td class="titleproduct">Full web analytics</td>
          <td><i class="fa fa-check green"></i></td>
          <td><i class="fa fa-times green"></i></td>
          <td><i class="fa fa-times green"></i></td>
          <td><i class="fa fa-check green"></i></td>
          <td><i class="fa fa-check green"></i></td>
        </tr>
        <tr class="darkgrey">
          <td class="titleproduct">Scaleable</td>
          <td><i class="fa fa-check green"></i></td>
          <td><i class="fa fa-times green"></i></td>
          <td><i class="fa fa-times green"></i></td>
          <td><i class="fa fa-times green"></i></td>
          <td><i class="fa fa-times green"></i></td>
        </tr>
        <tr class="lightgrey">
          <td class="titleproduct">Drip marketing</td>
          <td><i class="fa fa-check green"></i></td>
          <td><i class="fa fa-times green"></i></td>
          <td><i class="fa fa-times green"></i></td>
          <td><i class="fa fa-times green"></i></td>
          <td><i class="fa fa-check green"></i></td>
        </tr>
        <tr class="darkgrey">
          <td class="titleproduct">Prospect behaviour tracking</td>
          <td><i class="fa fa-check green"></i></td>
          <td><i class="fa fa-times green"></i></td>
          <td><i class="fa fa-times green"></i></td>
          <td><i class="fa fa-times green"></i></td>
          <td><i class="fa fa-check green"></i></td>
        </tr>
        <tr class="lightgrey">
          <td class="titleproduct">Lead scoring</td>
          <td><i class="fa fa-check green"></i></td>
          <td><i class="fa fa-times green"></i></td>
          <td><i class="fa fa-times green"></i></td>
          <td><i class="fa fa-check green"></i></td>
          <td><i class="fa fa-check green"></i></td>
        </tr>
        <tr class="darkgrey">
          <td class="titleproduct">Lead nurturing</td>
          <td><i class="fa fa-check green"></i></td>
          <td><i class="fa fa-check green"></i></td>
          <td><i class="fa fa-check green"></i></td>
          <td><i class="fa fa-check green"></i></td>
          <td><i class="fa fa-check green"></i></td>
        </tr>
        <tr class="lightgrey">
          <td class="titleproduct">Business intelligence</td>
          <td><i class="fa fa-check green"></i></td>
          <td><i class="fa fa-times green"></i></td>
          <td><i class="fa fa-times green"></i></td>
          <td><i class="fa fa-times green"></i></td>
          <td><i class="fa fa-check green"></i></td>
        </tr>
        <tr class="darkgrey">
          <td class="titleproduct">Pay as you go</td>
          <td><i class="fa fa-check green"></i></td>
          <td><i class="fa fa-check green"></i></td>
          <td><i class="fa fa-check green"></i></td>
          <td><i class="fa fa-times green"></i></td>
          <td><i class="fa fa-times green"></i></td>
        </tr>
      </tbody>
    </table>
  <div id="pricing"></div>
    <div class="applybtn"><a role="button" href="#" class="btn btn-lg btn-success 30daybtn tablebtn scroll-link" onclick="showsupop('signup_now','1');">Signup For Free</a></div>
  </div>
  <div class="laptop">
    <form id="signup" name="signup" class="col-md-12 shortform" method="post" action="/thankyou/">
      <div class="form-group formbtm">
        <h1 class="30daytrial">Free 30-Day Trial</h1>
        <input type="text" class="form-control fc-name" id="firstname" placeholder="First name">
        <input type="tel" class="form-control fc-phone" id="telephone" placeholder="Telephone">
        <input type="text" class="form-control fc-email" id="fc-email" placeholder="Work email">
        <button type="button" onclick="showsupop('signup_now','1');" class="btn btn-success formbtm2">Get Started</button>
      </div>
    </form>
  </div>
  
  <div class="container marketing"> 
    <!-- Three columns of text below the carousel -->
    <div class="row">

    </div>
  </div>
  <!-- /.row --> 
</div><!-- /.Container -->
<div id="calculator">
  <div class="container marketing"> 
    <!-- Three columns of text below the carousel -->
    <div class="row">
      <div><h3 onclick="showsupop('features_now','4');" class="feature-price-lists">View Feature List <img style="position: relative; top: 0px;" src="<?php echo get_template_directory_uri(); ?>/images/listicon.png" /></h3></div>
        <div class="iframe-calc-warap" style="<?php if($showCalc != 1){?> display:none; <?php } ?>">
      <iframe style="width:100%;height: 940px;border:none;" allowfullscreen="" src="<?php echo get_field( "calculator_url" ); ?>"></iframe>
  </div>
    </div>
  </div>
  

</div>
  <div class="container marketing">
  <!-- FOOTER -->
  <footer>
      <div class="col-lg-9 col-md-9">
      <div class="col-lg-1 makesbridgelogo">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/makesbridge-logo-grey.png" width="60" height="51" alt=""/> 
       </div>
        <ul class="contactfooter">
          <li>Pricing</li>
          <li>About Us</li>
          <li>Privacy Policy</li>
        </ul>
        <h2 class="address">14435 Big Basin Way, #122 Saratoga Village, CA 95070</h2>
        <p class="copyright">&copy; Copyright Makesbridge 2014</p>
      </div>
      <!-- /.col-lg-6 -->
      <div class="col-lg-3 col-md-3">
      <p class="back-to-top"><a href="#">Back to top</a></p>
      <ul class="socialicons">
      <li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/twitter.gif" width="40" height="40" alt=""/></li>
      <li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/indesign.gif" width="40" height="40" alt=""/></li>
      <li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/youtube.gif" width="40" height="40" alt=""/></li>
      <li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/salesforce.gif" width="40" height="40" alt=""/></li>
      <li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/email.gif" width="40" height="40" alt=""/></li>
    </ul>
      </div>
      <!-- /.col-lg-6 -->  
    <p class="connect"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/connect-to-grow.gif" width="235" height="23" alt=""/></p>
  </footer>
</div>
</div>
<!-- /.container --> 



<!-- Fancy Box HTML
    ================================================== --> 
<div class="fancybox-overlay fancybox-overlay-fixed" style="width: auto; height: auto; background: none repeat scroll 0% 0% rgba(230, 239, 243, 0.9); display: none;">
  <div tabindex="-1" class="fancybox-wrap fancybox-desktop fancybox-type-inline fancybox-opened" style="height: auto; position: absolute; top: 50%; left: 50%; margin-top:-270px; opacity: 1;">
    <div class="fancybox-skin" style="padding: 0px; width: auto; height: auto;">
      <div class="fancybox-outer">
        <div class="fancybox-inner" style="height: 550px;">
          <iframe id="video_frame" width="780" height="420" frameborder="no" src="//player.vimeo.com/video/90175265?title=0&amp;byline=0&amp;portrait=0"></iframe>
            <!--<div class="btm-bar"> <span><span class="icon view"></span><em>14</em></span></div>-->
        </div>
      </div>
      <a href="javascript:;" class="fancybox-item fancybox-close" title="Close" onclick="hidesupop()"></a></div>
  </div>
</div>

<div class="signuppop wp-pop" id="signup_now">
  <?php
    $su_conn = get_post(390); 
    echo $su_conn->post_content;
    ?>
</div>
<div class="signuppop pagecontent wp-pop" style="width: 960px; display: none; margin:20px 0; height:470px; padding:20px; position:relative; overflow-y:scroll;" 
id="termspop">
      <a class="goback" onClick="togglePops()">&lt;&lt; Go Back</a>
      <?php
      $term = get_post(640); 
      setup_postdata( $term );
      the_content();
      ?>
</div>
<div id="features_now" class="signuppop wp-pop" style="display: none;">
  <?php
      $fd_conn = get_post(2967); 
      echo $fd_conn->post_content;
      ?>
</div>
<div></div>
<style type="text/css">
  .salesforce-image{
        margin: 0 auto;
        width: 73%;
    }
</style>
<!-- Bootstrap core JavaScript
    ================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/bootstrap.min.js"></script> 
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug --> 
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/ie10-viewport-bug-workaround.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/source/jquery.fancybox.js?v=2.1.4"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/custom.js"></script>

<?php  
  if($showCalc == 1 && $onlyCalc == 1){
    echo "<script>$('#pgsrc').val('calculator-only')</script>";
  }
  else if($showCalc == 1){
    echo "<script>$('#pgsrc').val('calculator-added');</script>";
  }else{
    echo "<script>$('#pgsrc').val('feature')</script>";
  }

?>
</body>
<style type="text/css">
/*-------------------------------------------------Packages Styles--------------------------------------------------------*/
.products1 {
    position: relative;
    padding: 0; 
}
.packagebox {
    background-color: #fbfcfd;
    float: left;
    list-style-type: none;
    margin-left: 2px;
    margin-top: 0;
    width: 198px;
}
.packagebox-head {
    background-color: #4799c3;
    border-radius: 3px 3px 0 0;
    height: 50px;
    width: 198px;
}
.packagebox-head h2 {
    color: #fff;
    margin: 0;
    font-size: 24px;
    height: 50px;
    line-height: 50px;
    text-align: center;
}
.packagebox-subhead {
    background-color: #fbfcfd;
    color: #4799c3;
    font-size: 14px;
    line-height: 1.3em;
    min-height: 90px;
    padding: 20px 15px 10px;
    text-align: center;
    font-weight: bold;
}
.package-price {
    background: none repeat scroll 0 0 #ffffff;
    border-left: 1px solid #fbfcfd;
    border-right: 1px solid #fbfcfd;
    padding: 22px 0;
}
.pkgprice {
    color: #4799c3;
    float: left;
   
    font-size: 34px;
    position: relative;
    top: 10px;
}
.package-price h3 {
    color: #4799c3;
    float: left;
 
    font-size: 51px;
    margin-left: 2px;
    position: relative;
    text-align: center;
    top: 28px;
}
.pkgperiod {
    color: #4799c3;
    float: left;
   
    font-size: 21px;
    margin-left: 0;
    position: relative;
    top: 30px;
}
.package-price span {
    color: #4799c3;
   
    font-size: 37px;
    left: 5px;
    position: relative;
    top: 4px;
}
div.packagebox:nth-child(4) .package-price span {
    left: -2px;
}
div.packagebox:nth-child(5) .package-price span {
    left: -5px;
}
div.packagebox:nth-child(6) .package-price span {
    left: -13px;
}
.package-per-month {
    float: right;
    font-size: 12px !important;
    left: 5px !important;
    position: relative;
    top: 4px !important;
}
.package-price-container {
    height: 70px;
    margin: 0 auto;
    padding: 0 0 0 15px;
    width: 88px;
}
.package-textwidget {
    margin-top: 27px;
    text-align: center;
}
.package-textwidget h2 {
   
    font-size: 18px;
    margin: 0 0 15px;
    padding: 0;
    text-align: center;
}
.package-textwidget span {
    
    font-size: 16px;
}
.package-textwidget h3 {

    font-size: 12px;
    margin-bottom: 12px;
    text-align: center;
}
.package-textwidget h3 span {
    font-size: 12px;
}
.packagebox-active {
    background-color: #ffffff;
    box-shadow: 0 0 10px 0;
    position: relative;
}
.packagebox-active .packagebox-head {
    height: 60px;
    line-height: 60px;
    margin-top: -10px;
}
#mini.packagebox-active .packagebox-head {
    background-color: #f8b916;
}
#mini.packagebox-active .packagebox-subhead {
    color: #f8b916;
}
#features.mini-det .pkghead:hover {
    background-color: #f8b916;
    color: #fff;
}
#smb.packagebox-active .packagebox-head {
    background-color: #fc721f;
}
#smb.packagebox-active .packagebox-subhead {
    color: #fc721f;
}
#features.smb-det .pkghead:hover {
    background-color: #fc721f;
    color: #fff;
}
#pro.packagebox-active .packagebox-head {
    background-color: #f1526d;
}
#pro.packagebox-active .packagebox-subhead {
    color: #f1526d;
}
#features.pro-det .pkghead:hover {
    background-color: #f1526d;
    color: #fff;
}
#ent.packagebox-active .packagebox-head {
    background-color: #cb65e9;
}
#ent.packagebox-active .packagebox-subhead {
    color: #cb65e9;
}
#features.ent-det .pkghead:hover {
    background-color: #cb65e9;
    color: #fff;
}
#eng.packagebox-active .packagebox-head {
    background-color: #0dc8ca;
}
#eng.packagebox-active .packagebox-subhead {
    color: #0dc8ca;
}
#features.eng-det .pkghead:hover {
    background-color: #0dc8ca;
    color: #fff;
}
.package-textwidget h3{
  color:#2581b0;
}
/*----------------------------------------------*/
.price-calculator-wrap{
  background: #E9F1F5;
  border-top: 2px solid #DEE7EB;

}.price-calculator-wrap h2{
  color:#494949;
}
.left-wrapper , .right-wrapper{
    text-align: center;
    margin-top: 40px;
    width: 41%;
}
.left-wrapper{
  float: left;
}
.right-wrapper{
  float: right;
}
.packages h1{
  color: #494949;
  margin-bottom: 60px;
  text-align: center;
} 
.sign_up_free{
border:1px solid #15aeec; -webkit-border-radius: 3px; -moz-border-radius: 3px;width: 117px;border-radius: 3px;text-transform:none;margin: 15px 0 0px;font-size:14px;font-family:proxima_nova_regular; padding: 10px 10px 10px 10px; text-decoration:none; display:inline-block;text-shadow: 1px 1px 0 rgba(0,0,0,0.3); color: #FFFFFF;
 background-color: #49c0f0; background-image: -webkit-gradient(linear, left top, left bottom, from(#49c0f0), to(#2CAFE3));
 background-image: -webkit-linear-gradient(top, #49c0f0, #2CAFE3);
 background-image: -moz-linear-gradient(top, #49c0f0, #2CAFE3);
 background-image: -ms-linear-gradient(top, #49c0f0, #2CAFE3);
 background-image: -o-linear-gradient(top, #49c0f0, #2CAFE3);
 background-image: linear-gradient(to bottom, #49c0f0, #2CAFE3);filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr=#49c0f0, endColorstr=#2CAFE3);
}

.sign_up_free:hover{
 border:1px solid #1090c3;
 background-color: #1ab0ec; background-image: -webkit-gradient(linear, left top, left bottom, from(#1ab0ec), to(#1a92c2));
 background-image: -webkit-linear-gradient(top, #1ab0ec, #1a92c2);
 background-image: -moz-linear-gradient(top, #1ab0ec, #1a92c2);
 background-image: -ms-linear-gradient(top, #1ab0ec, #1a92c2);
 background-image: -o-linear-gradient(top, #1ab0ec, #1a92c2);
 background-image: linear-gradient(to bottom, #1ab0ec, #1a92c2);filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr=#1ab0ec, endColorstr=#1a92c2);
}
.package-spend{
   border-top: 1px solid #909090;
    position: relative;
    margin: 20px 0;
}
.package-spend h2{
   background: none repeat scroll 0 0 #fff;
    color: #909090;
    font-size: 25px;
    left: 42%;
    padding: 0 20px;
    position: absolute;
    top: -27px;
}
.package-price {
  background: #fff;
  float: left;
  border-left: 1px solid #fbfcfd;
    border-right: 1px solid #fbfcfd;
    padding: 22px 0;
}
.pkgprice {
  left: 20px;
  top: 30px;
   font-size: 30px;
    color: #4799c3;
    float: left;
 
    position: relative;
}
.package-price h3{
   color: #4799c3;
    float: left;
    font-size: 51px;
    margin-left: 40px;
    margin-top: 0;
    position: relative;
    text-align: center;
    top: 20px;
}
.pkgperiod{
  color: #4799c3;
    float: left;
    font-size: 21px;
    margin-left: 5px;
    position: relative;
    top: 56px;
}
.shareprpage {
  visibility :hidden;
}
.packagebox{
   border: 1px solid #83a5b7;
    border-radius: 5px 5px 0 0;
     margin-bottom: 15px;
     min-height: 547px;
}
.products1 li:hover .package-price{
  background: red;
}
.left {
  float: left !important;
}
.right {
  float: right !important;
}
.email-millions-wrap{
    line-height: 55px;
    margin: 20px 0 0;
    text-align: left;
    width: 480px;
}
.email-millions-wrap h2{
  color: #494949;

}
.email-millions-wrap h3{
  margin-top: 15px;
  color: #494949;

}
.left-free-wrapper{
  margin-left: 112px;
    width: 45%;
}
.right-free-wrapper {
    width: 38.83%;
}
.right-free-wrapper img{
    float:left;
}
.feature-price-lists{
  cursor: pointer;
  color: #2581b0;

}
.free-signup {
    height: 200px;
    overflow: hidden;
}
.free-signup-wrap {
    height: 200px;
}
.clear{
  clear: both;
}

/*------------------------------------------------------------------------------*/
</style>
<script type="text/javascript">
$(document).ready(function(){
  $('.lovedimg').css('top','54px');
    $('.packagebox').hover(function(){
      $('.packagebox').removeClass('packagebox-active');
      /*if($(this).attr('id') != 'pro')
        $('.lovedimg').css('top','64px');
      else
        $('.lovedimg').css('top','54px');*/
      $(this).addClass('packagebox-active');   
      var li_id = $(this).attr('id'); 
      $('#tile-'+li_id).css({"background":"#F1F7FA"});     
    },function(){
      $(this).removeClass('packagebox-active');
      $('.lovedimg').css('top','64px');
      var li_id = $(this).attr('id'); 
      $('#tile-'+li_id).css({"background":"#fff"});
    });
});
  
</script>
</html>
