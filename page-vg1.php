<?php 

/* Template Name: Video Gallery 1 */

get_header(); ?>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/videos.css" media="screen" />
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.9.0.min.js"></script>
<?php
global $wpdb;
$args = array(
		'post_type' => 'videos',
		'post_status' => 'publish',
		'showposts' => '1000',
		'meta_key' => 'views',
		'orderby' => 'meta_value',
		'order' => 'desc'
);
$videos = get_posts($args);	
$total_records = count($videos);
$total_groups = ceil($total_records/6);
?>
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
		$('#typeField').val($('#filters').val());
		$('#track_load').val('0');
		$('#loading').val('true'); 
	
		$('.row-fluid').append('<div class="loading"><p>Loading videos....</p></div>');
		$.ajax({
			url:"<?php echo bloginfo('wpurl'); ?>/wp-admin/admin-ajax.php",
			type:'POST',
			data:'action=my_special_ajax_call&act=alv&cols=2&group_no='+ $('#track_load').val() + '&type=' + type,
			success:function(results)
			{
				$('#template_search_menu li').removeClass('active');
				var params = results.split('][');
				$('.badge').html(params[0]);
				$('.thumbnails').html(params[1]);
				$('.row-fluid').find('.loading').remove();
				$('#'+type).addClass('active');
				
				var track_load = $('#track_load').val();
				track_load = parseInt(track_load)+1;
				$('#track_load').val(track_load);
				$('#loading').val('false'); 
				$('#scrollmore').show();
			}
		});
	}
	
	function showpostsby(type,slug)
	{
		$('#videosearchinput').val('');
		$('#typeField').val(type+','+slug);
		$('#track_load').val('0');
		$('#loading').val('true'); 
	
		$('.row-fluid').append('<div class="loading"><p>Loading videos....</p></div>');
		$.ajax({
			url:"<?php echo bloginfo('wpurl'); ?>/wp-admin/admin-ajax.php",
			type:'POST',
			data:'action=my_special_ajax_call&act=alv&cols=2&group_no='+ $('#track_load').val() + '&slug='+ slug +'&type=' + type,
			success:function(results)
			{
				//alert(results);
				var params = results.split('][');
				$('.badge').html(params[0]);
				$('.thumbnails').html(params[1]);
				$('.row-fluid').find('.loading').remove();
				if(type == 'cat')
				{
					$('#template_search_menu li').removeClass('active');
					$('#'+slug).addClass('active');
				}
				var track_load = $('#track_load').val();
				track_load = parseInt(track_load)+1;
				$('#track_load').val(track_load);
				$('#loading').val('false'); 
				$('#scrollmore').show();
			}
		});
	}
	/*function closeIt(){ 	
		$('.pp_pic_holder').css('display','none');
		$('.pp_overlay').css('display','none');
		$('.pp_inline #video_frame').attr('src','');
		$('.pp_inline #video_frame').hide();
		return false;
	}*/
	function addView(id,url)
	{
		$('.pp_pic_holder').css('display','block');
		$('.pp_overlay').css('display','block');
		$('#pp_full_res #video_frame').attr('src',url);
		_center_overlay();
		$.ajax({
			url:"<?php echo bloginfo('wpurl'); ?>/wp-admin/admin-ajax.php",
			type:'POST',
			data:'action=my_special_ajax_call&act=av&id='+ id + '&path='+ window.location.pathname.substr(1,window.location.pathname.length),
			success:function(results)
			{
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
		$('#loading').val('true'); 
		$('.row-fluid').append('<div class="loading"><p>Loading videos....</p></div>');
		$.ajax({
			url:"<?php echo bloginfo('wpurl'); ?>/wp-admin/admin-ajax.php",
			type:'POST',
			data:'action=my_special_ajax_call&act=alv&cols=2&type=search&group_no=0&text='+ $('#videosearchinput').val(),
			success:function(results)
			{
				//alert(results);				
				var params = results.split('][');
				$('.badge').html(params[0]);
				if(params[1] != '')
					$('.thumbnails').html(params[1]);
				else
					$('.thumbnails').html('<h3 style="margin:50px auto 100px; text-align:center;">Search term not found.</h3>');
				$('.row-fluid').find('.loading').remove();
				
				$('#track_load').val('1');
				$('#total_groups').val(Math.ceil(params[0]/6));
				$('#loading').val('false'); 
				$('#scrollmore').show();
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
	$(document).ready(function() {
		var path = '';
		
		var vals = $('#typeField').val().split(',');
		path = '&type=viewed';
		$.ajax({
			url:"<?php echo bloginfo('wpurl'); ?>/wp-admin/admin-ajax.php",
			type:'POST',
			data:'action=my_special_ajax_call&act=alv&cols=2&group_no=0' + path,
			success:function(results)
			{
				var params = results.split('][');
				$('.badge').html(params[0]);
				$('.thumbnails').append(params[1]);			
				$('#track_load').val('1');
				$('#scrollmore').show();
			}
		});		
		
		$(window).scroll(function() { //detect page scroll
			if($('#track_load').val() <= $('#total_groups').val() && $('#loading').val()=='false') //there's more data to load
			{
				$('#scrollmore').show();
				$('#loading').val('true'); //prevent further ajax loading
				$('.animation_image').show(); //show loading image
				
				var path = '';
				if($('#videosearchinput').val() != '')
				{
					path = '&type=search&text='+ $('#videosearchinput').val();
				}
				else
				{
					var vals = $('#typeField').val().split(',');
					if(vals.length == 1)
						path = '&type=' + vals[0];
					else
						path = '&slug='+ vals[1] +'&type=' + vals[0];
				}
				//alert(path);	
				$.ajax({
					url:"<?php echo bloginfo('wpurl'); ?>/wp-admin/admin-ajax.php",
					type:'POST',
					data:'action=my_special_ajax_call&act=alv&cols=2&group_no='+ $('#track_load').val() + path,
					success:function(results)
					{						
						var params = results.split('][');
						$('.badge').html(params[0]);
						$('.thumbnails').append(params[1]);
						$('.animation_image').hide(); //hide loading image once data is received
						$('#total_groups').val(Math.ceil(params[0]/6));
						var track_load = $('#track_load').val();
						track_load = parseInt(track_load)+1;
						$('#track_load').val(track_load);
						$('#loading').val('false'); 
						$('#scrollmore').hide();
					}
				});				
			}
			/*else
				$('#scrollmore').hide();*/
		});
	});
</script>
<input type="hidden" name="typeField" id="typeField" value="viewed" />
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
  <div class="topbanner videos_topbanner" style="background:url(<?php echo $background_image["url"]; ?>) no-repeat 50% 0; padding:30px 0 0;">
    <div class="banncontent">
      <h1 style="margin-bottom:10px;">
        <?php the_field('bann_head'); ?>
      </h1>
      <h2>
        <?php the_field('bann_subhead'); ?>
      </h2>
    </div>
  </div>
  <?php
	endwhile;
    endif;
	/*$args = array(
		'post_type' => 'videos',
		'post_status' => 'publish',
		'showposts' => '1000',
		'meta_key' => 'views',
		'orderby' => 'meta_value',
		'order' => 'desc'
	 );
	 $videos = get_posts($args);
	 if($videos)
	{
		$i = 0;
		foreach($videos as $video)
		{
			$vids[$i]['ID'] = $video->ID;
			$vids[$i]['Views'] = get_post_meta($video->ID,'views',true);
			$vids[$i]['post_title'] = $video->post_title;			
			$i++;
		}
		usort($vids, function($a, $b) {
			return $b['Views'] - $a['Views'];
		});
	}*/
	?>
  <div class="main_wrap" style="width:1120px; padding:0; margin:10px auto 150px;">
    <div class="temp-filters clearfix vg">
      <h2 id="total_templates" style="margin-left:0px;"><strong class="badge"><?php echo count($videos); ?></strong> Videos Found</h2>
      <div class="srt-div" style="margin-right:0px;">
        <div class="template-filter"> <strong class="sort">Sort by</strong>
        	<div class="breadcrumb" style="padding-top:1px; padding-bottom:9px; margin:0;">
            	<div style="width:110px; height:30px; background:url('<?php echo get_template_directory_uri(); ?>/images/down-arrow.png') no-repeat right 65%;">
                    <select name="filters" id="filters" style="width:160px; background: transparent; border:0; font-family:proxima_nova_regular; font-size:14px; color:#85ACC1;" onchange="getVideos()">
                        <option value="viewed">Viewed</option>                        
                        <option value="recent">All (recent first)</option>
                        <option value="featured">Featured</option>
                        <option value="marketing">Marketing</option>
                        <option value="sales">Sales</option>
                        <option value="automation">Automation</option>
                        <option value="analytics">Analytics</option>
                        <option value="connections">Connections</option>
                        <option value="salesforce">Salesforce</option>
                        <option value="netsuite">NetSuite</option>
                        <option value="highrise">Highrise</option>
                    </select>
                </div>
            </div>
          <ul class="breadcrumb" id="template_search_menu">          	
            <li id="salesforce" class="showtooltip" title=""><a tabindex="-1" href="javascript:void(0);" onclick="showpostsby('cat','Salesforce')">Salesforce</a></li>
            <li id="marketing" class="showtooltip" title=""><a tabindex="-1" href="javascript:void(0);" onclick="showpostsby('cat','marketing')">Marketing</a></li>
            <li id="sales" class="showtooltip" title=""><a tabindex="-1" href="javascript:void(0);" onclick="showpostsby('cat','sales')">Sales</a></li>
            <li id="automation" class="showtooltip" title=""><a tabindex="-1" href="javascript:void(0);" onclick="showpostsby('cat','automation')">Automation</a></li>
            <li id="analytics" class="showtooltip" title=""><a tabindex="-1" href="javascript:void(0);" onclick="showpostsby('cat','analytics')">Analytics</a></li>
            <li id="connections" class="showtooltip" title=""><a tabindex="-1" href="javascript:void(0);" onclick="showpostsby('cat','Connections')">Connections</a></li>
          </ul>
        </div>
        <div class="input-append search" id="">
          <input type="text" style="width:200px; height:23px;" class="search-control show-image" placeholder="Search Video" id="videosearchinput" onkeypress="onkp(event)" />
          <a style="display:none" id="clearsearch" class="close-icon"></a>
          <div class="btn-group">
            <button id="searchbtn" class="searchbtn" tabindex="-1" onclick="searchVideo()"><span class="icon-search icon-white"> </span></button>
          </div>
        </div>
      </div>
    </div>
    <div class="row-fluid" style="position:relative; margin-top:20px; padding-left:20px;">
    	<div class="clear"></div>
      <ul class="thumbnails vg">
      	
      </ul>
      	<div class="clear"></div>
      <div class="animation_image" style="display:none; margin:50px auto; clear:both;" align="center"><img src="<?php echo get_template_directory_uri(); ?>/images/ajax-loader.gif"></div>
      <h2 id="scrollmore" style="text-align:center; margin:20px 0 50px;">Scroll to see more.</h2>
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