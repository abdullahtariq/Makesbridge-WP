<?php 
/*
Template Name: Testimonial Template
*/

get_header(); 


?>
<?php $pagename = get_query_var('pagename');
if ( !$pagename && $id > 0 ) {
// If a static page is set as the front page, $pagename will not be set. Retrieve it from the queried object
  $post = $wp_query->get_queried_object();
  $pagename = $post->post_name;

  }
 
 ?>
          <?php
            if(have_posts()): 
          while(have_posts()) :
          the_post();
          ?>

           <?php
  endwhile;
    endif;
    $args = array(
     'post_type' => 'testimonial',
     'post_status' => 'publish',
     'orderby' => 'post_date',
     'order' =>  'Desc',
     'showposts' =>  '1000'
   );
  $medias = get_posts($args); 

  ?>

  <div class="jumbotron ">
        <div id="wrapper" class="">

  <div id="featured" class="">


    <div id="featured-banner" class="">

      
      <p><?php 
     the_post_thumbnail('full', array( 'class'  => "img-responsive attachment-post-thumbnail"));
      ?></p>

    </div>
    </div><!-- /#feature -->
  </div><!-- /#wrapper -->
</div><!-- /.jumbotron -->
<?php //print_r($medias); ?>
<div class="jumbotron ">
        <div id="wrapper" class="">

  <div id="featured" class="">
  

      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10"> <!-- 8 column div -->

          <div class="row-detail">


        <h3 class="featured-title title">
          <?php the_title(); ?>
        </h3>
     
      <div class="content-setting"><?php the_content(); ?></div>
      
        
        </div>
<?php
    
        
    if(count($medias) > 0):
       
      foreach($medias as $blog)
      {
        

        //echo get_post_meta($blog->ID, 'testimonial', true);
        ?>
         <div class="mkspost-wrap">
         
        <?php $my_date = get_the_time('d.M.Y', $blog->ID);  ?>
        
         
          <p >
          <?php echo get_post_meta($blog->ID, 'testimonial', true);  ?><br>
—         <?php echo get_post_meta($blog->ID, 'player_name', true);  ?>
        </p>
         
          <p class="title sub-title">
            <?php echo $my_date; ?>
          </p><br />
       </div>
           <?php }
    endif;
   ?>  
        
       

        </div> <!-- 8 columns div ends -->

      </div>


  </div><!-- end of #featured -->

      </div>
    </div>

<?php get_footer(); ?>
