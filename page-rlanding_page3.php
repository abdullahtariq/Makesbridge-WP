<?php
/* Template Name: New Responsive (LP3) */
?>
<!DOCTYPE html>
<html lang="en">
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
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="title" content="MakesBridge" />
		<meta name="description" content="MakesBridge Landing Page" />
		<meta name="keywords" content="MakesBridge" />
		
		<link rel="shortcut icon" href="http://salesforceoffer.makesbridge.com/wp-content/themes/salesforceoffer/images/mks_lp_r/favicon.png" type="image/x-icon">
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/mks_lp_r/css/style.css" media="screen" />
        
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.8.2.js"></script>
        
		<!-- Owl Carousel Assets -->
		<link href="<?php echo get_template_directory_uri(); ?>/mks_lp_r/js/owl-carousel/owl.carousel.css" rel="stylesheet">
		<link href="<?php echo get_template_directory_uri(); ?>/mks_lp_r/js/owl-carousel/owl.theme.css" rel="stylesheet">
		<link href="<?php echo get_template_directory_uri(); ?>/mks_lp_r/js/owl-carousel/owl.transitions.css" rel="stylesheet">

		<script src="<?php echo get_template_directory_uri(); ?>/mks_lp_r/js/owl-carousel/owl.carousel.js"></script>
		<link href="<?php echo get_template_directory_uri(); ?>/mks_lp_r/js/google-code-prettify/prettify.css" rel="stylesheet">
		
		<script>
		$(document).ready(function() {
	 
		  $("#owl-demo").owlCarousel({
			autoPlay : 3000,
			stopOnHover : true,
			navigation: false,
			paginationSpeed : 1000,
			goToFirstSpeed : 2000,
			singleItem : true,
			autoHeight : true,
			transitionStyle:"fade"
		  });
		 
		});
		</script>
		
		<style type="text/css">
			.slider{padding: 67px 0px; background: #ecf3fa url(<?php bloginfo('stylesheet_directory'); ?>/mks_lp_r/images/bg_slider3.jpg) center center no-repeat; background-size: cover; width: 100%; height: 100%;}
		</style>
		
		<?php// wp_head(); ?>
	</head>
	
	
<body>


<!-- START: Module -->
<div class="mainfull header">
	<div class="main_wrap">
		<div class="header_wrap">
			<div class="header_left">
				<a href="#">
					<img class="logo" src="<?php bloginfo('stylesheet_directory'); ?>/mks_lp_r/images/logo.png">
				</a>
			</div>
			<div class="header_right">
				<div class="header_phone_number">
					<div class="phone_text">
						+1 408 740 8224
					</div>
				</div>
				<div class="header_free_trial">
					<a class="free_trial_text" href="#">
						Free 30 day Trial
					</a>
				</div>
				<div class="clr"></div>
			</div>
			<div class="clr"></div>
		</div>
	</div>
</div>
<!-- END: Module -->



<!-- START: Module -->
<div class="mainfull slider border_box">
	<div class="main_wrap">
		<div class="slider_wrap">
			<div class="slider_left">
				<div class="slider_left_content">
					<p class="slider_h1">IMAGINE ONE PLATFORM THAT GIVES YOU <u>ALL</u> THE FREEDOM YOU NEED.</p>
					<p class="slider_p">Point and shoot automated email marketing</p>
					
					<div class="vd_button_wrap">
						<a class="vd_button" href="#">Video Tour</a>
					</div>
					
					<div class="form_wrap">
						<div class="home_form">
							<div class="form_headline">
								<p>SIGNUP FOR A FREE TRIAL ACCOUNT HERE</p>
							</div>
							<div class="form_element">
								<input name="name" type="text" class="form_imput" placeholder="Name">
								<input name="email" type="text" class="form_imput" placeholder="Email">
								<input name="phone" type="text" class="form_imput" placeholder="Telephone">
								<input name="submit" type="submit" class="button_form btn_green" value="Signup Free 30 Day Trial">
							</div>
						</div>
					</div>
					
				</div>
			</div>
			<div class="slider_right">
				
			</div>
			<div class="clr"></div>
		</div>
	</div>
</div>
<!-- END: Module -->



<!-- START: Module -->
<div class="mainfull the_offer border_box">
	<div class="main_wrap">
		<div class="offer_wrap">
			<div class="offer_content">
				<a href="">
					<img class="down" src="<?php bloginfo('stylesheet_directory'); ?>/mks_lp_r/images/down_arrow_c.png">
				</a>
				<div class="offer_text">
					<p class="offer_text_head">SPECIAL OFFER</p>
					<p class="offer_textp">Subscribe and we'll pay your subscription to these popular apps.</p>
				</div>
				<img class="offer_logos" src="<?php bloginfo('stylesheet_directory'); ?>/mks_lp_r/images/offer_logos.png">
			</div>
		</div>
	</div>
</div>
<!-- END: Module -->





<!-- START: Module -->
<div class="mainfull section5 border_box">
	<div class="main_wrap">
		<div class="section5_wrap">
			<div class="ss5_left">
				<img class="laptop_img" src="<?php bloginfo('stylesheet_directory'); ?>/mks_lp_r/images/mks_macbook.png" alt="Image">
			</div>
			<div class="ss5_right">
				<div class="form2_element">
					<div class="free_div">
						<p class="headlineh2">Free 30-Day Trial</p>
					</div>
					
					<div class="form2_wrap">
						<div class="fl_f2_label1">
							
						</div>
						<div class="fl_f2_input1">
							<input name="w_email" type="text" class="form2_imput">
						</div>
						<div class="clear"></div>
					</div>
					
					<div class="alinkdiv">
						<a href="#" class="alink">Why must I use work email?</a>
					</div>
					
					
					
					<div class="free_div">
						<label><input type="checkbox" name="subscription_ok" value="s_ok">&nbsp;<span class="f2_span">Ok, I'm interested. Pay for my subscription of</span></label>
					</div>
					
					
					<div class="form2_wrap">
						<div class="fl_f2_label2">
							
						</div>
						<div class="fl_f2_input2">
							<select name="crms" class="form2_select">
								<option value="">Select one</option>
								<option value="highrise">Highrise</option>
								<option value="linkedin">LinkedIn</option>
								<option value="Netsuite">Netsuite</option>
								<option value="Salesforce">Salesforce</option>
							</select>
						</div>
						<div class="clear"></div>
					</div>
					
					
					
					<div class="free_div">
						<input name="submit" type="submit" class="border_box border_rd button_form2 btn_green" value="Get Started">
					</div>
					
					<div class="free_div">
						<p class="f2_text">By submitting this information you agree to our <a href="#" class="aterm">Terms of Service</a></p>
					</div>
					
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</div>
<!-- END: Module -->



<!-- START: Module -->
<div class="mainfull features border_box">
	<div class="main_wrap">
		<div class="feature_wrap">
			<div class="feature_content">
				<div class="feature_headline">
					<p>OUR AMAZING FEATURES</p>
				</div>
				
				<div class="columns">
					<div class="one_third">
						<div class="feature_box">
							<div class="feature_icon_wrap">
								<div class="fi_wrap">
									<img class="feature_icon" src="<?php bloginfo('stylesheet_directory'); ?>/mks_lp_r/images/icon_cam.png" alt="Image">
								</div>
							</div>
							<h3>Point and shoot email marketing</h3>
							<p>on a platform rated 4.9 out of 5 Stars.</p>
						</div>
					</div>
					
					<div class="one_third">
						<div class="feature_box">
							<div class="feature_icon_wrap">
								<div class="fi_wrap">
									<img class="feature_icon" src="<?php bloginfo('stylesheet_directory'); ?>/mks_lp_r/images/icon_play.png" alt="Image">
								</div>
							</div>
							<h3>Cherry pick prospects</h3>
							<p>From a simple interactive display.</p>
						</div>
					</div>
					
					<div class="one_third last">
						<div class="feature_box">
							<div class="feature_icon_wrap">
								<div class="fi_wrap">
									<img class="feature_icon" src="<?php bloginfo('stylesheet_directory'); ?>/mks_lp_r/images/robot.png" alt="Image">
								</div>
							</div>
							<h3>Set up automated tasks</h3>
							<p>Dozens of efficient workers on the job 24/7.</p>
						</div>
					</div>
					
					<div class="clear"></div>
					<!-- END one row -->
					
					
					<div class="one_third">
						<div class="feature_box">
							<div class="feature_icon_wrap">
								<div class="fi_wrap">
									<img class="feature_icon" src="<?php bloginfo('stylesheet_directory'); ?>/mks_lp_r/images/icon_analytics.png" alt="Image">
								</div>
							</div>
							<h3>Deep Reporting are and analytics</h3>
							<p>Customizable so you can get to the information you need most, right away!</p>
						</div>
					</div>
					
					<div class="one_third">
						<div class="feature_box">
							<div class="feature_icon_wrap">
								<div class="fi_wrap">
									<img class="feature_icon" src="<?php bloginfo('stylesheet_directory'); ?>/mks_lp_r/images/icon_connect.png" alt="Image">
								</div>
							</div>
							<h3>Connect CRM cloud apps in seconds</h3>
							<p>and be wowed by seamless data exchange.</p>
						</div>
					</div>
					
					<div class="one_third last">
						<div class="feature_box">
							<div class="feature_icon_wrap">
								<div class="fi_wrap">
									<img class="feature_icon" src="<?php bloginfo('stylesheet_directory'); ?>/mks_lp_r/images/icon_package.png" alt="Image">
								</div>
							</div>
							<h3>Choose a package that suits you</h3>
							<p>Enjoy only the flexibility we offer.</p>
						</div>
					</div>
					
					<div class="clear"></div>
					<!-- END one row -->
					
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</div>
</div>
<!-- END: Module -->




<!-- START: Module -->
<div class="mainfull the_stories border_box">
	<div class="main_wrap">
		<div class="stories_wrap">
			<div class="stories_content">
				<div class="stories_healdine"><p>SUCCESS STORIES</p></div>
				<div id="owl-demo" class="owl-carousel">
					<div>
						<div class="stories_item">
							<h4>Challenges solved for Dell</h4>
							<p>Fast, meticulous execution: Lists with over 50 fields of data are pulled at the last minute;<br>compiling a matrix of up to 50 pieces of information for every customer into each email;<br>Reliable delivery: Warranty and renewal information sent to 500,000 customers 30, 60 and 90 days before expiry... <a href="<?php bloginfo('url'); ?>/success-stories/dell-computer">Read more</a></p>
							
							<div class="st_logo_wrap">
								<img class="icon_st" src="<?php bloginfo('stylesheet_directory'); ?>/mks_lp_r/images/dell_logo.png" alt="Image">
							</div>
						</div>
					</div>
					
					<div>
						<div class="stories_item">
							<h4>Challenges solved for Care</h4>
							<p>The goal was to engage in outreach to 5 different potential partner segments in a metered fashion. The aim was to allow their sales representatives the ability to devote the appropriate time to personally interact with each new lead... <a href="<?php bloginfo('url'); ?>/success-stories/story3">Read more</a></p>
							
							<div class="st_logo_wrap">
								<img class="icon_st" src="<?php bloginfo('stylesheet_directory'); ?>/mks_lp_r/images/care_logo.png" alt="Image" style="max-width: 177px;">
							</div>
						</div>
					</div>
					
					<div>
						<div class="stories_item">
							<h4>Bayshore Solutions</h4>
							<p>Makesbridge has made our corporate marketing execution exponentially easier.  It is a powerful, flexible and cost-effective platform.  In addition, I have responsive, reliable support contacts who consistently help me triage and innovate within the system to achieve elegant and efficient implementation of marketing initiatives. <a href="<?php bloginfo('url'); ?>/success-stories/bayshore-solutions">Read more</a></p>
							
							<div class="st_logo_wrap">
								<img class="icon_st" src="<?php bloginfo('stylesheet_directory'); ?>/mks_lp_r/images/bayshore_logo.png" alt="Image">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END: Module -->




<!-- START: Module -->
<div class="mainfull footer border_box">
	<div class="main_wrap">
		<div class="footer_wrap">
			<div class="footerl">
				<div class="fr_left"><img class="logo_foot" src="<?php bloginfo('stylesheet_directory'); ?>/mks_lp_r/images/mks_logo_fot.png" alt="Image" style="max-width: 60px;max-height: 50px;"></div>
				<div class="fr_right">
					<div class="frr_content">
						<ul class="footer_ul">
							<li><a href="#">Pricing</a></li>
							<li><a href="#">About Us</a></li>
							<li><a href="#">Privacy Policy</a></li>
						</ul>
						<div class="clear"></div>
						<p>14435 Big Basin Way, #122 Saratoga Village, CA 95070</p>
						<p>&copy; Copyright Makesbridge 2014</p>
					</div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="footerr">
				<div class="fot_icon">
					<ul class="footer_ul_icon">
						<li><a href="#"><img class="sicon_foot" src="<?php bloginfo('stylesheet_directory'); ?>/mks_lp_r/images/icon_twitter.png" alt="Twitter"></a></li>
						<li><a href="#"><img class="sicon_foot" src="<?php bloginfo('stylesheet_directory'); ?>/mks_lp_r/images/icon_linkedin.png" alt="Twitter"></a></li>
						<li><a href="#"><img class="sicon_foot" src="<?php bloginfo('stylesheet_directory'); ?>/mks_lp_r/images/icon_youtube.png" alt="Twitter"></a></li>
						<li><a href="#"><img class="sicon_foot" src="<?php bloginfo('stylesheet_directory'); ?>/mks_lp_r/images/icon_salesforce.png" alt="Twitter"></a></li>
						<li><a href="#"><img class="sicon_foot" src="<?php bloginfo('stylesheet_directory'); ?>/mks_lp_r/images/icon_mail.png" alt="Twitter"></a></li>
					</ul>
					<div class="clear"></div>
					<div class="fot_con">
						<img class="logo_foot" src="<?php bloginfo('stylesheet_directory'); ?>/mks_lp_r/images/mks_hd_conn.png" alt="Connet to grow" style="max-width: 237px; max-height: 20px; display: block;">
					</div>	
				</div>
				
				
			</div>
			<div class="clear"></div>
		</div>
	</div>
</div>
<!-- END: Module -->


</body>
</html>
	
