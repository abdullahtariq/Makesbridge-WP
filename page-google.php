<?php
/* Template Name: Google Offer */
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
        <meta name="google-site-verification" content="NU7NglyUl8eTS-VgcnnuOLRjI8DHf3Qi8bb5ngsGjr0" />
		<meta name="globalsign-domain-verification" content="JHVtiEgo0Glmo6OSyaWUIhcFQ7GX9v9Q3mhSoC0DRw" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="title" content="MakesBridge" />
		<meta name="description" content="MakesBridge Landing Page" />
		<meta name="keywords" content="marketing automation, mass email, sales automation, campaign creation, easy editor, analytics, small business, email template, image gallery" />
		
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
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/styles_a.css" media="screen" />
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
			$('#video_frame').hide();
			$('.goback').css('display','none');
			$('.signuppop').css('display','none');
			$('.fancybox-overlay').css('display','block');
			$('#'+popId).css('display','block');
			$('.fancybox-wrap').css('margin-left','-480px');				
			$('.fancybox-inner').append($('#'+popId));
			$('.fancybox-inner').css('height','550px');
			$('.fancybox-inner').css('width','');
			$('.fancybox-inner').css('padding','0');
		}
		function showsupop(popid,n)
		{
			$('#video_frame').hide();
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
			//alert($('#email1').val());
			if($('#email1'))
				$('#accForm #email').val($('#email1').val());
			if($('#crms'))
				$('#frmFld_CRM_Tool').val($('#crms').val());
			$('#accForm #source').val('trial - SFLP');
			return false;
		}
		function hidesupop()
		{
			$('.fancybox-overlay').css('display','none');
			$('.signuppop').css('display','none');
			$('.fancybox-inner #video_frame').attr('src','');
			$('.fancybox-inner #video_frame').hide();
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
			$('#video_frame').hide();
			$('.signuppop').css('display','none');
			$('#signup_now').css('display','block');
			$('.fancybox-wrap').css('margin-left','-400px');
			$('.fancybox-inner').append($('#signup_now'));
		}
		function openadvdetail(advID)
		{
			$('#video_frame').hide();
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
				$('#'+boxId+'_link').html('Show Details');
			}
			else
			{
				$('#'+boxId+'_detail').slideDown();
				$('#'+boxId).addClass('open');
				$('#'+boxId+'_link').html('Hide Details');
			}
		}
		
		function addView2(id,url,width,height)
			{
				$('.goback').css('display','none');
				$('.signuppop').css('display','none');
				/*$('.pp_pic_holder').css('display','none');
				$('.pp_overlay').css('display','none');*/
		
				$('.fancybox-overlay').css('display','block');
				$('.fancybox-overlay').css('z-index','20000');
				$('#signup_now').hide();
				$('.fancybox-wrap').css('margin-left','-400px');
				$('.fancybox-wrap').css('margin-top','-250px');
				$('.fancybox-inner').css('height',height+'px');
				$('.fancybox-inner').css('padding','20px');
				$('.fancybox-inner #video_frame').show();
				$('.fancybox-inner #video_frame').css('z-index','20000');
				$('.fancybox-inner #video_frame').attr('src',url);				
				$('.fancybox-inner').find('#video_frame').css('display','block');
				//_center_overlay();
				$.ajax({
					url:"<?php echo bloginfo('wpurl'); ?>/wp-admin/admin-ajax.php",
					type:'POST',
					data:'action=my_special_ajax_call&act=av&id='+ id + '&path='+ window.location.pathname.substr(1,window.location.pathname.length),
					success:function(results)
					{
						//alert(results);
						//$('#views_'+id+' span em').html(results);
					}
				});
			}
		
		</script>
		
		<style type="text/css">
			/*.slider{background: #ecf3fa url(<?php bloginfo('stylesheet_directory'); ?>/mks_lp_r/images/bg_slider3.jpg) center center no-repeat; background-size: cover; width: 100%; height: 100%;}*/
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
					$('.form_ul2 li').css('margin','0 2px 0 0');
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
					$('.form_ul2 li').css('margin','0 2px 0 0');
				}
				else if(isEmail(email)==false)
				{
					emailErr = true;
					$('#offer_email').css('border','solid 1px #ff0000');
					$('#offemail_erroricon').show();
					$('#offemail_erroricon').attr('data-content','Email addresses of free services are not accepted. (e.g. @msn, @gmail, @yahoo)');
					$('.offphonebg').css('margin-left','20px');
					$('#offer_button').css('margin-left','20px');
					$('.form_ul2 li').css('margin','0 2px 0 0');
				}
				else
				{
					//cmnErr = false;					
					$('#offer_email').attr('style','');
					$('#offemail_erroricon').hide();
					$('.offphonebg').css('margin-left','0px');					
					$('#li_offer_email').removeAttr('style');
				}
				if(fname == '') {
					//errorMessage += '- Please enter first name.\n';
					cmnErr = true;
					$('#offer_name').css('border','solid 1px #ff0000');
					$('#offname_erroricon').show();
					$('#offname_erroricon').attr('data-content','Please enter name.');
					$('.offemailbg').css('margin-left','20px');
					$('#offer_button').css('margin-left','20px');
					$('.form_ul2 li').css('margin','0 2px 0 0');
				}
				else
				{
					//cmnErr = false;
					$('#offer_name').attr('style','');
					$('#offname_erroricon').hide();
					$('.offemailbg').css('margin-left','0px');
					$('#li_offer_name').removeAttr('style');
				}				
				if(phone == '')
				{
					//errorMessage += '- Please enter phone.\n';
					cmnErr = true;
					$('#offer_phone').css('border','solid 1px #ff0000');
					$('#offphone_erroricon').show();
					$('#offphone_erroricon').attr('data-content','Please enter phone number.');
					$('#offer_button').css('margin-left','20px');
					$('.form_ul2 li').css('margin','0 2px 0 0');
				}
				else
				{
					//cmnErr = false;
					$('#offer_phone').attr('style','');
					$('#offphone_erroricon').hide();
					$('#li_offer_phone').removeAttr('style');
				}
				
				if(!cmnErr && !emailErr)
				{					
					$('.submit_new2').css('style','');
					$('.submit_new2').css('style','');
                    $('.long_form_content').append('<div class="loading"><p>Sending request....</p></div>');
					$('#offer_button').css('margin-left','0px');
					<?php
					if(!empty($_REQUEST['source']))
					{						
					?>
						var str = 'fname='+fname+'&email='+email+'&phone='+phone+"&page="+$('#page').val()+"&src=<?php echo $_REQUEST['source']; ?>";
					<?php
					}
					else
					{
					?>
						var str = 'fname='+fname+'&email='+email+'&phone='+phone+"&src="+$('#source').val()+"&page="+$('#page').val();
					<?php
					}
					?>
					//alert(str);
                    $.ajax({
                        url:"<?php echo bloginfo('wpurl'); ?>/wp-admin/admin-ajax.php",
                        type:'POST',
                        data:'action=my_special_ajax_call&act=sgo&' + str,
                        success:function(results)
                        {
                            $('.long_form_content').find('.loading').remove();
							if(results == 'err')
								alert('There is some error with the request please try again later.');
							else							
                            	window.location = '<?php echo bloginfo('wpurl'); ?>/thank-you';
                        }
                    });
					return false;
				}
				else
				{
					alert('Please correct validation errors.');					
					$('.submit_new2').css('margin-left','25px');
					$('.submit_new2').css('padding','10px');					
					return false;
				}
			}
        </script>
        
        <link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/images/favicon.ico">
        
		<?php wp_head(); ?>
	</head>
	
	
<body <?php body_class(); ?>>
<!-- BEGIN LivePerson Monitor. -->
<script type="text/javascript">
window.lpTag=window.lpTag||{};if(typeof window.lpTag._tagCount==='undefined'){window.lpTag={site:'69791877',section:lpTag.section||'',autoStart:lpTag.autoStart===false?false:true,ovr:lpTag.ovr||{},_v:'1.5.1',_tagCount:1,protocol:location.protocol,events:{bind:function(app,ev,fn){lpTag.defer(function(){lpTag.events.bind(app,ev,fn)},0)},trigger:function(app,ev,json){lpTag.defer(function(){lpTag.events.trigger(app,ev,json)},1)}},defer:function(fn,fnType){if(fnType==0){this._defB=this._defB||[];this._defB.push(fn)}else if(fnType==1){this._defT=this._defT||[];this._defT.push(fn)}else{this._defL=this._defL||[];this._defL.push(fn)}},load:function(src,chr,id){var t=this;setTimeout(function(){t._load(src,chr,id)},0)},_load:function(src,chr,id){var url=src;if(!src){url=this.protocol+'//'+((this.ovr&&this.ovr.domain)?this.ovr.domain:'lptag.liveperson.net')+'/tag/tag.js?site='+this.site}var s=document.createElement('script');s.setAttribute('charset',chr?chr:'UTF-8');if(id){s.setAttribute('id',id)}s.setAttribute('src',url);document.getElementsByTagName('head').item(0).appendChild(s)},init:function(){this._timing=this._timing||{};this._timing.start=(new Date()).getTime();var that=this;if(window.attachEvent){window.attachEvent('onload',function(){that._domReady('domReady')})}else{window.addEventListener('DOMContentLoaded',function(){that._domReady('contReady')},false);window.addEventListener('load',function(){that._domReady('domReady')},false)}if(typeof(window._lptStop)=='undefined'){this.load()}},start:function(){this.autoStart=true},_domReady:function(n){if(!this.isDom){this.isDom=true;this.events.trigger('LPT','DOM_READY',{t:n})}this._timing[n]=(new Date()).getTime()},vars:lpTag.vars||[],dbs:lpTag.dbs||[],ctn:lpTag.ctn||[],sdes:lpTag.sdes||[],ev:lpTag.ev||[]};lpTag.init()}else{window.lpTag._tagCount+=1}
</script>
<!-- END LivePerson Monitor. -->

<!-- START: Module -->
<div class="mainfull header" style="padding:13px 0 13px;">
    <div class="main_wrap" style="text-align:center;">
        <div class="clear"></div>
            <a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>">
                    <img alt="" src="<?php bloginfo('stylesheet_directory'); ?>/images/logo.png" style="width: 204px; border:0; height: 47px;"/>
                </a>
                <!--<form name="search" id="search" method="get" action="<?php bloginfo('url'); ?>">
                	<div class="searchbg">
                    	<input type="text" name="s" id="s" placeholder="Search here" value="<?php echo ($_GET['s'] != '') ? $_GET['s'] : ''; ?>">
                        <input type="image" name="search_submit" src="<?php bloginfo('stylesheet_directory'); ?>/images/search.png" width="20" height="20">
                    </div>
                </form>-->
                <div class="clear"></div>
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
        <div class="right_header" style="float:right; margin: 3px 0 0;">
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

<div style="text-align:center; margin:20px auto 0; background-color:#ffedf0; min-height:200px;">
    <img src="http://www.makesbridge.com/wp-content/uploads/2014/09/google-banner-image.png" width="969" height="261" style="position: relative;top: 4px;">
</div>

<!-- END: Module -->
<?php
if(have_posts()): 
while(have_posts()) :
the_post();
$background_image = get_field('bann_backimage');
$sub_head = get_field('bann_subhead');
$sub_head = get_field('bann_subhead');
$ss_cat = get_field('story_category');
$st = "text-transform:uppercase;";
$mst = "";				
?>
<!-- START: Module -->
<div class="mainfull border_box" style="background:url(<?php echo $background_image["url"]; ?>) no-repeat left top / cover; width: 100%; padding-top:10px; margin-top:0px;padding-bottom:25px;">
	<div class="main_wrap">
		<?php
                        the_content();
                    ?>
				
           
	</div>
</div>
 <?php
            endwhile;
            endif;
            ?>
<!-- END: Module -->

<!-- START: Module -->
<div class="mainfull section5 border_box" style="padding: 0; margin-top:20px;">
	<div style="position:relative; z-index:1000;" class="main_wrap">   
	<div class="long_form" style="clear: both;position: relative; margin-bottom: 25px;">
	<div class="long_form_wrap" style="background: none repeat scroll 0 0 rgba(76, 151, 189, 0.94);border-radius: 4px;box-sizing: border-box;margin: 30px 0 0;opacity: 0.9;padding: 37px 42px;">
		<div class="long_form_content">
			<h2 class="h2form" style="text-align:center;color: #ffffff;font-family: "proxima_nova_light",Arial,sans-serif;font-size: 26px;margin: 0 0 18px;text-align: center;">Interested in this offer? Let us know!</h2>
			<ul class="form_ul2" style="margin: auto;width: 1006px;">
				<li id="li_offer_name" style="float: left;list-style: none outside none;margin: 0 7px;">
					<div style="position:relative; float:left;" class="offnamebg">
						<input type="text" placeholder="Your Name" name="name" id="offer_name" class="input_new2" style='border: 0 none;border-radius: 4px;box-sizing: border-box;font-family: "proxima_nova_light",Arial,sans-serif;padding: 12px 10px;width: 230px;'>
						<span style="right:-20px;" data-toggle="popover" data-trigger="hover" data-placement="right" class="erroricon" id="offname_erroricon" data-original-title="" title=""></span> </div>
					</li>
					<li id="li_offer_email" style="float: left;list-style: none outside none;margin: 0 7px;">
						<div style="position:relative; float:left;" class="offemailbg">
							<input type="text" placeholder="Your Work Email" name="email" id="offer_email" class="input_new2" style='border: 0 none;border-radius: 4px;box-sizing: border-box;font-family: "proxima_nova_light",Arial,sans-serif;padding: 12px 10px;width: 230px;'>
							<span style="right:-20px;" data-toggle="popover" data-trigger="hover" data-placement="right" class="erroricon" id="offemail_erroricon" data-original-title="" title=""></span> </div>
						</li>
						<li id="li_offer_phone" style="float: left;list-style: none outside none;margin: 0 7px;">
							<div style="position:relative; float:left;" class="offphonebg">
								<input type="text" placeholder="Phone Number" name="phone" id="offer_phone" class="input_new2" style='border: 0 none;border-radius: 4px;box-sizing: border-box;font-family: "proxima_nova_light",Arial,sans-serif;padding: 12px 10px;width: 230px;'>
								<span style="right:-20px;" data-toggle="popover" data-trigger="hover" data-placement="right" class="erroricon" id="offphone_erroricon" data-original-title="" title=""></span> </div>
							</li>
							<li>
								<input type="hidden" name="source" id="source" value="freedom offer inquiry"><input type="hidden" name="page" id="page" value="google-offer"><input type="button" value="Receive Details" onclick="validateOfferForm();" class="submit_new2" style='background: none repeat scroll 0 0 #51c844;border: 0 none;border-radius: 4px;color: #ffffff;cursor: pointer;font-family: "proxima_nova_bold",Arial,sans-serif;font-size: 17px;padding: 10px 20px;'>
							</li>
						</ul>
						<div class="clr"></div>
					</div>
				</div>
			</div>     	
        <div class="clear"></div>
        <div style="width:600px; float:left;">
           <h2 style="text-align:center; margin-bottom:15px;">Most Popular Enhancements To Google Apps</h2>
           <div id="connections_sec2" style="padding:10px 0 0;">
               <ul id="features" style="margin:0 0 0 10px;">
                  <div class="clear"></div>
                  <li style="width:223px;"> <a onClick="addView2(2484,'http://player.vimeo.com/video/90911241?width=800&amp;height=450',261,450)" style="width:261px; height:206px;text-decoration:none;" href="javascript:void(0)">
                    <h3 style="color: #2581b0;font-family: 'proxima_nova_light',Arial,sans-serif;text-decoration: none;">How to send mass emails</h3>
                    <img width="114" height="81" class="aligncenter size-full wp-image-258" alt="send-mass-emails" src="http://www.makesbridge.com/wp-content/uploads/2014/02/send-mass-emails.png">
                    <div class="content" style="text-decoration: none;">Send to any set of records, members of campaigns or upload CSVs. Deduplication and permission management is automatic.</div>
                    <img src="http://www.makesbridge.com/wp-content/themes/mksteam/images/play-btn.png" class="play-btn"></a> </li>
                  <li style="width:223px;"> <a onClick="addView2(2484,'http://player.vimeo.com/video/90576675?width=800&amp;height=450',261,450)" style="width:261px; height:206px;text-decoration:none;" href="javascript:void(0)">
                    <h3 style="color: #2581b0;font-family: 'proxima_nova_light',Arial,sans-serif;text-decoration: none;">How to target</h3>
                    <img width="87" height="87" class="aligncenter size-full wp-image-259" alt="targeting" src="http://www.makesbridge.com/wp-content/uploads/2014/02/targeting.png">
                    <div class="content" style="text-decoration: none;">Increase response rates by targeting based on any data field, forum submissions, lead score and online behavior.</div>
                    <img src="http://www.makesbridge.com/wp-content/themes/mksteam/images/play-btn.png" class="play-btn"></a> </li>
                  <div class="clear"></div>
                  <li style="width:223px;"> <a onClick="addView2(2057,'http://player.vimeo.com/video/99293579?width=800&amp;height=450',261,450)" style="width:261px; height:206px;text-decoration:none;" href="javascript:void(0)">
                    <h3 style="color: #2581b0;font-family: 'proxima_nova_light',Arial,sans-serif;text-decoration: none;">How to do Nurture Drips</h3>
                    <img width="70" height="72" class="aligncenter size-full wp-image-260" alt="nurture-drips" src="http://www.makesbridge.com/wp-content/uploads/2014/02/nurture-drips.png">
                    <div class="content" style="text-decoration: none;">Set up a chain of emails and sales reminders in seconds.</div>
                    <img src="http://www.makesbridge.com/wp-content/themes/mksteam/images/play-btn.png" class="play-btn"></a> </li>
                  <li style="width:223px;"> <a style="width:261px; height:206px;text-decoration:none;" onClick="addView2(1525,'http://player.vimeo.com/video/90595740?width=800&amp;height=450',800,450)" href="javascript:void(0);">
                    <h3 style="color: #2581b0;font-family: 'proxima_nova_light',Arial,sans-serif;text-decoration: none;">How to do alerts and scoring</h3>
                    <img width="71" height="85" class="aligncenter size-full wp-image-261" alt="alerts" src="http://www.makesbridge.com/wp-content/uploads/2014/02/alerts.png">
                    <div class="content">Let sales know when its time to call and when a contact takes significant action.</div>
                    <img src="http://www.makesbridge.com/wp-content/themes/mksteam/images/play-btn.png" class="play-btn"></a> </li>
                  <div class="clear"></div>
                  <li style="width:223px;"> <a onClick="addView2(1806,'http://player.vimeo.com/video/90598216?width=800&amp;height=450',800,450)" style="width:261px; height:206px;text-decoration:none;" href="javascript:void(0);">
                    <h3 style="color: #2581b0;font-family: 'proxima_nova_light',Arial,sans-serif;text-decoration: none;">Prospect Listing pages</h3>
                    <img width="70" height="80" class="aligncenter size-full wp-image-262" alt="prospect" src="http://www.makesbridge.com/wp-content/uploads/2014/02/prospect.png">
                    <div class="content" style="text-decoration: none;">Sales and support have their fingers on the pulse of who’s active.</div>
                    <img src="http://www.makesbridge.com/wp-content/themes/mksteam/images/play-btn.png" class="play-btn"></a> </li>
                  <li style="width:223px;"> <a onClick="addView2(1525,'http://player.vimeo.com/video/90595740?width=800&amp;height=450',800,450)" style="width:261px; height:206px;text-decoration:none;" href="javascript:void(0);">
                    <h3 style="color: #2581b0;font-family: 'proxima_nova_light',Arial,sans-serif;text-decoration: none;">Contact Journey</h3>
                    <img width="68" height="80" class="aligncenter size-full wp-image-263" alt="contact-journey" src="http://www.makesbridge.com/wp-content/uploads/2014/02/contact-journey.png">
                    <div class="content" style="text-decoration: none;">A journey map clearly presents contacts’ key events and interactions with your business.</div>
                    <img src="http://www.makesbridge.com/wp-content/themes/mksteam/images/play-btn.png" class="play-btn"></a> </li>
                  <div class="clear"></div>
                </ul>
            </div>
        </div>
        <div class="trialform" style="width:360px; position:relative;right:inherit;float:right;padding:15px;top: 50px;color: #2e7497;background:#ECF3FB;">
        <!--    <div class="formhead" style="color:#ff9722; margin-top:20px; padding:0; font-size:30px; margin-bottom:15px;">Free 30-Day Trial</div>
            <div style="width:360px;" class="form">
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
                        <option value="Google Apps">Google Apps</option>
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
            </div> -->
	               <div class="msg_new2" style='font-family: "proxima_nova_light",Arial,sans-serif;font-size: 14px;margin: 0 0 12px;'>
				“Makesbridge has made our corporate marketing execution exponentially easier. It is a powerful, flexible and cost-effective platform.” 
			</div>
			<div class="partner_msg_info" style="font-family: 'proxima_nova_light',Arial,sans-serif;font-size: 14px;">
					 &ndash; Kimberly McCormick,<br>
					Director of Corporate Marketing<br>
					Bayshore Solutions 
					<a href="http://www.bayshoresolutions.com/" target="_blank"><img alt="Image" src="http://www.makesbridge.com/wp-content/themes/mksteam/mks_lp_r/images/bayshore_logo.png" class="partner_site_logo" style="  float: right;margin: 21px 0 0;"></a>
					<p></p>
					<div class="clr"></div>
			</div>          	       
        </div>
        <div class="clear"></div>
    </div>
</div>
<!-- END: Module -->

<!-- START: Module -->
<div class="mainfull the_stories border_box" style="padding: 30px 0 100px; margin-bottom:100px;">
	<div class="main_wrap">
		<div class="stories" style="margin:0 auto 0px; height:300px;">
				<br>
                <?php
                if($ss_cat)
				{
					$cat = $ss_cat;
				?>
                	<div class="headline_stories"><h2>SUCCESS STORIES IN MARKETING</h2></div>					
                <?php
				}
				else
				{
					$cat = 23;
				?>
					<div class="headline_stories"><h2>SUCCESS STORIES OF NETSUITE CLIENTS USING MAKESBRIDGE TO DO POWERFUL MARKETING AUTOMATION</h2></div>
				<?php
				}
				?>
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
					query_posts('post_type=success-stories&post_status=publish&showposts=1000&orderby=post_date&order=desc&cat='.$cat);
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
				<br>
				<br>
			</div>
	</div>
</div>


<!-- END: Module -->

<?php get_footer(); ?>

<!-- END: Module -->
<div class="fancybox-overlay fancybox-overlay-fixed" style="width: auto; height: auto; background: none repeat scroll 0% 0% rgba(230, 239, 243, 0.9); display: none;">
  <div tabindex="-1" class="fancybox-wrap fancybox-desktop fancybox-type-inline fancybox-opened" style="height: auto; position: absolute; top: 50%; left: 50%; margin-top:-270px; opacity: 1;">
    <div class="fancybox-skin" style="padding: 0px; width: auto; height: auto;">
      <div class="fancybox-outer">
        <div class="fancybox-inner" style="height: 550px;">
        	<iframe id="video_frame" width="780" height="420" frameborder="no" src="http://player.vimeo.com/video/90175265?title=0&amp;byline=0&amp;portrait=0"></iframe>
        </div>
      </div>
      <a href="javascript:;" class="fancybox-item fancybox-close" title="Close" onclick="hidesupop()"></a></div>
  </div>
</div>
<div class="signuppop wp-pop" style="width:760px; height: 550px; display: none; padding:10px;" id="signup_now">
	<?php
    $su_conn = get_post(390); 
    echo $su_conn->post_content;
    ?>
</div>
<div class="signuppop pagecontent wp-pop" style="width: 960px; display: none; margin:20px 0; height:470px; padding:20px; position:relative; overflow-y:scroll;" 
id="termspop">
      <a class="goback" onClick="togglePops()">&lt;&lt; Go Back</a>
      <?php
      $term = get_post(640); 
      setup_postdata( $term );
      the_content();
      ?>
</div>

