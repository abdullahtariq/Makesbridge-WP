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
<div class="container-fluid">
  <div class="row">
    <div class="mksblog-heading"><h1>Makesbridge Blog</h1></div>
  </div>

</div>
<div class="container">
  <input type="hidden" name="track_load" id="track_load" value="0" />
  <input type="hidden" name="tax_type" id="tax_type" value="all" />
  <input type="hidden" name="total_groups" id="total_groups" value="" />
  <input type="hidden" name="total_records" id="total_records" value="" />

    <div class="row">
      <div  class="breadCrum">
        <a href="<?php bloginfo( 'url' ); ?>">Home</a><span> > </span><a class="bdactive" href="<?php echo site_url( '/'.$pagename.'/', 'http' ); ?>">Makesbridge Blog</a>       
      </div><!-- Breadcrums  -->
      <div class="col-xs-12 col-md-8 ">
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
     'showposts' =>  '4',
     'tax_query' => array(
    array(
      'taxonomy' => 'topics-category',
      'field' => 'slug',
      'terms' => 'all'
    )
  )
   );
  $blogs = get_posts($args); 
  
  ?>
         <div id="news-blog-posts" class="nw-blog-posts">
                   

  <?php
  
    if(count($blogs) > 0):
       
      foreach($blogs as $blog)
      {

        ?>
         <div class="mkspost-wrap">
        <?php $my_date = get_the_time('d-M-Y', $blog->ID);  ?>
          <h4 class="mksblog-date"><span><img src="http://www.makesbridge.com/wp-content/uploads/2014/10/calendar.png"></span><?php echo $my_date; ?></h4>
          <a href="<?php echo get_permalink( $blog->ID ); ?>"><h2><?php echo $blog->post_title; ?></h2></a>
          <p><?php echo $blog->post_excerpt; ?></p>
    
       </div>
           <?php }
    endif;
   ?>  </div>
        <div class="ajaxLoad"><button id="load_more" style="display:none;">Load More</button></div>
          
      </div><!-- Posts -->
      
      <div class="col-xs-6 col-md-4">
        <div class="category-container">
            <h2>Topics</h2>
              <ul>  
              
            <?php $terms = get_terms("topics-category"); 
                    foreach ( $terms as $term ) {
                        $term_link = get_term_link( $term, '' );
                        if( is_wp_error( $term_link ) )
                        continue; ?>
                      <?php $termlink = $term->taxonomy.'?topic='.$term->slug ;?>
               <li><i><img src="http://www.makesbridge.com/wp-content/uploads/2014/10/arrow.png"></i><a href="<?php echo site_url( $termlink, 'http' ); ?>"><?php echo $term->name; ?></a></li>  
           <?php 
                } 
                 
              ?>
            </ul>
          </div>
           <?php get_sidebar(); ?>
      </div><!-- Side bar -->
    </div>
        <div class="navigation">
      <?php paginate_comments_links(); ?> 
     </div>
</div>
</section>
<style type="text/css">
#leftbar div{
  height: 38px !important;
    width: 40px !important;
}
</style>
<script type="text/javascript">
  $(document).ready(function() { 
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
            if($('.mkspost-wrap').length == $('#total_records').val())
                $('#load_more').fadeOut();

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
