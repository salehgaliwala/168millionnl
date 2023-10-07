<?php

require_once __DIR__.'/donation.php';
require_once __DIR__.'/table.php';
require_once __DIR__.'/my-account.php';

add_action('wp_enqueue_scripts','theme_scripts');

function theme_scripts(){
	wp_enqueue_style('bootstrap-iso',get_stylesheet_directory_uri().'/css/bootstrap-4.3.1-iso.css','','','');
	wp_enqueue_style('fontawesome',get_stylesheet_directory_uri().'/css/font-awesome.css','','','');
	wp_enqueue_style('responsive',get_stylesheet_directory_uri().'/css/responsive.css',array('divi-style'),'','');
	wp_enqueue_style('slick',get_stylesheet_directory_uri().'/css/slick.css');

	wp_enqueue_script('slick',get_stylesheet_directory_uri().'/js/slick.min.js',array('jquery'));
	wp_enqueue_script('168-custom',get_stylesheet_directory_uri().'/js/custom.js',array('jquery','range-slider','slick'));
}

add_action( 'init', 'register_my_menus' );

function register_my_menus() {
	register_nav_menus(
		array(
			'footer-menu-1' => __( 'Footer Menu 1' ),
			'footer-menu-2' => __( 'Footer Menu 2' ),
			'footer-menu-3' => __( 'Footer Menu 3' ),
		)
	);
}

add_shortcode('front_page_1','front_page_1');

function front_page_1(){
    if (1) return '';
	ob_start();
	?>
    <div class="bootstrap-iso">
        <div class="new-container">
            <section class="donations-facts">
                <div class="container-fluid">
                    <div class="row">
                        <div class="[ col-12 ] overlap-lg">
                            <div class="row">
                                <div class="container btn-group-container">
                                    <div class="btn-group un-tabs" aria-label="Hilfsgüter" role="tablist">
                                        <button type="button" class="btn active">Weltweit</button>
                                        <button type="button" class="btn">Jederzeit</button>
                                        <button type="button" class="btn">Wirksam</button>
                                        <button type="button" class="btn">Gerecht</button>
                                        <button type="button" class="btn">Engagiert</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="[ col-12 ] overlap-lg ">
                            <div class="row un-tab-content">

                                <div class="tab tab-0 light active">
                                    <!--<picture>
										<source srcset="/wp-content/themes/divi-child/images/slider-donations-slide-0-lg.jpg" media="(min-width: 1024px)">
										<source srcset="img/donations-facts/slider-donations-slide-0-md.jpg" media="(min-width: 768px) and (max-width: 1023px)">
										<source srcset="img/donations-facts/slider-donations-slide-0-xs.jpg" media="(max-width: 767px)">
										<img class="img-fluid" src="img/donations-facts/slider-donations-slide-0-xs.jpg">
									</picture>-->
                                    <img class="img-fluid" src="/wp-content/themes/divi-child/images/img-5.jpg" alt="">
                                    <div class="abs-container">
                                        <div class="container">
                                            <div class="row">
                                                <div class="[ col-12 col-lg-12 ] left-xl-transform">
                                                    <h4 class="h4 bgr-headline violet"><span>168million: <br class="d-none d-md-block">Für jedes Kind</span></h4>
                                                    <div class="bgr-container">
                                                        <p>168million ist weltweit für Kinder da. Aber was bedeutet das konkret?</p>
                                                        <a href="" class="text-link">Mehr erfahren </a>
                                                    </div>
                                                    <span class="copy">© 168million/UN0229508/Naftalin</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container">
                                        <div class="row">
                                            <div class="[ col-12 col-lg-12 ] d-none d-lg-block donations-fact-list">
                                                <ul class="list-inline d-flex violet">
                                                    <li>
                                                        <h5 class="h5">300 <small>Einsätze</small></h5>
                                                        <p>in Nothilfe-Situationen leistet 168million pro Jahr</p>
                                                    </li>
                                                    <li>
                                                        <h5 class="h5">72 <small>Stunden</small></h5>
                                                        <p>dauert es maximal, bis unsere Helfer bei den Kindern sind</p>
                                                    </li>
                                                    <li>
                                                        <h5 class="h5">150 <small>Länder</small></h5>
                                                        <p>setzen wirksame Programme für Kinder um</p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab tab-1 light">

                                    <img class="img-fluid" src="/wp-content/themes/divi-child/images/img-6.jpg" alt="">
                                    <div class="abs-container">
                                        <div class="container">
                                            <div class="row">
                                                <div class="[ col-12 col-lg-12 ] left-xl-transform">
                                                    <h4 class="h4 bgr-headline blue"><span>24 Stunden am Tag,<br class="d-none d-md-block"> 365 Tage im Jahr</span></h4>
                                                    <div class="bgr-container">
                                                        <p>Unermüdlich, mutig und mit ganzem Herzen: Für Kinder werden unsere Helfer zu Helden.</p>
                                                        <a href="" class="text-link">Überzeugen Sie sich selbst! </a>
                                                    </div>
                                                    <span class="copy">© 168million/Al-Issa</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab tab-2 light">

                                    <img class="img-fluid" src="/wp-content/themes/divi-child/images/img-7.jpg" alt="">
                                    <div class="abs-container">
                                        <div class="container">
                                            <div class="row justify-content-lg-end">
                                                <div class="[ col-12 col-md-5 col-lg-4 ] right-xl-transform">
                                                    <h4 class="h4 bgr-headline green"><span>Hilfe,<br class="d-none d-md-block"> die ankommt</span></h4>
                                                    <div class="bgr-container">
                                                        <p>Von Impfstoff bis Schulbuch: Wir versorgen Kinder mit dem, was sie am dringendsten brauchen.</p>
                                                        <a href="" class="text-link">Mehr erfahren </a>
                                                    </div>
                                                    <span class="copy">© 168million/UNI179180/Haidar</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container">
                                        <div class="row">
                                            <div class="[ col-12 col-lg-12 ] d-none d-lg-block donations-fact-list">
                                                <ul class="list-inline d-flex green">
                                                    <li>
                                                        <h5 class="h5">2,5 <small>Mio</small></h5>
                                                        <p>mangelernährte Kinder hat 168million in 2018 mit Spezialnahrung behandelt</p>
                                                    </li>
                                                    <li>
                                                        <h5 class="h5">30 <small>Mio</small></h5>
                                                        <p>Menschen haben dank 168million Zugang zu sauberem Trinkwasser</p>
                                                    </li>
                                                    <li>
                                                        <h5 class="h5">47 <small>Mio</small></h5>
                                                        <p>Kinder wurden in drei Jahren mit Schulmaterial ausgestattet</p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab tab-3 light">

                                    <img class="img-fluid" src="/wp-content/themes/divi-child/images/img-8.jpg" alt="">
                                    <div class="abs-container">
                                        <div class="container">
                                            <div class="row justify-content-lg-end">
                                                <div class="[ col-12 col-md-5 col-lg-4 ] right-xl-transform">
                                                    <h4 class="h4 bgr-headline red"><span> Alle Kinder <br class="d-none d-md-block"> haben Rechte!</span></h4>
                                                    <div class="bgr-container">
                                                        <p>…und 168million setzt sich für die Verwirklichung dieser Rechte überall auf der Welt ein.</p>
                                                        <a href="" class="text-link">Mehr erfahren </a>
                                                    </div>
                                                    <span class="copy">© 168million/UN0146255/</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab light tab-4">

                                    <img class="img-fluid" src="/wp-content/themes/divi-child/images/img-9.jpg" alt="">
                                    <div class="abs-container">
                                        <div class="container">
                                            <div class="row justify-content-lg-end">
                                                <div class="[ col-12 col-md-6 col-lg-4 ] right-xl-transform">
                                                    <h4 class="h4 bgr-headline yellow"><span>Gemeinsam aktiv<br class="d-none d-md-block"> für Kinder</span></h4>
                                                    <div class="bgr-container">
                                                        <p>Mit Kreativität, Einsatz und Optimismus machen unsere Ehrenamtlichen die Welt zu einem besseren Ort.</p>
                                                        <a href="" class="text-link">So können Sie mitmachen</a>
                                                    </div>
                                                    <span class="copy">© 168million/DT2019-62857/Michael Lämmler/</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container">
                                        <div class="row">
                                            <div class="[ col-12 col-lg-12 ] d-none d-lg-block donations-fact-list">
                                                <ul class="list-inline d-flex yellow">
                                                    <li>
                                                        <h5 class="h5">8.000</h5>
                                                        <p>Ehrenamtliche sind in bundesweit 200 168million-Gruppen aktiv</p>
                                                    </li>
                                                    <li>
                                                        <h5 class="h5">450</h5>
                                                        <p>Jugendliche engagieren sich in 50 Junior-Teams</p>
                                                    </li>
                                                    <li>
                                                        <h5 class="h5">500</h5>
                                                        <p>Aktionen gab es 2018 zum Motto „Kindheit braucht Frieden“</p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
	<?php
	return ob_get_clean();
}

add_shortcode('front_page_2','front_page_2');
function front_page_2(){
	ob_start();
	?>
    <div class="bootstrap-iso">
        <section class="un-relief-goods">
            <svg class="un-bg" width="1440" height="640" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 0h1440v640c-240-53.33333-480-80-720-80S240 586.66667 0 640V0z" fill="#F5F3F1" fill-rule="evenodd"/>
            </svg>

            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="h1">Donatie shop</h2>
                        <p class="un-subline">Jouw donatie gaat naar personen, gebieden of gezinnen waar jouw donatie het hardst nodig is en daar waar de bijdrage het meest effectief is.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 overflow-x-scroll">
                        <div class="btn-group un-tabs" aria-label="Hilfsgüter" role="tablist">
							<?php
                                $taxonomy     = 'product_cat';
                              //  $orderby      = 'name';
                                $show_count   = 0;      // 1 for yes, 0 for no
                                $pad_counts   = 0;      // 1 for yes, 0 for no
                                $hierarchical = 1;      // 1 for yes, 0 for no
                                $title        = '';
                                $empty        = 0;

                                $args = array(
                                    'taxonomy'     => $taxonomy,                                 
                                    'show_count'   => $show_count,
                                    'pad_counts'   => $pad_counts,
                                    'hierarchical' => $hierarchical,
                                    'title_li'     => $title,
                                    'hide_empty'   => $empty,
                                    'exclude' => '25,29'
                                );
                                $i = 0;
                                $all_categories = get_categories( $args );
                                foreach ($all_categories as $cat) {
                                    echo '<button type="button" class="btn '.($i++ == 0 ? 'active': '').'" data-category="'.$cat->name.'">'.str_replace('&','&amp;<br class="d-block d-md-none">',$cat->name).'</button>';
                                    $cats[] = $cat->term_id;
                                }
							?>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="un-tab-content">
							<?php
							    $i=0;
                                foreach($cats as $cat) {
                                    if($i == 0)
                                        $active = 'active';
                                    else
                                        $active = '';
                                    echo '<div class="tab tab-'.$i.' '.$active.' visible">';

                                    show_product_from_term($cat);
                                    echo '</div>';
                                    $i++;
                                }
							?>
                        </div>
                    </div>
                </div>
                <div class="row margin-0-auto">
                    <div class="col-12 text-center">
                        <a href="/donatieshop/" class="btn btn-primary"><span><?php echo __('Bezoek de shop'); ?></span></a>
                    </div>
                </div>
            </div>
        </section>
    </div>
	<?php
	return ob_get_clean();
}

add_shortcode('donation_form_st','donation_form_st');

function donation_form_st(){
	ob_start();
    ?>

    <div class="bootstrap-iso">
        <div class="donation-form-div">
            <div class="row justify-content-center">
                <div class="col-12 col-md-7 col-lg-11 col-xl-8">
                    <h2 class="h2">Voer actie op essentiële gebieden: voeding, gezondheid, toegang tot zuiver water en onderwijs.</h2>

                    <ul class="tick-div">
                        <li>Met €3,00 geef je 8 kinderen een maaltijd, of 1 kind kan een week naar school.</li>
                        <li>Met €13,00 geef je meer dan 500 kinderen 25 jaar lang speelplezier.</li>
                        <li>Met €24,00 doneer je 220 polio- en tetanusvaccins.</li>
                    </ul>
                    <br>


                    <form action="<?php echo site_url(); ?>/" class="become-sponsor-form" method="GET">
                        <div class="row">
                            <div class="col">
                                <div class="btn-group pb-4" role="group">
                                    <button type="button" class="btn" data-amount="5">€5</button>
                                    <button type="button" class="btn active" data-amount="13">€13</button>
                                    <button type="button" class="btn" data-amount="25">€25</button>
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group">
                                    <input type="number" min="3" step="2" value="13" id="become-sponsor-donation-amount" class="form-control open-field" name="amount" placeholder="Vrij bedrag">
                                    <!--<label for="become-sponsor-donation-amount">Vrij bedrag</label>-->
                                    <div class="input-group-append">
                                        <div class="input-group-text">€</div>
                                    </div>
                                    <input type="hidden" name="add-to-cart" value="<?php echo simple_product_id; ?>"/>
                                    <input type="hidden" name="direct_checkout" value="1"/>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="button-cta">
                            <span>Doneer nu</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        jQuery(document).ready(function ($) {
            $('.become-sponsor-form .btn').click(function () {
                $('.become-sponsor-form .btn').removeClass('active');
                $(this).addClass('active');
                let amount = $(this).attr('data-amount');
                $('#become-sponsor-donation-amount').val(amount);
            });
        });
    </script>
    <?php

	return ob_get_clean();
}

add_shortcode('newsletter_section_168','newsletter_section_168');

function newsletter_section_168($atts){
    ob_start();
    ?>
    <div class="newsletter-section">
        <div class="bootstrap-iso">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 mb-5 mb-md-0 ">
                        <!--<div class="sub-text">
	                        <?php /*if(isset($atts['newsletter_heading'])): echo $atts['newsletter_heading']; else:*/?>
                                Nieuwsbrief 168million België
	                        <?php /*endif;*/?>
                        </div>-->
                        <div class="heading">
                            <?php if(isset($atts['newsletter_text'])): echo $atts['newsletter_text']; else:?>
                                <?php _e('Meld je aan voor de Nieuwsbrief en blijf op de hoogte.','168million'); ?>
                            <?php endif;?>
                        </div>
                    </div>
                    <div class="col-md-6 align-self-end">
                            <?php /*echo do_shortcode('[contact-form-7 id="4339"]'); */?>
                        <form method="get" action="/nieuwsbrief/">
                            <div class="d-block d-md-flex">
                                <div class="newsletter-input">
                                    <input oninvalid="if(validateEmail(this.value) || this.value === '') this.setCustomValidity('<?php _e('Vul een email in.','168million')?>'); else  this.setCustomValidity('<?php _e('Ongeldig e-mail.','168million')?>'); "
                                           oninput="this.setCustomValidity('')" type="email" name="email" class="" placeholder="Jouw e-mailadres"  required/>
                                </div>
                                <button class="button-cta">
                                    Schrijf me in
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    return ob_get_clean();
}