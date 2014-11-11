<?php 

/* Template Name: Offers */

get_header(); ?>

<?php
  if(have_posts()): 
  while(have_posts()) :
  the_post();
  $background_image = get_field('bann_backimage');
  ?>
<div class="topbanner offers_topbanner" style="background:url(<?php echo $background_image["url"]; ?>) no-repeat 50% 0">
  <div class="banncontent">
	<h1>
	  <?php the_field('bann_head'); ?>
	</h1>
    <h2>
        <?php the_field('bann_subhead'); ?>
      </h2>
	<div class="subscribeform">
    	<div class="clear"></div>
          <div class="offnamebg" style="position:relative; float:left;"><input type="text"  id="offer_name" placeholder="Your Name" >
          	<span id="offname_erroricon" class="erroricon" data-placement="right" data-trigger="hover" data-toggle="popover" style="right:-15px;"></span>
          </div>          
          <div class="offemailbg" style="position:relative; float:left;"><input type="text"  id="offer_email" placeholder="Your Work Email">
          	<span id="offemail_erroricon" class="erroricon" data-placement="right" data-trigger="hover" data-toggle="popover" style="right:-15px;"></span>
          </div>          
          <div class="offphonebg" style="position:relative; float:left;"><input type="text"  id="offer_phone" placeholder="Phone Number">
          	<span id="offphone_erroricon" class="erroricon" data-placement="right" data-trigger="hover" data-toggle="popover" style="right:-15px;"></span>
          </div>
          <input type="hidden" name="off_source" id="off_source" value="offer inquiry" />
          <input type="hidden" name="page" id="page" value="<?php echo $post->post_name; ?>" />
          <button class="submit" id="offer_button" onclick="validateOfferForm();">Receive Details</button>
	  	<div class="clear"></div>
	</div>
  </div>
</div>
<?php
  the_content();
  endwhile;
  endif;
  ?>  
<?php get_footer(); ?>
