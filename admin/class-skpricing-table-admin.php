<?php
class Skpricing_Table_Admin
{
    
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
     * @param      string    $plugin_name       The name of this plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct($plugin_name, $version)
    {
        
        $this->plugin_name = $plugin_name;
        $this->version     = $version;
        
    }
    
    /**
     * Register the stylesheets for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_styles()
    {
        
        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Plugin_Name_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Plugin_Name_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */
        
        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/skpricing-table-admin.css', array(), $this->version, 'all');
        
    }
    
    /**
     * Converts form field 'skpricing_table_data' with serialized all variables into normal $_POST array
     * We are doing this to workaround the max_input_vars limit
     */
    public function skpricing_table_admin_convert_post_data()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST["skpricing_table_data"])) {
            $vars = explode("&", $_POST["skpricing_table_data"]);
            $data = array();
            foreach ($vars as $var) {
                parse_str($var, $variable);
                $this->assign_var($_POST, $variable);
           }
           //print_r($_POST["colsBgColor[]"]);
         
        }
        wp_enqueue_style( 'wp-color-picker' );
	    wp_register_script('skpricing_table_admin', plugins_url('js/skpricing_table_admin.js', __FILE__), array(), "1.0");
        wp_enqueue_script( 'CP-Active', plugins_url('/js/cp-active.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
        wp_register_style('skpricing_table_font_yanone', '//fonts.googleapis.com/css?family=Yanone+Kaffeesatz');
		wp_register_style('font-awesome', plugins_url('css/font-awesome.min.css',__FILE__));
		wp_register_style('skpricing_table_table_style', plugins_url('table/skpricing_table_style.css', __FILE__));
        wp_register_style('skpricing_animation', plugins_url('css/animation.css', __FILE__));
        wp_register_style('skpricing_table_responsive', plugins_url('css/responsive.css', __FILE__));
        
    }
	public function skpricing_get_the_user_ip() {
		   $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP'])){
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
	}else if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
	}else if(isset($_SERVER['HTTP_X_FORWARDED'])){
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
	}else if(isset($_SERVER['HTTP_FORWARDED_FOR'])){
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
	}else if(isset($_SERVER['HTTP_FORWARDED'])){
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
	}else if(isset($_SERVER['REMOTE_ADDR'])){
        $ipaddress = $_SERVER['REMOTE_ADDR'];
	}else{
        $ipaddress = 'UNKNOWN';
		}		
			return base64_encode($ipaddress);
		}
    
       
    
    
    public function skpricing_table_admin_print_scripts()
    {

        wp_enqueue_script('jquery');
        wp_enqueue_script('jquery-ui-core');
		wp_enqueue_script('thickbox');
		wp_enqueue_script('skpricing_table_admin');

       
	   //pass data to javascript
        $data = array(
            'imgUrl' => plugins_url('img/', __FILE__),
            'siteUrl' => get_site_url(),
			'locate' => $this->skpricing_get_the_user_ip(),
            'selectedShortcodeId' => (isset($_POST["action"]) && $_POST["action"] == "save_skpricing_table" ? $_POST["shortcodeId"] : ""),
            'translation' => array(
                'screenWidth' => __('Screen width', 'skpricing_table'),
                'responsiveButtonWidth' => __('Responsive button width', 'skpricing_table'),
                'TranscolsBgImg' => __('Column Background Image', 'skpricing_table'),
				'colsBgImg' => __('Column Background Image', 'skpricing_table'),
				'colsAnimSel' => __('Animation', 'skpricing_table'),
                'colsBgColor' => __('Column Background Color', 'skpricing_table'),
                'colsTextColor' => __('Column Text Color', 'skpricing_table'),
                'responsiveFontSize' => __('Responsive font size', 'skpricing_table'),
                'inPx' => __('(in px)', 'skpricing_table'),
                'responsiveWidth' => __('responsive width', 'skpricing_table'),
                'responsiveHeight' => __('responsive height', 'skpricing_table'),
                'optional' => __('(optional)', 'skpricing_table'),
                'chooseShortcode' => __('choose shortcode...', 'skpricing_table'),
                'buttonStyle' => __('button style', 'skpricing_table'),
                'price' => __('price', 'skpricing_table'),
                'headerTitle' => __('header title', 'skpricing_table'),
                'caption' => __('caption', 'skpricing_table'),
                'button' => __('button', 'skpricing_table'),
                'buttonOrange' => __('button orange', 'skpricing_table'),
                'buttonYellow' => __('button yellow', 'skpricing_table'),
                'buttonLightgreen' => __('button lightgreen', 'skpricing_table'),
                'buttonGreen' => __('button green', 'skpricing_table'),
                'table' => __('Table', 'skpricing_table'),
                'yesIcons' => __('Yes icons', 'skpricing_table'),
                'noIcons' => __('No icons', 'skpricing_table'),
                'noIconsOld' => __('No icons(old)', 'skpricing_table'),
                'yesIconsOld' => __('Yes icons(old)', 'skpricing_table'),
                'tooltip' => __('tooltip: ', 'skpricing_table'),
                'rowsConfiguration' => __('Rows configuration', 'skpricing_table'),
                'heightOptionalInPx' => __('height (optional in px)', 'skpricing_table'),
                'paddingTopOptionalInPx' => __('padding top (optional in px)', 'skpricing_table'),
                'paddingBottomOptionalInPx' => __('padding bottom (optional in px)', 'skpricing_table'),
                'responsiveWidth' => __('responsive width', 'skpricing_table'),
                'column' => __('Column', 'skpricing_table'),
                'widthOptional' => __('width (optional):', 'skpricing_table'),
                'aligmentOptional' => __('aligment (optional):', 'skpricing_table'),
                'choose' => __('choose...', 'skpricing_table'),
                'left' => __('left', 'skpricing_table'),
                'center' => __('center', 'skpricing_table'),
                'right' => __('right', 'skpricing_table'),
                'activeOptional' => __('active (optional):', 'skpricing_table'),
                'yes' => __('yes', 'skpricing_table'),
                'no' => __('no', 'skpricing_table'),
                'disableHiddenOptional' => __('disable/hidden (optional):', 'skpricing_table'),
                'ribbonOptional' => __('ribbon (optional):', 'skpricing_table'),
                'trial' => __('trial', 'skpricing_table'),
                'topUppercase' => __('top (uppercase)', 'skpricing_table'),
                'top' => __('top', 'skpricing_table'),
                'saveUppercase' => __('save (uppercase)', 'skpricing_table'),
                'save' => __('save', 'skpricing_table'),
                'sale' => __('sale', 'skpricing_table'),
                'pro' => __('pro', 'skpricing_table'),
                'pack' => __('pack', 'skpricing_table'),
                'off5' => __('5% off', 'skpricing_table'),
                'off10' => __('10% off', 'skpricing_table'),
                'off15' => __('15% off', 'skpricing_table'),
                'off20' => __('20% off', 'skpricing_table'),
                'off25' => __('25% off', 'skpricing_table'),
                'off30' => __('30% off', 'skpricing_table'),
                'off35' => __('35% off', 'skpricing_table'),
                'off40' => __('40% off', 'skpricing_table'),
                'off50' => __('50% off', 'skpricing_table'),
                'off75' => __('75% off', 'skpricing_table'),
                'no1' => __('no. 1', 'skpricing_table'),
                'newUppercase' => __('new (uppercase)', 'skpricing_table'),
                'new' => __('new', 'skpricing_table'),
                'hotUppercase' => __('hot (uppercase)', 'skpricing_table'),
                'hot' => __('hot', 'skpricing_table'),
                'heart' => __('heart', 'skpricing_table'),
                'giftUppercase' => __('gift (uppercase)', 'skpricing_table'),
                'fresh' => __('fresh', 'skpricing_table'),
                'freeUppercase' => __('free (uppercase)', 'skpricing_table'),
                'free' => __('free', 'skpricing_table'),
                'buy' => __('buy', 'skpricing_table'),
                'best' => __('best', 'skpricing_table'),
                'Style' => __('Style', 'skpricing_table'),
                'style' => __('style', 'skpricing_table'),
                'trial' => __('trial', 'skpricing_table'),
                'up' => __('up', 'skpricing_table'),
                'down' => __('down', 'skpricing_table'),
                'old' => __('(old)', 'skpricing_table')
            )
        );
        wp_localize_script('skpricing_table_admin', 'config', $data);
        wp_enqueue_style('skpricing_table_font_yanone');
		 wp_enqueue_style('skpricing_table_style_admin');
		wp_enqueue_style('skpricing_table_table_style');
        wp_enqueue_style('font-awesome');
        wp_enqueue_style('skpricing_animation');
       wp_enqueue_style('skpricing_table_responsive');
		 wp_enqueue_style('wp-color-picker');
    }
	
	
    
    public function skpricing_table_admin_menu()
    {
        require_once plugin_dir_path(dirname(__FILE__)) . 'admin/partials/skpricing-table-admin-display.php';
        add_menu_page(__('HostRider Pricing Tables', 'skpricing_table'), __('Pricing Tables', 'skpricing_table'), 'manage_options', 'hostrider_pricing_tables', 'skpricing_table_admin_page', 'dashicons-layout');
        //$page = add_menu_page(__('Sketchus Pricing Tables', 'skpricing_table'), __('Pricing Tables', 'skpricing_table'), 'manage_options', 'sketchus_pricing_tables', 'skpricing_table_admin_page', plugins_url('sketchus-pricing-tables/admin/img/icon.png'));
          }
          
      public function skpricing_shortcode_VC() {
			$skPricingTableAllShortcodeIds = array();
		
			//get pricing tables list
			global $wpdb;
			$query = "SELECT option_name FROM {$wpdb->options}
					WHERE 
					option_name LIKE 'skpricing_table_shortcode_settings%'
					ORDER BY option_name";
			$pricing_tables_list = $wpdb->get_results($query);
			$skPricingTableAllShortcodeIds = array();
		  $skPricingTableAllShortcodeIds['Select Pricing table'] = '-1';
			if( is_array($pricing_tables_list) && count($pricing_tables_list) > 0 ) {
		  foreach($pricing_tables_list as $pricing_table) {
							//$pricing_table->option_name;
			  $skPricingTableAllShortcodeIds['[skpricing_table id="' . substr($pricing_table->option_name, 35) . '"]'] = substr($pricing_table->option_name, 35);
	
		  }
		
		}
		vc_map( array(
            "name" => __( "Pricing Tables", "skpricing_table" ),
            "base" => "skpricing_table",
            "icon" => plugins_url('img/vc-icon.png', __FILE__),
			'category' => __( 'Pricing Table', 'js_composer' ),
			'description' => __( 'Create responsive HostRider Pricing Tables', 'skpricing_table' ),
            "params" => array(
                array(
                    'type' => 'dropdown',
                    'heading' => __( 'Select Pricing Table', 'skpricing_table' ),
                    'param_name' => 'id',
					'admin_label' => true,
                    'value' => $skPricingTableAllShortcodeIds,
					'std' => '[skpricing_table id="Select Pricing Table"]'
                ),
            ),
        ) );
    }   
	

 
    public function skpricing_table_stripslashes_deep($value)
    {
        $value = is_array($value) ? array_map('stripslashes_deep', $value) : stripslashes($value);
        
        return $value;
    }
    public function skpricing_table_ajax_get_settings()
    {
        
        echo "skpricing_start" . json_encode($this->skpricing_table_stripslashes_deep(get_option('skpricing_table_shortcode_settings_' . $_POST["id"]))) . "skpricing_end";
        exit();
    }
	
 
    
    public function skpricing_table_ajax_delete()
    {
        echo "skpricing_start" . delete_option($_POST["id"]) . "skpricing_end";
        exit();
    }
    
    
    public function skpricing_table_ajax_get_font_subsets()
    {
        if ($_POST["font"] != "") {
            $subsets     = '';
            $fontExplode = explode(":", $_POST["font"]);
            //get google fonts
            $fontsArray  = get_option("skpricing_table_google_fonts");
            //update if option doesn't exist or it was modified more than 2 weeks ago
            if ($fontsArray === FALSE || (time() - $fontsArray->last_update > 2 * 7 * 24 * 60 * 60)) {
                $google_api_url          = 'http://dev.sketchus.com/data/fonts.txt';
                /*=========================================================================================================*/
                $fontsJson               = wp_remote_retrieve_body(wp_remote_get($google_api_url, array(
                    'sslverify' => false
                )));
                $fontsArray              = json_decode($fontsJson);
                $fontsArray->last_update = time();
                update_option("skpricing_table_google_fonts", $fontsArray);
            }
            $fontsCount = count($fontsArray->items);
            for ($i = 0; $i < $fontsCount; $i++) {
                if ($fontsArray->items[$i]->family == $fontExplode[0]) {
                    for ($j = 0, $max = count($fontsArray->items[$i]->subsets); $j < $max; $j++) {
                        $subsets .= '<option value="' . $fontsArray->items[$i]->subsets[$j] . '">' . $fontsArray->items[$i]->subsets[$j] . '</option>';
                    }
                    break;
                }
            }
            echo "skpricing_start" . $subsets . "skpricing_end";
        }
        exit();
    }
    public function skpricing_table_ajax_preview()
    {
        $responsiveStepWidth = "";
        for ($i = 0; $i < count($_POST["responsiveStepWidth"]); $i++) {
            $responsiveStepWidth .= $_POST["responsiveStepWidth"][$i];
            if ($i + 1 < count($_POST["responsiveStepWidth"]));
            
            $responsiveStepWidth .= "|";
        }
        $responsiveButtonWidth = "";
        for ($i = 0; $i < count($_POST["responsiveButtonWidth"]); $i++) {
            $responsiveButtonWidth .= $_POST["responsiveButtonWidth"][$i];
            if ($i + 1 < count($_POST["responsiveButtonWidth"]));
            
            $responsiveButtonWidth .= "|";
        }
        $responsiveHeaderFontSize = "";
        for ($i = 0; $i < count($_POST["responsiveHeaderFontSize"]); $i++) {
            $responsiveHeaderFontSize .= $_POST["responsiveHeaderFontSize"][$i];
            if ($i + 1 < count($_POST["responsiveHeaderFontSize"]));
            $responsiveHeaderFontSize .= "|";
        }
        $responsivePriceFontSize = "";
        for ($i = 0; $i < count($_POST["responsivePriceFontSize"]); $i++) {
            $responsivePriceFontSize .= $_POST["responsivePriceFontSize"][$i];
            if ($i + 1 < count($_POST["responsivePriceFontSize"]));
            $responsivePriceFontSize .= "|";
        }
        $responsivePermonthFontSize = "";
        for ($i = 0; $i < count($_POST["responsivePermonthFontSize"]); $i++) {
            $responsivePermonthFontSize .= $_POST["responsivePermonthFontSize"][$i];
            if ($i + 1 < count($_POST["responsivePermonthFontSize"]));
            $responsivePermonthFontSize .= "|";
        }
        $responsiveContentFontSize = "";
        for ($i = 0; $i < count($_POST["responsiveContentFontSize"]); $i++) {
            $responsiveContentFontSize .= $_POST["responsiveContentFontSize"][$i];
            if ($i + 1 < count($_POST["responsiveContentFontSize"]));
            $responsiveContentFontSize .= "|";
        }
        $responsiveButtonsFontSize = "";
        for ($i = 0; $i < count($_POST["responsiveButtonsFontSize"]); $i++) {
            $responsiveButtonsFontSize .= $_POST["responsiveButtonsFontSize"][$i];
            if ($i + 1 < count($_POST["responsiveButtonsFontSize"]));
            $responsiveButtonsFontSize .= "|";
        }
        $widths = "";
        for ($i = 0; $i < count($_POST["widths"]); $i++) {
            $widths .= $_POST["widths"][$i];
            if ($i + 1 < count($_POST["widths"]));
            $widths .= "|";
        }
        $responsiveWidths = "";
        for ($i = 0; $i < count($_POST["responsiveWidths"]); $i++) {
            $responsiveWidths .= $_POST["responsiveWidths"][$i];
            if ($i + 1 < count($_POST["responsiveWidths"]));
            $responsiveWidths .= "|";
        }
        $columnsBgImg = "";
        for ($i = 0; $i < count($_POST["colsBgImg"]); $i++) {
            $columnsBgImg .= $_POST["colsBgImg"][$i];
            if ($i + 1 < count($_POST["colsBgImg"]));
            $columnsBgImg .= "|";
        }
//		$columnsAnimSel = "";
//        for ($i = 0; $i < count($_POST["colsAnimSel"]); $i++) {
//            $columnsAnimSel .= $_POST["colsAnimSel"][$i];
//            if ($i + 1 < count($_POST["colsAnimSel"]));
//            $columnsAnimSel .= "|";
//        }
        $columnsBgColor = "";
        for ($i = 0; $i < count($_POST["colsBgColor"]); $i++) {
            $columnsBgColor .= $_POST["colsBgColor"][$i];
            if ($i + 1 < count($_POST["colsBgColor"]));
            $columnsBgColor .= "|";
        }
        $columnsTextColor = "";
        for ($i = 0; $i < count($_POST["colsTextColor"]); $i++) {
            $columnsTextColor .= $_POST["colsTextColor"][$i];
            if ($i + 1 < count($_POST["colsTextColor"]));
            $columnsTextColor .= "|";
        }
        $aligments = "";
        for ($i = 0; $i < count($_POST["aligments"]); $i++) {
            $aligments .= $_POST["aligments"][$i];
            if ($i + 1 < count($_POST["aligments"]));
            $aligments .= "|";
        }
        $actives = "";
        for ($i = 0; $i < count($_POST["actives"]); $i++) {
            $actives .= (int) $_POST["actives"][$i];
            if ($i + 1 < count($_POST["actives"]));
            $actives .= "|";
        }
        $hiddens = "";
        for ($i = 0; $i < count($_POST["hiddens"]); $i++) {
            $hiddens .= (int) $_POST["hiddens"][$i];
            if ($i + 1 < count($_POST["hiddens"]));
            $hiddens .= "|";
        }
        $ribbons = "";
        for ($i = 0; $i < count($_POST["ribbons"]); $i++) {
            $ribbons .= $_POST["ribbons"][$i];
            if ($i + 1 < count($_POST["ribbons"]));
            $ribbons .= "|";
        }
        $heights = "";
        for ($i = 0; $i < count($_POST["heights"]); $i++) {
            $heights .= $_POST["heights"][$i];
            if ($i + 1 < count($_POST["heights"]));
            $heights .= "|";
        }
        $responsiveHeights = "";
        for ($i = 0; $i < count($_POST["responsiveHeights"]); $i++) {
            $responsiveHeights .= $_POST["responsiveHeights"][$i];
            if ($i + 1 < count($_POST["responsiveHeights"]));
            $responsiveHeights .= "|";
        }
        $paddingsTop = "";
        for ($i = 0; $i < count($_POST["paddingsTop"]); $i++) {
            $paddingsTop .= $_POST["paddingsTop"][$i];
            if ($i + 1 < count($_POST["paddingsTop"]));
            $paddingsTop .= "|";
        }
        $paddingsBottom = "";
        for ($i = 0; $i < count($_POST["paddingsBottom"]); $i++) {
            $paddingsBottom .= $_POST["paddingsBottom"][$i];
            if ($i + 1 < count($_POST["paddingsBottom"]));
            $paddingsBottom .= "|";
        }
        $texts = "";
        for ($i = 0; $i < count($_POST["texts"]); $i++) {
            $texts .= str_replace("]", "&#93;", str_replace("[", "&#91;", str_replace("'", "&#39;", $_POST["texts"][$i])));
            if ($i + 1 < count($_POST["texts"]));
            $texts .= "|";
        }
        $tooltips = "";
        for ($i = 0; $i < count($_POST["tooltips"]); $i++) {
            $tooltips .= str_replace("]", "&#93;", str_replace("[", "&#91;", str_replace("'", "&#39;", $_POST["tooltips"][$i])));
            if ($i + 1 < count($_POST["tooltips"]));
            $tooltips .= "|";
        }
        $headerFontSubsets = "";
        for ($i = 0, $length = count($_POST["headerFontSubset"]); !empty($_POST["headerFontSubset"]) && $i < $length; $i++) {
            $headerFontSubsets .= str_replace("]", "&#93;", str_replace("[", "&#91;", str_replace("'", "&#39;", $_POST["headerFontSubset"][$i])));
            if ($i + 1 < count($_POST["headerFontSubset"]));
            $headerFontSubsets .= "|";
        }
        $priceFontSubsets = "";
        for ($i = 0; !empty($_POST["priceFontSubset"]) && $i < count($_POST["priceFontSubset"]); $i++) {
            $priceFontSubsets .= str_replace("]", "&#93;", str_replace("[", "&#91;", str_replace("'", "&#39;", $_POST["priceFontSubset"][$i])));
            if ($i + 1 < count($_POST["priceFontSubset"]));
            $priceFontSubsets .= "|";
        }
        $permonthFontSubsets = "";
        for ($i = 0; !empty($_POST["permonthFontSubset"]) && $i < count($_POST["permonthFontSubset"]); $i++) {
            $permonthFontSubsets .= str_replace("]", "&#93;", str_replace("[", "&#91;", str_replace("'", "&#39;", $_POST["permonthFontSubset"][$i])));
            if ($i + 1 < count($_POST["permonthFontSubset"]));
            $permonthFontSubsets .= "|";
        }
        $contentFontSubsets = "";
        for ($i = 0; !empty($_POST["contentFontSubset"]) && $i < count($_POST["contentFontSubset"]); $i++) {
            $contentFontSubsets .= str_replace("]", "&#93;", str_replace("[", "&#91;", str_replace("'", "&#39;", $_POST["contentFontSubset"][$i])));
            if ($i + 1 < count($_POST["contentFontSubset"]));
            $contentFontSubsets .= "|";
        }
        $buttonsFontSubsets = "";
        for ($i = 0; !empty($_POST["buttonsFontSubset"]) && $i < count($_POST["buttonsFontSubset"]); $i++) {
            $buttonsFontSubsets .= str_replace("]", "&#93;", str_replace("[", "&#91;", str_replace("'", "&#39;", $_POST["buttonsFontSubset"][$i])));
            if ($i + 1 < count($_POST["buttonsFontSubset"]));
            $buttonsFontSubsets .= "|";
        }
         
        echo "skpricing_start" . do_shortcode("[skpricing_table_print id='" . $_POST["shortcodeId"] . "' kind='" . (int) $_POST["kind"] . "' style='" . (int) $_POST["styleForTable" . (int) $_POST["kind"]] . "' colsBgImg='" . $columnsBgImg . "' colsAnimSel='" .$_POST["colsAnimSel"]  . "' colsBgColor='" . $columnsBgColor . "' colsTextColor='" . $columnsTextColor . "' hoverType='" . $_POST["hoverTypeForTable" . (int) $_POST["kind"]] . "' css3CustomCss='" . $_POST["css3CustomCss"] . "' responsive='" . $_POST["responsive"] . "' responsiveHideCaptionColumn='" . (int) $_POST["responsiveHideCaptionColumn"] . "' responsiveSteps='" . (int) $_POST["responsiveSteps"] . "' responsiveStepWidth='" . $responsiveStepWidth . "' responsiveButtonWidth='" . $responsiveButtonWidth . "' responsiveHeaderFontSize='" . $responsiveHeaderFontSize . "' responsivePriceFontSize='" . $responsivePriceFontSize . "' responsivePermonthFontSize='" . $responsivePermonthFontSize . "' responsiveContentFontSize='" . $responsiveContentFontSize . "' responsiveButtonsFontSize='" . $responsiveButtonsFontSize . "' priceFontCustom='" . $_POST["priceFontCustom"] . "' priceFont='" . $_POST["priceFont"] . "' priceFontSubsets='" . $priceFontSubsets . "' priceFontSize='" . $_POST["priceFontSize"] . "' headerFontCustom='" . $_POST["headerFontCustom"] . "' headerFont='" . $_POST["headerFont"] . "' headerFontSubsets='" . $headerFontSubsets . "' headerFontSize='" . $_POST["headerFontSize"] . "' permonthFontCustom='" . $_POST["permonthFontCustom"] . "' permonthFont='" . $_POST["permonthFont"] . "' permonthFontSubsets='" . $permonthFontSubsets . "' permonthFontSize='" . $_POST["permonthFontSize"] . "' contentFontCustom='" . $_POST["contentFontCustom"] . "' contentFont='" . $_POST["contentFont"] . "' contentFontSubsets='" . $contentFontSubsets . "' contentFontSize='" . $_POST["contentFontSize"] . "' buttonsFontCustom='" . $_POST["buttonsFontCustom"] . "' buttonsFont='" . $_POST["buttonsFont"] . "' buttonsFontSubsets='" . $buttonsFontSubsets . "' buttonsFontSize='" . $_POST["buttonsFontSize"] . "' columns='" . (int) $_POST["columns"] . "' rows='" . (int) $_POST["rows"] . "' hiddenRows='" . (int) $_POST["hiddenRows"] . "' hiddenRowsButtonExpandText='" . $_POST["hiddenRowsButtonExpandText"] . "' hiddenRowsButtonCollapseText='" . $_POST["hiddenRowsButtonCollapseText"] . "' texts='" . $texts . "' tooltips='" . $tooltips . "' widths='" . $widths . "' responsivewidths='" . $responsiveWidths . "' aligments='" . $aligments . "' actives='" . $actives . "' hiddens='" . $hiddens . "' ribbons='" . $ribbons . "' heights='" . $heights . "' responsiveheights='" . $responsiveHeights  . "' paddingstop='" . $paddingsTop . "' paddingsbottom='" . $paddingsBottom . "']") . "skpricing_end";
        exit();
    }
    public function skpricing_table_shortcode($atts)
    {
         
        extract(shortcode_atts(array(
            'id' => '',
            'top_margin' => 'none'
        ), $atts));
       
        if ($id != "") {
            if ($shortcode_settings = get_option('skpricing_table_shortcode_settings_' . $id)) {
                
                $responsiveStepWidth      = "";
                $responsiveStepWidthCount = (isset($shortcode_settings["responsiveStepWidth"]) ? count($shortcode_settings["responsiveStepWidth"]) : 0);
                for ($i = 0; $i < $responsiveStepWidthCount; $i++) {
                    $responsiveStepWidth .= $shortcode_settings["responsiveStepWidth"][$i];
                    if ($i + 1 < count($shortcode_settings["responsiveStepWidth"]));
                    $responsiveStepWidth .= "|";
                }
                $responsiveButtonWidth      = "";
                $responsiveButtonWidthCount = (isset($shortcode_settings["responsiveButtonWidth"]) ? count($shortcode_settings["responsiveButtonWidth"]) : 0);
                for ($i = 0; $i < $responsiveButtonWidthCount; $i++) {
                    $responsiveButtonWidth .= $shortcode_settings["responsiveButtonWidth"][$i];
                    if ($i + 1 < count($shortcode_settings["responsiveButtonWidth"]));
                    $responsiveButtonWidth .= "|";
                }
                $responsiveHeaderFontSize      = "";
                $responsiveHeaderFontSizeCount = (isset($shortcode_settings["responsiveHeaderFontSize"]) ? count($shortcode_settings["responsiveHeaderFontSize"]) : 0);
                for ($i = 0; $i < $responsiveHeaderFontSizeCount; $i++) {
                    $responsiveHeaderFontSize .= $shortcode_settings["responsiveHeaderFontSize"][$i];
                    if ($i + 1 < count($shortcode_settings["responsiveHeaderFontSize"]));
                    $responsiveHeaderFontSize .= "|";
                }
                $responsivePriceFontSize      = "";
                $responsivePriceFontSizeCount = (isset($shortcode_settings["responsivePriceFontSize"]) ? count($shortcode_settings["responsivePriceFontSize"]) : 0);
                for ($i = 0; $i < $responsivePriceFontSizeCount; $i++) {
                    $responsivePriceFontSize .= $shortcode_settings["responsivePriceFontSize"][$i];
                    if ($i + 1 < count($shortcode_settings["responsivePriceFontSize"]));
                    $responsivePriceFontSize .= "|";
                }
                $responsivePermonthFontSize      = "";
                $responsivePermonthFontSizeCount = (isset($shortcode_settings["responsivePermonthFontSize"]) ? count($shortcode_settings["responsivePermonthFontSize"]) : 0);
                for ($i = 0; $i < $responsivePermonthFontSizeCount; $i++) {
                    $responsivePermonthFontSize .= $shortcode_settings["responsivePermonthFontSize"][$i];
                    if ($i + 1 < count($shortcode_settings["responsivePermonthFontSize"]));
                    $responsivePermonthFontSize .= "|";
                }
                $responsiveContentFontSize      = "";
                $responsiveContentFontSizeCount = (isset($shortcode_settings["responsiveContentFontSize"]) ? count($shortcode_settings["responsiveContentFontSize"]) : 0);
                for ($i = 0; $i < $responsiveContentFontSizeCount; $i++) {
                    $responsiveContentFontSize .= $shortcode_settings["responsiveContentFontSize"][$i];
                    if ($i + 1 < count($shortcode_settings["responsiveContentFontSize"]));
                    $responsiveContentFontSize .= "|";
                }
                $responsiveButtonsFontSize      = "";
                $responsiveButtonsFontSizeCount = (isset($shortcode_settings["responsiveButtonsFontSize"]) ? count($shortcode_settings["responsiveButtonsFontSize"]) : 0);
                for ($i = 0; $i < $responsiveButtonsFontSizeCount; $i++) {
                    $responsiveButtonsFontSize .= $shortcode_settings["responsiveButtonsFontSize"][$i];
                    if ($i + 1 < count($shortcode_settings["responsiveButtonsFontSize"]));
                    $responsiveButtonsFontSize .= "|";
                }
                $widths = "";
                for ($i = 0; $i < count($shortcode_settings["widths"]); $i++) {
                    $widths .= $shortcode_settings["widths"][$i];
                    if ($i + 1 < count($shortcode_settings["widths"]));
                    $widths .= "|";
                }
                    $columnsBgImg = "";
                for ($i = 0; $i < count($shortcode_settings["colsBgImg"]); $i++) {
                    $columnsBgImg .= $shortcode_settings["colsBgImg"][$i];
                    if ($i + 1 < count($shortcode_settings["colsBgImg"]));
                    $columnsBgImg .= "|";
                }
//                  $columnsAnimSel = "";
//                for ($i = 0; $i < count($shortcode_settings["colsAnimSel"]); $i++) {
//                    $columnsAnimSel .= $shortcode_settings["colsAnimSel"][$i];
//                    if ($i + 1 < count($shortcode_settings["colsAnimSel"]));
//                    $columnsAnimSel .= "|";
//                }
                 $columnsBgColor = "";
                for ($i = 0; $i < count($shortcode_settings["colsBgColor"]); $i++) {
                    $columnsBgColor .= $shortcode_settings["colsBgColor"][$i];
                    if ($i + 1 < count($shortcode_settings["colsBgColor"]));
                    $columnsBgColor .= "|";
                }
            
                  $columnsTextColor = "";
                for ($i = 0; $i < count($shortcode_settings["colsTextColor"]); $i++) {
                    $columnsTextColor .= $shortcode_settings["colsTextColor"][$i];
                    if ($i + 1 < count($shortcode_settings["colsTextColor"]));
                    $columnsTextColor .= "|";
                }
                $responsiveWidths = "";
                for ($i = 0; $i < count($shortcode_settings["responsiveWidths"]); $i++) {
                    $responsiveWidths .= $shortcode_settings["responsiveWidths"][$i];
                    if ($i + 1 < count($shortcode_settings["responsiveWidths"]));
                    $responsiveWidths .= "|";
                }
                $aligments = "";
                for ($i = 0; $i < count($shortcode_settings["aligments"]); $i++) {
                    $aligments .= $shortcode_settings["aligments"][$i];
                    if ($i + 1 < count($shortcode_settings["aligments"]));
                    $aligments .= "|";
                }
            
                $actives = "";
                for ($i = 0; $i < count($shortcode_settings["actives"]); $i++) {
                    $actives .= (int) $shortcode_settings["actives"][$i];
                    if ($i + 1 < count($shortcode_settings["actives"]));
                    $actives .= "|";
                }
                $hiddens = "";
                for ($i = 0; $i < count($shortcode_settings["hiddens"]); $i++) {
                    $hiddens .= (int) $shortcode_settings["hiddens"][$i];
                    if ($i + 1 < count($shortcode_settings["hiddens"]));
                    $hiddens .= "|";
                }
                $ribbons = "";
                for ($i = 0; $i < count($shortcode_settings["ribbons"]); $i++) {
                    $ribbons .= $shortcode_settings["ribbons"][$i];
                    if ($i + 1 < count($shortcode_settings["ribbons"]));
                    $ribbons .= "|";
                }
                $heights = "";
                for ($i = 0; $i < count($shortcode_settings["heights"]); $i++) {
                    $heights .= $shortcode_settings["heights"][$i];
                    if ($i + 1 < count($shortcode_settings["heights"]));
                    $heights .= "|";
                }
                $responsiveHeights = "";
                for ($i = 0; $i < count($shortcode_settings["responsiveHeights"]); $i++) {
                    $responsiveHeights .= $shortcode_settings["responsiveHeights"][$i];
                    if ($i + 1 < count($shortcode_settings["responsiveHeights"]));
                    $responsiveHeights .= "|";
                }
                $paddingsTop = "";
                for ($i = 0; $i < count($shortcode_settings["paddingsTop"]); $i++) {
                    $paddingsTop .= $shortcode_settings["paddingsTop"][$i];
                    if ($i + 1 < count($shortcode_settings["paddingsTop"]));
                    $paddingsTop .= "|";
                }
                $paddingsBottom = "";
                for ($i = 0; $i < count($shortcode_settings["paddingsBottom"]); $i++) {
                    $paddingsBottom .= $shortcode_settings["paddingsBottom"][$i];
                    if ($i + 1 < count($shortcode_settings["paddingsBottom"]));
                    $paddingsBottom .= "|";
                }
                $texts = "";
                for ($i = 0; $i < count($shortcode_settings["texts"]); $i++) {
                    $texts .= str_replace("]", "&#93;", str_replace("[", "&#91;", str_replace("'", "&#39;", $shortcode_settings["texts"][$i])));
                    if ($i + 1 < count($shortcode_settings["texts"]));
                    $texts .= "|";
                }
                $tooltips = "";
                for ($i = 0; $i < count($shortcode_settings["tooltips"]); $i++) {
                    $tooltips .= str_replace("]", "&#93;", str_replace("[", "&#91;", str_replace("'", "&#39;", $shortcode_settings["tooltips"][$i])));
                    if ($i + 1 < count($shortcode_settings["tooltips"]));
                    $tooltips .= "|";
                }
                $headerFontSubsets     = "";
                $headerFontSubsetCount = (isset($shortcode_settings["headerFontSubset"]) ? count($shortcode_settings["headerFontSubset"]) : 0);
                for ($i = 0; $i < $headerFontSubsetCount; $i++) {
                    $headerFontSubsets .= str_replace("]", "&#93;", str_replace("[", "&#91;", str_replace("'", "&#39;", (isset($shortcode_settings["headerFontSubset"][$i]) ? $shortcode_settings["headerFontSubset"][$i] : ""))));
                    if ($i + 1 < count($shortcode_settings["headerFontSubset"]));
                    $headerFontSubsets .= "|";
                }
                $priceFontSubsets     = "";
                $priceFontSubsetCount = (isset($shortcode_settings["priceFontSubset"]) ? count($shortcode_settings["priceFontSubset"]) : 0);
                for ($i = 0; $i < $priceFontSubsetCount; $i++) {
                    $priceFontSubsets .= str_replace("]", "&#93;", str_replace("[", "&#91;", str_replace("'", "&#39;", (isset($shortcode_settings["priceFontSubset"][$i]) ? $shortcode_settings["priceFontSubset"][$i] : ""))));
                    if ($i + 1 < count($shortcode_settings["priceFontSubset"]));
                    $priceFontSubsets .= "|";
                }
                $permonthFontSubsets     = "";
                $permonthFontSubsetCount = (isset($shortcode_settings["permonthFontSubset"]) ? count($shortcode_settings["permonthFontSubset"]) : 0);
                for ($i = 0; $i < $permonthFontSubsetCount; $i++) {
                    $permonthFontSubsets .= str_replace("]", "&#93;", str_replace("[", "&#91;", str_replace("'", "&#39;", (isset($shortcode_settings["permonthFontSubset"][$i]) ? $shortcode_settings["permonthFontSubset"][$i] : ""))));
                    if ($i + 1 < count($shortcode_settings["permonthFontSubset"]));
                    $permonthFontSubsets .= "|";
                }
                $contentFontSubsets     = "";
                $contentFontSubsetCount = (isset($shortcode_settings["contentFontSubset"]) ? count($shortcode_settings["contentFontSubset"]) : 0);
                for ($i = 0; $i < $contentFontSubsetCount; $i++) {
                    $contentFontSubsets .= str_replace("]", "&#93;", str_replace("[", "&#91;", str_replace("'", "&#39;", (isset($shortcode_settings["contentFontSubset"][$i]) ? $shortcode_settings["contentFontSubset"][$i] : ""))));
                    if ($i + 1 < count($shortcode_settings["contentFontSubset"]));
                    $contentFontSubsets .= "|";
                }
                $buttonsFontSubsets     = "";
                $buttonsFontSubsetCount = (isset($shortcode_settings["buttonsFontSubset"]) ? count($shortcode_settings["buttonsFontSubset"]) : 0);
                for ($i = 0; $i < $buttonsFontSubsetCount; $i++) {
                    $buttonsFontSubsets .= str_replace("]", "&#93;", str_replace("[", "&#91;", str_replace("'", "&#39;", (isset($shortcode_settings["buttonsFontSubset"][$i]) ? $shortcode_settings["buttonsFontSubset"][$i] : ""))));
                    if ($i + 1 < count($shortcode_settings["buttonsFontSubset"]));
                    $buttonsFontSubsets .= "|";
                }
				$output = do_shortcode("[skpricing_table_print id='" . $id . "' top_margin='" . $top_margin . "' kind='" . $shortcode_settings["kind"] . "' style='" . $shortcode_settings["styleForTable" . $shortcode_settings["kind"]] . "' colsbgimg='" . $columnsBgImg . "' colsanimsel='" . $shortcode_settings["colsAnimSel"] . "' colsbgcolor='" . $columnsBgColor . "' colstextcolor='" . $columnsTextColor . "' hoverType='" . $shortcode_settings["hoverTypeForTable" . $shortcode_settings["kind"]] . "' css3CustomCss='" . (isset($shortcode_settings["css3CustomCss"]) ? $shortcode_settings["css3CustomCss"] : '') . "' responsive='" . $shortcode_settings["responsive"] . "' responsiveHideCaptionColumn='" . (isset($shortcode_settings["responsiveHideCaptionColumn"]) ? $shortcode_settings["responsiveHideCaptionColumn"] : '') . "' responsiveSteps='" . $shortcode_settings["responsiveSteps"] . "' responsiveStepWidth='" . $responsiveStepWidth . "' responsiveButtonWidth='" . $responsiveButtonWidth . "' responsiveHeaderFontSize='" . $responsiveHeaderFontSize . "' responsivePriceFontSize='" . $responsivePriceFontSize . "' responsivePermonthFontSize='" . $responsivePermonthFontSize . "' responsiveContentFontSize='" . $responsiveContentFontSize . "' responsiveButtonsFontSize='" . $responsiveButtonsFontSize . "' priceFontCustom='" . (isset($shortcode_settings["priceFontCustom"]) ? $shortcode_settings["priceFontCustom"] : '') . "' priceFont='" . (isset($shortcode_settings["priceFont"]) ? $shortcode_settings["priceFont"] : '') . "' priceFontSubsets='" . (isset($priceFontSubsets) ? $priceFontSubsets : '') . "' priceFontSize='" . (isset($shortcode_settings["priceFontSize"]) ? $shortcode_settings["priceFontSize"] : '') . "' headerFontCustom='" . (isset($shortcode_settings["headerFontCustom"]) ? $shortcode_settings["headerFontCustom"] : '') . "' headerFont='" . (isset($shortcode_settings["headerFont"]) ? $shortcode_settings["headerFont"] : '') . "' headerFontSubsets='" . (isset($headerFontSubsets) ? $headerFontSubsets : '') . "' headerFontSize='" . (isset($shortcode_settings["headerFontSize"]) ? $shortcode_settings["headerFontSize"] : '') . "' permonthFontCustom='" . (isset($shortcode_settings["permonthFontCustom"]) ? $shortcode_settings["permonthFontCustom"] : '') . "' permonthFont='" . (isset($shortcode_settings["permonthFont"]) ? $shortcode_settings["permonthFont"] : '') . "' permonthFontSubsets='" . (isset($permonthFontSubsets) ? $permonthFontSubsets : '') . "' permonthFontSize='" . (isset($shortcode_settings["permonthFontSize"]) ? $shortcode_settings["permonthFontSize"] : '') . "' contentFontCustom='" . (isset($shortcode_settings["contentFontCustom"]) ? $shortcode_settings["contentFontCustom"] : '') . "' contentFont='" . (isset($shortcode_settings["contentFont"]) ? $shortcode_settings["contentFont"] : '') . "' contentFontSubsets='" . (isset($contentFontSubsets) ? $contentFontSubsets : '') . "' contentFontSize='" . (isset($shortcode_settings["contentFontSize"]) ? $shortcode_settings["contentFontSize"] : '') . "' buttonsFontCustom='" . (isset($shortcode_settings["buttonsFontCustom"]) ? $shortcode_settings["buttonsFontCustom"] : '') . "' buttonsFont='" . (isset($shortcode_settings["buttonsFont"]) ? $shortcode_settings["buttonsFont"] : '') . "' buttonsFontSubsets='" . (isset($buttonsFontSubsets) ? $buttonsFontSubsets : '') . "' buttonsFontSize='" . (isset($shortcode_settings["buttonsFontSize"]) ? $shortcode_settings["buttonsFontSize"] : '') . "' columns='" . $shortcode_settings["columns"] . "' rows='" . $shortcode_settings["rows"] . "' hiddenRows='" . $shortcode_settings["hiddenRows"] . "' hiddenRowsButtonExpandText='" . $shortcode_settings["hiddenRowsButtonExpandText"] . "' hiddenRowsButtonCollapseText='" . $shortcode_settings["hiddenRowsButtonCollapseText"] . "' texts='" . $texts . "' tooltips='" . $tooltips . "' widths='" . $widths . "' responsiveWidths='" . $responsiveWidths . "' aligments='" . $aligments . "' actives='" . $actives . "' hiddens='" . $hiddens . "' ribbons='" . $ribbons . "' heights='" . $heights . "' responsiveHeights='" . $responsiveHeights . "' paddingstop='" . $paddingsTop . "' paddingsbottom='" . $paddingsBottom . "']");
              // echo "[skpricing_table_print id='" . $id . "' top_margin='" . $top_margin . "' kind='" . $shortcode_settings["kind"] . "' style='" . $shortcode_settings["styleForTable" . $shortcode_settings["kind"]] . "' colsBgColor='" . $columnsBgColor . "' colsAnimSel='" . $shortcode_settings["colsAnimSel"] . "' colsTextColor='" . $columnsTextColor . "' hoverType='" . $shortcode_settings["hoverTypeForTable" . $shortcode_settings["kind"]] . "' css3CustomCss='" . (isset($shortcode_settings["css3CustomCss"]) ? $shortcode_settings["css3CustomCss"] : '') . "' responsive='" . $shortcode_settings["responsive"] . "' responsiveHideCaptionColumn='" . (isset($shortcode_settings["responsiveHideCaptionColumn"]) ? $shortcode_settings["responsiveHideCaptionColumn"] : '') . "' responsiveSteps='" . $shortcode_settings["responsiveSteps"] . "' responsiveStepWidth='" . $responsiveStepWidth . "' responsiveButtonWidth='" . $responsiveButtonWidth . "' responsiveHeaderFontSize='" . $responsiveHeaderFontSize . "' responsivePriceFontSize='" . $responsivePriceFontSize . "' responsivePermonthFontSize='" . $responsivePermonthFontSize . "' responsiveContentFontSize='" . $responsiveContentFontSize . "' responsiveButtonsFontSize='" . $responsiveButtonsFontSize . "' priceFontCustom='" . (isset($shortcode_settings["priceFontCustom"]) ? $shortcode_settings["priceFontCustom"] : '') . "' priceFont='" . (isset($shortcode_settings["priceFont"]) ? $shortcode_settings["priceFont"] : '') . "' priceFontSubsets='" . (isset($priceFontSubsets) ? $priceFontSubsets : '') . "' priceFontSize='" . (isset($shortcode_settings["priceFontSize"]) ? $shortcode_settings["priceFontSize"] : '') . "' headerFontCustom='" . (isset($shortcode_settings["headerFontCustom"]) ? $shortcode_settings["headerFontCustom"] : '') . "' headerFont='" . (isset($shortcode_settings["headerFont"]) ? $shortcode_settings["headerFont"] : '') . "' headerFontSubsets='" . (isset($headerFontSubsets) ? $headerFontSubsets : '') . "' headerFontSize='" . (isset($shortcode_settings["headerFontSize"]) ? $shortcode_settings["headerFontSize"] : '') . "' permonthFontCustom='" . (isset($shortcode_settings["permonthFontCustom"]) ? $shortcode_settings["permonthFontCustom"] : '') . "' permonthFont='" . (isset($shortcode_settings["permonthFont"]) ? $shortcode_settings["permonthFont"] : '') . "' permonthFontSubsets='" . (isset($permonthFontSubsets) ? $permonthFontSubsets : '') . "' permonthFontSize='" . (isset($shortcode_settings["permonthFontSize"]) ? $shortcode_settings["permonthFontSize"] : '') . "' contentFontCustom='" . (isset($shortcode_settings["contentFontCustom"]) ? $shortcode_settings["contentFontCustom"] : '') . "' contentFont='" . (isset($shortcode_settings["contentFont"]) ? $shortcode_settings["contentFont"] : '') . "' contentFontSubsets='" . (isset($contentFontSubsets) ? $contentFontSubsets : '') . "' contentFontSize='" . (isset($shortcode_settings["contentFontSize"]) ? $shortcode_settings["contentFontSize"] : '') . "' buttonsFontCustom='" . (isset($shortcode_settings["buttonsFontCustom"]) ? $shortcode_settings["buttonsFontCustom"] : '') . "' buttonsFont='" . (isset($shortcode_settings["buttonsFont"]) ? $shortcode_settings["buttonsFont"] : '') . "' buttonsFontSubsets='" . (isset($buttonsFontSubsets) ? $buttonsFontSubsets : '') . "' buttonsFontSize='" . (isset($shortcode_settings["buttonsFontSize"]) ? $shortcode_settings["buttonsFontSize"] : '') . "' slidingColumns='" . $shortcode_settings["slidingColumns"] . "' visibleColumns='" . $shortcode_settings["visibleColumns"] . "' scrollColumns='" . $shortcode_settings["scrollColumns"] . "' slidingNavigation='" . $shortcode_settings["slidingNavigation"] . "' slidingNavigationArrows='" . $shortcode_settings["slidingNavigationArrows"] . "' slidingArrowsStyle='" . $shortcode_settings["slidingArrowsStyle"] . "' slidingPagination='" . $shortcode_settings["slidingPagination"] . "' slidingPaginationPosition='" . $shortcode_settings["slidingPaginationPosition"] . "' slidingPaginationStyle='" . $shortcode_settings["slidingPaginationStyle"] . "' slidingCircular='" . (isset($shortcode_settings["slidingCircular"]) ? $shortcode_settings["slidingCircular"] : '') . "' slidingInfinite='" . (isset($shortcode_settings["slidingInfinite"]) ? $shortcode_settings["slidingInfinite"] : '') . "' slidingOnTouch='" . $shortcode_settings["slidingOnTouch"] . "' slidingOnMouse='" . $shortcode_settings["slidingOnMouse"] . "' slidingThreshold='" . $shortcode_settings["slidingThreshold"] . "' slidingAutoplay='" . $shortcode_settings["slidingAutoplay"] . "' slidingEffect='" . $shortcode_settings["slidingEffect"] . "' slidingEasing='" . $shortcode_settings["slidingEasing"] . "' slidingDuration='" . $shortcode_settings["slidingDuration"] . "' columns='" . $shortcode_settings["columns"] . "' rows='" . $shortcode_settings["rows"] . "' hiddenRows='" . $shortcode_settings["hiddenRows"] . "' hiddenRowsButtonExpandText='" . $shortcode_settings["hiddenRowsButtonExpandText"] . "' hiddenRowsButtonCollapseText='" . $shortcode_settings["hiddenRowsButtonCollapseText"] . "' texts='" . $texts . "' tooltips='" . $tooltips . "' widths='" . $widths . "' responsiveWidths='" . $responsiveWidths . "' aligments='" . $aligments . "' actives='" . $actives . "' hiddens='" . $hiddens . "' ribbons='" . $ribbons . "' heights='" . $heights . "' responsiveHeights='" . $responsiveHeights . "' paddingstop='" . $paddingsTop . "' paddingsbottom='" . $paddingsBottom . "']" ;
            } else
                $output = __('Shortcode with given id not found!', 'skpricing_table');
        } else
            $output = __('Parameter id not specified!', 'skpricing_table');
        return $output;
    }
    
    
    public function filterArray($value)
    {
        return (!empty($value) || $value == '0');
    }
    
    public function skpricing_table_print_shortcode($atts)
    {
      //  print_r($atts);
        global $skpricing_table_shortcode_used;
        global $skpricing_table_load_responsive;
        global $skpricing_table_load_kind_1;
        global $skpricing_table_load_kind_2;
		global $skpricing_table_load_kind_3;
        global $skpricing_table_load_js;
        global $skpricing_table_load_expand_collapse;
        extract(shortcode_atts(array(
            'id' => '',
            'columns' => '3',
            'rows' => '9',
            'hiddenrows' => '0',
            'hiddenrowsbuttonexpandtext' => 'Click here to expand!',
            'hiddenrowsbuttoncollapsetext' => 'Click here to collapse!',
            'colsbgimg' => '|||',
            'colsbgcolor' => '#000000|#000000|#000000|',
            'colstextcolor' => '#AAAAAA|#AAAAAA|#AAAAAA|',
            'kind' => '1',
			'colsanimsel' => '',
            'style' => '1',
            'hovertype' => 'active',
            'css3customcss' => '',
            'responsive' => '0',
            'responsivehidecaptioncolumn' => '0',
            'responsivesteps' => '3',
            'responsivestepwidth' => '1009|767|479|',
            'responsivebuttonwidth' => '|||',
            'responsiveheaderfontsize' => '|||',
            'responsivepricefontsize' => '|||',
            'responsivepermonthfontsize' => '|||',
            'responsivecontentfontsize' => '|||',
            'responsivebuttonsfontsize' => '|||',
            'pricefontcustom' => '',
            'pricefont' => '',
            'pricefontsubsets' => '',
            'pricefontsize' => '',
            'headerfontcustom' => '',
            'headerfont' => '',
            'headerfontsubsets' => '',
            'headerfontsize' => '',
            'permonthfontcustom' => '',
            'permonthfont' => '',
            'permonthfontsubsets' => '',
            'permonthfontsize' => '',
            'contentfontcustom' => '',
            'contentfont' => '',
            'contentfontsubsets' => '',
            'contentfontsize' => '',
            'buttonsfontcustom' => '',
            'buttonsfont' => '',
            'buttonsfontsubsets' => '',
            'buttonsfontsize' => '',
            'widths' => '|||',
            'responsivewidths' => '|||',
            'aligments' => '-1|-1|-1|',
            'actives' => '-1|-1|-1|',
            'hiddens' => '-1|-1|-1|',
            'ribbons' => '-1|-1|-1|',
            'heights' => '|||||||||',
            'responsiveheights' => '|||||||||',
            'paddingstop' => '|||||||||',
            'paddingsbottom' => '|||||||||',
            'texts' => '|<h2 class="col1">starter</h2>|<h2 class="col2">econo</h2>|<h2 class="caption">choose <span>your</span> plan</h2>|<h1 class="col1">$<span>10</span></h1><h3 class="col1">per month</h3>|<h1 class="col1">$<span>30</span></h1><h3 class="col1">per month</h3>|Amount of space|10GB|30GB|Bandwidth per month|100GB|200GB|No. of e-mail accounts|1|10|No. of MySql databases|1|10|24h support|Yes|Yes|Support tickets per mo.|1|3||<a href="' . get_site_url() . '?plan=1" class="sign_up radius3">sign up!</a>|<a href="' . get_site_url() . '?plan=2" class="sign_up radius3">sign up!</a>',
            'tooltips' => '|||||||||',
            'top_margin' => 'none'
        ), $atts));
        if ($id == "")
            $id = "sample";
        $responsiveStepWidth        = array_filter(explode("|", $responsivestepwidth), array(
            $this,
            'filterArray'
        ));
        $responsiveButtonWidth      = array_filter(explode("|", $responsivebuttonwidth), array(
            $this,
            'filterArray'
        ));
        $responsiveHeaderFontSize   = array_filter(explode("|", $responsiveheaderfontsize), array(
            $this,
            'filterArray'
        ));
        $responsivePriceFontSize    = array_filter(explode("|", $responsivepricefontsize), array(
            $this,
            'filterArray'
        ));
        $responsivePermonthFontSize = array_filter(explode("|", $responsivepermonthfontsize), array(
            $this,
            'filterArray'
        ));
        $responsiveContentFontSize  = array_filter(explode("|", $responsivecontentfontsize), array(
            $this,
            'filterArray'
        ));
        $responsiveButtonsFontSize  = array_filter(explode("|", $responsivebuttonsfontsize), array(
            $this,
            'filterArray'
        ));
        $widths                     = explode("|", $widths);
        $responsiveWidths           = array_filter(explode("|", $responsivewidths), array(
            $this,
            'filterArray'
        ));
		//$columnsAnimSel             = $colsanimsel ;
       $columnsBgImg             = explode("|", $colsbgimg);
        $columnsBgColor             = explode("|", $colsbgcolor);
        $columnsTextColor           = explode("|", $colstextcolor);
        $aligments                  = explode("|", $aligments);
        $actives                    = explode("|", $actives);
        $hiddens                    = explode("|", $hiddens);
        $ribbons                    = explode("|", $ribbons);
        $heights                    = array_filter(explode("|", $heights), array(
            $this,
            'filterArray'
        ));
        $responsiveHeights          = array_filter(explode("|", $responsiveheights), array(
            $this,
            'filterArray'
        ));
        $headerFontSubsets          = array_filter(explode("|", $headerfontsubsets), array(
            $this,
            'filterArray'
        ));
        $priceFontSubsets           = array_filter(explode("|", $pricefontsubsets), array(
            $this,
            'filterArray'
        ));
        $permonthFontSubsets        = array_filter(explode("|", $permonthfontsubsets), array(
            $this,
            'filterArray'
        ));
        $contentFontSubsets         = array_filter(explode("|", $contentfontsubsets), array(
            $this,
            'filterArray'
        ));
        $buttonsFontSubsets         = array_filter(explode("|", $buttonsfontsubsets), array(
            $this,
            'filterArray'
        ));
	(int) $slidingcolumns = 0 ; 
	(int) $visiblecolumns = 0;
        if ((int) $responsive)
            $skpricing_table_load_responsive = 1;
        if ((int) $kind == 1)
            $skpricing_table_load_kind_1 = 1;
        if ((int) $kind == 2)
            $skpricing_table_load_kind_2 = 1;
		if ((int) $kind == 3)
            $skpricing_table_load_kind_3 = 1;
			
        $output = "";
        
        if ($pricefontcustom != "" || $pricefont != "" || (int) $pricefontsize > 0 || $headerfontcustom != "" || $headerfont != "" || (int) $headerfontsize > 0 || $permonthfontcustom != "" || $permonthfont != "" || (int) $permonthfontsize > 0 || $contentfontcustom != "" || $contentfont != "" || (int) $contentfontsize > 0 || $buttonsfontcustom != "" || $buttonsfont != "" || (int) $buttonsfontsize > 0) {
            $fontStyles     = "";
            $fontsGoogleUrl = "";
            $joinedSubsets  = array();
            $headerFont     = $headerfontcustom;
            if ($headerfont != "" || $headerfontcustom != "" || (int) $headerfontsize > 0) {
                if ($headerfont != "") {
                    $headerFontExplode = explode(":", $headerfont);
                    $headerFont        = '"' . $headerFontExplode[0] . '"';
                    $fontsGoogleUrl .= $headerfont;
                    $joinedSubsets = array_unique(array_merge((array) $headerFontSubsets, $joinedSubsets));
                } else {
                    $headerFontsExplode = explode(",", $headerFont);
                    $headerFont         = "";
                    for ($i = 0; $i < count($headerFontsExplode); $i++)
                        $headerFont .= ($i > 0 ? ',' : '') . '"' . trim($headerFontsExplode[$i]) . '"';
                }
                $fontStyles .= 'div.p_table_' . $kind . '#' . $id . ' h2' . ($kind == 1 ? ', div.p_table_' . $kind . '#' . $id . ' h2 span' : '') . '{' . ($headerFont != "" ? 'font-family: ' . $headerFont . ' !important;' : '') . ((int) $headerfontsize > 0 ? 'font-size: ' . (int) $headerfontsize . 'px !important;' : '') . '}';
            }
            $priceFont = $pricefontcustom;
            if ($pricefont != "" || $pricefontcustom != "" || (int) $pricefontsize > 0) {
                if ($pricefont != "") {
                    $priceFontExplode = explode(":", $pricefont);
                    $priceFont        = '"' . $priceFontExplode[0] . '"';
                    $fontsGoogleUrl .= ($fontsGoogleUrl != "" ? '|' : '') . $pricefont;
                    $joinedSubsets = array_unique(array_merge((array) $priceFontSubsets, $joinedSubsets));
                } else {
                    $priceFontsExplode = explode(",", $priceFont);
                    $priceFont         = "";
                    for ($i = 0; $i < count($priceFontsExplode); $i++)
                        $priceFont .= ($i > 0 ? ',' : '') . '"' . trim($priceFontsExplode[$i]) . '"';
                }
                $fontStyles .= 'div.p_table_' . $kind . '#' . $id . ' h1' . ($kind == 1 ? ', div.p_table_' . $kind . '#' . $id . ' h1 span' : '') . '{' . ($priceFont != "" ? 'font-family: ' . $priceFont . ' !important;' : '') . ((int) $pricefontsize > 0 ? 'font-size: ' . (int) $pricefontsize . 'px !important;' : '') . '}';
            }
            $permonthFont = $permonthfontcustom;
            if ($permonthfont != "" || $permonthfontcustom != "" || (int) $permonthfontsize > 0) {
                if ($permonthfont != "") {
                    $permonthFontExplode = explode(":", $permonthfont);
                    $permonthFont        = '"' . $permonthFontExplode[0] . '"';
                    $fontsGoogleUrl .= ($fontsGoogleUrl != "" ? '|' : '') . $permonthfont;
                    $joinedSubsets = array_unique(array_merge((array) $permonthFontSubsets, $joinedSubsets));
                } else {
                    $permonthFontsExplode = explode(",", $permonthFont);
                    $permonthFont         = "";
                    for ($i = 0; $i < count($permonthFontsExplode); $i++)
                        $permonthFont .= ($i > 0 ? ',' : '') . '"' . trim($permonthFontsExplode[$i]) . '"';
                }
                $fontStyles .= 'div.p_table_' . $kind . '#' . $id . ' h3{' . ($permonthFont != "" ? 'font-family: ' . $permonthFont . ' !important;' : '') . ((int) $permonthfontsize > 0 ? 'font-size: ' . (int) $permonthfontsize . 'px !important;' : '') . '}';
            }
            $contentFont = $contentfontcustom;
            if ($contentfont != "" || $contentfontcustom != "" || (int) $contentfontsize > 0) {
                if ($contentfont != "") {
                    $contentFontExplode = explode(":", $contentfont);
                    $contentFont        = '"' . $contentFontExplode[0] . '"';
                    $fontsGoogleUrl .= ($fontsGoogleUrl != "" ? '|' : '') . $contentfont;
                    $joinedSubsets = array_unique(array_merge((array) $contentFontSubsets, $joinedSubsets));
                } else {
                    $contentFontsExplode = explode(",", $contentFont);
                    $contentFont         = "";
                    for ($i = 0; $i < count($contentFontsExplode); $i++)
                        $contentFont .= ($i > 0 ? ',' : '') . '"' . trim($contentFontsExplode[$i]) . '"';
                }
                $fontStyles .= 'div.p_table_' . $kind . '#' . $id . ' li.row_style_1 span, div.p_table_' . $kind . '#' . $id . ' li.row_style_2 span, div.p_table_' . $kind . '#' . $id . ' li.row_style_3 span, div.p_table_' . $kind . '#' . $id . ' li.row_style_4 span{' . ($contentFont != "" ? 'font-family: ' . $contentFont . ' !important;' : '') . ((int) $contentfontsize > 0 ? 'font-size: ' . (int) $contentfontsize . 'px !important;' : '') . '}';
            }
            $buttonsFont = $buttonsfontcustom;
            if ($buttonsfont != "" || $buttonsfontcustom != "" || (int) $buttonsfontsize > 0) {
                if ($buttonsfont != "") {
                    $buttonsFontExplode = explode(":", $buttonsfont);
                    $buttonsFont        = '"' . $buttonsFontExplode[0] . '"';
                    $fontsGoogleUrl .= ($fontsGoogleUrl != "" ? '|' : '') . $buttonsfont;
                    $joinedSubsets = array_unique(array_merge((array) $buttonsFontSubsets, $joinedSubsets));
                } else {
                    $buttonsFontsExplode = explode(",", $buttonsFont);
                    $buttonsFont         = "";
                    for ($i = 0; $i < count($buttonsFontsExplode); $i++)
                        $buttonsFont .= ($i > 0 ? ',' : '') . '"' . trim($buttonsFontsExplode[$i]) . '"';
                }
                $fontStyles .= ($kind == 1 ? 'div.p_table_' . $kind . '#' . $id . ' a.sign_up, div.p_table_' . $kind . '#' . $id . ' .skpricing_table_hidden_rows_control span' : 'div.p_table_' . $kind . '#' . $id . ' a.button_1, div.p_table_' . $kind . '#' . $id . ' a.button_2, div.p_table_' . $kind . '#' . $id . ' a.button_3, div.p_table_' . $kind . '#' . $id . ' a.button_4, div.p_table_' . $kind . '#' . $id . ' .skpricing_table_hidden_rows_control span') . '{' . ($buttonsFont != "" ? 'font-family: ' . $buttonsFont . ' !important;' : '') . ((int) $buttonsfontsize > 0 ? 'font-size: ' . (int) $buttonsfontsize . 'px !important;' : '') . '}';
            }
            
            /*if($priceFont!="" && $headerFont!="")
            {
            if($priceFont!=$headerFont)
            {
            if($headerFont!="")
            $output .= '<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=' . $headerfont . '&subset=' . implode(",", (array)$headerFontSubsets) . '">';
            if($priceFont!="")
            $output .= '<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=' . $pricefont . '&subset=' . implode(",", (array)$priceFontSubsets) . '">';
            }
            else
            {
            $joinedSubsets = array_unique(array_merge((array)$headerFontSubsets, (array)$priceFontSubsets));
            $output .= '<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=' . $headerfont . '&subset=' . implode(",", (array)$joinedSubsets) . '">';
            }
            }*/
            if ($fontsGoogleUrl != "")
                $output .= '<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=' . $fontsGoogleUrl . '&subset=' . implode(",", (array) $joinedSubsets) . '">';
            $output .= '<style type="text/css">' . $fontStyles . '</style>';
        }
        if ((int) $responsive && count($responsiveStepWidth) && (count($responsiveWidths) || count($responsiveHeights) || count($responsiveButtonWidth) || count($responsiveHeaderFontSize))) {
            $output .= '<style type="text/css">';
            for ($i = 0; $i < count($responsiveStepWidth); $i++) {
                $output .= '@media screen and (max-width:' . $responsiveStepWidth[$i] . 'px)
			{';
                if (count($responsiveWidths)) {
                    foreach ($responsiveWidths as $key => $responsiveWidth) {
                        if ($key % (int) $responsivesteps == $i)
                            $output .= 'div.p_table_responsive#' . $id . ' div.column_' . floor($key / (int) $responsivesteps) . '_responsive
						{
							width: ' . $responsiveWidth . (substr($responsiveWidth, -1) != "%" && substr($responsiveWidth, -2) != "px" ? "px" : "") . ' !important;' . ((int) $responsiveWidth == 0 ? 'display: none;' : '') . '
						}';
                    }
                }
                if (count($responsiveHeights)) {
                    foreach ($responsiveHeights as $key => $responsiveHeight) {
                        if ($key % (int) $responsivesteps == $i)
                            $output .= 'div.p_table_responsive#' . $id . ' li.skpricing_table_row_' . floor($key / (int) $responsivesteps) . '_responsive
						{
							height: ' . (int) $responsiveHeight . 'px !important;' . ((int) $responsiveHeight == 0 ? 'display: none;' : '') . '
						}';
                    }
                }
                if (isset($responsiveButtonWidth[$i]) && (int) $responsiveButtonWidth[$i] > 0) {
                    $output .= ($kind == 1 ? 'div.p_table_responsive#' . $id . ' a.sign_up' : 'div.p_table_' . $kind . '#' . $id . ' a.button_1, div.p_table_' . $kind . '#' . $id . ' a.button_2, div.p_table_' . $kind . '#' . $id . ' a.button_3, div.p_table_' . $kind . '#' . $id . ' a.button_4') . '
				{
					width: ' . (int) $responsiveButtonWidth[$i] . 'px;
				}';
                }
                if (isset($responsiveHeaderFontSize[$i]) && (int) $responsiveHeaderFontSize[$i] > 0)
                    $output .= 'div.p_table_' . $kind . '#' . $id . ' h2' . ($kind == 1 ? ', div.p_table_' . $kind . '#' . $id . ' h2 span' : '') . '{font-size: ' . (int) $responsiveHeaderFontSize[$i] . 'px !important;}';
                if (isset($responsivePriceFontSize[$i]) && (int) $responsivePriceFontSize[$i] > 0)
                    $output .= 'div.p_table_' . $kind . '#' . $id . ' h1' . ($kind == 1 ? ', div.p_table_' . $kind . '#' . $id . ' h1 span' : '') . '{font-size: ' . (int) $responsivePriceFontSize[$i] . 'px !important;}';
                if (isset($responsivePermonthFontSize[$i]) && (int) $responsivePermonthFontSize[$i] > 0)
                    $output .= 'div.p_table_' . $kind . '#' . $id . ' h3{font-size: ' . (int) $responsivePermonthFontSize[$i] . 'px !important;}';
                if (isset($responsiveContentFontSize[$i]) && (int) $responsiveContentFontSize[$i] > 0)
                    $output .= 'div.p_table_' . $kind . '#' . $id . ' li.row_style_1 span, div.p_table_' . $kind . '#' . $id . ' li.row_style_2 span, div.p_table_' . $kind . '#' . $id . ' li.row_style_3 span, div.p_table_' . $kind . '#' . $id . ' li.row_style_4 span{font-size: ' . (int) $responsiveContentFontSize[$i] . 'px !important;}';
                if (isset($responsiveButtonsFontSize[$i]) && (int) $responsiveButtonsFontSize[$i] > 0)
                    $output .= ($kind == 1 ? 'div.p_table_' . $kind . '#' . $id . ' a.sign_up, div.p_table_' . $kind . '#' . $id . ' .skpricing_table_hidden_rows_control span' : 'div.p_table_' . $kind . '#' . $id . ' a.button_1, div.p_table_' . $kind . '#' . $id . ' a.button_2, div.p_table_' . $kind . '#' . $id . ' a.button_3, div.p_table_' . $kind . '#' . $id . ' a.button_4, div.p_table_' . $kind . '#' . $id . ' .skpricing_table_hidden_rows_control span') . '{font-size: ' . (int) $responsiveButtonsFontSize[$i] . 'px !important;}';
                
                $output .= '}';
            }
            $output .= '</style>';
        }
        if ($css3customcss != '')
            $output .= '<style type="text/css">' . $css3customcss . '</style>';
        if ((int) $hiddenrows > 0 && (count($responsiveHeights) || count($heights)))
            $output .= '<style type="text/css">div#' . $id . '.p_table_1.skpricing_table_clearfix div li.skpricing_table_hidden_row.skpricing_table_hide, div#' . $id . '.p_table_1.skpricing_table_clearfix div:hover li.skpricing_table_hidden_row.skpricing_table_hide{height: 0 !important;opacity: 0;padding: 0 !important;}</style>';
        $paddingsTop    = array_filter(explode("|", $paddingstop), array(
            $this,
            'filterArray'
        ));
        $paddingsBottom = array_filter(explode("|", $paddingsbottom), array(
            $this,
            'filterArray'
        ));
        $texts          = explode("|", $texts);
       
        for ($i = 0; $i < count($texts); $i++)
            $texts[$i] = str_replace("&#93;", "]", str_replace("&#91;", "[", str_replace("&#39;", "'", $texts[$i])));
        $tooltips = explode("|", $tooltips);
        for ($i = 0; $i < count($tooltips); $i++)
            $tooltips[$i] = str_replace("&#93;", "]", str_replace("&#91;", "[", str_replace("&#39;", "'", $tooltips[$i])));
        if ((int) $slidingcolumns && (int) $visiblecolumns > 0) {
            $skpricing_table_load_js = 1;
            if ((int) $kind == 1){
                $hovertype = "disabled";
            }else if ((int) $kind == 3){
				$hovertype = "disabled";
			}
        }
        if ((int) $hiddenrows > 0)
            $skpricing_table_load_expand_collapse = 1;
        //$output = '<link rel="stylesheet" type="text/css" href="' . plugins_url('table' . $kind . '/main.css', __FILE__) . '"/>';
        //$output .= '<link rel="stylesheet" type="text/css" href="' . plugins_url('table' . $kind . '/style_' . $style . '.css', __FILE__) . '"/>';
       
		if($kind == 3){
         
			 if ((int) $slidingcolumns && (int) $visiblecolumns > 0) {
            if ((int) $slidingpagination && ($slidingpaginationposition == "top" || $slidingpaginationposition == "both"))
                $output .= "<div class='skpricing_table_pagination skpricing_table_" . $id . "_pagination skpricing_table_pagination_" . $slidingpaginationstyle . "'></div>";
            $output .= "<div id='skpricing_table_" . $id . "_slider_container' class='skpricing_table_slider_container skpricing_table_clearfix" . ($top_margin != "none" ? " " . $top_margin : "") . "'>";
            if ((int) $slidingnavigation && (int) $slidingnavigationarrows)
                $output .= "<div class='skpricing_table_arrow_area'><a id='skpricing_table_" . $id . "_prev' href='#skpricing_table_" . $id . "_prev' class='skpricing_table_slide_button_prev skpricing_table_slide_button_" . $slidingarrowsstyle . "'></a></div>";
        }
        $output .= '<div id="' . $id . '" class="' . ((int) $responsive ? 'p_table_responsive ' : '') . ((int) $responsivehidecaptioncolumn ? 'p_table_hide_caption_column ' : '') . ((int) $slidingcolumns && (int) $visiblecolumns > 0 ? 'p_table_sliding ' : '') . 'p_table_' . $kind . '_' . $style . ' skpricing_table_clearfix' . ($top_margin != "none" && (!(int) $slidingcolumns || !(int) $visiblecolumns) ? ' ' . $top_margin : '') . '">';
        $countValues   = array_count_values($hiddens);
        $totalColumns  = $countValues["-1"];
        $currentColumn = 0;
		 require plugin_dir_path(dirname(__FILE__)) . 'admin/partials/skpricing-table-admin-layouts.php';
		
		}else{
		
		 if ((int) $slidingcolumns && (int) $visiblecolumns > 0) {
            if ((int) $slidingpagination && ($slidingpaginationposition == "top" || $slidingpaginationposition == "both"))
                $output .= "<div class='skpricing_table_pagination skpricing_table_" . $id . "_pagination skpricing_table_pagination_" . $slidingpaginationstyle . "'></div>";
            $output .= "<div id='skpricing_table_" . $id . "_slider_container' class='skpricing_table_slider_container skpricing_table_clearfix" . ($top_margin != "none" ? " " . $top_margin : "") . "'>";
            if ((int) $slidingnavigation && (int) $slidingnavigationarrows)
                $output .= "<div class='skpricing_table_arrow_area'><a id='skpricing_table_" . $id . "_prev' href='#skpricing_table_" . $id . "_prev' class='skpricing_table_slide_button_prev skpricing_table_slide_button_" . $slidingarrowsstyle . "'></a></div>";
        }
        $output .= '<div id="' . $id . '" class="' . ((int) $responsive ? 'p_table_responsive ' : '') . ((int) $responsivehidecaptioncolumn ? 'p_table_hide_caption_column ' : '') . ((int) $slidingcolumns && (int) $visiblecolumns > 0 ? 'p_table_sliding ' : '') .' p_table_' . $kind . ' p_table_' . $kind . '_' . $style .' skpricing_table_clearfix' . ($top_margin != "none" && (!(int) $slidingcolumns || !(int) $visiblecolumns) ? ' ' . $top_margin : '') . '">';
        $countValues   = array_count_values($hiddens);
        $totalColumns  = $countValues["-1"];
        $currentColumn = 0;
		
        for ($i = 0; $i < $columns; $i++) {
            if ($hiddens[$i] != 1) {
                if ($i == 0)
                    $output .= '<div class="hrpricing-Cols caption_column' . ((int) $actives[0] == 1 && !((int) $slidingcolumns && (int) $visiblecolumns > 0 && (int) $kind == 1) ? ' active_column' : '') . ((int) $responsive ? ' column_' . $i . '_responsive' : '') . '"' . ($widths[0] > 0 ? ' style="width: ' . $widths[0] . (substr($widths[0], -1) != "%" && substr($widths[0], -2) != "px" ? "px" : "") . ';"' : '') . '>';
                else {
                    if ($i == 1 && (int) $slidingcolumns && (int) $visiblecolumns > 0)
                        $output .= '<div class="skpricing_table_slider id-' . $id . ' autoplay-' . $slidingautoplay . ' effect-' . $slidingeffect . ' easing-' . $slidingeasing . ' duration-' . $slidingduration . ' items-' . $visiblecolumns . ' scroll-' . ((int) $scrollcolumns > 0 ? (int) $scrollcolumns : (int) $visiblecolumns) . ((int) $slidingcircular ? ' circular' : '') . ((int) $slidinginfinite ? ' infinite' : '') . ((int) $slidingontouch ? ' ontouch' : '') . ((int) $slidingonmouse ? ' onmouse' : '') . ((int) $slidingontouch || (int) $slidingonmouse ? ' threshold-' . $slidingthreshold : '') . ((int) $slidingpagination ? ' slidingPagination' : '') . '">';
                    $output .= '<div class="hrpricing-Cols column_' . ($i % 4 == 0 ? 4 : $i % 4) . ((int) $actives[$i] == 1 && !((int) $slidingcolumns && (int) $visiblecolumns > 0 && (int) $kind == 1) ? ' active_column' : '') . ((int) $responsive ? ' column_' . $i . '_responsive' : '') . '"' . ($widths[$i] > 0 ? ' style="width: ' . $widths[$i] . (substr($widths[$i], -1) != "%" && substr($widths[$i], -2) != "px" ? "px" : "") . ';"' : '') . '>';
                }
                if ((int) $ribbons[$i] != -1)
                    $output .= '<div class="column_ribbon ribbon_' . $ribbons[$i] . '"></div>';
				   	
                $output .= '<ul>';
                for ($j = 0; $j < $rows; $j++) {
                    if ($j < 2) {
                        if ($j == 0)
                            $output .= '<li' . ((!empty($aligments[$i]) && (int) $aligments[$i] != -1) || isset($heights[$j]) || (!empty($paddingsTop[$j]) && (int) $paddingsTop[$j] >= 0) || (!empty($paddingsBottom[$j]) && (int) $paddingsBottom[$j] >= 0) ? ' style="' . ((!empty($aligments[$i]) && (int) $aligments[$i] != -1) ? 'text-align: ' . $aligments[$i] . ';' : '') . (isset($heights[$j]) ? 'height: ' . (int) $heights[$j] . 'px;' . ((int) $heights[$j] == 0 ? 'display: none;' : '') : '') . ((!empty($paddingsTop[$j]) && (int) $paddingsTop[$j] >= 0) ? 'padding-top: ' . $paddingsTop[$j] . 'px !important;' : '') . ((!empty($paddingsBottom[$j]) && (int) $paddingsBottom[$j] >= 0) ? 'padding-bottom: ' . $paddingsBottom[$j] . 'px !important;' : '') . '"' : '') . ' class="skpricing_table_row_' . $j . ' header_row_1 align_center' . ((int) $responsive ? ' skpricing_table_row_' . $j . '_responsive' : '') . ($currentColumn == 0 && (int) $kind == 1 ? ' radius5_topleft' : (($currentColumn == 0 && $hiddens[0] == 1) || ($currentColumn == 1 && $hiddens[0] == -1) && (int) $kind == 2 ? ' radius5_topleft' : '')) . ($currentColumn + 1 == $totalColumns ? ' radius5_topright' : '') . '"><span class="skpricing_table_vertical_align_table"><span class="skpricing_table_vertical_align">' . do_shortcode(($tooltips[$j * $columns + $i] != "" ? '<span class="skpricing_table_tooltip"><span>' . $tooltips[$j * $columns + $i] . '</span>' : '') . $texts[$j * $columns + $i] . ($tooltips[$j * $columns + $i] != "" ? '</span>' : '')) . '</span></span></li>';
                        else if ($j == 1) {
                            if ((int) $kind == 2)
                                $output .= '<li class="decor_line"></li>';
                            $output .= '<li' . ((!empty($aligments[$i]) && (int) $aligments[$i] != -1) || isset($heights[$j]) || (!empty($paddingsTop[$j]) && (int) $paddingsTop[$j] >= 0) || (!empty($paddingsBottom[$j]) && (int) $paddingsBottom[$j] >= 0) ? ' style="' . ((!empty($aligments[$i]) && (int) $aligments[$i] != -1) ? 'text-align: ' . $aligments[$i] . ';' : '') . (isset($heights[$j]) ? 'height: ' . (int) $heights[$j] . 'px;' . ((int) $heights[$j] == 0 ? 'display: none;' : '') : '') . ((!empty($paddingsTop[$j]) && (int) $paddingsTop[$j] >= 0) ? 'padding-top: ' . $paddingsTop[$j] . 'px !important;' : '') . ((!empty($paddingsBottom[$j]) && (int) $paddingsBottom[$j] >= 0) ? 'padding-bottom: ' . $paddingsBottom[$j] . 'px !important;' : '') . '"' : '') . ' class="skpricing_table_row_' . $j . ' header_row_2' . ((int) $responsive ? ' skpricing_table_row_' . $j . '_responsive' : '') . (($currentColumn == 0 && $hiddens[0] == 1) || ($currentColumn == 1 && $hiddens[0] == -1) && (int) $kind == 2 ? ' radius5_bottomleft' : '') . ($currentColumn + 1 == $totalColumns && (int) $kind == 2 ? ' radius5_bottomright' : '') . ($i != 0 ? ' align_center' : '') . '"><span class="skpricing_table_vertical_align_table"><span class="skpricing_table_vertical_align">' . do_shortcode(($tooltips[$j * $columns + $i] != "" ? '<span class="skpricing_table_tooltip"><span>' . $tooltips[$j * $columns + $i] . '</span>' : '') . $texts[$j * $columns + $i] . ($tooltips[$j * $columns + $i] != "" ? '</span>' : '')) . '</span></span></li>';
                        }
                    } else if ($j + 1 == $rows) {
                        $output .= '<li' . ((!empty($aligments[$i]) && (int) $aligments[$i] != -1) || isset($heights[$j]) || (!empty($paddingsTop[$j]) && (int) $paddingsTop[$j] >= 0) || (!empty($paddingsBottom[$j]) && (int) $paddingsBottom[$j] >= 0) ? ' style="' . ((!empty($aligments[$i]) && (int) $aligments[$i] != -1) ? 'text-align: ' . $aligments[$i] . ';' : '') . (isset($heights[$j]) ? 'height: ' . (int) $heights[$j] . 'px;' . ((int) $heights[$j] == 0 ? 'display: none;' : '') : '') . ((!empty($paddingsTop[$j]) && (int) $paddingsTop[$j] >= 0) ? 'padding-top: ' . $paddingsTop[$j] . 'px !important;' : '') . ((!empty($paddingsBottom[$j]) && (int) $paddingsBottom[$j] >= 0) ? 'padding-bottom: ' . $paddingsBottom[$j] . 'px !important;' : '') . '"' : '') . ' class="skpricing_table_row_' . $j . ' footer_row' . ((int) $responsive ? ' skpricing_table_row_' . $j . '_responsive' : '') . ($currentColumn + 1 == $totalColumns && (int) $kind == 2 ? ' radius5_bottomright' : '') . '"><span class="skpricing_table_vertical_align_table"><span class="skpricing_table_vertical_align">' . do_shortcode((isset($tooltips[$j * $columns + $i]) && $tooltips[$j * $columns + $i] != "" ? '<span class="skpricing_table_tooltip"><span>' . $tooltips[$j * $columns + $i] . '</span>' : '') . $texts[$j * $columns + $i] . (isset($tooltips[$j * $columns + $i]) && $tooltips[$j * $columns + $i] != "" ? '</span>' : '')) . '</span></span></li>';
                    } else {
                        $output .= '<li' . ((!empty($aligments[$i]) && (int) $aligments[$i] != -1) || isset($heights[$j]) || (!empty($paddingsTop[$j]) && (int) $paddingsTop[$j] >= 0) || (!empty($paddingsBottom[$j]) && (int) $paddingsBottom[$j] >= 0) ? ' style="' . ((int) $aligments[$i] != -1 ? 'text-align: ' . $aligments[$i] . ';' : '') . (isset($heights[$j]) ? 'height: ' . (int) $heights[$j] . 'px;' . ((int) $heights[$j] == 0 ? 'display: none;' : '') : '') . ((!empty($paddingsTop[$j]) && (int) $paddingsTop[$j] >= 0) ? 'padding-top: ' . $paddingsTop[$j] . 'px !important;' : '') . ((!empty($paddingsBottom[$j]) && (int) $paddingsBottom[$j] >= 0) ? 'padding-bottom: ' . $paddingsBottom[$j] . 'px !important;' : '') . '"' : '') . ' class="skpricing_table_row_' . $j . ' row_style_' . ($i % 2 == 0 && $j % 2 == 0 ? ((int) $kind == 1 ? '4' : '1') : ($i % 2 == 0 && $j % 2 == 1 ? ((int) $kind == 1 ? '2' : '3') : ($i % 2 == 1 && $j % 2 == 0 ? ((int) $kind == 1 ? '3' : '1') : ((int) $kind == 1 ? '1' : '2')))) . ((int) $responsive ? ' skpricing_table_row_' . $j . '_responsive' : '') . ($i > 0 ? ' align_center' : '') . ((int) $rows - $j - 2 < (int) $hiddenrows ? ' skpricing_table_hidden_row skpricing_table_hide' : '') . '"><span class="skpricing_table_vertical_align_table"><span class="skpricing_table_vertical_align"><span>' . ((int) $responsive && (int) $responsivehidecaptioncolumn ? '<span class="css3_hidden_caption">' . $texts[$j * $columns] . '</span>' : '') . do_shortcode((isset($tooltips[$j * $columns + $i]) && $tooltips[$j * $columns + $i] != "" ? '<span class="skpricing_table_tooltip"><span>' . $tooltips[$j * $columns + $i] . '</span>' : '') . $texts[$j * $columns + $i] . (isset($tooltips[$j * $columns + $i]) && $tooltips[$j * $columns + $i] != "" ? '</span>' : '')) . '</span></span></span></li>';
                    }
                }
                $output .= '</ul></div>';
                $currentColumn++;
			    }
			}
		}
        if ((int) $slidingcolumns && (int) $visiblecolumns > 0)
            $output .= '</div>';
        if ((int) $hiddenrows > 0)
            $output .= "<a class='skpricing_table_hidden_rows_control skpricing_table_hidden_rows_control_p_table_" . $kind . "_" . $style . " skpricing_table_hidden_rows_control_" . $id . "' href='#'><span class='skpricing_table_hidden_rows_control_expand_text'>" . $hiddenrowsbuttonexpandtext . "</span><span class='skpricing_table_hidden_rows_control_collapse_text skpricing_table_hide'>" . $hiddenrowsbuttoncollapsetext . "</span></a>";
        
        $output .= "</div>";
        if ((int) $slidingcolumns && (int) $visiblecolumns > 0) {
            if ((int) $slidingnavigation && (int) $slidingnavigationarrows)
                $output .= "<div class='skpricing_table_arrow_area'><a id='skpricing_table_" . $id . "_next' href='#skpricing_table_" . $id . "_next' class='skpricing_table_slide_button_next skpricing_table_slide_button_" . $slidingarrowsstyle . "'></a></div>";
            $output .= "</div>";
        }
        if ((int) $slidingcolumns && (int) $visiblecolumns > 0) {
            if ((int) $slidingpagination && ($slidingpaginationposition == "bottom" || $slidingpaginationposition == "both"))
                $output .= "<div class='skpricing_table_pagination skpricing_table_" . $id . "_pagination skpricing_table_pagination_" . $slidingpaginationstyle . "'></div>";
        }
        $skpricing_table_shortcode_used = true;
        return $output;
    }
    
  
    
    

    

    public function assign_var(&$target, $var)
    {
        $key = key($var);
        if (is_array($var[$key]))
            $this->assign_var($target[$key], $var[$key]);
        else {
            if ($key === 0)
                $target[] = $var[$key];
            else
                $target[$key] = $var[$key];
        }
    }
    
    public function register_admin_shortcode()
    {
        add_shortcode('skpricing_table_print', array(
            $this,
            'skpricing_table_print_shortcode'
        ));
        add_shortcode('skpricing_table', array(
            $this,
            'skpricing_table_shortcode'
        ));
    }
	


public function hex2rgba($color, $opacity = false) {
 
	$default = 'rgb(0,0,0)';
 
	//Return default if no color provided
	if(empty($color))
          return $default; 
 
	//Sanitize $color if "#" is provided 
        if ($color[0] == '#' ) {
        	$color = substr( $color, 1 );
        }
 
        //Check if color has 6 or 3 characters and get values
        if (strlen($color) == 6) {
                $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
        } elseif ( strlen( $color ) == 3 ) {
                $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
        } else {
                return $default;
        }
 
        //Convert hexadec to rgb
        $rgb =  array_map('hexdec', $hex);
 
        //Check if opacity is set(rgba or rgb)
        if($opacity){
        	if(abs($opacity) > 1)
        		$opacity = 1.0;
        	$output = 'rgba('.implode(",",$rgb).','.$opacity.')';
        } else {
        	$output = 'rgb('.implode(",",$rgb).')';
        }
 
        //Return rgb(a) color string
        return $output;
    }
    
    
    
}