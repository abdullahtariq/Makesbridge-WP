<?php 

/*
Template Name: Landing: LP Overview
*/

get_header(); ?>

<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/landing.css" media="screen" />

<div id="thankyou_page">
  <?php
  if(have_posts()): 
  while(have_posts()) :
  the_post();
  $background_image = get_field('bann_backimage');
	$top_image = get_field('bann_topimage');	
  ?>  
  <div class="main">
    <div class="main_wrap" style="width:1100px;">
    	<h1 style="width:600px; text-align:center; margin:40px auto; line-height:0.9em;"><?php the_field('bann_head'); ?></h1>
    	<div class="clear"></div>
    	<div class="sfsu_left">
            <div class="laptop">
            	<a href="http://vimeo.com/90911241?width=800&amp;height=450" rel="wp-video-lightbox">
            	<img width="71" height="71" style="border:0;" src="<?php echo bloginfo('template_url'); ?>/images/play-btn.png">
                </a>
            </div>
        </div>
        <div class="sfsu_right" style="margin-left:-20px; float:left;">
        	<div style="float:none; margin:0 auto 0 0px;" id="landingform">
                <h3>Get a free use case assessment AND  a free trial account:</h3>
                <p><img width="56" height="74" class="dirarrow" src="<?php echo bloginfo('template_url'); ?>/images/offer-form-dir-arrow.png"></p>
                <h2>Free 30-Day Trial</h2>        	
				<div id="offerform" class="form" style="margin:0px auto 0; width:310px;">
			  <div class="forminputbg" style="width:300px;">
			  <label>Work Email</label><input type="text" name="email1" id="email1" style="width:190px;"><p></p>
			  <div class="clear"></div>
			  </div>
			  <div class="workemailhelp" style="margin:10px 0 20px; font-size:13px;"><a title="" data-original-title="" data-placement="bottom" data-trigger="hover" data-content="For security reasons we do not provision trials to anonymous email addresses such as gmail, yahoo, and hotmail." data-toggle="popover" style="font-style:italic;&lt;br /&gt;
			  color:#31cbff; font-size:13px; letter-spacing:1px; cursor:pointer;">Why must I use a work email?</a>
			  </div>
			  <div style="margin-bottom:10px;">Choose one <strong>cloud app</strong> or <strong>service</strong> you want us to pay for:</div>
			  <div class="forminputbg" style="width:300px;"><label>Choose</label>
			  <select name="crms" id="crms" style="width:210px; padding-top:3px;"><option value="">Select one</option>
			  <option value=""></option>
			  <option value="" style="font-weight:bold;">Cloud Apps:</option>
              <option value="Google Apps">Google Apps</option>
			  <option value="Highrise">Highrise</option>
			  <option value="LinkedIn">LinkedIn</option>
			  <option value="Netsuite">Netsuite</option>
			  <option value="Salesforce">Salesforce</option>
			  <option value=""></option>
			  <option value="" style="font-weight:bold;">Services:</option>
			  <option value="Marketing consultant">Marketing consultant</option>
			  <option value="Sales consultant">Sales consultant</option>
			  <option value="CRM consultant">CRM consultant</option>
			  <option value="Adwords consultant">Adwords consultant</option>
			  </select>
			  <div class="clear"></div>
			  </div>
			  <div class="getstarted" onclick="showsupop('signup_now','1');">I’d like to try out Makesbridge</div>
			  <div class="clear"></div>
			  <div class="home_termslink">
			  By submitting this information you agree to our <a href="javascript:void(0);" onclick="showtospop('termspop');">Terms of Service</a>
			  </div>
			  <div class="clear"></div>
			  </div>
			</div>			  
        </div>
        <div class="clear"></div>
    </div>
  </div>
  <div id="requestdemo_sec2">
    <div class="main_wrap">     
      <?php
        $requestdemo_sec2 = get_post(527); 
        echo $requestdemo_sec2->post_content;
        ?>
    </div>    
  </div>
  <?php
  endwhile;
  endif;
  ?>
</div>
<?php get_footer(); ?>


                      
<div class="pp_pic_holder pp_default foff" style="top: 410.5px; left: 82.5px; display: none; width: 1100px;">
  <div class="ppt" style="opacity: 1; display: block; width: 1070px;">&nbsp;</div>
  <div class="pp_top">
    <div class="pp_left"></div>
    <div class="pp_middle"></div>
    <div class="pp_right"></div>
  </div>
  <div class="pp_content_container" style="position:relative;">
    <div class="pp_left">
      <div class="pp_right">
        <div class="pp_content" style="height: 500px; width: 1070px;">
          <div class="pp_loaderIcon" style="display: none;"></div>
          <div class="pp_fade" style="display: block;"> <a title="Expand the image" class="pp_expand" href="#" style="display: none;">Expand</a>
            <div class="pp_hoverContainer" style="height: 453px; width: 1070px; display: none;"> <a href="#" class="pp_next">next</a> <a href="#" class="pp_previous">previous</a> </div>
            <div id="pp_full_res">
              <div class="pp_inline" style="height:450px;">
              		
              </div>
            </div>
            <div class="pp_details" style="width: 1070px;">
              <div class="pp_nav" style="display: none;"><a class="pp_play" href="#">Play</a> <a class="pp_arrow_previous" href="#">Previous</a>
                <p class="currentTextHolder">1/1</p>
                <a class="pp_arrow_next" href="#">Next</a> </div>
              <p class="pp_description" style="display: none;"></p>              
          </div>
        </div>
      </div>
    </div>
  </div>
  	<a href="javascript:void(0);" class="pp_close" onclick="closeIt()" style="top:10px; z-index:1000; right:10px;">Close</a> 
  </div>
  <div class="pp_bottom">
    <div class="pp_left"></div>
    <div class="pp_middle"></div>
    <div class="pp_right"></div>
  </div>
</div>
<div class="pp_overlay" style="opacity: 0.6; height: 4000px; width: 100%; display: none;"></div>
