<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>
        	<?php			
			/*
			 * Print the <title> tag based on what is being viewed.
			 */
			global $page, $paged;
		
			wp_title( '|', true, 'right' );
		
			// Add the blog name.
			bloginfo( 'name' );
		
			// Add the blog description for the home/front page.
			$site_description = get_bloginfo( 'description', 'display' );
			if ( $site_description && ( is_home() || is_front_page() ) )
				echo " | $site_description";
		
			// Add a page number if necessary:
			if ( $paged >= 2 || $page >= 2 )
				echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );			
			?>
        </title>
        
        <meta name="google-site-verification" content="NU7NglyUl8eTS-VgcnnuOLRjI8DHf3Qi8bb5ngsGjr0" />
		<meta name="globalsign-domain-verification" content="JHVtiEgo0Glmo6OSyaWUIhcFQ7GX9v9Q3mhSoC0DRw" />

		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="title" content="MakesBridge" />
		<meta name="description" content="MakesBridge Landing Page" />
		<meta name="keywords" content="marketing automation, mass email, sales automation, campaign creation, easy editor, analytics, small business, email template, image gallery" />

 <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/error.css" type="text/css" />
</head>
<body>
	<div class="topbar">
        <div style="text-align:center;" class="main_wrap">
        	<div class="clear"></div>
            <a title="Makesbridge" href="http://www.makesbridge.com/">
                    <img style="width: 204px; border:0; height: 47px;" src="http://www.makesbridge.com/test/wp-content/themes/mksteam/images/logo.png" alt="">
                </a>
                <div class="clear"></div>
        </div>
    </div>
<section id="primary" class="span8">
			<div class="figure">
			<img src="http://www.makesbridge.com/wp-content/uploads/2014/09/404.png" alt="Error:">
			</div>
			<div id="errorbox">
			<h1>Error (404)</h1>We can't find the page you're looking for. Check out our <a href="https://server.iad.liveperson.net/hc/69791877/?cmd=file&file=visitorWantsToChat&site=69791877&byhref=1&imageUrl=https://server.iad.liveperson.net/hcp/Gallery/ChatButton-Gallery/English">Live Chat</a>, or head back to <a href="https://www.makebidge.com/">home</a>.
			</div>
</section><!-- #primary -->
</body>
</html>
<?php
//get_sidebar();
//get_footer();


/* End of file 404.php */
/* Location: ./wp-content/themes/the-bootstrap/404.php */