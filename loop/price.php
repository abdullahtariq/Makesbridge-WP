<?php
/**
 * Loop Price
 */

global $product;
?>
<?php if ($price_html = $product->get_price_html()) : ?>

<div class="package-price">
  <div class='package-price-container' style="<?php echo $pcw; ?>">
    <div class="clear"></div>
    <sup class="pkgprice">$</sup>
    <h3 class="price"><b><?php echo $product->price; ?></b></h3>
    <sub class="pkgperiod">/mo</sub>
    <div class="clear"></div>
  </div>
</div>
<?php endif; ?>
