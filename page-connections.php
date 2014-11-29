<?php 

/* Template Name: Connections */

get_header(); ?>
<!--<ul id="marketing_pagemenu">
   <li><a href="#connections_sec1">Section 1</a></li>
   <li><a href="#connections_sec2">Section 2</a></li>   
   <li><a href="#services">Section 3</a></li>
</ul>-->
<div id="connections_page">
	<?php
    if(have_posts()): 
	while(have_posts()) :
	the_post();
	$background_image = get_field('bann_backimage');
	?>
  <div class="topbanner connections_topbanner" style="background:url(<?php echo $background_image["url"]; ?>) no-repeat 50% 0; height:342px;">
  	<div class="banncontent" style="padding-top:69px;">
      <h1 style="width: 371px; font-size:38px;"><?php the_field('bann_head'); ?></h1>
      <h2 style="width: 350px;">
          <?php the_field('bann_subhead'); ?>
        </h2>
      <!--<img class="bannericon" src="<?php bloginfo('stylesheet_directory'); ?>/images/automation-banner-icon.png" width="453" height="365" /> -->
    </div>
  </div>
  <div style="background:url('<?php bloginfo('stylesheet_directory'); ?>/images/conn-strip.jpg') no-repeat 50% 0; height:96px;"></div>
  	<?php
	endwhile;
    endif;
	?>  
  <div>        
      <?php
        //$connections_sec1 = get_post(242); 
		//echo $connections_sec1->post_content;
		?>
        <div id="step1" style="padding:50px 0; text-align:center;">
                <div class="main_wrap" style="text-align:center;"> 
                <div style=" background:url(<?php bloginfo('stylesheet_directory'); ?>/images/cloud.jpg); height:300px; width:300px; margin:auto; text-align:center;">
                	<p style="margin-bottom:10px; font-size:25px; position:relative; top:90px; margin-left:-20px;">Step 1</p>
                	<h2 style="margin:0 0 50px; padding:0; font-weight:bold; position:relative; top:90px; line-height:0.9em;">Sign up for free account</h2>
                </div>
                <p style="margin:0px 0 5px; font-size:25px;">FREE! Synch and store 5,000 contacts and 25 data fields</p>
                <p style="margin:0px 0 5px; font-size:25px;">FREE! Forms, HTML Editor, Landing Pages</p>
                <p style="margin:0px 0 50px; font-size:25px;">FREE! Auto-Responder and Meeting Request Autobot</p>
                <script language="javascript">
                	function validateAccountForm2() {
						$('.errors').html('');
						var fname = $('#fname2').val();
						//alert(fname);
						var lname = $('#lname2').val();
						var company = $('#company2').val();
						var email = $('#email2').val();
						var challText = $('#uText2').val();
						var pwd = $('#pwd3').val();
						var pwd2 = $('#pwd4').val();
						var phone = $('#phone2').val();
						var provider = $('#provider2').val();
						var crmtool = $('#crmtool2').val();
						var emailvol = $('#email_volume2').val();
						var salesrep = $('#salesrep2').val();
						var interest = $('#interest2').val();
						var source = $('#source2').val();
					
						var cmnErr = false;
						var emailErr = false;
						$('.erroricon').hide();
						if(challText == '')
						{
							//alert(' Enter text for spam protection.');
							cmnErr = true;
							$('.scbg').css('border','solid 1px #ff0000');
							$('#uText_erroricon2').show();
							$('#uText_erroricon2').attr('data-content','Please enter the CAPTCHA');
							//$('#uText_erroricon').popover({'placement':'bottom','trigger':'hover',delay: { show: 0, hide:0 },animation:false});
							//return false;
						}
						else
						{
							//cmnErr = false;
							$('.scbg').attr('style','');
							$('#uText_erroricon2').hide();
						}
							
						if(email == '')
						{
							//errorMessage += '- Please enter valid email address.\n';
							cmnErr = true;
							$('.emailbg').css('border','solid 1px #ff0000');
							$('#email_erroricon2').show();
							$('#email_erroricon2').attr('data-content','Please enter email address.');
						}
						else if(isValidEmail(email)==false)
						{
							//errorMessage += '- Please enter valid email address.\n';
							cmnErr = true;
							$('.emailbg').css('border','solid 1px #ff0000');
							$('#email_erroricon2').show();
							$('#email_erroricon2').attr('data-content','Please enter valid email address.');
						}
						else if(isEmail(email)==false)
						{
							emailErr = true;
							$('.emailbg').css('border','solid 1px #ff0000');
							$('#email_erroricon2').show();
							$('#email_erroricon2').attr('data-content','Email addresses of free services are not accepted. (e.g. @msn, @gmail, @yahoo)');
						}
						else
						{
							//cmnErr = false;					
							$('.emailbg').attr('style','');
							$('#email_erroricon2').hide();
						}
										
						if(pwd.length<8){
							//errorMessage += '- Password must contain at least 8 characters.\n';
							cmnErr = true;
							$('.pwdbg').css('border','solid 1px #ff0000');
							$('#pwd_erroricon2').show();
							$('#pwd_erroricon2').attr('data-content','Password must contain at least 8 characters.');
						}
						else if(isValidPassword(pwd)==false){
							//errorMessage += '- Enter a valid password. Space and blackslash characters not allowed.\n';
							cmnErr = true;
							$('.pwdbg').css('border','solid 1px #ff0000');
							$('#pwd_erroricon2').show();
							$('#pwd_erroricon2').attr('data-content','Enter a valid password. Space and backslash characters are not allowed.');
						}
						else if(isValidPass(pwd)==false){
							//errorMessage += '- Password must have at least one letter and one number.\n';
							cmnErr = true;
							$('.pwdbg').css('border','solid 1px #ff0000');
							$('#pwd_erroricon2').show();
							$('#pwd_erroricon2').attr('data-content','Password must have at least one letter and one number.');
						}
						else if(pwd != pwd2)
						{
							//errorMessage += '- Password is mismatching, please enter your password again.\n';
							cmnErr = true;
							$('.pwdbg').css('border','solid 1px #ff0000');
							$('.pwd2bg').css('border','solid 1px #ff0000');
							$('#pwd_erroricon2').show();
							$('#pwd_erroricon2').attr('data-content','Password mismatch. Please enter your password again.');
						}
						else
						{
							//cmnErr = false;
							$('.pwdbg').attr('style','');
							$('.pwd2bg').attr('style','');
							$('#pwd_erroricon2').hide();
						}
										
						if(fname == '') {
							//errorMessage += '- Please enter first name.\n';
							cmnErr = true;
							$('.fnamebg').css('border','solid 1px #ff0000');
							$('#fname_erroricon2').show();
							$('#fname_erroricon2').attr('data-content','Please enter first name.');
						}
						else
						{
							//cmnErr = false;
							$('.fnamebg').attr('style','');
							$('#fname_erroricon2').hide();
						}
						if(lname == '') {
							//errorMessage += '- Please enter last name.\n';
							cmnErr = true;
							$('.lnamebg').css('border','solid 1px #ff0000');
							$('#lname_erroricon2').show();
							$('#lname_erroricon2').attr('data-content','Please enter last name.');
						}
						else
						{
							//cmnErr = false;
							$('.lnamebg').attr('style','');
							$('#lname_erroricon2').hide();
						}
						if(company == '')
						{
							//errorMessage += '- Please enter company.\n';
							cmnErr = true;
							$('.companybg').css('border','solid 1px #ff0000');
							$('#company_erroricon2').show();
							$('#company_erroricon2').attr('data-content','Please enter company.');
						}
						else
						{
							//cmnErr = false;
							$('.companybg').attr('style','');
							$('#company_erroricon2').hide();
						}
						if(phone == '')
						{
							//errorMessage += '- Please enter phone.\n';
							cmnErr = true;
							$('.phonebg').css('border','solid 1px #ff0000');
							$('#phone_erroricon2').show();
							$('#phone_erroricon2').attr('data-content','Please enter phone number.');
						}
						else
						{
							//cmnErr = false;
							$('.phonebg').attr('style','');
							$('#phone_erroricon2').hide();
						}
						if(provider == '') {
							//errorMessage += '- Please select provider.\n';
							cmnErr = true;
							$('.providerbg').css('border','solid 1px #ff0000');
							$('#provider_erroricon2').show();
							$('#provider_erroricon2').attr('data-content','Please select provider.');
						}
						else
						{
							//cmnErr = false;
							$('.providerbg').attr('style','');
							$('#provider_erroricon2').hide();
						}
						if(crmtool == '') {
							cmnErr = true;
							$('.crmtoolbg').css('border','solid 1px #ff0000');
							$('#crmtool_erroricon2').show();
							$('#crmtool_erroricon2').attr('data-content','Please provide crm tool.');
						}
						else
						{
							$('.crmtoolbg').attr('style','');
							$('#crmtool_erroricon2').hide();
						}
						if(emailvol == '') {
							cmnErr = true;
							$('.email_volumebg').css('border','solid 1px #ff0000');
							$('#email_volume_erroricon2').show();
							$('#email_volume_erroricon2').attr('data-content','Please provide monthly email volume.');
						}
						else
						{
							$('.email_volumebg').attr('style','');
							$('#email_volume_erroricon2').hide();
						}
						if(salesrep == '') {
							cmnErr = true;
							$('.salesrepbg').css('border','solid 1px #ff0000');
							$('#salesrep_erroricon2').show();
							$('#salesrep_erroricon2').attr('data-content','Please provide number of sales reps.');
						}
						else
						{
							$('.salesrepbg').attr('style','');
							$('#salesrep_erroricon2').hide();
						}if(interest == '') {
							cmnErr = true;
							$('.interestbg').css('border','solid 1px #ff0000');
							$('#interest_erroricon2').show();
							$('#interest_erroricon2').attr('data-content','Please select most interested option.');
						}
						else
						{
							$('.interestbg').attr('style','');
							$('#interest_erroricon2').hide();
						}
									
						if(!cmnErr)
						{
							//$(container).find('.loading').remove();
							$('.accForm2').append('<div class="loading"><p>Saving data....</p></div>');
							
							var str = "fname="+ fname +"&lname="+ lname +"&phone="+ phone +"&email="+ email +"&pwd="+ pwd +"&company="+ company +"&crmtool="+ crmtool +"&frmFld_Monthly_Volume="+ emailvol +"&provider="+ provider +"&Sales_Reps="+ salesrep +"&interest="+ interest +"&uText="+ $('#uText2').val() +"&chValue="+ $('#chValue2').val() +"&othertext="+ $('#othertext2').val() +"&source="+ $('#source2').val() +"&frmFld_MKS_Package="+ $('#frmFld_MKS_Package2').val() +"&frmFld_CRM_Tool="+ $('#frmFld_CRM_Tool2').val() +"";
							console.log(str);
							//alert(str);
							$.ajax({
								url:"<?php echo bloginfo('wpurl'); ?>/wp-admin/admin-ajax.php",
								type:'POST',
								data:'action=my_special_ajax_call&act=su&' + str,
								success:function(results)
								{
									//alert(results);
									$('.accForm2').find('.loading').remove();
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
										document.getElementById('accForm2').action = "<?php echo get_option('siteurl'); ?>/congratulations";
										document.getElementById('accForm2').submit();
										return true;
									}
								}
							});
							return false;
						}
						else
							return false;
					}
                </script>
                <form id="accForm2" class="formStyle1 accForm2 " onsubmit="return validateAccountForm2();" action="<?php echo get_option('siteurl'); ?>/congratulations" style="width:70%; margin:auto; position:relative;" name="accForm2" method="post">
                    <input type="hidden" value="trial" id="frmFld_MKS_Package2" name="frmFld_MKS_Package2">
                    <input type="hidden" value="" id="frmFld_CRM_Tool2" name="frmFld_CRM_Tool2">
                    <input type="hidden" value="trial - connections" id="source2" name="source2">
                    <div class="form" style="position: relative; margin-top:0px;">
                    <table cellspacing="0" cellpadding="2" width="100%" border="0" class="connection-forminputbg">
                    <tbody>    
                    <tr>
                    <td colspan="2" style="height:15px;">
                    <div class="errors"></div>
                    </td>
                    </tr>
                    <tr>
                    <td valign="top" style="width:50%; vertical-align:top;">    
                    <div id="supop2" class="dpmarketing" style="left:0">
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
                    <br>
                    <div class="forminputbg fnamebg">
                    <label>First name</label>
                    <input type="text" name="fname2" id="fname2">
                    <span title="" data-original-title="" id="fname_erroricon2" class="erroricon" data-placement="right" data-trigger="hover" data-toggle="popover"></span>
                    <div class="clear"></div>
                    </div>
                    <div class="forminputbg lnamebg">
                    <label>Last name</label>
                    <input type="text" name="lname2" id="lname2">
                    <span title="" data-original-title="" id="lname_erroricon2" class="erroricon" data-placement="right" data-trigger="hover" data-toggle="popover"></span>
                    <div class="clear"></div>
                    </div>
                    <div class="forminputbg phonebg">
                    <label>Phone no</label>
                    <input type="text" name="phone2" id="phone2">
                    <span title="" data-original-title="" id="phone_erroricon2" class="erroricon" data-placement="right" data-trigger="hover" data-toggle="popover"></span>
                    <div class="clear"></div>
                    </div>
                    <div class="forminputbg companybg">
                    <label>Company</label>
                    <input type="text" name="company2" id="company2">
                    <span title="" data-original-title="" id="company_erroricon2" class="erroricon" data-placement="right" data-trigger="hover" data-toggle="popover"></span>
                    <div class="clear"></div>
                    </div>
                    <div class="forminputbg emailbg">
                    <label>Work email</label>
                    <input type="text" name="email2" id="email2">
                    <span title="" data-original-title="" id="email_erroricon2" class="erroricon" data-placement="right" data-trigger="hover" data-toggle="popover"></span>
                    <div class="clear"></div>
                    </div>
                    <div class="workemailhelp" style="margin:-5px 0 15px 10px; clear:both; text-align:left;"><a title="" data-original-title="" data-placement="bottom" data-trigger="hover" data-content="For security reasons we do not provision trials to anonymous email addresses such as gmail, yahoo, and hotmail." data-toggle="popover" style="font-style:italic; 
                    color:#31cbff; font-size:13px; letter-spacing:1px; cursor:pointer;">Why must I use a work email?</a> 
                    </div>
                    <div class="forminputbg email_volumebg">
                    <label>Monthly email volume</label>
                    <select style="width:120px;" id="email_volume2" name="frmFld_Monthly_Volume2">  
                        <option selected="selected" value="">Select Volume Range</option>
                      <option value="0-500">0 - 500</option>
                      <option value="500-2000">500 - 2,000</option>
                      <option value="2000-5000">2,000 - 5,000</option>
                      <option value="5000-15000">5,000 - 15,000</option>
                      <option value="15000+">15,000+</option>
                    
                    </select>
                    <span title="" data-original-title="" id="email_volume_erroricon2" class="erroricon" data-placement="right" data-trigger="hover" data-toggle="popover"></span>
                    <div class="clear"></div>
                    </div>
                    <div class="forminputbg crmtoolbg">
                    <label>CRM tool</label>
                    <select style="width:190px;" id="crmtool2" name="crmtool2">  
                        <option selected="selected" value="">Select</option>
                      <option value="Salesforce Trial">Salesforce Trial</option>
                      <option value="Salesforce Pro">Salesforce Pro</option>
                      <option value="Salesforce Enterprise">Salesforce Enterprise</option>
                      <option value="Salesforce Unlimited">Salesforce Unlimited</option>
                      <option value="Netsuite">NetSuite</option>
                      <option value="Bullhorn">Bullhorn</option>
                    <option value="Highrise">Highrise</option>
                      <option value="None">None of these</option>
                      <option value="Do Not Use">Do Not Use CRM</option>
                    
                    </select>
                    <span title="" data-original-title="" id="crmtool_erroricon2" class="erroricon" data-placement="right" data-trigger="hover" data-toggle="popover"></span>
                    <div class="clear"></div>
                    </div>
                    </td>
                    <td valign="top" style="padding-top:20px; padding-left:30px;">
                    <div class="forminputbg salesrepbg">
                    <label>Number of sales reps</label>
                    <select style="width:120px;" id="salesrep2" name="Sales_Reps2">  
                      <option value="">Please Choose</option>
                      <option value="1 - 4">1 - 4</option>
                      <option value="5 - 10">5 - 10</option>
                      <option value="11 - 20">11 - 20</option>
                      <option value="Over 20">Over 20</option>
                    
                    </select>
                    <span title="" data-original-title="" id="salesrep_erroricon2" class="erroricon" data-placement="left" data-trigger="hover" data-toggle="popover"></span>
                    <div class="clear"></div>
                    </div>
                    <div class="forminputbg interestbg">
                    <label>I'm most interested in</label>
                    <select style="width:120px;" id="interest2" name="interest2">  
                        <option selected="selected" value="">Select</option>
                      <option value="Drip Marketing">Drip Marketing</option>
                      <option value="Lead Scoring">Lead Scoring</option>
                      <option value="Sales Staff Solutions">Sales Staff Solutions</option>
                      <option value="Integrated Analytics">Integrated Analytics</option>
                      <option value="CRM Integration">CRM Integration</option>
                    </select>
                    <span title="" data-original-title="" id="interest_erroricon2" class="erroricon" data-placement="left" data-trigger="hover" data-toggle="popover"></span>
                    <div class="clear"></div>
                    </div>
                    <div class="forminputbg providerbg">
                    <label>Current provider?</label>
                    <select style="width:140px;" name="provider2" id="provider2" onchange="toggleField()">
                    <option value="">Choose</option>
                    <option value="Constant Contact">Constant Contact</option>
                    <option value="HubSpot">HubSpot</option>
                    <option value="Exact Target">Exact Target</option>
                    <option value="Eloqua">Eloqua</option>
                    <option value="Mail Chimp">Mail Chimp</option>
                    <option value="Marketo">Marketo</option>
                    <option value="Vertical Response">Vertical Response</option>
                    <option value="Other">Other (please enter)</option>
                    </select>
                    <span title="" data-original-title="" id="provider_erroricon2" class="erroricon" data-placement="left" data-trigger="hover" data-toggle="popover"></span>
                    <div class="clear"></div>
                    <input type="text" name="othertext2" id="othertext2" style="display:none;">
                    </div>
                    <div style="margin:-5px 0 15px 10px; clear:both; text-align:left;"><a class="openpop" onmouseover="showpop('supop2')" onmouseout="hidepop('supop2');" style="font-style:italic; 
                    color:#31cbff; font-size:13px; letter-spacing:1px;">Why do we need this information?</a> 
                    </div>             
                    <div class="forminputbg pwdbg">
                    <label>Password</label>
                    <input type="password" name="pwd3" id="pwd3">
                    <span title="" data-original-title="" id="pwd_erroricon2" class="erroricon" data-placement="left" data-trigger="hover" data-toggle="popover"></span>
                    <div class="clear"></div>
                    </div>
                    <div class="workemailhelp" style="margin:-5px 0 15px 10px; clear:both; text-align:left;"><a style="font-style:italic; 
                    color:#31cbff; font-size:13px; letter-spacing:1px; cursor:pointer;" onmouseover="showpop('pwdpop2')" onmouseout="hidepop('pwdpop2');">password requirements</a> 
                    <div id="pwdpop2" class="dpmarketing">
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
                    <label>Confirm password</label>
                    <input type="password" name="pwd4" id="pwd4" style="width:140px;">
                    <span title="" data-original-title="" id="pwd2_erroricon2" class="erroricon" data-placement="left" data-trigger="hover" data-toggle="popover"></span>
                    <div class="clear"></div>
                    </div>
                    <img border="1" id="image2" src="http://www.bridgemailsystem.com/pms/challenge?c=_DEFAULT" style="">
                    <div class="forminputbg scbg" style="">
                    <label>Security code: </label><input type="text" id="uText2" name="uText2" tabindex="13" style="width:160px;">  
                    <input type="hidden" id="chValue2" name="chValue2" value="_DEFAULT">  
                    <span title="" data-original-title="" id="uText_erroricon2" class="erroricon" data-placement="left" data-trigger="hover" data-toggle="popover"></span>
                    <div class="clear"></div>
                    </div>
                    </td>
                    </tr>                            
                    <tr>
                    <td colspan="2" style="height:15px;"></td>
                    </tr>
                    <tr>
                    <td valign="middle" align="center" colspan="2" style="vertical-align:middle;">
                    <div class="clear"></div>                                	
                    <a class="pop_termslink" href="javascript:void(0);" onclick="showsupop('termspop','2');" style="width:auto; margin-top:10px; margin-left:0;">By submitting this information you agree to our Terms of Service</a>
                    <input width="138" type="image" height="34" name="cabutton2" id="cabutton2" src="<?php bloginfo('stylesheet_directory'); ?>/images/createacct-button.jpg" value="Create Account" style="margin-right:20px; float:right;">
                    <div class="clear"></div>
                    </td>
                    </tr>
                    </tbody>
                    </table>                                                
                    </div>
                    </form>
			</div>
        </div>
        <div id="step2" style="background-color:#6795ad; padding:50px 0; text-align:center;">
        	<div class="main_wrap" style="text-align:center;"> 
            <div style=" background:url(<?php bloginfo('stylesheet_directory'); ?>/images/cloud3.jpg); height:174px; width:298px; margin:auto; text-align:center;">
                    <p style="margin-bottom:10px; font-size:25px; position:relative; top:60px;">Step 2</p>
                <h2 style="margin:0px 0 40px; font-weight:bold; position:relative; top:55px;">Connect & Import</h2>
            </div>            
            <p style="text-align:center; margin-top:40px;"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/conn-step2.jpg" width="848" height="371" /></p>
            </div>
        </div>
        <div id="step3" style="padding:50px 0; text-align:center;">
        	<div class="main_wrap" style="text-align:center;"> 
            	<div style=" background:url(<?php bloginfo('stylesheet_directory'); ?>/images/cloud.jpg); height:300px; width:300px; margin:auto; text-align:center;">
        			<p style="margin-bottom:10px; font-size:25px; position:relative; top:90px;">Step 3</p>
        			<h2 style="margin:0 0 100px; padding:0; font-weight:bold; position:relative; top:80px; line-height:1em;">Promote, Nurture, Sell, Measure</h2>
            	</div>
            <p style="text-align:center;"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/conn-step3.jpg" width="702" height="518" /></p>
            </div>
        </div>    
  </div>
  <!--<div id="connections_sec2">
    <div class="main_wrap">
      <?php
        //$connections_sec2 = get_post(244); 
		//echo $connections_sec2->post_content;
		?>
    </div>
  </div> -->
  <div id="succstories" class="succstories">
    <div class="succstories-inner">
      <div class="clear"></div>
      <h3>Success Stories</h3>
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
          $stories = get_posts('post_type=success-stories&post_status=publish&showposts=1000&orderby=post_date&order=desc&cat=20');
          foreach($stories as $story)
          {
              if (has_post_thumbnail( $story->ID ) ):
                  $image = wp_get_attachment_image_src( get_post_thumbnail_id( $story->ID ), 'single-post-thumbnail' );
              endif;				
              ?>
              <div class="homestory" style="width:400px;">
                  <?php
                  if($story)
                  {
                  ?>
                      <a href="<?php echo get_permalink($story->ID); ?>">
                          <p class="st_text"><?php echo $story->post_excerpt; ?>...Read more</p>
                          <!--<span class="clear"></span>
                          <span class="ss_auth"><?php echo $story->author; ?></span>-->
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
          }
          ?>                    
      </div>
  <div class="clear"></div>
</div>
</div>  
  <!--<div id="services" class="services">
    <div class="main_wrap">
      <?php //$market_conn = get_post(99); ?>
      <h2><?php //echo $market_conn->post_title; ?></h2>      
      <?php //echo $market_conn->post_content; ?>      
    </div>
  </div>-->
</div>
<style type="text/css">
 .forminputbg {
    width: 310px !important;
}
</style>
<?php get_footer(); ?>
