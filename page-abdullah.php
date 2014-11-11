<?php 

/* Template Name: Fat Test */

get_header(); ?>
<script type="text/javascript" src="http://ajax.microsoft.com/ajax/jQuery/jquery-1.4.2.min.js"></script> 
<script language="javascript">
	$(document).ready(function() {			
		$('.lovedimg').css('top','54px');
		$('.packagebox').hover(function(){
			$('.packagebox').removeClass('packagebox-active');
			if($(this).attr('id') != 'pro')
				$('.lovedimg').css('top','64px');
			else
				$('.lovedimg').css('top','54px');
			$(this).addClass('packagebox-active');				
		},function(){
			$(this).removeClass('packagebox-active');
			$('.lovedimg').css('top','64px');
		});
		$('.packagebox').click(function(){
			//alert('aaaa');
			$('.packagebox').removeClass('packagebox-active');
			/*if($(this).attr('id') == 'pro')
				$('.lovedimg').show();
			else
				$('.lovedimg').hide();*/
			$(this).addClass('packagebox-active');            
		});
	});
	function opendetail(pkgid)
	{
		$('#features').addClass(pkgid+'-det');
		return true;
	}
</script>
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script> 
<script src="<?php echo get_template_directory_uri(); ?>/js/main.js" type="text/javascript"></script>
<script type="text/javascript">
		  $(document).ready(function(){		
			$(window).on('scroll',function() {
			  var scrolltop = $(this).scrollTop();
		  
			  if(scrolltop >= 2215) {
				$('#fixedtablehead').fadeIn(250);
			  }
			  
			  else if(scrolltop <= 2210) {
				$('#fixedtablehead').fadeOut(250);
			  }
			});
		  });
	  </script>
<div id="pricing_page">
  <?php
    if(have_posts()): 
	while(have_posts()) :
	the_post();
	$background_image = get_field('bann_backimage');
	$top_image = get_field('bann_topimage');	
	?>
  <div class="topbanner pricing_topbanner">
    <div class="free-signup-wrap">
      <div class="main_wrap free-signup"> <img src="<?php echo get_template_directory_uri(); ?>/images/signup-banner.png" /> <a class="top_button sign_up sign_up_free" href="#" onclick="showsupop();">Click here to sign up</a> </div>
    </div>
    <div class="monthly-billing-wrap" style="background:#F7F9FB;">
      <div class="monthly-wrap monthly-billing">
        <?php the_field('bann_desc'); ?>
      </div>
    </div>
  </div>
  <?php
	endwhile;
    endif;
	?>
  
  <div class="main" >
    <div class="main_wrap">    	
      <div class="packages">
        <h1>Choose a package that suits your needs.</h1> 
        <div class="clear"></div>
        <div class="shareprpage" style="position:absolute; top:60px; right:0;">
            <div class="clear"></div>
            <img width="19" height="17" style="border:0;" alt="" src="http://www.makesbridge.com/wp-content/themes/mksteam/images/dir-arrow.png" class="dirarrow">
            <a title="Email this page" class="sharelink" href="mailto:">Share this page</a>
            <a title="Print" class="print" href="#"><img width="18" height="18" style="border:0" alt="" src="http://www.makesbridge.com/wp-content/themes/mksteam/images/print-icon.png"></a>
            <a title="Save as PDF" class="download" target="_blank" href="http://www.makesbridge.com/wp-content/plugins/kalins-pdf-creation-station/kalins_pdf_create.php?singlepost=pg_48"><img width="16" height="18" style="border:0" alt="" src="http://thisweek.makesbridge.com/wp-content/themes/mksteam/images/download-icon.png"></a>            
            <div class="clear"></div>
        </div> 
        <div class="clear"></div>      
        <?php
              $packages = get_posts('post_type=packages&post_status=publish&showposts=1000&orderby=post_date&order=asc');
			  if($packages)
			  {
				$i=1;				
			  foreach($packages as $package)
			  {
				  $acc = '';
				  if($i==1)
				  {
					$pcw = 'width:130px; padding:0 0 0 10px;';
					$sftop = 'style="margin-top: 198px;"';
					$acc = '';
					$lovimg = 'display:none';
					$boxid = 'mini';
					$oldp = '';
				  }
				elseif($i==2)
				{
					$pcw = 'width:130px; padding:0 0 0 10px;';
					$pc = '#F8B916';
					$sftop = 'style="margin-top: 198px;"';
					$acc = '';
					$lovimg = 'display:none'; 
					$boxid = 'smb';
					$oldp = 'Mini';
				}
				elseif($i==3)
				{
					$pcw = 'width:154px; padding:0 0 0 10px;';
					$pc = '#FC721F';
					$sftop = 'style="margin-top: 102px;"';
					$acc = 'packagebox-active';
					$lovimg = 'display:block';
					$boxid = 'pro';
					$oldp = 'SMB';
				}
				elseif($i==4)
				{
					$pcw = 'width:166px; padding:0 0 0 10px;';
					$pc = '#F1526D';
					$sftop = 'style="margin-top: 72px;"';
					$acc = '';
					$lovimg = 'display:none';
					$boxid = 'ent';
					$oldp = 'PRO';
				}
				elseif($i==5)
				{
					$pcw = 'width:176px;padding:0 5px;';
					$pc = '#CB65E9';
					$sftop = '';	
					$acc = '';
					$lovimg = 'display:none';
					$boxid = 'eng';
					$oldp = 'Ent';
				}				
			  ?>
              <img class="lovedimg" src="<?php echo get_template_directory_uri(); ?>/images/most-loved.png" width="119" height="28" alt="" style="<?php echo $lovimg; ?>" />              
        <div id="<?php echo $boxid; ?>" class="packagebox <?php echo $acc; ?>">
          <div class="packagebox-head">
            <h2><?php echo $package->post_title; ?></h2>
          </div>
          <div class="packagebox-subhead"> <?php echo get_field("description",$package->ID); ?> </div>
          <div class="package-price">
            <div class='package-price-container' style="<?php echo $pcw; ?>">
              <div class="clear"></div>
              <sup class="pkgprice">$</sup>
              <h3> <?php echo get_field("package_price",$package->ID); ?> </h3>
              <sub class="pkgperiod">/mo</sub>
              <div class="clear"></div>
            </div>
          </div>
          <div class="package-textwidget">
            <h2><?php echo get_field("number_of_emails",$package->ID); ?> <span>emails/mo.</span></h2>
            <?php
                      if($i > 1)
					  {
					  ?>
            <h3>Everything in <span style="color:<?php echo $pc; ?>">MKS <?php echo $oldp; ?></span></h3>
            <img alt="" class="package_plus" src="<?php echo get_template_directory_uri(); ?>/images/package-plus.png" width="16" height="16" style="border:0;" />
            <?php
					  }
                      $features = explode(',',get_field("features",$package->ID));
					  if($features)
					  {
						  foreach($features as $feature)
						  {
					  ?>
            <h3><?php echo $feature; ?></h3>
            <?php
						  }
					  }
						?>
          </div>
          <div class="package-salesforce" <?php echo $sftop; ?>> <a href="#features" onclick="return opendetail('<?php echo $boxid; ?>')">
            <h2>See Feature Details</h2>
            </a> </div>
          <div class="package-buttons">
          	<a class="button add_to_cart_button product_type_simple" data-product_id="224" rel="nofollow" href="/full-service-solutions/concierge-services?add-to-cart=224">Buy Now</a>
            <button>Order Now</button>
          </div>
        </div>
        <?php
			 	$i++;
			  }
			  }
			 ?>
        <div class="clear"></div>
      </div>
    </div>
  </div>  
  <div class="main">
    <div class="main_wrap">
      <div class="contactus"> <img alt="" class="chat_lady" style="border:0;" src="<?php echo get_template_directory_uri(); ?>/images/lady-photo.png" width="144" height="181" />
        <div class="topbar">
          <div class="clear"></div>
          <div class="content">
            <h3>Want to send more emails?</h3>
            <p><a href="<?php bloginfo('url'); ?>/request-demo">Click Here</a> to get a quote for your choice of email volume.</p>
          </div>
          <a href="<?php bloginfo('url'); ?>/request-demo" class="req_quote">Request Quote</a>
          <div class="clear"></div>
        </div>
        <div class="chatbar">
          <div class="clear"></div>
          <h3>Chat with Sales</h3>
          <div class="buttons"> <a href="#" class="chat_btn">Chat</a> <a href="#" class="freetrial_btn" onclick="showsupop('signup_now','1');">Free Trial</a> </div>
          <div class="clear"></div>
        </div>
      </div>
      <div class="stories">
        <div class="subs-wrap">
          <h2>Subscription FAQs</h2>
        </div>
        <div class="columns">
          <ul style="float:left">
            <?php
                    $faqs = get_posts('post_type=faqtests&post_status=publish&showposts=1000&orderby=post_date&order=asc');
					if($faqs)
					{
						$i=1;
						if(count($faqs) % 2 == 0)
							$half = count($faqs) / 2;
						else
							$half = (floor(count($faqs) / 2)) + 1;
						//echo $half;
						foreach($faqs as $faq)
						{
						?>
            <li class="faq-wrap"> <a href='#'><span><?php echo $faq->post_title; ?></span></a>
              <ul>
                <li> <?php echo get_field('answer',$faq->ID); ?> </li>
              </ul>
            </li>
            <?php						
						if($half == $i && $i >= 7)
						{
							?>
          </ul>
          <ul style="float:left; margin-left:10px;">
            <?php
						}
						$i++;
						}
					}
					?>
          </ul>
          <div class="clear"></div>
        </div>
      </div>      
      <div id="features" class="features">
        <h2>Features Comparison</h2>
        <div class="shareprpage">
            <div class="clear"></div>
            <img class="dirarrow" src="<?php echo get_template_directory_uri(); ?>/images/dir-arrow.png" width="19" height="17" alt="" style="border:0;" />
            <a href="mailto:" class="sharelink" title="Email this page">Share this page</a>
            <a href="#" class="print" title="Print"><img src="<?php echo get_template_directory_uri(); ?>/images/print-icon.png" width="18" height="18" alt="" style="border:0" /></a>
            <a href="#" class="download" title="Save as PDF"><img src="<?php echo get_template_directory_uri(); ?>/images/download-icon.png" width="16" height="18" alt="" style="border:0" /></a>
            <div class="clear"></div>
        </div>
        <div class="featurestable">
        	<img class="lovedimg2" src="<?php echo get_template_directory_uri(); ?>/images/most-loved.png" width="119" height="28" alt="" />            
          <div id="fixedtablehead">
              <div class="clear"></div>
              <div class="featurehead"> Features </div>
              <div class="pkghead pkgmini"> Mini </div>
              <div class="pkghead pkgsmb"> SMB </div>
              <div class="pkghead pkgpro"> PRO </div>
              <div class="pkghead pkgenp"> Enterprise </div>
              <div class="pkghead pkgeng"> Engage </div>
              <div class="clear"></div>
          </div>
          <div id="featstablehead">
              <div class="clear"></div>
              <div class="featurehead"> Features </div>
              <div class="pkghead pkgmini"> Mini </div>
              <div class="pkghead pkgsmb"> SMB </div>
              <div class="pkghead pkgpro"> PRO </div>
              <div class="pkghead pkgenp"> Enterprise </div>
              <div class="pkghead pkgeng"> Engage </div>
              <div class="clear"></div>
          </div>
          <div class="featurecol">
            <h3>Email Marketing</h3>
            <h4>Sent Emails</h4>
            <ul>
              <li>Auto-Triggering</li>
              <li>Targeting</li>
              <li>Segment Growth Analysis</li>
              <li>HTML Templates</li>
              <li>Conversion Tracking</li>
              <li>
                <p>Website Behavior<br>
                  Tracking</p>
              </li>
              <li>Behavior Scoring</li>
              <li>Hot List</li>
              <li>Reporting & Analytics</li>
              <li>Opt-Out Management</li>
              <li>Salesforce Integration</li>
            </ul>
            <h3>Marketing Automation</h3>
            <ul>
              <li>Automation Checks</li>
              <li>Automation Controls</li>
              <li>Email Nurturing</li>
              <li>Workflow Wizard</li>
              <li>Data Value Triggers</li>
              <li>Email</li>
              <li>Mail</li>
              <li>Alerts</li>
              <li>Lead Scoring</li>
              <li>Conversion Tracking</li>
              <li>Analytics Dashboard</li>
              <li>Workflow Setup</li>
              <li>Salesforce Integration</li>
            </ul>
            <h3>Sales Automation</h3>
            <ul>
              <li>1:1 Email</li>
              <li>Mail</li>
              <li>Alerts</li>
              <li>Hot List</li>
              <li>Lead Scoring</li>
              <li>Full Automation Control</li>
              <li>Automation Reports</li>
              <li>Report Dashboards</li>
              <li>Salesforce Integration</li>
            </ul>
            <h3>Lead Management</h3>
            <h4>Hosted Records</h4>
            <ul>
              <li>Unlimited Lists</li>
              <li>Unlimited Custom Fields</li>
              <li>Unlimited Segments</li>
              <li>Behavior Tracking</li>
              <li>Growth Analysis</li>
              <li>Forms</li>
              <li>
                <p>Record & Activity Synchs</p>
              </li>
              <li>Forms - Add Records</li>
            </ul>
            <h3>Training & Education</h3>
            <ul>
              <li>Video Tutorials</li>
              <li>Guided Tours</li>
              <li>
                <p>Knowledge Development Seminars</p>
              </li>
              <li>1:1 Training</li>
            </ul>
            <h3>Support</h3>
            <ul>
              <li>
                <p>Searchable Knowledge Base</p>
              </li>
              <li>Online Chat</li>
              <li>Email</li>
              <li>Phone</li>
              <li>1:1 Deployment Consulting</li>
              <li>Concierge Service Pack 6</li>
            </ul>
          </div>
          <div class="pkgcol pkgminicol">
            <h3>&nbsp;</h3>
            <h4>500</h4>
            <ul>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li>&nbsp;</li>
              <li>&nbsp;</li>
              <li>&nbsp;</li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
            </ul>
            <h3>&nbsp;</h3>
            <ul>
              <li>&nbsp;</li>
              <li>&nbsp;</li>
              <li>&nbsp;</li>
              <li>&nbsp;</li>
              <li style="height:40px;">&nbsp;</li>
              <li>&nbsp;</li>
              <li>&nbsp;</li>
              <li>&nbsp;</li>
              <li>&nbsp;</li>
              <li>&nbsp;</li>
              <li>&nbsp;</li>
              <li>&nbsp;</li>
              <li class="noempty"></li>
            </ul>
            <h3>&nbsp;</h3>
            <ul>
              <li>&nbsp;</li>
              <li>&nbsp;</li>
              <li>&nbsp;</li>
              <li>&nbsp;</li>
              <li>&nbsp;</li>
              <li>&nbsp;</li>
              <li>&nbsp;</li>
              <li>&nbsp;</li>
              <li>&nbsp;</li>
            </ul>
            <h3>&nbsp;</h3>
            <h4>2K</h4>
            <ul>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
            </ul>
            <h3>&nbsp;</h3>
            <ul>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li>&nbsp;</li>
            </ul>
            <h3>&nbsp;</h3>
            <ul>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li>&nbsp;</li>
              <li>&nbsp;</li>
              <li>&nbsp;</li>
            </ul>
          </div>
          <div class="pkgcol pkgsmbcol">
            <h3>&nbsp;</h3>
            <h4>1,250</h4>
            <ul>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li>&nbsp;</li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
            </ul>
            <h3>&nbsp;</h3>
            <ul>
              <li>&nbsp;</li>
              <li>&nbsp;</li>
              <li>&nbsp;</li>
              <li>&nbsp;</li>
              <li style="height:40px;">&nbsp;</li>
              <li>&nbsp;</li>
              <li>&nbsp;</li>
              <li>&nbsp;</li>
              <li>&nbsp;</li>
              <li>&nbsp;</li>
              <li>&nbsp;</li>
              <li>&nbsp;</li>
              <li class="noempty"></li>
            </ul>
            <h3>&nbsp;</h3>
            <ul>
              <li>&nbsp;</li>
              <li>&nbsp;</li>
              <li>&nbsp;</li>
              <li>&nbsp;</li>
              <li>&nbsp;</li>
              <li>&nbsp;</li>
              <li>&nbsp;</li>
              <li>&nbsp;</li>
              <li>&nbsp;</li>
            </ul>
            <h3>&nbsp;</h3>
            <h4>20K</h4>
            <ul>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
            </ul>
            <h3>&nbsp;</h3>
            <ul>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
            </ul>
            <h3>&nbsp;</h3>
            <ul>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li>&nbsp;</li>
              <li>&nbsp;</li>
              <li>&nbsp;</li>
            </ul>
          </div>
          <div class="pkgcol pkgprocol">
            <h3>&nbsp;</h3>
            <h4>5,000</h4>
            <ul>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li>&nbsp;</li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
            </ul>
            <h3>&nbsp;</h3>
            <ul>
              <li>&nbsp;</li>
              <li>&nbsp;</li>
              <li class="noempty"></li>
              <li>&nbsp;</li>
              <li style="height:40px;">&nbsp;</li>
              <li>&nbsp;</li>
              <li>&nbsp;</li>
              <li>&nbsp;</li>
              <li>&nbsp;</li>
              <li class="noempty"></li>
              <li>&nbsp;</li>
              <li>&nbsp;</li>
              <li class="noempty"></li>
            </ul>
            <h3>&nbsp;</h3>
            <ul>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li>&nbsp;</li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
            </ul>
            <h3>&nbsp;</h3>
            <h4>50K</h4>
            <ul>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
            </ul>
            <h3>&nbsp;</h3>
            <ul>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
            </ul>
            <h3>&nbsp;</h3>
            <ul>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li>&nbsp;</li>
            </ul>
          </div>
          <div class="pkgcol pkgenpcol">
            <h3>&nbsp;</h3>
            <h4>10,000</h4>
            <ul>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
            </ul>
            <h3>&nbsp;</h3>
            <ul>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li style="height:40px;" class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li>&nbsp;</li>
              <li class="noempty"></li>
            </ul>
            <h3>&nbsp;</h3>
            <ul>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
            </ul>
            <h3>&nbsp;</h3>
            <h4>100K</h4>
            <ul>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
            </ul>
            <h3>&nbsp;</h3>
            <ul>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
            </ul>
            <h3>&nbsp;</h3>
            <ul>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li>&nbsp;</li>
            </ul>
          </div>
          <div class="pkgcol pkgengcol">
            <h3>&nbsp;</h3>
            <h4>15,000</h4>
            <ul>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
            </ul>
            <h3>&nbsp;</h3>
            <ul>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li style="height:40px;" class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
            </ul>
            <h3>&nbsp;</h3>
            <ul>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
            </ul>
            <h3>&nbsp;</h3>
            <h4>500K</h4>
            <ul>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
            </ul>
            <h3>&nbsp;</h3>
            <ul>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
            </ul>
            <h3>&nbsp;</h3>
            <ul>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
              <li class="noempty"></li>
            </ul>
          </div>
          <div class="clear"></div>
        </div>
      </div>
      <div style="text-align:center;"><img alt="" src="<?php echo get_template_directory_uri(); ?>/images/logos.png" width="433" height="60" style="margin:14px auto 10px; border:0;" /></div>
      <p class="integration">* All subscriptions natively integrate with <strong>Salesforce</strong> and supported by <strong>Netsuite</strong> and <strong>Bullhorn</strong>.</p>
    </div>
  </div>
</div>
<?php get_footer(); ?>
