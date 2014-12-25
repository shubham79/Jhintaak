<?php
add_action( 'after_setup_theme', 'ecogray_setup' );
function ecogray_setup() {
	global $content_width;
	if ( ! isset( $content_width ) )
	$content_width = 960;
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size(166, 124, TRUE);
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'custom-background' );						// background
	add_editor_style( 'editor-style.css' );
	add_theme_support( 'woocommerce' );
}
add_action( 'init', 'ecogray_my_menu' );
function ecogray_my_menu() {
	register_nav_menu( 'primary-menu', __( 'Primary Menu' ) );
}
function ecogray_widgets() {
		register_sidebar(
		array(
			'id' => 'footer',
			'name' => __( 'footer' ),
		)
	);
}
add_action( 'widgets_init', 'ecogray_widgets' );
add_filter('loop_shop_per_page', create_function('$cols', 'return 24;'));
add_filter('loop_shop_columns', 'ecogray_loop_columns');
if (!function_exists('ecogray_loop_columns')) {
	function ecogray_loop_columns() {
		return 3;
	}
}
add_filter( 'loop_shop_columns', 'ecogray_wc_loop_shop_columns', 1, 10 );
function ecogray_wc_loop_shop_columns( $number_columns ) {
	return 3;
}
function ecogray_frontend() {
 	wp_enqueue_style( 'ecogray-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'ecogray_frontend' );
function ecogray_wp_title( $title, $sep ) {
	global $paged, $page;
	if ( is_feed() )
		return $title;
	$title .= get_bloginfo( 'name' );
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";
	if ( $paged >= 3 || $page >= 3 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'ecogray' ), max( $paged, $page ) );
	return $title;
}
add_filter( 'wp_title', 'ecogray_wp_title', 10, 3 );
wp_link_pages(
	array(
		'before'           => '<p>' . __('Pages:', 'ecogray'),
		'after'            => '</p>',
		'link_before'      => '',
		'link_after'       => '',
		'next_or_number'   => 'number',
		'nextpagelink'     => __('Next page', 'ecogray'),
		'previouspagelink' => __('Previous page', 'ecogray'),
		'pagelink'         => '%',
		'echo'             => 1
	)
);
add_filter( 'wp_tag_cloud', 'ecogray_tag_cloud' );
if ( ! function_exists( 'ecogray_is_woocommerce_activated' ) ) {
	function ecogray_is_woocommerce_activated() {
		if ( class_exists( 'woocommerce' ) ) { return true; } else { return false; }
	}
}
function ecogray_scripts() {
	if ( is_singular() ) wp_enqueue_script( "comment-reply" );
}
add_action( 'wp_enqueue_scripts', 'ecogray_scripts' );
function ecogray_tag_cloud( $tags ){
    return preg_replace(
        "~ style='font-size: (\d+)pt;'~",
        ' class="tag-cloud-size-\10"',
        $tags
    );
}
function ecogray_fragment( $fragments ) 
{
    global $woocommerce;
    ob_start(); ?>
    <a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'ecogray'); ?>"><?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'ecogray'), $woocommerce->cart->cart_contents_count);?> <?php echo $woocommerce->cart->get_cart_total(); ?></a>
    <?php
    $fragments['a.cart-contents'] = ob_get_clean();
    return $fragments;
}
add_filter('add_to_cart_fragments', 'ecogray_fragment');
function ecogray_menu() {
	add_theme_page('Eco Gray Setup', 'Premium Upgrade', 'edit_theme_options', 'ecogray', 'ecogray_menu_page');
}
add_action('admin_menu', 'ecogray_menu');
function ecogray_menu_page() {
echo '
<br>
	<center><h1>Eco Gray fee  vs  Eco Gray PRO</h1></ceter><br><br>
<center><img src="' . get_template_directory_uri() . '/images/pro-vs-free.png"></center>
<br><br><br>
<h1><center>Site <a href="http://justpx.com/product/eco-gray-pro">Eco Gray PRO</a> - theme, demo, documentation.</center></h1><br><br>
<center><h1><font color="#dd3f56">10%</font> Discount - Code: <font color="#dd3f56">justpx10</font></h1></ceter>
';
}
?>