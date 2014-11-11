<?php get_header(); ?>

<?php
if(have_posts()): 
while(have_posts()) :
the_post();
$background_image = get_field('ss_topbanner');
$terms = wp_get_post_terms( $post->ID, 'category' );
//print_r($terms[0]);
$firstCategory = $terms[0]->name;
$image = '';
if (has_post_thumbnail( $post->ID ) ):
	$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
endif;
?>
<div class="topbanner story_topbanner">
  	<div class="banncontent">
      <h1><?php echo get_post_meta($post->ID,'banner_text',true); ?></h1>
    </div>
</div>
<div class="main_wrap"> 
	<div class="story_content">
    	<?php
        if($image)
		{
		?>
    		<img class="stroy_logo" src="<?php echo $image[0]; ?>" />
        <?php
		}
		?>
        <a target="_blank" href="<?php bloginfo('url'); ?>/wp-content/plugins/kalins-pdf-creation-station/kalins_pdf_create.php?singlepost=po_<?php echo $post->ID; ?>"><div class="downloadpdf">Download this page as pdf</div></a>
        <?php the_content(); ?>
    </div>
</div>
<?php
endwhile;
endif;
?>
<?php get_footer(); ?>