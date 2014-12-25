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
if (class_exists('WPO_PageBuilder_Base')) {
	class WPO_PageBuilder extends WPO_PageBuilder_Base{

		public function __construct(){
			parent::__construct();

			// Add New Elements
			$this->elementProductCategory();
			$this->elementProduct();
			$this->elementBrands();


			//Edit Elements
			$this->elementTabItem();
			$this->elementButton();
			$this->elementImageCarousel();
			$this->elementProgressBar();
			$this->elementMap();
			$this->elementColumn();
			// $this->elementRow();
			$this->elementTitle();

			// Set Template Folder
			// vc_set_template_dir(FRAMEWORK_TEMPLATES.'pagebuilder/');
		}

		private function elementBrands(){
			vc_map( array(
			    "name" => __("WPO Brands",$this->textdomain),
			    "base" => "wpo_brands",
			    "class" => "",
			    "category" => $this->l('WPO Elements'),
			    "params" => array(
			    	array(
						"type" => "textfield",
						"heading" => __("Title", $this->textdomain),
						"param_name" => "title",
						"value" => ''
					),
					array(
						"type" => "textfield",
						"heading" => __("Number of brands to show", $this->textdomain),
						"param_name" => "number",
						"value" => '6'
					),
					array(
						"type" => "textfield",
						"heading" => __("Icon", $this->textdomain),
						"param_name" => "icon"
					),
					array(
						"type" => "textfield",
						"heading" => __("Extra class name", $this->textdomain),
						"param_name" => "el_class",
						"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", $this->textdomain)
					)
			   	)
			));
			add_shortcode( 'wpo_brands',array($this,'elementBrandsFrontend') );
		}

		public function elementBrandsFrontend($atts,$content=null){
			$output ='';
			if(is_file(FRAMEWORK_TEMPLATES_PAGEBUILDER.'wpo_brands.php')){
				ob_start();
				require(FRAMEWORK_TEMPLATES_PAGEBUILDER.'wpo_brands.php');
				$output .= ob_get_clean();
			}
			return $output;
		}

		private function elementProduct(){
			vc_map( array(
			    "name" => __("WPO Products",$this->textdomain),
			    "base" => "wpo_products",
			    "class" => "",
			    "category" => $this->l('WPO Elements'),
			    "params" => array(
			    	array(
						"type" => "dropdown",
						"heading" => __("Type", $this->textdomain),
						"param_name" => "type",
						"value" => array('Best Selling'=>'best_selling','Featured Products'=>'featured_product','Top Rate'=>'top_rate','Recent Products'=>'recent_product'),
						"admin_label" => true,
						"description" => __("Select columns count.", $this->textdomain)
					),
					array(
						"type" => "textfield",
						"heading" => __("Number of products to show", $this->textdomain),
						"param_name" => "number",
						"value" => '4'
					),
					array(
						"type" => "dropdown",
						"heading" => __("Columns count", $this->textdomain),
						"param_name" => "columns_count",
						"value" => array(6, 4, 3, 2, 1),
						"admin_label" => true,
						"description" => __("Select columns count.", $this->textdomain)
					),
					array(
						"type" => "textfield",
						"heading" => __("Icon", $this->textdomain),
						"param_name" => "icon"
					),
					array(
						"type" => "textfield",
						"heading" => __("Extra class name", $this->textdomain),
						"param_name" => "el_class",
						"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", $this->textdomain)
					)
			   	)
			));
			add_shortcode( 'wpo_products',array($this,'elementProductsFrontend') );
		}

		public function elementProductsFrontend($atts,$content){
			$output ='';
			if(is_file(FRAMEWORK_TEMPLATES_PAGEBUILDER.'wpo_products.php')){
				ob_start();
				require(FRAMEWORK_TEMPLATES_PAGEBUILDER.'wpo_products.php');
				$output .= ob_get_clean();
			}
			return $output;
		}

		private function elementProductCategory(){
			global $wpdb;
			$sql = "SELECT a.name,a.slug,a.term_id FROM $wpdb->terms a JOIN  $wpdb->term_taxonomy b ON (a.term_id= b.term_id ) where b.count>0 and b.taxonomy = 'product_cat'";
			$results = $wpdb->get_results($sql);
			$value = array();
			foreach ($results as $vl) {
				$value[$vl->name] = $vl->slug;
			}
			vc_map( array(
			    "name" => __("WPO Product Category",$this->textdomain),
			    "base" => "wpo_productcategory",
			    "class" => "",
			    "category" => $this->l('WPO Elements'),
			    "params" => array(
			    	array(
						"type" => "dropdown",
						"class" => "",
						"heading" => $this->l('Category'),
						"param_name" => "category",
						"value" =>$value,
						"admin_label" => true
					),
					array(
						"type" => "textfield",
						"heading" => __("Number of products to show", $this->textdomain),
						"param_name" => "number",
						"value" => '4'
					),
					array(
						"type" => "dropdown",
						"heading" => __("Columns count", $this->textdomain),
						"param_name" => "columns_count",
						"value" => array(6, 4, 3, 2, 1),
						"admin_label" => true,
						"description" => __("Select columns count.", $this->textdomain)
					),
					array(
						"type" => "textfield",
						"heading" => __("Icon", $this->textdomain),
						"param_name" => "icon"
					),
					array(
						"type" => "textfield",
						"heading" => __("Extra class name", $this->textdomain),
						"param_name" => "el_class",
						"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", $this->textdomain)
					)
			   	)
			));
			add_shortcode( 'wpo_productcategory',array($this,'elementProductCategoryFrontend') );
		}

		public function elementProductCategoryFrontend($atts , $content){
			$output ='';
			if(is_file(FRAMEWORK_TEMPLATES_PAGEBUILDER.'wpo_productcategory.php')){
				ob_start();
				require(FRAMEWORK_TEMPLATES_PAGEBUILDER.'wpo_productcategory.php');
				$output .= ob_get_clean();
			}
			return $output;
		}

		private function elementTitle(){
			vc_add_param( 'vc_text_separator', array(
		         "type" => "textarea",
		         "heading" => $this->l("Description"),
		         "param_name" => "descript",
		         "value" => ''
		    ));
		}

		private function elementRow(){
			vc_add_param( 'vc_row', array(
		         "type" => "checkbox",
		         "heading" => $this->l("Full Width"),
		         "param_name" => "fullwidth",
		         "value" => array(
		         				'Yes, please' => true
		         			)
		    ));

		    vc_add_param( 'vc_row', array(
		         "type" => "checkbox",
		         "heading" => $this->l("Parallax"),
		         "param_name" => "parallax",
		         "value" => array(
		         				'Yes, please' => true
		         			)
		    ));
		}

		private function elementColumn(){
			$add_css_animation = array(
				"type" => "dropdown",
				"heading" => __("CSS Animation", $this->textdomain),
				"param_name" => "css_animation",
				"admin_label" => true,
				"value" => $this->cssAnimation,
				"description" => __("Select animation type if you want this element to be animated when it enters into the browsers viewport. Note: Works only in modern browsers.", $this->textdomain)
			);
			vc_add_param('vc_column',$add_css_animation);
			vc_add_param('vc_column_inner',$add_css_animation);
		}

		/**
		 * Google Map
		 */
		private function elementMap(){
			$param = WPBMap::getParam('vc_gmaps', 'title');
			$param['type'] = 'googlemap';
			$param['heading']='Position';
			$param['description']='';
			WPBMap::mutateParam('vc_gmaps', $param);

			$param = WPBMap::getParam('vc_gmaps', 'link');
			$param['type']='hidden';
			$param['value']='21.0173222,105.78405279999993';
			WPBMap::mutateParam('vc_gmaps', $param);

			$param = WPBMap::getParam('vc_gmaps', 'size');
			$param['value']=300;
			$param['description']='Enter map height in pixels. Example: 300.';
			WPBMap::mutateParam('vc_gmaps', $param);

			$param = WPBMap::getParam('vc_gmaps', 'type');
			$param['value']=array(
								'roadmap'=>'ROADMAP',
								'hybrid'=>'HYBRID',
								'satellite'=>'SATELLITE',
								'terrain'=>'TERRAIN'
							);
			WPBMap::mutateParam('vc_gmaps', $param);

			$classparam = WPBMap::getParam('vc_gmaps', 'el_class');
			$this->deleteParam('vc_gmaps','el_class');

			vc_add_param( 'vc_gmaps', array(
		         "type" => "checkbox",
		         "heading" => $this->l("Remove Pan Control"),
		         "param_name" => "pancontrol",
		         "value" => array(
		         				 'Yes, please' => true
		         			)
		    ));

		    vc_add_param( 'vc_gmaps', array(
		         "type" => "checkbox",
		         "heading" => $this->l("Remove Zoom Control"),
		         "param_name" => "zoomcontrol",
		         "value" => array(
		         				 'Yes, please' => true
		         			)
		    ));

		    vc_add_param( 'vc_gmaps', array(
		         "type" => "checkbox",
		         "heading" => $this->l("Remove Maptype Control"),
		         "param_name" => "maptypecontrol",
		         "value" => array(
		         				'Yes, please' => true
		         			)
		    ));

		    vc_add_param( 'vc_gmaps', array(
		         "type" => "checkbox",
		         "heading" => $this->l("Remove Streets Control"),
		         "param_name" => "streetscontrol",
		         "value" => array(
		         				'Yes, please' => true
		         			)
		    ));

		    WPBMap::mutateParam('vc_gmaps', $classparam);
		}

		/**
		 * Tab Item
		 */
		private function elementTabItem(){
			vc_add_param( 'vc_tab', array(
		         "type" => "textfield",
		         "heading" => $this->l("Icon"),
		         "param_name" => "tabicon",
		         "value" => ''
		    ));
		}

		/**
		 * Button
		 */
		private function elementButton(){
			// color
			$param = WPBMap::getParam('vc_button', 'color');
			$param['value'] = array(
								'Default'=>'btn-default',
								'Primary'=>'btn-success',
								'Success'=>'btn-success',
								'Info'=>'btn-warning',
								'Danger'=>'btn-danger',
								'Link'=>'btn-link'
							);
			$param['heading']='Type';
			WPBMap::mutateParam('vc_button', $param);

			// icon
			$param = WPBMap::getParam('vc_button', 'icon');
			$param['type']='textfield';
			$param['value']='';
			WPBMap::mutateParam('vc_button', $param);

			// size
			$param = WPBMap::getParam('vc_button', 'size');
			$param['value']= array(
								'Default'=>'',
								'Large'=>'btn-lg',
								'Small'=>'btn-sm',
								'Extra small'=>'btn-xs'
							);
			WPBMap::mutateParam('vc_button', $param);
		}

		/**
		 * Image Carousel
		 */

		private function elementImageCarousel(){
			$this->deleteParam('vc_images_carousel',array(
														'img_size',
														'onclick',
														'mode',
														'slides_per_view',
														'wrap',
														'partial_view',
														'speed',
														'autoplay'
													));
		}

		/**
		 * Goole Map
		 */
		private function elementGoogleMap(){
			$this->deleteParam('vc_gmaps',array(
											'title',
											'link'
										));
		}

		private function elementProgressBar(){
			$this->deleteParam('vc_progress_bar',array(
											'title',
											'units',
											'bgcolor',
											'custombgcolor',
											'options'
										));
		}

	}

	add_action( 'init', 'WPO_init_VC_Pagebuilder_Custom');
	function WPO_init_VC_Pagebuilder_Custom(){
		new WPO_PageBuilder();
	}

}