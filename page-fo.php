<?php 

/* Template Name: Freedom Offers */

get_header(); ?>
<script language="javascript">
	function sortoffers()
	{
		var vals = $('#filters').val().split(',');
		if(vals.length == 1)
			showoffers($('#filters').val());
		else
			showoffersby(vals[0],vals[1]);
	}
	function showoffers(type)
	{
		$('#offersearchinput').val('');
		$('.row-fluid').append('<div class="loading"><p>Loading offers....</p></div>');
		$.ajax({
			url:"<?php echo bloginfo('wpurl'); ?>/wp-admin/admin-ajax.php",
			type:'POST',
			data:'action=my_special_ajax_call&act=sho&type=' + type + '&tax=freedom-offer',
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
	
	function showoffersby(type,slug)
	{
		$('#offersearchinput').val('');
		$('.row-fluid').append('<div class="loading"><p>Loading offers....</p></div>');
		$.ajax({
			url:"<?php echo bloginfo('wpurl'); ?>/wp-admin/admin-ajax.php",
			type:'POST',
			data:'action=my_special_ajax_call&act=shob&slug='+ slug +'&type=' + type + '&tax=freedom-offer',
			success:function(results)
			{
				$('#template_search_menu li').removeClass('active');
				var params = results.split('][');
				$('.badge').html(params[0]);
				$('.thumbnails').html(params[1]);
				$('.row-fluid').find('.loading').remove();
				$('#'+slug).addClass('active');
			}
		});
	}
	function closeIt(){ 	
		$('.pp_pic_holder').css('display','none');
		$('.pp_overlay').css('display','none');
		return false;
	}
	function addView(id)
	{
		$('.pp_pic_holder').css('display','block');
		$('.pp_overlay').css('display','block');
		$('.pp_overlay').css('width','100%');
		$('.pp_overlay').css('height','4000px');
		$('.pp_inline').html($('#off_det_'+id).html());
		//alert($('#off_det_'+id).html());
		//$('#off_det_'+id).show();
		_center_overlay();
		$.ajax({
			url:"<?php echo bloginfo('wpurl'); ?>/wp-admin/admin-ajax.php",
			type:'POST',
			data:'action=my_special_ajax_call&act=aov&id='+ id,
			success:function(results)
			{
				//alert(results);				
				$('#views_'+id+' span em').html(results);
			}
		});
	}
	function addClick(id,url)
	{
		$('.row-fluid').append('<div class="loading"><p>Redirecting....</p></div>');		
		$.ajax({
			url:"<?php echo bloginfo('wpurl'); ?>/wp-admin/admin-ajax.php",
			type:'POST',
			data:'action=my_special_ajax_call&act=aoc&id='+ id,
			success:function(results)
			{
				$('.row-fluid').find('.loading').remove();
				window.location = url;
			}
		});
	}
	function onkp(e)
	{
		var code = (e.keyCode ? e.keyCode : e.which);
		if(code == 13) {
			searchOffer();
		}
	}
	function searchOffer()
	{
		$('.row-fluid').append('<div class="loading"><p>Loading offers....</p></div>');
		$.ajax({
			url:"<?php echo bloginfo('wpurl'); ?>/wp-admin/admin-ajax.php",
			type:'POST',
			data:'action=my_special_ajax_call&act=sfo&text='+ $('#offersearchinput').val(),
			success:function(results)
			{
				//alert(results);				
				var params = results.split('][');
				$('.badge').html(params[0]);
				if(params[1] != '')
					$('.thumbnails').html(params[1]);
				else
					$('.thumbnails').html('Search term not found.');
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
</script>

<div id="videos_page">
  <?php
    if(have_posts()): 
	while(have_posts()) :
	the_post();
	$background_image = get_field('bann_backimage');
	$top_image = get_field('bann_topimage');	
	?>
  <div class="topbanner offers_topbanner" style="background:url(<?php echo $background_image["url"]; ?>) no-repeat 50% 0">
  <div class="banncontent">
	<h1>
	  <?php the_field('bann_head'); ?>
	</h1>
    <h2>
        <?php the_field('bann_subhead'); ?>
      </h2>
	<div class="subscribeform">
    	<div class="clear"></div>
          <div class="offnamebg" style="position:relative; float:left;"><input type="text"  id="offer_name" placeholder="Your Name" >
          	<span id="offname_erroricon" class="erroricon" data-placement="right" data-trigger="hover" data-toggle="popover" style="right:-15px;"></span>
          </div>          
          <div class="offemailbg" style="position:relative; float:left;"><input type="text"  id="offer_email" placeholder="Your Work Email">
          	<span id="offemail_erroricon" class="erroricon" data-placement="right" data-trigger="hover" data-toggle="popover" style="right:-15px;"></span>
          </div>          
          <div class="offphonebg" style="position:relative; float:left;"><input type="text"  id="offer_phone" placeholder="Phone Number">
          	<span id="offphone_erroricon" class="erroricon" data-placement="right" data-trigger="hover" data-toggle="popover" style="right:-15px;"></span>
          </div>
          <input type="hidden" name="off_source" id="off_source" value="freedom offer inquiry" />
          <button class="submit" id="offer_button" onclick="validateOfferForm();">Receive Details</button>
	  	<div class="clear"></div>
	</div>
  </div>
</div>
  <?php
	endwhile;
    endif;
	 $args = array(
		'post_type' => 'freedom-offers',
		'post_status' => 'publish',
		'showposts' => '1000',
		'meta_key' => 'clicks',
		'orderby' => 'meta_value',
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
  <div class="main_wrap" style="width:1032px; padding:0; margin:50px auto 0px;">
  	<div class="offers_panel"><h1 style="margin:50px auto 50px;">Subscribe and we’ll pay for other stuff you need:</h1></div>
    <div class="temp-filters clearfix fo">
      <h2 id="total_templates"><strong class="badge"><?php echo count($offers); ?></strong> Offers Found</h2>
      <div class="srt-div" style="margin-right:0px;">
        <div class="template-filter"> <strong class="sort">Sort by</strong>
        	<div class="breadcrumb" style="padding-top:1px; padding-bottom:9px; margin:0;">
            	<div style="width:110px; height:30px; background:url('<?php echo get_template_directory_uri(); ?>/images/down-arrow.png') no-repeat right 65%;">
                    <select name="filters" id="filters" style="width:160px; background: transparent; border:0; font-family:proxima_nova_regular; font-size:14px; color:#85ACC1;" onchange="sortoffers()">
                        <!--<option value="viewed">Viewed</option>-->
                        <option value="popular">Popularity</option>                        
                        <option value="recent">All (recent first)</option>
                        <option value="featured">Featured</option>                        
                        <option value="cat,marketing">Marketing</option>
                        <option value="cat,sales">Sales</option>
                        <option value="cat,salesforce">Salesforce</option>
                        <option value="cat,consultants">Consultants</option>
                        <option value="cat,cloud-apps">Cloud Apps</option>
                    </select>
                </div>
            </div>
            <ul class="breadcrumb" id="template_search_menu">              
              <li id="marketing" class="showtooltip" title=""><a tabindex="-1" href="javascript:void(0);" onclick="showoffersby('cat','marketing')">Marketing</a></li> 
              <li id="sales" class="showtooltip" title=""><a tabindex="-1" href="javascript:void(0);" onclick="showoffersby('cat','sales')">Sales</a></li>
              <li id="salesforce" class="showtooltip" title=""><a tabindex="-1" href="javascript:void(0);" onclick="showoffersby('cat','salesforce')">Salesforce</a></li>
              <li id="consultants" class="showtooltip" title=""><a tabindex="-1" href="javascript:void(0);" onclick="showoffersby('cat','consultants')">Consultants</a></li>
              <li id="cloud-apps" class="showtooltip" title=""><a tabindex="-1" href="javascript:void(0);" onclick="showoffersby('cat','cloud-apps')">Cloud Apps</a></li>
            </ul>
        </div>
        <div class="input-append search" id="">
          <input type="text" style="width:200px; height:20px;" class="search-control show-image" placeholder="search offers" id="offersearchinput" onkeypress="onkp(event)" />
          <a style="display:none" id="clearsearch" class="close-icon"></a>
          <div class="btn-group">
            <button id="searchbtn" class="searchbtn" tabindex="-1" onclick="searchOffer()"><span class="icon-search icon-white"> </span></button>
          </div>
        </div>
      </div>
    </div>
    <div class="row-fluid" style="position:relative; margin-top:20px;">
      <div class="clear"></div>
      <ul class="thumbnails fo">
        <?php        
		$i=0;
		if(count($offers) > 0):
			foreach($offers as $offer)
			{
				$image = '';
				if (has_post_thumbnail( $offer->ID ) ):
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( $offer->ID ), 'single-post-thumbnail' );
				endif;
				$is_featured = get_post_meta($offer->ID,'is_featured',true);			
				?>
				<li class="span3" style="width:248px; margin-left:0px; margin-right:10px;">
				  <div class="thumbnail" style="background:none;">
					<?php
					if($is_featured)
					{
					?>
						<img class="feat_star" src="<?php echo bloginfo('template_url'); ?>/images/featured-icon.png" width="45" height="44" />
					<?php
					}
					?>
                    <div class="img2" style="height:160px; line-height:240px;"> 
                    <div>
                      <a class="previewbtn" href="javascript:void(0);" onclick="addView(<?php echo $offer->ID; ?>)"><span></span>View Detail</a>
                      <a class="selectbtn" href="javascript:void(0);" onclick="addClick(<?php echo $offer->ID; ?>,'<?php echo bloginfo('wpurl'); ?>/congratulations?add-to-cart=<?php echo get_post_meta($offer->ID,'link_product_id',true); ?>')"><span></span>Select Offer</a>
                    </div>
                    <img src="<?php echo bloginfo('template_url'); ?>/thumb.php?src=<?php echo $image[0]; ?>&w=99&h=99" alt=""></div>
                    <div class="caption" style="min-height:200px;">
                      <h3><?php echo $offer->post_title; ?></h3>
                      <p><?php echo $offer->post_excerpt; ?></p>
                      <p class="tags">
                        <?php $tags = wp_get_post_terms( $offer->ID, 'post_tag', $args );
                                  if($tags):
                                  foreach($tags as $tag):
                                  ?>
                        <a href="javascript:void(0);" onclick="showoffersby('tag','<?php echo $tag->slug; ?>')"><?php echo $tag->name; ?></a>
                        <?php
                                  endforeach;
                                  endif;
                                  $views = get_post_meta($offer->ID,'views',true);
                                  ?>
                      </p>
                      <div id="views_<?php echo $offer->ID; ?>" class="btm-bar"> <span><span class="icon view"></span> <em><?php echo ($views > 0) ? $views : '0'; ?></em></span></div>
                    </div>
                  </div>
				</li>
			<?php        	
			}
		endif;
		?>
      </ul>
      <div class="clear"></div>
      <?php
      foreach($offers as $offer)
		{
		?>
		<div id="off_det_<?php echo $offer->ID; ?>" class="off_details"> <?php echo $offer->post_content; ?> 
            <a class="selectoffbtn" href="javascript:void(0);" onclick="addClick(<?php echo $offer->ID; ?>,'<?php echo bloginfo('wpurl'); ?>/congratulations?add-to-cart=<?php echo get_post_meta($offer->ID,'link_product_id',true); ?>')">Select Offer</a>
        </div>
		<?php	
		}
	  ?>
    </div>
    <h3 style="text-align:center; margin-top:40px;">Terms and Conditions Apply. <a onclick="showtospop('terms3pop');" href="javascript:void(0);"><strong>Please read</strong></a>.</h3>
  </div>
</div>
<div style="background: #ffffff;" class="main">
<div class="main_wrap" style="padding: 50px 0; width:1000px;">
<div class="fp_01" style="padding: 0px 0 40px;">
<p style="  font-size: 36px;  color: #4292bb; text-align: center; font-family: 'proxima_nova_semibold', Arial, sans-serif;line-height: 37px;">With these offers get the most advanced user-friendly marketing automation tool ever!</p>
</div>
<div class="fp_01">
<div class="dashboard"><a href="http://vimeo.com/90911241?width=800&amp;height=450" rel="wp-video-lightbox" class="wp-video-lightbox"></a></div>
</div>
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
        <div class="pp_content" style="height: 450px; width: 740px;">
          <div class="pp_loaderIcon" style="display: none;"></div>
          <div class="pp_fade" style="display: block;"> <a title="Expand the image" class="pp_expand" href="#" style="display: none;">Expand</a>
            <div class="pp_hoverContainer" style="height: 253px; width: 740px; display: none;"> <a href="#" class="pp_next">next</a> <a href="#" class="pp_previous">previous</a> </div>
            <div id="pp_full_res">
              <div class="pp_inline" style="overflow:auto">
                
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
