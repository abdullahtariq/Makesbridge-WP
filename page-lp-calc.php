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
</html>
