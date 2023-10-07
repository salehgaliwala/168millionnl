<?php
/**
 * Email Header
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/email-header.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates\Emails
 * @version 4.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
$base_url = 'https://168million.nl';
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>" />
		<title><?php echo get_bloginfo( 'name', 'display' ); ?></title>
	</head>

	<body <?php echo is_rtl() ? 'rightmargin' : 'leftmargin'; ?>="0" marginwidth="0" topmargin="0" marginheight="0" offset="0">
	<?php if (0): ?>
		<div id="wrapper" dir="<?php echo is_rtl() ? 'rtl' : 'ltr'; ?>">
			<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">
				<tr>
					<td align="center" valign="top">
						<div id="template_header_image">
							<?php
							if ( $img = get_option( 'woocommerce_email_header_image' ) ) {
								$img = 'https://168million.nl/wp-content/uploads/2023/08/about-us-borehole-africa-peter-somers-paris-2050-carbon-credits-carbon-offset.jpg';
								echo '<p style="margin-top:0;"><img src="' . esc_url( $img ) . '" alt="' . get_bloginfo( 'name', 'display' ) . '" /></p>';
							}
							?>
						</div>
						<table border="0" cellpadding="0" cellspacing="0" width="600" id="template_container">
							<tr>
								<td align="center" valign="top">
									<!-- Header -->
									<table border="0" cellpadding="0" cellspacing="0" width="100%" id="template_header">
										<tr>
											<td id="header_wrapper">
												<h1><?php echo $email_heading; ?></h1>
											</td>
										</tr>
									</table>
									<!-- End Header -->
								</td>
							</tr>
							<tr>
								<td align="center" valign="top">
									<!-- Body -->
									<table border="0" cellpadding="0" cellspacing="0" width="600" id="template_body">
										<tr>
											<td valign="top" id="body_content">
												<!-- Content -->
												<table border="0" cellpadding="20" cellspacing="0" width="100%">
													<tr>
														<td valign="top">
															<div id="body_content_inner">
    <?php endif; ?>

                                                                <div dir="ltr">
                                                                    <div class="gmail_quote"><u></u>
                                                                        <div style="margin: 0; padding: 0; margin-top: 0; margin-bottom: 0; padding-top: 0; padding-bottom: 0; width: 100%!important; background-color: #ffffff;">
                                                                            <table border="0" width="100%" cellspacing="0" cellpadding="0">
                                                                                <tbody>
                                                                                <tr>
                                                                                    <td>
                                                                                        <table style="background: #ffffff;" border="0" width="600" cellspacing="0" cellpadding="0" align="center" bgcolor="#ffffff">
                                                                                            <tbody>
                                                                                            <tr>
                                                                                                <td style="background: #3d9af7;" bgcolor="#fc9111" width="15"><img style="border: none;" src="<?php echo $base_url; ?>/wp-content/uploads/2020/10/spacer.gif" width="15" height="10" border="0"></td>
                                                                                                <td style="background: #3d9af7;" valign="top" bgcolor="#fc9111" height="233">
                                                                                                    <table>
                                                                                                        <tbody>
                                                                                                        <tr>
                                                                                                            <td width="197"><img style="border: none;" src="<?php echo $base_url; ?>/wp-content/uploads/2020/10/spacer.gif" width="15" height="50" border="0"> <a href="https://168million.nl/" target="_blank" rel="noopener noreferrer"> <img style="display: block; border: none;" src="<?php echo $base_url; ?>/wp-content/uploads/2020/10/hartelijkdank.png" alt="Bedankt voor uw steun" width="178" height="96" border="0"> </a></td>
                                                                                                            <td width="388"><a href="https://168million.nl/" target="_blank" rel="noopener noreferrer"> <img style="display: block; border: none;" src="<?php echo $base_url; ?>/wp-content/uploads/2020/09/168million-45.jpg" alt="image" width="388" height="233" border="0"> </a></td>
                                                                                                        </tr>
                                                                                                        </tbody>
                                                                                                    </table>
                                                                                                </td>
                                                                                            </tr>

                                                                                            <tr>
                                                                                                <td colspan="2"><img style="border: none;" src="<?php echo $base_url; ?>/wp-content/uploads/2020/10/spacer.gif" width="15px" height="20" border="0"></td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td colspan="2">
                                                                                                    <table style="max-width: 500px;margin: 0 auto;">
                                                                                                        <tbody>
                                                                                                        <tr>
                                                                                                            <td>
