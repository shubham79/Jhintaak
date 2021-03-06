<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />	
	<meta name="viewport" content="width=device-width" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>


	<div class="main">
		<div class="hdr1">

			<div class="head">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
				<div class="head2"><?php  bloginfo('description'); ?></div>
			</div>
			
				<div class="sidebar-head3 span2">
						<div class="main4">
					
							<ul><li>
								<?php wp_nav_menu( array( 'theme_location' => 'primary-menu' ) ); ?>
								 </li>
							</ul>
							 
						
						</div>
				</div>

				<div class="sidebar-head4 span2">

					<?php if (class_exists('woocommerce')) :?>
								
							<?php global $woocommerce; ?>
			 
							Cart: <a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'ecogray'); ?>"><?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'ecogray'), $woocommerce->cart->cart_contents_count);?> <?php echo $woocommerce->cart->get_cart_total(); ?></a>
					<?php endif; ?>	

				</div>

		</div>
	</div>


<div class="main-gray">
<div class="main">
	<div class="content-main">