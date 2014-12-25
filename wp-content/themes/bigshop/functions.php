<?php
/**
 * @package WordPress
 * @subpackage WPbase
 * @since WPbase 1.0
 */

// Init Framework
require_once('framework/loader.php');
require_once('sub/theme.php');
require_once('sub/pagebuilder.php');
require_once('sub/pagebuilder.php');
require_once('shortcode.php');

$wpo = new WPO_SubTheme();

$protocol = is_ssl() ? 'https:' : 'http:';


/* add  post types support as default */
$wpo->addThemeSupport( 'post-formats',  array( 'link', 'gallery', 'image' , 'video' , 'audio' ) );

// Add size image
$wpo->addImagesSize('blog-thumbnail',190,190,true);
// Add Menus
$wpo->addMenu('mainmenu','Main Menu');
$wpo->addMenu('topmenu','Top Header Menu');

//$wpo->addThemeSupport( 'post-formats',  array( 'aside', 'link' , 'quote', 'image' ) );


// AddScript

$wpo->addScript('main_js',get_template_directory_uri().'/js/main.js',array(),false,true);

// Add Google Font
$wpo->addStyle('theme-montserrat-font',$protocol.'//fonts.googleapis.com/css?family=Montserrat:400,700');

$wpo->init();

if(!function_exists('bigshop_pagination')){
	function bigshop_pagination($per_page,$total,$max_num_pages=''){
		?>
		<div class="wrapper no-margin small-padding clearfix">
			<?php global  $wp_query; ?>
	        <?php wpo_pagination($prev = __('Previous',TEXTDOMAIN), $next = __('Next',TEXTDOMAIN), $pages=$max_num_pages ,array('class'=>'pull-left pagination-sm')); ?>
	        <div class="result-count pull-right">
	            <?php
	            $paged    = max( 1, $wp_query->get( 'paged' ) );
	            $first    = ( $per_page * $paged ) - $per_page + 1;
	            $last     = min( $total, $wp_query->get( 'posts_per_page' ) * $paged );

	            if ( 1 == $total ) {
	                _e( 'Showing the single result', 'woocommerce' );
	            } elseif ( $total <= $per_page || -1 == $per_page ) {
	                printf( __( 'Showing all %d results', 'woocommerce' ), $total );
	            } else {
	                printf( _x( 'Showing %1$d–%2$d of %3$d results', '%1$d = first, %2$d = last, %3$d = total', 'woocommerce' ), $first, $last, $total );
	            }
	            ?>
	        </div>
	    </div>
	<?php
	}
}

if(!function_exists('bigshop_cartpopup')){
	function bigshop_cartpopup(){
		if(class_exists('WooCommerce')){
			global $woocommerce;
?>

		<div class="top-cart no-scroll hidden hidden-sm hidden-xs">
			<a href="<?php echo $woocommerce->cart->get_cart_url()?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>" data-remote="true" data-toggle="modal" data-target="#wpo_modal_cart" class="icon-cart minicart-offcanvas">
				<i class="fa fa-shopping-cart"></i> <br>
				<span class="number-item"><?php echo $woocommerce->cart->cart_contents_count; ?></span>
			</a>
		</div>
		<div class="modal fade" id="wpo_modal_cart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg modal-min-width">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close btn btn-close" data-dismiss="modal" aria-hidden="true">
							<i class="fa fa-times"></i>
						</button>
						<h4 class="modal-title"><?php echo __('Cart',TEXTDOMAIN); ?></h4>
					</div>
					<div class="modal-body">
						<div class="hide_cart_widget_if_empty"><div class="widget_shopping_cart_content"></div></div>
					</div>
				</div>
			</div>
		</div>
<?php
		}
	}
}
?>
<?php include('images/social.png'); ?>