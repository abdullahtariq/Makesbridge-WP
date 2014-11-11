<?php
/**
 * Loop Add to Cart
 */
 
global $product; 

if( $product->get_price() === '' && $product->product_type != 'external' ) return;
?>

<?php if ( ! $product->is_in_stock() ) : ?>
		
	<a href="<?php echo get_permalink($product->id); ?>" class="button"><?php echo apply_filters('out_of_stock_add_to_cart_text', __('Read More', 'woocommerce')); ?></a>

<?php else : ?>
	
	<?php 
	
		switch ( $product->product_type ) {
			case "variable" :
				$link 	= get_permalink($product->id);
				$label 	= apply_filters('variable_add_to_cart_text', __('Select options', 'woocommerce'));
			break;
			case "grouped" :
				$link 	= get_permalink($product->id);
				$label 	= apply_filters('grouped_add_to_cart_text', __('View options', 'woocommerce'));
			break;
			case "external" :
				$link 	= get_permalink($product->id);
				$label 	= apply_filters('external_add_to_cart_text', __('Read More', 'woocommerce'));
			break;
			default :
				$link 	= esc_url( $product->add_to_cart_url() );
				$terms = wp_get_post_terms( $product->id, 'product_cat');
				if($terms[0]->slug == 'packages')
					$label 	= apply_filters('add_to_cart_text', __('Subscribe', 'woocommerce'));
				else
					$label 	= apply_filters('add_to_cart_text', __('Add to Cart', 'woocommerce'));
			break;
		}
	
		printf('<div class="package-buttons"><a href="%s" rel="nofollow" data-product_id="%s" class="button add_to_cart_button product_type_%s">%s</a></div>', $link, $product->id, $product->product_type, $label);

	?>

<?php endif; ?>