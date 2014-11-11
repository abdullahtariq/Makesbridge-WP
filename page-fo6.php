<?php 

/* Template Name: Freedom Offers 6 */

get_header(); ?>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/offers.css" media="screen" />
<script language="javascript">	
	
	function _center_overlay(){
			windowHeight = $(window).height(), windowWidth = $(window).width();
			scroll_pos = _get_scroll();
			contentHeight = $('.pp_pic_holder').height(), contentwidth = $('.pp_pic_holder').width();

			projectedTop = (windowHeight/2) + scroll_pos['scrollTop'] - (contentHeight/2);
			if(projectedTop < 0) projectedTop = 0;
			
			//alert(contentHeight);
			//alert(windowHeight);
			if(contentHeight > windowHeight)
				return;

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
		
	function validateTestOfForm() 
	{
		//$('.errors').html('');
		var fname = $('#ofname').val();
		var email = $('#ofemail').val();
		var phone = $('#ofphone').val();
		var interest = $('#ofinterest').val();
	
		var cmnErr = false;
		var emailErr = false;
		//$('.erroricon').hide();
		
		if(fname == '') {
			//errorMessage += '- Please enter first name.\n';
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
			//errorMessage += '- Please enter valid email address.\n';
			cmnErr = true;
			$('#ofemailbg').css('border','solid 1px #ff0000');
			$('#ofemail_erroricon').show();
			$('#ofemail_erroricon').attr('data-content','Please supply email address.');			
		}
		else if(isValidEmail(email)==false)
		{
			//errorMessage += '- Please enter valid email address.\n';
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
			//cmnErr = false;					
			$('#ofemailbg').attr('style','');
			$('#ofemail_erroricon').hide();
		}						
		if(phone == '')
		{
			//errorMessage += '- Please enter phone.\n';
			cmnErr = true;
			$('#ofphonebg').css('border','solid 1px #ff0000');
			$('#ofphone_erroricon').show();
			$('#ofphone_erroricon').attr('data-content','Please supply phone number.');
		}
		else
		{
			//cmnErr = false;
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
					//alert(results);
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
</script>

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.9.0.min.js"></script>
<?php
global $wpdb;
$args = array(
		'post_type' => 'freedom-offers',
		'post_status' => 'publish',
		'showposts' => '1000',
		'orderby' => 'post_date',
		'order' => 'desc',
		'tax_query' => array(
			  array(
				  'taxonomy' => 'offer-type',
				  'field' => 'slug',
				  'terms' => 'freedom-offer'
			  )
		)
	 );
$offers = get_posts($args);	
?>
<style type="text/css">
	.animation_image {background: #F9FFFF;border: 1px solid #E1FFFF;padding: 10px;width: 500px;margin-right: auto;margin-left: auto;}
</style>
<input type="hidden" name="typeField" id="typeField" value="popular" />
<input type="hidden" name="track_load" id="track_load" value="0" />
<input type="hidden" name="loading" id="loading" value="false" />
<input type="hidden" name="total_groups" id="total_groups" value="<?php echo $total_groups; ?>" />
<div id="videos_page">
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
          </div>
        </div>
  <?php
  endwhile;
  endif;
  ?>
  <div class="main_wrap" style="width:960px; padding:0; margin:25px auto 0px;">
    <div class="row-fluid" style="position:relative;">
        <div class="clear"></div>
        <div style="float:left; width:500px; margin-left:0px;">
            <h2 style="margin:0px auto 30px; font-size:25px; line-height:1em;"><?php the_field('bann_subhead'); ?></h2>
            <a href="#leftoffers" class="viewoffersbtn">Click to see all the offers</a>
        </div>
        <div style="float:left; width:450px;">
            <div id="rightform">
                <h3>Reserve a Freedom Offer for your<br>business:</h3>
                <img class="dirarrow" src="<?php echo get_template_directory_uri(); ?>/images/offer-form-dir-arrow.png" width="56" height="74" />
                <div id="offerform" class="form">
                    <div class="forminputbg ofnamebg">
                        <label>Full name</label>
                        <input type="text" id="ofname">
                        <span title="" data-original-title="" id="ofname_erroricon" class="erroricon" data-placement="left" data-trigger="hover" data-toggle="popover"></span>
                        <div class="clear"></div>
                    </div>
                    <div class="forminputbg ofemailbg">
                        <label>Work Email</label>
                        <input type="text" id="ofemail" style="width:180px;">
                        <span data-toggle="popover" data-trigger="hover" data-placement="left" class="erroricon" id="ofemail_erroricon" data-original-title="" title=""></span>
                    </div>
                    <div class="forminputbg ofphonebg">
                        <label>Phone</label>
                        <input type="text" id="ofphone" style="width:210px;">
                        <span data-toggle="popover" data-trigger="hover" data-placement="left" class="erroricon" id="ofphone_erroricon" data-original-title="" title=""></span>
                    </div>
                    <p style="font-family:'proxima_nova_regular',Arial,sans-serif; font-size:12px; color:#4c849c; margin-bottom:10px;">Choose one cloud app or service you want us to pay for:</p>
                    <div class="forminputbg ofinterestbg">
                        <label>I am most interested in</label>
                        <select name="ofinterest" id="ofinterest" style="width:117px;">
                            <option value="">Select one</option>
                            <option value=""></option>
                            <optgroup label="Cloud Apps:">  
                            <option value="Google Apps">Google Apps</option>                         
                            <option value="Highrise">Highrise</option>
                            <option value="LinkedIn">LinkedIn</option>
                            <option value="Netsuite">Netsuite</option>
                            <option value="Salesforce">Salesforce</option>
                            </optgroup>
                            <option value=""></option>     
                            <optgroup label="Services:">
                            <option value="Marketing consultant">Marketing consultant</option>
                            <option value="Sales consultant">Sales consultant</option>
                            <option value="CRM consultant">CRM consultant</option>
                            <option value="Adwords consultant">Adwords consultant</option>
                            <option value=""></option>
                            </optgroup>                        
                        </select>              	
                        <span style="right:-15px;" data-toggle="popover" data-trigger="hover" data-placement="right" class="erroricon" id="ofinterest_erroricon" data-original-title="" title=""></span>
                    </div>
                    <div class="clear"></div>
                    <div style="position:relative; text-align:center;" class="ofinterestbg">
                        <input type="hidden" name="ofsource" id="ofsource" value="offer pu inquiry" />
                        <button onclick="validateTestOfForm();" id="offer_button" class="submit">I'd like to discuss the offer</button>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
        <div class="clear"></div>
        <?php
        require_once('alloffers.php');
		?>
        <div class="clear"></div>        
    </div>
  </div>
</div>
<div style="background: #ffffff;" class="main">
<div class="main_wrap" style="padding: 0px 0 50px; width:1000px;">
<h3 style="text-align:center; margin:40px auto;">Terms and Conditions Apply. <a onclick="showtospop('terms3pop');" href="javascript:void(0);"><strong>Please read</strong></a>.</h3>
<div class="clear"></div>
</div>
</div>
	
<?php get_footer(); ?>
<div class="pp_pic_holder pp_default foff" style="top: 410.5px; left: 282.5px; display: none; width: 772px;">
  <div class="ppt" style="opacity: 1; display: block; width: 740px;">&nbsp;</div>
  <div class="pp_top">
    <div class="pp_left"></div>
    <div class="pp_middle"></div>
    <div class="pp_right"></div>
  </div>
  <div class="pp_content_container" style="position:relative;">
    <div class="pp_left">
      <div class="pp_right">
        <div class="pp_content" style="height: 389px; width: 740px;">
          <div class="pp_loaderIcon" style="display: none;"></div>
          <div class="pp_fade" style="display: block;"> <a title="Expand the image" class="pp_expand" href="#" style="display: none;">Expand</a>
            <div class="pp_hoverContainer" style="height: 253px; width: 740px; display: none;"> <a href="#" class="pp_next">next</a> <a href="#" class="pp_previous">previous</a> </div>
            <div id="pp_full_res">
              <div class="pp_inline" style="overflow:auto; height:350px;">
                
              </div>
            </div>
            <div class="pp_details" style="width: 740px;">
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