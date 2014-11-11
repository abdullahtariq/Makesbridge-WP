<?php 

/* Template Name: Videos Landing */

get_header(); ?>

<div id="vl_page">
	<?php
    if(have_posts()): 
	while(have_posts()) :
	the_post();
	$background_image = get_field('bann_backimage');
	?>
    <div class="topbanner vl_topbanner" style="background:url(<?php echo $background_image["url"]; ?>) no-repeat 50% 0">
      <div class="banncontent">
        <h1><?php the_field('bann_head'); ?></h1>
      </div>
    </div>
    <div id="vl_sec1">
      <div class="main_wrap">
        <?php the_content(); ?>
      </div>
    </div>
    <?php
	endwhile;
    endif;
	?>
</div>
<?php get_footer(); ?>
