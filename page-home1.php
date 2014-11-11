<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/home1.css" media="screen" />
<?php 
/* Template Name: Home1 */
ob_start();
if( isset($_POST['email']) ) 
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
	  'frmFld_Current_Provider'=>urlencode($provider),
	  'uText'=>urlencode($uText),
	  'chValue'=>urlencode($chValue),
	  'type'=>'cr',	  
	  'frmFld_Source Code'=>'This Week'
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
	header('header: http://www.makesbridge.com/thisweek/congratulations?name='.urlencode($fname) . ' ' . urlencode($lname));
	/*if(key($json_a) == 'Error')
		$err = $json_a[key($json_a)];
	else
		$success = $json_a[key($json_a)];*/
}
		
get_header(); ?>

	<!-- START: Connect -->
	<div class="main">    	
		<div id="jms-slideshow" class="jms-slideshow">        	
        	<?php
            query_posts('post_type=slider&post_status=publish&showposts=100&orderby=post_date&order=asc');
			$i=1;
			if(have_posts()): 
			while(have_posts()) :
				the_post();
				$background_image = get_field('slide');
			?>
                <div id="slide<?php echo $i; ?>" class="step" data-x="1000" data-y="5000" style="background:url(<?php echo $background_image["url"]; ?>)">
                    <div class="slidercontent">
                        <div style="height:169px;">
                            <h2><?php the_field('slider_head'); ?></h2>
                            <h3><?php the_field('slider_subhead'); ?></h3>
                            <p class="slidecontent"><?php the_field('slider_desc'); ?></p>
                        </div>                        
                    </div>
                </div>
            <?php
			$i++;
			endwhile;
			endif;
			?>
        </div>
        <div class="main_wrap" style="position:relative; z-index:1000;">            	
            	<div class="clear"></div>
                <div class="laptop">
                    <a rel="wp-video-lightbox" href="http://vimeo.com/90911241?width=800&height=450">
                    <img src="<?php bloginfo('stylesheet_directory'); ?>/images/play-btn.png" width="71" height="71" style="border:0;" />
                    </a>
                </div>
                <div class="trialform">                    
                    <div style="color:#5fa6cb; margin-top:20px; padding:0; font-size:30px;" class="formhead">Free 30-Day Trial</div>
                    <div class="form" style="margin-top:20px; width:400px;">                        
                        <div class="forminputbg" style="width:348px;">
                            <label>Work Email</label>
                            <input type="text" name="email1" id="email1" style="width:240px;" />
                            <div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                        <div class="getstarted" onclick="showsupop('signup_now','1');">Get Started</div>
                        <div class="workemailhelp" style="margin:10px 40px 0px 0px; float:right; font-size:13px;"><a data-placement="bottom" data-trigger="hover" data-content="For security reasons we do not provision trials to anonymous email addresses such as gmail, yahoo, and hotmail." data-toggle="popover" style="font-style:italic; 
                            color:#31cbff; font-size:13px; letter-spacing:1px; cursor:pointer;">Why must I use a work email?</a> 
                        </div>
                        <div class="clear"></div>
                        <div class="home_termslink">
                            By submitting this information you agree to our <a href="javascript:void(0);" onclick="showtospop('termspop');">Terms of Service</a>                            
                        </div>
                    </div>
                    </a>                    
                </div>
                <div class="clear"></div>
            </div>
	</div>
	<!-- END: Connect -->
	<!-- START: Module 02 -->
	<div class="main" style="background: #f4f9fb;">
		<div class="main_wrap">
            <div class="homeboxes">
                <?php dynamic_sidebar(1); ?>
                <div class="clear"></div>
            </div>            			
		</div>
	</div>
	<!-- END: Module 02 -->
	<!-- START: Module 02 -->
	<div class="main">
		<div class="main_wrap">
			<div class="stories" style="margin:0 auto 150px; height:300px;">
				<div class="headline_stories"><h2>Success Stories</h2></div>
                <!--<script language="javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery1.js"></script>-->
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
                    //$stories = get_posts('post_type=success-stories&post_status=publish&showposts=3&orderby=post_date&order=desc');
					query_posts(array(
						'post_type' => 'success-stories',
						'post_status' => 'publish',
						'showposts' => 10,
						'orderby' => 'rand',
						'meta_query' => array(
							array(
								'key' => 'is_featured',
								'value' => true
							)
						)
					));
                    if (have_posts()) : while (have_posts()) : the_post();
						$image = '';
						if (has_post_thumbnail( $post->ID ) ):
							$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
						endif;				
						?>
						<div class="homestory" style="width:400px;">
							<?php
							if($post)
							{
							?>
                            	<a href="<?php the_permalink(); ?>">
									<p class="st_text"><?php echo $post->post_excerpt; ?>...Read more</p>
									<!--<span class="clear"></span>
									<span class="ss_auth"><?php //echo $story->author; ?></span>-->
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
                    endwhile; 
					endif;
                    ?>                    
                </div>
			</div>
		</div>
	</div>
	<!-- END: Module 02 -->

<?php get_footer(); ?>