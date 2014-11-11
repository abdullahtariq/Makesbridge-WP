<?php 

/* Template Name: Marketing */

get_header(); ?>

<div id="marketing_page">
  <?php
    if(have_posts()): 
	while(have_posts()) :
	the_post();
	$background_image = get_field('bann_backimage');
	$top_image = get_field('bann_topimage');	
	?>
  <div class="topbanner market_topbanner" style="background:url(<?php echo $background_image["url"]; ?>) no-repeat 50% 0">
    <div class="banncontent">
      <div class="content">
        <h1>
          <?php the_field('bann_head'); ?>
        </h1>
        <h2>
          <?php the_field('bann_subhead'); ?>
        </h2>
        <h3>
          <?php the_field('bann_desc'); ?>
        </h3>
      </div>
      <img class="bannericon" src="<?php echo $top_image["url"]; ?>" /> </div>
  </div>
  <?php
	endwhile;
    endif;
	?>
  <div id="market_connect" class="market_connect">
    <div class="main_wrap">
      <?php
        $market_conn = get_post(58); 
		global $post;
		setup_postdata($market_conn);
		the_content();
		?>
      <script src="//code.jquery.com/jquery-1.9.1.js"></script> 
      <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script> 
      <script>
		  $(function() {
		  	$( "#tabs" ).tabs({ event: "mouseover" });
		  });
		</script>
      <div id="tabs">
        <ul>
          <?php
			$i=1;
            $tabs = get_posts('post_type=page&post_status=publish&orderby=post_date&order=asc&post_parent=216&showposts=20');
			//$tabs = wp_list_pages('title_li=&child_of=216&echo=1&depth=1');
			foreach($tabs as $tab)
			{
			?>
          <li><a href="#tabs<?php echo $i; ?>"><?php echo $tab->post_title; ?></a>
            <div></div>
          </li>
          <?php
				$i++;
			}
			?>          
        </ul>
        <?php
		$i=1;		
		foreach($tabs as $tab)
		{
			if (has_post_thumbnail( $tab->ID ) ):
			  $image = wp_get_attachment_image_src( get_post_thumbnail_id( $tab->ID ), 'single-post-thumbnail' );
			endif;
		?>
        <div id="tabs<?php echo $i; ?>">
          <p><?php echo $tab->post_content; ?></p>
          <img src="<?php echo $image[0]; ?>" /> </div>
        <?php
			$i++;
		}
		?>        
      </div>
    </div>
  </div>
  <div id="market_report" class="market_report">
    <div class="main_wrap">
      <?php
	  	/*wp_reset_query();
	  	 $market_conn1 = get_post(71); 
		global $post;
		setup_postdata($market_conn1);
		the_content();
		wp_reset_query();*/
        /*$market_conn = get_post(71); 
		echo $market_conn->post_content;*/
		echo do_shortcode(get_post_field('post_content', 71));
		?>
    </div>
  </div>
  <div id="market_ui" class="market_ui">
    <div class="main_wrap">
      <?php
        echo do_shortcode(get_post_field('post_content', 83));
		?>
    </div>
  </div>
  <div id="market_tools" class="market_tools">
    <div class="main_wrap">
      <?php
        $market_conn = get_post(92); 
		echo $market_conn->post_content;
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
          $stories = get_posts('post_type=success-stories&post_status=publish&showposts=1000&orderby=post_date&order=desc&cat=3');
          foreach($stories as $story)
          {
			  $image = '';
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
