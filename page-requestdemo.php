<?php 

/* Template Name: Request Demo */

get_header(); ?>

<div id="requestdemo_page">
	<?php
    if(have_posts()): 
	while(have_posts()) :
	the_post();
	$background_image = get_field('bann_backimage');
	?>	
    <div class="topbanner requestdemo_topbanner">
    	<div class="topbanner requestdemo_topbanner" style="background:url(<?php echo $background_image["url"]; ?>) no-repeat 50% 0">
          <div class="banncontent">
          	<h1><?php the_field('bann_head'); ?></h1>
          </div>
        </div>
    </div>
    <?php
	endwhile;
    endif;
	?>
    <div id="requestdemo_sec1">
      <div class="main_wrap">     
        <?php
          $requestdemo_sec1 = get_post(405); 
          echo $requestdemo_sec1->post_content;
          ?>
      </div>
    </div>
    <div id="requestdemo_sec2">
      <div class="main_wrap">     
        <?php
          $requestdemo_sec2 = get_post(527); 
          echo $requestdemo_sec2->post_content;
          ?>
      </div>
    </div>
</div>
<?php get_footer(); ?>