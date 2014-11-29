<?php 
get_header(); ?>
<script type="text/javascript" src="http://ajax.microsoft.com/ajax/jQuery/jquery-1.4.2.min.js"></script> 
<script language="javascript">
	$(document).ready(function() {			
		$('.lovedimg').css('top','-38px');
		$('.packagebox').hover(function(){
			$('.packagebox').removeClass('packagebox-active');
			if($(this).attr('id') != 'pro')
				$('.lovedimg').css('top','-28px');
			else
				$('.lovedimg').css('top','-38px');
			$(this).addClass('packagebox-active');				
		},function(){
			$(this).removeClass('packagebox-active');
			$('.lovedimg').css('top','-28px');
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
		  function toggleCartPops()
		  {			 
			  $('.woocommerce-message').css('display','none');
			  //$('.termslink').css('display','none');
			  $('#terms2pop').css('display','block');
			  $('.fancybox-wrap1').css('margin-left','-150px');
			  $('#terms2pop').css('height','420px');
			  $('#cartpop').append($('#terms2pop'));
			  $('.goback').css('display','block');
			  $('#cartpop').css('width','auto');
			  return false;
		  }
		  function togglePops1()
		  {
			  $('.woocommerce-message').css('display','block');
			  $('.fancybox-wrap1').css('margin-left','0px');
			  //$('.termslink').css('display','block');
			  $('#terms2pop').css('display','none');			  
			  $('.goback').css('display','none');
			  $('#cartpop').css('width','700px');
			  return false;
		  }
	  </script>
<script language="javascript">
	function generatePDF(objClass,formObj,taObjId)
	{
		$('.lovedimg').css('display','none');
		$('.package-price-container').css('padding-left','20px');
		$('.package-buttons a').attr('style','color: #FFFFFF;display: block;font-size: 14px;text-decoration: none;');
		$('.package-salesforce').attr('style','');
		var html = $('.'+objClass).html();		
		html = html.replace('<img class="lovedimg" width="119" height="28" style="display: none; top: -28px;" alt="" src="<?php bloginfo('stylesheet_directory'); ?>/images/most-loved.png">','');
		html = html.replace('<img class="lovedimg" width="119" height="28" style="display: block; top: -28px;" alt="" src="<?php bloginfo('stylesheet_directory'); ?>/images/most-loved.png">','');
		$('#'+taObjId).val('<div class="'+ objClass +'">' + html + '</div>');
		//alert($('#pkgs_html').val());
		$('#'+formObj).submit();
		return false;
	}
</script>
<div id="pricing_page">
  <?php
    /*if(have_posts()): 
	while(have_posts()) :
	the_post();
	$background_image = get_field('bann_backimage');
	$top_image = get_field('bann_topimage');	*/
	function checkNumber($val)
	{
		if(is_numeric($val))
			return number_format($val);
		else
			return $val;
	}
	?>
  <div class="topbanner pricing_topbanner">
    <div class="free-signup-wrap">
      <div class="main_wrap free-signup"> <img src="<?php echo get_template_directory_uri(); ?>/images/signup-banner.png" /> <a class="top_button sign_up sign_up_free" href="#" onclick="showsupop('signup_now','1');">Click here to sign up</a> </div>
    </div>
    <div class="monthly-billing-wrap" style="background:#F7F9FB;">
      <div class="monthly-wrap monthly-billing">
        <?php //the_field('bann_desc'); 
		$term = $wp_query->queried_object;
		echo $term->description;
		?>
        <!--Monthly billing, no contracts. Because we know our clients don't want to go anywhere else.-->
      </div>
    </div>
  </div>
  <?php
	/*endwhile;
    endif;*/
	?>
  
  <div class="main" >
    <div class="main_wrap">    	
      <div class="packages">
        <h1>Choose a package that suits your needs.</h1> 
        <div class="clear"></div>
        
        <div class="shareprpage" style="right:0;">
        	<form method="post" id="topdf1" name="topdf1" action="<?php echo get_template_directory_uri(); ?>/mpdf/pdfgen.php" onsubmit="return generatePDF('products1','topdf1','pkgs_html')">
                <div class="clear"></div>
                <img width="19" height="17" style="border:0;" alt="" src="<?php echo get_template_directory_uri(); ?>/images/dir-arrow.png" class="dirarrow">
                <a title="Email this page" class="sharelink" href="mailto:?subject=Makesbridge packages and prices&amp;body=<?php bloginfo('url'); ?>/product-category/packages">Share this page</a>
                <a class="print" href="javascript:void(0)" onclick="PrintElem('.products1')" onmouseout="hidepop('printhelppop');" onmouseover="showpop('printhelppop')"><img width="18" height="18" style="border:0" alt="" src="<?php echo get_template_directory_uri(); ?>/images/print-icon.png"></a>
                <!--<a title="Save as PDF" class="download" target="_blank" href="javascript:void(0);" onclick="generatePDF()"><img width="16" height="18" style="border:0" alt="" src="<?php echo get_template_directory_uri(); ?>/images/download-icon.png"></a>-->
                <input class="download" style="margin-left:10px;" type="image" name="gen_pdf" src="<?php echo get_template_directory_uri(); ?>/images/download-icon.png" width="16" height="18" />
                <div class="clear"></div>
                <textarea name="pkgs_html" id="pkgs_html" style="display:none;"></textarea>
            </form>
            <div class="dpmarketing" id="printhelppop">
            	<div class="menu_indicator"> </div>
                <div class="popcontent">
                	For optimal print results, please select the following options in the print settings dialog:<br /><br />
                    Layout:  Landscape<br />Margins:  None<br>Background colours and images:  Checked<br /><br />
                </div>
            </div>
        </div> 
        <div class="clear"></div> 

<?php if ( have_posts() ) : 

if($_REQUEST['add-to-cart'])
	$display = 'block';
else
	$display = 'none';
?>
<div class="fancybox-overlay1 fancybox-overlay-fixed1" style="width: auto; height: auto; background: none repeat scroll 0% 0% rgba(230, 239, 243, 0.9); display: <?php echo $display; ?>;">
  <div tabindex="-1" class="fancybox-wrap1 fancybox-desktop1 fancybox-type-inline1 fancybox-opened1" style="height: auto; position: absolute; top: 50%; left: 25%; margin-top:-270px; opacity: 1;">
    <div class="fancybox-skin1" style="padding: 0px; width: auto; height: auto;">
      <div class="fancybox-outer1">
        <div id="cartpop" class="fancybox-inner1" style="height: 540px; width:700px;">
        	<a class="goback" onClick="togglePops1()" style="margin:20px 0 0 20px;">&lt;&lt; Go Back</a>
            <div class="woocommerce-message">
                <?php do_action('woocommerce_before_shop_loop'); ?>                
                <h3>Awesome!</h3><p>By clicking the "Next Step" button below you confirm agreement with the <a href="javascript:void(0);" onclick="toggleCartPops();">Makesbridge Terms of Service</a>.<p> <a href="javascript:;" onclick="hidesupop2()">Cancel</a>&nbsp;&nbsp;&nbsp;&nbsp;<a class="nextlink" href="<?php bloginfo('url'); ?>/cart">Next Step</a><br><br>
            </div>
		</div>
      </div>
      <!--<a href="javascript:;" class="fancybox-item fancybox-close" title="Close" onclick="hidesupop()"></a></div>-->
  	</div>
  </div>
</div>
<!--<script type="text/javascript" src="http://jqueryjs.googlecode.com/files/jquery-1.3.1.min.js" > </script>--> 
<script type="text/javascript">

	function PrintElem(elem)
	{
		$('#ent .package-salesforce').attr('style','margin-top:64px;');
		$('.package-salesforce').css('display','none');
		$('.package-buttons').css('display','none');
		$('.pkgcol h4').css('font-size','12px');
		Popup($(elem).html());
	}

	function Popup(data) 
	{
		/*var mywindow = window.open('', 'my div', 'height=900,width=1100,scrollbars=yes,editable=yes');
		mywindow.document.write('<html><head><title>my div</title>');
		//mywindow.document.write('<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/css/style.css" media="screen" />');
		mywindow.document.write('<style type="text/css">.lovedimg2 { display:none; } </style>');
		mywindow.document.write('</head><body >');
		mywindow.document.write(data);
		mywindow.document.write('</body></html>');*/
				
		var WindowObject = window.open('', 'PrintWindow', 'width=1100,height=900,top=50,left=50,toolbars=no,scrollbars=yes,status=no,resizable=yes');
		WindowObject.document.writeln('<!DOCTYPE html>');
		WindowObject.document.writeln('<html><head><title></title>');
		WindowObject.document.writeln('<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/css/style.css" />');
		WindowObject.document.writeln('<style type="text/css">.lovedimg2 { display:none; } .pkghead { width:124px; } .pkgcol { width:128px; } .packagebox { width:188px; } </style>');
		WindowObject.document.writeln('</head><body>')
	
		WindowObject.document.writeln(data);
	
		WindowObject.document.writeln('</body></html>');
	
		WindowObject.document.close();
	
		WindowObject.focus();
		WindowObject.print();
		
		$('.package-salesforce').css('display','block');
		$('.package-buttons').css('display','block');
		$('.pkgcol h4').css('font-size','15px');
		
		WindowObject.close();
		return true;
	}

</script>
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
					$sftop = 'style="margin-top: 188px;"';
					$acc = '';
					$lovimg = 'display:none';
					$boxid = 'mini';
					$oldp = '';
				  }
				elseif($woocommerce_loop['loop']==2)
				{
					$pcw = 'width:130px; padding:0 0 0 10px;';
					$pc = '#F89916';
					$sftop = 'style="margin-top: 182px;"';
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
					$sftop = 'style="margin-top: 76px;"';
					$acc = '';
					$lovimg = 'display:none';
					$boxid = 'ent';
					$oldp = 'PRO';
				}
				elseif($woocommerce_loop['loop']==5)
				{
					$pcw = 'width:186px;padding:0px 0 0 5px;';
					$pc = '#CB65E9';
					$sftop = 'style="margin-top: 102px;"';	
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
$main_features[] = explode('],[',$post->post_content);
?>
<img class="lovedimg" src="<?php echo get_template_directory_uri(); ?>/images/most-loved.png" width="119" height="28" alt="" style="<?php echo $lovimg; ?>" />              
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
    <h3 class="price"><b><?php echo $product->price; ?></b></h3>
    <sub class="pkgperiod">/mo</sub>
    <div class="clear"></div>
  </div>
</div>
			<div style="text-align:center;"><sub class="pkgperiod" style="float:none; font-size:18px; top:0;"><?php 
			$licenses = get_post_meta($post->ID,'licenses',true);
			if($licenses == '1')
				$licText = 'Individual account';
			else
				$licText = 'Individual accounts';
			echo get_post_meta($post->ID,'licenses',true) . ' ' . $licText; ?></sub></div>
            <div style="text-align:center;"><sub class="pkgperiod" style="float:none; font-size:18px; top:10px;">
            	<?php echo get_post_meta($post->ID,'additional_seats',true); ?> per additional seat
            </sub></div>
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
      <div class="contactus"> <img alt="" class="chat_lady" style="border:0;" src="<?php echo get_template_directory_uri(); ?>/images/lady-photo.png" width="144" height="181" />
        <div class="topbar">
          <div class="clear"></div>
          <div class="content">
            <h3>Want to send more emails?</h3>
            <p><a href="<?php bloginfo('url'); ?>/request-demo">Click Here</a> to get a quote for your choice of email volume.</p>
          </div>
          <a href="<?php bloginfo('url'); ?>/request-demo" class="req_quote">Request Quote</a>
          <div class="clear"></div>
        </div>
        <div class="chatbar">
          <div class="clear"></div>
          <h3>Chat with Sales</h3>
          <div class="buttons"> <a href="https://server.iad.liveperson.net/hc/69791877/?cmd=file&file=visitorWantsToChat&site=69791877&byhref=1&imageUrl=https://server.iad.liveperson.net/hcp/Gallery/ChatButton-Gallery/English" target="_blank" class="chat_btn">Chat</a> <a href="#" class="freetrial_btn" onclick="showsupop('signup_now','1');">Free Trial</a> </div>
          <div class="clear"></div>
        </div>
      </div>
      <div class="stories">
        <div class="subs-wrap">
          <h2>Subscription FAQs</h2>
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
              'term'  => 'packages'
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
        	<form method="post" id="topdf2" name="topdf2" action="<?php echo get_template_directory_uri(); ?>/mpdf/pdfgen.php" 
            	onsubmit="return generatePDF('featurestable','topdf2','pkgs_html2')">
            <div class="clear"></div>
            <img class="dirarrow" src="<?php echo get_template_directory_uri(); ?>/images/dir-arrow.png" width="19" height="17" alt="" style="border:0;" />
            <a title="Email this page" class="sharelink" href="mailto:?subject=Makesbridge packages details&amp;body=<?php bloginfo('url'); ?>/product-category/packages">Share this page</a>
            <a href="javascript:void(0)" class="print" onclick="PrintElem('.featurestable')" onmouseout="hidepop('printhelppop2');" onmouseover="showpop('printhelppop2')"><img src="<?php echo get_template_directory_uri(); ?>/images/print-icon.png" width="18" height="18" alt="" style="border:0" /></a>
            <!--<a href="javascript:void(0)" class="download" title="Save as PDF" onclick="generatePDF()"><img src="<?php echo get_template_directory_uri(); ?>/images/download-icon.png" width="16" height="18" alt="" style="border:0" /></a>-->
            <input class="download" style="margin-left:10px;" type="image" name="gen_pdf" src="<?php echo get_template_directory_uri(); ?>/images/download-icon.png" width="16" height="18" />
            <div class="clear"></div>
            <textarea name="pkgs_html" id="pkgs_html2" style="display:none;"></textarea>
            <div class="clear"></div>
            </form>
            <div class="dpmarketing" id="printhelppop2">
            	<div class="menu_indicator"> </div>
                <div class="popcontent">
                	For optimal print results, please select the following options in the print settings dialog:<br /><br />
                    Layout:  Landscape<br />Margins:  None<br>Background colours and images:  Checked<br /><br />
                </div>
            </div>
        </div>
        <div class="featurestable">
        	<img class="lovedimg2" src="<?php echo get_template_directory_uri(); ?>/images/most-loved.png" width="119" height="28" alt="" />            
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
          <div id="featstablehead" style="display:block;">
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
								echo '<h4>'. checkNumber($keyvals[0]) .'</h4>';
							elseif($val1 == 'yes' || $val1 == 'no')
							{
								if($val1 == 'yes')
									echo '<li class="noempty"><img src="http://www.makesbridge.com/wp-content/themes/mksteam/images/yes-sign.png" width="17" height="13" /></li>';
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
								echo '<h4>'. checkNumber($keyvals[0]) .'</h4>';
							elseif($val1 == 'yes' || $val1 == 'no')
							{
								if($val1 == 'yes')
									echo '<li class="noempty"><img src="http://www.makesbridge.com/wp-content/themes/mksteam/images/yes-sign.png" width="17" height="13" /></li>';
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
								echo '<h4>'. checkNumber($keyvals[0]) .'</h4>';
							elseif($val1 == 'yes' || $val1 == 'no')
							{
								if($val1 == 'yes')
									echo '<li class="noempty"><img src="http://www.makesbridge.com/wp-content/themes/mksteam/images/yes-sign.png" width="17" height="13" /></li>';
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
								echo '<h4>'. checkNumber($keyvals[0]) .'</h4>';
							elseif($val1 == 'yes' || $val1 == 'no')
							{
								if($val1 == 'yes')
									echo '<li class="noempty"><img src="http://www.makesbridge.com/wp-content/themes/mksteam/images/yes-sign.png" width="17" height="13" /></li>';
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
								echo '<h4>'. checkNumber($keyvals[0]) .'</h4>';
							elseif($val1 == 'yes' || $val1 == 'no')
							{
								if($val1 == 'yes')
									echo '<li class="noempty"><img src="'. get_template_directory_uri() .'/images/yes-sign.png" width="17" height="13" /></li>';
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
      <p class="integration">* All subscriptions integrate with <strong>Salesforce</strong> and <strong>Netsuite</strong>.</p>
    </div>
  </div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('head').append('<meta content="Marketing automation packages, cheap marketing automation, marketing automation services, email marketing packages, online marketing packages, Makesbridge, Bridgemail System, marketing automation software, online marketing services" name="keywords">')
	})
</script>
<?php get_footer(); 
?>