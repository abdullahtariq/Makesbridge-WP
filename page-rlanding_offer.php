<?php
/* Template Name: New Responsive (LP offer) */
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
		
		<link rel="shortcut icon" href="http://salesforceoffer.makesbridge.com/wp-content/themes/salesforceoffer/images/mks_lp_r/favicon.png" type="image/x-icon">
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/mks_lp_r/css/style.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/style.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/mks_icon.css" media="screen" />
        
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.8.2.js"></script>
        
		<!-- Owl Carousel Assets -->
		<link href="<?php echo get_template_directory_uri(); ?>/mks_lp_r/js/owl-carousel/owl.carousel.css" rel="stylesheet">
		<link href="<?php echo get_template_directory_uri(); ?>/mks_lp_r/js/owl-carousel/owl.theme.css" rel="stylesheet">
		<link href="<?php echo get_template_directory_uri(); ?>/mks_lp_r/js/owl-carousel/owl.transitions.css" rel="stylesheet">

		<script src="<?php echo get_template_directory_uri(); ?>/mks_lp_r/js/rbmenu.js"></script>
		<link href="<?php echo get_template_directory_uri(); ?>/mks_lp_r/css/rbmenu.css" rel="stylesheet">
		
		<script src="<?php echo get_template_directory_uri(); ?>/mks_lp_r/js/owl-carousel/owl.carousel.js"></script>
		<link href="<?php echo get_template_directory_uri(); ?>/mks_lp_r/js/google-code-prettify/prettify.css" rel="stylesheet">
		
		<script>
		$(document).ready(function() {
		
		$(".rbmenu").rbmenu();
		
		$("#owl-demo").owlCarousel({
			autoPlay : 3000,
			stopOnHover : true,
			navigation: false,
			paginationSpeed : 1000,
			goToFirstSpeed : 2000,
			singleItem : true,
			autoHeight : true,
			transitionStyle:"fade"
		  });
		 
		});
		function showpop(popid)
		{
			$('#'+popid).addClass('visible');
		}
		function hidepop(popid)
		{
			$('#'+popid).removeClass('visible');
		}
		function showtospop(popId)
		{
			$('.goback').css('display','none');
			$('.signuppop').css('display','none');
			$('.fancybox-overlay').css('display','block');
			$('#'+popId).css('display','block');
			$('.fancybox-wrap').css('margin-left','-480px');				
			$('.fancybox-inner').append($('#'+popId));
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
			if($('#crms'))
				$('#frmFld_CRM_Tool').val($('#crms').val());
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
			if($('#provider').val() == 'Other')
				$('#othertext').show();
			else
				$('#othertext').hide();
		}
		function togglePops()
		{
			$('.signuppop').css('display','none');
			$('#signup_now').css('display','block');
			$('.fancybox-wrap').css('margin-left','-400px');
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
		function showhideDetail(boxId)
		{
			if($('#'+boxId+'_detail').css('display') == 'block')
			{
				$('#'+boxId+'_detail').slideUp();
				$('#'+boxId).removeClass('open');
			}
			else
			{
				$('#'+boxId+'_detail').slideDown();
				$('#'+boxId).addClass('open');
			}
		}
		
		</script>
		
		<style type="text/css">
			.slider{background: #ecf3fa url(<?php bloginfo('stylesheet_directory'); ?>/mks_lp_r/images/bg_slider3.jpg) center center no-repeat; background-size: cover; width: 100%; height: 100%;}
		</style>
        
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/source/jquery.fancybox.js?v=2.1.4"></script>
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
					$('#company_erroricon').attr('data-content','Please enter company.');
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
					$('#phone_erroricon').attr('data-content','Please enter phone number.');
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
				var dfname = $('#demofname').val();
				var dlname = $('#demolname').val();
				var dcompany = $('#democompany').val();
				var demail = $('#demoemail').val();
				var dphone = $('#demophone').val();
				var dmessage = $('#demomessage').val();
				var challText = $('#uText1').val();
				if(challText == '')
				{
					//alert(' Enter text for spam protection.');
					cmnErr = true;
					$('.demoscbg').css('border','solid 1px #ff0000');
					$('#uText1_erroricon').show();
					$('#uText1_erroricon').attr('data-content','Please enter the CAPTCHA');
					//$('#uText_erroricon').popover({'placement':'bottom','trigger':'hover',delay: { show: 0, hide:0 },animation:false});
					//return false;
				}
				else
				{
					//cmnErr = false;
					$('.demoscbg').attr('style','');
					$('#uText1_erroricon').hide();
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
				if(dmessage == '')
				{
					//errorMessage += '- Please enter phone.\n';
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
			function validateOfferForm() 
			{
				//$('.errors').html('');
				var fname = $('#offer_name').val();
				var email = $('#offer_email').val();
				var phone = $('#offer_phone').val();
			
				var cmnErr = false;
				var emailErr = false;
				//$('.erroricon').hide();
				
				if(email == '')
				{
					//errorMessage += '- Please enter valid email address.\n';
					cmnErr = true;
					$('#offer_email').css('border','solid 1px #ff0000');
					$('#offemail_erroricon').show();
					$('#offemail_erroricon').attr('data-content','Please enter email address.');
					$('.offphonebg').css('margin-left','20px');
					$('#offer_button').css('margin-left','20px');
				}
				else if(isValidEmail(email)==false)
				{
					//errorMessage += '- Please enter valid email address.\n';
					cmnErr = true;
					$('#offer_email').css('border','solid 1px #ff0000');
					$('#offemail_erroricon').show();
					$('#offemail_erroricon').attr('data-content','Please enter valid email address.');
					$('.offphonebg').css('margin-left','20px');
					$('#offer_button').css('margin-left','20px');
				}
				else if(isEmail(email)==false)
				{
					emailErr = true;
					$('#offer_email').css('border','solid 1px #ff0000');
					$('#offemail_erroricon').show();
					$('#offemail_erroricon').attr('data-content','Email addresses of free services are not accepted. (e.g. @msn, @gmail, @yahoo)');
					$('.offphonebg').css('margin-left','20px');
					$('#offer_button').css('margin-left','20px');
				}
				else
				{
					//cmnErr = false;					
					$('#offer_email').attr('style','');
					$('#offemail_erroricon').hide();
					$('.offphonebg').css('margin-left','0px');					
				}
				if(fname == '') {
					//errorMessage += '- Please enter first name.\n';
					cmnErr = true;
					$('#offer_name').css('border','solid 1px #ff0000');
					$('#offname_erroricon').show();
					$('#offname_erroricon').attr('data-content','Please enter name.');
					$('.offemailbg').css('margin-left','20px');
					$('#offer_button').css('margin-left','20px');
				}
				else
				{
					//cmnErr = false;
					$('#offer_name').attr('style','');
					$('#offname_erroricon').hide();
					$('.offemailbg').css('margin-left','0px');					
				}				
				if(phone == '')
				{
					//errorMessage += '- Please enter phone.\n';
					cmnErr = true;
					$('#offer_phone').css('border','solid 1px #ff0000');
					$('#offphone_erroricon').show();
					$('#offphone_erroricon').attr('data-content','Please enter phone number.');
					$('#offer_button').css('margin-left','20px');
				}
				else
				{
					//cmnErr = false;
					$('#offer_phone').attr('style','');
					$('#offphone_erroricon').hide();
				}
				
				if(!cmnErr && !emailErr)
				{
                    $('.subscribeform').append('<div class="loading"><p>Sending request....</p></div>');
					$('#offer_button').css('margin-left','0px');
					var str = 'fname='+fname+'&email='+email+'&phone='+phone;
					//alert(str);
                    $.ajax({
                        url:"<?php echo bloginfo('wpurl'); ?>/wp-admin/admin-ajax.php",
                        type:'POST',
                        data:'action=my_special_ajax_call&act=so&' + str,
                        success:function(results)
                        {
                            $('.subscribeform').find('.loading').remove();
                            window.location = '<?php echo bloginfo('wpurl'); ?>/thank-you';
                        }
                    });
					return false;
				}
				else
				{
					alert('Please correct validation errors.');
					return false;
				}
			}
        </script>
        
		<?php wp_head(); ?>
	</head>
	
	
<body>


<!-- START: Module -->
<div class="mainfull header" style="padding:13px 0 13px;">
    <div class="main_wrap" style="text-align:center;">
        <a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>">
            <img alt="" src="<?php bloginfo('stylesheet_directory'); ?>/images/logo.png" />
        </a>
    </div>
</div>
<!-- END: Module -->


<!-- START: Module -->
<div class="mainfull mks_head_menu">
	<div class="main_wrap">
    	<div class="clr"></div>
    	<div class="left_header" style="float:left;">
            <div class="content_menu">                
                <?php wp_nav_menu( array('menu' => 'TopNav','menu_class' => 'rbmenu mks_menu')); ?>
            </div>
        </div>
        <div class="right_header" style="float:right;">
        	<div class="content_menu">
                <ul class="rbmenu mks_menu">                    
                    <li class="right"><a class="a_element" href="<?php bloginfo('url'); ?>/request-demo">Request Demo</a></li>
                    <li class="right"><a class="a_element" href="#" onclick="showsupop('signup_now','1');">Signup</a></li>
                    <li class="right"><a class="a_element" href="https://www.bridgemailsystem.com/pms/login.jsp">Login</a></li>
                </ul>
            </div>
        </div>
        <div class="clr"></div>
	</div>
</div>
<!-- END: Module -->


<!-- START: Module -->
<div class="mainfull slider border_box">
	<div class="main_wrap">
		<div class="slider_wrap">
        	<?php
			if(have_posts()): 
			while(have_posts()) :
			the_post();
			$background_image = get_field('bann_backimage');
			?>
                <div class="slider_left">
                    <div class="slider_left_content">
                        <p class="slider_h1"><?php the_field('bann_head'); ?></p>
                        <p class="slider_p"><?php the_field('bann_subhead'); ?></p>
                        <div class="vd_button_wrap">
                            <a class="vd_button" href="<?php bloginfo('url'); ?>/video-tutorials">Video Tour</a>
                        </div>
                    </div>
                </div>
                <div class="slider_right">
                    
                </div>
                <div class="clr"></div>
                <div class="box_home">
                    <div class="form_wrap2" style="position:relative; top:30px;">					
                        <?php
                        the_content();
                        ?>
                    </div>
                </div>
            <?php
            endwhile;
            endif;
            ?>
		</div>
	</div>
</div>
<!-- END: Module -->
<!-- START: Module -->
<div class="mainfull section5 border_box" style="padding: 100px 0;">
	<div style="position:relative; z-index:1000;" class="main_wrap">        	
        <div class="clear"></div>
        <div class="laptop">
            <a href="http://vimeo.com/90911241?width=800&amp;height=450" rel="wp-video-lightbox">
            <img width="71" height="71" style="border:0;" src="<?php bloginfo('stylesheet_directory'); ?>/images/play-btn.png">
            </a>
        </div>
        <div class="trialform">                    
            <div class="formhead" style="color:#ff9722; margin-top:20px; padding:0; font-size:30px;">Free 30-Day Trial</div>
            <div style="margin-top:20px; width:400px;" class="form">                        
                <div style="width:348px;" class="forminputbg">
                    <label>Work Email</label>
                    <input type="text" style="width:240px;" id="email1" name="email1">
                    <div class="clear"></div>
                </div>
                <div style="margin:15px 0 20px; font-size:13px;" class="workemailhelp"><a style="color:#4fc8f5; font-family:Open Sans; font-size:13px; cursor:pointer; border-bottom:solid 1px #4FC8F5;" data-toggle="popover" data-content="For security reasons we do not provision trials to anonymous email addresses such as gmail, yahoo, and hotmail." data-trigger="hover" data-placement="bottom" data-original-title="" title="">Why must I use a work email?</a> 
                </div>
                <div class="services_head" style="margin-bottom:10px;">Choose one <strong>cloud app</strong> or <strong>service</strong> you want us to pay for:</div>
                <div style="width:348px;" class="forminputbg">
                    <label>Choose</label>
                    <select style="width:260px; padding-top:3px;" id="crms" name="crms">
                        <option value="">Select one</option>
                        <option value=""></option>
                        <option style="font-weight:bold;" value="">Cloud Apps:</option>                            
                        <option value="Highrise">Highrise</option>
                        <option value="LinkedIn">LinkedIn</option>
                        <option value="Netsuite">Netsuite</option>
                        <option value="Salesforce">Salesforce</option>
                         <option value=""></option>
                        <option style="font-weight:bold;" value="">Services:</option>                            
                        <option value="Marketing consultant">Marketing consultant</option>
                        <option value="Sales consultant">Sales consultant</option>
                        <option value="CRM consultant">CRM consultant</option>
                        <option value="Adwords consultant">Adwords consultant</option>
                    </select>
                    <div class="clear"></div>
                </div>
                <div onclick="showsupop('signup_now','1');" class="getstarted">Get Started</div>
                <div class="clear"></div>
                <div class="home_termslink">
                    By submitting this information you agree to our <a onclick="showtospop('termspop');" href="javascript:void(0);">Terms of Service</a>                            
                </div>                    
                <div class="clear"></div>                    
            </div>
                                
        </div>
        <div class="clear"></div>
    </div>
</div>
<!-- END: Module -->
<!-- START: Module -->
<div class="mainfull the_stories border_box">
	<div class="main_wrap">
		<div class="stories" style="margin:0 auto 0px; height:300px;">
				<div class="headline_stories"><h2>Success Stories</h2></div>
                <script language="javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery1.js"></script>
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
<!-- END: Module -->

<div class="fancybox-overlay fancybox-overlay-fixed" style="width: auto; height: auto; background: none repeat scroll 0% 0% rgba(230, 239, 243, 0.9); display: none;">
  <div tabindex="-1" class="fancybox-wrap fancybox-desktop fancybox-type-inline fancybox-opened" style="height: auto; position: absolute; top: 50%; left: 50%; margin-top:-250px; opacity: 1;">
    <div class="fancybox-skin" style="padding: 0px; width: auto; height: auto;">
      <div class="fancybox-outer">
        <div class="fancybox-inner" style="height: 520px;">
        	
        </div>
      </div>
      <a href="javascript:;" class="fancybox-item fancybox-close" title="Close" onclick="hidesupop()"></a></div>
  </div>
</div>
<div class="signuppop wp-pop" style="width:760px; height: 520px; display: none; padding:10px;" id="signup_now">
	<?php
    $su_conn = get_post(390); 
    echo $su_conn->post_content;
    ?>
</div>
<div class="signuppop pagecontent wp-pop" style="width: 960px; display: none; margin:20px 0; height:420px; padding:20px; position:relative; overflow-y:scroll;" 
id="termspop">
      <a class="goback" onClick="togglePops()">&lt;&lt; Go Back</a>
      <?php
      $term = get_post(640); 
      setup_postdata( $term );
      the_content();
      ?>
</div>

<?php get_footer(); ?>
