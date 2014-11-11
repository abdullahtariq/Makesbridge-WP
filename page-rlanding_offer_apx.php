<?php
/* Template Name: New Responsive (LP offer apx) */
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
			//alert(window.location.href);
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
				data:'action=my_special_ajax_call&act=av&id='+ id + '&path='+ window.location.pathname.substr(1,window.location.pathname.length),
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
			$('.pp_inline #video_frame').attr('src','');
			$('.pp_inline #video_frame').hide();
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
					var str = 'fname='+fname+'&email='+email+'&phone='+phone+"&src="+$('#source').val()+"&page="+$('#page').val();
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
				pager: false
				});
				
				$('.slides2').bxSlider({
				  moveSlides:1,
				  auto: false,				  
				  controls: true,
				  slideWidth:450,
				  speed:4000,
		  		pause:5000,
				pager: false
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
                    	<div class="apx_offer_l2 appexchnage_l" style="padding-bottom:30px;">
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
                        	<h2>We rebate the cost of apps you use or pay for services you need!</h2>
                                <ul class="slides1"><li>
                            <?php
                            if($offers)
                            {
								$pages = ceil(count($offers)/2);
                                $c=1;
                                foreach($offers as $offer)
                                {
                                    if (has_post_thumbnail( $offer->ID ) ):
                                        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $offer->ID ), 'single-post-thumbnail' );
                                    endif;
                                ?>
                                    <div class="columns_apx" style="float:none; margin-bottom:10px;">
                                  <div class="app_box2" style="padding: 22px 20px 12px;">
                                    <div class="app_box2_l" style="width: 125px;"> <img width="99" height="99" alt="" src="<?php echo bloginfo('template_url'); ?>/thumb.php?src=<?php echo $image[0]; ?>&w=99&h=99"> </div>
                                    <div class="app_box2_r" style="width: 265px; position:relative;">
                                      <p class="ibox_head2" style="font-size:18px; line-height:1em;"><?php echo $offer->post_title; ?></p>
                                      <p class="ibox_p2"><?php echo $offer->post_excerpt; ?></p>
                                      <div class="clear"></div>
                                      <p><a href="javascript:void(0);" onClick="addClick(<?php echo $offer->ID; ?>,'<?php echo bloginfo('wpurl'); ?>/offers?add-to-cart=<?php echo get_post_meta($offer->ID,'link_product_id',true); ?>')" class="offer_buynow" style="position:absolute; bottom:0; left:0;">Select</a><a onclick="addView(<?php echo $offer->ID; ?>)" class="seedetail2" href="javascript:void(0)" style="float:left;margin-left:65px; margin-top:5px;" id="box<?php echo $offer->ID; ?>_link">Show Details</a> </p>
                                    </div>
                                    <div class="clr"></div>
                                    
                                  </div>
                                </div>
                                <?php
                                    if($c % 2 == 0 && $c < count($offers))
                                        echo '</li><li>';
                                    $c++;
                                }
                            }
                            ?>
                            </li>
                            </ul>
                            <a class="all_offers2" style="margin-top:50px;" href="javascript:void(0);" onclick="scrollDown('all_offers')">View All <strong><?php echo count($offers); ?></strong> Offers</a>
                        </div>
                        <div class="apx_offer_r2 appexchnage_r" style="padding-bottom:32px;">
                        	<?php
                            $args = array(
							  'post_type' => 'videos',
							  'post_status' => 'publish',
							  'showposts' => '1000',
							  'orderby' => 'post_date',
							  'order' => 'desc',
							  'post__not_in' => array(1586,1591,1593)
						   	);
						   	$videos = get_posts($args);						   	
							?>
                        	<h2><span><?php echo count($videos); ?></span> Videos to Help You Market in Salesforce</h2>
                            <ul class="slides2"><li>
                        <?php
                        if($videos)
                        {
                          $c = 1;
                          foreach($videos as $video)
                          {
                              if (has_post_thumbnail( $video->ID ) ):
                                    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $video->ID ), 'single-post-thumbnail' );
                                endif;
                            ?>
                            <div class="videobox" style="height:145px;">
                                <img width="240" height="140" alt="" src="<?php echo bloginfo('template_url'); ?>/thumb.php?src=<?php echo $image[0]; ?>&w=240&h=140" style="float:left;">
                                <div class="video_r">
                                    <h2><?php echo $video->post_title; ?></h2>
                                    <a class="watch_video" href="javascript:void(0);" onClick="addView2(<?php echo $video->ID; ?>,'http://player.vimeo.com/video/<?php echo get_post_meta($video->ID,'video_id',true); ?>?width=800&height=450',800,450)">Watch Video</a>
                                </div>
                            </div>
                            <?php
                            if($c % 2 == 0 && $c < count($videos))
                                    echo '</li><li>';
                                $c++;
                          }
                        }
                        ?>
                        </li></ul>
                            <a class="all_offers2" style="margin-top:65px;" href="javascript:void(0);" onclick="scrollDown('all_videos')" style="top:40px;">View All <strong><?php echo count($videos); ?></strong> Videos</a>
                        </div>
                    </div>
                </div>
                <div class="clr"></div>
				<?php
                        echo $post->post_content;
                    ?>
				
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
            </div>
                                
        </div>
        <div class="clear"></div>
    </div>
</div>
<!-- END: Module -->
<script type="text/javascript">
function getVideos()
	{
		if($('#filters').val() == 'viewed' || $('#filters').val() == 'recent' || $('#filters').val() == 'featured')
			showposts($('#filters').val());
		else
			showpostsby('cat',$('#filters').val());
	}
	function showposts(type)
	{
		$('#videosearchinput').val('');
		$('.appx_more_videos').append('<div class="loading"><p>Loading videos....</p></div>');
		$.ajax({
			url:"<?php echo bloginfo('wpurl'); ?>/wp-admin/admin-ajax.php",
			type:'POST',
			data:'action=my_special_ajax_call&act=appexv&type=' + type,
			success:function(results)
			{
				$('#template_search_menu li').removeClass('active');
				var params = results.split('][');
				$('.badge').html(params[0]);
				$('.appx_more_videos .thumbnails').html(params[1]);
				$('.appx_more_videos').find('.loading').remove();
				$('#'+type).addClass('active');				
			}
		});
	}
	
	function showpostsby(type,slug)
	{
		$('#videosearchinput').val('');
		$('.appx_more_videos').append('<div class="loading"><p>Loading videos....</p></div>');
		$.ajax({
			url:"<?php echo bloginfo('wpurl'); ?>/wp-admin/admin-ajax.php",
			type:'POST',
			data:'action=my_special_ajax_call&act=appexv&slug='+ slug +'&type=' + type,
			success:function(results)
			{				
				var params = results.split('][');
				$('.badge').html(params[0]);
				$('.appx_more_videos .thumbnails').html(params[1]);
				$('.appx_more_videos').find('.loading').remove();
				if(type == 'cat')
				{
					$('#template_search_menu li').removeClass('active');
					$('#'+slug).addClass('active');					
				}
			}
		});
	}
	function onkp2(e)
	{
		var code = (e.keyCode ? e.keyCode : e.which);
		if(code == 13) {
			searchVideo();
		}
	}
	function searchVideo()
	{
		$('.appx_more_videos').append('<div class="loading"><p>Loading videos....</p></div>');
		$.ajax({
			url:"<?php echo bloginfo('wpurl'); ?>/wp-admin/admin-ajax.php",
			type:'POST',
			data:'action=my_special_ajax_call&act=appexv&type=search&text='+ $('#videosearchinput').val(),
			success:function(results)
			{
				//alert(results);				
				var params = results.split('][');
				$('.badge').html(params[0]);
				$('.appx_more_videos .thumbnails').html(params[1]);
				$('.appx_more_videos').find('.loading').remove();				
			}
		});
	}
</script>
<!-- START: Module -->
<div class="mainfull border_box" id="all_videos" style="background-color: #ecf3fa;">
	<div class="main_wrap appx_more_videos" style="padding:35px 0;">
		  <h2>View these videos to get started</h2>
          <div class="temp-filters clearfix vg" style="width:1120px; margin-left:-60px; background:none; margin-bottom:30px;">
      <h2 id="total_templates" style="margin-left:0px;"><strong class="badge"><?php echo count($videos); ?></strong> Videos Found</h2>
      <div class="srt-div" style="margin-right:0px;">
        <div class="template-filter"> <strong class="sort">Sort by</strong>
        	<div class="breadcrumb" style="padding-top:1px; padding-bottom:9px; margin:0;">
            	<div style="width:110px; height:30px; background:url('<?php echo get_template_directory_uri(); ?>/images/down-arrow.png') no-repeat right 65%;">
                    <select name="filters" id="filters" style="width:160px; background: transparent; border:0; font-family:proxima_nova_regular; font-size:14px; color:#85ACC1;" onchange="getVideos()">
                        <option value="viewed">Viewed</option>                        
                        <option value="recent">All (recent first)</option>
                        <option value="featured">Featured</option>
                        <option value="marketing">Marketing</option>
                        <option value="sales">Sales</option>
                        <option value="automation">Automation</option>
                        <option value="analytics">Analytics</option>
                        <option value="connections">Connections</option>
                        <option value="salesforce">Salesforce</option>
                        <option value="netsuite">NetSuite</option>
                        <option value="highrise">Highrise</option>
                    </select>
                </div>
            </div>
          <ul class="breadcrumb" id="template_search_menu">          	
            <li id="salesforce" class="showtooltip" title=""><a tabindex="-1" href="javascript:void(0);" onclick="showpostsby('cat','Salesforce')">Salesforce</a></li>
            <li id="marketing" class="showtooltip" title=""><a tabindex="-1" href="javascript:void(0);" onclick="showpostsby('cat','marketing')">Marketing</a></li>
            <li id="sales" class="showtooltip" title=""><a tabindex="-1" href="javascript:void(0);" onclick="showpostsby('cat','sales')">Sales</a></li>
            <li id="automation" class="showtooltip" title=""><a tabindex="-1" href="javascript:void(0);" onclick="showpostsby('cat','automation')">Automation</a></li>
            <li id="analytics" class="showtooltip" title=""><a tabindex="-1" href="javascript:void(0);" onclick="showpostsby('cat','analytics')">Analytics</a></li>
            <li id="connections" class="showtooltip" title=""><a tabindex="-1" href="javascript:void(0);" onclick="showpostsby('cat','Connections')">Connections</a></li>
          </ul>
        </div>
        <div class="input-append search" id="">
          <input type="text" style="width:200px; height:23px;" class="search-control show-image" placeholder="Search Video" id="videosearchinput" onkeypress="onkp2(event)" />
          <a style="display:none" id="clearsearch" class="close-icon"></a>
          <div class="btn-group">
            <button id="searchbtn" class="searchbtn" tabindex="-1" onclick="searchVideo()"><span class="icon-search icon-white"> </span></button>
          </div>
        </div>
      </div>
    </div>
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
                          <a class="selectbtn" href="javascript:void(0);" onclick="addClick(<?php echo $offer->ID; ?>,'<?php echo bloginfo('wpurl'); ?>/offers?add-to-cart=<?php echo get_post_meta($offer->ID,'link_product_id',true); ?>')"><span></span>Select Offer</a>
                        </div>
                        <img src="<?php echo bloginfo('template_url'); ?>/thumb.php?src=<?php echo $image[0]; ?>&w=99&h=99" alt=""></div>
                        <div class="caption" style="min-height:200px;">
                          <h3 style="line-height:1em;"><?php echo $offer->post_title; ?></h3>
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
                <a class="selectoffbtn" href="javascript:void(0);" onclick="addClick(<?php echo $offer->ID; ?>,'<?php echo bloginfo('wpurl'); ?>/offers?add-to-cart=<?php echo get_post_meta($offer->ID,'link_product_id',true); ?>')">Select Offer</a>
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

