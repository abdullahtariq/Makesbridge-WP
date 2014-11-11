<?php 
get_header(); ?>

<div id="stories_page">	
    <div class="topbanner stories_topbanner" style="height:120px;">
      <div class="banncontent">
      	<h1><?php printf( __( 'Search Results for: %s', 'makesbridge' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
      </div>
    </div>    
    <div class="main_wrap" style="margin:50px auto;">
    	<?php 
		if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="post" style="margin-bottom:20px;">
				<!--<h2 class="posttitle"><?php the_title(); ?></h2>-->
				<div class="postcontent">
					<?php 
					$content = strip_shortcodes($post->post_content);
					$content = str_replace(']]>', ']]&gt;', $content);
					$content = strip_tags($content);
					if($post->post_type=='product')
						echo $post->post_excerpt;
					else
						echo custom_the_excerpt($content, 100); 
					?>
				</div>
				<a class="readmore" href="<?php 
				if($post->post_parent && $post->ID != 893)
				{
					$c_post = get_post($post->post_parent);
					if($c_post->post_parent)
						echo get_permalink($c_post->post_parent);
					else
						echo get_permalink($post->post_parent); 
				}
				else
				{
					if($post->post_type=='product')
						echo 'http://www.makesbridge.com/product-category/packages';
					elseif($post->post_type=='advisor')
						echo 'http://www.makesbridge.com/about-us';
					else
						echo get_permalink($post->ID); 
				}
				?>">Read More..</a>
			</div>
		<?php 
			endwhile; 
			else:
			?>
				<h3><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'makesbridge' ); ?></h3>
			<?php
endif; ?>
    </div>
</div>
<?php get_footer(); ?>