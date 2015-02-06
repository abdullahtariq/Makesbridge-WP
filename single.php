<?php  
get_header();?>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/styles_a.css" media="screen" />
<section class="mksblog">
 <!-- START: Module -->
      <div class="mainfull banner">
         <div class="main_wrap">
            <div class="banner_wrap">
               <div class="headline_blog">
                  <div class="topic_padding"></div>
                  <a href="<?php echo site_url( '/blog/', 'http' ); ?>"><h2>Makesbridge Blog</h2></a>
                  <br>
                  <div class="topic_wrap topic_bot">
                     <div class="topic_text">TOPICS</div>
                     <div class="topicicon" aria-hidden="true" data-icon="&#xe602;"></div>
                     <div class="clr"></div>
                  </div>
                  
                  <div class="topic_content">
                     <div class="topic_item">
                       <?php $terms = get_terms("topics-category"); 
                    foreach ( $terms as $term ) {
                        $term_link = get_term_link( $term, '' );
                        if( is_wp_error( $term_link ) )
                        continue; ?>
                      <?php $termlink = $term->taxonomy.'?topic='.$term->slug ;?>
               <a href="<?php echo site_url( $termlink, 'http' ); ?>"><?php echo $term->name; ?></a>  
           <?php 
                } 
                 
              ?>
                     </div>
                  </div>
                  <div class="topic_padding"></div>
                  
               </div>


             
            </div>
         </div>
      </div>
      <!-- END: Module -->

<div class="mainfull blogcontent" style="overflow: hidden;">
         <div class="main_wrap">
            <div class="blogcontent_wrap">
               
     <div class="blog_tline">
      
      	 <?php if (have_posts()) : while (have_posts()) : the_post(); ?> 
         <div class="post_hidden_wrap">
          <?php $my_date = get_the_time('d', $blog->ID);  ?>
          <?php $my_month = get_the_time('M', $blog->ID);  ?>
          <div class="pdate">
                           <div class="pdate_in">
                              <p class="date_num"><?php echo $my_date;?></p>
                              <p class="date_month"><?php echo $my_month;?></p>
                           </div>
                        </div>
          <div class="post_wrap">
             <div class="postl_single">
                             <?php 
                                if ( has_post_thumbnail() ) {
                                          the_post_thumbnail('full', array( 'class'  => "post_img"));
                                        } else{
                                          echo ' <img class="post_img" src="'.get_template_directory_uri().'/images/370x240.jpg">';
                                        }
                            ?>
                           </div>
          <div class="postr_single">
            <h2><?php the_title(); ?></h2>
            <p><?php the_content('Read more...'); ?></p>
           </div>
                            <div class="clr"></div>
          </div>
         </div>
          <?php endwhile; ?>
<?php else : ?>
              
              
       		<?php endif; ?>
          
       <div class="pdate" style="height: 70px; width: 79.5%; top: 25px; border-radius: 5px;">
                           <div class="pdate_in" style="width: 857px; text-align: center;">
                              <p class="date_num" style="font-family: proxima_nova_regular,Arial,sans-serif;">Related Resources</p>
                           </div>
                        </div>
      </div>
      
       <?php 
            $args = array(
     'post_type' => 'blog',
     'post_status' => 'publish',
     'orderby' => 'rand',
     'order' =>  'Desc',
     'showposts' =>  '3'
   );
  $blogs = get_posts($args); 
          ?>
<div class="related-post-container">
  <div class="topic_padding" style="height:30px;"></div>
           <?php
  
    if(count($blogs) > 0):
       
      foreach($blogs as $blog)
      {

        ?>
         <div class="post_wrap related_post_wrap">
           <?php
          $feat_image = wp_get_attachment_url( get_post_thumbnail_id($blog->ID) );
          if($feat_image):
          ?>  
         <a href="<?php echo get_permalink( $blog->ID ); ?>"> <img class="post_img relate_img" src="<?php echo $feat_image ?>" /></a> 
          <?php else: ?>
          <a href="<?php echo get_permalink( $blog->ID ); ?>"><img class="post_img relate_img" src="<?php echo get_template_directory_uri()?>/images/370x240.jpg"></a>
          <?php endif; ?>
          <a href="<?php echo get_permalink( $blog->ID ); ?>"><h4><?php echo $blog->post_title; ?></h4></a>
    
       </div>
           <?php }
    endif;
   ?>
   </div> 

      <div class="clear topic_padding"></div>
      </div>
    </div>
  </div><!-- Wrapper Ends-->



      <div class="mainfull btn_action">
       <div class="main_wrap">
            
           <?php get_sidebar(); ?>
          <div class="topic_padding"></div>
          <div class="topic_padding"  style="height: 20px;"></div>
         </div>
      </div><!-- Side bar -->


	        <div class="navigation"><p>
           </p></div>

     
       
     
</section>

<style type="text/css">
#leftbar div{
  height: 38px !important;
    width: 40px !important;
}
</style>


<script type="text/javascript">
  $(document).ready(function(){
    $(".topic_bot").click(function(){
       $(".topic_content").slideToggle(700);

     });
    $('.ssb-share').append('<img src="https://www.makesbridge.com/wp-content/uploads/2014/12/imgo.jpg" style="position:relative;top:-12px;"/>')
  });
</script>
<?php get_footer(); ?>