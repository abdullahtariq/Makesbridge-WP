<?php
if($_REQUEST['add-to-cart'])
	header('location: '. get_option('siteurl') .'/cart');
/** header.php
 *
 * Displays all of the <head> section and everything up till </header>
 *
 * @author		Rexson Buntag
 * @package		mks-landing
 * @since		1.0
 */

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
				echo "$site_description | ";
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
		
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/style.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/mks_icon.css" media="screen" />

        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/js/jquery.bxslider.css" type="text/css" />
		<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.bxslider.js"></script>
        <script type="text/javascript">
			$(document).ready(function(){
    
			$('.slides').bxSlider({
				moveSlides:1,
				auto: true,
				mode: 'fade',
				speed: 200,
				controls: false,
				slideWidth:1600,
				pause: 8000
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
				$('.fancybox-inner').css('padding','0px');
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
			function showsupop(popid,n)
			{
				$('#video_frame').hide();
				$('.signuppop').css('display','none');
				$('.fancybox-overlay').css('display','block');				
				$('#'+popid).css('display','block');				
				$('.fancybox-inner').css('height','550px');
				$('.fancybox-inner').css('padding','0px');
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
				else if(n=='4'){
					$('.goback').css('display','none');
					$('.fancybox-wrap').css('margin-left','-480px');
					$('#features_now > div').show();
					$('.fancybox-inner').append($('#features_now'));
					$('.fancybox-inner').css('overflow-y','scroll');
					$('.fancybox-inner').css('height','580px');
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
				$('#source').val('trial - home');
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
			function closeIt(){ 	
				$('.pp_pic_holder').css('display','none');
				$('.pp_overlay').css('display','none');
				$('.pp_inline #video_frame').attr('src','');
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
        </script>
		
        <link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/images/favicon.ico">
        
		<?php wp_head(); ?>
	</head>
<body <?php body_class(); ?> onload='javascript:getServerData();'>
<!-- BEGIN LivePerson Monitor. -->
<script type="text/javascript">
window.lpTag=window.lpTag||{};if(typeof window.lpTag._tagCount==='undefined'){window.lpTag={site:'69791877',section:lpTag.section||'',autoStart:lpTag.autoStart===false?false:true,ovr:lpTag.ovr||{},_v:'1.5.1',_tagCount:1,protocol:location.protocol,events:{bind:function(app,ev,fn){lpTag.defer(function(){lpTag.events.bind(app,ev,fn)},0)},trigger:function(app,ev,json){lpTag.defer(function(){lpTag.events.trigger(app,ev,json)},1)}},defer:function(fn,fnType){if(fnType==0){this._defB=this._defB||[];this._defB.push(fn)}else if(fnType==1){this._defT=this._defT||[];this._defT.push(fn)}else{this._defL=this._defL||[];this._defL.push(fn)}},load:function(src,chr,id){var t=this;setTimeout(function(){t._load(src,chr,id)},0)},_load:function(src,chr,id){var url=src;if(!src){url=this.protocol+'//'+((this.ovr&&this.ovr.domain)?this.ovr.domain:'lptag.liveperson.net')+'/tag/tag.js?site='+this.site}var s=document.createElement('script');s.setAttribute('charset',chr?chr:'UTF-8');if(id){s.setAttribute('id',id)}s.setAttribute('src',url);document.getElementsByTagName('head').item(0).appendChild(s)},init:function(){this._timing=this._timing||{};this._timing.start=(new Date()).getTime();var that=this;if(window.attachEvent){window.attachEvent('onload',function(){that._domReady('domReady')})}else{window.addEventListener('DOMContentLoaded',function(){that._domReady('contReady')},false);window.addEventListener('load',function(){that._domReady('domReady')},false)}if(typeof(window._lptStop)=='undefined'){this.load()}},start:function(){this.autoStart=true},_domReady:function(n){if(!this.isDom){this.isDom=true;this.events.trigger('LPT','DOM_READY',{t:n})}this._timing[n]=(new Date()).getTime()},vars:lpTag.vars||[],dbs:lpTag.dbs||[],ctn:lpTag.ctn||[],sdes:lpTag.sdes||[],ev:lpTag.ev||[]};lpTag.init()}else{window.lpTag._tagCount+=1}
</script>
<!-- END LivePerson Monitor. -->
<!-- START: top -->
<div class="main_header">    
    <div class="topbar">
        <div class="main_wrap" style="text-align:center;">
        	<div class="clear"></div>
            <a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>">
                    <img alt="" src="<?php bloginfo('stylesheet_directory'); ?>/images/logo.png" style="width: 204px; border:0; height: 47px;"/>
                </a>
                <div class="clear"></div>
        </div>
    </div>
    <div class="main_wrap">
        <div class="header">
            <div class="left_header">
                <div class="top_menu">                    
                    <?php wp_nav_menu( array('menu' => 'TopNav' )); ?>
                </div>
            </div>
            <div class="right_header">
                <a class="top_button log_in" href="https://www.bridgemailsystem.com/pms/login.jsp">Log In</a>
                <a class="top_button sign_up" href="#" onclick="showsupop('signup_now','1');">Sign Up</a>
                <a class="top_button rdemo" href="<?php bloginfo('url'); ?>/request-demo">Request Demo</a>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
<!-- END: Header -->
<ul id="leftbar">
   <li><div></div><a href="<?php bloginfo('url'); ?>/video-gallery">Play videos</a></li>
   <li><div></div><a href="<?php bloginfo('url'); ?>/request-demo">Request demo</a></li>
   <li><div></div><a target="_blank" href="https://server.iad.liveperson.net/hc/69791877/?cmd=file&file=visitorWantsToChat&site=69791877&byhref=1&imageUrl=https://server.iad.liveperson.net/hcp/Gallery/ChatButton-Gallery/English">Live chat</a></li>
   <li><div></div><a href="<?php bloginfo('url'); ?>/request-demo">Contact us</a></li>
</ul>

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
				var crmtool = document.accForm.crmtool.value;
				var emailvol = document.accForm.email_volume.value;
				var salesrep = document.accForm.salesrep.value;
				var interest = document.accForm.interest.value;
			
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
					$('#provider_erroricon').attr('data-content','Please select provider.');
				}
				else
				{
					//cmnErr = false;
					$('.providerbg').attr('style','');
					$('#provider_erroricon').hide();
				}
				if(crmtool == '') {
					cmnErr = true;
					$('.crmtoolbg').css('border','solid 1px #ff0000');
					$('#crmtool_erroricon').show();
					$('#crmtool_erroricon').attr('data-content','Please provide crm tool.');
				}
				else
				{
					$('.crmtoolbg').attr('style','');
					$('#crmtool_erroricon').hide();
				}
				if(emailvol == '') {
					cmnErr = true;
					$('.email_volumebg').css('border','solid 1px #ff0000');
					$('#email_volume_erroricon').show();
					$('#email_volume_erroricon').attr('data-content','Please provide monthly email volume.');
				}
				else
				{
					$('.email_volumebg').attr('style','');
					$('#email_volume_erroricon').hide();
				}
				if(salesrep == '') {
					cmnErr = true;
					$('.salesrepbg').css('border','solid 1px #ff0000');
					$('#salesrep_erroricon').show();
					$('#salesrep_erroricon').attr('data-content','Please provide number of sales reps.');
				}
				else
				{
					$('.salesrepbg').attr('style','');
					$('#salesrep_erroricon').hide();
				}if(interest == '') {
					cmnErr = true;
					$('.interestbg').css('border','solid 1px #ff0000');
					$('#interest_erroricon').show();
					$('#interest_erroricon').attr('data-content','Please select most interested option.');
				}
				else
				{
					$('.interestbg').attr('style','');
					$('#interest_erroricon').hide();
				}
							
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
				var demailvol = $('#demoemailvol').val();
				var dcrmtool = $('#democrmtool').val();
				var dsalesrep = $('#demosalesrep').val();
				var dinterest = $('#demointerest').val();
				var challText = $('#uText1').val();
				if(challText == '')
				{
					cmnErr = true;
					$('.demoscbg').css('border','solid 1px #ff0000');
					$('#uText1_erroricon').show();
					$('#uText1_erroricon').attr('data-content','Please enter the CAPTCHA');
				}
				else
				{
					$('.demoscbg').attr('style','');
					$('#uText1_erroricon').hide();
				}
				if(demail == '')
				{
					cmnErr = true;
					$('.demoemailbg').css('border','solid 1px #ff0000');
					$('#demoemail_erroricon').show();
					$('#demoemail_erroricon').attr('data-content','Please enter email address.');
				}
				else if(isValidEmail(demail)==false)
				{
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
					cmnErr = true;
					$('.demofnamebg').css('border','solid 1px #ff0000');
					$('#demofname_erroricon').show();
					$('#demofname_erroricon').attr('data-content','Please enter first name.');
				}
				else
				{
					$('.demofnamebg').attr('style','');
					$('#demofname_erroricon').hide();
				}
				if(dlname == '') {
					cmnErr = true;
					$('.demolnamebg').css('border','solid 1px #ff0000');
					$('#demolname_erroricon').show();
					$('#demolname_erroricon').attr('data-content','Please enter last name.');
				}
				else
				{
					$('.demolnamebg').attr('style','');
					$('#demolname_erroricon').hide();
				}
				if(dcompany == '')
				{
					cmnErr = true;
					$('.democompanybg').css('border','solid 1px #ff0000');
					$('#democompany_erroricon').show();
					$('#democompany_erroricon').attr('data-content','Please enter company.');
				}
				else
				{
					$('.democompanybg').attr('style','');
					$('#democompany_erroricon').hide();
				}
				if(dphone == '')
				{
					cmnErr = true;
					$('.demophonebg').css('border','solid 1px #ff0000');
					$('#demophone_erroricon').show();
					$('#demophone_erroricon').attr('data-content','Please enter phone number.');
				}
				else
				{
					$('.demophonebg').attr('style','');
					$('#demophone_erroricon').hide();
				}
				if(dmessage == '')
				{
					cmnErr = true;
					$('.demomessagebg').css('border','solid 1px #ff0000');
					$('#demomessage_erroricon').show();
					$('#demomessage_erroricon').attr('data-content','Please enter message.');
				}
				else
				{
					$('.demomessagebg').attr('style','');
					$('#demomessage_erroricon').hide();
				}
				if(demailvol == '')
				{
					cmnErr = true;
					$('.demoemailvolbg').css('border','solid 1px #ff0000');
					$('#demoemailvol_erroricon').show();
					$('#demoemailvol_erroricon').attr('data-content','Please supply monthly email volume.');
				}
				else
				{
					$('.demoemailvolbg').attr('style','');
					$('#demoemailvol_erroricon').hide();
				}
				if(dcrmtool == '')
				{
					cmnErr = true;
					$('.democrmtoolbg').css('border','solid 1px #ff0000');
					$('#democrmtool_erroricon').show();
					$('#democrmtool_erroricon').attr('data-content','Please supply crm tool.');
				}
				else
				{
					$('.democrmtoolbg').attr('style','');
					$('#crmtool_erroricon').hide();
				}
				if(dsalesrep == '')
				{
					cmnErr = true;
					$('.demosalesrepbg').css('border','solid 1px #ff0000');
					$('#demosalesrep_erroricon').show();
					$('#demosalesrep_erroricon').attr('data-content','Please supply number of sales reps.');
				}
				else
				{
					$('.demosalesrepbg').attr('style','');
					$('#demosalesrep_erroricon').hide();
				}
				if(dinterest == '')
				{
					cmnErr = true;
					$('.demointerestbg').css('border','solid 1px #ff0000');
					$('#demointerest_erroricon').show();
					$('#demointerest_erroricon').attr('data-content','Please supply most interested option.');
				}
				else
				{
					$('.demointerestbg').attr('style','');
					$('#demointerest_erroricon').hide();
				}
				if(!cmnErr)
				{					
                    $('#demoform').append('<div class="loading"><p>Sending request....</p></div>');
					
					var str = $("#demoform").serialize();				
                    $.ajax({
                        url:"<?php echo bloginfo('wpurl'); ?>/wp-admin/admin-ajax.php",
                        type:'POST',
                        data:'action=my_special_ajax_call&act=dr&' + str,
                        success:function(results)
                        {
							//alert(results);
                            $('#demoform').find('.loading').remove();
							if(results == 'err')
								alert('There is some error with the request please try again later.');
							else							
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
					var str = 'fname='+fname+'&email='+email+'&phone='+phone+'&src='+$('#off_source').val()+'&page='+$('#page').val();
                    $.ajax({
                        url:"<?php echo bloginfo('wpurl'); ?>/wp-admin/admin-ajax.php",
                        type:'POST',
                        data:'action=my_special_ajax_call&act=so&' + str,
                        success:function(results)
                        {
							$('.subscribeform').find('.loading').remove();
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
					return false;
				}
			}
        </script>
<div class="fancybox-overlay fancybox-overlay-fixed" style="width: auto; height: auto; background: none repeat scroll 0% 0% rgba(230, 239, 243, 0.9); display: none;">
  <div tabindex="-1" class="fancybox-wrap fancybox-desktop fancybox-type-inline fancybox-opened" style="height: auto; position: absolute; top: 50%; left: 50%; margin-top:-270px; opacity: 1;">
    <div class="fancybox-skin" style="padding: 0px; width: auto; height: auto;">
      <div class="fancybox-outer">
        <div class="fancybox-inner" style="height: 550px;">
        	<iframe id="video_frame" width="780" height="420" frameborder="no" src="http://player.vimeo.com/video/90175265?title=0&amp;byline=0&amp;portrait=0"></iframe>
            <!--<div class="btm-bar"> <span><span class="icon view"></span><em>14</em></span></div>-->
        </div>
      </div>
      <a href="javascript:;" class="fancybox-item fancybox-close" title="Close" onclick="hidesupop()"></a></div>
  </div>
</div>

<div class="signuppop wp-pop" id="signup_now">
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
<div class="signuppop pagecontent wp-pop" style="width: 960px; display: none; margin:20px 0; padding:20px; height:470px; position:relative; overflow-y:scroll;" 
id="terms2pop">
      <?php
      $term = get_post(692); 
      setup_postdata( $term );
      the_content();
      ?>
</div>
<div class="signuppop pagecontent wp-pop" style="width: 960px; display: none; margin:20px 0; padding:20px; height:470px; position:relative; overflow-y:scroll;" 
id="terms3pop">
      <?php
      $term = get_post(1091); 
      setup_postdata( $term );
      the_content();
      ?>
</div>
<div class="signuppop pagecontent wp-pop" style="width: 960px; display: none; margin:20px 0; padding:20px; height:470px; position:relative; overflow-y:scroll;" 
id="terms4pop">
      <div class="concierge_faqs">
	  <?php
      $term = get_post(1727); 
      setup_postdata( $term );
      the_content();
      ?>
      </div>
</div>