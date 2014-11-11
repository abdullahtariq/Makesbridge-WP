<?php 

/*
Template Name: Landing: user sf5
*/

get_header(); ?>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/bmsgrid.css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/landing.css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/videos.css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/offers.css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/styles_a.css" media="screen" />

<script language="javascript">
	function validateTestOfForm() 
	{
		var fname = $('#ofname').val();
		var email = $('#ofemail').val();
		var phone = $('#ofphone').val();
		var interest = $('#ofinterest').val();
	
		var cmnErr = false;
		var emailErr = false;
		
		if(fname == '') {
			cmnErr = true;
			$('#ofnamebg').css('border','solid 1px #ff0000');
			$('#ofname_erroricon').show();
			$('#ofname_erroricon').attr('data-content','Please supply full name.');
		}
		else
		{
			//cmnErr = false;
			$('#ofnamebg').attr('style','');
			$('#ofname_erroricon').hide();
		}
		if(email == '')
		{
			cmnErr = true;
			$('#ofemailbg').css('border','solid 1px #ff0000');
			$('#ofemail_erroricon').show();
			$('#ofemail_erroricon').attr('data-content','Please supply email address.');			
		}
		else if(isValidEmail(email)==false)
		{
			cmnErr = true;
			$('#ofemailbg').css('border','solid 1px #ff0000');
			$('#ofemail_erroricon').show();
			$('#ofemail_erroricon').attr('data-content','Please supply valid email address.');			
		}
		else if(isEmail(email)==false)
		{
			emailErr = true;
			$('#ofmailbg').css('border','solid 1px #ff0000');
			$('#ofemail_erroricon').show();
			$('#ofemail_erroricon').attr('data-content','Email addresses of free services are not accepted. (e.g. @msn, @gmail, @yahoo)');			
		}
		else
		{
			$('#ofemailbg').attr('style','');
			$('#ofemail_erroricon').hide();
		}						
		if(phone == '')
		{
			cmnErr = true;
			$('#ofphonebg').css('border','solid 1px #ff0000');
			$('#ofphone_erroricon').show();
			$('#ofphone_erroricon').attr('data-content','Please supply phone number.');
		}
		else
		{
			$('#ofphonebg').attr('style','');
			$('#ofphone_erroricon').hide();
		}
		
		if(!cmnErr && !emailErr)
		{
			$('#offerform').append('<div class="loading"><p>Sending request....</p></div>');
			var str = 'ofname='+fname+'&ofemail='+email+'&ofphone='+phone+'&ofinterest='+interest+'&src='+$('#ofsource').val();
			$.ajax({
				url:"<?php echo bloginfo('wpurl'); ?>/wp-admin/admin-ajax.php",
				type:'POST',
				data:'action=my_special_ajax_call&act=sto&' + str,
				success:function(results)
				{
					$('#offerform').find('.loading').remove();
					if(results == 'err')
						alert('There is some error with the request please try again later.');
					else
						window.location = '<?php echo bloginfo('wpurl'); ?>/thank-you';
				}
			});
			return false;
		}
		else
		{
			alert('Please correct validation errors.');
			return false;
		}
	}
	
	function showoffers(type)
	{
		$('.row-fluid').append('<div class="loading"><p>Loading offers....</p></div>');
		$.ajax({
			url:"<?php echo bloginfo('wpurl'); ?>/wp-admin/admin-ajax.php",
			type:'POST',
			data:'action=my_special_ajax_call&act=shto&type=' + type + '&tax=freedom-offer',
			success:function(results)
			{
				//alert(results);
				$('#template_search_menu li').removeClass('active');
				var params = results.split('][');
				$('.thumbnails').html(params[1]);
				
				$('.pp_pic_holder').css('display','block');
				$('.pp_pic_holder').css('width','830px');
				$('.pp_overlay').css('display','block');
				$('.pp_overlay').css('width','100%');
				$('.pp_overlay').css('height','4000px');		
				$('.pp_inline').html($('#more_offers').html());
				$('.pp_content').css('width','800px');
				$('.pp_content').css('height','850px');
				$('.pp_inline').css('height','800px');
				/*$('.pp_inline').css('overflow-y','scroll');*/
				_center_overlay();
				$('.pp_pic_holder').css('top',($('.pp_pic_holder').css('top')-20)+'px');
				$('#pp_full_res .pp_inline p').css('margin-bottom','0');
				
				$('.row-fluid').find('.loading').remove();
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
	function closeIt(){ 	
		$('.pp_pic_holder').css('display','none');
		$('.pp_overlay').css('display','none');
		return false;
	}
</script>

<div id="videos_page">
  <?php
  if(have_posts()): 
  while(have_posts()) :
  	the_post();
  	the_content();
	endwhile;
  endif;
  ?>
  <div class="container">
  		<div class="row sf5-features">
  		<div class="col-xs-6 col-md-3"><img src="http://www.makesbridge.com/wp-content/uploads/2014/10/sf-img1.png"  class="img-responsive" alt="Responsive image"></div> <!-- 4column -->
  		<div class="col-xs-12 col-md-8"><h2>Smooth data synch with Salesforce</h2><p>Makesbridge integrates natively with Salesforce Pro and above; synchs automatically every 30 minutes; deployment is free and takes less than 30 minutes; save charges by hosting data with Makesbridge. </p></div> <!-- 8column -->
  		<div class="clear"></div>
  		</div>
  		<div class="row sf5-features">
  		<div class="col-xs-12 col-md-8"><h2>Compare campaign results inside Salesforce</h2><p>Automated campaigns are tyracked and compared in interactive charts - view them inside and outside of Salesforce. </p></div> <!-- 8column -->
  		<div class="col-xs-6 col-md-3"><img src="http://www.makesbridge.com/wp-content/uploads/2014/10/sf-img2.png"  class="img-responsive" alt="Responsive image"></div> <!-- 4column -->
  		<div class="clear"></div>
  		</div>
  		<div class="row sf5-features">
  		<div class="col-xs-6 col-md-3"><img src="http://www.makesbridge.com/wp-content/uploads/2014/10/sf-img3.png"  class="img-responsive" alt="Responsive image"></div> <!-- 4column -->
  		<div class="col-xs-12 col-md-8"><h2>See contacts' realtime activities</h2><p>Complete activity timeline of each contact shows email open, email click, web visits and change in the lead score in real time. </p></div> <!-- 8column -->
  		<div class="clear"></div>
  		</div>
  		<div class="row sf5-features">
  		<div class="col-xs-12 col-md-8"><h2>Sales love to use Course Correct</h2><p>Sales staff can manually add or remove contacts from a drip, and pause, play or skip messages.</p></div> <!-- 8column -->
  		<div class="col-xs-6 col-md-3"><img src="http://www.makesbridge.com/wp-content/uploads/2014/10/sf-img4.png"  class="img-responsive" alt="Responsive image"></div> <!-- 4column -->
  		<div class="clear"></div>
  		</div>
  </div><!-- Responsive Template -->
  <div class="container-fluid sf-partner-wrap">
  <div class="row">
    	 <div class="container">	
    	 		<h2>Subscribers rate Makesbridge 4.9/5 for Ease of Use, Value and Support.</h2>
    	 		<img src="http://www.makesbridge.com/wp-content/uploads/2014/10/partners.png"  class="img-responsive" alt="Responsive image">
    	 </div>
  </div>
</div>
 <!-- <div id="requestdemo_sec2">
    <div class="main_wrap">     
      <?php
        $requestdemo_sec2 = get_post(527); 
        echo $requestdemo_sec2->post_content;
        ?>
    </div>    
  </div>  -->
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
<style type="text/css">
#leftbar div{
	height: 38px !important;
    width: 40px !important;
}
</style>