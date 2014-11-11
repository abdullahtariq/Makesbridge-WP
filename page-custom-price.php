<?php 

/* Template Name: Custom Price  */
session_start();
?>

<?php 
$customprdID = get_field('custom_product_id');
$price = $_POST['cartPrice'];
$details = $_POST['cartDetails'];

$cartUC = $_POST['cartUC'];
$cartEs = $_POST['cartEs'];
$cartNA = $_POST['cartNA'];
$_SESSION['customprice'] = $price;  
$_SESSION['cartDetails'] = $details;  
$_SESSION['product_id'] = $customprdID;

 $_SESSION['cartUC'] = $cartUC;
 $_SESSION['cartEs'] = $cartEs;
 $_SESSION['cartNA'] = $cartNA;
$url = get_site_url()."/product-category/packages?add-to-cart=".$customprdID;

//echo $_SESSION['customprice'] . " ".$customprdID ."<br> url :" .$url;
//echo $_SESSION['cartDetails'];

header("Location:".$url);

/*global $woocommerce;
foreach ( $woocommerce->cart->get_cart() as $cart_item_key => $cart_item ) {
    echo $cart_item_key;
} */
//$woocommerce->cart->set_quantity($cart_item_key, '1');

?>


 