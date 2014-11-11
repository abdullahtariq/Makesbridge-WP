<?php 

/* Template Name: Thank You */

get_header(); ?>

<div id="thankyou_page">
	<?php
    if(have_posts()): 
	while(have_posts()) :
	the_post();
	$background_image = get_field('bann_backimage');
	?>
    <div class="topbanner thankyou_topbanner">
      <div class="banncontent">
        <h1><?php the_field('bann_head'); ?></h1>
        <h2><?php the_field('bann_subhead'); ?></h2> 
      </div>
    </div>
    <div class="main_wrap">
    	<div class="clear"></div>
    	<?php the_content(); ?>
        <div class="clear"></div>
    </div>
    <?php
	endwhile;
    endif;
	?>        
</div>
<?php get_footer(); ?>