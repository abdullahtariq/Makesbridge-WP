<?php  
get_header();?>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/styles_a.css" media="screen" />
<section class="mksblog">
<div class="container-fluid">
  <div class="row">
    <div class="mksblog-heading"><h1>Makes Bridge</h1></div>
  </div>
</div>
<div class="container">
    <div class="row">
      <div  class="breadCrum">
      	 <a href="<?php bloginfo( 'url' ); ?>">Home</a><span> > </span><a href="<?php echo site_url( '/blog/', 'http' ); ?>">Makesbridge Blog</a><span> > </span><a class="bdactive" href="<?php echo get_permalink( $blog->ID ); ?>"><?php the_title(); ?></a>
      </div><!-- Breadcrums  -->
      <div class="col-xs-12 col-md-8">
      	 <?php if (have_posts()) : while (have_posts()) : the_post(); ?> 
         <div class="mkspost-wrap">
        <?php $my_date = get_the_date( 'd-M-Y' );?>
          <h4 class="mksblog-date"><span><img src="http://www.makesbridge.com/wp-content/uploads/2014/10/calendar.png"></span><?php echo $my_date; ?></h4>
          <h2><?php the_title(); ?></h2>
          <p><?php the_content('Read more...'); ?></p>
      </div>
          <?php endwhile; ?>
<?php else : ?>
              
              
       		<?php endif; ?>
      </div><!-- Posts -->
      <div class="col-xs-6 col-md-4">
        <div class="category-container">
            <?php //get_sidebar();?>
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
</div>
	        

     
       
     
</section>

<style type="text/css">
#leftbar div{
  height: 38px !important;
    width: 40px !important;
}
</style>



<?php get_footer(); ?>