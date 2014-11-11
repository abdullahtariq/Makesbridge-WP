<?php
if($_POST['type'] == 'recent')
{
	$args = array(
		'post_type' => 'videos',
		'post_status' => 'publish',
		'showposts' => '1000',
		'orderby' => 'post_date',
		'order' => 'desc',		
		'post__not_in' => array(1586,1591,1593)
	);										
}
else if($_POST['type'] == 'viewed')
{
	$args = array(
	'post_type' => 'videos',
	'post_status' => 'publish',
	'showposts' => '1000',
	'meta_key' => 'views',
	'orderby' => 'meta_value',
	'order' => 'desc',
	'post__not_in' => array(1586,1591,1593)
	 );	
}
else if($_POST['type'] == 'featured')
{
	$args = array(
		'post_type' => 'videos',
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
		'post__not_in' => array(1586,1591,1593)
	);	
}
else if($_POST['type'] == 'cat')
{
	$args = array(
		'post_type' => 'videos',
		'post_status' => 'publish',
		'showposts' => '1000',
		'orderby' => 'post_date',
		'order' => 'desc',
		'tax_query' => array(
				array(
					'taxonomy' => 'video-category',
					'field' => 'slug',
					'terms' => $_POST['slug']
				)
			),
		'post__not_in' => array(1586,1591,1593)
	);	
}
else if($_POST['type'] == 'tag')
{
	$args = array(
	'post_type' => 'videos',
	'post_status' => 'publish',
	'showposts' => '1000',
	'orderby' => 'post_date',
	'order' => 'desc',
	'tax_query' => array(
				array(
					'taxonomy' => 'post_tag',
					'field' => 'slug',
					'terms' => $_POST['slug']
				)
			),
	'post__not_in' => array(1586,1591,1593)
	);	
}
else if($_POST['type'] == 'search')
{
	$videos = $wpdb->get_results("SELECT wp.* FROM wp_l_posts wp 
								where wp.post_type='videos' and wp.post_status='publish' 
								and (wp.post_title like '%". $_POST['text'] ."%' || wp.post_excerpt like '%". $_POST['text'] ."%' || wp.post_content like '%". $_POST['text'] ."%')");									
}
if($_POST['type'] != 'search')
	$videos = get_posts($args);
echo count($videos).']['.getappexVideos($videos);

function getappexVideos($videos)
{
	if($videos):
		$i=1;
	  foreach($videos as $video):
		  $image = '';
		  if (has_post_thumbnail( $video->ID ) ):
			  $image = wp_get_attachment_image_src( get_post_thumbnail_id( $video->ID ), 'single-post-thumbnail' );
		  endif;
		  $is_featured = get_post_meta($video->ID,'is_featured',true);
		  if($i % 2 == 0) 
			  { $st = 'margin-right:0px;'; }
		  else
			  $st = "";
		  $str .= '<li class="span3" style="width:480px; '.$st.'">
		  <div class="thumbnail" style="background-color:#ffffff;">';
		  	if($is_featured)
			{			
          		$str .= '<img class="feat_star" src="'. get_template_directory_uri() .'/images/featured-icon.png" width="45" height="44" />';
			}		
			$str .= '<div class="img" style="width:240px;">';
			$str .= '<img src="'. get_template_directory_uri() .'/thumb.php?src='.$image[0].'&w=240&h=175" width="240" height="175" alt="">';
			$str .= '</div><div class="caption" style="width:210px;">
			  <h3>'. $video->post_title .'</h3>';			  
				$str .= '<p class="tags">';
				$tags = wp_get_post_terms( $video->ID, 'post_tag', $args );
				if($tags):
				foreach($tags as $tag):
					$str .= '<a href="javascript:void(0);" onclick="showpostsby(\'tag\',\''.$tag->slug.'\')">'.$tag->name.'</a>';                        
				endforeach;
				endif;
				$views = get_post_meta($video->ID,'views',true);
				if($views == '')
					$views = '0';
				$str .= '</p>
				<div id="views_'. $video->ID .'" class="btm-bar"> <span><span class="icon view"></span><em>'. $views .'</em></span>';
			  if($_POST['cols'] == 2)
			  	$str .= '<a class="playvideo" href="javascript:void(0);" onclick="addView('. $video->ID .',\'http://player.vimeo.com/video/'. get_post_meta($video->ID,'video_id',true) .'?width=800&height=450\')">Watch Video</a>';
			  $str .= '</div>
		  </div>
		</li>';			
			$i++;
		endforeach;
	endif;
	return $str;
}
?>