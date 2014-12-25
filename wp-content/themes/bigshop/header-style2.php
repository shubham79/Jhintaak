<?php
/**
 * $Desc
 *
 * @version    $Id$
 * @package    wpbase
 * @author     WPOpal  Team <wpopal@gmail.com, support@wpopal.com>
 * @copyright  Copyright (C) 2014 wpopal.com. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * @website  http://www.wpopal.com
 * @support  http://www.wpopal.com/support/forum.html
 */
?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<!--[if lt IE 9]>
        <script src="<?php echo FRAMEWORK_STYLE_URI; ?>js/html5.js"></script>
        <script src="<?php echo FRAMEWORK_STYLE_URI; ?>js/respond.js"></script>
    <![endif]-->
    <?php wp_head(); ?>
</head>

<body <?php body_class('header-v2'); ?>>

	<!-- OFF-CANVAS MENU SIDEBAR -->
    <div id="wpo-off-canvas" class="wpo-off-canvas">
        <div class="wpo-off-canvas-body">
            <div class="wpo-off-canvas-header">
            	<?php get_search_form(); ?>
                <button type="button" class="close btn btn-close" data-dismiss="modal" aria-hidden="true">
                	<i class="fa fa-times"></i>
                </button>
            </div>
            <nav  class="navbar navbar-offcanvas navbar-static" role="navigation">
                <?php
                $args = array(  'theme_location' => 'wpo_megamenu',
                                'container_class' => 'navbar-collapse',
                                'menu_class' => 'wpo-menu-top nav navbar-nav',
                                'fallback_cb' => '',
                                'menu_id' => 'main-menu-offcanvas',
                                'walker' => new Wpo_Megamenu_Offcanvas()
                            );
                wp_nav_menu($args);
                ?>
            </nav>
        </div>
    </div>
    <!-- //OFF-CANVAS MENU SIDEBAR -->
	<?php global $woocommerce; ?>
    <!-- START Wrapper -->
	<div class="wpo-wrapper">
		<!-- HEADER -->
		<header id="wpo-header" class="wpo-header">
			<div class="container">
				<div class="header-wrap clearfix">
					<!-- LOGO -->
					<div class="logo-in-theme pull-left text-center">
						<div class="logo">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
								<img src="<?php echo of_get_option('logo'); ?>" alt="<?php bloginfo( 'name' ); ?>">
							</a>
						</div>
					</div>
					<!-- MENU -->
					<nav id="wpo-mainnav" data-duration="<?php echo of_get_option('megamenu-duration',400); ?>" class="wpo-megamenu <?php echo of_get_option('magemenu-animation','slide'); ?> animate navbar navbar-default" role="navigation">
						<div class="navbar-header">
							<?php wpo_renderButtonToggle(); ?>
						</div><!-- //END #navbar-header -->
						<?php wpo_renderMegamenu(); ?>
					</nav>
					<!-- //MENU -->
					<!-- Setting -->
					<?php //bigshop_cartpopup(); ?>
					<!-- // Setting -->
				</div>
				<div class="header-bottom">
					<div class="header-left widget-vertical-menu widget box col-sm-3 hidden-xs hidden-sm">
						<?php dynamic_sidebar( 'menu-vertical' ); ?>
					</div>

					<div class="pull-left search header-center hidden-xs hidden-sm">
						<?php get_search_form(); ?>
					</div>

					<div class="pull-left header-right hidden-sm">
						<div class="config">
							<a href="#">
								<i class="fa fa-cog"></i>
							</a>
							<div class="active-content">
								<?php
									$args = array( 'theme_location' => 'topmenu',
			                                'fallback_cb' => '',
			                                'menu_id' => 'top-header-menu',
			                                'container_class' =>'menu-top-menu-header-container'
			                            );
			               			wp_nav_menu($args);
								?>
							</div>
						</div>
						<div class="cart">
							<a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>">
								<i class="fa fa-shopping-cart"></i>
								<span>(<?php echo sprintf(_n('%d item', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?>)</span>
								<?php //echo $woocommerce->cart->get_cart_total(); ?>
							</a>
							<div class="cart-content">
								<div class="hide_cart_widget_if_empty"><div class="widget_shopping_cart_content"></div></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>

		<!-- //HEADER -->