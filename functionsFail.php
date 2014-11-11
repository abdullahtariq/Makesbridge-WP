<?php
/* Live Env*/
session_start();
function my_function_admin_bar(){ return false; }
add_filter( 'show_admin_bar' , 'my_function_admin_bar');

add_action('admin_menu','wphidenag');
function wphidenag() {
	remove_action( 'admin_notices', 'update_nag', 3 );
}

add_action('init', 'do_output_buffer');
function do_output_buffer() {
        ob_start();
}

add_theme_support( 'woocommerce' );
remove_action( 'woocommerce_show_page_title', 10);
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
/*add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);*/
/*-------------Custom Price-------------*/
add_action( 'woocommerce_before_calculate_totals', 'add_custom_price' );
function add_custom_price( $cart_object ) {
    $custom_price = $_SESSION['customprice']; // This will be your custome price  
    $target_product_id = $_SESSION['product_id'];
    foreach ( $cart_object->cart_contents as $key => $value ) {
        if ( $value['product_id'] == $target_product_id ) {
            add_action( 'woocommerce_product_title', 'add_custom_name' );
            $value['data']->price = $custom_price;
        }
    }
}


function add_custom_name( $title ) {
		if($title === 'Custom Package')
    			{return $_SESSION['cartDetails'];}
    	else return $title;
}
/* SIDEBARS */
if ( function_exists('register_sidebar') )

register_sidebar(array(
'name' => 'Home Boxes',
'before_widget' => '',
'after_widget' => '',
'before_title' => '',
'after_title' => '',
));
register_sidebar(array(
'name' => 'Aboutus Sidebar',
'before_widget' => '',
'after_widget' => '',
'before_title' => '',
'after_title' => '',
));

if ( function_exists('register_sidebar') )
register_sidebar(array('name'=>'Request Demo',
'before_widget' => '',
'after_widget' => '',
'before_title' => '<h4>',
'after_title' => '</h4>',
));
if ( function_exists('register_sidebar') )
register_sidebar(array('name'=>'Contact Sales',
'before_widget' => '',
'after_widget' => '',
'before_title' => '<h4>',
'after_title' => '</h4>',
));


/* CUSTOM MENUS */	

register_nav_menus( array(
	'primary' => __( 'Primary Navigation', '' ),
	'secondary' => __('Secondary Navigation', '')
) );

function fallbackmenu(){ ?>
			<div id="submenu">
				<ul><li> Go to Adminpanel > Appearance > Menus to create your menu. You should have WP 3.0+ version for custom menus to work.</li></ul>
			</div>
<?php }	


/* CUSTOM BACKGROUNDS */

add_custom_background();

/* CUSTOM EXCERPTS */
	
function wpe_excerptlength_aside($length) {
    return 25;
}
	
function wpe_excerptlength_archive($length) {
    return 60;
}
function wpe_excerptlength_index($length) {
    return 70;
}


/*Home More*/

function wpe_excerptlength_home($length) {
    return 12;	
}

function home_more($more) {
    return '';
}


/*Latest Update*/

function wpe_excerptlength_latest($length) {
    return 32;	
}

function latest_more($more) {
    return '';
}





/*Slider More*/

function wpe_excerptlength_slide($length) {
    return 27;
}

function slide_more($more) {
    return '';
}


function wpe_excerpt($length_callback='', $more_callback='') {
    global $post;
    if(function_exists($length_callback)){
        add_filter('excerpt_length', $length_callback);
    }
    if(function_exists($more_callback)){
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>'.$output.'</p>';
    echo $output;
}

function custom_the_excerpt($content, $length){	
	preg_match('/^\s*+(?:\S++\s*+){1,' .$length . '}/', $content, $matches);
	echo $matches[0];
}

/*KING*/
function king( $atts, $content = null ) {
	return '<div class="price" style="font-size: 30px; font-weight: bold; float: left; padding: 12px 17px 0px 0px; color: #0E0E0E;">'.$content.'</div>';
}
add_shortcode('price', 'king');
/*END KING e butang ni sa page or post na code [price]$37[/price] */



/* FEATURED THUMBNAILS */

if ( function_exists( 'add_theme_support' ) ) { // Added in 2.9
	add_theme_support( 'post-thumbnails' );
}

/* START GET THUMBNAIL URL */
/* jaybe.buntag@gmail.com*/

function get_image_url() {
$theImageSrc = wp_get_attachment_url(get_post_thumbnail_id($post_id));
global $blog_id;
if (isset($blog_id) && $blog_id > 0) {
    $imageParts = explode('/files/', $theImageSrc);
    if (isset($imageParts[1])) {
        $theImageSrc = '/blogs.dir/' . $blog_id . '/files/' . $imageParts[1];
    }
}
echo $theImageSrc;
}

/* END GET THUMBNAIL URL */


/* theme_contact_form */

function theme_contact_form($atts, $content = null) {
	
	return '	
		
		<div id="message"></div>
		<div id="note"></div>
	    <form action="'.get_bloginfo('template_url').'/lib/contact.php" method="post" class="form"  name="contactform" id="contactform">
			
			<div class="clearfix"> 
				<input type="text" name="name" id="name" value="'.__('Your Name','view').'" onblur="if (this.value == \'\'){this.value = \''.__('Your Name','view').'\'; }" onfocus="if (this.value == \''.__('Your Name','view').'\') {this.value = \'\';}"> 
				<input type="text" name="email" id="email" value="'.__('Your Email','view').'" onblur="if (this.value == \'\'){this.value = \''.__('Your Email','view').'\'; }" onfocus="if (this.value == \''.__('Your Email','view').'\') {this.value = \'\';}">
				<input type="text" name="subject" id="subject" value="'.__('Your Subject','view').'" class="inputtext" onblur="if (this.value == \'\'){this.value = \''.__('Your Subject','view').'\'; }" onfocus="if (this.value == \''.__('Your Subject','view').'\') {this.value = \'\';}">
			</div>
			<div class="clearfix"><textarea rows="10" cols="10" name="message" id="message" onblur="if (this.value == \'\'){this.value = \''.__('Your Message','view').'\'; }" onfocus="if (this.value == \''.__('Your Message','view').'\') {this.value = \'\';}">'.__('Your Message','view').'</textarea></div>
			<div id="submit_button"><input type="submit" name="submit" id="submit" value="'.__('Send Message &rarr;','view').'"></div>		
      </form>

		<script type="text/javascript">
			/*ajax form*/
			jQuery("#contactform").submit(function(){
				$("#submit").attr("disabled","disabled").after(\'<img src="'.get_template_directory_uri().'/images/ajax-loader.gif" class="loader" />\');
				var str = jQuery(this).serialize();

				jQuery("#note").hide(\'slow\');				
				
				jQuery.ajax({
					type: "POST",
					url: "'.get_template_directory_uri().'/lib/contact.php",
					data: str,
					success: function(msg){
						jQuery("#note").ajaxComplete(function(event, request, settings){
							if(msg == \'OK\') // Message Sent? Show the \'Thank You\' message and hide the form
							{
								result = \'<div class="notification_ok" style="margin:20px 0;"><h3>'.__('Your message has been submitted to us. Thank you.','view').'</h3></div>\';
								jQuery("#contactform").hide(\'slow\');
							} else {
								result = msg;
							}

							jQuery(this).html(result);
							jQuery(this).slideDown(\'slow\');

							$("#contactform img.loader").fadeOut("fast",function(){$(this).remove()});
							$("#submit").removeAttr("disabled");
						});
					}
				});
				return false;
			});
		</script>	  
	';
}
add_shortcode('contact-form','theme_contact_form');
	
	
	
/* PAGE NAVIGATION */


function getpagenavi(){
?>
<div id="navigation" class="clearfix">
<?php if(function_exists('wp_pagenavi')) : ?>
<?php wp_pagenavi() ?>
<?php else : ?>
        <div class="alignleft"><?php next_posts_link(__('&laquo; Older Entries','web2feeel')) ?></div>
        <div class="alignright"><?php previous_posts_link(__('Newer Entries &raquo;','web2feel')) ?></div>
        <div class="clear"></div>
<?php endif; ?>

</div>

<?php
}


/* Menu Walker */

class description_walker extends Walker_Nav_Menu
{
      function start_el(&$output, $item, $depth, $args)
      {
           global $wp_query;
           $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

           $class_names = $value = '';

           $classes = empty( $item->classes ) ? array() : (array) $item->classes;

           $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
           $class_names = ' class="'. esc_attr( $class_names ) . '"';

           $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

           $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
           $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
           $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
           $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

           $prepend = '<strong>';
           $append = '</strong>';
           $description  = ! empty( $item->description ) ? '<span class="menudescription">'.esc_attr( $item->description ).'</span>' : '';

           if($depth != 0)
           {
                     $description = $append = $prepend = "";
           }

            $item_output = $args->before;
            $item_output .= '<a'. $attributes .'>';
            $item_output .= $args->link_before .$prepend.apply_filters( 'the_title', $item->title, $item->ID ).$append;
            $item_output .= $description.$args->link_after;
            $item_output .= '</a>';
            $item_output .= $args->after;

            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
            }
}
class WP_Widget_HomeBox extends WP_Widget 
{
	function WP_Widget_HomeBox() 
	{
		$widget_ops = array(
			'classname'   => 'widget_wpsc_hb',
			'description' => __( 'Home Box Widget', 'wpsc' )
		);
		$this->WP_Widget( 'widget_wpsc_hb', __( 'HomeBox', 'wpsc' ), $widget_ops );
	}
	function widget( $args, $instance ) 
	{
		global $cache_enabled;
		extract( $args );
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? __( 'Title', 'wpsc' ) : $instance['title'] );
		$link = apply_filters( 'widget_link', empty( $instance['link'] ) ? __( 'Link', 'wpsc' ) : $instance['link'] );
		$desc = apply_filters( 'widget_desc', empty( $instance['desc'] ) ? __( 'Detail', 'wpsc' ) : $instance['desc'] );
		echo $before_widget;
		/*if ( $title )
			echo $before_title . $title . $fancy_collapser . $after_title;*/		
		?>
        <div class="homebox" onclick="window.location='<?php echo $link; ?>'">
       		<h3><a href="<?php echo $link; ?>"><?php echo $title; ?></a></h3>
            <div class="textwidget"><p><?php echo $desc; ?></p></div>
        </div>
		<?php
		echo $after_widget;
	}
	function update( $new_instance, $old_instance ) 
	{
		$instance = $old_instance;
		$instance['title']  = strip_tags( $new_instance['title'] );
		$instance['link']  = strip_tags( $new_instance['link'] );
		$instance['desc']  = strip_tags( $new_instance['desc'] );	
		return $instance;
	}
	function form( $instance ) 
	{
		global $wpdb;
		$instance = wp_parse_args( (array)$instance, array(
			'title' => __( 'Title', 'wpsc' ),
			'link' => __( 'Link', 'wpsc' ),
			'desc' => __( 'Detail', 'wpsc' )
		) );
		$title = esc_attr( $instance['title'] );
		$link = esc_attr( $instance['link'] );
		$desc = esc_attr( $instance['desc'] );
		?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title:', 'wpsc' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />            
		</p>
        <p>
			<label for="<?php echo $this->get_field_id('link'); ?>"><?php _e( 'Link:', 'wpsc' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'link' ); ?>" name="<?php echo $this->get_field_name( 'link' ); ?>" type="text" value="<?php echo $link; ?>" />            
		</p>
        <p>
			<label for="<?php echo $this->get_field_id('desc'); ?>"><?php _e( 'Detail:', 'wpsc' ); ?></label>
			<textarea class="widefat" id="<?php echo $this->get_field_id( 'desc' ); ?>" name="<?php echo $this->get_field_name( 'desc' ); ?>" ><?php echo $desc; ?></textarea>
		</p>
		<?php
	}
}
add_action( 'widgets_init', create_function( '', 'return register_widget("WP_Widget_HomeBox");' ) );

class WP_Widget_TrialForm extends WP_Widget 
{
	function WP_Widget_TrialForm() 
	{
		$widget_ops = array(
			'classname'   => 'widget_wpsc_t',
			'description' => __( 'Trial Form Widget', 'wpsc' )
		);
		$this->WP_Widget( 'wpsc_t', __( 'TrialForm', 'wpsc' ), $widget_ops );
	}
	function widget( $args, $instance ) 
	{
		global $cache_enabled;
		extract( $args );
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? __( 'Title', 'wpsc' ) : $instance['title'] );		
		$desc = apply_filters( 'widget_desc', empty( $instance['desc'] ) ? __( 'Detail', 'wpsc' ) : $instance['desc'] );
		echo $before_widget;
		/*if ( $title )
			echo $before_title . $title . $fancy_collapser . $after_title;*/		
		?>
        <div class="trialform">
       		<div class="formhead"><?php echo $title; ?></div>
            <div class="formcontent"><?php echo $desc; ?></div>
            <div class="form">
                        	<div class="forminputbg">
                            	<label>Email</label>
                                <input type="text" name="email" id="email" />
                                <div class="clear"></div>
                            </div>
                            <div class="forminputbg">
                            	<label>Name</label>
                                <input type="text" name="name" id="name" />
                                <div class="clear"></div>
                            </div>
                            <div class="forminputbg">
                            	<label>Company</label>
                                <input type="text" name="company" id="company" style="width:195px;" />
                                <div class="clear"></div>
                            </div>
                            <div class="forminputbg">
                            	<label>Phone No.</label>
                                <input type="text" name="phone" id="phone" style="width:190px;" />
                                <div class="clear"></div>
                            </div>
                            <div style="text-align:left"><img alt="" src="<?php bloginfo('stylesheet_directory'); ?>/images/createacct-button.jpg" width="138" height="34" /></div>
                        </div>
        </div>
		<?php
		echo $after_widget;
	}
	function update( $new_instance, $old_instance ) 
	{
		$instance = $old_instance;
		$instance['title']  = strip_tags( $new_instance['title'] );		
		$instance['desc']  = strip_tags( $new_instance['desc'] );	
		return $instance;
	}
	function form( $instance ) 
	{
		global $wpdb;
		$instance = wp_parse_args( (array)$instance, array(
			'title' => __( 'Title', 'wpsc' ),			
			'desc' => __( 'Detail', 'wpsc' )
		) );
		$title = esc_attr( $instance['title'] );		
		$desc = esc_attr( $instance['desc'] );
		?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title:', 'wpsc' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />            
		</p>        
        <p>
			<label for="<?php echo $this->get_field_id('desc'); ?>"><?php _e( 'Detail:', 'wpsc' ); ?></label>
			<textarea class="widefat" id="<?php echo $this->get_field_id( 'desc' ); ?>" name="<?php echo $this->get_field_name( 'desc' ); ?>" ><?php echo $desc; ?></textarea>
		</p>
		<?php
	}
}
add_action( 'widgets_init', create_function( '', 'return register_widget("WP_Widget_TrialForm");' ) );

function ajaxmethods() 
{
	if(isset($_POST['act']))
	{
		global $wpdb;
		$output = '';
		if($_POST['act'] == 'su')
		{
			//extract data from the post
			extract($_POST);
			
			//set POST variables
			$url = 'https://www.bridgemailsystem.com/pms/trial';
			$fields = array(
				'email'=>urlencode($email),
				'pwd'=>urlencode($pwd),
				'userID'=>urlencode($email),
			  'lastName'=>urlencode($lname),
			  'firstName'=>urlencode($fname),
			  'company'=>urlencode($company),
			  'phone'=>urlencode($phone),
			  'uText'=>urlencode($uText),
			  'chValue'=>urlencode($chValue),
			  'type'=>'cr',
			  'frmFld_lead_source'=>urlencode($src),
			  'frmFld_Current Provider'=>urlencode($provider),
			  'frmFld_Other Text'=>urlencode($othertext),
			  'frmFld_MKS Package'=>urlencode($frmFld_MKS_Package),
			  'frmFld_Bundle Choice'=>urlencode($frmFld_CRM_Tool),
			  'frmFld_Monthly Volume'=>urlencode($frmFld_Monthly_Volume),
			  'frmFld_CRM Tool'=>urlencode($crmtool),
			  'frmFld_Number of Sales Reps'=>urlencode($Sales_Reps),
			  'frmFld_Topic of Interest'=>urlencode($interest),
			  'frmFld_Source'=>urlencode($source)
			);
			
			//url-ify the data for the POST
			foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
			rtrim($fields_string,'&');
			
			//open connection
			$ch = curl_init();
			
			//set the url, number of POST vars, POST data
			curl_setopt($ch,CURLOPT_URL,$url);
			curl_setopt($ch,CURLOPT_POST,count($fields));
			curl_setopt($ch,CURLOPT_POSTFIELDS,$fields_string);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
			
			//execute post
			$result = curl_exec($ch);

			$json_a=json_decode($result,true);
			
			//close connection
			curl_close($ch);
			//echo $json_a['Error'];
			if(key($json_a) == 'Error')
				$msg = '1='.$json_a[key($json_a)];
			else
				$msg = '0='.$json_a[key($json_a)];

			echo $msg;
		}
		elseif($_POST['act'] == 'dr')
		{
			extract($_POST);
			//$to = 'tanveer_411393@hotmail.com';
			$to = 'sales@makesbridge.com';
			$from = $demoemail;
			$subject = "New demo request generated";
			$body = '<strong>Hello,</strong><br><br>';
			$body .= 'A new demo request is generated on makesbridge.com below is the detail:<br><br>';
			$body .= '<strong>Name:</strong> '. $demofname . ' ' . $demolname . '<br>';
			$body .= '<strong>Company:</strong> '. $democompany . '<br>';
			$body .= '<strong>Phone:</strong> '. $demophone . '<br>';
			$body .= '<strong>Source:</strong> Demo inquiry<br>';
			$body .= '<strong>Message:</strong> '. $demomessage . '<br>';
			$body .= '<strong>Monthly email volume:</strong> '. $demoemailvol . '<br>';
			$body .= '<strong>CRM tool:</strong> '. $democrmtool . '<br>';
			$body .= '<strong>Number of sales reps:</strong> '. $demosalesrep . '<br>';
			$body .= '<strong>I am most interested in:</strong> '. $demointerest . '<br>';
			$body .= '<br><br><strong>Regards,</strong>';
			$headers = "MIME-Version: 1.0\r\n";
			$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
			$headers .= 'From: '. $demofname . ' ' . $demolname .' <'.$from.'>' . "\r\nX-Mailer: PHP/";
			mail($to,$subject,$body,$headers);
			//&frmFld_Monthly Volume=".urlencode($demoemailvol)."&frmFld_CRM Tool=".urlencode($democrmtool)."&frmFld_Number of Sales Reps=".urlencode($demosalesrep)."&frmFld_Topic of Interest=".urlencode($demointerest)."
			$ch = curl_init();
			$curlConfig = array(
				CURLOPT_URL            => "https://www.bridgemailsystem.com/pms/form/FormSubmissionHandler.jsp?isJSON=Y&firstName=". urlencode($demofname) ."&lastName=". urlencode($demolname) ."&telephone=". urlencode($demophone) ."&email=".urlencode($demoemail)."&company=".urlencode($democompany)."&frmFld_Comments=".urlencode($demomessage)."&frmFld_Monthly_Volume=".urlencode($demoemailvol)."&frmFld_CRM_Tool=".urlencode($democrmtool)."&frmFld_Number_of_Sales_Reps=".urlencode($demosalesrep)."&frmFld_Topic_of_Interest=".urlencode($demointerest)."&formId=".urlencode('jbFr21Ru30Ww33Sz26ja')."&frmFld_Source=".urlencode('demo inquiry')."&lists=".urlencode('zdTyioEk17Il20Jl21Pi30Rh33zdTyio')."&pageId=",
				CURLOPT_POST           => false,
				CURLOPT_RETURNTRANSFER => true
			);
			//print_r($curlConfig);
			curl_setopt_array($ch, $curlConfig);
			$result = curl_exec($ch);
			if(curl_errno($ch))
			{
			 echo 'Curl error: ' . curl_error($ch);
			}
			//json_encode($result);
			$json_a=json_decode($result,true);
			curl_close($ch);
			echo $json_a[0];
		}
		elseif($_POST['act'] == 'so')
		{
			extract($_POST);			
			
			$to = 'sales@makesbridge.com';
			//$to = 'tanveer@makesbridge.com';
			$from = $email;			
			$body = '<strong>Hello,</strong><br><br>';
			if($src == 'offer inquiry')
			{
				$subject = "New offer inquiry";
				$body .= 'An offer inquiry made on makesbridge.com below is the detail:<br><br>';
			}
			elseif($src == 'freedom offer inquiry')
			{
				$subject = "New freedom offer inquiry";
				$body .= 'A freedom offer inquiry made on makesbridge.com below is the detail:<br><br>';
			}
			elseif($src == 'appexchange')
			{
				$subject = "New offer inquiry";
				$body .= 'An offer inquiry made at appexchange landing page below is the detail:<br><br>';
			}
			elseif($src == 'video landing page')
			{
				$subject = "New video landing page inquiry";
				$body .= 'An inquiry made at video landing page below is the detail:<br><br>';
			}
			$body .= '<strong>Name:</strong> '. $fname . '<br>';
			$body .= '<strong>Phone:</strong> '. $phone . '<br>';
			$body .= '<strong>Source:</strong> '. $src . '<br>';
			$body .= '<strong>Page:</strong> '. $page . '<br>';
			$body .= '<br><br><strong>Regards,</strong>';
			$headers = "MIME-Version: 1.0\r\n";
			$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
			$headers .= 'From: '. $fname .' <'.$email.'>' . "\r\nX-Mailer: PHP/";
			mail($to,$subject,$body,$headers);
			//echo '1';
			$ch = curl_init();
			$curlConfig = array(
				CURLOPT_URL            => "https://www.bridgemailsystem.com/pms/form/FormSubmissionHandler.jsp?isJSON=Y&frmFld_Name=". urlencode($fname) ."&telephone=". urlencode($phone) ."&email=".urlencode($email)."&formId=".urlencode('BzAEqwsEk20In21Vr30Yr33BdTMyio')."&frmFld_source_page=".urlencode($page)."&lists=".urlencode('jbIu21Sv30Vv33Ls26Br17jb')."&pageId=",
				CURLOPT_POST           => false,
				CURLOPT_RETURNTRANSFER => true
			);
			curl_setopt_array($ch, $curlConfig);
			$result = curl_exec($ch);
			if(curl_errno($ch))
			{
			 echo 'Curl error: ' . curl_error($ch);
			}
			$json_a=json_decode($result,true);
			curl_close($ch);
			echo $json_a[0];
		}
		elseif($_POST['act'] == 'sgo')
		{
			extract($_POST);			
			if(strpos($src,'erpguru') !== false || strpos($src,'mks') !== false)
			{
				//$to = 'tanveer@makesbridge.com';
				$to = 'marketing@erpguru.com,sales@makesbridge.com';				
			}
			/*else
				$to = 'tanveer_411393@hotmail.com';*/
			else
				$to = 'sales@makesbridge.com';
			$from = $email;
			$subject = "New offer inquiry";
			$body = '<strong>Hello,</strong><br><br>';
			$body .= 'An offer inquiry made at erpguru landing page below is the detail:<br><br>';
			$body .= '<strong>Name:</strong> '. $fname . '<br>';
			$body .= '<strong>Phone:</strong> '. $phone . '<br>';
			$body .= '<strong>Source:</strong> '. $src . '<br>';
			$body .= '<strong>Page:</strong> '. $page . '<br>';
			$body .= '<br><br><strong>Regards,</strong>';
			$headers = "MIME-Version: 1.0\r\n";
			$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
			$headers .= 'From: '. $fname .' <'.$email.'>' . "\r\nX-Mailer: PHP/";
			mail($to,$subject,$body,$headers);
			//echo '1';
			$ch = curl_init();
			$curlConfig = array(
				CURLOPT_URL            => "https://www.bridgemailsystem.com/pms/form/FormSubmissionHandler.jsp?isJSON=Y&frmFld_Name=". urlencode($fname) ."&telephone=". urlencode($phone) ."&email=".urlencode($email)."&formId=".urlencode('BzAEqwsEk20In21Ws30Yr33BdTMyio')."&frmFld_lead_source=".urlencode($src)."&frmFld_source_page=".urlencode($page)."&lists=".urlencode('zdTyioEk17Jm20Mo21Qj30Vl33zdTyio')."&pageId=",
				CURLOPT_POST           => false,
				CURLOPT_RETURNTRANSFER => true
			);
			curl_setopt_array($ch, $curlConfig);
			$result = curl_exec($ch);
			if(curl_errno($ch))
			{
			 echo 'Curl error: ' . curl_error($ch);
			}
			$json_a=json_decode($result,true);
			curl_close($ch);
			echo $json_a[0];
		}elseif($_POST['act'] == 'stgn')
		{
			extract($_POST);			
			/*if(strpos($src,'erpguru') !== false || strpos($src,'mks') !== false)
			{
				//$to = 'tanveer@makesbridge.com';
				$to = 'sales@makesbridge.com';				
			}
			else*/
				$to = 'sales@makesbridge.com';
			/*else
				$to = 'sales@makesbridge.com';*/
			$from = $email;
			$subject = "New offer inquiry";
			$body = '<strong>Hello,</strong><br><br>';
			$body .= 'An offer inquiry made at TGN landing page below is the detail:<br><br>';
			$body .= '<strong>Name:</strong> '. $fname . '<br>';
			$body .= '<strong>Phone:</strong> '. $phone . '<br>';
			$body .= '<strong>Source:</strong> '. $src . '<br>';
			$body .= '<br><br><strong>Regards,</strong>';
			$headers = "MIME-Version: 1.0\r\n";
			$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
			$headers .= 'From: '. $fname .' <'.$email.'>' . "\r\nX-Mailer: PHP/";
			mail($to,$subject,$body,$headers);
			//echo '1';
			$ch = curl_init();
			$curlConfig = array(
				CURLOPT_URL            => "https://www.bridgemailsystem.com/pms/form/FormSubmissionHandler.jsp?isJSON=Y&frmFld_Name=". urlencode($fname) ."&telephone=". urlencode($phone) ."&email=".urlencode($email)."&formId=".urlencode('qcWOc30Vg33Kc26Jk17qQw')."&frmFld_lead_source=".urlencode($src)."&lists=".urlencode('jbIu21Ux30Ss33Qx26Gw17jb')."&pageId=",
				CURLOPT_POST           => false,
				CURLOPT_RETURNTRANSFER => true
			);
			//print_r($curlConfig);
			curl_setopt_array($ch, $curlConfig);
			$result = curl_exec($ch);
			if(curl_errno($ch))
			{
			 echo 'Curl error: ' . curl_error($ch);
			}
			$json_a=json_decode($result,true);
			curl_close($ch);
			echo $json_a[0];
		}
		elseif($_POST['act'] == 'sto')
		{
			extract($_POST);
			//$to = 'tanveer_411393@hotmail.com';
			$to = 'sales@makesbridge.com';
			$from = $ofemail;			
			$body = '<strong>Hello,</strong><br><br>';
			if($src == 'offer inquiry')
			{
				$subject = "New offer inquiry";
				$body .= 'An offer inquiry made on makesbridge.com below is the detail:<br><br>';
			}
			elseif($src == 'freedom offer inquiry')
			{
				$subject = "New freedom offer inquiry";
				$body .= 'A freedom offer inquiry made on makesbridge.com below is the detail:<br><br>';
			}
			elseif($src == 'appexchange')
			{
				$subject = "New offer inquiry";
				$body .= 'An offer inquiry made at appexchange landing page below is the detail:<br><br>';
			}
			elseif($src == 'video landing page')
			{
				$subject = "New video landing page inquiry";
				$body .= 'An inquiry made at video landing page below is the detail:<br><br>';
			}
			$body .= '<strong>Name:</strong> '. $ofname . '<br>';
			$body .= '<strong>Phone:</strong> '. $ofphone . '<br>';
			$body .= '<strong>I am most interested in:</strong> '. $ofinterest . '<br>';
			$body .= '<strong>Source:</strong> '. $src . '<br>';
			$body .= '<strong>Page:</strong> '. $page . '<br>';
			$body .= '<br><br><strong>Regards,</strong>';
			$headers = "MIME-Version: 1.0\r\n";
			$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
			$headers .= 'From: '. $ofname .' <'.$ofemail.'>' . "\r\nX-Mailer: PHP/";
			mail($to,$subject,$body,$headers);
			//global $wpdb;
			//$wpdb->get_results("insert into wp_l_requests(fname,email,phone,source) values('". $fname ."','". $email ."','". $phone ."','offer inquiry')");
			$ch = curl_init();
			$curlConfig = array(
				CURLOPT_URL            => "https://www.bridgemailsystem.com/pms/form/FormSubmissionHandler.jsp?isJSON=Y&frmFld_Name=". urlencode($ofname) ."&telephone=". urlencode($ofphone) ."&email=".urlencode($ofemail)."&frmFld_Bundle_Choice=". urlencode($ofinterest) ."&formId=".urlencode('BzAEqwsEk20In21Vr30Yr33BdTMyio')."&frmFld_source_page=".urlencode($page)."&lists=".urlencode('jbIu21Sv30Vv33Ls26Br17jb')."&pageId=",
				CURLOPT_POST           => false,
				CURLOPT_RETURNTRANSFER => true
			);
			//print_r($curlConfig);
			curl_setopt_array($ch, $curlConfig);
			$result = curl_exec($ch);
			if(curl_errno($ch))
			{
			 echo 'Curl error: ' . curl_error($ch);
			}
			//json_encode($result);
			$json_a=json_decode($result,true);
			curl_close($ch);
			echo $json_a[0];			
		}
		elseif($_POST['act'] == 'sp')
		{			
			if($_POST['type'] == 'all')
			{
				$videos = get_posts('post_type=videos&post_status=publish&showposts=1000&orderby=post_date&order=desc');
				echo count($videos).']['.getVideos($videos);
			}
			else if($_POST['type'] == 'recent')
			{
				$videos = get_posts('post_type=videos&post_status=publish&showposts=1000&orderby=post_date&order=desc');
				echo count($videos).']['.getVideos($videos);
			}
			else if($_POST['type'] == 'featured')
			{
				$args = array(
				'post_type' => 'videos',
				'post_status' => 'publish',
				'showposts' => '1000',
				'orderby' => 'post_date',
				'order' => 'desc',
				'meta_query' => array(
							array(
								'key' => 'is_featured',
								'value' => true,
								'compare' => '='
							)
						)
				);
				 $videos = get_posts($args);
				 echo count($videos).']['.getVideos($videos);
			}
			else if($_POST['type'] == 'viewed')
			{
				$args = array(
				'post_type' => 'videos',
				'post_status' => 'publish',
				'showposts' => '1000',
				'meta_key' => 'views',
				'orderby' => 'meta_value',
				'order' => 'desc'
				 );
				 $videos = get_posts($args);
				 echo count($videos).']['.getVideos2($videos);
			}			
		}
		elseif($_POST['act'] == 'spb')
		{
			$args = '';
			if($_POST['type'] == 'tag')
			{
				$args = array(
				'post_type' => 'videos',
				'post_status' => 'publish',
				'showposts' => '1000',
				'orderby' => 'post_date',
				'order' => 'desc',
				'tax_query' => array(
							array(
								'taxonomy' => 'post_tag',
								'field' => 'slug',
								'terms' => $_POST['slug']
							)
						)
				);
			}
			elseif($_POST['type'] == 'cat')
			{
				$args = array(
				'post_type' => 'videos',
				'post_status' => 'publish',
				'showposts' => '1000',
				'orderby' => 'post_date',
				'order' => 'desc',
				'tax_query' => array(
							array(
								'taxonomy' => 'video-category',
								'field' => 'slug',
								'terms' => $_POST['slug']
							)
						)
				);
			}
			$videos = get_posts($args);
			echo count($videos).']['.getVideos($videos);
		}
		elseif($_POST['act'] == 'av')
		{
			$views = get_post_meta($_POST['id'],'views',true);
			update_post_meta($_POST['id'], 'views', $views+1);
			$views = get_post_meta($_POST['id'],'views',true);
			echo $views;
			$sql = "insert into wp_l_vidsviewcount(video_id,url,view_date) values(". $_POST['id'] .",'". $_POST['path'] ."','". date('Y-m-d') ."')";
			$wpdb->get_results($sql);
		}
		elseif($_POST['act'] == 'sv')
		{
			$sql = "select * from wp_l_posts where post_status='publish' and post_type='videos' and post_title like '%". $_POST['text'] ."%'";
			$videos = $wpdb->get_results($sql);
			echo count($videos).']['.getVideos($videos);
		}
		elseif($_POST['act'] == 'sho')
		{
			if($_POST['type'] == 'all')
			{
				$offers = get_posts('post_type=freedom-offers&post_status=publish&showposts=1000&orderby=sort_order&order=asc');				
				echo count($offers).']['.getOffers($offers);
			}
			else if($_POST['type'] == 'recent')
			{
				$args = array(
					'post_type' => 'freedom-offers',
					'post_status' => 'publish',
					'showposts' => '1000',
					'orderby' => 'post_date',
					'order' => 'desc',
					'tax_query' => array(
						  array(
							  'taxonomy' => 'offer-type',
							  'field' => 'slug',
							  'terms' => $_POST['tax']
						  )
					)
				);
				//$offers = get_posts('post_type=freedom-offers&post_status=publish&showposts=1000&orderby=post_date&order=desc');
				$offers = get_posts($args);
				echo count($offers).']['.getOffers($offers);
			}
			else if($_POST['type'] == 'featured')
			{
				$args = array(
					'post_type' => 'freedom-offers',
					'post_status' => 'publish',
					'showposts' => '1000',
					'orderby' => 'post_date',
					'order' => 'desc',
					'meta_query' => array(
						array(
							'key' => 'is_featured',
							'value' => true,
							'compare' => '='
						)
					),
					'tax_query' => array(
						  array(
							  'taxonomy' => 'offer-type',
							  'field' => 'slug',
							  'terms' => $_POST['tax']
						  )
					)
				);
				$offers = get_posts($args);
				echo count($offers).']['.getOffers($offers);
			}
			/*else if($_POST['type'] == 'viewed')
			{
				$args = array(
				'post_type' => 'freedom-offers',
				'post_status' => 'publish',
				'showposts' => '1000',
				'meta_key' => 'views',
				'orderby' => 'meta_value',
				'order' => 'desc'
				 );
				 $offers = get_posts($args);
				 if($offers)
				  {
					  $i = 0;
					  foreach($offers as $offer)
					  {
						  $offs[$i]['ID'] = $offer->ID;
						  $offs[$i]['Views'] = get_post_meta($offer->ID,'views',true);
						  $offs[$i]['post_title'] = $offer->post_title;
						  $offs[$i]['post_excerpt'] = $offer->post_excerpt;
						  $offs[$i]['post_content'] = $offer->post_content;
						  //echo $offer->ID . '-' . get_post_meta($offer->ID,'views',true) . '<br>';
						  $i++;
					  }
					  usort($offs, function($a, $b) {
						  return $b['Views'] - $a['Views'];
					  });					 
				  }
				  echo count($offers).']['.getOffers2($offs);
			}*/
			else if($_POST['type'] == 'popular')
			{
				$args = array(
					'post_type' => 'freedom-offers',
					'post_status' => 'publish',
					'showposts' => '1000',
					'meta_key' => 'clicks',
					'orderby' => 'meta_value',
					'order' => 'desc',
					'tax_query' => array(
						  array(
							  'taxonomy' => 'offer-type',
							  'field' => 'slug',
							  'terms' => $_POST['tax']
						  )
					)
				 );
				 $offers = get_posts($args);
				 echo count($offers).']['.getOffers($offers);
			}
			else if($_POST['type'] == 'consultants')
			{				
				 $args = array(
					'post_type' => 'freedom-offers',
					'post_status' => 'publish',
					'showposts' => '1000',
					'orderby' => 'post_date',
					'order' => 'desc',
					'tax_query' => array(
						array(
							'taxonomy' => 'offer-category',
							'field' => 'slug',
							'terms' => 'consultants'
						),
						array(
							'taxonomy' => 'offer-type',
							'field' => 'slug',
							'terms' => $_POST['tax']
						)
					)
				);
				$offers = get_posts($args);
				echo count($offers).']['.getOffers($offers);
			}
			else if($_POST['type'] == 'cloud-apps')
			{				
				 $args = array(
					'post_type' => 'freedom-offers',
					'post_status' => 'publish',
					'showposts' => '1000',
					'orderby' => 'post_date',
					'order' => 'desc',
					'tax_query' => array(
						array(
							'taxonomy' => 'offer-category',
							'field' => 'slug',
							'terms' => 'cloud-apps'
						),
						array(
							'taxonomy' => 'offer-type',
							'field' => 'slug',
							'terms' => $_POST['tax']
						)
					)
				);
				$offers = get_posts($args);
				echo count($offers).']['.getOffers($offers);
			}
		}
		elseif($_POST['act'] == 'shob')
		{
			$args = '';
			if($_POST['type'] == 'tag')
			{
				$args = array(
					'post_type' => 'freedom-offers',
					'post_status' => 'publish',
					'showposts' => '1000',
					'orderby' => 'post_date',
					'order' => 'asc',
					'tax_query' => array(
						array(
							'taxonomy' => 'post_tag',
							'field' => 'slug',
							'terms' => $_POST['slug']
						),
						array(
							'taxonomy' => 'offer-type',
							'field' => 'slug',
							'terms' => $_POST['tax']
						)
					)
				);
			}
			if($_POST['type'] == 'cat')
			{
				$args = array(
					'post_type' => 'freedom-offers',
					'post_status' => 'publish',
					'showposts' => '1000',
					'orderby' => 'post_date',
					'order' => 'asc',
					'tax_query' => array(
						array(
							'taxonomy' => 'offer-category',
							'field' => 'slug',
							'terms' => $_POST['slug']
						),
						array(
							'taxonomy' => 'offer-type',
							'field' => 'slug',
							'terms' => $_POST['tax']
						)
					)
				);
			}			
			$offers = get_posts($args);
			echo count($offers).']['.getOffers($offers);
		}
		elseif($_POST['act'] == 'aov')
		{
			$views = get_post_meta($_POST['id'],'views',true);
			update_post_meta($_POST['id'], 'views', $views+1);
			$views = get_post_meta($_POST['id'],'views',true);
			echo $views;
		}
		elseif($_POST['act'] == 'aoc')
		{
			$clicks = get_post_meta($_POST['id'],'clicks',true);
			update_post_meta($_POST['id'], 'clicks', $clicks+1);
			$clicks = get_post_meta($_POST['id'],'clicks',true);
			echo $clicks;
		}
		elseif($_POST['act'] == 'sfo')
		{
			$sql = "select * from wp_l_posts where post_status='publish' and post_type='freedom-offers' and (post_title like '%". $_POST['text'] ."%' || post_excerpt like '%". $_POST['text'] ."%' || post_content like '%". $_POST['text'] ."%')";
			//echo $sql;
			$offers = $wpdb->get_results($sql);
			if(count($offers) > 0)
				echo count($offers).']['.getOffers($offers);
			else
				echo '0][';
		}
		elseif($_POST['act'] == 'shto')
		{
			if($_POST['type'] == 'consultants')
			{				
				 $args = array(
					'post_type' => 'freedom-offers',
					'post_status' => 'publish',
					'showposts' => '1000',
					'orderby' => 'post_date',
					'order' => 'desc',
					'tax_query' => array(
						array(
							'taxonomy' => 'offer-category',
							'field' => 'slug',
							'terms' => 'consultants'
						),
						array(
							'taxonomy' => 'offer-type',
							'field' => 'slug',
							'terms' => $_POST['tax']
						)
					)
				);				
			}
			else if($_POST['type'] == 'cloud-apps')
			{				
				 $args = array(
					'post_type' => 'freedom-offers',
					'post_status' => 'publish',
					'showposts' => '1000',
					'orderby' => 'post_date',
					'order' => 'desc',
					'tax_query' => array(
						array(
							'taxonomy' => 'offer-category',
							'field' => 'slug',
							'terms' => 'cloud-apps'
						),
						array(
							'taxonomy' => 'offer-type',
							'field' => 'slug',
							'terms' => $_POST['tax']
						)
					)
				);
			}
			$offers = get_posts($args);
			echo count($offers).']['.getOffers3($offers);
		}
		elseif($_POST['act'] == 'shtob')
		{
			$args = '';
			if($_POST['type'] == 'tag')
			{
				$args = array(
					'post_type' => 'freedom-offers',
					'post_status' => 'publish',
					'showposts' => '1000',
					'orderby' => 'post_date',
					'order' => 'asc',
					'tax_query' => array(
						array(
							'taxonomy' => 'post_tag',
							'field' => 'slug',
							'terms' => $_POST['slug']
						),
						array(
							'taxonomy' => 'offer-type',
							'field' => 'slug',
							'terms' => $_POST['tax']
						)
					)
				);
			}
			$offers = get_posts($args);
			echo count($offers).']['.getOffers3($offers);
		}
		elseif($_POST['act'] == 'blo')
		{
			$items_per_group = 4;
			$position = ($_POST["group_no"] * $items_per_group);
			
				$args = array(
				     'post_type' => 'blog',
				     'post_status' => 'publish',
				     'orderby' => 'post_date',
				     'order' =>  'ASC',
				     'showposts' =>  '10000',
				     'tax_query' => array(
				    array(
				      'taxonomy' => 'topics-category',
				      'field' => 'slug',
				      'terms' => $_POST['type']
				    )
				  )
				 );
				$offers = $wpdb->get_results("SELECT wp.* FROM $wpdb->posts wp inner join $wpdb->term_relationships wtr on wtr.object_id=wp.ID inner join 
											$wpdb->term_taxonomy wtt on wtt.term_taxonomy_id = wtr.term_taxonomy_id inner join $wpdb->terms wt on wt.term_id=wtt.term_id 
											where post_type='blog' and post_status='publish' and wtt.taxonomy='topics-category' and wt.slug='$_POST[type]' 
											ORDER BY wp.post_date desc LIMIT $position, $items_per_group");
				if($_POST['totalOnly'])
					echo count(get_posts($args));
				else
					echo count(get_posts($args)).']['.getBlogs($offers);
			
		}
		elseif($_POST['act'] == 'alo')
		{
			if($_POST['tax'] == 'consultant-gallery')
				$items_per_group = 4;
			else
				$items_per_group = 8;
			$position = ($_POST["group_no"] * $items_per_group);
			if($_POST['type'] == 'recent')
			{
				$args = array(
					'post_type' => 'freedom-offers',
					'post_status' => 'publish',
					'showposts' => '1000',
					'orderby' => 'post_date',
					'order' => 'desc',
					'tax_query' => array(
						  array(
							  'taxonomy' => 'offer-type',
							  'field' => 'slug',
							  'terms' => $_POST['tax']
						  )
					)
				);
				$offers = $wpdb->get_results("SELECT wp.* FROM $wpdb->posts wp inner join $wpdb->term_relationships wtr on wtr.object_id=wp.ID inner join 
											$wpdb->term_taxonomy wtt on wtt.term_taxonomy_id = wtr.term_taxonomy_id inner join $wpdb->terms wt on wt.term_id=wtt.term_id 
											where post_type='freedom-offers' and post_status='publish' and wtt.taxonomy='offer-type' and wt.slug='$_POST[tax]' 
											ORDER BY wp.post_date desc LIMIT $position, $items_per_group");
				if($_POST['tax'] == 'consultant-gallery')
					echo count(get_posts($args)).']['.getConsultants($offers);
				else
					echo count(get_posts($args)).']['.getOffers($offers);
			}
			else if($_POST['type'] == 'popular')
			{
				$args = array(
					'post_type' => 'freedom-offers',
					'post_status' => 'publish',
					'showposts' => '1000',
					'meta_key' => 'clicks',
					'orderby' => 'meta_value',
					'order' => 'desc',					
					'tax_query' => array(
						  array(
							  'taxonomy' => 'offer-type',
							  'field' => 'slug',
							  'terms' => $_POST['tax']
						  )
					)
				);
				$offers = $wpdb->get_results("SELECT wp.* FROM $wpdb->posts wp inner join $wpdb->term_relationships wtr on wtr.object_id=wp.ID inner join 
											$wpdb->term_taxonomy wtt on wtt.term_taxonomy_id = wtr.term_taxonomy_id inner join $wpdb->terms wt on wt.term_id=wtt.term_id 
											where post_type='freedom-offers' and post_status='publish' and wtt.taxonomy='offer-type' and wt.slug='$_POST[tax]' 											
											ORDER BY wp.post_date desc LIMIT $position, $items_per_group");
				if($_POST['tax'] == 'consultant-gallery')
					echo count(get_posts($args)).']['.getConsultants($offers);
				else
					echo count(get_posts($args)).']['.getOffers($offers);
			}
			else if($_POST['type'] == 'featured')
			{
				$args = array(
					'post_type' => 'freedom-offers',
					'post_status' => 'publish',
					'showposts' => '1000',
					'orderby' => 'post_date',
					'order' => 'desc',
					'meta_query' => array(
						array(
							'key' => 'is_featured',
							'value' => true,
							'compare' => '='
						)
					),
					'tax_query' => array(
						  array(
							  'taxonomy' => 'offer-type',
							  'field' => 'slug',
							  'terms' => $_POST['tax']
						  )
					)
				);
				$offers = $wpdb->get_results("SELECT wp.* FROM $wpdb->posts wp inner join wp_l_term_relationships wtr on wtr.object_id=wp.ID inner join 
											$wpdb->term_taxonomy wtt on wtt.term_taxonomy_id = wtr.term_taxonomy_id inner join $wpdb->terms wt on wt.term_id=wtt.term_id 											
											inner join $wpdb->postmeta wpm on wpm.post_id=wp.ID 
											where post_type='freedom-offers' and post_status='publish' and wtt.taxonomy='offer-type' and wt.slug='$_POST[tax]' 											
											and wpm.meta_key='is_featured' and wpm.meta_value=true 
											ORDER BY wp.post_date desc LIMIT $position, $items_per_group");
				if($_POST['tax'] == 'consultant-gallery')
					echo count(get_posts($args)).']['.getConsultants($offers);
				else
					echo count(get_posts($args)).']['.getOffers($offers);
			}
			else if($_POST['type'] == 'cat')
			{
				$args = array(
					'post_type' => 'freedom-offers',
					'post_status' => 'publish',
					'showposts' => '1000',
					'orderby' => 'post_date',
					'order' => 'asc',
					'tax_query' => array(
						array(
							'taxonomy' => 'offer-category',
							'field' => 'slug',
							'terms' => $_POST['slug']
						),
						array(
							'taxonomy' => 'offer-type',
							'field' => 'slug',
							'terms' => $_POST['tax']
						)
					)
				);
				$offers = $wpdb->get_results("SELECT DISTINCT p.* FROM $wpdb->posts p
											  inner JOIN $wpdb->term_relationships txr1 ON p.ID = txr1.object_id
											  inner JOIN $wpdb->term_taxonomy tx1 ON txr1.term_taxonomy_id = tx1.term_taxonomy_id
											  inner JOIN $wpdb->terms trm ON tx1.term_id = trm.term_id
											  inner JOIN $wpdb->term_relationships txr2 ON p.ID = txr2.object_id
											  inner JOIN $wpdb->term_taxonomy tx2 ON txr2.term_taxonomy_id = tx2.term_taxonomy_id
											  inner JOIN $wpdb->terms trk ON tx2.term_id = trk.term_id
											  WHERE p.post_type='freedom-offers' and p.post_status='publish'
											  AND (tx1.taxonomy= 'offer-type' AND trm.slug='$_POST[tax]') 
											  AND ( tx2.taxonomy= 'offer-category' AND trk.slug='$_POST[slug]')
											  ORDER BY p.post_date DESC LIMIT $position, $items_per_group");
				if($_POST['tax'] == 'consultant-gallery')
					echo count(get_posts($args)).']['.getConsultants($offers);
				else
					echo count(get_posts($args)).']['.getOffers($offers);
			}
			else if($_POST['type'] == 'tag')
			{
				$args = array(
					'post_type' => 'freedom-offers',
					'post_status' => 'publish',
					'showposts' => '1000',
					'orderby' => 'post_date',
					'order' => 'asc',
					'tax_query' => array(
						array(
							'taxonomy' => 'post_tag',
							'field' => 'slug',
							'terms' => $_POST['slug']
						),
						array(
							'taxonomy' => 'offer-type',
							'field' => 'slug',
							'terms' => $_POST['tax']
						)
					)
				);
				$offers = $wpdb->get_results("SELECT DISTINCT p.* FROM $wpdb->posts p
											  inner JOIN $wpdb->term_relationships txr1 ON p.ID = txr1.object_id
											  inner JOIN $wpdb->term_taxonomy tx1 ON txr1.term_taxonomy_id = tx1.term_taxonomy_id
											  inner JOIN $wpdb->terms trm ON tx1.term_id = trm.term_id
											  inner JOIN $wpdb->term_relationships txr2 ON p.ID = txr2.object_id
											  inner JOIN $wpdb->term_taxonomy tx2 ON txr2.term_taxonomy_id = tx2.term_taxonomy_id
											  inner JOIN $wpdb->terms trk ON tx2.term_id = trk.term_id
											  WHERE p.post_type='freedom-offers' and p.post_status='publish'
											  AND (tx1.taxonomy= 'offer-type' AND trm.slug='$_POST[tax]') 
											  AND ( tx2.taxonomy= 'post_tag' AND trk.slug='$_POST[slug]')
											  ORDER BY p.post_date DESC LIMIT $position, $items_per_group");
				if($_POST['tax'] == 'consultant-gallery')
					echo count(get_posts($args)).']['.getConsultants($offers);
				else
					echo count(get_posts($args)).']['.getOffers($offers);
			}
			else if($_POST['type'] == 'search')
			{
				$offers = $wpdb->get_results("SELECT wp.* FROM $wpdb->posts wp inner join $wpdb->term_relationships wtr on wtr.object_id=wp.ID inner join 
											$wpdb->term_taxonomy wtt on wtt.term_taxonomy_id = wtr.term_taxonomy_id inner join $wpdb->terms wt on wt.term_id=wtt.term_id 
											where wp.post_type='freedom-offers' and wp.post_status='publish' and wtt.taxonomy='offer-type' and wt.slug='$_POST[tax]' 
											and (wp.post_title like '%". $_POST['text'] ."%' || wp.post_excerpt like '%". $_POST['text'] ."%' || wp.post_content like '%". $_POST['text'] ."%')");
											
				$sql = "SELECT wp.* FROM $wpdb->posts wp inner join $wpdb->term_relationships wtr on wtr.object_id=wp.ID inner join 
											$wpdb->term_taxonomy wtt on wtt.term_taxonomy_id = wtr.term_taxonomy_id inner join $wpdb->terms wt on wt.term_id=wtt.term_id 
											where wp.post_type='freedom-offers' and wp.post_status='publish' and wtt.taxonomy='offer-type' and wt.slug='$_POST[tax]' 
											and (wp.post_title like '%". $_POST['text'] ."%' || wp.post_excerpt like '%". $_POST['text'] ."%' || wp.post_content like '%". $_POST['text'] ."%') 
											ORDER BY wp.post_date DESC LIMIT $position, $items_per_group";
				$offers1 = $wpdb->get_results($sql);
				
				if($_POST['tax'] == 'consultant-gallery')
					echo count($offers).']['.getConsultants($offers1);
				else
					echo count($offers).']['.getOffers($offers1);
			}			
		}
		elseif($_POST['act'] == 'appexof')
		{
			include (TEMPLATEPATH.'/getappexoffers.php');
		}
		elseif($_POST['act'] == 'alv')
		{
			include (TEMPLATEPATH.'/getvideos.php');
		}
		elseif($_POST['act'] == 'appexv')
		{
			include (TEMPLATEPATH.'/getappexvideos.php');
		}
	}
	die();
}

function getVideos($videos)
{
	if($videos):
		$i=1;
	  foreach($videos as $video):
		  $image = '';
		  if (has_post_thumbnail( $video->ID ) ):
			  $image = wp_get_attachment_image_src( get_post_thumbnail_id( $video->ID ), 'single-post-thumbnail' );
		  endif;
		  $is_featured = get_post_meta($video->ID,'is_featured',true);
		  if($_POST['cols'] == 2)
			if($i % 2 == 0) { $st = 'style="margin-right:0px;"'; }
		  else
		  	$st = "";
		  $str .= '<li class="span3" '.$st.'>
		  <div class="thumbnail">';
		  	if($is_featured)
			{			
          		$str .= '<img class="feat_star" src="'. get_template_directory_uri() .'/images/featured-icon.png" width="45" height="44" />';
			}		
			$str .= '<div class="img">';
				if($_POST['cols'] == 2)
			  		$str .= '<img src="'. get_template_directory_uri() .'/thumb.php?src='.$image[0].'&w=270&h=175" height="175" alt="">';
				else
				{
					$str .= '<div> <a class="previewbtn wp-video-lightbox" onclick="addView('. $video->ID .',\'//player.vimeo.com/video/'. get_post_meta($video->ID,'video_id',true) .'?title=0&amp;byline=0&amp;portrait=0\')"><span></span></a> </div>
					<img src="'. get_template_directory_uri() .'/thumb.php?src='.$image[0].'&w=331&h=214" height="214" alt="">';
				}
			$str .= '</div><div class="caption">
			  <h3>'. $video->post_title .'</h3>';			  
				$str .= '<p class="tags">';
				$tags = wp_get_post_terms( $video->ID, 'post_tag', $args );
				if($tags):
				foreach($tags as $tag):
					$str .= '<a href="javascript:void(0);" onclick="showpostsby(\'tag\',\''.$tag->slug.'\')">'.$tag->name.'</a>';                        
				endforeach;
				endif;
				$views = get_post_meta($video->ID,'views',true);
				if($views == '')
					$views = '0';
				$str .= '</p>
				<div id="views_'. $video->ID .'" class="btm-bar"> <span><span class="icon view"></span><em>'. $views .'</em></span>';
			  if($_POST['cols'] == 2)
			  	$str .= '<a class="playvideo" href="javascript:void(0);" onclick="addView('. $video->ID .',\'//player.vimeo.com/video/'. get_post_meta($video->ID,'video_id',true) .'?width=800&height=450\')">Watch Video</a>';
			  $str .= '</div>
		  </div>
		</li>';
			if($_POST['cols'] == 2)
				$div = 2;
			else
				$div = 3;
			if($i % $div == 0)
				$str .= '<div class="clear"></div>';
			$i++;
		endforeach;
	endif;
	return $str;
}
function getVideos2($videos)
{
	$i = 0;
	foreach($videos as $video)
	{
		$vids[$i]['ID'] = $video->ID;
		$vids[$i]['Views'] = get_post_meta($video->ID,'views',true);
		$vids[$i]['post_title'] = $video->post_title;			
		$i++;
	}
	usort($vids, function($a, $b) {
		return $b['Views'] - $a['Views'];
	});
	if($vids):
	$i=1;
	  foreach($vids as $vid):
	  	$video = (object) $vid;
		  $image = '';
		  if (has_post_thumbnail( $video->ID ) ):
			  $image = wp_get_attachment_image_src( get_post_thumbnail_id( $video->ID ), 'single-post-thumbnail' );
		  endif;
		  $is_featured = get_post_meta($video->ID,'is_featured',true);
		  $str .= '<li class="span3">
		  <div class="thumbnail">';
		  	if($is_featured)
			{			
          		$str .= '<img class="feat_star" src="'. get_template_directory_uri() .'/images/featured-icon.png" width="45" height="44" />';
			}		
			$str .= '<div class="img">
			  <div> <a class="previewbtn wp-video-lightbox" onclick="addView('. $video->ID .',\'//player.vimeo.com/video/'. get_post_meta($video->ID,'video_id',true) .'?title=0&amp;byline=0&amp;portrait=0\')"><span></span></a> </div>
			  <img src="'. get_template_directory_uri() .'/thumb.php?src='.$image[0].'&w=331&h=214" height="214" alt=""></div>
			<div class="caption">
			  <h3>'. $video->post_title .'</h3>';			   
				$str .= '<p class="tags">';
				$tags = wp_get_post_terms( $video->ID, 'post_tag', $args );
				if($tags):
				foreach($tags as $tag):
					$str .= '<a href="javascript:void(0);" onclick="showpostsby(\'tag\',\''.$tag->slug.'\')">'.$tag->name.'</a>';                        
				endforeach;
				endif;
				$views = get_post_meta($video->ID,'views',true);
				if($views == '')
					$views = '0';
				$str .= '</p>
			  <div id="views_'. $video->ID .'" class="btm-bar"> <span><span class="icon view"></span><em>'. $views .'</em></span></div>
		  </div>
		</li>';
		if($i % 3 == 0)
					$str .= '<div class="clear"></div>';
			$i++;
		endforeach;
	endif;
	return $str;
}
function getOffers($offers)
{
	if($offers):
	  foreach($offers as $offer):
		  $image = '';
		  if (has_post_thumbnail( $offer->ID ) ):
			  $image = wp_get_attachment_image_src( get_post_thumbnail_id( $offer->ID ), 'single-post-thumbnail' );
		  endif;
		  $is_featured = get_post_meta($offer->ID,'is_featured',true);
		  $str .= '<li class="span3" style="width:248px; margin-left:0px; margin-right:10px;">
		  <div class="thumbnail" style="background:none;">';		  	
            if($is_featured)
			{			
          		$str .= '<img class="feat_star" src="'. get_template_directory_uri() .'/images/featured-icon.png" width="45" height="44" />';
			}			
			$str .= '<div class="img2" style="height:160px; line-height:240px;">			  
			  <div>
          	<a class="previewbtn" href="javascript:void(0);" onclick="addView('.$offer->ID.')"><span></span>View Detail</a>
          	<a class="selectbtn" href="javascript:void(0);" onclick="addClick('. $offer->ID .',\''. get_option('siteurl') .'/freedom-offers?add-to-cart='. get_post_meta($offer->ID,'link_product_id',true) .'\')"><span></span>Select Offer</a>
          </div>
          <img src='. get_template_directory_uri() .'/thumb.php?src='.$image[0].'&w=99&h=99" alt="">
			  </div>
			<div class="caption">
			  <h3>'. $offer->post_title .'</h3>';	
			  	$str .= '<p>'.$offer->post_excerpt.'</p>		   
				<p class="tags">';
				$tags = wp_get_post_terms( $offer->ID, 'post_tag', $args );
				if($tags):
				foreach($tags as $tag):
					$str .= '<a href="javascript:void(0);" onclick="showoffersby(\'tag\',\''.$tag->slug.'\')">'.$tag->name.'</a>';                        
				endforeach;
				endif;
				$views = get_post_meta($offer->ID,'views',true);
				if($views == '')
					$views = '0';
				$str .= '</p>
			  <div id="views_'. $offer->ID .'" class="btm-bar"> <span><em>'. $views .'</em> <span class="icon view"></span></span></div>
		  </div>
		</li>
		<div id="off_det_'. $offer->ID .'" class="off_details">'.$offer->post_content.'<a class="selectoffbtn" href="javascript:void(0);" onclick="addClick('.$offer->ID .',\''. get_option('siteurl') .'/freedom-offers?add-to-cart='. get_post_meta($offer->ID,'link_product_id',true) .'\')">Select Offer</a></div>';
		endforeach;
	endif;
	return $str;
}
function getOffers3($offers)
{
	if($offers):
	  foreach($offers as $offer):
		  $image = '';
		  if (has_post_thumbnail( $offer->ID ) ):
			  $image = wp_get_attachment_image_src( get_post_thumbnail_id( $offer->ID ), 'single-post-thumbnail' );
		  endif;
		  $is_featured = get_post_meta($offer->ID,'is_featured',true);
		  $str .= '<li class="span3" style="width:248px; margin-left:0px; margin-right:10px;">
		  <div class="thumbnail" style="background:none;">
           	<div id="badge'. $offer->ID .'" class="savebadge">
				<p>';
				$badge_text = get_post_meta( $offer->ID, 'badge_text', $args );
				if($badge_text)
					$str .= $badge_text[0];
			$str .= '</p>
			</div>
			<div class="img2" style="height:160px; line-height:240px;">			  
			  <div>
          	<a class="previewbtn" href="javascript:void(0);" onclick="addView('.$offer->ID.')"><span></span>View Detail</a>
          	<a class="selectbtn" href="javascript:void(0);" onclick="addClick('. $offer->ID .',\''. get_option('siteurl') .'/offers?add-to-cart='. get_post_meta($offer->ID,'link_product_id',true) .'\')"><span></span>Select Offer</a>
          </div>
          <img src='. get_template_directory_uri() .'/thumb.php?src='.$image[0].'&w=99&h=99" alt="">
			  </div>
			<div class="caption">
			  <h3>'. $offer->post_title .'</h3>';	
			  	$str .= '<p>'.$offer->post_excerpt.'</p>		   
				<p class="tags">';
				$tags = wp_get_post_terms( $offer->ID, 'post_tag', $args );
				if($tags):
				foreach($tags as $tag):
					$str .= '<a href="javascript:void(0);" onclick="showoffersby(\'tag\',\''.$tag->slug.'\')">'.$tag->name.'</a>';                        
				endforeach;
				endif;
				$views = get_post_meta($offer->ID,'views',true);
				if($views == '')
					$views = '0';
				$str .= '</p>
			  <div id="views_'. $offer->ID .'" class="btm-bar"> <span><em>'. $views .'</em> <span class="icon view"></span></span></div>
		  </div>
		</li>
		<div id="off_det_'. $offer->ID .'" class="off_details">'.$offer->post_content.'<a class="selectoffbtn" href="javascript:void(0);" onclick="addClick('.$offer->ID .',\''. get_option('siteurl') .'/offers?add-to-cart='. get_post_meta($offer->ID,'link_product_id',true) .'\')">Select Offer</a></div>';
		endforeach;
	endif;
	return $str;
}
function getConsultants($offers)
{
	if($offers):
		$i=1;
	  foreach($offers as $offer):
		  $image = '';
		  if (has_post_thumbnail( $offer->ID ) ):
			  $image = wp_get_attachment_image_src( get_post_thumbnail_id( $offer->ID ), 'single-post-thumbnail' );
		  endif;
		  $is_featured = get_post_meta($offer->ID,'is_featured',true);
		  $st = '';
		  if($i % 2 == 0) { $st = 'style="margin-right:0px;"'; }
		  $str .= '<li class="span3" '. $st .'>
		  <div class="thumbnail" style="background:none;">';		  	
            if($is_featured)
			{			
          		$str .= '<img class="feat_star" src="'. get_template_directory_uri() .'/images/featured-icon.png" width="45" height="44" />';
			}			
			$str .= '<div class="clear"></div>
			<div class="img2"><img src='. get_template_directory_uri() .'/thumb.php?src='.$image[0].'&w=99&h=99" alt="">
				<div class="hoverbtns">
					  <a class="previewbtn" href="javascript:void(0);" onclick="addView('.$offer->ID.')"><span></span>View Detail</a>
					  <a class="selectbtn" href="javascript:void(0);" onclick="addClick('. $offer->ID .',\''. get_option('siteurl') .'/consultants-gallery?add-to-cart='. get_post_meta($offer->ID,'link_product_id',true) .'\')"><span></span>Select Offer</a>
				</div>
			</div>
			<div class="caption">
			  	<h3>'. $offer->post_title .'</h3>';	
			  	$str .= '<p>'.$offer->post_excerpt.'</p>		   
				<p class="tags">';
				$tags = wp_get_post_terms( $offer->ID, 'post_tag', $args );
				if($tags):
				foreach($tags as $tag):
					$str .= '<a href="javascript:void(0);" onclick="showoffersby(\'tag\',\''.$tag->slug.'\')">'.$tag->name.'</a>';                        
				endforeach;
				endif;
				$views = get_post_meta($offer->ID,'views',true);
				if($views == '')
					$views = '0';
				$str .= '</p>				
			  <div id="views_'. $offer->ID .'" class="btm-bar"><span class="icon view"></span> <span><em>'. $views .'</em> </span></div>
		  </div><div class="clear"></div>
		</li>
		<div id="off_det_'. $offer->ID .'" class="off_details">'.$offer->post_content.'<a class="selectoffbtn" href="javascript:void(0);" onclick="addClick('.$offer->ID .',\''. get_option('siteurl') .'/consultants-gallery?add-to-cart='. get_post_meta($offer->ID,'link_product_id',true) .'\')">Select Offer</a></div>';
		$i++;
		endforeach;
	endif;
	return $str;
}
function getBlogs($blogs)
{
	if($blogs):
		$i=1;
	  foreach($blogs as $blog):
		  
		 
		 $my_date = get_the_time('d-M-Y', $blog->ID);
		  		  	
           		
			$str .= '<div class="mkspost-wrap"><h4 class="mksblog-date"><span><img src="//www.makesbridge.com/wp-content/uploads/2014/10/calendar.png"></span>'.$my_date.'
			</h4><div class="caption">
			  	<a href="'.get_permalink( $blog->ID ).'"><h2>'. $blog->post_title .'</h2></a>';	
			  	$str .= '<p>'.$blog->post_excerpt.'</p>	</div></div>';	   
						
		 
		$i++;
		
		endforeach;
	endif;
	return $str;
}
function getOffers2($offs)
{
	if($offs):
	  foreach($offs as $off):
	  	$offer = (object) $off;
		  $image = '';
		  if (has_post_thumbnail( $offer->ID ) ):
			  $image = wp_get_attachment_image_src( get_post_thumbnail_id( $offer->ID ), 'single-post-thumbnail' );
		  endif;
		  $str .= '<li class="span3" style="width:248px; margin-left:0px; margin-right:10px;">
		  <div class="thumbnail" style="background:none;">
			<div class="img2" style="height:160px; line-height:240px;">			  
			  <div>
          	<a class="previewbtn" href="javascript:void(0);" onclick="addView('.$offer->ID.')"><span></span>View Detail</a>
          	<a class="selectbtn" href="javascript:void(0);" onclick="addClick('. $offer->ID .',\'//www.makesbridge.com/congratulations?add-to-cart='. get_post_meta($offer->ID,'link_product_id',true) .'\')"><span></span>Select Offer</a>
          </div>
          <img src='. get_template_directory_uri() .'/thumb.php?src='.$image[0].'&w=99&h=99" alt="">
			  </div>
			<div class="caption" style="min-height:200px;">
			  <h3>'. $offer->post_title .'</h3>';	
			  	$str .= '<p>'.$offer->post_excerpt.'</p>		   
				<p class="tags">';
				$tags = wp_get_post_terms( $offer->ID, 'post_tag', $args );
				if($tags):
				foreach($tags as $tag):
					$str .= '<a href="javascript:void(0);" onclick="showoffersby(\'tag\',\''.$tag->slug.'\')">'.$tag->name.'</a>';                        
				endforeach;
				endif;
				$views = get_post_meta($offer->ID,'views',true);
				if($views == '')
					$views = '0';
				$str .= '</p>
			  <div id="views_'. $offer->ID .'" class="btm-bar"> <span><em>'. $views .'</em> <span class="icon view"></span></span></div>
		  </div>
		</li>
		<div id="off_det_'. $offer->ID .'" class="off_details">'.$offer->post_content.'</div>';
		endforeach;
	endif;
	return $str;
}

add_action('wp_ajax_my_special_ajax_call', 'ajaxmethods');
add_action('wp_ajax_nopriv_my_special_ajax_call', 'ajaxmethods');



//Short code parsing
//[video id="" width="" height="" imgpath=""]
function videos_func( $atts ){
 	extract( shortcode_atts( array(
		'id' => '',
		'imgpath' => '',
		'width' => '',
		'height' => '',
	), $atts ) );
	$video = get_post($id);
	//$imgsize = getimagesize($imgpath);
	return '<a style="width:'. $width .'px; height:'. $height .'px;" class="wp-video-lightbox" href="javascript:void(0)" title="" onclick="addView2('. $video->ID .',\'//player.vimeo.com/video/'. get_post_meta($video->ID,'video_id',true) .'?width=800&amp;height=450\',800,450)" ></a>';
}
add_shortcode( 'videos', 'videos_func' );

/*function footag_func( $atts ) {
     return "foo = {$atts['foo']}";
}
add_shortcode('footag', 'footag_func');*/

add_action( "admin_menu", "viewscount" );
function viewscount()
{
	add_submenu_page( "edit.php?post_type=videos", __( "Videos View Count", "viewscount" ), __( "Videos View Count", "viewscount" ), "edit_private_posts", 
						"viewscount_admin", "viewscount_admin" );
}
function viewscount_admin()
{
	$args = array(
	  'post_type' => 'videos',
	  'post_status' => 'publish',
	  'showposts' => '1000',
	  'orderby' => 'post_date',
	  'order' => 'desc'
	);
	$videos = get_posts($args);
	?>
    <h2 style="margin-top:50px; margin-left:50px;">Videos View Count</h2>
	<table border="1" cellpadding="5" cellspacing="0" width="60%" style="background-color:#ffffff; margin-left:50px;">
    	<tr><td><strong>Video Title</strong></td><td style="background-color:#ffffff;"><strong>View Count</strong></td></tr>
	<?php
	if($videos)
	{
		foreach($videos as $video)
		{
		?>
			<tr>
            	<td width="80%"><?php echo $video->post_title; ?></td>
                <td width="20%"><?php echo get_post_meta($video->ID,'views',true); ?></td>
            </tr>
		<?php
		}
	}
	?>
	</table>
	<?php
}

function videoscount_func( $atts ){ 	
	$args = array(
	  'post_type' => 'videos',
	  'post_status' => 'publish',
	  'showposts' => '1000',
	  'meta_key' => 'views',
	  'orderby' => 'meta_value',
	  'order' => 'desc',
	);
	$videos = get_posts($args);
	
    $str = '<h2 style="margin-top:50px; margin-left:50px;">Videos View Count</h2>
	<table border="0" cellpadding="5" cellspacing="0" width="60%" style="background-color:#ffffff; margin-left:auto; margin-right:auto;">
    	<tr><td style="font-size:16px;"><strong>Sr#</strong></td><td style="font-size:16px;"><strong>Video Title</strong></td><td style="font-size:16px;"><strong>View Count</strong></td></tr>';
	
	$i = 0;
	foreach($videos as $video)
	{
		$vids[$i]['ID'] = $video->ID;
		$vids[$i]['Views'] = get_post_meta($video->ID,'views',true);
		$vids[$i]['post_title'] = $video->post_title;			
		$i++;
	}
	usort($vids, function($a, $b) {
		return $b['Views'] - $a['Views'];
	});
	if($vids)
	{
		$i=1;
	  	foreach($vids as $vid)
	  	{
	  		$video = (object) $vid;		
			$str .= '<tr>
				<td width="10%" style="border:solid 1px; padding:5px;font-size:16px;">'. $i .'</td>
            	<td width="70%" style="border:solid 1px; padding:5px;font-size:16px;">'. $video->post_title .'</td>
                <td width="20%" style="border:solid 1px; padding:5px;font-size:16px;">'. get_post_meta($video->ID,'views',true) .'</td>
            </tr>';
			$i++;		
		}
	}
	
	$str .= '</table>';
	return $str;
}
add_shortcode( 'videoscount', 'videoscount_func' );
?>