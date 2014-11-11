<?php 

/*
Template Name: Landing: Landing2
*/

get_header(); ?>

<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/landing.css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/videos.css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/offers.css" media="screen" />

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
  <div class="main_wrap pain" style="width:1000px; padding:0; margin:50px auto 0px;">
  <div class="row-fluid" style="position:relative;">
    <div class="spfo">
      <h2>Makesbridge Freedom Offers</h2>
      <p>Our bundles provide professionals with things they need to run their businesses with ease.</p>
    </div>
    <div class="clear"></div>
    <?php
        require_once('alloffers2.php');
		?>
    <div class="clear"></div>
    <h3 style="text-align:center; margin:100px auto 0; font-size:inherit; font-size:17px;">Terms and Conditions Apply. <a onclick="showtospop('terms3pop');" href="javascript:void(0);" style="font-size:inherit;"><strong>Please read</strong></a>.</h3>
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