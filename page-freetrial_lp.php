<?php
/* Template Name: Free Trial (LP) */
?>
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
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="title" content="MakesBridge" />
		<meta name="description" content="MakesBridge Landing Page" />
		<meta name="keywords" content="MakesBridge" />
		
		<link rel="shortcut icon" href="http://salesforceoffer.makesbridge.com/wp-content/themes/salesforceoffer/images/favicon.png" type="image/x-icon">
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/alloffer.css" media="screen" />

		
		
        
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        
        
		
        <script type="text/javascript">
            
			$(function() {
				// Scroll to Top
				$(window).scroll(function(){
    
					var fromTopPx = 200; // distance to trigger
					
					var scrolledFromtop = $(window).scrollTop();
					if(scrolledFromtop > fromTopPx){
						$('#up').addClass('scrolled');
					}else{
						$('#up').removeClass('scrolled');
					}
				});
				$('#up').on('click',function(){
					$("html, body").animate({scrollTop:0 }, {duration: 1200, easingType: 'easeOutQuart'});
					return false;
				});
               
            });
			
			
			$(function() {
            
                // SMOOTH JUMP
				$('.smooth_jump').bind('click',function(event){
					var $anchor = $(this);
					
					$("html, body").animate({scrollTop: $($anchor.attr('href')).offset().top}, {duration: 1200, easingType: 'easeOutQuart'});
					return false;
					
				});
            });
			
			$(function() {
            
                $( '#jms-slideshow' ).jmslideshow({autoplay:true,arrows:false});
				//$( '#jms-slideshow' ).jmslideshow();
            });
			function showpop(popid)
			{
				$('#'+popid).addClass('visible');
			}
			function hidepop(popid)
			{
				$('#'+popid).removeClass('visible');
			}
			function showtospop()
			{
				$('.goback').css('display','none');
				$('.signuppop').css('display','none');
				$('.fancybox-overlay').css('display','block');
				$('#termspop').css('display','block');
				$('.fancybox-wrap').css('margin-left','-480px');				
				$('.fancybox-inner').append($('#termspop'));
			}
			function showsupop(popid,n)
			{
				$('.signuppop').css('display','none');
				$('.fancybox-overlay').css('display','block');				
				$('#'+popid).css('display','block');				
				if(n=='2')
				{
					$('.goback').css('display','block');
					$('.fancybox-wrap').css('margin-left','-480px');
					$('.fancybox-inner').append($('#termspop'));
				}
				else if(n=='3')
				{
					$('.goback').css('display','none');
					$('.fancybox-wrap').css('margin-left','-480px');
					$('.fancybox-inner').append($('#terms2pop'));
				}
				else
				{
					$('.fancybox-wrap').css('margin-left','-400px');
					$('.fancybox-inner').append($('#signup_now'));
				}
				if($('#email1'))
					$('#email').val($('#email1').val());
				return false;
			}
			function hidesupop()
			{
				$('.fancybox-overlay').css('display','none');
				$('.signuppop').css('display','none');
				return false;
			}
			function hidesupop2()
			{
				$('.fancybox-overlay1').css('display','none');
				return false;
			}
			function toggleField()
			{
				if($('#inquiry_option').val() == 'I have other questions')
					$('#inquiry').show();
				else
					$('#inquiry').hide();
			}
			function togglePops()
			{
				$('.signuppop').css('display','none');
				$('#signup_now').css('display','block');
				$('.fancybox-wrap').css('margin-left','-400px');
				//$('.fancybox-inner').html('');
				$('.fancybox-inner').append($('#signup_now'));
			}
			function openadvdetail(advID)
			{
				$('.goback').css('display','none');
				$('.signuppop').css('display','none');
				$('.fancybox-overlay').css('display','block');
				$('#termspop').css('display','none');
				$('.fancybox-wrap').css('margin-left','-480px');
				$('#adv_'+advID).show();
				$('.fancybox-inner').append($('#adv_'+advID));
				return false;
			}
			
			
        </script>
		
		<?php wp_head(); ?>
	</head>
<body onload='javascript:getServerData();'>
	
	<!-- Add fancyBox main JS and CSS files -->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/source/jquery.fancybox.js?v=2.1.4"></script>
<!--<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.js"></script>-->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/docs.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/js/source/jquery.fancybox.css?v=2.1.4" media="screen" />
            
<script language="javascript">
        	////////////////////////////////////////////////// AJAX works /////////////////////////////////////////////////////////

			var pageprotocol = document.location.protocol||'http:';
			
			var req = null, textarea = null, span = null;
			var preUrl = pageprotocol+'//www.bridgemailsystem.com';
			var postUrl = preUrl + '/pms/form/ChallengeHandler.jsp';
			var temp = new Array();
			var xmlErr = 'XMLHTTPRequest object is null.';
			
			function getXHR() {
				if (window.XMLHttpRequest) {
					return new XMLHttpRequest();
				} else if (window.ActiveXObject) {
					return new ActiveXObject("Microsoft.XMLHTTP");
				}
			
				if(req == null) {
					alert("Error initializing XmlHttpRequest object.");
				}
			}
			
			function getServerData() {
			 try {
			  req = getXHR();
			  if(req!=null)
				xmlErr='req not null';
			
			  req.open("POST", postUrl, true);
			  req.send("");
			  req.onreadystatechange = processResponse;
			 }
			 catch(err) {
			  document.getElementById('chValue').value = '_DEFAULT';
			  document.getElementById('image').src = pageprotocol+'//www.bridgemailsystem.com/pms/challenge?c=_DEFAULT&err='+err+'&xhr='+xmlErr;
			  document.getElementById('image').style.display = '';
			 }
			}
			
			function processResponse() {
				if(req.readyState == 4) {
					if(req.status == 200) {
						temp = req.responseText.split(',');
						document.getElementById('chValue').value = temp[1];
						document.getElementById('image').src = preUrl + temp[0];
						document.getElementById('image').style.display = '';
						if(document.getElementById('chValue1'))
						{
							document.getElementById('chValue1').value = temp[1];
							document.getElementById('image1').src = preUrl + temp[0];
							document.getElementById('image1').style.display = '';
						}
					} 
					else 
					{						
						document.getElementById('chValue').value = '_DEFAULT';
						document.getElementById('image').src = pageprotocol+'//www.bridgemailsystem.com/pms/challenge?c=_DEFAULT';
						document.getElementById('image').style.display = '';
						if(document.getElementById('chValue1'))
						{
							document.getElementById('chValue1').value = '_DEFAULT';
							document.getElementById('image1').src = pageprotocol+'//www.bridgemailsystem.com/pms/challenge?c=_DEFAULT';
							document.getElementById('image1').style.display = '';
						}
					}
				}
			}
			
			///////////////////////////////////////////////// AJAX works //////////////////////////////////////////////////////////
			
			function isValidEmail(string) {
				if (string.search(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/) != -1)
					return true;
				else
					return false;
			}
			function isEmail(string) {
				/*if (string.search(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/) != -1)
					return true;
				else
					return false;*/
				var re = '[a-zA-Z_\\.-]+@((hotmail)|(yahoo)|(gmail)|(msn))\\.[a-z]{2,4}';
				if(string.match(re))
					return false;
				else
					return true;
			}
			
			///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			///////////////////////////////////////////////// Trial Account Signup works //////////////////////////////////////////////////////////
			function validateAccountForm() {
				$('.errors').html('');
				var fname = document.accForm.fname.value;
				var lname = document.accForm.lname.value;
				var company = document.accForm.company.value;
				var email = document.accForm.email.value;
				var challText = document.accForm.uText.value;
				var pwd = document.accForm.pwd.value;
				var pwd2 = document.accForm.pwd2.value;
				var phone = document.accForm.phone.value;
				var provider = document.accForm.provider.value;
			
				var cmnErr = false;
				var emailErr = false;
				$('.erroricon').hide();
				if(challText == '')
				{
					//alert(' Enter text for spam protection.');
					cmnErr = true;
					$('.scbg').css('border','solid 1px #ff0000');
					$('#uText_erroricon').show();
					$('#uText_erroricon').attr('data-content','Please enter the CAPTCHA');
					//$('#uText_erroricon').popover({'placement':'bottom','trigger':'hover',delay: { show: 0, hide:0 },animation:false});
					//return false;
				}
				else
				{
					//cmnErr = false;
					$('.scbg').attr('style','');
					$('#uText_erroricon').hide();
				}
					
				if(email == '')
				{
					//errorMessage += '- Please enter valid email address.\n';
					cmnErr = true;
					$('.emailbg').css('border','solid 1px #ff0000');
					$('#email_erroricon').show();
					$('#email_erroricon').attr('data-content','Please enter email address.');
				}
				else if(isValidEmail(email)==false)
				{
					//errorMessage += '- Please enter valid email address.\n';
					cmnErr = true;
					$('.emailbg').css('border','solid 1px #ff0000');
					$('#email_erroricon').show();
					$('#email_erroricon').attr('data-content','Please enter valid email address.');
				}
				else if(isEmail(email)==false)
				{
					emailErr = true;
					$('.emailbg').css('border','solid 1px #ff0000');
					$('#email_erroricon').show();
					$('#email_erroricon').attr('data-content','Email addresses of free services are not accepted. (e.g. @msn, @gmail, @yahoo)');
				}
				else
				{
					//cmnErr = false;					
					$('.emailbg').attr('style','');
					$('#email_erroricon').hide();
				}
								
				if(pwd.length<8){
					//errorMessage += '- Password must contain at least 8 characters.\n';
					cmnErr = true;
					$('.pwdbg').css('border','solid 1px #ff0000');
					$('#pwd_erroricon').show();
					$('#pwd_erroricon').attr('data-content','Password must contain at least 8 characters.');
				}
				else if(isValidPassword(pwd)==false){
					//errorMessage += '- Enter a valid password. Space and blackslash characters not allowed.\n';
					cmnErr = true;
					$('.pwdbg').css('border','solid 1px #ff0000');
					$('#pwd_erroricon').show();
					$('#pwd_erroricon').attr('data-content','Enter a valid password. Space and backslash characters are not allowed.');
				}
				else if(isValidPass(pwd)==false){
					//errorMessage += '- Password must have at least one letter and one number.\n';
					cmnErr = true;
					$('.pwdbg').css('border','solid 1px #ff0000');
					$('#pwd_erroricon').show();
					$('#pwd_erroricon').attr('data-content','Password must have at least one letter and one number.');
				}
				else if(pwd != pwd2)
				{
					//errorMessage += '- Password is mismatching, please enter your password again.\n';
					cmnErr = true;
					$('.pwdbg').css('border','solid 1px #ff0000');
					$('.pwd2bg').css('border','solid 1px #ff0000');
					$('#pwd_erroricon').show();
					$('#pwd_erroricon').attr('data-content','Password mismatch. Please enter your password again.');
				}
				else
				{
					//cmnErr = false;
					$('.pwdbg').attr('style','');
					$('.pwd2bg').attr('style','');
					$('#pwd_erroricon').hide();
				}
								
				if(fname == '') {
					//errorMessage += '- Please enter first name.\n';
					cmnErr = true;
					$('.fnamebg').css('border','solid 1px #ff0000');
					$('#fname_erroricon').show();
					$('#fname_erroricon').attr('data-content','Please enter first name.');
				}
				else
				{
					//cmnErr = false;
					$('.fnamebg').attr('style','');
					$('#fname_erroricon').hide();
				}
				if(lname == '') {
					//errorMessage += '- Please enter last name.\n';
					cmnErr = true;
					$('.lnamebg').css('border','solid 1px #ff0000');
					$('#lname_erroricon').show();
					$('#lname_erroricon').attr('data-content','Please enter last name.');
				}
				else
				{
					//cmnErr = false;
					$('.lnamebg').attr('style','');
					$('#lname_erroricon').hide();
				}
				if(company == '')
				{
					//errorMessage += '- Please enter company.\n';
					cmnErr = true;
					$('.companybg').css('border','solid 1px #ff0000');
					$('#company_erroricon').show();
					$('#company_erroricon').attr('data-content','Please enter first name.');
				}
				else
				{
					//cmnErr = false;
					$('.companybg').attr('style','');
					$('#company_erroricon').hide();
				}
				if(phone == '')
				{
					//errorMessage += '- Please enter phone.\n';
					cmnErr = true;
					$('.phonebg').css('border','solid 1px #ff0000');
					$('#phone_erroricon').show();
					$('#phone_erroricon').attr('data-content','Please enter first name.');
				}
				else
				{
					//cmnErr = false;
					$('.phonebg').attr('style','');
					$('#phone_erroricon').hide();
				}
				if(provider == '') {
					//errorMessage += '- Please select provider.\n';
					cmnErr = true;
					$('.providerbg').css('border','solid 1px #ff0000');
					$('#provider_erroricon').show();
					$('#provider_erroricon').attr('data-content','Please enter provider.');
				}
				else
				{
					//cmnErr = false;
					$('.providerbg').attr('style','');
					$('#provider_erroricon').hide();
				}
			
				/*if(cmnErr)
				{
					$('.errors').append('<div>Please fill out all the fields.</div>');					
				}
				if(emailErr)
				{
					$('.errors').append('<div>Email addresses of free services are not accepted. (e.g. @msn, @gmail, @yahoo)</div>');					
				}*/
				if(!cmnErr)
				{
					/*document.accForm.type.value='cr';
					document.accForm.submit();*/
					
					//$(container).find('.loading').remove();
                    $('#signup_now').append('<div class="loading"><p>Saving data....</p></div>');
					
					var str = $("#accForm").serialize();
					//alert(str);
                    $.ajax({
                        url:"<?php echo bloginfo('wpurl'); ?>/wp-admin/admin-ajax.php",
                        type:'POST',
                        data:'action=my_special_ajax_call&act=su&' + str,
                        success:function(results)
                        {
                            $('#signup_now').find('.loading').remove();
                            var res = results.split('=');	
                            if(res[0] == 1)
							{
								var str = res[1];
								//alert(str);
								if(str == 'You have entered wrong text for spam protection.')
                                	$('.errors').html('Please re-enter the CAPTCHA correctly');
								else
									$('.errors').html(str);
								return false;
							}
                            else if(res[0] == 0)
                            {
								//window.location = 'http://thisweek.makesbridge.com/congratulations?name=';
								document.accForm.submit();
								return true;
                            }
                        }
                    });
					return false;
				}
				else
					return false;
			}						
			
			function isValidPassword(value) {
			   if(value.charAt(0)==' ' || value.charAt(value.length-1)==' ' || value.indexOf("\\")>=0)
				 return false;
			
			  return true;
			}
			
			function isValidPass(string) {
			  if (string.search(/^.*(?=.{8,})(?=.*\d)(?=.*[A-Za-z]).*$/) != -1)
				return true;
			  else
					return false;
			}
			function submitDemoform()
			{
				var cmnErr = false;
				$('.erroricon').hide();
				var doption = $('#inquiry_option').val();
				var dfname = $('#demofname').val();
				var dlname = $('#demolname').val();
				var dcompany = $('#democompany').val();
				var demail = $('#demoemail').val();
				var dphone = $('#demophone').val();
				var dmessage = $('#demomessage').val();
				var challText = $('#uText1').val();
				
				if(doption == '')
				{
					//errorMessage += '- Please enter valid email address.\n';
					cmnErr = true;
					$('.demooptionbg').css('border','solid 1px #ff0000');
					$('#demoinqoptions_erroricon').show();
					$('#demoinqoptions_erroricon').attr('data-content','Please select type of inquiry.');
				}
				else if(doption == 'I have other questions')
				{
					if(dmessage == '')
					{					
						cmnErr = true;
						$('.demomessagebg').css('border','solid 1px #ff0000');
						$('#demomessage_erroricon').show();
						$('#demomessage_erroricon').attr('data-content','Please enter message.');
					}
					else
					{
						//cmnErr = false;
						$('.demomessagebg').attr('style','');
						$('#demomessage_erroricon').hide();
					}
				}
				else
				{
					//cmnErr = false;
					$('.demooptionbg').attr('style','');
					$('#demoinqoptions_erroricon').hide();
				}
				if(demail == '')
				{
					//errorMessage += '- Please enter valid email address.\n';
					cmnErr = true;
					$('.demoemailbg').css('border','solid 1px #ff0000');
					$('#demoemail_erroricon').show();
					$('#demoemail_erroricon').attr('data-content','Please enter email address.');
				}
				else if(isValidEmail(demail)==false)
				{
					//errorMessage += '- Please enter valid email address.\n';
					cmnErr = true;
					$('.demoemailbg').css('border','solid 1px #ff0000');
					$('#demoemail_erroricon').show();
					$('#demoemail_erroricon').attr('data-content','Please enter valid email address.');
				}
				else if(isEmail(demail)==false)
				{
					cmnErr = true;
					$('.demoemailbg').css('border','solid 1px #ff0000');
					$('#demoemail_erroricon').show();
					$('#demoemail_erroricon').attr('data-content','Email addresses of free services are not accepted. (e.g. @msn, @gmail, @yahoo)');
				}
				else
				{
					//cmnErr = false;					
					$('.demoemailbg').attr('style','');
					$('#demoemail_erroricon').hide();
				}
				if(dfname == '') {
					//errorMessage += '- Please enter first name.\n';
					cmnErr = true;
					$('.demofnamebg').css('border','solid 1px #ff0000');
					$('#demofname_erroricon').show();
					$('#demofname_erroricon').attr('data-content','Please enter first name.');
				}
				else
				{
					//cmnErr = false;
					$('.demofnamebg').attr('style','');
					$('#demofname_erroricon').hide();
				}
				if(dlname == '') {
					//errorMessage += '- Please enter last name.\n';
					cmnErr = true;
					$('.demolnamebg').css('border','solid 1px #ff0000');
					$('#demolname_erroricon').show();
					$('#demolname_erroricon').attr('data-content','Please enter last name.');
				}
				else
				{
					//cmnErr = false;
					$('.demolnamebg').attr('style','');
					$('#demolname_erroricon').hide();
				}
				if(dcompany == '')
				{
					//errorMessage += '- Please enter company.\n';
					cmnErr = true;
					$('.democompanybg').css('border','solid 1px #ff0000');
					$('#democompany_erroricon').show();
					$('#democompany_erroricon').attr('data-content','Please enter company.');
				}
				else
				{
					//cmnErr = false;
					$('.democompanybg').attr('style','');
					$('#democompany_erroricon').hide();
				}
				if(dphone == '')
				{
					//errorMessage += '- Please enter phone.\n';
					cmnErr = true;
					$('.demophonebg').css('border','solid 1px #ff0000');
					$('#demophone_erroricon').show();
					$('#demophone_erroricon').attr('data-content','Please enter phone number.');
				}
				else
				{
					//cmnErr = false;
					$('.demophonebg').attr('style','');
					$('#demophone_erroricon').hide();
				}				
				//alert(cmnErr);
				if(!cmnErr)
				{					
                    $('#demoform').append('<div class="loading"><p>Sending request....</p></div>');
					
					var str = $("#demoform").serialize();
					//alert(str);
                    $.ajax({
                        url:"<?php echo bloginfo('wpurl'); ?>/wp-admin/admin-ajax.php",
                        type:'POST',
                        data:'action=my_special_ajax_call&act=dr&' + str,
                        success:function(results)
                        {
                            $('#demoform').find('.loading').remove();
                            window.location = '<?php echo bloginfo('wpurl'); ?>/thank-you';
                        }
                    });
					return false;
				}
				else
					return false;
			}
        </script>
	
	
	<!-- START: Header -->
	<div class="main">
		<div class="main_wrap">
			<div class="header">
				<div class="left_header">
					<a target="_blank" href="#">
						<img class="img_logo" width="224" height="51" src="<?php echo bloginfo('wpurl'); ?>/emial_template/template/activationnewsletter2/img/mks_hd_logo.png" alt="Makesbridge" border="0" style="width: 224px;height: 51px;max-width: 224px;max-height: 51px;display: block;border: 0px;outline: none;text-decoration: none;">
					</a>
				</div>
				<div class="right_header">
					<div class="ctg_wrap">
						<img class="conn_img" width="237" height="20" src="<?php echo bloginfo('wpurl'); ?>/emial_template/template/activationnewsletter2/img/conn.png" alt="Connect to Grow " border="0" style="margin: 15px 0 0; width: 237px;height: 20px;max-width: 237px;max-height: 20px;display: block;border: 0px;outline: none;text-decoration: none;">
					</div>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</div>
	<!-- END: Header -->
	
	
	<!-- START: Module -->
	<div class="main" style="background: #ecf3fa;">
		<div class="main_wrap">
			<div class="fp_01" style="padding: 70px 0 30px;">
				<p style="  font-size: 36px;  color: #4292bb; text-align: center; font-family: 'proxima_nova_semibold', Arial, sans-serif;line-height: 37px;">Take 30 Days Free Trial</p>
			</div>
			
			<div class="fp_01" style="padding: 0px 0 0px;">
				<p style="  font-size: 24px;  color: #4292bb; text-align: center; font-family: 'proxima_nova_light', Arial, sans-serif;line-height: 37px;">Makesbridge '14 is the most user friendly interface ever. </p>
			</div>
			
			<div class="sign_up" style="margin: 57px 0 0px ! important;">
				<a href="#ssform" class="smooth_jump button_s">
					Try Now
				</a>
			</div>
			
			<div class="clear"></div>
		</div>
	</div>
	<!-- END: Module -->
	
	
	
	<!-- START: Module -->
	<div class="main" style="background: #ecf3fa;">
		<div class="main_wrap" style="padding: 70px 0 0;">
			<div class="fp_01">
				<div class="dashboard"><img src="http://d227d4nygip7u.cloudfront.net/pms/graphics/jayadams/dashboard22sds.png" alt="service"></div>
			</div>
			
			<div class="clear"></div>
		</div>
	</div>
	<!-- END: Module -->
	
	
	<!-- START: Module -->
	<div class="main" style="background: #ffffff;">
		<div class="main_wrap" style="padding: 50px 0 40px;">
			<div class="fp_01">
				<p style="font-size: 37px;  color: #4799c3; text-align: center;font-family: 'proxima_nova_bold', Arial, sans-serif;line-height: 44px;margin: 0 0 26px;">One platform that gives you all.</p>
			</div>
			
			<div class="fp_01">
				<p style="font-size: 22px;  color: #7f9bae; text-align: center;font-family: 'proxima_nova_light', Arial, sans-serif;line-height: 26px;margin: 0px 0 60px;">Point and shoot email marketing with powerful features,<br>intuitive interface, unbeatable value and 4.9/5 rated customer support.</p>
			</div>
			
			<div class="vdtour">
				<a href="<?php bloginfo('siteurl');?>/video-tutorials" class="button_vd">
					Video Tour
				</a>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<!-- END: Module -->
	
	
	
	
	<!-- START: Module -->
	<div class="main" style="background: #ecf3fa;">
		<div class="main_wrap" style="padding: 50px 0 40px;">
			
			<div class="fp_01">
				<p style="font-size: 22px;  color: #4799c3; text-align: center;font-family: 'proxima_nova_light', Arial, sans-serif;line-height: 26px;margin: 0px 0 40px;">Sales staff can cherry pick leads from a simple interactive display.<br>Set up automated tasks to put dozens of efficient workers on the job 24/7.</p>
			</div>
			
			<div class="fp_01">
				<div class="dashboard"><img src="http://d227d4nygip7u.cloudfront.net/pms/graphics/jayadams/contact.png" alt="service"></div>
			</div>
			
			<div class="fp_01">
				<p style="font-size: 35px;  color: #4292bb; text-align: center;font-family: 'proxima_nova_simibold', Arial, sans-serif;line-height: 26px;margin: 53px 0 32px;">Features of the trial account:</p>
			</div>
			
			<div class="fp_01" style="width: 42%;margin: auto auto;">
				<ul style="list-style-position: inside;list-style-type: circle;font-size: 26px;line-height: 31px;color: #7f9bae;">
					<li>500 subscribers can be uploaded</li>
					<li>3 campaigns</li>
					<li>5 target lists</li>
					<li>1 workflow</li>
					<li>5 templates</li>
				</ul>
			</div>
			
			<div class="clear"></div>
		</div>
	</div>
	<!-- END: Module -->
	
	
	
	
	<div class="main" style="background: #ffffff;">
		<div class="main_wrap" style="padding: 77px 0 83px;">
			
			<div class="fp_01">
				<p style="font-size: 37px;  color: #56c74d; text-align: center;font-family: 'proxima_nova_simibold', Arial, sans-serif;line-height: 26px;margin: 0px 0 17px;">Free for 30 days.</p>
			</div>
			
			<div class="sign_up" style="margin: 44px 0 0px ! important;">
				
				<a href="#ssform" class="smooth_jump button_s">
					Try Now
				</a>
			</div>
	
			<div class="clear"></div>
		</div>
	</div>
	
	

	
	<!-- START: Module -->
	<div id="ssform" class="main" style="background: #ffffff;">
		<div class="main_wrap" style="padding: 50px 0 40px;">
			    <div id="requestdemo_sec1">
				  <div class="requestdemo_sec1_left">
						<h2>To learn more about any of these offers,<br>please provide your contact details below.</h2>
						<div class="wrap_newform">
							<form id="demoform" class="form" method="post">
                            <div class="forminputbg demoinputbg demooptionbg">
                                <label>Please select</label>
                                <!--<textarea name="demomessage" id="demomessage" placeholder="Examples: Why is your CRM integration better than others? - OR - I'd like to see how your marketing tools suit my needs."></textarea>-->
                                <select name="inquiry_option" id="inquiry_option" style="width:285px;" onchange="toggleField()">
                                	<option value="">Choose</option>
                                    <option value="I am interested in the Highrise offer">I am interested in the Highrise offer</option>
                                    <option value="I am interested in the DataTrim offer">I am interested in the DataTrim offer</option>
                                    <option value="I am interested in the free CRM consultancy offer">I am interested in the free CRM consultancy offer</option>
                                    <option value="I have other questions">I have other questions</option>
                                </select>
                                <span id="demoinqoptions_erroricon" class="erroricon" data-placement="right" data-trigger="hover" data-toggle="popover" data-original-title="" title=""></span>
                                <div class="clear"></div>
							</div>
							<div id="inquiry" class="demoinputbg demotabg demomessagebg" style="display:none;">
                                <label>Inquiry</label>
                                <textarea name="demomessage" id="demomessage" placeholder="Examples: Why is your CRM integration better than others? - OR - I'd like to see how your marketing tools suit my needs."></textarea>                            
                                <span id="demomessage_erroricon" class="erroricon" data-placement="right" data-trigger="hover" data-toggle="popover" data-original-title="" title=""></span>
                                <div class="clear"></div>
							</div>
							<div class="forminputbg demoinputbg demofnamebg">
							<label>First Name</label>
							<input type="text" name="demofname" id="demofname">
							<span id="demofname_erroricon" class="erroricon" data-placement="right" data-trigger="hover" data-toggle="popover" data-original-title="" title=""></span>
							<div class="clear"></div>
							</div>
							<div class="forminputbg demoinputbg demolnamebg">
							<label>Last Name</label>
							<input type="text" name="demolname" id="demolname">
							<span id="demolname_erroricon" class="erroricon" data-placement="right" data-trigger="hover" data-toggle="popover" data-original-title="" title=""></span>
							<div class="clear"></div>
							</div>
							<div class="forminputbg demoinputbg demoemailbg">
							<label>Work Email</label>
							<input type="text" name="demoemail" id="demoemail">
							<span id="demoemail_erroricon" class="erroricon" data-placement="right" data-trigger="hover" data-toggle="popover" data-original-title="" title=""></span>
							<div class="clear"></div>
							</div>
							<div class="forminputbg demoinputbg demophonebg">
							<label>Phone No</label>
							<input type="text" name="demophone" id="demophone">
							<span id="demophone_erroricon" class="erroricon" data-placement="right" data-trigger="hover" data-toggle="popover" data-original-title="" title=""></span>
							<div class="clear"></div>
							</div>
							<div class="forminputbg demoinputbg democompanybg">
							<label>Company</label>
							<input type="text" name="democompany" id="democompany">
							<span id="democompany_erroricon" class="erroricon" data-placement="right" data-trigger="hover" data-toggle="popover" data-original-title="" title=""></span>
							<div class="clear"></div>
							</div>
							<div class="demo_submit" onclick="submitDemoform()">Submit</div>
							<div class="clear"></div>
							<div class="errors"></div>
							<div class="clear"></div>
							</form>
						</div>
					</div>
				</div>
			<div class="clear"></div>
		</div>
	</div>
	<!-- END: Module -->



	
	<!-- START: Module -->
	<div class="main" style="background: #4292bb;">
		<div class="main_wrap" style="padding: 47px 0;">
			<div class="fp_01">
				<center><img class="img_footer" width="234" height="56" src="<?php echo bloginfo('wpurl'); ?>/emial_template/template/crm/img/logo_footer.png" alt="" border="0" style="width: 234px;height: 56px;max-width: 234px;max-height: 56px;border: 0px;outline: none;text-decoration: none; margin: 0 0 30px;"></center>
				
				<div class="sicon_line" style="width: 246px;margin: auto auto;">
					<div class="phone_icon"></div>
					<div class="icon_text" style="padding: 2px 0 0;">408 740 8224 | 866 991 SAAS (7227)</div>
					<div class="clear"></div>
				</div>
				
				<div class="sicon_line" style="width: 349px;margin: auto auto;">
					<div class="sup_icon"></div>
					<div class="icon_text"><a target="_blank" href="#" style="border: none;-webkit-text-size-adjust: none;text-decoration: none;color: #ffffff;">sales@makesbridge.com</a> | <a target="_blank" href="#" style="border: none;-webkit-text-size-adjust: none;text-decoration: none;color: #ffffff;">support@makesbridge.com</a></div>
					<div class="clear"></div>
				</div>
				
				<div class="sicon_line" style="width: 359px;margin: auto auto;">
					<div class="add_icon"></div>
					<div class="icon_text" style="padding: 2px 0 0;">14435 Big Basin Way, # 122 Saratoga Village, CA 95070</div>
					<div class="clear"></div>
				</div>
				
			</div>
		</div>
	</div>
	<!-- END: Module -->
	
	
	
	<!-- START: Module -->
	<div class="main" style="background: #3b82a6;">
		<div class="main_wrap" style="padding: 47px 0;">
			<div class="fp_01">
				<p style="  font-size: 14px;  color: #ffffff; text-align: center; line-height: 20px;">Copyright 2014 &copy; Makesbridge</p>
			</div>
		</div>
	</div>
	<!-- END: Module -->
	

<div id="up"></div>

</body>
</html>