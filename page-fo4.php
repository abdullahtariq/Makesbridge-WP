<?php 

/* Template Name: Freedom Offers 4 */

get_header(); ?>
<script language="javascript">	
	
	function showoffersby(type,slug)
	{
		$('#typeField').val(type+','+slug);
		$('#track_load').val('0');
		$('#loading').val('false'); 
		showoffers();
	}
	function closeIt(){ 	
		$('.pp_pic_holder').css('display','none');
		$('.pp_overlay').css('display','none');
		return false;
	}
	function addView(id)
	{
		$('.pp_pic_holder').css('display','block');
		$('.pp_pic_holder').css('width','742px');
		$('.pp_overlay').css('display','block');
		$('.pp_overlay').css('width','100%');
		$('.pp_overlay').css('height','4000px');
		$('.pp_inline').html($('#off_det_'+id).html());
		$('.pp_content').css('width','740px');
		$('.pp_content').css('height','389px');
		$('.pp_inline').css('height','359px');
		$('.pp_inline').css('overflow-y','auto');
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
			data:'action=my_special_ajax_call&act=alo&tax=freedom-offer&type=search&group_no=0&text='+ $('#offersearchinput').val(),
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
				$('#total_groups').val(Math.ceil(params[0]/8));
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
	function viewmoreOffers()
	{
		$('.pp_pic_holder').css('display','block');
		$('.pp_pic_holder').css('width','830px');
		$('.pp_overlay').css('display','block');
		$('.pp_overlay').css('width','100%');
		$('.pp_overlay').css('height','4000px');		
		$('.pp_inline').html($('#more_offers').html());
		$('.pp_content').css('width','800px');
		$('.pp_content').css('height','450px');
		$('.pp_inline').css('height','400px');
		$('.pp_inline').css('overflow-y','scroll');
		_center_overlay();
		$('.pp_pic_holder').css('top',($('.pp_pic_holder').css('top')-20)+'px');
		$('#pp_full_res .pp_inline p').css('margin-bottom','0');
	}
</script>

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.9.0.min.js"></script>
<?php
global $wpdb;
/*$results = $wpdb->get_results("SELECT COUNT(*) as t_records FROM wp_posts where post_type='freedom-offers' and post_status='publish' order by post_date desc");
$total_records = count($results);
$total_groups = ceil($total_records->t_records/4);*/
//include("autoload/config.php");
//$items_per_group = 5;
//$result = $wpdb->get_row("SELECT COUNT(*) as t_records FROM paginate");
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
$total_records = count($offers);
$total_groups = ceil($total_records/8);
?>
<script type="text/javascript">
/*$(document).ready(function() 
{
	var path = '';
	var vals = $('#typeField').val().split(',');
	path = '&type=popular';
	$.ajax({
		url:"<?php echo bloginfo('wpurl'); ?>/wp-admin/admin-ajax.php",
		type:'POST',
		data:'action=my_special_ajax_call&act=alo&tax=freedom-offer&group_no=0' + path,
		success:function(results)
		{
			var params = results.split('][');
			$('.badge').html(params[0]);
			$('.thumbnails').append(params[1]);			
			$('#track_load').val('1');
		}
	});		
	
	$(window).scroll(function() 
	{
		if($('#track_load').val() <= $('#total_groups').val() && $('#loading').val()=='false') //there's more data to load
		{
			$('#loading').val('true'); //prevent further ajax loading
			$('.animation_image').show(); //show loading image
			
			var path = '';
			if($('#offersearchinput').val() != '')
			{
				path = '&type=search&text='+ $('#offersearchinput').val();
			}
			else
			{
				var vals = $('#typeField').val().split(',');
				if(vals.length == 1)
					path = '&type=' + vals[0];
				else
					path = '&slug='+ vals[1] +'&type=' + vals[0];
			}
			$.ajax({
				url:"<?php echo bloginfo('wpurl'); ?>/wp-admin/admin-ajax.php",
				type:'POST',
				data:'action=my_special_ajax_call&act=alo&tax=freedom-offer&group_no='+ $('#track_load').val() + path,
				success:function(results)
				{						
					var params = results.split('][');
					$('.badge').html(params[0]);
					$('.thumbnails').append(params[1]);
					$('.animation_image').hide(); //hide loading image once data is received
					$('#total_groups').val(Math.ceil(params[0]/8));
					var track_load = $('#track_load').val();
					track_load = parseInt(track_load)+1;
					$('#track_load').val(track_load);
					$('#loading').val('false'); 
				}
			});				
		}
	});
});
*/function sortoffers()
{
	//var vals = $('#filters').val().split(',');
	$('#typeField').val($('#filters').val());
	$('#track_load').val('0');
	$('#loading').val('false'); 
	showoffers();
}
function showoffers()
{
	$('#offersearchinput').val('');
	//alert($('#typeField').val());
	var vals = $('#typeField').val().split(',');
	if(vals.length == 1)
		path = '&type=' + vals[0];
	else
		path = '&slug='+ vals[1] +'&type=' + vals[0];
	//alert(path);
	//alert($('#track_load').val());
	$('.row-fluid').append('<div class="loading"><p>Loading offers....</p></div>');
	$.ajax({
		url:"<?php echo bloginfo('wpurl'); ?>/wp-admin/admin-ajax.php",
		type:'POST',
		data:'action=my_special_ajax_call&act=alo&tax=freedom-offer&group_no='+ $('#track_load').val() + path,
		success:function(results)
		{
			//alert(results);
			//$('#template_search_menu li').removeClass('active');
			var params = results.split('][');
			$('.badge').html(params[0]);
			$('.thumbnails').html(params[1]);
			$('.row-fluid').find('.loading').remove();
			//$('#'+type).addClass('active');
			var track_load = $('#track_load').val();
			track_load = parseInt(track_load)+1;
			$('#track_load').val(track_load);
		}
	});
}
</script>
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
	 /*$args = array(
				'post_type' => 'freedom-offers',
				'post_status' => 'publish',
				'showposts' => '1000',
				'meta_key' => 'clicks',
				'orderby' => 'meta_value',
				'order' => 'desc'
				 );
	$offers = get_posts($args);	*/
	?>
  <div class="main_wrap" style="width:1032px; padding:0; margin:50px auto 0px;">
  	<div class="offers_panel"><h1 style="margin:50px auto 50px;">Subscribe and we’ll pay for other stuff you need:</h1></div>    
    <div class="temp-filters clearfix fo">
      <h2 id="total_templates"><strong class="badge"><?php echo count($offers); ?></strong> Offers Found</h2>
      <div class="srt-div" style="margin-right:10px;">
        <div class="template-filter"> <strong class="sort">Sort by</strong>
        	<div class="breadcrumb" style="padding-top:1px; padding-bottom:9px; margin:0;">
            	<div style="width:90px; height:30px; background:url('<?php echo bloginfo('template_url'); ?>/images/down-arrow.png') no-repeat right 65%;">
                    <select name="filters" id="filters" style="width:160px; background: transparent; border:0; font-family:proxima_nova_regular; font-size:14px; color:#85ACC1;" onchange="sortoffers()">
                        <!--<option value="viewed">Viewed</option>-->
                        <option value="popular">Popularity</option>                        
                        <option value="recent">Recent</option>
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
    <div class="row-fluid" style="position:relative; margin-top:50px;">
        <div class="clear"></div>
        <div style="width:520px; float:left;">
            <h3 style="margin-bottom:20px;"><strong>Click to see all the offers:</strong></h3>
            <div class="clear"></div>
            <ul class="thumbnails fo">
                <?php
                for($i=0;$i<2;$i++)
				{
					$offer = $offers[$i];
					if (has_post_thumbnail( $offer->ID ) ):
						$image = wp_get_attachment_image_src( get_post_thumbnail_id( $offer->ID ), 'single-post-thumbnail' );
					endif;
					$is_featured = get_post_meta($offer->ID,'is_featured',true);
					?>
					<li style="width:248px; margin-left:0px; margin-right:10px;" class="span3">
                        <div style="background:none;" class="thumbnail">
							<?php
                            if($is_featured)
                            {
                            ?>
                                <img class="feat_star" src="<?php echo bloginfo('template_url'); ?>/images/featured-icon.png" width="45" height="44" />
                            <?php
                            }
                            ?>
                            <div style="height:160px; line-height:240px;" class="img2">			  
                                <div>
                                    <a class="previewbtn" href="javascript:void(0);" onclick="addView(<?php echo $offer->ID; ?>)"><span></span>View Detail</a>
                                    <a class="selectbtn" href="javascript:void(0);" onclick="addClick(<?php echo $offer->ID; ?>,'<?php echo bloginfo('wpurl'); ?>/congratulations?add-to-cart=<?php echo get_post_meta($offer->ID,'link_product_id',true); ?>')"><span></span>Select Offer</a>
                                </div>
                                <img width="99" height="99" alt="" src="<?php echo bloginfo('template_url'); ?>/thumb.php?src=<?php echo $image[0]; ?>&w=99&h=99">
                              </div>
                            <div style="min-height:200px;" class="caption">
                              <h3><?php echo $offer->post_title; ?></h3>
                              <p><?php echo $offer->post_excerpt; ?></p>		   
                              <p class="tags"><?php $tags = wp_get_post_terms( $offer->ID, 'post_tag', $args );
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
				?>
            </ul>
            <?php
			  for($i=0;$i<2;$i++)
				{
					$offer = $offers[$i];
				?>
				<div id="off_det_<?php echo $offer->ID; ?>" class="off_details"> <?php echo $offer->post_content; ?> 
					<a class="selectoffbtn" href="javascript:void(0);" onclick="addClick(<?php echo $offer->ID; ?>,'<?php echo bloginfo('wpurl'); ?>/offers?add-to-cart=<?php echo get_post_meta($offer->ID,'link_product_id',true); ?>')">Select Offer</a>
				</div>
				<?php	
				}
			  ?>
            <a href="javascript:void(0);" onclick="viewmoreOffers();" style="float:right; margin:30px 0;">View More</a>
        </div>
        <div style="float:left; width:400px; margin-left:100px;">
            <h3 style="margin-bottom:20px;"><strong>Reserve an offer for your business here:</strong></h3>
            <div id="offerform" style="padding:10px 20px 10px 50px; border:solid 1px #eee; border-radius:3px;">
            	<div style="position:relative; clear:both; margin-bottom:10px;" class="ofnamebg">                	
                	<label>Full Name</label>
                	<input type="text" placeholder="Full Name" id="ofname">
                  	<span style="right:-15px;" data-toggle="popover" data-trigger="hover" data-placement="right" class="erroricon" id="ofname_erroricon" data-original-title="" title=""></span>
                </div>
                <div style="position:relative; clear:both; margin-bottom:10px;" class="ofemailbg">
                	<label>Email</label>
                	<input type="text" placeholder="Email" id="ofemail">
                  	<span style="right:-15px;" data-toggle="popover" data-trigger="hover" data-placement="right" class="erroricon" id="ofemail_erroricon" data-original-title="" title=""></span>
                </div>
                <div style="position:relative; clear:both; margin-bottom:10px;" class="ofphonebg">
                	<label>Phone</label>
                	<input type="text" placeholder="Phone" id="ofphone">
                  	<span style="right:-15px;" data-toggle="popover" data-trigger="hover" data-placement="right" class="erroricon" id="ofphone_erroricon" data-original-title="" title=""></span>
                </div>
                <div style="position:relative; clear:both; margin-bottom:10px;" class="ofinterestbg">
                	<label>I am most interested in</label>
                	<select name="interest" id="interest">
                    	<option value="">Select</option>
                        <option value="option1">Option1</option>
                        <option value="option2">Option2</option>
                    </select>
                  	<span style="right:-15px;" data-toggle="popover" data-trigger="hover" data-placement="right" class="erroricon" id="ofinterest_erroricon" data-original-title="" title=""></span>
                </div>
                <div style="position:relative; margin-bottom:20px; text-align:center;" class="ofinterestbg">
                	<button onclick="validateOfferForm();" id="offer_button" class="submit">I'd like to discuss the offer</button>
                </div>
            </div>
        </div>
        <div class="clear"></div>
        <div id="more_offers">
        	<div class="clear"></div>
        	<ul class="thumbnails fo">
            	<?php
                for($i=2;$i<count($offers);$i++)
				{
					$offer = $offers[$i];
					if (has_post_thumbnail( $offer->ID ) ):
						$image = wp_get_attachment_image_src( get_post_thumbnail_id( $offer->ID ), 'single-post-thumbnail' );
					endif;
					$is_featured = get_post_meta($offer->ID,'is_featured',true);
					?>
					<li style="width:248px; margin-left:0px; margin-right:10px;" class="span3">
                        <div style="background:none;" class="thumbnail">
							<?php
                            if($is_featured)
                            {
                            ?>
                                <img class="feat_star" src="<?php echo bloginfo('template_url'); ?>/images/featured-icon.png" width="45" height="44" />
                            <?php
                            }
                            ?>
                            <div style="height:160px; line-height:240px;" class="img2">			  
                                <div>
                                    <a class="previewbtn" href="javascript:void(0);" onclick="addView(<?php echo $offer->ID; ?>)"><span></span>View Detail</a>
                                    <a class="selectbtn" href="javascript:void(0);" onclick="addClick(<?php echo $offer->ID; ?>,'<?php echo bloginfo('wpurl'); ?>/congratulations?add-to-cart=<?php echo get_post_meta($offer->ID,'link_product_id',true); ?>')"><span></span>Select Offer</a>
                                </div>
                                <img width="99" height="99" alt="" src="<?php echo $image[0]; ?>" />
                              </div>
                              <div style="min-height:200px;" class="caption">
                                <h3><?php echo $offer->post_title; ?></h3>
                                <p><?php echo $offer->post_excerpt; ?></p>		   
                                <p class="tags"><?php $tags = wp_get_post_terms( $offer->ID, 'post_tag', $args );
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
				?>
            </ul>
            <div class="clear"></div>
            <?php
			for($i=2;$i<count($offers);$i++)
			{
				$offer = $offers[$i];
			?>
                <div id="off_det_<?php echo $offer->ID; ?>" class="off_details"> <?php echo $offer->post_content; ?> 
                    <a class="selectoffbtn" href="javascript:void(0);" onclick="addClick(<?php echo $offer->ID; ?>,'<?php echo bloginfo('wpurl'); ?>/congratulations?add-to-cart=<?php echo get_post_meta($offer->ID,'link_product_id',true); ?>')">Select Offer</a>
                </div>
			<?php	
			}
			?>
        </div>
    </div>
  </div>
</div>
<div style="background: #ffffff;" class="main">
<div class="main_wrap" style="padding: 0px 0 50px; width:1000px;">
<h3 style="text-align:center; margin:40px auto;">Terms and Conditions Apply. <a onclick="showtospop('terms3pop');" href="javascript:void(0);"><strong>Please read</strong></a>.</h3>
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
        <div class="pp_content" style="height: 389px; width: 740px;">
          <!--<div class="pp_loaderIcon" style="display: none;"></div>-->
          <div class="pp_fade" style="display: block;"> <!--<a title="Expand the image" class="pp_expand" href="#" style="display: none;">Expand</a>-->
            <!--<div class="pp_hoverContainer" style="height: 253px; width: 740px; display: none;"> <a href="#" class="pp_next">next</a> <a href="#" class="pp_previous">previous</a> </div>-->
            <div id="pp_full_res">
              <div class="pp_inline" style="overflow-y:auto;">
                
              </div>
            </div>
            <!--<div class="pp_details" style="width: 740px;">
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
  <div class="pp_bottom">
    <div class="pp_left"></div>
    <div class="pp_middle"></div>
    <div class="pp_right"></div>
  </div>
</div>
<div class="pp_overlay" style="opacity: 0.6; height: 4000px; width: 100%; display: none;"></div>