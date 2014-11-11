<?php 

/* Template Name: Analytics */

get_header(); ?>

<div id="analytics_page">
	<?php
    if(have_posts()): 
	while(have_posts()) :
		the_post();
		$background_image = get_field('bann_backimage');
		$top_image = get_field('bann_topimage');	
		?>
        <div class="topbanner analytics_topbanner" style="background:url(<?php echo $background_image["url"]; ?>) no-repeat 50% 0">
          <div class="banncontent">
          	<h1><?php the_field('bann_head'); ?></h1>
              <h2>
          <?php the_field('bann_subhead'); ?>
        </h2>    
              <img class="bannericon" src="<?php echo $top_image["url"]; ?>" />
          </div>
        </div>
  	<?php
		//the_content();
	endwhile;
    endif;
	?>
  <div id="analytics_sec1">
    <div class="main_wrap">     
      <?php
        echo do_shortcode(get_post_field('post_content', 169));
		?>
    </div>
  </div>
  <div id="analytics_sec2">
    <div class="main_wrap">
      <?php
        $analytics_sec2 = get_post(178); 
		echo $analytics_sec2->post_content;
		?>
    </div>
  </div> 
  <div id="analytics_sec3">
    <div class="main_wrap">
      <?php
        $analytics_sec3 = get_post(183); 
		echo $analytics_sec3->post_content;
		?>
    </div>
  </div> 
  <div id="analytics_sec4">
    <div class="main_wrap">
      <?php
        $analytics_sec4 = get_post(188); 
		echo $analytics_sec4->post_content;
		?>
    </div>
  </div>
  <?php
  $stories = get_posts('post_type=success-stories&post_status=publish&showposts=1000&orderby=post_date&order=desc&cat=21');
  if($stories)
  {
  ?>
  <div id="succstories" class="succstories">
    <div class="succstories-inner">
      <div class="clear"></div>
      <h3>Success Stories</h3>
      <script language="javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.film_roll.js"></script>
	  <script language="javascript">
          jQuery(function() {
            var film_roll = new FilmRoll({
                container: '#film_roll',
				interval: 12000						 
              });
          });
      </script>
      <div id="film_roll">
          <?php          
          foreach($stories as $story)
          {
              if (has_post_thumbnail( $story->ID ) ):
                  $image = wp_get_attachment_image_src( get_post_thumbnail_id( $story->ID ), 'single-post-thumbnail' );
              endif;				
              ?>
              <div class="homestory" style="width:400px;">
                  <?php
                  if($story)
                  {
                  ?>
                      <a href="<?php echo get_permalink($story->ID); ?>">
                          <p class="st_text"><?php echo $story->post_excerpt; ?>...Read more</p>
                          <!--<span class="clear"></span>
                          <span class="ss_auth"><?php echo $story->author; ?></span>-->
                          <?php
						  if($image)
						  {
						  ?>
                          	<span class="ss_logo" style="float:none; text-align:center; width:100%; display:block;"><img style="border:0;" src="<?php echo $image[0]; ?>" /></span>
                          <?php
						  }
						  ?>
                          <!--<span class="clear"></span>-->
                      </a>
                  <?php
                  }					
                  ?>
              </div>
          <?php
          }
          ?>                    
      </div>
  <div class="clear"></div>
</div>
</div>
  <?php
  }
  ?>
</div>
<?php get_footer(); ?>
