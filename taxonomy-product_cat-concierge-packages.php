<?php 
get_header(); ?>
<script type="text/javascript" src="http://ajax.microsoft.com/ajax/jQuery/jquery-1.4.2.min.js"></script> 
<script language="javascript">
	$(document).ready(function() {			
		$('.lovedimg').css('top','-38px');
		$('.packagebox').hover(function(){
			$('.packagebox').removeClass('packagebox-active');
			if($(this).attr('id') != 'pro')
				$('.lovedimg').css('top','-38px');
			else
				$('.lovedimg').css('top','-28px');
			$(this).addClass('packagebox-active');				
		},function(){
			$(this).removeClass('packagebox-active');
			$('.lovedimg').css('top','-38px');
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
  <div class="topbanner concierge_topbanner">
  	<div class="banncontent">
    	<!--<h2 class="concrg_pkg_sel" style="margin-bottom:30px;">You can now choose a Concierge service package or proceed to <a href="http://thisweek.makesbridge.com/cart">Checkout</a></h2>
    	<h1>Concierge Service Packages</h1>
    	<h2>Monthly billing, no contracts. Because we know our clients don't want to go anywhere else.</h2>-->
        <?php //the_field('bann_desc'); 
		$term = $wp_query->queried_object;
		echo $term->description;
		?>
    </div>
  </div>
  <div class="main" >
    <div class="main_wrap">    	
      <div class="packages">
        <h1>Choose a package that suits your needs.</h1> 
        <div class="clear"></div>
        <div class="shareprpage" style="margin-bottom:20px;">
            <div class="clear"></div>
            <img width="19" height="17" style="border:0;" alt="" src="<?php echo get_template_directory_uri(); ?>/images/dir-arrow.png" class="dirarrow">
            <a title="Email this page" class="sharelink" href="mailto:">Share this page</a>
            <a title="Print" class="print" href="#"><img width="18" height="18" style="border:0" alt="" src="<?php echo get_template_directory_uri(); ?>/images/print-icon.png"></a>
            <a title="Save as PDF" class="download" target="_blank" href="<?php bloginfo('url'); ?>/wp-content/plugins/kalins-pdf-creation-station/kalins_pdf_create.php?singlepost=pg_48"><img width="16" height="18" style="border:0" alt="" src="<?php echo get_template_directory_uri(); ?>/images/download-icon.png"></a>            
            <div class="clear"></div>
        </div> 
        <div class="clear"></div> 

<?php if ( have_posts() ) : ?>

				<?php do_action('woocommerce_before_shop_loop'); ?>

				<?php woocommerce_product_loop_start(); ?>

					<?php woocommerce_product_subcategories(); ?>

					<?php while ( have_posts() ) : the_post(); ?>
                     <?php //$terms = wp_get_post_terms( $post->ID, 'product_cat' ); 
					 //print_r($terms[0]->slug);
					 ?> 

						<?php //wc_get_template_part( 'content', 'product' ); ?>
                        <?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */
//echo 'hello';
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $product, $woocommerce_loop;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) )
	$woocommerce_loop['loop'] = 0;

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) )
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );

// Ensure visibility
if ( ! $product || ! $product->is_visible() )
	return;
$i=1;
// Increase loop count
$woocommerce_loop['loop']++;
//echo $woocommerce_loop['loop'];
$acc = '';
				  if($woocommerce_loop['loop']==1)
				  {
					$pcw = 'width:130px; padding:0 0 0 10px;';
					$sftop = 'style="margin-top: 250px;"';
					$acc = '';
					$lovimg = 'display:none';
					$boxid = 'mini';
					$oldp = '';
				  }
				elseif($woocommerce_loop['loop']==2)
				{
					$pcw = 'width:130px; padding:0 0 0 10px;';
					$pc = '#F8B916';
					$sftop = 'style="margin-top: 160px;"';
					$acc = '';
					$lovimg = 'display:none'; 
					$boxid = 'smb';
					$oldp = 'Mini';
				}
				elseif($woocommerce_loop['loop']==3)
				{
					$pcw = 'width:154px; padding:0 0 0 10px;';
					$pc = '#FC721F';
					$sftop = 'style="margin-top: 102px;"';
					$acc = 'packagebox-active';
					$lovimg = 'display:block';
					$boxid = 'pro';
					$oldp = 'SMB';
				}
				elseif($woocommerce_loop['loop']==4)
				{
					$pcw = 'width:166px; padding:0 0 0 10px;';
					$pc = '#F1526D';
					$sftop = 'style="margin-top: 43px;"';
					$acc = '';
					$lovimg = 'display:none';
					$boxid = 'ent';
					$oldp = 'PRO';
				}
				elseif($woocommerce_loop['loop']==5)
				{
					$pcw = 'width:176px;padding:0 5px;';
					$pc = '#CB65E9';
					$sftop = '';	
					$acc = '';
					$lovimg = 'display:none';
					$boxid = 'eng';
					$oldp = 'Ent';
				}
// Extra post classes
$classes = array();
/*if ( 0 == ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns'] )*/
	$classes[] = 'first packagebox ' . $acc;
/*if ( 0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns'] )
	$classes[] = 'last packagebox ' . $acc;*/
	/*echo '<pre>';
	print_r($product);
	echo '</pre>';*/

$main_features[] = explode('],[',$post->post_content);
//print_r($main_features);
			
?>
<li <?php post_class( $classes ); ?> id="<?php echo $boxid; ?>">

	<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>

	<div class="packagebox-head">
            <h2><?php the_title(); ?></h2>
          </div>
          <div class="packagebox-subhead"> <?php echo $post->post_excerpt; ?> </div>
<div class="package-price">
  <div class='package-price-container' style="<?php echo $pcw; ?>">
    <div class="clear"></div>
    <sup class="pkgprice">$</sup>
    <h3> <?php echo $product->price; ?> </h3>
    <sub class="pkgperiod">/mo</sub>
    <div class="clear"></div>
  </div>
</div>
          <div class="package-textwidget">
            <h2><?php echo get_field("number_of_emails",$post->ID); ?> <span>emails/mo.</span></h2>           
            <?php
					  $featrs = get_post_meta("features",$post->ID,true);
                      $features = explode(',',get_field("features",$package->ID));
					  if($features)
					  {
						  foreach($features as $feature)
						  {
					  ?>
            <h3><?php echo $feature; ?></h3>
            <?php
						  }
					  }
						?>
          </div>
          <div class="package-salesforce" <?php echo $sftop; ?>> <a href="#features" onclick="return opendetail('<?php echo $boxid; ?>')">
            <h2>See Feature Details</h2>
            </a> </div>
          <div class="package-buttons">
          <?php do_action('woocommerce_after_shop_loop_item'); ?>
          	<!--<a class="button add_to_cart_button product_type_simple" data-product_id="224" rel="nofollow" href="/full-service-solutions/concierge-services?add-to-cart=224">Buy Now</a>-->
            <?php
            //printf('<a href="%s" rel="nofollow" data-product_id="%s" class="button add_to_cart_button product_type_%s">%s</a>', $link, $post->id, $post->product_type, 'Order Now');
			?>
            <!--<button>Order Now</button>-->
          </div>
       
</li>


					<?php endwhile; // end of the loop. ?>

				<?php woocommerce_product_loop_end(); ?>

				<?php do_action('woocommerce_after_shop_loop'); ?>

			<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

				<?php wc_get_template( 'loop/no-products-found.php' ); ?>

			<?php endif;?>
	<div class="clear"></div>
      </div>
    </div>
  </div>  
  <div class="main">
    <div class="main_wrap">      
      <div class="stories" style="margin-top:130px;">
        <div class="subs-wrap">
          <h2>Concierge FAQs</h2>
        </div>
        <div class="columns">
          <ul style="float:left">
            <?php
			$faqs = get_posts(array(
              'post_type' => 'faqs',
			  'post_status' => 'publish',
              'orderby' => 'post_date',
              'order' =>  'ASC',
			  'showposts' =>  '10000',
              'taxonomy' => 'faq-categories',
              'term'  => 'concierge'
              ));
                    //$faqs = get_posts('post_type=faqs&post_status=publish&showposts=1000&orderby=post_date&order=asc');
					if($faqs)
					{
						$i=1;
						if(count($faqs) % 2 == 0)
							$half = count($faqs) / 2;
						else
							$half = (floor(count($faqs) / 2)) + 1;
						//echo $half;
						foreach($faqs as $faq)
						{
						?>
            <li class="faq-wrap"> <a href='#'><span><?php echo $faq->post_title; ?></span></a>
              <ul>
                <li> <?php echo get_field('answer',$faq->ID); ?> </li>
              </ul>
            </li>
            <?php						
						if($half == $i)
						{
							?>
          </ul>
          <ul style="float:left; margin-left:10px;">
            <?php
						}
						$i++;
						}
					}
					?>
          </ul>
          <div class="clear"></div>
        </div>
      </div>      
      <div id="features" class="features">
        <h2>Features Comparison</h2>       
        <div class="shareprpage">
            <div class="clear"></div>
            <img class="dirarrow" src="<?php echo get_template_directory_uri(); ?>/images/dir-arrow.png" width="19" height="17" alt="" style="border:0;" />
            <a href="mailto:" class="sharelink" title="Email this page">Share this page</a>
            <a href="#" class="print" title="Print"><img src="<?php echo get_template_directory_uri(); ?>/images/print-icon.png" width="18" height="18" alt="" style="border:0" /></a>
            <a href="#" class="download" title="Save as PDF"><img src="<?php echo get_template_directory_uri(); ?>/images/download-icon.png" width="16" height="18" alt="" style="border:0" /></a>
            <div class="clear"></div>
        </div>
        <div class="featurestable">
          <div id="fixedtablehead">
              <div class="clear"></div>
              <div class="featurehead"> Features </div>
              <div class="pkghead pkgmini"> Mini </div>
              <div class="pkghead pkgsmb"> SMB </div>
              <div class="pkghead pkgpro"> PRO </div>
              <div class="pkghead pkgenp"> Enterprise </div>
              <div class="pkghead pkgeng"> Engage </div>
              <div class="clear"></div>
          </div>
          <div id="featstablehead">
              <div class="clear"></div>
              <div class="featurehead"> Features </div>
              <div class="pkghead pkgmini"> Mini </div>
              <div class="pkghead pkgsmb"> SMB </div>
              <div class="pkghead pkgpro"> PRO </div>
              <div class="pkghead pkgenp"> Enterprise </div>
              <div class="pkghead pkgeng"> Engage </div>
              <div class="clear"></div>
          </div>
          <div class="featurecol"> 
          	<?php            
			$main_feature = $main_features[0];
			if($main_feature)
			{
				foreach($main_feature as $sub_feature)
				{
					$sf = str_replace('[','',$sub_feature);
					$sf = str_replace(']','',$sf);
					$feature_names = explode(',',$sf);
					if($feature_names)
					{
						$i=1;
						echo '<ul>';							
						foreach($feature_names as $feature_name)
						{
							$keyvals = explode('=',$feature_name);
							$val1 = trim($keyvals[1]);
							//echo $keyvals[1] == 'yes' || $keyvals[1] == 'no';
							if($val1 == 'h')
								echo '<h3>'. $keyvals[0] .'</h3>';
							elseif($val1 == 'sh')
								echo '<h4>'. $keyvals[0] .'</h4>';
							elseif($val1 == 'yes' || $val1 == 'no')
							{									
								echo '<li><p>'. $keyvals[0] .'</p></li>';
							}
							//print ($keyvals[1] == 'no');
							//$i++;
						}
						echo '</ul>';
					}
				}
			}			
			?>            
          </div>
          <div class="pkgcol pkgminicol">
          	<?php
            $main_feature = $main_features[0];
			if($main_feature)
			{
				foreach($main_feature as $sub_feature)
				{
					$sf = str_replace('[','',$sub_feature);
					$sf = str_replace(']','',$sf);
					$feature_names = explode(',',$sf);
					if($feature_names)
					{
						//$i=1;
						echo '<ul>';
						for($i=0;$i<count($feature_names);$i++)
						{
							$feature_name = $feature_names[$i];
							$keyvals = explode('=',$feature_name);
							$val1 = trim($keyvals[1]);
							if($val1 == 'h')
								echo '<h3>&nbsp;</h3>';
							elseif($val1 == 'shv')
								echo '<h4>'. $keyvals[0] .'</h4>';
							elseif($val1 == 'yes' || $val1 == 'no')
							{
								if($val1 == 'yes')
									echo '<li class="noempty"></li>';
								elseif($val1 == 'no')
									echo '<li>&nbsp;</li>';
							}							
						}
						echo '</ul>';
					}
				}
			}
			?>            
          </div>
          <div class="pkgcol pkgsmbcol">
          	<?php
            $main_feature = $main_features[1];
			if($main_feature)
			{
				foreach($main_feature as $sub_feature)
				{
					$sf = str_replace('[','',$sub_feature);
					$sf = str_replace(']','',$sf);
					$feature_names = explode(',',$sf);
					if($feature_names)
					{
						//$i=1;
						echo '<ul>';
						for($i=0;$i<count($feature_names);$i++)
						{
							$feature_name = $feature_names[$i];
							$keyvals = explode('=',$feature_name);
							$val1 = trim($keyvals[1]);
							if($val1 == 'h')
								echo '<h3>&nbsp;</h3>';
							elseif($val1 == 'shv')
								echo '<h4>'. $keyvals[0] .'</h4>';
							elseif($val1 == 'yes' || $val1 == 'no')
							{
								if($val1 == 'yes')
									echo '<li class="noempty"></li>';
								elseif($val1 == 'no')
									echo '<li>&nbsp;</li>';
							}
						}
						echo '</ul>';
					}
				}
			}
			?>            
          </div>
          <div class="pkgcol pkgprocol">
          	<?php
            $main_feature = $main_features[2];
			if($main_feature)
			{
				foreach($main_feature as $sub_feature)
				{
					$sf = str_replace('[','',$sub_feature);
					$sf = str_replace(']','',$sf);
					$feature_names = explode(',',$sf);
					if($feature_names)
					{
						$i=1;
						echo '<ul>';
						for($i=0;$i<count($feature_names);$i++)
						{
							$feature_name = $feature_names[$i];
							$keyvals = explode('=',$feature_name);
							$val1 = trim($keyvals[1]);
							if($val1 == 'h')
								echo '<h3>&nbsp;</h3>';
							elseif($val1 == 'shv')
								echo '<h4>'. $keyvals[0] .'</h4>';
							elseif($val1 == 'yes' || $val1 == 'no')
							{
								if($val1 == 'yes')
									echo '<li class="noempty"></li>';
								elseif($val1 == 'no')
									echo '<li>&nbsp;</li>';
							}
						}
						echo '</ul>';
					}
				}
			}
			?>            
          </div>
          <div class="pkgcol pkgenpcol">
          	<?php
            $main_feature = $main_features[3];
			if($main_feature)
			{
				foreach($main_feature as $sub_feature)
				{
					$sf = str_replace('[','',$sub_feature);
					$sf = str_replace(']','',$sf);
					$feature_names = explode(',',$sf);
					if($feature_names)
					{
						//$i=1;
						echo '<ul>';
						for($i=0;$i<count($feature_names);$i++)
						{
							$feature_name = $feature_names[$i];
							$keyvals = explode('=',$feature_name);
							$val1 = trim($keyvals[1]);
							if($val1 == 'h')
								echo '<h3>&nbsp;</h3>';
							elseif($val1 == 'shv')
								echo '<h4>'. $keyvals[0] .'</h4>';
							elseif($val1 == 'yes' || $val1 == 'no')
							{
								if($val1 == 'yes')
									echo '<li class="noempty"></li>';
								elseif($val1 == 'no')
									echo '<li>&nbsp;</li>';
							}
						}
						echo '</ul>';
					}
				}
			}
			?>            
          </div>
          <div class="pkgcol pkgengcol">
          	<?php
            $main_feature = $main_features[4];
			if($main_feature)
			{
				foreach($main_feature as $sub_feature)
				{
					$sf = str_replace('[','',$sub_feature);
					$sf = str_replace(']','',$sf);
					$feature_names = explode(',',$sf);
					if($feature_names)
					{
						$i=1;
						echo '<ul>';
						for($i=0;$i<count($feature_names);$i++)
						{
							$feature_name = $feature_names[$i];
							$keyvals = explode('=',$feature_name);
							$val1 = trim($keyvals[1]);
							if($val1 == 'h')
								echo '<h3>&nbsp;</h3>';
							elseif($val1 == 'shv')
								echo '<h4>'. $keyvals[0] .'</h4>';
							elseif($val1 == 'yes' || $val1 == 'no')
							{
								if($val1 == 'yes')
									echo '<li class="noempty"></li>';
								elseif($val1 == 'no')
									echo '<li>&nbsp;</li>';
							}
						}
						echo '</ul>';
					}
				}
			}
			?>            
          </div>
          <div class="clear"></div>
        </div>
      </div>
      <div style="text-align:center;"><img alt="" src="<?php echo get_template_directory_uri(); ?>/images/logos.png" width="184" height="59" style="margin:14px auto 10px; border:0;" /></div>
      <p class="integration">* All subscriptions natively integrate with <strong>Salesforce</strong> and supported by <strong>Netsuite</strong> and <strong>Bullhorn</strong>.</p>
    </div>
  </div>
</div>
<?php get_footer(); ?>