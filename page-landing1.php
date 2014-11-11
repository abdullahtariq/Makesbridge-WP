<?php 

/*
Template Name: Landing Page 1
*/

get_header(); ?>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/landing.css" media="screen" />
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
				'left': (parseInt(windowWidth/2) + parseInt(scroll_pos['scrollLeft'])) - (contentwidth/2)
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
		$('#chart_frame').attr('src','http://content.bridgemailsystem.com/pms/embed/vchart/p/BzAEqwsFl20Kp21Rn30BgyStRf/?tcolor=#dddddd');
		$('.pp_pic_holder').css('display','block');
		$('.pp_overlay').css('display','block');
		/*$('.pp_inline').css('overflow-y','scroll');*/
		_center_overlay();
	}
	
	function closeIt(){ 	
		$('.pp_pic_holder').css('display','none');
		$('.pp_overlay').css('display','none');
		return false;
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
  <div class="topbanner" style="background:url(<?php echo $background_image["url"]; ?>) no-repeat 50% 0; background-size:cover; height:281px;">    
  	<div class="banncontent" style=" padding-top:60px;">
    	<h1 style="color:#3c6d86; width:470px; line-height:1em; text-align:left; font-size:42px;">
			<?php the_field('bann_head'); ?>
          </h1>
     </div>
  </div>
  <div class="topbanner landing1_topbanner">
    <div class="banncontent">    	
    	<div class="clear"></div>
    	<div style="float:left; width:640px;">
            <a href="javascript:void(0);" onclick="showChart();"><img style="margin-left:50px;" src="<?php echo get_template_directory_uri(); ?>/images/chart-thumb.png" width="529" height="514" /></a>
        </div>
        <div style="float:left; width:420px;">
        	<?php
			the_content();
			?>
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
  <div class="main">
    <div class="main_wrap pagecontent" style="padding:0 20px; width:960px; margin:50px auto 100px;">
      
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
        <div class="pp_content" style="height: 1250px; width: 1070px;">
          <div class="pp_loaderIcon" style="display: none;"></div>
          <div class="pp_fade" style="display: block;"> <a title="Expand the image" class="pp_expand" href="#" style="display: none;">Expand</a>
            <div class="pp_hoverContainer" style="height: 950px; width: 1070px; display: none;"> <a href="#" class="pp_next">next</a> <a href="#" class="pp_previous">previous</a> </div>
            <div id="pp_full_res">
              <div class="pp_inline" style="height:950px;">
              	<!--<iframe src='http://content.bridgemailsystem.com/pms/embed/vchart/xhDfSm33Pq26Eo17xRty/?tcolor=#dddddd' frameborder='0' scrolling='no' style='overflow:hidden' height='800' width='1020'></iframe>-->
                <iframe id="chart_frame" frameborder='0' scrolling='no' style='overflow:hidden' height='1200' width='1020'></iframe>
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
