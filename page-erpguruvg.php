<?php 

/* Template Name: Erp Guru Video Gallery */

get_header(); ?>

<script language="javascript">
	function showposts(type)
	{
		$('#videosearchinput').val('');
		$('.row-fluid').append('<div class="loading"><p>Loading videos....</p></div>');
		$.ajax({
			url:"<?php echo bloginfo('wpurl'); ?>/wp-admin/admin-ajax.php",
			type:'POST',
			data:'action=my_special_ajax_call&act=sp&type=' + type,
			success:function(results)
			{
				$('#template_search_menu2 li').removeClass('active');
				var params = results.split('][');
				$('.badge').html(params[0]);
				$('.thumbnails').html(params[1]);
				$('.row-fluid').find('.loading').remove();
				$('#'+type).addClass('active');
			}
		});
	}
	
	function showpostsby(type,id)
	{
		$('#videosearchinput').val('');
		$('.row-fluid').append('<div class="loading"><p>Loading videos....</p></div>');
		$.ajax({
			url:"<?php echo bloginfo('wpurl'); ?>/wp-admin/admin-ajax.php",
			type:'POST',
			data:'action=my_special_ajax_call&act=spb&id='+ id +'&type=' + type,
			success:function(results)
			{
				var params = results.split('][');
				$('.badge').html(params[0]);
				$('.thumbnails').html(params[1]);
				$('.row-fluid').find('.loading').remove();
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
			data:'action=my_special_ajax_call&act=sv&text='+ $('#videosearchinput').val(),
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
</script>
<div id="videos_page">
  <?php
    if(have_posts()): 
	while(have_posts()) :
	the_post();
	$background_image = get_field('bann_backimage');
	$top_image = get_field('bann_topimage');	
	?>
  <div class="topbanner videos_topbanner" style="background:url(<?php echo $background_image["url"]; ?>) no-repeat 50% 0">
    <div class="banncontent">
      <h1>
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
	$args = array(
				'post_type' => 'videos',
				'post_status' => 'publish',
				'showposts' => '1000',
				'meta_key' => 'views',
				'orderby' => 'meta_value',
				'order' => 'desc'
				 );
				 $videos = get_posts($args);
	?>
  <div class="main_wrap" style="width:1000px; padding:0; margin:50px auto 150px;">
    <div class="temp-filters clearfix">
      <h2 id="total_templates"><strong class="badge"><?php echo count($videos); ?></strong> Videos Found</h2>
      <div class="srt-div" style=" ">
        <div class="template-filter"> <strong class="sort">Sort</strong>
          <ul class="breadcrumb" id="template_search_menu2">
          	<li id="viewed" class="showtooltip active" title=""><a tabindex="-1" href="javascript:void(0);" onclick="showposts('viewed')">ERP Guru QuickStart</a></li>
            <li id="recent" class="showtooltip" title=""><a tabindex="-1" href="javascript:void(0);" onclick="showposts('recent')">recent</a></li>            
            <li id="featured" class="showtooltip" title=""><a tabindex="-1" href="javascript:void(0);" onclick="showposts('featured')">featured</a></li>            
          </ul>
        </div>
        <div class="input-append search" id=""> <span class="icon campaigns"></span>
          <input type="text" style="width:200px;" class="search-control show-image" placeholder="search videos" id="videosearchinput" onkeypress="onkp(event)" />
          <a style="display:none" id="clearsearch" class="close-icon"></a>
          <div class="btn-group">
            <button id="searchbtn" class="searchbtn" tabindex="-1" onclick="searchVideo()"><span class="icon-search icon-white"> </span></button>
          </div>
        </div>
      </div>
    </div>
    <div class="row-fluid" style="position:relative; margin-top:50px;">
    	<div class="clear"></div>
      <ul class="thumbnails">
      	<?php        
		$i=1;
		if($videos):
		foreach($videos as $video):
			$image = '';
			if (has_post_thumbnail( $video->ID ) ):
				$image = wp_get_attachment_image_src( get_post_thumbnail_id( $video->ID ), 'single-post-thumbnail' );
			endif;
			?>
                <li class="span3">
                  <div class="thumbnail">
                    <div class="img">
                      <div> <a class="previewbtn wp-video-lightbox" url="" onclick="addView(<?php echo $video->ID; ?>,'http://player.vimeo.com/video/<?php echo get_post_meta($video->ID,'video_id',true); ?>?title=0&amp;byline=0&amp;portrait=0')"><span></span></a> </div>
                      <img src="<?php echo $image[0]; ?>" alt=""></div>
                    <div class="caption">
                      <h3><?php echo $video->post_title; ?></h3>
                       <?php $cats = wp_get_post_terms( $video->ID, 'video-category', $args ); 
					   if($cats):
					   	foreach($cats as $cat):
					   ?>
                      		<a class="cat2" href="javascript:void(0);" onclick="showpostsby('cat',<?php echo $cat->term_id; ?>)"><?php echo $cat->name; ?></a>&nbsp;
                      <?php
                      endforeach;
					  endif;
					  ?>
                      	<p>
                      	<?php $tags = wp_get_post_terms( $video->ID, 'post_tag', $args );
					   	if($tags):
					   	foreach($tags as $tag):
					   	?>
                      		<a class="tag" href="javascript:void(0);" onclick="showpostsby('tag',<?php echo $tag->term_id; ?>)"><?php echo $tag->name; ?></a>
                        <?php
						endforeach;
						endif;
						$views = get_post_meta($video->ID,'views',true);
						?>
                      	</p>
                      <div id="views_<?php echo $video->ID; ?>" class="btm-bar"> <span><em><?php echo ($views > 0) ? $views : '0'; ?></em> <span class="icon view"></span></span></div>
                  </div>
                </li>
        	<?php        	
        endforeach;
		endif;
		?>
      </ul>
      	<div class="clear"></div>
    </div>
  </div>
</div>
<?php get_footer(); ?>


<div class="pp_pic_holder pp_default" style="display: none; width: 567px;">
  <div class="ppt" style="opacity: 1; display: block; width: 535.111px;">&nbsp;</div>
  <div class="pp_top">
    <div class="pp_left"></div>
    <div class="pp_middle"></div>
    <div class="pp_right"></div>
  </div>
  <div class="pp_content_container">
    <div class="pp_left">
      <div class="pp_right">
        <div class="pp_content" style="height: 337px; width: 535px;">
          <div class="pp_loaderIcon" style="display: none;"></div>
          <div class="pp_fade" style="display: block;"> <a id="resizer" title="Expand the image" class="pp_expand" href="javascript:void(0);" style="display: inline;" onclick="resize()">Expand</a>
            <div class="pp_hoverContainer" style="height: 301px; width: 535px; display: none;"> <a href="#" class="pp_next">next</a> <a href="#" class="pp_previous">previous</a> </div>
            <div id="pp_full_res">
              <iframe id="video_frame" width="535/embed/?moog_width=535" height="301" frameborder="no" src="http://player.vimeo.com/video/90175265?title=0&amp;byline=0&amp;portrait=0"></iframe>
            </div>
            <div class="pp_details" style="width: 535.111px;">
              <div class="pp_nav" style="display: none;"><a class="pp_play" href="#">Play</a> <a class="pp_arrow_previous" href="#">Previous</a>
                <p class="currentTextHolder">1/1</p>
                <a class="pp_arrow_next" href="#">Next</a> </div>
              <p class="pp_description" style="display: none;"></p>
              <a href="javascript:void(0);" class="pp_close" onclick="closeIt()">Close</a> </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="pp_bottom">
    <div class="pp_left"></div>
    <div class="pp_middle"></div>
    <div class="pp_right"></div>
  </div>
</div>
<div class="pp_overlay" style="opacity: 0.8; height: 1590px; width: 1237px; display: none;"></div>