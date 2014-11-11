<?php
/* Template Name:Login */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>
<?php
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
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/style.css" media="screen" />
<?php wp_head(); ?>
</head>

<body>
<div id="login_page">
  <div class="btnor"></div>
  <div class="clear"></div>
  <div id="login_left">
    <div class="loginarea"> <img alt="" class="logo" src="<?php echo get_template_directory_uri(); ?>/images/login-logo.png" width="290" height="55" />
      <h2>Please enter your credentials</h2>
      <!--<div class="messageerror">
        <p>Invalid Credentials:<br>
          You have entered invalid user ID and(or) password.<br>
        </p>
        <div class="clear"></div>
      </div>-->
      <div class="loginform">
        <div class="clear"></div>
        <label>User ID</label>
        <input type="text" name="userid" id="userid" />
        <div class="clear"></div>
        <label>Password</label>
        <input type="text" name="pwd" id="pwd" />
        <div class="clear"></div>
        <label>&nbsp;</label>
        <input type="image" name="btnlogin" id="btnlogin" src="<?php echo get_template_directory_uri(); ?>/images/login-button.jpg" width="120" height="24" />
        <div class="clear"></div>
        <label>&nbsp;</label>
        <div class="forgotpass"> <a href="">Forgot your password?</a> </div>
        <div class="clear"></div>
      </div>
      <div class="copyright"> Copyright @ 2002 - 2014 Makesbridge Technologies, Inc. All rights reserved. </div>
    </div>
  </div>
  <div id="login_right">
    <h1>Try <span>Makesbridge</span> '14</h1>
    <h3>A vibrant user experience that stands apart.</h3>
    <div class="loginhead">Login to New User Interface</div>
    <div class="features">
      <div class="clear"></div>
      <h2>New Platform Features</h2>
      <div class="clear"></div>
      <ul>
        <li>Reimagined Interface</li>
        <li>Simultaneous Workspaces</li>
        <li>Streamlined Workflow</li>
        <li>Mobile Templates</li>
        <li>Tags and Search Support</li>
        <li>& Much More!</li>
      </ul>
      <div class="clear"></div>
    </div>
  </div>
  <div class="clear"></div>
</div>
</body>
</html>