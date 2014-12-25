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
<form role="search" method="get" class="searchform" action="<?php echo home_url( '/' ); ?>">
	<div class="wpo-search input-group">
		<input name="s" id="s" maxlength="40" class="form-control input-large input-search" type="text" size="20" placeholder="Search...">
		<span class="input-group-addon input-large btn-search">
			<input type="submit" id="searchsubmit" class="fa" value="&#xf002;" />
			<?php if(class_exists('WooCommerce')){ ?>
			<input type="hidden" name="post_type" value="product" />
			<?php } ?>
		</span>
	</div>
</form>


