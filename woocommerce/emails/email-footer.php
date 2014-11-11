<?php
/**
 * Email Footer
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates/Emails
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Load colours
$base = get_option( 'woocommerce_email_base_color' );

$base_lighter_40 = wc_hex_lighter( $base, 40 );

// For gmail compatibility, including CSS styles in head/body are stripped out therefore styles need to be inline. These variables contain rules which are added to the template inline.
$template_footer = "
	border-top:0;
	-webkit-border-radius:6px;
";

$credit = "
	border:0;
	color: $base_lighter_40;
	font-family: Arial;
	font-size:12px;
	line-height:125%;
	text-align:center;
";
?>
															</div>
														</td>
                                                    </tr>
                                                </table>
                                                <!-- End Content -->
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- End Body -->
                                </td>
                            </tr>
                        	<tr>
                            	<td align="center" valign="top">
                                    <!-- Footer -->
                                	<table border="0" cellpadding="10" cellspacing="0" width="600" id="template_footer" style="<?php echo $template_footer; ?>">
                                    	<tr>
                                        	<td valign="top">
                                                <table border="0" cellpadding="10" cellspacing="0" width="100%">
                                                	<tr>
                                                        <td colspan="2">
                                                            <hr style="height:1px; color:#d6d6d6; background-color:#d6d6d6;">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td valign="middle" width="310" align="left" id="credit" style="<?php echo $credit; ?>">
                                                        	<?php //echo wpautop( wp_kses_post( wptexturize( apply_filters( 'woocommerce_email_footer_text', get_option( 'woocommerce_email_footer_text' ) ) ) ) ); ?>
                                                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                <tr>
                                                                    <td width="12" valign="top">
                                                                        <img src="http://www.makesbridge.com/wp-content/themes/mksteam/images/email-footer-phone-icon.png" width="12" height="12">
                                                                    </td>
                                                                    <td style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#697c85;">
                                                                        <p style="margin:0 0 5px 5px; padding:0;">+1 408 740 8224 - 866 991 SAAS (7227)</p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="2" align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#697c85;">
                                                                        <p style="margin:0 0 5px; padding:0;">14435 Big Basin Way, #122 Saratoga Village, CA 95070</p>
                                                                        <p style="margin:0 0 5px; padding:0;">www.makesbridge.com</p>
                                                                        <p style="margin:0 0 5px; padding:0;">&copy; Copyright Makesbridge 2014</p>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                        <td width="220" align="right" valign="middle" style="padding-left:5px;">
                                                            <img src="http://www.makesbridge.com/wp-content/themes/mksteam/images/footer-logo.png" width="219" height="18">
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- End Footer -->
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </body>
</html>