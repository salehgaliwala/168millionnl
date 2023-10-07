<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="google-site-verification" content="2Qsu52xmmniMkHZQQnDhaaDZJ_wJetqytf5CfHrYSDg" />
<?php
	elegant_description();
	elegant_keywords();
	elegant_canonical();

	/**
	 * Fires in the head, before {@see wp_head()} is called. This action can be used to
	 * insert elements into the beginning of the head before any styles or scripts.
	 *
	 * @since 1.0
	 */
	do_action( 'et_head_meta' );

	$template_directory_uri = get_template_directory_uri();
?>

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<script type="text/javascript">
		document.documentElement.className = 'js';
	</script>
       <script id="Cookiebot" src="https://consent.cookiebot.com/uc.js" data-cbid="eb8c1456-dae1-4940-8cb1-a5f0bfdeaa6e" data-blockingmode="auto" type="text/javascript"></script>
	<?php wp_head(); ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;600;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
<body <?php body_class(); ?>>

    <div class="body-overlay">
        <div class="overlay__inner">
            <div class="overlay__content"><span class="spinner"></span></div>
        </div>
    </div>

	<div class="nav-main">
    <div class="nav-main__wrapper">
    <div class="nav-main__inner">
        <button class="nav-main__burger button-nav-burger"></button>
        <?php
        $logo = ( $user_logo = et_get_option( 'divi_logo' ) ) && ! empty( $user_logo )
            ? $user_logo
            : $template_directory_uri . '/images/logo.png';

        ob_start();
        ?>

        <a class="nav-main__logo" itemprop="url" href="/">
                <meta itemprop="logo" content="<?php echo esc_attr( $logo ); ?>">
                <img src="<?php echo esc_attr( $logo ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
            </a>
        <div class="nav-main__search">
            <form class="search-site" id="SearchSite" action="/" name="search" method="get">
                <span class="search-site__placeholder">Zoeken</span>
                <span role="status" aria-live="polite" class="ui-helper-hidden-accessible"></span>
                <span role="status" aria-live="polite" class="ui-helper-hidden-accessible"></span><input type="text" name="s" class="search-site__input ui-autocomplete-input" autocomplete="off">
                <button type="submit" class="search-site__submit"></button>
                <span class="search-site__line"></span>
                <span class="search-site__reset"></span>
            </form>
        </div>

        <div class="nav-main__cta">
                <a class="button-cta grid-b-c-d-hide nav-main--sticky-hide" href="/?add-to-cart=<?php echo simple_product_id; ?>&direct_checkout=1">DONEER NU</a>
                <!--<a class="button-cta button-cta--smaller grid-a-hide nav-main--sticky-show" href="/helpnu/">DONEREN</a>-->
                <a class="button-cta button-cta--smaller grid-a-hide nav-main--sticky-show" href="/?add-to-cart=<?php echo simple_product_id; ?>&direct_checkout=1">DONEREN</a>
            </div>
        <div class="nav-main__closer"></div>
        <div class="nav-main__line"></div>
        <div class="nav-main__scroll">
            <div class="nav-main__cat-1">
                <ul class="nav-main__cat-1-list">
            <?php if ( has_nav_menu( 'primary-menu' ) ) : ?>
                    <?php
                   /* wp_nav_menu( array(
                        'theme_location' => 'primary-menu',
                        'menu_class'     => 'primary-menu',
                        'walker' => new IBenic_Walker()
                    ) );*/
                   sevenMenu();
                    ?>

            <?php endif; ?>
        </div>


            <div class="nav-main__meta">
                <?php

                    wp_nav_menu( array(
                        'menu'           => 'Top Menu', // Do not fall back to first non-empty menu.
                        'theme_location' => 'top-menu',
                        'items_wrap'  => '<ul id="%1$s" class="nav-main__meta-list">%3$s</ul>',
                        'fallback_cb'    => false // Do not fall back to wp_page_menu()
                    ) );
                ?>


            </div>
        </div>

    </div>
    </div>
    </div>


	<div id="page-container"<?php echo et_core_intentionally_unescaped( $page_container_style, 'fixed_string' ); ?>>	
	<div id="et-main-area">
	<?php
		/**
		 * Fires after the header, before the main content is output.
		 *
		 * @since 3.10
		 */
		do_action( 'et_before_main_content' );