<?php 

/*
Template Name: Landing: Signup
*/

get_header(); ?>
<link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/isotope.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/animate.css" type="text/css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/dash.css">
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/landing.css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/offers.css" media="screen" />

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
          <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery2.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.isotope.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		var $tiles = $('#tiles');
		//alert($tiles);
		$tiles.isotope({
		  itemSelector: '.box',
		  masonry : {
			columnWidth : 105,
			gutter: 0
		  }
		});
		// change size of clicked box
		$tiles.delegate( '.box', 'click', function(){                               
		  $(this).toggleClass('expanded');
		  $tiles.isotope('reLayout');
		});			
	});
	
	function playVideo(vUrl)
	{
		$('.pp_inline #video_frame').attr('src',vUrl);
		$('.pp_inline').find('#video_frame').css('display','block');
		$('#tiles').css('opacity','0');
		$('.pp_pic_holder').css('width','830px');
		$('.pp_content').css('width','800px');
		$('.pp_content').css('height','450px');
		$('.pp_inline').css('height','400px');
		_center_overlay();
	}
</script>
<script language="javascript">	
	function _center_overlay(){
			windowHeight = $(window).height(), windowWidth = $(window).width();
			scroll_pos = _get_scroll();
			contentHeight = $('.pp_pic_holder').height(), contentwidth = $('.pp_pic_holder').width();

			projectedTop = parseInt(scroll_pos['scrollTop']);
			if(projectedTop < 0) projectedTop = 0;
			
			/*if(contentHeight > windowHeight)
				return;*/

			$('.pp_pic_holder').css({
				'top': projectedTop,
				'left': (windowWidth/2) + scroll_pos['scrollLeft'] - (contentwidth/2)
			});
	};
	function _get_scroll(){
		if (this.pageYOffset) {
			return {scrollTop:this.pageYOffset,scrollLeft:this.pageXOffset};
		} else if (document.documentElement && document.documentElement.scrollTop) { // Explorer 6 Strict
			return {scrollTop:document.documentElement.scrollTop,scrollLeft:document.documentElement.scrollLeft};
		} else if (document.body) {// all other Explorers
			return {scrollTop:document.body.scrollTop,scrollLeft:document.body.scrollLeft};
		};
	};
	function showChart()
	{
		$('.pp_pic_holder').css('display','block');
		$('.pp_overlay').css('display','block');		
		$('.pp_inline').find('#video_frame').css('display','none');
		$('.pp_inline').find('.thumbnails').html('');
		$('#tiles').css('opacity','1');
		if($('.pp_inline #tiles'))
			$('.pp_inline #tiles').css('opacity','1');
		else
			$('#tiles').show();
		$('.pp_inline').append($('#tiles'));
		$('.pp_inline #tiles').css('display','block');
		$('.pp_pic_holder').css('width','1100px');
		$('.pp_content').css('width','1070px');
		$('.pp_content').css('height','3000px');
		$('.pp_inline').css('height','2950px');
		$('.pp_inline .off_details').hide();
		_center_overlay();
	}		
</script>
<div id="thankyou_page">
  <?php
  if(have_posts()): 
  while(have_posts()) :
  the_post();
  $background_image = get_field('bann_backimage');
	$top_image = get_field('bann_topimage');	
  ?>  
  <div class="topbanner offers_topbanner" style="background:url(<?php echo $background_image["url"]; ?>) no-repeat 50% 0; padding:30px 0 0; background-size:cover;">
    <div class="banncontent">
      <h1><?php the_field('bann_head'); ?></h1>
      <h2><?php the_field('bann_subhead'); ?></h2>
    </div>
  </div>
  <div class="main">
    <div class="main_wrap" style="width:1100px;">
    	<?php
        if(strpos($_SERVER['REQUEST_URI'],'sf-signup') != '' && strpos($_SERVER['REQUEST_URI'],'sf-signup') != -1)
		{
		?>
    		<div class="apx_offer">
          <div class="apx_offer_wrap">
          	<div class="clr"></div>
            <div class="apx_offer_l">
              <div class="apx_headline">
                <div class="apx_hhr">
                  <h3 style="color: #66c219;padding: 23px 0 0;font-size: 23px;">3 Radical Offers to Help You Grow!</h3>
                </div>
                <div class="clr"></div>
              </div>
              <div class="columns_apx">
                <div class="one_third_apx">
                  <div class="app_box2">
                    <div class="app_box2_l">
                      <div class="ibox_img_wrap">
                        <center>
                          <p></p>
                          <div class="ibox_celwrap2"> <img class="ibox_img2" src="<?php echo bloginfo('template_url'); ?>/mks_lp_r/images/miga.png" alt="Image"> </div>
                          <p></p>
                          <p></p>
                        </center>
                      </div>
                    </div>
                    <div class="app_box2_r">
                      <p class="ibox_head2">Marketing Consultant Voucher &ndash; $2,000</p>
                      <p class="ibox_p2">Jump start your marketing with a proven resource.</p>
                      <div class="clear"></div>
                      <p><a href="<?php echo bloginfo('url'); ?>/congratulations?add-to-cart=1237" class="offer_buynow">Buy Now</a><a onclick="showhideDetail('box1')" class="seedetail2" href="javascript:void(0)" id="box1_link">See Details</a> </p>
                    </div>
                    <div class="clr"></div>
                    <div style="display: none;" class="offerdetail" id="box1_detail">
                      <h2 class="h2box ">Sign up for MKS Enterprise for 12 Months and we’ll pay for a marketing consultant.</h2>
                      <p class="box_p2">If you need help with automation strategy, digital marketing basics or any project.</p>
                      <p class="box_p2">A perfect way to start a new beginning on a great platform is to have a professional help you maximize it’s use!</p>
                      <div class="value2"><span>Value</span> $2,000</div>
                    </div>
                  </div>
                </div>
                <div class="one_third">
                  <div class="app_box2">
                    <div class="app_box2_l">
                      <div class="ibox_img_wrap">
                        <center>
                          <p></p>
                          <div class="ibox_celwrap2"> <img class="ibox_img2" src="<?php echo bloginfo('template_url'); ?>/mks_lp_r/images/ibox_sf.png" alt="Image"> </div>
                          <p></p>
                          <p></p>
                        </center>
                      </div>
                    </div>
                    <div class="app_box2_r">
                      <p class="ibox_head2">3 Seats of Salesforce Pro Edition!</p>
                      <p class="ibox_p2">Sell more. Grow faster. Close anywhere.</p>
                      <div class="clear"></div>
                      <p><a href="<?php echo bloginfo('url'); ?>/congratulations?add-to-cart=1236" class="offer_buynow">Buy Now</a><a onclick="showhideDetail('box2')" class="seedetail2" href="javascript:void(0)" id="box2_link">See Details</a> </p>
                    </div>
                    <div class="clr"></div>
                    <div style="display: none;" class="offerdetail" id="box2_detail">
                      <h2 class="h2box ">Subscribe to MKS Enterprise and we’ll rebate your cost for 3 Salesforce Sales Cloud Seats!</h2>
                      <p class="box_p2">Access the world’s most popular CRM Tool.</p>
                      <p class="box_p2">From the small business to the large enterprise, Salesforce is a solution that will help sales reps everywhere add to pipelines, reduce sales cycles, and sell more.</p>
                      <div class="value2"><span>Value</span> $195/Mo</div>
                    </div>
                  </div>
                </div>
                <div class="one_third last_apx">
                  <div class="app_box2">
                    <div class="app_box2_l">
                      <div class="ibox_img_wrap">
                        <center>
                          <p></p>
                          <div class="ibox_celwrap2"> <img class="ibox_img2" src="<?php echo bloginfo('template_url'); ?>/mks_lp_r/images/ibox_sf.png" alt="Image"> </div>
                          <p></p>
                          <p></p>
                        </center>
                      </div>
                    </div>
                    <div class="app_box2_r">
                      <p class="ibox_head2">5 Hours of Certified Salesforce Consulting</p>
                      <p class="ibox_p2">Get the most out of your Salesforce subscription</p>
                      <div class="clear"></div>
                      <p><a href="<?php echo bloginfo('url'); ?>/congratulations?add-to-cart=1229" class="offer_buynow">Buy Now</a><a onclick="showhideDetail('box3')" class="seedetail2" href="javascript:void(0)" id="box3_link">See Details</a> </p>
                    </div>
                    <div class="clr"></div>
                    <div style="display: none;" class="offerdetail" id="box3_detail">
                      <h2 class="h2box ">Subscribe to MKS PRO for 4 months to get 5 Hours for any project!</h2>
                      <p class="box_p2">A certified consultant will optimize your Salesforce account.</p>
                      <p class="box_p2">Tell us where you need help and we’ll pay a certified Salesforce consultant to help.</p>
                      <p class="box_p2">We pay the consultant when the 5 Hour project is completed.</p>
                      <p class="box_p2">Subscribe to MKS PRO for 4 Months</p>
                      <div class="value2"><span>Value</span> $600</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="apx_offer_r">
              <div class="msg_new2_wrap">
                <div class="msg_new2"> “Makesbridge has made our corporate marketing execution exponentially easier. It is a powerful, flexible and cost-effective platform.” </div>
                <div class="partner_msg_info"> &ndash; Kimberly McCormick,<br>
                  Director of Corporate Marketing<br>
                  Bayshore Solutions <a target="_blank" href="http://www.bayshoresolutions.com/"><img class="partner_site_logo" src="<?php echo bloginfo('template_url'); ?>/mks_lp_r/images/bayshore_logo.png" alt="Image"></a>
                  <p></p>
                  <div class="clr"></div>
                </div>
              </div>
            </div>
            <div class="clr"></div>
          </div>
        </div>
        <?php
		}
		?>
    	<div class="clear"></div>
    	<?php the_content(); ?>
        <div class="clear"></div>
    </div>
  </div>
  <div class="main_wrap" style="width:960px; padding:0; margin:25px auto 0px;">
    <div class="row-fluid" style="position:relative;">
    	<div class="spfo">
        	<h2>Makesbridge Freedom Offers</h2>
        	<p>Our bundles provide professionals with things they need to run their businesses with ease.</p>
        </div>
        <div class="clear"></div>
        <?php
        require_once('alloffers.php');
		?>        
        <div class="clear"></div>
        <h3 style="text-align:center; margin:20px auto 0; font-size:inherit; font-size:17px;">Terms and Conditions Apply. <a onclick="showtospop('terms3pop');" href="javascript:void(0);" style="font-size:inherit;"><strong>Please read</strong></a>.</h3>
    </div>
  </div>
  <div id="requestdemo_sec2">
    <div class="main_wrap">         	
      <?php
        $requestdemo_sec2 = get_post(527); 
        echo $requestdemo_sec2->post_content;
        ?>        
    </div>
    <div style="position: relative; overflow: hidden; height: 360px; opacity:0;" class="clearfix isotope" id="tiles">
                        <div class="box green  isotope-item" style="position: absolute; left: 0px; top: 0px; transform: translate(0px, 0px); padding:5px;">
                          <div class="title"><span>First Steps </span>
                            <p>Watch video demonstrations that teach you how to complete essential tasks.</p>
                            <img alt="" src="<?php echo get_template_directory_uri(); ?>/images/1fs.png">
                            <div class="helpvid"> <a class="helpbtn"><i class="icon helpbig "></i><span>Help</span></a> <a class="videobtn"><i class="icon videobig "></i><span>Video</span></a> </div>
                          </div>
                          <div class="tile-shortcuts">
                            <ul>
                              <li><a class="new-campaign" onclick="addView2(1524,'http://player.vimeo.com/video/90175265?width=800&height=450',800,450)"><i class="icon campaign"></i><span>Send mass Email</span></a>
                                <div style="display:block" class="schelpvid videobar"> <a onclick="addView2(1524,'http://player.vimeo.com/video/90175265?width=800&height=450',800,450)"><i class="icon video"></i><span>Video</span></a> </div>
                              </li>
                              <li><a onclick="addView2(2484,'http://player.vimeo.com/video/90911241?width=800&height=450',800,450)"><i class="icon socialsharing"></i><span>Enable social sharing</span></a>
                                <div style="display:block" class="schelpvid videobar"> <a onclick="addView2(2484,'http://player.vimeo.com/video/90911241?width=800&height=450',800,450)"><i class="icon video"></i><span>Video</span></a> </div>
                              </li>
                              <li><a class="new-template" onclick="addView2(1523,'http://player.vimeo.com/video/91455913?width=800&height=450',800,450)"><i class="icon create-email-templates"></i><span>Create email template</span></a>
                                <div style="display:block" class="schelpvid videobar"> <a onclick="addView2(1523,'http://player.vimeo.com/video/91455913?width=800&height=450',800,450)"><i class="icon video"></i><span>Video</span></a> </div>
                              </li>
                              <li><a class="create-target" onclick="addView2(2484,'http://player.vimeo.com/video/90911241?width=800&height=450',800,450)"><i class="icon createsegments"></i><span>Create targets</span></a><div style="display:block" class="schelpvid videobar">
                                  <a onclick="addView2(2484,'http://player.vimeo.com/video/90911241?width=800&height=450',800,450)"><i class="icon video"></i><span>Video</span></a>
                              	</div>
                              </li>
                              <li><a class="connect-crm" onclick="addView2(2484,'http://player.vimeo.com/video/90911241?width=800&height=450',800,450)"><i class="icon crm"></i><span>Connect with apps</span></a>
                                <div style="display:block" class="schelpvid videobar"> <a onclick="addView2(2484,'http://player.vimeo.com/video/90911241?width=800&height=450',800,450)"><i class="icon video"></i><span>Video</span></a> </div>
                              </li>
                              <li><a class="new-graphics" onclick="addView2(1588,'http://player.vimeo.com/video/93542801?width=800&height=450',800,450)"><i class="icon graphic"></i><span>Upload Images</span></a>
                                <div style="display:block" class="schelpvid videobar"> <a onclick="addView2(1588,'http://player.vimeo.com/video/93542801?width=800&height=450',800,450)"><i class="icon video"></i><span>Video</span></a> </div>
                              </li>
                              <li><a class="csv-upload" onclick="addView2(1590,'http://player.vimeo.com/video/87609468?width=800&height=450',800,450)"></i><span>Upload contacts</span></a>
                                <div style="display:block" class="schelpvid videobar"> <a onclick="addView2(1590,'http://player.vimeo.com/video/87609468?width=800&height=450',800,450)')"><i class="icon video"></i><span>Video</span></a> </div>
                              </li>
                              <li><a class="view-contacts" onclick="addView2(1525,'http://player.vimeo.com/video/90595740?width=800&height=450',800,450)"><i class="icon viewcontact"></i><span>Viewing contacts</span></a><div style="display:block" class="schelpvid videobar">
                                  <a onclick="addView2(1525,'http://player.vimeo.com/video/90595740?width=800&height=450',800,450)"><i class="icon video"></i><span>Video</span></a>
                              	</div>
                              </li>
                              <li><a class="camapign-report" onclick="addView2(1806,'http://player.vimeo.com/video/90598216?width=800&height=450',800,450)"><i class="icon accessreports"></i><span>Access reports</span></a>
                                <div style="display:block" class="schelpvid videobar"> <a onclick="addView2(1806,'http://player.vimeo.com/video/90598216?width=800&height=450',800,450)"><i class="icon video"></i><span>Video</span></a> </div>
                              </li>
                            </ul>
                          </div>
                          <!--  tile-shortcuts --> 
                        </div>
                        <div class="box blue isotope-item" style="position: absolute; left: 0px; top: 0px; transform: translate(210px, 0px); padding:5px;">
                          <div class="title"><span>Marketing</span>
                            <p style="display:none">Watch video demonstrations that teach you how to complete essential tasks.</p>
                            <img alt="" src="<?php echo get_template_directory_uri(); ?>/images/2sm.png">
                            <div class="helpvid "> <a><i class="icon helpbig "></i><span>Help</span></a> <a><i class="icon videobig "></i><span>Video</span></a> </div>
                          </div>
                          <div class="tile-shortcuts">
                            <ul>
                              <li class="new-campaign"><a onclick="addView2(1524,'http://player.vimeo.com/video/90175265?width=800&height=450',800,450)"><i class="icon campaign"></i><span>Send mass email</span></a>
                                <div style="display: block;" class="schelpvid videobar"> <a onclick="addView2(1524,'http://player.vimeo.com/video/90175265?width=800&height=450',800,450)"><i class="icon video"></i><span>Video</span></a> </div>
                              </li>
                              <li class="campaign-listing"><a onclick="addView2(1524,'http://player.vimeo.com/video/90175265?width=800&height=450',800,450)"><i class="icon campaignlist"></i><span>Mass emails</span></a>
                                <div style="display:block;" class="schelpvid videobar"> <a onclick="addView2(1524,'http://player.vimeo.com/video/90175265?width=800&height=450',800,450)"><i class="icon video"></i><span>Video</span></a> </div>
                              </li>
                              <li class="camapign-report"><a onclick="addView2(1526,'http://player.vimeo.com/video/90598216?width=800&height=450',800,450)"><i class="icon creports"></i><span>Mass email reports</span></a>
                                <div style="display:block;" class="schelpvid videobar"> <a onclick="addView2(1526,'http://player.vimeo.com/video/90598216?width=800&height=450',800,450)"><i class="icon video"></i><span>Video</span></a> </div>
                              </li>
                              <li class="nurture-tracks nt-li"><a onclick="addView2(2057,'http://player.vimeo.com/video/99293579?width=800&height=450',800,450)"><i class="icon nurturetracks"></i><span>Nurture tracks</span></a>
                                <div style="display:block;" class="schelpvid videobar"> <a onclick="addView2(2057,'http://player.vimeo.com/video/99293579?width=800&height=450',800,450)"><i class="icon video"></i><span>Video</span></a> </div>
                              </li>                              
                              <li class="template-gallery"><a onclick="addView2(1523,'http://player.vimeo.com/video/91455913?width=800&height=450',800,450)"><i class="icon templates"></i><span>Template Gallery</span></a>
                                <div style="display:block;" class="schelpvid videobar"> <a onclick="addView2(1523,'http://player.vimeo.com/video/91455913?width=800&height=450',800,450)"><i class="icon video"></i><span>Video</span></a> </div>
                              </li>
                            </ul>
                          </div>
                          <!--  tile-shortcuts --> 
                          
                        </div>
                        <div class="box red isotope-item" style="position: absolute; left: 0px; top: 0px; transform: translate(420px, 0px); padding:5px;">
                          <div class="title"><span>Studio</span>
                            <p style="display:none">Watch video demonstrations that teach you how to complete essential tasks.</p>
                            <img alt="" src="<?php echo get_template_directory_uri(); ?>/images/6st.png">
                            <div class="helpvid"> <a><i class="icon helpbig "></i><span>Help</span></a> <a><i class="icon videobig "></i><span>Video</span></a> </div>
                          </div>
                          <div class="tile-shortcuts">
                            <ul>
                              <li class="new-template"><a onclick="addView2(1523,'http://player.vimeo.com/video/91455913?width=800&height=450',800,450)"><i class="icon create-email-templates"></i><span>Create template</span></a>
                                <div style="display:block;" class="schelpvid videobar"> 
                                  <!--<a ><i class="icon help"></i><span>Help</span></a>--> 
                                  <a onclick="addView2(1523,'http://player.vimeo.com/video/91455913?width=800&height=450',800,450)"><i class="icon video"></i><span>Video</span></a> </div>
                              </li>
                              <li class="template-gallery"><a onclick="addView2(1523,'http://player.vimeo.com/video/91455913?width=800&height=450',800,450)"><i class="icon templates"></i><span>Template Gallery</span></a>
                                <div style="display: block;" class="schelpvid videobar"> 
                                  <!--<a ><i class="icon help"></i><span>Help</span></a>--> 
                                  <a onclick="addView2(1523,'http://player.vimeo.com/video/91455913?width=800&height=450',800,450)"><i class="icon video"></i><span>Video</span></a> </div>
                              </li>                              
                              <li class="new-graphics"><a onclick="addView2(1588,'http://player.vimeo.com/video/93542801?width=800&height=450',800,450)"><i class="icon graphic"></i><span>Image Gallery</span></a>
                                <div style="display: block;" class="schelpvid videobar"> 
                                  <!--<a ><i class="icon help"></i><span>Help</span></a>--> 
                                  <a onclick="addView2(1588,'http://player.vimeo.com/video/93542801?width=800&height=450',800,450)"><i class="icon video"></i><span>Video</span></a> </div>
                              </li>
                            </ul>
                          </div>
                          <!--  tile-shortcuts --> 
                          
                        </div>
                        <div class="box orange isotope-item" style="position: absolute; left: 0px; top: 0px; transform: translate(630px, 0px); padding:5px;">
                          <div class="title"><span>Contacts</span>
                            <p style="display:none">Watch video demonstrations that teach you how to complete essential tasks.</p>
                            <img alt="" src="<?php echo get_template_directory_uri(); ?>/images/3ct.png">
                            <div class="helpvid"> <a><i class="icon helpbig "></i><span>Help</span></a> <a><i class="icon videobig "></i><span>Video</span></a> </div>
                          </div>
                          <div class="tile-shortcuts">
                            <ul>                              
                              <li class="csv-upload"><a onclick="addView2(1590,'http://player.vimeo.com/video/87609468?width=800&height=450',800,450)"><i class="icon csvuploadicon"></i><span>CSV Upload</span></a>
                                <div style="display: block;" class="schelpvid videobar"> <a onclick="addView2(1590,'http://player.vimeo.com/video/87609468?width=800&height=450',800,450)"><i class="icon video"></i><span>Video</span></a> </div>
                              </li>
                              <li class="connect-crm"><a onclick="addView2(1585,'http://player.vimeo.com/video/94249680?width=800&height=450',800,450)"><i class="icon n_cloudimport"></i><span>Cloud Imports</span></a>
                                <div style="display: block;" class="schelpvid videobar"> 
                                  <!--<a ><i class="icon help"></i><span>Help</span></a>--> 
                                  <a onclick="addView2(1585,'http://player.vimeo.com/video/94249680?width=800&height=450',800,450)"><i class="icon video"></i><span>Video</span></a> </div>
                              </li>
                              <li style="visibility: hidden"></li>
                            </ul>
                          </div>
                          <!--  tile-shortcuts --> 
                          
                        </div>
                        <div class="box brown isotope-item" style="position: absolute; left: 0px; top: 0px; transform: translate(0px, 180px); padding:5px;">
                          <div class="title"><span>Reports &amp; Analytics</span>
                            <p style="display:none">Watch video demonstrations that teach you how to complete essential tasks.</p>
                            <img alt="" src="<?php echo get_template_directory_uri(); ?>/images/4ra.png">
                            <div class="helpvid"> <a><i class="icon helpbig "></i><span>Help</span></a> <a><i class="icon videobig "></i><span>Video</span></a> </div>
                          </div>
                          <div class="tile-shortcuts">
                            <ul>
                              <li class="camapign-report"><a><i class="icon emarketing"></i><span>Email</span></a>
                                <div class="schelpvid videobar"> <a><i class="icon help"></i><span>Help</span></a> <a><i class="icon video"></i><span>Video</span></a> </div>
                              </li>
                              <li><a><i class="icon website"></i><span>Website</span></a>
                                <div style="display:block" class="schelpvid videobar"> <a><span style="padding-left:25px;">Coming Soon!</span></a> </div>
                              </li>
                            </ul>
                          </div>
                          <!--  tile-shortcuts --> 
                          
                        </div>
                        <div class="box yellow isotope-item" style="position: absolute; left: 0px; top: 0px; transform: translate(210px, 180px); padding:5px;">
                          <div class="title"><span>Connect with Apps</span>
                            <p style="display:none">Watch video demonstrations that teach you how to complete essential tasks.</p>
                            <img alt="" src="<?php echo get_template_directory_uri(); ?>/images/5ca.png">
                            <div class="helpvid"> <a><i class="icon helpbig "></i><span>Help</span></a> <a><i class="icon videobig "></i><span>Video</span></a> </div>
                          </div>
                          <div class="tile-shortcuts">
                            <ul>
                              <li class="crm-salesforce"><a onclick="addView2(1585,'http://player.vimeo.com/video/94249680?width=800&height=450',800,450)"><i class="icon dashsalesforce"></i><span>Salesforce</span></a>
                                <div style="display: block;" class="schelpvid videobar"> 
                                  <!--<a ><i class="icon help"></i><span>Help</span></a>--> 
                                  <a onclick="addView2(1585,'http://player.vimeo.com/video/94249680?width=800&height=450',800,450)"><i class="icon video"></i><span>Video</span></a> </div>
                              </li>
                              <li class="crm-netsuite"><a onclick="addView2(1586,'http://player.vimeo.com/video/94708979?width=800&height=450',800,450)"><i class="icon dashnetsuite"></i><span>Netsuite</span></a>
                                <div style="display: block;" class="schelpvid videobar"> 
                                  <!--<a ><i class="icon help"></i><span>Help</span></a>--> 
                                  <a onclick="addView2(1586,'http://player.vimeo.com/video/94708979?width=800&height=450',800,450)"><i class="icon video"></i><span>Video</span></a> </div>
                              </li>
                              <li class="crm-highrise"><a onclick="addView2(1593,'http://player.vimeo.com/video/95050778?width=800&height=450',800,450)"><i class="icon dashhighrise"></i><span>Highrise</span></a>
                                <div style="display: block;" class="schelpvid videobar"> <a onclick="addView2(1593,'http://player.vimeo.com/video/95050778?width=800&height=450',800,450)"><i class="icon video"></i><span>Video</span></a> </div>
                              </li>
                              <li class="crm-linkedin"><a><i class="icon dashlinkedin"></i><span>Linkedin</span></a>
                                <div style="display:block" class="schelpvid videobar"> <a><span style="padding-left:25px;">Coming Soon!</span></a> </div>
                              </li>
                            </ul>
                          </div>
                          <!--  tile-shortcuts --> 
                          
                        </div>
                        <div class="box gray supporthelp isotope-item" style="position: absolute; left: 0px; top: 0px; transform: translate(420px, 180px); padding:5px;">
                          <div class="title"><span>Support &amp; Help</span>
                            <p style="display:none">Watch video demonstrations that teach you how to complete essential tasks.</p>
                            <img alt="" src="<?php echo get_template_directory_uri(); ?>/images/9sh.png"> </div>
                          <div class="tile-shortcuts">
                            <ul>
                              <li><a id="_liveChat" class="popup" href="https://server.iad.liveperson.net/hc/69791877/?cmd=file&file=visitorWantsToChat&site=69791877&byhref=1&imageUrl=https://server.iad.liveperson.net/hcp/Gallery/ChatButton-Gallery/English"><i class="icon livechat"></i><span>Live Chat </span></a>
                                <div class="schelpvid"> <a href="https://server.iad.liveperson.net/hc/69791877/?cmd=file&file=visitorWantsToChat&site=69791877&byhref=1&imageUrl=https://server.iad.liveperson.net/hcp/Gallery/ChatButton-Gallery/English"><i class="icon help"></i><span>Help</span></a> <a><i class="icon video"></i><span>Video</span></a> </div>
                              </li>
                              <li><a id="_knowledgeBase" class="popup" href="<?php echo bloginfo('url'); ?>/video-gallery"><i class="icon knowledgebase"></i><span>Knowledgebase</span></a>
                                <div class="schelpvid"> <a href="<?php echo bloginfo('url'); ?>/video-gallery"><i class="icon help"></i><span>Help</span></a> <a><i class="icon video"></i><span>Video</span></a> </div>
                              </li>
                              <li><a id="_supportMessage" class="popup" href="<?php echo bloginfo('url'); ?>/request-demo"><i class="icon supportmessage"></i><span>Support message</span></a>
                                <div class="schelpvid"> <a href="<?php echo bloginfo('url'); ?>/request-demo"><i class="icon help"></i><span>Help</span></a> <a><i class="icon video"></i><span>Video</span></a> </div>
                              </li>
                            </ul>
                          </div>
                          <!--  tile-shortcuts --> 
                        </div>
                        <div class="box voilet releasecalender isotope-item" style="position: absolute; left: 0px; top: 0px; transform: translate(630px, 180px); padding:5px;">
                          <div class="title"><span>Release Calendar</span>
                            <p>Here's what's planned for release in the coming months. <br>
                              <br>
                              View screenshots and videos. <br>
                              <br>
                              Please tell us what you think for the planned release to help us prioritize new features! </p>
                            <img alt="" src="<?php echo get_template_directory_uri(); ?>/images/10rc.png">
                            <div class="helpvid"> <a><i class="icon helpbig "></i><span>Help</span></a> <a><i class="icon videobig "></i><span>Video</span></a> </div>
                          </div>
                          <div class="tile-shortcuts">
                            <div>
                              <h4>Marketing</h4>
                              <ol>
                                <li><strong>Nurture Tracks</strong></li>
                                <li><strong>1:1 Email </strong></li>
                                <!--<li><strong>Workflow Wizard</strong> <em>18 Feb</em></li>
                                          <li><strong>Upload Images </strong><em>07 Feb</em></li>
                                          <li><strong>Contact Journey <br/> (Update)</strong> <em>28 Feb</em></li>
                                          <li><strong>1:1 Email</strong> <em>09 Feb</em></li>-->
                              </ol>
                            </div>
                            <div>
                              <h4>Contacts</h4>
                              <ol>
                                <li><strong>Activity Timeline(Update)</strong></li>
                                <li><strong>LinkedIn Connections</strong></li>
                                <li><strong>Connection Social Monitoring</strong> </li>
                              </ol>
                            </div>
                            <div>
                              <h4>Reports &amp; Analytics</h4>
                              <ol>
                                <li><strong>Website stats</strong></li>
                                <li><strong>SEO stats</strong></li>
                              </ol>
                            </div>
                            <div>
                              <h4>App Connections</h4>
                              <ol>
                                <li><strong>Highrise connection</strong></li>
                                <li><strong>LinkedIn</strong></li>
                                <li><strong>MKS'14 for Salesforce</strong></li>
                              </ol>
                            </div>
                            <div>
                              <h4>Studio</h4>
                              <ol>
                                <li><strong>Easy Editor</strong></li>
                              </ol>
                            </div>
                          </div>
                          <!--  tile-shortcuts --> 
                          
                        </div>
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
  <!--<div class="pp_top">
    <div class="pp_left"></div>
    <div class="pp_middle"></div>
    <div class="pp_right"></div>
  </div>-->
  <div class="pp_content_container" style="position:relative;">
    <div class="pp_left">
      <div class="pp_right">
        <div class="pp_content" style="height: 3000px; width: 1070px;">
          <div class="pp_loaderIcon" style="display: none;"></div>
          <div class="pp_fade" style="display: block;"> <a title="Expand the image" class="pp_expand" href="#" style="display: none;">Expand</a>
            <div class="pp_hoverContainer" style="height: 453px; width: 1070px; display: none;"> <a href="#" class="pp_next">next</a> <a href="#" class="pp_previous">previous</a> </div>
            <div id="pp_full_res">
              <div class="pp_inline" style="height:2950px;">
              		
    				<iframe id="video_frame" width="780" height="420" frameborder="no" src="http://player.vimeo.com/video/90175265?title=0&amp;byline=0&amp;portrait=0"></iframe>
              </div>
            </div>
            <!--<div class="pp_details" style="width: 1070px;">
              <div class="pp_nav" style="display: none;"><a class="pp_play" href="#">Play</a> <a class="pp_arrow_previous" href="#">Previous</a>
                <p class="currentTextHolder">1/1</p>
                <a class="pp_arrow_next" href="#">Next</a> </div>
              <p class="pp_description" style="display: none;"></p>              
          </div>-->
        </div>
      </div>
    </div>
  </div>
  	<a href="javascript:void(0);" class="pp_close" onclick="closeIt()" style="top:10px; z-index:1000; right:10px;">Close</a> 
  </div>
  <!--<div class="pp_bottom">
    <div class="pp_left"></div>
    <div class="pp_middle"></div>
    <div class="pp_right"></div>
  </div>-->
</div>
<div class="pp_overlay" style="opacity: 0.6; height: 4000px; width: 100%; display: none;"></div>
