<?php 

/* Template Name: Videos */

get_header(); ?>

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
          	<h1><?php the_field('bann_head'); ?></h1>
              <h2>
          <?php the_field('bann_subhead'); ?>
        </h2>    
          </div>
        </div>
  	<?php
	endwhile;
    endif;
	?>
  <div id="videos_sec1">
    <div class="main_wrap">     
      <?php
        $videos_sec1 = get_post(750); 
		 setup_postdata( $videos_sec1 );
      	the_content();
		?>
    </div>
  </div>
  <div id="videos_sec2">
    <div class="main_wrap">
      <?php
        $videos_sec2 = get_post(762); 
		setup_postdata( $videos_sec2 );
      	the_content();
		?>
    </div>
  </div>  
</div>
<?php get_footer(); ?>
