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
		<footer id="wpo-footer" class="wpo-footer footer-style2">
			<section class="footer-top container">
				<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<div class="inner padding-20">
							<?php dynamic_sidebar('footer-4'); ?>
						</div>
					</div>
					<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
						<div class="inner">
							<?php dynamic_sidebar('footer-1'); ?>
						</div>
					</div>
					<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12 clear-l-sm">
						<div class="inner">
							<?php dynamic_sidebar('footer-2'); ?>
						</div>
					</div>
					<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
						<div class="inner">
							<?php dynamic_sidebar('footer-3'); ?>
						</div>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 clear-l-sm">
						<div class="inner">
							<?php dynamic_sidebar('footer-5'); ?>
						</div>
					</div>
				</div>
			</section>


			<section class="wpo-copyright">
				<div class="container">
					<div class="row">
						<div class="col-sm-12 copyright">
							<address class="pull-left">
								<?php echo of_get_option('copyright','Copyright 2013 Powered by <a href="http://wordpress.org/" target="_blank">Wordpress</a><br>All Rights Reserved.'); ?>
							</address>
							<aside class="paypal pull-right">
								<img src="<?php echo get_template_directory_uri(); ?>/images/paypal.png" alt="paypal" width="255" height="15" />
							</aside>
						</div>
					</div>
				</div>
			</section>

		</footer>
	</div>
	<!-- END Wrapper -->
	<?php wp_footer(); ?>
</body>
</html>