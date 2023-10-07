<?php
define ("TABLE_NAME","admingrid_adgrid"); // set table name
add_shortcode('donation_form_168','donation_form_168');

function donation_form_168(){

    wp_enqueue_style('donation-form.css',get_stylesheet_directory_uri().'/css/donation-form.css');
    wp_enqueue_script('donation-form',get_stylesheet_directory_uri().'/js/donation.js');
    if($_REQUEST['amount'])
    {
    	$amount = str_replace("€","",$_REQUEST['amount']);
    	$show = 'display:block';
    	$hide = 'display:none';
    	

    }
    else
    {
    	$amount = 3;
    	$show = 'display:none';
    	$hide = 'display:block';
    }

	?>
	<!--<link rel="stylesheet" href="media/css/bootstrap-iso.css">-->

	<div style="height:40px;"></div>
<div class="fullWidthRow">
	<div class="bootstrap-iso">
		<div class="container-fluid donation-bg" >
			<div class="container">

				<div class="row">
					<div class="form-box">

						<div class="">
							<div class="form-block form-block--error" style="display: none">
							</div>
						</div>

						<form role="form"  id="donationform" class="registration-form" method="post" action="/donation/payment.php" target="_blank">
							<fieldset step="1">
								<div class="form-top">
									<div class="form-top-left">
										<span class="step-count">1/4</span>
										<h3>Help nu en doneer</h3>
									</div>
								</div>
								<div class="form-bottom">
									<div class="row">
										<div class="form-group col-md-12">
											<select class="form-control" id="donation_frequency" name="donation[frequency]">
												<option value="0">Ik doneer eenmalig</option>
												<option value="1">Ik doneer maandelijks</option>
												<option value="2">Ik doneer per kwartaal</option>
												<option value="3">Ik doneer jaarlijks</option>
											</select>
										</div>
									</div>
									<div class="form-group radio-amount" style="<?php echo $hide ?>">
										<div class="row colpadding-2">
											<div class="col-md-4 col-sm-4 col-4">
												<label for="payment_frequency_5_amount_1">
													<input type="radio" class="form-check-input" placeholder=""
													       id="payment_frequency_5_amount_1" name="donation[amount]" value="10">

													<span>€ 10</span>
												</label>
											</div>

											<div class="col-md-4 col-sm-4 col-4">
												<label for="payment_frequency_5_amount_2">
													<input checked type="radio" class="form-check-input" placeholder=""
													       id="payment_frequency_5_amount_2" name="donation[amount]" value="20">

													<span>€ 20</span>
												</label>
											</div>

											<div class="col-md-4 col-sm-4 col-4">
												<label for="payment_frequency_5_amount_3">
													<input type="radio" class="form-check-input" placeholder=""
													       id="payment_frequency_5_amount_3" name="donation[amount]" value="50">

													<span>€ 50</span>
												</label>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="form-group col-md-12 other-amount-toggle">
											<a id="js-other-amount-toggle" data-target="#js-other-amount" href="#">
												Of kies een ander bedrag
											</a>
										</div>
									</div>
									<div class="row">
										<div class="form-group col-md-12">
											<div class="custom-amount" style="<?php echo $show ?>">
												<label>Kies een bedrag</label>
												<input type="number" class="form-control" id="donation_amount" name="donation[amount]" value="<?php echo $amount ?>" disabled>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="form-group col-md-12">
											<p class="euro-text">
												Met €13,00 geef je meer dan 500 kinderen 25 jaar lang speelplezier.
												<br/>
												<!-- Voor €20 kunnenwij 5 voetballenweggeven, watbetekentdat 100+ kinderenplezierzullenhebben van uwdonatie.
												 <br/>
												 Voor €50 kunnen 100 kinderengechecktworden op ziektes en eenbasisinentingkrijgen. -->
											</p>
										</div>
									</div>

                                    <div class="form-group" style="    margin-left: 20px;">
                                        <div class="checkbox">
                                            <label><input type="checkbox" name="donation[is_business]" id="is_business">Deze donatie is namens een organisatie</label>
                                        </div>
                                    </div>

                                    <div id="is_business_in" class="row" style="display:none;">
                                        <div class="form-group col-md-12">
                                            <label for="business_name">Naam organisatie/bedrijf</label>
                                            <input type="text" name="donation[business_name]" placeholder="Naam" class="form-control" id="business_name">
                                        </div>
                                    </div>

									<button type="button" class="btn btn-next">Doneren</button>

									<div class="row">
										<div style="margin-top: 10px;" class="form-group col-md-12 other-amount-toggle">
											<a href="/faq/" target="_blank">
												Meer informatie over doneren
											</a>
										</div>
									</div>
								</div>
							</fieldset>
							<fieldset step="2">
								<div class="form-top">
									<div class="form-top-left">
										<span class="step-count">2/4</span>
										<h3>Help nu en doneer</h3>
									</div>
								</div>
								<div class="form-bottom">
									<div class="form-group gender">
										<div class="row">
											<div class="col-md-6 col-sm-6 col-6" style="padding-right: 5px">
												<label>
													<input type="radio" name="donation[gender]" value="male">
													<span>De heer</span>
												</label>
											</div>
											<div class="col-md-6 col-sm-6 col-6" style="padding-left: 5px;">
												<label>
													<input type="radio" name="donation[gender]" value="female">
													<span>Mevrouw</span>
												</label>
											</div>
										</div>
									</div>

									<div class="form-group text-name">
										<div class="row">
											<div class="col-md-12">
												<label>Naam</label>
											</div>
											<div class="col-md-5 col-sm-5 col-5">
												<input type="text" name="donation[firstname]" placeholder="Voornaam" class="form-control">
											</div>
											<div class="col-md-2 col-sm-2 col-2">
												<input type="text" name="donation[middlename]" placeholder="Tussenv." class="form-control">
											</div>
											<div class="col-md-5 col-sm-5 col-5">
												<input type="text" name="donation[lastname]" placeholder="Achternaam" class="form-control">
											</div>
										</div>
									</div>

									<div class="form-group">
										<label>E-mailadres</label>
										<input type="text" name="donation[email]" placeholder="email" class="form-email form-control"
										       id="email" >
									</div>

									<button type="button" class="btn btn-next">Volgende stap</button>
									<p class="go-back"> &#8592;	Ik wil een ander bedrag doneren</p>
									<!--<button type="button" class="btn btn-previous">Previous</button>-->
								</div>
							</fieldset>

							<fieldset step="3">
								<div class="form-top">
									<div class="form-top-left">
										<span class="step-count">3/4</span>
										<h3>Help nu en doneer</h3>
									</div>
								</div>
								<div class="form-bottom">

									<div class="row">
										<div class="col-md-12">
											<label>Geboortedatum</label>
										</div>
									</div>

                                    <div class="form-group bday colpadding row">
                                        <div class="col-md-3 col-sm-3 col-3">
                                            <select id="bday" class="form-control" name="donation[bday]" id="day">
                                                <option value="" selected disabled>Dag</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6 col-sm-6 col-6">
                                            <select id="bmonth" class="form-control" name="donation[bmonth]" id="Maand">
                                                <option value="" selected disabled>Maand</option>
                                            </select>
                                        </div>

                                        <div class="col-md-3 col-sm-3 col-3">
                                            <select id="byear" class="form-control" name="donation[byear]" id="Jaar">
                                                <option value="" selected disabled>Jaar</option>
                                            </select>
                                        </div>
                                    </div>


									<div class="form-group text-name">
										<div class="row">
											<div class="col-md-12">
												<label>Adres</label>
											</div>
											<div class="col-md-5 col-sm-5 col-5">
												<input type="text" name="donation[postcode]" placeholder="Postcode" class="form-control"
												>
											</div>
											<div class="col-md-2 col-sm-2 col-2">
												<input type="text" name="donation[houseno]" placeholder="Nr." class="form-control"
												>
											</div>
											<div class="col-md-5 col-sm-5 col-5">
												<input type="text" name="donation[address]" placeholder="Toevoeging" class="form-control"
												>
											</div>
										</div>
									</div>

									<div class="form-group">
										<label>Telefoonnummer <span style="color: #808080">Optioneel</span></label>
										<input type="text" name="donation[telephone]"  class="form-email form-control" >
									</div>

                                    <div class="form-group" style="    margin-left: 20px;">
                                        <div class="checkbox">
                                            <label><input type="checkbox" name="donation[termscondition]" id="terms-conditions">Ja, ik wil de 168Million nieuwsbrief ontvangen</label>
                                        </div>
                                    </div>

									<button type="button" class="btn btn-next">Volgende stap</button>
									<p class="go-back"> &#8592;	Vorige stap</p>
									<!--<button type="button" class="btn btn-previous">Previous</button>-->
								</div>
							</fieldset>

							<fieldset step="4">
								<div class="form-top">
									<div class="form-top-left">
										<span class="step-count">4/4</span>
										<h3>Help nu en doneer</h3>
									</div>
								</div>
								<div class="form-bottom">

									<div class="form-group gender">
										<div class="row--">

											<div id="recurringPayment" class="row">
												<div class="col-md-6 col-sm-6 col-6 authorization">
													<label>
														<input type="radio" name="donation[gateway]" value="1">
														<span>Machtiging</span>
													</label>
												</div>
											</div>

											<div id="directPayment" class="row">
												<div class="col-md-6 col-sm-6 col-6 credit-card">
													<label>
														<input type="radio" name="donation[gateway]" value="2">
														<span>Credit Card</span>
													</label>
												</div>

												<div class="col-md-6 col-sm-6 col-6 ideal">
													<label>
														<input type="radio" name="donation[gateway]" value="3">
														<span>iDeal</span>
													</label>
												</div>
											</div>

										</div>
									</div>

									<div class="form-group authorization-accno" style="display: none;">
										<label>Rekeningnummer</label>
										<input type="text" name="donation[accountnumber]" placeholder="(IBAN) rekeningnummer" class="form-email form-control"
										       id="accountnumber" >
									</div>


									<p class="privacystatement">
										Met het doen van deze donatie geef ik Stichting 168 Million toestemming om zorgvuldig, veilig en vertrouwelijk met mijn persoonsgegevens om te gaan, zoals vermeld staat in <a href="/privacy-en-voorwaarden/">dit privacystatement.</a>
									</p>

									<button type="submit" form="donationform"  value="Submit" class="btn">DONEER</button>
									<p class="go-back"> &#8592;	Vorige stap</p>
									<!--<button type="button" class="btn btn-previous">Previous</button>-->
								</div>
							</fieldset>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
	<?php
}

add_shortcode('donation_success','donation_success');
function donation_success(){

    ob_start();

//	$status = getDatabaseData($_GET["order_id"]);
//
//	/*
//	 * Determine the url parts to these example files.
//	 */
//	$protocol = isset($_SERVER['HTTPS']) && strcasecmp('off', $_SERVER['HTTPS']) !== 0 ? "https" : "http";
//	$hostname = $_SERVER['HTTP_HOST'];
//	$path = dirname(isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : $_SERVER['PHP_SELF']);
//
//	echo "<p style='margin-bottom: 20px;'>Your payment status is '" . htmlspecialchars($status) . "'.</p>";
//

    if(!empty($_GET["order_id"] )) :
        $order = wc_get_order( $_GET["order_id"] );
    ?>
        <p style='margin-bottom: 2px;'>Uw donatie ID: "<?php echo $_GET["order_id"]; ?>"</p>
        <p style='margin-bottom: 2px;'>Uw donatie is <?php echo $order->get_status()=='processing' ?'geslaagd!':'in behandeling'; ?></p>
        <style>
            .et_pb_slide_0 .et_pb_container{bottom:auto;}
            body .et_pb_slider_0, body .et_pb_slider_0 .et_pb_slide{height: auto;}
        </style>
        <?php if ($order->get_status() !='processing'): ?>
            <script>
                window.setTimeout(function () {
                    location.reload();
                },30000);
            </script>
        <?php endif; ?>
    <?php else: ?>
         <p>No Info</p>
    <?php endif; ?>
    <?php

    return ob_get_clean();
}

function getDatabaseData($orderId){


	$conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$stmt = $conn->prepare("SELECT order_status from ".TABLE_NAME." where order_id = ?");
	$stmt->bind_param('s',$orderId);
	$stmt->execute();

	$stmt->bind_result($status);

	$stmt->fetch();

	$stmt->close();

	return $status ? $status : "unknown order";

}

add_shortcode('subscription_return','subscription_return');
function subscription_return(){


	$subscription_id = $_GET['subscription_id'];
	$status          = $_GET['status'];

	echo
            '<h4>
    Heel erg bedanktvoor je machtigingomperiodiekesteun! 
    <br/>
    Jouwincasso ID is: <strong>' . $subscription_id . '</strong> 
    <br/>
    Een van onzecollega\'szalbinnen 24 uurcontact met je opnemen.
    </h4>';


}