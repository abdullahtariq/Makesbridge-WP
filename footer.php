<?php
/** footer.php
 *
 * Displays all of the footer section
 *
 * @author		Rexson Buntag
 * @package		mks-landing
 * @since		1.0
 */
?>	
	<!-- START: Footer -->
	<div class="main">
		<div class="main_wrap">
			<div class="footer">
				<div class="footer_left">
					<ul class="footer_link">
						<li class="icon_li"><div class="logofoot" aria-hidden="true" data-icon="&#xf0b1;"></div></li>
						<li><a href="<?php bloginfo('url'); ?>/product-category/packages">Pricing</a></li>
						<li><a href="<?php bloginfo('url'); ?>/blog">Blog</a></li>
						<li><a href="<?php bloginfo('url'); ?>/about-us">About Us</a></li>
						<li><a href="<?php bloginfo('url'); ?>/privacy-policy">Privacy Policy</a></li>
					</ul>
				</div>
				<div class="footer_right">
					<div class="footer_r_content">
						<a href="https://twitter.com/makesbridge" target="_blank"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/twitter.png" width="24" height="24" /></a>
                        <a href="http://www.linkedin.com/company/makesbridge-technology?trk=top_nav_home" target="_blank"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/linkedin.png" width="24" height="24" /></a>
                        <a href="https://appexchange.salesforce.com/listingDetail?listingId=a0N300000016a08EAA" target="_blank"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/salesforce.png" width="24" height="24" /></a>
                        <a href="https://www.youtube.com/user/makesbridge" target="_blank"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/youtube.png" width="24" height="24" /></a>
                        <a href="https://vimeo.com/channels/719912" target="_blank"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/vimeo.png" width="24" height="24" /></a>
                        <a href="https://plus.google.com/107273461390647048700" target="_blank"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/googleplus.png" width="24" height="24" /></a>
                        <a href="javascript:void(0);" style="display:none;" onclick="togglenlForm()">
                        	<img src="<?php bloginfo('stylesheet_directory'); ?>/images/email.png" width="24" height="24" />
                        </a>
                        <div id="nlform">
                        	<div style="margin:30px auto 0; width:320px;" class="form">                        
                                <div style="width:310px;" class="forminputbg">
                                    <label>Email</label>
                                    <input type="text" style="width:225px; padding-right:10px;" id="email1" name="email1">
                                    <div class="clear"></div>
                                </div>
                                <div class="clear"></div>
                                <div class="getstarted" style="float:right;">Subscribe</div>                                
                                <div class="clear"></div>
                            </div>
                        </div>
                        <script language="javascript">
                        	function togglenlForm()
							{
								if($('#nlform').css('display') == 'none')
									$('#nlform').css('display','block');
								else
									$('#nlform').css('display','none');
							}
                        </script>
					</div>
					<div class="wp-mks-embedd" style="width: 80%;float: right;height: 58px;">
						<?php
							//   $newsletter = get_post(961); 
							// echo $newsletter->post_content;
							include_once( 'page-newsletter.php' );
						 ?>
						</div>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</div>
	<!-- END: Footer -->
	<!-- START: Footer -->
	<div class="main">
		<div class="main_wrap">
        	<div class="address">14435 Big Basin Way, #122 Saratoga Village, CA 95070</div>
			<div class="footerlast">
            	<img src="<?php bloginfo('stylesheet_directory'); ?>/images/footer-logo.jpg" width="326" height="33" />
			</div>
			<div class="copyright">Copyright <?php echo date('Y');?> &copy; Makesbridge</div>
		</div>
	</div>
	<!-- END: Footer -->
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/retina-1.1.0.min.js"></script>
    
    <!----- BridgeStatz SNIPPET -->
<SCRIPT TYPE="text/javascript">
 var BMS_DID='ccaY49Wc'; var DID=37707;
 var proto =document.location.protocol||'http:';
 proto = proto+'//dquxwtqtqbel6.cloudfront.net/pms/js/bmstatsCombo.js?'+(new Date()).getTime();
 var purl = unescape("%3Cscript src='"+proto+"' type='text/javascript' %3E%3C/script%3E");
 document.writeln(purl);
</SCRIPT>
<SCRIPT TYPE="text/javascript">var MyID=afetchBMSID(); sniffUp(); SaaS();</SCRIPT>
<!----- BridgeStatz SNIPPET -->

<!--<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-17920243-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script> -->
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-24818419-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</body>
</html>