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
					$sftop = 'style="margin-top: 192px;"';
					$acc = '';
					$lovimg = 'display:none';
					$boxid = 'mini';
					$oldp = '';
				  }
				elseif($woocommerce_loop['loop']==2)
				{
					$pcw = 'width:130px; padding:0 0 0 10px;';
					$pc = '#F8B916';
					$sftop = 'style="margin-top: 132px;"';
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
					$sftop = 'style="margin-top: 72px;"';
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
?>
<img class="lovedimg" src="<?php echo get_template_directory_uri(); ?>/images/most-loved.png" width="119" height="28" alt="" style="<?php echo $lovimg; ?>" />              
<li <?php post_class( $classes ); ?> id="<?php echo $boxid; ?>">

	<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>

	<div class="packagebox-head">
            <h2><?php the_title(); ?></h2>
          </div>
          <div class="packagebox-subhead"> <?php echo $post->post_content; ?> </div>
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
                      if($woocommerce_loop['loop'] > 1)
					  {
					  ?>
            <h3>Everything in <span style="color:<?php echo $pc; ?>">MKS <?php echo $oldp; ?></span></h3>
            <img alt="" class="package_plus" src="<?php echo get_template_directory_uri(); ?>/images/package-plus.png" width="16" height="16" style="border:0;" />
            <?php
					  }
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