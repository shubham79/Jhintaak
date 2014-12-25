<?php
/* $Desc
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
<div id="wpo-portfolio">
    <p class="wpo_section ">
        <?php $mb->the_field('count'); ?>
        <label for="pf_number">Pages show at most:</label>
        <input type="text" name="<?php $mb->the_name(); ?>" id="pf_number" value="<?php $mb->the_value(); ?>" />
    </p>
    <p class="wpo_section ">
        <?php $mb->the_field('header_skin'); ?>
        <label for="pf_number">Header Skin:</label>
        <select  name="<?php $mb->the_name(); ?>">
	    	<option value="1" <?php $mb->the_select_state('1'); ?>><?php echo __('Use Global',TEXTDOMAIN); ?></option>
	    	<option value="2" <?php $mb->the_select_state('2'); ?>><?php echo __('Skin 1',TEXTDOMAIN); ?></option>
	    	<option value="3" <?php $mb->the_select_state('3'); ?>><?php echo __('Skin 2',TEXTDOMAIN); ?></option>
	    </select>
    </p>

    <p class="wpo_section ">
        <?php $mb->the_field('footer_skin'); ?>
        <label for="pf_number">Footer Skin:</label>
        <select  name="<?php $mb->the_name(); ?>">
            <option value="1" <?php $mb->the_select_state('1'); ?>><?php echo __('Use Global',TEXTDOMAIN); ?></option>
            <option value="2" <?php $mb->the_select_state('2'); ?>><?php echo __('Skin 1',TEXTDOMAIN); ?></option>
            <option value="3" <?php $mb->the_select_state('3'); ?>><?php echo __('Skin 2',TEXTDOMAIN); ?></option>
        </select>
    </p>

</div>