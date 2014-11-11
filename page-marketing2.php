<?php 

/* Template Name: Marketing2 */

get_header(); ?>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/styles_a.css" media="screen" />
 <script src="<?php echo get_template_directory_uri(); ?>/js/scrollToggle.js"></script>
<div id="marketing_page">
  <?php
    if(have_posts()): 
	while(have_posts()) :
	the_post();
	$background_image = get_field('bann_backimage');
	$top_image = get_field('bann_topimage');	
	?>
  <div class="topbanner market_topbanner" style="background:url(<?php echo $background_image["url"]; ?>) no-repeat 50% 0 / cover">
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
  <section class="mee-section">

   <?php
        $market_conn = get_post(2876); 
    global $post;
    setup_postdata($market_conn);
    the_content();
    ?>
 
</section>
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
<style type="text/css">
  .forminputbg {
    height: 26px;
}
</style>
<script type="text/javascript">
  $(document).ready(function(){
          var previousGif;
          var previousImage;
          /*======================
          Drop Content
          ========================*/
          var myScroller = new ScrollToggle($('#dragDrop').position().top, function () {
              /*previousGif = $('#dragDrop');
              previousImage = 'http://www.makesbridge.com/wp-content/uploads/2014/09/Content-Block.png';
              */console.log("dragDrop Element has been reached.");
              $('.dragDropPng').hide();
              $('.dragDropGif').show();
              $('.dragDropGif').attr('src','http://www.makesbridge.com/wp-content/uploads/2014/09/Content-Block.gif');

      }, function () {
              $('.dragDropGif').hide();
          $('.dragDropPng').show();
          //console.log("Drag& Drop Element is gone.");
          // $('#dragDrop').find('img').attr('src','http://www.makesbridge.com/wp-content/uploads/2014/09/Content-Block.png');
      });
          /*======================
          Styling Content
          ========================*/
          var myScroller = new ScrollToggle($('#featureStyling').position().top, function () {
          // previousGif.find('img').attr('src',previousImage);
            $('.dragDropGif').hide();
            $('.dragDropPng').show();
            $('.stylingPng').hide();
            $('.stylingGif').show();
            $('.stylingGif').attr('src','http://www.makesbridge.com/wp-content/uploads/2014/09/styling.gif');
             //previousGif = $('#featureStyling');
            //  previousImage = 'http://www.makesbridge.com/wp-content/uploads/2014/09/styling.gif';
         // console.log("featureStyling Element has been reached."  + $(this));
      }, function () {
          $('.stylingGif').hide();
          $('.stylingPng').show();
         // console.log("featureStyling Element is gone.");
         
          //$('#featureStyling').find('img').attr('src','http://www.makesbridge.com/wp-content/uploads/2014/09/styling.png');
});
        /*======================
          My building Blocks Content
          ========================*/
          var myScroller = new ScrollToggle($('#myBuildingBlock').position().top, function () {
          // previousGif.find('img').attr('src',previousImage);
            $('.stylingGif').hide();
            $('.stylingPng').show();
            $('.myBuildingBlockPng').hide();
            $('.myBuildingBlockGif').show();
            $('.myBuildingBlockGif').attr('src','http://www.makesbridge.com/wp-content/uploads/2014/09/myBuildingBlock.gif');
             //previousGif = $('#featureStyling');
            //  previousImage = 'http://www.makesbridge.com/wp-content/uploads/2014/09/styling.gif';
        //  console.log("featureStyling Element has been reached."  + $(this));
      }, function () {
          $('.myBuildingBlockGif').hide();
          $('.myBuildingBlockPng').show();
        //  console.log("featureStyling Element is gone.");
         
          //$('#featureStyling').find('img').attr('src','http://www.makesbridge.com/wp-content/uploads/2014/09/styling.png');
});
          /*======================
         Link Creation
          ========================*/
          var myScroller = new ScrollToggle($('#linkCreation').position().top, function () {
          // previousGif.find('img').attr('src',previousImage);
            $('.myBuildingBlockGif').hide();
            $('.myBuildingBlockPng').show();
            $('.linkCreationPng').hide();
            $('.linkCreationGif').show();
            $('.linkCreationGif').attr('src','http://www.makesbridge.com/wp-content/uploads/2014/09/Link.gif');
        //  console.log("featureStyling Element has been reached."  + $(this));
      }, function () {
          $('.linkCreationGif').hide();
          $('.linkCreationPng').show();
       //   console.log("featureStyling Element is gone.");
});
        /*======================
           D-C-I
          ========================*/
          var myScroller = new ScrollToggle($('#DCI').position().top, function () {
          // previousGif.find('img').attr('src',previousImage);
            $('.myBuildingBlockGif').hide();
            $('.myBuildingBlockPng').show();
            $('.DCIPng').hide();
            $('.DCIGif').show();

           // $('.DCIGif').attr('src','http://www.makesbridge.com/wp-content/uploads/2014/10/newDCI-t.gif');
          console.log("DCI Element has been reached."  + $(this));
      }, function () {
          $('.DCIGif').hide();
          $('.DCIPng').show();
         // console.log("DCI Element is gone.");
});
    /*$('.mee-single-feature').hover(function(event){
        removeGifs();
        var currentTarget = $(event.target);
       if($(this).attr('class')==='mee-single-feature'){
          console.log($(this).attr('id'));
       }
        else{
           console.log($(this).parents('div.mee-single-feature').attr('id'));
        }
    })
    function removeGifs(){
         $('.mee-single-feature').each(function(key,val){
          
      })
    }
    function addGif(id){}*/
  })
  function showsupop(popid,n)
    {
      $('#video_frame').hide();
      $('.signuppop').css('display','none');
      $('.fancybox-overlay').css('display','block');        
      $('#'+popid).css('display','block');        
      if(n=='2')
      {
        $('.goback').css('display','block');
        $('.fancybox-wrap').css('margin-left','-480px');
        $('.fancybox-inner').append($('#termspop'));
      }
      else if(n=='3')
      {
        $('.goback').css('display','none');
        $('.fancybox-wrap').css('margin-left','-480px');
        $('.fancybox-inner').append($('#terms2pop'));
      }
      else
      {
        $('.fancybox-wrap').css('margin-left','-400px');
        $('.fancybox-inner').append($('#signup_now'));
      }
      //alert($('#email1').val());
      if($('#email1'))
        $('#accForm #email').val($('#email1').val());
      if($('#crms'))
        $('#frmFld_CRM_Tool').val($('#crms').val());
      $('#accForm #source').val('trial - SFLP');
      return false;
    }
</script>
<!--<div id="services" class="services">
  <div class="main_wrap">
    <?php //$market_conn = get_post(99); ?>
    <h2><?php //echo $market_conn->post_title; ?></h2>
    <?php //echo $market_conn->post_content; ?> 
  </div>
</div>-->
</div>
<?php get_footer(); ?>
