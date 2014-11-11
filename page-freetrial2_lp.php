<?php
/* Template Name: Free Trial 2 (LP) */
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
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/free_trial.css" media="screen" />

		
		
        
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        
        <!-- Add fancyBox main JS and CSS files -->
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/source/jquery.fancybox.js?v=2.1.4"></script>
		<!--<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.js"></script>-->
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.js"></script>
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/docs.js"></script>
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/js/source/jquery.fancybox.css?v=2.1.4" media="screen" />
				
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
				$(".newfancybox_form").fancybox({
					padding: 0,

					openEffect : 'elastic',
					openSpeed  : 300,

					closeEffect : 'elastic',
					closeSpeed  : 300,

					helpers : {
						overlay : {
							closeClick: false,
							css : {
								'background' : 'rgba(230, 239, 243, 0.9)'
							}
						}
					}
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
	<div id="ssform" class="main" style="background: #ecf3fa;">
		<div class="main_wrap" style="padding: 50px 0 40px;">
			    <div class="fform2">
					
					<form method="post" name="accForm" style="width:100%; margin:auto;" action="<?php echo bloginfo('wpurl'); ?>/congratulations" onsubmit="return validateAccountForm();" class="formStyle1" id="accForm">
					<div style="position: relative; margin-top:0px;" class="form">
					<table width="100%" cellspacing="0" cellpadding="2" border="0">
					<tbody>
					<tr>
						<td style="height:15px;" colspan="2">
						<div class="errors"></div>
						</td>
					</tr>
					<tr>
						<td valign="top" style="width:50%; vertical-align:top;">
							<div style="color:#5fa6cb; margin-top:10px; padding:0;" class="formhead">Free 30-Day Trial</div>
							<div class="formcontent">Please fill out the form below to get started.<br></div>
							<div style="left: 33px;" class="dpmarketing" id="supop">
							<div class="menu_indicator"> </div>
							<div class="popcontent">
							<strong>We will use this information to optimize your trial experience. And, you may be eligible to receive a special offer such as:</strong>
							<ul>
							<li>We pay a marketing and sales consultant to give a boost to your business plan. (up to $2,500.00)</li>
							<li>We pay a certified consultant in our global network to help you with CRM planning. (5 hours )</li>
							<li>We pay your subscription to a premium complimentary software product, such as a CRM tool.</li>
							<li>An early exit incentive from a competitor's contract.</li>						
							<li>And many other premium bundles!</li>
							</ul>
							</div>
							</div>
						</td>
					</tr>
					<tr>
						<td style="height:15px;" colspan="2"></td>
					</tr>
					<tr>
					<td style="width: 45%;float: left;">
					<div class="forminputbg fnamebg finputl">
					<label>First Name</label>
					<input type="text" id="fname" name="fname">
					<span data-toggle="popover" data-trigger="hover" data-placement="right" class="erroricon" id="fname_erroricon" data-original-title="" title=""></span>
					<div class="clear"></div>
					</div>
					<div class="forminputbg lnamebg finputl">
					<label>Last Name</label>
					<input type="text" id="lname" name="lname">
					<span data-toggle="popover" data-trigger="hover" data-placement="right" class="erroricon" id="lname_erroricon" data-original-title="" title=""></span>
					<div class="clear"></div>
					</div>
					<div class="forminputbg phonebg finputl">
					<label>Phone No</label>
					<input type="text" id="phone" name="phone">
					<span data-toggle="popover" data-trigger="hover" data-placement="right" class="erroricon" id="phone_erroricon" data-original-title="" title=""></span>
					<div class="clear"></div>
					</div>
					<div class="forminputbg companybg finputl">
					<label>Company</label>
					<input type="text" id="company" name="company">
					<span data-toggle="popover" data-trigger="hover" data-placement="right" class="erroricon" id="company_erroricon" data-original-title="" title=""></span>
					<div class="clear"></div>
					</div>
					<div class="forminputbg emailbg finputl">
					<label>Work Email</label>
					<input type="text" style="width:347px;" id="email" name="email">
					<span data-toggle="popover" data-trigger="hover" data-placement="right" class="erroricon" id="email_erroricon" data-original-title="" title=""></span>
					<div class="clear"></div>
					</div>
					<div style="margin:-5px 0 15px 10px; clear:both;" class="workemailhelp"><a style="font-style:italic; 
					color:#31cbff; font-size:13px; letter-spacing:1px; cursor:pointer;" data-toggle="popover" data-content="For security reasons we do not provision trials to anonymous email addresses such as gmail, yahoo, and hotmail." data-trigger="hover" data-placement="bottom" data-original-title="" title="">Why must I use a work email?</a> 
					</div>
					</td>
					<td valign="top" style="width: 45%;float: right;margin: 0 25px 0 0;">
					<div class="forminputbg providerbg">
					<label>Current provider?</label>
					<select onchange="toggleField()" id="provider" name="provider">
					<option value="">Choose</option>
					<option value="Constant Contact">Constant Contact</option>
					<option value="Exact Target">Exact Target</option>
					<option value="Eloqua">Eloqua</option>
					<option value="Mail Chimp">Mail Chimp</option>
					<option value="Marketo">Marketo</option>
					<option value="Vertical Response">Vertical Response</option>
					<option value="Other">Other (please enter)</option>
					</select>
					<span data-toggle="popover" data-trigger="hover" data-placement="left" class="erroricon" id="provider_erroricon" data-original-title="" title=""></span>
					<div class="clear"></div>
					<input type="text" style="display:none;" id="othertext" name="othertext">
					</div>
					<div style="margin:-5px 0 15px 10px; clear:both;"><a style="font-style:italic; 
					color:#31cbff; font-size:13px; letter-spacing:1px;" onmouseout="hidepop('supop');" onmouseover="showpop('supop')" class="openpop">Why do we need this information?</a> 
					</div>             
					<div class="forminputbg pwdbg">
					<label>Password</label>
					<input type="password" id="pwd" name="pwd">
					<span data-toggle="popover" data-trigger="hover" data-placement="left" class="erroricon" id="pwd_erroricon" data-original-title="" title=""></span>
					<div class="clear"></div>
					</div>
					<div style="margin:-5px 0 15px 10px; clear:both;" class="workemailhelp"><a onmouseout="hidepop('pwdpop');" onmouseover="showpop('pwdpop')" style="font-style:italic; 
					color:#31cbff; font-size:13px; letter-spacing:1px; cursor:pointer;">password requirements</a> 
					<div class="dpmarketing" id="pwdpop">
					<div class="menu_indicator"> </div>
					<div class="popcontent">
					<ul>
					<li>Password must contain at least 8 characters.</li>
					<li>Space and backslash characters are not allowed.</li>
					<li>Password must have at least one letter and one number.</li>
					</ul>
					</div>
					</div>
					</div>
					<div class="forminputbg pwd2bg">
					<label>Confirm Password</label>
					<input type="password" style="width:306px;" id="pwd2" name="pwd2">
					<span data-toggle="popover" data-trigger="hover" data-placement="left" class="erroricon" id="pwd2_erroricon" data-original-title="" title=""></span>
					<div class="clear"></div>
					</div>
					<img border="1" style="" src="http://www.bridgemailsystem.com/pms/challenge?c=_DEFAULT" id="image">
					<div style="" class="forminputbg scbg">
					<label>Security Code: </label><input type="text" style="width:327px;" tabindex="13" name="uText" id="uText">  
					<input type="hidden" value="_DEFAULT" name="chValue" id="chValue">  
					<span data-toggle="popover" data-trigger="hover" data-placement="left" class="erroricon" id="uText_erroricon" data-original-title="" title=""></span>
					<br>
					<br>
						<a class="pop_termslink newfancybox_form" href="#infoterm_content" style="text-decoration: none; color: #5fa6cb;">
							By submitting this information you agree to our Terms of Service
						</a>
						<div id="infoterm_content" style="width:1024px; height:420px; display: none; overflow-y: scroll; padding: 30px;color: #4292bb; -webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;"><!-- START:pkg MODAL -->
							
    
							<h2>MAKESBRIDGE TECHNOLOGY, INC. TERMS OF SERVICE, USE AND POLICIES.</h2>
							<p><strong>ACCEPTANCE OF TERMS</strong><br>
							Your use of Makesbridge Technology, Inc.'s services, products, software and Website(s) (referred to collectively as "Services"), excluding any services provided to you (the "User") by Makesbridge Technology, Inc. under a separate written agreement, is subject to the terms as a legal agreement between you and Makesbridge Technology, Inc. "Makesbridge Technology, Inc." means Makesbridge Technology, Inc., Inc., whose principal place of business is located at 14435 Big Basin Way #122 Saratoga Village, CA USA.Unless otherwise agreed in writing with Makesbridge Technology, Inc., your Agreement with Makesbridge Technology, Inc. will always include, at a minimum, the terms and conditions set out in this document. In order to use the Services, you MUST first agree to the Terms. You may not use the Services if you do not accept the Terms. You can accept the Terms by:(A) clicking "I Accept" where this option is made available to you by Makesbridge Technology, Inc. at makesbridge.com or in the user interface for any Service; or (B) by actually using the Services. In this case, you understand and agree that Makesbridge Technology, Inc. will treat your use of the Services as acceptance of the Terms from that point forward. You may not use the Services and may not accept the Terms if (a) you are not of legal age to form a binding contract with Makesbridge Technology, Inc., or (b) you are a person barred from receiving the Services under the laws of the United States or other countries including the country in which you are resident or from which you use the Services. Before you continue, you should print off or save a local copy of the Terms for your records.</p>
							<p><strong>SERVICE AGREEMENT</strong><br>
							This Service Agreement ("Agreement") is a legal contract between you (the "User") and us ("Makesbridge Technology, Inc."). This Agreement governs User subscription and use of the Makesbridge Technology, Inc. online Website service (the "Service") and incorporates all Terms as applicable. User use of the Service is conditional on acceptance of this Agreement. By using any Service and/or by subscribing to any Service, User accepts and agrees to be bound by all the terms and conditions of this Agreement, as well as any additional terms specific to the particular Service for which User registers. User use of Service and/or clicking the "submit" button for the 15 Day Trial Request form acts as a digital signature, creating a binding Service Agreement and legal contract between User and Makesbridge Technology, Inc.. Your Agreement with Makesbridge Technology, Inc. includes the terms of any Legal Notices applicable to the Services. Where additional terms and/or policies apply to a Service, these will be accessible for you to read either within, or through your use of, that Service. All terms and policies, together with any additional terms, form a legally binding agreement between you and Makesbridge Technology, Inc. in relation to your use of the Services. Collectively, this legal agreement is referred to as the "Terms." It is important that you take the time to read them carefully. If there is any contradiction between what the Terms say and what any additional terms or policies say, then the most current Terms shall take precedence in relation to that Service.</p>
							<p><strong>SERVICES.</strong> Makesbridge Technology, Inc. will provide User with the Service for which User registers on Makesbridge Technology, Inc.'s Website, subject to the terms and conditions of this Agreement. User acknowledges that the Service may be offered in various separately priced service levels or packages ("Service Packages"), and User will only receive the Service Plan(s) that User has registered for, and for which User is paying all associated fees. No Service may be used by the User to send unsolicited email; also known as spam.</p>
							<p>User is required to maintain an email privacy policy on its website and adhere to all federal laws including the CAN-SPAM Act. In addition, Users is required to be knowledgeable and at all times compliant with all privacy and data protection laws applicable to its location and operations, such as, by way of example, the European Union Data Protection Directive and member state implementations thereof.</p>
							<p><strong>SERVICE DEFINITION.</strong> Service is defined as use of email marketing tools, the real-time Web analytics statistical reporting service, tools and programs provided by Makesbridge Technology, Inc. on a subscription basis. The Makesbridge Technology, Inc. service covered herein is located on the Internet at <a href="<?php echo bloginfo('wpurl'); ?>">http://www.makesbridge.com</a>.</p>
							<p><strong>SERVICE ACTIVATION:</strong> By definition, service is activated on account set up, which electronically occurs once the Terms Agreement has been digitally signed by way of completion of the online sign-up form and the secure form is sent. Once the form is sent, all applicable terms, use and service agreements has begun. MakesBridge Technology reserves the right to grant Trial Account to any User, Company or Individual for any reason without explanation.</p>
							<p><strong>ANTI-SPAM POLICY:</strong> Users may not send email to any email address that has not explicitly opted-in to receiving email from the User.</p>
							<p><strong>TRIAL SERVICE.</strong> If approved for a Trial Account, the Trial Account access to BridgeMail System and SAM for a period of 15 Days. (Trial Period).</p>
							<p><strong>ACCEPTANCE.</strong> MakesBridge Technology reserves the right to grant Trial Account to any User, Company or Individual for any reason without explanation.</p>
							<p><strong>REGISTRATION PROCESS.</strong> To sign up for or receive any Service, User must submit and maintain on file with Makesbridge Technology, Inc. certain registration data, which shall include the information requested on Makesbridge Technology, Inc.'s online registration and subscription forms. Such registration data shall include, but not be limited to, User name, address, phone number, e-mail address, Website URL(s), credit card number and other billing information. Makesbridge Technology, Inc. reserves the right, in its sole discretion, to refuse and/or terminate any registration or Service activation request for any reason or no reason, and shall not be obligated to provide any Service to User unless and until it has charged User's credit card and received full payment of the applicable fee(s). Makesbridge Technology, Inc.'s use of User registration information is governed by Makesbridge Technology, Inc.'s privacy policy.</p>
							<p><strong>MAILING LIST OPT-IN/OPT-OUT.</strong> By registering, you agree to be added to Makesbridge Technology, Inc.'s promotional mailings and e-mail updates. You always have the option of opting out (removing yourself from such mailings) by signing in to your account preferences and unchecking the appropriate box provided.</p>
							<p><strong>AGREEMENT TERM.</strong> This Agreement commences on the date access credentials are provided to the User and shall continue for 15 Days (Trial Period) unless MakesBridge grants and extension of the Trial Period to User.</p>
							<p><strong>CHANGES AND MODIFICATIONS.</strong> Additional modifications to these terms and conditions may be made in special circumstances, but only if approved in advance in a signed writing on Makesbridge Technology, Inc.'s letterhead by a duly authorized management-level Makesbridge Technology, Inc. official. Product sales and support representatives or sales agents are not authorized to waive or modify any provisions of this Agreement. No failure by Makesbridge Technology, Inc. to enforce any term of this Agreement shall be construed as a waiver thereof, nor shall it affect User obligations or Makesbridge Technology, Inc.'s rights and remedies hereunder.</p>
							<p><strong>DURATION AND CANCELLATION OF SERVICES.</strong> The term of this Agreement will begin on the date that Makesbridge Technology, Inc. Makesbridge Technology, Inc. also reserves the right to cancel any individual Service immediately and without notice in the event that User breach any provision of this Agreement or any other terms that apply to the Service. NO REFUNDS WILL BE AVAILABLE ON ACCOUNT OF ANY SERVICE CANCELLATION BY EITHER PARTY, EXCEPT AS EXPRESSLY PROVIDED IN THE SECTION ENTITLED "REFUNDS" HEREIN.</p>
							<p>Either party shall have the right to terminate this Agreement if the other party breaches a material term under this Agreement and fails to cure such breach within thirty (30) calendar days after receipt of written notice describing the breach in reasonable detail, or if the other party becomes bankrupt, insolvent or there is a substantial change in ownership of either party.</p>
							<p>All remaining terms of this Agreement shall survive and remain in effect notwithstanding any termination of this Agreement. If this agreement is terminated by Makesbridge Technology, Inc. or by User for any reason, User agrees to remove Makesbridge Technology, Inc. code, "snippet," logos and trademarks and any other parts of the Service from all of User Websites and other items. If User does not remove all Makesbridge Technology, Inc. code and snippet, the snippet will convert to an image publicly displaying "powered by Makesbridge Technology, Inc." or a similar message as long as the snippet remains on the site.<br>
							In circumstances beyond Makesbridge Technology, Inc.'s control, including but not limited to equipment failure, acts of nature, disaster or third party actions, Makesbridge Technology, Inc. will be held blameless and harmless against legal action for the discontinuance of service.</p>
							<p><strong>User PROMISES AND OBLIGATIONS.</strong> AS A CONDITION OF RECEIVING ANY SERVICES, YOU PROMISE, REPRESENT AND WARRANT THE FOLLOWING: (a) All of the registration information User supplies to Makesbridge Technology, Inc. is true, complete and accurate, and User will notify Makesbridge Technology, Inc. of any changes to User registration data during the term of this Agreement and submit updated information within twenty (20) days of any such changes; (b) None of the URLs User submits to Makesbridge Technology, Inc. link to any Web page or site that contains any: (i) nudity, pornography or other sexually-explicit material; (ii) hate propaganda or material that encourages or promotes illegal activity or violence; (iii) content that violates or infringes in any way upon the statutory, common law, or proprietary rights of others, including but not limited to copyrights, trademark rights, patents or any other third party intellectual property, contract, privacy or publicity rights; (iv) material that promotes or utilizes software or services designed to illicitly deliver e-mail; (v) material that violates any local, state or national law or regulation; (vi) misrepresentations or material that is threatening, abusive, harassing, defamatory, obscene, profane, indecent or otherwise objectionable, offensive or harmful; or (vii) other material that Makesbridge Technology, Inc., in its sole discretion, deems inappropriate, including any violations of standards posted on Makesbridge Technology, Inc.'s Website or sent to User by e-mail. (c) You will safeguard account information and password by not disclosing it to any third party, and User will assume responsibility for any and all harm or liability attributable to User or any other person accessing User account or any Service with User account information and password; (d) You will not copy, sell, redistribute, license, sublicense, or otherwise transfer User account, or any materials provided to User in connection with the Service, to any third party without Makesbridge Technology, Inc.'s written consent; (e) You will treat any and all consumer information gathered for User or transmitted to User via the Makesbridge Technology, Inc. Website or Service in accordance with Makesbridge Technology, Inc.'s Privacy Policy; (f) You will comply with all federal laws and regulations governing User actions under this Agreement; (g) You have full power and authority to enter into this Agreement and to perform User obligations hereunder; (h) You will post and maintain a Privacy Policy, and (i) You will maintain an email privacy policy on your website and adhere to all federal laws including the CAN-SPAM Act. In addition, you will be knowledgeable and at all times compliant with all privacy and data protection laws applicable to its location and operations, such as, by way of example, the European Union Data Protection Directive and member state implementations thereof.</p>
							<p>Without limiting its other remedies, Makesbridge Technology, Inc. may refuse or cancel User account or Service at any time for any violation of the foregoing promises. To assure compliance with the criteria in Subsection (b) Makesbridge Technology, Inc. reserves the right to monitor the content of the Web pages or sites that correspond to the URLs User submits to Makesbridge Technology, Inc. MakesBridge Technology is not responsible for User's compliance with Federal Laws or Privacy and Data Protection requirements set forth in applicable laws to Users location of operation and the location of individuals being hosted by MakesBridge Technology, Inc. servers.</p>
							<p>You represent, covenant, and warrant that you will use the Services only in compliance with the Agreement and all applicable laws (including but not limited to policies and laws related to spamming, privacy, obscenity, or defamation). You agree you will not access or otherwise use third party mailing lists in connection with preparing or distributing unsolicited email to any third party. You hereby agree to indemnify and hold harmless Makesbridge Technology, Inc. against any damages, losses, liabilities, settlements, and expenses (including without limitation costs and reasonable attorneys' fees) in connection with any claim or action that arises from an alleged violation of the foregoing or otherwise arising from or relating to your use of the Services. Although Makesbridge Technology, Inc. has no obligation to monitor the content provided by you or your use of the Services, Makesbridge Technology, Inc. may do so and may remove any such content or prohibit any use of the Services it believes may be (or is alleged to be) in violation of the foregoing.</p>
							<p>Every email message sent in connection with the Services must contain an "unsubscribe" link that allows visitors to remove themselves from your mailing list. You acknowledge and agree that you will not remove, disable or attempt to remove or disable the unsubscribe link. You agree to only email to contacts that are relevant to the particular sectors and products within which you operate (note: purchased lists may not be used, please contact Makesbridge Technology, Inc. if you have questions). You cannot mail to distribution lists, newsgroups, or spam email addresses. You cannot copy a Makesbridge Technology, Inc. template and use the design for purposes other than sending emails from Makesbridge Technology, Inc.. Makesbridge Technology, Inc., at its own discretion, may immediately disable your access without refund to the Services if Makesbridge Technology, Inc. believes in its sole discretion that you have violated any of the restrictions listed above.</p>
							<p>The Services may only be used for lawful purposes. Transmission or solicitation of any material that violates United States federal, state or other laws that may apply in this jurisdiction or your local area is prohibited. This may include material that is obscene, threatening, harassing, libelous, or in any way a violation of intellectual property laws or a third party's intellectual property rights.<br>
							For every email message sent in connection with the Services, you acknowledge and agree that the Services may automatically add an identifying footer stating "Powered by BridgeMail System" or a similar message. You agree to cooperate with and provide reasonable assistance to Makesbridge Technology, Inc. in promoting and advertising the Services.</p>
							<p>In using the varied features of the Services, you may provide information (such as name, contact information, or other registration information) to Makesbridge Technology, Inc.. Makesbridge Technology, Inc. may use this information and any technical information about your use of the Services to tailor its presentations to you, facilitate your movement through the Service, or communicate separately with you. If you licensed the Services as a result of solicitation by a Marketing Partner of Makesbridge Technology, Inc., Makesbridge Technology, Inc. may share your results data and information with the Marketing Partner. Makesbridge Technology, Inc. will not provide information to companies you have not authorized, and Makesbridge Technology, Inc. will not permit the companies that get such information to sell and redistribute it without your prior consent.</p>
							<p>Makesbridge Technology, Inc. will not use your subscriber list or any other subscriber information for any other purposes than those intended with the service. Your subscriber data is classified as Sensitive Data and will be handled according to Makesbridge Technology's Data Handling policy. Your User information will not be shared with any other parties. In addition, Makesbridge Technology, Inc. will not use your User information for the purpose of sending unsolicited commercial e-mail.<br>
							You will adopt and maintain an Email Privacy Policy.</p>
							<p><strong>MODIFICATIONS TO USE OF SERVICE.</strong> User will make no efforts to misuse Makesbridge Technology, Inc. services or data, including but not limited to reverse engineering of the software/programming/data, share services with unauthorized parties, use data to hack, spam or illegally manipulate in any way whatsoever, and/or make any modifications or enhancements without Makesbridge Technology, Inc.'s express written consent.</p>
							<p>Makesbridge Technology, Inc. may, at any time and without notice, perform service, update or add to the Web analytics services and reporting tools. Makesbridge Technology, Inc. is not obligated to include new functions or improved services that are not covered within this Agreement and is free to make that decision on a "per User, per circumstance" basis.</p>
							<p><strong>USE OF CODE "SNIPPET."</strong> Makesbridge Technology, Inc. relies on the use of a specific and custom code "snippet" placed in User Web page(s) files. Subject to User compliance with all the terms of this Agreement, Makesbridge Technology, Inc. grants User permission to use the code supplied to User by Makesbridge Technology, Inc. (the "Code") solely for User use in receiving the Service for which User has paid. User agrees to follow all instructions and restrictions provided by Makesbridge Technology, Inc. with respect to User use of the Code. In addition, User agrees that at the termination of Service for whatever reason, User will remove the snippet from all their Web pages and use. User acknowledges that, if the snippet is not removed upon discontinuance of Service, the snippet will convert to an image displaying a "powered by Makesbridge Technology, Inc." message that will be visible on the User's Web page. This image will remain until the snippet is removed. User AGREES THAT MAKESBRIDGE TECHNOLOGY, INC. WILL NOT BE RESPONSIBLE FOR ANY MALFUNCTIONS, ERRORS, DATA INACCURACIES OR IMPROPER RESULTS ATTRIBUTABLE TO USE OR LACK THEREOF OF ANY CODE, WHETHER USED CORRECTLY, INCORRECTLY OR BY UNAUTHORIZED OR UNSUPPORTED USE OF ANY CODE.</p>
							<p><strong>OWNERSHIP RIGHTS.</strong> User and/or User agrees that the Service and all graphic designs, icons, HTML, code, computer programming, software and other elements incorporated therein are the exclusive property of Makesbridge Technology, Inc. In addition, User/User acknowledges that Makesbridge Technology, Inc. owns all rights, title and interest in and to Makesbridge Technology, Inc.'s trademarks, trade names, service marks, inventions, copyrights, trade secrets, patents, technology, software, code, snippet and know-how related to the design, function or operation of the Service. User rights to the Service are strictly limited to the rights expressly granted in this Agreement.</p>
							<p>Furthermore, Makesbridge Technology, Inc. agrees that all User Web statistics, tracking data and Website visitor usage information captured during Service is User's sole property, and that Makesbridge Technology, Inc. will not use, sell, or otherwise leverage User's statistical data for any purposes outside of those stated within this Agreement without written permission from User. Data collected by Makesbridge Technology, Inc. within the terms of this Agreement is private and will not be shared or disclosed in whole or in part to any other party.</p>
							<p>Makesbridge Technology, Inc.'s use of User registration information is governed by Makesbridge Technology, Inc.'s privacy policy.</p>
							<p><strong>PUBLICITY.</strong> Makesbridge Technology, Inc. has permission and may include Customer's Website(s) domain name and logo on its customer lists, testimonials and press releases.</p>
							<p><strong>DISCLAIMER OF WARRANTY.</strong> Makesbridge Technology, Inc. makes no guarantees of any kind regarding the use or the results derived from any Service in terms of dependability, accuracy, security, timeliness, availability, reliability or usefulness. The Service and all related materials, including report data, are provided "AS IS" without warranty or guarantee of any kind. MAKESBRIDGE TECHNOLOGY, INC. HEREBY DISCLAIMS ALL WARRANTIES, EXPRESS OR IMPLIED, WITH REGARD TO THE SERVICES AND RELATED MATERIALS, INCLUDING ALL IMPLIED WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NON-INFRINGEMENT. MAKESBRIDGE TECHNOLOGY, INC. DOES NOT WARRANT THAT THE OPERATION OF THE SERVICES WILL BE UNINTERRUPTED OR ERROR-FREE, OR THAT THE SERVICES WILL BE SUITABLE FOR YOUR NEEDS OR YOUR INTENDED APPLICATIONS, OR THAT THE SERVICES WILL BE COMPATIBLE WITH OR OPERATE IN THE HARDWARE, SOFTWARE, OR WEBSITE CONFIGURATIONS THAT YOU SELECT.<br>
							WARRANTY AND REMEDY LIMITATIONS. MAKESBRIDGE TECHNOLOGY, INC. WARRANTS THAT THE SERVICE, WHEN PROPERLY USED, WILL OPERATE AS PRESENTED AND DESCRIBED AND THAT User WILL BE NOTIFIED OF UPGRADES AND CHANGES TO THE SYSTEM. MAKESBRIDGE TECHNOLOGY, INC.'S ENTIRE LIABILITY AND User'S SOLE AND EXCLUSIVE REMEDY FOR BREACH OF THE FOREGOING WARRANTY SHALL BE MAKESBRIDGE TECHNOLOGY, INC.'S OPTION TO EXTEND SERVICE TIME AT NO ADDITIONAL COST TO COMPENSATE FOR LOST ACTIVITY TIME. IF User IS DISSATISFIED WITH ANY PORTION OF ANY SERVICE, User'S SOLE AND EXCLUSIVE REMEDY IS TO CANCEL User ACCOUNT OR User SUBSCRIPTION TO THE GIVEN SERVICE ACCORDING TO THIS AGREEMENT. NO REFUNDS ARE AVAILABLE.<br>
							LIMITATION OF LIABILITY. IN NO EVENT WILL MAKESBRIDGE TECHNOLOGY, INC. BE LIABLE TO User OR ANY THIRD PARTY FOR ANY CONSEQUENTIAL, INCIDENTAL, SPECIAL, OR INDIRECT DAMAGES OF ANY KIND OR NATURE, INCLUDING BUT NOT LIMITED TO LOSS OF INCOME, LOSS OR DAMAGE OF DATA, AND DAMAGE TO BUSINESS REPUTATION, UNDER ANY THEORY OF LAW OR EQUITY, AND WHETHER OR NOT MAKESBRIDGE TECHNOLOGY, INC. IS NOTIFIED OF THE POSSIBILITY OF SUCH DAMAGES. NEITHER PARTY SHALL BE LIABLE TO THE OTHER FOR INDIRECT, SPECIAL, CONSEQUENTIAL OR INCIDENTAL DAMAGES, INCLUDING LOSS OF PROFITS, AND EITHER PARTY'S LIABILITY TO THE OTHER PARTY FOR ANY OTHER DAMAGES RELATING TO OR ARISING OUT OF THIS AGREEMENT WHETHER IN CONTRACT, TORT, OR OTHERWISE WILL BE LIMITED TO THE AMOUNT PAID OR PAYABLE TO MAKESBRIDGE TECHNOLOGY, INC. FROM User AS COMPENSATION FOR SERVICES UNDER THIS AGREEMENT. FURTHERMORE, IN NO EVENT WILL MAKESBRIDGE TECHNOLOGY, INC.'S TOTAL, CUMULATIVE LIABILITY UNDER THIS AGREEMENT EXCEED THE AMOUNT RECEIVED BY MAKESBRIDGE TECHNOLOGY, INC. FROM User UNDER THIS AGREEMENT. Without limiting the foregoing, Makesbridge Technology, Inc. is not responsible for any of User's data residing on Makesbridge Technology, Inc. hardware. User is wholly responsible for backing-up User data and information that may reside on the Makesbridge Technology, Inc. hardware, whether or not such information is produced through the use of the Service.</p>
							<p><strong>ATTORNEY FEES.</strong> If any legal action is necessary to enforce this Agreement, each party is wholly responsible for their own attorney fees, costs and expenses. INTELLECTUAL PROPERTY INFRINGEMENT CLAIMS. MAKESBRIDGE TECHNOLOGY, INC. SERVICES FURNISHED UNDER THIS AGREEMENT ARE PROVIDED WITHOUT ANY EXPRESS OR IMPLIED WARRANTIES OR REPRESENTATIONS AGAINST INFRINGEMENT. MAKESBRIDGE TECHNOLOGY, INC. WILL INDEMNIFY, HOLD User HARMLESS FROM, ANY CLAIM, SUIT OR PROCEEDING BROUGHT AGAINST User SO FAR AS IT IS BASED ON A CLAIM THAT MAKESBRIDGE TECHNOLOGY, INC., OR ANY PARTY THEREOF, INFRINGES A COPYRIGHT, TRADE SECRET OR AN EXISTING PATENT, IF NOTIFIED PROMPTLY IN WRITING OF THE CLAIM AND GIVEN FULL AUTHORITY, INFORMATION AND ASSISTANCE FOR THE DEFENSE.<br>
							INDEMNIFICATION. User agrees to indemnify, hold harmless, and at Makesbridge Technology, Inc.'s request defend Makesbridge Technology, Inc. and its officers, directors, shareholders, and representatives from and against any and all liability, damages, losses, costs, or expenses (including but not limited to attorneys' fees and expenses) incurred in connection with any claim related to (a) User breach of any term, condition, representation, warranty, or covenant in this Agreement; or (b) the information User supplied to Makesbridge Technology, Inc. or made available to any third party, including User registration data and the content of the Web pages corresponding to the URLs User submitted to Makesbridge Technology, Inc.. This obligation shall survive any termination of User relationship with Makesbridge Technology, Inc..<br>
							Under no circumstances, will Makesbridge Technology, Inc., its agents or anyone else involved in creating, producing or distributing our service be liable for any direct, indirect, incidental, special or consequential damages that result from the use of or inability to use our service. We will further not be liable for results from mistakes, omissions, interruptions, deletions of files, errors, defects, delays and operation, or transmission or failure of performance whether or not limited to acts of nature, communication failure, theft, destruction or unauthorized access to our records, programs or services.</p>
							<p><strong>GENERAL PROVISIONS.</strong> The laws of the United States of America and the State of California govern this Agreement. You hereby consent to the jurisdiction of and venue in courts located in the State of California in all disputes arising out of or relating to this Agreement or User use of the Service. In addition, User hereby consents to the exclusive jurisdiction of, and venue in, such courts for any action commenced by User against Makesbridge Technology, Inc.. The prevailing party in any dispute relating to the Service or this Agreement will be entitled to recover its costs, expenses and reasonable attorney fees incurred in connection with such dispute. The Agreement, along with Makesbridge Technology, Inc.'s Terms referenced herein, constitutes the entire Agreement between User and Makesbridge Technology, Inc. with respect to the Service. To the extent of any conflict between the Agreement and Terms, the Terms will govern User general use of Makesbridge Technology, Inc.'s Website and Service, and the Agreement will govern User use of the Service in particular. If any part of the Agreement is held to be unenforceable, that part will be amended to achieve its intended effect as nearly as possible, and the remainder of the Agreement will remain in full force. No party shall be liable for failure or delay in performing its obligations hereunder if such failure or delay is due to circumstances beyond the party's reasonable control, including without limitation, acts of any governmental body or failure of the software or equipment of third parties. Except as provided otherwise herein, any notice given under this Agreement will be made in writing by e-mail and will be effective on the business day after it is sent. User may not assign this Agreement, and any attempt to do so is void. User acknowledges that User's account is part of Makesbridge Technology, Inc. and consequently User will receive periodic announcements and information regarding Makesbridge Technology, Inc.'s services. User may request to be removed from the news mailing list at any time. MAKESBRIDGE TECHNOLOGY, INC. AND ALL RELATED CODE, MATERIALS, CONTENT AND BUSINESS MATERIALS ARE COPYRIGHT PROTECTED, AND ARE PROPRIETARY IN NATURE. NO PARTY, USER, SUBSCRIBER, User, VISITOR OR ANYONE OTHER THAN LEGALLY AUTHORIZED MAKESBRIDGE TECHNOLOGY, INC. STAFF HAS THE RIGHT OR PERMISSION TO COPY, USE, CLONE, REVERSE ENGINEER, SHARE, DEVELOP OR IN ANY WAY UTILIZE MAKESBRIDGE TECHNOLOGY, INC. CODE, CONTENT, IMAGES, GRAPHICS OR INFORMATION ON OR FROM MAKESBRIDGE TECHNOLOGY, INC., MAKESBRIDGE TECHNOLOGY, INC., INC, AND/OR MAKESBRIDGE TECHNOLOGY, INC. MATERIALS EXCEPT AS SPECIFICALLY STATED IN THESE TERMS AS A USER/SUBSCRIBER. VIOLATORS WILL NOT BE TOLERATED AND LEGAL RIGHTS WILL BE ENFORCED.<br>
							PUBLICITY.</p>
							<p>Makesbridge Technology, Inc. has permission and may include User's Website(s) domain name and logo on its User lists, testimonials and press releases.</p>
							<p><strong>SPECIAL REMARKS AND PROVISIONS.</strong> The following types of Websites are NOT allowed to participate in the Service: (a) Websites which promote illegal activity or racism, or which are libelous, defamatory, racist, hate-crime oriented, obscene, pornographic, abusive, harassing or threatening, (b) Websites which contain viruses or other contaminating or destructive features, (c) Websites which violate the rights of others, such as Content which infringes any copyright, trademark, patent, trade secret or violates any right of privacy or publicity, (d) Websites which provide instructions or discussions about performing illegal activities, (e) Websites that promote or utilize software or services designed to deliver unsolicited e-mail, or (f) Websites which otherwise violate any applicable law or that Makesbridge Technology, Inc. otherwise deems to be inappropriate. User agrees not to change Service programming or codes. User acknowledges and agrees that general information about User's Website (name, URL, traffic counts, etc.) may be utilized by Makesbridge Technology, Inc.. Possible uses include but are not limited to lists of busiest sites, lists of User sites, general promotional uses, etcetera.</p>
							<p><strong>QUESTIONS.</strong> If User has any questions about this Agreement or Makesbridge Technology, Inc.'s Service, contact Makesbridge Technology, Inc. by e-mail at info@Makesbridge Technology, Inc.. Questions and resulting answers after acceptance of this Agreement will not impact the terms and conditions of this Agreement.</p>
							<p><strong>PRIVACY POLICY By</strong> visiting, browsing, viewing, and/or using the Makesbridge Technology, Inc. Website, you are agreeing to accept and abide by these policies and all terms and conditions stated herein, on this page and all pages within this site. Therefore, please read the following Privacy Policy, Copyright and Trademark Notices completely. The Makesbridge Technology, Inc. system may collect general aggregate information that will not personally identify User. This type of information could include Internet browser, Operating system, Date of visit, Time of visit and/or Path taken through the site. This information by itself does not identify any individual and we will not combine it with information that does identify User as an individual. It provides statistics that we use to analyze and improve Makesbridge Technology, Inc.. Personally identifiable information is defined as any personal information that could identify User, such as User name, address, telephone number, billing and shipping information, credit card information, or e-mail address. Because we take User privacy seriously, we will not collect any personally identifiable information unless User voluntarily provide it. We will not share User personal information with third party suppliers and service providers, including independent contractors providing services for, or with Makesbridge Technology, Inc.. We will only disclose personally identifiable information to third parties if User consents to the disclosure, if we are compelled or authorized to do so by law, or if we reasonably believe there is a threat to someone's life or health. Personally identifiable information submitted for employment purposes will only be used in connection with the application process. It will not be used or disclosed for any other purposes unless required or authorized by law. Makesbridge Technology, Inc. registration, affiliate, trial and subscription forms require users to give Makesbridge Technology, Inc. contact information (i.e., name and e-mail address) and Website information (i.e., domain/URL). We will only use the information from the registration form to (i) send User information about our company, (ii) contact User when necessary and, (iii) set up User account and Makesbridge Technology, Inc. tools. By signing up and/or registering for services, trials, subscription or any offerings, paid or free of charge, you agree to be added to Makesbridge Technology, Inc.'s promotional mailings and e-mail updates. You always have the option of opting out (removing yourself from such mailings) by signing in to your account preferences and unchecking the appropriate box provided. Your information will never be given or sold to any one outside Makesbridge Technology, Inc.. When signed up for our service, User will be asked to embed a piece of code into pages of his/her Websites. This allows Makesbridge Technology, Inc. to track and report statistical site usage information about the pages visited, duration of page view, location previous to accessing the Makesbridge Technology, Inc. site, the navigational habits of user, and browser and operating system. We do not use this code to collect any personally identifiable information; it is only used for the functionality of Makesbridge Technology, Inc. and for User information, and will not be disseminated or shared with any outside parties without written permission from the User. This site contains links to other sites. Makesbridge Technology, Inc. is not responsible for the privacy practices or the content of Websites to which we link. We are committed to maintaining the security of the data we collect and protecting it from loss, misuse or alteration. This applies to demographic information, client site usage information, and personally identifiable information. We store the data collected on secure Makesbridge Technology, Inc. servers that can be accessed only by authorized personnel. To safeguard all information collected, Makesbridge Technology, Inc. and all of its staff follow the practices in this policy. No one is permitted to access or use information for any purpose other than those explained in this policy. To fully protect User privacy, we reserve the right to amend this policy at any time, and for any reason. We will post the amended terms on this Website as they occur and encourage User to frequently check for updates. Nothing contained in this policy is intended to create a contract or agreement between Makesbridge Technology, Inc. and any user providing identifiable information in any form. We will take all necessary steps to comply with this privacy policy, however, to the extent permitted by law, nothing in this policy is intended to hold Makesbridge Technology, Inc. liable for any failure to comply with this policy. Further, because Makesbridge Technology, Inc. does not control the privacy practices of our clients, links or affiliates, we advise that User read and fully understand their privacy policies. Copyright Notice All information, documents, images and written content on this site are copyrighted materials. All editorial information and content, HTML, graphics, art, images, logos, photographs, videos, music, sounds and/or all other materials and content in whatever form (collectively known as "site content") on this site are protected by U.S. copyright laws and international treaties. Express written permission is required before any site content may be copied or used in any manner other than stated here. Content in any form, i.e., images, text, audio, video or any media, is intended for personal, non-commercial use only. The use or re-use of any Makesbridge Technology, Inc. content for any purpose other than non-commercial, personal use is strictly prohibited. Modification, publication, transmission or participation in transfer or sale, creation of derivative works, or any form of exploitation of any of this site content, in whole or in part, is unlawful. Content protected by copyright may not be uploaded, distributed, posted, or reproduced without obtaining written permission of Makesbridge Technology, Inc., Inc. or the applicable copyright owner. Except as expressly provided herein, Makesbridge Technology, Inc. and its information providers, affiliates, and authors of informational/third party articles DO NOT grant any express or implied right of use under any patents, copyrights, trademarks or trade secret information. There are many information providers, advertisers, affiliates, associations, partners, authors/writers and outside links. All trademarks and brands on Makesbridge Technology, Inc. are the property of their respective owners. Reproduction by any means, electronic, mechanical, or any other method, or any form of storage of materials or site content retrieved from this site are subject to U.S. Copyright laws. To seek permission for use, send an e-mail to support@makesbridge.com, or write to: Makesbridge Technology, Inc., Inc. Attn: Permission for Use 526 Newville Drive Los Gatos, CA 95032Permission to use Makesbridge Technology, Inc. content is reviewed and granted on an individual, case by case basis. For permission to reprint articles, the author of the article must give permission, and Makesbridge Technology, Inc. has no control over each author's decision. Trademark Notice Visistat&reg;, Where Clicks Count&reg;, Statcaster&reg;, Statcasting&reg;, AdCaM&reg;, PageAlarm&reg;, Website Performance ManagementTM, IdentitiesTM, Activity AlertsTM, SEO AnalyzerTM, Touch MappingTM, Visistat MobileTM are trademarks of Visistat, Inc. Any reference made to trademarked items, terms, names, graphics, logos, art, images and products in writing, publishing, posting, or any form or manner of visual or electronic display requires use of the Trademark (TM) and Registered Trademark (&reg;) Symbols. The Registered Trademark Symbol (&reg;) must be used for Visistat&reg;. All use must clearly indicate Makesbridge Technology, Inc.&reg; ownership. Nothing contained on the makesbridge.com, bridgemailsystem.com, bridgestatz.com, or Visistat.com sites, printed, hardcopy, or electronic documents, business or otherwise, should be construed as granting, by implication, estoppel, or otherwise, any license or right to use any trademark or copyrighted materials, or use without the express and direct written permission of Makesbridge Technology, Inc. or Visistat, Inc. You are also advised that Makesbridge Technology, Inc. and Visistat Inc. will aggressively enforce its intellectual property rights to the fullest extent of the law, including the seeking of criminal prosecution. Makesbridge Technology, Inc. respects intellectual property rights, and we strongly urge our users not to infringe on the rights of others. Legal Disclaimer Your use ("use" defined as applying for, accessing and/or using an account, or any viewing, visiting, reading or bookmarking of the site and/or any of its pages, public or private) of Makesbridge Technology, Inc. is implied consent to the collection and use of information as discussed in our Privacy policies and Terms. Changes to our policies will be posted online on this Policies page or any other appropriate or necessary pages, and publicly available after the changes occur, in order to make the information available to our users and the public as quickly as possible. THE ABOVE POLICIES ARE STANDARD OPERATING PROCEDURE FOR MAKESBRIDGE TECHNOLOGY, INC. AND ANY OR ALL EMPLOYEES. HOWEVER, WE ARE NOT RESPONSIBLE FOR LINKED SITES, USER MISUSE, ACTS OF GOD, ANYONE NOT DIRECTLY AND ACTIVELY EMPLOYED OR CONTRACTED BY MAKESBRIDGE TECHNOLOGY, INC., OR ANY INTENTIONAL OR UNINTENTIONAL MISUSE OR DISASTER BY ANY SOURCE OUTSIDE OF MAKESBRIDGE TECHNOLOGY, INC.. WE ARE ONLY LIABLE FOR DAMAGE FROM EQUIPMENT, AND RESULTANT DELAYS, INCONVENIENCES, OR MISHAPS AS FAR AS STANDARD WARRANTIES APPLY. USE OF MAKESBRIDGE TECHNOLOGY, INC. AND/OR MAKESBRIDGE TECHNOLOGY, INC..COM MEANS AUTOMATIC COMPLIANCE, AGREEMENT, AND ACCEPTANCE OF ALL STATED POLICIES AND RULES OF USE, RELEASING MAKESBRIDGE TECHNOLOGY, INC. FROM ALL LIABILITY AND RESPONSIBILITIES BEYOND OUR CONTROL, ACTION OR DEED. Nothing contained in these policies is intended to create a contract or agreement between Makesbridge Technology, Inc..com and any user providing identifiable information in any form. We will take all necessary steps to comply with these policies, however, to the extent permitted by law, nothing stated within is intended to hold Makesbridge Technology, Inc..com liable for any failure to comply. Further, because Makesbridge Technology, Inc..com does not control the activities of our clients, links or affiliates, we advise that you read and fully understand their privacy policies and usage terms.</p>
							
						</div>
					<br>
					<br>
					<div class="clear"></div>
					</div>
					</td>
					</tr>                            
					<tr>
					<td style="height:20px;" colspan="2"></td>
					</tr>
					
					<tr>
					<td valign="middle" align="center" style="vertical-align:middle;" colspan="2">
					<div class="clear"></div>                                	
					<input id="cabutton" name="cabutton" type="submit" value="Create Account" />
					<div class="clear"></div>
					</td>
					</tr>
					</tbody>
					</table>                                                
					</div>
					</form>
						<div id="supop" class="dpmarketing" style="left:0">
							<div class="menu_indicator"> </div>
							<div class="popcontent">
							<strong>We will use this information to optimize your trial experience. And, you may be eligible to receive a special offer such as:</strong>
							<ul>
							<li>We pay a marketing and sales consultant to give a boost to your business plan. (up to $2,500.00)</li>
							<li>We pay a certified consultant in our global network to help you with CRM planning. (5 hours )</li>
							<li>We pay your subscription to a premium complimentary software product, such as a CRM tool.</li>
							<li>An early exit incentive from a competitor's contract.</li>						
							<li>And many other premium bundles!</li>
							</ul>
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