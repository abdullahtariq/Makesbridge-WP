<?php 

/*
Template Name: Landing: Signup2
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
	
	function playVideo(id,vUrl)
	{
		$('.pp_inline #video_frame').attr('src',vUrl);
		$('.pp_inline').find('#video_frame').css('display','block');
		$('#tiles').css('opacity','0');
		$('.pp_pic_holder').css('width','830px');
		$('.pp_content').css('width','800px');
		$('.pp_content').css('height','450px');
		$('.pp_inline').css('height','400px');
		_center_overlay();
		$.ajax({
			url:"<?php echo bloginfo('wpurl'); ?>/wp-admin/admin-ajax.php",
			type:'POST',
			data:'action=my_special_ajax_call&act=av&id='+ id,
			success:function(results)
			{
				//alert(results);
				//$('#views_'+id+' span em').html(results);
			}
		});
	}
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
  <div class="topbanner offers_topbanner" style="height:inherit; margin-bottom:20px;">
  	<div class="banncontent">
      <h1 style=" font-family:'proxima_nova_regular',Arial,sans-serif; font-size:48px; color:#2581b0; padding-top:20px;"><?php the_field('bann_head'); ?></h1>
    </div>
  </div>
  <div class="topbanner offers_topbanner" style="background:url(<?php echo $background_image["url"]; ?>) no-repeat 50% 0; padding:30px 0 0; background-size:cover;">
    <div class="banncontent">
    </div>
  </div>
  <div class="main">
    <div class="main_wrap" style="width:1100px;">
    	<div class="clear"></div>
    	<div class="sfsu_left" style="background:none;">
        	<div class="content"><?php the_content(); ?></div>
            <a href="javascript:void(0);" onclick="showChart();"><img src="<?php echo get_template_directory_uri(); ?>/images/laptop2.png" width="650" height="379" /></a>
            <h3>Click screen to experience our main page and watch videos</h3>
        </div>
        <div class="sfsu_right">
        	<div style="float:none; margin:0 auto 0 0px;" id="landingform">
                <h3>Get a free use case assessment AND  a free trial account:</h3>
                <p><img width="56" height="74" class="dirarrow" src="<?php echo bloginfo('template_url'); ?>/images/offer-form-dir-arrow.png"></p>
                <h2>Free 30-Day Trial</h2>        	
				<div id="offerform" class="form" style="margin:0px auto 0; width:310px;">
			  <div class="forminputbg" style="width:300px;">
			  <label style="line-height:inherit;">Work Email</label><input type="text" name="email1" id="email1" style="width:180px; box-shadow:none; line-height:inherit;"><p></p>
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
                                <li><strong>Nurture Tracks</strong> </li>
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
                                <li><strong>Activity Timeline(Update)</strong> </li>
                                <li><strong>LinkedIn Connections</strong> </li>
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
              		
    				<iframe id="video_frame" width="780" height="420" frameborder="no" src="http://player.vimeo.com/video/90175265?title=0&amp;byline=0&amp;portrait=0" style="display:none;"></iframe>
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
