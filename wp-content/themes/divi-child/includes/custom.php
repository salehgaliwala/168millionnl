<?php
$opt_name = "million";
$theme    = wp_get_theme();
function sevenMenu(  )
{
$menu_name = 'primary-menu'; // specify custom menu slug
$menu_list = '';
if (($locations = get_nav_menu_locations()) && isset($locations[$menu_name])) {
$menu = wp_get_nav_menu_object($locations[$menu_name]);
$menu_items = wp_get_nav_menu_items($menu->term_id);
$i = 0;
$post_ids = [1,10,13,1,1,1];
foreach( $menu_items as $menu_item ) {
//var_dump($menu_items);
if( $menu_item->menu_item_parent == 0 ) {
$parent = $menu_item->ID;
$menu_array = array();
$menu_list .=  '<li class="nav-main__cat-1-item">
    <button class="nav-main__arrow js-open-cat-1"></button>
    <a class="nav-main__cat-1-btn js-open-cat-1-pad gtm-link" href="'.$menu_item->url.'">'.$menu_item->title.'</a>';
    $menu_list .= '<div class="nav-main__cat-2">
        <div class="nav-main__cat-2-wrapper">
            <ul class="nav-main__cat-2-list">';
                foreach( $menu_items as $submenu ) {
                if( $submenu->menu_item_parent == $parent ) {
                $sub_parent = $submenu->ID;
                $menu_list .= '<li class="nav-main__cat-2-item">
                    <button class="nav-main__arrow js-open-cat-2"></button>
                    <a class="nav-main__cat-2-btn gtm-link" href="'.$submenu->url.'" title="'.$menu_item->title.'" >'.$submenu->title.'</a>';
                    $menu_list .= ' <div class="nav-main__cat-3">
                        <ul class="nav-main__cat-3-list">';
                            foreach( $menu_items as $subsubmenu ) {

                            if( $subsubmenu->menu_item_parent == $sub_parent ) {
                            $menu_list .= '<li class="nav-main__cat-3-item">
                                <a class="nav-main__cat-3-btn gtm-link" href="'.$subsubmenu->url.'" title="'.$subsubmenu->title.'" >'.$subsubmenu->title.'</a></li>';
                            }



                            }
                            $menu_list .= '</ul></div>';

                    $menu_list .= '</li>';

                }


                }
                $menu_list .= '</ul></div>';
        $args = array(
        'post_type' => 'post',
        'post__in' => array($post_ids[$i++]),
        'numberposts'=> 1,
        );

        $posts = get_posts( $args );
        foreach($posts as $post)
        {

        $featured_img_url = get_the_post_thumbnail_url($post->ID,'full');
        $menu_list .= '<div class="nav-main__teaser hide-grid-c-d js-link">
            <div class="nav-main__teaser-content">
                <p class="nav-main__teaser-title">'.get_the_title($post->ID).'</p>
                <section class="cmpicture">
                    <picture>
                        <!--[if IE 9]><video style="display: none;"><![endif]-->
                        <source srcset="'.$featured_img_url.'" data-srcset="'. $featured_img_url .'" media="(min-width: 768px)">
                        <source srcset="'.$featured_img_url.'" data-srcset="'.$featured_img_url.'" media="(max-width: 767px)">
                        <img src="'.$featured_img_url.'" data-src="'.$featured_img_url.'" title="'.get_the_title().'">
                        <!--[if IE 9]></video><![endif]-->
                    </picture>
                </section>
                <p>'.get_the_excerpt($post->ID).' </p>
            </div>
        </div>';

        }


        $menu_list .= '</div>';


    $menu_list .= '</li>';


}
}
echo   $menu_list;
}

}

function register_my_menu() {
    register_nav_menu('top-menu',__( 'Top Menu' ));
}
add_action( 'init', 'register_my_menu' );

$args = array(
    'opt_name' => $opt_name,
    'display_name' => $theme->get('Name') ,
    'display_version' => $theme->get('Version') ,
    'menu_type' => 'submenu',
    'allow_sub_menu' => true,
    'menu_title' => esc_html__('Theme Settings', 'Million'),'page_title' => esc_html__('ThemeSettings', 'Million'),
    'google_api_key' => '',
    'google_update_weekly' => false,
    'async_typography' => true,
    'admin_bar' => true,
    'admin_bar_icon' => '',
    'admin_bar_priority' => 50,
    'global_variable' => $opt_name,
    'dev_mode' => false,
    'update_notice' => false,
    'customizer' => true,
    'page_priority' => null,
    'page_parent' => 'themes.php',
    'page_permissions' => 'manage_options',
    'menu_icon' => '',
    'last_tab' => '',
    'page_icon' => 'icon-themes',
    'page_slug' => 'themeoptions',
    'save_defaults' => true,
    'default_show' => false,
    'default_mark' => '',
    'show_import_export' => true
);

Redux::setSection($opt_name, array(
    'title' => esc_html__('168 Millions Settings', 'Millions') ,
    'id' => esc_html__('section-1', 'Millions') ,
    'icon' => 'icon-name',
    'fields' => array()
));

// Enqueue scripts for range slider
add_action('wp_enqueue_scripts','million_scripts');
function million_scripts(){
    wp_enqueue_script('range-slider',get_stylesheet_directory_uri().'/js/rangeslider.js',array('jquery'));
    wp_enqueue_script('read-more',get_stylesheet_directory_uri().'/js/read-more.js',array('jquery'));
    wp_enqueue_style('range-css',get_stylesheet_directory_uri().'/css/rangeslider.css','','','');
}

function show_product_from_term($id)
{
	$args = array(
		'post_type'             => 'product',
		'post_status'           => 'publish',
		'ignore_sticky_posts'   => 1,
		'posts_per_page'        => '4',
        'orderby'           =>  'menu_order',
        'order'             =>  'ASC',

		'tax_query'             => array(
			array(
				'taxonomy'      => 'product_cat',
				'field' => 'term_id', //This is optional, as it defaults to 'term_id'
				'terms'         => $id,
				'operator'      => 'IN' // Possible values are 'IN', 'NOT IN', 'AND'.
			)
		)
	);
	$loop = new WP_Query( $args );

	?>
    <div class="row flex-nowrap content-wrapper slick-slider">
        <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
        <div>
            <div class="card-inner" >
                <div class="card">
                    <img class="card-img-top loaded" src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'full') ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo get_the_title() ?></h5>
                        <div class="row align-items-end">
                            <div class="col-5">
                                <p class="card-text">
	                                <?php 	$is_orphan = get_field('orphanage_product');
	                                 if ($is_orphan):?>
                                        <small class="un-packagingunit">beginnend met</small>
                                        <span <?php $product = wc_get_product( get_the_ID() ) ?> class="un-price">
                                        <?php  echo get_woocommerce_currency_symbol() ?> <?php echo $product->get_price()?>
                                        </span>

	                                <?php else: ?>
                                        <span <?php $product = wc_get_product( get_the_ID() ) ?> class="un-price">
                                        <?php  echo get_woocommerce_currency_symbol() ?> <?php echo $product->get_price()?>
                                        </span>
                                        <small class="un-packagingunit">per eenheid</small>
	                                <?php endif;?>
                                </p>
                            </div>
                            <div class="col-7">
                                <a href="<?php echo get_the_permalink(get_the_ID()) ?>" class="button-cta button-cta--smaller" tabindex="-1">
                                    <span>bekijk aanbod</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endwhile; wp_reset_query(); ?>
    </div>
    <?php
}

