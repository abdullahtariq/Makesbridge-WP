<?php get_header(); ?>

<div id="thankyou_page">
  <?php
    if(have_posts()): 
	while(have_posts()) :
	the_post();	
	?>
  <!--<div class="topbanner thankyou_topbanner">
    <div class="banncontent">
    	<h1><?php //the_field('bann_head'); ?></h1>
        <h2><?php //the_field('bann_subhead'); ?></h2> 
    </div>
  </div>  -->
  <div class="main">
    <div class="main_wrap pagecontent" style="padding:0 20px; width:960px; margin:50px auto 100px;">
      <?php
		the_content();
		?>
    </div>
  </div>
  <?php
	endwhile;
    endif;
	?>
</div>
<?php get_footer(); ?>
