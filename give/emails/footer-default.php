<?php

/**
 * Email Footer
 *
 * @package     Give/Templates/Emails
 * @version     1.0
 */

if (! defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}


// For gmail compatibility, including CSS styles in head/body are stripped out therefore styles need to be inline. These variables contain rules which are added to the template inline.
$template_footer = '
	border-top:0;
	-webkit-border-radius:3px;
';

$credit = "
	border:0;
	color: #000000;
	font-family: 'Helvetica Neue', Helvetica, Arial, 'Lucida Grande', sans-serif;
	font-size:12px;
	line-height:125%;
	text-align:center;
";
?>
</td>
</tr>
</table>
</td>
</tr>
</table>
</td>
</tr>
</table>
</td>
</tr>
</table>
<table cellspacing="0" cellpadding="0" align="center" class="es-footer" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:100%;table-layout:fixed !important;background-color:transparent;background-repeat:repeat;background-position:center top">
	<tr>
		<td align="center" style="padding:0;Margin:0">
			<table cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center" class="es-footer-body" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;width:640px">
				<tr>
					<td align="left" style="padding:20px;Margin:0">
						<table cellspacing="0" width="100%" cellpadding="0" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
							<tr>
								<td align="left" style="padding:0;Margin:0;width:600px">
									<table width="100%" role="presentation" cellpadding="0" cellspacing="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
										<tr>
											<td align="center" style="padding:0;Margin:0;font-size:0"><img src="<?php echo get_give_email_images() ?>cpsv-icons.jpg" alt="" width="600" class="adapt-img" style="display:block;font-size:14px;border:0;outline:none;text-decoration:none"></td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td align="left" bgcolor="#020044" style="padding:20px;Margin:0;background-color:#020044">
						<table width="100%" cellpadding="0" cellspacing="0" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
							<tr>
								<td align="left" style="padding:0;Margin:0;width:600px">
									<table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
										<tr>
											<td align="center" class="es-text-7990" style="padding:0;Margin:0">
												<p class="es-override-size es-text-mobile-size-14" style="Margin:0;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:21px;letter-spacing:0;color:#fff;font-size:14px"><strong>200 Elder Street, Greensborough, VIC 3088 &nbsp;- &nbsp;<a href="tel:+61384576500" style="mso-line-height-rule:exactly;text-decoration:underline;color:#ffffff;font-size:14px">03 8457 6500</a><br><a href="mailto:info@catprotection.com.au" style="mso-line-height-rule:exactly;text-decoration:underline;color:#ffffff;font-size:14px">info@catprotection.com.au</a> &nbsp;- &nbsp;<a href="https://www.catprotection.com.au" target="_blank" style="mso-line-height-rule:exactly;text-decoration:underline;color:#ffffff;font-size:14px">www.catprotection.com.au</a></strong></p>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
</td>
</tr>
</table>
</div>
</body>

</html>