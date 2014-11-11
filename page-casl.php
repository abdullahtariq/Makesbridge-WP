<?php 

/* Template Name: CASL Compliance */

get_header(); ?>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/videos.css" media="screen" />
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script language="javascript">
	function getVideos()
	{
		if($('#filters').val() == 'viewed' || $('#filters').val() == 'recent' || $('#filters').val() == 'featured')
			showposts($('#filters').val());
		else
			showpostsby('cat',$('#filters').val());
	}
	function showposts(type)
	{
		$('#videosearchinput').val('');
		$('.row-fluid').append('<div class="loading"><p>Loading videos....</p></div>');
		$.ajax({
			url:"<?php echo bloginfo('wpurl'); ?>/wp-admin/admin-ajax.php",
			type:'POST',
			data:'action=my_special_ajax_call&act=sp&cols=2&type=' + type,
			success:function(results)
			{
				$('#template_search_menu li').removeClass('active');
				var params = results.split('][');
				$('.badge').html(params[0]);
				$('.thumbnails').html(params[1]);
				$('.row-fluid').find('.loading').remove();
				$('#'+type).addClass('active');
			}
		});
	}
	
	function showpostsby(type,slug)
	{
		$('#videosearchinput').val('');
		$('.row-fluid').append('<div class="loading"><p>Loading videos....</p></div>');
		$.ajax({
			url:"<?php echo bloginfo('wpurl'); ?>/wp-admin/admin-ajax.php",
			type:'POST',
			data:'action=my_special_ajax_call&act=spb&cols=2&slug='+ slug +'&type=' + type,
			success:function(results)
			{				
				var params = results.split('][');
				$('.badge').html(params[0]);
				$('.thumbnails').html(params[1]);
				$('.row-fluid').find('.loading').remove();
				if(type == 'cat')
				{
					$('#template_search_menu li').removeClass('active');
					$('#'+slug).addClass('active');
				}
			}
		});
	}
	function closeIt(){ 	
		$('.pp_pic_holder').css('display','none');
		$('.pp_overlay').css('display','none');
		return false;
	}
	function addView(id,url)
	{
		$('.pp_pic_holder').css('display','block');
		$('.pp_overlay').css('display','block');
		//alert($(this).attr('url'));
		$('#video_frame').attr('src',url);
		_center_overlay();
		$.ajax({
			url:"<?php echo bloginfo('wpurl'); ?>/wp-admin/admin-ajax.php",
			type:'POST',
			data:'action=my_special_ajax_call&act=av&id='+ id + '&path='+ window.location.pathname.substr(1,window.location.pathname.length),
			success:function(results)
			{
				//alert(results);				
				$('#views_'+id+' span em').html(results);
			}
		});
	}
	function onkp(e)
	{
		var code = (e.keyCode ? e.keyCode : e.which);
		if(code == 13) {
			searchVideo();
		}
	}
	function searchVideo()
	{
		$('.row-fluid').append('<div class="loading"><p>Loading videos....</p></div>');
		$.ajax({
			url:"<?php echo bloginfo('wpurl'); ?>/wp-admin/admin-ajax.php",
			type:'POST',
			data:'action=my_special_ajax_call&act=sv&cols=2&text='+ $('#videosearchinput').val(),
			success:function(results)
			{
				//alert(results);				
				var params = results.split('][');
				$('.badge').html(params[0]);
				$('.thumbnails').html(params[1]);
				$('.row-fluid').find('.loading').remove();
			}
		});
	}
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
	function resize(){
		// Expand the image
		if($('#resizer').hasClass('pp_expand')){
			$('#resizer').removeClass('pp_expand').addClass('pp_contract');
			$('.pp_pic_holder').css('width','832px');
			doresize = false;
		}else{
			$('#resizer').removeClass('pp_contract').addClass('pp_expand');
			$('.pp_pic_holder').css('width','567px');
			doresize = true;
		};
	
		//_hideContent(function(){ $.prettyPhoto.open(); });

		return false;
	}
	
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
			var str = 'ofname='+fname+'&ofemail='+email+'&ofphone='+phone+'&ofinterest='+interest+'&src='+$('#ofsource').val()+'&page='+$('#page').val();
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
	function scrollDown()
	{			
		$('html, body').animate({
		scrollTop: $(".head_bar").offset().top
		}, 1000);
	}
</script>
<div id="videos_page">		
    <?php
    if(have_posts()): 
	while(have_posts()) :
	the_post();
	$background_image = get_field('bann_backimage');
	$top_image = get_field('bann_topimage');
	$vlid = get_field('landing_video_id');	
	$page = $post->post_name;
	?>
    <div class="topbanner casl_topbanner" style="background:url(<?php echo $background_image["url"]; ?>) no-repeat 50% 0; background-size:cover; height:350px;">
        <div class="banncontent">
          <h1 style="">
            <?php the_field('bann_head'); ?>
          </h1>
          <h2 style="">
            <?php the_field('bann_subhead'); ?>
          </h2>          
        </div>
  	</div>
    <?php
	endwhile;
	endif;
	?>    
    <div class="challange_bar">
    	<div class="main_wrap" style="width:1000px; padding:0; margin:auto;">    
        	<h2>Challenge</h2>
            <div class="clear"></div>
            <div class="casl_boxes casl_box1">
            	<h2>Count me in</h2>
                <p>You collected email addresses of individuals and did not have properly worded express consent.</p>
                <img src="<?php echo bloginfo('template_url'); ?>/images/down-dir-arrow.png" width="37" height="37" style="border:0" />
                <h3>You need</h3>
                <p>a consistent message stream to opt-ins to get express consent.</p>
                <img src="<?php echo bloginfo('template_url'); ?>/images/down-dir-arrow.png" width="37" height="37" style="border:0" />
                <h3>Use</h3>
                <p>CASL Express Consent Drip</p>
            </div>
            <div class="casl_boxes casl_box2">
            	<h2>Canadian, eh?</h2>
                <p>You collected opt-in email addresses of individuals and do not know if they are located in Canada.</p>
                <img src="<?php echo bloginfo('template_url'); ?>/images/down-dir-arrow.png" width="37" height="37" style="border:0" />
                <h3>You need</h3>
                <p>a consistent messages stream to capture addresses that does not sour people on your company.</p>
                <img src="<?php echo bloginfo('template_url'); ?>/images/down-dir-arrow.png" width="37" height="37" style="border:0" />
                <h3>Use</h3>
                <p>My Canadians drip Profile Update drip</p>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <div id="video_main" class="main_wrap" style="width:1000px; padding:0; margin:50px auto;">    	
        <div class="row-fluid" style="position:relative;">
            <div class="clear"></div>
              <div class="featvideo_left">
              <?php
				the_content();
				
              $video = get_post($vlid);
			  if (has_post_thumbnail( $video->ID ) ):
				  $image = wp_get_attachment_image_src( get_post_thumbnail_id( $video->ID ), 'single-post-thumbnail' );
			  endif;
			  $is_featured = get_post_meta($video->ID,'is_featured',true);
			  ?>
                <ul class="thumbnails vl" style="margin:auto;">
                  <li style="margin:auto; float:none;">
                  		<div class="thumbnail">
						  <?php
                          if($is_featured)
                          {
                          ?>
                              <img class="feat_star" src="<?php echo bloginfo('template_url'); ?>/images/featured-icon.png" width="45" height="44" />
                          <?php
                          }
                          ?>
                          <div class="img">
                            <a class="previewbtn1 wp-video-lightbox" style="display:block;" onclick="addView(<?php echo $video->ID; ?>,'http://player.vimeo.com/video/<?php echo get_post_meta($video->ID,'video_id',true); ?>?width=800&height=450')"></a>
                            <img src="<?php echo bloginfo("template_url"); ?>/thumb.php?src=<?php echo $image[0]; ?>&w=331&h=214" alt="" height="214" />
                          </div>
                          <div class="caption" style="background-color:#fff;">
                            <h3><?php echo $video->post_title; ?></h3>                       
                              <p class="tags">
                              <?php $tags = wp_get_post_terms( $video->ID, 'post_tag', $args );
                              if($tags):
                              foreach($tags as $tag):
                              ?>
                                  <a href="javascript:void(0);" onclick="showpostsby('tag','<?php echo $tag->slug; ?>')"><?php echo $tag->name; ?></a>
                              <?php
                              endforeach;
                              endif;
                              $views = get_post_meta($video->ID,'views',true);
                              ?>
                              </p>
                            <div id="views_<?php echo $video->ID; ?>" class="btm-bar"> <span><span class="icon view"></span> <em><?php echo ($views > 0) ? $views : '0'; ?></em></span></div>
                        </div>
                      </div>
                  </li>
                </ul>
                <div class="clear"></div>                
              </div>
              <div class="featvideo_right">
                <div id="rightform">
                  <h3>Start enjoying your own free<br>Makesbridge account with this<br>and other great features:</h3>
                  <div id="offerform" class="form">
                    <div class="forminputbg ofnamebg">
                      <label>Full name</label>
                      <input type="text" id="ofname" style="width:225px;">
                      <span title="" data-original-title="" id="ofname_erroricon" class="erroricon" data-placement="left" data-trigger="hover" data-toggle="popover"></span>
                      <div class="clear"></div>
                    </div>
                    <div class="forminputbg ofemailbg">
                      <label>Work Email</label>
                      <input type="text" id="ofemail" style="width:220px;">
                      <span data-toggle="popover" data-trigger="hover" data-placement="left" class="erroricon" id="ofemail_erroricon" data-original-title="" title=""></span> </div>
                    <div class="forminputbg ofphonebg">
                      <label>Phone</label>
                      <input type="text" id="ofphone" style="width:245px;">
                      <span data-toggle="popover" data-trigger="hover" data-placement="left" class="erroricon" id="ofphone_erroricon" data-original-title="" title=""></span> </div>
                    <p style="font-family:'proxima_nova_regular',Arial,sans-serif; font-size:12px; color:#4c849c; margin:27px 0 10px 10px;">Choose one cloud app or service you want us to pay for:</p>
                    <div class="forminputbg ofinterestbg">
                      <label>I am most interested in</label>
                      <select name="ofinterest" id="ofinterest" style="width:150px;">
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
                      <span style="right:-15px;" data-toggle="popover" data-trigger="hover" data-placement="right" class="erroricon" id="ofinterest_erroricon" data-original-title="" title=""></span> </div>
                    <div class="clear"></div>
                    <div style="position:relative; text-align:center;" class="ofinterestbg">
                      <input type="hidden" name="ofsource" id="ofsource" value="video landing page" />
                      <input type="hidden" name="page" id="page" value="<?php echo $page; ?>" />
                      <button onclick="validateTestOfForm();" id="offer_button" class="submit">I'd like to receive more details</button>
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
</div>  
  
<?php get_footer(); ?>

<div class="pp_pic_holder pp_default foff" style="top: 410.5px; left: 282.5px; display: none; width: 800px;">
  <div class="ppt" style="opacity: 1; display: block; width: 765px;">&nbsp;</div>
  <div class="pp_top">
    <div class="pp_left"></div>
    <div class="pp_middle"></div>
    <div class="pp_right"></div>
  </div>
  <div class="pp_content_container">
    <div class="pp_left">
      <div class="pp_right">
        <div class="pp_content" style="height: 470px; width: 765px;">
          <div class="pp_loaderIcon" style="display: none;"></div>
          <div class="pp_fade" style="display: block;"> <!--<a id="resizer" title="Expand the image" class="pp_expand" href="javascript:void(0);" style="display: inline;" onclick="resize()">Expand</a>-->
            <div class="pp_hoverContainer" style="height: 301px; width: 535px; display: none;"> <a href="#" class="pp_next">next</a> <a href="#" class="pp_previous">previous</a> </div>
            <div id="pp_full_res">
            	<div class="pp_inline">
              	<iframe id="video_frame" width="765/embed/?moog_width=765" height="420" frameborder="no" src="http://player.vimeo.com/video/90175265?title=0&amp;byline=0&amp;portrait=0"></iframe>
              </div>
            </div>
            <div class="pp_details" style="width: 765px;">
              <div class="pp_nav" style="display: none;"><a class="pp_play" href="#">Play</a> <a class="pp_arrow_previous" href="#">Previous</a>
                <p class="currentTextHolder">1/1</p>
                <a class="pp_arrow_next" href="#">Next</a> </div>
              <p class="pp_description" style="display: none;"></p>
              </div>
          </div>
        </div>
      </div>
    </div>
    <a href="javascript:void(0);" class="pp_close" onclick="closeIt()">Close</a> 
  </div>
  <div class="pp_bottom">
    <div class="pp_left"></div>
    <div class="pp_middle"></div>
    <div class="pp_right"></div>
  </div>
</div>
<div class="pp_overlay" style="opacity: 0.6; height: 4000px; width: 100%; display: none;"></div>