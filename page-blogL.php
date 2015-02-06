<?php 
/*
Template Name: Blog Template
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
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/styles_a.css" media="screen" />
<section class="mksblog">

      <!-- START: Module -->
      <div class="mainfull banner">
         <div class="main_wrap">
            <div class="banner_wrap">
               <div class="headline_blog">
                  <div class="topic_padding"></div>
                  <h2>Makesbridge Blog</h2>
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
<div class="mainfull blogcontent">
         <div class="main_wrap">
            <div class="blogcontent_wrap">
               

               <div class="blog_tline" id="news-blog-posts">
  <input type="hidden" name="track_load" id="track_load" value="0" />
  <input type="hidden" name="tax_type" id="tax_type" value="all" />
  <input type="hidden" name="total_groups" id="total_groups" value="" />
  <input type="hidden" name="total_records" id="total_records" value="" />

 
      <div  class="breadCrum" style="display:none;">
        <a href="<?php bloginfo( 'url' ); ?>">Home</a><span> > </span><a class="bdactive" href="<?php echo site_url( '/'.$pagename.'/', 'http' ); ?>">Makesbridge Blog</a>       
      </div><!-- Breadcrums  -->
   
          <?php
            if(have_posts()): 
          while(have_posts()) :
          the_post();
          ?>

           <?php
  endwhile;
    endif;
    $args = array(
     'post_type' => 'blog',
     'post_status' => 'publish',
     'orderby' => 'post_date',
     'order' =>  'Desc',
     'showposts' =>  '4'
   );
  $blogs = get_posts($args); 
  
  ?>
        
                   

  <?php
    
    if(count($blogs) > 0):
       



      foreach($blogs as $blog)
      {
        //print_r($blog);
        ?>

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
                           <div class="postl">
                                                <?php
                      $feat_image = wp_get_attachment_url( get_post_thumbnail_id($blog->ID) );
                      if($feat_image):
                      ?>  
                          <img class="post_img" src="<?php echo $feat_image ?>" /> 
                          <?php else: ?>
                           <img class="post_img" src="<?php echo get_template_directory_uri()?>/images/370x240.jpg">
                       <?php endif; ?>
                       
                           </div>
                            
                           <div class="postr">
                              <a href="<?php echo get_permalink( $blog->ID ); ?>"><h2><?php echo $blog->post_title; ?></h2></a>
                              <p><?php echo $blog->post_excerpt; ?></p>
                              <a href="<?php echo get_permalink( $blog->ID ); ?>">Read More</a>
                           </div>
                            <div class="clr"></div>
            </div>
          
          
    
       </div>
           <?php }
    endif;
   ?>  

   </div>
        <div class="loadmore"><a id="load_more" style="display:none;">Load More</a></div>
          
      </div>
    </div>
  </div><!-- Wrapper ENds-->
      
      <div class="mainfull btn_action">
       <div class="main_wrap">
            
           <?php get_sidebar(); ?>
         </div>
      </div><!-- Side bar -->

       

</section>
<style type="text/css">
#leftbar div{
  height: 38px !important;
    width: 40px !important;
}
</style>
<script type="text/javascript">
  $(document).ready(function() { 
    $(".topic_bot").click(function(){
       $(".topic_content").slideToggle(700);

     });

       /*------*/
     $('#load_more').click(function(){
      if($('.mkspost-wrap').length != $('#total_records').val()){
        $('#load_more').html('<img src="http://www.makesbridge.com/wp-content/uploads/2014/10/ajax-loader.gif" style="background: none repeat scroll 0% 0% transparent;">');
        $.ajax({
          url:"<?php echo bloginfo('wpurl'); ?>/wp-admin/admin-ajax.php",
          type:'POST',
          data:'action=my_special_ajax_call&act=blo&tax=blog&group_no='+ $('#track_load').val() +'&type='+$('#tax_type').val(),
          success:function(results)
          {           
            var params = results.split('][');
            $('#news-blog-posts').append(params[1]);
            $('#load_more').html('Load More'); //hide loading image once data is received
            $('#total_groups').val(Math.ceil(params[0]/8));
            var track_load = $('#track_load').val();
            track_load = parseInt(track_load)+1;
            $('#track_load').val(track_load);
            if($('.post_hidden_wrap').length == $('#total_records').val())
                {$('#load_more').fadeOut();}

          }
        }); 
      }else{
        return false;
      }
    });
     /*Get Total value*/
      $.ajax({
          url:"<?php echo bloginfo('wpurl'); ?>/wp-admin/admin-ajax.php",
          type:'POST',
          data:'action=my_special_ajax_call&act=blo&tax=blog&group_no='+ $('#track_load').val() +'&type='+$('#tax_type').val()+'&totalOnly=true',
          success:function(results)
          {           
            $('#total_records').val(results);
            if(results > 4 ){$('#load_more').fadeIn()};
            $('#track_load').val(1);
          }
        }); 
  });
</script>
<?php get_footer(); ?>
