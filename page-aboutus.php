<?php 

/* Template Name: About Us */

get_header(); ?>

<div id="aboutus_page">
  	<?php
    if(have_posts()): 
	while(have_posts()) :
	the_post();
	$background_image = get_field('bann_backimage');
	?>
    <div class="topbanner aboutus_topbanner" style="background:url(<?php echo $background_image["url"]; ?>) no-repeat 50% 0">
      <div class="banncontent">
        <h1>
          <?php the_field('bann_head'); ?>
        </h1>
        <div class="clear"></div>
        <img src="<?php bloginfo('stylesheet_directory'); ?>/images/left-colons.png" width="23" height="19" style="float:left; position:relative; top:4px;" />
        <h2><?php the_field('bann_subhead'); ?></h2>
        <img src="<?php bloginfo('stylesheet_directory'); ?>/images/right-colons.png" width="24" height="20" style="float:left; position:relative; top:4px;" />
        <div class="clear"></div>
      </div>
    </div>
  	<?php
	endwhile;
    endif;
	?>
    <div id="aboutus_sec1">
      <div class="main_wrap">
          <div class="clear"></div>
          <div class="about_left">
              <?php
              if(have_posts()): 
              while(have_posts()) :
              the_post();
              ?>
              <?php the_content(); ?>
              <?php
              endwhile;
              endif;
              ?>
          </div>
          <div class="about_right">        	
              <div class="advisors_box">
                  <h2>Board of Advisors</h2>
                  <div class="clear"></div>
                  <?php
                  query_posts('post_type=advisor&post_status=publish&showposts=100&orderby=post_date&order=asc');
                  $i=0;
                  if(have_posts()): 
                  while(have_posts()) :
                      the_post();
					  $image = '';
                      if (has_post_thumbnail( $post->ID ) ):
                          $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
                      endif;
                  if($i==0)
                  {
                  ?>
                      <div class="president">
                          <div class="clear"></div>
                          <?php
                        if($image)
						{
						?>
                          <a href="javascript:void(0);" onclick="openadvdetail(<?php echo $post->ID; ?>)"><img class="adv_thumb" src="<?php echo $image[0]; ?>" width="80" height="80" style="border:0;"></a>
                          <?php
						  }
						  ?>
                          <div class="adv_detail">
                              <h3><?php the_title(); ?></h3>
                              <em><?php echo get_post_meta($post->ID,"designation",true); ?></em>
                              <p><?php echo get_post_meta($post->ID,"company",true); ?></p>
                          </div>
                          <div class="clear"></div>
                      </div>
					<?php
                    }
                    else
                    {
                    ?>
                      <div class="advisor">
                      	<?php
                        if($image)
						{
						?>
                          <a href="javascript:void(0);" onclick="openadvdetail(<?php echo $post->ID; ?>)" title="<?php the_title(); ?>">
                          	<img class="adv_thumb" src="<?php echo $image[0]; ?>" width="80" height="80" style="border:0;">
                         	</a>
                         <?php
						  }
						  ?>
                      </div>
                  <?php
                  }
                  $i++;
				  ?>
				  	<div id="adv_<?php echo $post->ID; ?>" class="adv_detail_box signuppop wp-pop">
                    	<h2>Board of Advisors</h2>
                        <div class="clear"></div>
                        <?php
                        if($image)
						{
						?>
                        	<img class="adv_photo" src="<?php echo $image[0]; ?>" width="80">
                        <?php
						}
						?>
                        <div class="adv_detail">
                        	<div class="clear"></div>
                        	<h3><?php the_title(); ?></h3>
                            <div class="desigcomp">
                            	<em><?php echo get_post_meta($post->ID,"designation",true); ?></em>, <?php echo get_post_meta($post->ID,"company",true); ?>
                            </div>
                            <div class="clear"></div>
                            <div class="adv_content">
                            	<?php the_content(); ?>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
				  <?php
                  endwhile;
                  endif;
                  ?>
                  
                  <div class="clear"></div>
              </div>
              <?php dynamic_sidebar(2); ?>
          </div>
          <div class="clear"></div>
      </div>
    </div>
    <div id="aboutus_sec2">
    	<div class="main_wrap">
        	<?php
            $aboutus_sec2 = get_post(873); 
			?>
        	<h2><?php echo $aboutus_sec2->post_title; ?></h2>
        	<?php echo $aboutus_sec2->post_content; ?>
        </div>
    </div>
    <div 
</div>
<?php get_footer(); ?>