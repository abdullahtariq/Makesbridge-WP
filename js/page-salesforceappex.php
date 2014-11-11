<?php
/* Template Name: Salesforce Appex */
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
        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/videos.css" media="screen" />
        
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
		function addView2(id,url,width,height)
		{
			$('.goback').css('display','none');
			$('.signuppop').css('display','none');
			$('.fancybox-overlay').css('display','block');
			$('#signup_now').hide();
			
			$('.fancybox-wrap').css('margin-left','-400px');
			$('.fancybox-wrap').css('margin-top','-250px');
			$('.fancybox-inner').css('width','800px');
			$('.fancybox-inner').css('height',height+'px');
			$('.fancybox-inner').css('padding','20px');
			$('.fancybox-inner #video_frame').show();
			$('.fancybox-inner #video_frame').attr('src',url);
			$.ajax({
				url:"<?php echo bloginfo('wpurl'); ?>/wp-admin/admin-ajax.php",
				type:'POST',
				data:'action=my_special_ajax_call&act=av&id='+ id,
				success:function(results)
				{
					$('#views_'+id+' span em').html(results);
				}
			});
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
			$('#video_frame').hide();
			$('.offerdetail').css('display','none');
			$('.goback').css('display','none');
			$('.signuppop').css('display','none');
			$('#termspop').css('display','none');
			
			$('.fancybox-overlay').css('display','block');			
			$('.fancybox-wrap').css('margin-left','-300px');
			$('.fancybox-wrap').css('margin-top','-250px');
			$('.fancybox-inner').css('width','600px');
			$('.fancybox-inner').css('height','400px');
			$('.fancybox-inner').css('padding','20px');
			
			$('#'+boxId+'_detail').show();
			$('.fancybox-inner').append($('#'+boxId+'_detail'));
			return false;
		}
		
		function addView(id)
		{
			$('.pp_pic_holder').css('display','block');
			$('.pp_overlay').css('display','block');
			$('.pp_overlay').css('width','100%');
			$('.pp_overlay').css('height','8000px');
			$('.pp_inline').html($('#off_det_'+id).html());
			_center_overlay();
			$.ajax({
				url:"<?php echo bloginfo('wpurl'); ?>/wp-admin/admin-ajax.php",
				type:'POST',
				data:'action=my_special_ajax_call&act=aov&id='+ id,
				success:function(results)
				{
					$('#views_'+id+' span em').html(results);
				}
			});
		}
		function addClick(id,url)
		{
			$('.row-fluid').append('<div class="loading"><p>Redirecting....</p></div>');		
			$.ajax({
				url:"<?php echo bloginfo('wpurl'); ?>/wp-admin/admin-ajax.php",
				type:'POST',
				data:'action=my_special_ajax_call&act=aoc&id='+ id,
				success:function(results)
				{
					$('.row-fluid').find('.loading').remove();
					window.location = url;
				}
			});
		}
		function closeIt(){ 	
			$('.pp_pic_holder').css('display','none');
			$('.pp_overlay').css('display','none');
			return false;
		}
		function _center_overlay(){
			windowHeight = $(window).height(), windowWidth = $(window).width();
			scroll_pos = _get_scroll();
			contentHeight = $('.pp_pic_holder').height(), contentwidth = $('.pp_pic_holder').width();

			projectedTop = (windowHeight/2) + scroll_pos['scrollTop'] - (contentHeight/2);
			if(projectedTop < 0) projectedTop = 0;
			
			if(contentHeight > windowHeight)
				return;

			$('.pp_pic_holder').css({
				'top': projectedTop,
				'left': (windowWidth/2) + scroll_pos['scrollLeft'] - (contentwidth/2)
			});
		};
		function _get_scroll(){
			if (this.pageYOffset) {
				return {scrollTop:this.pageYOffset,scrollLeft:this.pageXOffset};
			} else if (document.documentElement && document.documentElement.scrollTop) { // Explorer 6 Strict
				return {scrollTop:document.documentElement.scrollTop,scrollLeft:document.documentElement.scrollLeft};
			} else if (document.body) {// all other Explorers
				return {scrollTop:document.body.scrollTop,scrollLeft:document.body.scrollLeft};
			};
		};
		
		function sortoffers()
		{
			var vals = $('#filters').val().split(',');
			if(vals.length == 1)
				showoffers($('#filters').val());
			else
				showoffersby(vals[0],vals[1]);
		}
		function showoffers(type)
		{
			$('#offersearchinput').val('');
			$('.row-fluid').append('<div class="loading"><p>Loading offers....</p></div>');
			$.ajax({
				url:"<?php echo bloginfo('wpurl'); ?>/wp-admin/admin-ajax.php",
				type:'POST',
				data:'action=my_special_ajax_call&act=sho&type=' + type + '&tax=freedom-offer',
				success:function(results)
				{
					$('#template_search_menu li').removeClass('active');
					var params = results.split('][');
					$('.badge').html(params[0]);
					$('.thumbnails.fo').html(params[1]);
					$('.row-fluid').find('.loading').remove();
					$('#'+type).addClass('active');
				}
			});
		}
		
		function showoffersby(type,slug)
		{
			$('#offersearchinput').val('');
			$('.row-fluid').append('<div class="loading"><p>Loading offers....</p></div>');
			$.ajax({
				url:"<?php echo bloginfo('wpurl'); ?>/wp-admin/admin-ajax.php",
				type:'POST',
				data:'action=my_special_ajax_call&act=shob&slug='+ slug +'&type=' + type + '&tax=freedom-offer',
				success:function(results)
				{
					$('#template_search_menu li').removeClass('active');
					var params = results.split('][');
					$('.badge').html(params[0]);
					$('.thumbnails.fo').html(params[1]);
					$('.row-fluid').find('.loading').remove();
					$('#'+slug).addClass('active');
				}
			});
		}
		function onkp(e)
		{
			var code = (e.keyCode ? e.keyCode : e.which);
			if(code == 13) {
				searchOffer();
			}
		}
		function searchOffer()
		{
			$('.row-fluid').append('<div class="loading"><p>Loading offers....</p></div>');
			$.ajax({
				url:"<?php echo bloginfo('wpurl'); ?>/wp-admin/admin-ajax.php",
				type:'POST',
				data:'action=my_special_ajax_call&act=sfo&text='+ $('#offersearchinput').val(),
				success:function(results)
				{
					var params = results.split('][');
					$('.badge').html(params[0]);
					if(params[1] != '')
						$('.thumbnails.fo').html(params[1]);
					else
						$('.thumbnails.fo').html('Search term not found.');
					$('.row-fluid').find('.loading').remove();
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
					var str = 'fname='+fname+'&email='+email+'&phone='+phone+"&src="+$('#source').val();
					//alert(str);
                    $.ajax({
                        url:"<?php echo bloginfo('wpurl'); ?>/wp-admin/admin-ajax.php",
                        type:'POST',
                        data:'action=my_special_ajax_call&act=so&' + str,
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
        
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/js/jquery.bxslider.css" type="text/css" />
		<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.bxslider.js"></script>
        <script type="text/javascript">
			$(document).ready(function(){
				$('.slides1').bxSlider({
				  moveSlides:1,
				  auto: false,				  
				  controls: true,
				  slideWidth:450,
				  speed:4000,
		  			pause:5000,
					pager:false
				});
				
				$('.slides2').bxSlider({
				  moveSlides:2,
				  auto: false,				  
				  controls: true,
				  slideWidth:480,
				  speed:4000,
		  		pause:5000,
				pager:false
				});
			});
			
			function scrollDown(pid)
			{			
				$('html, body').animate({
				scrollTop: $("#"+pid).offset().top
				}, 1000);
			}
        </script>
        
                        
        
		<?php wp_head(); ?>
        
</head>
	
	
<body>
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
<!-- END: Module -->

<?php
			if(have_posts()): 
			while(have_posts()) :
			the_post();
			$background_image = get_field('bann_backimage');			
			?>
<!-- START: Module -->
<div class="mainfull slider border_box" style="background:url(<?php echo $background_image["url"]; ?>) no-repeat center center; background-size: cover; width: 100%; height: 100%; padding-bottom:30px;">
	<div class="main_wrap">
		<div class="slider_wrap">
                <div class="slider_left">
                    <div class="slider_left_content">
                        <p class="slider_h1" style="text-transform:uppercase;"><?php the_field('bann_head'); ?></p>
                        <p class="slider_p"><?php the_field('bann_subhead'); ?></p>
                    </div>
                </div>
                <div class="slider_right">
                    
                </div>
                <div class="clr"></div>
                <div class="box_home">
                    <div class="form_wrap" style="position:relative; top:30px;">					
                        <?php
                        //the_content();
                        ?>
                    </div>
                </div>
				<div class="clr"></div>
				<div class="apx_offer2">
                    <div class="apx_offer_wrap">
                    	<div class="apx_offer_l2 sfappex_l2">
                        	<?php
                            $args = array(
										'post_type' => 'freedom-offers',
										'post_status' => 'publish',
										'showposts' => '1000',
										'orderby' => 'menu_order',
										'order' => 'asc',
											'tax_query' => array(
												  array(
													  'taxonomy' => 'offer-type',
													  'field' => 'slug',
													  'terms' => 'freedom-offer'
												  )
											),
							  'post__not_in' => array(1541,1547,1828)
										 );
							$offers = get_posts($args);
							?>
                        	<h2><span><?php echo count($offers); ?></span> Radical Offers to Help You Grow!</h2>
                                <ul class="slides1">
                            <?php
                            if($offers)
                            {								
                                foreach($offers as $offer)
                                {
                                    if (has_post_thumbnail( $offer->ID ) ):
                                        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $offer->ID ), 'single-post-thumbnail' );
                                    endif;
                                	?>
                                  <li><div class="columns_apx" style="float:none; margin-bottom:10px;">
                                  <div class="app_box2" style="padding: 22px 20px 12px;">
                                    <div class="app_box2_l" style="width: 125px;"> <img width="99" height="99" alt="" src="<?php echo bloginfo('template_url'); ?>/thumb.php?src=<?php echo $image[0]; ?>&w=99&h=99"> </div>
                                    <div class="app_box2_r" style="width: 265px;">
                                      <p class="ibox_head2"><?php echo $offer->post_title; ?></p>
                                      <p class="ibox_p2"><?php echo $offer->post_excerpt; ?></p>
                                      <div class="clear"></div>
                                      <p><a href="javascript:void(0);" onClick="addClick(<?php echo $offer->ID; ?>,'<?php echo bloginfo('wpurl'); ?>/congratulations?add-to-cart=<?php echo get_post_meta($offer->ID,'link_product_id',true); ?>')" class="offer_buynow">Buy Now</a><a onclick="addView(<?php echo $offer->ID; ?>)" class="seedetail2" href="javascript:void(0)" style="float:left;margin-left:15px; margin-top:5px;" id="box<?php echo $offer->ID; ?>_link">Show Details</a> </p>
                                    </div>
                                    <div class="clr"></div>
                                  </div>
                                </div></li>
                                <?php                                    
                                }
                            }
                            ?>                            
                            </ul>
                            <a class="all_offers2" href="javascript:void(0);" onclick="scrollDown('all_offers')">View All <strong><?php echo count($offers); ?></strong> Offers</a>
                        </div>
                        <div class="apx_offer_r2 sfappex_r2">
                        	<?php
                            $args = array(
							  'post_type' => 'videos',
							  'post_status' => 'publish',
							  'showposts' => '1000',
							  'meta_key' => 'views',
							  'orderby' => 'meta_value',
							  'order' => 'desc',
							  'post__not_in' => array(1586,1591,1593)
						   	);
						   	$videos = get_posts($args);						   	
							?>
                        	<h2><span><?php echo count($videos); ?></span> Videos to Help You Market in Salesforce</h2>
                            <ul class="slides2">
                        <?php
                        if($videos)
                        {                          
                          foreach($videos as $video)
                          {
                              if (has_post_thumbnail( $video->ID ) ):
                                    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $video->ID ), 'single-post-thumbnail' );
                                endif;
                            ?>
                            <li><div class="videobox">
                                <img width="240" height="140" alt="" src="<?php echo bloginfo('template_url'); ?>/thumb.php?src=<?php echo $image[0]; ?>&w=240&h=140" style="float:left;">
                                <div class="video_r">
                                    <h2><?php echo $video->post_title; ?></h2>
                                    <a class="watch_video" href="javascript:void(0);" onClick="addView2(<?php echo $video->ID; ?>,'http://player.vimeo.com/video/<?php echo get_post_meta($video->ID,'video_id',true); ?>?width=800&height=450',800,450)">Watch Video</a>
                                </div>
                            </div></li>
                            <?php                            
                          }
                        }
                        ?>
                        </ul>
                            <a class="all_offers2" href="javascript:void(0);" onclick="scrollDown('all_videos')">View All <strong><?php echo count($videos); ?></strong> Videos</a>
                        </div>
                    </div>
                </div>
                <div class="clr"></div>
                <div class="apx_offer2">
                    <div class="apx_offer_wrap">
                    	<div class="apx_offer_l2 sfappex_cg" style="width:980px; float:none;">
                        	<?php
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
										  'terms' => 'consultant-gallery'
									  )
								)
							 );
							$offers = get_posts($args);
							?>
							<h2>World class experts to boost your CRM</h2>
                            <!--<ul class="slides2">-->
                            <ul class="thumbnails fo cg slides2">
  <li class="span3" style="width:490px; margin-right:10px;">
    <div style="background:none;" class="thumbnail">
      <div class="clear"></div>
      <div class="img2"><img alt="" src="http://www.makesbridge.com/wp-content/themes/mksteam/thumb.php?src=http://www.makesbridge.com/wp-content/uploads/2014/06/Manish.jpg&amp;w=99&amp;h=99&quot;">
        <div class="hoverbtns"> <a onClick="addView(1873)" href="javascript:void(0);" class="previewbtn"><span></span>View Detail</a> <a onClick="addClick(1873,'http://www.makesbridge.com/congratulations?add-to-cart=1239')" href="javascript:void(0);" class="selectbtn"><span></span>Select Offer</a> </div>
      </div>
      <div class="caption">
        <h3>Manish Tiwari</h3>
        <p>World class business cloud specialist with 6 years of experience.</p>
        <p class="tags"><a onClick="showoffersby('tag','apex')" href="javascript:void(0);">apex</a><a onClick="showoffersby('tag','crm-fusion')" href="javascript:void(0);">CRM Fusion</a><a onClick="showoffersby('tag','hoovers')" href="javascript:void(0);">Hoovers</a><a onClick="showoffersby('tag','salesforce-administration')" href="javascript:void(0);">Salesforce Administration</a><a onClick="showoffersby('tag','visual-force')" href="javascript:void(0);">visual force</a></p>
        <div class="btm-bar" id="views_1873"><span class="icon view"></span> <span><em>33</em> </span></div>
      </div>
      <div class="clear"></div>
    </div>
  </li>
  <div class="off_details" id="off_det_1873">
    <div style="display: block;" id="box6_detail" class="offerdetail">
      <h2 class="h2box ">6 years of world class experience in sales cloud, service cloud and custom development.</h2>
      <p class="box_headline">Manish is a highly qualified experienced Salesforce consultant along with getting hands-on experience with the most powerful marketing automation tool out there !</p>
      <p class="box_headline">And that's not all , when you subscribe to MKS PRO for one year we’ll rebate the cost of an annual subscription to LinkedIn Sales Plus!</p>
      <p class="box_headline">If your business needs a resource to find new high quality prospects for sales … </p>
      <p class="box_p">then this package is perfect. Use LinkedIn to make connnections and Makesbridge to engage them with drip marketing and monitor digital interactions with your company.</p>
      <div class="value"><span>Value:</span> $479.00</div>
    </div>
    <a onClick="addClick(1873,'http://www.makesbridge.com/congratulations?add-to-cart=1239'" href="javascript:void(0);" class="selectoffbtn">Select Offer</a></div>
  <li style="margin-right:0px;" class="span3">
    <div style="background:none;" class="thumbnail"><img width="45" height="44" src="http://www.makesbridge.com/wp-content/themes/mksteam/images/featured-icon.png" class="feat_star">
      <div class="clear"></div>
      <div class="img2"><img alt="" src="http://www.makesbridge.com/wp-content/themes/mksteam/thumb.php?src=http://www.makesbridge.com/wp-content/uploads/2014/05/m-icon.png&amp;w=99&amp;h=99&quot;">
        <div class="hoverbtns"> <a onClick="addView(1872)" href="javascript:void(0);" class="previewbtn"><span></span>View Detail</a> <a onClick="addClick(1872,'http://www.makesbridge.com/congratulations?add-to-cart=')" href="javascript:void(0);" class="selectbtn"><span></span>Select Offer</a> </div>
      </div>
      <div class="caption">
        <h3>Get 5 times the email send volume</h3>
        <p>Get marketing automation and all the email you need…</p>
        <p class="tags"><a onClick="showoffersby('tag','automation-2')" href="javascript:void(0);">automation</a><a onClick="showoffersby('tag','campaigns')" href="javascript:void(0);">campaigns</a><a onClick="showoffersby('tag','demand-generation')" href="javascript:void(0);">demand generation</a><a onClick="showoffersby('tag','highrise')" href="javascript:void(0);">highrise</a><a onClick="showoffersby('tag','lead-nurturing')" href="javascript:void(0);">lead nurturing</a><a onClick="showoffersby('tag','marketing-2')" href="javascript:void(0);">marketing</a><a onClick="showoffersby('tag','netsuite-2')" href="javascript:void(0);">netsuite</a><a onClick="showoffersby('tag','salesforce-2')" href="javascript:void(0);">salesforce</a></p>
        <div class="btm-bar" id="views_1872"><span class="icon view"></span> <span><em>11</em> </span></div>
      </div>
      <div class="clear"></div>
    </div>
  </li>
  <div class="off_details" id="off_det_1872">
    <div style="display: block;" id="box4_detail" class="offerdetail">
      <h2 class="h2box ">Get a 1 Year subscription and we’ll throw in an extra 40,000 sent emails per month!</h2>
      <p class="box_headline">If you need personal service, marketing automation and more email volume…</p>
      <p class="box_p">then join our 4.9 / 5 Star Rated platform for one year and save BIG!</p>
      <div class="value"><span>You Save:</span> $7,200/year </div>
    </div>
    <a onClick="addClick(1872,'http://www.makesbridge.com/congratulations?add-to-cart='" href="javascript:void(0);" class="selectoffbtn">Select Offer</a></div>
  <li class="span3">
    <div style="background:none;" class="thumbnail"><img width="45" height="44" src="http://www.makesbridge.com/wp-content/themes/mksteam/images/featured-icon.png" class="feat_star">
      <div class="clear"></div>
      <div class="img2"><img alt="" src="http://www.makesbridge.com/wp-content/themes/mksteam/thumb.php?src=http://www.makesbridge.com/wp-content/uploads/2014/05/ns-logo.png&amp;w=99&amp;h=99&quot;">
        <div class="hoverbtns"> <a onClick="addView(1871)" href="javascript:void(0);" class="previewbtn"><span></span>View Detail</a> <a onClick="addClick(1871,'http://www.makesbridge.com/congratulations?add-to-cart=1237')" href="javascript:void(0);" class="selectbtn"><span></span>Select Offer</a> </div>
      </div>
      <div class="caption">
        <h3>Marketing Consultant Voucher &ndash; $2,000</h3>
        <p>Jump start your marketing with a proven resource.</p>
        <p class="tags"><a onClick="showoffersby('tag','automation-2')" href="javascript:void(0);">automation</a><a onClick="showoffersby('tag','campaigns')" href="javascript:void(0);">campaigns</a><a onClick="showoffersby('tag','marketing-2')" href="javascript:void(0);">marketing</a></p>
        <div class="btm-bar" id="views_1871"><span class="icon view"></span> <span><em>32</em> </span></div>
      </div>
      <div class="clear"></div>
    </div>
  </li>
  <div class="off_details" id="off_det_1871">
    <div style="display: block;" id="box2_detail" class="offerdetail">
      <h2 class="h2box ">Sign up for MKS Enterprise for 12 Months and we’ll pay for a marketing consultant.</h2>
      <p class="box_headline">If you need help with automation strategy, digital marketing basics or any project.</p>
      <p class="box_p">A perfect way to start a new beginning on a great platform is to have a professional help you maximize it’s use!</p>
      <div class="value"><span>Value:</span> $2,000 </div>
    </div>
    <a onClick="addClick(1871,'http://www.makesbridge.com/congratulations?add-to-cart=1237'" href="javascript:void(0);" class="selectoffbtn">Select Offer</a></div>
  <li style="margin-right:0px;" class="span3">
    <div style="background:none;" class="thumbnail"><img width="45" height="44" src="http://www.makesbridge.com/wp-content/themes/mksteam/images/featured-icon.png" class="feat_star">
      <div class="clear"></div>
      <div class="img2"><img alt="" src="http://www.makesbridge.com/wp-content/themes/mksteam/thumb.php?src=http://www.makesbridge.com/wp-content/uploads/2014/05/sf-logo.png&amp;w=99&amp;h=99&quot;">
        <div class="hoverbtns"> <a onClick="addView(1870)" href="javascript:void(0);" class="previewbtn"><span></span>View Detail</a> <a onClick="addClick(1870,'http://www.makesbridge.com/congratulations?add-to-cart=1236')" href="javascript:void(0);" class="selectbtn"><span></span>Select Offer</a> </div>
      </div>
      <div class="caption">
        <h3>3 Seats of Salesforce Pro Edition!</h3>
        <p>Sell more. Grow faster. Close anywhere.</p>
        <p class="tags"><a onClick="showoffersby('tag','connections-2')" href="javascript:void(0);">connections</a><a onClick="showoffersby('tag','crm')" href="javascript:void(0);">crm</a><a onClick="showoffersby('tag','marketing-2')" href="javascript:void(0);">marketing</a><a onClick="showoffersby('tag','sales-2')" href="javascript:void(0);">sales</a><a onClick="showoffersby('tag','salesforce-2')" href="javascript:void(0);">salesforce</a></p>
        <div class="btm-bar" id="views_1870"><span class="icon view"></span> <span><em>18</em> </span></div>
      </div>
      <div class="clear"></div>
    </div>
  </li>
  <div class="off_details" id="off_det_1870">
    <div style="display: block;" id="box5_detail" class="offerdetail">
      <h2 class="h2box ">Subscribe to MKS Enterprise and we’ll rebate your cost for 3 Salesforce Sales Cloud Seats!</h2>
      <p class="box_headline">Access the world’s most popular CRM Tool.</p>
      <p class="box_p">From the small business to the large enterprise, Salesforce is a solution that will help sales reps everywhere add to pipelines, reduce sales cycles, and sell more.</p>
      <div class="value"><span>Value:</span> $195/Mo </div>
    </div>
    <a onClick="addClick(1870,'http://www.makesbridge.com/congratulations?add-to-cart=1236'" href="javascript:void(0);" class="selectoffbtn">Select Offer</a></div>
  <li class="span3">
    <div style="background:none;" class="thumbnail">
      <div class="clear"></div>
      <div class="img2"><img alt="" src="http://www.makesbridge.com/wp-content/themes/mksteam/thumb.php?src=http://www.makesbridge.com/wp-content/uploads/2014/06/Yogesh2.jpg&amp;w=99&amp;h=99&quot;">
        <div class="hoverbtns"> <a onClick="addView(1869)" href="javascript:void(0);" class="previewbtn"><span></span>View Detail</a> <a onClick="addClick(1869,'http://www.makesbridge.com/congratulations?add-to-cart=1232')" href="javascript:void(0);" class="selectbtn"><span></span>Select Offer</a> </div>
      </div>
      <div class="caption">
        <h3>Yogesh Rankawat</h3>
        <p>Salesforce Architect &amp; Consultant with 8+ years of professional experience.</p>
        <p class="tags"><a onClick="showoffersby('tag','apex')" href="javascript:void(0);">apex</a><a onClick="showoffersby('tag','finance')" href="javascript:void(0);">finance</a><a onClick="showoffersby('tag','force-com')" href="javascript:void(0);">force.com</a><a onClick="showoffersby('tag','healthcare')" href="javascript:void(0);">healthcare</a><a onClick="showoffersby('tag','marketing-2')" href="javascript:void(0);">marketing</a><a onClick="showoffersby('tag','publishing')" href="javascript:void(0);">publishing</a><a onClick="showoffersby('tag','visual-force')" href="javascript:void(0);">visual force</a></p>
        <div class="btm-bar" id="views_1869"><span class="icon view"></span> <span><em>40</em> </span></div>
      </div>
      <div class="clear"></div>
    </div>
  </li>
  <div class="off_details" id="off_det_1869">
    <div style="display: block;" id="box3_detail" class="offerdetail">
      <h2 class="h2box ">Revitalize your Salesforce project with Yogesh's 8 years of rich experience!</h2>
      <p class="box_headline">Navivo Technology Solutions is a global Technology development services company having a team of architects, developers, administrators and consultants who believe in innovation and exploiting technology to deliver the highest quality results. …</p>
      <p class="box_headline">An amazing bundled offer that gets you into CRM, marketing and sales automation! …</p>
      <p class="box_p">We’ll immediately credit the cost of Highrise Plus from your subscription to MKS PRO … </p>
      <p class="box_headline">That’s full CRM and marketing automation for $150.00/mo!</p>
      <div class="value"><span>Value:</span> $49/Mo </div>
    </div>
    <a onClick="addClick(1869,'http://www.makesbridge.com/congratulations?add-to-cart=1232'" href="javascript:void(0);" class="selectoffbtn">Select Offer</a></div>
  <li style="margin-right:0px;" class="span3">
    <div style="background:none;" class="thumbnail">
      <div class="clear"></div>
      <div class="img2"><img alt="" src="http://www.makesbridge.com/wp-content/themes/mksteam/thumb.php?src=http://www.makesbridge.com/wp-content/uploads/2014/05/sf-logo.png&amp;w=99&amp;h=99&quot;">
        <div class="hoverbtns"> <a onClick="addView(1868)" href="javascript:void(0);" class="previewbtn"><span></span>View Detail</a> <a onClick="addClick(1868,'http://www.makesbridge.com/congratulations?add-to-cart=1229')" href="javascript:void(0);" class="selectbtn"><span></span>Select Offer</a> </div>
      </div>
      <div class="caption">
        <h3>5 Hours of Certified Salesforce Consulting</h3>
        <p>Get the most out of your Salesforce subscription</p>
        <p class="tags"><a onClick="showoffersby('tag','apex-trigger')" href="javascript:void(0);">apex trigger</a><a onClick="showoffersby('tag','connections-2')" href="javascript:void(0);">connections</a><a onClick="showoffersby('tag','crm')" href="javascript:void(0);">crm</a><a onClick="showoffersby('tag','salesforce-2')" href="javascript:void(0);">salesforce</a></p>
        <div class="btm-bar" id="views_1868"><span class="icon view"></span> <span><em>34</em> </span></div>
      </div>
      <div class="clear"></div>
    </div>
  </li>
  <div class="off_details" id="off_det_1868">
    <div style="display: block;" id="box1_detail" class="offerdetail">
      <h2 class="h2box ">Subscribe to MKS PRO for 4 months to get 5 Hours for any project!</h2>
      <p class="box_headline">A certified consultant will optimize your Salesforce account.</p>
      <p class="box_p">Tell us where you need help and we’ll pay a certified Salesforce consultant to help.</p>
      <p class="box_p">We pay the consultant when the 5 Hour project is completed. </p>
      <p>Subscribe to MKS PRO for 4 Months</p>
      <div class="value"><span>Value:</span> $600</div>
    </div>
    <a onClick="addClick(1868,'http://www.makesbridge.com/congratulations?add-to-cart=1229'" href="javascript:void(0);" class="selectoffbtn">Select Offer</a></div>
  <li class="span3">
    <div style="background:none;" class="thumbnail">
      <div class="clear"></div>
      <div class="img2"><img alt="" src="http://www.makesbridge.com/wp-content/themes/mksteam/thumb.php?src=http://www.makesbridge.com/wp-content/uploads/2014/05/zoominfo.jpg&amp;w=99&amp;h=99&quot;">
        <div class="hoverbtns"> <a onClick="addView(1867)" href="javascript:void(0);" class="previewbtn"><span></span>View Detail</a> <a onClick="addClick(1867,'http://www.makesbridge.com/congratulations?add-to-cart=510')" href="javascript:void(0);" class="selectbtn"><span></span>Select Offer</a> </div>
      </div>
      <div class="caption">
        <h3>We’ll pay for ZoomInfo data!</h3>
        <p>Jump start demand generation with targeted drip lines and data!</p>
        <p class="tags"><a onClick="showoffersby('tag','campaign')" href="javascript:void(0);">campaign</a><a onClick="showoffersby('tag','data')" href="javascript:void(0);">data</a><a onClick="showoffersby('tag','demand-generation')" href="javascript:void(0);">demand generation</a><a onClick="showoffersby('tag','marketing-2')" href="javascript:void(0);">marketing</a><a onClick="showoffersby('tag','sales-2')" href="javascript:void(0);">sales</a></p>
        <div class="btm-bar" id="views_1867"><span class="icon view"></span> <span><em>12</em> </span></div>
      </div>
      <div class="clear"></div>
    </div>
  </li>
  <div class="off_details" id="off_det_1867">
    <div id="box1_detail" class="offerdetail" style="">
      <h2 class="h2box ">Sign up for MKS Enterprise and we'll pay for 3,000 contacts to jump start your lead generation:</h2>
      <p class="box_p2">Micro-targeting works. ZoomInfo provides the contacts and Makesbridge provides the tool to canvas, track responses and automate a series of meeting requests to interested prospects.</p>
      <p class="box_p2"><strong>Included in this program:</strong></p>
      <ul>
        <li>3,000 contacts worth $2,400.00</li>
        <li>Pre-configured Ice Breaker nurture drip template</li>
        <li>Pre-configured 12-month meeting request drip template</li>
        <li>Annual MKS Enterprise subscription</li>
      </ul>
    </div>
    <a onClick="addClick(1867,'http://www.makesbridge.com/congratulations?add-to-cart=510'" href="javascript:void(0);" class="selectoffbtn">Select Offer</a></div>
  <li style="margin-right:0px;" class="span3">
    <div style="background:none;" class="thumbnail"><img width="45" height="44" src="http://www.makesbridge.com/wp-content/themes/mksteam/images/featured-icon.png" class="feat_star">
      <div class="clear"></div>
      <div class="img2"><img alt="" src="http://www.makesbridge.com/wp-content/themes/mksteam/thumb.php?src=http://www.makesbridge.com/wp-content/uploads/2014/05/erplogo.png&amp;w=99&amp;h=99&quot;">
        <div class="hoverbtns"> <a onClick="addView(1866)" href="javascript:void(0);" class="previewbtn"><span></span>View Detail</a> <a onClick="addClick(1866,'http://www.makesbridge.com/congratulations?add-to-cart=1907')" href="javascript:void(0);" class="selectbtn"><span></span>Select Offer</a> </div>
      </div>
      <div class="caption">
        <h3>We’ll pay for ERP Guru Consulting!</h3>
        <p>Seasoned consultants enable NetSuite with powerful marketing.</p>
        <p class="tags"><a onClick="showoffersby('tag','connections-2')" href="javascript:void(0);">connections</a><a onClick="showoffersby('tag','crm')" href="javascript:void(0);">crm</a><a onClick="showoffersby('tag','integration-2')" href="javascript:void(0);">integration</a><a onClick="showoffersby('tag','marketing-2')" href="javascript:void(0);">marketing</a><a onClick="showoffersby('tag','netsuite-2')" href="javascript:void(0);">netsuite</a><a onClick="showoffersby('tag','sales-2')" href="javascript:void(0);">sales</a></p>
        <div class="btm-bar" id="views_1866"><span class="icon view"></span> <span><em>89</em> </span></div>
      </div>
      <div class="clear"></div>
    </div>
  </li>
  <div class="off_details" id="off_det_1866">
    <div id="box1_detail" class="offerdetail" style="">
      <h2 class="h2box ">Sign up for MKS Enterprise for 12 months and we’ll pay for the ERP Guru QuickStart NetSuite program:</h2>
      <p class="box_p2">Seasoned NetSuite professionals will guide you through achieving your marketing goals with Makesbridge, configure it for you and train you on how to use it with NetSuite. You’ll also get a coaching session with a Marketing NetSuite super user who will share their best practices with you.</p>
      <p class="box_p2"><strong>Included in this program:</strong></p>
      <ul>
        <li>High Level Discovery / requirement assessment</li>
        <li>Implementation of basic configuration</li>
        <li>Training / Review of configuration</li>
        <li>Real life utilization; Coaching / Best practice</li>
      </ul>
      <div class="value"><span>Value:</span> $1,400</div>
    </div>
    <a onClick="addClick(1866,'http://www.makesbridge.com/congratulations?add-to-cart=1907'" href="javascript:void(0);" class="selectoffbtn">Select Offer</a></div>
  <li class="span3">
    <div style="background:none;" class="thumbnail">
      <div class="clear"></div>
      <div class="img2"><img alt="" src="http://www.makesbridge.com/wp-content/themes/mksteam/thumb.php?src=http://www.makesbridge.com/wp-content/uploads/2014/05/Arthur.jpg&amp;w=99&amp;h=99&quot;">
        <div class="hoverbtns"> <a onClick="addView(1865)" href="javascript:void(0);" class="previewbtn"><span></span>View Detail</a> <a onClick="addClick(1865,'http://www.makesbridge.com/congratulations?add-to-cart=1821')" href="javascript:void(0);" class="selectbtn"><span></span>Select Offer</a> </div>
      </div>
      <div class="caption">
        <h3>Arthur Jackson</h3>
        <p>NetSuite Partner and Certified NetSuite ERP Consultant .</p>
        <p class="tags"><a onClick="showoffersby('tag','consulting')" href="javascript:void(0);">consulting</a><a onClick="showoffersby('tag','ecommerce')" href="javascript:void(0);">ecommerce</a><a onClick="showoffersby('tag','implementation')" href="javascript:void(0);">implementation</a><a onClick="showoffersby('tag','netsuite-sales')" href="javascript:void(0);">NetSuite sales</a><a onClick="showoffersby('tag','writing')" href="javascript:void(0);">writing</a></p>
        <div class="btm-bar" id="views_1865"><span class="icon view"></span> <span><em>12</em> </span></div>
      </div>
      <div class="clear"></div>
    </div>
  </li>
  <div class="off_details" id="off_det_1865">
    <div id="box1_detail" class="offerdetail" style="">
      <h2 class="h2box ">The highly experienced Arthur Jackson will get Netsuite optimized for your marketing automation!</h2>
      <p class="box_p2">Trimtab Consultants is a NetSuite solution provider offering Sales, implementation, customization, and training whereas NetSuite is the #1 Cloud Business Management software and a full featured financial, ERP, CRM, Inventory, and ecommerce software.</p>
      <p class="box_p2">Sign up for MKS PRO for a minimum of 4 months and we’ll pay for 5 hours of NetSuite’s time.</p>
      <p class="box_p2"><strong>Included in this program:</strong></p>
      <ul>
        <li>High Level Discovery / requirement assessment</li>
        <li>Implementation of basic configuration</li>
        <li>Training / Review of configuration</li>
      </ul>
      <div class="value"><span>Value:</span> $600</div>
    </div>
    <a onClick="addClick(1865,'http://www.makesbridge.com/congratulations?add-to-cart=1821'" href="javascript:void(0);" class="selectoffbtn">Select Offer</a></div>
  <li style="margin-right:0px;" class="span3">
    <div style="background:none;" class="thumbnail">
      <div class="clear"></div>
      <div class="img2"><img alt="" src="http://www.makesbridge.com/wp-content/themes/mksteam/thumb.php?src=http://www.makesbridge.com/wp-content/uploads/2014/06/Matt.jpg&amp;w=99&amp;h=99&quot;">
        <div class="hoverbtns"> <a onClick="addView(1863)" href="javascript:void(0);" class="previewbtn"><span></span>View Detail</a> <a onClick="addClick(1863,'http://www.makesbridge.com/congratulations?add-to-cart=1829')" href="javascript:void(0);" class="selectbtn"><span></span>Select Offer</a> </div>
      </div>
      <div class="caption">
        <h3>Matt Millen</h3>
        <p>15+ Years of Web &amp; Software Development, Branding &amp; Marketing</p>
        <p class="tags"><a onClick="showoffersby('tag','adwords')" href="javascript:void(0);">Adwords</a><a onClick="showoffersby('tag','branding')" href="javascript:void(0);">Branding</a><a onClick="showoffersby('tag','internet-marketing')" href="javascript:void(0);">Internet marketing</a><a onClick="showoffersby('tag','marketing-2')" href="javascript:void(0);">marketing</a><a onClick="showoffersby('tag','sales-2')" href="javascript:void(0);">sales</a><a onClick="showoffersby('tag','seo')" href="javascript:void(0);">SEO.</a></p>
        <div class="btm-bar" id="views_1863"><span class="icon view"></span> <span><em>14</em> </span></div>
      </div>
      <div class="clear"></div>
    </div>
  </li>
  <div class="off_details" id="off_det_1863">
    <div id="box1_detail" class="offerdetail" style="">
      <h2 class="h2box ">Power up your business with MKS Enterprise &amp; Netechy's Adwords program!</h2>
      <p class="box_p2">Netechy Adwords specialists can drive better conversions for your business: get relevant traffic driven to your site and ensure that those visitors are turned into customers.</p>
      <p class="box_p2"><strong>Included in this program:</strong></p>
      <ul>
        <li>Weekly reports, emailed direct to you</li>
        <li>Personalized web marketing and business advice</li>
        <li>Your own dedicated advertising manager</li>
        <li>Access to the Netechy tracking integration specialists</li>
      </ul>
      <div class="value"><span>Value:</span> $2,000</div>
    </div>
    <a onClick="addClick(1863,'http://www.makesbridge.com/congratulations?add-to-cart=1829'" href="javascript:void(0);" class="selectoffbtn">Select Offer</a></div>
</ul>
                            	<?php
								/*if($offers)
								{								
									foreach($offers as $offer)
									{
										if (has_post_thumbnail( $offer->ID ) ):
											$image = wp_get_attachment_image_src( get_post_thumbnail_id( $offer->ID ), 'single-post-thumbnail' );
										endif;										
									}
								}*/
								?>
                            <!--</ul>-->
                        </div>
                    </div>
                </div>
				<?php echo $post->post_content; ?>				
            <?php
            endwhile;
            endif;
            ?>
		</div>
	</div>
</div>
<!-- END: Module -->
<!-- START: Module -->
<div class="mainfull section5 border_box" style="padding: 40px;">
	<div style="position:relative; z-index:1000;" class="main_wrap">        	
        <div class="clear"></div>
        <div class="laptop">
            <?php
				echo do_shortcode('[videos id="2484" width="500" height="500"]');
				?>
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
<div class="mainfull border_box" id="all_videos" style="background-color: #ecf3fa;">
	<div class="main_wrap appx_more_videos" style="padding:35px 0;">
		  <h2>View these videos to get started</h2>
          <?php		  
		   $videos = get_posts($args);
		   if($videos)
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
		  }
		  ?>
          <div class="clear"></div>
          <ul class="thumbnails vg">
          	<?php        
			  $i=1;
			  if($vids):
			  foreach($vids as $vid):
				  $video = (object) $vid;
				  $image = '';
				  if (has_post_thumbnail( $video->ID ) ):
					  $image = wp_get_attachment_image_src( get_post_thumbnail_id( $video->ID ), 'single-post-thumbnail' );
				  endif;
				  $is_featured = get_post_meta($video->ID,'is_featured',true);			
				  ?>
					  <li class="span3" style="<?php if($i % 2 == 0) { echo 'margin-right:0px;'; } ?>; width:480px; background-color:#fff;">
						<div class="thumbnail">
						  <?php
						  if($is_featured)
						  {
						  ?>
							  <img class="feat_star" src="<?php echo bloginfo('template_url'); ?>/images/featured-icon.png" width="45" height="44" />
						  <?php
						  }
						  ?>
						  <div class="clear"></div>
						  <div class="img" style="width:240px;">                      
							<img src="<?php echo bloginfo("template_url"); ?>/thumb.php?src=<?php echo $image[0]; ?>&w=240&h=175" alt="" width="240" height="175" /></div>
						  <div class="caption" style="width:210px;">
							<h3><?php echo $video->post_title; ?></h3>                       
							  <p class="tags">
							  <?php $tags = wp_get_post_terms( $video->ID, 'post_tag', $args );
							  if($tags):
							  foreach($tags as $tag):
							  ?>
								  <a href="javascript:void(0);" onclick="showpostsby('tag','<?php echo $tag->slug; ?>')"><?php echo $tag->name; ?></a>
							  <?php
							  endforeach;
							  endif;
							  $views = $video->Views;
							  ?>
							  </p>
							<div id="views_<?php echo $video->ID; ?>" class="btm-bar"> <span><span class="icon view"></span> <em><?php echo ($views > 0) ? $views : '0'; ?></em></span>
							  <a class="playvideo" href="javascript:void(0);" onclick="addView2(<?php echo $video->ID; ?>,'http://player.vimeo.com/video/<?php echo get_post_meta($video->ID,'video_id',true); ?>?width=800&height=450',800,450)" style="margin-right:15px;">Watch Video</a>
							</div>
						</div>
						<div class="clear"></div>
					  </li>
				  <?php 
					  if($i % 2 == 0)
						  echo '<div class="clear"></div>';
				  $i++;       	
			  endforeach;
			  endif;
			  ?>              
          </ul>
          <div class="clear"></div>
	</div>
</div>
</div>
<div class="mainfull border_box" id="all_offers">
	<div class="main_wrap appx_more_videos" style="padding:35px 0; width:1040px;">
		  <h2 style="margin-bottom:40px;">View these offers to help you grow!</h2>
          <div class="temp-filters clearfix fo">
      <h2 id="total_templates"><strong class="badge"><?php echo count($offers); ?></strong> Offers Found</h2>
      <div class="srt-div" style="margin-right:0px;">
        <div class="template-filter"> <strong class="sort">Sort by</strong>
        	<div class="breadcrumb" style="padding-top:1px; padding-bottom:9px; margin:0;">
            	<div style="width:110px; height:30px; background:url('<?php echo get_template_directory_uri(); ?>/images/down-arrow.png') no-repeat right 65%;">
                    <select name="filters" id="filters" style="width:160px; background: transparent; border:0; font-family:proxima_nova_regular; font-size:14px; color:#85ACC1;" onchange="sortoffers()">
                        <!--<option value="viewed">Viewed</option>-->
                        <option value="popular">Popularity</option>                        
                        <option value="recent">All (recent first)</option>
                        <option value="featured">Featured</option>                        
                        <option value="cat,marketing">Marketing</option>
                        <option value="cat,sales">Sales</option>
                        <option value="cat,salesforce">Salesforce</option>
                        <option value="cat,consultants">Consultants</option>
                        <option value="cat,cloud-apps">Cloud Apps</option>
                    </select>
                </div>
            </div>
            <ul class="breadcrumb" id="template_search_menu">              
              <li id="marketing" class="showtooltip" title=""><a tabindex="-1" href="javascript:void(0);" onclick="showoffersby('cat','marketing')">Marketing</a></li> 
              <li id="sales" class="showtooltip" title=""><a tabindex="-1" href="javascript:void(0);" onclick="showoffersby('cat','sales')">Sales</a></li>
              <li id="salesforce" class="showtooltip" title=""><a tabindex="-1" href="javascript:void(0);" onclick="showoffersby('cat','salesforce')">Salesforce</a></li>
              <li id="consultants" class="showtooltip" title=""><a tabindex="-1" href="javascript:void(0);" onclick="showoffersby('cat','consultants')">Consultants</a></li>
              <li id="cloud-apps" class="showtooltip" title=""><a tabindex="-1" href="javascript:void(0);" onclick="showoffersby('cat','cloud-apps')">Cloud Apps</a></li>
            </ul>
        </div>
        <div class="input-append search" id="">
          <input type="text" style="width:200px; height:20px;" class="search-control show-image" placeholder="search offers" id="offersearchinput" onkeypress="onkp(event)" />
          <a style="display:none" id="clearsearch" class="close-icon"></a>
          <div class="btn-group">
            <button id="searchbtn" class="searchbtn" tabindex="-1" onclick="searchOffer()"><span class="icon-search icon-white"> </span></button>
          </div>
        </div>
      </div>
    </div>
          <?php	
		   /*$args = array(
			  'post_type' => 'freedom-offers',
			  'post_status' => 'publish',
			  'showposts' => '1000',
			  'orderby' => 'post_date',
			  'order' => 'desc',
			  'tax_query' => array(
					array(
						'taxonomy' => 'offer-type',
						'field' => 'slug',
						'terms' => 'freedom-offer'
					)
			  )
		   );
		  $offers = get_posts($args);	*/
		  ?>
          <div class="row-fluid" style="position:relative; margin-top:20px;">
          <div class="clear"></div>
          <ul class="thumbnails fo">
            <?php        
            $i=0;
            if(count($offers) > 0):
                foreach($offers as $offer)
                {
                    $image = '';
                    if (has_post_thumbnail( $offer->ID ) ):
                        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $offer->ID ), 'single-post-thumbnail' );
                    endif;
                    $is_featured = get_post_meta($offer->ID,'is_featured',true);			
                    ?>
                    <li class="span3" style="width:248px; margin-left:0px; margin-right:10px;">
                      <div class="thumbnail" style="background:none;">
                        <?php
                        if($is_featured)
                        {
                        ?>
                            <img class="feat_star" src="<?php echo bloginfo('template_url'); ?>/images/featured-icon.png" width="45" height="44" />
                        <?php
                        }
                        ?>
                        <div class="img2" style="height:160px; line-height:240px;"> 
                        <div>
                          <a class="previewbtn" href="javascript:void(0);" onclick="addView(<?php echo $offer->ID; ?>)"><span></span>View Detail</a>
                          <a class="selectbtn" href="javascript:void(0);" onclick="addClick(<?php echo $offer->ID; ?>,'<?php echo bloginfo('wpurl'); ?>/congratulations?add-to-cart=<?php echo get_post_meta($offer->ID,'link_product_id',true); ?>')"><span></span>Select Offer</a>
                        </div>
                        <img src="<?php echo bloginfo('template_url'); ?>/thumb.php?src=<?php echo $image[0]; ?>&w=99&h=99" alt=""></div>
                        <div class="caption" style="min-height:200px;">
                          <h3><?php echo $offer->post_title; ?></h3>
                          <p><?php echo $offer->post_excerpt; ?></p>
                          <p class="tags" style="height:60px;">
                            <?php $tags = wp_get_post_terms( $offer->ID, 'post_tag', $args );
                                      if($tags):
                                      foreach($tags as $tag):
                                      ?>
                            <a href="javascript:void(0);" onclick="showoffersby('tag','<?php echo $tag->slug; ?>')"><?php echo $tag->name; ?></a>
                            <?php
                                      endforeach;
                                      endif;
                                      $views = get_post_meta($offer->ID,'views',true);
                                      ?>
                          </p>
                          <div id="views_<?php echo $offer->ID; ?>" class="btm-bar"> <span><span class="icon view"></span> <em><?php echo ($views > 0) ? $views : '0'; ?></em></span></div>
                        </div>
                      </div>
                    </li>
                <?php        	
                }
            endif;
            ?>
          </ul>
          <div class="clear"></div>
          <?php
          foreach($offers as $offer)
            {
            ?>
            <div id="off_det_<?php echo $offer->ID; ?>" class="off_details"> <?php echo $offer->post_content; ?> 
                <a class="selectoffbtn" href="javascript:void(0);" onclick="addClick(<?php echo $offer->ID; ?>,'<?php echo bloginfo('wpurl'); ?>/congratulations?add-to-cart=<?php echo get_post_meta($offer->ID,'link_product_id',true); ?>')">Select Offer</a>
            </div>
            <?php	
            }
          ?>
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
<div class="pp_pic_holder pp_default foff" style="top: 410.5px; left: 282.5px; display: none; width: 772px;">
  <div class="ppt" style="opacity: 1; display: block; width: 740px;">&nbsp;</div>
  <div class="pp_top">
    <div class="pp_left"></div>
    <div class="pp_middle"></div>
    <div class="pp_right"></div>
  </div>
  <div class="pp_content_container" style="position:relative;">
    <div class="pp_left">
      <div class="pp_right">
        <div class="pp_content" style="height: 450px; width: 740px;">
          <div class="pp_loaderIcon" style="display: none;"></div>
          <div class="pp_fade" style="display: block;"> <a title="Expand the image" class="pp_expand" href="#" style="display: none;">Expand</a>
            <div class="pp_hoverContainer" style="height: 253px; width: 740px; display: none;"> <a href="#" class="pp_next">next</a> <a href="#" class="pp_previous">previous</a> </div>
            <div id="pp_full_res">
              <div class="pp_inline" style="overflow:auto">
              	<iframe id="video_frame" width="780" height="420" frameborder="no" src="http://player.vimeo.com/video/90175265?title=0&amp;byline=0&amp;portrait=0"></iframe>  
              </div>
            </div>
            <div class="pp_details" style="width: 740px;">
              <div class="pp_nav" style="display: none;"><a class="pp_play" href="#">Play</a> <a class="pp_arrow_previous" href="#">Previous</a>
                <p class="currentTextHolder">1/1</p>
                <a class="pp_arrow_next" href="#">Next</a> </div>
              <p class="pp_description" style="display: none;"></p>              
          </div>
        </div>
      </div>
    </div>
  </div>
  	<a href="javascript:void(0);" class="pp_close" onclick="closeIt()" style="top:10px; z-index:1000; right:10px;">Close</a> 
  </div>
  <div class="pp_bottom">
    <div class="pp_left"></div>
    <div class="pp_middle"></div>
    <div class="pp_right"></div>
  </div>
</div>
<div class="pp_overlay" style="opacity: 0.6; height: 4000px; width: 100%; display: none;"></div>

