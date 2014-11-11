<?php 
/* Template Name: Home2 */
	
get_header(); ?>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/home2.css" media="screen" />
<!-- START: Connect -->
<div class="main">
  <div id="slider">
    <ul class="slides">
      <?php
                query_posts('post_type=slider&post_status=publish&showposts=100&orderby=post_date&order=asc');
                $i=1;
                if(have_posts()): 
                while(have_posts()) :
                    the_post();
                    $background_image = get_field('slide');
                    ?>
      <li class="step" style="background:url(<?php echo $background_image["url"]; ?>) no-repeat 0 0; width:1600px; height:308px;">
        <div class="slidercontent">
          <div style="height:169px;">
            <h2>
              <?php the_field('slider_head'); ?>
            </h2>
            <h3>
              <?php the_field('slider_subhead'); ?>
            </h3>
            <p class="slidecontent">
              <?php the_field('slider_desc'); ?>
            </p>
          </div>
        </div>
      </li>
      <?php
                $i++;
                endwhile;
                endif;
                ?>
    </ul>
  </div>
  <div class="main_wrap" style="position:relative; z-index:1000;">
    <div class="home-special-offer" onclick="window.location='<?php echo bloginfo("url"); ?>/freedom-offers';">
      <h2>Freedom Offers!</h2>
      <p>Subscribe and we'll pay your subscription to one of these popular apps.</p>
      <span class="clear"></span> <img src="<?php bloginfo('stylesheet_directory'); ?>/images/home-spoffer-sficon.png" width="81" height="57" style="border:0; margin-left:180px;" /> 
      <!--<img src="<?php bloginfo('stylesheet_directory'); ?>/images/home-spoffer-netsuite-icon.png" width="78" height="45" style="border:0; margin-top:-45px;" />--> 
      <img src="<?php bloginfo('stylesheet_directory'); ?>/images/home-spoffer-highriseicon.png" width="48" height="52" style="border:0; margin-top:-10px;" /> <img src="<?php bloginfo('stylesheet_directory'); ?>/images/home-spoffer-liicon.png" width="103" height="28" style="border:0; margin-top:-35px;" /> <span class="clear"></span> </div>
    <div class="clear"></div>
    <div class="laptop"> 
      <!--<a rel="wp-video-lightbox" href="http://vimeo.com/90911241?width=800&height=450">
            	<img src="<?php bloginfo('stylesheet_directory'); ?>/images/play-btn.png" width="71" height="71" style="border:0;" />
                </a>-->
      <?php
				echo do_shortcode('[videos id="2484" width="570" height="450"]');
				?>
    </div>
    <div class="trialform">
      <div style="color:#5fa6cb; margin-top:20px; padding:0; font-size:30px;" class="formhead">Free 30-Day Trial</div>
      <div class="form" style="margin-top:20px; width:400px;">
        <div class="forminputbg" style="width:348px;">
          <label>Work Email</label>
          <input type="text" name="email1" id="email1" style="width:240px;" />
          <div class="clear"></div>
        </div>
        <div class="workemailhelp" style="margin:10px 0 20px; font-size:13px;"><a data-placement="bottom" data-trigger="hover" data-content="For security reasons we do not provision trials to anonymous email addresses such as gmail, yahoo, and hotmail." data-toggle="popover" style="font-style:italic; 
                        color:#31cbff; font-size:13px; letter-spacing:1px; cursor:pointer;">Why must I use a work email?</a> </div>
        <div style="margin-bottom:10px;">Choose one <strong>cloud app</strong> or <strong>service</strong> you want us to pay for:</div>
        <div class="forminputbg" style="width:348px;">
          <label>Choose</label>
          <select name="crms" id="crms" style="width:260px; padding-top:3px;">
            <option value="">Select one</option>
            <option value=""></option>
            <option value="" style="font-weight:bold;"><strong>Cloud Apps:</strong></option>
            <option value="Google Apps">Google Apps</option>
            <option value="Highrise">Highrise</option>
            <option value="LinkedIn">LinkedIn</option>
            <option value="Netsuite">Netsuite</option>
            <option value="Salesforce">Salesforce</option>
            <option value=""></option>
            <option value="" style="font-weight:bold;"><strong>Services:</strong></option>
            <option value="Marketing consultant">Marketing consultant</option>
            <option value="Sales consultant">Sales consultant</option>
            <option value="CRM consultant">CRM consultant</option>
            <option value="Adwords consultant">Adwords consultant</option>
          </select>
          <div class="clear"></div>
        </div>
        <div class="getstarted" onclick="showsupop('signup_now','1');">Get Started</div>
        <div class="clear"></div>
        <div class="home_termslink"> By submitting this information you agree to our <a href="javascript:void(0);" onclick="showtospop('termspop');">Terms of Service</a> </div>
        <div class="clear"></div>
      </div>
      </a> </div>
    <div class="clear"></div>
  </div>
</div>
<!-- END: Connect --> 
<!-- START: Module 02 -->
<div class="main" style="background: #f4f9fb; margin-top:40px;">
  <div class="main_wrap">
    <div class="homeboxes">
        <div onclick="window.location='http://www.makesbridge.com/marketing'" class="homebox">
          <h3><a href="http://www.makesbridge.com/marketing">Point and shoot email marketing</a></h3>
          <div class="textwidget">
            <p>on a platform rated 4.9 out of 5 Stars.</p>
          </div>
        </div>
        <div onclick="window.location='http://www.makesbridge.com/sales'" class="homebox">
          <h3><a href="http://www.makesbridge.com/sales">Sales staff can cherry pick prospects</a></h3>
          <div class="textwidget">
            <p>from a simple interactive display.</p>
          </div>
        </div>
        <div onclick="window.location='http://www.makesbridge.com/automation'" class="homebox">
          <h3><a href="http://www.makesbridge.com/automation">Set up automated tasks</a></h3>
          <div class="textwidget">
            <p>to put dozens of efficient workers on the job 24/7.</p>
          </div>
        </div>
        <div onclick="window.location='http://www.makesbridge.com/analytics'" class="homebox">
          <h3><a href="http://www.makesbridge.com/analytics">Reports are deep and analytics are customizable</a></h3>
          <div class="textwidget">
            <p>so you can get to the information you need most, right away!</p>
          </div>
        </div>
        <div onclick="window.location='http://www.makesbridge.com/connections'" class="homebox">
          <h3><a href="http://www.makesbridge.com/connections">Connect your cloud apps including CRM in seconds</a></h3>
          <div class="textwidget">
            <p>and be wowed by seamless data exchange.</p>
          </div>
        </div>
        <div onclick="window.location='http://www.makesbridge.com/pricing'" class="homebox">
          <h3><a href="http://www.makesbridge.com/pricing">Choose a package that suits your needs</a></h3>
          <div class="textwidget">
            <p>to enjoy flexibility only we offer.</p>
          </div>
        </div>
        <div class="clear"></div>
      </div>
  </div>
</div>
<!-- END: Module 02 --> 
<!-- START: Module 02 -->
<div class="main">
  <div class="main_wrap">
    <div class="stories" style="margin:0 auto 150px; height:300px;">
      <div class="headline_stories">
        <h2>Success Stories</h2>
      </div>
      <!--<script language="javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery1.js"></script>--> 
      <script language="javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.film_roll.js"></script> 
      <script language="javascript">
                    jQuery(function() {
                      var film_roll = new FilmRoll({
                          container: '#film_roll',
						  interval: 12000
                        });
						//setFavicon();
						$('link[type*=icon]').detach().appendTo('head');
                    });					
                </script>
      <div id="film_roll">
        <?php
                    //$stories = get_posts('post_type=success-stories&post_status=publish&showposts=3&orderby=post_date&order=desc');
					query_posts(array(
						'post_type' => 'success-stories',
						'post_status' => 'publish',
						'showposts' => 10,
						'orderby' => 'rand',
						'meta_query' => array(
							array(
								'key' => 'is_featured',
								'value' => true
							)
						)
					));
                    if (have_posts()) : while (have_posts()) : the_post();
						$image = '';
						if (has_post_thumbnail( $post->ID ) ):
							$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
						endif;
						?>
        <div class="homestory" style="width:400px;">
          <?php
							if($post)
							{
							?>
          <a href="<?php the_permalink(); ?>">
          <p class="st_text"><?php echo $post->post_excerpt; ?>...Read more</p>
          <!--<span class="clear"></span>
									<span class="ss_auth"><?php //echo $story->author; ?></span>-->
          <?php
									if($image)
									{
									?>
          <span class="ss_logo" style="float:none; text-align:center; width:100%; display:block;"><img style="border:0;" src="<?php echo $image[0]; ?>" /></span>
          <?php
									}
									?>
          <!--<span class="clear"></span>--> 
          </a>
          <?php
							}					
							?>
        </div>
        <?php
                    endwhile; 
					endif;
                    ?>
      </div>
    </div>
  </div>
</div>
<!-- END: Module 02 -->

<?php get_footer(); ?>
