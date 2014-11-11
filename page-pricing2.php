<?php 

/* Template Name: Pricing2 */

get_header(); ?>

<script type="text/javascript" src="http://ajax.microsoft.com/ajax/jQuery/jquery-1.4.2.min.js"></script> 
<script language="javascript">
	$(document).ready(function() {			
		$('.lovedimg').css('top','54px');
		$('.packagebox').hover(function(){
			$('.packagebox').removeClass('packagebox-active');
			if($(this).attr('id') != 'pro')
				$('.lovedimg').css('top','64px');
			else
				$('.lovedimg').css('top','54px');
			$(this).addClass('packagebox-active');				
		},function(){
			$(this).removeClass('packagebox-active');
			$('.lovedimg').css('top','64px');
		});
		$('.packagebox').click(function(){
			//alert('aaaa');
			$('.packagebox').removeClass('packagebox-active');
			/*if($(this).attr('id') == 'pro')
				$('.lovedimg').show();
			else
				$('.lovedimg').hide();*/
			$(this).addClass('packagebox-active');            
		});
	});
	function opendetail(pkgid)
	{
		$('#features').addClass(pkgid+'-det');
		return true;
		//window.location = 'http://thisweek.makesbridge.com/pricing#features';
	}
</script>
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script> 
<script src="<?php echo get_template_directory_uri(); ?>/js/main.js" type="text/javascript"></script>
<script type="text/javascript">
		  $(document).ready(function(){		
			$(window).on('scroll',function() {
			  var scrolltop = $(this).scrollTop();
		  
			  if(scrolltop >= 2215) {
				$('#fixedtablehead').fadeIn(250);
			  }
			  
			  else if(scrolltop <= 2210) {
				$('#fixedtablehead').fadeOut(250);
			  }
			});
		  });
	  </script>
<div id="pricing_page">
  <?php
    /*if(have_posts()): 
	while(have_posts()) :
	the_post();
	$background_image = get_field('bann_backimage');
	$top_image = get_field('bann_topimage');	*/
	?>
  <div class="topbanner pricing_topbanner">
    <div class="free-signup-wrap">
      <div class="main_wrap free-signup"> <img src="<?php echo get_template_directory_uri(); ?>/images/signup-banner.png" /> <a class="top_button sign_up sign_up_free" href="#" onclick="showsupop();">Click here to sign up</a> </div>
    </div>
    <div class="monthly-billing-wrap" style="background:#F7F9FB;">
      <div class="monthly-wrap monthly-billing">
        <?php //the_field('bann_desc'); ?>
      </div>
    </div>
  </div>
  <?php
	/*endwhile;
    endif;*/	
    $price = get_post(48); 
    echo $price->post_content;          
	?>
  
  
  
</div>
<?php get_footer(); ?>
