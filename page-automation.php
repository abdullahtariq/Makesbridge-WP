<?php 

/* Template Name: Automation */

get_header(); ?>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/animate.min.css">
<style type="text/css">
  .loading, .overlay {
            background: url("../img/trans_white.png") repeat scroll center 0 transparent;
            display: block;
            height: 100%;
            left: 0;
            position: absolute;
            top: 0;
            width: 100%;
            z-index: 9999;
        }
        .overlay {
            background: none repeat scroll 0 0 rgba(47, 63, 74, 0.8);
            position: fixed;
        }
</style>

<!--<ul id="marketing_pagemenu">
   <li><a href="#automation_sec1">Section 1</a></li>
   <li><a href="#automation_sec2">Section 2</a></li>
   <li><a href="#succstories">Section 3</a></li>
   <li><a href="#services">Section 4</a></li>
</ul>-->

<div id="automation_page">
	<?php
    if(have_posts()): 
	while(have_posts()) :
	the_post();
	$background_image = get_field('bann_backimage');
	?>
  <div class="topbanner automation_topbanner" style="background:url(<?php echo $background_image["url"]; ?>) no-repeat 50% 0">
  	<div class="banncontent">
      <h1><?php the_field('bann_head'); ?></h1>
      <h2>
          <?php the_field('bann_subhead'); ?>
        </h2>
      <!--<img class="bannericon" src="<?php bloginfo('stylesheet_directory'); ?>/images/automation-banner-icon.png" width="453" height="365" /> -->
    </div>
  </div>
  	<?php
	endwhile;
    endif;
	?>
  <?php
        $automation_sec1 = get_post(144); 
		echo $automation_sec1->post_content;
	?>
  <div id="automation_sec1">
    <div class="main_wrap">     
      <?php
        echo do_shortcode(get_post_field('post_content', 150));
		?>
    </div>
  </div>
  <div id="automation_sec2">
    <div class="main_wrap">
      <?php
        $automation_sec3 = get_post(154); 
		echo $automation_sec3->post_content;
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
          $stories = get_posts('post_type=success-stories&post_status=publish&showposts=1000&orderby=post_date&order=desc&cat=19');
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
<div class="overlay" id="over-iframe-lay" style="display:none;">
  <div style="left: 50%;position: absolute;top: 5%;">
  <div class="pp_pic_holder pp_default foff" style="display: block; background: none repeat scroll 0% 0% rgb(255, 255, 255); position: relative; border-radius: 5px 5px 0px 0px; top: 7%; width: 900px; left: -50%;">
  <!-- <div class="ppt" style="opacity: 1; display: block; width: 740px;">&nbsp;</div> -->
  <!-- <div class="pp_top">
    <div class="pp_left"></div>
    <div class="pp_middle"></div>
    <div class="pp_right"></div>
  </div> -->
  <div class="pp_content_container" style="position:relative; overflow: auto; height: 520px;">
  
    <a href="javascript:void(0);" class="pp_close" id="CloseModal" style="z-index: 1000; display: block; float: right; position: absolute; right: 17px; top: 24px; background: none repeat scroll 0 0 transparent;">Close</a> 
  </div>
  <div class="pp_bottom">
    <div class="pp_left"></div>
    <div class="pp_middle"></div>
    <div class="pp_right"></div>
  </div>
</div>
</div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
      $('#CloseModal').click(function(){
          $('#over-iframe-lay').hide();
      })
  })
</script>
<?php get_footer(); ?>
