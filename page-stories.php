<?php 

/* Template Name: Stories */

get_header(); ?>

<!--<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/js/jquery.bxslider.css" type="text/css" />
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.bxslider.js"></script>-->
<script language="javascript">
	/*$(document).ready(function(){    
		$('.succ-stories').bxSlider({
		  minSlides: 5,
		  maxSlides: 6,
		  slideWidth: 160,
		  slideMargin: 50,
		  moveSlides:1,
		  pager:false
		});
	});*/
	function showStory(id,obj)
	{
		$('.succ-story').hide();
		$('#story_'+id).show();
		$('.story_links').removeClass('active');
		//alert($('#sl_'+id));
		$(obj).addClass('active');
	}
</script>
<div id="stories_page">	
    <div class="topbanner stories_topbanner">
      <div class="banncontent">
      	<?php
		if(have_posts()): 
		while(have_posts()) :
		the_post();
		?>
        	<h1><?php the_field('bann_head'); ?></h1>
        	<h2><?php the_field('bann_subhead'); ?></h2> 
        <?php
		endwhile;
		endif;
		?>
        <ul>
        	<div class="clear"></div>
			 <?php 
             $args = array( 'hide_empty' => false,
						'orderby' => 'id',
						'order' => 'asc',
						'exclude' => array(1));
             $terms = get_terms( 'category', $args );
             foreach ( $terms as $term )
            {
				if($term->name == $_REQUEST['cat'])
					$cls = "class='active'";
				else
					$cls = "";
            ?>
                <li><a <?php echo $cls; ?> href="<?php bloginfo("url") ?>/success-stories?id=<?php echo $term->term_id; ?>&cat=<?php echo $term->name; ?>"><?php echo $term->name; ?></a></li>
            <?php	
            }
             ?>
         	<div class="clear"></div>
         </ul>
      </div>
    </div>    
    <div class="main_wrap">
    	<?php
        $stories = get_posts('post_type=success-stories&post_status=publish&showposts=1000&orderby=post_date&order=desc&cat='.$_REQUEST['id']);
		if($stories)
		{
		?>
    	<ul class="succ-stories">
        	<?php            
			if($stories)
			{
				foreach($stories as $story)
				{
					$image = '';
					if (has_post_thumbnail( $story->ID ) ):
						$image = wp_get_attachment_image_src( get_post_thumbnail_id( $story->ID ), 'single-post-thumbnail' );
					endif;
					$size = getimagesize ( $image[0] );
					if($size[0] < 195)
						$w = $size[0];
					else
						$w = '195';
					if($size[1] < 65)
						$h = $size[1];
					else
						$h = '65';
					?>
					<li><a id="sl_<?php echo $story->ID ?>" class="story_links" href="javascript:void(0)" onclick="showStory('<?php echo $story->ID ?>',this)">
                    	<img style="border:0;" src="<?php echo $image[0]; ?>" width="<?php echo $w; ?>" height="<?php echo $h; ?>" />
                    </a></li>
					<?php
				}
			}
			?>
        </ul>
        <?php
		global $post;
        foreach($stories as $post)
		{
			setup_postdata( $post );
		?>
        	<div class="succ-story story_content" id="story_<?php echo $post->ID ?>" style="display:none;">
            	<?php the_content(); ?>
            </div>
        <?php
		}
        }
		?>
    </div>
</div>
<?php get_footer(); ?>