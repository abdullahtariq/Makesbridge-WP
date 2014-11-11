<?php
$items_per_group = 6;
$position = ($_POST["group_no"] * $items_per_group);
if($_POST['type'] == 'recent')
{
	$args = array(
		'post_type' => 'videos',
		'post_status' => 'publish',
		'showposts' => '1000',
		'orderby' => 'post_date',
		'order' => 'desc'
	);
	$videos = get_posts('post_type=videos&post_status=publish&showposts=1000&orderby=post_date&order=desc');
	$videos1 = $wpdb->get_results("SELECT * FROM wp_l_posts 
								where post_type='videos' and post_status='publish' 
								ORDER BY post_date desc LIMIT $position, $items_per_group");
	echo count($videos).']['.getVideos($videos1);								
}
else if($_POST['type'] == 'viewed')
{
	$args = array(
	'post_type' => 'videos',
	'post_status' => 'publish',
	'showposts' => '1000',
	'meta_key' => 'views',
	'orderby' => 'meta_value',
	'order' => 'desc'
	 );
	
	$videos = $wpdb->get_results("SELECT wp.* FROM wp_l_posts wp 
								where post_type='videos' and post_status='publish' 
								ORDER BY wp.post_date desc LIMIT $position, $items_per_group");
	echo count(get_posts($args)).']['.getVideos($videos);
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
		)
	);
	$videos = $wpdb->get_results("SELECT wp.* FROM wp_l_posts wp 									
								inner join wp_l_postmeta wpm on wpm.post_id=wp.ID 
								where post_type='videos' and post_status='publish' 										
								and wpm.meta_key='is_featured' and wpm.meta_value=true 
								ORDER BY wp.post_date desc LIMIT $position, $items_per_group");
	echo count(get_posts($args)).']['.getVideos($videos);
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
			)
	);
	$sql = "SELECT p.* FROM wp_l_posts p
								  inner join wp_l_term_relationships wtr on wtr.object_id=p.ID inner join 
									wp_l_term_taxonomy wtt on wtt.term_taxonomy_id = wtr.term_taxonomy_id 
									inner join wp_l_terms wt on wt.term_id=wtt.term_id 
								  WHERE p.post_type='videos' and p.post_status='publish' 
								  AND wt.slug='$_POST[slug]' 
								  ORDER BY p.post_date DESC LIMIT $position, $items_per_group";
	$videos = $wpdb->get_results($sql);
	echo count(get_posts($args)).']['.getVideos($videos);
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
			)
	);
	$videos = $wpdb->get_results("SELECT DISTINCT p.* FROM wp_l_posts p
								  inner join wp_l_term_relationships wtr on wtr.object_id=p.ID 
								  inner join wp_l_term_taxonomy wtt on wtt.term_taxonomy_id = wtr.term_taxonomy_id 
								  inner join wp_l_terms wt on wt.term_id=wtt.term_id 
								  WHERE p.post_type='videos' and p.post_status='publish'
								  AND wt.slug='$_POST[slug]' 											  
								  ORDER BY p.post_date DESC LIMIT $position, $items_per_group");
	echo count(get_posts($args)).']['.getVideos($videos);
}
else if($_POST['type'] == 'search')
{
	$videos = $wpdb->get_results("SELECT wp.* FROM wp_l_posts wp 
								where wp.post_type='videos' and wp.post_status='publish' 
								and (wp.post_title like '%". $_POST['text'] ."%' || wp.post_excerpt like '%". $_POST['text'] ."%' || wp.post_content like '%". $_POST['text'] ."%')");
								
	$sql = "SELECT wp.* FROM wp_l_posts wp 
								where wp.post_type='videos' and wp.post_status='publish' 
								and (wp.post_title like '%". $_POST['text'] ."%' || wp.post_excerpt like '%". $_POST['text'] ."%' || wp.post_content like '%". $_POST['text'] ."%') 
								ORDER BY wp.post_date DESC LIMIT $position, $items_per_group";
	$videos1 = $wpdb->get_results($sql);
	
	echo count($videos).']['.getVideos($videos1);
}
?>