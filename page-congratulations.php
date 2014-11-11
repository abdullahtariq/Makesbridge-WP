<?php 
ob_start();
if($_REQUEST['add-to-cart'])
	header('location: '. get_option('siteurl') .'/cart');
if(empty($_POST['fname']) && empty($_POST['fname2']))	
	header('location: '. get_option('siteurl'));
/* Template Name: Congratulations */

get_header(); ?>

<div id="congratus_page">
  <div class="topbanner congratus_topbanner">
    <h1>Congratulations<span style="margin-right:0;"><?php 
	if(!empty($_POST['fname'])) { echo ' ' . $_POST['fname'] . ' ' . $_POST['lname']; } 
	elseif(!empty($_POST['fname2'])) { echo ' ' . $_POST['fname2'] . ' ' . $_POST['lname2']; } 
	?></span>!</h1>
  </div>
  <div class="main" >
    <div class="main_wrap">
      <div class="congratu_content">
        <div class="clear"></div>
        <div style="float:right"> 
        	<a class="subscribe" href="<?php bloginfo('url'); ?>/congratulations?add-to-cart=1110">
            <img src="<?php bloginfo('stylesheet_directory'); ?>/images/discount-offer.png" width="248" height="200" style="border:0;" />
			</a>
          	<div class="valid">* Not valid with other offers. <a href="javascript:void(0);" onclick="showtospop('termspop');">Terms of Use</a></div>
            <a target="_blank" href="<?php bloginfo('url'); ?>/wp-content/plugins/kalins-pdf-creation-station/kalins_pdf_create.php?singlepost=pg_374"><div class="downloadpdf">Download this page as pdf</div></a>
        </div>
        <div style="float:left">
          <?php
		  if(have_posts()): 
			  while(have_posts()) :
				  the_post();
				  	the_content(); 
				endwhile;
			endif;
			?>
        </div>
        <div class="clear"></div>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>