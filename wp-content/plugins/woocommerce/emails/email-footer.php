<?php
/**
 * Email Footer
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/email-footer.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates\Emails
 * @version 3.7.0
 */

defined( 'ABSPATH' ) || exit;
$base_url = 'https://168million.nl';
if (0) :
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
						</table>
					</td>
				</tr>
				<tr>
					<td align="center" valign="top">
						<!-- Footer -->
						<table border="0" cellpadding="10" cellspacing="0" width="600" id="template_footer">
							<tr>
								<td valign="top">
									<table border="0" cellpadding="10" cellspacing="0" width="100%">
										<tr>
											<td colspan="2" valign="middle" id="credit">
												<?php echo wp_kses_post( wpautop( wptexturize( apply_filters( 'woocommerce_email_footer_text', get_option( 'woocommerce_email_footer_text' ) ) ) ) ); ?>
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
		</div>
<?php
endif;
?>

</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
    <td style="background: #0A2033" align="center" bgcolor="#dedfe5">
        <table border="0" width="600" cellspacing="0" cellpadding="0">
            <tbody>
            <tr>
                <td width="15"><img style="border: none;" src="<?php echo $base_url; ?>/wp-content/uploads/2020/10/spacer.gif" width="15" height="10" border="0"></td>
                <td style="font-family: Lucida Sans,Arial,Helvetica,sans-serif; font-size: 13px; color: #808080;" width="250">
                    <table border="0" width="250" cellspacing="0" cellpadding="0">
                        <tbody>
                        <tr style="height: 126px;">
                            <td style="font-family: 'Lucida Sans', Arial, Helvetica, sans-serif; font-size: 13px; color: #ffffff; width: 250px; height: 126px;"><br> Contactinformatie:<br> <br> <span style="color: #808080;"> Stichting 168 Million Nederland <br> Donateursadministratie <br> Keizersgracht 241 <br> 1016 EA Amsterdam<br> Contactnummer: 020 244 0 688<br> </span></td>
                        </tr>
                        <tr style="height: 1.328125px;">
                            <td style="font-family: 'Lucida Sans', Arial, Helvetica, sans-serif; font-size: 12px; color: #27205a; height: 1.328125px;"><img src="<?php echo $base_url; ?>/wp-content/uploads/2020/10/spacer.gif" width="19" height="10" border="0"></td>
                        </tr>
                        </tbody>
                    </table>
                    <table style="height: 9px;" border="0" width="247" cellspacing="0" cellpadding="0">
                        <tbody>
                        <tr style="height: 0.328125px;">
                            <td style="width: 77.53125px; height: 0.328125px;" valign="top">&nbsp;</td>
                            <td style="height: 0.328125px; width: 9.828125px;">&nbsp;</td>
                            <td style="height: 0.328125px; width: 129.109375px;" valign="top">&nbsp;</td>
                            <td style="height: 0.328125px; width: 20.578125px;"><img style="width: 19px; border: none;" src="<?php echo $base_url; ?>/wp-content/uploads/2020/10/spacer.gif" width="19" height="10" border="0"></td>
                        </tr>
                        </tbody>
                    </table>
                    <br> Geregistreerd bij<br> <br>
                    <table border="0" cellspacing="0" cellpadding="0" style="margin-bottom: 15px;">
                        <tbody>
                        <tr>
                            <td width="57"><a href="<?php echo $base_url; ?>/erkenning/" target="_blank" rel="noopener noreferrer"> <img style="display: block;" src="<?php echo $base_url; ?>/wp-content/uploads/2020/10/anbi-transparant-168Million.png" alt="ANBI" width="57" height="45"> </a></td>
                            <td width="9"><img style="border: none;" src="<?php echo $base_url; ?>/wp-content/uploads/2020/10/spacer.gif" width="9" height="10" border="0"></td>
                            <td width="135"><a href="<?php echo $base_url; ?>/erkenning/" target="_blank" rel="noopener noreferrer"> <img style="display: block;" src="<?php echo $base_url; ?>/wp-content/uploads/2020/10/Goede-Doelen-Nederland-logo-2.png" alt="CBF" width="135" height="45"></a></td>
                            <td width="9"><img style="border: none;" src="<?php echo $base_url; ?>/wp-content/uploads/2020/10/spacer.gif" width="9" height="10" border="0"></td>
                            <td width="90"><a href="<?php echo $base_url; ?>/erkenning/" target="_blank" rel="noopener noreferrer"> <img style="display: block;" src="<?php echo $base_url; ?>/wp-content/uploads/2020/11/cbf-logo.png" alt="CBF" width="90" height="45"></a></td>
                        </tr>

                        </tbody>
                    </table>
                </td>

                <td>&nbsp;</td>
                <td style="font-family: Lucida Sans,Arial,Helvetica,sans-serif; font-size: 13px; color: #ffffff;" valign="top"><br> Stichtinginformatie:<br> <span style="color: #808080;"> <br> KvK nummer: 68.95.1744<br> RSIN: 8576.62.429 <br>BIC: ABNANL2A <br> IBAN: NL22 ABNA 0254 6162 40<br>  Web : www.168million.nl</span></td>
            </tr>
            </tbody>
        </table>
    </td>
</tr>
<tr style="background-color: #2393FF" bgcolor="#2393FF">
    <td style="color: white;font-size: 15px;text-align: center;">
        © <?php echo date('Y',time()); ?> - 168 Million Nederland
    </td>
</tr>
</tbody>
</table>
</div>
</div>
</div>

	</body>
</html>
