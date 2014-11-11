<?php
if($_POST['type'] == 'recent')
{
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
				  'terms' => $_POST['tax']
			  )
		),
		'post__not_in' => array(1541,1547,1828)
	);	
}
else if($_POST['type'] == 'popular')
{
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
				  'terms' => $_POST['tax']
			  )
		),
		'post__not_in' => array(1541,1547,1828)
	);	
}
else if($_POST['type'] == 'featured')
{
	$args = array(
		'post_type' => 'freedom-offers',
		'post_status' => 'publish',
		'showposts' => '1000',
		'orderby' => 'post_date',
		'order' => 'desc',
		'meta_query' => array(
			array(
				'key' => 'is_featured',
				'value' => true,
				'compare' => '='
			)
		),
		'tax_query' => array(
			  array(
				  'taxonomy' => 'offer-type',
				  'field' => 'slug',
				  'terms' => $_POST['tax']
			  )
		),
		'post__not_in' => array(1541,1547,1828)
	);	
}
else if($_POST['type'] == 'cat')
{
	$args = array(
		'post_type' => 'freedom-offers',
		'post_status' => 'publish',
		'showposts' => '1000',
		'orderby' => 'post_date',
		'order' => 'asc',
		'tax_query' => array(
			array(
				'taxonomy' => 'offer-category',
				'field' => 'slug',
				'terms' => $_POST['slug']
			),
			array(
				'taxonomy' => 'offer-type',
				'field' => 'slug',
				'terms' => $_POST['tax']
			)
		),
		'post__not_in' => array(1541,1547,1828)
	);	
}
else if($_POST['type'] == 'tag')
{
	$args = array(
		'post_type' => 'freedom-offers',
		'post_status' => 'publish',
		'showposts' => '1000',
		'orderby' => 'post_date',
		'order' => 'asc',
		'tax_query' => array(
			array(
				'taxonomy' => 'post_tag',
				'field' => 'slug',
				'terms' => $_POST['slug']
			),
			array(
				'taxonomy' => 'offer-type',
				'field' => 'slug',
				'terms' => $_POST['tax']
			)
		),
		'post__not_in' => array(1541,1547,1828)
	);	
}
else if($_POST['type'] == 'search')
{
	$sql = "SELECT wp.* FROM wp_l_posts wp inner join wp_l_term_relationships wtr on wtr.object_id=wp.ID inner join 
								wp_l_term_taxonomy wtt on wtt.term_taxonomy_id = wtr.term_taxonomy_id inner join wp_l_terms wt on wt.term_id=wtt.term_id 
								where wp.post_type='freedom-offers' and wp.post_status='publish' and wtt.taxonomy='offer-type' and wt.slug='$_POST[tax]' 
								and (wp.post_title like '%". $_POST['text'] ."%' || wp.post_excerpt like '%". $_POST['text'] ."%' || wp.post_content like '%". $_POST['text'] ."%')";
	$offers = $wpdb->get_results($sql);	
}
echo $sql;
if($_POST['type'] != 'search')
	$offers = get_posts($args);
if($_POST['tax'] == 'consultant-gallery')
	echo count($offers).']['.getappexConsultants($offers);
else
	echo count($offers).']['.getappexOffers($offers);
	
function getappexOffers($offers)
{
	$str = '<div id="test-list2"><ul class="thumbnails fo list">';
	if($offers):
	  foreach($offers as $offer):
		  $image = '';
		  if (has_post_thumbnail( $offer->ID ) ):
			  $image = wp_get_attachment_image_src( get_post_thumbnail_id( $offer->ID ), 'single-post-thumbnail' );
		  endif;
		  $is_featured = get_post_meta($offer->ID,'is_featured',true);
		  $str .= '<li class="span3" style="width:248px; margin-left:0px; margin-right:10px;">
		  <div class="thumbnail" style="background:none;">';		  	
            if($is_featured)
			{			
          		$str .= '<img class="feat_star" src="'. get_template_directory_uri() .'/images/featured-icon.png" width="45" height="44" />';
			}			
			$str .= '<div class="img2" style="height:160px; line-height:240px;">			  
			  <div>
          	<a class="previewbtn" href="javascript:void(0);" onclick="addView('.$offer->ID.')"><span></span>View Detail</a>
          	<a class="selectbtn" href="javascript:void(0);" onclick="addClick('. $offer->ID .',\''. get_option('siteurl') .'/offers?add-to-cart='. get_post_meta($offer->ID,'link_product_id',true) .'\')"><span></span>Select Offer</a>
          </div>
          <img src='. get_template_directory_uri() .'/thumb.php?src='.$image[0].'&w=99&h=99" alt="">
			  </div>
			<div class="caption" style="min-height:200px;">
			  <h3>'. $offer->post_title .'</h3>';	
			  	$str .= '<p>'.$offer->post_excerpt.'</p>		   
				<p class="tags">';
				$tags = wp_get_post_terms( $offer->ID, 'post_tag', $args );
				if($tags):
				foreach($tags as $tag):
					$str .= '<a href="javascript:void(0);" onclick="showoffersby(\'tag\',\''.$tag->slug.'\')">'.$tag->name.'</a>';                        
				endforeach;
				endif;
				$views = get_post_meta($offer->ID,'views',true);
				if($views == '')
					$views = '0';
				$str .= '</p>
			  <div id="views_'. $offer->ID .'" class="btm-bar"> <span><em>'. $views .'</em> <span class="icon view"></span></span></div>
		  </div>
		</li>';
		endforeach;
	endif;
	$str .= '</ul>
              <div class="clear"></div>
          		<ul class="pagination"></ul>
          </div>
          <div class="clear"></div>';
		  
	foreach($offers as $offer)
		$str .= '<div id="off_det_'. $offer->ID .'" class="off_details">'.$offer->post_content.'<a class="selectoffbtn" href="javascript:void(0);" onclick="addClick('.$offer->ID .',\''. get_option('siteurl') .'/offers?add-to-cart='. get_post_meta($offer->ID,'link_product_id',true) .'\'">Select Offer</a></div>';	
		
return $str;
}

function getappexConsultants($offers)
{
	$str = '<div id="test-list3"><div class="clear"></div><ul class="thumbnails fo cg list">';
	if($offers):
		$i=1;
	  foreach($offers as $offer):
		  $image = '';
		  if (has_post_thumbnail( $offer->ID ) ):
			  $image = wp_get_attachment_image_src( get_post_thumbnail_id( $offer->ID ), 'single-post-thumbnail' );
		  endif;
		  $is_featured = get_post_meta($offer->ID,'is_featured',true);
		  $st = '';
		  if($i % 2 == 0) 
		  { $st = 'margin-right:0px;'; }
		  else
		  { $st = 'margin-right:20px;'; }
		  $str .= '<li class="span3" style="width:490px; '. $st .'">
		  <div class="thumbnail" style="background:none;">';		  	
            if($is_featured)
			{			
          		$str .= '<img class="feat_star" src="'. get_template_directory_uri() .'/images/featured-icon.png" width="45" height="44" />';
			}			
			$str .= '<div class="clear"></div>
			<div class="img2" style="float:left; width:200px; height:220px; line-height:300px; background-color:#eaf4f9; text-align:center;"><img src='. get_template_directory_uri() .'/thumb.php?src='.$image[0].'&w=99&h=99" alt="">
				<div class="hoverbtns">
					  <a class="previewbtn" href="javascript:void(0);" onclick="addView('.$offer->ID.')"><span></span>View Detail</a>
					  <a class="selectbtn" href="javascript:void(0);" onclick="addClick('. $offer->ID .',\''. get_option('siteurl') .'/consultants-gallery?add-to-cart='. get_post_meta($offer->ID,'link_product_id',true) .'\')"><span></span>Select Offer</a>
				</div>
			</div>
			<div class="caption" style="background-color:#ffffff; width:267px;">
			  	<h3>'. $offer->post_title .'</h3>';	
			  	$str .= '<p>'.$offer->post_excerpt.'</p>		   
				<p class="tags">';
				$tags = wp_get_post_terms( $offer->ID, 'post_tag', $args );
				if($tags):
				foreach($tags as $tag):
					$str .= '<a href="javascript:void(0);" onclick="showoffersby(\'tag\',\''.$tag->slug.'\')">'.$tag->name.'</a>';                        
				endforeach;
				endif;
				$views = get_post_meta($offer->ID,'views',true);
				if($views == '')
					$views = '0';
				$str .= '</p>				
			  <div id="views_'. $offer->ID .'" class="btm-bar" style="margin-left:-10px;"><span class="icon view"></span> <span><em>'. $views .'</em> </span></div>
		  </div><div class="clear"></div>
		</li>';		
		$i++;
		endforeach;
	endif;
	
	$str .= '</ul>
              <div class="clear"></div>
          		<ul class="pagination"></ul>
          </div>
          <div class="clear"></div>';
		  
	foreach($offers as $offer)
		$str .= '<div id="off_det_'. $offer->ID .'" class="off_details">'.$offer->post_content.'<a class="selectoffbtn" href="javascript:void(0);" onclick="addClick('.$offer->ID .',\''. get_option('siteurl') .'/consultants-gallery?add-to-cart='. get_post_meta($offer->ID,'link_product_id',true) .'\'">Select Offer</a></div>';
		
	return $str;
}
?>