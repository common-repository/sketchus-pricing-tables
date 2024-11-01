<?php
class Skpricing_Table_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	function skpricing_table_enqueue_scripts()
{

	$skpricing_table_global_options = (array)get_option('skpricing_table_global_settings');
	if(!isset($skpricing_table_global_options['loadFiles']) || $skpricing_table_global_options['loadFiles']!='when_used')
	{
	
		wp_enqueue_style('hostrider_table_font_yanone', '//fonts.googleapis.com/css?family=Yanone+Kaffeesatz');
//		wp_enqueue_style('skpricing_table_table1_style', plugins_url('sketchus-pricing-tables/admin/table1/skpricing_table_style.css'));
//		wp_enqueue_style('skpricing_table_table2_style', plugins_url('sketchus-pricing-tables/admin/table2/skpricing_table_style.css'));
//		wp_enqueue_style('skpricing_table_table3_style', plugins_url('sketchus-pricing-tables/admin/table3/skpricing_table_style.css'));
		wp_enqueue_style('hostrider_table_style', plugins_url('sketchus-pricing-tables/admin/table/skpricing_table_style.css'));
		wp_enqueue_style('font-awesome-4.5', plugins_url('sketchus-pricing-tables/admin/css/font-awesome.min.css'));
		wp_enqueue_style('hostrider_animation', plugins_url('sketchus-pricing-tables/admin/css/animation.css'));	
		wp_enqueue_style('hostrider_table_responsive', plugins_url('sketchus-pricing-tables/admin/css/responsive.css'));
	}
}
function skpricing_table_wp_footer()
{
	global $skpricing_table_shortcode_used;
	global $skpricing_table_load_responsive;
	global $skpricing_table_load_kind_1;
	global $skpricing_table_load_kind_2;
	global $skpricing_table_load_kind_3;
	global $skpricing_table_load_js;
	global $skpricing_table_load_expand_collapse;
	if((int)$skpricing_table_load_js)
	{
		wp_enqueue_script('jquery');
//		wp_enqueue_script('jquery-carouFredSel', plugins_url('sketchus-pricing-tables/admin/js/jquery.carouFredSel-6.2.1-packed.js'));
//		wp_enqueue_script('skpricing_table_main', plugins_url('sketchus-pricing-tables/admin/js/main.js')); 
//		wp_enqueue_script('jquery-easing', plugins_url('sketchus-pricing-tables/admin/js/jquery.easing.1.3.js'));
//		wp_enqueue_script('jquery-touchSwipe', plugins_url('sketchus-pricing-tables/admin/js/jquery.touchSwipe.min.js'));
	}
	else if((int)$skpricing_table_load_expand_collapse)
	{
		wp_enqueue_script('jquery');
		wp_enqueue_script('skpricing_table_main', plugins_url('js/main.js', __FILE__));
	}
	$skpricing_table_global_options = (array)get_option('skpricing_table_global_settings');
	if($skpricing_table_shortcode_used && $skpricing_table_global_options['loadFiles']=='when_used')
	{
		wp_enqueue_style('hostrider_table_font_yanone', '//fonts.googleapis.com/css?family=Yanone+Kaffeesatz');
//		wp_enqueue_style('skpricing_table_table1_style', plugins_url('sketchus-pricing-tables/admin/table1/skpricing_table_style.css'));
//		wp_enqueue_style('skpricing_table_table2_style', plugins_url('sketchus-pricing-tables/admin/table2/skpricing_table_style.css'));
//		wp_enqueue_style('skpricing_table_table3_style', plugins_url('sketchus-pricing-tables/admin/table3/skpricing_table_style.css'));
		wp_enqueue_style('hostrider_table_style', plugins_url('sketchus-pricing-tables/admin/table/skpricing_table_style.css'));
		wp_enqueue_style('font-awesome-4.5', plugins_url('sketchus-pricing-tables/admin/css/font-awesome.min.css'));	
		wp_enqueue_style('hostrider_animation', plugins_url('sketchus-pricing-tables/admin/css/animation.css'));	
		}
		if((int)$skpricing_table_load_responsive)
			wp_enqueue_style('hostrider_table_responsive', plugins_url('sketchus-pricing-tables/admin/css/responsive.css'));
	}
	 public	function hrpricing_check_font_awesome() {
		  global $wp_styles;
		  $srcs = array_map('basename', (array) wp_list_pluck($wp_styles->registered, 'src') );
		  if ( in_array('font-awesome.css', $srcs) || in_array('font-awesome.min.css', $srcs)  ) {
			/* echo 'font-awesome.css registered'; */
		  } else {
			wp_enqueue_style('font-awesome-4.5', plugins_url('sketchus-pricing-tables/admin/css/font-awesome.min.css'));
		  }
 }


}
