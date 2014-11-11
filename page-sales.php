<?php 

/* Template Name: Sales */

get_header(); ?>
<!--<ul id="marketing_pagemenu">
   <li><a href="#sales_sec1">Section 1</a></li>
   <li><a href="#sales_sec2">Section 2</a></li>
   <li><a href="#sales_sec3">Section 3</a></li>
   <li><a href="#succstories">Section 4</a></li>
   <li><a href="#services">Section 5</a></li>
</ul>-->
<div id="sales_page">
	<?php
    if(have_posts()): 
	while(have_posts()) :
	the_post();
	$background_image = get_field('bann_backimage');
	$top_image = get_field('bann_topimage');	
	?>
  <div class="topbanner sales_topbanner" style="background:url(<?php echo $background_image["url"]; ?>) no-repeat 50% 0">
  	<div class="banncontent">
      <h1>
          <?php the_field('bann_head'); ?>
        </h1>
        <h2>
          <?php the_field('bann_subhead'); ?>
        </h2>        
      <img class="bannericon" src="<?php echo $top_image["url"]; ?>" /> 
    </div>
  </div>
  <?php
	endwhile;
    endif;
	?>
  <div id="sales_sec1">
    <div class="main_wrap">     
      <?php
        echo do_shortcode(get_post_field('post_content', 102));
		?>
    </div>
  </div>
  <div id="sales_sec2">
    <div class="main_wrap">
      <?php
        $sales_sec2 = get_post(109); 
		echo $sales_sec2->post_content;
		?>
    </div>
  </div>
  <div id="sales_sec3">
    <div class="main_wrap">
      <?php
        $sales_sec3 = get_post(114); 
		echo $sales_sec3->post_content;
		?>
    </div>
  </div>  
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
          $stories = get_posts('post_type=success-stories&post_status=publish&showposts=1000&orderby=post_date&order=desc&cat=4');
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
  <!--<div id="services" class="services">
    <div class="main_wrap">
      <?php //$market_conn = get_post(99); ?>
      <h2><?php //echo $market_conn->post_title; ?></h2>      
      <?php //echo $market_conn->post_content; ?>      
    </div>
  </div>-->
</div>
<?php get_footer(); ?>
