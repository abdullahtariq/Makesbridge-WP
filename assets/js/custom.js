$(document).ready(function() {
	// navigation click actions
	$('.scroll-link').on('click', function(event){
		event.preventDefault();
		var sectionID = $(this).attr("data-id");
		scrollToID('#' + sectionID, 750);
	});
	// scroll to top action
	$('.scroll-top').on('click', function(event) {
		event.preventDefault();
		$('html, body').animate({scrollTop:0}, 'slow');
	});
	// mobile nav toggle
	$('#nav-toggle').on('click', function (event) {
		event.preventDefault();
		$('#main-nav').toggleClass("open");
	});

	$('.workemailhelp a').popover();
	$('.erroricon').popover();
});
// scroll function
function scrollToID(id, speed){
	var offSet = 50;
	var targetOffset = $(id).offset().top + offSet;
	var mainNav = $('#main-nav');
	$('html,body').animate({scrollTop:targetOffset}, speed);
	if (mainNav.hasClass("open")) {
		mainNav.css("height", "1px").removeClass("in").addClass("collapse");
		mainNav.removeClass("open");
	}
}
if (typeof console === "undefined") {
    console = {
        log: function() { }
    };
}
			function showpop(popid)
			{
				$('#'+popid).addClass('visible');
			}
			function hidepop(popid)
			{
				$('#'+popid).removeClass('visible');
			}
			function showsupop(popid,n)
			{
				if($('.fc-name').val()){
					var fname = $('.fc-name').val().split(' ')[0];
					var lname = $('.fc-name').val().split(' ')[1];
					$('#fname').val(fname);
					$('#lname').val(lname);
				}
				if($('.fc-phone').val()){
					$('#phone').val($('.fc-phone').val());
				}
				if($('.fc-email').val()){
					$('#email').val($('.fc-email').val());
				}if($('.fc-company').val()){
					$('#company').val($('.fc-company').val());
				}
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
				/*if($('#email1'))
					$('#email').val($('#email1').val());*/
				if($('#crms'))
					$('#frmFld_CRM_Tool').val($('#crms').val());
				if($('#source-val').val()){
					$('#source').val($('#source-val').val());
					}
					else{
					$('#source').val('trial - home');
					}
				return false;
			}
			function togglePops()
			{
				$('#video_frame').hide();
				$('.signuppop').css('display','none');
				$('#signup_now').css('display','block');
				$('.fancybox-wrap').css('margin-left','-400px');
				$('.fancybox-inner').append($('#signup_now'));
			}
			function hidesupop()
			{
				$('.fancybox-overlay').css('display','none');
				$('.signuppop').css('display','none');
				$('.fancybox-inner #video_frame').attr('src','');
				$('.fancybox-inner #video_frame').hide();
				return false;
			}
			function toggleField()
			{
				if($('#provider').val() == 'Other')
					$('#othertext').show();
				else
					$('#othertext').hide();
			}
$(document).ready(function () {
    $(".scroll-link").click(function(event) {
        // check if window is small enough so dropdown is created
    $(".navbar-collapse").removeClass("in").addClass("collapse");
    });

});

/*=========================================
			AJAX VALIDATION
===========================================*/
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
					var url = $('#postUrl').val();
					//alert(str);
                    $.ajax({
                        url: url,
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