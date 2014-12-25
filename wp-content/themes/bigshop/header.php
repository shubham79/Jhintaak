<?php
/**
 * $Desc
 *
 * @version    $Id$
 * @package    wpbase
 * @author     Opal  Team <opalwordpressl@gmail.com >
 * @copyright  Copyright (C) 2014 wpopal.com. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * @website  http:/wpopal.com
 * @support  http://wpopal.com
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

<body <?php body_class('header-v1'); ?>>
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
		<!-- Top bar -->
		<section class="topbar">
			<div class="container">
				<div class="pull-left user-login">
					<?php
						$link_login = '';
						if(class_exists('WooCommerce')){
							$link_login = get_permalink( get_option('woocommerce_myaccount_page_id') );
						}else{
							$link_login = home_url( 'wp-login.php' );
						}
					?>
					<span class="hidden-xs"><?php echo __('Welcome visitor you can',TEXTDOMAIN); ?></span>
					<a href="<?php echo $link_login ?>" title="<?php _e('login or register', TEXTDOMAIN); ?>">
						<?php _e(' login or register ', TEXTDOMAIN); ?>
					</a>
				</div>
				<div class="pull-right user-setting active-mobile">
					<div class="icon-mobile hidden-lg hidden-md">
						<i class="fa fa-cog"></i>
					</div>
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

				<div class="pull-right active-mobile hidden-xs hidden-lg hidden-md">
					<div class="icon-mobile">
						<i class="fa fa-search"></i>
					</div>
					<div class="active-content">
						<?php get_search_form(); ?>
					</div>
				</div>

				<?php if(class_exists('WooCommerce')){ ?>
				<div class="pull-right active-mobile  hidden-lg hidden-md">
					<div class="icon-mobile">
						<i class="fa fa-shopping-cart"></i>
					</div>
					<div class="active-content cart-large">
						<div class="widget_shopping_cart_content"></div>
					</div>
				</div>
				<?php } ?>

			</div>
		</section>
		<!-- // Topbar -->
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
						<?php
                            $args = array(  'theme_location' => 'mainmenu',
                                            'container_class' => 'collapse navbar-collapse navbar-ex1-collapse',
                                            'menu_class' => 'nav navbar-nav megamenu',
                                            'fallback_cb' => '',
                                            'menu_id' => 'main-menu',
                                            'walker' => new Wpo_Megamenu());
                            wp_nav_menu($args);
                        ?>
					</nav>
					<!-- //MENU -->
					<!-- //LOGO -->
					<div class="pull-right search-from hidden-xs hidden-sm hidden-md">
						<?php get_search_form(); ?>
					</div>
					<!-- Setting -->
					<?php bigshop_cartpopup(); ?>
					<!-- // Setting -->
				</div>
			</div>
		</header>
		<!-- //HEADER -->