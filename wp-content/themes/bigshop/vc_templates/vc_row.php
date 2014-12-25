<?php
$output = $el_class = $bg_image = $bg_color = $bg_image_repeat = $font_color = $padding = $margin_bottom = '';
extract(shortcode_atts(array(
    'el_class'        => '',
    'bg_image'        => '',
    'bg_color'        => '',
    'bg_image_repeat' => '',
    'font_color'      => '',
    'padding'         => '',
    'margin_bottom'   => ''
), $atts));

wp_enqueue_style( 'js_composer_front' );
wp_enqueue_script( 'wpb_composer_front_js' );
wp_enqueue_style('js_composer_custom_css');


$el_class = $this->getExtraClass($el_class);

$css_class =  apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'wpb_row '.get_row_css_class(), $this->settings['base']);

$style = $this->buildStyle($bg_image, $bg_color, $bg_image_repeat, $font_color, $padding, $margin_bottom);

$output='<section class="box'.$el_class.'" '.$style.'>';
    $output .= '<div class="'.$css_class.'">';
		$output .= wpb_js_remove_wpautop($content);
    $output .= '</div>'.$this->endBlockComment('row');
$output.='</section>';
echo $output;